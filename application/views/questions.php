<?php include('login_essential.php') ?>

      
            <?php    
              foreach ($category as $news_item){                    
                $c=$news_item['category'];
                if($c=='webd')  $cat='Web D';
                else if($c=='algorithm') $cat='Algorithms';
                else if($c=='networking') $cat='Networking';
                else if($c=='appdev') $cat='App Dev';
                else if($c=='linux') $cat='Linux';
                else if($c=='cprogramming') $cat='C Programming';
                else  $cat='Other';
              }
              $cat_link = $c;
            ?>
  <div class="row">
    <?php
      if($status==$log1) echo "<a class='small secondary button' data-reveal-id='askquestion' style='margin-left:15px'>&nbsp &nbsp &nbsp  Ask Question &nbsp &nbsp &nbsp &nbsp </a>";
      else echo "<a class='small secondary button' data-reveal-id='myModal' style='margin-left:15px'>Login to Ask Question</a>";
    ?>
    <div class="large-3 columns">
    </div>
    <div class="large-9 columns">
      <div style="float:right;">
        <a href="<?php echo base_url() ;?>forum" class= <?php echo '"tiny ';if($cat!='all') echo 'secondary' ; else echo 'success'; echo ' button">';?>All</a>
        <a href="<?php echo base_url() ;?>forum/categories/cprogramming" class=<?php echo '"tiny ';if($cat!='C Programming') echo 'secondary' ; else echo 'success'; echo ' button">';?> C Programming</a>
        <a href="<?php echo base_url() ;?>forum/categories/webd" class=<?php echo '"tiny ';if($cat!='Web D') echo 'secondary' ; else echo 'success'; echo ' button">';?>Web D</a>
        <a href="<?php echo base_url() ;?>forum/categories/algorithm" class=<?php echo '"tiny ';if($cat!='Algorithms') echo 'secondary' ; else echo 'success'; echo ' button">';?>Algorithms</a>
        <a href="<?php echo base_url() ;?>forum/categories/networking" class=<?php echo '"tiny ';if($cat!='Networking') echo 'secondary' ; else echo 'success'; echo ' button">';?>Networking</a>
        <a href="<?php echo base_url() ;?>forum/categories/appdev" class=<?php echo '"tiny ';if($cat!='App Dev') echo 'secondary' ; else echo 'success'; echo ' button">';?>App Dev</a>
        <a href="<?php echo base_url() ;?>forum/categories/linux" class=<?php echo '"tiny ';if($cat!='Linux') echo 'secondary' ; else echo 'success'; echo ' button">';?>Linux</a>
        <a href="<?php echo base_url() ;?>forum/categories/others" class=<?php echo '"tiny ';if($cat!='Others') echo 'secondary' ; else echo 'success'; echo ' button">';?>Others</a>
      </div>
    </div>
  </div>
  <?php
        $like_array = array() ;
        $c_array = array() ;

        for($i=0;$i<1000;$i++)                                          //maximum comments limit is set to 1000
          {
            $like_array[$i]="Like";
            $c_array[$i]=0;
          }

        if($status==$log1) 
            {
              foreach ($c_likes as $news_item) {
              $x=$news_item['id'];
              $x=substr($x, 2);
              $like_array[$x] = "Unlike";
              }
               foreach ($c_reports as $key ) {
                 $x=$key['id'];
                 //echo $x;
                 $x=substr($x, 2);
                 $c_array[$x] = 1;
               }
      }?>
  <style type="text/css">
  .container {
      position: relative;
    }
    .column-right {
      width: 90%;
    }
    .column-left {
      position: absolute;
      top: 10px;
      left: 10px;
      bottom: 10px;
      width: 10%;
    }
  </style>
  <div class="row" style="margin : 0">
  <div class="large-12 columns">
  <div><h6><div>
    <?php foreach ($category as $news_item) :?>
      <div style="background-color:#D3D4C1;padding:2px;"> 
      <h6><span style="float:right;font-size:12px;font-weight:bold;"><?php echo $news_item['timestamp']; ?></span></h6>
      <span style="float:left;font-size:13px;font-weight:bold;">Likes : <font id="q_like"  > <?php echo $news_item['likes']; ?></font></span>
      <span style="background-color:#E5E6D5;margin-left:42%;padding:5px;"><a href="<?php echo base_url(); ?>forum/categories/<?php echo $cat_link; ?>" style="color:#B4B872;"><b><?php echo $cat ;?></b></a></span><br>
      </div>
      
      <?php $q_id=$news_item['id'];?>
                     
                
      </div>
      <div style="min-height: 100px;overflow: hidden;background-color:#E5E6D5;">
  <div class="container">
    <div class="column-left">
      <img height ="60" width = "60" src="<?php echo base_url(); ?>img/users/<?php if($news_item['added_as'] == 'Anonymous') $q_pic = 'anonymous.jpg'; echo $q_pic; ?>"><br>
      <?php $addedby=$news_item['added_by']; $addedas=$news_item['added_as']; if($addedas != 'Anonymous') echo "<a href='".base_url()."iitk/users/".$addedby."' style = 'color:#969C33;font-size:11px;'>".$addedas."</a>"; 
            else echo "<font style = 'color:#969C33;font-size:11px;'>".$addedas."</font>"; ?>
    
    </div>
    <div class="column-right" style="font-size:13px;font-weight:bold;">
      <?php echo $news_item['content']; ?><br><br>
    </div>
  </div>
  </div>
  <div><span style = "display : <?php if($status == $log1) echo 'normal'; else echo 'none'; ?>;">
        <a class="tiny success button" id="comment">Comment</a>                        
                
                <a id="q_q" class="tiny secondary button" onclick = "update_likes('q_q', 'q_like',<?php echo "'".$q_id."'"; ?>,0)"><?php if($status==$log1) echo $q_like;?></a>
                 
                <a  id="q_r" style="color:black;float:right;" class="tiny alert button" onclick = "reportt_abuse(<?php echo "'".$q_id."'"; ?>,0)" data-reveal-id='myModal2' style="color:red">Report Abuse</a></span>
      <span <?php if($status == $log1) echo "style='display:none;";  ?>>                        
                
                <a class='small secondary button' data-reveal-id='myModal' style='margin-left:15px'>Login to Comment</a></span>
  
  </div>

      <br>
      <span id="panel" style="display:none; width:100%;">
          <form action="<?php echo base_url()?>forum/comment/<?php echo $news_item['id'] ?>" method="POST">
              <fieldset style="background:#DBD5E6;font-family:garamond,times-new-roman,serif;height:150px;width:100%">
                  <legend> Comment Here</legend>
                  <textarea placeholder="Enter your comment here" name="comment"></textarea>
                  <a  class="tiny disabled button">Comment As: </a>
                  <input type="radio" name="commentas" value= "<?php if($status == $log1) echo $username; ?>" checked="checked">Me
                  <input type="radio" name="commentas" value="Anonymous">Anonymous

                  <button class="tiny button" style="float:right">Post Comment</button>

                  <input id= "urll1" value="url" name="url" style="display:none;">

              </fieldset>

          </form>
      </span> <br><br>   
    <?php endforeach ?>            
    </div>
    <?php foreach ($comments as $news_item): ?>
      <?php $id=$news_item['comment_id']; 
      if($status == $log1) { if($c_array[$id] == 1) continue ; } ?>
      <div style="background-color:#D5CCED;padding:5px;">
      <span style="float:right;font-size:12px;font-weight:bold;"><?php echo $news_item['timestamp']; ?></span>
         <span style="font-size:12px"> Likes : </span><span id = "<?php echo 'c_'.$id ; ?>"><?php echo $news_item['likes'] ;?></span>
        <!--<span style="margin-left:41%;font-weight:500;"><?php //echo "ID:".$news_item['comment_id']; ?></span>-->
      </div>
        <div style="min-height: 100px;overflow: hidden;background-color:#DBD5E6;">
          <div class="container">
            <div class="column-left">
                <img height ="60" width = "60" src="<?php echo base_url(); ?>img/users/<?php if($news_item['addedas'] == 'Anonymous') echo 'anonymous.jpg'; else echo $c_pic[$news_item['whodid']]; ?>"><br>
                <?php if($news_item['addedas'] != 'Anonymous') echo "<a href='".base_url()."iitk/users/".$news_item['whodid']."' style = 'color:#6E57AD;font-size:10px;'>".$news_item['addedas']."</a>"; else echo "<span style = 'color:#6E57AD;font-size:10px;'>Anonymous</span>";?>
            </div>
            <div style="font-size:13px;font-weight:500;font-family: sans-serif;" class="column-right"><br>
              <?php echo $news_item['comment']; ?><br><br>
            </div>
          </div>
        </div>
        <div>
          <span style = "display : <?php if($status == $log1) echo 'normal'; else echo 'none'; ?>">

               <a id = "<?php echo 'l_'.$id ; ?>"  class="tiny secondary button" onclick = "update_likes(<?php echo "'l_".$id ."', 'c_".$id."','".$q_id."','".$id."'" ; ?>)"><?php echo $like_array[$id]; ?></a>
              
             <a id= "<?php echo 'r_'.$id ; ?>" style="color:black;float:right;" class="tiny alert button" onclick = "reportt_abuse(<?php echo "'".$q_id."','".$id."'"; ?>)" data-reveal-id='myModal2' style="color:red">Report Abuse</a>
          </span> 
          <span <?php if($status == $log1) echo "style='display:none;";  ?>>                        
            <ul class="breadcrumbs" style="width:13%;background-color:#D5CCED;font-size:14px;">
              <a href='#' data-reveal-id='myModal'>
                <font class='font' color='black' style='margin-left:15px'>
                  Login to Like
                </font>
              </a>
            </ul>
          </span> 
        </div> 
            <br>
          <?php endforeach ?>
          </div>
  </div>
    <!--reveal modal for report abuse -->
    <div id="myModal2" class="reveal-modal">
      <form name="report_abuse" action="<?php echo base_url(); ?>report_abuse" method="POST" onsubmit="return validateReportAbuse()">
        <fieldset>
          <legend>Report Abuse</legend>

              <div class="row">
                <div class="large-6 columns">
                    <label>Details</label>
                </div>
                <textarea placeholder="Enter Details" name="content" style="height : 200px" id="report_abuse"></textarea>
              </div>

              
              <input id="q_idd" value="val" name="q_id" style="display:none;">
              <input id="c_idd" value="val" name="c_id" style="display:none;">
              <input value="<?php if($status==$log1) echo $username; ?>" name="username" style="display:none;">
              <input id="urll" value="val" name="url" style="display:none;">
               

          <button>Report</button>
          <div id="report_error_info" class="error" style = "color:red"></div>
        </fieldset>
      </form>
      <a class="close-reveal-modal">&#215;</a>
    </div>
    <!--reveal modal for asking question -->
    <?php if($status==$log1) 
      echo ' <div id="askquestion" class="reveal-modal">
            <form name="Ask_Question" action="'.base_url().'forum/askquestion" method="POST">
              <fieldset>
                <legend>Ask Question</legend>

                    <div class="row">
                      <div class="large-6 columns">
                          <label><u>Ask As</u></label>
                          <input type="radio" name="askas" value="'. $username .'" checked="checked">Me
                          <input type="radio" name="askas" value="anonymous">Anonymous
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
        $('#comment').click(function(){
            $('#panel').slideToggle();
        });
      });

     $(document).ready(function(){
        var y=document.getElementById('urll1');
        y.value=location;
      });

     $(document).ready(function(){
        var x=document.getElementById('url2');
        x.value=location;
      });


  function update_likes(like_button_id,likes_id, q_id, c_id)    // Like_button= q_q or c_id
     {
        var x = document.getElementById(like_button_id);
        var y = document.getElementById(likes_id);
        
        var z,n;
        if(x.innerHTML=="Like") {z= y.innerHTML -1 + 2; n=1;}
        else {z= y.innerHTML -1 ; n=-1; }

        var temp = "#"+likes_id ;
        $(temp).load('<?php echo base_url(); ?>like/',{likes: n, question_id: q_id, comment_id: c_id, username: "<?php if($status==$log1) echo $username ?>" });
        

        if(x.innerHTML=="Like") 
            {
                x.innerHTML = "Unlike";
            }
        else 
            {
                x.innerHTML = "Like";                
            }
            
     }

     function reportt_abuse(q_id, c_id)
     {
        //alert("hello");
        var x=document.getElementById('q_idd');
        x.value=q_id;
        //alert(x.value);
        x=document.getElementById('c_idd');
        x.value=c_id;
        x=document.getElementById('urll');
        x.value=location;
     }
     
  </script>


  <br>
  <br>
  <font size="2px"><center>!!! End of the content !!!<br>
    Designed and developed by : <font color="blue"><u><a href="<?php echo base_url().'iitk/users/triveni'; ?>" style="color:blue">Triveni</a></u>, <u><a href="<?php echo base_url().'iitk/users/robbins'; ?>" style="color:blue">Robbin</a></u> and <u><a href="<?php echo base_url().'iitk/users/vivkul'; ?>" style="color:blue">Viveka</a></u></font>
  </center></font>
  <br>


</body>
</html>