<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prints extends CI_Controller {

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
		$this->load->model('Hospital_model');
		$this->load->library('zend');
		$this->load->model('Plant_model');
		
		
		}
	public function index()
	{	
			if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			if($admindetails['role']==2){
				$b_id=base64_decode($this->uri->segment(3));
				$data['bio_medicaldetails']=$this->Hospital_model->get_bio_medical_details($b_id);
				//echo "<pre>";print_r($data);exit;
				$this->load->view('bio_medical/print',$data);
			}else{
				$this->session->set_flashdata('error',"you don't have permission to access");
				redirect('dashboard');
			}

		}else{
			$this->session->set_flashdata('loginerror','Please login to continue');
			redirect('admin');
		}
	}
	
	public function barcode()
	{	
			if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			if($admindetails['role']==1){
				$h_id=base64_decode($this->uri->segment(3));
				$data['hospital_detail']=$this->Hospital_model->get_hospital_details($h_id);
				//echo "<pre>";print_r($data);exit;
				$this->load->view('admin/print',$data);
			}else{
				$this->session->set_flashdata('error',"you don't have permission to access");
				redirect('dashboard');
			}

		}else{
			$this->session->set_flashdata('loginerror','Please login to continue');
			redirect('admin');
		}
	}
	public function stickers_print()
	{	
			if($this->session->userdata('userdetails'))
		{
			
			$post=$this->input->post();
			//echo '<pre>';print_r($post);
			$hcf_details=$this->Plant_model->get_hcf_details($post['hcf_name']);
			$cbwtf_details=$this->Plant_model->get_cbwtf_details($post['cbwtf_id']);
			if(isset($post['sticker_size']) && $post['sticker_size']==4){
				for ($k = 0 ; $k < 14; $k++){
					$print_data=array(
					'h_name'=>isset($hcf_details['hospital_name'])?$hcf_details['hospital_name']:'',
					'barcode'=>isset($hcf_details['barcode'])?$hcf_details['barcode']:'',
					'barcodetext'=>isset($hcf_details['barcodetext'])?$hcf_details['barcodetext']:'',
					'category'=>isset($post['category_type'])?$post['category_type']:'',
					'cbwtf'=>isset($cbwtf_details['disposal_plant_name'])?$cbwtf_details['disposal_plant_name']:'',
					);
					$details[]=$print_data;
					}
				$data['print_details']=array_chunk($details,2);
				//echo '<pre>';print_r($data);exit;
				$this->load->view('admin/100x40',$data);
				//$this->load->view('html/footer');
				
			}else{
				
					for ($k = 0 ; $k < 32; $k++){
					$print_data=array(
					'h_name'=>isset($hcf_details['hospital_name'])?$hcf_details['hospital_name']:'',
					'barcode'=>isset($hcf_details['barcode'])?$hcf_details['barcode']:'',
					'barcodetext'=>isset($hcf_details['barcodetext'])?$hcf_details['barcodetext']:'',
					'category'=>isset($post['category_type'])?$post['category_type']:'',
					'cbwtf'=>isset($cbwtf_details['disposal_plant_name'])?$cbwtf_details['disposal_plant_name']:'',
					);
					$details[]=$print_data;
					}
				$data['print_details']=array_chunk($details,4);
				$this->load->view('admin/50x35',$data);
			}
			

		}else{
			$this->session->set_flashdata('loginerror','Please login to continue');
			redirect('admin');
		}
	}
	
	
}
