<?php
session_start();
?>

<?php
// Include database connection file
$con = mysqli_connect('localhost', 'root', '','cmms');

$rs = mysqli_query($con,"DELETE FROM `work_info` WHERE `id`='" . $_GET['id'] . "';");


if($rs)
{
	header('Refresh: 0; url=/html/admin/order.php');
    
}
else
header('Refresh: 0; url=/html/admin/order.php');
?>