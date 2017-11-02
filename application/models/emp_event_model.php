<?php
class Emp_event_model extends CI_Model{
		
		function __construct(){
			parent::__construct();
			$this->load->database("mydb");
		}


public function get_all_emp_events()
{
		$query = $this->db->get('emp_events');
		return $query->result();
}


public function insert_to_db($id,$date,$all_employees)
{

		return $this->db->insert('emp_event', $id,$date,$all_employees);
}



public function get_current_employees($date)
{
	
	$this->db->select('emp_event.employee_id');
	$this->db->from('emp_event');
	$this->db->where('emp_event.date',$date);
	$query = $this->db->get();
	return $query->result();
	
	
}

public function get_team($date,$id)
{
	$this->db->select('emp_event.employee_id');
	$this->db->from('emp_event');
	$this->db->where('emp_event.date',$date);
	$this->db->where('emp_event.event_id',$id);
	$query = $this->db->get();
	return $query->result();
	
}


public function getById($id){
		$query = $this->db->get_where('team',array('id'=>$id));
		return $query->row_array();
}


public function update_info($data,$id)
{
	$this->db->where('team.id',$id);
	return $this->db->update('team', $data);

}
public function delete_a_team($id)
{
	$this->db->where('team.id',$id);
	return $this->db->delete('team');

}

}


?>