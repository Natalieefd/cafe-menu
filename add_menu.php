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
            <div class="nav-title"><div class="line-title"></div><p>add menu</p></div>
            <form action="" method="post" enctype="multipart/form-data">
                <label for="">Menu ID</label>
                <input type="text" name="id_menu" placeholder="Insert Menu Id" class="input-box" title="Insert Menu Id">
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
                
                <label for="">Menu Picture</label>
                <input type="file" name="gambar_menu" class="input-box" title="Insert Menu Picture">
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
        $id_menu = $_POST['id_menu'];
        $nama_menu = $_POST['nama_menu'];
        $jenis_menu = $_POST['jenis_menu'];
        $kategori_menu = $_POST['kategori_menu'];
        $harga_menu = $_POST['harga_menu'];

        $gambar = $_FILES['gambar_menu']['name'];
        $x = explode('.', $gambar);

        $ekstensi = strtolower(end($x));
        $gambar_baru = "$nama_menu.$ekstensi";

        $tmp = $_FILES['gambar_menu']['tmp_name'];

        if(move_uploaded_file($tmp,"Pictures/".$gambar_baru)){
            $query = "INSERT INTO menu (id_menu, nama_menu, jenis_menu, kategori_menu, harga_menu, gambar_menu)
                        VALUES('$id_menu', '$nama_menu', '$jenis_menu', '$kategori_menu', '$harga_menu', '$gambar_baru')";

            $result = $db->query($query);

            if($result){
                echo "<script>
                        alert('Berhasil Menambahkan Menu');
                        document.location.href = 'manage_menu.php';
                    </script>";
            }else{
                echo "<script>
                        alert('Gagal Menambahkan Menu');
                    </script>";
            }
        }
    }
?>