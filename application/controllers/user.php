<?php

Class User extends CI_Controller {

  public function __construct() {
    parent::__construct();
    // Load form helper library
    $this->load->helper('form');
    // Load form validation library
    $this->load->library('form_validation');
    // Load session library
    $this->load->library('session');
    // Load database
    $this->load->model('user_model');
    $this->load->model('employee_model');
    $this->load->model('quotation_model');
    $this->load->model('report_model');
  }

  // Show login page
  public function index() {
//      $this->load->view('user_view');
      $this->load->view('index');
    }
    
    
    public function loadChangePassword() {
        $this->load->view('change_password');
    }
    
    
    public function changePassword() {
        //get input data
        $inputData = $this->user_model->array_from_post(array('currentpass', 'newpass', 'retypepass'));
        $data = array();
        $newPW = $inputData['newpass'];
        
        if(strlen($newPW) >= 8){
            if ($inputData['newpass'] == $inputData['retypepass']) {
            $result = $this->user_model->setPasswordChange($inputData);
            if ($result) {
                $this->user_model->updatePassword($inputData['newpass']);
                $data['msg'] = '<p class="bg-success">Password Changed Please Login</p>';
            } else {
                //  echo 'Data Not Found';
            }
        } else {
            $data['msg'] = '<p class="bg-danger">Invalid Data</p>';
        }
        }else{
            $data['msg'] = '<p class="bg-danger">Password legth should atleaset 8 characters</p>';
        }
        
        
        
        
        //echo '<tt><pre>' . var_export($data, TRUE) . '</pre></tt>';
        $this->load->view('change_password', $data);
    }
  
    
    public function login() {
      $this->load->view('user_view');
        
    }
    
    public function test() {
        $this->load->view('template');
    }
    
    
    
    
    
    
    
    

  // Authenticate user
  public function verify_login() {
    //get form submitted data
    $username = $_POST['username'];
    $password = $_POST['password'];
      
    $password = sha1($password);
    //echo $password;
    //check whether username & password fields are empty
    if (!empty($username) && !empty($password)) {
      //it's not empty
      $this->load->model('employee_model');
      $response = $this->employee_model->check_user_login($username,$password);

      //echo '<tt><pre>'.var_export($response, TRUE).'</pre></tt>';
      //login successful?
      if ($response) {
        //yes, then create the session
        $session_array = array(
          'userid'    => $response[0]['id'],
          'name'      => $response[0]['name'],
          'username'  => $response[0]['username'],
          'user_type'  => $response[0]['user_type'],
          'logged_id' => true 
        );

        $this->session->set_userdata($session_array);

        //redirect to relevant dashboard
        //redirect(base_url().'index.php/calendar');
       
        
        //search all event list 
        $this->load->model('event_model');
        if ($this->session->userdata('user_type') == 'ADMIN') {
                $data['activeEventList'] = $this->event_model->get_all_active_events('closed');
            }
            if ($this->session->userdata('user_type') == 'EMPLOYEE') {
                $eid = $this->session->userdata('userid');
                //echo '<tt><pre>' . var_export($eid, TRUE) . '</pre></tt>';
                $data['activeEventList'] = $this->report_model->getEmployeeEvent($eid);
            }
        //load latest 10 quatations 
        
        //echo '<tt><pre>'.var_export($data['activeEventList'], TRUE).'</pre></tt>';
        
        
        
        //
       $quatalst =  $this->quotation_model->get_lmit_quotation_for_payment();
      // echo '<tt><pre>' . var_export($quatalst, TRUE) . '</pre></tt>';
        
        $data['quatatoinList'] = $quatalst;
        $this->load->view('calendar_veiw',$data);
      } else {
        //oops, invalid login
        $data['status']  = 'error';
        $data['message'] = '<p class="bg-danger">Invalid username or password.</p>';
        $this->load->view('user_view', $data);
      }
    } else {
        
      //ooops, no username & password input found
      $data['status']  = 'error';
      $data['message'] = '<p class="bg-danger">Please enter a valid username and password.';
      $this->load->view('user_view', $data); 
    }
  }

  // Show registration page
  public function user_registration_show() {
    if ($this->session->userdata('logged_id')) {
      //already logged in,
      $this->load->view('registration_form');
    } else {
      //not logged in yet,
      $this->load->view('user_view');
    }
  }

  
  
  public function userRegAuto($data) {
      
  }


  // Validate and store registration data in database
  public function new_user_registration() {
    //check user status
    if ($this->session->userdata('logged_id')) {
      // Valid login. Check validation for user input in SignUp form
      $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
      $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

      if ($this->form_validation->run() == FALSE) {
        $this->load->view('registration_form');
      } else {
        $data = array(
          'user_name'     => $_POST('username'),
          'user_password' => $_POST('password')
        );
     
        $result = $this->user_model->registration_insert($data);

        if ($result == TRUE) {
          $data['message_display'] = 'Registration Successful !';
          $this->load->view('user_view', $data);
        } else {
          $data['message_display'] = 'Username already exist!';
          $this->load->view('registration_form', $data);
        }
      }
    } else {
      //invalid login, no direct access
      $this->load->view('user_view');
    }
  }

  // Logout from admin page
  public function logout() {
    // Destroy session
    $this->session->sess_destroy();
    // Redirect to login page
    redirect(base_url().'index.php/user');
  }

}
?>