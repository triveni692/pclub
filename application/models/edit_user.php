
<?php
class Edit_user extends CI_Model {

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

    $db=$this->load->database('default',TRUE);
    $username = $_POST['username'];
    $query='SELECT * from `users` where `username` ="'.$username.'"';
    $query=$db->query($query)->result_array();
    foreach ($query as $key) {
        $p_img=$key['pic'];
    }
    $p_img_name=substr($p_img, 0, -4); 
    $p_img_format = substr($p_img, -4);                             

	$file ="";

	$config['upload_path'] = './img/temp/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size'] = '2048';
    $config['max_width']  = '2048';
    $config['max_height']  = '1300';
    $config['file_name'] = $username;
     
    
	 $this->load->library('upload', $config);
     $this->upload->initialize($config);
     $this->upload->do_upload();
     $file = $this->upload->data();
     $link = $file['file_name'];
     $username = $_POST['username'];
     $format = substr($link, -4);
     $link = $username.$format;
     if(!($format == ".JPG" || $format == ".GIF" || $format == ".PNG" || $format == ".jpg" || $format == ".png" || $format == ".gif")) $link = $p_img ;
     else { if ($p_img_name!="anonymous") {copy("img/temp/".$p_img,"img/users/".$p_img); $file = "img/temp/".$p_img; unlink($file);  }}
     $query='UPDATE  `users` SET  `name` = "'.$this->input->post('name').'" , `password` = "'.$p.'" , `website` = "'.$this->input->post('fb').'" , `aboutme` = "'.nl2br(strtr($this->input->post('content'),$replaces)).'" , `pic` = "'.$link.'" WHERE  `username` ="'.$username.'"';
     return $db->query($query);
}
}

?>
