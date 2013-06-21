<?php
class Event extends CI_Model {

	public function get_event()
{
	 $this -> db -> select('title,description,venue');
   $this -> db -> from('event');
   $this -> db -> order_by('id','DESC');
   $this -> db -> limit(1);

   $query = $this -> db -> get();

     return $query->result_array();

}

}
?>