<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('user','',TRUE);
      $this->load->model('event');
 }

 function index()
 {
   //This method will have the credentials validation
   $this->load->helper('form');
   $this->load->library('form_validation');

   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.&nbsp; User redirected to login page

     $data['title']="Wrong username or password";
     $this->load->view('admin/login', $data);
   }
   else
   {
     
     redirect('admin/home', 'refresh');
   }

 }

 function check_database($password)
 {
   //Field validation succeeded.&nbsp; Validate against database
   $username = $this->input->post('username');
   $password = $this->input->post('password');
   $user = "admin";
   $pass = "EatSleepCode";
   if($username == $user && $password == $pass)
   {
     $sess_array = array();
       $sess_array = array(
         'username' => $username
       );
       $this->session->set_userdata('logged_in', $sess_array);
     
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
 }
}
?>
