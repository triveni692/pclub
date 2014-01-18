<html>
<head>
	<title>Tutorial
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
	<h1>Tutorial</h1>

	<?php foreach ($tutorial as $news_item): ?>
<div class="panel radius" style="opacity:0.9;">
    <h3><?php echo $news_item['topic'] ?></h3>
            <?php echo $news_item['description'] ?>
<hr style="margin:0px">
<a href="<?php echo base_url().'uploads/tutorials/' . $news_item['link']; ?>" target="_blank"><b>Download</b></a>
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

