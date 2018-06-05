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
	function get_profile_details($admin_id){
		$this->db->select('admin.a_id,admin.role,admin.email_id,admin.name,admin.profile_pic,roles.name')->from('admin');		
		$this->db->join('roles', 'roles.r_id = admin.role', 'left');
		$this->db->where('admin.a_id', $admin_id);
		$this->db->where('admin.status', 1);
        return $this->db->get()->row_array();	
	}
	public  function get_adminpassword_details($a_id){
		$this->db->select('admin.a_id,admin.email_id,admin.password')->from('admin');		
		$this->db->where('admin.a_id', $a_id);
        return $this->db->get()->row_array();	
	}
	public function get_plant_profile_details($a_id){
		$this->db->select('admin.a_id,admin.role,admin.profile_pic,plant.*')->from('admin');		
		$this->db->join('plant', 'plant.a_id = admin.a_id', 'left');
		$this->db->where('admin.a_id', $a_id);
		$this->db->where('admin.status', 1);
        return $this->db->get()->row_array();
	}
	public function get_trcuk_profile_details($a_id){
		$this->db->select('admin.a_id,admin.role,admin.profile_pic,trucks.*')->from('admin');		
		$this->db->join('trucks', 'trucks.a_id = admin.a_id', 'left');
		$this->db->where('admin.a_id', $a_id);
		$this->db->where('admin.status', 1);
        return $this->db->get()->row_array();
	}
	public function get_hospital_list_profile_details($a_id){
		$this->db->select('admin.a_id,admin.role,admin.profile_pic,hospital_list.*')->from('admin');		
		$this->db->join('hospital_list', 'hospital_list.a_id = admin.a_id', 'left');
		$this->db->where('admin.a_id', $a_id);
		$this->db->where('admin.status', 1);
        return $this->db->get()->row_array();
	}
	
	public function get_gen_waste_in_Kg_details($a_id){
		$this->db->select('SUM(gen_waste_in_Kg * gen_waste_in_qty)AS  gen_waste')->from('waste');		
		$this->db->where('waste.create_by', $a_id);
        return $this->db->get()->row_array();
	}
	public function get_inf_pla_waste_in_Kg_details($a_id){
		$this->db->select('sum(inf_pla_waste_in_Kg * inf_pla_waste_in_qty) as inf_pla_waste')->from('waste');		
		$this->db->where('waste.create_by', $a_id);
        return $this->db->get()->row_array();
	}
	public function get_inf_waste_in_Kg_details($a_id){
		$this->db->select('sum(inf_waste_in_Kg *inf_waste_in_qty) as inf_waste')->from('waste');		
		$this->db->where('waste.create_by', $a_id);
        return $this->db->get()->row_array();
	}
	public function get_glassware_waste_in_kg_details($a_id){
		$this->db->select('sum(glassware_waste_in_kg * glassware_waste_in_qty) as glassware_waste')->from('waste');		
		$this->db->where('waste.create_by', $a_id);
        return $this->db->get()->row_array();
	}
	
	/*plant graph */
	
	public function get_graph_gen_waste_in_Kg_details($a_id,$date){
		$this->db->select('create_at,(gen_waste_in_Kg*gen_waste_in_qty) as gen_waste_in_Kg')->from('waste');
		$this->db->where("DATE_FORMAT(waste.create_at,'%Y')", $date);
		$this->db->where('waste.create_by', $a_id);
        return $this->db->get()->result_array();
	}
	public function get_graph_inf_pla_waste_in_Kg_details($a_id,$date){
		$this->db->select('create_at,(inf_pla_waste_in_Kg * inf_pla_waste_in_qty) as inf_pla_waste_in_Kg')->from('waste');
		$this->db->where("DATE_FORMAT(waste.create_at,'%Y')", $date);
		$this->db->where('waste.create_by', $a_id);
        return $this->db->get()->result_array();
	}
	public function get_graph_inf_waste_in_Kg_details($a_id,$date){
		$this->db->select('create_at,(inf_waste_in_Kg*inf_waste_in_qty) as inf_waste_in_Kg ')->from('waste');
		$this->db->where("DATE_FORMAT(waste.create_at,'%Y')", $date);
		$this->db->where('waste.create_by', $a_id);
        return $this->db->get()->result_array();
	}
	public function get_graph_glassware_waste_in_kg_details($a_id,$date){
		$this->db->select('create_at,(glassware_waste_in_kg*glassware_waste_in_qty)as glassware_waste_in_kg')->from('waste');
		$this->db->where("DATE_FORMAT(waste.create_at,'%Y')", $date);
		$this->db->where('waste.create_by', $a_id);
        return $this->db->get()->result_array();
	}
	/*plant graph */
	
	/*admin dashboard*/
	
	public  function get_total_hospital($a_id){
		$this->db->select('count(hospital_list.h_id) as total_hos')->from('hospital_list');		
		$this->db->where('hospital_list.create_by', $a_id);
        return $this->db->get()->row_array();
	}
	public  function get_total_plants($a_id){
		$this->db->select('count(plant.p_id) as total_plants')->from('plant');		
		$this->db->where('plant.create_by', $a_id);
        return $this->db->get()->row_array();
	}
	public  function get_total_trucks($a_id){
		$this->db->select('count(trucks.t_id) as total_trucks')->from('trucks');		
		$this->db->where('trucks.create_by', $a_id);
        return $this->db->get()->row_array();
	}
	
	/*total waste*/
	public  function get_gen_waste(){
		$this->db->select('sum(waste.total_waste) as total')->from('waste');		
        return $this->db->get()->row_array();
	}
	public  function get_inf_pla_waste(){
		$this->db->select('sum(waste.inf_pla_waste_in_Kg) as inf_pla_waste,sum(waste.inf_pla_waste_in_qty) as inf_pla_waste_qty')->from('waste');		
        return $this->db->get()->row_array();
	}
	public  function get_inf_waste(){
		$this->db->select('sum(waste.inf_waste_in_Kg) as inf_waste,sum(waste.inf_waste_in_qty) as inf_waste_qty')->from('waste');		
        return $this->db->get()->row_array();
	}
	public  function get_glassware_waste(){
		$this->db->select('sum(waste.glassware_waste_in_kg) as glassware_waste,sum(waste.glassware_waste_in_qty) as glassware_waste_qty')->from('waste');		
        return $this->db->get()->row_array();
	}
	
	
	/*graph purpose*/
	
	public function get_graph_total_hospital_list($a_id,$date){
		$this->db->select('hospital_list.create_at')->from('hospital_list');
		$this->db->where("DATE_FORMAT(hospital_list.create_at,'%Y')", $date);
		$this->db->where('hospital_list.create_by', $a_id);
        return $this->db->get()->result_array();
	}
	public function get_graph_total_plants_list($a_id,$date){
		$this->db->select('plant.create_at')->from('plant');
		$this->db->where("DATE_FORMAT(plant.create_at,'%Y')", $date);
		$this->db->where('plant.create_by', $a_id);
        return $this->db->get()->result_array();
	}
	public function get_graph_total_truck_list($a_id,$date){
		$this->db->select('trucks.create_at')->from('trucks');
		$this->db->where("DATE_FORMAT(trucks.create_at,'%Y')", $date);
		$this->db->where('trucks.create_by', $a_id);
        return $this->db->get()->result_array();
	}
	public function get_graph_total_waste_list($a_id,$date){
		$this->db->select('waste.create_at,waste.gen_waste_in_Kg,waste.inf_pla_waste_in_Kg,waste.inf_waste_in_Kg,waste.glassware_waste_in_kg,waste.total_waste')->from('waste');
		$this->db->where("DATE_FORMAT(waste.create_at,'%Y')", $date);
		//$this->db->where('waste.create_by', $a_id);
		return $this->db->get()->result_array();
	}
	/*graph purpose*/
	
	/*admin dashboard*/
	
	
	/* hospital graph */
	public function get_hospital_graph_gen_waste_in_Kg_details($a_id,$date){
		$this->db->select('hospital_waste.create_at,hospital_waste.genaral_waste_kgs,hospital_waste.genaral_waste_qty')->from('hospital_waste');
		$this->db->where("DATE_FORMAT(hospital_waste.create_at,'%Y')", $date);
		$this->db->where('hospital_waste.h_id', $a_id);
        return $this->db->get()->result_array();
	}
	public function get_hospital_graph_inf_pla_waste_in_Kg_details($a_id,$date){
		$this->db->select('hospital_waste.create_at,hospital_waste.infected_plastics_kgs,hospital_waste.infected_plastics_qty')->from('hospital_waste');
		$this->db->where("DATE_FORMAT(hospital_waste.create_at,'%Y')", $date);
		$this->db->where('hospital_waste.h_id', $a_id);
        return $this->db->get()->result_array();
	}
	public function get_hospital_graph_inf_waste_in_Kg_details($a_id,$date){
		$this->db->select('hospital_waste.create_at,hospital_waste.infected_waste_kgs,hospital_waste.infected_waste_qty')->from('hospital_waste');
		$this->db->where("DATE_FORMAT(hospital_waste.create_at,'%Y')", $date);
		$this->db->where('hospital_waste.h_id', $a_id);
        return $this->db->get()->result_array();
	}
	public function get_hospital_graph_glassware_waste_in_kg_details($a_id,$date){
		$this->db->select('hospital_waste.create_at,hospital_waste.glassware_watse_kgs,hospital_waste.glassware_watse_qty')->from('hospital_waste');
		$this->db->where("DATE_FORMAT(hospital_waste.create_at,'%Y')", $date);
		$this->db->where('hospital_waste.h_id', $a_id);
        return $this->db->get()->result_array();
	}
	public function get_hospital_gen_waste_in_Kg_details($a_id){
		$this->db->select('sum(hospital_waste.genaral_waste_kgs) as gen_waste,sum(hospital_waste.genaral_waste_qty) as gen_waste_qty')->from('hospital_waste');		
		$this->db->where('hospital_waste.h_id', $a_id);
        return $this->db->get()->row_array();
	}
	public function get_hospital_inf_pla_waste_in_Kg_details($a_id){
		$this->db->select('sum(hospital_waste.infected_plastics_kgs) as inf_pla_waste,sum(hospital_waste.infected_plastics_qty) as inf_pla_waste_qty')->from('hospital_waste');		
		$this->db->where('hospital_waste.h_id', $a_id);
        return $this->db->get()->row_array();
	}
	public function get_hospital_inf_waste_in_Kg_details($a_id){
		$this->db->select('sum(hospital_waste.infected_waste_kgs) as inf_waste,sum(hospital_waste.infected_waste_qty) as inf_waste_qty')->from('hospital_waste');		
		$this->db->where('hospital_waste.h_id', $a_id);
        return $this->db->get()->row_array();
	}
	public function get_hospital_glassware_waste_in_kg_details($a_id){
		$this->db->select('sum(hospital_waste.glassware_watse_kgs) as glassware_waste,sum(hospital_waste.glassware_watse_qty) as glassware_waste_qty')->from('hospital_waste');		
		$this->db->where('hospital_waste.h_id', $a_id);
        return $this->db->get()->row_array();
	}
	
	public function get_hospital_details($a_id){
		$this->db->select('hospital_list.h_id')->from('hospital_list');		
		$this->db->where('hospital_list.a_id', $a_id);
        return $this->db->get()->row_array();
	}

}