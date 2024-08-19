<?php

// require MySQL Connection
require ('Database/DBController.php');

// require Main_sections Class
require ('Database/Main_sections.php');

// require thread Class
require ('Database/thread.php');








// DBController object
$db = new DBController();

$Main = new Main_sections($db);

$Thread = new thread($db);


// Time passed function

date_default_timezone_set("America/New_York");
function timeago($time, $tense='ago') {
    static $periods = array('year', 'month', 'day', 'hour', 'minute', 'second');
    if(!(strtotime($time)>0)) {
        return trigger_error("Wrong time format: '$time'", E_USER_ERROR);
    }
    $now  = new DateTime('now');
    $time = new DateTime($time);
    $diff = $now->diff($time)->format('%y %m %d %h %i %s');
    $diff = explode(' ', $diff);
    $diff = array_combine($periods, $diff);
    $diff = array_filter($diff);
    $period = key($diff);
    $value  = current($diff);
    if(!$value) { 
      $period = '';
      $tense ='';
        $value  = 'just now';
    } else {
        if($period=='day' && $value>=7) {
            $period = 'week';
            $value  = floor($value/7);
        }
        if($value>1) {
            $period .= 's';
        }
    }
    return "$value $period $tense";
}





?>