<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . 'libraries/REST_Controller.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Mobile extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
		$this->load->library('email');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('security');
		$this->load->model('Mobile_model');
		$this->load->library('zend');
		$this->load->library('zip');
    }

  

    
	 public function user_login_post()
    {
        
        $email=$this->post('email_id');
        $password=$this->post('password');
		if($email ==''){
		$message = array('status'=>0,'message'=>'Email is required');
		$this->response($message, REST_Controller::HTTP_OK);			
		}if($password ==''){
		$message = array('status'=>0,'message'=>'Password is required');
		$this->response($message, REST_Controller::HTTP_OK);			
		}
		$useremail = $this->security->sanitize_filename($email, TRUE);
		$check_login=$this->Mobile_model->check_login_details($useremail,md5($password));
			if(count($check_login)>0){
				if($check_login['status']!=0){
					$message = array('status'=>1,'userdetails'=>$check_login,'message'=>'User successfully Login');
					$this->response($message, REST_Controller::HTTP_OK);
				}else{
					
					$message = array('status'=>0,'message'=>'Your account is blocked. Plase conatact admin.');
					$this->response($message, REST_Controller::HTTP_OK);
				}
					
			}else{
				$message = array('status'=>0,'message'=>'Login Details are wrong. Plase try again.');
				$this->response($message, REST_Controller::HTTP_OK);
			}

	}
	
	
	public function barcode_scan_post()
    {
		$userid=$this->post('barcode_id');
		if($userid ==''){
		$message = array('status'=>0,'message'=>'Barcode Id is required');
		$this->response($message, REST_Controller::HTTP_OK);			
		}
		$user_details=$this->Mobile_model->get_hospital_details($userid);
		if(count($user_details)>0){
					$message = array('status'=>1,'userdetails'=>$user_details,'profilepath'=>base_url('assets/files/'),'barcodepath'=>base_url('assets/hospital_barcodes/'),'message'=>'Hospital details are found');
					$this->response($message, REST_Controller::HTTP_OK);
				}else{
					$message = array('status'=>0,'message'=>'Hospital id is wrong. Please  try again once');
					$this->response($message, REST_Controller::HTTP_OK);
				}
	}
	
	public function addgarbage_post(){
		$userid=$this->post('a_id');
		$hospital_id=$this->post('hospital_id');
		$genaral_waste_kgs=$this->post('genaral_waste_kgs');
		$genaral_waste_qty=$this->post('genaral_waste_qty');
		$infected_plastics_kgs=$this->post('infected_plastics_kgs');
		$infected_plastics_qty=$this->post('infected_plastics_qty');
		$infected_waste_kgs=$this->post('infected_waste_kgs');
		$infected_waste_qty=$this->post('infected_waste_qty');
		$glassware_watse_kgs=$this->post('glassware_watse_kgs');
		$glassware_watse_qty=$this->post('glassware_watse_qty');
		$current_address=$this->post('current_address');
		if($userid ==''){
		$message = array('status'=>0,'message'=>'User Id is required');
		$this->response($message, REST_Controller::HTTP_OK);			
		}if($hospital_id ==''){
		$message = array('status'=>0,'message'=>'Hospital Id is required');
		$this->response($message, REST_Controller::HTTP_OK);			
		}if($genaral_waste_kgs ==''){
		$message = array('status'=>0,'message'=>'Genaral Waste kgs is required');
		$this->response($message, REST_Controller::HTTP_OK);			
		}if($genaral_waste_qty ==''){
		$message = array('status'=>0,'message'=>'Genaral Waste qty is required');
		$this->response($message, REST_Controller::HTTP_OK);			
		}if($infected_plastics_kgs ==''){
		$message = array('status'=>0,'message'=>'Infected Plastics kgs is required');
		$this->response($message, REST_Controller::HTTP_OK);			
		}if($infected_plastics_qty ==''){
		$message = array('status'=>0,'message'=>'Infected Plastics qty is required');
		$this->response($message, REST_Controller::HTTP_OK);			
		}if($infected_waste_kgs ==''){
		$message = array('status'=>0,'message'=>'Infected Waste kgs is required');
		$this->response($message, REST_Controller::HTTP_OK);			
		}if($infected_waste_qty ==''){
		$message = array('status'=>0,'message'=>'Infected Waste qty is required');
		$this->response($message, REST_Controller::HTTP_OK);			
		}if($glassware_watse_kgs ==''){
		$message = array('status'=>0,'message'=>'Glassware Waste kgs is required');
		$this->response($message, REST_Controller::HTTP_OK);			
		}if($glassware_watse_qty ==''){
		$message = array('status'=>0,'message'=>'Glassware Waste qty is required');
		$this->response($message, REST_Controller::HTTP_OK);			
		}if($current_address ==''){
		$message = array('status'=>0,'message'=>'Current Address qty is required');
		$this->response($message, REST_Controller::HTTP_OK);			
		}
		$addgarbage=array(
		'h_id'=>$hospital_id,
		'genaral_waste_kgs'=>$genaral_waste_kgs,
		'genaral_waste_qty'=>$genaral_waste_qty,
		'infected_plastics_kgs'=>$infected_plastics_kgs,
		'infected_plastics_qty'=>$infected_plastics_qty,
		'infected_waste_kgs'=>$infected_waste_kgs,
		'infected_waste_qty'=>$infected_waste_qty,
		'glassware_watse_kgs'=>$glassware_watse_kgs,
		'glassware_watse_qty'=>$glassware_watse_qty,
		'current_address'=>$current_address,
		'status'=>1,
		'create_at'=>date('Y-m-d H:i:s'),
		'create_by'=>$userid,
		);
	$add_garbage=$this->Mobile_model->save_garbage_data($addgarbage);
		if(count($add_garbage)>0){
			
			
			/*pdf*/
			$post=$this->input->post();
					$data['details']=$this->Mobile_model->get_all_hospital_details($hospital_id);
					$data['garbage_details']=$addgarbage;
					$data['garbage_details']['invoice_id']=$add_garbage;
					//echo '<pre>';print_r($data);exit;
					$path = rtrim(FCPATH,"/");
					$file_name = $data['details']['hospital_name'].'_'.$data['details']['h_id'].'_'.$add_garbage.'.pdf';                
					$data['page_title'] = $data['details']['hospital_name'].'invoice'; // pass data to the view
					$pdfFilePath = $path."/assets/invoices/".$file_name;
					ini_set('memory_limit','320M'); // boost the memory limit if it's low <img src="https://s.w.org/images/core/emoji/72x72/1f609.png" alt="??" draggable="false" class="emoji">
					$html = $this->load->view('admin/pdf', $data, true); // render the view into HTML
					echo '<pre>';print_r($html);exit;
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
					$this->email->set_newline("\r\n");
					$this->email->from('admin@medspace.com');
					$this->email->to($data['details']['email']);
					$this->email->subject($data['details']['hospital_name'].' Inovice');
					$this->email->message('Please find out below attachment');
					$this->email->attach($pdfFilePath);
					$this->email->send();
					//redirect("/assets/patient_bills/".$file_name);
			/*pdf*/
			
			
			
			
			
					$message = array('status'=>1,'a_id'=>$userid,'h_id'=>$hospital_id,'message'=>'Garbage successfully added');
					$this->response($message, REST_Controller::HTTP_OK);
				}else{
					$message = array('status'=>0,'message'=>'Hospital id is wrong. Please  try again once');
					$this->response($message, REST_Controller::HTTP_OK);
				}
		
		
	}
	public function send_image_post(){
		$userid=$this->post('a_id');
		$hospital_id=$this->post('hospital_id');
		$text=$this->post('text');
		if($userid ==''){
		$message = array('status'=>0,'message'=>'User Id is required');
		$this->response($message, REST_Controller::HTTP_OK);			
		}if($hospital_id ==''){
		$message = array('status'=>0,'message'=>'Hospital Id is required');
		$this->response($message, REST_Controller::HTTP_OK);			
		}if($text ==''){
		$message = array('status'=>0,'message'=>'Text is required');
		$this->response($message, REST_Controller::HTTP_OK);			
		}
		if(count($_FILES)==0){
			$message = array('status'=>0,'message'=>'upload image is required');
			$this->response($message, REST_Controller::HTTP_OK);	
		}
		$pic=$_FILES['image']['name'];
		$picname = str_replace(" ", "", $pic);
		$imagename=microtime().basename($picname);
		$imgname = str_replace(" ", "", $imagename);
		if(move_uploaded_file($_FILES['image']['tmp_name'], 'assets/hospital-waste-images/'.$imgname)){
			$addimg=array(
			'hos_id'=>$hospital_id,
			'image'=>$imgname,
			'text'=>$text,
			'create_at'=>date('Y-m-d H:i:s'),
			'creayte_by'=>$userid,
			);
			$save_img=$this->Mobile_model->save_waste_image($addimg);
			if(count($save_img)>0){
					$data['details']=$this->Mobile_model->get_all_hospital_details($hospital_id);
					$pdfFilePath=base_url("/assets/hospital-waste-images/".$imgname);
					$this->email->set_newline("\r\n");
					$this->email->from('admin@medspace.com');
					$this->email->to($data['details']['email']);
					$this->email->subject($text);
					$this->email->message($text.'Please find out below attachment');
					$this->email->attach($pdfFilePath);
					$this->email->send();
					$message = array('status'=>1,'a_id'=>$userid,'hospital_id'=>$hospital_id,'message'=>'Image successfully sent');
					$this->response($message, REST_Controller::HTTP_OK);
			}else{
				$message = array('status'=>0,'message'=>'Technical problem will occurred .Please try again');
				$this->response($message, REST_Controller::HTTP_OK);
			}
			
			
			
			
		}else{
			
			$message = array('status'=>0,'message'=>'Technical problem will occurred .Please try again');
				$this->response($message, REST_Controller::HTTP_OK);
		}

		
	//echo '<pre>';print_r($_FILES);exit;
		
	}
	
	
	
	

}
