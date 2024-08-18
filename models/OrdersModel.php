<?php
include_once '././helpers/ConnectToDB.php';

function get_orders(){
    $con = connectToDB();
    $data =$con->query("SELECT * FROM orders");
    return $data->fetch_all();
}
?>
