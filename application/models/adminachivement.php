
<?php
class Adminachivement extends CI_Model {

	 public function __construct()
 {
  parent::__construct();
 }

public function add_achivement()
{
	$this->load->helper('url');	
	$data = array(
		'topic' => $this->input->post('topic'),
		'description' => $this->input->post('description')
	);
	
	return $this->db->insert('achivement', $data);
}

public function get_achivement()
{
	 $this -> db -> select('id,topic,description');
   $this -> db -> from('achivement');
   $this -> db -> order_by('id','DESC');
   $query = $this -> db -> get();
     return $query->result_array();
}

public function delete_achivement()
{
	$this->load->helper('url');	
		$id= $this->input->post('id');
		echo "$id";
    $query=$this->db->query("delete from achivement where id='$id'");
}

}

?>