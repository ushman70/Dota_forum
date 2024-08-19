<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

$error = array();

// Sanitizer functions
function validate_input_text($textValue){
    if (!empty($textValue)){
        $trim_text = trim($textValue);
        // remove illegal character
        $sanitize_str = filter_var($trim_text, FILTER_SANITIZE_STRING);
        return $sanitize_str;
    }
    return '';
  }

  function validate_input_email($emailValue){
    if (!empty($emailValue)){
        $trim_text = trim($emailValue);
        // remove illegal character
        $sanitize_str = filter_var($trim_text, FILTER_SANITIZE_EMAIL);
        return $sanitize_str;
    }
    return '';
}


// Sanitized variables
$name = validate_input_text($_POST['Name']);
if (empty($name)){
    $error[] = "You forgot to enter your Name";
}
$password = validate_input_text($_POST['password']);
if (empty($password)){
    $error[] = "You forgot to enter your password";
}
// execute process
echo $Thread->login('user', $name, $password);







?>