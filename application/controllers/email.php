<?php
if (!defined ('BASEPATH')) exit ('no direct script access allowed');

  class Email extends CI_Controller{
        
    function __construct(){
      parent::__construct();
      #$this->load->helper('');
      $this->load->library('email');
    }
          
    public function index(){

      $config['useragent']    = 'CodeIgniter';
      $config['protocol']     = 'smtp';
      $config['smtp_host']    = 'ssl://smtp.gmail.com';
      $config['smtp_user']    = 'samanaleej@gmail.com';// Your gmail id
      $config['smtp_pass']    = 'happybday2u';// Your gmail Password
      $config['smtp_port']    = 465;
      $config['smtp_timeout'] = 30;
      $config['wordwrap']     = TRUE;    
      $config['wrapchars']    = 76;
      $config['mailtype']     = 'html';
      $config['charset']      = 'iso-8859-1';
      $config['validate']     = FALSE;
      $config['priority']     = 3;
      $config['newline']      = "\r\n";
      $config['crlf']         = "\r\n";

      $this->email->initialize($config);

      $this->email->from('samanaleej@gmail.com', 'Samanalee'); //your gmail id & your name
      $this->email->to('icristeen@gmail.com'); //receipient's email

      $this->email->subject('Email Test');
      $this->email->message('Testing the email class.');    

      $res = $this->email->send();
      if($res)
           {
               echo '<script>alert("You Have Successfully sent the mail!");</script>';
               redirect(base_url().'index.php/calendar', 'refresh');
           }
           else{
               $this->session->set_userdata("message","Email Not Sent!");
               redirect(base_url().'index.php/calendar', 'refresh');
           }

    }

}
?>