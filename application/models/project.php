<?php
class Project extends CI_Model {

	public function get_project()
{
	 $this -> db -> select('name,link');
   $this -> db -> from('project');
   $this -> db -> order_by('id','DESC');

   $query = $this -> db -> get();

     return $query->result_array();

}

}
?>