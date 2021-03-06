<?php

Class User_model extends CI_Model {

    //check if login data exists in db


    public function setAutoReg($data) {
        $this->db->insert('user', $data);
    }

    public function array_from_post($fields) {
        $data = array();

        foreach ($fields as $field) {
            $data[$field] = $this->input->post($field);
        }
        return $data;
    }

    public function setPasswordChange($inputData) {
        $username = $this->session->userdata('username');
        //echo 'setPasswordChange<br>' . $userbean->email;
        $this->db->select('*');
        $this->db->from('user');
        $pword = sha1($inputData['currentpass']);
//        $where = " username = '" . $username. "' AND password = '" . $pword . "'";
        $this->db->where('username',$username);
        $this->db->where('password',$pword);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }
    
    
    
    
    
    public function updatePassword($pwd) {
        $userid = $this->session->userdata('userid');
        $pwordx = sha1($pwd);
//        echo '<tt><pre>'.var_export($userbean, TRUE).'</pre></tt>';
        $this->db->set('password',$pwordx );
        $this->db->where('id', $userid);
        $this->db->update('user');
    }

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