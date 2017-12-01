<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Report
 *
 * @author User
 */
class Report extends CI_Controller{
    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->model('report_model');
        $this->load->model('employee_model');
    }
    
    public function loadEmployeeEvent() {
        $data['employee_list'] = $this->employee_model->get_all_employee();
        $this->load->view('admin_report_employee_event',$data);
    }
    public function employeeEvent() {
        $inputArr = $this->report_model->array_from_post(array("empid"));
       // echo '<tt><pre>' . var_export($inputArr, TRUE) . '</pre></tt>';
        $data['employeeEvent'] = $this->report_model->getEmployeeEvent($inputArr['empid']);
       // echo '<tt><pre>' . var_export($data['employeeEvent'], TRUE) . '</pre></tt>';
                $data['employee_list'] = $this->employee_model->get_all_employee();

        $this->load->view('admin_report_employee_event',$data);
    }
    
    public function employeeIndividualEvent() {
        //$inputArr = $this->report_model->array_from_post(array("empid"));
       // echo '<tt><pre>' . var_export($inputArr, TRUE) . '</pre></tt>';
        $eid = $this->session->userdata('userid');
        $data['employeeEvent'] = $this->report_model->getEmployeeEvent($eid);
       // echo '<tt><pre>' . var_export($data['employeeEvent'], TRUE) . '</pre></tt>';
                $data['employee_list'] = $this->employee_model->get_all_employee();

        $this->load->view('employee_event_list',$data);
    }
    
    public function loadEventReport() {
        $this->load->view('admin_report_event');
    }
    public function eventReport() {
        $inputArr = $this->report_model->array_from_post(array("fromDate","toDate"));
                
        $data['eventList'] = $this->report_model->getEventReport($inputArr['fromDate'],$inputArr['toDate']);
       // echo '<tt><pre>' . var_export($data['eventList'], TRUE) . '</pre></tt>';
        $this->load->view('admin_report_event',$data);
    }
    
    
    
    
}
