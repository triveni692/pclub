
<?php
class Manage_comment extends CI_Model {

	 public function __construct()
 {
  parent::__construct();
 }

public function manage($data)
{
	$db1=$this->load->database('default',TRUE);
	$id=$data['id'];
	$username=$data['username'];
	
	//getting the name of the commenter, I mean finding 'name' corresponding to 'whodid' username
	$x=$db1->query('select * from users where username = "'.$username.'"');
	$e="";
	foreach ($x->result() as $key) {
		$e=$key->name;
	}
	
	//finding comment id from previous comments
	$x=$db1->query('select * from questions where id="'.$id.'"');
	$c=0;
	foreach ($x->result() as $key) {
		$c=$key->comments;
	}
	
	$c=$c+1;
	//updating comment ID or number of comments to that particular question
	$db1->query('update questions set comments='.$c.' where id="'.$id.'"' );

	$db2=$this->load->database('questions',TRUE);
	$table="t_".$id;

	$content=$data['comment'];
	$username=$data['username'];
	$addedas=$data['commentas'];
	if(!($addedas=='Anonymous')) $addedas=$e ;

	//updating table corresponding to that question where comment is made
	$sql = "INSERT INTO ". $table . "( `comment`, `whodid`, `addedas`, `likes`, `report_abuses`) VALUES ( '$content', '$username', '$addedas', 0, 0);";
	$db2->query($sql);

	//now updating users profile
	$db3=$this->load->database('users',TRUE);
	$query=$db3->query("select * from ".$username."_question_commented where id= ".$id."");
	$count=0;
	foreach ($query->result() as $key) {
		$count++;
	}
	if($count==0) $db3->query("INSERT INTO ".$username."_question_commented VALUES (".$id.",CURRENT_TIMESTAMP)");
	else $db3->query("UPDATE  ".$username."_question_commented SET  `timestamp` =  'CURRENT_TIMESTAMP' WHERE  `id` =".$id); 
}
}

?>