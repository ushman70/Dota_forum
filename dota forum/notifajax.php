<?php
session_start();
require('functions.php');
$userid = $_POST['userid'];
$seen = $_POST['seen'];
$notifs = array_filter($Thread->throwawaynotif($_SESSION['user_id']));
if($userid != null){
   $Thread->updatethrowawaynotif($userid,$seen);
} 
 



?>

<span class="notif-close">&times;</span>
        <div class="notif-items">
           <?php 
           
           foreach ($notifs as $general) {
              $stringchange = strlen($general['reply']) > 10 ? substr($general['reply'], 0, -120) . '....' : $general['reply'];
            switch ($general) {
              case $general['general_message'] === '' && $general['blocked'] === 'false' && $general['reply'] !== '':
                echo "
                <a href='#'>
                <div class='server-rendered-container'>
                  <div class='server-rendered-flex-items'>
                    <div><img src='$general[profile_img]' class='server-rendered-img'/></div>
                    <div>$general[reply]</div>
                    <div>Toggle</div>

                  </div>
                </div></a>";
               break;
               case $general['general_message'] === '' && $general['blocked'] === 'true':
                null;
               break;
               case $general['reply'] === '' && $general['blocked'] === 'false' && $general['general_message'] !== '':
                echo "<div>$general[general_message]</div>";
               break;
              
              
              
            }
           }
                   
                   
                  
                
               
            
           

          

           


           
           ?>
           
        </div>