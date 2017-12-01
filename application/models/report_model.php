<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of report_model
 *
 * @author User
 */
class Report_model extends CI_Model {

    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->database("mydb");
    }

    public function array_from_post($fields) {
        $data = array();

        foreach ($fields as $field) {
            $data[$field] = $this->input->post($field);
        }
        return $data;
    }

    public function getEmployeeEvent($eid) {
        /*
          SELECT * FROM event
          INNER JOIN emp_event
          ON event.id = emp_event.event_id
          WHERE emp_event.employee_id = 2
         *          */

        $this->db->select('*');
        $this->db->from('event');
        $this->db->join('emp_event', 'event.id = emp_event.event_id');
        $this->db->where('emp_event.employee_id', $eid);

        $query = $this->db->get();

        $result = $query->result();
        if ($result) {
            return $result;
        } else {
            return FALSE;
        }
        
    }

    public function getEventReport($fromDate, $toDate) {
        $this->db->select('*');
        $this->db->from('event');
        $this->db->where('event_date >= ', $fromDate);
        $this->db->where('event_date <= ', $toDate);

        $query = $this->db->get();

        $result = $query->result();
        if ($result) {
            return $result;
        } else {
            return FALSE;
        }
    }

}
