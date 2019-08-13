<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hospital_one extends CI_Controller {

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
		$this->load->model('Hospital_one_model','customers');
		if($this->session->userdata('userdetails'))
			{
			$data['u_url']= current_url();
			$admindetails=$this->session->userdata('userdetails');
			$data['details']=$this->Admin_model->get_adminbasic_details($admindetails['a_id']);
			if($data['details']['role']==5){
				$data['u_url']= base_url().$this->uri->segment(1).'/'.$this->uri->segment(2);
				$this->load->model('Govt_model');
				$data['admin_list']=$this->Govt_model->get_all_admins_list(2,$data['details']['state']);
			}
			//echo '<pre>';print_r($data);exit;
			$this->load->view('html/header',$data);
			}
		
		}
		
		
		
		public function ajax_list()
		{
		$admindetails=$this->session->userdata('userdetails');
		$list = $this->customers->get_all_waste_lsit($admindetails['a_id']);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $customers) {
			
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $customers->id;
			$row[] = $customers->h_id;
			$row[] = $customers->total;
			$row[] = $customers->create_at;
			$row[] = $customers->date;
			$row[] = $customers->scan_code;

			$data[] = $row;
		}

		$output = array(
						"draw" =>isset($_POST['draw'])?$_POST['draw']:0,
						"recordsTotal" => $this->customers->count_all($admindetails['a_id']),
						"recordsFiltered" => $this->customers->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);exit;
	}
	
		public function index()
		{
			$this->load->view('bio_medical/overall_hospital_waste');
			$this->load->view('html/footer');
		}

		
	
	
	
}
