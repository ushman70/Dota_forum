<?php
session_start();
require('functions.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);
$sesh = $_SESSION['user_id'];
$user = $Thread->displayuserinfo($sesh);
if($_GET['email'] && $_GET['code'] != null){
    if($_GET['code'] == $user[0]['verification_code']){
        $email =$_GET['email'];
        $Thread->updatetoverified('user',$email);
        if(is_string($Thread->updatetoverified('user', $email))){
        echo $Thread->updatetoverified('user', $email);  
    }
    

 } 


} 





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php echo $informer = $_SESSION == null ? "Please login first to be verified!!" : "You are now verified!"; ?>
<script type="text/javascript">
function myFunction() {
  function transFunc(){
      window.location.href = 'index.php';
  }
  myVar = setTimeout(transFunc, 2000);
}
myFunction();
</script>
</body>
</html>