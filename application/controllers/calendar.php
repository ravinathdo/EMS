<?php

if (!defined('BASEPATH'))
    exit('no direct script access allowed');

class Calendar extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('event_model');
        $this->load->model('package_model');
    }

    public function index() {
        //check user status
        if ($this->session->userdata('logged_id')) {

            $this->load->model('event_model');
            $data['activeEventList'] = $this->event_model->get_all_active_events('closed');
            $quatalst = $this->quotation_model->get_lmit_quotation_for_payment();
            // echo '<tt><pre>' . var_export($quatalst, TRUE) . '</pre></tt>';

            $data['quatatoinList'] = $quatalst;
            $this->load->view('calendar_veiw', $data);
        } else {
            //no direct access
            redirect(base_url() . 'index.php/login');
        }
    }

    public function getCalendarData() {

        $this->load->model('event_model');
        $data = $this->event_model->calendar_events();

        $allEvents = array();

        foreach ($data as $event) {
            //create event object
            $oneEvent['title'] = $event->event_name;
            $oneEvent['place'] = $event->place;
            $oneEvent['date'] = $event->date;
            $oneEvent['start'] = $event->date . ' ' . $event->starting_time;
            $oneEvent['end'] = $event->date . ' ' . $event->end_time;
            $oneEvent['no_of_cams'] = $event->no_of_cams;
            $oneEvent['status'] = $event->booked_or_not;
            $oneEvent['customer_id'] = $event->customer_id;
            $package_matter['package_id'] = $event->package_id;
            $oneEvent['allDay'] = false;

            $pack = $this->package_model->get_package_name($package_matter);
            $newData = array();
            foreach ($pack as $row) {
                $newData[] = $row->package;
            }
            $oneEvent['package'] = $newData;
            //set array to single object
            $allEvents[sizeof($allEvents)] = $oneEvent;
        }


        //json encoded data set to be returned
        echo json_encode($allEvents);
    }

    public function availability() {
        $date = $_POST['date_x'];
        // $date = '2016-11-30';

        $this->load->model('event_model');

        //geting all the package_ids from package table
        $all_package_id = $this->package_model->get_package_ids();

        //getting events on the same date according to each package
        $events_on_date = $this->event_model->get_similer_events($date, $all_package_id);

        $cams = array();

        /* for ($i=0; $i < sizeof($events_on_date) ; $i++) {
          $sum_cam = 0;
          foreach ($events_on_date[$i] as $eliment) {
          $sum_cam = $sum_cam + $eliment['no_of_cams'];
          $pack_id = intval($events_on_date[$i]['pkg_id']);
          }

          $avcam = $this->package_model->available_cams($sum_cam,$pack_id);

          $cams[sizeof($cams)] = array('tot' => $avcam['tot'], 'pkg_id' => $avcam['id']);
          } */

        foreach ($events_on_date as $event) {

            if (is_null($event['no_of_cams'])) {
                $event['no_of_cams'] = 0;
            }

            // echo $event['no_of_cams'];

            $avcam = $this->package_model->available_cams($event['no_of_cams'], $event['pkg_id']);
            $cams[sizeof($cams)] = array('tot' => $avcam['tot'], 'pkg_id' => $avcam['id']);
        }

        // echo json_encode($cams);
        echo json_encode(array_merge($cams, array('date' => $date)));
    }

}

?>