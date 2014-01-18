<?php 
/*
please dont mess with this controller .....
This is very important controller and should be handled with care...
Reason is , both, for "security reasons" and "It is very hard to understand what actually is going on inside this controller :P"....
*/
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Iitk extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('event');
   $this->load->helper(array('form', 'url'));
 }
 
 function users($default = 'anonymous')
 {
    $data['navhead']="forum";
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
     }
   else
   {
     $data['status']="logout";
     $data['event'] = $this->event->get_event();
   }

    $db1=$this->load->database('default',TRUE);
    $query=$db1->query("select * from `users` where `username` = '".$default."'");
    $query=$query->result_array();
  
    if($query) $data['user'] = $query;
    else  show_404();
  
    $query=$db1->query("select * from `questions` where `added_by` = '".$default."' order by `timestamp` DESC;")->result_array();  
    $data['question'] = $query;

    $db1=$this->load->database('users',TRUE);
    $query = "SELECT `id` from `".$default."_question_commented`";
    $query=$db1->query($query)->result_array();

    $db1=$this->load->database('default',TRUE);
    $q_commented = array();
    $i=0;
    foreach ($query as $key) {
     $id = $key['id'];
     $q = "select `content`,`id` from `questions` where `id`= '".$id."'" ;
     $q=$db1->query($q)->result_array();
     foreach ($q as $keyy) {
       $q_commented[$i++]=$keyy;
     }
    }
  $data['n_q_commented'] = $i;
  $data['q_commented'] = $q_commented ;
  $data['profile'] = $default ;
  if ($data['user'] != 'anonymous')  $this->load->view('profile',$data);
  else redirect('forum', 'refresh');
 }

function edit($default = 'anonymous')
 {
   $data['navhead']="forum";
    if($this->session->userdata('logged_in'))
     {
       $session_data = $this->session->userdata('logged_in');
       $data['username'] = $session_data['username'];
       if(isset($session_data['pvalid']) )
       {
        $data['pstatus'] = $session_data['pvalid'];
        $array_items = array();
        $array_items['username'] = $session_data['username'];
        $array_items['id'] = $session_data['id'];
        $array_items['name'] = $session_data['name'];

        $this->session->set_userdata('logged_in',$array_items);
       }
       else $data['pstatus'] = "notset";

       if(isset($session_data['update']) )
       {
        $data['update'] = $session_data['update'];
        $array_items = array();
        $array_items['username'] = $session_data['username'];
        $array_items['id'] = $session_data['id'];
        $array_items['name'] = $session_data['name'];

        $this->session->set_userdata('logged_in',$array_items);
       }

       if(isset($session_data['imgupdate']) )
       {
        $data['imgupdate'] = $session_data['imgupdate'];
        $array_items = array();
        $array_items['username'] = $session_data['username'];
        $array_items['id'] = $session_data['id'];
        $array_items['name'] = $session_data['name'];

        $this->session->set_userdata('logged_in',$array_items);
       }

       if($data['username'] != $default) show_404();
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
     }
   else
   {
    show_404();
   }

    $db1=$this->load->database('default',TRUE);
    $query=$db1->query("select * from `users` where `username` = '".$default."'");
    $query=$query->result_array();
  
    if($query) $data['user'] = $query;
    else  $data['user'] = 'anonymous';
  
    $query=$db1->query("select * from `questions` where `added_by` = '".$default."' order by `timestamp` DESC;")->result_array();  
    $data['question'] = $query;
    
//question commented
    $db1=$this->load->database('users',TRUE);
    $query = "SELECT `id` from `".$default."_question_commented`";
    $query=$db1->query($query)->result_array();

    $db1=$this->load->database('default',TRUE);
    $q_commented = array();
    $i=0;
    foreach ($query as $key) {
     $id = $key['id'];
     $q = "select * from `questions` where `id`= '".$id."'" ;
     $q=$db1->query($q)->result_array();
     foreach ($q as $keyy) {
       $q_commented[$i++]=$keyy;
     }
    }
  $data['n_q_commented'] = $i;
  $data['q_commented'] = $q_commented ;
//question liked
  $db1=$this->load->database('users',TRUE);
  $query = "SELECT * from `".$default."_question_likes`";
  $query=$db1->query($query)->result_array();

  $db1=$this->load->database('default',TRUE);
  $q_liked = array();
  $i=0;
  foreach ($query as $key) {
   $id = $key['id'];
   $q = "select * from `questions` where `id`= '".$id."'" ;
   $q=$db1->query($q)->result_array();
   foreach ($q as $keyy) {
     $keyy['timestamp'] = $key['timestamp'];
     $q_liked[$i++]=$keyy;
   }
  }
  $data['n_q_liked'] = $i;
  $data['q_liked'] = $q_liked;
  
//commented
  $db1=$this->load->database('users',TRUE);
  $query = "SELECT `id` from `".$default."_question_commented`";
  $query=$db1->query($query)->result_array();

  $db1=$this->load->database('default',TRUE);
  $q_commented = array();
  $i=0;
  foreach ($query as $key) {
   $id = $key['id'];
   $q = "select * from `questions` where `id`= '".$id."'" ;
   $q=$db1->query($q)->result_array();
   foreach ($q as $keyy) {
       $q_commented[$i++]=$keyy;
   }
  }
  $data['n_q_commented'] = $i;
  $data['q_commented'] = $q_commented;

//comment likes

  $db1=$this->load->database('users',TRUE);
  $query = "SELECT `id` from `".$default."_comments_likes`";
  $query=$db1->query($query)->result_array();

  $db1=$this->load->database('questions',TRUE);

  $c_liked = array();
  $i=0;
  foreach ($query as $key) {
    $idx =0 ;
    while(substr($key['id'],$idx,1) != '_') $idx++;
    $q_id = substr($key['id'],0,$idx);
    $c_id = substr($key['id'],$idx+1);
    $c_liked[$i]['q_id'] = $q_id;
    $c_liked[$i]['c_id'] = $c_id;
    $table = 't_'.$q_id;
    $q="select * from `".$table."` where `comment_id` = '".$c_id."'";
    $q = $db1->query($q)->result_array();

    foreach ($q as $keyy) {
      $c_liked[$i]['added_by'] = $keyy['whodid'];
      $c_liked[$i]['added_as'] = $keyy['addedas'];
      $c_liked[$i]['content'] = $keyy['comment'];
      $c_liked[$i]['likes'] = $keyy['likes'];
      $c_liked[$i]['timestamp'] = $keyy['timestamp'];

    }
    $i++;
  }
  $data['n_c_liked'] = $i;
  $data['c_liked'] = $c_liked;

  $data['profile'] = $default ;
  if ($data['user'] != 'anonymous')  $this->load->view('profilee',$data);
  else redirect('forum', 'refresh');
 }
function general()
{
  $session_data = $this->session->userdata('logged_in');
  $username = $session_data['username'];

  $name = $_POST['name'];
  $aboutme = $_POST['aboutme'];
  $website = $_POST['website'];

  $db1 = $this->load->database('default',TRUE);
  $query = "UPDATE `users` SET `name` = '".$name."',`aboutme` = '".$aboutme."',`website` = '".$website."' WHERE `username` = '".$username."'";
  $db1->query($query)  ;
  $session_data['name'] = $name;
}
function judges()
{
  $session_data = $this->session->userdata('logged_in');
  $username = $session_data['username'];

  $spoj = $_POST['spoj'];
  $codechef = $_POST['codechef'];
  $topcoder = $_POST['topcoder'];
  $onj = $_POST['onj'];

  $db1 = $this->load->database('default',TRUE);
  $query = "UPDATE `users` SET `spoj` = '".$spoj."',`codechef` = '".$codechef."',`topcoder` = '".$topcoder."',`onj` = '".$onj."' WHERE `username` = '".$username."'";
  $db1->query($query)  ;
}

function contact()
{
  $session_data = $this->session->userdata('logged_in');
  $username = $session_data['username'];

  $email = $_POST['email'];
  $fb = $_POST['fb'];

  $db1 = $this->load->database('default',TRUE);
  $query = "UPDATE `users` SET `emailid` = '".$email."',`fb` = '".$fb."' WHERE `username` = '".$username."'";
  $db1->query($query)  ;
}

function security()
{
  $session_data = $this->session->userdata('logged_in');
  $username = $session_data['username'];

  $seq_que = $_POST['seq_que'];
  $seq_ans = $_POST['seq_ans'];

  $seq_ans = MD5($seq_ans);

  $db1 = $this->load->database('default',TRUE);
  $query = "UPDATE `users` SET `seq_que` = '".$seq_que."',`seq_ans` = '".$seq_ans."' WHERE `username` = '".$username."'";
  $db1->query($query)  ;
}

function change_password()
{
  $o_pwd = $_POST['old_pwd'];
  $n_pwd = $_POST['new_pwd'];
  $c_n_pwd = $_POST['c_new_pwd'];

  $session_data = $this->session->userdata('logged_in');
  $username = $session_data['username'];
  $y = "updated";
  if(strlen($n_pwd)>15 || strlen($n_pwd)<6) $y="notupdated";
  if($n_pwd != $c_n_pwd) $y = "notupdated";

  $url = "iitk/edit/".$username;

  $db1 = $this->load->database('default',TRUE);
  $n_pwd = MD5($n_pwd);
  $query = "UPDATE `users` SET `password` = '".$n_pwd."' WHERE `username` = '".$username."'";
  if($y == "updated") $x=$db1->query($query);
  else $x=false;

  if($x) $y = "updated"; 
  else $y = "notupdated"; 
  $session_data['pvalid'] = $y;
  $this->session->set_userdata('logged_in',$session_data);

  redirect($url,'refresh');

}
function check_password($default = "")
{
  $session_data = $this->session->userdata('logged_in');
  $username = $session_data['username'];

  if($default == ""){ echo "<font color='red'>*wrong</font>"; return ;}
  $db1 = $this->load->database('default',TRUE);
  $q="select `password` from `users` where `username` = '".$username."'";
  $q=$db1->query($q)->result_array();
  $pwd="";
  foreach ($q as $key) {
    $pwd = $key['password'];
  }
  if(MD5($default) == $pwd) echo "<font color='green'>*correct</font>";
  else echo "<font color='red'>*wrong</font>";
  return ;
}
function verify_username($default = "")
{
  $db1 = $this->load->database('default',TRUE);
  $q="select `seq_que` from `users` where `username` = '".$default."'";
  $q=$db1->query($q)->result_array();
  if($q) foreach ($q as $key) {
    echo "<font color='green'>".$key['seq_que']."</font>";
  } 
  else echo '<font color="red">invalid username</font>';
  return ;
}

function check_username($d = "")
{
  $flag=false; //safe character
  $f=false; //unsafe character
  for($i=0;$i<strlen($d);$i++)
  {
    $c = substr($d,$i,1);
    if($c=='a'||$c=='b'||$c=='c'||$c=='d'||$c=='e'||$c=='f'||$c=='g'||$c=='h'||$c=='i'||$c=='j'||$c=='k'||$c=='l'||$c=='m'||$c=='n'||$c=='o'||$c=='p'||$c=='q'||$c=='r'||$c=='s'||$c=='t'||$c=='u'||$c=='v'||$c=='w'||$c=='x'||$c=='y'||$c=='z') $flag =true;
    else if($c=='A'||$c=='B'||$c=='C'||$c=='D'||$c=='E'||$c=='F'||$c=='G'||$c=='H'||$c=='I'||$c=='J'||$c=='K'||$c=='L'||$c=='M'||$c=='N'||$c=='O'||$c=='P'||$c=='Q'||$c=='R'||$c=='S'||$c=='T'||$c=='U'||$c=='V'||$c=='W'||$c=='X'||$c=='Y'||$c=='Z') $flag =true;
    else if($c=='0'||$c=='1'||$c=='2'||$c=='3'||$c=='4'||$c=='5'||$c=='6'||$c=='7'||$c=='8'||$c=='9') $flag = true;
    else if($c != '_') $f = true;
  }
  if(!($flag && !$f)) {echo '<font color="red">unavailable</font>'; return ;}
  $db1=$this->load->database('default',TRUE);
  $q="SELECT `name` FROM `users` WHERE `username` = '".$d."'";
  $x=$db1->query($q)->result_array();
  $i=0;
  foreach ($x as $key) {
    $i++;
  }
  //echo $i;
  if($i || $d == 'admin' || $d == 'anonymous') {echo '<font color="red">unavailable</font>'; return ;}
  else echo '<font color="green">available</font>';
  return ;
}
 /************************************forgot password email **************************************************/
 function forgot_pwd_em()
 {
  if(!(isset($_POST['username']) && isset($_POST['email']))) show_404();
  $this->load->library('form_validation');
  $this->form_validation->set_rules('username', 'username', 'trim|required|xss_clean');
  $this->form_validation->set_rules('email', 'email', 'trim|required|xss_clean');

  if($this->form_validation->run() == FALSE)
  {
    echo '<font color="red">Ooops!!! Invalid Username and Security Question Answer Combination<br></font>';
    echo '<a href="'.base_url().'home">Go to Home Page.</a>';
    return;
  }
    // echo '<font color="red">Service Unavailable!!!<br></font>';
    // echo '<a href="'.base_url().'home">Go to Home Page.</a>';
  
  $username = $_POST['username'];
  $email = $_POST['email'];
  //$this->load->view('reset_password.php');

  $db1=$this->load->database('default',TRUE);
  $q="SELECT * from `users` where `username` = '".$username."' and `emailid` = '".$email."'";
  $q=$db1->query($q)->result_array();
  if(!($q)) 
  {
    echo '<font color="red">Ooops!!! Invalid Username and Email Combination !!!<br></font>';
    echo '<a href="'.base_url().'home">Please try again.</a>';
    return ;
  }
  $pass=$this->event->get_password($username);
  $link = base_url()."/iitk/edit/".$username."#changepwd";

  $update = 'A new password has successfully been set for your account : <font color="blue">'.$username .'.</font><br>';
  $db_error = '<font color=red>Ooops!!! Unexpected ERROR occured!!!</font><br> <a href="'.base_url().'home">Please try again</a>';
  $messege = '<font color="green">Congrats !!!<br> We have emailed you ("<font color="blue">'.$username.'</font>"), 
  your new password to your email address : <font color = "blue">'.$email.'</font>.<br>
  Now, you can login with your new password and of course you can change it : <a href="'.$link.'">here </a>
  after you login using your new password , if you wish to do so.</font>';

  $error = '<font color="red">Ooops!!! An unknown error occured while sending email to you :(<br></font>
    <a href="'.base_url().'home">Please try again</a>. Or, check your email, if somehow messege delivered to you :)';
  
  // update database with new password
  $q="UPDATE `users` SET `password` = '".MD5($pass)."' where `username` = '".$username."'";
  $x=$db1->query($q);
  if(!$x) {echo $db_error; return; }
  else echo $update;
  echo "  pass = ".$pass."<br>";
  // email the new password
  $to = $email;
  $subject = "Pclub Password Reset Mail";
  $content = "your new password is : ".$pass ;
  $from = "admin@pclub.in";
  $headers = "From : ".$from;

  $x = mail($to, $subject, $content, $headers);
  if(!$x) {echo $error; return;}
  else echo $messege;
 }
/************************************forgot password security question **************************************************/
 function forgot_pwd_sq()
 {
  if(!(isset($_POST['username']) && isset($_POST['ans']))) show_404();
  $this->load->library('form_validation');
  $this->form_validation->set_rules('username', 'username', 'trim|required|xss_clean');
  $this->form_validation->set_rules('ans', 'ans', 'trim|required|xss_clean');

  if($this->form_validation->run() == FALSE)
  {
    echo '<font color="red">Ooops!!! Invalid Username and Security Question Answer Combination<br></font>';
    echo '<a href="'.base_url().'home">Go to Home Page.</a>';
  }
  else
  {
    $username = $_POST['username'];
    $ans = $_POST['ans'];

    $db1=$this->load->database('default',TRUE);
    $q="SELECT * from `users` where `username` = '".$username."' and `seq_ans` = '".MD5($ans)."'";
    $q=$db1->query($q)->result_array();
    if(!($q)) 
    {
      echo '<font color="red">Ooops!!! Invalid Username and Security Question Answer Combination<br></font>';
      echo '<a href="'.base_url().'home">Go to Home Page.</a>';
    }
    else
    {
      $sess_array = array();
       foreach($q as $row)
       {
         $sess_array['id'] = $row['id'];
         $sess_array['username'] = $row['username'];
         $sess_array['name'] = $row['name'];
       }
      $pass=$this->event->get_password($username);
      $pp=MD5($pass);
      $q="UPDATE `users` SET `password` = '".$pp."' where `username` = '".$username."'";
      $x=$db1->query($q);
      if(!$x) {echo "Ooops!!! Unexpected ERROR!!!"; return ;}
     
      $this->session->set_userdata('logged_in', $sess_array);
       
      echo "Your Password has been set to '".$pass."'.<br> Please click on the following link and change your password.<br>";
      echo '<a href="'.base_url().'iitk/edit/'.$username.'#changepwd">Please Change your Password first before doing anything else.<br></a>';
      echo 'Use this password as "old Password" for the password change process.';
    }
  
  }
 /**************************************** change photo *******************************************************/ 
 }
 function change_photo()
 {

  if(!($this->session->userdata('logged_in')) || !isset($_POST['username'])) show_404();

    $session_data = $this->session->userdata('logged_in');
    $file ="";
    $config['upload_path'] = './img/temp/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size'] = '2048';
    $config['max_width']  = '2048';
    $config['max_height']  = '1300';
    $username = $_POST['username'];
    $config['file_name'] = $username;
     
    
    $this->load->library('upload', $config);
     $this->upload->initialize($config);
     $this->upload->do_upload();
     $file = $this->upload->data();
     $link = $file['file_name'];
     $username = $_POST['username'];
     $format = substr($link, -4);
     $link = $username.$format;

     $db1 = $this->load->database('default',TRUE);    
     $q= "SELECT `pic` FROM `users` where `username` = '".$username."'";
     $q = $db1->query($q)->result_array();
     foreach ($q as $key) {
      $im = $key['pic'];
     }
     if($im != "anonymous.jpg") unlink('./img/users/'.$im);

     if(!($format == ".JPG" || $format == ".GIF" || $format == ".PNG" || $format == ".jpg" || $format == ".png" || $format == ".gif")) $link = "anonymous.jpg" ;

     if($link != "anonymous.jpg") { 
      copy('./img/temp/'.$link, './img/users/'.$link);
      unlink('./img/temp/'.$link);
     }
    $db1 = $this->load->database('default',TRUE);
    $q = "UPDATE `users` SET `pic` = '".$link."' WHERE `username` = '".$username."'";
    $x = $db1->query($q);

    $y= "";
    if($x) $y = "updated";
    else $y = "notupdated";
    $session_data['imgupdate'] = $y;
    $this->session->set_userdata('logged_in',$session_data);

    $url="iitk/edit/".$username;
    redirect($url,'refresh');
 }
}
