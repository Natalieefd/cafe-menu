<?php
    require 'koneksi.php';

    if(isset($_GET['del'])){
        $id_menu = $_GET['del'];

        $del = mysqli_query($db, "SELECT * FROM favorite WHERE id_menu = '$id_menu'");
        $row = mysqli_fetch_array($del);

        $gambar = $row['gambar'];
        $del_gambar = "Pictures/$gambar";

        if(file_exists($del_gambar)){
            unlink($del_gambar);
        }

        $result = mysqli_query($db, "DELETE FROM favorite WHERE id_menu = '$id_menu'");

        if($result){
            header('location: favorite.php');
        } else {
            header('location: favorite.php');
        }
    }
?>