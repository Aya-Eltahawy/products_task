<?php

include_once 'helpers/validate.php';

include_once 'models/OrdersModel.php';
$data = get_orders();
$employee_access = ['1', '2', '3','4'];
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container">
<!--    <br>-->
<!--    --><?php //include_once 'layout/form.php' ?>
<!--    <br>-->
    <?php if (isset($data) && sizeof($data) > 0){?>
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <th>Username</th>
            <th>Order-date</th>
            <th>status</th>
            <ht>Total_amount</ht>
            <th>Control</th>
            </thead>
            <tbody>
            <?php
            foreach ($data as $order){
                echo '<tr>';
                foreach ($employee_access as $access){
                    echo '<td>'.$order[$access].'</td>';
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
</body>
</html>

