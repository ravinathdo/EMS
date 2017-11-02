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
  }

  // Show login page
  public function index() {
      $this->load->view('user_view');
    }
  

  // Authenticate user
  public function verify_login() {
    //get form submitted data
    $username = $_POST['username'];
    $password = $_POST['password'];
      
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
          'logged_id' => true 
        );

        $this->session->set_userdata($session_array);

        //redirect to relevant dashboard
        //redirect(base_url().'index.php/calendar');
       
        $this->load->view('calendar_veiw');
        
        
      } else {
        //oops, invalid login
        $data['status']  = 'error';
        $data['message'] = 'Invalid username or password.';
        $this->load->view('user_view', $data);
      }
    } else {
      //ooops, no username & password input found
      $data['status']  = 'error';
      $data['message'] = 'Please enter a valid username and password.';
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