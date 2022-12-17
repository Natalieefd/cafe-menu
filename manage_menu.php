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
                <li><a href="aboutus_admin.php">about us</a></li>
                <li><a href="halaman_admin.php">home</a></li>
            </ul>
        </div>
        <div class="m-title"><div class="line-title"></div><p>manage menu</p></div>
        <div class="main-content">
            <div class="content-box">
                <div class="add-btn"><i class="fa fa-plus-circle"></i><a href="add_menu.php">Add Menu</a></div>
                <div class="menu-box">
                    <table>
                        <tr>
                            <?php
                                include 'koneksi.php';

                                $query = "SELECT * FROM menu ORDER BY id_menu ASC";
                                $result = $db->query($query);

                                if(!$result) {
                                    die("Error");
                                }
                                
                                while ($row = mysqli_fetch_assoc($result)){
                                    $result = $db->query("SELECT * FROM menu");
                                    $i = 1;
                                    while($row = mysqli_fetch_array($result)){
                            ?>
                            <td class="text-box">
                                <img src="Pictures/<?=$row['gambar_menu']?>" alt="">
                                <div class="line"></div>
                                <p class="name"><?=$row['nama_menu']?></p>
                                <div class="line2"></div>
                                <p class="desc"><?=$row['jenis_menu']?></p>
                                <p class="desc"><?=$row['kategori_menu']?></p>
                                <p class="desc"><?=$row['harga_menu']?></p>
                                <div class="action">
                                    <div class="edit"><a href="update_menu.php?id_menu=<?=$row['id_menu']?>"><i class="fa fa-edit"></i> update</a></div>
                                    <div class="del"><a href="delete_menu.php?id_menu=<?=$row['id_menu']?>"><i class="fa fa-times-circle"></i> delete</a></div>
                                </div>
                            </td>
                        <?php 
                            }}
                        ?>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">Copyright &copy; 2022 Designed by Natalie Fuad</div>
</body>
</html>