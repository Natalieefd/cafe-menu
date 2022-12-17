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
                <li><a href="manage_menu.php">manage menu</a></li>
                <li><a href="aboutus_admin.php">about us</a></li>
                <li><a href="halaman_admin.php">home</a></li>
            </ul>
        </div>
        <div class="content">
            <div class="nav-title"><div class="line-title"></div><p>update menu</p></div>
            <form action="" method="post" enctype="multipart/form-data">
                <?php
                    if(isset($_GET['id_menu'])){
                        $id_menu = $_GET['id_menu'];
                    }
                    
                    $hasil = mysqli_query($db, "SELECT * FROM menu WHERE id_menu='$id_menu'");
                    while ($row = mysqli_fetch_array($hasil)){
                ?>
                <label for="">Menu Picture</label>
                <img src="Pictures/<?=$row['gambar_menu'];}?>" width="200px">
                <br>

                <label for="">Menu Name</label>
                <input type="text" name="nama_menu" placeholder="Insert Menu Name" class="input-box" title="Insert Menu Name">
                <br>

                <label for="">Menu Type</label>
                <input type="text" name="jenis_menu" placeholder="Insert Menu Type" class="input-box" title="Insert Menu Type">
                <br>
                
                <label for="">Menu Category</label>
                <input type="text" name="kategori_menu" placeholder="Insert Menu Category" class="input-box" title="Insert Menu Category">
                <br>

                <label for="">Menu Prices</label>
                <input type="text" name="harga_menu" placeholder="Insert Menu Price" class="input-box" title="Insert Menu Price">
                <br>
                
                <input type="submit" name="submit" class="btn"><br>
            </form>
        </div>
    </div>
    <div class="footer">Copyright &copy; 2022 Designed by Natalie Fuad</div>
</body>
</html>

<?php
    if(isset($_POST['submit'])){
        $nama_menu = $_POST['nama_menu'];
        $jenis_menu = $_POST['jenis_menu'];
        $kategori_menu = $_POST['kategori_menu'];
        $harga_menu = $_POST['harga_menu'];

        $hasil = mysqli_query($db, "SELECT * FROM menu WHERE id_menu='$id_menu'");
        $r = mysqli_fetch_array($hasil);

        $gambar = $r['gambar_menu'];

        $query = "UPDATE menu SET gambar_menu='$gambar', nama_menu='$nama_menu', jenis_menu='$jenis_menu',
                                kategori_menu='$kategori_menu', harga_menu='$harga_menu'
                WHERE id_menu='$id_menu'";
        $result = $db->query($query);

        if($result){
            echo "<script>
                    alert('Berhasil Mengupdate Menu');
                    document.location.href = 'manage_menu.php';
                </script>";

        } else {
            echo "<script>
                    alert('Gagal Mengupdate Menu');
                </script>";
        }
    }
?>