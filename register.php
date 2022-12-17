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
    <div class="container1">
        <h1>Register</h1>
        <div class="content">
            <form action="" method="post">
                <label for="">Name</label>
                <input type="text" name="nama" placeholder="Masukkan Nama" title="Insert Name">
                <br>

                <label for="">Username</label>
                <input type="text" name="username" placeholder="Masukkan Username" title="Insert Username">
                <br>

                <label for="">Email</label>
                <input type="email" name="email" placeholder="Masukkan Email" title="Insert Email">
                <br>
                
                <label for="">Phone Number</label>
                <input type="text" name="no_telp" placeholder="Masukkan Nomor Telepon" title="Insert Phone">
                <br>

                <label for="">Password</label>
                <input type="password" name="psw" placeholder="Masukkan Password" title="Insert Password">
                <br>
                
                <label for="">Konfirmasi Password</label>
                <input type="password" name="kpsw" placeholder="Masukkan Konfirmasi Password" title="Insert Confirm Password">
                <br>

                <input type="submit" name="regist" class="btn" title="Regist"><br>
                <div class="register-form"><p>Sudah memiliki akun? <a href="login.php">Login</a></p></div>
            </form>
        </div>
    </div>
</body>
</html>

<?php 
    require 'koneksi.php';
    if(isset($_POST['regist'])){
        $nama_customer = $_POST['nama'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $no_telp = $_POST['no_telp'];
        $password = $_POST['psw'];
        $konfirmasi = $_POST['kpsw'];

        $usn = $db->query("SELECT * FROM customer WHERE username='$username'");

        if(mysqli_num_rows($usn) > 0){
            echo "<script>
                    alert('Username telah digunakan, silahkan gunakan username lain');
                </script>";
        }else{

            if($password == $konfirmasi){

                $password = password_hash($password, PASSWORD_DEFAULT);
                $query = "INSERT INTO customer (nama_customer, username, email, nomor_telp, psw)
                            VALUES ('$nama_customer', '$username', '$email', '$no_telp', '$password')";
                $result = $db->query($query);

                if($result){
                    echo "<script>
                            alert('Registrasi Berhasil');
                            document.location.href = 'login.php';
                        </script>";

                }else{
                    echo "<script>
                            alert('Registrasi Gagal');
                        </script>";
                }

            }else{
                echo "<script>
                            alert('Konfirmasi password salah!');
                        </script>";
            }
        }
    }
?>