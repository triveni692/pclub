<?php
class  Clear extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   /*
   localhost/ci/clear ->it will clear 'users' and 'questions' database completely erase contents of questions and users tables of test` database
   localhost/ci/clear/index/all -> in addition contents of all the tables of `test` database will be erased 
   localhost/ci/clear/create -> It will make all the desired tables in each databases
   */
      
 }

 function index($default="none")
 {
	if($this->session->userdata('logged_in'))
	   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     if($data['username'] != "admin") redirect('admin',refresh);
     
   }
   else
   {
     redirect('admin',refresh);
   }

 	$db1= $this->load->database('default',TRUE);
 	$query = $db1->query("SELECT * FROM `users`")->result_array();
 	foreach ($query as $key) {
 		$n=$key['username'];
    unlink("img/users/".$key['pic']);
 		$db2 = $this->load->database('users',TRUE);
 		$q= "DROP TABLE `".$n."_comments_likes` , `".$n."_comments_reported`, `".$n."_questions_reported` , `".$n."_question_asked` , `".$n."_question_likes` , `".$n."_question_commented`";
 		$db2->query($q);
 	}

 	$db1= $this->load->database('default',TRUE);
 	$query = $db1->query("SELECT `id` FROM `questions`")->result_array();

 	foreach ($query as $key) {
 		$n=$key['id'];
 		$db2 = $this->load->database('questions',TRUE);
 		$q= "DROP TABLE `t_".$n."` ,`t_".$n."_reports` ";
 		$db2->query($q);
 	}

 	$db1= $this->load->database('default',TRUE);
 	$query = "TRUNCATE `questions`";
 	$db1->query($query) ;
 	$query = "TRUNCATE  `users`";
 	$db1->query($query) ;
 	if($default == "all")
 	{
 		$query = "TRUNCATE  `achivement`";
 		$db1->query($query) ;
 		$query = "TRUNCATE  `contact`";
 		$db1->query($query) ;
 		$query = "TRUNCATE  `event`";
 		$db1->query($query) ;
 		$query = "TRUNCATE  `project`";
 		$db1->query($query) ;
 		$query = "TRUNCATE  `tutorial`";
 		$db1->query($query) ;
    $query = "TRUNCATE  `anouncements`";
    $db1->query($query) ;
 	}
  
 }

 function delete($default= "none"){

  if($this->session->userdata('logged_in'))
     {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     if($data['username'] != "admin") redirect('admin',refresh);
     
   }
   else
   {
     redirect('admin',refresh);
   }

  $db1= $this->load->database('default',TRUE);
  $query = $db1->query("SELECT * FROM `users`")->result_array();
  foreach ($query as $key) {
    $n=$key['username'];
    unlink("img/users/".$key['pic']);
    $db2 = $this->load->database('users',TRUE);
    $q= "DROP TABLE `".$n."_comments_likes` , `".$n."_comments_reported`, `".$n."_questions_reported` , `".$n."_question_asked` , `".$n."_question_likes` , `".$n."_question_commented`";
    $db2->query($q);
  }

  $db1= $this->load->database('default',TRUE);
  $query = $db1->query("SELECT `id` FROM `questions`")->result_array();

  foreach ($query as $key) {
    $n=$key['id'];
    $db2 = $this->load->database('questions',TRUE);
    $q= "DROP TABLE `t_".$n."` ,`t_".$n."_reports` ";
    $db2->query($q);
  }

  $db1= $this->load->database('default',TRUE);
  $query = "DROP TABLE `questions`";
  $db1->query($query) ;
  $query = "DROP TABLE  `users`";
  $db1->query($query) ;
  if($default == "all")
  {
    $query = "DROP TABLE  `achivement`";
    $db1->query($query) ;
    $query = "DROP TABLE  `contact`";
    $db1->query($query) ;
    $query = "DROP TABLE  `event`";
    $db1->query($query) ;
    $query = "DROP TABLE  `project`";
    $db1->query($query) ;
    $query = "DROP TABLE  `tutorial`";
    $db1->query($query) ;
    $query = "DROP TABLE  `anouncements`";
    $db1->query($query) ;

  }

 }

 function create()
 {
 	if($this->session->userdata('logged_in'))
     {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     if($data['username'] != "admin") redirect('admin',refresh);
     
   }
   else
   {
     redirect('admin',refresh);
   }
 	$db1= $this->load->database('default',TRUE);
 	$q="CREATE TABLE IF NOT EXISTS achivement (id tinyint(4) PRIMARY KEY NOT NULL AUTO_INCREMENT,topic varchar(240),description text)";
 	$db1->query($q);
 	$q="CREATE TABLE IF NOT EXISTS contact (id tinyint(4) PRIMARY KEY  NOT NULL AUTO_INCREMENT,name varchar(240), pic text, phone text, address  text, post varchar(240))";
 	$db1->query($q);
 	$q="CREATE TABLE IF NOT EXISTS  event (id tinyint(4) PRIMARY KEY NOT NULL AUTO_INCREMENT,title varchar(240),date DATE,time TIME, description text, venue varchar(240) )";
 	$db1->query($q);
 	$q="CREATE TABLE IF NOT EXISTS project (id tinyint(4) PRIMARY KEY NOT NULL AUTO_INCREMENT, name varchar(240), link varchar(300))";
 	$db1->query($q);
 	$q="CREATE TABLE IF NOT EXISTS questions (id int(11) PRIMARY KEY ,comments int(11), visits int(11), category varchar(100),content text, timestamp TIMESTAMP, added_by varchar(240), added_as varchar(100), likes int(11), report_abuses int(11))";
 	$db1->query($q);
 	$q="CREATE TABLE IF NOT EXISTS tutorial (id tinyint(4) PRIMARY KEY NOT NULL AUTO_INCREMENT, topic varchar(240), description text, link text)";
 	$db1->query($q);
 	$q="CREATE TABLE IF NOT EXISTS users (id tinyint(4), name varchar(100), username varchar(240) PRIMARY KEY, password varchar(110), emailid varchar(60), aboutme text, website varchar(240), topcoder varchar(240), codechef varchar(240), spoj varchar(240), pic varchar(45), onj varchar(240),fb varchar(80), seq_que varchar(100), seq_ans varchar(100),timestamp timestamp)";
 	$db1->query($q);
  $q="CREATE TABLE IF NOT EXISTS anouncements (id tinyint(4) PRIMARY KEY NOT NULL AUTO_INCREMENT, content text,timestamp TIMESTAMP)";
  $db1->query($q);
 }

 function all()
 {
 	
 	redirect('clear/index/all');
 }
 // function delete()
 // {
  
 //  redirect('clear/index/all');
 // }
}
?>
