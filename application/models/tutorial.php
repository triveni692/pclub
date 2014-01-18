<?php
class Tutorial extends CI_Model {

	public function get_tutorial()
{
	 $this -> db -> select('topic,description,link');
   $this -> db -> from('tutorial');
   $this -> db -> order_by('id','DESC');

   $query = $this -> db -> get();

     return $query->result_array();

}

}
?>