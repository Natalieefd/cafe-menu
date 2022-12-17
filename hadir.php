<?php
    session_start();
    require 'koneksi.php';

    $username = $_SESSION['login-staff'];
    if(isset($_GET['hadir'])){

        $query = "SELECT * FROM staff WHERE username='$username'";
        $result = $db->query($query);
        $row = mysqli_fetch_assoc($result);

        if (!$result) {
            die("Error");
        }

        $result2 = mysqli_query($db, "SELECT * FROM absensi");
        $hasil = mysqli_fetch_assoc($result2);

        if($username ==  $hasil['username']){
            echo "<script>
                    alert('Anda Sudah Melakukan Absen!');
                    document.location.href = 'halaman_staff.php';
                </script>";

        } else {
            $nama_staff = $row['nama_staff'];
            $jabatan = $row['jabatan'];
            $tanggal = $_GET['tanggal'];
            $kehadiran = 'Hadir';

            $query = mysqli_query($db, "INSERT INTO absensi
                                        VALUES('$nama_staff', '$username', '$jabatan', '$tanggal', '$kehadiran')");

            if($query){
                echo "<script>
                        alert('Anda Berhasil Absen!');
                        document.location.href = 'halaman_staff.php';
                    </script>";
            }else{
                echo "<script>
                        alert('Gagal Melakukan Absensi');
                    </script>";
            }
        }
    }
?>