
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Home extends CI_Controller {

 function __construct()
 {
   parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('adminevent');
        $this->load->model('adminproject');
        $this->load->model('adminachivement');
        $this->load->model('admintutorial');
        $this->load->model('admincontact');
        $this->load->model('adminanounce');
 }

 function index()
 {
   if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     if($session_data['username']=='admin')
     {
     $data['username'] = $session_data['username'];
     $data['status']="login";
     $this->load->view('admin/home', $data);
    }
    else {
      $this->session->unset_userdata('logged_in');
        session_destroy();
        $this->load->view('admin/login');
    }
   }
   else
   {
     $this->load->view('admin/login');
   }
 }

 function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('admin/home', 'refresh');
 }

  function add_event()
 {
    if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $this->adminevent->add_event();
     $data['status']="One event has been added";
     $this->load->view('admin/home', $data);
   }
   else
   {
     $this->load->view('admin/login');
   }
 }
    function delete_event()
 {
    if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $data['event'] = $this->adminevent->get_event();
     $this->load->view('admin/deleteevent',$data);
   }
   else
   {
     $this->load->view('admin/login');
   }
 }

  function delete_event_by_id()
 {
    if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $this->adminevent->delete_event();
     redirect('admin/home/delete_event');
   }
   else
   {
     $this->load->view('admin/login');
   }
 }
    function add_project()
 {
    if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $this->adminproject->add_project();
     $data['status']="Project has been added successfully";
     $this->load->view('admin/home', $data);
   }
   else
   {
     $this->load->view('admin/login');
   }
 }


   function delete_project()
 {
    if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $data['project'] = $this->adminproject->get_project();
     $this->load->view('admin/deleteproject',$data);
   }
   else
   {
     $this->load->view('admin/login');
   }
 }

  function delete_project_by_id()
 {
    if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $this->adminproject->delete_project();
     redirect('admin/home/delete_project');
   }
   else
   {
     $this->load->view('admin/login');
   }
 }




   function add_achivement()
 {
    if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $this->adminachivement->add_achivement();
     $data['status']="Recent Achivements added";
     $this->load->view('admin/home',$data);
   }
   else
   {
     $this->load->view('admin/login');
   }
 }


   function delete_achivement()
 {
    if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $data['achivement'] = $this->adminachivement->get_achivement();
     $this->load->view('admin/deleteachivement',$data);
   }
   else
   {
     $this->load->view('admin/login');
   }
 }

 function delete_achivement_by_id()
 {
    if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $this->adminachivement->delete_achivement();
     redirect('admin/home/delete_achivement');
   }
   else
   {
     $this->load->view('admin/login');
   }
 }

    function add_tutorial()
 {
    if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $this->admintutorial->add_tutorial();
     $data['status']="Recent tutorial file added";
     $this->load->view('admin/home',$data);
   }
   else
   {
     $this->load->view('admin/login');
   }
 }


   function delete_tutorial()
 {
    if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $data['tutorial'] = $this->admintutorial->get_tutorial();
     $this->load->view('admin/deletetutorial',$data);
   }
   else
   {
     $this->load->view('admin/login');
   }
 }

 function delete_tutorial_by_id()
 {
    if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $this->admintutorial->delete_tutorial();
     redirect('admin/home/delete_tutorial');
   }
   else
   {
     $this->load->view('admin/login');
   }
 }

function add_contact()
 {
    if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $this->admincontact->add_contact();
     $data['status']="Recent Contact added";
     $this->load->view('admin/home',$data);
   }
   else
   {
     $this->load->view('admin/login');
   }
 }


function delete_contact()
 {
    if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $data['contact'] = $this->admincontact->get_contact();
     $this->load->view('admin/deletecontact',$data);
   }
   else
   {
     $this->load->view('admin/login');
   }
 }

function delete_contact_by_id()
 {
    if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $this->admincontact->delete_contact();
     redirect('admin/home/delete_contact');
   }
   else
   {
     $this->load->view('admin/login');
   }
 }

function add_anouncement()
 {
    if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $this->adminanounce->add_anouncement();
     $data['status']="Recent Anouncement added";
     $this->load->view('admin/home',$data);
   }
   else
   {
     $this->load->view('admin/login');
   }
 }
 function delete_anouncement()
 {
    if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $data['anouncement'] = $this->adminanounce->get_anouncement();
     $this->load->view('admin/deleteanouncement',$data);
   }
   else
   {
     $this->load->view('admin/login');
   }
 }

 function delete_anouncement_by_id()
 {
    if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $this->adminanounce->delete_anouncement();
     redirect('admin/home/delete_anouncement');
   }
   else
   {
     $this->load->view('admin/login');
   }
 }



}

?>

