<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hospital extends CI_Controller {

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
		$this->load->model('Hospital_model');
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
				
				$this->load->view('admin/addhospital');
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
				
				$data['hospital_list']=$this->Hospital_model->get_all_hospital_list($admindetails['a_id']);
				//echo "<pre>";print_r($data);exit;
				$this->load->view('admin/hospital-list',$data);
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
				
					$hos_id=base64_decode($this->uri->segment(3));
					$status=base64_decode($this->uri->segment(4));
					if($status==1){
						$sta=0;
					}else{
						$sta=1;
					}
						$details=$this->Hospital_model->get_hospital_details($hos_id);
						$updatehospital=array(
							'status'=>$sta,
							);
							$update=$this->Hospital_model->update_hospital_details($hos_id,$updatehospital);
							if(count($update)>0){
								$admin_detail=array(
								'status'=>$sta,
								);
								$this->Hospital_model->update_admin_details($details['a_id'],$admin_detail);
								$this->session->set_flashdata('success','Hospital Successfully deactivate');
								redirect('hospital/lists');
								}else{
								$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
								redirect('hospital/edit/'.base64_encode($post['hos_id']));
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
				
						$hos_id=base64_decode($this->uri->segment(3));
						$details=$this->Hospital_model->get_hospital_details($hos_id);
						$updatehospital=array(
							'status'=>2,
							);
							$update=$this->Hospital_model->update_hospital_details($hos_id,$updatehospital);
							if(count($update)>0){
								$admin_detail=array(
								'status'=>2,
								);
								$this->Hospital_model->update_admin_details($details['a_id'],$admin_detail);
								$this->session->set_flashdata('success','Hospital details Successfully Deleted');
								redirect('hospital/lists');
								}else{
								$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
								redirect('hospital/edit/'.base64_encode($post['hos_id']));
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
			if($admindetails['role']==1){
				
				$hos_id=base64_decode($this->uri->segment(3));
				$data['hospital_detail']=$this->Hospital_model->get_hospital_details($hos_id);
				//echo "<pre>";print_r($data);exit;
				$this->load->view('admin/edithospital',$data);
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
			if($admindetails['role']==1){
				$post=$this->input->post();
				$check_email=$this->Admin_model->email_check_details($post['email']);
				if(count($check_email)>0){
						$this->session->set_flashdata('error','Email id already exits. Please use another  email id');
						redirect('hospital/add');
				}else{
					$addhos=array(
						'name'=>isset($post['hospital_name'])?$post['hospital_name']:'',
						'email_id'=>isset($post['email'])?$post['email']:'',
						'password'=>isset($post['password'])?md5($post['password']):'',
						'org_password'=>isset($post['password'])?$post['password']:'',
						'status'=>1,
						'role'=>2
					);
					$hos_save=$this->Admin_model->save_admin($addhos);
					if(count($hos_save)>0){
						$this->zend->load('Zend/Barcode');
						$file = Zend_Barcode::draw('code128', 'image', array('text' => $hos_save), array());
						$code = time().$hos_save;
						$store_image1 = imagepng($file, $this->config->item('documentroot')."assets/hospital_barcodes/{$code}.png");
						$addhospital=array(
							'hospital_name'=>isset($post['hospital_name'])?$post['hospital_name']:'',
							'hospital_id'=>isset($post['hospital_id'])?$post['hospital_id']:'',
							'mobile'=>isset($post['mobile'])?$post['mobile']:'',
							'email'=>isset($post['email'])?$post['email']:'',
							'address'=>isset($post['address'])?$post['address']:'',
							'captcha'=>isset($post['captcha'])?$post['captcha']:'',
							'status'=>1,
							'create_at'=>date('Y-m-d H:i:s'),
							'barcode'=>$code.'.png',
							'create_by'=>$admindetails['a_id']
						);
						$hospital_save=$this->Admin_model->save_hospital($addhospital);
						if(count($hospital_save)>0){
							$this->session->set_flashdata('success','Hospital Successfully added');
							redirect('hospital/listss');
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('hospital/lists');
						}
						
					}else{
						$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
						redirect('hospital/add');
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
				$details=$this->Hospital_model->get_hospital_details($post['hos_id']);
				if($details['email']!=$post['email']){
					$check_email=$this->Admin_model->email_check_details($post['email']);
						if(count($check_email)>0){
								$this->session->set_flashdata('error','Email id already exits. Please use another  email id');
								redirect('hospital/edit/'.base64_encode($post['hos_id']));
						}else{
							$updatehospital=array(
							'hospital_name'=>isset($post['hospital_name'])?$post['hospital_name']:'',
							'hospital_id'=>isset($post['hospital_id'])?$post['hospital_id']:'',
							'mobile'=>isset($post['mobile'])?$post['mobile']:'',
							'email'=>isset($post['email'])?$post['email']:'',
							'address'=>isset($post['address'])?$post['address']:'',
							'captcha'=>isset($post['captcha'])?$post['captcha']:'',
							);
							$update=$this->Hospital_model->update_hospital_details($post['hos_id'],$updatehospital);
							if(count($update)>0){
								$admin_detail=array(
								'name'=>isset($post['hospital_name'])?$post['hospital_name']:'',
								'email_id'=>isset($post['email'])?$post['email']:'',
								);
								$this->Hospital_model->update_admin_details($details['a_id'],$admin_detail);
								$this->session->set_flashdata('success','Hospital details Successfully updated');
								redirect('hospital/lists');
								}else{
								$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
								redirect('hospital/edit/'.base64_encode($post['hos_id']));
								}
						}
					
				}else{
					$updatehospital=array(
							'hospital_name'=>isset($post['hospital_name'])?$post['hospital_name']:'',
							'hospital_id'=>isset($post['hospital_id'])?$post['hospital_id']:'',
							'mobile'=>isset($post['mobile'])?$post['mobile']:'',
							'email'=>isset($post['email'])?$post['email']:'',
							'address'=>isset($post['address'])?$post['address']:'',
							'captcha'=>isset($post['captcha'])?$post['captcha']:'',
						);
						//echo "<pre>";print_r($updatehospital);
						$update=$this->Hospital_model->update_hospital_details($post['hos_id'],$updatehospital);
						//echo $this->db->last_query();exit;
						if(count($update)>0){
							$admin_detail=array(
								'name'=>isset($post['hospital_name'])?$post['hospital_name']:'',
								'email_id'=>isset($post['email'])?$post['email']:'',
								);
							$this->Hospital_model->update_admin_details($details['a_id'],$admin_detail);
							$this->session->set_flashdata('success','Hospital details Successfully updated');
							redirect('hospital/lists');
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
	}
	
}
