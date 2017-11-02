<?php

Class User_model extends CI_Model {

	//check if login data exists in db
	

	// Insert registration data in database
	public function registration_insert($data) {
		// Query to check whether username already exist or not
		$condition = "username =" . "'" . $data['username'] . "'";
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			// Query to insert data in database
			$this->db->insert('user', $data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}
		} else {
			return false;
		}
	}

	/* public function get_employee($username) {
	 	$condition = "username =" . "'" . $username . "'";
	 	$this->db->select('name');
	 	$this->db->from('employee');
	 	$this->db->join('user','user.employee_id = employee.id');
	 	$this->db->where('user.username =',$username);
	 	$query=$this->db->get();
	 	return $query->result();
	} */

}
?>