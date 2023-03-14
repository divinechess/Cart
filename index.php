<?php
include( 'index.html' );
//include('db_connect.php');
include_once('db_functions.php');
$result = cart_items($db);
$num_rows = $result->num_rows;
$img_location = ""

?>
<div id ="form">
<form action="cart2.php" method="GET">

    <table>
        <?php
        for($i=0; $i <$num_rows; $i++) {
            $row = $result->fetch_assoc();
            //echo "<tr>";
            echo "<th>" . $row['ProductName'] . "</th>";
            $image[$i] = $row['ImageId'];
            $id[$i] = $row['Id'];
            //echo "</tr>";
            echo "<br>";
        }
        $count = count($image);
        echo "<tr>";
        //var_dump($image);
        for($i=0; $i <$count; $i++) {


            ?><td><img src="images/<?php echo $image[$i];?>"  height="200" width="200" alt="" ><img></td>


        <?php
        }
        echo "</tr>";
        echo "<tr>";
        for($i=0; $i <$count; $i++) {





            if(!$count -1){
                ?>
            <?php echo "<td  id=\"data\" >"?> <a href="cart2.php?id=<?php echo "$id[$i]" . "&btn=add"; ?>"> <button type="button" class="btn btn-primary">Add</button></a>
            <a href="cart2.php?id=<?php echo "$id[$i]" . "&btn=rem"; ?>">  <button type="button" class="btn btn-danger">Remove</button></a>
            </td> <?php

            }



        }
        echo "</tr>";
        ?>




        </table>



</form>


</div>

</div>


</body>
</html>
