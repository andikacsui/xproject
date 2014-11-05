<?php

class account_model extends CI_Model {
	
	function __construct()
    {
		$this->load->database();
        parent::__construct();
    }
	
	function get_login($username, $password) {
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		
		$query = $this->db->get();
		$result = $query->row_array();
		return $result;
	}
	
	function get_role($id){
		$this->db->select('*');
		$this->db->from('user_role');
		$this->db->join('role', 'user_role.role_id = role.id', 'left');
		$this->db->where('user_id', $id);
		
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	
	
}

?>