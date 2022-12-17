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
    <link rel="stylesheet" href="style_admin.css">
    <title>Fluffy Cafe</title>
</head>
<body>
    <div class="container">
        <div class="wrapper">
            <div class="nav-brand">fluffy cafe</div>
            <ul class="navigation">
                <li><a href="manage_staff.php">Manage Staff</a></li>
                <li><a href="manage_menu.php">Manage Menu</a></li>
                <li><a href="aboutus_admin.php">about us</a></li>
                <li><a href="logout.php">logout</a></li>
            </ul>
        </div>
        <div class="intro-content">
            <div class="line"></div>
            <p class="greeting">Admin Dashboard</p>
        </div>
        <div class="content">
            <div class="label"><i class="fa fa-user fa-2x"></i>Staff Account</div>
            <div class="staff-box">
                <div class="box">
                    <table>
                        <th class="title-text">Name</th>
                        <th class="title-text">Username</th>
                        <th class="title-text">Position</th>
                    <?php
                        require "koneksi.php";

                        $query = "SELECT * FROM staff ORDER BY username ASC";
                        $result = $db->query($query);

                        if(!$result) {
                            die("Error");
                        }
                        
                        while ($row = mysqli_fetch_assoc($result)){
                            $result = $db->query("SELECT * FROM staff");
                            $i = 1;
                            while($row = mysqli_fetch_array($result)){
                    ?>
                        <tr>
                            <td class="text" align="center"><?=$row['nama_staff']?></td>
                            <td class="text" align="center"><?=$row['username']?></td>
                            <td class="text" align="center"><?=$row['jabatan']?></td>
                        </tr>
                    <?php }} ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="label"><i class="fa fa-check-circle fa-2x"></i>Staff Attendance</div>
            <div class="staff-box">
                <div class="box">
                    <table>
                        <th class="title-text">Name</th>
                        <th class="title-text">Username</th>
                        <th class="title-text">Jabatan</th>
                        <th class="title-text">Kehadiran</th>
                    <?php
                        require "koneksi.php";

                        $query = "SELECT * FROM absensi ORDER BY username ASC";
                        $result = $db->query($query);

                        if(!$result) {
                            die("Error");
                        }
                        
                        while ($row = mysqli_fetch_assoc($result)){
                            $result = $db->query("SELECT * FROM absensi");
                            $i = 1;
                            while($row = mysqli_fetch_array($result)){
                    ?>
                        <tr>
                            <td class="text" align="center"><?=$row['nama_staff']?></td>
                            <td class="text" align="center"><?=$row['username']?></td>
                            <td class="text" align="center"><?=$row['jabatan']?></td>
                            <td class="text" align="center"><?=$row['kehadiran']?></td>
                        </tr>
                    <?php }} ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="content2">
            <div class="label"><i class="fa fa-user fa-2x"></i>Customer Account</div>
            <div class="user-box">
                <div class="box">
                    <table>
                        <th class="title-text">Name</th>
                        <th class="title-text">Username</th>
                        <th class="title-text">Email</th>
                        <th class="title-text">Phone Number</th>
                    <?php
                        require "koneksi.php";

                        $query = "SELECT * FROM customer ORDER BY nama_customer ASC";
                        $result = $db->query($query);

                        if(!$result) {
                            die("Error");
                        }
                        
                        while ($row = mysqli_fetch_assoc($result)){
                            $result = $db->query("SELECT * FROM customer");
                            $i = 1;
                            while($row = mysqli_fetch_array($result)){
                    ?>
                        <tr>
                            <td class="text" align="center"><?=$row['nama_customer']?></td>
                            <td class="text" align="center"><?=$row['username']?></td>
                            <td class="text" align="center"><?=$row['email']?></td>
                            <td class="text" align="center"><?=$row['nomor_telp']?></td>
                        </tr>
                    <?php }} ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="space"></div>
    </div>
    <div class="footer">Copyright &copy; 2022 Designed by Natalie Fuad</div>
</body>
</html>