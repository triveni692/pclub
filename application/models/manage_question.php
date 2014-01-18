<?php
class Manage_question extends CI_Model {

	 public function __construct()
 {
  parent::__construct();
 }

function manage($id)
{
	
	$report=$id."_reports";
	$db=$this->load->database('questions',TRUE);
	$db->query('create table t_'.$id.' (comment_id int  PRIMARY KEY  auto_increment,comment text,whodid varchar(20),addedas varchar(20), likes int, timestamp TIMESTAMP, report_abuses int)');
	$db->query('create table t_'.$report.' (whodid varchar(20) ,timestamp TIMESTAMP)');	//id=0 means question report

}
}

?>