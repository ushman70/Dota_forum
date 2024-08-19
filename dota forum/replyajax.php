<?php 
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require ('functions.php');
$sesh = $_SESSION['user_id'];
$topic = $_POST['topic'];
$decode_topic = base64_decode($_POST['topic']);
$decode_userid = base64_decode($_POST['userid']);
$decode_commentid = base64_decode($_POST['commentid']);
$true_commentid = intval($decode_commentid);
$true_userid = intval($decode_userid);

// Sanitize the reply or comment
function validate_input_text($textValue){
    if (!empty($textValue)){
        $trim_text = trim($textValue);
        // remove illegal character
        $sanitize_str = filter_var($trim_text, FILTER_SANITIZE_STRING);
        return $sanitize_str;
    }
   
  }

  $reply = validate_input_text($_POST['reply']);
  if($_POST['reply'] == ''){
    echo"<script>alert('This field cannot be empty!')</script>";
  } else {
    $Thread->insertreply($_POST['commentid'], $reply, $decode_topic, $true_userid);
  }





  







?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body id="html-reparse">
<?php 
if(isset($decode_topic)){
    
     $i= 0;
     $real_comments =  $Thread->getrealcomments($decode_topic);
    foreach ($real_comments as $comment) {
        

?>
<div class="div"><?php echo $comment['topic']?></div>
<div><?php echo $comment['comment']?>&nbsp;<?php echo $comment['comment_id']; ?></div>
  <div class="form">
   <button class="like-button<?php echo $comment['comment_id'];?>" style="<?php echo $thisvar = $Thread->checklikes($comment['comment_id'], $comment['topic'], $sesh) == 1 ? 'color:blue;': '';?>" onclick="like_update('<?php echo $comment['comment_id']?>','<?php echo base64_encode($comment['topic'])?>', '<?php echo base64_encode($sesh)?>');">
<?php $buffer_likes = $Thread->displaylikes($comment['comment_id'],$comment['topic']);?>
<?php echo $buffer_likes?>&nbsp;Like</button></div>
  </div>
  <a data-toggle="modal" data-target="#replyModal<?php echo $comment['comment_id'];?>">reply</a>
  <div class="modal fade" id="replyModal<?php echo $comment['comment_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
    </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="reply_box<?php echo $comment['comment_id'];?>" class="col-form-label">Reply:</label>
            &nbsp;<textarea name="reply_box" class="reply_box<?php echo $comment['comment_id'];?>" cols="30" placeholder="Enter reply..."></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="reply-button" onclick="reply('<?php echo $comment['comment_id']?>','<?php echo base64_encode($comment['topic'])?>', '<?php echo base64_encode($sesh)?>');">Reply</button>
      </div>
    </div>
  </div>
</div> 
<?php
  $get_replies = $Thread->getrealreplies($comment['topic'], $comment['comment_id']); 
    foreach($get_replies as $replies){
      if($comment['replied_to'] === 'true'){
   
  ?>
    <div> &nbsp;<?php echo $replies['reply']?></div>
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
  $.ajax({
    url:'ajax2.php',
    type:'post',
    headers: {
      'Access-Control-Allow-Origin': '*',
    },
    data:'topic='+topic+'&commentid='+id+'&userid='+sesh,
    success:function(result){
       
      $("#html-reparse").html(result);
     

      
       
       
      
      
      
                
  
    }
  });
}

function reply(id,topic,sesh){
  var reply_val = $('.reply_box'+id).val();
  $.ajax({
    url:'replyajax.php',
    type:'post',
    headers: {
      'Access-Control-Allow-Origin': '*',
    },
    data:'topic='+topic+'&commentid='+id+'&userid='+sesh+'&reply='+reply_val,
    success:function(result){
      console.log(id);
      $("#html-reparse").html(result);
      
      
                
  
    }
  });
}
</script>
</body>
</html>