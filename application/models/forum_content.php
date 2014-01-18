<?php
class Forum_content extends CI_Model {

public function get_forum($class)
{
	if($class=='none'){
   		$db=$this->load->database('default',TRUE);
        $query=$db->query("select * from `questions`  order by `timestamp` DESC;");
     	return $query->result_array();
     }
     else {
        $db=$this->load->database('default',TRUE);
        $query=$db->query("select * from `questions` where category = '".$class."' order by  `timestamp` DESC");
        return $query->result_array();
     }

}

}
?>
