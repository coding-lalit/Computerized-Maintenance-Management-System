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
// Include database connection file
$con = mysqli_connect('localhost', 'root', '','cmms');

$rs = mysqli_query($con,"DELETE FROM `register_info` WHERE `id`='" . $_GET['id'] . "';");


if($rs)
{?>
	<body>
    <div role="success">
        <div class="bg-green-500 text-white font-bold rounded-t px-4 py-2">
            Success
        </div>
        <div class="border border-t-0 border-green-400 rounded-b bg-green-100 px-4 py-3 text-white-700">
            <p>User Deleted Successfully.</p>
        </div>
    </div>
</body><?php
	header('Refresh: 1; url=/html/admin/user.php');
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
</body><?php
header('Refresh: 1; url=/html/admin/user.php');
}
?>