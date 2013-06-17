<html>
<head>
  <head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" />
  <title>Welcome to P-Club</title>
<style>#canvas { background:url(img/back.png) }</style>
  <!-- If you are using CSS version, only link these 2 files, you may add app.css to use for your overrides if you like. -->
  <link rel="stylesheet" href="css/normalize.css" />
  <link rel="stylesheet" href="css/foundation.css" />
 <link rel="stylesheet" href="css/index.css" />
  <!-- If you are using the gem version, you need this only -->
  <link rel="stylesheet" href="css/app.css" />

  <script src="js/vendor/custom.modernizr.js"></script>
  <script src="js/vendor/jquery.js"></script>

</head>
<body>
 <canvas id="canvas" style="position:absolute; left:0px; top:0px" height="0px" width="0px";opacity:0.7;></canvas>
   <script src="js/test.js"></script>
   <div class="row" style="margin : 0">
  <div class="large-6 columns"><span class="secondary label"><h1 class="subheading">P-CLUB</h1></span></div>
  <div class="large-6 columns">
<ul class="inline-list" style="float:right;">
  <li><a href="#" data-reveal-id="myModal">Login</a></li>
  <li><a href="#" data-reveal-id="myModal1">Register</a></li>
</ul>

  </div>
</div>
<div id="sticky-anchor"></div>
<div id="sticky">
<ul class="button-group radius even-8">
  <li><a href="#" class="button">Home</a></li>
  <li><a href="#" class="button">Tutorial</a></li>
  <li><a href="#" class="button">Projects</a></li>
  <li><a href="#" class="button">Achivements</a></li>
  <li><a href="#" class="button">Contact</a></li>
  <li><a href="#" class="button">Forum</a></li>
  <li><a href="#" class="button">Online Judge</a></li>
  <li><a href="http://localhost/PCLUB/admin.php" class="button" target="_blank">Admin Login</a></li>
</ul>

</div>
<hr>






   <script>
  document.write('<script src=' +
  ('__proto__' in {} ? 'js/vendor/zepto' : 'js/vendor/jquery') +
  '.js><\/script>')
  </script>
  <script src="js/foundation/foundation.js"></script>
  <script src="js/foundation/foundation.alerts.js"></script>
  <script src="js/foundation/foundation.clearing.js"></script>
  <script src="js/foundation/foundation.cookie.js"></script>
  <script src="js/foundation/foundation.dropdown.js"></script>
  <script src="js/foundation/foundation.forms.js"></script>
  <script src="js/foundation/foundation.joyride.js"></script>
  <script src="js/foundation/foundation.magellan.js"></script>
  <script src="js/foundation/foundation.orbit.js"></script>
  <script src="js/foundation/foundation.placeholder.js"></script>
  <script src="js/foundation/foundation.reveal.js"></script>
  <script src="js/foundation/foundation.section.js"></script>
  <script src="js/foundation/foundation.tooltips.js"></script>
  <script src="js/foundation/foundation.topbar.js"></script>
  <script src="js/foundation/foundation.interchange.js"></script>
  <script>
    $(document).foundation();
  </script>
  <script>
$('body').css('background-image', 'url(img/new.png")');
function validateLoginForm()
{
  var x=document.forms['loginForm']['username'].value;
  var flag=true;
  if(x==null||x=="") 
  {
    $("#loginform_username").addClass("error");
    flag=false;
  }
  else $("#loginform_username").removeClass("error");
  x=document.forms['loginForm']['pwd'].value;
  if(x.length<6)
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
  var x=document.forms['signupForm']['username'].value;
  var flag=true;
  if(x==null||x=="") 
  {
    $("#signupform_username").addClass("error");
    flag=false;
  }
  else $("#signupform_username").removeClass("error");

  x=document.forms['signupForm']['name'].value;
  if(x==null||x=="") 
  {
    $("#signupform_name").addClass("error");
    flag=false;
  }
  else $("#signupform_name").removeClass("error");

  x=document.forms['signupForm']['pwd'].value;
  if(x.length<6)
  {
    $("#signupform_pwd").addClass("error");
    flag=false;
  }
  else $("#signupform_pwd").removeClass("error");
  if(!flag) document.getElementById("signup_error_info").innerHTML="* invalid form submission";
  //$("#login_error_info").addClass("error");
  return flag;
}
</script>

<div id="myModal" class="reveal-modal">
<form name="loginForm" action="PHP/login.php" method="POST" onsubmit="return validateLoginForm()">
  <fieldset>
    <legend>Login to continue</legend>

    <div class="row">
      <div class="large-6 columns">
        <label>Login Id</label>
        <input id="loginform_username" type="text" placeholder="Enter login Id" name="username">
      </div>
    </div>

    <div class="row">
      <div class="large-6 columns">
        <label>Password</label>
        <input id= "loginform_pwd" type="password" placeholder="Enter your password" name="pwd">
      </div>
    </div>


    <button id="loginn_button">Login</button>
    <font color="red"> <div id="login_error_info" class="error"></div></font>
  </fieldset>
</form>
  <a class="close-reveal-modal">&#215;</a>
</div>

<div id="myModal1" class="reveal-modal">
<form name="signupForm" action="PHP/register.php"  method= "POST" onsubmit="return validateSignUpForm()">
  <fieldset>
    <legend>Register Here</legend>

    <div class="row">
      <div class="large-6 columns">
        <label>Login Id</label>
        <input id="signupform_username" type="text" placeholder="Enter login Id" name="username">
      </div>
    </div>

    <div class="row">
      <div class="large-6 columns">
        <label>Name</label>
        <input id="signupform_name" type="text" placeholder="Enter Your Name" name="name">
      </div>
    </div>

    <div class="row">
      <div class="large-6 columns">
        <label>Password(minimum 6 characters)</label>
        <input id="signupform_pwd" type="password" placeholder="Enter your password" name="pwd">
      </div>
    </div>
    <button>Register</button>
    <font color="red"> <div id="signup_error_info" class="error"></div></font>
  </fieldset>
</form>
  <a class="close-reveal-modal">&#215;</a>
</div>


 </body>
</html>



