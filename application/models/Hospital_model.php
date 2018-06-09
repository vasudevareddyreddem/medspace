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
	
	

}