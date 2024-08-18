<?php
//session_start();
include_once 'guard/check_user_login.php';

check_login();
//include_once 'helpers/validate.php';

include_once 'models/UsersModel.php';
$data = get_users();
if ($_SERVER['REQUEST_METHOD']=='POST'){
    $data=get_users('WHERE type = "'.$_POST['type'].'"');
}
$employee_access = ['1', '2', '4','5'];
$title = home;
include_once 'template/header.php';

?>

        <div class="container">
            <form method="post" class="mt-3">
                <div class="row">
                    <div class="col-6">
                        <select name="type" class="form-control">
                            <option value=" ">select type</option>
                            <option value="admin">admin</option>
                            <option value="client">client</option>

                        </select>
                    </div>
                    <div class="col-6">
                        <input type="submit" class="btn btn-success form-control">
                    </div>
                </div>
            </form>
            <br>
            <?php include_once 'layout/form.php' ?>
            <br>
            <?php if (isset($data) && sizeof($data) > 0){?>
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <ht>Type</ht>
                    <th>Control</th>
                </thead>
                <tbody>
                    <?php
                    foreach ($data as $user){
                        echo '<tr>';
                        foreach ($employee_access as $access){
                            echo '<td>'.$user[$access].'</td>';
                        }
                        echo '<td><button class="btn btn-primary">edit</button><button class="btn btn-primary">delete</button>';
                        echo "</tr>";
                    }

                    ?>
                </tbody>
            </table>
            <?php } else{
                echo '<p class="alert alert-danger text-center m-3">There is no data</p>';
            }?>

        </div>
<?php
include_once 'template/footer.php';
