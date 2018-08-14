<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	public function get_all_users_list($admin_id){
		$this->db->select('*')->from('admin');		
		$this->db->where('create_by', $admin_id);
		$this->db->where('status !=', 2);
		$this->db->order_by('create_by',"DESC");
        return $this->db->get()->result_array();

	}		

public  function get_user_details($a_id){
	
$this->db->select('*')->from('admin');		
$this->db->where('a_id',$a_id);
return $this->db->get()->row_array();
	

}
public  function update_admin_details($id,$data){
	$this->db->where('a_id',$id);
	return $this->db->update('admin',$data);
}





}