<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
		$this->load->model('User_model');
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
	public function add()
	{	
			if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			if($admindetails['role']==0){
				
				$this->load->view('admin/adduser');
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
			if($admindetails['role']==0){
				
				$data['user_list']=$this->User_model->get_all_users_list($admindetails['a_id']);
				//echo "<pre>";print_r($data);exit;
				$this->load->view('admin/user-list',$data);
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
	public function govtadd()
	{	
			if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			if($admindetails['role']==0){
				
				$this->load->view('admin/addgovtuser');
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
	public function govtlists()
	{	
			if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			if($admindetails['role']==0){
				
				$data['user_list']=$this->User_model->get_all_govt_users_list($admindetails['a_id']);
				//echo "<pre>";print_r($data);exit;
				$this->load->view('admin/user-govtlist',$data);
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
			if($admindetails['role']==0){
				
					$user_id=base64_decode($this->uri->segment(3));
					$status=base64_decode($this->uri->segment(4));
					if($status==1){
						$sta=0;
					}else{
						$sta=1;
					}
						$details=$this->User_model->get_user_details($user_id);
						$updatehospital=array(
							'status'=>$sta,
							);
							$update=$this->User_model->update_admin_details($user_id,$updatehospital);
							if(count($update)>0){
								$admin_detail=array(
								'status'=>$sta,
								);
								$this->User_model->update_admin_details($details['a_id'],$admin_detail);
								if($status==1){
									$this->session->set_flashdata('success','User successfully deactivated');

								}else{
									$this->session->set_flashdata('success','User sucessfully activated');

								}
								redirect('user/lists');
								}else{
								$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
								redirect('user/edit/'.base64_encode($post['hos_id']));
								}
			}else{
				$this->session->set_flashdata('error',"you don't have permission to access");
				redirect('dashboard');
			}

		}else{
			$this->session->set_flashdata('loginerror','Please login to continue');
			redirect('admin');
		}
	}public function govtstatus()
	{	
			if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			if($admindetails['role']==0){
				
					$user_id=base64_decode($this->uri->segment(3));
					$status=base64_decode($this->uri->segment(4));
					if($status==1){
						$sta=0;
					}else{
						$sta=1;
					}
						$details=$this->User_model->get_user_details($user_id);
							$updatehospital=array(
							'status'=>$sta,
							);
							$update=$this->User_model->update_admin_details($user_id,$updatehospital);
							if(count($update)>0){
								$admin_detail=array(
								'status'=>$sta,
								);
								$this->User_model->update_admin_details($details['a_id'],$admin_detail);
								if($status==1){
									$this->session->set_flashdata('success','User successfully deactivated');

								}else{
									$this->session->set_flashdata('success','User sucessfully activated');

								}
								redirect('user/govtlists');
								}else{
								$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
								redirect('user/govtlists');
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
			if($admindetails['role']==0){
				
						$user_id=base64_decode($this->uri->segment(3));
						$details=$this->User_model->get_user_details($user_id);
						$updatehospital=array(
							'status'=>2,
							);
							$update=$this->User_model->update_admin_details($user_id,$updatehospital);
							if(count($update)>0){
								$this->session->set_flashdata('success','User successfully deleted');
								redirect('user/lists');
								}else{
								$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
								redirect('user/lists');
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
	public function govtdelete()
	{	
			if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			if($admindetails['role']==0){
				
						$user_id=base64_decode($this->uri->segment(3));
						$details=$this->User_model->get_user_details($user_id);
						$updatehospital=array(
							'status'=>2,
							);
							$update=$this->User_model->update_admin_details($user_id,$updatehospital);
							if(count($update)>0){
								$this->session->set_flashdata('success','User successfully deleted');
								redirect('user/govtlists');
								}else{
								$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
								redirect('user/govtlists');
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
	public function edit()
	{	
			if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			if($admindetails['role']==0){
				
				$a_id=base64_decode($this->uri->segment(3));
				$data['user_detail']=$this->User_model->get_user_details($a_id);
				//echo "<pre>";print_r($data);exit;
				$this->load->view('admin/user_admin',$data);
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
	public function govtedit()
	{	
			if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			if($admindetails['role']==0){
				
				$a_id=base64_decode($this->uri->segment(3));
				$data['user_detail']=$this->User_model->get_user_details($a_id);
				//echo "<pre>";print_r($data);exit;
				$this->load->view('admin/user_govtedit',$data);
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
	public function addpost()
	{	
			if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			if($admindetails['role']==0){
				$post=$this->input->post();
				//echo '<pre>';print_r($post);exit;
				$check_email=$this->Admin_model->email_check_details($post['email']);
				if(count($check_email)>0){
						$this->session->set_flashdata('error','Email id already exits. Please use another  email id');
						redirect('user/add');
				}else{
					$addhos=array(
						'name'=>isset($post['name'])?strtoupper($post['name']):'',
						'email_id'=>isset($post['email'])?$post['email']:'',
						'mobile'=>isset($post['mobile'])?$post['mobile']:'',
						'password'=>isset($post['password'])?md5($post['password']):'',
						'org_password'=>isset($post['password'])?$post['password']:'',
						'address1'=>isset($post['address1'])?$post['address1']:'',
							'address2'=>isset($post['address2'])?$post['address2']:'',
							'city'=>isset($post['city'])?ucfirst($post['city']):'',
							'state'=>isset($post['state'])?$post['state']:'',
							'country'=>isset($post['country'])?ucfirst($post['country']):'',
							'pincode'=>isset($post['pincode'])?$post['pincode']:'',
						'status'=>1,
						'role'=>1,
						'create_at'=>date('Y-m-d H:i:s'),
						'create_by'=>$admindetails['a_id']
					);
					$hos_save=$this->Admin_model->save_admin($addhos);
					if(count($hos_save)>0){
							/*qr code*/
								$qr_d=$this->Admin_model->get_qr_c_data($hos_save);
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
							$this->session->set_flashdata('success','User added succcessfully');
							redirect('user/lists');
					
						
					}else{
						$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
						redirect('user/add');
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
	public function addgovtpost()
	{	
			if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			if($admindetails['role']==0){
				$post=$this->input->post();
				//echo '<pre>';print_r($post);exit;
				$check_email=$this->Admin_model->email_check_details($post['email']);
				if(count($check_email)>0){
						$this->session->set_flashdata('error','Email id already exits. Please use another  email id');
						redirect('user/govtadd');
				}else{
					$addhos=array(
						'name'=>isset($post['name'])?strtoupper($post['name']):'',
						'email_id'=>isset($post['email'])?$post['email']:'',
						'mobile'=>isset($post['mobile'])?$post['mobile']:'',
						'password'=>isset($post['password'])?md5($post['password']):'',
						'org_password'=>isset($post['password'])?$post['password']:'',
						'address1'=>isset($post['address1'])?$post['address1']:'',
						'address2'=>isset($post['address2'])?$post['address2']:'',
						'city'=>isset($post['city'])?ucfirst($post['city']):'',
						'state'=>isset($post['state'])?$post['state']:'',
						'country'=>isset($post['country'])?ucfirst($post['country']):'',
						'pincode'=>isset($post['pincode'])?$post['pincode']:'',
						'status'=>1,
						'role'=>5,
						'create_at'=>date('Y-m-d H:i:s'),
						'create_by'=>$admindetails['a_id']
					);
					$hos_save=$this->Admin_model->save_admin($addhos);
					if(count($hos_save)>0){
								/*qr code*/
								$qr_d=$this->Admin_model->get_qr_c_data($hos_save);
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
							$this->session->set_flashdata('success','User added succcessfully');
							redirect('user/govtlists');
					
						
					}else{
						$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
						redirect('user/govtadd');
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
			if($admindetails['role']==0){
				$post=$this->input->post();
				//echo '<pre>';print_r($post);exit;
				$details=$this->User_model->get_user_details($post['a_id']);
				if($details['email_id']!=$post['email']){
					$check_email=$this->Admin_model->email_check_details($post['email']);
						if(count($check_email)>0){
								$this->session->set_flashdata('error','Email id already exits. Please use another  email id');
								if($admindetails['role']==2){
										redirect('dashboard/profile');
									}else{
										redirect('user/edit/'.base64_encode($post['a_id']));
									}
								
						}else{
							$updatehospital=array(
							'name'=>isset($post['name'])?strtoupper($post['name']):'',
							'email_id'=>isset($post['email'])?$post['email']:'',
							'mobile'=>isset($post['mobile'])?$post['mobile']:'',
							'address1'=>isset($post['address1'])?$post['address1']:'',
							'address2'=>isset($post['address2'])?$post['address2']:'',
							'city'=>isset($post['city'])?ucfirst($post['city']):'',
							'state'=>isset($post['state'])?$post['state']:'',
							'country'=>isset($post['country'])?ucfirst($post['country']):'',
							'pincode'=>isset($post['pincode'])?$post['pincode']:'',
							);
							$update=$this->User_model->update_admin_details($post['a_id'],$updatehospital);
							if(count($update)>0){
								/*qr code*/
								$qr_d=$this->Admin_model->get_qr_c_data($post['a_id']);
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
								$this->session->set_flashdata('success','User details Successfully updated');
										redirect('user/lists');
									
								
								}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('user/edit/'.base64_encode($post['a_id']));
									
								
								}
						}
					
				}else{
					$updatehospital=array(
							'name'=>isset($post['name'])?strtoupper($post['name']):'',
							'email_id'=>isset($post['email'])?$post['email']:'',
							'mobile'=>isset($post['mobile'])?$post['mobile']:'',
							'address1'=>isset($post['address1'])?$post['address1']:'',
							'address2'=>isset($post['address2'])?$post['address2']:'',
							'city'=>isset($post['city'])?ucfirst($post['city']):'',
							'state'=>isset($post['state'])?$post['state']:'',
							'country'=>isset($post['country'])?ucfirst($post['country']):'',
							'pincode'=>isset($post['pincode'])?$post['pincode']:'',
						);
						//echo "<pre>";print_r($updatehospital);
						$update=$this->User_model->update_admin_details($post['a_id'],$updatehospital);
						//echo $this->db->last_query();exit;
						if(count($update)>0){
							/*qr code*/
								$qr_d=$this->Admin_model->get_qr_c_data($post['a_id']);
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
							$this->session->set_flashdata('success','User details successfully updated');
							redirect('user/lists');
							
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							
								redirect('hospital/edit/'.base64_encode($post['hos_id']));
							
							
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
	}public function editgovtpost()
	{	
			if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			if($admindetails['role']==0){
				$post=$this->input->post();
				//echo '<pre>';print_r($post);exit;
				$details=$this->User_model->get_user_details($post['a_id']);
				if($details['email_id']!=$post['email']){
					$check_email=$this->Admin_model->email_check_details($post['email']);
						if(count($check_email)>0){
								$this->session->set_flashdata('error','Email id already exits. Please use another  email id');
								if($admindetails['role']==2){
										redirect('dashboard/profile');
									}else{
										redirect('user/govtedit/'.base64_encode($post['a_id']));
									}
								
						}else{
							$updatehospital=array(
							'name'=>isset($post['name'])?strtoupper($post['name']):'',
							'email_id'=>isset($post['email'])?$post['email']:'',
							'mobile'=>isset($post['mobile'])?$post['mobile']:'',
							'address1'=>isset($post['address1'])?$post['address1']:'',
							'address2'=>isset($post['address2'])?$post['address2']:'',
							'city'=>isset($post['city'])?ucfirst($post['city']):'',
							'state'=>isset($post['state'])?$post['state']:'',
							'country'=>isset($post['country'])?ucfirst($post['country']):'',
							'pincode'=>isset($post['pincode'])?$post['pincode']:'',
							);
							$update=$this->User_model->update_admin_details($post['a_id'],$updatehospital);
							if(count($update)>0){
								/*qr code*/
								$qr_d=$this->Admin_model->get_qr_c_data($post['a_id']);
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
								$this->session->set_flashdata('success','User details Successfully updated');
										redirect('user/govtlists');
									
								
								}else{
									$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									redirect('user/govtedit/'.base64_encode($post['a_id']));
									
								
								}
						}
					
				}else{
					$updatehospital=array(
							'name'=>isset($post['name'])?strtoupper($post['name']):'',
							'email_id'=>isset($post['email'])?$post['email']:'',
							'mobile'=>isset($post['mobile'])?$post['mobile']:'',
							'address1'=>isset($post['address1'])?$post['address1']:'',
							'address2'=>isset($post['address2'])?$post['address2']:'',
							'city'=>isset($post['city'])?ucfirst($post['city']):'',
							'state'=>isset($post['state'])?$post['state']:'',
							'country'=>isset($post['country'])?ucfirst($post['country']):'',
							'pincode'=>isset($post['pincode'])?$post['pincode']:'',
						);
						//echo "<pre>";print_r($updatehospital);
						$update=$this->User_model->update_admin_details($post['a_id'],$updatehospital);
						//echo $this->db->last_query();exit;
						if(count($update)>0){
							/*qr code*/
								$qr_d=$this->Admin_model->get_qr_c_data($post['a_id']);
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
							$this->session->set_flashdata('success','User details successfully updated');
							redirect('user/govtlists');
							
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							
								redirect('user/govtedit/'.base64_encode($post['a_id']));
							
							
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
		public function invoice_list(){
		if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			if($admindetails['role']==2){
				
				$hospital_detail=$this->Admin_model->get_hospital_list_profile_details($admindetails['a_id']);
				$data['invoice_list']=$this->Hospital_model->get_hospital_invoice_list_details($hospital_detail['h_id']);

				//echo "<pre>";print_r($data);exit;
				$this->load->view('admin/invoice_list', $data);
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
	public function garbage_list(){
		if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			if($admindetails['role']==2){
				
				$hospital_detail=$this->Admin_model->get_hospital_list_profile_details($admindetails['a_id']);
				$data['garbage_list']=$this->Hospital_model->get_hospital_invoice_list_details($hospital_detail['h_id']);
				//echo "<pre>";print_r($data);exit;
				$this->load->view('admin/hospita_garbage_list', $data);
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
	public function hospital_report()
	{	
			if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			if($admindetails['role']==1){
				
				$data['hospital_reports']=$this->Admin_model->get_hospitalreport_list();
				//echo "<pre>";print_r($data);exit;
				$this->load->view('admin/hospital_report_list',$data);
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
	public function cbwtf_report()
	{	
			if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			if($admindetails['role']==1){
				
				$data['hospital_reports']=$this->Admin_model->get_cbwtfreport_list();
				//echo "<pre>";print_r($data);exit;
				$this->load->view('admin/cbwtf_report_list',$data);
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
	public function bio_medical()
	{	
			if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			if($admindetails['role']==2){
				
				$data['hospital_reports']=$this->Admin_model->get_cbwtfreport_list();
				$data['bio_medical_list']=$this->Hospital_model->get_bio_medical_waste_list($admindetails['a_id']);

				//echo "<pre>";print_r($data);exit;
				$this->load->view('bio_medical/add_bio_medical',$data);
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
	public function addbio_medical_post()
	{	
			if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			if($admindetails['role']==2){
				$post=$this->input->post();
				$add_bio=array(
							'no_of_bags'=>isset($post['no_of_bags'])?$post['no_of_bags']:'',
							'no_of_kgs'=>isset($post['no_of_kgs'])?$post['no_of_kgs']:'',
							'color_type'=>isset($post['color_type'])?$post['color_type']:'',
							'weight_type'=>isset($post['weight_type'])?$post['weight_type']:'',
							'status'=>1,
							'create_at'=>date('Y-m-d H:i:s'),
							'create_by'=>$admindetails['a_id']
						);
						$add_bio_medical=$this->Hospital_model->save_bio_medical_waste($add_bio);
						//echo '<pre>';print_r($add_bio_medical);exit;
						if(count($add_bio_medical)>0){
							$this->zend->load('Zend/Barcode');
							$file = Zend_Barcode::draw('code128', 'image', array('text' =>$add_bio_medical), array());
							$code = time();
							$store_image1 = imagepng($file, $this->config->item('documentroot')."assets/bio_medical_barcodes/{$code}.png");
							$update_data=array(
							'barcode'=>$code.'.png',
							);
							$this->Hospital_model->update_barcode($add_bio_medical,$update_data);
							$this->session->set_flashdata('success','Bio Medical waste Successfully added');
							redirect('hospital/bio_medical');
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('hospital/bio_medical');
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
