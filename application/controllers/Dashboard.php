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
			$data['u_url']= current_url();
			$admindetails=$this->session->userdata('userdetails');
			$data['details']=$this->Admin_model->get_adminbasic_details($admindetails['a_id']);
			if($data['details']['role']==5){
				$this->load->model('Govt_model');
				$data['admin_list']=$this->Govt_model->get_all_admins_list(2,$data['details']['state']);
			}
			//echo '<pre>';print_r($data);exit;
			$this->load->view('html/header',$data);
			}
		
		
		}
	public function index()
	{	
		if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			
			if($admindetails['role']==4){
				$data['gen_waste_in_Kgs']=$this->Admin_model->get_gen_waste_in_Kg_details($admindetails['a_id']);
				$data['inf_pla_waste_in_Kgs']=$this->Admin_model->get_inf_pla_waste_in_Kg_details($admindetails['a_id']);
				$data['inf_waste_in_Kgs']=$this->Admin_model->get_inf_waste_in_Kg_details($admindetails['a_id']);
				$data['glassware_waste_in_kgs']=$this->Admin_model->get_glassware_waste_in_kg_details($admindetails['a_id']);
				$data['graph_gen_waste_in_Kg']=$this->Admin_model->get_graph_gen_waste_in_Kg_details($admindetails['a_id'],date('Y'));
				$data['graph_inf_pla_waste_in_Kg']=$this->Admin_model->get_graph_inf_pla_waste_in_Kg_details($admindetails['a_id'],date('Y'));
				$data['graph_inf_waste_in_Kg']=$this->Admin_model->get_graph_inf_waste_in_Kg_details($admindetails['a_id'],date('Y'));
				$data['graph_glassware_waste_in_kg']=$this->Admin_model->get_graph_glassware_waste_in_kg_details($admindetails['a_id'],date('Y'));
				
				//echo '<pre>';print_r($data);exit;
				$this->load->view('admin/plant_dashboard',$data);	
			}else if($admindetails['role']==3){
				$this->load->view('admin/dashboard');	
			}else if($admindetails['role']==2){
				//echo '<pre>';print_r($admindetails);exit;
				$hos_details=$this->Admin_model->get_hospital_details($admindetails['a_id']);
				$data['gen_waste_in_Kgs']=$this->Admin_model->get_hospital_gen_waste_in_Kg_details($hos_details['h_id']);
				$data['inf_pla_waste_in_Kgs']=$this->Admin_model->get_hospital_inf_pla_waste_in_Kg_details($hos_details['h_id']);
				$data['inf_waste_in_Kgs']=$this->Admin_model->get_hospital_inf_waste_in_Kg_details($hos_details['h_id']);
				$data['inf_waste_c_in_Kgs']=$this->Admin_model->get_hospital_inf_c_waste_in_Kg_details($hos_details['h_id']);
				$data['glassware_waste_in_kgs']=$this->Admin_model->get_hospital_glassware_waste_in_kg_details($hos_details['h_id']);
				
				$data['graph_gen_waste_in_Kg']=$this->Admin_model->get_hospital_graph_gen_waste_in_Kg_details($hos_details['h_id'],date('Y'));
				$data['graph_inf_pla_waste_in_Kg']=$this->Admin_model->get_hospital_graph_inf_pla_waste_in_Kg_details($hos_details['h_id'],date('Y'));
				$data['graph_inf_waste_in_Kg']=$this->Admin_model->get_hospital_graph_inf_waste_in_Kg_details($hos_details['h_id'],date('Y'));
				$data['graph_inf_c_waste_in_Kg']=$this->Admin_model->get_hospital_graph_inf_c_waste_in_Kg_details($hos_details['h_id'],date('Y'));
				$data['graph_glassware_waste_in_kg']=$this->Admin_model->get_hospital_graph_glassware_waste_in_kg_details($hos_details['h_id'],date('Y'));
				//echo '<pre>';print_r($data);exit;
				$this->load->view('admin/hospital_dashboard',$data);	
			}else if($admindetails['role']==5){
				$details=$this->Admin_model->get_adminbasic_details($admindetails['a_id']);
				//echo '<pre>';print_r($details);exit;
				$this->load->model('Govt_model');
				$data['total_hospital_list']=$this->Govt_model->get_all_admins_wise_hospitals(2,$details['state']);
				$states = array ('AP' => 'Andhra Pradesh', 'AR' => 'Arunachal Pradesh', 'AS' => 'Assam', 'BR' => 'Bihar', 'CG' => 'Chhattisgarh', 'GA' => 'Goa', 'GJ' => 'Gujarat', 'HR' => 'Haryana', 'HP' => 'Himachal Pradesh', 'JK' => 'Jammu & Kashmir', 'JH' => 'Jharkhand', 'KA' => 'Karnataka', 'KL' => 'Kerala', 'MP' => 'Madhya Pradesh', 'MH' => 'Maharashtra', 'MN' => 'Manipur', 'ML' => 'Meghalaya', 'MZ' => 'Mizoram', 'NL' => 'Nagaland', 'OD' => 'Odisha', 'PB' => 'Punjab', 'RJ' => 'Rajasthan', 'SK' => 'Sikkim', 'TN' => 'Tamil Nadu', 'TS' => 'Telangana', 'TR' => 'Tripura', 'UK' => 'Uttarakhand','UP' => 'Uttar Pradesh', 'WB' => 'West Bengal', 'AN' => 'Andaman & Nicobar', 'CH' => 'Chandigarh', 'DN' => 'Dadra and Nagar Haveli', 'DD' => 'Daman & Diu', 'DL' => 'Delhi', 'LD' => 'Lakshadweep', 'PY' => 'Puducherry');	
				$st='';foreach($states as $key=>$va){
					if($key==$details['state']){
						$st=$va;
					}
				}
				$data['total_hospital']=$this->Govt_model->get_total_hospital(date('Y'),$details['state']);
				$data['total_plants']=$this->Govt_model->get_total_plants(date('Y'),$st);
				$data['total_trucks']=$this->Govt_model->get_total_trucks(date('Y'),$st);
				$total_gen_waste=$this->Govt_model->get_gen_waste(date('Y'),$st);
				$data['total_waste']=$total_gen_waste['total'];
				$data['graph_total_hospital']=$this->Govt_model->get_graph_total_hospital_list(date('Y'),$details['state']);
				$data['graph_total_plants']=$this->Govt_model->get_graph_total_plants_list(date('Y'),$st);
				$data['graph_total_truck']=$this->Govt_model->get_graph_total_truck_list(date('Y'),$st);
				$data['graph_total_waste']=$this->Govt_model->get_graph_total_waste_list(date('Y'),$st);				
				
				//echo '<pre>';print_r($data['graph_total_hospital']);exit;
				$this->load->view('admin/govt/dashboard',$data);
			}else{
				$data['details']=$admindetails=$this->session->userdata('userdetails');
				$data['total_hospital']=$this->Admin_model->get_total_hospital($admindetails['a_id']);
				$data['total_plants']=$this->Admin_model->get_total_plants($admindetails['a_id']);
				$data['total_trucks']=$this->Admin_model->get_total_trucks($admindetails['a_id']);
				$total_gen_waste=$this->Admin_model->get_gen_waste($admindetails['a_id']);
				//echo '<pre>';print_r($total_gen_waste);exit;
				$data['total_waste']=$total_gen_waste['total'];
				$data['graph_total_hospital']=$this->Admin_model->get_graph_total_hospital_list($admindetails['a_id'],date('Y'));
				$data['graph_total_plants']=$this->Admin_model->get_graph_total_plants_list($admindetails['a_id'],date('Y'));
				$data['graph_total_truck']=$this->Admin_model->get_graph_total_truck_list($admindetails['a_id'],date('Y'));
				$data['graph_total_waste']=$this->Admin_model->get_graph_total_waste_list($admindetails['a_id'],date('Y'));
				//echo '<pre>';print_r($data);exit;
				$this->load->view('admin/admin_dashboard',$data);	
			}
				
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
				}else if($admindetails['role']==4|| $admindetails['role']==5){
					$data['profile_detail']=$this->Admin_model->get_plant_profile_details($admindetails['a_id']);
				}
				//echo '<pre>';print_r($data);exit;
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
							$this->session->set_flashdata('success',"Password successfully updated");
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
				$this->session->set_flashdata('error',"Old password didn't match");
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
