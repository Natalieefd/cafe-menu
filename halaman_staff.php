<?php
   session_start();
   require 'koneksi.php';

   if(!isset($_SESSION['login-staff'])){
       echo "<script>
               alert('Akses ditolak, silahkan login dulu');
               document.location.href = 'login_staff.php';
           </script>";

   } else {
       $username = $_SESSION['login-staff'];
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
    <link rel="stylesheet" href="style.css">
    <title>Fluffy Cafe</title>
</head>
<body>
    <div class="container">
        <div class="wrapper">
            <div class="nav-brand">fluffy cafe</div>
            <ul class="navigation">
                <li><a href="menu_staff.php">menu</a></li>
                <li><a href="absensi.php">absence attendance</a></li>
                <li><a href="aboutus_staff.php">about us</a></li>
                <li><a href="logout.php">logout</a></li>
            </ul>
        </div>
        <div class="intro-content">
            <div class="line"></div>
            <p class="greeting">Welcome to Fluffy Cafe Website!</p>
        </div>
        <div class="menu">
            <div class="text">most popular menu's</div>
            <div class="m-menu">
                <div class="menu-unggulan1" title="Orange Juice">
                    <img src="image/orange-drink.jpg" alt="">
                    <p class="name">Orange Juice</p>
                    <p class="kategori">Iced</p>
                </div>
                <div class="menu-unggulan2" title="Chocolate Cokie">
                    <img src="image/salted-chocolate-cookies.jpg" alt="">
                    <p class="name">Chocolate Cokies</p>
                    <p class="kategori">Dessert</p>
                </div>
                <div class="menu-unggulan3" title="Chocolate Frape">
                    <img src="image/chocolate-frape.jpg" alt="">
                    <p class="name">Chocolate Frape</p>
                    <p class="kategori">Hot</p>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="label"><i class="fa fa-clock-o fa-2x"></i>Operating Hours</div>
            <div class="jam-operasi">
                <table>
                    <tr>
                        <th>sunday</th>
                        <td>CLOSE</td>
                    </tr>
                    <tr>
                        <th>monday</th>
                        <td>09:00 - 23:00</td>
                    </tr>
                    <tr>
                        <th>tuesday</th>
                        <td>09:00 - 23:00</td>
                    </tr>
                    <tr>
                        <th>wednesday</th>
                        <td>09:00 - 23:00</td>
                    </tr>
                        <th>thursday</th>
                        <td>09:00 - 23:00</td>
                    </tr>
                    <tr>
                        <th>friday</th>
                        <td>09:00 - 23:00</td>
                    </tr>
                    <tr>
                        <th>saturday</th>
                        <td>09:00 - 24:00</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="content2">
            <div class="order-content">
                <div class="order-text">
                    <p align="center">See Fluffy Cafe Menu</p>
                    <a href="menu.php" class="menu-btn" title="Menu_staff">Menu</a>
                </div>
            </div>
        </div>
    </div>
    <div class="info-footer">
        <ul class="footer-sosmed">
            <ul class="footer-brand">
                <div class="brand"><a href="halaman_staff.php">Fluffy Cafe</a></div>
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