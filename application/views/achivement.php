<html>
<head>
	<title>Achivements
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
<h1>Achivements</h1>

	<?php foreach ($achivement as $news_item): ?>
<div id="achivement">
    <h3><?php echo $news_item['topic'] ?></h3>
<hr style="margin:0px">
<?php echo $news_item['description'] ?>
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