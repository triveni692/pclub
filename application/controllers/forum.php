<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Forum extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('event');
   $this->load->model('forum_content');
   $this->load->model('get_username');
   $this->load->model('manage_question');
   $this->load->model('fetch_questions');
   $this->load->model('manage_comment');
   $this->load->model('get_anouncements');
 }

 function index()
 {
  
   if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');     
     $user = $data['username'] = $session_data['username'];
     $data['name'] = $session_data['name'];
     $data['status']="login";
     $data['event'] = $this->event->get_event();
     $data['anouncements']=$this->get_anouncements->get_anouncements();

     $db1=$this->load->database('users',TRUE);
     $table = $user."_questions_reported";
     $query="SELECT * from ".$table ;
     $query=$db1->query($query);
     $data['q_reports'] = $query->result_array() ;


   }
   else
   {
     $data['status']="logout";
     $data['event'] = $this->event->get_event();
     $data['anouncements']=$this->get_anouncements->get_anouncements();
   }
     $data['forum'] = $this->forum_content->get_forum('none');
     $data['navhead']="forum";
     $data['forumhead']="all";
     $this->load->view('forum', $data);
   
 }

 function askquestion()
 { 
   $data['navhead']="forum";
   $url = $this->input->post('url');
   $category=$this->input->post('category');
   $askas=$this->input->post('askas');
   $content=$this->input->post('question');
   $replaces = array(
        "'" => "\'",
        '"' => '\"',
  );
    $content = strtr($content,$replaces);
    $content= nl2br($content);

   $username = $_POST['username'];
   //put the data into the database
   $db1 = $this->load->database('default',TRUE);

   $query=$db1->query("SELECT id FROM  `questions` ORDER BY  `id` DESC LIMIT 0 , 1");
   foreach ($query->result() as $row)
    {
       $id=$row->id;
    }
   $id=$id+1;

   if($askas=='anonymous') $asked_by='Anonymous';
   else  {
          $asked_by=$this->get_username->get_user($askas);
        }


   $db1->query("insert into questions values ('".$id."',0,0,'".$category."','".$content."',CURRENT_TIMESTAMP,'".$username."','".$asked_by."',0,0)");
   $this->manage_question->manage($id);
   
   $db2 = $this->load->database('users',TRUE);
   $table = $username."_question_asked";
   $query = "INSERT into ".$table." (`id` , `timestamp`) VALUES ('".$id."' ,CURRENT_TIMESTAMP) ";
   $db2->query($query);
   
   redirect($url, 'refresh');
 }
 
 function categories($default='cprogramming')
 {    
     $data['navhead']="forum";
     if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');     
     $user = $data['username'] = $session_data['username'];
     $data['name'] = $session_data['name'];
     $data['status']="login";
     $data['event'] = $this->event->get_event();

     $db1=$this->load->database('users',TRUE);
     $table = $user."_questions_reported";
     $query="SELECT * from ".$table ;
     $query=$db1->query($query);
     $data['q_reports'] = $query->result_array() ;
   }
   else
   {
     $data['status']="logout";
     $data['event'] = $this->event->get_event();
   }
     $data['forumhead']=$default;
     $data['forum'] = $this->forum_content->get_forum($default);
     $this->load->view('forum', $data);
   
 }

 function problems($default='none')
 {  $data['navhead']="forum";
  if($default=='none') redirect('forum','refresh');
  else 
  {
     if($this->session->userdata('logged_in'))
     {
       $session_data = $this->session->userdata('logged_in');     
       $d['username'] = $session_data['username'];
       $d['name'] = $session_data['name'];
       $d['status']="login";
     }
     else
     {
       $d['status']="logout";
     } 
      $data=$this->fetch_questions->fetch($default,$d);
      if($data=="error") show_404('forum/problems/'.$default);
      $db1=$this->load->database('default',TRUE);
      $q=$db1->query("select visits from questions where id=".$default);
      $visits=0;
      foreach ($q->result() as $key) {
        $visits=$key->visits;
      }
      $visits+=1;
      $db1->query("UPDATE  questions SET  `visits` = ".$visits." WHERE  `id` =".$default);
      
      if($this->session->userdata('logged_in')) $data = $this->fetch_questions->report($default,$data);
      $data['navhead']="forum";
      $data['forumhead']="all";
      $this->load->view('questions',$data);
  }

 }

 function comment($default='none')
 {  $data['navhead']="forum";
    $session_data = $this->session->userdata('logged_in');     
    $data['username'] = $session_data['username'];

   $data['url'] = $this->input->post('url');
   $data['comment']=$this->input->post('comment');
   $replaces = array(
        "'" => "\'",
        '"' => '\"',
  );
    $data['comment'] = strtr($data['comment'],$replaces);
    $data['comment']=nl2br($data['comment']);

   $data['commentas']=$this->input->post('commentas');
   $data['id']=$default;


   $this->manage_comment->manage($data);
   redirect($data['url'],'refresh');
          
 }


 
}