<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hospital_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	public function get_all_hospital_list($admin_id){
		$this->db->select('*')->from('hospital_list');		
		$this->db->where('create_by', $admin_id);
		$this->db->where('status !=', 2);
		$this->db->order_by('create_by',"DESC");
        return $this->db->get()->result_array();	
	}
	public function get_hospital_details($h_id){
		$this->db->select('*')->from('hospital_list');		
		$this->db->where('h_id', $h_id);
        return $this->db->get()->row_array();	
	}
	public function update_hospital_details($h_id,$data){
		$this->db->where('h_id',$h_id);
    	return $this->db->update("hospital_list",$data);
	}
	public function update_admin_details($a_id,$data){
		$this->db->where('a_id',$a_id);
    	return $this->db->update("admin",$data);
	}
	public function check_email_exits($email){
		$sql = "SELECT admin.a_id FROM admin WHERE a_email_id ='".$email."'";
		return $this->db->query($sql)->row_array();	
	}
	
	
	public function get_hospital_invoice_list_details($h_id){
		$this->db->select('*')->from('hospital_waste');		
		$this->db->where('h_id', $h_id);
        return $this->db->get()->result_array();	
	}
	public function save_bio_medical_waste($data){
		$this->db->insert('bio_medical_waste', $data);
		return $insert_id = $this->db->insert_id();
	}
	public  function update_barcode($id,$data){
		$this->db->where('id',$id);
		return $this->db->update('bio_medical_waste',$data);
		
	}
	
	public function get_bio_medical_waste_list($a_id){
		
		$this->db->select('bio_medical_waste.*,admin.profile_pic,hospital_list.hospital_name,hospital_list.address1,hospital_list.address2,hospital_list.city,hospital_list.state,hospital_list.country,hospital_list.pincode')->from('bio_medical_waste');
		$this->db->join('hospital_list ', 'hospital_list.a_id = bio_medical_waste.create_by', 'left');
		$this->db->join('admin ', 'admin.a_id = bio_medical_waste.create_by', 'left');
		$this->db->where('bio_medical_waste.create_by',$a_id);
		$this->db->order_by('bio_medical_waste.id',"desc");
		return $this->db->get()->result_array();
		
	}
	public function get_bio_medical_details($b_id){
		
		$this->db->select('bio_medical_waste.*,admin.profile_pic,hospital_list.hospital_name,hospital_list.address1,hospital_list.address2,hospital_list.city,hospital_list.state,hospital_list.country,hospital_list.pincode')->from('bio_medical_waste');
		$this->db->join('hospital_list ', 'hospital_list.a_id = bio_medical_waste.create_by', 'left');
		$this->db->join('admin ', 'admin.a_id = bio_medical_waste.create_by', 'left');
		$this->db->where('bio_medical_waste.id',$b_id);
		return $this->db->get()->row_array();
		
	}
	
	

}