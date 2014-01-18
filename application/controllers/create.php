<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class  Create extends CI_Controller {

 function __construct()
 {
   parent::__construct();
      $this->load->model('add_user');
      $this->load->helper(array('form', 'url'));
 }

 function index()
 {
 	$username=$this->input->post('username');
 	$password=$this->input->post('password');
 	$url=$_POST['url'];
 	$db1=$this->load->database('default',TRUE);
 	$querry=$db1->query("select * from users where username='".$username."'");
 	$count=0;
 	foreach ($querry ->result() as $key ) {
 		$count+=1;
 	}
 	if($count!=0) echo "username already exists .";
 	else{
		$this->add_user->set_users();

		$db3=$this->load->database('users',TRUE);

		$db3->query("create table ".$username."_question_likes (id int,timestamp TIMESTAMP);");
		$db3->query("create table ".$username."_question_commented (id int,timestamp TIMESTAMP);");
		$db3->query("create table ".$username."_question_asked (id int,timestamp TIMESTAMP);");
		$db3->query("create table ".$username."_comments_likes (id varchar(20),timestamp TIMESTAMP);");
		$db3->query("create table ".$username."_comments_reported (id varchar(20),content text, timestamp TIMESTAMP);");
		$db3->query("create table ".$username."_questions_reported (id varchar(20),content text, timestamp TIMESTAMP);");


		$data['status']="continue";

		//   $result = $this->user->login($username, $password);
    $db1=$this->load->database('default',TRUE);
    $querry=$db1->query("select * from `users` where username='".$username."'");

    $sess_array = array();
      foreach ($querry->result_array() as $key ) {
           $sess_array['id'] = $key['id'] ;
           $sess_array['username'] = $key['username'] ;
           $sess_array['name'] = $key['name'] ;
           $sess_array['update']="update";
           $this->session->set_userdata('logged_in', $sess_array);
      }
    
    $url="iitk/edit/".$username;
    redirect($url,'refresh');
     
	 }
 }

}

?>