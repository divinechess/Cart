<?php
include ('db_connect.php');
include_once('db_functions.php');
include_once('cart2.php');

function order_total($subtotal, $flag =0){
  $total += $subtotal;
  if($flag){
      return $total;

  }

}

function display_cart ($cart,$db){
    $total =0;
    echo "<table>";
    echo "<tr>";
    foreach ($cart as $key => $value) {        //cycle through cart array items
        echo "<td  id=\"data\" >";


        //echo "$key" ."<br />";
        echo "Quantity: $value" ."<br />";

        //var_dump($row);
        $price = get_price($key,$db);
        echo "Price £" . $price ."<br />";
        //echo "Price £" . $row['Price'] ."<br />";
        //echo "Sub Total " . $subtotal = ($value *  $price)."<br />";
        $subtotal = ($value *  $price);
        $total += $subtotal;
        echo "Sub Total £" . $subtotal."<br />";
        echo "<br />";
        echo "</td>";
        echo "</div>";
        //$total += order_total($subtotal)."<br />";



    }
    echo "</tr>";
    echo "</table>";
//echo "Order Total " . order_total($value ,1)."<br />";
    echo "<div class=\"total\" >";
    echo "Order Total £" . $total."<br />";
    echo "</div>";



}




