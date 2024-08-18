<?php
include_once '././helpers/ConnectToDB.php';

function get_prodeucts(){
    $con = connectToDB();
    $data =$con->query("SELECT * FROM products");
    return $data->fetch_all();
}
?>
