<?php
  $n=0;
  $o=0; 
  foreach ($anouncements as $key): 
    if($key['flag']=="new") $n=$n+1;
    else $o=$o+1;
  endforeach ?>
<span class="round  secondary label" style=" display: block;margin-left: auto;margin-right: auto;width:50%;">
    Announcements
    </span>
    <div class="row ok" style="margin:0px;">
  <div class="large-12 columns">
    <?php
      if ($n>0) {
         echo "<div style='background-color:#FFFF99;border-radius: 5px;padding-left:3px'><h5><center>Latest</center></h5></div>";
       } 
       foreach ($anouncements as $key): 
    if($key['flag']=="new") {echo "<div style='background-color:#FFFFFF;border-radius: 5px;padding-left:3px;padding-bottom:3px;'><h6><font size=2>".$key['content']."<font></h6><font size=1>".$key['timestamp']."</font></div>";}
    endforeach
    ?>
    <br>
    <?php
      if ($o>0) {
         echo "<div style='background-color:#CCFFFF;border-radius: 5px;padding-left:3px'><h5><center>Older</center></h5></div>";
       } 
       foreach ($anouncements as $key): 
    if($key['flag']=="old") {echo "<div style='background-color:#FFFFFF;border-radius: 5px;padding-left:3px'><h6><font size=2>".$key['content']."</font></h6><font size=1>".$key['timestamp']."</font></div>";}
    endforeach
    ?><br><br><br>
 </div>
</div>
<style>
    .ok {
        width: 100%;
        height: 490px;
        overflow: hidden;
    }
    .ok:hover {
        width: 100%;
        height: 490px;
        overflow-y: scroll;
    }
</style>