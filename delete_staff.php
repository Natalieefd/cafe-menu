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
    
    if(isset($_GET['username'])){
        $username = $_GET['username'];

        $del = mysqli_query($db, "SELECT * FROM staff WHERE username = '$username'");
        $row = mysqli_fetch_array($del);

        $result = mysqli_query($db, "DELETE FROM staff WHERE username = '$username'");

        if($result){
            echo "<script>
                    alert('Berhasil Menghapus Akun');
                    document.location.href = 'manage_staff.php';
                </script>";
        } else {
            echo "<script>
                    alert('Gagal Menghapus Akun');
                </script>";
        }
    }
?>