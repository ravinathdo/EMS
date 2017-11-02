<?php
class Employee_model extends CI_Model{
		
		function __construct(){
			parent::__construct();
			$this->load->database("mydb");
		}

public function get_all_employee()
{
		$query = $this->db->get('employee');
		return $query->result();
}


public function get_c_names($c)
{
	$cdata = array();
	foreach($c as $row) {
	$cdata[] = $row->employee_id;
	}

		$this->db->select('employee.name');
	    $this->db->from('employee');
	   	$this->db->where('employee.id IN ('.implode(", ",$cdata).')');
	    $query=$this->db->get();
		return $query->result();

}


public function get_ca_names($ca)
{
	$cadata = array();
	foreach($ca as $row) {
	$cadata[] = $row->employee_id;
	}
		$this->db->select('employee.name');
	    $this->db->from('employee');
	    $this->db->where('employee.id IN ('.implode(", ",$cadata).')');
	    $query=$this->db->get();
		return $query->result();
		

		
}

public function get_ta_names($ta)
{
	$tadata = array();
	foreach($ta as $row) {
	$tadata[] = $row->employee_id;
	}
		$this->db->select('employee.name');
	    $this->db->from('employee');
	    $this->db->where('employee.id IN ('.implode(", ",$tadata).')');
	    $query=$this->db->get();
		return $query->result();
		
}


public function get_se_names($se)
{
	$sedata = array();
	foreach($se as $row) {
	$sedata[] = $row->employee_id;
	}
		$this->db->select('employee.name');
	    $this->db->from('employee');
	    $this->db->where('employee.id IN ('.implode(", ",$sedata).')');
	    $query=$this->db->get();
		return $query->result();
		
}


public function get_ao_names($ao)
{
	$aodata = array();
	foreach($ao as $row) {
	$aodata[] = $row->employee_id;
	}
		$this->db->select('employee.name');
	    $this->db->from('employee');
	    $this->db->where('employee.id IN ('.implode(", ",$aodata).')');
	    $query=$this->db->get();
		return $query->result();
		
}


public function get_vo_names($vo)
{
	$vodata = array();
	foreach($vo as $row) {
	$vodata[] = $row->employee_id;
	}
		$this->db->select('employee.name');
	    $this->db->from('employee');
	    $this->db->where('employee.id IN ('.implode(", ",$vodata).')');
	    $query=$this->db->get();
		return $query->result();
		
}

public function check_user_login($username, $password) {
		$this->db->select('*');
	    $this->db->from('employee');
	    $this->db->join('user', 'employee.id = user.employee_id', 'left');
	    $this->db->where('user.username', $username);
	    $this->db->where('user.password', $password);

	    $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            $data = $query->result_array();            
            return $data;
        } else {
            return false;
        }
	}


public function get_employee_names_C($n_cams)
{
	$this->db->select('employee.id');
	$this->db->from('employee');
	$this->db->limit($n_cams);
	$this->db->where('employee.c','1' AND 'employee.status','1');
	$query=$this->db->get();
	return $query->result();
}
public function get_employee_names_CA($n_cams)
{
	
	$this->db->select('employee.id');
	$this->db->from('employee');
	// $this->db->limit($n_cams '/','2');
	$this->db->where('employee.ca','1' AND 'employee.status','1');
	$query=$this->db->get();
	return $query->result();
}

public function get_employee_names_TA()
{
	$this->db->select('employee.id');
	$this->db->from('employee');
	$this->db->limit('1');
	$this->db->where('employee.ta','1' AND 'employee.status','1');//    OR 'employee.se','1' OR 'employee.ao','1' OR 'employee.vo','1' OR 'employee.fm','1');
	$this->db->where('employee.status','1');
	$query=$this->db->get();
	return $query->result();

}

public function get_employee_names_SE()
{
	
	$this->db->select('employee.id');
	$this->db->from('employee');
	// $this->db->limit($n_cams '/','2');
	$this->db->where('employee.se','1' AND 'employee.status','1');
	$query=$this->db->get();
	return $query->result();
}

public function get_employee_names_AO()
{
	
	$this->db->select('employee.id');
	$this->db->from('employee');
	// $this->db->limit($n_cams '/','2');
	$this->db->where('employee.ao','1' AND 'employee.status','1');
	$query=$this->db->get();
	return $query->result();
}

public function get_employee_names_VO()
{
	
	$this->db->select('employee.id');
	$this->db->from('employee');
	// $this->db->limit($n_cams '/','2');
	$this->db->where('employee.vo','1' AND 'employee.status','1');
	$query=$this->db->get();
	return $query->result();
}

public function get_employee_names_FM()
{
	
	$this->db->select('employee.id');
	$this->db->from('employee');
	// $this->db->limit($n_cams '/','2');
	$this->db->where('employee.fm','1' AND 'employee.status','1');
	$query=$this->db->get();
	return $query->result();
}

public function get_emp_for_team()
{
	$this->db->select('employee.name');
	$this->db->select('employee.c' OR 'employee.ca' OR 'employee.ta' OR 'employee.se' OR 'employee.ao' OR 'employee.vo' OR 'employee.fm');

	$this->db->from('employee');
	$this->db->where('employee.id',$employee_id);

	$query=$this->db->get();
	return $query->result();
}

public function insert_employee_to_db($emdata)
{
	$this->db->insert('employee', $emdata);
	return $this->db->insert_id();

}



public function getById($id){
		$query = $this->db->get_where('employee',array('id'=>$id));
		return $query->row_array();
}


public function update_info($data,$id)
{
	$this->db->where('employee.id',$id);
	return $this->db->update('employee', $data);

}
public function delete_a_employee($id)
{
	$this->db->where('employee.id',$id);
	return $this->db->delete('employee');

}

}


?>