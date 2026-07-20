<!-- pallindrome or not -->
<form method="post">
    <input type="text" name="myinput" placeholder="Enter a string">
    <input type="submit" value="Check"> 
</form>
<?php
    $data = $_POST["myinput"];
    $rev = strrev($data);
    if($data == $rev) {
        echo "String is a palindrome.";
    } else {
        echo "Not a palindrome.";
    }