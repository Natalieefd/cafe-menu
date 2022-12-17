<?php
    session_start();
    include 'koneksi.php';

    $username = $_SESSION['login'];
    if (isset($_GET['add'])) {
        $id_menu = $_GET['add'];

        $query = "SELECT * FROM menu WHERE id_menu='$id_menu'";
        $result = $db->query($query);
        $row = mysqli_fetch_assoc($result);

        if (!$result) {
            die("Error");
        }

        $gambar_menu = $row['gambar_menu'];
        $nama_menu = $row['nama_menu'];
        $jenis_menu = $row['jenis_menu'];
        $kategori_menu = $row['kategori_menu'];

        $query = mysqli_query($db, "INSERT INTO favorite
                                    VALUES(default, '$id_menu', '$gambar_menu', '$nama_menu', '$jenis_menu', '$kategori_menu')");

        header('location: favorite.php');
    }
?>