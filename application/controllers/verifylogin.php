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
   if(!isset($_POST['username'])) redirect('home','refresh');
   //This method will have the credentials validation
   $this->load->library('form_validation');

   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
   $this->form_validation->set_rules('url', 'url', 'trim|required|xss_clean');

   $url = $this->input->post('url');

   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.&nbsp; User redirected to login page
     $data['navhead']="home";
     $data['event'] = $this->event->get_event();
         $data['status']="wrong";
          //echo $url;
     $this->load->view('home', $data);
      //redirect($url,$data);
   }
   else
   {
     if(substr($url,-11)=="verifylogin" || substr($url,-12)=="verifylogin/" )
     redirect('home', 'refresh');
    else redirect($url);  //redirect($url,$data)
   }

 }

 function check_database($password)
 {
   //Field validation succeeded.&nbsp; Validate against database
   $username = $this->input->post('username');

   //query the database
   $result = $this->user->login($username, $password);

   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'id' => $row->id,
         'username' => $row->username,
         'name' => $row->name
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
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
