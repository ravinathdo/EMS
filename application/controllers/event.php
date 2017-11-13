<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed'); /* This is for sequrity purpose */

class Event extends CI_Controller {

    function __construct() {
        parent::__construct(); /* This extends CI_controller class and load the helpers(functions in CI) */
        $this->load->model('event_model');
        $this->load->model('package_model');
        $this->load->model('customer_model');
        $this->load->model('employee_model');
        $this->load->model('emp_position_model');
        $this->load->model('emp_event_model');
        $this->load->model('quotation_model');
    }

    // View all the event details
    public function all_events() {
        //check user status
        if ($this->session->userdata('logged_id')) {
            //it is valid login
            $data['event_list'] = $this->event_model->get_all_events();
            // $data['emp_event_list']=$this->emp_event_model->get_all_emp_events();
            $this->load->view('event_view', $data);
        } else {
            //no direct access
            redirect(base_url() . 'index.php/login');
        }
    }

    // View upcoming event details
    public function index() {
        //check user status
        if ($this->session->userdata('logged_id')) {
            //it is valid login
            $data['event_list'] = $this->event_model->upcoming_events();
            //echo '<tt><pre>'.var_export($data['event_list'], TRUE).'</pre></tt>';
            $this->load->view('event_view', $data);
        } else {
            //no direct access
            redirect(base_url() . 'index.php/login');
        }
    }

    // Load Event Details Form
    public function add_new_event() {
        //check user status
        if ($this->session->userdata('logged_id')) {
            //it is valid login
            $date = $this->uri->segment(3);
            $data['date'] = array('date' => $date);

            $data['packages'] = $this->package_model->get_all_package();
            // echo '<tt><pre>' . var_export($data['packages'], TRUE) . '</pre></tt>';
            $data['customers'] = $this->customer_model->get_all_customer();


            //list all event list
            $this->load->model('event_model');
            $eventList = $this->event_model->get_all_events();
            $data['eventList'] = $eventList;
            //echo '<tt><pre>'.var_export($eventList, TRUE).'</pre></tt>';
            $this->load->view('event_insertview', $data);
        } else {
            //no direct access
            redirect(base_url() . 'index.php/login');
        }
    }

    //Insert new event to database
    public function insert_newevent_db() {
        //check user status
        if ($this->session->userdata('logged_id')) {
            //it is valid login
            //get form data
//			$evdata['customer_id']	 = $_POST['customer_id'];
//			$evdata['event_name'] 	 = $_POST['event_name'];
//			$evdata['date'] 	 = $_POST['date'];
//			$evdata['place']         = $_POST['place'];
//			$evdata['starting_time'] = date("H:i:s", strtotime($_POST['starting_time']));
//			$evdata['end_time']	 = date("H:i:s", strtotime($_POST['end_time']));
//			$evdata['no_of_cams']    = $_POST['no_of_cams'];
//			$evdata['package_id']    = $_POST['package_package'];
//			$evdata['booked_or_not'] = "not";



            $this->load->model('event_model');
            $data = array(); // for next view

            $formData = $this->event_model->array_from_post(array(
                'event_date',
                'customer_id',
                'event_name',
                'place',
                'starting_time',
                'end_time',
                'package_id', 'no_of_cams'));

            $formData['booked_or_not'] = 'pending';

            $formData['usercreated'] = $this->session->userdata('userid');
            $package_id = $formData['package_id'];

            $explode = explode("|", $package_id);

            $data['charge_per_cam'] = $explode[1];
            $formData['package_id'] = $explode[0];

            echo '<tt><pre>' . var_export($formData, TRUE) . '</pre></tt>';

            $event_id = $this->event_model->insert_event_to_db($formData);

//			if ($res) {
//				$insertResponse = array();
//				$insertResponse['response'] = array('res' => TRUE);
//				echo json_encode($insertResponse);
//			}	
            //quatation data
            $data['package_name'] = $explode[2];
            $data['no_of_cams'] = $formData['no_of_cams'];
            $data['camera_charges'] = $data['charge_per_cam'] * $formData['no_of_cams'];
            $data['event_id'] = $event_id;


            echo '<tt><pre>' . var_export($data, TRUE) . '</pre></tt>';

            $this->load->view('quotation_insertview', $data);
        } else {
            //no direct access
            redirect(base_url() . 'index.php/login');
        }
    }

    public function loadQuatation($param) {
        $this->load->model('event_model');
        $eventData = $this->event_model->getEventByID(12);

        //quatation data
        $data['charge_per_cam'] = $eventData[''];
        $data['package_name'] =  $eventData[''];
        $data['no_of_cams'] =  $eventData[''];
        $data['total'] = $eventData['charge_per_cam'] * $eventData['no_of_cams'];
        $data['event_id'] = $event_id;


        echo '<tt><pre>' . var_export($data, TRUE) . '</pre></tt>';

        $this->load->view('quotation_insertview', $data);
    }

    public function team_for_event() {
        $mdata['c'] = $_POST['c'];
        $mdata['ca'] = $_POST['ca'];
        $mdata['ta'] = $_POST['ta'];
        $mdata['se'] = $_POST['se'];
        $mdata['ao'] = $_POST['ao'];
        $mdata['vo'] = $_POST['vo'];


        $this->load->view('team_dataview', $mdata);
    }

    public function get_event_id() {
        //check user status
        if ($this->session->userdata('logged_id')) {
            //it is valid login
            $data['event_list'] = $this->event_model->upcoming_events();
            $this->load->view('team_assignview', $data);
        } else {
            //no direct access
            redirect(base_url() . 'index.php/login');
        }
    }

    public function get_no_of_cams() {
        //check user status
        if ($this->session->userdata('logged_id')) {
            //it is valid login
            $id = $this->input->post('event_id');

            $n_cams = $this->event_model->get_no_of_cams_from_db($id);


            $data['camaramen_list'] = $this->emp_position_model->get_camaramens($n_cams[0]->no_of_cams);
            $data['camara_assistant_list'] = $this->emp_position_model->get_camara_assistants($n_cams[0]->no_of_cams);
            $data['tech_assis'] = $this->emp_position_model->get_technical_assistants();
            $data['system_engineer'] = $this->emp_position_model->get_system_engineer();
            $data['audio_operator'] = $this->emp_position_model->get_audio_operator();
            $data['video_operator'] = $this->emp_position_model->get_video_operator();

            $this->load->view('team_view', $data);
        } else {
            //no direct access
            redirect(base_url() . 'index.php/login');
        }
    }

    //Load Create Quotation Form for the event	
    public function all_eventsfor_quotation() {
        //check user status
        if ($this->session->userdata('logged_id')) {
            //it is valid login
            $data['events'] = $this->event_model->get_all_events();
            $this->load->view('create_quotation_view', $data);
        } else {
            //no direct access
            redirect(base_url() . 'index.php/login');
        }
    }

    //Edit an event detail record
    public function edit() {
        //check user status
        if ($this->session->userdata('logged_id')) {
            //it is valid login
            $id = $this->uri->segment(3);
            $data['event'] = $this->event_model->getById($id);
            $data['customers'] = $this->customer_model->get_all_customer();
            // $data['package']=$this->package_model->get_all_package();
            $this->load->view('event_editview', $data);
        } else {
            //no direct access
            redirect(base_url() . 'index.php/login');
        }
    }

    //Update an event detail record
    public function update() {
        //check user status
        if ($this->session->userdata('logged_id')) {
            //it is valid login
            $mdata['customer_id'] = $_POST['customer_id'];
            $mdata['event_name'] = $_POST['event_name'];
            $mdata['date'] = $_POST['date'];
            $mdata['place'] = $_POST['place'];
            $mdata['starting_time'] = $_POST['starting_time'];
            $mdata['end_time'] = $_POST['end_time'];
            $mdata['no_of_cams'] = $_POST['no_of_cams'];
            $mdata['package_package'] = $_POST['package_package'];
            $mdata['booked_or_not'] = "booked";

            $res = $this->event_model->update_event($mdata, $_POST['id']);

            if ($res) {
                header('location:' . base_url() . "index.php/event" . $this->index());
            }
        } else {
            //no direct access
            redirect(base_url() . 'index.php/login');
        }
    }

    //Delete an event detail record
    public function delete($id) {
        //check user status
        if ($this->session->userdata('logged_id')) {
            //it is valid login
            $this->event_model->delete_a_event($id);
            $this->index();
        } else {
            //no direct access
            redirect(base_url() . 'index.php/login');
        }
    }

    public function cam_availability() {
        $pkg_id = $_POST['pkg_id'];
        $date = $_POST['date'];

        $events = $this->event_model->getEvents($pkg_id, $date);


        if (is_null($events['no_of_cams'])) {
            $events['no_of_cams'] = 0;
        }

        $cams = array();

        $avcam = $this->package_model->available_cams($events['no_of_cams'], $pkg_id);

        $cams = array('tot' => $avcam['tot'], 'pkg_id' => $avcam['id']);

        echo json_encode($cams);
    }

}

?>