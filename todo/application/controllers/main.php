<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	
		$this->load->model('blog_m');
		$this->load->helper('url');
		$this->load->helper('date');
	}
	public function index(){
		$this->test();
	}
	function colorhelp(){
		$this->load->view('colorsthelp');
	}
	function ppthelp(){
		$this->load->view('ppthelp');
	}
	public function _remap($method){

		$this->load->view('header');
		if(method_exists($this, $method)){
			$this->{$method}();
		}
		$this->load->view('footer');

	}
	public function test(){
		/* serach function start */
		//$this->output->enable_profiler(true);//debug function on

		$serach_word=$page_url='';
		$uri_segment=5;
		//주소 중에서 q(검색어) 세그먼트가 있는지 검사하기 위해 주소를 배열로 변환
		$uri_array =$this->segment_explode($this->uri->uri_string());
		if(in_array('q',$uri_array))
		{
		$serach_word=urldecode($this->url_explode($uri_array,'q'));
		
		$page_url='/q/'.$serach_word;
		$uri_segment=7;
		}
		//serach funtion end


		//pagenation start
		$this->load->library('pagination');

		$config['base_url']='/todo/main/test/blogtable'.$page_url.'/page/';
		$config['total_rows']=$this->blog_m->count();
		$config['per_page']= 5; //한페이지  표시
		$config['uri_segment']=$uri_segment; 

		$this->pagination->initialize($config);
		$data['pagination']= $this->pagination->create_links();
		
		$page = $this->uri->segment($uri_segment,1);
		$start='';
		if($page >1)
		{
			$start=(($page/$config['per_page']))*$config['per_page'];
		}
		else
		{
			$start=($page -1)*$config['per_page'];
		}
		if($start <0){
			$start =$start*-1;
		}
		$limit=$config['per_page'];

		
		$data['blog']=$this->blog_m->read('Blogtable',$start,$limit,$serach_word);

		$this->load->view('shopinfo',$data);
		//pagination end
	}
	public function viewone(){
		$id=$this->uri->segment(3);
		$data['views']=$this->blog_m->readone($id);

		$this->load->view('view_vv',$data);
	
	}
	
	function writeblog(){
		echo '<meta http-equiv="Content-type" content="text/html; charset=utf-8"  ?>';
		if(@$this->session->userdata('logged_in') ==TRUE)
		{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title','제목','required');
		$this->form_validation->set_rules('content','내용','required');
		if( $this->form_validation->run()==TRUE)
		{
		$write_data=array(
			'table'=>'Blogtable',
			'title'=>$title=$this->input->post('title',true),
			'content'=>$content=$this->input->post('content',false),
			'pass'=>$pass=$this->input->post('pass',true),
			//'username'=>$username=$this->input->post('username',true),
			'usename'=>$this->session->userdata('username'),
			'cate'=>$cate=$this->input->post('cate',true)
			);
		$result=$this->blog_m->insert_blogtable($write_data);
		if($result){
			alert('글을 작성하였습니다','http://localhost/todo/main/test');
			//redirect('http://localhost/todo/main/test');
			exit;	
		}
		else
		{
			$this->output->enable_profiler();
			
		}
		
		}
		else
		{
			$this->load->view('write_vv');
		}
	}
	else
	{
		exit;
	}
	}

	function modfyblog()
	{
	  echo '<meta http-equiv="Content-type" content="text/html; charset=utf-8" />'; //글자 깨짐 방지
	  	$this->output->enable_profiler(true);//debug function on
	  	if( $_POST)
	  	{
	  		//alert helper가 없으므로 redirect를 사용합니다.
	  	$uri_array=$this->segment_explode($this->uri->uri_string());

	  		if(in_array('page',$uri_array))
	  		{
	  			$pages=urldecode($this->url_explode($uri_array,'page'));
	  		}
	  		else
	  		{
	  			$pages=1;
	  		}
	  		if(!$this->input->post('title',TRUE) AND !$this->input->post('content',TRUE))
	  		{	
	  			alert('비정상적인 접근입니다','http://localhost/todo/main/test/Blogtable/q/page'.$pages);
	  			//echo '비정상적인 접근입니다.';
	  			//redirect('http://localhost/todo/main/test/Blogtable/q/page'.$pages);
	  			exit;
	  		}
	  		if(@$this->session->userdata('logged_in')==TRUE)
	  		{
	  			$writer_id =$this->blog_m->writer_check();

	  			if($writer_id->username != $this->session->userdata('username'))
	  			{	
	  				alert('본이 아니어서 수정할수 없습니다','http://localhost/todo/main/test');
	  				//redirect('http://localhost/todo/main/test');
	  				exit;
	  			}
	  		}

	  		$modify_data=array(
	  			'table'=>'Blogtable',
	  			'no'=>$this->uri->segment(4),
	  			'title'=>$this->input->post('title',TRUE),
	  			'content'=>$this->input->post('content',false),
	  			);
	  		$result = $this->blog_m->modify_board($modify_data);

	  		if($result)
	  		{	
	  			//입력성공
	  			//redirect('localhost/todo/main/test/Blogtable/q/page'.$pages);
	  			alert('수정성공','http://localhost/todo/main/test');
	  			//redirect('http://localhost/todo/main/test');
	  			exit;
	  		}
	  		else
	  		{
	  			alert('수정실패','http://localhost/todo/main/test');
	  			exit;	
	  		}	
	  	}
	  		else
	  		{
	  		$id=$this->uri->segment(4);
	  		$data['views']=$this->blog_m->readone($id);
	  		$this->load->view('modify_v',$data);
	  	    }
		}
		function delete()
		{
		echo '<meta http-equiv="Content-type" content="text/html; charset=utf-8" />';
		if(@$this->session->userdata('logged_in')==TRUE)
		{
			$writer_id=$this->blog_m->writer_check();

			if($writer_id->username != $this->session->userdata('username'))
	  			{	
	  				alert('본인이 아닙니다','http://localhost/todo/main/test');
	  				//redirect('http://localhost/todo/main/test');
	  				exit;
	  			}
		

		$return = $this->blog_m->delete_content($this->uri->segment(4));

			if($return)
			{
				alert('삭제되었습니다','http://localhost/todo/main/test');
				redirect('http://localhost/todo/main/test');
			}
			else
			{
			echo "삭제실패";
			}
		}
		else
		{
		exit;
		}
	}


		

	/**
	*url 키 값을 구분하여 값을 가져옴
	* @param Array $url :segment_explode 한 url값
	* @param String $key : 가져오려는 값의 key
	* @return String $url[$k] :리턴값
	*/
	function url_explode($url,$key){
		$cnt =count($url);
		for($i=0; $cnt >$i; $i++){
			if($url[$i] == $key)
			{
				$k =$i+1;  //q다음걸 반환
				return $url[$k];
			}
		}
	}
	
	
	/**
	*http의 url을 "/"를 Delimiter로 사용하여 배열로 바꿔 리턴한다
	*@param string -> string
	*@return string[]
	*/
	function segment_explode($seg)
	{
		//segmet remove '/' before after
		$len=strlen($seg);
		if(substr($seg,0,1) =='/')
			{
				$seq=substr($seg,1,$len); //remove first '/'
			}
		$len=strlen($seg);
		if(substr($seg,-1)=='/')
		{
			$seg=substr($seg,0,$len-1);

			
		}
		$seg_exp=explode("/",$seg);
		return $seg_exp;
	}

}
?>

