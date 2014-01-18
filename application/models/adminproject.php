
<?php
class Adminproject extends CI_Model {

	 public function __construct()
 {
  parent::__construct();
 }
public function add_project()
{
	$this->load->helper('url');	
	$data = array(
		'name' => $this->input->post('name'),
		'link' => $this->input->post('link')
	);
	
	return $this->db->insert('project', $data);
}

public function get_project()
{
	 $this -> db -> select('id,name,link');
   $this -> db -> from('project');
   $this -> db -> order_by('id','DESC');
   $query = $this -> db -> get();
     return $query->result_array();
}

public function delete_project()
{
	$this->load->helper('url');	
		$id= $this->input->post('id');
		echo "$id";
    $query=$this->db->query("delete from project where id='$id'");
}

}

?>