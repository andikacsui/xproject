<?php

class account_model extends CI_Model {
	
	function __construct()
    {
		$this->load->database();
        parent::__construct();
    }
	
	function get_login($username, $password) {
		$this->db->select('*');
		$this->db->from('tb_user');
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		
		$query = $this->db->get();
		$result = $query->result();
		
		if(count($result) > 0)
			return true;
			
		return false;
	}
	function get_admin_login($username, $password) {
		$this->db->select('*');
		$this->db->from('tb_user');
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$this->db->where('role_id', 1);
		
		$query = $this->db->get();
		$result = $query->result();
		
		if(count($result) > 0)
			return true;
			
		return false;
	}
}

?>