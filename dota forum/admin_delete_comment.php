<?php
session_start();
require('functions.php');
error_reporting(0);
$sesh = $_SESSION['user_id'];
$topic = $_POST['topic'];
$decode_userid = base64_decode($_POST['userid']);
$decode_commentid = base64_decode($_POST['commentid']);
$true_commentid = intval($decode_commentid);
$true_userid = intval($decode_userid);
$decode_topic = base64_decode($_POST['topic']);
$commentid = $_POST['commentid'];
$time = date('Y/m/d');

if(isset($_POST['offset'])){
  $_SESSION['counter'] += 1;
 } 
$seshcounter = $_SESSION['counter'];
 $offset = 10 + $seshcounter;


// sanitizer function
function validate_input_text($textValue){
  if (!empty($textValue)){
      $trim_text = trim($textValue);
      // remove illegal character
      $sanitize_str = filter_var($trim_text, FILTER_SANITIZE_STRING);
      return $sanitize_str;
  }
 
}
// make url clickable
function makeClickableLinks($text){
  return preg_replace('!(((f|ht)tp(s)?://)[-a-zA-Zа-яА-Я()0-9@:%_+.~#?&;//=]+)!i', '<a href="$1" target="_blank">$1</a>', $text);
}

// censor swear words
function censor($string)
{
if ($string)
{
    //badwordsarray
    $badwords = array('shit', 'fuck', 'bitch');
    //replacearray                      
    $replace =  array('s**t', 'f**k', 'b***h'); 

    $newstring = str_ireplace($badwords, $replace, $string);
    return $newstring;
 }
}
 


// Admin can delete comments
if($_POST['key'] == 'admin_delete_comment'){
  $Thread->admin_delete_comment($commentid, $decode_topic);
}

// Update likes
if($_POST['key'] == 'like_update'){
  if($Thread->decodechecklikes($_POST['commentid'],$decode_topic,$true_userid) == 1){
    $Thread->decodedeletelike($true_userid , $decode_topic, $_POST['commentid']);
} else {
    $Thread->decodeinsertlike($true_userid , $decode_topic, $_POST['commentid']);
    
 }
}

// Insert reply
if($_POST['key'] == 'reply_comment'){
$reply = validate_input_text($_POST['reply']);
$time = validate_input_text($_POST['date']);
if($_POST['reply'] == ''){
  echo"<script>alert('This field cannot be empty!')</script>";
} else {
  if($_POST['negationkey'] == 'true'){
    $Thread->insertreply($_POST['commentid'], $reply, $decode_topic, $true_userid, $time, $_POST['replied_to_userid']);

  } else {
    $Thread->insertreplynotifyall($_POST['commentid'], $reply, $decode_topic, $true_userid, $time, $_POST['replied_to_userid']);
  }
  
  
 }
}

// post a comment
if($_POST['key'] == 'post_comment'){
  $true_comment = validate_input_text($_POST['comment']);
  $date = validate_input_text($_POST['date']);
 
  $Thread-> insertcomment($true_userid, $true_comment, $decode_topic, $date);
}

if($_POST['key'] == 'update_comment'){
  $censored = censor($_POST['updatedcomment']);
  $comment = validate_input_text($censored);
  $true_comment = makeClickableLinks($comment);
 $Thread->updatecomment($true_userid, $true_comment, $decode_topic, $_POST['commentid']);
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
<body id="html-reparse" style="background-color: black;">
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
  <button class="post-comment-button" onclick="post_comment('<?php echo base64_encode($decode_topic)?>', '<?php echo base64_encode($sesh)?>', '<?php echo $time?>')">Post</button>
<?php 
if(isset($decode_topic)){

  $tester = $Thread->checkcomments($decode_topic);

  switch ($tester) {
   case $tester < 10:
    $test = 0;
        $result = $Thread->getrealcomments2($decode_topic);
       break;
   case $tester >= 10:
    $test = 1;
        $result = $Thread->getrealcomments($decode_topic, $offset);
       break;
   case 2:
       echo "i equals 2";
       break;
 }
    echo $test;
     $i= 0;
     $real_comments =  $Thread->getrealcomments($decode_topic, $offset);
    foreach ($result as $comment) {
      $codedtopic =base64_encode($comment['topic']);
      $user= $Thread->displayuserinfo($comment['user_id']);

?>
<div class="date-header"><small><?php echo timeago($comment['date']);?></small></div>
<div class="comment_instance"><?php echo $banvar = $_SESSION['admin'] === 'true' ? "<button onclick=admin_delete_comment($comment[comment_id],'$codedtopic')>Delete</button>" : '' ?></div>
  <div class="bg-secondary">
    <ul class="user-info-display bg-secondary">
      <li class="user-comment-color-name">User: <?php echo $user[0]['Name']?></li>
      <li class="user-comment-color-posted">Posted: <strong><?php echo timeago($comment['date']);?></strong></li>
    </ul>
    <img src="<?php echo $user[0]['profile_img']?>" alt="A pic" class="user-image">
    <?php echo $adminstatus = $user[0]['admin'] == 'true' ? "<div class=\"admin-status\">Admin</div>" : null ?>
  </div>
  <div class="real_comment bg-secondary" >
    <div class="text-light vl"></div>
    <p class="true-comment"><?php echo $comment['comment']?></p>
  </div>
  
  <div class="form">
  <span class="like-button<?php echo $comment['comment_id'];?> glyphicon glyphicon-thumbs-up <?php echo $thisvar = $Thread->checklikes($comment['comment_id'], $comment['topic'], $sesh) == 1 ? 'text-primary': 'text-light';?>" onclick="like_update('<?php echo $comment['comment_id']?>','<?php echo base64_encode($comment['topic'])?>', '<?php echo base64_encode($sesh)?>');">
<?php $buffer_likes = $Thread->displaylikes($comment['comment_id'],$comment['topic']);?>
<?php echo $buffer_likes?>&nbsp;Like</span></div>
  </div>

  <a class="modal-reply-color" data-target="<?php echo $comment['comment_id'];?>">reply</a>
  <div class="reply_modal" data-reply-modal="<?php echo $comment['comment_id']?>">
    <textarea class="reply_area"></textarea>
    <button class="reply_cancel_toggle" data-target="<?php echo $comment['comment_id']?>">Cancel</button>
    <button class="reply_submit_toggle" data-target="<?php echo $comment['comment_id']?>" data-userid="<?php echo base64_encode($sesh)?>" data-topic="<?php echo base64_encode($comment['topic'])?>" data-negation-key="false">Reply</button>
</div>

<?php echo $spawnedit = $_SESSION['user_id'] == $comment['user_id'] ? ". <a class=\"edit_toggle\" data-target=\"$comment[comment_id]\">edit</a>" : '' ?>
<div class="edit_modal" data-edit-modal="<?php echo $comment['comment_id']?>" >
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
      <div class="reply_modal" data-reply-modal="<?php echo $replies['reply_id']?>">
        <textarea class="reply_area"></textarea>
        <button class="reply_cancel_toggle" data-target="<?php echo $replies['reply_id']?>">
        Cancel
        </button>
        <button class="reply_submit_toggle" data-target="<?php echo $comment['comment_id']?>" data-userid="<?php echo base64_encode($sesh)?>" data-topic="<?php echo base64_encode($comment['topic'])?>" data-negation-key="true">
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
 
</script>
</body>
</html>