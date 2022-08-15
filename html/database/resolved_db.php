<?php
session_start();
?>

<?php
// Include database connection file
$con = mysqli_connect('localhost', 'root', '','cmms');

$date = date('d-m-Y');

$rs = mysqli_query($con,"UPDATE `contactus_info` set  status='Resolved' , date='$date' WHERE `id`='" . $_GET['id'] . "'");

	header('Refresh: 0; url=/html/admin/contact_info.php');
?>