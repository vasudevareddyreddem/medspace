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
				$this->session->set_flashdata('error',"Invalid Email Address or Password!");
				redirect('admin');
			}
		
	}
	public function save_profile_pic(){
		
		if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			$post=$this->input->post();
			//echo '<pre>';print_r($_FILES);exit;
					$pic=$_FILES['profile_pic']['name'];
					$picname = str_replace(" ", "", $pic);
					$imagename=microtime().basename($picname);
					$imgname = str_replace(" ", "", $imagename);
					move_uploaded_file($_FILES['profile_pic']['tmp_name'], "assets/files/" . $imgname);
					$img=array(
					'profile_pic'=>$imgname,
					);
					
					$old_pic=$this->Admin_model->get_profile_details($admindetails['a_id']);
					if($old_pic['profile_pic']!=''){
						unlink("assets/files/".$old_pic['profile_pic']);
					}
					//echo '<pre>';print_r($old_pic);exit;
					$updates=$this->Admin_model->update_admin_details($admindetails['a_id'],$img);
					if(count($updates)>0){
						$this->session->set_flashdata('success',"Profile Pic successfully updated");
						redirect('dashboard/profile');
					}else{
						$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
						redirect('dashboard/profile');
					}

		}else{
			$this->session->set_flashdata('loginerror','Please login to continue');
			redirect('admin');
		}
	}
	
	public function forgotpassword(){
		$this->load->view('html/forgotpassword');
		$this->load->view('html/footer');
		
	}
	public function forgotpost(){
		$post=$this->input->post();
		$check_login=$this->Admin_model->get_email_details_check($post['email_id']);
		//echo $this->db->last_query();exit;
		if(count($check_login)>0){
			//echo '<pre>';print_r($check_login);exit;	
					
				$this->load->library('email');
				$this->email->set_newline("\r\n");
				$this->email->set_mailtype("html");
				$this->email->to($check_login['email_id']);
				$this->email->from('customerservice@medspace.com', 'Medcbwtf'); 
				$this->email->subject('Forgot Password'); 
				$body = "<b> Your Account login Password is </b> : ".$check_login['org_password'];
				$this->email->message($body);
				if ($this->email->send())
				{
					$this->session->set_flashdata('success',"Password sent to your registered email address. Please Check your registered email address");
					redirect('admin');
				}else{
					$this->session->set_flashdata('error'," In Localhost mail  didn't sent");
					redirect('admin');
				}
			}else{
				$this->session->set_flashdata('error',"Invalid email id. Please try again once");
				redirect('admin');
			}
		
		//echo "<pre>";print_r($post);exit;
		
	}
	
	public function get_hospital_daliy_report(){
		
		$hos_list=$this->Admin_model->ge_hospital_list();
		$admindetails=$this->session->userdata('userdetails');
		if(count($hos_list)>0){
			
			foreach($hos_list as $List){
				$save_data=array(
					'hospital_id'=>isset($List['h_id'])?$List['h_id']:'',
					'hospital_name'=>isset($List['hospital_name'])?$List['hospital_name']:'',
					'type'=>isset($List['type'])?$List['type']:'',
					'address'=>$List['address1'].' '.$List['address2'].', '.$List['city'].', '.$List['state'].', '.$List['country'].', '.$List['pincode'],
					'yellow_no_of_Bags'=>$List['waste']['total_infected_waste_kgs'],
					'yellow_qty'=>$List['waste']['total_infected_waste_qty'],
					'red_no_of_Bags'=>$List['waste']['total_infected_plastics_kgs'],
					'red_qty'=>$List['waste']['total_infected_plastics_qty'],
					'white_no_of_Bags'=>$List['waste']['total_genaral_waste_kgs'],
					'white_qty'=>$List['waste']['total_genaral_waste_qty'],
					'blue_no_of_Bags'=>$List['waste']['total_glassware_watse_kgs'],
					'blue_qty'=>$List['waste']['total_glassware_watse_qty'],
					'datetime'=>date('Y-m-d H:i:s'),
					'create_by'=>$admindetails['a_id'],
				);
				$today_report_id=$this->Admin_model->get_report_ids(date('Y-m-d'));
				if(count($today_report_id)>0){
					foreach($today_report_id as $lis){
					$h_ids[]=$lis['hospital_id'];
					}
				}else{
					$h_ids[]=array();
				}
				if (in_array($List['h_id'], $h_ids))
				  {
				  $this->Admin_model->delete_previous_report($lis['hospital_id']);
				  }
				//echo '<pre>';print_r($h_ids);exit;
				$save_update_report=$this->Admin_model->save_hospital_daily_report($save_data);
					//echo '<pre>';print_r($save_data);
			}
			if(count($save_update_report)>0){
				$this->session->set_flashdata('success',"Today reports successfully generated");
				redirect('dashboard');
			}else{
				$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
				redirect('dashboard');
			}
		
		}else{
			$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
				redirect('dashboard');
		}
		//echo '<pre>';print_r($hos_list);exit;
		
		
		
	}
	public function get_cbwtf_daliy_report(){
		
		$plant_list=$this->Admin_model->ge_cbwtf_list();
		//echo '<pre>';print_r($plant_list);exit;
		$admindetails=$this->session->userdata('userdetails');
		if(count($plant_list)>0){
			
			foreach($plant_list as $List){
				$save_data=array(
					'plant_id'=>isset($List['p_id'])?$List['p_id']:'',
					'plant_name'=>isset($List['disposal_plant_name'])?$List['disposal_plant_name']:'',
					'address'=>$List['address1'].' '.$List['address2'].', '.$List['city'].', '.$List['state'].', '.$List['country'].', '.$List['pincode'],
					'yellow_no_of_Bags'=>$List['waste']['total_infected_waste_kgs'],
					'yellow_qty'=>$List['waste']['total_infected_waste_qty'],
					'red_no_of_Bags'=>$List['waste']['total_infected_plastics_kgs'],
					'red_qty'=>$List['waste']['total_infected_plastics_qty'],
					'white_no_of_Bags'=>$List['waste']['total_genaral_waste_kgs'],
					'white_qty'=>$List['waste']['total_genaral_waste_qty'],
					'blue_no_of_Bags'=>$List['waste']['total_glassware_watse_kgs'],
					'blue_qty'=>$List['waste']['total_glassware_watse_qty'],
					'datetime'=>date('Y-m-d H:i:s'),
					'create_by'=>$admindetails['a_id'],
				);
				$today_report_id=$this->Admin_model->get_cbwtf_report_ids(date('Y-m-d'));
				if(count($today_report_id)>0){
					foreach($today_report_id as $lis){
					$p_ids[]=$lis['plant_id'];
					}
				}else{
					$p_ids[]=array();
				}
				if (in_array($List['p_id'], $p_ids))
				  {
				  $this->Admin_model->delete_cbwtf_previous_report($List['p_id']);
				  }
				//echo '<pre>';print_r($h_ids);exit;
				$save_update_report=$this->Admin_model->save_cbwtf_daily_report($save_data);
					//echo '<pre>';print_r($save_data);//exit;
			}
			if(count($save_update_report)>0){
				$this->session->set_flashdata('success',"Today cbwtf reports successfully generated");
				redirect('dashboard');
			}else{
				$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
				redirect('dashboard');
			}
		
		}else{
			$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
				redirect('dashboard');
		}
		//echo '<pre>';print_r($hos_list);exit;
		
		
		
	}
	
	
	
	
	
	
	
}
