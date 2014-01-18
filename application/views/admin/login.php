<html>
<head>
<title>
Login to contiue</title>
</head>
<body>
	<h1>Login to continue</h1>
<hr>
<br>or go to : <h3><a href = "<?php echo base_url(); ?>"> www.pclub.in </h3></a></br>
  <form name="loginForm" action="<?php echo base_url(); ?>admin/verifylogin" method="POST">
        <fieldset>
          <legend>Only admin allowed</legend>
                    <label>Login Id</label>
                    <input id="loginform_username" type="text" placeholder="Enter login Id" name="username"><br>
                    <img src="<?php echo base_url(); ?>img/login.gif" style="float:left;">
                    <br>
                    <label>Password</label>
                    <input id= "loginform_pwd" type="password" placeholder="Enter your password" name="password">
                    <br><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          			<button id="loginn_button">Login</button>
        </fieldset>
      </form>

</body>
</html>