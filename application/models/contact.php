<?php
class Contact extends CI_Model {

	public function get_contact_cordi()
{
	 $this -> db -> select('name,pic,phone,address');
   $this -> db -> from('contact');
   $this -> db -> where('post','cordi');
   $this -> db -> order_by('id','DESC');

   $query = $this -> db -> get();

     return $query->result_array();
}
	public function get_contact_seci()
{
	 $this -> db -> select('name,pic,phone,address');
   $this -> db -> from('contact');
   $this -> db -> where('post','seci');
   $this -> db -> order_by('id','DESC');

   $query = $this -> db -> get();

     return $query->result_array();

}

}
?>