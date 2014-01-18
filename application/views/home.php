<?php
include("login_essential.php");
?>

<div class="row"><br>
<div class="large-12 columns">
  <div id="sliderFrame" style="margin:0px;">
        <div id="slider">
            <img src="<?php echo base_url() ?>img/image-slider-1.jpg" alt="P-Club " />
            <img src="<?php echo base_url() ?>img/image-slider-2.jpg" alt="Android Application" />
            <img src="<?php echo base_url() ?>img/image-slider-3.png" alt="Windows Application" />
        </div>
    </div>
    </div></div>

<br><br><br>

<div class="row" style="margin:0px;">
  <div class="large-3 columns">
    <?php
      include("events.php");
    ?>
  </div>
  <div class="large-6 columns" id="standard">
    <!--<div class = "pricing table">-->
<div class="panel radius" style="opacity:1;padding:20px;" id="mainbody">
<p>
<b><u>Programming Club</b></u>, also known as <b><u>P-Club</b></u>, is one of the most important part of 
  SnT council, IIT Kanpur. P-Club organizes regular lectures and competitions so 
  as to encourage people towards programming. If you are interested in Programming, this is a right place to learn and
  explore yourself. P-Club team is not just bounded by lectures and cpmpetions only. This club is much more.
  P-Club team is always ready to help people. You can ask your doubts on our <a href ="<?php echo base_url();?>forum"> 
  forum </a> and even post them on our <a href ="https://www.facebook.com/groups/pclubiitk/">facebook group</a>
  any time.You can learn various programming fundas with fun, really too much of fun. Join us and enjoy with P-Club.
</p>
</div>
  
</div>
  <div class="large-3 columns">
    <?php
      include("announcements.php");
    ?>
</div>
</div>

       <script>
        function makeRequest(url){
    //        $('#preloader').show();
            $.get(url, function(data) {
                $('#standard').html(data);
           //     $('#preloader').hide();
            });
        }

    </script>

 </body>
</html>



