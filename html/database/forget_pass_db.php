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
    <title>Login</title>
</head>
<body>


<?php   
$email = $_POST['email'];
$new_password = $_POST['new_password'];
$confirm_password = $_POST['confirm_password'];

$con = mysqli_connect('localhost', 'root', '','cmms');

$sql = "SELECT * FROM `register_info` WHERE `email`='$email';";

if($confirm_password==$new_password){
$result = mysqli_query($con, $sql);
$rowcount = mysqli_num_rows( $result );
    if($rowcount>0){
        $update = "UPDATE `register_info` SET `password`='$new_password' WHERE `email`='$email';";
        $rs = mysqli_query($con, $update);
        if($rs){
        ?>
                <body>
                <div role="success">
                    <div class="bg-green-500 text-white font-bold rounded-t px-4 py-2">
                        Success
                    </div>
                    <div class="border border-t-0 border-green-400 rounded-b bg-green-100 px-4 py-3 text-white-700">
                        <p>Password Updated successfully</p>
                    </div>
                </div>
            </body>
        <?php
        header('Refresh:1; /html/login/login_pg.php');
        }
        else{
            ?>
            <body>
            <div role="alert">
            <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                Error
            </div>
            <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                <p>Unable to update password</p>
            </div>
            </div>
            </body>
            <?php
            header('Refresh:1; /html/login/login_pg.php');
        }
    }

    else {
    ?>
    <body>
        <div role="alert">
        <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
            Error
        </div>
        <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
            <p>Email not found</p>
        </div>
        </div>
        </body>
        <?php
        header('Refresh:1; /html/login/login_pg.php');
    }
}
else{
    ?>
    <body>
    <div role="alert">
    <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
        Error
    </div>
    <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
        <p>new password and confirm password did not match</p>
    </div>
    </div>
    </body>
    <?php
}

?>