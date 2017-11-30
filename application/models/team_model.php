<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of team_model
 *
 * @author User
 */
class team_model extends CI_Model {

    //put your code here
    //$position_id -> AUDIO_OPERATER
    public function getFreePositionEmpList($eid, $position_id, $eidArr) {
        /*
          SELECT employee.* FROM employee
          INNER JOIN emp_position
          ON employee.id = emp_position.employee_id
          WHERE emp_position.position_id = 'AUDIO_OPERATER'
          AND employee.id NOT IN
          ( SELECT employee_id FROM emp_event WHERE event_id = 1 AND position_id = 'AUDIO_OPERATER' )
         *          */
        $this->db->select('employee.*');
        $this->db->from('employee');
        $this->db->join('emp_position', 'employee.id = emp_position.employee_id');
        $this->db->where('emp_position.position_id', $position_id);
        $this->db->where_not_in('employee.id', $eidArr);
        $query = $this->db->get();

        $result = $query->result();
        if ($result) {
            return $result;
        } else {
            return FALSE;
        }
    }

    public function array_from_post($fields) {
        $data = array();

        foreach ($fields as $field) {
            $data[$field] = $this->input->post($field);
        }
        return $data;
    }

    public function getAvailiiableTeamForTheEvent($eid) {
        /*
          SELECT employee.name,emp_event.position_id FROM employee
          INNER JOIN emp_event
          ON employee.id = emp_event.employee_id
          WHERE emp_event.event_id = 1
         *          */
        $this->db->select('employee.name,emp_event.position_id');
        $this->db->from('employee');
        $this->db->join('emp_event', 'employee.id = emp_event.employee_id');
        $this->db->where('emp_event.event_id', $eid);
        $query = $this->db->get();

        $result = $query->result();
        if ($result) {
            return $result;
        } else {
            return FALSE;
        }
    }

    public function setEmployeeEvent($data) {
        try {
            $this->db->insert('emp_event', $data);
            return TRUE;
        } catch (Exception $exc) {
            return FALSE;
        }
    }

    public function getEmpPositionListForDay($date) {
        //check the event date 
        //SELECT DISTINCT employee_id FROM emp_event WHERE event_date = '2017-01-01' 
        $this->db->distinct("employee.id");
//         $this->db->select('employee.*');
        $this->db->from('emp_event');
        $this->db->where('emp_event.event_date', $date);
        $query = $this->db->get();

        $result = $query->result();
        // echo '<tt><pre>'.var_export($result, TRUE).'</pre></tt>';
        if ($result) {
            return $result;
        } else {
            return FALSE;
        }
    }

}
