<?php

if (!defined('BASEPATH'))
    exit('no direct script access allowed');

class Quotation extends CI_Controller {

    function __construct() {
        parent::__construct();
        #$this->load->helper('');
        $this->load->model('quotation_model');
        $this->load->model('event_model');
    }

    public function index() {
        $yy = $this->event_model->getLastId();
        $data['xx'] = $this->quotation_model->camera_charge($yy['id']);

        $this->load->view('quotation_insertview', $data);
    }

    public function insert_new_quotation() {
        $qqdata['event_id'] = $this->input->post('event_id');
        $qqdata['camera_charges'] = $this->input->post('camera_charges');
        $qqdata['other'] = $this->input->post('other');
        $qqdata['discount'] = $this->input->post('discount');

        $res = $this->quotation_model->insert_quotation_db($qqdata);

        if ($res) {
            $this->generate_quotation();
        }
    }

    public function setQuatation() {
        $this->load->model('quotation_model');
        $this->load->model('event_model');
        $this->load->model('Payment_model');
        $form_data = $this->quotation_model->array_from_post('event_id', 'camera_charges', 'other', 'discount', 'total', 'pay_amount', 'balance_amount');


        //insert into quatation -> quatation_id
        $quatatonArray = array('camera_charges' => $form_data['$form_data'],
            'other' => $form_data['other'],
            'discount' => $form_data['discount'],
            'total' => $form_data['total']
        );

        $qid = $this->quotation_model->setBooking($quatatonArray);


        //insert intp paymant 
        $paymentArray = array('payment' => $form_data['pay_amount'],
            'quotation_id' => $qid);
        $this->Payment_model->insert_payment_db($paymentArray);

        //update event table (booked_or_not,balance_amount)
        $eventArray = array('booked_or_not' => 'booked',
            'balance_amount' => $form_data['balance_amount']);
        $this->event_model->update_event($eventArray);


        
        $this->load->view('event_insertview', $data);
    }

    public function generate_quotation() {
        $this->load->view('basic_event_view');
    }

    public function edit() {
        $id = $this->uri->segment(3);
        $data['quotation'] = $this->quotation_model->getById($id);
        $this->load->view('quotation_editview', $data);
    }

    public function update() {

        $mdata['camera_charges'] = $_POST['camera_charges'];
        $mdata['other'] = $_POST['other'];
        $mdata['discount'] = $_POST['discount'];
        $mdata['event_id'] = $_POST['event_id'];


        $res = $this->quotation_model->update_info($mdata, $_POST['id']);

        if ($res) {
            header('location:' . base_url() . "index.php/quotation/" . $this->index());
        }
    }

    public function delete($id) {
        $this->quotation_model->delete_a_quotation($id);
        $this->index();
    }

}

?>