<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mobile_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}

	public function check_login_details($email,$pwd){
		$sql = "SELECT a_id,role,name,email_id,status FROM admin WHERE (email_id='".$email."' AND password='".$pwd."') OR (mobile='".$email."' AND password='".$pwd."')";
		return $this->db->query($sql)->row_array();
	}
	public function check_login_with_barcode($code){
		$sql = "SELECT a_id,role,name,email_id,status FROM admin WHERE qr_code_text='".$code."'";
		return $this->db->query($sql)->row_array();
	}
	public function get_hospital_details($a_id){
		$this->db->select('hospital_list.h_id,hospital_list.a_id,hospital_list.hospital_name,hospital_list.hospital_id,hospital_list.mobile,hospital_list.email,hospital_list.address,hospital_list.address1,hospital_list.address2,hospital_list.city,hospital_list.state,hospital_list.country,hospital_list.pincode,hospital_list.barcode,admin.profile_pic')->from('hospital_list');		
		$this->db->join('admin', 'admin.a_id = hospital_list.a_id', 'left');

		$this->db->where('hospital_list.barcodetext', $a_id);
		return $this->db->get()->row_array();
	}
	public function get_all_hospital_details($h_id){
		$this->db->select('*')->from('hospital_list');		
		$this->db->where('hospital_list.h_id', $h_id);
		return $this->db->get()->row_array();
	}
	public function save_garbage_data($data){
		$this->db->insert('hospital_waste', $data);
		return $insert_id = $this->db->insert_id();
	}
	public function update_invoice_name($u_id,$data){
		$this->db->where('id', $u_id);
		return $this->db->update('hospital_waste', $data);
	}
	public function save_waste_image($data){
		$this->db->insert('hospital_waste_images', $data);
		return $insert_id = $this->db->insert_id();
	}
	/* bio medical waste*/
	public  function get_bio_medical_waste_details($bar_id){
		$this->db->select('hospital_list.h_id,hospital_list.hospital_name,bio_medical_waste.no_of_bags,bio_medical_waste.no_of_kgs,bio_medical_waste.color_type,bio_medical_waste.weight_type,bio_medical_waste.barcode,bio_medical_waste.create_at,bio_medical_waste.id')->from('bio_medical_waste');
		$this->db->join('hospital_list', 'hospital_list.a_id = bio_medical_waste.create_by', 'left');
		$this->db->where('bio_medical_waste.id', $bar_id);
		return $this->db->get()->row_array();
	}
	public  function get_Hospital_waste_details($bar_id){
		$this->db->select('hospital_list.h_id,hospital_list.hospital_name,bio_medical_waste.no_of_bags,bio_medical_waste.no_of_kgs,bio_medical_waste.color_type,bio_medical_waste.weight_type,bio_medical_waste.barcode,bio_medical_waste.create_at,bio_medical_waste.id')->from('bio_medical_waste');
		$this->db->join('hospital_list', 'hospital_list.a_id = bio_medical_waste.create_by', 'left');
		$this->db->where('hospital_list.barcodetext', $bar_id);
		return $this->db->get()->row_array();
	}
	public  function save_plant_biomedical_waste($data){
		$this->db->insert("plant_bio_medical_waste",$data);
		return $this->db->insert_id();
		
	}
	public  function get_bio_waste_details($bar_id){
		$this->db->select('*')->from('bio_medical_waste');
		$this->db->where('bio_medical_waste.id', $bar_id);
		return $this->db->get()->row_array();
	}
	public  function get_bio_medical_list($id){
		$this->db->select('plant_bio_medical_waste.no_of_bags,plant_bio_medical_waste.no_of_kgs,plant_bio_medical_waste.color_type,plant_bio_medical_waste.weight_type,plant_bio_medical_waste.edited,plant_bio_medical_waste.create_at,hospital_list.hospital_name')->from('plant_bio_medical_waste');
		$this->db->join('hospital_list', 'hospital_list.h_id = plant_bio_medical_waste.hos_bio_m_id', 'left');
		$this->db->where('plant_bio_medical_waste.create_by', $id);
		return $this->db->get()->result_array();
	}
	public  function datewise_bio_medical_data($hos_name,$date){
		$this->db->select('plant_bio_medical_waste.no_of_bags,plant_bio_medical_waste.no_of_kgs,plant_bio_medical_waste.color_type,plant_bio_medical_waste.weight_type,plant_bio_medical_waste.edited,plant_bio_medical_waste.create_at')->from('plant_bio_medical_waste');
		$this->db->join('hospital_list', 'hospital_list.h_id = plant_bio_medical_waste.hos_bio_m_id', 'left');
		$this->db->where('hospital_list.hospital_name', $hos_name);
		//$this->db->where('plant_bio_medical_waste.create_at', $date);
		$this->db->where("DATE_FORMAT(plant_bio_medical_waste.create_at,'%Y-%m-%d')", $date);
		return $this->db->get()->result_array();	
	}
	
	public  function get_plant_details($created_by){
		$this->db->select('p_id,email,disposal_plant_name,address1,address2,city,state,pincode,country,mobile,logo,mobile')->from('plant');
		$this->db->where('plant.create_by', $created_by);
		$this->db->where('plant.status',1);
		$this->db->order_by('plant.p_id','desc');
		return $this->db->get()->row_array();
	}
	
	public function get_wast_previous_data($scan_code){
		$this->db->select('id,total')->from('hospital_waste');
		$this->db->where('hospital_waste.scan_code', $scan_code);
		return $this->db->get()->row_array();
	}
	public function get_check_wast_previous_data($scan_code){
		$this->db->select('id,total')->from('hospital_waste');
		$this->db->where('hospital_waste.scan_code', $scan_code);
		$this->db->where('hospital_waste.crosscheck_total !=','');
		return $this->db->get()->row_array();
	}
	public function update_garbage_data($waset_id,$data){
		$this->db->where('id',$waset_id);
		return $this->db->update('hospital_waste',$data);
	}
	// hospital id purpose
	public  function get_hospital_ids_details($barcode){
		$this->db->select('h_id,a_id,barcodetext')->from('hospital_list');
		$this->db->where('hospital_list.barcodetext', $barcode);
		return $this->db->get()->row_array();
	}
	// waste Details purpose
	public  function get_wateid_details($id){
		$this->db->select('*')->from('hospital_waste');
		$this->db->where('hospital_waste.id', $id);
		return $this->db->get()->row_array();
	}
	// waste Details purpose
	public  function get_all_wateid_details($id){
		$this->db->select('id,genaral_waste_kgs,genaral_waste_qty,infected_plastics_kgs,infected_plastics_qty,infected_waste_kgs,infected_waste_qty,infected_c_waste_kgs,infected_c_waste_qty,glassware_watse_kgs,glassware_watse_qty,total')->from('hospital_waste');
		$this->db->where('hospital_waste.id', $id);
		return $this->db->get()->row_array();
	}
	public  function get_check_wateid_details($id){
		$this->db->select('*')->from('hospital_waste');
		$this->db->where('hospital_waste.id', $id);
		$this->db->where('crosscheck_total!=','');
		return $this->db->get()->row_array();
	}
	// waste id list 
	public  function get_waste_ids_list($h_id){
		$this->db->select('hospital_waste.id as waste_id,hospital_waste.date,hospital_waste.h_id,hospital_list.hospital_name')->from('hospital_waste');
		$this->db->join('hospital_list', 'hospital_list.h_id = hospital_waste.h_id', 'left');
		$this->db->where('hospital_waste.h_id', $h_id);
		return $this->db->get()->result_array();
	}
	public  function save_tracking_location($d){
			$this->db->insert("track_location",$d);
			return $this->db->insert_id();
	}
	
	
}