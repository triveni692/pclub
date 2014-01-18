<html>
<head>
	<title>Contact
	</title>
</head>
<body>
<div class="row" style="margin:0px;">
  <div class="large-3 columns">
    <?php
      include("events.php");
    ?>
  </div>
  <div class="large-6 columns" id="standard">
    <!--<div class = "pricing table">-->
<div class="panel radius" style="opacity:1;padding:20px;" id="achivement">

	<h2>Coordinators</h2>

	<?php foreach ($cordi as $news_item): ?>
<div class="panel radius" style="opacity:0.9;">
    <h5><?php echo $news_item['name'] ?></h5>
<hr style="margin:0px">
<img src="<?php echo '..//uploads/pic/' . $news_item['pic']; ?>" style="width:100px;height:100px;margin:5px;" align=left><br>
<br>
<?php echo $news_item['address'] ?><br><BR>
<B><?php echo $news_item['phone'] ?></B><br><br><br><BR><BR>

</div>


<?php endforeach ?>
<h3>Seceretary</h3>
	<?php foreach ($seci as $news_item): ?>
<div class="panel radius" style="opacity:0.9;">
    <h5><?php echo $news_item['name'] ?></h5>
<hr style="margin:0px">
<?php echo $news_item['address'] ?>&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp; <?php echo $news_item['phone'] ?>
</div>
<?php endforeach ?>
</div>
  
</div>
  <div class="large-3 columns">
  <?php
      include("announcements.php");
    ?>
 </div>
</div>
	
</body>
</html>