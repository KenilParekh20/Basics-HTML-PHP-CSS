<?php
//   date_default_timezone_set('Asia/Kolkata');
//    echo date('d/m/Y').'<br/>';
//    echo date('d.m.Y').'<br/>'; 
//    echo date('D/M/y').'<br/>';
//    echo date('F d, Y h:i:s a').'<br/>';
//    $timestamp = time();
//     echo($timestamp).'<br/>';
    $dob = mktime(0,0,0,20,11,2005);
    echo date('Y/m/d H:i:s').'<br/>';
    $ndate = mktime(0,0,0,date('m',$dob),date('d')+60,date('Y'));
    echo date('Y/m/d H:i:s',$ndate).'<br/>';
    echo date('D',$ndate).'<br/>';
?>

