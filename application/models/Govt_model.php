<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Govt_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	/*govt dashboard*/
	
	public  function get_total_hospital($date,$state){
		$this->db->select('count(hospital_list.h_id) as total_hos')->from('hospital_list');	
		$this->db->where("DATE_FORMAT(hospital_list.create_at,'%Y')", $date);		
		$this->db->where('hospital_list.status !=', 2);
		$this->db->where('hospital_list.state',$state);
        return $this->db->get()->row_array();
	}
	public  function get_total_plants($date,$state){
		$this->db->select('count(plant.p_id) as total_plants')->from('plant');
		$this->db->where("DATE_FORMAT(plant.create_at,'%Y')", $date);		
		$this->db->where('plant.status !=', 2);
		$this->db->where('plant.state',$state);
        return $this->db->get()->row_array();
	}
	public  function get_total_trucks($date,$state){
		$this->db->select('count(trucks.t_id) as total_trucks')->from('trucks');
		$this->db->where("DATE_FORMAT(trucks.create_at,'%Y')", $date);			
		$this->db->where('trucks.status !=', 2);
		$this->db->where('trucks.state',$state);
		return $this->db->get()->row_array();
	}
	
	/*total waste*/
	public  function get_gen_waste($date,$state){
		$this->db->select('sum(hospital_waste.total) as total')->from('hospital_waste');
		$this->db->join('trucks', 'trucks.a_id = hospital_waste.create_by', 'left');
		$this->db->where("DATE_FORMAT(hospital_waste.create_at,'%Y')", $date);
		$this->db->where('trucks.state',$state);		
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
	
	public function get_graph_total_hospital_list($date,$state){
		$this->db->select('hospital_list.create_at')->from('hospital_list');
		$this->db->where("DATE_FORMAT(hospital_list.create_at,'%Y')", $date);
		$this->db->where('hospital_list.status !=', 2);
		$this->db->where('hospital_list.state',$state);
        return $this->db->get()->result_array();
	}
	public function get_graph_total_plants_list($date,$state){
		$this->db->select('plant.create_at')->from('plant');
		$this->db->where("DATE_FORMAT(plant.create_at,'%Y')", $date);
		$this->db->where('plant.status !=', 2);
		$this->db->where('plant.state',$state);
        return $this->db->get()->result_array();
	}
	public function get_graph_total_truck_list($date,$state){
		$this->db->select('trucks.create_at')->from('trucks');
		$this->db->where("DATE_FORMAT(trucks.create_at,'%Y')", $date);
		$this->db->where('trucks.status !=', 2);
		$this->db->where('trucks.state',$state);
        return $this->db->get()->result_array();
	}
	public function get_graph_total_waste_list($date,$st){
		$this->db->select('waste.create_at,waste.gen_waste_in_Kg,waste.inf_pla_waste_in_Kg,waste.inf_waste_in_Kg,waste.glassware_waste_in_kg,waste.total_waste')->from('waste');
		$this->db->join('trucks', 'trucks.t_id = waste.truck_id', 'left');
		$this->db->where("DATE_FORMAT(waste.create_at,'%Y')", $date);
		$this->db->where('trucks.state',$st);
		return $this->db->get()->result_array();
	}
	/*govt purpose*/
	
	// total admin wise hospital list
	
	public  function get_all_admins_wise_hospitals($a_id,$state){
		$this->db->select('a_id,name,mobile,status')->from('admin');
		$this->db->where('admin.create_by',$a_id);
		$this->db->where('admin.state',$state);
		$this->db->where('admin.role',1);
		$return=$this->db->get()->result_array();
		foreach($return as $li){
			$h_list=$this->get_hospital_count($li['a_id']);
			$data[$li['a_id']]=$li;
			$data[$li['a_id']]['hos_cnt']=isset($h_list['cnt'])?$h_list['cnt']:'';
		}
		if(!empty($data)){
			return $data;
		}
	}
	
		public  function get_hospital_count($a_id){
			$this->db->select('count(hospital_list.h_id) as cnt')->from('hospital_list');
			$this->db->where('hospital_list.create_by',$a_id);
			return $this->db->get()->row_array();
		}
		
		public  function get_all_admins_list($a_id,$state){
		$this->db->select('a_id,name,mobile,status')->from('admin');
		$this->db->where('admin.create_by',$a_id);
		$this->db->where('admin.state',$state);
		$this->db->where('admin.role',1);
		return $this->db->get()->result_array();
		}
		
		public function get_hospital_wise_waste_img_list($a_id){
		$this->db->select('im.hos_id,h.hospital_name,im.text,im.address,im.create_at,im.image')->from('hospital_waste_images as im');
		$this->db->join('hospital_list as h ', 'h.h_id = im.hos_id', 'left');
		$this->db->where('h.create_by',$a_id);
		return $this->db->get()->result_array();
		}
		
		//waste invoice purpose
		
		public function get_total_hospital_list(){
			$this->db->select('hw.h_id,hw.date')->from('hospital_waste as hw');
			$this->db->group_by('hw.date');
			$this->db->group_by('hw.h_id');
			return $this->db->get()->result_array();	
		}
		
		public  function get_hospital_wise_waste_for_invoice(){
			
				$sql = "SELECT hospital_waste.id,hospital_waste.date,hospital_waste.create_at,hospital_waste.current_address,hospital_waste.h_id,hospital_list.hospital_name,hospital_list.create_by From hospital_waste  LEFT JOIN hospital_list on hospital_list.h_id= hospital_waste.h_id  GROUP BY hospital_waste.h_id,hospital_waste.date";
				$return=$this->db->query($sql)->result_array();
				foreach($return as $list){
				$genaral_waste_kgs=$this->get_genaral_waste_kgs_list($list['h_id'],$list['date']);
				$genaral_waste_qty=$this->get_genaral_waste_qty_list($list['h_id'],$list['date']);
				$infected_plastics_kgs=$this->get_infected_plastics_kgs_list($list['h_id'],$list['date']);
				$infected_plastics_qty=$this->get_infected_plastics_qty_list($list['h_id'],$list['date']);
				$infected_waste_kgs=$this->get_infected_waste_kgs_list($list['h_id'],$list['date']);
				$infected_waste_qty=$this->get_infected_waste_qty_list($list['h_id'],$list['date']);
				$glassware_watse_kgs=$this->get_glassware_watse_kgs_list($list['h_id'],$list['date']);
				$glassware_watse_qty=$this->get_glassware_watse_qty_list($list['h_id'],$list['date']);
				$scan_watse=$this->get_total_scan_waste($list['h_id'],$list['date']);
				$rescan_watse=$this->get_total_rescan_waste($list['h_id'],$list['date']);
			
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
				$data[$list['h_id'].$list['date']]['total_scan_waste']=isset($scan_watse['total'])?$scan_watse['total']:'';
				$data[$list['h_id'].$list['date']]['total_rescan_waste']=isset($rescan_watse['total'])?$rescan_watse['total']:'';
			
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
	public  function get_total_scan_waste($h_id,$date){
		$this->db->select('SUM(total) as total')->from('hospital_waste');
		$this->db->where('hospital_waste.h_id',$h_id);
		$this->db->where('hospital_waste.date',$date);
		return $this->db->get()->row_array();
	}public  function get_total_rescan_waste($h_id,$date){
		$this->db->select('SUM(crosscheck_total) as total')->from('hospital_waste');
		$this->db->where('hospital_waste.h_id',$h_id);
		$this->db->where('hospital_waste.date',$date);
		return $this->db->get()->row_array();
	}
		
	
	

}