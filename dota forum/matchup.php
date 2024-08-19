<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require ('functions.php');
if(isset($_POST['submit'])){
  
  require('thread_creator.php');
  
  
  
  
}

function removepadding($string)
{
if ($string)
{
    
    $padding = array('_');
    //replacearray                      
    $replace =  array(' '); 

    $newstring = str_ireplace($padding, $replace, $string);
    return $newstring;
 }
}











?>
<!DOCTYPE html>
<html language="en">
<head>
  <meta charset="utf-8">
  <link href="./forum.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dota Forums</title>
</head>
<body style="background-color:black;">
  <header class="header-pos">
      <a class="header-colors" href="#">Pro Videos |</a>&nbsp;
      <a class="header-colors" href="#">Highlights of the week |</a>&nbsp;
      <a class="header-colors" href="#">Tools to help you win |</a>&nbsp;
      <a class="header-colors" href="#">Blogs |</a>&nbsp;
      <a class="header-colors" href="#">Get Coaching</a>
  </header>
  <div class="m-container">
    <button id="spawnbutton" class="btn btn-secondary">Create thread</button>
  </div>
  <img src="images/dota-2-russia.png" class="head-logo"/>
  <div class="t-lister">
    <ul class="thread-lister" style="list-style-type:none;">
    <?php foreach($Thread->getthreadsMatchup('thread') as $section){?>
    <a href="comments.php?topic=<?php echo $section['topic']?>">
      <li class="thread-lister-dark">
        <strong><?php echo removepadding($section['topic'])?></strong>
      </li>
    </a>
      <small class="text-white">
        &nbsp;&nbsp;<?php echo $section['date']?>
      </small>
      <?php }?>
    </ul>
  </div>

  <div id="mythreadmodal" class="thread-modal">
    <div class="thread-modal-header text-center">
      <p class="thread-header-text">
        Create your thread
      </p>
    </div>
    <div class="thread-modal-content">
    <span class="close">&times;</span>
    <form method="post" class="bg-secondary text-center">
      <label for="threadname" class="text-light">Thread name:</label><br>
      <input type="text" id="threadname" name="threadname"><br>
      <label for="threadname" class="text-light">Post:</label><br>
      <input type="text" id="post" name="post"><br>
      <button type="submit" name="submit" class="btn btn-secondary">Submit</button>
    </form>
    </div>
  </div>





<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<script>
// Get the modal
var modal = document.getElementById("mythreadmodal");

// Get the button that opens the modal
var btn = document.getElementById("spawnbutton");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
</body>
</html>
