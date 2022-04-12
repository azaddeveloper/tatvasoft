<?php

class Event_model extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->table="events";
	}

	public function add($data){
		$this->db->insert($this->table,$data);
	}
	
	function getAllEvents($id="") {
		$this->db->select("*")->from($this->table);
		if($id != ''){
			$this->db->where("id",$id);
		}
		$query= $this->db->get();
		return $query->result_array();	
	}
	function deleteEvent($id){
		$this->db->delete($this->table,array("id"=>$id));
		return true;
	}
	

}
?>