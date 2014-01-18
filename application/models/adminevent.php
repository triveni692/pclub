
<?php
class Adminevent extends CI_Model {

	 public function __construct()
 {
  parent::__construct();
 }

public function add_event()
{
	$this->load->helper('url');	
	$data = array(
		'title' => $this->input->post('title'),
		'date' => $this->input->post('date'),
		'time' => $this->input->post('time'),
		'description' => $this->input->post('description'),
		'venue' => $this->input->post('venue')
	);
	
	return $this->db->insert('event', $data);
}



public function get_event()
{
   $this -> db -> select('id,title,date,time,description,venue');
   $this -> db -> from('event');
   $this -> db -> order_by('id','desc');
   $query = $this -> db -> get();
     return $query->result_array();
}

public function delete_event()
{
	$this->load->helper('url');	
		$id= $this->input->post('id');
		echo "$id";
    $query=$this->db->query("delete from event where id='$id'");
}

}

?>