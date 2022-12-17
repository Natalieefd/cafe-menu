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
    <link rel="stylesheet" href="aboutus.css">
    <title>Fluffy Cafe</title>
</head>
<body>
    <div class="container">
        <div class="wrapper">
            <div class="nav-brand">fluffy cafe</div>
            <ul class="navigation">
                <li><a href="halaman_staff.php">home</a></li>
            </ul>
        </div>
        <div class="content">
            <div class="main-content">
                <div class="box">
                    <h1 class="title-brand">fluffy cafe</h1>
                    <div class="line"></div>
                    <img src="image/logo.ico" width="100%">
                </div>
                <p class="text">
                    Fluffy Cafe merupakan cafe dengan nuansa elegan<br>dan nyaman, yang menyediakan berbagai macam<br>makanan dan minuman, dengan desain interior<br>yang dapat memanjakan mata.
                    <br><br>
                    Website ini dibuat guna memudahkan customer setia<br>Fluffy Cafe untuk melakukan pemesanan online,<br>dan juga memudahkan customer untuk melihat<br>menu yang tersedia di Fluffy Cafe
                    <br><br><br>
                    <strong>Phone</strong><br>
                    +6282351875226<br><br>
                    <strong>Address</strong><br>
                    Jl. Piano No.7, Dadi Mulya, Kec. Samarinda Ulu,<br>Kota Samarinda, Kalimantan Timur 75242
                </p>
            </div>
        </div>
    </div>
    <div class="info-footer">
        <ul class="footer-sosmed">
            <ul class="footer-brand">
                <div class="brand">Fluffy Cafe</div>
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