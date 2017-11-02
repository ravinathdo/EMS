<?php
class Customer_model extends CI_Model{
		
		function __construct(){
			parent::__construct();
			$this->load->database("mydb");
		}

public function get_all_customer()
{
		$query = $this->db->get('customer');
		return $query->result();
}



public function insert_customer_to_db($cdata)
{
	return $this->db->insert('customer', $cdata);

}


public function getById($id){
		$query = $this->db->get_where('customer',array('id'=>$id));
		return $query->row_array();
}


public function update_info($data,$id)
{
	$this->db->where('customer.id',$id);
	return $this->db->update('customer', $data);

}
public function delete_a_customer($id)
{
	$this->db->where('customer.id',$id);
	return $this->db->delete('customer');

}

}


?>