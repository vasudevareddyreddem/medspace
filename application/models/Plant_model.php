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
		$this->db->where('status !=', 2);
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
	
	public function get_truck_details($r_id){
		$this->db->select('trucks.truck_reg_no,trucks.t_id,trucks.description,trucks.route_no,trucks.driver_name,trucks.driver_mobile')->from('trucks');		
		$this->db->where('truck_reg_no', $r_id);
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
		$this->db->select('*')->from('plant_bio_medical_waste');
		$this->db->where('plant_bio_medical_waste.create_by', $id);
		return $this->db->get()->result_array();
	}
	
	

}