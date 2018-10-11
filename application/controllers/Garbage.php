<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Garbage extends CI_Controller {

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
		$this->load->model('Garbage_model');
		$this->load->model('Admin_model');
		$this->load->library('zend');
		if($this->session->userdata('userdetails'))
			{
			$data['u_url']= current_url();
			$admindetails=$this->session->userdata('userdetails');
			$data['details']=$this->Admin_model->get_adminbasic_details($admindetails['a_id']);
			//echo '<pre>';print_r($data['details']);exit;
			$this->load->view('html/header',$data);
			}
		
		}
	public function add()
	{	
			if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			if($admindetails['role']==1){
				
				$this->load->view('admin/addtruck');
				$this->load->view('html/footer');
			}else{
				$this->session->set_flashdata('error',"you don't have permission to access");
				redirect('dashboard');
			}

		}else{
			$this->session->set_flashdata('loginerror','Please login to continue');
			redirect('admin');
		}
	}
	public function lists()
	{	
			if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			if($admindetails['role']==1){
				
				$data['tuck_list']=$this->Garbage_model->get_all_truck_list($admindetails['a_id']);
				//echo "<pre>";print_r($data);exit;
				$this->load->view('admin/trucklist',$data);
				$this->load->view('html/footer');
			}else{
				$this->session->set_flashdata('error',"you don't have permission to access");
				redirect('dashboard');
			}

		}else{
			$this->session->set_flashdata('loginerror','Please login to continue');
			redirect('admin');
		}
	}
	
	public function edit()
	{	
			if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			if($admindetails['role']==1){
				
				$t_id=base64_decode($this->uri->segment(3));
				$data['truck_detail']=$this->Garbage_model->get_truck_details($t_id);
				//echo "<pre>";print_r($data);exit;
				$this->load->view('admin/edit_truck', $data);
				$this->load->view('html/footer');
			}else{
				$this->session->set_flashdata('error',"you don't have permission to access");
				redirect('dashboard');
			}

		}else{
			$this->session->set_flashdata('loginerror','Please login to continue');
			redirect('admin');
		}
	}
	public function status()
	{	
			if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			if($admindetails['role']==1){
				
					$t_id=base64_decode($this->uri->segment(3));
					$status=base64_decode($this->uri->segment(4));
					if($status==1){
						$sta=0;
					}else{
						$sta=1;
					}
						$details=$this->Garbage_model->get_truck_details($t_id);
						$updatetruck=array(
							'status'=>$sta,
							);
							$update=$this->Garbage_model->update_truck_details($t_id,$updatetruck);
							if(count($update)>0){
								$admin_detail=array(
								'status'=>$sta,
								);
								$this->Garbage_model->update_admin_details($details['a_id'],$admin_detail);
									if($status==1){
									$this->session->set_flashdata('success','BMW Vehicle successfully deactivated');

									}else{
									$this->session->set_flashdata('success','BMW Vehicle successfully activated');

									}
								redirect('garbage/lists');
								}else{
								$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
								redirect('garbage/edit/'.base64_encode($t_id));
								}
			}else{
				$this->session->set_flashdata('error',"you don't have permission to access");
				redirect('dashboard');
			}

		}else{
			$this->session->set_flashdata('loginerror','Please login to continue');
			redirect('admin');
		}
	}
	public function delete()
	{	
			if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			if($admindetails['role']==1){
				
						$t_id=base64_decode($this->uri->segment(3));
						$details=$this->Garbage_model->get_truck_details($t_id);
						$updatetruck=array(
							'status'=>2,
							);
							$update=$this->Garbage_model->update_truck_details($t_id,$updatetruck);
							if(count($update)>0){
								$admin_detail=array(
								'status'=>2,
								);
								$this->Garbage_model->update_admin_details($details['a_id'],$admin_detail);
								$this->session->set_flashdata('success','BMW Vehicle successfully Deleted');
								redirect('garbage/lists');
								}else{
								$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
								redirect('garbage/lists');
								}
			}else{
				$this->session->set_flashdata('error',"you don't have permission to access");
				redirect('dashboard');
			}

		}else{
			$this->session->set_flashdata('loginerror','Please login to continue');
			redirect('admin');
		}
	}
	public function addpost()
	{	
			if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			if($admindetails['role']==1){
				$post=$this->input->post();
				//echo "<pre>";print_r($post);exit;
				$check_email=$this->Admin_model->email_check_details($post['email']);
				if(count($check_email)>0){
						$this->session->set_flashdata('error','Email id already exits. Please use another  email id');
						redirect('garbage/add');
				}else{
					$addtruck=array(
						'name'=>isset($post['owner_name'])?strtoupper($post['owner_name']):'',
						'email_id'=>isset($post['email'])?$post['email']:'',
						'password'=>isset($post['password'])?md5($post['password']):'',
						'org_password'=>isset($post['password'])?$post['password']:'',
						'status'=>1,
						'role'=>3
					);
					$ger_truck=$this->Admin_model->save_admin($addtruck);
					if(count($ger_truck)>0){
						$addgarbagetruckl=array(
							'a_id'=>$ger_truck,
							'truck_reg_no'=>isset($post['truck_reg_no'])?$post['truck_reg_no']:'',
							'owner_name'=>isset($post['owner_name'])?strtoupper($post['owner_name']):'',
							'insurence_number'=>isset($post['insurence_number'])?$post['insurence_number']:'',
							'owner_mobile'=>isset($post['owner_mobile'])?$post['owner_mobile']:'',
							'driver_name'=>isset($post['driver_name'])?strtoupper($post['driver_name']):'',
							'driver_lic_no'=>isset($post['driver_lic_no'])?$post['driver_lic_no']:'',
							'driver_lic_bad_no'=>isset($post['driver_lic_bad_no'])?$post['driver_lic_bad_no']:'',
							'driver_mobile'=>isset($post['driver_mobile'])?$post['driver_mobile']:'',
							'route_no'=>isset($post['route_no'])?$post['route_no']:'',
							'description'=>isset($post['description'])?$post['description']:'',
							'email'=>isset($post['email'])?$post['email']:'',
							'address1'=>isset($post['address1'])?$post['address1']:'',
							'address2'=>isset($post['address2'])?$post['address2']:'',
							'city'=>isset($post['city'])?ucfirst($post['city']):'',
							'state'=>isset($post['state'])?$post['state']:'',
							'country'=>isset($post['country'])?ucfirst($post['country']):'',
							'pincode'=>isset($post['pincode'])?$post['pincode']:'',
							'captcha'=>isset($post['captcha'])?$post['captcha']:'',
							'status'=>1,
							'create_at'=>date('Y-m-d H:i:s'),
							'create_by'=>$admindetails['a_id']
						);
						$truck_save=$this->Admin_model->save_truck($addgarbagetruckl);
						if(count($truck_save)>0){
							$this->session->set_flashdata('success','BMW Vehicle successfully Added');
							redirect('garbage/lists');
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('garbage/lists');
						}
						
					}else{
						$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
						redirect('garbage/add');
					}
					
				}
				
			}else{
				$this->session->set_flashdata('error',"you don't have permission to access");
				redirect('dashboard');
			}

		}else{
			$this->session->set_flashdata('loginerror','Please login to continue');
			redirect('admin');
		}
	}
	public function editpost()
	{	
			if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			if($admindetails['role']==1){
				$post=$this->input->post();
				//echo "<pre>";print_r($post);exit;
				$details=$this->Garbage_model->get_truck_details($post['t_id']);
				if($details['email']!=$post['email']){
					$check_email=$this->Admin_model->email_check_details($post['email']);
						if(count($check_email)>0){
								$this->session->set_flashdata('error','Email id already exits. Please use another  email id');
								redirect('garbage/edit/'.base64_encode($post['t_id']));
						}else{
							$updatehospital=array(
							'truck_reg_no'=>isset($post['truck_reg_no'])?$post['truck_reg_no']:'',
							'owner_name'=>isset($post['owner_name'])?$post['owner_name']:'',
							'insurence_number'=>isset($post['insurence_number'])?$post['insurence_number']:'',
							'owner_mobile'=>isset($post['owner_mobile'])?$post['owner_mobile']:'',
							'driver_name'=>isset($post['driver_name'])?strtoupper($post['driver_name']):'',
							'driver_lic_no'=>isset($post['driver_lic_no'])?$post['driver_lic_no']:'',
							'driver_lic_bad_no'=>isset($post['driver_lic_bad_no'])?$post['driver_lic_bad_no']:'',
							'driver_mobile'=>isset($post['driver_mobile'])?$post['driver_mobile']:'',
							'route_no'=>isset($post['route_no'])?$post['route_no']:'',
							'description'=>isset($post['description'])?$post['description']:'',
							'email'=>isset($post['email'])?$post['email']:'',
							'address1'=>isset($post['address1'])?$post['address1']:'',
							'address2'=>isset($post['address2'])?$post['address2']:'',
							'city'=>isset($post['city'])?ucfirst($post['city']):'',
							'state'=>isset($post['state'])?$post['state']:'',
							'country'=>isset($post['country'])?ucfirst($post['country']):'',
							'pincode'=>isset($post['pincode'])?$post['pincode']:'',
							'captcha'=>isset($post['captcha'])?$post['captcha']:'',
							);
							$update=$this->Garbage_model->update_truck_details($post['t_id'],$updatehospital);
							if(count($update)>0){
								$admin_detail=array(
								'name'=>isset($post['owner_name'])?$post['owner_name']:'',
								'email_id'=>isset($post['email'])?$post['email']:'',
								);
								$this->Garbage_model->update_admin_details($details['a_id'],$admin_detail);
								$this->session->set_flashdata('success','BMW Vehicle details successfully updated');
								redirect('garbage/lists');
								}else{
								$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
								redirect('garbage/edit/'.base64_encode($post['t_id']));
								}
						}
					
				}else{
					$updatehospital=array(
							'truck_reg_no'=>isset($post['truck_reg_no'])?$post['truck_reg_no']:'',
							'owner_name'=>isset($post['owner_name'])?$post['owner_name']:'',
							'insurence_number'=>isset($post['insurence_number'])?$post['insurence_number']:'',
							'owner_mobile'=>isset($post['owner_mobile'])?$post['owner_mobile']:'',
							'driver_name'=>isset($post['driver_name'])?strtoupper($post['driver_name']):'',
							'driver_lic_no'=>isset($post['driver_lic_no'])?$post['driver_lic_no']:'',
							'driver_lic_bad_no'=>isset($post['driver_lic_bad_no'])?$post['driver_lic_bad_no']:'',
							'driver_mobile'=>isset($post['driver_mobile'])?$post['driver_mobile']:'',
							'route_no'=>isset($post['route_no'])?$post['route_no']:'',
							'description'=>isset($post['description'])?$post['description']:'',
							'email'=>isset($post['email'])?$post['email']:'',
							'address1'=>isset($post['address1'])?$post['address1']:'',
							'address2'=>isset($post['address2'])?$post['address2']:'',
							'city'=>isset($post['city'])?ucfirst($post['city']):'',
							'state'=>isset($post['state'])?$post['state']:'',
							'country'=>isset($post['country'])?ucfirst($post['country']):'',
							'pincode'=>isset($post['pincode'])?$post['pincode']:'',
							'captcha'=>isset($post['captcha'])?$post['captcha']:'',
							);
							$update=$this->Garbage_model->update_truck_details($post['t_id'],$updatehospital);
							if(count($update)>0){
								$admin_detail=array(
								'name'=>isset($post['owner_name'])?$post['owner_name']:'',
								'email_id'=>isset($post['email'])?$post['email']:'',
								);
								$this->Garbage_model->update_admin_details($details['a_id'],$admin_detail);
								//echo $this->db->last_query();exit;
								$this->session->set_flashdata('success','BMW Vehicle details successfully updated');
								redirect('garbage/lists');
								}else{
								$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
								redirect('garbage/edit/'.base64_encode($post['t_id']));
								}
				}
				
				
			}else{
				$this->session->set_flashdata('error',"you don't have permission to access");
				redirect('dashboard');
			}

		}else{
			$this->session->set_flashdata('loginerror','Please login to continue');
			redirect('admin');
		}
	}
	
	
}
