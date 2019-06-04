<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dbcron extends CI_Controller {

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
			$data['u_url']= current_url();
			$admindetails=$this->session->userdata('userdetails');
			$data['details']=$this->Admin_model->get_adminbasic_details($admindetails['a_id']);
			if($data['details']['role']==5){
				$this->load->model('Govt_model');
				$data['admin_list']=$this->Govt_model->get_all_admins_list(2);
			}
			//echo '<pre>';print_r($data['details']);exit;
			$this->load->view('html/header',$data);
			}
		
		}
	
	public  function index(){
			if($this->session->userdata('userdetails'))
			{
				$admindetails=$this->session->userdata('userdetails');
				$hospital_list=$this->Admin_model->get_staging_hopital_list($admindetails['a_id']);
				
				$cnt=1;foreach($hospital_list as $list){
						$check_email=$this->Admin_model->email_check_details_staging($list['email']);
							if(count($check_email)>0){
									echo $list['h_id'];
									echo $list['email'];
							}else{
								$addhos=array(
								'name'=>isset($list['hospital_name'])?strtoupper($list['hospital_name']):'',
								'email_id'=>isset($list['email'])?$list['email']:'',
								'password'=>isset($list['org_password'])?md5($list['org_password']):'',
								'org_password'=>isset($list['org_password'])?$list['org_password']:'',
								'mobile'=>isset($list['mobile'])?$list['mobile']:'',
								'create_at'=>date('Y-m-d H:i:s'),
								'create_by'=>937,
								'status'=>1,
								'role'=>2
							);
							$hos_save=$this->Admin_model->save_admin1($addhos);
							if(count($hos_save)>0){
								
										$barcode_name = strtoupper(substr($list['hospital_name'], 0, 4));
										$this->zend->load('Zend/Barcode');
										$this->load->library('ciqrcode');
										$params['data'] =$barcode_name.$list['type'].$list['state'].$hos_save;
										$params['level'] = 'H';
										$params['size'] = 10;
										$params['cachedir'] = FCPATH.'assets/hospital_barcodes_backup/';
										$path_img=$cnt.time().'.png';
										$path='assets/hospital_barcodes_backup/'.$path_img;
										$params['savename'] =FCPATH.$path;
										$this->ciqrcode->generate($params);
										
										//$file = Zend_Barcode::draw('code128', 'image', array('text' => $barcode_name.$post['type'].$post['state'].$hos_save), array());
										//$code = time().$hos_save;
										//$store_image1 = imagepng($file, $this->config->item('documentroot')."assets/hospital_barcodes/{$code}.png");
										$addhospital=array(
											'a_id'=>isset($hos_save)?$hos_save:'',
											'hospital_name'=>isset($list['hospital_name'])?strtoupper($list['hospital_name']):'',
											'route_number'=>isset($list['route_number'])?$list['route_number']:'',
											'type'=>isset($list['type'])?$list['type']:'',
											'hospital_id'=>isset($hos_save)?$hos_save:'',
											'mobile'=>isset($list['mobile'])?$list['mobile']:'',
											'no_of_beds'=>isset($list['no_of_beds'])?$list['no_of_beds']:'',
											'email'=>isset($list['email'])?$list['email']:'',
											'address1'=>isset($list['address1'])?$list['address1']:'',
											'address2'=>isset($list['address2'])?$list['address2']:'',
											'city'=>isset($list['city'])?ucfirst($list['city']):'',
											'state'=>isset($list['state'])?$post['state']:'',
											'country'=>isset($list['country'])?ucfirst($post['country']):'',
											'pincode'=>isset($list['pincode'])?$post['pincode']:'',
											'status'=>1,
											'create_at'=>date('Y-m-d H:i:s'),
											'barcode'=>$path_img,
											'barcodetext'=>$barcode_name.$list['type'].$list['state'].$hos_save,
											'create_by'=>937
										);
										//echo '<pre>';print_r($addhospital);exit;
										$hospital_save=$this->Admin_model->save_hospital1($addhospital);
										echo '<pre>';print_r($hospital_save);
										
								
							}
					}
				$cnt++;}
				exit;
				
			
			}else{
			$this->session->set_flashdata('loginerror','Please login to continue');
			redirect('admin');
		}
	}
	
	public  function vehicals(){
			if($this->session->userdata('userdetails'))
			{
				$admindetails=$this->session->userdata('userdetails');
				$truck_list=$this->Admin_model->get_staging_trcuk_list($admindetails['a_id']);
				//echo '<pre>';print_r($truck_list);exit;
			
				$cnt=1;foreach($truck_list as $list){
						$check_email=$this->Admin_model->email_check_details_staging($list['email']);
							if(count($check_email)>0){
									echo $list['h_id'];
									echo $list['email'];
							}else{
								$addtruck=array(
									'name'=>isset($list['owner_name'])?strtoupper($list['owner_name']):'',
									'email_id'=>isset($list['email'])?$list['email']:'',
									'password'=>isset($list['org_password'])?md5($list['org_password']):'',
									'org_password'=>isset($list['org_password'])?$list['org_password']:'',
									'mobile'=>isset($list['driver_mobile'])?$list['driver_mobile']:'',
									'status'=>1,
									'role'=>3,
									'create_by'=>937
								);
								$ger_truck=$this->Admin_model->save_admin1($addtruck);
								if(count($ger_truck)>0){
									$addgarbagetruckl=array(
										'a_id'=>$ger_truck,
										'truck_reg_no'=>isset($list['truck_reg_no'])?$list['truck_reg_no']:'',
										'owner_name'=>isset($list['owner_name'])?strtoupper($list['owner_name']):'',
										'insurence_number'=>isset($list['insurence_number'])?$list['insurence_number']:'',
										'owner_mobile'=>isset($list['owner_mobile'])?$list['owner_mobile']:'',
										'driver_name'=>isset($list['driver_name'])?strtoupper($list['driver_name']):'',
										'driver_lic_no'=>isset($list['driver_lic_no'])?$list['driver_lic_no']:'',
										'driver_lic_bad_no'=>isset($list['driver_lic_bad_no'])?$list['driver_lic_bad_no']:'',
										'driver_mobile'=>isset($list['driver_mobile'])?$list['driver_mobile']:'',
										'route_no'=>isset($list['route_no'])?$list['route_no']:'',
										'description'=>isset($list['description'])?$list['description']:'',
										'email'=>isset($list['email'])?$list['email']:'',
										'address1'=>isset($list['address1'])?$list['address1']:'',
										'address2'=>isset($list['address2'])?$list['address2']:'',
										'city'=>isset($list['city'])?ucfirst($list['city']):'',
										'state'=>isset($list['state'])?$list['state']:'',
										'country'=>isset($list['country'])?ucfirst($list['country']):'',
										'pincode'=>isset($list['pincode'])?$list['pincode']:'',
										'status'=>1,
										'create_at'=>date('Y-m-d H:i:s'),
										'create_by'=>937
									);
									$truck_save=$this->Admin_model->save_truck1($addgarbagetruckl);
									echo '<pre>';print_r($truck_save);
								}
								
								
							}
							
				$cnt++;}
				//echo '<pre>';print_r($truck_list);exit;
				exit;
			}else{
			$this->session->set_flashdata('loginerror','Please login to continue');
			redirect('admin');
		}
	}
	
}
