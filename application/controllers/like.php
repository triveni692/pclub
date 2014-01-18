
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Like extends CI_Controller {

 function __construct()
 {
   parent::__construct();
 }

 function index()
 {

 	$q_id = $_POST['question_id'];
	$c_id = $_POST['comment_id'];
	$user = $_POST['username'];
	$likes = $_POST['likes'];
	
	if($c_id == 0) {
		$db1=$this->load->database('default',TRUE);
		      								
		$liks=$db1->query("select *  from `questions` where `id`= '".$q_id."'");
		$liks=$liks->result_array();
		$n=0;
		foreach ($liks as $key ) {
			$n=$key['likes'];
		}
		$n=$n+$likes;
		$query="UPDATE  `questions` SET  `likes` =  '".$n."' WHERE  `id` ='".$q_id."'";
		$db1->query($query);

		$db2=$this->load->database('users',TRUE);
		$table=$user."_question_likes";
		if($likes == 1) $query= "INSERT INTO `".$table."` (`id`, `timestamp`) VALUES ('".$q_id."', CURRENT_TIMESTAMP)";
		else $query= "DELETE FROM `".$table."` where `id` = '".$q_id."'" ;

		$db2->query($query);

		
	}
	else
	{
		
		$table= "t_".$q_id;
		$db1 = $this->load->database('questions',TRUE);

		$liks=$db1->query("select *  from `".$table."` where `comment_id`= '".$c_id."'")->result_array();
		$n=0;
		foreach ($liks as $key ) {
			$n=$key['likes'];
		}
		$n=$n + $likes ;
		$query = "UPDATE  `".$table."` SET  `likes` =  '".$n."' WHERE  `comment_id` ='".$c_id."'";
		
		$db1->query($query);

		$db2=$this->load->database('users',TRUE);
		$table=$user."_comments_likes";
		if($likes == 1) $query= "INSERT INTO `".$table."` (`id`, `timestamp`) VALUES ('".$q_id."_".$c_id."', CURRENT_TIMESTAMP)";
		else $query = "DELETE FROM `".$table."` where `id` = '".$q_id."_".$c_id."'" ;
		
		$db2->query($query);
	}

	echo $n;
  //echo "robbin". $r;
 }
}
?>

