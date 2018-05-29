<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plant extends CI_Controller {

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
		$this->load->model('Plant_model');
		$this->load->model('Admin_model');
		$this->load->library('zend');
		if($this->session->userdata('userdetails'))
			{
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
				
				$this->load->view('admin/disposal-plant');
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
				
				$data['plants_list']=$this->Plant_model->get_all_plants_list($admindetails['a_id']);
				//echo "<pre>";print_r($data);exit;
				$this->load->view('admin/disposal_plantlist',$data);
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
			if($admindetails['role']==1 || $admindetails['role']==4){
				
				$p_id=base64_decode($this->uri->segment(3));
				$data['plant_detail']=$this->Plant_model->get_plant_details($p_id);
				//echo "<pre>";print_r($data);exit;
				$this->load->view('admin/disposal-plant_edit', $data);
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
				
					$p_id=base64_decode($this->uri->segment(3));
					$status=base64_decode($this->uri->segment(4));
					if($status==1){
						$sta=0;
					}else{
						$sta=1;
					}
						$details=$this->Plant_model->get_plant_details($p_id);
						$updatetruck=array(
							'status'=>$sta,
							);
							$update=$this->Plant_model->update_plant_details($p_id,$updatetruck);
							if(count($update)>0){
								$admin_detail=array(
								'status'=>$sta,
								);
								$this->Plant_model->update_admin_details($details['a_id'],$admin_detail);
									if($status==1){
									$this->session->set_flashdata('success','Plant Successfully deactivate');

									}else{
									$this->session->set_flashdata('success','Plant Successfully Activate');

									}
								redirect('plant/lists');
								}else{
								$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
								redirect('plant/edit/'.base64_encode($p_id));
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
				
						$p_id=base64_decode($this->uri->segment(3));
						$details=$this->Plant_model->get_plant_details($p_id);
						$updatetruck=array(
							'status'=>2,
							);
							$update=$this->Plant_model->update_plant_details($p_id,$updatetruck);
							if(count($update)>0){
								$admin_detail=array(
								'status'=>2,
								);
								$this->Plant_model->update_admin_details($details['a_id'],$admin_detail);
								$this->session->set_flashdata('success','plant Successfully Deleted');
								redirect('plant/lists');
								}else{
								$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
								redirect('plant/lists');
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
						redirect('plant/add');
				}else{
					$addplant=array(
						'name'=>isset($post['disposal_plant_name'])?$post['disposal_plant_name']:'',
						'email_id'=>isset($post['email'])?$post['email']:'',
						'password'=>isset($post['password'])?md5($post['password']):'',
						'org_password'=>isset($post['password'])?$post['password']:'',
						'status'=>1,
						'role'=>4
					);
					$sav_plant=$this->Admin_model->save_admin($addplant);
					if(count($sav_plant)>0){
						$add_plant=array(
							'a_id'=>$sav_plant,
							'disposal_plant_name'=>isset($post['disposal_plant_name'])?$post['disposal_plant_name']:'',
							'disposal_plant_id'=>isset($post['disposal_plant_id'])?$post['disposal_plant_id']:'',
							'mobile'=>isset($post['mobile'])?$post['mobile']:'',
							'email'=>isset($post['email'])?$post['email']:'',
							'address'=>isset($post['address'])?$post['address']:'',
							'captcha'=>isset($post['captcha'])?$post['captcha']:'',
							'status'=>1,
							'create_at'=>date('Y-m-d H:i:s'),
							'create_by'=>$admindetails['a_id']
						);
						$plant_save=$this->Plant_model->save_plant($add_plant);
						if(count($plant_save)>0){
							$this->session->set_flashdata('success','Garbage Successfully added');
							redirect('plant/lists');
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('plant/lists');
						}
						
					}else{
						$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
						redirect('plant/add');
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
			if($admindetails['role']==1 || $admindetails['role']==4){
				$post=$this->input->post();
				//echo "<pre>";print_r($post);exit;
				$details=$this->Plant_model->get_plant_details($post['p_id']);
				if($details['email']!=$post['email']){
					$check_email=$this->Admin_model->email_check_details($post['email']);
						if(count($check_email)>0){
								$this->session->set_flashdata('error','Email id already exits. Please use another  email id');
								if($admindetails['role']==4){
									redirect('dashboard/profile');
								}else{
								redirect('plant/edit/'.base64_encode($post['p_id']));
								
								}
						}else{
							$updateplant=array(
							'disposal_plant_name'=>isset($post['disposal_plant_name'])?$post['disposal_plant_name']:'',
							'disposal_plant_id'=>isset($post['disposal_plant_id'])?$post['disposal_plant_id']:'',
							'mobile'=>isset($post['mobile'])?$post['mobile']:'',
							'email'=>isset($post['email'])?$post['email']:'',
							'address'=>isset($post['address'])?$post['address']:'',
							'captcha'=>isset($post['captcha'])?$post['captcha']:'',
							);
							$update=$this->Plant_model->update_plant_details($post['p_id'],$updateplant);
							if(count($update)>0){
								$admin_detail=array(
								'name'=>isset($post['disposal_plant_name'])?$post['disposal_plant_name']:'',
								'email_id'=>isset($post['email'])?$post['email']:'',
								);
								$this->Plant_model->update_admin_details($details['a_id'],$admin_detail);
								$this->session->set_flashdata('success','Plant details Successfully updated');
									if($admindetails['role']==4){
										redirect('dashboard/profile');
									}else{
									redirect('plant/lists');
									
									}
								
								}else{
								$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									if($admindetails['role']==4){
										redirect('dashboard/profile');
									}else{
										redirect('plant/edit/'.base64_encode($post['p_id']));
									}
								
								}
						}
					
				}else{
					$updateplant=array(
							'disposal_plant_name'=>isset($post['disposal_plant_name'])?$post['disposal_plant_name']:'',
							'disposal_plant_id'=>isset($post['disposal_plant_id'])?$post['disposal_plant_id']:'',
							'mobile'=>isset($post['mobile'])?$post['mobile']:'',
							'email'=>isset($post['email'])?$post['email']:'',
							'address'=>isset($post['address'])?$post['address']:'',
							'captcha'=>isset($post['captcha'])?$post['captcha']:'',
							);
							$update=$this->Plant_model->update_plant_details($post['p_id'],$updateplant);
							if(count($update)>0){
								$admin_detail=array(
								'name'=>isset($post['disposal_plant_name'])?$post['disposal_plant_name']:'',
								'email_id'=>isset($post['email'])?$post['email']:'',
								);
								$this->Plant_model->update_admin_details($details['a_id'],$admin_detail);
								//echo $this->db->last_query();exit;
								$this->session->set_flashdata('success','Plant details Successfully updated');
								
									if($admindetails['role']==4){
											redirect('dashboard/profile');
										}else{
											redirect('plant/lists');
										}
								}else{
								$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									if($admindetails['role']==4){
										redirect('dashboard/profile');
									}else{
										redirect('plant/edit/'.base64_encode($post['p_id']));
									}
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
	
	public function details(){
		if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			if($admindetails['role']==4){
				
				$p_id=base64_decode($this->uri->segment(3));
				$data['plant_detail']=$this->Plant_model->get_plant_details($p_id);
				//echo "<pre>";print_r($data);exit;
				$this->load->view('admin/grabage_plant', $data);
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
	public function disposal(){
		if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			if($admindetails['role']==4){
				
				$p_id=base64_decode($this->uri->segment(3));
				$data['plant_detail']=$this->Plant_model->get_plant_details($p_id);
				//echo "<pre>";print_r($data);exit;
				$this->load->view('admin/disposal_qty', $data);
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
	
	public  function get_truck_details(){
		if($this->session->userdata('userdetails'))
		{
				if($admindetails['role_id']=4){
					$post=$this->input->post();
					$admindetails=$this->session->userdata('userdetails');
					//echo '<pre>';print_r($post);exit;
			
					$details=$this->Plant_model->get_truck_details($post['truck_id']);
					//echo $this->db->last_query();exit;
					if(count($details) > 0)
					{
					$data['msg']=1;
					$data['t_id']=$details['t_id'];
					$data['name']=$details['driver_name'];
					$data['number']=$details['driver_mobile'];
					$data['desc']=$details['description'];
					$data['r_no']=$details['route_no'];
					echo json_encode($data);exit;	
					}else{
					$data['msg']=2;
					echo json_encode($data);exit;	
					}
				}else{
					$this->session->set_flashdata('error',"you don't have permission to access");
					redirect('dashboard');
				}
		}else{
			$this->session->set_flashdata('error','Please login to continue');
			redirect('admin');
		}
	}
	public function addwaste(){
			if($this->session->userdata('userdetails'))
			{
			$admindetails=$this->session->userdata('userdetails');
			if($admindetails['role']==4){
				$post=$this->input->post();
				//echo "<pre>";print_r($post);exit;
						if($post['truck_id']!=''){
						$add_plant=array(
							'truck_id'=>isset($post['truck_id'])?$post['truck_id']:'',
							'route_id'=>isset($post['route_id'])?$post['route_id']:'',
							'gen_waste_in_Kg'=>isset($post['gen_waste_in_Kg'])?$post['gen_waste_in_Kg']:'',
							'gen_waste_in_qty'=>isset($post['gen_waste_in_qty'])?$post['gen_waste_in_qty']:'',
							'inf_pla_waste_in_Kg'=>isset($post['inf_pla_waste_in_Kg'])?$post['inf_pla_waste_in_Kg']:'',
							'inf_pla_waste_in_qty'=>isset($post['inf_pla_waste_in_qty'])?$post['inf_pla_waste_in_qty']:'',
							'inf_waste_in_Kg'=>isset($post['inf_waste_in_Kg'])?$post['inf_waste_in_Kg']:'',
							'inf_waste_in_qty'=>isset($post['inf_waste_in_qty'])?$post['inf_waste_in_qty']:'',
							'glassware_waste_in_kg'=>isset($post['glassware_waste_in_kg'])?$post['glassware_waste_in_kg']:'',
							'glassware_waste_in_qty'=>isset($post['glassware_waste_in_qty'])?$post['glassware_waste_in_qty']:'',
							'status'=>1,
							'create_at'=>date('Y-m-d H:i:s'),
							'create_by'=>$admindetails['a_id']
						);
						$waste_save=$this->Plant_model->waste_plant($add_plant);
						if(count($waste_save)>0){
							$this->session->set_flashdata('success','Truck waste Successfully added');
							redirect('plant/details_list');
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('plant/details');
						}
						
						}else{
							$this->session->set_flashdata('error',"track id is empty. Please try again.");
							redirect('plant/details');
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
	public function adddisposal(){
			if($this->session->userdata('userdetails'))
			{
			$admindetails=$this->session->userdata('userdetails');
			if($admindetails['role']==4){
				$post=$this->input->post();
				//echo "<pre>";print_r($post);exit;
						$add_disposal=array(
							'disposal_total'=>isset($post['disposal_total'])?$post['disposal_total']:'',
							'disposal_qty'=>isset($post['disposal_qty'])?$post['disposal_qty']:'',
							'disposal_remaining'=>isset($post['disposal_remaining'])?$post['disposal_remaining']:'',
							'status'=>1,
							'create_at'=>date('Y-m-d H:i:s'),
							'create_by'=>$admindetails['a_id']
						);
						$disposal_save=$this->Plant_model->save_disposal($add_disposal);
						if(count($disposal_save)>0){
							$this->session->set_flashdata('success','Disposal total Successfully Updated');
							redirect('plant/disposal_list');
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('plant/disposal');
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
	
	public function disposal_list(){
			if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			if($admindetails['role']==4){
				
				$data['disposal_list']=$this->Plant_model->get_disposal_list($admindetails['a_id']);
				//echo "<pre>";print_r($data);exit;
				$this->load->view('admin/disposal_list', $data);
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
	public function details_list(){
			if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			if($admindetails['role']==4){
				
				$data['waste_list']=$this->Plant_model->get_waste_details_list($admindetails['a_id']);
				//echo "<pre>";print_r($data);exit;
				$this->load->view('admin/waste_list', $data);
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
	
	
	
}
