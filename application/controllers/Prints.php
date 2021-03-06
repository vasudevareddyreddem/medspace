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
				$this->load->model('Mobile_model');
				$data['plant_details']=$this->Mobile_model->get_plant_details($data['hospital_detail']['create_by']);
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
	public function print_stickers()
	{	
		if($this->session->userdata('userdetails'))
		{
			
			$post=$this->input->post();
			$admindetails=$this->session->userdata('userdetails');
			if($post['category_type']=='Yellow(C)'){
				$p_color='Yellow';
			}else{
				$p_color=$post['category_type'];
			}
			$hcf_details=$this->Plant_model->get_hcf_details($post['hcf_name']);
			$cbwtf_details=$this->Plant_model->get_cbwtf_details($post['cbwtf_id']);
			//echo '<pre>';print_r($hcf_details);exit;
			if(isset($post['sticker_size']) && $post['sticker_size']==9){
				//echo '<pre>';print_r($post);exit;
				$pt_cnt=$this->Admin_model->ptype_count($post['category_type'],$post['hcf_name']);
				$o_cnt=isset($pt_cnt['cnt'])?$pt_cnt['cnt']+1:'1';
				$cnt=str_pad($o_cnt, 5, "00000", STR_PAD_LEFT);
				for ($k = 0 ; $k < 48; $k++){
						$this->load->library('ciqrcode');
						$params['data'] =$hcf_details['h_id'].'_'.$post['category_type'].'_'.microtime();
						$params['level'] = 'H';
						$params['size'] = 10;
						$params['cachedir'] = FCPATH.'assets/hospital_waste_barcodes/';
						$path_img=microtime().'.png';
						$path='assets/hospital_waste_barcodes/'.$path_img;
						$params['savename'] =FCPATH.$path;
						$g=$this->ciqrcode->generate($params);
					$print_data=array(
					'h_name'=>isset($hcf_details['hospital_name'])?$hcf_details['hospital_name']:'',
					'barcode'=>isset($hcf_details['barcode'])?$hcf_details['barcode']:'',
					'barcodetext'=>isset($hcf_details['barcodetext'])?$hcf_details['barcodetext']:'',
					'category'=>isset($p_color)?$p_color:'',
					'cbwtf'=>isset($cbwtf_details['disposal_plant_name'])?$cbwtf_details['disposal_plant_name']:'',
					'barcode'=>isset($path_img)?$path_img:'',
					'type'=>isset($post['category_type'])?$post['category_type']:'',
					'ptcnt'=>isset($cnt)?str_pad($cnt, 5, '00000', STR_PAD_LEFT):'',
					);
					$details[]=$print_data;
				$cnt ++;
				}
				if($pt_cnt['cnt']==''){
					$p_t=0;
				}else{
					$p_t=$pt_cnt['cnt'];
				}
					$a_d=array(
						'type'=>isset($post['category_type'])?$post['category_type']:'',
						'hos_id'=>isset($post['hcf_name'])?$post['hcf_name']:'',
						'tnum'=>isset($p_t)?$p_t.'-'.($cnt-1):'',
						'num'=>48,
						'created_at'=>date('Y-m-d H:i:s'),
						'created_by'=>$admindetails['a_id'],
						);
						//echo '<pre>';print_r($a_d);exit;
						$this->Admin_model->save_type_count($a_d);
						$data['print_details']=array_chunk($details,2);
					//echo '<pre>';print_r($data);exit;
				$this->load->view('admin/100x50',$data);
				$this->load->view('html/footer');
				
			}else if(isset($post['sticker_size']) && $post['sticker_size']==8){
				//echo '<pre>';print_r($post);exit;
				$pt_cnt=$this->Admin_model->ptype_count($post['category_type'],$post['hcf_name']);
				$o_cnt=isset($pt_cnt['cnt'])?$pt_cnt['cnt']+1:'1';
				$cnt=str_pad($o_cnt, 5, "00000", STR_PAD_LEFT);
				for ($k = 0 ; $k < 48; $k++){
						$this->load->library('ciqrcode');
						$params['data'] =$hcf_details['h_id'].'_'.$post['category_type'].'_'.microtime();
						$params['level'] = 'H';
						$params['size'] = 10;
						$params['cachedir'] = FCPATH.'assets/hospital_waste_barcodes/';
						$path_img=microtime().'.png';
						$path='assets/hospital_waste_barcodes/'.$path_img;
						$params['savename'] =FCPATH.$path;
						$g=$this->ciqrcode->generate($params);
					$print_data=array(
					'h_name'=>isset($hcf_details['hospital_name'])?$hcf_details['hospital_name']:'',
					'barcode'=>isset($hcf_details['barcode'])?$hcf_details['barcode']:'',
					'barcodetext'=>isset($hcf_details['barcodetext'])?$hcf_details['barcodetext']:'',
					'category'=>isset($p_color)?$p_color:'',
					'cbwtf'=>isset($cbwtf_details['disposal_plant_name'])?$cbwtf_details['disposal_plant_name']:'',
					'barcode'=>isset($path_img)?$path_img:'',
					'type'=>isset($post['category_type'])?$post['category_type']:'',
					'ptcnt'=>isset($cnt)?str_pad($cnt, 5, '00000', STR_PAD_LEFT):'',
					);
					$details[]=$print_data;
				$cnt ++;
				}
				if($pt_cnt['cnt']==''){
					$p_t=0;
				}else{
					$p_t=$pt_cnt['cnt'];
				}
					$a_d=array(
						'type'=>isset($post['category_type'])?$post['category_type']:'',
						'hos_id'=>isset($post['hcf_name'])?$post['hcf_name']:'',
						'tnum'=>isset($p_t)?$p_t.'-'.($cnt-1):'',
						'num'=>48,
						'created_at'=>date('Y-m-d H:i:s'),
						'created_by'=>$admindetails['a_id'],
						);
						//echo '<pre>';print_r($a_d);exit;
						$this->Admin_model->save_type_count($a_d);
						$data['print_details']=array_chunk($details,4);
						//echo '<pre>';print_r($data);exit;
				$this->load->view('admin/45d',$data);
				$this->load->view('html/footer');
				
			}else if(isset($post['sticker_size']) && $post['sticker_size']==7){
				//echo '<pre>';print_r($post);exit;
				$pt_cnt=$this->Admin_model->ptype_count($post['category_type'],$post['hcf_name']);
				$o_cnt=isset($pt_cnt['cnt'])?$pt_cnt['cnt']+1:'1';
				$cnt=str_pad($o_cnt, 5, "00000", STR_PAD_LEFT);
				for ($k = 0 ; $k < $post['sticker_cont']; $k++){
						$this->load->library('ciqrcode');
						$params['data'] =$hcf_details['h_id'].'_'.$post['category_type'].'_'.microtime();
						$params['level'] = 'H';
						$params['size'] = 10;
						$params['cachedir'] = FCPATH.'assets/hospital_waste_barcodes/';
						$path_img=microtime().'.png';
						$path='assets/hospital_waste_barcodes/'.$path_img;
						$params['savename'] =FCPATH.$path;
						$g=$this->ciqrcode->generate($params);
					$print_data=array(
					'h_name'=>isset($hcf_details['hospital_name'])?$hcf_details['hospital_name']:'',
					'barcode'=>isset($hcf_details['barcode'])?$hcf_details['barcode']:'',
					'barcodetext'=>isset($hcf_details['barcodetext'])?$hcf_details['barcodetext']:'',
					'category'=>isset($p_color)?$p_color:'',
					'cbwtf'=>isset($cbwtf_details['disposal_plant_name'])?$cbwtf_details['disposal_plant_name']:'',
					'barcode'=>isset($path_img)?$path_img:'',
					'type'=>isset($post['category_type'])?$post['category_type']:'',
					'ptcnt'=>isset($cnt)?str_pad($cnt, 5, '00000', STR_PAD_LEFT):'',
					);
					$details[]=$print_data;
				$cnt ++;
				}
				if($pt_cnt['cnt']==''){
					$p_t=0;
				}else{
					$p_t=$pt_cnt['cnt'];
				}
					$a_d=array(
						'type'=>isset($post['category_type'])?$post['category_type']:'',
						'hos_id'=>isset($post['hcf_name'])?$post['hcf_name']:'',
						'tnum'=>isset($p_t)?$p_t.'-'.($cnt-1):'',
						'num'=>isset($post['sticker_cont'])?$post['sticker_cont']:'',
						'created_at'=>date('Y-m-d H:i:s'),
						'created_by'=>$admindetails['a_id'],
						);
						//echo '<pre>';print_r($a_d);exit;
						$this->Admin_model->save_type_count($a_d);
					$data['print_details']=$details;
				//echo '<pre>';print_r($data);exit;
				$this->load->view('admin/50x50',$data);
				$this->load->view('html/footer');
				
			}else if(isset($post['sticker_size']) && $post['sticker_size']==6){
				$pt_cnt=$this->Admin_model->ptype_count($post['category_type'],$post['hcf_name']);
				$o_cnt=isset($pt_cnt['cnt'])?$pt_cnt['cnt']+1:'1';
				$cnt=str_pad($o_cnt, 5, "00000", STR_PAD_LEFT);
				for ($k = 0 ; $k < $post['sticker_cont']; $k++){
						$this->load->library('ciqrcode');
						$params['data'] =$hcf_details['h_id'].'_'.$post['category_type'].'_'.microtime();
						$params['level'] = 'H';
						$params['size'] = 10;
						$params['cachedir'] = FCPATH.'assets/hospital_waste_barcodes/';
						$path_img=microtime().'.png';
						$path='assets/hospital_waste_barcodes/'.$path_img;
						$params['savename'] =FCPATH.$path;
						$g=$this->ciqrcode->generate($params);
					$print_data=array(
					'h_name'=>isset($hcf_details['hospital_name'])?$hcf_details['hospital_name']:'',
					'barcode'=>isset($hcf_details['barcode'])?$hcf_details['barcode']:'',
					'barcodetext'=>isset($hcf_details['barcodetext'])?$hcf_details['barcodetext']:'',
					'category'=>isset($p_color)?$p_color:'',
					'cbwtf'=>isset($cbwtf_details['disposal_plant_name'])?$cbwtf_details['disposal_plant_name']:'',
					'barcode'=>isset($path_img)?$path_img:'',
					'type'=>isset($post['category_type'])?$post['category_type']:'',
					'ptcnt'=>isset($cnt)?str_pad($cnt, 5, '00000', STR_PAD_LEFT):'',
					);
					$details[]=$print_data;
				
				$cnt++;}
				if($pt_cnt['cnt']==''){
					$p_t=0;
				}else{
					$p_t=$pt_cnt['cnt'];
				}
				
					$a_d=array(
						'type'=>isset($post['category_type'])?$post['category_type']:'',
						'hos_id'=>isset($post['hcf_name'])?$post['hcf_name']:'',
						'tnum'=>isset($p_t)?$p_t.'-'.$cnt:'',
						'num'=>isset($post['sticker_cont'])?$post['sticker_cont']:'',
						'created_at'=>date('Y-m-d H:i:s'),
						'created_by'=>$admindetails['a_id'],
						);
						//echo '<pre>';print_r($a_d);exit;
						$this->Admin_model->save_type_count($a_d);
				$data['print_details']=array_chunk($details,2);
				//echo '<pre>';print_r($data);exit;
				$this->load->view('admin/38x25',$data);
				$this->load->view('html/footer');
				
			}else if(isset($post['sticker_size']) && $post['sticker_size']==5){
				$pt_cnt=$this->Admin_model->ptype_count($post['category_type'],$post['hcf_name']);
				//echo '<pre>';print_r($pt_cnt);exit;
				$o_cnt=isset($pt_cnt['cnt'])?$pt_cnt['cnt']+1:'1';
				$cnt=str_pad($o_cnt, 5, "00000", STR_PAD_LEFT);
				for ($k = 0 ; $k < 48; $k++){
						$this->load->library('ciqrcode');
						$params['data'] =$hcf_details['h_id'].'_'.$post['category_type'].'_'.microtime();
						$params['level'] = 'H';
						$params['size'] = 10;
						$params['cachedir'] = FCPATH.'assets/hospital_waste_barcodes/';
						$path_img=microtime().'.png';
						$path='assets/hospital_waste_barcodes/'.$path_img;
						$params['savename'] =FCPATH.$path;
						$g=$this->ciqrcode->generate($params);
					$print_data=array(
					'h_name'=>isset($hcf_details['hospital_name'])?$hcf_details['hospital_name']:'',
					'barcode'=>isset($hcf_details['barcode'])?$hcf_details['barcode']:'',
					'barcodetext'=>isset($hcf_details['barcodetext'])?$hcf_details['barcodetext']:'',
					'category'=>isset($p_color)?$p_color:'',
					'cbwtf'=>isset($cbwtf_details['disposal_plant_name'])?$cbwtf_details['disposal_plant_name']:'',
					'barcode'=>isset($path_img)?$path_img:'',
					'type'=>isset($post['category_type'])?$post['category_type']:'',
					'ptcnt'=>isset($cnt)?str_pad($cnt, 5, '00000', STR_PAD_LEFT):'',
					);
					$details[]=$print_data;
				$cnt++;}
				if($pt_cnt['cnt']==''){
					$p_t=0;
				}else{
					$p_t=$pt_cnt['cnt'];
				}
				$a_d=array(
						'type'=>isset($post['category_type'])?$post['category_type']:'',
						'hos_id'=>isset($post['hcf_name'])?$post['hcf_name']:'',
						'tnum'=>isset($pt_cnt['cnt'])?$pt_cnt['cnt'].'-'.($cnt-1):'',
						'num'=>48,
						'created_at'=>date('Y-m-d H:i:s'),
						'created_by'=>$admindetails['a_id'],
						);
						//echo '<pre>';print_r($a_d);exit;
						$this->Admin_model->save_type_count($a_d);
				$data['print_details']=array_chunk($details,4);
				//echo '<pre>';print_r($data);exit;
				$this->load->view('admin/48x24',$data);
				$this->load->view('html/footer');
				
			}else if(isset($post['sticker_size']) && $post['sticker_size']==4){
				$pt_cnt=$this->Admin_model->ptype_count($post['category_type'],$post['hcf_name']);
				$o_cnt=isset($pt_cnt['cnt'])?$pt_cnt['cnt']+1:'1';
				$cnt=str_pad($o_cnt, 5, "00000", STR_PAD_LEFT);
				for ($k = 0 ; $k < 14; $k++){
						$this->load->library('ciqrcode');
						$params['data'] =$hcf_details['h_id'].'_'.$post['category_type'].'_'.microtime();
						$params['level'] = 'H';
						$params['size'] = 10;
						$params['cachedir'] = FCPATH.'assets/hospital_waste_barcodes/';
						$path_img=microtime().'.png';
						$path='assets/hospital_waste_barcodes/'.$path_img;
						$params['savename'] =FCPATH.$path;
						$g=$this->ciqrcode->generate($params);
					$print_data=array(
					'h_name'=>isset($hcf_details['hospital_name'])?$hcf_details['hospital_name']:'',
					'barcode'=>isset($hcf_details['barcode'])?$hcf_details['barcode']:'',
					'barcodetext'=>isset($hcf_details['barcodetext'])?$hcf_details['barcodetext']:'',
					'category'=>isset($p_color)?$p_color:'',
					'cbwtf'=>isset($cbwtf_details['disposal_plant_name'])?$cbwtf_details['disposal_plant_name']:'',
					'barcode'=>isset($path_img)?$path_img:'',
					'type'=>isset($post['category_type'])?$post['category_type']:'',
					'ptcnt'=>isset($cnt)?str_pad($cnt, 5, '00000', STR_PAD_LEFT):'',
					);
					$details[]=$print_data;
				
				$cnt++;}
				if($pt_cnt['cnt']==''){
					$p_t=0;
				}else{
					$p_t=$pt_cnt['cnt'];
				}
				$a_d=array(
						'type'=>isset($post['category_type'])?$post['category_type']:'',
						'hos_id'=>isset($post['hcf_name'])?$post['hcf_name']:'',
						'tnum'=>isset($p_t)?$p_t.'-'.($cnt-1):'',
						'num'=>15,
						'created_at'=>date('Y-m-d H:i:s'),
						'created_by'=>$admindetails['a_id'],
						);
						//echo '<pre>';print_r($a_d);exit;
						$this->Admin_model->save_type_count($a_d);
				$data['print_details']=array_chunk($details,2);
				//echo '<pre>';print_r($data);exit;
				$this->load->view('admin/100x40',$data);
				//$this->load->view('html/footer');
				
			}else if($post['sticker_size'] && $post['sticker_size']==3){
				$pt_cnt=$this->Admin_model->ptype_count($post['category_type'],$post['hcf_name']);
				$o_cnt=isset($pt_cnt['cnt'])?$pt_cnt['cnt']+1:'1';
				$cnt=str_pad($o_cnt, 5, "00000", STR_PAD_LEFT);
				for ($k = 0 ; $k < 48; $k++){
						$this->load->library('ciqrcode');
						$params['data'] =$hcf_details['h_id'].'_'.$post['category_type'].'_'.microtime();
						$params['level'] = 'H';
						$params['size'] = 10;
						$params['cachedir'] = FCPATH.'assets/hospital_waste_barcodes/';
						$path_img=microtime().'.png';
						$path='assets/hospital_waste_barcodes/'.$path_img;
						$params['savename'] =FCPATH.$path;
						$this->ciqrcode->generate($params);
					$print_data=array(
					'h_name'=>isset($hcf_details['hospital_name'])?$hcf_details['hospital_name']:'',
					'barcode'=>isset($hcf_details['barcode'])?$hcf_details['barcode']:'',
					'barcodetext'=>isset($hcf_details['barcodetext'])?$hcf_details['barcodetext']:'',
					'category'=>isset($p_color)?$p_color:'',
					'cbwtf'=>isset($cbwtf_details['disposal_plant_name'])?$cbwtf_details['disposal_plant_name']:'',
					'barcode'=>isset($path_img)?$path_img:'',
					'type'=>isset($post['category_type'])?$post['category_type']:'',
					'ptcnt'=>isset($cnt)?str_pad($cnt, 5, '00000', STR_PAD_LEFT):'',
					);
					$details[]=$print_data;
					$cnt++;}
					if($pt_cnt['cnt']==''){
						$p_t=0;
					}else{
						$p_t=$pt_cnt['cnt'];
					}
						$a_d=array(
						 'type'=>isset($post['category_type'])?$post['category_type']:'',
						 'hos_id'=>isset($post['hcf_name'])?$post['hcf_name']:'',
						 'tnum'=>isset($p_t)?$p_t.'-'.($cnt-1):'',
						 'num'=>48,
						 'created_at'=>date('Y-m-d H:i:s'),
						 'created_by'=>$admindetails['a_id'],
						);
						//echo '<pre>';print_r($a_d);exit;
						$this->Admin_model->save_type_count($a_d);
				$data['print_details']=array_chunk($details,4);
				$this->load->view('admin/45x21',$data);
				
				
			}else{
				
					for ($k = 0 ; $k < 24; $k++){
						$this->load->library('ciqrcode');
						$params['data'] =$hcf_details['h_id'].'_'.$post['category_type'].'_'.microtime();
						$params['level'] = 'H';
						$params['size'] = 10;
						$params['cachedir'] = FCPATH.'assets/hospital_waste_barcodes/';
						$path_img=microtime().'.png';
						$path='assets/hospital_waste_barcodes/'.$path_img;
						$params['savename'] =FCPATH.$path;
						$this->ciqrcode->generate($params);
					$print_data=array(
					'h_name'=>isset($hcf_details['hospital_name'])?$hcf_details['hospital_name']:'',
					'barcode'=>isset($hcf_details['barcode'])?$hcf_details['barcode']:'',
					'barcodetext'=>isset($hcf_details['barcodetext'])?$hcf_details['barcodetext']:'',
					'category'=>isset($p_color)?$p_color:'',
					'cbwtf'=>isset($cbwtf_details['disposal_plant_name'])?$cbwtf_details['disposal_plant_name']:'',
					'barcode'=>isset($path_img)?$path_img:'',
					'type'=>isset($post['category_type'])?$post['category_type']:'',
					);
					$details[]=$print_data;
					}
				$data['print_details']=array_chunk($details,3);
				$this->load->view('admin/50x35',$data);
			}
			

		}else{
			$this->session->set_flashdata('loginerror','Please login to continue');
			redirect('admin');
		}
	}
	
	public  function prints(){
		if($this->session->userdata('userdetails'))
		{
					$admindetails=$this->session->userdata('userdetails');
					$post=$this->input->post();
					if(isset($post['h_ids']) && count($post['h_ids'])>0){
						foreach($post['h_ids'] as $li){
						$h_data[]=$this->Hospital_model->get_print_plan_hospital_details_pdf($li);
						}
						$data['print_details']=array_chunk($h_data,2);
					}else{
						$data['print_details']=array();
					}
					$this->load->model('Mobile_model');
					$data['plant_details']=$this->Mobile_model->get_plant_details($data['print_details'][0][0]['create_by']);

				$this->load->view('admin/print_all_hospital list',$data);
				//echo "<pre>";print_r($data);exit;


					
		}else{
			$this->session->set_flashdata('loginerror','Please login to continue');
			redirect('admin');
		}
	}
	
	
}
