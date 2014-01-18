<?php
include('login_essential.php');
?>
<?php
  $q_array = array() ;
    for($i=0;$i<10000;$i++)                                          //maximum question limit is set to 10000
      $q_array[$i]=0;

    if($status==$log1) 
        {
            foreach ($q_reports as $news_item) {
              $x=$news_item['id'];
              $q_array[$x] = 1;
            }
        }
?>


<script>
  var x=document.getElementById('subheader');
  x.innerHTML="<div class='row'><div class='large-4 columns' style='background-color:#42b640'><a href='<?php echo base_url(); ?>home'>P-Club</a></div><div class='large-4 columns' style='background-color:#42b640'><a href='http://www.iitk.ac.in'>IITK</a></div> <div class='large-4 columns' style='background-color:#ee8c8c'><a href='<?php echo base_url(); ?>forum'>Forum</a></div> </div>";
</script>
<!--
<hr>
Search &nbsp&nbsp | 
<hr>
-->
  <div class="row">
  <?php
      if($status==$log1) echo "<a class='small secondary button' data-reveal-id='askquestion' style='margin-left:15px'>&nbsp &nbsp &nbsp  Ask Question &nbsp &nbsp &nbsp &nbsp </a>";
      else echo "<a class='small secondary button' data-reveal-id='myModal' style='margin-left:15px'>Login to Ask Question</a>";
    ?>
  <div class="large-3 columns">
  </div>
  <div class="large-9 columns">
  <div style="float:right;">
    <a href="<?php echo base_url() ;?>forum" class="tiny <?php if($forumhead!='all') echo 'secondary' ; else echo 'success'; ?> button">All</a></li>
    <a href="<?php echo base_url() ;?>forum/categories/cprogramming" class="tiny <?php if($forumhead!='cprogramming') echo 'secondary' ; else echo 'success'; ?> button">C Programming</a></li>
    <a href="<?php echo base_url() ;?>forum/categories/webd" class="tiny <?php if($forumhead!='webd') echo 'secondary' ; else echo 'success'; ?> button">Web D</a></li>
    <a href="<?php echo base_url() ;?>forum/categories/algorithm" class="tiny <?php if($forumhead!='algorithm') echo 'secondary' ; else echo 'success'; ?> button">Algorithms</a></li>
    <a href="<?php echo base_url() ;?>forum/categories/networking" class="tiny <?php if($forumhead!='networking') echo 'secondary' ; else echo 'success'; ?> button">Networking</a></li>
    <a href="<?php echo base_url() ;?>forum/categories/appdev" class="tiny <?php if($forumhead!='appdev') echo 'secondary' ; else echo 'success'; ?> button">App Dev</a></li>
    <a href="<?php echo base_url() ;?>forum/categories/linux" class="tiny <?php if($forumhead!='linux') echo 'secondary' ; else echo 'success'; ?> button">Linux</a></li>
    <a href="<?php echo base_url() ;?>forum/categories/others" class="tiny <?php if($forumhead!='others') echo 'secondary' ; else echo 'success'; ?> button">Others</a></li>
  </div>
  </div>
  </div>

<div class="row" style="margin:0px;">
  <div class="large-2 columns">
  </div>

  <div class="large-10 columns">
    <?php foreach ($forum as $news_item): ?>
    <?php if($status == $log1) {$id=$news_item['id']; if($q_array[$id]==1) continue;} ?>
    <div class="panel radius" style="">
      <div class="row">
        <div class="large-4 columns" style="background-color:#D3D4C1"><h6>
          <?php 
            $c=$news_item['category'];
            if($c=='webd')  $cat='Web D';
            else if($c=='algorithm') $cat='Algorithm';
            else if($c=='networking') $cat='Networking';
            else if($c=='appdev') $cat='App Dev';
            else if($c=='linux') $cat='Linux';
            else if($c=='cprogramming') $cat='C Programming';
            else  $cat='Other';
      
            echo "<a href='".base_url()."forum/categories/".$news_item['category']."' style='color:#242226'>".$cat."</a>" 
          ?></h6>
        </div>
        <div class="large-2 columns" style="background-color:#DAEEF0"><h6> <?php echo "<a href='".base_url()."forum/problems/".$news_item['id']."' style='color:#242226'>Question ID:".$news_item['id']."</a>" ?></h6>
        </div>
        <div class="large-6 columns" style="background-color:#BCD4C3"><h6>Added By:<u><?php if($news_item['added_as'] != 'Anonymous') echo "<a href='".base_url()."iitk/users/".$news_item['added_by']."' style='color:#422857;'>"; echo $news_item['added_as']; if($news_item['added_as'] != 'Anonymous') echo "</a>" ?></u></h6>
        </div>
      </div><br>
      <span style="font-size:12px;font-weight:bold;"><?php echo "<a href='".base_url()."forum/problems/".$news_item['id']."' style='color:#48434D;'>".$news_item['content']."</a>" ?></span><br><br>
      <div style="float:right"><h6><span style="font-size:12px;font-weight:bold;">Visits :</span><?php echo $news_item['visits'] ?></h6> </div>
      <div style="float:right; padding-right:5px"><h6><span style="font-size:12px;font-weight:bold;">Comments :</span> <?php echo $news_item['comments'] ?></h6></div>
    </div>
    <?php endforeach ?>
  </div>
</div>


<?php if($status==$log1) 
  echo ' <div id="askquestion" class="reveal-modal">
        <form name="Ask_Question" action="'.base_url().'forum/askquestion" method="POST">
          <fieldset>
            <legend>Ask Question</legend>

                <div class="row">
                  <div class="large-6 columns">
                      <u>Ask As</u>
                      <label><input type="radio" name="askas" value="'. $username .'" checked="checked">Me</label>
                      <label><input type="radio" name="askas" value="anonymous">Anonymous</label>
            <input type=text name = "username" value = "'.$username.'" style ="display : none ;">
                  </div>
                </div>

                <div class="row">
                  <div class="large-6 columns">
                      <label>Category</label>
                      <select name="category">
                        <option value="cprogramming">C Programming</option>
                        <option value="webd">Web D</option>
                        <option value="algorithm">Algorithm</option>
                        <option value="networking">Networking</option>
                        <option value="appdev">App Dev</option>
                        <option value="linux">Linux</option>
                        <option value="others">Others</option>
                      </select>
                  </div>
                </div>

                <div class="row">
                  <div class="large-6 columns">
                      <label>Question</label>
                      <textarea id="question" placeholder="Enter your question here" name="question"></textarea>
                  </div>
                </div>

                <input id= "url2" value="url" name="url" style="display:none;">

            <button id="ask_button">Ask</button>
            
          </fieldset>
        </form>
        <a class="close-reveal-modal">&#215;</a>
      </div>';
    ?>

  <script>
     $(document).ready(function(){
        var x=document.getElementById('url2');
        x.value=location;
      });
  </script>
  <br>
  <br>
 <font size="2px"><center>!!! End of the content !!!<br>
    Designed and developed by : <font color="blue"><u><a href="<?php echo base_url().'iitk/users/triveni'; ?>" style="color:blue">Triveni</a></u>, <u><a href="<?php echo base_url().'iitk/users/robbins'; ?>" style="color:blue">Robbin</a></u> and <u><a href="<?php echo base_url().'iitk/users/vivkul'; ?>" style="color:blue">Viveka</a></u></font>
  </center></font>
  <br>
  
</body>
</html>