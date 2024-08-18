<?php
session_start();
$title = 'login';
include_once 'models/UsersModel.php';
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $data_check = get_specific_user($_POST['email'], $_POST['password']);
    var_dump($data_check);
    if (is_array($data_check)){
        $_SESSION['email'] = $data_check['email'];
        $_SESSION['id'] = $data_check['id'];
        $_SESSION['username'] = $data_check['username'];

        header('location: index.php');
    }
}
include_once 'helpers/ConnectToDB.php';
include_once 'template/header.php';
?>

<div class="login">
    <div class="container">
        <h2>Login</h2>
        <?php
        if (isset($data_check)){
            if ($data_check == false){?>
                <p class="alert alert-danger" role="alert"><?php echo 'email not found'?></p>
                <?php }
        }
        ?>
        <form method="post">
            <div class="mb-2">
                <label for="">email</label>
                <input type="text" name="email" id="" class="form-control">
            </div>
            <div class="mb-2">
                <label for="">password</label>
                <input type="text" name="password" id="" class="form-control">
            </div>
            <input type="submit" class="btn btn-success w-100" value="login">
        </form>
    </div>
</div>
<?php
include_once 'template/footer.php';

