                       <!-- What will be the title of each page     and should password and username of phpMYADMIN match?-->
<?php include('login_essential.php') ;
  foreach($user as $key)
  {
    $user=$key['username'];
    $name=$key['name'] ;
    $pwd=$key['password'];
    $email=$key['emailid'];
    $website=$key['website'];
    $aboutme=$key['aboutme'];
    $topcoder=$key['topcoder'];
    $spoj=$key['spoj'];
    $codechef = $key['codechef'];
    $onj=$key['onj'];
    $sec_que=$key['seq_que'];
    $pic=$key['pic'];
    $fb=$key['fb'];
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
            <td valign = "bottom" id="header_name"><u><h4><?php echo $name."'s user profile";?></h4></u></td>
          </tr>
        </table>
        
      </div>
    </div>
		<!---->
    
  <div class="row">
    <div class="large-2 columns">
      <center id="image"><img style="height:160px; width:150px; border-color:red;"src="<?php echo base_url().'img/users/'.$pic;?>"></center>
      <center style="color:red;"><br><?php echo $username; ?></center>
      <br>
      <center><div id="change_your_photo" class="tiny round button">Change your Photo</div></center>
        <?php echo form_open_multipart('iitk/change_photo');?>          
          <input id="change_your_photo_button" style="display:none;" name="userfile" type="file" size="20"/>
          <center><input style="display:none;" class="tiny round button" id="photo_preview" value="Preview"></center>
          <center><input type="submit" style="display:none;" class="tiny round button" id="photo_submit" value="Save"></center>
          <input style="display:none" value="<?php echo $username; ?>" name="username">
        </form>
    </div>

  	<div style="border-style:solid;border-color:#98bf21;border-width:1px;border-radius:3px;margin-left:0px;" class="large-10 columns">
      <!--general-->
      <div  style="text-align:left"><div class="button secondary small">General</div></div>
      <form method="POST" id="general" action =''>
  	   <div class="row">
        <div class = "large-4 columns" style="height:20px; padding:3px; text-align:right;">Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
        <div class = "large-1 columns">&nbsp;&nbsp;:</div>
        <div class = "large-4 columns"><input type="text" id="name" value="<?php echo $name;?>"></div>
        <div class = "large-3 columns" id="name_error" style="float:right;color:red;display:none;">*invalid form submission</div>      
       </div>
       
       <div class="row">
        <div class = "large-4 columns" style="height:20px; padding:3px; text-align:right;">About Me&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
        <div class = "large-1 columns">&nbsp;&nbsp;:</div>
        <div class = "large-4 columns"><input type="text" id="aboutme" value="<?php echo $aboutme;?>"> </div>
        <div class = "large-3 columns"></div>      
       </div>
       
       <div class="row">
        <div class = "large-4 columns" style="height:20px; padding:3px; text-align:right;">Website&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
        <div class = "large-1 columns">&nbsp;&nbsp;:</div>
        <div class = "large-4 columns"><input type="text" id="website" value="<?php echo $website;?>"> </div>
        <div class = "large-3 columns"></div>      
       </div>
       <input type="submit" class="button success small" id="g_submit" value="Save">
      </form>
       <div style="border-style:solid;border-color:#98bf21;border-width:1px;"></div>
       <!--judges-->
      <form method="post" action="" id="judges">
       <div  style="text-align:left"><div class="button secondary small">Judges</div></div>
       <div class="row">
        <div class = "large-4 columns" style="height:20px; padding:3px; text-align:right;">SPOJ Handle&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
        <div class = "large-1 columns">&nbsp;&nbsp;:</div>
        <div class = "large-4 columns"><input type="text" id="spoj" value="<?php echo $spoj;?>"> </div>
        <div class = "large-3 columns"></div>      
       </div>
       
       <div class="row">
        <div class = "large-4 columns" style="height:20px; padding:3px; text-align:right;">Codechef Handle&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
        <div class = "large-1 columns">&nbsp;&nbsp;:</div>
        <div class = "large-4 columns"><input type="text" id="codechef" value="<?php echo $codechef; ?>"> </div>
        <div class = "large-3 columns"></div>      
       </div>
       
       <div class="row">
        <div class = "large-4 columns" style="height:20px; padding:3px; text-align:right;">Topcoder Handle&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
        <div class = "large-1 columns">&nbsp;&nbsp;:</div>
        <div class = "large-4 columns"><input type="text" id="topcoder" value="<?php echo $topcoder;?>"> </div>
        <div class = "large-3 columns"></div>      
       </div>
       
       <div class="row">
        <div class = "large-4 columns" style="height:20px; padding:3px; text-align:right;">Online Judge Handle&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
        <div class = "large-1 columns">&nbsp;&nbsp;:</div>
        <div class = "large-4 columns"><input type="text" id="onj" value="<?php echo $onj;?>"> </div>
        <div class = "large-3 columns"></div>      
       </div>
       <input type="submit" class="button success small" id="j_submit" value="Save">
      </form>

       <div style="border-style:solid;border-color:#98bf21;border-width:1px;"></div>
       
       <!--contact-->
      <form method="POST" action="" id="contact">
       <div  style="text-align:left"><div class="button secondary small">Contact</div></div>
       <div class="row">
        <div class = "large-4 columns" style="height:20px; padding:3px; text-align:right;">Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
        <div class = "large-1 columns">&nbsp;&nbsp;:</div>
        <div class = "large-4 columns"><input type="email" id="email" value="<?php echo $email;?>"> </div>
        <div class = "large-3 columns"></div>      
       </div>

       <div class="row">
        <div class = "large-4 columns" style="height:20px; padding:3px; text-align:right;">Facebook Profile&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
        <div class = "large-1 columns">&nbsp;&nbsp;:</div>
        <div class = "large-4 columns"><input type="text" id="fb" value="<?php echo $fb;?>"> </div>
        <div class = "large-3 columns"></div>      
       </div>
       <input type="submit" class="button success small" id="c_submit" value="Save">
      </form>
       
       <div style="border-style:solid;border-color:#98bf21;border-width:1px;"></div>
       <!--change password-->
       
       <div  style="text-align:left" id="changepwd"><div class="button secondary small">Change Password</div></div>
       <form action="<?php echo base_url().'iitk/change_password';?>" method="POST" onsubmit="return changePassword()" name="CP">
       <div class="row">
        <div class = "large-4 columns" style="height:20px; padding:3px; text-align:right;">Old Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
        <div class = "large-1 columns">&nbsp;&nbsp;:</div>
        <div class = "large-4 columns"><input type="password" value="" name="old_pwd" id="old_password" onblur = "check_password()"> </div>
        <div class = "large-3 columns"><div id="error1"></div></div>      
       </div>

       <div class="row">
        <div class = "large-4 columns" style="height:20px; padding:3px; text-align:right;">Enter New Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
        <div class = "large-1 columns">&nbsp;&nbsp;:</div>
        <div class = "large-4 columns"><input type="password" value="" name="new_pwd" id="new_password" onblur = "validate_password()"> </div>
        <div class = "large-3 columns"><div id="error2"></div></div>      
       </div>

       <div class="row">
        <div class = "large-4 columns" style="height:20px; padding:3px; text-align:right;">Confirm New Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
        <div class = "large-1 columns">&nbsp;&nbsp;:</div>
        <div class = "large-4 columns"><input type="password" value="" name="c_new_pwd" id="confirm_new_password" onblur = "confirm_password()"> </div>
        <div class = "large-3 columns"><div id="error3"></div></div>      
       </div>

       <input type="submit" class="button success small" id="p_submit" value="Save">
      </form>

      <div style="border-style:solid;border-color:#98bf21;border-width:1px;"></div>

      <!--security question-->
      <div  style="text-align:left"><div class="button secondary small">Security Question</div></div>
      <form action="" method= "POST" id="">
       <div class="row">
        <div class = "large-4 columns" style="height:20px; padding:3px; text-align:right;">Security Question&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
        <div class = "large-1 columns">&nbsp;&nbsp;:</div>
        <div class = "large-4 columns"><input type="text" id="seq_que" value="<?php echo $sec_que; ?>"> </div>
        <div class = "large-3 columns"></div>      
       </div>
        
       <div class="row">
        <div class = "large-4 columns" style="height:20px; padding:3px; text-align:right;">Answer to Above Question&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
        <div class = "large-1 columns">&nbsp;&nbsp;:</div>
        <div class = "large-4 columns"><input type="password" value="" id="seq_ans"> </div>
        <div class = "large-3 columns"><div class="button secondary small" id="toggle">Show</div></div>      
       </div>     
       <input type="submit" class="button success small" id="s_submit" value="Save">
       </form>

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
       <!--Questions Asked-->
       <div  style="text-align:left"><div class="button secondary small">Questions Asked</div></div>

       <div class="row">
        <div class="large-1 columns"><ul></ul></div>
        <div class="large-2 columns"><u><b>Asked As</b></u></div>
        <div class="large-2 columns"><u><b>Timestamp</b></u></div>
        <div class="large-7 columns"><u><b>Content</b></u></div>
       </div>
       <br>
       <?php foreach($question as $key) {
        if (strlen($key['content'])>50) $key['content'] = substr($key['content'], 0, 47)."...";?>
       <div class="row">
        <div class="large-1 columns"><ul></ul></div>
        <div class="large-2 columns"><ul><li><?php echo $key['added_as'];?></li></ul></div>
        <div class="large-2 columns"><?php echo $key['timestamp'];?></div>
        <div class="large-7 columns"><a href="<?php echo base_url().'forum/problems/'.$key['id']; ?>"><?php echo $key['content'];?></a></div>
       </div>
       <?php } ?>

       <div style="border-style:solid;border-color:#98bf21;border-width:1px;"></div>
       <!--Questions Liked-->
       <div  style="text-align:left"><div class="button secondary small">Questions Liked</div></div>

       <div class="row">
        <div class="large-1 columns"><ul></ul></div>
        <div class="large-2 columns"><u><b>Asked By</b></u></div>
        <div class="large-2 columns"><u><b>Timestamp</b></u></div>
        <div class="large-7 columns"><u><b>Content</b></u></div>
       </div>
       <br>
       <?php for($i=0;$i<$n_q_liked;$i++) {
        if (strlen($q_liked[$i]['content'])>50) $q_liked[$i]['content'] = substr($q_liked[$i]['content'], 0, 47)."...";?>
       <div class="row">
        <div class="large-1 columns"><ul></ul></div>
        <div class="large-2 columns"><ul><li><?php if($q_liked[$i]['added_as']=='Anonymous') echo $q_liked[$i]['added_as']; 
                                                  else echo '<a href="'.base_url().'iitk/users/'.$q_liked[$i]['added_by'].'">'.$q_liked[$i]['added_as'].'</a>';?></li></ul></div>
        <div class="large-2 columns"><?php echo $q_liked[$i]['timestamp']; ?></div>
        <div class="large-7 columns"><a href="<?php echo base_url().'forum/problems/'.$q_liked[$i]['id']; ?>"><?php echo $q_liked[$i]['content']; ?></a></div>
       </div>
       <?php } ?>

       <div style="border-style:solid;border-color:#98bf21;border-width:1px;"></div>
       <!--Questions Commented-->
       <div  style="text-align:left"><div class="button secondary small">Que Commented</div></div>

       <div class="row">
        <div class="large-1 columns"><ul></ul></div>
        <div class="large-2 columns"><u><b>Commented As</b></u></div>
        <div class="large-2 columns"><u><b>Total Comments</b></u></div>
        <div class="large-7 columns"><u><b>Question</b></u></div>
       </div>
       <br>
       <?php for($i=0;$i<$n_q_commented;$i++) {
        if (strlen($q_commented[$i]['content'])>50) $q_commented[$i]['content'] = substr($q_commented[$i]['content'], 0, 47)."...";?>
       <div class="row">
        <div class="large-1 columns"><ul></ul></div>
        <div class="large-2 columns"><ul><li><?php if($q_commented[$i]['added_as']=='Anonymous') echo $q_commented[$i]['added_as']; 
                                                  else echo '<a href="'.base_url().'iitk/users/'.$q_commented[$i]['added_by'].'">'.$q_commented[$i]['added_as'].'</a>';?></li></ul></div>
        <div class="large-2 columns"><?php echo $q_commented[$i]['comments']; ?></div>
        <div class="large-7 columns"><a href="<?php echo base_url().'forum/problems/'.$q_commented[$i]['id']; ?>"><?php echo $q_commented[$i]['content']; ?></a></div>
       </div>
       <?php } ?>

       <div style="border-style:solid;border-color:#98bf21;border-width:1px;"></div>
       <!--Comments Liked-->
       <div  style="text-align:left"><div class="button secondary small">Comments Liked</div></div>

       <div class="row">
        <div class="large-1 columns"><ul></ul></div>
        <div class="large-2 columns"><u><b>Commented By</b></u></div>
        <div class="large-1 columns"><u><b>Que-ID</b></u></div>
        <div class="large-1 columns"><u><b>Comnt-ID</b></u></div>
        <div class="large-7 columns"><u><b>Comment</b></u></div>
       </div>
       <br>
       <?php for($i=0;$i<$n_c_liked;$i++) {
          if (strlen($c_liked[$i]['content'])>50) $c_liked[$i]['content'] = substr($c_liked[$i]['content'], 0, 47)."...";?>     <div class="row">
        <div class="large-1 columns"><ul></ul></div>
        <div class="large-2 columns"><ul><li><?php if($c_liked[$i]['added_as']=='Anonymous') echo $c_liked[$i]['added_as']; 
                                                  else echo '<a href="'.base_url().'iitk/users/'.$c_liked[$i]['added_by'].'">'.$c_liked[$i]['added_as'].'</a>';?></li></ul></div>
        <div class="large-1 columns"><a href="<?php echo base_url().'forum/problems/'.$c_liked[$i]['q_id']; ?>"><?php echo $c_liked[$i]['q_id']; ?></a></div>
        <div class="large-1 columns"><?php echo $c_liked[$i]['c_id']; ?></div>
        <div class="large-7 columns"><a href="<?php echo base_url().'forum/problems/'.$c_liked[$i]['q_id'].'#c_'.$c_liked[$i]['c_id']; ?>"><?php echo $c_liked[$i]['content']; ?></a></div>
       </div>
       <?php } ?>
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
<script>
      $(function() {

        $("#change_your_photo").click(function(){
          $("#change_your_photo_button").click();
          $("#photo_preview").show();
          $("#photo_submit").hide();
        });

        $("#photo_preview").click(function(){
          var x = $("#change_your_photo_button").val();
          document.getElementById('image').innerHTML = "<img src = '"+x+"'><br>"+x ;
          $("#photo_submit").show();
          $("#photo_preview").hide();
        });
        //security question toggling
        $("#toggle").click(function(){
          var x = document.getElementById('seq_ans');
          var z = document.getElementById('toggle');
          var y = z.innerHTML;
          if(y == "Hide") {x.type = "password"; z.innerHTML = "Show" ;}
          else{ x.type = "text";  z.innerHTML = "Hide";}

        });
        //updating general profile
        $("#g_submit").click(function() {
          $("#name_error").hide();
          var name,aboutme,website;
          name=$("#name").val();
          if(name == "" || name==null) { $("#name_error").show(); return false;}
          aboutme=$("#aboutme").val();
          website=$("#website").val();
          var  dataString = 'name='+ name + '&aboutme=' + aboutme + '&website=' + website;
          var url = "<?php echo base_url();?>iitk/general";
    
            $.ajax({
              type: "POST",
              url: url,              
              data: dataString,
              success: function() {
                var x= document.getElementById('header_name');
                x.innerHTML = "<u><h4>"+name+"'s user profile</h4></u>";
                alert("Updated Successfully");
              }
            });
            return false;
        });
        //updating judges

        $("#j_submit").click(function() {
          var spoj = $("#spoj").val();
          var codechef = $("#codechef").val();
          var topcoder = $("#topcoder").val();
          var onj = $("#onj").val();
          var  dataString = 'spoj='+ spoj + '&codechef=' + codechef + '&topcoder=' + topcoder + '&onj=' + onj;
          var url = "<?php echo base_url();?>iitk/judges";
    
            $.ajax({
              type: "POST",
              url: url,              
              data: dataString,
              success: function() {
                alert("Updated Successfully");
              }
            });
            return false;
        });
        //contact details

        $("#c_submit").click(function() {
          var email = $("#email").val();
          var fb = $("#fb").val();
          
          var  dataString = 'email='+ email + '&fb=' + fb;
          var url = "<?php echo base_url();?>iitk/contact";
    
            $.ajax({
              type: "POST",
              url: url,              
              data: dataString,
              success: function() {
                alert("Updated Successfully");
              }
            });
            return false;
        });

        //security question
        $("#s_submit").click(function() {
          var seq_que = $("#seq_que").val();
          var seq_ans = $("#seq_ans").val();
          
          var  dataString = 'seq_que='+ seq_que + '&seq_ans=' + seq_ans;
          var url = "<?php echo base_url();?>iitk/security";
    
            $.ajax({
              type: "POST",
              url: url,              
              data: dataString,
              success: function() {
                document.getElementById('seq_ans').value= "";
                alert("Updated Successfully");
              }
            });
            return false;
        });

        //check  password


      });
      function check_password()
      {
        var x = document.getElementById('old_password').value;
        $("#error1").load('<?php echo base_url();?>iitk/check_password/'+x);
      }
      function validate_password()
      {
        var x = document.getElementById('new_password').value;
        if(x.length < 6 || x.length > 15)   document.getElementById('error2').innerHTML = "<font color='red'>*invalid(password should be longer than 5 chars and shorter than 15 chars)</font>";
        else document.getElementById('error2').innerHTML = "<font color='green'>*Valid password</font>";        
      }
      function confirm_password()
      {
        var x = document.getElementById('new_password').value;
        var y = document.getElementById('confirm_new_password').value;
        if(x != y) {document.getElementById('confirm_new_password').value ="";  document.getElementById('error3').innerHTML = "<font color='red'>*please re-enter the password</font>";}
        else document.getElementById('error3').innerHTML = "<font color='green'>*Password Matched</font>";        
      }
      function changePassword()
      {
        var x=document.getElementById('error1').innerHTML ;
        var y= '<font color="green">*correct</font>';
        if(x != y) { $("#old_password").addClass('error'); return false;}
        else $("#old_password").removeClass('error');

        var x=document.forms['CP']['new_pwd'].value;
        if(x.length > 15 || x.length <6) {$("#new_password").addClass('error'); return false;}
        else $("#new_password").removeClass('error');
        
        var y=document.forms['CP']['c_new_pwd'].value;
        if(x!=y) {$("#confirm_new_password").addClass('error'); return false;}
        else $("#confirm_new_password").removeClass('error');

        return true;
      }
      //change profile photo
    </script>

</html>