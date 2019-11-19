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
	public function get_hcf_all_details($h_id){
		$this->db->select('*')->from('hospital_list');		
		$this->db->where('h_id', $h_id);
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

		/*$this->db->select("hw.id,hl.hospital_name,hl.type,hw.h_id,hw.date,hw.create_at,hw.updated_time,hw.current_address,hw.bio_current_address,sum(hw.genaral_waste_kgs) as genaral_waste_kg,sum(hw.genaral_waste_qty) as genaral_waste_qt,sum(hw.infected_plastics_kgs) as infected_plastics_kg,sum(hw.infected_plastics_qty) as infected_plastics_qt,sum(hw.infected_waste_kgs) as infected_waste_kg,sum(hw.infected_waste_qty) as infected_waste_qt,sum(hw.glassware_watse_kgs) as glassware_watse_kg,sum(hw.glassware_watse_qty) as glassware_watse_qt,sum(hw.total) as total,sum(hw.bio_genaral_waste_kgs) as bio_genaral_waste_kg,sum(hw.bio_genaral_waste_qty) as bio_genaral_waste_qt,sum(hw.bio_infected_plastics_kgs) as bio_infected_plastics_kg,sum(hw.bio_infected_plastics_qty) as bio_infected_plastics_qt,sum(hw.bio_infected_waste_kgs) as bio_infected_waste_kg,sum(hw.bio_infected_waste_qty) as bio_infected_waste_qt,sum(hw.bio_glassware_watse_kgs) as bio_glassware_watse_kg,sum(hw.bio_glassware_watse_qty) as bio_glassware_watse_qt,sum(hw.crosscheck_total) as bio_total,sum(hw.infected_c_waste_kgs) as infected_c_waste_kg,sum(hw.infected_c_waste_qty) as infected_c_waste_qt,sum(hw.bio_infected_c_waste_kgs) as bio_infected_c_waste_kg,sum(hw.bio_infected_c_waste_qty) as bio_infected_c_waste_qt,TIMEDIFF(if(hw.updated_time!='',hw.updated_time, NOW()),hw.create_at) as dif_hrs, REPLACE(TIMESTAMPDIFF(DAY,IF(hw.updated_time!='', `hw`.`updated_time`, NOW()), hw.create_at), '-', '') AS dif_day")->from('hospital_waste as hw');
		$this->db->join('hospital_list  as hl', 'hl.h_id = hw.h_id', 'left');
		$this->db->group_by('hw.date');
		$this->db->group_by('hw.h_id');
		$this->db->where('hw.updated_by',$a_id);
		return $this->db->get()->result_array();*/

		
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
	
	/* invoice purose */
	public function get_all_invoice_plants_list($admin_id){
		$this->db->select('*')->from('plant');		
		$this->db->where('create_by', $admin_id);
		$this->db->where('status',1);
		$this->db->order_by('p_id','desc');
        return $this->db->get()->result_array();	
	}
	public function get_invoice_list($admin_id){
		$this->db->select('cil.e_way_bill_no,cil.c_i_id,cil.invoice_id,cil.invoice_name,h.hospital_name,p.disposal_plant_name,cil.created_at,yellow,yellowc,blue,red,white')->from('cover_invoice_list as cil');
		$this->db->join('hospital_list as h', 'h.h_id = cil.hcf_id', 'left');
		$this->db->join('plant as p', 'p.p_id = cil.plant_id', 'left');		
		$this->db->where('cil.created_by', $admin_id);
		$this->db->order_by('cil.c_i_id','desc');
        return $this->db->get()->result_array();	
	}	
	public function save_novice_list($d){
		$this->db->insert('cover_invoice_list',$d);
		return $insert_id = $this->db->insert_id();
	}
	
	public  function get_invoices_id_next(){
		$this->db->select('c_i_id')->from('cover_invoice_list');		
		$this->db->order_by('c_i_id','desc');
        return $this->db->get()->row_array();
	}
	
	/* bank details */
	public  function save_bank_details($d){
		$this->db->insert('bank_details',$d);
		return $insert_id = $this->db->insert_id();
	}	
	public  function update_bank_details($id,$d){
		$this->db->where('created_by',$id);
		return $this->db->update('bank_details',$d);
	}
	public  function check_bank_details($id){
		$this->db->select('b_id,gst_no,ac_holder_name,bank_name,branch,ac_no,ifsc,gst')->from('bank_details');		
		$this->db->where('created_by',$id);
        return $this->db->get()->row_array();	
	}
	/* id  card purpose */
	public  function get_id_plant_details($id){
		$this->db->select('a.a_id,a.name,a.email_id,a.mobile,a.profile_pic,a.qr_code')->from('plant as p');		
		$this->db->join('admin as a','a.a_id=p.a_id','left');
		$this->db->where('p.p_id',$id);
        return $this->db->get()->row_array();
	}
	public  function get_idcard_plant_details($id){
		$this->db->select('p.disposal_plant_name')->from('plant as p');		
		$this->db->where('p.p_id',$id);
        return $this->db->get()->row_array();
	}
	
	public  function get_plant_vehicle_list($id){
		$this->db->select('t.t_id,t.truck_reg_no')->from('plant as p');
		$this->db->join('trucks as t', 't.create_by = p.create_by', 'left');				
		$this->db->where('p.a_id',$id);
		$this->db->where('t.status',1);
        return $this->db->get()->result_array();
	}
	
	public  function get_hospital_waste_rescan_data($id,$date){
		$this->db->select('hw.id,hw.genaral_waste_kgs,hw.genaral_waste_qty,hw.infected_plastics_kgs,hw.infected_plastics_qty,hw.infected_waste_kgs,hw.infected_waste_qty,hw.infected_c_waste_kgs,hw.infected_c_waste_qty,hw.glassware_watse_kgs,hw.glassware_watse_qty,hw.total,hw.create_at')->from('trucks as t');
		$this->db->join('hospital_waste as hw', 'hw.create_by = t.a_id', 'left');				
		$this->db->where('hw.create_at<=',$date);
		$this->db->where('t.t_id',$id);
        return $this->db->get()->result_array();
	}
	public  function get_later_hospital_waste_rescan_data($id,$date){
		$this->db->select('hw.id,hw.genaral_waste_kgs,hw.genaral_waste_qty,hw.infected_plastics_kgs,hw.infected_plastics_qty,hw.infected_waste_kgs,hw.infected_waste_qty,hw.infected_c_waste_kgs,hw.infected_c_waste_qty,hw.glassware_watse_kgs,hw.glassware_watse_qty,hw.total,hw.create_at')->from('trucks as t');
		$this->db->join('hospital_waste as hw', 'hw.create_by = t.a_id', 'left');				
		$this->db->where('hw.create_at >=',$date);
		$this->db->where('t.t_id',$id);
        return $this->db->get()->result_array();
	}
	public  function update_rescan_waste_data($id,$d){
		$this->db->where('id',$id);
		return $this->db->update('hospital_waste',$d);
	}
	public  function save_stock_details($d){
		$this->db->insert('invoice_stock',$d);
		return $insert_id = $this->db->insert_id();
	}
	public  function stcok_check($id){
		$this->db->select('st_id')->from('invoice_stock');		
		$this->db->where('created_by',$id);
        return $this->db->get()->row_array();	
	}public  function get_stock_details($id){
		$this->db->select('*')->from('invoice_stock');		
		$this->db->where('created_by',$id);
        return $this->db->get()->row_array();	
	}
	public  function update_stock_details($id,$d){
		$this->db->where('created_by',$id);
		return $this->db->update('invoice_stock',$d);
	}
	public  function save_stock_history($d){
		$this->db->insert('invoice_stock_history',$d);
		return $insert_id = $this->db->insert_id();
	}
	public  function get_stock_history_details($id){
		$this->db->select('*')->from('invoice_stock_history');		
		$this->db->where('created_by',$id);
        return $this->db->get()->result_array();	
	}
	
	
	
	

}