<?php

class Event_model extends CI_Model {

    function construct() {
        parent::__construct();
        $this->load->database("mydb");
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
    
    

    public function setEvent($param) {
        $this->db->insert('event', $param);
        return $param;
    }

    public function get_all_events() {
        $this->db->select('*');
        $this->db->from('event');
        $this->db->order_by("id", "desc");
        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }

    public function get_no_of_cams_from_db($id) {
        $this->db->select('event.no_of_cams');
        $this->db->from('event');
        $this->db->where('event.id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function getById($id) {
        $query = $this->db->get_where('event', array('id' => $id));
        return $query->row_array();
    }

    public function getLastId() {
        $this->db->select_max('id');
        $this->db->from('event');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_event_name($event_id) {
        $this->db->select('event.name');
        $this->db->from('event');
        $this->db->where('event.id', $event_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function update_event($data, $id) {
        $this->db->where('event.id', $id);
        return $this->db->update('event', $data);
    }

    public function delete_a_event($id) {
        $this->db->where('event.id', $id);
        return $this->db->delete('event');
    }

    public function upcoming_events() {
        $this->db->select('*');
        $this->db->from('event');
        // $this->db->where('event.date > ', date("Y-m-d"));
        $this->db->where('event.booked_or_not', 'booked');
        $query = $this->db->get();
        return $query->result();
    }

    public function calendar_events() {
        $this->db->select('*');
        $this->db->from('event e');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_similer_events($oneEvent, $all_package_id) {
        $edata = array();

        foreach ($all_package_id as $data) {

            $pkg_id = intval($data['id']);

            $this->db->select_sum('no_of_cams');
            $this->db->from('event');
            $this->db->where('event.date', $oneEvent);
            $this->db->where('package_id', $pkg_id);
            $query = $this->db->get();

            $edata[] = array_merge($query->row_array(), array('pkg_id' => $pkg_id));
        }
        return $edata;
    }

    public function insert_event_to_db($evdata) {

        $this->db->insert('event', $evdata);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function find_no_of_cams($event_id) {
        $this->db->select('event.no_of_cams');
        $this->db->from('event');
        $this->db->where('event.id', $event_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function save_basic_event_details($evdata) {
        return $this->db->insert('event,event_dates', $evdata);
    }

    public function getEvents($pkg_id, $date) {
        $this->db->select_sum('no_of_cams');
        $this->db->from('event');
        $this->db->where('package_id', $pkg_id);
        $this->db->where('date', $date);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function getEventByID($id) {
        /*
          SELECT event.*,package.description FROM event
          INNER JOIN package
          ON event.package_id = package.id
          WHERE event.id = 12
         */
        $this->db->select('event.*,package.description,package.charge_per_cam');
        $this->db->from('event');
        $this->db->join('package','event.package_id = package.id');
        $this->db->where('event.id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

}

?>