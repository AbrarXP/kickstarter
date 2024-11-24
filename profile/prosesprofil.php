<?php
    session_start();
    include '../koneksi/cn.php';

    $oldusername = $_SESSION['username'];
    
    $newusername = $_POST['user'];
    $pass = $_POST['pass'];
    $ppic = $_POST['ppic'];

    // Ngecek apakah sudah ada nama yg terdaftar dengan username ini
    $ceknama = mysqli_query($cn,"SELECT user FROM user where user = '$newusername'");
    $userterdaftar = mysqli_fetch_array($ceknama);

    $ceknama = mysqli_num_rows($ceknama);

    // JIka nama sudah ada dan nama tersebut tidak sama dengan username saat ini
    if($ceknama > 0  && $userterdaftar['user'] != $oldusername){
        header('location:editprofile.php?pesan=sudahterdaftar');
    }
    else{


        // Ganti nama project kalo ada
        $proyek = mysqli_query($cn, "SELECT * FROM project WHERE user = '$oldusername'");
        $cekproyek = mysqli_num_rows($proyek);
        if($cekproyek > 0){
            
            // Proses Pengupdatean tabel project, mengubah kolom user ke username baru
            while($dataproyek = mysqli_fetch_array($proyek)){
                
                // memperbarui setiap baris project dengan username baru
                $id_project = $dataproyek['id_project'];
                mysqli_query($cn, "UPDATE project SET user = '$newusername' WHERE id_project = '$id_project'");
            }
        }

        // Ganti riwayat donasi kalo ada
        $proyek = mysqli_query($cn, "SELECT * FROM riwayat_donasi WHERE donatur = '$oldusername'");
        $cekproyek = mysqli_num_rows($proyek);
        if($cekproyek > 0){
            
            // Proses Pengupdatean tabel riwayat donasi, mengubah kolom user ke username baru
            while($dataproyek = mysqli_fetch_array($proyek)){
                
                // memperbarui setiap baris riwayat donasi dengan username baru
                $id_donasi = $dataproyek['id_donasi'];
                mysqli_query($cn, "UPDATE riwayat_donasi SET donatur = '$newusername' WHERE id_donasi = '$id_donasi'");
            }
        }

        // Ganti total_donasi kalo ada
        $proyek = mysqli_query($cn, "SELECT * FROM total_donasi WHERE donatur = '$oldusername'");
        $cekproyek = mysqli_num_rows($proyek);
        if($cekproyek > 0){
            
            // Proses Pengupdatean tabel project, mengubah kolom user ke username baru
            while($dataproyek = mysqli_fetch_array($proyek)){
                
                // memperbarui setiap baris project dengan username baru
                $updateproyek = mysqli_query($cn, "UPDATE total_donasi SET donatur = '$newusername' WHERE donatur = '$oldusername'");
            }
        }


        // Ganti donasi_reward kalo ada
        $proyek = mysqli_query($cn, "SELECT * FROM donasi_reward WHERE user = '$oldusername'");
        $cekproyek = mysqli_num_rows($proyek);
        if($cekproyek > 0){
            
            // Proses Pengupdatean tabel project, mengubah kolom user ke username baru
            while($dataproyek = mysqli_fetch_array($proyek)){
                
                // memperbarui setiap baris project dengan username baru
                mysqli_query($cn, "UPDATE donasi_reward SET user = '$newusername' WHERE user = '$oldusername'");
            }
        }


        $query = mysqli_query($cn, "UPDATE user SET 
        user='$newusername', pass='$pass', ppic='$ppic' where user='$oldusername'")
        or die(mysqli_error($cn));
        if ($query) {
            $_SESSION['username'] = $newusername;
            header("location:../profile/profile.php?pesan=berhasiledit");
        } else {
            header("location:../profile/profile.php");
        }
    }
?>