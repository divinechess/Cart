<?php
session_start();
include( 'index.php' );
include_once( 'index.html' );
include ('db_connect.php');
include_once('db_functions.php');
include_once('output_functions.php');
$total =0;
$btn = '';

$refreshButtonPressed = isset($_SERVER['HTTP_CACHE_CONTROL']) &&
    $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';

if (isset($_GET['btn']) && $refreshButtonPressed == false) {
    $result = get_product($_GET['id'],$db);
    $btn = $_GET['btn'];
    $row = $result->fetch_assoc();

}



if ($btn =='add' ) {

    if (!(isset($_SESSION["cart"]))) {        // if the cart is not set create one
        $_SESSION["cart"] = array();
        $_SESSION["cart"] [$row['ProductName']] = 1; // add the new product and assign it the quantity of 1
        //var_dump($_SESSION["cart"] [$row['ProductName']]);
        $_SESSION["total_price"] = '0.00';
    } elseif (!(isset($_SESSION["cart"] [$row['ProductName']]))) {  // we already have a cart but we dont have this product in the cart
        $_SESSION["cart"] [$row['ProductName']] = 1;          // add a quantity to the new product
    } else {
        $_SESSION["cart"] [$row['ProductName']]++;           //If already have this product we add 1 more
    }

}elseif ($btn =='rem') {
    if ($_SESSION["cart"] [$row['ProductName']] != 0){
        $_SESSION["cart"] [$row['ProductName']]--;
        //$_SESSION["Price"] -= $price[$product];
    }


}

display_cart ($_SESSION["cart"],$db);








//session_destroy();


echo "<br />";
echo "<br />";

