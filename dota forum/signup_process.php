<?php
session_start();
require('functions.php');
$_SESSION['error'] = true;


// Sanitizer functions
function validate_input_text($textValue){
    if (!empty($textValue)){
        $trim_text = trim($textValue);
        // remove illegal character
        $sanitize_str = filter_var($trim_text, FILTER_SANITIZE_STRING);
        return $sanitize_str;
    }
   
  }

  function validate_input_email($emailValue){
    if (!empty($emailValue)){
        $trim_text = trim($emailValue);
        // remove illegal character
        $sanitize_str = filter_var($trim_text, FILTER_SANITIZE_EMAIL);
        return $sanitize_str;
    }
   
}

function upload_profile($path, $file){
    $targetDir = $path;
    $default = "beard.png";

    // get the filename
    $filename = basename($file['name']);
    $targetFilePath = $targetDir . $filename;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    If(!empty($filename)){
        // allow certain file format
        $allowType = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
        if(in_array($fileType, $allowType)){
            // upload file to the server
            if(move_uploaded_file($file['tmp_name'], $targetFilePath)){
                return $targetFilePath;
            }
        }
    }

    // return default image
    return $path . $default;
}

// End sanitizer functions

// Variables for input fields
$error = array();
$badwords = array('poop', 'dick');
$badwordsfilter = "/(" . implode("|", $badwords) . ")/";
$files = $_FILES['uploadprof'];
$profileImage = upload_profile('./images/uploads/', $files);
$email = validate_input_email($_POST['email']);
if (empty($email)){
    $error[] = "You forgot to enter your Email";
}
$name = validate_input_text($_POST['name']);
if (empty($name)){
    $error[] = "You forgot to enter your Name";
}
$password = validate_input_text($_POST['password']);
if (empty($password)){
    $error[] = "You forgot to enter your Password";
}
$confirm_password = validate_input_text($_POST['cpassword']);
if (empty($email)){
    $error[] = "You forgot to confirm your password";
}
$hashed_pass = password_hash($password, PASSWORD_DEFAULT);

if(isset($_POST) && isset($_POST['submit'])){
    $secretkey = '6LfQjLMcAAAAALHVXCVF2J9HCfwuJ4ZsrfjZGpAZ';
    $token = $_POST['g-token'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $url = "https://www.google.com/recaptcha/api/siteverify?secret=" . $secretkey . "&response=" . $token . "&remoteip=" . $ip;
    $request = file_get_contents($url);
    $response = json_decode($request);
    if($response->success){
        if($confirm_password != $password){
            $error[] = "Confirm password is different from your password";
        } else{
            if(is_string($Thread->signup('user', $name, $profileImage, $email, $hashed_pass))){
                if($Thread->signup('user', $name, $profileImage, $email, $hashed_pass) == "That name already exists" || "This email already exists"){
                    $error[] = $Thread->signup('user', $name, $profileImage, $email, $hashed_pass);
                }
        
               
            } else {
                for ($i=0; $i < $badwords; $i++) { 
                    $count = 0;
                    $result = strpos($name, $badwords[$i]);
                    if($result === true){
                        $count++;
                    }
                    return $count;
                }
                  if($count > 0){
                      return $error[] = "potty mouth";
                  }
                   else {
                    $Thread->signup('user', $name, $profileImage, $email, $hashed_pass);
                   }
                
                    
                
                
               


                
            }
         
        }
    } else {
        echo 'failure';
    }

}
else {
    echo 'failure';
}










?>