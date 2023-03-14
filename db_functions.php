<?php
include('db_connect.php');

function cart_items($db){
    $query = "select * from product;";
    $result = array();
    return $result = $db->query($query);

}


function get_product($id,$db){
    $query = "select * from product where Id =$id;";
    $result = array();
    $result = $db->query($query);
    return $result;

}

function get_price($name,$db){
    $query = "select Price from product where ProductName ='$name';";
    $result = array();
    $result = $db->query($query);
    $row = $result->fetch_assoc();
    return $row['Price'];

}


//$result = calc_price(1,$db);
//$row = $result->fetch_assoc();
// var_dump($row);


