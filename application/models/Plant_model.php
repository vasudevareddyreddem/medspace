<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Plant_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	public function get_all_plants_list($admin_id){
		$this->db->select('*')->from('plant');		
		$this->db->where('create_by', $admin_id);
		$this->db->where('status!=',2);
		$this->db->order_by('p_id','desc');
        return $this->db->get()->result_array();	
	}
	public function get_plant_details($p_id){
		$this->db->select('*')->from('plant');		
		$this->db->where('p_id', $p_id);
        return $this->db->get()->row_array();	
	}
	public function update_plant_details($p_id,$data){
		$this->db->where('p_id',$p_id);
    	return $this->db->update("plant",$data);
	}
	public function update_admin_details($a_id,$data){
		$this->db->where('a_id',$a_id);
    	return $this->db->update("admin",$data);
	}
	public function check_email_exits($email){
		$sql = "SELECT admin.a_id FROM admin WHERE a_email_id ='".$email."'";
		return $this->db->query($sql)->row_array();	
	}
	
	public function save_plant($data){
		$this->db->insert('plant', $data);
		return $insert_id = $this->db->insert_id();
	}
	public function waste_plant($data){
		$this->db->insert('waste', $data);
		return $insert_id = $this->db->insert_id();
	}
	public function save_disposal($data){
		$this->db->insert('disposal', $data);
		return $insert_id = $this->db->insert_id();
	}
	
	public function get_truck_details($r_id,$created_by){
		$this->db->select('trucks.truck_reg_no,trucks.t_id,trucks.description,trucks.route_no,trucks.driver_name,trucks.driver_mobile')->from('trucks');		
		$this->db->where('truck_reg_no', $r_id);
		$this->db->where('create_by', $created_by);
        return $this->db->get()->row_array();	
	}
	public function get_disposal_list($a_id){
		$this->db->select('*')->from('disposal');		
		$this->db->where('disposal.create_by', $a_id);
        return $this->db->get()->result_array();	
	}
	public function get_waste_details_list($a_id){
		$this->db->select('waste.*,trucks.truck_reg_no,trucks.driver_name,trucks.driver_mobile')->from('waste');
		$this->db->join('trucks', 'trucks.t_id = waste.truck_id', 'left');
		$this->db->where('waste.create_by', $a_id);
        return $this->db->get()->result_array();	
	}
	
	public  function get_bio_medical_waste_list($id){
		$this->db->select('plant_bio_medical_waste.*,hospital_list.hospital_name')->from('plant_bio_medical_waste');
		$this->db->join('hospital_list', 'hospital_list.h_id = plant_bio_medical_waste.hos_bio_m_id', 'left');

		$this->db->where('plant_bio_medical_waste.create_by', $id);
		return $this->db->get()->result_array();
	}
	public  function get_bio_medical_waste_print_details($id){
		$this->db->select('plant_bio_medical_waste.*,hospital_list.hospital_name,hospital_list.type,hospital_list.mobile,hospital_list.email,hospital_list.address1,hospital_list.address2,hospital_list.city,hospital_list.state,hospital_list.country,hospital_list.pincode,hospital_list.hospital_id,plant.disposal_plant_name')->from('plant_bio_medical_waste');
		$this->db->join('hospital_list', 'hospital_list.h_id = plant_bio_medical_waste.hos_bio_m_id', 'left');
		$this->db->join('plant', 'plant.a_id = plant_bio_medical_waste.create_by', 'left');
		$this->db->where('plant_bio_medical_waste.id', $id);
		return $this->db->get()->row_array();
	}
	public function update_bio_medical_invoice_name($id,$data){
		$this->db->where('id',$id);
		return $this->db->update('plant_bio_medical_waste',$data);
		
	}
	
	/* print strickes purpose*/
	public  function get_hcf_plant_list($admin_id){
		$this->db->select('h_id,a_id,hospital_name')->from('hospital_list');
		$this->db->where('status',1);
		$this->db->where('create_by', $admin_id);
		return $this->db->get()->result_array();
	}
	public  function get_cbwtf_list($admin_id){
		$this->db->select('p_id,a_id,disposal_plant_name')->from('plant');
		$this->db->where('status',1);
		$this->db->where('create_by', $admin_id);
		return $this->db->get()->result_array();
	}
	
	public  function get_hcf_details($hcf_id){
		$this->db->select('h_id,a_id,hospital_name,barcode,barcodetext')->from('hospital_list');
		$this->db->where('h_id',$hcf_id);
		return $this->db->get()->row_array();
	}
	public  function get_cbwtf_details($cbwtf_id){
		$this->db->select('p_id,a_id,disposal_plant_name')->from('plant');
		$this->db->where('p_id',$cbwtf_id);
		return $this->db->get()->row_array();
	}
	
	public  function get_created_by_id($a_id){
		$this->db->select('p_id,a_id,create_by')->from('plant');
		$this->db->where('status',1);
		$this->db->where('a_id', $a_id);
		return $this->db->get()->row_array();
	}
	
	

}