<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();	
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('email');
		$this->load->library('user_agent');
		$this->load->helper('directory');
		$this->load->helper('security');
		$this->load->library('zend');
		$this->load->model('Admin_model');
		$this->load->library('zend');
		
		
		}
	public function index()
	{	
		$this->load->view('html/index');
		$this->load->view('html/footer');
	}
	public function loginpost()
	{
		
			$post=$this->input->post();
			//echo '<pre>';print_r($post);exit;
			$login_deta=array('email'=>$post['email_id'],'password'=>md5($post['password']));
			$check_login=$this->Admin_model->login_details($login_deta);
			$this->load->helper('cookie');
			if(isset($post['remember_me']) && $post['remember_me']==1){
					$usernamecookie = array('name' => 'username', 'value' => $post["email_id"],'expire' => time()+86500 ,'path'   => '/');
					$passwordcookie = array('name' => 'password', 'value' => $post["password"],'expire' => time()+86500,'path'   => '/');
					$remembercookie = array('name' => 'remember', 'value' => $post["remember_me"],'expire' => time()+86500,'path'   => '/');
					$this->input->set_cookie($usernamecookie);
					$this->input->set_cookie($passwordcookie);
					$this->input->set_cookie($remembercookie);
					$this->load->helper('cookie');
					$this->input->cookie('username', TRUE);
					//echo print_r($usernamecookie);exit;

					}else{
						delete_cookie('username');
						delete_cookie('password');
						delete_cookie('remember');
					}
			if(count($check_login)>0){
				$login_details=$this->Admin_model->get_admin_details($check_login['a_id']);
				$this->session->set_userdata('userdetails',$login_details);
				redirect('dashboard');
			}else{
				$this->session->set_flashdata('loginerror',"Invalid Email Address or Password!");
				redirect('admin');
			}
		
	}
	
	
	
	
	
	
}
