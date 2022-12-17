<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="image/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet'>
    <link rel="stylesheet" href="login-regist.css">
    <title>Fluffy Cafe</title>
</head>
<body>
    <div class="container">
        <h1><a href="login.php">Login</a></h1>
        <div class="content">
            <form action="" method="post">
                <label for="">Username</label>
                <input type="text" name="username" placeholder="Masukkan Username" title="Insert Username">
                <br>
                
                <label for="">Password</label>
                <input type="password" name="psw" placeholder="Masukkan Password" title="Insert Password">
                <br>

                <input type="submit" name="login-admin" class="btn" title="Login"><br>
            </form>
        </div>
    </div>
</body>
</html>

<?php 
    session_start();
    require 'koneksi.php';

    if(isset($_POST['login-admin'])){
        $user = $_POST['username'];
        $password = $_POST['psw'];

        $query = "SELECT * FROM admin WHERE username='$user'";
        $result = $db->query($query);
        $row = mysqli_fetch_array($result);

        if($row){
            $username = $row['username'];
            
            if($password == $row['psw']){
                $_SESSION['login-admin'] = $username;
                var_dump($query);    

                echo "<script>
                        alert('Selamat Datang $username');
                        document.location.href = 'halaman_admin.php';
                    </script>";
                } else {
                    echo "<script>
                            alert('Password anda salah');
                        </script>";
                }
        } else {
            echo "<script>
                alert('Username atau password anda salah');
                </script>";
        }
    }
?>