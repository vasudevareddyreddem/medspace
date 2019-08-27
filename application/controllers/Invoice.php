<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {

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
		$this->load->library('livemumtowordclsconvert');
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
	public function index()
	{	
			if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			if($admindetails['role']==1){
				$data['p_list']=$this->Plant_model->get_all_invoice_plants_list($admindetails['a_id']);
				$data['h_list']=$this->Plant_model->get_hcf_plant_list($admindetails['a_id']);
				//echo '<pre>';print_r($data);exit;
				$this->load->view('admin/add_inovice_form',$data);
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
	public function checkpermission()
	{
		
		if($this->session->userdata('userdetails'))
		{
			$admindetails=$this->session->userdata('userdetails');
			$this->load->view('admin/check_inovice_form');
			$this->load->view('html/footer');
		
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
			$details=$this->Admin_model->get_adminbasic_details($admindetails['a_id']);
			if($post['security_code']==$details['pincode']){
				redirect('invoice/index');
			}else{
				$this->session->set_flashdata('error','Your security code is wrong. Please try again');
				redirect('invoice/checkpermission');
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
				
				$data['invoice_list']=$this->Plant_model->get_invoice_list($admindetails['a_id']);
				//echo "<pre>";print_r($data);exit;
				$this->load->view('admin/list_inovice_form',$data);
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
	
	public function addpost(){
		if($this->session->userdata('userdetails'))
		{
					$admindetails=$this->session->userdata('userdetails');
					$post=$this->input->post();
					$data['details']=$post;
					$data['p_details']=$this->Plant_model->get_plant_details($post['plant_id']);
					$data['hcf_details']=$this->Plant_model->get_hcf_all_details($post['hcf_id']);
					$data['invoice_ids']=$this->Plant_model->get_invoices_id_next();
					//echo '<pre>';print_r($data);exit;
					$path = rtrim(FCPATH,"/");
					$file_name = $data['p_details']['p_id'].'_'.$data['hcf_details']['h_id'].time().'.pdf';                
					$data['page_title'] = $data['hcf_details']['hospital_name'].'invoice'; // pass data to the view
					$pdfFilePath = $path."/assets/invoices_form/".$file_name;
					ini_set('memory_limit','320M'); // boost the memory limit if it's low <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
					$html = $this->load->view('admin/invoice_form_pdf', $data, true); // render the view into HTML
					echo '<pre>';print_r($html);exit;
					$this->load->library('pdf');
					$pdf = $this->pdf->load();
					$pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date('M-d-Y')); // Add a footer for good measure <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
					$pdf->SetDisplayMode('fullpage');
					$pdf->list_indent_first_level = 0;	// 1 or 0 - whether to indent the first level of a list
					$pdf->WriteHTML($html); // write the HTML into the PDF
					$pdf->SetProtection(array('copy','print'), 'UserPassword', $data['p_details']['pincode']);
					$pdf->Output($pdfFilePath, 'F');
					$u_add=array(
						'invoice_id'=>isset($data['invoice_ids']['c_i_id'])?$data['invoice_ids']['c_i_id']+1:'',
						'e_way_bill_no'=>isset($post['e_way_bill_no'])?$post['e_way_bill_no']:'',
						'plant_id'=>isset($post['plant_id'])?$post['plant_id']:'',
						'hcf_id'=>isset($post['hcf_id'])?$post['hcf_id']:'',
						'invoice_name'=>isset($file_name)?$file_name:'',
						'pwd'=>isset($data['p_details']['pincode'])?$data['p_details']['pincode']:'',
						'created_at'=>date('Y-m-d H:i:s'),
						'created_by'=>$admindetails['a_id'],
						);
					$this->Plant_model->save_novice_list($u_add);
					//echo $this->db->last_query();exit;
					redirect("/assets/invoices_form/".$file_name);
				
			

		}else{
			$this->session->set_flashdata('loginerror','Please login to continue');
			redirect('admin');
		}
	}	
    

	
	
	
}
