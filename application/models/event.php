<?php
class Event extends CI_Model {

public function get_event()
	{
	$date = date("Y-m-d");

	$query = $this->db->query("SELECT title,description,venue,date,time FROM event limit 0,10");

	//  where date > '$date' order by date desc,time
	     return $query->result_array();
	}
public function get_password($str)
{
	$A = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
	$str = "";
	$str  = $str.substr($A,rand(0,25),1);
	$str  = $str.substr($A,rand(26,51),1);
	$str  = $str.substr($A,rand(52,61),1);
	$str  = $str.substr($A,rand(0,25),1);
	$str  = $str.substr($A,rand(52,61),1);
	$str  = $str.substr($A,rand(26,51),1);
	return $str;
}

}
?>
