<?php
include_once '././helpers/ConnectToDB.php';

function get_categories(){
    $con = connectToDB();
    $data =$con->query("SELECT * FROM categories");
    return $data->fetch_all();
}
?>
