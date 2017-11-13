<?php

if (!defined('BASEPATH'))
    exit('no direct script access allowed');

class Payment extends CI_Controller {

    function __construct() {
        parent::__construct();
        #$this->load->helper('');
        $this->load->model('employee_model');
        $this->load->model('payment_model');
        $this->load->model('quotation_model');
        $this->load->model('event_model');
    }
    
    function list_quatations(){
       $data['quoList'] = $this->quotation_model->get_quotation_for_payment(); 
       //echo '<tt><pre>'.var_export($data['quoList'], TRUE).'</pre></tt>';
       $this->load->view('quotation_list',$data);
    }

    function load_payment($qid,$eid){
         //load payment history for quotation 
        $data['quoDetail'] =  $this->quotation_model->getById($qid);
        $data['eventDetail'] =  $this->event_model->getById($eid);
        //get event details from event id
       //get payment history
        $data['paymentHistory'] =  $this->payment_model->getQuotationPayment($qid);
        
         $this->load->view('payment_insertview', $data);
    }
    
    public function index() {
        $this->load->view('payment_detailsview', $data);
        $data['payment_list'] = $this->payment_model->get_all_payment();
    }

    public function add_new_payment() {
        $data = array();
        // echo 'add_new_payment';
        //$data['quotation'] = $this->quotation_model->get_all_quotation();
        $this->load->view('payment_insertview', $data);
    }

    public function insert_newpayment_db() {
        $edata['quotation_id'] = $this->input->post('quotation_id');
        $edata['event_id'] = $this->input->post('event_id');
        $edata['payment'] = $this->input->post('payment');

        //find out the event form quotation_id
        $event = $this->quotation_model->getEventFromQuataionID($edata['quotation_id']);
        echo '<tt><pre>'.var_export($event, TRUE).'</pre></tt>';
        if ($event) {
            $balance = $event['balance_amount'] - $edata['payment'];
            //update the balance 
        }else{
            echo 'Booked , Quatation Not found';
        }
        
        
        
        $res = $this->payment_model->insert_payment_db($edata);
        echo '<tt><pre>' . var_export($res, TRUE) . '</pre></tt>';
        if ($res) {
            
              //load payment history for quotation 
        $data['quoDetail'] =  $this->quotation_model->getById($edata['quotation_id']);
        $data['eventDetail'] =  $this->event_model->getById($edata['event_id']);
        //get event details from event id
       //get payment history
        $data['paymentHistory'] =  $this->payment_model->getQuotationPayment($edata['quotation_id']);
        
        $data['msg'] = '<p class="bg-success">Payment successful</p>';
            $this->load->view('payment_insertview',$data);
            // header('location:' . base_url() . "index.php/payment/" . $this->index());
        }
    }

    public function edit() {
        $id = $this->uri->segment(3);
        $data['payment'] = $this->payment_model->getById($id);
        $this->load->view('payment_editview', $data);
    }

    public function update() {

        $mdata['date'] = $_POST['date'];
        $mdata['payed'] = $_POST['payed'];

        $res = $this->payment_model->update_info($mdata, $_POST['id']);

        if ($res) {
            header('location:' . base_url() . "index.php/payment/" . $this->index());
        }
    }

    public function delete($id) {
        $this->payment_model->delete_a_payment($id);
        $this->index();
    }

}

?>
