
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Home extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('event');
   $this->load->model('tutorial');
   $this->load->model('project');
   $this->load->model('contact');
   $this->load->model('achivement');
   $this->load->model('get_anouncements');
 }

 function index()
 {
   if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $admin="admin";
     if($data['username']==$admin)
     {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('home', 'refresh');
     }

     $data['name'] = $session_data['name'];
     $data['status']="login";
     $data['navhead']="home";
     $data['event'] = $this->event->get_event();
     $data['anouncements']=$this->get_anouncements->get_anouncements();
     $this->load->view('home', $data);
   }
   else
   {
     $data['status']="logout";
     $data['navhead']="home";
     $data['event'] = $this->event->get_event();
     $data['anouncements']=$this->get_anouncements->get_anouncements();
    $this->load->view('home', $data);
   }
 }


 function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('home', 'refresh');
 }

  function home1()
 {
    if (isset($_SERVER['HTTP_X_REQUESTED_WITH']))
      {
          $this->load->view('home1');
      }
    else echo "<h1>Good try but you are not the best</h1>";
    // $var = $this->get_anouncements->get_anouncements();
    // foreach ($var as $key) {
    //   echo $key['flag']." ".$key['content']."<br>";
    // }

 }

  function tutorial()
 {
        if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $admin="admin";
     if($data['username']==$admin)
     {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('home', 'refresh');
     }
     $data['navhead']="tutorial";
     $data['name'] = $session_data['name'];
     $data['status']="login";
     $data['event'] = $this->event->get_event();
     $data['anouncements']=$this->get_anouncements->get_anouncements();
     $this->load->view('login_essential', $data);
     $data['tutorial'] = $this->tutorial->get_tutorial();
     $this->load->view('tutorial', $data);
   }
   else
   {
     $data['status']="logout";
     $data['navhead']="tutorial";
     $data['event'] = $this->event->get_event();
     $data['anouncements']=$this->get_anouncements->get_anouncements();
     $this->load->view('login_essential', $data);
     $data['tutorial'] = $this->tutorial->get_tutorial();
     $this->load->view('tutorial', $data);
   }
        
 }

   function achivement()
 {
      if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $admin="admin";
     if($data['username']==$admin)
     {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('home', 'refresh');
     }
     $data['navhead']="achivement";
     $data['name'] = $session_data['name'];
     $data['status']="login";
     $data['event'] = $this->event->get_event();
     $data['anouncements']=$this->get_anouncements->get_anouncements();
     $this->load->view('login_essential', $data);
     $data['achivement'] = $this->achivement->get_achivement();
     $this->load->view('achivement', $data);
   }
   else
   {
     $data['status']="logout";
     $data['navhead']="achivement";
     $data['event'] = $this->event->get_event();
     $data['anouncements']=$this->get_anouncements->get_anouncements();
     $this->load->view('login_essential', $data);
     $data['achivement'] = $this->achivement->get_achivement();
     $this->load->view('achivement', $data);
   }

 }

   function contact()
 {

     if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $admin="admin";
     if($data['username']==$admin)
     {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('home', 'refresh');
     }
     
     $data['name'] = $session_data['name'];
     $data['status']="login";
     $data['event'] = $this->event->get_event();
     $data['anouncements']=$this->get_anouncements->get_anouncements();
    $data['cordi'] = $this->contact->get_contact_cordi();
         $data['seci'] = $this->contact->get_contact_seci();
         $data['navhead']="contact";
     $this->load->view('login_essential', $data);
    $this->load->view('contact', $data);

   }
   else
   {
     $data['status']="logout";
     $data['event'] = $this->event->get_event();
     $data['anouncements']=$this->get_anouncements->get_anouncements();
     $data['cordi'] = $this->contact->get_contact_cordi();
         $data['seci'] = $this->contact->get_contact_seci();
         $data['navhead']="contact";
     $this->load->view('login_essential', $data);
    $this->load->view('contact', $data);

     
   }
    
    
 }

   function project()
 {
    if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $admin="admin";
     if($data['username']==$admin)
     {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('home', 'refresh');
     }
     
     $data['name'] = $session_data['name'];
     $data['status']="login";
     $data['event'] = $this->event->get_event();
     $data['anouncements']=$this->get_anouncements->get_anouncements();
     $data['navhead']="project";
         $data['project'] = $this->project->get_project();
         $this->load->view('login_essential', $data);
         $this->load->view('project', $data);
     
   }
   else
   {
     $data['status']="logout";
     $data['event'] = $this->event->get_event();
     $data['anouncements']=$this->get_anouncements->get_anouncements();
     $data['navhead']="project";
         $data['project'] = $this->project->get_project();
         $this->load->view('login_essential', $data);
         $this->load->view('project', $data);
     
   }

 }


}

?>

