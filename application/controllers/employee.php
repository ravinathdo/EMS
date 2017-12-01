<?php

if (!defined('BASEPATH'))
    exit('no direct script access allowed');

class Employee extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('employee_model');
        $this->load->model('emp_position_model');
    }

    public function index() {
        //check user status
        if ($this->session->userdata('logged_id')) {
            //it is valid login
            $data['employee_list'] = $this->employee_model->get_all_employee();
            $data['position_list'] = $this->emp_position_model->get_all_employee_positions($data);
            $this->load->view('employee_view', $data);
        } else {
            //no direct access
            redirect(base_url() . 'index.php/login');
        }
    }

    public function getEmployeePossition($param) {
        $empPosiList = $this->employee_model->getEmpPossition($param);
        $data['empPosiList'] = $empPosiList;
        $this->load->view('employee_positions', $data);
    }

    public function add_employee() {
        //check user status
        if ($this->session->userdata('logged_id')) {
            //it is valid login
            $this->load->model('employee_model');
            $posiList = $this->employee_model->getPositionList();
//                        echo '<tt><pre>'.var_export($posiList, TRUE).'</pre></tt>';
            $data['posiList'] = $posiList;
            $this->load->view('employee_insertview', $data);
        } else {
            //no direct access
            redirect(base_url() . 'index.php/login');
        }
    }

    public function insert_newemployee_db() {

        $emdata['name'] = $this->input->post('employee_name');
        $emdata['nid'] = $this->input->post('nid');
        $emdata['dob'] = $this->input->post('dob');
        $emdata['gender'] = $this->input->post('gender');
        $emdata['address'] = $this->input->post('address');
        $emdata['contact_no'] = $this->input->post('contact_no');
        $emdata['email'] = $this->input->post('email');

        $employee_id = 0;
        try {
            $employee_id = $this->employee_model->insert_employee_to_db($emdata);
        } catch (Exception $e) {
            echo 'Dupliate';
        }


        if ($employee_id != 0) {

            $check_list = $this->input->post('position');
            echo '<tt><pre>' . var_export($check_list, TRUE) . '</pre></tt>';
            foreach ($check_list as $select) {
                $data = array(
                    'employee_id' => $employee_id,
                    'position_id' => $select
                );
                $res = $this->emp_position_model->insert_employee_position_to_db($data);
            }


            //insert into user table as a EMP 
            $pwd = sha1($emdata['email']);
            $this->load->model('user_model');
            $dataUser = array(
                'username' => $emdata['email'],
                'password' => $pwd,
                'employee_id' => $employee_id,
                'user_type' => 'EMPLOYEE'
            );
            $this->user_model->setAutoReg($dataUser);
//mail
            $to = $emdata['email'];
            $subject = "Welcome To EMS";
            $txt = "User email same as the password for first use";
            $headers = "From: info@ems.com";

            //Email code worke in server host
            // mail($to, $subject, $txt, $headers);
            
            

            //diaplay success message
            $data['msg'] = '<p class="bg-success">New employee created</p>';
        } else {
            //duplicate entry found
            

            $data['msg'] = '<p class="bg-danger">Invalid Input or Duplicate Employee Data Found</p>';
        }

        $posiList = $this->employee_model->getPositionList();
            $data['posiList'] = $posiList;
            $this->load->view('employee_insertview', $data);

//        if ($res) {
//            header('location:' . base_url() . "index.php/employee/" . $this->index());
//        }
    }

    public function edit() {
        //check user status
        if ($this->session->userdata('logged_id')) {
            //it is valid login
            $id = $this->uri->segment(3);
            $data['employee'] = $this->employee_model->getById($id);
            $this->load->view('employee_editview', $data);
        } else {
            //no direct access
            redirect(base_url() . 'index.php/login');
        }
    }

    public function update() {
        //check user status
        if ($this->session->userdata('logged_id')) {
            //it is valid login
            $mdata['name'] = $_POST['name'];
            $mdata['nid'] = $_POST['nid'];
            $mdata['dob'] = $_POST['dob'];
            $mdata['gender'] = $_POST['gender'];
            $mdata['address'] = $_POST['address'];
            $mdata['contact_no'] = $_POST['contact_no'];
            $mdata['c'] = $_POST['c'];
            $mdata['ca'] = $_POST['ca'];
            $mdata['ta'] = $_POST['ta'];
            $mdata['se'] = $_POST['se'];
            $mdata['ao'] = $_POST['ao'];
            $mdata['vo'] = $_POST['vo'];
            $mdata['fm'] = $_POST['fm'];
            $mdata['co'] = $_POST['co'];
            $mdata['m'] = $_POST['m'];

            $res = $this->employee_model->update_info($mdata, $_POST['id']);

            if ($res) {
                header('location:' . base_url() . "index.php/Employee/" . $this->index());
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
            $this->employee_model->delete_a_employee($id);
            $this->index();
        } else {
            //no direct access
            redirect(base_url() . 'index.php/login');
        }
    }

}

?>
