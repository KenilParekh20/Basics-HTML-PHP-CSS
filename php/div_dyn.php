<!-- create page to display divs with appropriate colors based on value/colors available in given array. -->
 <?php 
  $colors=array("red","green","blue","yellow","orange");
    foreach($colors as $color){
        echo "<div style='background-color:$color;width:100px;height:100px;
        margin:10px;display:inline-block;padding:50px;'>$color</div>";
    }
 ?>