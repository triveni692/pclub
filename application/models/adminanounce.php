<?php
class Adminanounce extends CI_Model {

	 public function __construct()
 {
  parent::__construct();
 }
public function add_anouncement()
{
	$this->load->helper('url');

	$data = array(
		'content' => $this->input->post('anouncement'));
	
	return $this->db->insert('anouncements', $data);
}

public function get_anouncement()
{
 $this -> db -> select('id,content,timestamp');
 $this -> db -> from('anouncements');
 $this -> db -> order_by('id','DESC');
 $query = $this -> db -> get();
 return $query->result_array();
}

public function delete_anouncement()
{
	$this->load->helper('url');	
		$id= $this->input->post('id');
		echo "$id";
    $query=$this->db->query("delete from anouncements where id='".$id."'");
}

}

?>