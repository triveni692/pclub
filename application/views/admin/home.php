<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Welcome to P-Club</title>
    <style>#canvas { background:url(img/new5.jpg) }</style>  <!-- If you are using CSS version, only link these 2 files, you may add app.css to use for your overrides if you like. -->
    <link rel="stylesheet" href="<?php echo base_url()  ?>css/normalize.css" />
    <link rel="stylesheet" href="<?php echo base_url()  ?>css/foundation.css" />
    <link rel="stylesheet" href="<?php echo base_url()  ?>css/index.css" />
    <!-- If you are using the gem version, you need this only -->
    <link rel="stylesheet" href="<?php echo base_url() ?>css/app.css" />

    <script src="<?php echo base_url()  ?>js/vendor/custom.modernizr.js"></script>
    <script src="<?php echo base_url()  ?>js/vendor/jquery.js"></script>
    <script src="<?php echo base_url()  ?>js/test.js"></script>
  </head>

  <body>
    <?php
    $login="login";
    if($status==$login){

    }
    else {
      echo " <div data-alert class='alert-box secondary'> "
            . $status .
          "<a href='#' class='close'>&times;</a>
          </div>";
}

?>
<h1>Degined to update "pclub.in"</h1>
<a href="<?php echo base_url('') ?>" style="float:left">www.pclub.in</a>
<a href="<?php echo base_url('admin/home/logout') ?>" style="float:right">Logout</a>
<hr>
<div class="section-container auto" data-section>
  <section>
    <p class="title" data-section-title><a href="#panel1" style="padding:20px;"><b>Events</b></a></p>
    <div class="content" data-section-content>
        <ul class="button-group radius">
             <li><a class="button secondary" data-reveal-id='myModal1'>Add</a></li>
             <li><a class="button " href="<?php echo base_url('admin/home/delete_event') ?>">Delete</a></li>
        </ul>
    </div>
  </section>

  <section>
    <p class="title" data-section-title><a href="#panel2" style="padding:20px;"><b>Tutorials</b></a></p>
    <div class="content" data-section-content>
        <ul class="button-group radius">
             <li><a class="button " data-reveal-id='myModal3'>Add</a></li>
             <li><a class="button secondary" href="<?php echo base_url('admin/home/delete_tutorial') ?>">Delete</a></li>
        </ul>

    </div>
  </section>
    <section>
    <p class="title" data-section-title><a href="#panel3" style="padding:20px;"><b>Project</b></a></p>
    <div class="content" data-section-content>
        <ul class="button-group radius">
             <li><a class="button secondary" data-reveal-id='myModal5'>Add</a></li>
             <li><a class="button " href="<?php echo base_url('admin/home/delete_project') ?>">Delete</a></li>
        </ul>
    </div>
  </section>
    <section>
    <p class="title" data-section-title><a href="#panel4" style="padding:20px;"><b>Achivements</b></a></p>
    <div class="content" data-section-content>
        <ul class="button-group radius">
             <li><a class="button " data-reveal-id='myModal7'>Add</a></li>
             <li><a class="button secondary" href="<?php echo base_url('admin/home/delete_achivement') ?>">Delete</a></li>
        </ul>
    </div>
  </section>
    <section>
    <p class="title" data-section-title><a href="#panel5" style="padding:20px;"><b>Contact</b></a></p>
    <div class="content" data-section-content>
        <ul class="button-group radius">
             <li><a class="button secondary" data-reveal-id='myModal9'>Add </a></li>
             <li><a class="button " href="<?php echo base_url('admin/home/delete_contact') ?>">Delete</a></li>
        </ul>
    </div>
  </section>

  <section>
    <p class="title" data-section-title><a href="#panel6" style="padding:20px;"><b>Anouncement</b></a></p>
    <div class="content" data-section-content>
        <ul class="button-group radius">
             <li><a class="button secondary" data-reveal-id='myModal10'>Add </a></li>
             <li><a class="button " href="<?php echo base_url('admin/home/delete_anouncement') ?>">Delete</a></li>
        </ul>
    </div>
  </section>


</div>

<div id="myModal1" class="reveal-modal">
      <form name="addEvent" action="<?php echo base_url('admin/home/add_event') ?>" method="POST" onsubmit="return validateLoginForm()">
        <fieldset>
          <legend>Add new Event</legend>

              <div class="row">
                <div class="large-6 columns">
                    <label>Title</label>
                    <input id="addevent_title" type="text" placeholder="Enter title" name="title">
                </div>
              </div>

              <div class="row">
                <div class="large-6 columns">
                    <label>Date</label>
                    <input id= "addevent_date" type="text" placeholder="YYYY-MM-DD" name="date">
                </div>
                 <div class="large-6 columns"><br>
                    * Write in specified format
                </div>
              </div>
                 <div class="row">
                <div class="large-6 columns">
                    <label>Time</label>
                    <input id= "addevent_date" type="text" placeholder="HH:MM:SS" name="time">
                </div>
                    <div class="large-6 columns"><br>
                        * Write in specified format
                </div>
              </div>

              <div class="row">
                <div class="large-6 columns">
                    <label>Discription</label>
                    <textarea id= "addevent_description" type="text" placeholder="Enter discription" name="description"></textarea>
                </div>
              </div>

              <div class="row">
                <div class="large-6 columns">
                    <label>Venue</label>
                    <input id= "addevent_venue" type="text" placeholder="Enter venue" name="venue">
                </div>
              </div>
          <button id="loginn_button">Add</button>
          <font color="red"> <div id="login_error_info" class="error"></div></font>
        </fieldset>
      </form>
      <a class="close-reveal-modal">&#215;</a>
    </div>



<div id="myModal3" class="reveal-modal">
      <form name="addEvent" action="<?php echo base_url('admin/home/add_tutorial') ?>" method="POST" enctype="multipart/form-data">
        <fieldset>
          <legend>Add new Tutorial file</legend>

              <div class="row">
                <div class="large-6 columns">
                    <label>Topic</label>
                    <input id="addevent_title" type="text" placeholder="Enter topic" name="topic">
                </div>
              </div>

              <div class="row">
                <div class="large-12 columns">
                    <label>Description</label>
                    <input id= "addevent_date" type="text" placeholder="Short description" name="description">
                </div>
              </div>
                 <div class="row">
                <div class="large-6 columns">
                    <label>File</label>
                    <input class="tiny round disabled button" name="userfile" type="file">
                </div>
                                <div class="large-6 columns">
                    * Only jpg/png/gif/pdf/txt/ppt/xml/doc allowed
                </div>
              </div>
                        <button id="loginn_button">Add</button>
          <font color="red"> <div id="login_error_info" class="error"></div></font>
        </fieldset>
      </form>
      <a class="close-reveal-modal">&#215;</a>
    </div>




<div id="myModal5" class="reveal-modal">
      <form name="addProject" action="<?php echo base_url('admin/home/add_project') ?>" method="POST" onsubmit="return validateLoginForm()">
        <fieldset>
          <legend>Add new Project</legend>

              <div class="row">
                <div class="large-6 columns">
                    <label>Name</label>
                    <input id="addproject_name" type="text" placeholder="Enter name" name="name">
                </div>
              </div>
              <div class="row">
                <div class="large-6 columns">
                    <label>Link</label>
                    <input id= "addproject_link" type="text" placeholder="Enter link" name="link">
                </div>
              </div>
          <button id="loginn_button">Add</button>
          <font color="red"> <div id="login_error_info" class="error"></div></font>
        </fieldset>
      </form>
      <a class="close-reveal-modal">&#215;</a>
    </div>

<div id="myModal7" class="reveal-modal">
      <form name="addProject" action="<?php echo base_url('admin/home/add_achivement') ?>" method="POST" onsubmit="return validateLoginForm()">
        <fieldset>
          <legend>Add Achivements</legend>

              <div class="row">
                <div class="large-6 columns">
                    <label>Topic</label>
                    <input id="addachivemnet_name" type="text" placeholder="Enter Topic" name="topic">
                </div>
              </div>
              <div class="row">
                <div class="large-6 columns">
                    <label>Link</label>
                    <input id= "addachivement_link" type="text" placeholder="Enter description" name="description">
                </div>
              </div>
          <button id="loginn_button">Add</button>
          <font color="red"> <div id="login_error_info" class="error"></div></font>
        </fieldset>
      </form>
      <a class="close-reveal-modal">&#215;</a>
    </div>
<div id="myModal9" class="reveal-modal">
      <form name="addContact" action="<?php echo base_url('admin/home/add_contact') ?>" method="POST"  enctype="multipart/form-data" onsubmit="return validateLoginForm()">
        <fieldset>
          <legend>Add Contact</legend>

              <div class="row">
                <div class="large-6 columns">
                    <label>Name</label>
                    <input id="addachivemnet_name" type="text" placeholder="Enter Name" name="name">
                </div>
              </div>
              <div class="row">
                <div class="large-6 columns">
                    <label>Phone No.</label>
                    <input id= "addachivement_link" type="text" placeholder="Enter phone no" name="phone">
                </div>
              </div>
              <div class="row">
                <div class="large-6 columns">
                    <label>Address</label>
                    <input id= "addachivement_link" type="text" placeholder="Enter address" name="address">
                </div>
              </div>
              <div class="row">
    <div class="large-6 columns">
      <label for="radio1"><input name="radio1" type="radio" value="cordi" id="radio1" CHECKED><span class="custom radio checked"></span> Coordinator</label>
      <label for="radio2"><input name="radio1" type="radio" value="seci" id="radio2"><span class="custom radio"></span> Seceratary</label>
    </div>
                 
                <div class="large-6 columns c_pic">
                    <label>Your Picture</label>
                    <input class="tiny round disabled button" name="userfile" type="file">
                </div>
                <div class="large-6 columns c_pic">
                    * Only jpg/png/gif allowed
                </div>
              </div>

          <button id="loginn_button">Add</button>
          <font color="red"> <div id="login_error_info" class="error"></div></font>
        </fieldset>
      </form>
      <a class="close-reveal-modal">&#215;</a>
    </div>

<div id="myModal10" class="reveal-modal">
      <form name="addAnouncement" action="<?php echo base_url('admin/home/add_anouncement') ?>" method="POST" onsubmit="return validateLoginForm()">
        <fieldset>
          <legend>Add new Anouncement</legend>

              <div class="row">
                <div class="large-6 columns">
                    <label>Anouncement</label>
                    <textarea id= "anouncement" type="text" placeholder="Enter Anouncement Here" name="anouncement"></textarea>
                </div>
              </div>
              
          <button id="loginn_button">Add</button>
          <font color="red"> <div id="login_error_info" class="error"></div></font>
        </fieldset>
      </form>
      <a class="close-reveal-modal">&#215;</a>
    </div>


    <script>
      document.write('<script src=' +
      ('__proto__' in {} ? 'js/vendor/zepto' : 'js/vendor/jquery') +
      '.js><\/script>')


      $(document).ready(function(){
        $("#radio1").click(function(){
          $(".c_pic").show();      
        }); 
        $("#radio2").click(function(){
          $(".c_pic").hide();      
        });     
      });

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
    </script>

</body>
</html>
