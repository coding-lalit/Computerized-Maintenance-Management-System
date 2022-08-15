<?php
session_start();
?>

<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'root', '','cmms');

// get the post records
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$building = $_POST['building'];
$floor = $_POST['floor'];
$flat = $_POST['flat'];

// database insert SQL code

$sql = "INSERT INTO `register_info` (`first_name`,`last_name`,`email`,`mobile`,`password`,`building`,`floor`,`flat`) VALUES ('$first_name','$last_name','$email','$mobile', '$password','$building','$floor','$flat')";
$login = "INSERT INTO `login_info`(`email`,`password`) VALUES ('$email','$password')";
// insert in database 
$rs = mysqli_query($con, $sql);
$ls = mysqli_query($con, $login);

if($rs)
{
	if($ls){
		header('Location: /html/login/login_pg.php');
	}
	else{
		echo "error";
	}
}

?>