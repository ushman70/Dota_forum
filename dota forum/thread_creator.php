<?php 
session_start();


function validate_input_text($textValue){
    if (!empty($textValue)){
        $trim_text = trim($textValue);
        // remove illegal character
        $sanitize_str = filter_var($trim_text, FILTER_SANITIZE_STRING);
        return $sanitize_str;
    }
   
  }

  $threadname = validate_input_text($_POST['threadname']);
  $threadname = preg_replace('/\s+/', '_', $threadname);
  $post = validate_input_text($_POST['post']);
  $name = $_SESSION['Name'];
  $date = date('Y/m/d');
  $userid = $_SESSION['user_id'];
  $Thread->createthread($threadname,$post,$name,$date,$userid,$replied_to, $thread_creator, $thread_subject);
  
  
  




print_r($_POST);

?>