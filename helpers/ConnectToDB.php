<?php
function connectToDB(){
//    $info = 'mysql:host=localhost; dbname=ecommerce';
//    $username = 'root';
//    $password = '';
//
//    $con = new PDO($info, $username, $password);

    $con = mysqli_connect('localhost', 'root', '', 'ecommerce');
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
//    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $con;
}
?>
