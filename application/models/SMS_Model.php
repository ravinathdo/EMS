<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SMS_Model
 *
 * @author User
 */
class SMS_Model extends CI_Model {

    public $SMS_SENDER = "0711111111";
    public static $SMS_EVENT_CREATION = "New event created";
    public static $SMS_PAYMENT_REMINDER = "Payment Reminder";

    public function getSMS_SENDER() {
        return $this->SMS_SENDER;
    }
    public function getSMS_EVENT_CREATION() {
        return $this->SMS_EVENT_CREATION;
    }
    public function getSMS_PAYMENT_REMINDER() {
        return $this->SMS_PAYMENT_REMINDER;
    }

    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->database("emsdb");
    }

    public function sendSMS($data) {
        $this->db->insert('ozekimessageout', $data);
    }

}
