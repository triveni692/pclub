<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class  Edit extends CI_Controller {

 function __construct()
 {
   parent::__construct();
      $this->load->model('edit_user');
      $this->load->helper(array('form', 'url'));
 }

 function index()
 {
 	$username=$this->input->post('username');
 	$password=$this->input->post('password');
 	$url=$_POST['url'];
 	$this->edit_user->set_users();
	$data['status']="continue";
	redirect($url,'refresh');
 }

}

?>