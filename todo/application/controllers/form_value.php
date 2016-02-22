<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Form_value Extends CI_Controller{
function __construct()
	{
		parent::__construct();
		
		$this->load->model('blog_m');
		$this->load->helper('url');
		$this->load->helper('date');
	}
public function _remap($method){

		$this->load->view('header');
		if(method_exists($this, $method)){
			$this->{$method}();
		}
		$this->load->view('footer');

	}
	function forms()
		{

			if(@$this->session->userdata('logged_in') ==TRUE){
				alert('이미 로그인 중입니다 로그아웃 하고 등록 하십시오','http://localhost/todo/main/test');
			}else{
			$this->load->library('form_validation');

			$this->form_validation->set_rules('username','아이디','callback_username_check|required|min_length[5]|max_length[12]|alpha_dash');
			$this->form_validation->set_rules('password','비밀번호','required|matches[passconf]');
			$this->form_validation->set_rules('passconf','비밀번호 확인','required');
			$this->form_validation->set_rules('email','이메일','required|valid_email');

			if($this->form_validation->run()==FALSE){
				$this->load->view('test/forms_v');
			}else{
				//db입력 파트 
				$insert_data=array(
					'table'=>'users',
					'username'=>$this->input->post('username',TRUE),
					'password'=>$this->input->post('password',TRUE),
					'email'=>$this->input->post('email',TRUE),
					'reg_date'=>now()
					);
				$result=$this->blog_m->userreg($insert_data);
				if($result){
					alert('등록 성공','http://localhost/todo/main/test');
				}
				//$this->load->view('test/form_success_v');
			}
		}
		}
public function username_check($id){
			$this->load->database();

			if($id)
			{
			$result=array();
			$sql="SELECT id FROM users WhERE username= '".$id."'";
			$query=$this->db->query($sql);
			$result=$query->row();

			

			if($result)
			{
			$this->form_validation->set_message('username_check',$id.'은(는) 중복된 아이디 입니다');
			return FALSE;
			}
			else
			{
			return TRUE;
			}
		}
		else
		{
			return FALSE;
		}

	}	
}


?>
