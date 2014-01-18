
<?php
class Admincontact extends CI_Model {

	 public function __construct()
 {
  parent::__construct();
 }
public function add_contact()
{
	$this->load->helper('url');	
	$post=$this->input->post('radio1');
	$cordi="cordi";
	$file ="";
	if($post==$cordi){
	$config['upload_path'] = './uploads/pic/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size'] = '10000';

     $this->load->library('upload', $config);
     $this->upload->do_upload();
     $file = $this->upload->data();

 }
     if($post==$cordi) $link = $file['file_name'];
     else $link = "seci.jpg";

	$data = array(
		'name' => $this->input->post('name'),
		'phone' => $this->input->post('phone'),
		'address' => $this->input->post('address'),
		'post' => $post,
		'pic' => $link
	);
	
	return $this->db->insert('contact', $data);
}

public function get_contact()
{
	 $this -> db -> select('id,name,phone,address,post,pic');
   $this -> db -> from('contact');
   $this -> db -> order_by('post');
   $query = $this -> db -> get();
     return $query->result_array();
}

public function delete_contact()
{
	$this->load->helper('url');	
		$id= $this->input->post('id');
		echo "$id";
    $query=$this->db->query("delete from contact where id='$id'");
}

}

?>