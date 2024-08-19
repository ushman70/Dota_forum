<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
echo $test = substr(md5(mt_rand()),0,15);
echo '<br>';
echo $test;
echo '<br>';

if(isset($_POST['submit'])){
  require('signup_process.php');
}

if(isset($_POST['destroy'])){
 session_destroy();
}

$badwords = array('poop', 'dick');
$name = 'I am poop dick poop';


function badwords_func($name, $badwords){
  $count = 0;
  foreach ($badwords as $substring) {
    $count += substr_count( $name, $substring);
}
return $count;

}
 $result = badwords_func($name, $badwords);
  if($result > 0){
    echo 'success';
  } else {
    echo 'failure';
  }


     

















?>
<!DOCTYPE html>
<html language="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <link href="./forum.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <title>Dota Forums</title>
</head>
<body style="background-color:black;">
  <header class="header-pos">
      <a class="header-colors" href="signup.php">Sign Up |</a>
      <a class="header-colors" href="#">Pro Videos |</a>&nbsp;
      <a class="header-colors" href="#">Highlights of the week |</a>&nbsp;
      <a class="header-colors" href="#">Tools to help you win |</a>&nbsp;
      <a class="header-colors" href="#">Blogs |</a>&nbsp;
      <a class="header-colors" href="">Coaching |</a>
  </header>
  <img class="head-logo" src="images/dota-2-russia.png" width="100%" height="100%"/>
  <div class="signup text-center text-white pl-0"> 
    <h1 class="text-white">Sign Up</h1>
    <form method='post' onsubmit="return vali();" enctype="multipart/form-data">
    <label for="Profile Upload" class="lupload">Profile Pic</label>
    <br>
    <input class="upload" type="file" name="uploadprof" required name="uploadprof"/>
    <br>
    <label for="Email">Email</label>
    <input class="email" type="email" name="email" required name="email"/>
    <br>
    <label for="Name">Name</label>
    <input class="name" type="text" name="name" required name="name"/>
    <br>
    <label  class="re-pass" for="Password">Password</label>
    <input id="pass" class="pass" type="password" name="password" required name="password"/>
    <br>
    <label  class="lcpass" for="Confirm Password">Confirm Password</label>
    <input id="cpass" class="cpass" type="password" name="cpassword" required name="cpassword"/>
    <br>
    <input type="hidden" id="g-token" name="g-token"/>
    <button type="submit" name="submit">Sign Up</button>  
    </form>
    <form method="post">
    <button type="submit" name="destroy">Destroy</button> 
    </form>
    <?php if($error == empty($error)){echo 'empty';}else{echo $error[0] . '<br>' . $error[1] . '<br>' . $error[2];}
    ?>
  </div>



  





<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://www.google.com/recaptcha/api.js?render=6LfQjLMcAAAAAErhatwk4GYIjJzXYOLimBfKRtLj"></script>
<script>
      
        
        grecaptcha.ready(function() {
          grecaptcha.execute('6LfQjLMcAAAAAErhatwk4GYIjJzXYOLimBfKRtLj', {action: 'submit'}).then(function(token) {
            document.getElementById('g-token').value = token;
          });
        });
      
  </script>




</body>
</html>
