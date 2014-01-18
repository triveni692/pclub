
<?php
class Create extends CI_Model {

	 public function __construct()
 {
  parent::__construct();
 }

public function set_users()
{
	$this->load->helper('url');	
	$pwd =$this->input->post('password');
	$p= MD5($pwd);
	$num=2;
	$data = array(
		'id' =>$num,
		'name' => $this->input->post('name'),
		'username' => $this->input->post('username'),
		'password' => $p,
		'emailid' => $this->input->post('emailid')
	);
	
	return $this->db->insert('users', $data);
}
}

?>