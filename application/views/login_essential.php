<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Welcome to P-Club</title>
    <link rel="stylesheet" href="<?php echo base_url()  ?>css/normalize.css" />
    <link rel="stylesheet" href="<?php echo base_url()  ?>css/foundation.css" />
    <link rel="stylesheet" href="<?php echo base_url()  ?>css/index.css" />
    <!-- If you are using the gem version, you need this only -->
    <link rel="stylesheet" href="<?php echo base_url() ?>css/app.css" />
    <link rel="icon" 
      type="image/png" 
      href="<?php echo base_url(); ?>favicon.ico">
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="<?php echo base_url()  ?>js/vendor/custom.modernizr.js"></script>
    <script src="<?php echo base_url()  ?>js/vendor/jquery.js"></script>
    <script src="<?php echo base_url()  ?>js/test.js"></script>
    <link href="<?php echo base_url()  ?>css/js-image-slider.css" rel="stylesheet" type="text/css" />
  <script src="<?php echo base_url()  ?>js/js-image-slider.js" type="text/javascript"></script>

  </head>

  <body style="background: url('<?php echo base_url() ?>img/bin3.png');">
     <?php
      $log="wrong";
/* Any information is displayed here on the top of the page */
      if($status == $log )
        {
          echo "<div data-alert class='alert-box alert radius'>";
          echo "Wrong username or password. Please register yourself before loging in";
          echo "<a href='#' class='close'>&times;</a></div>";
        }
      if(isset($pstatus))
        if($pstatus != "notset")
        {
          if($pstatus == "updated")
            {
              $messege = "your Password updated Successfully !!!";
              echo "<div data-alert class='alert-box success radius'>";
            }
          else
          {
           $messege = "Sorry, Unable to save your pasword. Try agian !!!";
           echo "<div data-alert class='alert-box alert radius'>";
          }
          
          echo "<center>".$messege."</center>";
          echo "<a href='#' class='close'>&times;</a></div>";
        }

        
        if(isset($update))
        {
          if($update == "update")
            {
              $messege = "Welcome to P-Club!!! Please update your account !!!";
              echo "<div data-alert class='alert-box success radius'>";
            }
          
          echo "<center>".$messege."</center>";
          echo "<a href='#' class='close'>&times;</a></div>";
        }

        if(isset($imgupdate))
        {
          if($imgupdate == "updated")
            {
              $messege = "Your Image Updated Successfully !!! If updated image is not visible then please refresh the page!!!";
              echo "<div data-alert class='alert-box success radius'>";
            }
          else{
            $messege = "Sorry, Unable to update Your Photo!!! Please Refresh the page and try Again..,";
            echo "<div data-alert class='alert-box alert radius'>";
          } 
          echo "<center>".$messege."</center>";
          echo "<a href='#' class='close'>&times;</a></div>";
        }

/* end of above statement*/
     ?>
    <div class="row" style="margin : 0"><br>
      <div class="large-2 columns">
        <a href = "<?php echo base_url() ?>home" >
        <img src="<?php echo base_url() ?>img/1lAEW.png" style="height:15%;width:100%;">
        </a>
      </div>
      <div class="large-10 columns">

      <a class="button <?php if($navhead !='home')echo 'secondary'; ?> small" href="<?php echo base_url() ?>home">Home</a>
      <a class="button <?php if($navhead !='tutorial')echo 'secondary'; ?> small" href="<?php echo base_url() ?>home/tutorial">Tutorial</a>
      <a class="button <?php if($navhead !='project')echo 'secondary'; ?> small" href="<?php echo base_url() ?>home/project">Projects</a>
      <a class="button <?php if($navhead !='achivement')echo 'secondary'; ?> small" href="<?php echo base_url() ?>home/achivement">Achivements</a>
      <a class="button <?php if($navhead !='contact')echo 'secondary'; ?> small" href="<?php echo base_url() ?>home/contact">Contact</a>
      <a href="<?php echo base_url('forum'); ?>" class="button <?php if($navhead !='forum')echo 'secondary'; ?> small">Forum</a>
      <a href="http://www.pclub.in/onj" target="_blank" class="button <?php if($navhead !='online')echo 'secondary'; ?> small">Online<font style="visibility:hidden">_</font>Judge</a>

        <ul class="breadcrumbs" style="float:right;">
          <li>
            <?php
              $log = "logout";
              $log1="login";
              $log2 ="wrong";
              if($status==$log || $status == $log2 )
                  echo "  <a href='#' data-reveal-id='myModal'>
                          <font class='font' color='black' style='opacity:0.6'>
                          Login</font></a></li>";
              else {
                echo "<a href='".base_url()."iitk/users/".$username."'>";
                echo  "<font class='font' color='black'>
                      $username</font> </a></li>";
                }
            ?> 
          <li>
            <?php
              $log = "logout";
              $log1="login";
              $log2 ="wrong";
              if($status==$log || $status == $log2)
                echo "  <a href='#' data-reveal-id='myModal1'>
                <font class='font' color='black' style='opacity:0.6'>Register
                </font></a></li>";
              else {
                echo "<a href='".base_url()."home/logout'>
                <font class='font' color='black' style='opacity:0.6'>Logout
                </font></a></li>";
              }
            ?>
        </ul>
      </div>
    </div>
    <br>
   <script>
      document.write('<script src=' +
      ('__proto__' in {} ? 'js/vendor/zepto' : 'js/vendor/jquery') +
      '.js><\/script>')
    </script>
    <script src="<?php echo base_url() ;?>js/foundation/foundation.js"></script>
    <script src="<?php echo base_url() ;?>js/foundation/foundation.alerts.js"></script>
    <script src="<?php echo base_url() ;?>js/foundation/foundation.clearing.js"></script>
    <script src="<?php echo base_url() ;?>js/foundation/foundation.cookie.js"></script>
    <script src="<?php echo base_url() ;?>js/foundation/foundation.dropdown.js"></script>
    <script src="<?php echo base_url() ;?>js/foundation/foundation.forms.js"></script>
    <script src="<?php echo base_url() ;?>js/foundation/foundation.joyride.js"></script>
    <script src="<?php echo base_url() ;?>js/foundation/foundation.magellan.js"></script>
    <script src="<?php echo base_url() ;?>js/foundation/foundation.orbit.js"></script>
    <script src="<?php echo base_url() ;?>js/foundation/foundation.placeholder.js"></script>
    <script src="<?php echo base_url() ;?>js/foundation/foundation.reveal.js"></script>
    <script src="<?php echo base_url() ;?>js/foundation/foundation.section.js"></script>
    <script src="<?php echo base_url() ;?>js/foundation/foundation.tooltips.js"></script>
    <script src="<?php echo base_url() ;?>js/foundation/foundation.topbar.js"></script>
    <script src="<?php echo base_url() ;?>js/foundation/foundation.interchange.js"></script>
    <script>
      $(document).foundation();


      $('body').css('background-image', 'url(<?php echo base_url() ?>img/new.png")');
      function validateLoginForm()
      {
        var x=document.forms['loginForm']['username'].value;
        var flag=true;
        if(x==null||x==""||x=="admin") 
        {
          $("#loginform_username").addClass("error");
          flag=false;
        }
        else $("#loginform_username").removeClass("error");
        x=document.forms['loginForm']['password'].value;
        if(x.length<3)
        {
          $("#loginform_pwd").addClass("error");
          flag=false;
        }
        else $("#loginform_pwd").removeClass("error");
        if(!flag) document.getElementById("login_error_info").innerHTML="* invalid form submission";
        //$("#login_error_info").addClass("error");
        return flag;
      }
      function validateSignUpForm()
      {
        var x = document.getElementById('availibility').innerHTML;
        if(!(x=='<font color="green">available</font>')) return false;
        var x=document.forms['signupForm']['username'].value;
        var flag=true;
        if(x==null||x==""||x=="anonymous"||x=="admin")
        {
          $("#signupform_username").addClass("error");
          flag=false;
        }
        else $("#signupform_username").removeClass("error");

        x=document.forms['signupForm']['name'].value;
        if(x==null||x==""||x=="Anonymous") 
        {
          $("#signupform_name").addClass("error");
          flag=false;
        }
        else $("#signupform_name").removeClass("error");

        x=document.forms['signupForm']['password'].value;
        if(x.length<6)
        {
          $("#signupform_pwd").addClass("error");
          flag=false;
        }
        else $("#signupform_pwd").removeClass("error");

         x=document.forms['signupForm']['emailid'].value;
        if(x==null || x=="")
        {
          $("#signupform_email").addClass("error");
          flag=false;
        }
        else $("#signupform_email").removeClass("error");
        if(!flag) document.getElementById("signup_error_info").innerHTML="* invalid form submission";
        //$("#login_error_info").addClass("error");
        return flag;
      }

      function validateReportAbuse()
      {
        var x=document.forms['report_abuse']['content'].value;
        var flag=true;
        if(x==null||x=="") 
        {
          $("#report_abuse").addClass("error");
          flag=false;
        }
        else $("#report_abuse").removeClass("error");
        if(!flag) document.getElementById("report_error_info").innerHTML="* Help us making your experience better";
        return flag;       
      }
      $(document).ready(function(){
        var x=document.getElementById('url');
        x.value=location;
        var x=document.getElementById('url1');
        x.value=location;
      });

      
      function check_availibility()
      {
        var x = document.getElementById('signupform_username').value;
        $("#availibility").load('<?php echo base_url();?>iitk/check_username/'+x);
      }
      function clear_error()
      {
        var x = document.getElementById('availibility').innerHTML = "";
      }
      function forgot_password(x)
      {
        if(x=='log_form') {
          y='reset_pass';
          $("#answer_seq_que").hide();
          $("#username_get_que").show();
          document.getElementById('loading').innerHTML="";
          document.getElementById('anything').value ="";
        }
        else y='log_form';
        $("#"+x).hide();
        $("#"+y).show();
      }
      $(document).ready(function(){
        $("#get_question").click(function(){
          var URL = '<?php echo base_url();?>iitk/verify_username/'+$("#us").val();
          $("#loading").load(URL);
          $("#username_get_que").hide();
          document.getElementById('loading').innerHTML = "Loading....";
          $("#answer_seq_que").show();           
        });        
      });
    function check_(x)
    {
      if(x == 'ans_seq_que')
      {
        $("#sq").show();
        $("#em").hide();
      }
      else if(x== 'email_pwd')
      {
        $("#em").show();
        $("#sq").hide();
      }
    }
    function validate()
    {
      var x=document.getElementById('loading').innerHTML ;
      if(x=='<font color="red">invalid username</font>')
      {
        document.getElementById('loading').innerHTML ="";
        document.getElementById('anything').value ="";
        $('#answer_seq_que').hide();
        $('#username_get_que').show();
        $('#us').value="";
        return false;
      } 
      if($('#anything').val()=="") return false;
      return true;
    }

    </script>
    <div class="row">
      <div class="large-3 columns">
      </div>
      <div class="large-6 large-centered columns">
        <div id="myModal" class="reveal-modal">
          <form name="loginForm" action="<?php echo base_url(); ?>verifylogin" method="POST" onsubmit="return validateLoginForm()" id="log_form">
            <fieldset style="height:252px">
              <legend id="legend">Login to Continue</legend>

                  <div class="row">
                    <div class="large-8 columns">
                        <label>Login Id</label>
                        <input id="loginform_username" type="text" placeholder="Enter login Id" name="username">
                    </div>
                  </div>

                  <div class="row">
                    <div class="large-8 columns">
                        <label>Password</label>
                        <input id= "loginform_pwd" type="password" placeholder="Enter your password" name="password">
                    </div>
                  </div>


                  <input id= "url" value="url" name="url" style="display:none;">                   

              <button id="loginn_button">Login</button>
              <div style="float:right;margin-top:12px;color:#FF6600;cursor:pointer;" onclick="forgot_password('log_form')" id="fp">Forgot Password</div>
              <font color="red"> <div id="login_error_info" class="error"></div></font>
            </fieldset>
          </form>
          <div id="reset_pass" style="display:none;">
            <fieldset style="height:252px">
              <legend>Reset Password</legend>
                <input type="radio" name="xxx" id="ans_seq_que" checked="checked" onclick="check_('ans_seq_que')">Let me Answer Security Question<br>
                <input type="radio" name="xxx" id="email_pwd" onclick="check_('email_pwd')">Email Me My Password
                <hr>
                <div  id="sq"><form action="<?php echo base_url();?>iitk/forgot_pwd_sq" method="POST" onsubmit="return validate()">
                  <div id="loading"></div>
                  <div id="username_get_que"><input placeholder="Username" type="text" id="us" name="username"><input class="small success button" style="width:120px;padding:2px;" value="Get Question" id="get_question"></div>
                  <div id="answer_seq_que" style="display:none;"><input name="ans" placeholder="Answer" type="password" id="anything"> <input type="submit" class="small success button" style="width:120px;padding:2px;" value="submit" id="submit_form"></div>
                  <font color="#FF6600" id="cancel" style="cursor:pointer;float:right;" onclick="forgot_password('reset_pass')" valign="bottom" >Cancel</font>
                </form></div>
                <div id="em" style="display:none;"><form action="<?php echo base_url();?>iitk/forgot_pwd_em" method="POST">
                  <input type="text" placeholder="username" name="username">
                  <input type="email" placeholder="email" name="email">
                  <input type="submit" class="small success button" style="padding:2px;" value="Send">
                  <font color="#FF6600" id="cancel" style="cursor:pointer;float:right;" onclick="forgot_password('reset_pass')" valign="bottom" >Cancel</font>
                </form></div>
              
            </fieldset>
          </div>
          <a class="close-reveal-modal">&#215;</a>
        </div>
      </div>
      <div class="large-3 columns">
      </div>
    </div>
    <div class="row" >
      <div class="large-2 columns">
      </div>
      <div class="large-8 large-centered columns">
        <div id="myModal1" class="reveal-modal">
          <form name="signupForm" action="<?php echo base_url();?>create"  method= "POST" onsubmit="return validateSignUpForm()" enctype="multipart/form-data">
            <fieldset>
              <legend>Register Here</legend>
              <div class="row">
                <div class="large-8 columns">
                  <label><font color="red">*</font>Login Id</label>
                  <input id="signupform_username" type="text" placeholder="Enter login Id" name="username"  onblur="check_availibility()" onfocus="clear_error()">
                </div>
                <br>
                <div id="availibility" class="large-4 columns"></div>
              </div>

              <div class="row">
                <div class="large-8 columns">
                  <label><font color="red">*</font>Name</label>
                  <input id="signupform_name" type="text" placeholder="Enter Your Name" name="name">
                </div>
              </div>

              <div class="row">
                <div class="large-8 columns">
                  <label><font color="red">*</font>Password(minimum 6 characters)</label>
                  <input id="signupform_pwd" type="password" placeholder="Enter your password" name="password">
                </div>
              </div>

              <div class="row">
                <div class="large-8 columns">
                    <label>About Me</label>
                <input placeholder="student, IITK" name="content" id="about_me" type="text">
              </div>
              </div>

              <div class="row">
                <div class="large-8 columns">
                  <label><font color="red">*</font>Email Id</label>
                  <input id="signupform_email" type="email" placeholder="Enter your email id" name="emailid">
                </div>
              </div>

              <div class="row">
                <div class="large-8 columns">
                  <label>Facebook Contact</label>
                  <input id="signupform_fb" type="url" placeholder="e.g. https://www.facebook.com/triveni.mahatha" name="fb">
                </div>
              </div>

              <div class="row">
                <div class="large-8 columns">
                    <label>Your Picture(jpg/png/gif only)</label>
                    <input class="tiny round disabled button" name="userfile" type="file" size="20" />
                </div>
                
              </div>


              <input id= "url1" value="url" name="url" style="display:none;">

              <button>Register</button>

              <font color="red"> <div id="signup_error_info" class="error"></div>
              Note : fields marked '*' are mandatory to fill</font>
            </fieldset>
          </form>
          <a class="close-reveal-modal">&#215;</a>
        </div>
      </div>
      <div class="large-2 columns">
      </div>
    </div>

