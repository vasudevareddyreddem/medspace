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
	public function get_hospital_details_pdf($admin_id){
		$this->db->select('*')->from('hospital_list');		
		$this->db->where('create_by', $admin_id);
		$this->db->where('status',1);
		$this->db->order_by('h_id',"asc");
        return $this->db->get()->result_array();	
	}
	public function get_print_plan_hospital_details_pdf($h_id){
		$this->db->select('*')->from('hospital_list');		
		$this->db->where('h_id', $h_id);
		$this->db->where('status',1);
        return $this->db->get()->row_array();	
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
		$this->db->select('hospital_waste.id,hospital_waste.h_id,hospital_waste.genaral_waste_kgs,hospital_waste.genaral_waste_qty,hospital_waste.infected_plastics_kgs,hospital_waste.infected_plastics_qty,hospital_waste.infected_waste_kgs,hospital_waste.infected_waste_qty,hospital_waste.infected_c_waste_kgs,hospital_waste.infected_c_waste_qty,hospital_waste.glassware_watse_kgs,hospital_waste.glassware_watse_qty,hospital_waste.create_at,hospital_waste.date,hospital_waste.create_by,hospital_waste.status,hospital_waste_invoice.invoice_name,hospital_waste_invoice.invoice_file')->from('hospital_waste');
		$this->db->join('hospital_waste_invoice ', 'hospital_waste_invoice.hos_wast_id = hospital_waste.id', 'left');
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
	
	public  function get_hospital_wise_waste_with_dates($a_id,$st,$from_date,$todate){
		$this->db->select("hw.id,hl.hospital_name,hl.type,hw.h_id,hw.date,hw.create_at,hw.updated_time,hw.current_address,hw.bio_current_address,sum(hw.genaral_waste_kgs) as genaral_waste_kg,sum(hw.genaral_waste_qty) as genaral_waste_qt,sum(hw.infected_plastics_kgs) as infected_plastics_kg,sum(hw.infected_plastics_qty) as infected_plastics_qt,sum(hw.infected_waste_kgs) as infected_waste_kg,sum(hw.infected_waste_qty) as infected_waste_qt,sum(hw.glassware_watse_kgs) as glassware_watse_kg,sum(hw.glassware_watse_qty) as glassware_watse_qt,sum(hw.total) as total,sum(hw.bio_genaral_waste_kgs) as bio_genaral_waste_kg,sum(hw.bio_genaral_waste_qty) as bio_genaral_waste_qt,sum(hw.bio_infected_plastics_kgs) as bio_infected_plastics_kg,sum(hw.bio_infected_plastics_qty) as bio_infected_plastics_qt,sum(hw.bio_infected_waste_kgs) as bio_infected_waste_kg,sum(hw.bio_infected_waste_qty) as bio_infected_waste_qt,sum(hw.bio_glassware_watse_kgs) as bio_glassware_watse_kg,sum(hw.bio_glassware_watse_qty) as bio_glassware_watse_qt,sum(hw.crosscheck_total) as bio_total,sum(hw.infected_c_waste_kgs) as infected_c_waste_kg,sum(hw.infected_c_waste_qty) as infected_c_waste_qt,sum(hw.bio_infected_c_waste_kgs) as bio_infected_c_waste_kg,sum(hw.bio_infected_c_waste_qty) as bio_infected_c_waste_qt,TIMEDIFF(if(hw.updated_time!='',hw.updated_time, NOW()),hw.create_at) as dif_hrs, REPLACE(TIMESTAMPDIFF(DAY,IF(hw.updated_time!='', `hw`.`updated_time`, NOW()), hw.create_at), '-', '') AS dif_day")->from('hospital_waste as hw');
		$this->db->join('hospital_list  as hl', 'hl.h_id = hw.h_id', 'left');
		$inbetweentime="date_format(hw.date,'%m-%d-%Y') BETWEEN '".$from_date."' AND '".$todate."'";
		$this->db->group_by('hw.date');
		$this->db->group_by('hw.h_id');
		$this->db->where('hl.create_by',$a_id);
		$this->db->where('hl.state',$st);
		$this->db->where($inbetweentime);
		return $this->db->get()->result_array();
	}
	public  function get_hospital_wise_waste_list($a_id,$st){
		$this->db->select("hw.id,hl.hospital_name,hl.type,hw.h_id,hw.date,hw.create_at,hw.updated_time,hw.current_address,hw.bio_current_address,sum(hw.genaral_waste_kgs) as genaral_waste_kg,sum(hw.genaral_waste_qty) as genaral_waste_qt,sum(hw.infected_plastics_kgs) as infected_plastics_kg,sum(hw.infected_plastics_qty) as infected_plastics_qt,sum(hw.infected_waste_kgs) as infected_waste_kg,sum(hw.infected_waste_qty) as infected_waste_qt,sum(hw.glassware_watse_kgs) as glassware_watse_kg,sum(hw.glassware_watse_qty) as glassware_watse_qt,sum(hw.total) as total,sum(hw.bio_genaral_waste_kgs) as bio_genaral_waste_kg,sum(hw.bio_genaral_waste_qty) as bio_genaral_waste_qt,sum(hw.bio_infected_plastics_kgs) as bio_infected_plastics_kg,sum(hw.bio_infected_plastics_qty) as bio_infected_plastics_qt,sum(hw.bio_infected_waste_kgs) as bio_infected_waste_kg,sum(hw.bio_infected_waste_qty) as bio_infected_waste_qt,sum(hw.bio_glassware_watse_kgs) as bio_glassware_watse_kg,sum(hw.bio_glassware_watse_qty) as bio_glassware_watse_qt,sum(hw.crosscheck_total) as bio_total,sum(hw.infected_c_waste_kgs) as infected_c_waste_kg,sum(hw.infected_c_waste_qty) as infected_c_waste_qt,sum(hw.bio_infected_c_waste_kgs) as bio_infected_c_waste_kg,sum(hw.bio_infected_c_waste_qty) as bio_infected_c_waste_qt,TIMEDIFF(if(hw.updated_time!='',hw.updated_time, NOW()),hw.create_at) as dif_hrs, REPLACE(TIMESTAMPDIFF(DAY,IF(hw.updated_time!='', `hw`.`updated_time`, NOW()), hw.create_at), '-', '') AS dif_day")->from('hospital_waste as hw');
		$this->db->join('hospital_list  as hl', 'hl.h_id = hw.h_id', 'left');
		$this->db->group_by('hw.date');
		$this->db->group_by('hw.h_id');
		$this->db->where('hl.create_by',$a_id);
		$this->db->where('hl.state',$st);
		return $this->db->get()->result_array();
	}
	public  function get_hospital_only_waste_with_dates($a_id,$from_date,$todate){
		$this->db->select("hw.id,hl.hospital_name,hl.type,hw.h_id,hw.date,hw.create_at,hw.updated_time,hw.current_address,hw.bio_current_address,sum(hw.genaral_waste_kgs) as genaral_waste_kg,sum(hw.genaral_waste_qty) as genaral_waste_qt,sum(hw.infected_plastics_kgs) as infected_plastics_kg,sum(hw.infected_plastics_qty) as infected_plastics_qt,sum(hw.infected_waste_kgs) as infected_waste_kg,sum(hw.infected_waste_qty) as infected_waste_qt,sum(hw.glassware_watse_kgs) as glassware_watse_kg,sum(hw.glassware_watse_qty) as glassware_watse_qt,sum(hw.total) as total,sum(hw.bio_genaral_waste_kgs) as bio_genaral_waste_kg,sum(hw.bio_genaral_waste_qty) as bio_genaral_waste_qt,sum(hw.bio_infected_plastics_kgs) as bio_infected_plastics_kg,sum(hw.bio_infected_plastics_qty) as bio_infected_plastics_qt,sum(hw.bio_infected_waste_kgs) as bio_infected_waste_kg,sum(hw.bio_infected_waste_qty) as bio_infected_waste_qt,sum(hw.bio_glassware_watse_kgs) as bio_glassware_watse_kg,sum(hw.bio_glassware_watse_qty) as bio_glassware_watse_qt,sum(hw.crosscheck_total) as bio_total,sum(hw.infected_c_waste_kgs) as infected_c_waste_kg,sum(hw.infected_c_waste_qty) as infected_c_waste_qt,sum(hw.bio_infected_c_waste_kgs) as bio_infected_c_waste_kg,sum(hw.bio_infected_c_waste_qty) as bio_infected_c_waste_qt,TIMEDIFF(if(hw.updated_time!='',hw.updated_time, NOW()),hw.create_at) as dif_hrs, REPLACE(TIMESTAMPDIFF(DAY,IF(hw.updated_time!='', `hw`.`updated_time`, NOW()), hw.create_at), '-', '') AS dif_day")->from('hospital_waste as hw');
		$this->db->join('hospital_list  as hl', 'hl.h_id = hw.h_id', 'left');
		$inbetweentime="date_format(hw.date,'%m-%d-%Y') BETWEEN '".$from_date."' AND '".$todate."'";
		$this->db->group_by('hw.date');
		$this->db->group_by('hw.h_id');
		$this->db->where('hl.create_by',$a_id);
		//$this->db->where('hl.state',$st);
		$this->db->where($inbetweentime);
		return $this->db->get()->result_array();
	}
	public  function get_hospital_only_waste_list($a_id){
		$this->db->select("hw.id,hl.hospital_name,hl.type,hw.h_id,hw.date,hw.create_at,hw.updated_time,hw.current_address,hw.bio_current_address,sum(hw.genaral_waste_kgs) as genaral_waste_kg,sum(hw.genaral_waste_qty) as genaral_waste_qt,sum(hw.infected_plastics_kgs) as infected_plastics_kg,sum(hw.infected_plastics_qty) as infected_plastics_qt,sum(hw.infected_waste_kgs) as infected_waste_kg,sum(hw.infected_waste_qty) as infected_waste_qt,sum(hw.glassware_watse_kgs) as glassware_watse_kg,sum(hw.glassware_watse_qty) as glassware_watse_qt,sum(hw.total) as total,sum(hw.bio_genaral_waste_kgs) as bio_genaral_waste_kg,sum(hw.bio_genaral_waste_qty) as bio_genaral_waste_qt,sum(hw.bio_infected_plastics_kgs) as bio_infected_plastics_kg,sum(hw.bio_infected_plastics_qty) as bio_infected_plastics_qt,sum(hw.bio_infected_waste_kgs) as bio_infected_waste_kg,sum(hw.bio_infected_waste_qty) as bio_infected_waste_qt,sum(hw.bio_glassware_watse_kgs) as bio_glassware_watse_kg,sum(hw.bio_glassware_watse_qty) as bio_glassware_watse_qt,sum(hw.crosscheck_total) as bio_total,sum(hw.infected_c_waste_kgs) as infected_c_waste_kg,sum(hw.infected_c_waste_qty) as infected_c_waste_qt,sum(hw.bio_infected_c_waste_kgs) as bio_infected_c_waste_kg,sum(hw.bio_infected_c_waste_qty) as bio_infected_c_waste_qt,TIMEDIFF(if(hw.updated_time!='',hw.updated_time, NOW()),hw.create_at) as dif_hrs, REPLACE(TIMESTAMPDIFF(DAY,IF(hw.updated_time!='', `hw`.`updated_time`, NOW()), hw.create_at), '-', '') AS dif_day")->from('hospital_waste as hw');
		$this->db->join('hospital_list  as hl', 'hl.h_id = hw.h_id', 'left');
		$this->db->group_by('hw.date');
		$this->db->group_by('hw.h_id');
		$this->db->where('hl.create_by',$a_id);
		//$this->db->where('hl.state',$st);
		return $this->db->get()->result_array();
	}
	
	
	public  function check_invoice_sent_or_not($h_id,$date,$invoice_name){
		$this->db->select('*')->from('hospital_waste_invoice');
		$this->db->where('hos_id',$h_id);
		$this->db->where('date',$date);
		$this->db->where('invoice_name',$invoice_name);
		return $this->db->get()->row_array();
	}
	public  function insert_invoice_name($data){
		$this->db->insert('hospital_waste_invoice', $data);
		return $insert_id = $this->db->insert_id();
	}
	
	public  function get_total_waste_qty($h_id,$date){
		$this->db->select('SUM(hospital_waste.total) as total')->from('hospital_waste');
		$this->db->where('hospital_waste.h_id',$h_id);
		$this->db->where('hospital_waste.date',$date);
		return $this->db->get()->row_array();
	}
	// bio waste purpose
	public  function get_bio_genaral_waste_kgs_list($h_id,$date){
		$this->db->select('SUM(bio_genaral_waste_kgs) as total')->from('hospital_waste');
		$this->db->where('hospital_waste.h_id',$h_id);
		$this->db->where('hospital_waste.date',$date);
		return $this->db->get()->row_array();
	}
	public  function get_bio_genaral_waste_qty_list($h_id,$date){
		$this->db->select('SUM(bio_genaral_waste_qty) as total')->from('hospital_waste');
		$this->db->where('hospital_waste.h_id',$h_id);
		$this->db->where('hospital_waste.date',$date);
		return $this->db->get()->row_array();
	}
	public  function get_bio_infected_plastics_kgs_list($h_id,$date){
		$this->db->select('SUM(bio_infected_plastics_kgs) as total')->from('hospital_waste');
		$this->db->where('hospital_waste.h_id',$h_id);
		$this->db->where('hospital_waste.date',$date);
		return $this->db->get()->row_array();
	}
	public  function get_bio_infected_plastics_qty_list($h_id,$date){
		$this->db->select('SUM(bio_infected_plastics_qty) as total')->from('hospital_waste');
		$this->db->where('hospital_waste.h_id',$h_id);
		$this->db->where('hospital_waste.date',$date);
		return $this->db->get()->row_array();
	}
	public  function get_bio_infected_waste_kgs_list($h_id,$date){
		$this->db->select('SUM(bio_infected_waste_kgs) as total')->from('hospital_waste');
		$this->db->where('hospital_waste.h_id',$h_id);
		$this->db->where('hospital_waste.date',$date);
		return $this->db->get()->row_array();
	}
	public  function get_bio_infected_waste_qty_list($h_id,$date){
		$this->db->select('SUM(bio_infected_waste_qty) as total')->from('hospital_waste');
		$this->db->where('hospital_waste.h_id',$h_id);
		$this->db->where('hospital_waste.date',$date);
		return $this->db->get()->row_array();
	}public  function get_bio_glassware_watse_kgs_list($h_id,$date){
		$this->db->select('SUM(bio_glassware_watse_kgs) as total')->from('hospital_waste');
		$this->db->where('hospital_waste.h_id',$h_id);
		$this->db->where('hospital_waste.date',$date);
		return $this->db->get()->row_array();
	}public  function get_bio_glassware_watse_qty_list($h_id,$date){
		$this->db->select('SUM(bio_glassware_watse_qty) as total')->from('hospital_waste');
		$this->db->where('hospital_waste.h_id',$h_id);
		$this->db->where('hospital_waste.date',$date);
		return $this->db->get()->row_array();
	}
	public  function get_bio_total_waste_qty($h_id,$date){
		$this->db->select('SUM(hospital_waste.crosscheck_total) as total')->from('hospital_waste');
		$this->db->where('hospital_waste.h_id',$h_id);
		$this->db->where('hospital_waste.date',$date);
		return $this->db->get()->row_array();
	}
	
	public  function get_cbmwtf_list($id){
		$this->db->select('p_id,disposal_plant_name')->from('plant');
		$this->db->where('create_by',$id);
		$this->db->where('status',1);
		return $this->db->get()->result_array();
	}
	
	public  function get_cbwtf_detail($aid){
		$this->db->select('p_id,disposal_plant_name,disposal_plant_id,create_by')->from('plant');
		$this->db->where('create_by',$aid);
		$this->db->where('status',1);
		$this->db->order_by('p_id','desc');
		return $this->db->get()->row_array();
	}
	
	public  function get_hospital_list($a_id,$st){
		$this->db->select('count(hospital_list.h_id) as cnt')->from('hospital_list');
		$this->db->where('hospital_list.create_by',$a_id);
		$this->db->where('hospital_list.state',$st);
		$this->db->where('hospital_list.status',1);
		return $this->db->get()->row_array();
	}
	public  function get_vehical_list($a_id,$st){
		$this->db->select('count(hospital_list.h_id) as cnt')->from('hospital_list');
		$this->db->where('hospital_list.create_by',$a_id);
		$this->db->where('hospital_list.state',$st);
		$this->db->where('hospital_list.status',1);
		return $this->db->get()->row_array();
	}
	public  function get_login_user_details($id){
		$this->db->select('a_id,name,state')->from('admin');
		$this->db->where('a_id',$id);
		return $this->db->get()->row_array();
	}
	public  function get_vehical_count($id,$state){
		$this->db->select('count(trucks.t_id) as total_trucks')->from('trucks');
		$this->db->where('trucks.status', 1);
		$this->db->where('trucks.create_by',$id);
		//$this->db->where('trucks.state',$state);
		return $this->db->get()->row_array();
	}
	public  function get_waste_count($aid,$state){
		$this->db->select('sum(hw.total) as total')->from('hospital_waste as hw');
		$this->db->join('hospital_list as hl', 'hl.h_id = hw.h_id', 'left');
		$this->db->where('hl.create_by',$aid);		
		$this->db->where('hl.state',$state);		
        return $this->db->get()->row_array();
	}
	public  function get_state_all_hospital_list($a_id,$st){
		$this->db->select('h.h_id,h.a_id,h.hospital_name,h.type,h.route_number,h.mobile,h.no_of_beds,h.email,h.city')->from('hospital_list as h');
		$this->db->where('h.create_by',$a_id);
		$this->db->where('h.state',$st);
		$this->db->where('h.status',1);
		//$this->db->order_by('h.route_number','asc');
		return $this->db->get()->result_array();
	}
	
	public  function get_hospital_wise_waste($id){
		$this->db->select("hw.id,hl.hospital_name,hl.type,hw.h_id,hw.date,hw.create_at,hw.updated_time,hw.current_address,hw.bio_current_address,sum(hw.genaral_waste_kgs) as genaral_waste_kg,sum(hw.genaral_waste_qty) as genaral_waste_qt,sum(hw.infected_plastics_kgs) as infected_plastics_kg,sum(hw.infected_plastics_qty) as infected_plastics_qt,sum(hw.infected_waste_kgs) as infected_waste_kg,sum(hw.infected_waste_qty) as infected_waste_qt,sum(hw.glassware_watse_kgs) as glassware_watse_kg,sum(hw.glassware_watse_qty) as glassware_watse_qt,sum(hw.total) as total,sum(hw.bio_genaral_waste_kgs) as bio_genaral_waste_kg,sum(hw.bio_genaral_waste_qty) as bio_genaral_waste_qt,sum(hw.bio_infected_plastics_kgs) as bio_infected_plastics_kg,sum(hw.bio_infected_plastics_qty) as bio_infected_plastics_qt,sum(hw.bio_infected_waste_kgs) as bio_infected_waste_kg,sum(hw.bio_infected_waste_qty) as bio_infected_waste_qt,sum(hw.bio_glassware_watse_kgs) as bio_glassware_watse_kg,sum(hw.bio_glassware_watse_qty) as bio_glassware_watse_qt,sum(hw.crosscheck_total) as bio_total,sum(hw.infected_c_waste_kgs) as infected_c_waste_kg,sum(hw.infected_c_waste_qty) as infected_c_waste_qt,sum(hw.bio_infected_c_waste_kgs) as bio_infected_c_waste_kg,sum(hw.bio_infected_c_waste_qty) as bio_infected_c_waste_qt,TIMEDIFF(if(hw.updated_time!='',hw.updated_time, NOW()),hw.create_at) as dif_hrs, REPLACE(TIMESTAMPDIFF(DAY,IF(hw.updated_time!='', `hw`.`updated_time`, NOW()), hw.create_at), '-', '') AS dif_day")->from('hospital_waste as hw');
		//$this->db->select('hl.hospital_name,,hl.type,hw.h_id,hw.date,hw.create_at,hw.updated_time,hw.current_address,hw.bio_current_address,sum(hw.genaral_waste_kgs) as genaral_waste_kg,sum(hw.genaral_waste_qty) as genaral_waste_qt,sum(hw.infected_plastics_kgs) as infected_plastics_kg,sum(hw.infected_plastics_qty) as infected_plastics_qt,sum(hw.infected_waste_kgs) as infected_waste_kg,sum(hw.infected_waste_qty) as infected_waste_qt,sum(hw.glassware_watse_kgs) as glassware_watse_kg,sum(hw.glassware_watse_qty) as glassware_watse_qt,sum(hw.total) as total,sum(hw.bio_genaral_waste_kgs) as bio_genaral_waste_kg,sum(hw.bio_genaral_waste_qty) as bio_genaral_waste_qt,sum(hw.bio_infected_plastics_kgs) as bio_infected_plastics_kg,sum(hw.bio_infected_plastics_qty) as bio_infected_plastics_qt,sum(hw.bio_infected_waste_kgs) as bio_infected_waste_kg,sum(hw.bio_infected_waste_qty) as bio_infected_waste_qt,sum(hw.bio_glassware_watse_kgs) as bio_glassware_watse_kg,sum(hw.bio_glassware_watse_qty) as bio_glassware_watse_qt,sum(hw.crosscheck_total) as bio_total,sum(hw.infected_c_waste_kgs) as infected_c_waste_kg,sum(hw.infected_c_waste_qty) as infected_c_waste_qt,sum(hw.bio_infected_c_waste_kgs) as bio_infected_c_waste_kg,sum(hw.bio_infected_c_waste_qty) as bio_infected_c_waste_qt,TIMEDIFF(if(hw.updated_time,"2019-05-15 16:37:25","2019-05-15 18:37:25"),hw.create_at) as dif_hrs')->from('hospital_waste as hw');
		//$this->db->select('hl.hospital_name,,hl.type,hw.h_id,hw.date,hw.create_at,hw.updated_time,hw.current_address,hw.bio_current_address,sum(hw.genaral_waste_kgs) as genaral_waste_kg,sum(hw.genaral_waste_qty) as genaral_waste_qt,sum(hw.infected_plastics_kgs) as infected_plastics_kg,sum(hw.infected_plastics_qty) as infected_plastics_qt,sum(hw.infected_waste_kgs) as infected_waste_kg,sum(hw.infected_waste_qty) as infected_waste_qt,sum(hw.glassware_watse_kgs) as glassware_watse_kg,sum(hw.glassware_watse_qty) as glassware_watse_qt,sum(hw.total) as total,sum(hw.bio_genaral_waste_kgs) as bio_genaral_waste_kg,sum(hw.bio_genaral_waste_qty) as bio_genaral_waste_qt,sum(hw.bio_infected_plastics_kgs) as bio_infected_plastics_kg,sum(hw.bio_infected_plastics_qty) as bio_infected_plastics_qt,sum(hw.bio_infected_waste_kgs) as bio_infected_waste_kg,sum(hw.bio_infected_waste_qty) as bio_infected_waste_qt,sum(hw.bio_glassware_watse_kgs) as bio_glassware_watse_kg,sum(hw.bio_glassware_watse_qty) as bio_glassware_watse_qt,sum(hw.crosscheck_total) as bio_total,sum(hw.infected_c_waste_kgs) as infected_c_waste_kg,sum(hw.infected_c_waste_qty) as infected_c_waste_qt,sum(hw.bio_infected_c_waste_kgs) as bio_infected_c_waste_kg,sum(hw.bio_infected_c_waste_qty) as bio_infected_c_waste_qt,DATEDIFF(hw.create_at,hw.updated_time) as dif_hrs')->from('hospital_waste as hw');
		$this->db->join('hospital_list  as hl', 'hl.h_id = hw.h_id', 'left');
		$this->db->group_by('hw.date');
		$this->db->group_by('hw.h_id');
		$this->db->where('hl.h_id',$id);
		return $this->db->get()->result_array();
	}
	
	public function get_plant_vehicles($id){
		$this->db->select('truck_reg_no,t_id,email,city,owner_name,insurence_number,owner_mobile,driver_name,driver_lic_no,driver_lic_bad_no,driver_mobile,route_no')->from('trucks');		
		$this->db->where('create_by', $id);
		$this->db->where('status',1);
		$this->db->order_by('t_id','desc');
        return $this->db->get()->result_array();
	}
	public  function get_vehical_details($id){
		$this->db->select('truck_reg_no,t_id,email,city,owner_name,insurence_number,owner_mobile,driver_name,driver_lic_no,driver_lic_bad_no,driver_mobile,route_no')->from('trucks');		
		$this->db->where('t_id', $id);
        return $this->db->get()->row_array();
	}
	public  function get_vehicle_pickup_location($id,$date){
		$this->db->select('hw.id,hw.current_latitude as lat,hw.current_longitude as lng,hw.create_at as t')->from('hospital_waste as hw');
		$this->db->join('trucks', 'trucks.a_id = hw.create_by', 'left');
		$this->db->where("hw.date", $date);
		$this->db->where('trucks.t_id',$id);
		$this->db->where('hw.current_latitude is NOT NULL', NULL, FALSE);	
		$this->db->where('hw.current_longitude is NOT NULL', NULL, FALSE);			
		$this->db->order_by('hw.id','asc');		
        return $this->db->get()->result_array();
	}
	public  function get_vehicle_drop_location($id,$date){
		$this->db->select('hw.id,hw.bio_current_latitude as lat,hw.bio_current_longitude as lng,hw.updated_time as t')->from('hospital_waste as hw');
		$this->db->join('trucks', 'trucks.a_id = hw.create_by', 'left');
		$this->db->where("hw.date", $date);
		$this->db->where('trucks.t_id',$id);		
		$this->db->where('hw.bio_current_latitude is NOT NULL', NULL, FALSE);	
		$this->db->where('hw.bio_current_longitude is NOT NULL', NULL, FALSE);	
		$this->db->order_by('hw.id','asc');		
        return $this->db->get()->result_array();
	}
	public  function get_id_hospital_details($id){
		$this->db->select('a.a_id,a.name,a.email_id,a.mobile,a.profile_pic,a.qr_code')->from('hospital_list as h');		
		$this->db->join('admin as a','a.a_id=h.a_id','left');
		$this->db->where('h.h_id',$id);
        return $this->db->get()->row_array();	
	}
	
	
	// hospital dashboard purpose */
	public  function get_amdin_all_hospital_list($a_id){
		$this->db->select('h.h_id,h.a_id,h.hospital_name,h.type,h.route_number,h.mobile,h.no_of_beds,h.email,h.city')->from('hospital_list as h');
		$this->db->where('h.create_by',$a_id);
		//$this->db->where('h.state',$st);
		$this->db->where('h.status',1);
		//$this->db->order_by('h.route_number','asc');
		return $this->db->get()->result_array();
	}
	
	
	
	

}