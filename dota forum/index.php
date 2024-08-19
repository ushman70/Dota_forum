<?php
error_reporting(0);
session_start();
echo $_SESSION['tracker'];
echo $_SESSION['Name'];
require ('functions.php');
if($_SESSION['user_id'] == null){
  $user =0;
} else{
  $user=2;
}
if(isset($_POST['Login'])){
  require('login_process.php');

  
  
}









//Display youtube embedded video

function convertYoutube($string) {
	return preg_replace(
		"/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
		"<iframe class=\"Youtube-vid-home\" src=\"//www.youtube.com/embed/$2\" allowfullscreen></iframe>",
		$string
	);
}
$i = 0;

if($_SESSION['user_id'] != null){
  $notifs = array_filter($Thread->throwawaynotif($_SESSION['user_id']));
}
$selectuser = array_column($Thread->selectalluser(), 'user_id');

$_SESSION['tracker'] = 1;





















?>
<!DOCTYPE html>
<html language="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <link href="./forum.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="fontawesome/css/all.css">

  <title>Dota Forums</title>
</head>
<body style="background-color:black;">
  <header class="header-pos">
      <a class="header-colors" href="signup.php">Sign Up |</a>
      <a class="header-colors" href="#myModal" data-toggle="modal">Login |</a>&nbsp;
      <a class="header-colors" href="#">Highlights of the week |</a>&nbsp;
      <a class="header-colors" href="#">Tools to help you win |</a>&nbsp;
      <a class="header-colors" href="#">Blogs |</a>&nbsp;
      <a class="header-colors" href="">Coaching |</a>
  </header>
  <div class="notif-shown text-center">
    <span class="notif-shown-item">3</span>
  </div>
  <div class="notification-display">
    <div class="notification-inline">
      <p class="welcome-name">Welcome Ash</p>
      <a id="bell-icon" data-userid=<?php echo $_SESSION['user_id']?>>
        <i class="bell-icon fas fa-bell fa-2x" data-backdrop="true"></i>
      </a>
      <div class="notif-container" id="notif-container">
        <span class="notif-close">&times;</span>
        <div class="notif-items">
           <?php 
           if($_SESSION['user_id'] != null){
            foreach ($merged as $notif) {
              switch ($notif) {
                case $notif['reply'] === null:
                  echo '';
                 break;
                 case $notif['blocked'] === 'true':
                  echo '';
                 break;
                 
                
                default:
                echo "<div>$notif[reply]</div>";
                  
                  break;
              }
             }
  
             foreach ($merged as $general) {
              switch ($general) {
                case $general['general_message'] === null:
                  echo '';
                 break;
                
                default:
                echo "<div>$general[general_message]</div>";
                  
                  break;
              }
             }
  
           } else {
             echo "You must be logged in";
           }
        
           


           
           ?>
           
        </div>
      </div>
    </div>
  </div>
  <img class="head-logo" src="images/dota-2-russia.png"/>
  <!-- Modal HTML -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<form action="index.php" method="post">
				<div class="modal-header bg-secondary">				
					<h4 class="modal-title">Login</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">				
					<div class="form-group">
						<label><strong>Name</strong></label>
						<input type="text" class="form-control" required="required-Name" name="Name">
					</div>
					<div class="form-group">
						<div class="clearfix">
							<label><strong>Password</strong></label>
							<a href="#" class="float-right text-muted"><small>Forgot?</small></a>
						</div>
						
						<input type="password" class="form-control" required="required-password" name="password">
					</div>
				</div>
				<div class="modal-footer justify-content-between bg-secondary">
					<label class="form-check-label"><input type="checkbox"> Remember me</label>
					<input type="submit" class="btn btn-primary" name="Login">
				</div>
			</form>
		</div>
	</div>
</div> 
   <!-- End Modal --> 

 <div class="master-container">
  <div class="container-fluid mx-0 px-0 mb-3 text-center">
    <h2 class="list text-dark bg-secondary">Dota Forums</h2>
    <ul class="position text-white">
      <?php foreach($Main->getMainSecs('main_section') as $section){
        $thread_rows = $Main->getmainsecthreads($section['thread_name']);
        ?>
      <li><img src="<?php echo $section['thread_image']?>" class="main-sec-image"/> <a class="inherit" href="<?php echo $section['thread_link']?>"><br><span class=""><?php echo $section['thread_name']?></span><span class="thread-display"><small>Threads: <?php echo $thread_rows?></small></span></li></a>
      <li><i class="space-glyph fas fa-comments"></i> <span class="num-adjuster">3</span></li>
      <?php }?>
      
    </ul>
  </div>
  <?php foreach($Thread->displayblog() as $blog){?>
  <div class="sister-container"> 
    <strong>
      <h4 class="blog-name-display text-center bg-secondary">
      <?php echo $blog['blog_name']?>
      </h4>
    </strong>
    <p class="time-home-display bg-secondary">
      <strong>Posted:</strong>
      <i class="far fa-clock fa-xs"></i>
      <small class="time-text text-light">
        <?php echo timeago($blog['date']) ?>
      </small>
      <i class="view-icon far fa-eye fa-sm"></i>
      <span class="check-zindex">
        <small class="text-light">5</small>
      </span>
    </p>
    <div class="blog-video-display">
      <?php echo convertYoutube($blog['blog_link'])?>
    </div>
    <p class="home-blog-descrip text-light">
      <?php echo $blog['blog_descrip']?>
    </p> 
  </div>
  <?php }?>
  </div>

 





<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="fontawesome/js/all.js"></script>
<script>


  // Get the modal
var modal = document.getElementById("notif-container");
function closeModal() {
  modal.style.display = "none"
}



// Get the button that opens the modal
var btn = document.getElementById("bell-icon");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("notif-close")[0];
var img = document.getElementsByClassName("head-logo")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event){
  if (event.target == img) {
    modal.style.display = "none";
  } 
}
</script>
<script type="text/javascript">
  
  $( document ).ready(function() {
    $(document).on('click', '#bell-icon',
  function(){
  var userid = $(this).data("userid");
  var updatetoseen = 'true';
  $.ajax({
    url:'notifajax.php',
    type:'post',
    headers: {
      'Access-Control-Allow-Origin': '*',
    },
    data:'userid='+userid+'&seen='+updatetoseen,
    success:function(result){
       
       $(".notif-container").html(result);
      
     }
  });
  
  })
  })

</script>

</body>
</html>
