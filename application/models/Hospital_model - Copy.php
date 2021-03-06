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
		$this->db->select('hospital_waste.id,hospital_waste.h_id,hospital_waste.genaral_waste_kgs,hospital_waste.genaral_waste_qty,hospital_waste.infected_plastics_kgs,hospital_waste.infected_plastics_qty,hospital_waste.infected_waste_kgs,hospital_waste.infected_waste_qty,hospital_waste.glassware_watse_kgs,hospital_waste.glassware_watse_qty,hospital_waste.create_at,hospital_waste.date,hospital_waste.create_by,hospital_waste.status,hospital_waste_invoice.invoice_name,hospital_waste_invoice.invoice_file')->from('hospital_waste');
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
	public  function get_hospital_wise_waste_with_dates($admin_id,$from_date,$todate){
		
		$sql = "SELECT hospital_waste.date,hospital_waste.create_at,hospital_waste.bio_current_address,hospital_waste.current_address,hospital_waste.h_id,hospital_list.hospital_name From hospital_waste  LEFT JOIN hospital_list on hospital_list.h_id= hospital_waste.h_id  where hospital_list.create_by = '".$admin_id."' and date_format(hospital_waste.date,'%m-%d-%Y') BETWEEN '".$from_date."' AND '".$todate."'  GROUP BY hospital_waste.h_id,hospital_waste.date";
		//echo $sql;exit;
		$return=$this->db->query($sql)->result_array();
		
		
		//echo '<pre>';print_r($return);exit;
		foreach($return as $list){
			$genaral_waste_kgs=$this->get_genaral_waste_kgs_list($list['h_id'],$list['date']);
			$genaral_waste_qty=$this->get_genaral_waste_qty_list($list['h_id'],$list['date']);
			$infected_plastics_kgs=$this->get_infected_plastics_kgs_list($list['h_id'],$list['date']);
			$infected_plastics_qty=$this->get_infected_plastics_qty_list($list['h_id'],$list['date']);
			$infected_waste_kgs=$this->get_infected_waste_kgs_list($list['h_id'],$list['date']);
			$infected_waste_qty=$this->get_infected_waste_qty_list($list['h_id'],$list['date']);
			$glassware_watse_kgs=$this->get_glassware_watse_kgs_list($list['h_id'],$list['date']);
			$glassware_watse_qty=$this->get_glassware_watse_qty_list($list['h_id'],$list['date']);
			$total_waste=$this->get_total_waste_qty($list['h_id'],$list['date']);
			
			$bio_genaral_waste_kgs=$this->get_bio_genaral_waste_kgs_list($list['h_id'],$list['date']);
			$bio_genaral_waste_qty=$this->get_bio_genaral_waste_qty_list($list['h_id'],$list['date']);
			$bio_infected_plastics_kgs=$this->get_bio_infected_plastics_kgs_list($list['h_id'],$list['date']);
			$bio_infected_plastics_qty=$this->get_bio_infected_plastics_qty_list($list['h_id'],$list['date']);
			$bio_infected_waste_kgs=$this->get_bio_infected_waste_kgs_list($list['h_id'],$list['date']);
			$bio_infected_waste_qty=$this->get_bio_infected_waste_qty_list($list['h_id'],$list['date']);
			$bio_glassware_watse_kgs=$this->get_bio_glassware_watse_kgs_list($list['h_id'],$list['date']);
			$bio_glassware_watse_qty=$this->get_bio_glassware_watse_qty_list($list['h_id'],$list['date']);
			$bio_total_waste=$this->get_bio_total_waste_qty($list['h_id'],$list['date']);
			
			
			
			//echo '<pre>';print_r($genaral_waste_kgs);exit;
			$data[$list['h_id'].$list['date']]=$list;
			$data[$list['h_id'].$list['date']]['genaral_waste_kgs']=isset($genaral_waste_kgs['total'])?$genaral_waste_kgs['total']:'';
			$data[$list['h_id'].$list['date']]['genaral_waste_qty']=isset($genaral_waste_qty['total'])?$genaral_waste_qty['total']:'';
			$data[$list['h_id'].$list['date']]['infected_plastics_kgs']=isset($infected_plastics_kgs['total'])?$infected_plastics_kgs['total']:'';
			$data[$list['h_id'].$list['date']]['infected_plastics_qty']=isset($infected_plastics_qty['total'])?$infected_plastics_qty['total']:'';
			$data[$list['h_id'].$list['date']]['infected_waste_kgs']=isset($infected_waste_kgs['total'])?$infected_waste_kgs['total']:'';
			$data[$list['h_id'].$list['date']]['infected_waste_qty']=isset($infected_waste_qty['total'])?$infected_waste_qty['total']:'';
			$data[$list['h_id'].$list['date']]['glassware_watse_kgs']=isset($glassware_watse_kgs['total'])?$glassware_watse_kgs['total']:'';
			$data[$list['h_id'].$list['date']]['glassware_watse_qty']=isset($glassware_watse_qty['total'])?$glassware_watse_qty['total']:'';
			$data[$list['h_id'].$list['date']]['total']=isset($total_waste['total'])?$total_waste['total']:'';

			$data[$list['h_id'].$list['date']]['bio_genaral_waste_kgs']=isset($bio_genaral_waste_kgs['total'])?$bio_genaral_waste_kgs['total']:'';
			$data[$list['h_id'].$list['date']]['bio_genaral_waste_qty']=isset($bio_genaral_waste_qty['total'])?$bio_genaral_waste_qty['total']:'';
			$data[$list['h_id'].$list['date']]['bio_infected_plastics_kgs']=isset($bio_infected_plastics_kgs['total'])?$bio_infected_plastics_kgs['total']:'';
			$data[$list['h_id'].$list['date']]['bio_infected_plastics_qty']=isset($bio_infected_plastics_qty['total'])?$bio_infected_plastics_qty['total']:'';
			$data[$list['h_id'].$list['date']]['bio_infected_waste_kgs']=isset($bio_infected_waste_kgs['total'])?$bio_infected_waste_kgs['total']:'';
			$data[$list['h_id'].$list['date']]['bio_infected_waste_qty']=isset($bio_infected_waste_qty['total'])?$bio_infected_waste_qty['total']:'';
			$data[$list['h_id'].$list['date']]['bio_glassware_watse_kgs']=isset($bio_glassware_watse_kgs['total'])?$bio_glassware_watse_kgs['total']:'';
			$data[$list['h_id'].$list['date']]['bio_glassware_watse_qty']=isset($bio_glassware_watse_qty['total'])?$bio_glassware_watse_qty['total']:'';
			$data[$list['h_id'].$list['date']]['bio_total']=isset($bio_total_waste['total'])?$bio_total_waste['total']:'';

			
		}
		if(!empty($data)){
			return $data;
		}
	}
	
	public  function get_hospital_wise_waste_list($admin_id){
		
		$sql = "SELECT hospital_waste.date,hospital_waste.create_at,hospital_waste.current_address,hospital_waste.bio_current_address,hospital_waste.h_id,hospital_list.hospital_name From hospital_waste  LEFT JOIN hospital_list on hospital_list.h_id= hospital_waste.h_id  where hospital_list.create_by = '".$admin_id."'   GROUP BY hospital_waste.h_id,hospital_waste.date";
		$return=$this->db->query($sql)->result_array();
		
		
		//echo '<pre>';print_r($return);exit;
		foreach($return as $list){
			$genaral_waste_kgs=$this->get_genaral_waste_kgs_list($list['h_id'],$list['date']);
			$genaral_waste_qty=$this->get_genaral_waste_qty_list($list['h_id'],$list['date']);
			$infected_plastics_kgs=$this->get_infected_plastics_kgs_list($list['h_id'],$list['date']);
			$infected_plastics_qty=$this->get_infected_plastics_qty_list($list['h_id'],$list['date']);
			$infected_waste_kgs=$this->get_infected_waste_kgs_list($list['h_id'],$list['date']);
			$infected_waste_qty=$this->get_infected_waste_qty_list($list['h_id'],$list['date']);
			$glassware_watse_kgs=$this->get_glassware_watse_kgs_list($list['h_id'],$list['date']);
			$glassware_watse_qty=$this->get_glassware_watse_qty_list($list['h_id'],$list['date']);
			$total_waste=$this->get_total_waste_qty($list['h_id'],$list['date']);
			//echo '<pre>';print_r($genaral_waste_kgs);exit;
			
			$bio_genaral_waste_kgs=$this->get_bio_genaral_waste_kgs_list($list['h_id'],$list['date']);
			$bio_genaral_waste_qty=$this->get_bio_genaral_waste_qty_list($list['h_id'],$list['date']);
			$bio_infected_plastics_kgs=$this->get_bio_infected_plastics_kgs_list($list['h_id'],$list['date']);
			$bio_infected_plastics_qty=$this->get_bio_infected_plastics_qty_list($list['h_id'],$list['date']);
			$bio_infected_waste_kgs=$this->get_bio_infected_waste_kgs_list($list['h_id'],$list['date']);
			$bio_infected_waste_qty=$this->get_bio_infected_waste_qty_list($list['h_id'],$list['date']);
			$bio_glassware_watse_kgs=$this->get_bio_glassware_watse_kgs_list($list['h_id'],$list['date']);
			$bio_glassware_watse_qty=$this->get_bio_glassware_watse_qty_list($list['h_id'],$list['date']);
			$bio_total_waste=$this->get_bio_total_waste_qty($list['h_id'],$list['date']);
			
			$data[$list['h_id'].$list['date']]=$list;
			$data[$list['h_id'].$list['date']]['genaral_waste_kgs']=isset($genaral_waste_kgs['total'])?$genaral_waste_kgs['total']:'';
			$data[$list['h_id'].$list['date']]['genaral_waste_qty']=isset($genaral_waste_qty['total'])?$genaral_waste_qty['total']:'';
			$data[$list['h_id'].$list['date']]['infected_plastics_kgs']=isset($infected_plastics_kgs['total'])?$infected_plastics_kgs['total']:'';
			$data[$list['h_id'].$list['date']]['infected_plastics_qty']=isset($infected_plastics_qty['total'])?$infected_plastics_qty['total']:'';
			$data[$list['h_id'].$list['date']]['infected_waste_kgs']=isset($infected_waste_kgs['total'])?$infected_waste_kgs['total']:'';
			$data[$list['h_id'].$list['date']]['infected_waste_qty']=isset($infected_waste_qty['total'])?$infected_waste_qty['total']:'';
			$data[$list['h_id'].$list['date']]['glassware_watse_kgs']=isset($glassware_watse_kgs['total'])?$glassware_watse_kgs['total']:'';
			$data[$list['h_id'].$list['date']]['glassware_watse_qty']=isset($glassware_watse_qty['total'])?$glassware_watse_qty['total']:'';
			$data[$list['h_id'].$list['date']]['total']=isset($total_waste['total'])?$total_waste['total']:'';
			
			$data[$list['h_id'].$list['date']]['bio_genaral_waste_kgs']=isset($bio_genaral_waste_kgs['total'])?$bio_genaral_waste_kgs['total']:'';
			$data[$list['h_id'].$list['date']]['bio_genaral_waste_qty']=isset($bio_genaral_waste_qty['total'])?$bio_genaral_waste_qty['total']:'';
			$data[$list['h_id'].$list['date']]['bio_infected_plastics_kgs']=isset($bio_infected_plastics_kgs['total'])?$bio_infected_plastics_kgs['total']:'';
			$data[$list['h_id'].$list['date']]['bio_infected_plastics_qty']=isset($bio_infected_plastics_qty['total'])?$bio_infected_plastics_qty['total']:'';
			$data[$list['h_id'].$list['date']]['bio_infected_waste_kgs']=isset($bio_infected_waste_kgs['total'])?$bio_infected_waste_kgs['total']:'';
			$data[$list['h_id'].$list['date']]['bio_infected_waste_qty']=isset($bio_infected_waste_qty['total'])?$bio_infected_waste_qty['total']:'';
			$data[$list['h_id'].$list['date']]['bio_glassware_watse_kgs']=isset($bio_glassware_watse_kgs['total'])?$bio_glassware_watse_kgs['total']:'';
			$data[$list['h_id'].$list['date']]['bio_glassware_watse_qty']=isset($bio_glassware_watse_qty['total'])?$bio_glassware_watse_qty['total']:'';
			$data[$list['h_id'].$list['date']]['bio_total']=isset($bio_total_waste['total'])?$bio_total_waste['total']:'';
		
			
		}
		if(!empty($data)){
			return $data;
		}
	}
	
	public  function get_genaral_waste_kgs_list($h_id,$date){
		$this->db->select('SUM(genaral_waste_kgs) as total')->from('hospital_waste');
		$this->db->where('hospital_waste.h_id',$h_id);
		$this->db->where('hospital_waste.date',$date);
		return $this->db->get()->row_array();
	}
	public  function get_genaral_waste_qty_list($h_id,$date){
		$this->db->select('SUM(genaral_waste_qty) as total')->from('hospital_waste');
		$this->db->where('hospital_waste.h_id',$h_id);
		$this->db->where('hospital_waste.date',$date);
		return $this->db->get()->row_array();
	}
	public  function get_infected_plastics_kgs_list($h_id,$date){
		$this->db->select('SUM(infected_plastics_kgs) as total')->from('hospital_waste');
		$this->db->where('hospital_waste.h_id',$h_id);
		$this->db->where('hospital_waste.date',$date);
		return $this->db->get()->row_array();
	}
	public  function get_infected_plastics_qty_list($h_id,$date){
		$this->db->select('SUM(infected_plastics_qty) as total')->from('hospital_waste');
		$this->db->where('hospital_waste.h_id',$h_id);
		$this->db->where('hospital_waste.date',$date);
		return $this->db->get()->row_array();
	}
	public  function get_infected_waste_kgs_list($h_id,$date){
		$this->db->select('SUM(infected_waste_kgs) as total')->from('hospital_waste');
		$this->db->where('hospital_waste.h_id',$h_id);
		$this->db->where('hospital_waste.date',$date);
		return $this->db->get()->row_array();
	}
	public  function get_infected_waste_qty_list($h_id,$date){
		$this->db->select('SUM(infected_waste_qty) as total')->from('hospital_waste');
		$this->db->where('hospital_waste.h_id',$h_id);
		$this->db->where('hospital_waste.date',$date);
		return $this->db->get()->row_array();
	}public  function get_glassware_watse_kgs_list($h_id,$date){
		$this->db->select('SUM(glassware_watse_kgs) as total')->from('hospital_waste');
		$this->db->where('hospital_waste.h_id',$h_id);
		$this->db->where('hospital_waste.date',$date);
		return $this->db->get()->row_array();
	}public  function get_glassware_watse_qty_list($h_id,$date){
		$this->db->select('SUM(glassware_watse_qty) as total')->from('hospital_waste');
		$this->db->where('hospital_waste.h_id',$h_id);
		$this->db->where('hospital_waste.date',$date);
		return $this->db->get()->row_array();
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
	
	
	
	

}