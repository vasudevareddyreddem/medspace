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
		$this->load->model('customers_model','customers');

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
	public function get_location()
	{	
		$post=$this->input->post();
		//$this->session->set_userdata('lat_add',trim($post['latitude']));
			//$this->session->set_userdata('long_add',trim($post['longitude']));
			$url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($post['latitude']).','.trim($_POST['longitude']).'&sensor=false&key=AIzaSyBq5zLq5oo5t21QPK8kKoU-TzuYN9vuvFo';
			$json = @file_get_contents($url);
			$result = json_decode($json, TRUE);
			//echo '<pre>';print_r($result);exit;
			$address = isset($result['results'][0]['formatted_address'])?$result['results'][0]['formatted_address']:'';
			if(isset($address)&& $address!=''){
					$data['msg']=1;
					$data['add']=$address;
					echo json_encode($data);exit;
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
									$this->session->set_flashdata('success','CBWTF successfully deactivated');

									}else{
									$this->session->set_flashdata('success','CBWTF successfully activated');

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
								$this->session->set_flashdata('success','CBWTF successfully Deleted');
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
					if(isset($_FILES['image']['name']) && $_FILES['image']['name']!=''){
							$temp = explode(".", $_FILES["image"]["name"]);
							$pimage = round(microtime(true)) . '.' . end($temp);
							move_uploaded_file($_FILES['image']['tmp_name'], "assets/plant_logo/" . $pimage);
						}
					$addplant=array(
						'name'=>isset($post['disposal_plant_name'])?strtoupper($post['disposal_plant_name']):'',
						'email_id'=>isset($post['email'])?$post['email']:'',
						'password'=>isset($post['password'])?md5($post['password']):'',
						'org_password'=>isset($post['password'])?$post['password']:'',
						'mobile'=>isset($post['mobile'])?$post['mobile']:'',
						'status'=>1,
						'role'=>4
					);
					$sav_plant=$this->Admin_model->save_admin($addplant);
					if(count($sav_plant)>0){
						/*qr code*/
								$qr_d=$this->Admin_model->get_qr_c_data($sav_plant);
								if($qr_d['qr_code']==''){
									$this->load->library('ciqrcode');
									$params['data'] =$qr_d['a_id'];
									$params['level'] = 'H';
									$params['size'] = 5;
									$params['cachedir'] = FCPATH.'assets/login_qrcode_img/';
									$qrcode_img=time().'.png';
									$path='assets/login_qrcode_img/'.$qrcode_img;
									$params['savename'] =FCPATH.$path;
									$this->ciqrcode->generate($params);
									$u_q_d=array('qr_code'=>$qrcode_img,'qr_code_text'=>$qr_d['a_id']);
									$this->Admin_model->update_admin_details($qr_d['a_id'],$u_q_d);
								}
								/*qr code*/
						$add_plant=array(
							'a_id'=>$sav_plant,
							'disposal_plant_name'=>isset($post['disposal_plant_name'])?strtoupper($post['disposal_plant_name']):'',
							'disposal_plant_id'=>isset($sav_plant)?$sav_plant:'',
							'mobile'=>isset($post['mobile'])?$post['mobile']:'',
							'email'=>isset($post['email'])?$post['email']:'',
							'address1'=>isset($post['address1'])?$post['address1']:'',
							'address2'=>isset($post['address2'])?$post['address2']:'',
							'city'=>isset($post['city'])?ucfirst($post['city']):'',
							'state'=>isset($post['state'])?$post['state']:'',
							'country'=>isset($post['country'])?ucfirst($post['country']):'',
							'pincode'=>isset($post['pincode'])?$post['pincode']:'',
							'captcha'=>isset($post['captcha'])?$post['captcha']:'',
							'logo'=>isset($pimage)?$pimage:'',
							'status'=>1,
							'create_at'=>date('Y-m-d H:i:s'),
							'create_by'=>$admindetails['a_id']
						);
						$plant_save=$this->Plant_model->save_plant($add_plant);
						if(count($plant_save)>0){
							$this->session->set_flashdata('success','CBWTF successfully added');
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
							if(isset($_FILES['image']['name']) && $_FILES['image']['name']!=''){
							unlink('assets/plant_logo/'.$details['logo']);
								$temp = explode(".", $_FILES["image"]["name"]);
								$pimage = round(microtime(true)) . '.' . end($temp);
								move_uploaded_file($_FILES['image']['tmp_name'], "assets/plant_logo/" . $pimage);
							}else{
								$pimage=$details['logo'];
							}
							$updateplant=array(
							'disposal_plant_name'=>isset($post['disposal_plant_name'])?strtoupper($post['disposal_plant_name']):'',
							'mobile'=>isset($post['mobile'])?$post['mobile']:'',
							'email'=>isset($post['email'])?$post['email']:'',
							'address1'=>isset($post['address1'])?$post['address1']:'',
							'address2'=>isset($post['address2'])?$post['address2']:'',
							'city'=>isset($post['city'])?ucfirst($post['city']):'',
							'state'=>isset($post['state'])?$post['state']:'',
							'country'=>isset($post['country'])?ucfirst($post['country']):'',
							'pincode'=>isset($post['pincode'])?$post['pincode']:'',
							'captcha'=>isset($post['captcha'])?$post['captcha']:'',
							'logo'=>isset($pimage)?$pimage:'',
							'plantaddress'=>isset($post['plantaddress'])?$post['plantaddress']:'',
							'lat'=>isset($post['lat'])?$post['lat']:'',
							'lng'=>isset($post['lng'])?$post['lng']:'',
							);
							$update=$this->Plant_model->update_plant_details($post['p_id'],$updateplant);
							if(count($update)>0){
								/*qr code*/
								$qr_d=$this->Admin_model->get_qr_c_data($details['a_id']);
								if($qr_d['qr_code']==''){
									$this->load->library('ciqrcode');
									$params['data'] =$qr_d['a_id'];
									$params['level'] = 'H';
									$params['size'] = 5;
									$params['cachedir'] = FCPATH.'assets/login_qrcode_img/';
									$qrcode_img=time().'.png';
									$path='assets/login_qrcode_img/'.$qrcode_img;
									$params['savename'] =FCPATH.$path;
									$this->ciqrcode->generate($params);
									$u_q_d=array('qr_code'=>$qrcode_img,'qr_code_text'=>$qr_d['a_id']);
									$this->Admin_model->update_admin_details($qr_d['a_id'],$u_q_d);
								}
								/*qr code*/
								$admin_detail=array(
								'name'=>isset($post['disposal_plant_name'])?strtoupper($post['disposal_plant_name']):'',
								'email_id'=>isset($post['email'])?$post['email']:'',
								'mobile'=>isset($post['mobile'])?$post['mobile']:'',
								);
								$this->Plant_model->update_admin_details($details['a_id'],$admin_detail);
								$this->session->set_flashdata('success','CBWTF details successfully updated');
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
					if(isset($_FILES['image']['name']) && $_FILES['image']['name']!=''){
							unlink('assets/plant_logo/'.$details['logo']);
								$temp = explode(".", $_FILES["image"]["name"]);
								$pimage = round(microtime(true)) . '.' . end($temp);
								move_uploaded_file($_FILES['image']['tmp_name'], "assets/plant_logo/" . $pimage);
							}else{
								$pimage=$details['logo'];
							}
					$updateplant=array(
							'disposal_plant_name'=>isset($post['disposal_plant_name'])?strtoupper($post['disposal_plant_name']):'',
							'mobile'=>isset($post['mobile'])?$post['mobile']:'',
							'email'=>isset($post['email'])?$post['email']:'',
							'address1'=>isset($post['address1'])?$post['address1']:'',
							'address2'=>isset($post['address2'])?$post['address2']:'',
							'city'=>isset($post['city'])?ucfirst($post['city']):'',
							'state'=>isset($post['state'])?$post['state']:'',
							'country'=>isset($post['country'])?ucfirst($post['country']):'',
							'pincode'=>isset($post['pincode'])?$post['pincode']:'',
							'captcha'=>isset($post['captcha'])?$post['captcha']:'',
							'logo'=>isset($pimage)?$pimage:'',
							'plantaddress'=>isset($post['plantaddress'])?$post['plantaddress']:'',
							'lat'=>isset($post['lat'])?$post['lat']:'',
							'lng'=>isset($post['lng'])?$post['lng']:'',
							);
							$update=$this->Plant_model->update_plant_details($post['p_id'],$updateplant);
							if(count($update)>0){
								/*qr code*/
								$qr_d=$this->Admin_model->get_qr_c_data($details['a_id']);
								if($qr_d['qr_code']==''){
									$this->load->library('ciqrcode');
									$params['data'] =$qr_d['a_id'];
									$params['level'] = 'H';
									$params['size'] = 5;
									$params['cachedir'] = FCPATH.'assets/login_qrcode_img/';
									$qrcode_img=time().'.png';
									$path='assets/login_qrcode_img/'.$qrcode_img;
									$params['savename'] =FCPATH.$path;
									$this->ciqrcode->generate($params);
									$u_q_d=array('qr_code'=>$qrcode_img,'qr_code_text'=>$qr_d['a_id']);
									$this->Admin_model->update_admin_details($qr_d['a_id'],$u_q_d);
								}
								/*qr code*/
								$admin_detail=array(
								'name'=>isset($post['disposal_plant_name'])?strtoupper($post['disposal_plant_name']):'',
								'email_id'=>isset($post['email'])?$post['email']:'',
								'mobile'=>isset($post['mobile'])?$post['mobile']:'',
								);
								$this->Plant_model->update_admin_details($details['a_id'],$admin_detail);
								//echo $this->db->last_query();exit;
								$this->session->set_flashdata('success','CBWTF details successfully updated');
								
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
					$get_created_by=$this->Plant_model->get_created_by_id($admindetails['a_id']);
			
					$details=$this->Plant_model->get_truck_details($post['truck_id'],$get_created_by['create_by']);
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
							'total_waste'=>($post['gen_waste_in_Kg']*$post['gen_waste_in_qty'])+($post['inf_pla_waste_in_Kg']*$post['inf_pla_waste_in_qty'])+($post['inf_waste_in_Kg']*$post['inf_waste_in_qty'])+($post['glassware_waste_in_kg']*$post['glassware_waste_in_qty']),
							'create_at'=>date('Y-m-d H:i:s'),
							'create_by'=>$admindetails['a_id']
						);
						$waste_save=$this->Plant_model->waste_plant($add_plant);
						if(count($waste_save)>0){
							$this->session->set_flashdata('success','BMW vehicle waste successfully added');
							redirect('plant/details_list');
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('plant/details');
						}
						
						}else{
							$this->session->set_flashdata('error',"BMW vehicle id is empty. Please try again.");
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
							$this->session->set_flashdata('success','Disposal Waste successfully Added');
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
				$post=$this->input->post();
				//echo "<pre>";print_r($data);exit;
				if(isset($post['from_date']) && $post['from_date']!='' || isset($post['to_date']) && $post['to_date']!=''){
					$data['from_date']=$post['from_date'];
					$data['to_date']=$post['to_date'];
				}else{
					$data['from_date']='';
					$data['to_date']='';
				}
				//echo "<pre>";print_r($data);exit;
				$data['a_id']=$admindetails['a_id'];
				$this->load->view('admin/waste_list', $data);
				$this->load->view('html/footer');
			

		}else{
			$this->session->set_flashdata('loginerror','Please login to continue');
			redirect('admin');
		}
	}
	public function plant_ajax_list()
	{
		if($this->session->userdata('userdetails'))
		{
		$a_de=$this->session->userdata('userdetails');
		$post=$this->input->post();
		//echo '<pre>';print_r($post);exit;
		$list = $this->customers->get_plant_datatables($post['aid'],$post['fdate'],$post['tdate']);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $customers) {
			//$add= substr($customers['current_address'], 0, 15);
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $customers->hospital_name;
			$states = array ('BH' => 'Bedded Hospital', 'CL' => 'Clinic', 'DI' => 'Dispensary', 'HO' => 'Homeopathy', 'MH' => 'Mobile Hospital', 'SI' => 'Siddha', 'UN' => 'Unani', 'VH' => 'Veterinary Hospital', 'YO' => 'Yoga', 'AH' => 'Animal House', 'BB' => 'Blood Bank', 'DH' => 'Dental Hospital ', 'NH' => 'Nursing Home', 'PL' => 'Pathological Laboratory', 'FA' => 'Institutions/Schools/Companies etc. with First Aid facilities', 'HC' => 'Health Camp');
			 foreach($states as $key=>$state){
				if($customers->type==$key){
					 $h_type=$state;
				}
			 }
			$row[] = isset($h_type)?$h_type:'';
			$row[] = '<span title="'.$customers->current_address.'" data-toggle="tooltip">'.substr($customers->current_address, 0, 15).'</span>';
			$row[] = date("Y-m-d", strtotime($customers->create_at));
			$row[] = date("g:i a", strtotime($customers->create_at));
			$row[] = number_format((float)$customers->infected_waste_qt, 2, '.', '');
			$row[] = number_format((float)$customers->infected_waste_kg, 2, '.', '');
			
			$row[] = number_format((float)$customers->infected_plastics_qt, 2, '.', '');
			$row[] = number_format((float)$customers->infected_plastics_kg, 2, '.', '');
			
			$row[] = number_format((float)$customers->genaral_waste_qt, 2, '.', '');
			$row[] = number_format((float)$customers->genaral_waste_kg, 2, '.', '');
			
			$row[] = number_format((float)$customers->glassware_watse_qt, 2, '.', '');
			$row[] = number_format((float)$customers->glassware_watse_kg, 2, '.', '');
			
			$row[] = number_format((float)$customers->infected_c_waste_qt, 2, '.', '');
			$row[] = number_format((float)$customers->infected_c_waste_kg, 2, '.', '');
			if($customers->updated_time!=''){	
				$row[] = date("Y-m-d", strtotime($customers->updated_time));
				$row[] = date("g:i a", strtotime($customers->updated_time));
			}else{
				$row[] ='';
				$row[] ='';
			}
			if($customers->bio_current_address!=''){
				$row[] = '<span title="'.$customers->bio_current_address.'" data-toggle="tooltip">'.substr($customers->bio_current_address, 0, 15).'</span>';
			}else{
				$row[] = '';
			}
			
			$row[] = number_format((float)$customers->bio_infected_waste_qt, 2, '.', '');
			$row[] = number_format((float)$customers->bio_infected_waste_kg, 2, '.', '');
			
				$row[] = number_format((float)$customers->bio_infected_plastics_qt, 2, '.', '');
			$row[] = number_format((float)$customers->bio_infected_plastics_kg, 2, '.', '');

			$row[] = number_format((float)$customers->bio_genaral_waste_qt, 2, '.', '');
			$row[] = number_format((float)$customers->bio_genaral_waste_kg, 2, '.', '');
			
		
			$row[] = number_format((float)$customers->bio_glassware_watse_qt, 2, '.', '');
			$row[] = number_format((float)$customers->bio_glassware_watse_kg, 2, '.', '');
			
						$row[] = number_format((float)$customers->bio_infected_c_waste_qt, 2, '.', '');
			$row[] = number_format((float)$customers->bio_infected_c_waste_kg, 2, '.', '');
				$minutes = $customers->dif_hrs;
				$dd=explode(':',$minutes);
				$overaall=(($dd[0]*60)+$dd[1]);
				$d = floor ($overaall / 1440);
				$h = floor (($overaall - $d * 1440) / 60);
				$m = $overaall - ($d * 1440) - ($h * 60);
				 if($customers->dif_day>1 || $d>=1){ 											
						if($customers->dif_day<2){ 
								$dif_imes= '<span style="color:red;">'.$d.' d - '. $h.' hrs - '.$m.' min'.'</span>';
								 }else{ 
								$dif_imes= $customers->dif_day.' days';
								}												
					}else{ 
						if($d=1){
								$h=$d*24;
							}else{
								$h=$h;
							}														
						$dif_imes= '<span style="color:green;">'.$h.' hrs - '.$m.' min'.'</span>';
					}
			
			
			$row[] = isset($dif_imes)?$dif_imes:'';
			if($customers->total!=''){
				$b_t=$customers->total;
			}else{
				$b_t=0;
			}if($customers->bio_total!=''){
				$a_t=$customers->bio_total;
			}else{
				$a_t=0;
			}
			$all_t=(($b_t)-($a_t));
			$row[] = $b_t.' - '.$a_t.' = '.$all_t;
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->customers->plant_count_all($post['aid'],$post['fdate'],$post['tdate']),
						"recordsFiltered" => $this->customers->plant_count_filtered($post['aid'],$post['fdate'],$post['tdate']),
						"data" => $data,
				);
				
		//output to json format
		echo json_encode($output);exit;
	
	}else{
			$this->session->set_flashdata('loginerror','Please login to continue');
			redirect('admin');
		}
	
	}
	public function waste_pdf()
	{	
		if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
				$post=$this->input->post();
					//echo '<pre>';print_r($post);exit;
					if(isset($post['f_date']) && $post['f_date']!='' || isset($post['t_date']) && $post['t_date']!=''){
						$data['waste_list']=$this->Plant_model->get_hospital_only_waste_with_dates($admindetails['a_id'],$post['f_date'],$post['t_date']);
					}else{
						$data['waste_list']=$this->Plant_model->get_hospital_only_waste_list($admindetails['a_id']);
					}
					//echo '<pre>';print_r($data);exit;
					$path = rtrim(FCPATH,"/");
					$file_name =time().'.pdf';
					$pdfFilePath = $path."/assets/waste-pdf/".$file_name;
					ini_set('memory_limit','320M'); // boost the memory limit if it's low <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
					$html =$this->load->view('bio_medical/waste-pdf',$data, true); // render the view into HTML
					//echo '<pre>';print_r($html);exit;
					$this->load->library('pdf');
					$pdf = $this->pdf->load();
					$pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date('M-d-Y')); // Add a footer for good measure <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
					$pdf->SetDisplayMode('fullpage');
					$pdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list
					$pdf->AddPage('L');
					$pdf->WriteHTML($html); // write the HTML into the PDF
					$pdf->Output($pdfFilePath, 'F');
					redirect("/assets/waste-pdf/".$file_name);
			

		}else{
			$this->session->set_flashdata('loginerror','Please login to continue');
			redirect('admin');
		}
	}
	public function bio_medical_waste_list()
	{	
			if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			if($admindetails['role']==4){
				
				$data['bio_medical_list']=$this->Plant_model->get_bio_medical_waste_list($admindetails['a_id']);
				
				//echo $this->db->last_query();
				//echo "<pre>";print_r($data);exit;
				$this->load->view('bio_medical/add_bio_medical_list',$data);
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
	public function print_biomedical_waste(){
		if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			if($admindetails['role']==4){
				
				$id=base64_decode($this->uri->segment(3));
				//echo $id;
				$data['details']=$this->Plant_model->get_bio_medical_waste_print_details($id);
					//echo '<pre>';print_r($data);exit;
					//echo '<pre>';print_r($data);exit;
					$path = rtrim(FCPATH,"/");
					$file_name = $data['details']['hospital_name'].'_'.$data['details']['id'].'.pdf';                
					$data['page_title'] = $data['details']['hospital_name'].'invoice'; // pass data to the view
					$pdfFilePath = $path."/assets/bio_invoices/".$file_name;
					ini_set('memory_limit','320M'); // boost the memory limit if it's low <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
					$html = $this->load->view('admin/bio_pdf', $data, true); // render the view into HTML
					//echo '<pre>';print_r($html);exit;
					$this->load->library('pdf');
					$pdf = $this->pdf->load();
					$pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date('M-d-Y')); // Add a footer for good measure <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
					$pdf->SetDisplayMode('fullpage');
					$pdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list
					$pdf->WriteHTML($html); // write the HTML into the PDF
					$pdf->Output($pdfFilePath, 'F');
					$update_data=array(
					'invoice_file'=>$file_name,
					'invoice_name'=>$data['details']['hospital_name'].' invoice',
					);
					$this->Plant_model->update_bio_medical_invoice_name($id,$update_data);
					//echo $this->db->last_query();exit;
					redirect("/assets/bio_invoices/".$file_name);
				
			}else{
				$this->session->set_flashdata('error',"you don't have permission to access");
				redirect('dashboard');
			}

		}else{
			$this->session->set_flashdata('loginerror','Please login to continue');
			redirect('admin');
		}
	}	
    
    
    public function print_stickers()
	{	
			if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			if($admindetails['role']==1){
				
				$data['hcf_list']=$this->Plant_model->get_hcf_plant_list($admindetails['a_id']);
				$data['cbwtf_list']=$this->Plant_model->get_cbwtf_list($admindetails['a_id']);
				//echo '<pre>';print_r($data);exit;
				$this->load->view('admin/print_stickers',$data);
				$this->load->view('html/footer');
			}else{
				$this->session->set_flashdata('error',"you don't have permission to access");
				redirect('dashboard');
			}

		}else{
			$this->session->set_flashdata('loginerror','Please login to continue');
			redirect('admin');
		}
	}public function print_count()
	{	
			if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			if($admindetails['role']==1){
				
				$data['s_count_list']=$this->Admin_model->get_st_count_details($admindetails['a_id']);
				//echo '<pre>';print_r($data);exit;
				$this->load->view('admin/print_count',$data);
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
	public function idcard()
	{	
			if($this->session->userdata('userdetails'))
		{
				$admindetails=$this->session->userdata('userdetails');
				$id=base64_decode($this->uri->segment(3));
				if($id==''){
					redirect('dashboard');
				}
				$plant_name=$this->Plant_model->get_idcard_plant_details($id);
				$data['details']=$this->Plant_model->get_id_plant_details($id);
				$data['details']['plant_name']=isset($plant_name['disposal_plant_name'])?$plant_name['disposal_plant_name']:'';
				$data['details']['role']='Plant';
				$path = rtrim(FCPATH,"/");
				$file_name =$data['details']['a_id'].'.pdf';
				$pdfFilePath = $path."/assets/idcards/".$file_name;
				ini_set('memory_limit','320M'); // boost the memory limit if it's low <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
				$html =$this->load->view('admin/idcard',$data, true); // render the view into HTML
				//echo '<pre>';print_r($plant_name);exit;
				$this->load->library('pdf');
				$pdf = $this->pdf->load();
				$pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date('M-d-Y')); // Add a footer for good measure <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
				$pdf->SetDisplayMode('fullpage');
				$pdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list
				$pdf->AddPage('L');
				$pdf->WriteHTML($html); // write the HTML into the PDF
				$pdf->Output($pdfFilePath, 'F');
				redirect("/assets/idcards/".$file_name);
				//echo '<pre>';print_r($data);exit;
		}else{
			$this->session->set_flashdata('loginerror','Please login to continue');
			redirect('admin');
		}
	}
	
	/* rescan waste purpose */
	public  function scan(){
		if($this->session->userdata('userdetails'))
		{
				$a_d=$this->session->userdata('userdetails');
				//echo '<pre>';print_r($a_d);exit;
				$data['pdetails']=$this->Plant_model->get_plant_basic_details($a_d['a_id']);
				$data['hos_list']=$this->Plant_model->get_plant_hospital_list($data['pdetails']['create_by']);
				$data['truck_list']=$this->Plant_model->get_truck_list($data['pdetails']['create_by']);
				//echo '<pre>';print_r($data);exit;
				$this->load->view('bio_medical/scan_waste',$data);
				$this->load->view('html/footer');
				
		}else{
			$this->session->set_flashdata('loginerror','Please login to continue');
			redirect('admin');
		}
	}
	/* rescan waste purpose */
	public  function rescanwaste(){
		if($this->session->userdata('userdetails'))
		{
				$a_d=$this->session->userdata('userdetails');
				//echo '<pre>';print_r($a_d);exit;
				$data['pdetails']=$this->Plant_model->get_plant_basic_details($a_d['a_id']);
				$data['hos_list']=$this->Plant_model->get_plant_hospital_list($data['pdetails']['create_by']);
				//echo '<pre>';print_r($data);exit;
				$this->load->view('bio_medical/rescan_waste',$data);
				$this->load->view('html/footer');
				
		}else{
			$this->session->set_flashdata('loginerror','Please login to continue');
			redirect('admin');
		}
	}
	public function location()
	{	
		$post=$this->input->post();
		//$this->session->set_userdata('lat_add',trim($post['latitude']));
			//$this->session->set_userdata('long_add',trim($post['longitude']));
			$url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($post['latitude']).','.trim($_POST['longitude']).'&sensor=false&key=AIzaSyBHTMjAK03abscfm6m00ddeFAVcj58lSaM';
			$json = @file_get_contents($url);
			$result = json_decode($json, TRUE);
			$address = $result['results'][0]['formatted_address'];
		
			if(isset($address)&& $address!=''){
					$data['msg']=1;
					$data['add']=$address;
					echo json_encode($data);exit;
			}
	}
	/* rescan data*/
	public function rescanwastepost(){
		if($this->session->userdata('userdetails'))
		{
			$post=$this->input->post();
			if($post['plantaddress']=='' || $post['lat']=='' || $post['lng']==''){
				$this->session->set_flashdata('error','First of all update cbwtf address then try again');			
				redirect('plant/rescanwaste');
			}
			$Date1 = $post['from_date']; 
			$Date2 = $post['to_date'];   
			$array = array(); 
			$Variable1 = strtotime($Date1); 
			$Variable2 = strtotime($Date2); 
			for ($currentDate = $Variable1; $currentDate <= $Variable2;  
				 $currentDate += (86400)) {                                      
				$Store = date('Y-m-d', $currentDate);
				$array[] = $Store; 
			}
			if(isset($array) && count($array)>0){
				$waste_d=array();
				foreach($array as $li){
					$waste_d=$this->Plant_model->plant_waste_data_wise($li,$post['h_id']);
					//echo '<pre>';print_r($waste_d);exit;
					if(isset($waste_d) && count($waste_d)>0){
						foreach($waste_d as $wli){
							
							//echo '<pre>';print_r($wli);exit;
								$u_d=array(
									'bio_genaral_waste_kgs'=>isset($wli['genaral_waste_kgs'])?$wli['genaral_waste_kgs']:'',
									'bio_genaral_waste_qty'=>isset($wli['genaral_waste_qty'])?$wli['genaral_waste_qty']:'',
									'bio_infected_plastics_kgs'=>isset($wli['infected_plastics_kgs'])?$wli['infected_plastics_kgs']:'',
									'bio_infected_plastics_qty'=>isset($wli['infected_plastics_qty'])?$wli['infected_plastics_qty']:'',
									'bio_infected_waste_kgs'=>isset($wli['infected_waste_kgs'])?$wli['infected_waste_kgs']:'',
									'bio_infected_waste_qty'=>isset($wli['infected_waste_qty'])?$wli['infected_waste_qty']:'',
									'bio_infected_c_waste_kgs'=>isset($wli['infected_c_waste_kgs'])?$wli['infected_c_waste_kgs']:'',
									'bio_infected_c_waste_qty'=>isset($wli['infected_c_waste_qty'])?$wli['infected_c_waste_qty']:'',
									'bio_glassware_watse_kgs'=>isset($wli['glassware_watse_kgs'])?$wli['glassware_watse_kgs']:'',
									'bio_glassware_watse_qty'=>isset($wli['glassware_watse_qty'])?$wli['glassware_watse_qty']:'',
									'bio_current_address'=>isset($post['plantaddress'])?$post['plantaddress']:'',
									'bio_current_latitude'=>isset($post['lat'])?$post['lat']:'',
									'bio_current_longitude'=>isset($post['lng'])?$post['lng']:'',
									'crosscheck_total'=>isset($wli['total'])?$wli['total']:'',
									'updated_by'=>isset($post['a_id'])?$post['a_id']:'',
									'updated_time'=>$wli['date'].' '.mt_rand(09,23).":".str_pad(mt_rand(0,59), 2, "0", STR_PAD_LEFT),
								);
								//echo '<pre>';print_r($u_d);exit;
								$this->Plant_model->update_rescan_waste_data($wli['id'],$u_d);
						}
						
					}
						
				}
			}
			//echo '<pre>';print_r($post);exit;
			
			$this->session->set_flashdata('success','Data Successfully updated');			
			redirect('plant/rescanwaste');
		}else{
			$this->session->set_flashdata('loginerror','Please login to continue');
			redirect('admin');
		}
	}
	/* scan waste data */
	public  function scanwastepost(){
		if($this->session->userdata('userdetails'))
		{
				$a_d=$this->session->userdata('userdetails');
				$post=$this->input->post();
				$this->load->model('Mobile_model');
				//echo '<pre>';print_r($post);
				$hos_add=$this->Plant_model->get_hospital_add($post['h_id']);
				if($hos_add['lat']=='' || $hos_add['lng']=='' || $hos_add['hospitaladdress']==''){
					$this->session->set_flashdata('error','First of all update hospital address then try again');			
					redirect('plant/scan');
				}
				$Date1 = $post['from_date']; 
				$Date2 = $post['to_date'];   
				$array = array(); 
				$Variable1 = strtotime($Date1); 
				$Variable2 = strtotime($Date2); 
				for ($currentDate = $Variable1; $currentDate <= $Variable2;  
					 $currentDate += (86400)) {                                      
					$Store = date('Y-m-d', $currentDate);
					$array[] = $Store; 
				}
				if(isset($array) && count($array)>0){
					foreach($array as $li){
						
						/* white */
								if (strpos($post['w_b_r_w_k_from'],'.') !== false) 
									{
										$ww_k_from = explode('.',$post['w_b_r_w_k_from']);
										$ww_k_from[0];
										$ww_k_from[1];
									}else{
											$ww_k_from[0]=$post['w_b_r_w_k_from'];
											$ww_k_from[1]='0';
									}
									if (strpos($post['w_b_r_w_k_to'],'.') !== false) 
									{
										$ww_k_to = explode('.',$post['w_b_r_w_k_to']);
										$ww_k_to[0];
										$ww_k_to[1];
									}else{
											$ww_k_to[0]=$post['w_b_r_w_k_to'];
											$ww_k_to[1]='0';
									}
								
								if (strpos($post['w_b_r_w_k_from'],'.') !== false && strpos($post['w_b_r_w_k_to'],'.') !== false) 
								{
									$genaral_waste_kgs=floatVal(rand($ww_k_from[0], $ww_k_to[0]).'.'.rand($ww_k_from[1], $ww_k_to[1]));
								}else{
									$genaral_waste_kgs=rand($post['w_b_r_w_k_from'],$post['w_b_r_w_k_to']);
								}
								$genaral_waste_qty=rand($post['w_b_r_w_b_from'],$post['w_b_r_w_b_to']);
						/* red */
								if (strpos($post['r_b_r_w_k_from'],'.') !== false) 
									{
										$rw_k_from = explode('.',$post['r_b_r_w_k_from']);
										$rw_k_from[0];
										$rw_k_from[1];
									}else{
											$rw_k_from[0]=$post['r_b_r_w_k_from'];
											$rw_k_from[1]='0';
									}
									if (strpos($post['r_b_r_w_k_to'],'.') !== false) 
									{
										$rw_k_to = explode('.',$post['r_b_r_w_k_to']);
										$rw_k_to[0];
										$rw_k_to[1];
									}else{
											$rw_k_to[0]=$post['r_b_r_w_k_to'];
											$rw_k_to[1]='0';
									}
									if (strpos($post['r_b_r_w_k_from'],'.') !== false && strpos($post['r_b_r_w_k_to'],'.') !== false) 
									{
										$infected_plastics_kgs=floatVal(rand($rw_k_from[0], $rw_k_to[0]).'.'.rand($rw_k_from[1], $rw_k_to[1]));
									}else{
										$infected_plastics_kgs=rand($post['r_b_r_w_k_from'],$post['r_b_r_w_k_to']);
									}						
									$infected_plastics_qty=rand($post['r_b_r_w_b_from'],$post['r_b_r_w_b_to']);
							/* yellow */
									if (strpos($post['y_b_r_w_k_from'],'.') !== false) 
									{
										$yw_k_from = explode('.',$post['y_b_r_w_k_from']);
										$yw_k_from[0];
										$yw_k_from[1];
									}else{
											$yw_k_from[0]=$post['y_b_r_w_k_from'];
											$yw_k_from[1]='0';
									}
									if (strpos($post['y_b_r_w_k_to'],'.') !== false) 
									{
										$yw_k_to = explode('.',$post['y_b_r_w_k_to']);
										$yw_k_to[0];
										$yw_k_to[1];
									}else{
											$yw_k_to[0]=$post['y_b_r_w_k_to'];
											$yw_k_to[1]='0';
									}
									if (strpos($post['y_b_r_w_k_from'],'.') !== false && strpos($post['y_b_r_w_k_to'],'.') !== false) 
									{
										$infected_waste_kgs=floatVal(rand($yw_k_from[0], $yw_k_to[0]).'.'.rand($yw_k_from[1], $yw_k_to[1]));
									}else{
										$infected_waste_kgs=rand($post['y_b_r_w_k_from'],$post['y_b_r_w_k_to']);
									}						
									$infected_waste_qty=rand($post['y_b_r_w_b_from'],$post['y_b_r_w_b_to']);
							/* yellowc */
									if (strpos($post['yc_b_r_w_k_from'],'.') !== false) 
									{
										$w_k_from = explode('.',$post['yc_b_r_w_k_from']);
										$w_k_from[0];
										$w_k_from[1];
									}else{
											$w_k_from[0]=$post['yc_b_r_w_k_from'];
											$w_k_from[1]='0';
									}
									if (strpos($post['yc_b_r_w_k_to'],'.') !== false) 
									{
										$w_k_to = explode('.',$post['yc_b_r_w_k_to']);
										$w_k_to[0];
										$w_k_to[1];
									}else{
											$w_k_to[0]=$post['yc_b_r_w_k_to'];
											$w_k_to[1]='0';
									}
									if (strpos($post['yc_b_r_w_k_from'],'.') !== false && strpos($post['yc_b_r_w_k_to'],'.') !== false) 
									{
										$infected_c_waste_kgs=floatVal(rand($w_k_from[0], $w_k_to[0]).'.'.rand($w_k_from[1], $w_k_to[1]));
									}else{
										$infected_c_waste_kgs=rand($post['yc_b_r_w_k_from'],$post['yc_b_r_w_k_to']);
									}
									$infected_c_waste_qty=rand($post['yc_b_r_w_b_from'],$post['yc_b_r_w_b_to']);
							/* blue */
							if (strpos($post['b_b_r_w_k_from'],'.') !== false) 
							{
								$bw_k_from = explode('.',$post['b_b_r_w_k_from']);
								$bw_k_from[0];
								$bw_k_from[1];
							}else{
									$bw_k_from[0]=$post['b_b_r_w_k_from'];
									$bw_k_from[1]='0';
							}
							if (strpos($post['b_b_r_w_k_to'],'.') !== false) 
							{
								$bw_k_to = explode('.',$post['b_b_r_w_k_to']);
								$bw_k_to[0];
								$bw_k_to[1];
							}else{
									$bw_k_to[0]=$post['b_b_r_w_k_to'];
									$bw_k_to[1]='0';
							}
							if (strpos($post['b_b_r_w_k_from'],'.') !== false && strpos($post['b_b_r_w_k_to'],'.') !== false) 
							{
								$glassware_watse_kgs=floatVal(rand($bw_k_from[0], $bw_k_to[0]).'.'.rand($bw_k_from[1], $bw_k_to[1]));
							}else{
								$glassware_watse_kgs=rand($post['b_b_r_w_k_from'],$post['b_b_r_w_k_to']);
							}
							$glassware_watse_qty=rand($post['b_b_r_w_b_from'],$post['b_b_r_w_b_to']);
						
							$addgarbage=array(
							'h_id'=>isset($post['h_id'])?$post['h_id']:'',
							'genaral_waste_kgs'=>$genaral_waste_kgs,
							'genaral_waste_qty'=>$genaral_waste_qty,
							'infected_plastics_kgs'=>$infected_plastics_kgs,
							'infected_plastics_qty'=>$infected_plastics_qty,
							'infected_waste_kgs'=>$infected_waste_kgs,
							'infected_waste_qty'=>$infected_waste_qty,		
							'infected_c_waste_kgs'=>$infected_c_waste_kgs,
							'infected_c_waste_qty'=>$infected_c_waste_qty,		
							'glassware_watse_kgs'=>$glassware_watse_kgs,
							'glassware_watse_qty'=>$glassware_watse_qty,
							'current_address'=>$hos_add['hospitaladdress'],
							'current_latitude'=>$hos_add['lat'],
							'current_longitude'=>$hos_add['lng'],
							'total'=>($genaral_waste_kgs)+($infected_plastics_kgs)+($infected_waste_kgs)+($infected_c_waste_kgs)+($glassware_watse_kgs),
							'status'=>1,
							'date'=>$li,
							'create_at'=>$li.' '.mt_rand(06,12).":".str_pad(mt_rand(0,59), 2, "0", STR_PAD_LEFT),
							'create_by'=>isset($post['trcuk_id'])?$post['trcuk_id']:'',
							'email_sent'=>1,
							);
							$check=$this->Plant_model->check_waste_exist($post['h_id'],$li);
							if(count($check)>0){
								$save=$this->Plant_model->update_waste_details($check['id'],$check['h_id'],$addgarbage);
								$add_garbage=$check['id'];								
							}else{
								$save=$this->Plant_model->save_waste_details($addgarbage);
								$add_garbage=$save;
							}
							$data['details']=$this->Mobile_model->get_all_hospital_details($post['h_id']);
							$g4_plant_email=$this->Mobile_model->get_plant_details($data['details']['create_by']);				
							$data['plant_details']=$g4_plant_email;
							$data['garbage_details']=$addgarbage;
							$data['garbage_details']['invoice_id']=$add_garbage;
							//echo '<pre>';print_r($data);exit;
							$path = rtrim(FCPATH,"/");
							$file_name = $data['details']['hospital_name'].'_'.$data['details']['h_id'].'_'.$add_garbage.'.pdf';                
							$data['page_title'] = $data['details']['hospital_name'].'invoice'; // pass data to the view
							$pdfFilePath = $path."/assets/invoices/".$file_name;
							ini_set('memory_limit','320M'); // boost the memory limit if it's low <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
							$html = $this->load->view('admin/pdf', $data, true); // render the view into HTML
							//echo '<pre>';print_r($html);exit;
							$this->load->library('pdf');
							$pdf = $this->pdf->load();
							$pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date('M-d-Y')); // Add a footer for good measure <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
							$pdf->SetDisplayMode('fullpage');
							$pdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list
							$pdf->WriteHTML($html); // write the HTML into the PDF
							$pdf->Output($pdfFilePath, 'F');
							$update_data=array(
							'invoice_file'=>$file_name,
							'invoice_name'=>$data['details']['hospital_name'].' invoice',
							);
							$this->Mobile_model->update_invoice_name($add_garbage,$update_data);
							//echo '<pre>';print_r($addgarbage);
						//echo '<pre>';print_r($li);exit;
					}
				}
				
				$this->session->set_flashdata('success','Waste added successfully');			
				redirect('plant/scan');				
		}else{
			$this->session->set_flashdata('loginerror','Please login to continue');
			redirect('admin');
		}
	}
	/* scan waste data */
    	public function permission(){
			if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			if($admindetails['role']==4){
				$admindetails=$this->session->userdata('userdetails');
				$this->load->view('bio_medical/check_permission_form');
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
	public function permissionpost()
	{
		if($this->session->userdata('userdetails'))
		{
			$post=$this->input->post();
			$admindetails=$this->session->userdata('userdetails');
			$details=$this->Plant_model->get_plant_pincode_details($admindetails['a_id']);
			if($post['security_code']==$details['pincode']){
				redirect('plant/scan');
			}else{
				$this->session->set_flashdata('error','Your security code is wrong. Please try again');
				redirect('plant/permission');
			}
		
		}else{
			$this->session->set_flashdata('loginerror','Please login to continue');
			redirect('admin');
		}
	}
    
	
	
	
}
