                       <!-- What will be the title of each page     and should password and username of phpMYADMIN match?-->
	<?php include('login_essential.php') ;
  foreach($user as $key)
  {
    $user=$key['username'];
    $name=$key['name'] ;
    $email="<font color='red'>User has kept his/her email hidden</font>";//$key['emailid'];
    $website=$key['website'];
    $aboutme=$key['aboutme'];
    $topcoder=$key['topcoder'];
    $spoj=$key['spoj'];
    $codechef = $key['codechef'];
    $onj=$key['onj'];
    $sec_que=$key['seq_que'];
    $pic=$key['pic'];
    $fb=$key['fb'];
    $since=$key['timestamp'];
    $month = array('Jan','Feb', 'March', 'April', 'May', 'June' , 'July', 'Aug', 'Sep', 'Oct' , 'Nov', 'Dec');
    $m = (int)substr($since, 5,2);
    $since = $month[$m-1]." ".substr($since,0,4);
  }
  ?>

  <br><br><br>

  
	<div class="row" style="margin : 0">
  	<div class="large-12 columns">

  	<div>
      <div style="float:left;width:25%;opacity:0;">.</div>
      <div >
        <table width="70%" style="background:rgba(255,255,255,0.0);">
          <tr>
            <td width="20%" valign = "bottom"><img style="height: 60px; width: 50px; box-shadow: rgba(0,0,0,0.2) -10px -10px;" src="<?php echo base_url().'img/users/'.$pic;?>"></td>
            <td valign = "bottom"><u><h4><?php echo $name."'s user profile";?></h4></u></td>
          </tr>
        </table>
      </div>
    </div>

	
	<!---->
  <div class="row">
    <div class="large-2 columns">
      <center id="image"><img style="height:160px; width:150px; border-color:red;"src="<?php echo base_url().'img/users/'.$pic;?>"></center>
      <center style="color:red;"><br><?php echo $user; ?></center><br>
      <center><a href="<?php echo base_url().'iitk/edit/'.$profile ?>" style="display:<?php if($status == $log1 && $username==$profile) echo 'normal'; else echo 'none'; ?>"> <div class="button secondary small">Edit My Profile</div></a></center>
      <center> Member Since: <?php echo $since; ?> </center>      
    </div>

    <div style="border-style:solid;border-color:#98bf21;border-width:1px;border-radius:3px;" class="large-10 columns">
      <!--general-->
      <div  style="text-align:left"><div class="button secondary small">General</div></div>
      
       <div class="row">
        <div class = "large-4 columns" style="height:20px; padding:3px; text-align:right;">Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
        <div class = "large-1 columns">&nbsp;&nbsp;:</div>
        <div class = "large-4 columns"><?php echo $name;?></div>
        <div class = "large-3 columns"></div>      
       </div>
       <br>
       <div class="row">
        <div class = "large-4 columns" style="height:20px; padding:3px; text-align:right;">About Me&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
        <div class = "large-1 columns">&nbsp;&nbsp;:</div>
        <div class = "large-4 columns"><?php echo $aboutme;?></div>
        <div class = "large-3 columns"></div>      
       </div>
       <br>
       <div class="row">
        <div class = "large-4 columns" style="height:20px; padding:3px; text-align:right;">Website&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
        <div class = "large-1 columns">&nbsp;&nbsp;:</div>
        <div class = "large-4 columns"><a href="http://<?php echo $website;?>"><?php echo $website;?></a></div>
        <div class = "large-3 columns"></div>      
       </div>
       <br>
       
       <div style="border-style:solid;border-color:#98bf21;border-width:1px;"></div>
       <!--judges-->
       <div  style="text-align:left"><div class="button secondary small">Judges</div></div>
       <div class="row">
        <div class = "large-4 columns" style="height:20px; padding:3px; text-align:right;">SPOJ Handle&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
        <div class = "large-1 columns">&nbsp;&nbsp;:</div>
        <div class = "large-4 columns"><?php echo $spoj;?></div>
        <div class = "large-3 columns"></div>      
       </div>
       <br>
       <div class="row">
        <div class = "large-4 columns" style="height:20px; padding:3px; text-align:right;">Codechef Handle&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
        <div class = "large-1 columns">&nbsp;&nbsp;:</div>
        <div class = "large-4 columns"><?php echo $codechef;?></div>
        <div class = "large-3 columns"></div>      
       </div>
       <br>
       <div class="row">
        <div class = "large-4 columns" style="height:20px; padding:3px; text-align:right;">Topcoder Handle&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
        <div class = "large-1 columns">&nbsp;&nbsp;:</div>
        <div class = "large-4 columns"><?php echo $topcoder;?></div>
        <div class = "large-3 columns"></div>      
       </div>
       <br>
       <div class="row">
        <div class = "large-4 columns" style="height:20px; padding:3px; text-align:right;">Online Judge Handle&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
        <div class = "large-1 columns">&nbsp;&nbsp;:</div>
        <div class = "large-4 columns"><?php echo $onj;?></div>
        <div class = "large-3 columns"></div>      
       </div>
       <br>

       <div style="border-style:solid;border-color:#98bf21;border-width:1px;"></div>
       <!--onj-->
       <div  style="text-align:left"><div class="button secondary small">ONJ</div></div>
       <div class="row">
        <div class = "large-4 columns" style="height:20px; padding:3px; text-align:right;">Online Judge Rating&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
        <div class = "large-1 columns">&nbsp;&nbsp;:</div>
        <div class = "large-4 columns">0</div>
        <div class = "large-3 columns"></div>      
       </div>
       <br>
       <div class="row">
        <div class = "large-4 columns" style="height:20px; padding:3px; text-align:right;">Online Judge Rank&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
        <div class = "large-1 columns">&nbsp;&nbsp;:</div>
        <div class = "large-4 columns">0</div>
        <div class = "large-3 columns"></div>      
       </div>
       <br>
       <div style="border-style:solid;border-color:#98bf21;border-width:1px;"></div>
       <!--contact-->
       <div  style="text-align:left"><div class="button secondary small">Contact</div></div>
       <div class="row">
        <div class = "large-4 columns" style="height:20px; padding:3px; text-align:right;">Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
        <div class = "large-1 columns">&nbsp;&nbsp;:</div>
        <div class = "large-4 columns"><?php echo $email;?></div>
        <div class = "large-3 columns"></div>      
       </div>
       <br>
       <div class="row">
        <div class = "large-4 columns" style="height:20px; padding:3px; text-align:right;">Facebook Profile&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
        <div class = "large-1 columns">&nbsp;&nbsp;:</div>
        <div class = "large-4 columns"><?php echo '<a href="'.$fb.'">'.$fb."</a>";?></div>
        <div class = "large-3 columns"></div>      
       </div>
       <br>
       
       <div style="border-style:solid;border-color:#98bf21;border-width:1px;"></div>
       <!--Questions Asked-->
       <div  style="text-align:left"><div class="button secondary small">Questions Asked</div></div>
       <?php foreach($question as $key){ 
       if($key['added_as']=="Anonymous") continue;
       if (strlen($key['content'])>50) $key['content'] = substr($key['content'], 0, 47)."...";?>
       <div class="row">
        <div class="large-2 columns"></div>
        <div class="large-10 columns"><ul><li><a href="<?php echo base_url().'forum/problems/'.$key['id'] ;?>"><?php echo $key['content']; ?></a></li></ul></div>
       </div>
       <?php } ?>
       
       <div style="border-style:solid;border-color:#98bf21;border-width:1px;"></div>

       <!--Questions Answered-->
       <div  style="text-align:left"><div class="button secondary small">Questions Answered</div></div>
       <?php for($i=0;$i<$n_q_commented;$i++) {
        if (strlen($q_commented[$i]['content'])>50) $q_commented[$i]['content'] = substr($q_commented[$i]['content'], 0, 47)."...";?>
       <div class="row">
        <div class="large-2 columns"></div>
        <div class="large-10 columns"><ul><li><a href="<?php echo base_url().'forum/problems/'.$q_commented[$i]['id'];?>"><?php echo $q_commented[$i]['content'];?></a></li></ul></div>
       </div>
       <?php } ?>
       
       <div style="border-style:solid;border-color:#98bf21;border-width:1px;"></div>
    </div>

  </div>

  <br>
  <br>
  <font size="2px"><center>!!! End of the content !!!<br>
    Designed and developed by : <font color="blue"><u><a href="<?php echo base_url().'iitk/users/triveni'; ?>" style="color:blue">Triveni</a></u>, <u><a href="<?php echo base_url().'iitk/users/robbins'; ?>" style="color:blue">Robbin</a></u> and <u><a href="<?php echo base_url().'iitk/users/vivkul'; ?>" style="color:blue">Viveka</a></u></font>
  </center></font>
  <br>
      
</div>
</div>

</body>
</html>