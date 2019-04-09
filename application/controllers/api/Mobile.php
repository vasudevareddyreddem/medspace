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
		//echo '<pre>';print_r($check_login);exit;
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
					$message = array('status'=>1,'userdetails'=>$user_details,'profilepath'=>base_url('assets/files/'),'barcodepath'=>base_url('assets/hospital_barcodes/'),'message'=>'HCF details are found');
					$this->response($message, REST_Controller::HTTP_OK);
				}else{
					$message = array('status'=>0,'message'=>'Barcode Scan id is wrong. Please  try again once');
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
		'total'=>($genaral_waste_kgs*$genaral_waste_qty)+($infected_plastics_kgs*$infected_plastics_qty)+($infected_waste_kgs*$infected_waste_qty)+($glassware_watse_kgs*$glassware_watse_qty),
		'status'=>1,
		'date'=>date('Y-m-d'),
		'create_at'=>date('Y-m-d H:i:s'),
		'create_by'=>$userid,
		);
		$add_garbage=$this->Mobile_model->save_garbage_data($addgarbage);
		if(count($add_garbage)>0){
			
			
			/*pdf*/
			$post=$this->input->post();
					$data['details']=$this->Mobile_model->get_all_hospital_details($hospital_id);
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
					$this->email->set_newline("\r\n");
					$this->email->from('admin@medspace.com');
					$this->email->to($data['details']['email']);
					 $this->email->cc($g4_plant_email['email']);
					$this->email->subject($data['details']['hospital_name'].' Inovice');
					$this->email->message('Current Address:'.$current_address.' .Please find out below attachment');
					$this->email->attach($pdfFilePath);
					$this->email->send();
					//redirect("/assets/patient_bills/".$file_name);
			/*pdf*/
			
			
			
			
			
					$message = array('status'=>1,'a_id'=>$userid,'h_id'=>$hospital_id,'message'=>'Garbage successfully added');
					$this->response($message, REST_Controller::HTTP_OK);
				}else{
					$message = array('status'=>0,'message'=>'HCF  is wrong. Please  try again once');
					$this->response($message, REST_Controller::HTTP_OK);
				}
		
		
	}
	public function send_image_post(){
		$userid=$this->post('a_id');
		$hospital_id=$this->post('hospital_id');
		$text=$this->post('text');
		$address=$this->post('address');
		if($userid ==''){
		$message = array('status'=>0,'message'=>'User Id is required');
		$this->response($message, REST_Controller::HTTP_OK);			
		}if($hospital_id ==''){
		$message = array('status'=>0,'message'=>'Hospital Id is required');
		$this->response($message, REST_Controller::HTTP_OK);			
		}
		if($address==''){
		$message = array('status'=>0,'message'=>'Address is required');
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
			'text'=>isset($text)?$text:'',
			'address'=>isset($address)?$address:'',
			'create_at'=>date('Y-m-d H:i:s'),
			'creayte_by'=>$userid,
			);
			$save_img=$this->Mobile_model->save_waste_image($addimg);
			if(count($save_img)>0){
					$data['details']=$this->Mobile_model->get_all_hospital_details($hospital_id);
					$g4_plant_email=$this->Mobile_model->get_plant_details($data['details']['create_by']);
		
					$pdfFilePath=base_url("/assets/hospital-waste-images/".$imgname);
					$this->email->set_newline("\r\n");
					$this->email->from('admin@medspace.com');
					$this->email->to($data['details']['email']);
					 $this->email->cc($g4_plant_email['email']);
					$this->email->subject($text);
					$this->email->message($text.'. Address'.$address.'. Please find out below attachment');
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
	
	/* bio medical  post*/
	public function bio_medical_barcode_scan_post()
    {
		$barcode_id=$this->post('barcode_id');
		if($barcode_id ==''){
		$message = array('status'=>0,'message'=>'Barcode Id is required');
		$this->response($message, REST_Controller::HTTP_OK);			
		}
		$waste_details=$this->Mobile_model->get_bio_medical_waste_details($barcode_id);
		//echo $this->db->last_query();exit;
		
		//echo $this->db->last_query();exit;
		if(count($waste_details)>0){
					$message = array('status'=>1,'barcode_details'=>$waste_details,'barcodepath'=>base_url('assets/bio_medical_barcodes/'),'message'=>'Bio Medical Waste details are found');
					$this->response($message, REST_Controller::HTTP_OK);
				}else{
					$message = array('status'=>0,'message'=>'Barcode Scan id is wrong. Please  try again once');
					$this->response($message, REST_Controller::HTTP_OK);
				}
	}
	public function bio_medical_waste_update_post()
    {
		$userid=$this->post('id');
		$no_of_bags=$this->post('no_of_bags');
		$no_of_kgs=$this->post('no_of_kgs');
		$category=$this->post('category');
		$weight_type=$this->post('weight_type');
		$create_by=$this->post('create_by');
		if($userid ==''){
		$message = array('status'=>0,'message'=>'Id is required');
		$this->response($message, REST_Controller::HTTP_OK);			
		}if($no_of_bags ==''){
		$message = array('status'=>0,'message'=>'No of bags is required');
		$this->response($message, REST_Controller::HTTP_OK);			
		}if($no_of_kgs ==''){
		$message = array('status'=>0,'message'=>'No of kgs is required');
		$this->response($message, REST_Controller::HTTP_OK);			
		}if($category ==''){
		$message = array('status'=>0,'message'=>'Category is required');
		$this->response($message, REST_Controller::HTTP_OK);			
		}if($weight_type ==''){
		$message = array('status'=>0,'message'=>'Weight Type is required');
		$this->response($message, REST_Controller::HTTP_OK);			
		}if($create_by ==''){
		$message = array('status'=>0,'message'=>'Login User id is required');
		$this->response($message, REST_Controller::HTTP_OK);			
		}
		$waste_details=$this->Mobile_model->get_bio_waste_details($userid);
		if($waste_details['no_of_bags']!=$no_of_bags ||$waste_details['no_of_kgs']!=$no_of_kgs ||$waste_details['color_type']!=$category ||$waste_details['weight_type']!=$weight_type){
			$changes=1;
		}else{
			$changes=0;
		}
		$update_data=array(
		"hos_bio_m_id"=>isset($userid)?$userid:'',
		"no_of_bags"=>isset($no_of_bags)?$no_of_bags:'',
		"no_of_kgs"=>isset($no_of_kgs)?$no_of_kgs:'',
		"color_type"=>isset($category)?$category:'',
		"weight_type"=>isset($weight_type)?$weight_type:'',
		"edited"=>$changes,
		"status"=>1,
		"create_at"=>date('Y-m-d H:i:s'),
		"create_by"=>isset($create_by)?$create_by:'',
		);
		
		//echo '<pre>';print_r($update_data);exit;
		$update=$this->Mobile_model->save_plant_biomedical_waste($update_data);
		if(count($update)>0){
					$message = array('status'=>1,'id'=>$update,'message'=>'Bio Medical Waste details are successfully updated');
					$this->response($message, REST_Controller::HTTP_OK);
				}else{
					$message = array('status'=>0,'message'=>'Technical problem will occurred .Please try again');
					$this->response($message, REST_Controller::HTTP_OK);
				}
	}
	public function bio_medical_waste_list_post()
    {
		$id=$this->post('id');
		if($id==''){
		$message = array('status'=>0,'message'=>'User Id is required');
		$this->response($message, REST_Controller::HTTP_OK);			
		}
		$waste_list=$this->Mobile_model->get_bio_medical_list($id);
		if(count($waste_list)>0){
					$message = array('status'=>1,'details'=>$waste_list,'message'=>'Bio Medical Waste details are found');
					$this->response($message, REST_Controller::HTTP_OK);
				}else{
					$message = array('status'=>0,'message'=>'Bio Medical waste are not found.Please  try again once');
					$this->response($message, REST_Controller::HTTP_OK);
				}
	}
	public function bio_medical_waste_search_post()
    {
		$hospital_name=$this->post('hospital_name');
		$date=$this->post('date');
		if($hospital_name==''){
		$message = array('status'=>0,'message'=>'Hospital name is required');
		$this->response($message, REST_Controller::HTTP_OK);			
		}
		if($date==''){
		$message = array('status'=>0,'message'=>'Date is required');
		$this->response($message, REST_Controller::HTTP_OK);			
		}else {
			if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$date)) {
				//return true;
			} else {
				$message = array('status'=>0,'message'=>'Date formate is wrog.example is 2018-06-24');
				$this->response($message, REST_Controller::HTTP_OK);
			}
		}
		$waste_list=$this->Mobile_model->datewise_bio_medical_data($hospital_name,$date);
		//echo $this->db->last_query();exit;
		if(count($waste_list)>0){
					$message = array('status'=>1,'details'=>$waste_list,'message'=>'Bio Medical Waste details are found');
					$this->response($message, REST_Controller::HTTP_OK);
				}else{
					$message = array('status'=>0,'message'=>'Bio Medical waste are not found.Please  try again once');
					$this->response($message, REST_Controller::HTTP_OK);
				}
	}
	/* bio medical  post*/
	
	//through barcode add waste 
	public function addwaste_post(){
		$userid=$this->post('a_id');
		$waste=$this->post('waste');
		$scan_code=$this->post('scan_code');
		$current_address=$this->post('current_address');
		if($userid ==''){
		$message = array('status'=>0,'message'=>'User Id is required');
		$this->response($message, REST_Controller::HTTP_OK);			
		}if($scan_code ==''){
		$message = array('status'=>0,'message'=>'Scan code is required');
		$this->response($message, REST_Controller::HTTP_OK);			
		}if($waste ==''){
		$message = array('status'=>0,'message'=>'Waste kgs is required');
		$this->response($message, REST_Controller::HTTP_OK);			
		}if($current_address ==''){
		$message = array('status'=>0,'message'=>'Current Address qty is required');
		$this->response($message, REST_Controller::HTTP_OK);			
		}
		
			$get_previou_data=$this->Mobile_model->get_wast_previous_data($scan_code);
			if(count($get_previou_data)>0){
				$message = array('status'=>0,'a_id'=>$userid,'message'=>'Qr code already scanned. Please use another qr code');
				$this->response($message, REST_Controller::HTTP_OK);
			}
			$hospital_id=$genaral_waste_qty=$genaral_waste_kgs=$infected_plastics_kgs=$infected_plastics_qty=$infected_waste_kgs=$infected_waste_qty=$glassware_watse_kgs=$glassware_watse_qty='';
			$w_da=explode('_',$waste);
			$hospital_id=$w_da[0];
			if($w_da[1]=='Yellow'){
				$infected_waste_kgs +=$w_da[3];
				$infected_waste_qty++;
			}else if($w_da[1]=='Red'){
				$infected_plastics_kgs =$w_da[3]++;
				$infected_plastics_qty++;
			}else if($w_da[1]=='Blue'){
				$glassware_watse_kgs =$w_da[3]++;
				$glassware_watse_qty++;
			}else if($w_da[1]=='White'){
				$genaral_waste_kgs =$w_da[3]++;
				$genaral_waste_qty++;
			}
			
		
		$addgarbage=array(
		'h_id'=>$hospital_id,
		'genaral_waste_kgs'=>isset($genaral_waste_kgs)?$genaral_waste_kgs:'0',
		'genaral_waste_qty'=>isset($genaral_waste_qty)?$genaral_waste_qty:'0',
		'infected_plastics_kgs'=>isset($infected_plastics_kgs)?$infected_plastics_kgs:'0',
		'infected_plastics_qty'=>isset($infected_plastics_qty)?$infected_plastics_qty:'0',
		'infected_waste_kgs'=>isset($infected_waste_kgs)?$infected_waste_kgs:'0',
		'infected_waste_qty'=>isset($infected_waste_qty)?$infected_waste_qty:'0',
		'glassware_watse_kgs'=>isset($glassware_watse_kgs)?$glassware_watse_kgs:'0',
		'glassware_watse_qty'=>isset($glassware_watse_qty)?$glassware_watse_qty:'0',
		'current_address'=>$current_address,
		'scan_code'=>$scan_code,
		'total'=>($genaral_waste_kgs)+($infected_plastics_kgs)+($infected_waste_kgs)+($glassware_watse_kgs),
		'status'=>1,
		'date'=>date('Y-m-d'),
		'create_at'=>date('Y-m-d H:i:s'),
		'create_by'=>$userid,
		);
		//echo '<pre>';print_r($addgarbage);exit;
		$add_garbage=$this->Mobile_model->save_garbage_data($addgarbage);
		if(count($add_garbage)>0){
				$message = array('status'=>1,'waste_id'=>$add_garbage,'a_id'=>$userid,'message'=>'Garbage successfully added');
				$this->response($message, REST_Controller::HTTP_OK);
		}else{
				$message = array('status'=>0,'message'=>'HCF  is wrong. Please  try again once');
				$this->response($message, REST_Controller::HTTP_OK);
		}
		
		
	}/* bio medical  post*/
	
	//through barcode add waste 
	public function scan_post(){
		$userid=$this->post('a_id');
		$scan_code=$this->post('scan_code');
		if($userid ==''){
		$message = array('status'=>0,'message'=>'User Id is required');
		$this->response($message, REST_Controller::HTTP_OK);			
		}if($scan_code ==''){
		$message = array('status'=>0,'message'=>'Scan code is required');
		$this->response($message, REST_Controller::HTTP_OK);			
		}
		 $get_previou_data=$this->Mobile_model->get_wast_previous_data($scan_code);
		 
		if(count($get_previou_data)>0){
				$message = array('status'=>1,'a_id'=>$userid, 'diff'=>'', 'total'=>strval($get_previou_data['total']), 'message'=>'details  are found');
				$this->response($message, REST_Controller::HTTP_OK);
		}else{
			$message = array('status'=>0,'a_id'=>$userid,'message'=>'Technical problem will occurred. Please try again');
			$this->response($message, REST_Controller::HTTP_OK);
		}
		  //echo '<pre>';print_r($get_previou_data);exit;
		
		
		
	}
	public function checkwaste_post(){
		$userid=$this->post('a_id');
		$waste=$this->post('waste');
		$scan_code=$this->post('scan_code');
		$current_address=$this->post('current_address');
		if($userid ==''){
		$message = array('status'=>0,'message'=>'User Id is required');
		$this->response($message, REST_Controller::HTTP_OK);			
		}if($scan_code ==''){
		$message = array('status'=>0,'message'=>'Scan code is required');
		$this->response($message, REST_Controller::HTTP_OK);			
		}if($waste ==''){
		$message = array('status'=>0,'message'=>'Waste kgs is required');
		$this->response($message, REST_Controller::HTTP_OK);			
		}if($current_address ==''){
		$message = array('status'=>0,'message'=>'Current Address qty is required');
		$this->response($message, REST_Controller::HTTP_OK);			
		}
		
		$get_previou_data=$this->Mobile_model->get_check_wast_previous_data($scan_code);
		if(count($get_previou_data)>0){
			$message = array('status'=>0,'a_id'=>$userid,'message'=>'Qr code already scanned. Please use another qr code');
			$this->response($message, REST_Controller::HTTP_OK);
		}
			$hospital_id=$genaral_waste_qty=$genaral_waste_kgs=$infected_plastics_kgs=$infected_plastics_qty=$infected_waste_kgs=$infected_waste_qty=$glassware_watse_kgs=$glassware_watse_qty='';
			$w_da=explode('_',$waste);
			//echo '<pre>';print_r($w_da);exit;
			$hospital_id=$w_da[0];
			if($w_da[1]=='Yellow'){
				$infected_waste_kgs +=$w_da[3];
				$infected_waste_qty++;
			}else if($w_da[1]=='Red'){
				$infected_plastics_kgs =$w_da[3]++;
				$infected_plastics_qty++;
			}else if($w_da[1]=='Blue'){
				$glassware_watse_kgs =$w_da[3]++;
				$glassware_watse_qty++;
			}else if($w_da[1]=='White'){
				$genaral_waste_kgs =$w_da[3]++;
				$genaral_waste_qty++;
			}
		
		$total_waste=(($genaral_waste_kgs)+($infected_plastics_kgs)+($infected_waste_kgs)+($glassware_watse_kgs));
		
		 $get_previou_data=$this->Mobile_model->get_wast_previous_data($scan_code);
		 if($get_previou_data['total']==$total_waste){
			 $msg='Previous total and present total waste are matched';
		 }else if($get_previou_data['total'] > $total_waste){
			 $msg='Previous total and present total waste are not matched';
		 }else if($get_previou_data['total']< $total_waste){
			 $msg='Previous total and present total waste are not matched';
		 }
		 $u_dat=array(
			'crosscheck_total'=>$total_waste,
			'updated_time'=>date('Y-m-d H:i:s'),		 
			'bio_genaral_waste_kgs'=>isset($genaral_waste_kgs)?$genaral_waste_kgs:'0',
			'bio_genaral_waste_qty'=>isset($genaral_waste_qty)?$genaral_waste_qty:'0',
			'bio_infected_plastics_kgs'=>isset($infected_plastics_kgs)?$infected_plastics_kgs:'0',
			'bio_infected_plastics_qty'=>isset($infected_plastics_qty)?$infected_plastics_qty:'0',
			'bio_infected_waste_kgs'=>isset($infected_waste_kgs)?$infected_waste_kgs:'0',
			'bio_infected_waste_qty'=>isset($infected_waste_qty)?$infected_waste_qty:'0',
			'bio_glassware_watse_kgs'=>isset($glassware_watse_kgs)?$glassware_watse_kgs:'0',
			'bio_glassware_watse_qty'=>isset($glassware_watse_qty)?$glassware_watse_qty:'0',
			'bio_current_address'=>$current_address,
			'updated_by'=>$userid,
		);
		$updat_garbage=$this->Mobile_model->update_garbage_data($get_previou_data['id'],$u_dat);
			
		if(count($updat_garbage)>0){
				$message = array('status'=>1,'a_id'=>$userid, 'diff'=>strval(($get_previou_data['total']-$total_waste)), 'total'=>strval($total_waste), 'message'=>$msg);
				$this->response($message, REST_Controller::HTTP_OK);
		}else{
			$message = array('status'=>0,'a_id'=>$userid,'message'=>'Technical problem will occurred. Please try again');
			$this->response($message, REST_Controller::HTTP_OK);
		}
		  //echo '<pre>';print_r($get_previou_data);exit;
		
		
		
	}
	public function waste_ids_post(){
		$hospital_qr_code=$this->post('hospital_bar_code');
		if($hospital_qr_code ==''){
		$message = array('status'=>0,'message'=>'Hospital Qr code is required');
		$this->response($message, REST_Controller::HTTP_OK);			
		}
		$hospital_id=$this->Mobile_model->get_hospital_ids_details($hospital_qr_code);
		if(count($hospital_id)>0){
			
				$waste_id=$this->Mobile_model->get_waste_ids_list($hospital_id['h_id']);
				if(count($waste_id)>0){
					$message = array('status'=>1,'h_id'=>$hospital_id['h_id'],'details'=>$waste_id,'message'=>'Hospital waste details are found');
					$this->response($message, REST_Controller::HTTP_OK);
					
				}else{
					$message = array('status'=>0,'h_id'=>$hospital_id['h_id'],'message'=>'Hospital having no waste ids. Please try again');
					$this->response($message, REST_Controller::HTTP_OK);
				}
				//echo '<pre>';print_r($waste_id);exit;
		}else{
			$message = array('status'=>0,'message'=>'Hospital details are not found. Please try again');
			$this->response($message, REST_Controller::HTTP_OK);
		}
		
	}
	public function waste_details_post(){
		$waste_id=$this->post('waste_id');
		if($waste_id ==''){
		$message = array('status'=>0,'message'=>'Waste id is required');
		$this->response($message, REST_Controller::HTTP_OK);			
		}
		$waste_details=$this->Mobile_model->get_all_wateid_details($waste_id);
		if(count($waste_details)>0){
			$message = array('status'=>1,'waste_id'=>$waste_id,'details'=>$waste_details,'message'=>'Hospital waste details are found');
			$this->response($message, REST_Controller::HTTP_OK);
				
				//echo '<pre>';print_r($waste_id);exit;
		}else{
			$message = array('status'=>0,'waste_id'=>'','details'=>(object)array(),'message'=>'waste details are not found. Please try again');
			$this->response($message, REST_Controller::HTTP_OK);
		}
		
	}
	public function waste_id_scan_post(){
		$userid=$this->post('a_id');
		$waste_id=$this->post('waste_id');
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
		}if($waste_id ==''){
			$message = array('status'=>0,'message'=>'Waste Id is required');
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
		$waste_details=$this->Mobile_model->get_wateid_details($waste_id);
		$check_details=$this->Mobile_model->get_check_wateid_details($waste_id);
		if(count($check_details)>0){
			$message = array('status'=>0,'a_id'=>$userid,'message'=>'Waste id already updated. Please use another waste id');
			$this->response($message, REST_Controller::HTTP_OK);
		}
		if(count($waste_details)>0){
				$updategarbage=array(
				'bio_genaral_waste_kgs'=>$genaral_waste_kgs,
				'bio_genaral_waste_qty'=>$genaral_waste_qty,
				'bio_infected_plastics_kgs'=>$infected_plastics_kgs,
				'bio_infected_plastics_qty'=>$infected_plastics_qty,
				'bio_infected_waste_kgs'=>$infected_waste_kgs,
				'bio_infected_waste_qty'=>$infected_waste_qty,
				'bio_glassware_watse_kgs'=>$glassware_watse_kgs,
				'bio_glassware_watse_qty'=>$glassware_watse_qty,
				'bio_current_address'=>$current_address,
				'crosscheck_total'=>($genaral_waste_kgs*$genaral_waste_qty)+($infected_plastics_kgs*$infected_plastics_qty)+($infected_waste_kgs*$infected_waste_qty)+($glassware_watse_kgs*$glassware_watse_qty),
				'updated_time'=>date('Y-m-d H:i:s'),
				'updated_by'=>$userid,
				);
				$update=$this->Mobile_model->update_garbage_data($waste_id,$updategarbage);
				//echo $this->db->last_query();exit;
				if(count($update)>0){
					$message = array('status'=>1,'a_id'=>$userid,'waste_id'=>$waste_id,'message'=>'Garbage successfully update');
					$this->response($message, REST_Controller::HTTP_OK);
				}else{
					$message = array('status'=>0,'message'=>'HCF  is wrong. Please  try again once');
					$this->response($message, REST_Controller::HTTP_OK);
				}
				
		}else{
			$message = array('status'=>0,'message'=>'Waste id are not found. Please try again');
			$this->response($message, REST_Controller::HTTP_OK);
		}
		
	}
	
	
	
	

}
