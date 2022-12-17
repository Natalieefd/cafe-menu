<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="image/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet'>
    <link rel="stylesheet" href="manage.css">
    <title>Fluffy Cafe</title>
</head>
<body>
    <div class="container">
        <div class="wrapper">
            <div class="nav-brand">fluffy cafe</div>
            <ul class="navigation">
                <li><a href="menu.php">menu</a></li>
                <li><a href="home.php">home</a></li>
                <li><a href="aboutus.php">about us</a></li>
                <li><a href="logout.php">logout</a></li>
            </ul>
        </div>
        <div class="m-title"><div class="line-title"></div><p>my favorite menu</p></div>
        <div class="main-content2">
            <div class="content-box">
                <div class="menu-box">
                    <table>
                        <tr>
                        <?php
                            session_start();
                            include 'koneksi.php';

                            $result = mysqli_query($db, "SELECT * FROM favorite ORDER BY nama_menu ASC");
                            $jumlah_data = mysqli_num_rows($result);
                            while ($row = mysqli_fetch_array($result)) {
                                if($jumlah_data > 0){
                        ?>
                            <td class="text-box">
                                <img src="Pictures/<?= $row['gambar_menu'] ?>" alt="">
                                <div class="line"></div>
                                <p class="name"><?= $row['nama_menu'] ?></p>
                                <div class="line2"></div>
                                <p class="desc"><?= $row['jenis_menu'] ?></p>
                                <p class="desc"><?= $row['kategori_menu'] ?></p>
                                <div class="action">
                                    <a href="proses_del.php?del=<?=$row['id_menu']?>" title="Remove From Favorite"><div class="fav"><i class="fa fa-heart"></i></div></a>
                                </div>
                            </td>
                        <?php }} ?>
                        </tr>
                    </table>
                        <?php
                            if ($jumlah_data == 0){
                        ?>
                            <div class="empty-ps">
                                <br><p class="titik">. . .</p>
                                <p>Belum ada menu favoritmu nih</p><br><br>
                            </div>
                        <?php
                        }
                        ?>
                </div>
            </div>
        </div>
    </div>
    <div class="info-footer">
        <ul class="footer-sosmed">
            <ul class="footer-brand">
                <div class="brand"><a href="home.php">Fluffy Cafe</a></div>
            </ul>
            <ul class="footer-about1">
                <li><a href="https://www.facebook.com/"><i class="fa fa-facebook fa-"></i>Facebook</a></li>
                <li><a href="https://twitter.com/"><i class="fa fa-twitter"></i>Twitter</a></li>
                <li><a href="#https://www.instagram.com/"><i class="fa fa-instagram"></i>Instagram</a></li>
            </ul>
            <ul class="footer-about2">
                <li><a href="https://telegram.org/"><i class="fa fa-telegram"></i>Telegram</a></li>
                <li><a href="https://www.google.co.id/maps/"><i class="fa fa-map"></i>Address<p class="address">Jl. Piano No.7, Dadi Mulya, Kec. Samarinda Ulu,<br>Kota Samarinda, Kalimantan Timur 75242</p></a></li>
            </ul>
        </ul>
    </div>
    <div class="footer">Copyright &copy; 2022 Designed by Natalie Fuad</div>
</body>
</html>