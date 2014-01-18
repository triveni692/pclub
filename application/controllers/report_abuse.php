<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Report_abuse extends CI_Controller {

	 function __construct()
	 {
	   parent::__construct();
	 }

	 function index()
	 {
	 	$content = $_POST['content'];
	 	$q_id = $_POST["q_id"];
		$c_id = $_POST['c_id'];
		$user = $_POST['username'];
		$url = $_POST['url'];
		//echo $url;

		if($c_id==0){
			$db1=$this->load->database('questions',TRUE);
			$table="t_".$q_id."_reports";
			$query="INSERT INTO `".$table."` (`whodid`, `timestamp`) VALUES ('".$user."', CURRENT_TIMESTAMP)";
			$db1->query($query);

			$db2=$this->load->database('users',TRUE);
			$table=$user."_questions_reported";
			$query="INSERT INTO `".$table."` (`id`,`content`, `timestamp`) VALUES ('".$q_id."','".$content."', CURRENT_TIMESTAMP)";
			$db2->query($query);

			$db=$this->load->database('default',TRUE);
			$table="questions";
			$reports=$db->query("select `report_abuses`  from `".$table."` where `id`= '".$q_id."'");
			$reports=$reports->result_array();
			$r=0;
			foreach ($reports as $key ) {
				$r=$key['report_abuses'];
			}
			$r+=1;
			$db->query("UPDATE  `".$table."` SET  `report_abuses` = ".$r." WHERE  `id` ='".$q_id."'");

			$url="forum";


			//$url="http://localhost/ci/forum";
			//echo $url;
		}

		else{
			$db1=$this->load->database('questions',TRUE);
			$table="t_".$q_id;
			$reports=$db1->query("select *  from `$table` where `comment_id`= '".$c_id."'");
			$reports=$reports->result_array();
			$r=0;
			foreach ($reports as $key ) {
				$r=$key['report_abuses'];
			}
			$r+=1;
			$db1->query("UPDATE  `$table` SET  `report_abuses` = ".$r." WHERE  `comment_id` ='".$c_id."'");

			$db2=$this->load->database('users',TRUE);
			$table=$user."_comments_reported";
			$db1->query("INSERT INTO `".$table."` (`id`,`content`, `timestamp`) VALUES ('".$q_id."_".$c_id."','".$content."',CURRENT_TIMESTAMP)");

		}
		redirect($url,'refresh');
		//echo $user." ".$c_id." ".$q_id." ".$content;

	 }

}
?>