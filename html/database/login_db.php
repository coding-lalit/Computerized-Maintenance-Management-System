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
    
    extract($_POST);
    $con = mysqli_connect('localhost', 'root', '','cmms');
    $sql=mysqli_query($con,"SELECT * FROM register_info where email='$email' and password='$password'");
    //$row  = mysqli_fetch_array($sql);
    if (mysqli_num_rows( $sql )) {
        $row = mysqli_fetch_array($sql);
        ?>
        <body>
                <div role="success">
                    <div class="bg-green-500 text-white font-bold rounded-t px-4 py-2">
                        Success
                    </div>
                    <div class="border border-t-0 border-green-400 rounded-b bg-green-100 px-4 py-3 text-white-700">
                        <p>Login Successful</p>
                    </div>
                </div>
            </body>
            <?php
        if( $row['role'] == 'admin'){
            session_start();
            $_SESSION['time'] = time();
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
        
        header('Refresh:1; url=/html/admin/dashboard.php');
        }
        else{
            session_start();
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
        
        header('Refresh:1; url=/html/user/dashboard.php');
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
                <p>Wrong username/password</p>
            </div>
            </div>
            </body>
            <?php
    header('Refresh:1; url=/html/login/login_pg.php');
    }
?>
</body>
</html>