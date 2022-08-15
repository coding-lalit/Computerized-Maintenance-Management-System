<?php
session_start();
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');
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
$data_password = $_SESSION['password'];
$email = $_GET['email'];
$password = $_GET['password'];
$new_pass = $_GET['new_pass'];
$confirm_pass = $_GET['confirm_pass'];

if($confirm_pass==$new_pass){
    if($password==$data_password){
        $sql = "UPDATE `register_info` SET `password`='$new_pass' WHERE `email`='$email';";
        $rs = mysqli_query($con, $sql);
        if($rs)
        {
         ?>
           
            <body>
                <div role="success">
                    <div class="bg-green-500 text-white font-bold rounded-t px-4 py-2">
                        Success
                    </div>
                    <div class="border border-t-0 border-green-400 rounded-b bg-green-100 px-4 py-3 text-white-700">
                        <p>Password Updated successfully. Please login again to reload user information.</p>
                    </div>
                </div>
            </body>
            
            <?php
            session_destroy();
            session_start();
            
                $sql=mysqli_query($con,"SELECT * FROM register_info where email='$email'");
                
                //$row  = mysqli_fetch_array($sql);
                mysqli_num_rows( $sql );
                        $row = mysqli_fetch_array($sql);
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['first_name'] = $row['first_name'];
                        $_SESSION['last_name'] = $row['last_name'];
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['mobile'] = $row['mobile'];
                        $_SESSION['building'] = $row['building'];
                        $_SESSION['floor'] = $row['floor'];
                        $_SESSION['flat'] = $row['flat'];
                        $_SESSION['role'] = $row['role'];
                        $_SESSION['password'] = $row['password'];
                        header ('Refresh:1; url=/html/admin/profile.php');
            
                        if($_SESSION['role']=='admin'){
                            header ('Refresh:1; url=/html/admin/profile.php');
                        }else{
                            header ('Refresh:1; url=/html/user/profile.php');
                        }
        }
        else{
            echo "error". $con->error;
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
                <p>Incorrect password</p>
            </div>
            </div>
            </body>
            <?php
            header ('Refresh:2; url=/html/user/profile.php');
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
            <p>New password and confirm password is not ideal.</p>
        </div>
    </div>
</body>
        <?php
        header ('Refresh:2; url=/html/user/profile.php');
    }
?>
</html>