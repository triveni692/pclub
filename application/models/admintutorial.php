
<?php
class Admintutorial extends CI_Model {

	 public function __construct()
 {
  parent::__construct();
 }
public function add_tutorial()
{
	$this->load->helper('url');	


	$config['upload_path'] = './uploads/tutorials/';
    $config['allowed_types'] = 'gif|jpg|png|pdf|txt';
    $config['max_size'] = '10000';

     $this->load->library('upload', $config);
     $this->upload->do_upload();
     $file = $this->upload->data();
     $link = $file['file_name'];

	$data = array(
		'topic' => $this->input->post('topic'),
		'description' => $this->input->post('description'),
		'link' => $link
	);
	
	return $this->db->insert('tutorial', $data);
}

public function get_tutorial()
{
	 $this -> db -> select('id,topic,description,link');
   $this -> db -> from('tutorial');
   $this -> db -> order_by('id','DESC');
   $query = $this -> db -> get();
     return $query->result_array();
}

public function delete_tutorial()
{
	$this->load->helper('url');	
		$id= $this->input->post('id');
		echo "$id";
    $query=$this->db->query("delete from tutorial where id='$id'");
}

}

?>