<?php

class Quotation_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database("mydb");
    }

    public function get_all_quotation() {
        $this->db->select('*');
        $this->db->from('quotation');
        $this->db->order_by("id", "desc");;
        $query = $this->db->get();
        
        return $query->result();
    }

    function get_new() { //
        $Event = new stdClass();
        $Event->id = '';
        return $Event;
    }

    public function array_from_post($fields) {
        $data = array();

        foreach ($fields as $field) {
            $data[$field] = $this->input->post($field);
        }
        return $data;
    }

    public function setBooking($param) {
        $this->db->insert('quotation',$param);
        $insert_id = $this->db->insert_id();
        return $insert_id;//quatation id
    }

    public function camera_charge($id) {
        $this->db->select('(no_of_cams * charge_per_cam) as camera_charge');
        $this->db->from('event e');
        $this->db->join('package p', 'p.id = e.package_id');
        $this->db->where('e.id', $id);

        $query = $this->db->get();
        return $query->row_array();
    }

    public function insert_quotation_db($qqdata) {
        return $this->db->insert('quotation', $qqdata);
    }

    public function call_sp() {
        // $query = $this->db->query("call SPInsertEventTran()");
        // return $query->result();

        $SQL = "call SPNoOfCams("
                . $cams_for_pack . ","
                . $a . ","
                . " @tot" //output
                . ");";

        $this->db->trans_start();
        $query = $this->db->query($SQL); // not need to get output
        // $this->db->query("SELECT @tot as row1");
        $this->db->trans_complete();

        $result = array();

        foreach ($query->result() as $rows) {
            $result[] = $rows;
        }

        // $query->next_result();
        // $query->free_result();
        // return $result;
        var_dump($result);
        exit();
    }

    public function get_qotation_id() {
        $query = $this->db->query("call SPGetQuotIdTran()");
        // return $query->result();
        var_dump($query->result());
        exit();
    }

    public function getById($id) {
        $query = $this->db->get_where('quotation', array('id' => $id));
        return $query->row_array();
    }

    public function update_info($data, $id) {
        $this->db->where('quotation.id', $id);
        return $this->db->update('quotation', $data);
    }

    public function delete_a_quotation($id) {
        $this->db->where('quotation.id', $id);
        return $this->db->delete('quotation');
    }

}

?>