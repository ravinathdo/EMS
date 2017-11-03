<?php
class Emp_position_model extends CI_Model{
		
		function __construct(){
			parent::__construct();
			$this->load->database("mydb");
		}

public function get_all_employee_positions($data)
{
			
	$query = $this->db->get('emp_position');
	return $query->result();
		
}

public function get_camaramens($data)
{
	$this->db->select('emp_position.employee_id');
	$this->db->from('emp_position');
	$this->db->where('emp_position.position','c');
	$this->db->where('emp_position.employee_id NOT IN ('.implode(", ",$data).')');
	$query=$this->db->get();
	return $query->result();
	
}


public function get_camara_assistants($data)
{
	
		
	$this->db->select('emp_position.employee_id');
	$this->db->from('emp_position');
	$this->db->where('emp_position.position','ca');
	$this->db->where('emp_position.employee_id NOT IN ('.implode(", ",$data).')');
	$query=$this->db->get();
	return $query->result();
}


public function get_technical_assistants($data)
{
	

	$this->db->select('emp_position.employee_id');
	$this->db->from('emp_position');
	$this->db->where('emp_position.position','ta');
	$this->db->where('emp_position.employee_id NOT IN ('.implode(", ",$data).')');
	$query=$this->db->get();
	return $query->result();

}


public function get_system_engineer($data)
{


	$this->db->select('emp_position.employee_id');
	$this->db->from('emp_position');
	$this->db->where('emp_position.position','se');
	$this->db->where('emp_position.employee_id NOT IN ('.implode(", ",$data).')');
	$query=$this->db->get();
	return $query->result();
	
}


public function get_audio_operator($data)
{

	
	$this->db->select('emp_position.employee_id');
	$this->db->from('emp_position');
	$this->db->where('emp_position.position','ao');
	$this->db->where('emp_position.employee_id NOT IN ('.implode(", ",$data).')');
	$query=$this->db->get();
	return $query->result();
}


public function get_video_operator($data)
{


	$this->db->select('emp_position.employee_id');
	$this->db->from('emp_position');
	$this->db->where('emp_position.position','vo');
	$this->db->where('emp_position.employee_id NOT IN ('.implode(", ",$data).')');
	$query=$this->db->get();
	return $query->result();

}
// public function get_emp_for_team()
// {
// 	$this->db->select('employee.name');
// 	$this->db->select('employee.c' OR 'employee.ca' OR 'employee.ta' OR 'employee.se' OR 'employee.ao' OR 'employee.vo' OR 'employee.fm');

// 	$this->db->from('employee');
// 	$this->db->where('employee.id',$employee_id);

// 	$query=$this->db->get();
// 	return $query->result();
// }

public function insert_employee_position_to_db($data)
{
	
return $this->db->insert('emp_position', $data);

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