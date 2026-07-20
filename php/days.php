<!-- create script to fond out day and date after 60 days from today. -->
<?php
    $timestamp = time();
    echo($timestamp).'<br/>';
    $timestamp = $timestamp + (60 * 24 * 60 * 60);
    echo date('D/M/Y', $timestamp).'<br/>';
?>