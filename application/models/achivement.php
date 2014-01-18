<?php
class Achivement extends CI_Model {

	public function get_achivement()
{
	 $this -> db -> select('topic,description');
   $this -> db -> from('achivement');
   $this -> db -> order_by('id','DESC');

   $query = $this -> db -> get();

     return $query->result_array();

}

}
?>