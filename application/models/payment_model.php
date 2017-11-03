<?php
class Payment_model extends CI_Model{
		
		function __construct(){
			parent::__construct();
			$this->load->database("mydb");
		}

public function get_all_payment()
{
		$query = $this->db->get('payment');
		return $query->result();
}





public function insert_payment_db($pdata)
{
	return $this->db->insert('payment', $pdata);

}


public function getById($id){
		$query = $this->db->get_where('payment',array('id'=>$id));
		return $query->row_array();
}


public function update_info($data,$id)
{
	$this->db->where('payment.id',$id);
	return $this->db->update('payment', $data);

}
public function delete_a_payment($id)
{
	$this->db->where('payment.id',$id);
	return $this->db->delete('payment');

}

}


?>