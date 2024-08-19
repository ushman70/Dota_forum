<?php
session_destroy();
session_start();
$_SESSION = array();

?>
<h1>You have been timed out!</h1>
<a href="index.php"><button>GO home</button></a>