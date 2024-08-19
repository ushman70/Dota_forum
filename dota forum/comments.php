<?php
session_start();

require('functions.php');
$topic = $_GET['topic'];
$sesh = $_SESSION['user_id'];
$time = date('Y/m/d');
$offset = 10;
if(isset($_POST['offset'])){
  $_SESSION['counter'] += 1;
 } 
 $_SESSION['counter'];
 if($_SESSION['user_id'] && $topic != null){
  $check =$Thread->checkpageviews($topic,$sesh);
  if($check != 1){
    $Thread->insertpageview($topic,$sesh);
  }
  
 }

 if(isset($topic)){
   $check = $Thread->testcheckpageviews($topic);
   if($check >= 1){
    $Thread->testupdateviewcount($topic);
   } else {
     $Thread->testinsertpageview($topic);
   }
 }


 $tester = $Thread->checkcomments($topic);

 switch ($tester) {
  case $tester < 10:
     $test = 0;
       $result = $Thread->getrealcomments2($topic);
      break;
  case $tester >= 10:
    $test = 1;
       $result = $Thread->getrealcomments($topic, $offset);
      break;
  case 2:
      echo "i equals 2";
      break;
}






?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="forum.css">
    <link rel="stylesheet" href="node_modules/bootstrap/fonts/glyphicons-halflings-regular.eot">
    <link rel="stylesheet" href="node_modules/bootstrap/fonts/glyphicons-halflings-regular.svg">
    <link rel="stylesheet" href="node_modules/bootstrap/fonts/glyphicons-halflings-regular.ttf">
    <link rel="stylesheet" href="node_modules/bootstrap/fonts/glyphicons-halflings-regular.woff">
    <link rel="stylesheet" href="node_modules/bootstrap/fonts/glyphicons-halflings-regular.woff2">
    <title>Document</title>
</head>
<body id="html-reparse" style="background-color: black;" class="">

  <header class="header-pos">
      <a class="header-colors" href="signup.php">Sign Up |</a>
      <a class="header-colors" href="#myModal" data-toggle="modal">Login |</a>&nbsp;
      <a class="header-colors" href="#">Highlights of the week |</a>&nbsp;
      <a class="header-colors" href="#">Tools to help you win |</a>&nbsp;
      <a class="header-colors" href="#">Blogs |</a>&nbsp;
      <a class="header-colors" href="">Coaching |</a>
  </header>
  <a href="index.php"><img class="head-logo" src="images/dota-2-russia.png" width="100%" height="100%"/></a>
  <textarea class="post-comment"></textarea>
  <button class="post-comment-button" onclick="post_comment('<?php echo base64_encode($_GET['topic'])?>', '<?php echo base64_encode($sesh)?>', '<?php echo $time?>')">Post</button>
<?php 
if(isset($_GET['topic'])){
    
  echo $test;
     $i= 0;
     $real_comments =  $Thread->getrealcomments($topic, $offset);
    foreach ($result as $comment) {
      $codedtopic =base64_encode($comment['topic']);
      $user= $Thread->displayuserinfo($comment['user_id']);
      

?>
<div class="date-header">
  <small>
    <?php echo timeago($comment['date']);?>
</small>
</div>
<div class="comment_instance">
  <?php echo $banvar = $_SESSION['admin'] === 'true' ? "<button onclick=admin_delete_comment($comment[comment_id],'$codedtopic');>Delete</button>" : '' ;?>
</div>
<div class="bg-secondary">
    <ul class="user-info-display bg-secondary">
      <li class="user-comment-color-name">User: 
        <?php echo $user[0]['Name']?>
      </li>
      <li class="user-comment-color-posted">Posted: 
        <strong>
          <?php echo timeago($comment['date']);?>
        </strong>
      </li>
    </ul>
    <img src="<?php echo $user[0]['profile_img']?>" alt="A pic" class="user-image">
    <?php echo $adminstatus = $user[0]['admin'] == 'true' ? "<div class=\"admin-status\">Admin</div>" : null ?>
</div>
  
<div class="real_comment bg-secondary">
  <div class="text-light vl"></div>
  <p class="true-comment">
    <?php echo $comment['comment']?>
  </p>
</div>
  
  <div class="form">
   <span class="like-button<?php echo $comment['comment_id'];?> glyphicon glyphicon-thumbs-up <?php echo $thisvar = $Thread->checklikes($comment['comment_id'], $comment['topic'], $sesh) == 1 ? 'text-primary': 'text-light';?>"  onclick="like_update('<?php echo $comment['comment_id']?>','<?php echo base64_encode($comment['topic'])?>', '<?php echo base64_encode($sesh)?>');">
    <?php $buffer_likes = $Thread->displaylikes($comment['comment_id'],$comment['topic']);?>
    <?php echo $buffer_likes?>&nbsp;Like
   </span>
  </div>
 </div>
  
  <a class="modal-reply-color" data-target="<?php echo $comment['comment_id'];?>">reply</a>
  <div class="reply_modal" data-reply-modal="<?php echo $comment['comment_id']?>">
    <textarea class="reply_area"></textarea>
    <button class="reply_cancel_toggle" data-target="<?php echo $comment['comment_id']?>">
    Cancel
    </button>
    <button class="reply_submit_toggle" data-target="<?php echo $comment['comment_id']?>" data-userid="<?php echo base64_encode($sesh)?>" data-topic="<?php echo base64_encode($comment['topic'])?>" data-replied-to="<?php echo $comment['user_id']?>" data-negation-key="false">
    Reply
    </button>
  </div>
  
<?php echo $spawnedit = $_SESSION['user_id'] == $comment['user_id'] ? ". <a class=\"edit_toggle\" data-target=\"$comment[comment_id]\">edit</a>" : '' ?>
<div class="edit_modal" data-edit-modal="<?php echo $comment['comment_id']?>">
  <textarea class="edit_area"></textarea>
  <button class="cancel_toggle" data-target="<?php echo $comment['comment_id']?>">Cancel</button>
  <button class="update_toggle" data-target="<?php echo $comment['comment_id']?>" data-userid="<?php echo base64_encode($sesh)?>" data-topic="<?php echo base64_encode($comment['topic'])?>">Update</button>
</div>
<?php
 
  $get_replies = $Thread->getrealreplies($comment['topic'], $comment['comment_id']); 
    foreach($get_replies as $replies){
      $user= $Thread->displayuserinfo($replies['user_id']);
      if($comment['replied_to'] === 'true'){
   
  ?>
    <div>
      <ul class="user-reply-display">
        <li><img src="<?php echo $user[0]['profile_img']?>" alt="" class="user-reply-image"></li>
        <li class="user-reply-name"><?php echo $user[0]['Name']?></li>
        <li><small class="date-header">Posted on: <?php echo timeago($replies['date']);?></small></li>
      </ul>
    </div>
    <div>
      <p class="reply-color"><?php echo $replies['reply']?></p>
      <a class="modal-reply-color" data-target="<?php echo $replies['reply_id'];?>">reply</a>
      <div class="reply_modal" data-reply-modal="<?php echo $replies['reply_id']?>">
        <textarea class="reply_area">@<?php echo $user[0]['Name']?></textarea>
        <button class="reply_cancel_toggle" data-target="<?php echo $replies['reply_id']?>">
        Cancel
        </button>
        <button class="reply_submit_toggle" data-target="<?php echo $comment['comment_id']?>" data-userid="<?php echo base64_encode($sesh)?>" data-topic="<?php echo base64_encode($comment['topic'])?>" data-negation-key="true" data-replied-to="<?php echo $comment['user_id']?>">
         Reply
        </button>
      </div>
    </div>
    <?php 
      }    
    }
    
    ?>


<?php }
    }
 
 
?>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
function like_update(id,topic,sesh){
  var key = 'like_update';
  $.ajax({
    url:'admin_delete_comment.php',
    type:'post',
    headers: {
      'Access-Control-Allow-Origin': '*',
    },
    data:'topic='+topic+'&commentid='+id+'&userid='+sesh + '&key=' + key,
    success:function(result){
       console.log(key);
      $("#html-reparse").html(result);
     }
  });
}


function admin_delete_comment(id, topic){
  var key = 'admin_delete_comment';
  $.ajax({
    url:'admin_delete_comment.php',
    type:'post',
    headers: {
      'Access-Control-Allow-Origin': '*',
    },
    data:'topic='+topic+'&commentid='+id + '&key=' + key,
    success:function(result){
       console.log(id);
      $("#html-reparse").html(result);
     }
  });
}

function post_comment(topic, sesh, date){
  var key = 'post_comment';
  var comment_val = $('.post-comment').val();
  $.ajax({
    url:'admin_delete_comment.php',
    type:'post',
    headers: {
      'Access-Control-Allow-Origin': '*',
    },
    data:'topic='+topic+'&userid='+sesh+'&key=' + key + '&comment=' + comment_val + '&date=' + date,
    success:function(result){
       console.log(key);
      $("#html-reparse").html(result);
     }
  });
}
$( document ).ready(function() {
    console.log( "ready!" );
    
    //enable edit toggle
    $(document).on('click', '.edit_toggle',
  function(){
  var val = $(this).data("target");
  var data = $('.edit_modal').data("edit-modal");
  $('[data-edit-modal=' + val + ']').toggle('slow');
  console.log(val);
  
  })
   //cancel edit toggle
  $(document).on('click', '.cancel_toggle',
  function(){
  var val = $(this).data("target");
  var data = $('.edit_modal').data("edit-modal");
  $('[data-edit-modal=' + val + ']').toggle('slow');
  
  })

  //Edit and update your comment
  $(document).on('click', '.update_toggle',
  function(){
  var key= 'update_comment'
  var form = $(this).closest('.edit_modal');
  var commentid = $(this).data("target");
  var sesh = $(this).data("userid");
  var topic = $(this).data("topic");
  var update_val = form.find('.edit_area').val();
  $.ajax({
    url:'admin_delete_comment.php',
    type:'post',
    headers: {
      'Access-Control-Allow-Origin': '*',
    },
    data:'topic='+topic+'&userid='+sesh+'&key=' + key + '&updatedcomment=' + update_val + '&commentid=' + commentid,
    success:function(result){
       console.log(key);
       $("#html-reparse").html(result);
      
     }
  });
  
  
  })

   //enable reply toggle
   $(document).on('click', '.modal-reply-color',
  function(){
  var val = $(this).data("target");
  $('[data-reply-modal=' + val + ']').toggle('slow');
  console.log(val);
  
  })

  //cancel reply toggle
  $(document).on('click', '.reply_cancel_toggle',
  function(){
  var val = $(this).data("target");
  $('[data-reply-modal=' + val + ']').toggle('slow');
  
  })

// submit reply
  $(document).on('click', '.reply_submit_toggle',
  function(){
  var form = $(this).closest('.reply_modal');
  var id = $(this).data("target");
  var sesh = $(this).data("userid");
  var topic = $(this).data("topic");
  var reply_val = form.find('.reply_area').val();
  var key = 'reply_comment';
  var date = '<?php echo $time?>';
  var negationkey = $(this).data("negation-key");
  var replied_to = $(this).data("replied-to");
  $.ajax({
    url:'admin_delete_comment.php',
    type:'post',
    headers: {
      'Access-Control-Allow-Origin': '*',
    },
    data:'topic='+topic+'&commentid='+id+'&userid='+sesh+'&reply='+reply_val + '&key=' + key + '&date=' + date + '&negationkey=' + negationkey + '&replied_to_userid=' + replied_to,
    success:function(result){
      console.log(id, reply_val, date);
      $("#html-reparse").html(result);
      
      
      
                
  
    }
  });
 })
 
 
 $(document.body).on('touchmove', onScroll);
 $(window).on('scroll', onScroll); 
 function onScroll(){ 
    if( $(window).scrollTop() + window.innerHeight >= document.body.scrollHeight ) { 
      var offset = 3;
      var topic = '<?php echo base64_encode($topic)?>';
      $.ajax({
    url:'admin_delete_comment.php',
    type:'post',
    headers: {
      'Access-Control-Allow-Origin': '*',
    },
    data:'offset=' + offset + '&topic=' + topic,
    success:function(result){
      
      $("#html-reparse").html(result);
      console.log('offset triggered');
    }
  });
    }
}


});
 


</script>
</body>
</html>








