<?php
class Fetch_questions extends CI_Model {

public function __construct()
 {
  parent::__construct();
 }

    function fetch($id,$d)
    {
    	//echo $id;
    	$db1=$this->load->database('default',TRUE);
    	$query=$db1->query("select * from questions where id='$id'")->result_array();

        $i=0;
        foreach ($query as $key) {
            $i=$i+1;
        }
        if($i==0) return "error";

        $data['category']= $query;

        /*added*/           foreach ($query as $key) {
                                $q_asker = $key['added_by'];
                            }

                            $x = $db1->query("SELECT * from `users` where `username` = '".$q_asker."'")->result_array();
                            $q_pic = "";
                            foreach ($x as $key) {
                               $q_pic=$key['pic'];
                            }
                            $data['q_pic']=$q_pic;

        $db2=$this->load->database('questions',TRUE);
        $table="t_"."$id";
        $query=$db2->query("select * from ".$table)->result_array();
        $data['comments']=$query;

                            $pic_array  = array();
                            $db1=$this->load->database('default',TRUE);
                            foreach ($query as $key) {
                                $c_asker = $key['whodid'] ;
                                $q = "SELECT `pic` FROM `users` where `username` = '".$c_asker."'";
                                $qq = $db1->query($q)->result_array();
                                foreach ($qq as $keyy) {
                                    $pic_array[$c_asker] = $keyy['pic'];
                                }
                            }
                            $data['c_pic'] = $pic_array ;
                            
        $data['status']=$d['status'];
        if($d['status']=='login') $data['username']=$d['username'];

        $db3= $this->load->database('users',TRUE);
        if($d['status']=='login')
        {

            $query= "select * from `".$d['username']."_questions_reported` where `id` like '".$id."'" ;
            $query=$db3->query($query);
            $query=$query->result_array();
            if($query) return "error";
            

            $query= "select * from `".$d['username']."_comments_likes` where `id` like '".$id."%'" ;
            $query=$db3->query($query);
            $data['c_likes'] = $query->result_array() ;

            $query= "select * from `".$d['username']."_question_likes` where `id` like '".$id."'" ;
            $query=$db3->query($query);
            $query=$query->result_array();

            $i=0;
            foreach ($query as $key) {
                $i++;
            }
            if($i>0)$data['q_like'] = "Unlike";
            else  $data['q_like'] = "Like";
        }
        
        return $data;
       
    }

    function report($id,$data)
    {
        $db = $this->load->database('users',TRUE);
        $table = $data['username']."_comments_reported";
        $query = "SELECT `id` from `".$table."` where `id` like '".$id."%'" ;
        $query = $db->query($query)->result_array();

        $data['c_reports'] = $query;
        return $data ;
    }  
}

?>
