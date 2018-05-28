<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		if($this->session->userdata('userdetails'))
			{
			$admindetails=$this->session->userdata('userdetails');
			$data['details']=$this->Admin_model->get_adminbasic_details($admindetails['a_id']);
			$this->load->view('html/header',$data);
			}
		
		
		}
	public function index()
	{	
		if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
				$this->load->view('admin/dashboard');
				$this->load->view('html/footer');
			

		}else{
			$this->session->set_flashdata('loginerror','Please login to continue');
			redirect('admin');
		}
	}
	public function profile()
	{	
			if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
				//echo '<pre>';print_r($admindetails);
				if($admindetails['role']==2){
					$data['profile_detail']=$this->Admin_model->get_hospital_list_profile_details($admindetails['a_id']);
				}else if($admindetails['role']==3){
					$data['profile_detail']=$this->Admin_model->get_trcuk_profile_details($admindetails['a_id']);
				}else if($admindetails['role']==4){
					$data['profile_detail']=$this->Admin_model->get_plant_profile_details($admindetails['a_id']);
				}
				$this->load->view('html/profile',$data);
				$this->load->view('html/footer');
			

		}else{
			$this->session->set_flashdata('loginerror','Please login to continue');
			redirect('admin');
		}
	}
	public function changepassword()
	{	
			if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			
				$this->load->view('html/changepassword');
				$this->load->view('html/footer');
			

		}else{
			$this->session->set_flashdata('loginerror','Please login to continue');
			redirect('admin');
		}
	}
	public function changepassword_post(){
	 
		if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			$post=$this->input->post();
			
			$admin_details = $this->Admin_model->get_adminpassword_details($admindetails['a_id']);
			
			//echo "<pre>";print_r($admin_details);exit;
			if($admin_details['password']== md5($post['olpassword'])){
				if(md5($post['password'])==md5($post['confirmPassword'])){
						$updateuserdata=array(
						'password'=>md5($post['confirmPassword']),
						'org_password'=>$post['confirmPassword']
						);
						//echo '<pre>';print_r($updateuserdata);exit;
						$upddateuser = $this->Admin_model->update_admin_details($admindetails['a_id'],$updateuserdata);
						
						//echo $this->db->last_query();exit;
						if(count($upddateuser)>0){
							$this->session->set_flashdata('success',"password successfully updated");
							redirect('dashboard/changepassword');
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('dashboard/changepassword');
						}
					
				}else{
					$this->session->set_flashdata('error',"Password and Confirm password are not matched");
					redirect('dashboard/changepassword');
				}
				
			}else{
				$this->session->set_flashdata('error',"Old password are not matched");
				redirect('dashboard/changepassword');
			}
				
			
		}else{
			 $this->session->set_flashdata('error','Please login to continue');
			 redirect('');
		} 
	 
	}
		public function logout(){
		$admindetails=$this->session->userdata('userdetails');
		$userinfo = $this->session->userdata('userdetails');
        $this->session->unset_userdata($userinfo);
		$this->session->sess_destroy('userdetails');
		$this->session->unset_userdata('userdetails');
        redirect('admin');
	}
	
}
