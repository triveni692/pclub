
<?php
class Add_user extends CI_Model {

	 public function __construct()
 {
  parent::__construct();
  $this->load->helper(array('form', 'url'));
 }

public function set_users()
{
	$replaces = array(
        "'" => "\'",
        '"' => '\"',
  		);
	$this->load->helper('url');
	$pwd =$this->input->post('password');
	$p= MD5($pwd);

	$file ="";

			$config['upload_path'] = './img/temp/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size'] = '2048';
    $config['max_width']  = '2048';
	$config['max_height']  = '1300';
	$username = $_POST['username'];
    $config['file_name'] = $username;
     
    
	 $this->load->library('upload', $config);
     $this->upload->initialize($config);
     $this->upload->do_upload();
     $file = $this->upload->data();
     $link = $file['file_name'];
     $username = $_POST['username'];
     $format = substr($link, -4);
     $link = $username.$format;
     if(!($format == ".JPG" || $format == ".GIF" || $format == ".PNG" || $format == ".jpg" || $format == ".png" || $format == ".gif")) $link = "anonymous.jpg" ;

		     if($link != "anonymous.jpg") { 
		     	copy('./img/temp/'.$link, './img/users/'.$link);
		     	unlink('./img/temp/'.$link);
		     }

	$data = array(
    	'name' => $this->input->post('name'),
		'username' => $this->input->post('username'),
		'password' => $p,
		'fb' => $this->input->post('fb'),
		'aboutme' => nl2br(strtr($this->input->post('content'),$replaces)),
		'emailid' => $this->input->post('emailid'),
		'pic' => $link
	);
	
	return $this->db->insert('users', $data);
	// $format;
}
}

?>