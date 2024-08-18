<?php
session_start();
$title = 'register';
include_once 'models/UsersModel.php';
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $check_exist_email = check_exist_email($_POST['email']);
    if ($check_exist_email == false){
        $data_check = register($_POST['username'],$_POST['email'], $_POST['password'],$_POST['phone']);

    }
    var_dump($data_check);
    var_dump($check_exist_email);
}
include_once 'helpers/ConnectToDB.php';
include_once 'template/header.php';
?>

    <div class="register">
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
                    <label for="">username</label>
                    <input type="text" name="username" id="" class="form-control">
                </div>
                <div class="mb-2">
                    <label for="">email</label>
                    <input type="text" name="email" id="" class="form-control">
                    <?php
                    if (isset($check_exist_email) && is_array($check_exist_email)){
                        echo '<p class="alert alert-danger"> Email exist </p>';
                    }
                    ?>
                </div>
                <div class="mb-2">
                    <label for="">password</label>
                    <input type="text" name="password" id="" class="form-control">
                </div>
                <div class="mb-2">
                    <label for="">phone</label>
                    <input type="text" name="phone" id="" class="form-control">
                </div>
                <input type="submit" class="btn btn-success w-100" value="login">
            </form>
        </div>
    </div>
<?php
include_once 'template/footer.php';


