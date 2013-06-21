
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Home extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('event');
 }

 function index()
 {
   if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $data['name'] = $session_data['name'];
     $data['status']="login";
     $data['event'] = $this->event->get_event();
     $this->load->view('home', $data);
   }
   else
   {
     $data['status']="logout";
     $data['event'] = $this->event->get_event();
     $this->load->view('home', $data);
   }
 }

 function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('home', 'refresh');
 }

}

?>

