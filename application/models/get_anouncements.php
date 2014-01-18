<?php
class Get_anouncements extends CI_Model {

public function get_anouncements()
{
	$n = 10;
	$shift = 16198;
	$recent = 2*24*60*60;	// two days converted to seconds (16198 is just shifting of time to get IST)

	$current = new DateTime();
	$current = $current->getTimestamp();
	$current += $shift;
	
	$db=$this->load->database('default',TRUE);
    $query=$db->query("select * from `anouncements`  order by `timestamp` DESC LIMIT 0,".$n);
    $temp = $query->result_array();

    $i=0;
    foreach ($temp as $key) {
    	$timestamp = strtotime($key['timestamp']);
    	$diff = $current - $timestamp;
    	if($diff <= $recent) $temp[$i]['flag'] = "new";
    	else $temp[$i]['flag'] = "old";
    	//echo "current= ".$current.", timestamp= ".$timestamp.", recent= ".$recent."<br>";
    	if($diff < 60) { $s =""; if($diff!=1) $s = "s"; $t = (int)($diff)." second".$s." ago";}
    	else if($diff < 3600) { $s =""; if($diff!=60) $s = "s"; $t = (int)($diff/60) . " minute".$s." ago";}
    	else if($diff < 24*3600) {$s =""; if($diff!=3600) $s = "s"; $t = (int)($diff/(3600)) ." hour".$s." ago";}
    	else if($diff < 24*3600*30) { $s =""; if($diff!=24*3600) $s = "s";$t = (int)($diff/(24*3600)) . " day".$s." ago";}
    	else if($diff < 24*3600*30*365) {$s =""; if($diff!=24*3600*30) $s = "s"; $t = (int)($diff/(24*3600*30)). " month".$s." ago";}
    	else if($diff < 24*3600*30*365*2) $t = "one year ago";
    	else $t = "more than one year ago";
    	$temp[$i]['timestamp'] = $t;
    	$i++;
    }
    return $temp;
}

}
?>
