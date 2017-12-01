<?php

if (!defined('BASEPATH'))
    exit('no direct script access allowed');

class Customer extends CI_Controller {

    function __construct() {
        parent::__construct();
        #$this->load->helper('');
        $this->load->model('customer_model');
    }

    public function index() {
        //check user status
        if ($this->session->userdata('logged_id')) {
            //it is valid login
            $data['customer_list'] = $this->customer_model->get_all_customer();
            $this->load->view('customer_view', $data);
        } else {
            //no direct access
            redirect(base_url() . 'index.php/login');
        }
    }

    public function add_new_customer() {
        //check user status
        if ($this->session->userdata('user_type')== 'ADMIN') {
            //it is valid login

            
            //get customer list
            $this->load->model('customer_model');
            $custList = $this->customer_model->get_all_customer();
            $data = array();
            $data['custList'] = $custList;
            $this->load->view('customer_insertview',$data);
        } else {
            //no direct access
            redirect(base_url() . 'index.php/login');
        }
    }

    public function insert_newcustomer_db() {
        //check user status
        if ($this->session->userdata('logged_id')) {
            //it is valid login
            $cdata['name'] = $this->input->post('customer_name');
            $cdata['address'] = $this->input->post('address');
            $cdata['tele'] = $this->input->post('tele');
            $res = $this->customer_model->insert_customer_to_db($cdata);

            if ($res) {

                //load customer list
                $data['msg'] = '<p class="bg-success msg">New customer created successfully</p>';
                $data['customer_list'] = $this->customer_model->get_all_customer();
                $this->load->view('customer_view', $data);
//                header('location:' . base_url() . "/customer/" . $this->index());
            }
        } else {
            //no direct access
            redirect(base_url() . 'index.php/login');
        }
    }

    public function edit() {
        //check user status
        if ($this->session->userdata('logged_id')) {
            //it is valid login
            $id = $this->uri->segment(3);
            $data['customer'] = $this->customer_model->getById($id);
            $this->load->view('customer_editview', $data);
        } else {
            //no direct access
            redirect(base_url() . 'index.php/login');
        }
    }

    public function update() {
        //check user status
        if ($this->session->userdata('logged_id')) {
            //it is valid login

            $mdata['name'] = $_POST['customer_name'];
            $mdata['address'] = $_POST['address'];
            $mdata['tele'] = $_POST['tele'];


            $res = $this->customer_model->update_info($mdata, $_POST['id']);

            if ($res) {
                header('location:' . base_url() . "index.php/Customer/" . $this->index());
            }
        } else {
            //no direct access
            redirect(base_url() . 'index.php/login');
        }
    }

    public function delete($id) {
        //check user status
        if ($this->session->userdata('logged_id')) {
            //it is valid login
            $this->customer_model->delete_a_customer($id);
            $this->index();
        } else {
            //no direct access
            redirect(base_url() . 'index.php/login');
        }
    }

}

?>