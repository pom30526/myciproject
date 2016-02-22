<?php if(! defined('BASEPATH')) exit('No direct script access allowed');
class Auth extends CI_Controller
{
	function __construct()
	{
	 parent::__construct();	 
	 $this->load->model('auth_m');
	 $this->load->helper('form');
	 $this->load->helper('url');
	}
	public function index(){
		$this->login();
	}
	public function _remap($method){
		$this->load->view('header_auth');
		if(method_exists($this,$method))
		{
			$this->{"{$method}"}();

		}
		$this->load->view('footer');
	}
	public function login()
	{
		$this->load->library('form_validation');
		$this->output->enable_profiler();
		$this->form_validation->set_rules('username','id','required|alpha_numeric');
		$this->form_validation->set_rules('password','pass','required');

		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';

		if($this->form_validation->run() == TRUE)
		{
			$auth_data=array(
				'username'=>$this->input->post('username',TRUE),
				'password'=>$this->input->post('password',TRUE)
				);

			$result=$this->auth_m->login($auth_data);

			if($result)
			{
				$newdata =array(
					'username' =>$result->username,
					'email' =>$result->email,
					'logged_in'=>TRUE
					);

				$this->session->set_userdata($newdata);
				alert('login 성공','http://localhost/todo/main/test');
				//redirect('http://localhost/todo/main/test');
				exit;
			}
			else
			 {
			 	alert('login 실패','http://localhost/todo/main/test');
				//redirect('/todo/main/test');
				exit;
			}

		}
		else
		{
			$this->load->view('login_v');
		}

	}
		public function logout()
		{
			$this->session->sess_destroy();
			alert('logout 되었습니다','http://localhost/todo/main/test');
			//redirect('http://localhost/todo/main/test');
		}
}

?>