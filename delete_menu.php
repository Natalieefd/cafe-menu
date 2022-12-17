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
    
    if(isset($_GET['id_menu'])){
        $id_menu = $_GET['id_menu'];

        $del = mysqli_query($db, "SELECT * FROM menu WHERE id_menu = '$id_menu'");
        $row = mysqli_fetch_array($del);

        $gambar = $row['gambar'];
        $del_gambar = "Pictures/$gambar";

        if(file_exists($del_gambar)){
            unlink($del_gambar);
        }

        $result = mysqli_query($db, "DELETE FROM menu WHERE id_menu = '$id_menu'");

        if($result){
            echo "<script>
                    alert('Berhasil Menghapus Menu');
                    document.location.href = 'manage_menu.php';
                </script>";
        } else {
            echo "<script>
                    alert('Gagal Menghapus Menu');
                </script>";
        }
    }
?>