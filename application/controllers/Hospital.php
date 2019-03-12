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
			$data['u_url']= current_url();
			$admindetails=$this->session->userdata('userdetails');
			$data['details']=$this->Admin_model->get_adminbasic_details($admindetails['a_id']);
			if($data['details']['role']==5){
				$data['u_url']= base_url().$this->uri->segment(1).'/'.$this->uri->segment(2);
				$this->load->model('Govt_model');
				$data['admin_list']=$this->Govt_model->get_all_admins_list(2);
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
								if($status==1){
									$this->session->set_flashdata('success','HCF successfully deactivated');

								}else{
									$this->session->set_flashdata('success','Hcf sucessfully activated');

								}
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
								$this->session->set_flashdata('success','HCF successfully deleted');
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
			if($admindetails['role']==1 || $admindetails['role']==2){
				
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
				//echo '<pre>';print_r($post);
				$check_email=$this->Admin_model->email_check_details($post['email']);
				if(count($check_email)>0){
						$this->session->set_flashdata('error','Email id already exits. Please use another  email id');
						redirect('hospital/add');
				}else{
					$addhos=array(
						'name'=>isset($post['hospital_name'])?strtoupper($post['hospital_name']):'',
						'email_id'=>isset($post['email'])?$post['email']:'',
						'password'=>isset($post['password'])?md5($post['password']):'',
						'org_password'=>isset($post['password'])?$post['password']:'',
						'status'=>1,
						'role'=>2
					);
					$hos_save=$this->Admin_model->save_admin($addhos);
					if(count($hos_save)>0){
						$barcode_name = strtoupper(substr($post['hospital_name'], 0, 4));
						$this->zend->load('Zend/Barcode');
						$this->load->library('ciqrcode');
						$params['data'] =$barcode_name.$post['type'].$post['state'].$hos_save;
						$params['level'] = 'H';
						$params['size'] = 10;
						$params['cachedir'] = FCPATH.'assets/hospital_barcodes/';
						$path_img=time().'.png';
						$path='assets/hospital_barcodes/'.$path_img;
						$params['savename'] =FCPATH.$path;
						$this->ciqrcode->generate($params);
						
						//$file = Zend_Barcode::draw('code128', 'image', array('text' => $barcode_name.$post['type'].$post['state'].$hos_save), array());
						//$code = time().$hos_save;
						//$store_image1 = imagepng($file, $this->config->item('documentroot')."assets/hospital_barcodes/{$code}.png");
						$addhospital=array(
							'a_id'=>isset($hos_save)?$hos_save:'',
							'hospital_name'=>isset($post['hospital_name'])?strtoupper($post['hospital_name']):'',
							'route_number'=>isset($post['route_number'])?$post['route_number']:'',
							'type'=>isset($post['type'])?$post['type']:'',
							'hospital_id'=>isset($hos_save)?$hos_save:'',
							'mobile'=>isset($post['mobile'])?$post['mobile']:'',
							'no_of_beds'=>isset($post['no_of_beds'])?$post['no_of_beds']:'',
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
							'barcode'=>$path_img,
							'barcodetext'=>$barcode_name.$post['type'].$post['state'].$hos_save,
							'create_by'=>$admindetails['a_id']
						);
						//echo '<pre>';print_r($addhospital);exit;
						$hospital_save=$this->Admin_model->save_hospital($addhospital);
						if(count($hospital_save)>0){
							$this->session->set_flashdata('success','HCF added succcessfully');
							redirect('hospital/lists');
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
			if($admindetails['role']==1 || $admindetails['role']==2){
				$post=$this->input->post();
				//echo '<pre>';print_r($post);exit;
				$details=$this->Hospital_model->get_hospital_details($post['hos_id']);
				if($details['email']!=$post['email']){
					$check_email=$this->Admin_model->email_check_details($post['email']);
						if(count($check_email)>0){
								$this->session->set_flashdata('error','Email id already exits. Please use another  email id');
								if($admindetails['role']==2){
										redirect('dashboard/profile');
									}else{
										redirect('hospital/edit/'.base64_encode($post['hos_id']));
									}
								
						}else{
							$updatehospital=array(
							'hospital_name'=>isset($post['hospital_name'])?strtoupper($post['hospital_name']):'',
							'type'=>isset($post['type'])?$post['type']:'',
							'route_number'=>isset($post['route_number'])?$post['route_number']:'',
							'mobile'=>isset($post['mobile'])?$post['mobile']:'',
							'no_of_beds'=>isset($post['no_of_beds'])?$post['no_of_beds']:'',
							'email'=>isset($post['email'])?$post['email']:'',
							'address1'=>isset($post['address1'])?$post['address1']:'',
							'address2'=>isset($post['address2'])?$post['address2']:'',
							'city'=>isset($post['city'])?ucfirst($post['city']):'',
							'state'=>isset($post['state'])?$post['state']:'',
							'country'=>isset($post['country'])?ucfirst($post['country']):'',
							'pincode'=>isset($post['pincode'])?$post['pincode']:'',
							'captcha'=>isset($post['captcha'])?$post['captcha']:'',
							);
							$update=$this->Hospital_model->update_hospital_details($post['hos_id'],$updatehospital);
							if(count($update)>0){
								$admin_detail=array(
								'name'=>isset($post['hospital_name'])?$post['hospital_name']:'',
								'email_id'=>isset($post['email'])?$post['email']:'',
								);
								$this->Hospital_model->update_admin_details($details['a_id'],$admin_detail);
								
									if($admindetails['role']==2){
										$this->session->set_flashdata('success','Hcf details successfully updated');
										redirect('dashboard/profile');
									}else{
										$this->session->set_flashdata('success','Hcf details successfully updated');
										redirect('hospital/lists');
									}
								
								}else{
								$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
									if($admindetails['role']==2){
										redirect('dashboard/profile');
									}else{
										redirect('hospital/edit/'.base64_encode($post['hos_id']));
									}
								
								}
						}
					
				}else{
					$updatehospital=array(
							'hospital_name'=>isset($post['hospital_name'])?strtoupper($post['hospital_name']):'',
							'type'=>isset($post['type'])?$post['type']:'',
							'route_number'=>isset($post['route_number'])?$post['route_number']:'',
							'mobile'=>isset($post['mobile'])?$post['mobile']:'',
							'no_of_beds'=>isset($post['no_of_beds'])?$post['no_of_beds']:'',
							'email'=>isset($post['email'])?$post['email']:'',
							'address1'=>isset($post['address1'])?$post['address1']:'',
							'address2'=>isset($post['address2'])?$post['address2']:'',
							'city'=>isset($post['city'])?ucfirst($post['city']):'',
							'state'=>isset($post['state'])?$post['state']:'',
							'country'=>isset($post['country'])?ucfirst($post['country']):'',
							'pincode'=>isset($post['pincode'])?$post['pincode']:'',
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
							
							if($admindetails['role']==2){
								$this->session->set_flashdata('success','Hcf details successfully updated');
									redirect('dashboard/profile');
							}else{
								$this->session->set_flashdata('success','Hcf details successfully updated');
								redirect('hospital/lists');
								}
							
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							if($admindetails['role']==2){
									redirect('dashboard/profile');
							}else{
								redirect('hospital/edit/'.base64_encode($post['hos_id']));
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
	public function bio_medicallist()
	{	
			if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			if($admindetails['role']==2){
				
				$data['hospital_reports']=$this->Admin_model->get_cbwtfreport_list();
				$data['bio_medical_list']=$this->Hospital_model->get_bio_medical_waste_list($admindetails['a_id']);

				//echo "<pre>";print_r($data);exit;
				$this->load->view('bio_medical/bio_medical_list',$data);
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
	public function waste_list()
	{	
			if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			if($admindetails['role']==1){
				$post=$this->input->post();
				if(isset($post['from_date']) && $post['from_date']!='' || isset($post['to_date']) && $post['to_date']!=''){
					
					$data['waste_list']=$this->Hospital_model->get_hospital_wise_waste_with_dates($admindetails['a_id'],$post['from_date'],$post['to_date']);
					//echo '<pre>';print_r($data);exit;
				}else{
					$data['waste_list']=$this->Hospital_model->get_hospital_wise_waste_list($admindetails['a_id']);

				}
				
				
				//echo "<pre>";print_r($data);exit;
				$this->load->view('bio_medical/overall_hospital_waste',$data);
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
							
							$this->load->library('ciqrcode');
							$params['data'] =$add_bio_medical;
							$params['level'] = 'H';
							$params['size'] = 5;
							$params['cachedir'] = FCPATH.'assets/bio_medical_barcodes/';
							$path_img=microtime().'.png';
							$path='assets/bio_medical_barcodes/'.$path_img;
							$params['savename'] =FCPATH.$path;
							$this->ciqrcode->generate($params);
							$update_data=array(
							'barcode'=>$path_img,
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
	//for govt
	public function waste()
	{	
			if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			if($admindetails['role']==5){
				$post=$this->input->post();
				$login_id=base64_decode($this->uri->segment(3));
				if($login_id==''){
					$a_id=$post['a_id'];
					$data['a_id']=$post['a_id'];
				}else{
					$a_id=$login_id;
					$data['a_id']=$login_id;
				}
				
				//echo $a_id;exit;
				
				if(isset($post['from_date']) && $post['from_date']!='' || isset($post['to_date']) && $post['to_date']!=''){
					
					$data['waste_list']=$this->Hospital_model->get_hospital_wise_waste_with_dates($a_id,$post['from_date'],$post['to_date']);
					//echo '<pre>';print_r($data);exit;
				}else{
					$data['waste_list']=$this->Hospital_model->get_hospital_wise_waste_list($a_id);

				}
				
				
				//echo "<pre>";print_r($data);exit;
				$this->load->view('admin/govt/overall_hospital_waste',$data);
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
	public function wasteimages()
	{	
		if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			if($admindetails['role']==5 || $admindetails['role']==1){
				$login_id=base64_decode($this->uri->segment(3));
				if($login_id==''){
					$a_id=$admindetails['a_id'];
				}else{
					$a_id=$login_id;
				}
				$this->load->model('Govt_model');
				$data['waste_imgs']=$this->Govt_model->get_hospital_wise_waste_img_list($a_id);
				//echo $this->db->last_query();
				//echo "<pre>";print_r($data);exit;
				$this->load->view('admin/govt/overall_hospital_waste_image',$data);
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
	
	public  function cron(){
		$this->load->model('Govt_model');
		$hos_list=$this->Govt_model->get_hospital_wise_waste_for_invoice();
		if(isset($hos_list) && count($hos_list)>0){
			foreach($hos_list as $lis){
				$post=$this->input->post();
					$this->load->model('Mobile_model');
					$data['details']=$this->Mobile_model->get_all_hospital_details($lis['h_id']);
					$g4_plant_email=$this->Mobile_model->get_plant_details($data['details']['create_by']);
		
					$data['garbage_details']=$lis;
					$data['garbage_details']['invoice_id']=$lis['h_id'].'_'.$lis['date'];
					//echo '<pre>';print_r($data);exit;
					$path = rtrim(FCPATH,"/");
					$file_name = $data['details']['hospital_name'].'_'.$data['details']['h_id'].'_'.$lis['date'].'.pdf';                
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
					'hos_id'=>$lis['h_id'],
					'invoice_file'=>$file_name,
					'invoice_name'=>$data['details']['hospital_name'].'_'.$data['details']['h_id'].'_'.$lis['date'],
					'date'=>$lis['date'],
					'created_at'=>date('Y-m-d H:i:s'),
					);
					$check=$this->Hospital_model->check_invoice_sent_or_not($lis['h_id'],$lis['date'],$update_data['invoice_name']);
					//echo '<pre>';print_r($check);exit;
					if(count($check)==0){
					$this->Hospital_model->insert_invoice_name($update_data);
					$this->email->set_newline("\r\n");
					$this->email->from('admin@medspace.com');
					$this->email->to($data['details']['email']);
					 $this->email->cc($g4_plant_email['email']);
					$this->email->subject($data['details']['hospital_name'].' Inovice');
					$this->email->message('Current Address:'.$lis['current_address'].' .Please find out below attachment');
					$this->email->attach($pdfFilePath);
					$this->email->send();
					}
			}
		}
		//exit;
	}
	
	
}
