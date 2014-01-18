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
<h1><b>Deleting Anouncements:</b>
</h1>
<a href="<?php echo base_url('admin'); ?>"><button class="secondary">Back</button></a>

<?php for($i=0,$m=120;$i<$m;$i++) if($i==$m/2) echo 'or go to: '; else echo '&nbsp;'; ?>
<a href="<?php echo base_url(''); ?>"><button class="secondary">www.pclub.in</button></a>

<hr>

 <form action="<?php echo base_url('admin/home/delete_anouncement_by_id') ?>" method="POST">
              <div class="row">
                <div class="large-6 columns">
                    <label><h4>Delete by Id<h4></label>
                    <input id="addanouncement_name" type="text" placeholder="Enter id" name="id" style="width:90px;">
                </div>
                <div class="large-6 columns">
                  <button id="loginn_button">Delete</button>
                </div>
              </div>
      </form>




<hr>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Content</th>
      <th>Time</th>
    </tr>
  </thead>
  <tbody>

<?php foreach ($anouncement as $news_item): ?>
<tr>
  <td><?php echo $news_item['id'] ?></td>
<td><?php echo $news_item['content'] ?></td>
<td><?php echo $news_item['timestamp'] ?></td>


<?php endforeach ?>
</tbody>
</table>



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
    </script>

</body>
</html>














