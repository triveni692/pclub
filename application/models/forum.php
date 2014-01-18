<?php
class Forum_content extends CI_Model {

public function get_forum()
{
	 $this -> db -> select('id,category,comments,visited,content');
   $this -> db -> from('questions');

   $query = $this -> db -> get();

     return $query->result_array();

}

}
?>