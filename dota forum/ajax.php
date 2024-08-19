<?php 
session_start();
require ('functions.php');
$Thread->insertlike('likes',$_POST['userid'], $_POST['threadlink'], $_POST['commentid']);



?>



<input type="hidden" class="userid" value="123">
      <input type="hidden" class="threadlink" value="index.php">
      <input type="hidden" class="commentid" value="1">
      <button class="click" style="height: 25px; width: 100px;" <?php echo $thisvar = $Thread->checklikes('likes') == 1 ? 'disabled' : '' ;?>>click me</button>

