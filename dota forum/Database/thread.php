<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
class thread
{
    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    public function getthreadsMatchup($table='thread'){
        $result = $this->db->con->query("SELECT * FROM {$table} WHERE thread_name='Matchups'");

        $resultArray = array();

        // fetch to display from DB
        while ($section = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $section;
        }

        return $resultArray;
    }

    public function displaylikes($commentid, $topic){
        if($this->db->con != null){
       $query = "SELECT * FROM likes WHERE comment_id='$commentid' AND topic='$topic'";
       $stmnt = $this->db->con->query($query);
       $stmnt2= $stmnt->num_rows;
       return $stmnt2;
        }
    }

    public function checklikes($commentid, $topic, $sesh){
        if($this->db->con != null){
       $query = "SELECT * FROM likes WHERE comment_id='$commentid' AND topic='$topic' AND user_id='$sesh'";
       $stmnt = $this->db->con->query($query);
       $stmnt2= $stmnt->num_rows;
       return $stmnt2;
        }
    }

    public function decodechecklikes($true_commentid, $decode_topic, $true_userid){
        if($this->db->con != null){
       $query = "SELECT * FROM likes WHERE comment_id='$true_commentid' AND topic='$decode_topic' AND user_id='$true_userid'";
       $stmnt = $this->db->con->query($query);
       $stmnt2= $stmnt->num_rows;
       return $stmnt2;
        }
    }

    public function insertlike($sesh=null, $topic=null, $commentid=null){
        if($this->db->con != null){
            $sesh = $_POST['userid'];
            $topic = $_POST['topic'];
            $commentid = $_POST['commentid'];
            
            $query = "
            INSERT INTO likes
            (user_id, topic, comment_id) 
            VALUES (?, ?, ?)";
           $stmnt = $this->db->con->prepare($query);
           $stmnt->bind_param("isi", $sesh, $topic, $commentid);
           $stmnt->execute();
           
            }
    }

    public function decodeinsertlike($true_userid , $decode_topic, $true_commentid){
        if($this->db->con != null){
            $query = "
            INSERT INTO likes
            (user_id, topic, comment_id) 
            VALUES (?, ?, ?)";
           $stmnt = $this->db->con->prepare($query);
           $stmnt->bind_param("isi", $true_userid, $decode_topic, $true_commentid);
           $stmnt->execute();
           
            }
    }

    public function deletelike($sesh=null, $topic=null, $commentid=null){
        if($this->db->con != null){
            $sesh = $_POST['userid'];
            $topic = $_POST['topic'];
            $commentid = $_POST['commentid'];
            $query = "DELETE FROM likes WHERE user_id='$sesh' AND comment_id='$commentid' AND topic='$topic'";
            $stmnt = $this->db->con->query($query);
        }
    }

    public function decodedeletelike($true_userid , $decode_topic, $true_commentid){
        if($this->db->con != null){
            $query = "DELETE FROM likes WHERE user_id='$true_userid' AND comment_id='$true_commentid' AND topic='$decode_topic'";
            $stmnt = $this->db->con->query($query);
        }
    }

    public function signup($table='user', $name=null, $files=null, $email=null, $hashed_password=null){
        if($this->db->con != null){
            
           // Check if name is currently being used
              $query = "
              SELECT * FROM user WHERE Name=?";
              $stmnt = $this->db->con->prepare($query);
              $stmnt->bind_param("s", $name);
              $stmnt->execute();
              $stmnt->store_result();
              $name_record_checker = $stmnt->num_rows;
              if($name_record_checker == 1){
                
               return $error[]="That name already exists";
            } else {
                $stmnt->close();
                // Check if email is being used
              $query2 = "
              SELECT * FROM user WHERE email=?
              ";
              $stmnt2 = $this->db->con->prepare($query2);
              $stmnt2->bind_param("s", $email);
              $stmnt2->execute();
              $stmnt2->store_result();
              $email_record_checker = $stmnt2->num_rows;
              if($email_record_checker == 1){
               return $error[] = "This email already exists";
             } else{
                $stmnt2->close();
                $status = 'unverified';
                $admin = 'false';
                $verification_code = substr(md5(mt_rand()),0,15);
                // Insert into DB
                $query3 = "
            INSERT INTO user (Name, profile_img, email, Password, status, admin, verification_code)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmnt3 = $this->db->con->prepare($query3);
            $stmnt3->bind_param("sssssss", $name, $files, $email, $hashed_password, $status, $admin, $verification_code);
            $stmnt3->execute();
            $check = $stmnt3->affected_rows;
            if($check == 1){
                session_start();
                // Logs new user in
                $_SESSION['user_id'] = $stmnt3->insert_id;
                $sesh = $_SESSION['user_id'];
                $stmnt3->close();
                $query4="SELECT * FROM user WHERE user_id={$sesh}";
                $stmnt4 = $this->db->con->query($query4);
                $row = $stmnt4->fetch_array(MYSQLI_ASSOC);
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['Name'] = $row['Name'];
                $_SESSION['profile_img'] = $row['profile_img'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['admin'] = $row['admin'];
                $_SESSION['status'] = $row['status'];
                $_SESSION['verification_code'] = $row['verification_code'];
                

                try{
                    $mail = new PHPMailer();
                    $local = 'localhost:8080/dota%20forum/';
                    // SMTP Settings
                    $mail->isSMTP();
                    $mail->Host = "smtp.gmail.com";
                    $mail->SMTPAuth = true;
                    $mail->Username = "ushman70@gmail.com";
                    $mail->Password = "longitude";
                    $mail->Port = 587;
                    $mail->SMTPSecure = "tls";
                    //Email Settings
                    $mail->isHTML(true);
                    $mail->setFrom("ushman70@gmail.com", "Dota Forum");
                    $mail->addAddress($email);
                    $mail->Subject = "Email verification required";
                    $mail->CharSet="utf-8";
                    $verification_link = "<p>Please click this<a href='http://localhost:8080/dota forum/email-verification.php?email=" . $email . "&code=" . $verification_code . "'>link</a> to verify your email</p>";
                    $mail->MsgHTML($verification_link);
                    if($mail->send()){
                      header("Location: index.php");
                    }
                  } catch(Exception $e){
                    echo "Message could not be sent Mailer Error: {$mail->ErrorInfo}";
                  }

              }
             }
            }
            
              
            
           
            }
    }
    public function login($table, $name, $password){
        if($this->db->con != null){

         // Check if name exists
         $query = "
         SELECT * FROM user WHERE Name=?";
         $stmnt = $this->db->con->prepare($query);
         $stmnt->bind_param("s", $name);
         $stmnt->execute();
         $stmnt->store_result();
         $name_record_checker = $stmnt->num_rows;
         if($name_record_checker == 0){
            return $error[] = "This name does not exist";
         } else {
             
             if(empty($error)){
                if($name_record_checker == 1){
                    $stmnt->close();
                    $query = "
         SELECT * FROM user WHERE Name=?";
         $stmnt = $this->db->con->prepare($query);
         $stmnt->bind_param("s", $name);
         $stmnt->execute();
         $row = $stmnt->get_result();
                    while ($data = $row->fetch_assoc()) {
                        $static = $data;
                        if(password_verify($password, $static['Password'])){
                             $_SESSION['Name'] = $static['Name'];
                             $_SESSION['user_id'] = $static['user_id'];
                             $_SESSION['profile_img'] = $static['profile_img'];
                             $_SESSION['email'] = $static['email']; 
                             $_SESSION['admin'] = $static['admin'];
                             
                             
                             
                         } else{
                             return $error[] = "invalid password or user";
                           
                           }   
                    }
                }
                



             }
         }
        }
    }

    public function updatetoverified($table='user', $email){
        if($this->db->con != null){
        $query="UPDATE user SET status='verified' WHERE email='$email'";
        $stmnt = $this->db->con->query($query);
        } else {
            return 'not working';
        }
        if(isset($_SESSION['status'])){
            $_SESSION['status'] = 'verfied';
        }
       
    }

    public function gettopicsforcomments($topic){
        $result = $this->db->con->query("SELECT * FROM thread WHERE topic='$topic'");

        $resultArray = array();

        // fetch to display from DB
        while ($section = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $section;
        }

        return $resultArray;
    }

    public function checkcomments($topic){
        if($this->db->con != null){
       $query = "SELECT * FROM comments WHERE topic='$topic'";
       $stmnt = $this->db->con->query($query);
       $stmnt2= $stmnt->num_rows;
       return $stmnt2;
        }
    }

    public function getrealcomments($topic, $offset){
        $result = $this->db->con->query("SELECT * FROM comments WHERE topic='$topic' ORDER BY date LIMIT 0, $offset");

        $resultArray = array();

        // fetch to display from DB
        while ($section = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $section;
        }

        return $resultArray;
    }

    public function getrealcomments2($topic){
        $result = $this->db->con->query("SELECT * FROM comments WHERE topic='$topic' ORDER BY date LIMIT 10");

        $resultArray = array();

        // fetch to display from DB
        while ($section = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $section;
        }

        return $resultArray;
    }

    public function getrealreplies($topic, $commentid){
        $result = $this->db->con->query("SELECT * FROM reply WHERE topic='$topic' AND comment_id='$commentid' ORDER BY date");

        $resultArray = array();

        // fetch to display from DB
        while ($section = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $section;
        }

        return $resultArray;
    }
    public function selectallatcommentid($commentid){
        $result = $this->db->con->query("SELECT user_id FROM reply WHERE comment_id=$commentid");

        $resultArray = array();
    
        // fetch to display from DB
        while ($section = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            
            $resultArray[] = $section;
        }
    
        return $resultArray;
    }

    public function insertreply($commentid, $reply, $topic, $sesh, $time, $replied_to_userid){
        if($this->db->con != null){
            $blocked = 'false';
            $seen = 'false';
            $general_message = '';
            $commentid = $_POST['commentid'];
            $query2="UPDATE comments SET replied_to='true' WHERE comment_id='$commentid'";
            $stmnt2 = $this->db->con->query($query2);

            $query = "
            INSERT INTO reply
            (comment_id, reply, topic, user_id, date) 
            VALUES (?, ?, ?, ?, ?)";
           $stmnt = $this->db->con->prepare($query);
           $stmnt->bind_param("issis", $commentid, $reply, $topic, $sesh, $time);
           $stmnt->execute();
           
           $query = "
        INSERT INTO notifications
        (user_id, replied_to_userid, reply, general_message ,blocked, seen, date) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";
       $stmnt = $this->db->con->prepare($query);
       $stmnt->bind_param("iisssss", $sesh, $replied_to_userid, $reply, $general_message,$blocked, $seen, $time);
       $stmnt->execute();
       $stmnt->close();
           
           
            }
    }

    public function deleteselfnotif($sesh){
        $query = "DELETE FROM notifications WHERE user_id=$sesh AND replied_to_userid=$sesh";
        $this->db->con->query($query);

    }

    public function insertreplynotifyall($commentid, $reply, $topic, $sesh, $time, $replied_to_userid){
        if($this->db->con != null){
            $blocked = 'false';
            $seen = 'false';
            $general_message = '';
            $commentid = $_POST['commentid'];
            $query2="UPDATE comments SET replied_to='true' WHERE comment_id='$commentid'";
            $stmnt2 = $this->db->con->query($query2);

            $query = "
            INSERT INTO reply
            (comment_id, reply, topic, user_id, date) 
            VALUES (?, ?, ?, ?, ?)";
           $stmnt = $this->db->con->prepare($query);
           $stmnt->bind_param("issis", $commentid, $reply, $topic, $sesh, $time);
           $stmnt->execute();
           

       foreach (array_column($this->selectallatcommentid($commentid), 'user_id') as $users) {
        $general_message ='';
        $blocked ='false';
        $seen = 'false';
        $query = "
        INSERT INTO notifications
        (user_id, replied_to_userid, reply ,general_message, blocked, seen, date) 
        VALUES(?, ?, ?, ?, ?, ?, ?)";
        $stmnt = $this->db->con->prepare($query);
        $stmnt->bind_param("iisssss", $sesh, $users, $reply, $general_message, $blocked, $seen, $time);
        $stmnt->execute();
           
    }

    $this->notify($sesh, $reply, $general_message, $blocked, $seen, $time, $replied_to_userid);
    $this->deleteselfnotif($sesh);
           
           
            }
    }
    public function notify($userid, $reply, $general_message,$blocked, $seen, $time, $replied_to_userid){
        $blocked = 'false';
        $seen = 'false';
        $general_message = '';

        $query = "
        INSERT INTO notifications
        (user_id, replied_to_userid, reply, general_message ,blocked, seen, date) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";
       $stmnt = $this->db->con->prepare($query);
       $stmnt->bind_param("iisssss", $userid, $replied_to_userid, $reply, $general_message,$blocked, $seen, $time);
       $stmnt->execute();
       $stmnt->close();
    }

    public function admin_delete_comment($commentid, $decode_topic){
        if($this->db->con != null){
            $commentid = $_POST['commentid'];
            $query = "DELETE FROM comments WHERE comment_id='$commentid' AND topic='$decode_topic'";
            $stmnt = $this->db->con->query($query);
        }
    }

    public function insertcomment($sesh, $comment, $topic, $date){
        if($this->db->con != null){
            $replied_to = 'false';
            $query = "
            INSERT INTO comments
            (user_id,comment,topic,replied_to, date) 
            VALUES (?, ?, ?, ?, ?)";
           $stmnt = $this->db->con->prepare($query);
           $stmnt->bind_param("issss", $sesh, $comment, $topic, $replied_to, $date);
           $stmnt->execute();
           $stmnt->close();
            
           
           
            }
    }

    public function updatecomment($sesh, $comment, $topic, $commentid){
        if($this->db->con != null){
           $replied_to = 'true';
           $query = "DELETE FROM comments WHERE user_id='$sesh' AND topic='$topic' AND comment_id='$commentid'";
           $stmnt = $this->db->con->query($query);

           $query2= "INSERT INTO comments
           (comment_id,user_id,comment,topic,replied_to) 
           VALUES (?, ?, ?, ?, ?)";
           $stmnt2 = $this->db->con->prepare($query2);
           $stmnt2->bind_param("iisss", $commentid, $sesh, $comment, $topic, $replied_to);
           $stmnt2->execute();
           $stmnt2->close();

    
            
           
           
            }
    }

    public function displayuserinfo($userid){
        $result = $this->db->con->query("SELECT * FROM user WHERE user_id='$userid'");

        $resultArray = array();

        // fetch to display from DB
        while ($section = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $section;
        }

        return $resultArray;
    }

    public function jointabletest($userid){
        $result = $this->db->con->query("SELECT * FROM notifications LEFT JOIN user ON user.user_id = notifications.user_id WHERE notifications.user_id = '$userid'");

        $resultArray = array();

        // fetch to display from DB
        while ($section = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $section;
        }

        return $resultArray;
    }

    public function addblog($blogname,$bloglink,$blogdescrip,$date){
        if($this->db->con != null){
           $query = "INSERT INTO blogs
           (blog_name,blog_link,blog_descrip,date)
            VALUES(?,?,?,?)";
           $stmnt = $this->db->con->prepare($query);
           $stmnt->bind_param("ssss", $blogname,$bloglink,$blogdescrip,$date);
           $stmnt->execute();
           $stmnt->close();

           

    
            
           
           
        }
    }

    public function insertpageview($topic,$userid){
        if($this->db->con != null){
           $query = "INSERT INTO page_views
           (topic,user_id)
            VALUES(?,?)";
           $stmnt = $this->db->con->prepare($query);
           $stmnt->bind_param("si", $topic,$userid);
           $stmnt->execute();
           $stmnt->close();

           

    
            
           
           
        }
    }

    public function checkpageviews($topic,$userid){
        if($this->db->con != null){
       $query = "SELECT * FROM page_views WHERE topic='$topic' AND user_id='$userid'";
       $stmnt = $this->db->con->query($query);
       $stmnt2= $stmnt->num_rows;
       return $stmnt2;
        }
    }

    public function displayblog(){
        $result = $this->db->con->query("SELECT * FROM blogs ORDER BY DATE DESC LIMIT 3");

        $resultArray = array();

        // fetch to display from DB
        while ($section = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $section;
        }

        return $resultArray;
    }

    public function testinsertpageview($topic){
        if($this->db->con != null){
            $view = 1;
           $query = "INSERT INTO test_views
           (topic, view_count)
            VALUES(?,?)";
           $stmnt = $this->db->con->prepare($query);
           $stmnt->bind_param("si", $topic, $view);
           $stmnt->execute();
           $stmnt->close();

           

    
            
           
           
        }
    }

    public function testupdateviewcount($topic){
        if($this->db->con != null){
        $query="UPDATE test_views SET view_count= view_count +1  WHERE topic='$topic'";
        $stmnt = $this->db->con->query($query);
        } 
        
       
    }

    public function testcheckpageviews($topic){
        if($this->db->con != null){
       $query = "SELECT * FROM test_views WHERE topic='$topic'";
       $stmnt = $this->db->con->query($query);
       $stmnt2= $stmnt->num_rows;
       return $stmnt2;
        }
    }

    public function createthread($threadname,$post,$name,$date,$userid,$replied_to, $thread_subject){
        $replied_to="true";
        if($this->db->con != null){
           $query = "INSERT INTO comments
           (user_id,comment,topic,replied_to,date)
            VALUES(?,?,?,?,?)";
           $stmnt = $this->db->con->prepare($query);
           $stmnt->bind_param("issss", $userid,$post,$threadname,$replied_to,$date);
           $stmnt->execute();

           
        $thread_subject = "Matchups";
        $thread_creator = $_SESSION['Name'];
        if($this->db->con != null){
           $query = "INSERT INTO thread
            (topic,thread_name,date,thread_creator)
             VALUES(?,?,?,?)";
            $stmnt = $this->db->con->prepare($query);
            $stmnt->bind_param("ssss", $threadname,$thread_subject,$date,$thread_creator);
            $stmnt->execute();
            $stmnt->close();
            header("Location: comments.php?topic=$threadname");

        }
        
            
    }

}

public function throwawaynotif($userid){
    if($userid != null){
        $result = $this->db->con->query("SELECT * FROM notifications LEFT JOIN user ON user.user_id=notifications.replied_to_userid WHERE notifications.replied_to_userid='$userid' ORDER BY notifications.date DESC");

    $resultArray = array();

    // fetch to display from DB
    while ($section = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $resultArray[] = $section;
    }

    return $resultArray;

    } 
    
}

public function updatethrowawaynotif($userid,$seen){
    $updatequery = "UPDATE notifications SET seen='true' WHERE replied_to_userid=$userid";
    $stmnt = $this->db->con->query($updatequery);

    $result = $this->db->con->query("SELECT * FROM notifications WHERE replied_to_userid=$userid ORDER BY DATE DESC");

    $resultArray = array();

    // fetch to display from DB
    while ($section = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        
        $resultArray[] = $section;
    }

    return $resultArray;
}

public function selectalluser(){
    $result = $this->db->con->query("SELECT user_id FROM user");

    $resultArray = array();

    // fetch to display from DB
    while ($section = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        
        $resultArray[] = $section;
    }

    return $resultArray;
}

// Function works for inserting multiple rows into a query
public function specanon(){
    foreach (array_column($this->selectalluser(), 'user_id') as $users) {
        
        $message = 'anon';
        $query = "
        INSERT INTO notifications
        (user_id, general_message) 
        VALUES(?, ?)";
        $stmnt = $this->db->con->prepare($query);
        $stmnt->bind_param("is", $users, $message);
        $stmnt->execute();
           
    }
    
}

    


}


?>