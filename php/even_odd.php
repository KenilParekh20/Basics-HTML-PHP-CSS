<!-- Accept one number from user whether there is even0 or odd. -->
 <?php
    if(isset($_REQUEST['btnCheck']))
      {
         $num=$_REQUEST['txtnum'];
         if($num % 2 == 0)
            echo $num. ' is even';
         else 
            echo $num. ' is odd';
      }
?>
<!-- User Input -->
 <form method = "get">
    <input type="number" name="txtnum"/>
    <button type="submit" name="btnCheck">Check</button>
 </form>


