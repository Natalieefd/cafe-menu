<?php
    session_start();
    require 'koneksi.php';

    if(!isset($_SESSION['login-admin'])){
        echo "<script>
                alert('Akses ditolak, silahkan login dulu');
                document.location.href = 'login.php';
            </script>";

    } else {
        $username = $_SESSION['login-admin'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="image/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet'>
    <link rel="stylesheet" href="manage_admin.css">
    <title>Fluffy Cafe</title>
</head>
<body>
    <div class="container">
        <div class="wrapper">
            <div class="nav-brand">fluffy cafe</div>
            <ul class="navigation">
                <li><a href="manage_staff.php">manage staff</a></li>
                <li><a href="aboutus_staff.php">about us</a></li>
                <li><a href="halaman_admin.php">home</a></li>
            </ul>
        </div>
        <div class="content">
            <div class="nav-title"><div class="line-title"></div><p>add staff account</p></div>
            <form action="" method="post">
                <label for="">Staff Name</label>
                <input type="text" name="nama_staff" placeholder="Insert Staff Name" class="input-box" title="Insert Staff Name">
                <br>

                <label for="">Position</label>
                <input type="text" name="jabatan" placeholder="Insert Position" class="input-box" title="Insert Position">
                <br>

                <label for="">Username</label>
                <input type="text" name="username" placeholder="Insert Username" class="input-box" title="Insert Username">
                <br>
                
                <label for="">Password</label>
                <input type="password" name="psw" placeholder="Insert Password" class="input-box" title="Insert Password">
                <br>

                <input type="submit" name="kirim" value="submit" class="btn"><br>
            </form>
        </div>
    </div>
    <div class="footer">Copyright &copy; 2022 Designed by Natalie Fuad</div>
</body>
</html>

<?php
    require 'koneksi.php';

    if(isset($_POST['kirim'])){
        $nama_staff = $_POST['nama_staff'];
        $jabatan = $_POST['jabatan'];
        $username = $_POST['username'];
        $password = $_POST['psw'];

        $usn = $db->query("SELECT * FROM staff WHERE username='$username'");

        if(mysqli_num_rows($usn) > 0){
            echo "<script>
                    alert('Username telah digunakan, silahkan gunakan username lain');
                </script>";

        } else {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO staff (nama_staff, jabatan, username, psw)
                        VALUES('$nama_staff', '$jabatan', '$username', '$password')";

            $result = $db->query($query);

            if($result){
                echo "<script>
                        alert('Berhasil Menambahkan Akun');
                        document.location.href = 'manage_staff.php';
                    </script>";
            }else{
                echo "<script>
                        alert('Gagal Menambahkan Akun');
                    </script>";
            }
        }
    }
?>