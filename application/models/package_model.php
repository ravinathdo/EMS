<?php
class Package_model extends CI_Model{
		
		function __construct(){
			parent::__construct();
			$this->load->database("mydb");
		}

public function get_all_package()
{
		$query = $this->db->get('package');
		return $query->result();
}



public function insert_package_to_db($data)
{
	return $this->db->insert('package', $data);

}


public function getById($id){
		$query = $this->db->get_where('package',array('package'=>$id));
		return $query->row_array();
}


public function update_info($data,$id)
{
	$this->db->where('package.id',$id);
	return $this->db->update('package', $data);

}
public function delete_a_package($id)
{
	$this->db->where('package.id',$id);
	return $this->db->delete('package');

}

public function get_package_name($package_matter)
{

	$this->db->select('package.package');
	$this->db->from('package');
	$this->db->where('package.id',$package_matter['package_id']);
	$query=$this->db->get();
	return $query->result();

	
}


public function get_package_ids()
{
	$this->db->select('package.id');
	$this->db->from('package');
	$query=$this->db->get();
	return $query->result_array();
	// return $query->result();
}


public function available_cams($sum_cam,$pack_id)
{
	$this->db->select('id, sum(no_of_cameras -'. $sum_cam.') as tot');
	$this->db->from('package');
	$this->db->where('id', $pack_id);

	$query = $this->db->get();
	return $query->row_array();	 
}


public function all_cam_package($a)
{
	var_dump($a);
	exit();
	$this->db->select('package.no_of_cameras');
	$this->db->from('package');
	$this->db->where('package.id',$a);
	$query=$this->db->get();
	return $query->result();
	
}

}


?>
