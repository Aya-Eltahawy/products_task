<?php
include_once '././helpers/ConnectToDB.php';

function get_users(){
    $conn = connectToDB();
    $data =$conn->query("SELECT * FROM users");
    return $data->fetch_all();
}

function get_specific_user($email, $password){
    $conn = connectToDB();
    $data = $conn->query('SELECT * FROM users WHERE email = "'.$email.'"and password ="'.$password.'"');
    return $data->fetch();
}

function register($username, $email, $password, $phone){
    $conn = connectToDB();
    $sql = 'INSERT INTO users (username, email, password, phone, type)
            VALUES (:username, :email, :password, :phone, "client")';
    $stmt = $conn->prepare($sql);

    $stmt->bindParam('username', $username);
    $stmt->bindParam('email', $email);
    $stmt->bindParam('password', $password);
    $stmt->bindParam('phone', $phone);

    $stmt->execute();

}
function check_exist_email($email){
    $conn= connectToDB();
    $data = $conn->query('SELECT * FROM users WHERE email =" '.$email.'"');
}


?>
