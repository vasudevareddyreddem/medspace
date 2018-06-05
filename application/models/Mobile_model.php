<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mobile_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}

	public function check_login_details($email,$pwd){
		$this->db->select('admin.a_id,admin.role,admin.name,admin.email_id,admin.status')->from('admin');		
		$this->db->where('email_id', $email);
		$this->db->where('password', $pwd);
		return $this->db->get()->row_array();
	}
	public function get_hospital_details($a_id){
		$this->db->select('hospital_list.h_id,hospital_list.a_id,hospital_list.hospital_name,hospital_list.hospital_id,hospital_list.mobile,hospital_list.email,hospital_list.address,hospital_list.address1,hospital_list.address2,hospital_list.city,hospital_list.state,hospital_list.country,hospital_list.pincode,hospital_list.barcode,admin.profile_pic')->from('hospital_list');		
		$this->db->join('admin', 'admin.a_id = hospital_list.a_id', 'left');

		$this->db->where('hospital_list.a_id', $a_id);
		return $this->db->get()->row_array();
	}
	public function get_all_hospital_details($h_id){
		$this->db->select('')->from('hospital_list');		
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
}