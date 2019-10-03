<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers_model extends CI_Model {

	var $table = 'hospital_waste as hw';
	var $column_order = array(null,null,null,'hw.current_address','hw.create_at','hw.create_at','hw.genaral_waste_kgs','hw.genaral_waste_qty','hw.infected_plastics_kgs','hw.infected_plastics_qty','hw.infected_waste_kgs','hw.infected_waste_qty','hw.infected_c_waste_kgs','hw.infected_c_waste_qty','hw.glassware_watse_kgs','hw.glassware_watse_qty','hw.updated_time','hw.updated_time','hw.bio_current_address','hw.bio_genaral_waste_kgs','hw.bio_genaral_waste_qty','hw.bio_infected_plastics_kgs'	,'hw.bio_infected_plastics_qty'	,'hw.bio_infected_waste_kgs','hw.bio_infected_waste_qty','hw.bio_infected_c_waste_kgs','hw.bio_infected_c_waste_qty','hw.bio_glassware_watse_kgs','hw.bio_glassware_watse_qty',null,null);
	var $column_search = array('hw.current_address','hw.create_at','hw.create_at','sum(hw.genaral_waste_kgs) as genaral_waste_kg','sum(hw.genaral_waste_qty) as genaral_waste_qt','sum(hw.infected_plastics_kgs) as infected_plastics_kg','sum(hw.infected_plastics_qty) as infected_plastics_qt ','sum(hw.infected_waste_kgs) as infected_waste_kg','sum(hw.infected_waste_qty) as infected_waste_qt','sum(hw.infected_c_waste_kgs) as infected_c_waste_kg','sum(hw.infected_c_waste_qty) as infected_c_waste_qt','sum(hw.glassware_watse_kgs) as glassware_watse_kg','sum(hw.glassware_watse_qty) as glassware_watse_qt','hw.updated_time','hw.updated_time','hw.bio_current_address','sum(hw.bio_genaral_waste_kgs) as bio_genaral_waste_kg','hw.bio_genaral_waste_qty','hw.bio_infected_plastics_kgs'	,'hw.bio_infected_plastics_qty'	,'hw.bio_infected_waste_kgs','hw.bio_infected_waste_qty','hw.bio_infected_c_waste_kgs','hw.bio_infected_c_waste_qty','hw.bio_glassware_watse_kgs','hw.bio_glassware_watse_qty');
	//var $column_search = array('hw.id','hl.hospital_name','hl.type','hw.current_address','hw.create_at','hw.create_at','sum(hw.genaral_waste_kgs) as genaral_waste_kg','sum(hw.genaral_waste_qty) as genaral_waste_qt','sum(hw.infected_plastics_kgs) as infected_plastics_kg','sum(hw.infected_plastics_qty) as infected_plastics_qt','sum(hw.infected_waste_kgs) as infected_waste_kg','sum(hw.infected_waste_qty) as infected_waste_qt','sum(hw.glassware_watse_kgs) as glassware_watse_kg','sum(hw.glassware_watse_qty) as glassware_watse_qt','hw.updated_time','hw.updated_time','hw.bio_current_address','sum(hw.bio_genaral_waste_kgs) as bio_genaral_waste_kg','sum(hw.bio_genaral_waste_qty) as bio_genaral_waste_qt','sum(hw.bio_infected_plastics_kgs) as bio_infected_plastics_kg'	,'sum(hw.bio_infected_plastics_qty) as bio_infected_plastics_qt','sum(hw.bio_infected_waste_kgs) as bio_infected_waste_kg','sum(hw.bio_infected_waste_qty) as bio_infected_waste_qt','sum(hw.bio_glassware_watse_kgs) as bio_glassware_watse_kg','sum(hw.bio_glassware_watse_qty) as bio_glassware_watse_qt','sum(hw.infected_c_waste_kgs) as infected_c_waste_kg','sum(hw.infected_c_waste_qty) as infected_c_waste_qt','sum(hw.bio_infected_c_waste_kgs) as bio_infected_c_waste_kg','sum(hw.bio_infected_c_waste_qty) as bio_infected_c_waste_qt','sum(hw.crosscheck_total) as bio_total','hw.bio_glassware_watse_qty');
	//set column field database for datatable searchable 
	var $order = array('id' => 'desc'); // default order 

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private function _get_datatables_query($a_id)
	{
		
		
		//echo '<pre>';print_r($aid);exit;
		$this->db->select("hw.id,hl.hospital_name,hl.type,hw.h_id,hw.date,hw.create_at,hw.updated_time,hw.current_address,hw.bio_current_address,sum(hw.genaral_waste_kgs) as genaral_waste_kg,sum(hw.genaral_waste_qty) as genaral_waste_qt,sum(hw.infected_plastics_kgs) as infected_plastics_kg,sum(hw.infected_plastics_qty) as infected_plastics_qt,sum(hw.infected_waste_kgs) as infected_waste_kg,sum(hw.infected_waste_qty) as infected_waste_qt,sum(hw.glassware_watse_kgs) as glassware_watse_kg,sum(hw.glassware_watse_qty) as glassware_watse_qt,sum(hw.total) as total,sum(hw.bio_genaral_waste_kgs) as bio_genaral_waste_kg,sum(hw.bio_genaral_waste_qty) as bio_genaral_waste_qt,sum(hw.bio_infected_plastics_kgs) as bio_infected_plastics_kg,sum(hw.bio_infected_plastics_qty) as bio_infected_plastics_qt,sum(hw.bio_infected_waste_kgs) as bio_infected_waste_kg,sum(hw.bio_infected_waste_qty) as bio_infected_waste_qt,sum(hw.bio_glassware_watse_kgs) as bio_glassware_watse_kg,sum(hw.bio_glassware_watse_qty) as bio_glassware_watse_qt,sum(hw.crosscheck_total) as bio_total,sum(hw.infected_c_waste_kgs) as infected_c_waste_kg,sum(hw.infected_c_waste_qty) as infected_c_waste_qt,sum(hw.bio_infected_c_waste_kgs) as bio_infected_c_waste_kg,sum(hw.bio_infected_c_waste_qty) as bio_infected_c_waste_qt,TIMEDIFF(if(hw.updated_time!='',hw.updated_time, NOW()),hw.create_at) as dif_hrs, REPLACE(TIMESTAMPDIFF(DAY,IF(hw.updated_time!='', `hw`.`updated_time`, NOW()), hw.create_at), '-', '') AS dif_day")->from('hospital_waste as hw');
		$this->db->join('hospital_list  as hl', 'hl.h_id = hw.h_id', 'left');
		$this->db->group_by('hw.date');
		$this->db->group_by('hw.h_id');
		$this->db->where('hl.create_by',$a_id);
		//echo '<pre>';print_r($return);exit;
		//$this->db->from($this->table);

		$i = 0;
	
		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables($id)
	{
		$this->_get_datatables_query($id);
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered($id)
	{
		$this->_get_datatables_query($id);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all($a_id)
	{
		$this->db->select("hw.id,hl.hospital_name,hl.type,hw.h_id,hw.date,hw.create_at,hw.updated_time,hw.current_address,hw.bio_current_address,sum(hw.genaral_waste_kgs) as genaral_waste_kg,sum(hw.genaral_waste_qty) as genaral_waste_qt,sum(hw.infected_plastics_kgs) as infected_plastics_kg,sum(hw.infected_plastics_qty) as infected_plastics_qt,sum(hw.infected_waste_kgs) as infected_waste_kg,sum(hw.infected_waste_qty) as infected_waste_qt,sum(hw.glassware_watse_kgs) as glassware_watse_kg,sum(hw.glassware_watse_qty) as glassware_watse_qt,sum(hw.total) as total,sum(hw.bio_genaral_waste_kgs) as bio_genaral_waste_kg,sum(hw.bio_genaral_waste_qty) as bio_genaral_waste_qt,sum(hw.bio_infected_plastics_kgs) as bio_infected_plastics_kg,sum(hw.bio_infected_plastics_qty) as bio_infected_plastics_qt,sum(hw.bio_infected_waste_kgs) as bio_infected_waste_kg,sum(hw.bio_infected_waste_qty) as bio_infected_waste_qt,sum(hw.bio_glassware_watse_kgs) as bio_glassware_watse_kg,sum(hw.bio_glassware_watse_qty) as bio_glassware_watse_qt,sum(hw.crosscheck_total) as bio_total,sum(hw.infected_c_waste_kgs) as infected_c_waste_kg,sum(hw.infected_c_waste_qty) as infected_c_waste_qt,sum(hw.bio_infected_c_waste_kgs) as bio_infected_c_waste_kg,sum(hw.bio_infected_c_waste_qty) as bio_infected_c_waste_qt,TIMEDIFF(if(hw.updated_time!='',hw.updated_time, NOW()),hw.create_at) as dif_hrs, REPLACE(TIMESTAMPDIFF(DAY,IF(hw.updated_time!='', `hw`.`updated_time`, NOW()), hw.create_at), '-', '') AS dif_day")->from('hospital_waste as hw');
		$this->db->join('hospital_list  as hl', 'hl.h_id = hw.h_id', 'left');
		$this->db->group_by('hw.date');
		$this->db->group_by('hw.h_id');
		$this->db->where('hl.create_by',$a_id);
		return $this->db->count_all_results();
	}

}
