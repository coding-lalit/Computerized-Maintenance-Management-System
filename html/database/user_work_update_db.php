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
$con = mysqli_connect('localhost', 'root', '','cmms');


// get the post records
$email = $_POST['email'];
$title = $_POST['title'];
$description = $_POST['description'];
$priority = $_POST['priority'];
$category = $_POST['category'];
$date = $_POST['date'];


// database insert SQL code

$sql ="UPDATE `work_info` SET `title`='$title', `description`='$description' ,`priority`='$priority',`category`='$category', `date`='$date' WHERE `id`='" . $_SESSION['id'] ."'";

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
			<p>Request Updated successfully</p>
		</div>
	</div>
</body>
<?php
	header('Refresh:1; url=/html/user/order.php');
    
}
else{
?>
<body>
<div role="alert">
<div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
	Error
</div>
<div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
	<p>Unable to update Request</p>
</div>
</div>
</body>
<?php
header('Refresh: 1; url=/html/user/order.php');
}
?>