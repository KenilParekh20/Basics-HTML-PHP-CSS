  <!-- create php script to find out day of your date of birth.
   write a script to find out day of week 18th birthday -->

<?php
    $dob = mktime(0,0,0,20,11,2005);
    echo date('D/M/Y').'<br/>';
    echo date('F d, Y h:i:s a').'<br/>';
    $timestamp = time();
    echo($timestamp).'<br/>';
    $dob = mktime(0,0,0,20,11,2005);
    echo date('D',$dob).'<br/>';
?>

