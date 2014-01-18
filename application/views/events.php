<span class="round  secondary label" style=" display: block;margin-left: auto;margin-right: auto;width:50%;">
    Comming Events
</span>
<div class="row" style="margin:3px;">
  <div class="large-12 columns ok1">
    <?php foreach ($event as $news_item): 
         echo "<div style='background-color:#FFF8DC;border-radius: 5px'><center><div class='round  secondary label' style='background-color:#FFFF99;border-radius: 5px;padding-left:3px;width:100%'>".$news_item['title']."</div></center>";
         $day=substr($news_item['date'], 8,2);
         $mn=substr($news_item['date'], 5,2);
         $yr=substr($news_item['date'], 0,4);
         if($mn==1) $mn="Jan";
         if($mn==2) $mn="Feb";
         if($mn==3) $mn="March";
         if($mn==4) $mn="Apr";
         if($mn==5) $mn="May";
         if($mn==6) $mn="Jun";
         if($mn==7) $mn="Jul";
         if($mn==8) $mn="Aug";
         if($mn==9) $mn="Sept";
         if($mn==10) $mn="Oct";
         if($mn==11) $mn="Nov";
         if($mn==12) $mn="Dec";
    	 echo "<div style='background-color:#FFFFFF;border-radius: 5px;padding-left:3px;padding-bottom:3px;'><font size=2><h6>".$news_item['description']."</h6></font><font size=2>Come to <em>".$news_item['venue']."</em> at <em>".$news_item['time']."</em> on <em>".$day." ".$mn."</em></font></div></div><br>";
    endforeach
    ?>
 </div>
</div>


<!-- the Scroll script -->

<style>
    .ok1 {
        width: 100%;
        height: 490px;
        overflow: hidden;
    }
    .ok1:hover {
        width: 100%;
        height: 490px;
        overflow-y: scroll;
    }
</style>