<?php
class Get_username extends CI_Model {

public function get_user($class)
{
        $this->load->database();
        $r="select * from users where username='".$class."'";
        $query=$this->db->query("$r");
       foreach ($query-> result() as $row) {
           return $row->name;
       }
}

}
?>