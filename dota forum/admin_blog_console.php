<?php
session_start(); 
require('functions.php');

// Important variables
$time = date('Y/m/d H:i:s');
if(isset($_POST['submit'])){
    $Thread->addblog($_POST['blog_name'],$_POST['blog_link'],$_POST['blog_descrip'],$_POST['date']);
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
    <form method="post">
       <input type="text" name="blog_name">
       <input type="text" name="blog_link">
       <input type="text" name="blog_descrip">
       <input type="hidden" name="date" value="<?php echo $time?>">
       <button type="submit" name="submit"></button>

    </form>
</body>
</html>