<form method="post">
    Row<input type="number" name="txtrow" placeholder="Enter rows count"/>
    Column<input type="number" name="txtcol" placeholder="Enter column count"/>
    <button type="submit" name="btnCreate">Generate</button>
    </form>
    <?php   
    $rows = $_REQUEST['txtrow'];
    $col = $_REQUEST['txtcol'];
    echo $rows.'  '.$col;
    ?>
<table border="1">
    <?php
    for($r=0;$r<$rows;$r++){
        echo "<tr>";
    for($c=0;$c<$col;$c++){
        echo "<td><input type='number'/ ></td>";
    }
    echo "</tr>";
    }
    ?>
    
 <!-- <table border="1">
//     <tr>
//         <th>Sr.</th>
//         <th>Name</th>
//         <th>Status</th>
//     </tr>
//      <tr>
//         <td>1</td>
//         <td>Kenil</td>
//         <td>Active</td>
//     </tr>
//     <tr>
//         <td>2</td>
//         <td>KP</td>
//         <td>Deactive</td>
//     </tr>
// </table> -->