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
		$this->db->join('user_role', 'user.id = user_role.user_id', 'left');
		$this->db->join('role', 'user_role.role_id = role.id', 'left');
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		
		$query = $this->db->get();
		$result = $query->first_row();
		return $result;
	}
	
}

?>