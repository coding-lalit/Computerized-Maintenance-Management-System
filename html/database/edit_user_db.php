<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<body>


<?php
session_start();
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'root', '','cmms');

// get the post records
$first_name = $_GET['first_name'];
$last_name = $_GET['last_name'];
$email = $_GET['email'];
$mobile = $_GET['mobile'];
$building = $_GET['building'];
$floor = $_GET['floor'];
$flat = $_GET['flat'];
$role = $_GET['role'];
$id = $_GET['id'];

// database insert SQL code

$sql = "UPDATE `register_info` SET `first_name`='$first_name',`last_name`='$last_name',`mobile`='$mobile',`building`='$building',`floor`='$floor',`flat`='$flat' ,`role`='$role' WHERE `id`='$id';";

$rs = mysqli_query($con, $sql);


if($rs)
{?>
	<body>
    <div role="success">
        <div class="bg-green-500 text-white font-bold rounded-t px-4 py-2">
            Success
        </div>
        <div class="border border-t-0 border-green-400 rounded-b bg-green-100 px-4 py-3 text-white-700">
            <p>User Updated Successfully.</p>
        </div>
    </div>
</body>
<?php

    header ('Refresh:1; url=/html/admin/user.php');
}
else{
?>
	<body>
    <div role="alert">
        <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
            Error
        </div>
        <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
            <p>Something not ideal might be happening.</p>
        </div>
    </div>
</body>
<?php
header ('Refresh:50; url=/html/admin/user.php');


}
?>