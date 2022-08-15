<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
<title>Success</title>
</head>
<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'root', '','cmms');

// get the post records
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$field = $_POST['field'];


// database insert SQL code

$sql = "INSERT INTO `workers_info` (`name`,`email`,`mobile`,`field`) VALUES ('$name','$email','$mobile','$field')";

// insert in database 
$rs = mysqli_query($con, $sql);


if($rs)
{?>
	<body>
    <div role="success">
        <div class="bg-green-500 text-white font-bold rounded-t px-4 py-2">
            Success
        </div>
        <div class="border border-t-0 border-green-400 rounded-b bg-green-100 px-4 py-3 text-white-700">
            <p>Worker added Successfully.</p>
        </div>
    </div>
</body><?php
	header('Refresh: 1; url=/html/admin/workers.php');
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
header('Refresh: 1; url=/html/admin/workers.php');
}
?>
</html>