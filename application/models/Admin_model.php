<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	public function update_admin_details($a_id,$data){
		$this->db->where('a_id',$a_id);
    	return $this->db->update("admin",$data);
	}
	public function update_login_details($a_id,$data){
		$this->db->where('a_id',$a_id);
    	return $this->db->update("hospital",$data);
	}
	public function check_email_exits($email){
		$sql = "SELECT admin.a_id FROM admin WHERE a_email_id ='".$email."'";
		return $this->db->query($sql)->row_array();	
	}
	
	public function login_details($data){
		$sql = "SELECT * FROM admin WHERE (email_id ='".$data['email']."' AND password='".$data['password']."' AND status=1) OR (username ='".$data['email']."' AND password='".$data['password']."' AND status=1)";
		return $this->db->query($sql)->row_array();	
	}
	public function email_check_details($email){
		$sql = "SELECT * FROM admin WHERE email_id ='".$email."'";
		return $this->db->query($sql)->row_array();	
	}
	public function get_admin_details($admin_id){
		$this->db->select('admin.a_id,admin.role,admin.email_id')->from('admin');		
		$this->db->where('a_id', $admin_id);
		$this->db->where('status', 1);
        return $this->db->get()->row_array();	
	}
	public function get_adminbasic_details($admin_id){
		$this->db->select('a_id,name,email_id,status,role')->from('admin');		
		$this->db->where('a_id', $admin_id);
        return $this->db->get()->row_array();	
	}
	public function get_all_admin_details($admin_id){
		$this->db->select('admin.a_id,admin.role,admin.email_id,admin.name,admin.profile_pic,roles.name')->from('admin');		
		$this->db->join('roles', 'roles.r_id = admin.role', 'left');
		$this->db->where('admin.a_id', $admin_id);
		$this->db->where('admin.status', 1);
        return $this->db->get()->row_array();	
	}
	public function save_admin($data){
		$this->db->insert('admin', $data);
		return $insert_id = $this->db->insert_id();
	}
	public function save_hospital($data){
		$this->db->insert('hospital_list', $data);
		return $insert_id = $this->db->insert_id();
	}
	public function save_truck($data){
		$this->db->insert('trucks', $data);
		return $insert_id = $this->db->insert_id();
	}
	

}