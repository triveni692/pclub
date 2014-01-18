<div class="row">
      <div class="large-3 columns">.
      </div>
      <div class="large-6 columns">
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
