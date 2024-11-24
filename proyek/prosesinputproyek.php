<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        session_start();

        include '../koneksi/cn.php';
        $id = '';
        $user = $_SESSION['username'];
        $judul = $_POST['judul'];
        $kategori = $_POST['kategori'];
        $donasiterkumpul = 0;
        $targetdonasi = $_POST['targetdonasi'];
        $deskripsi = $_POST['deskripsi'];
        $deskripsi2 = $_POST['deskripsi2'];
        $gambar1 = $_POST['gambar1'];
        $gambar2 = $_POST['gambar2'];
        $gambar3 = $_POST['gambar3'];
        $gambar4 = $_POST['gambar4'];

        $sql = "INSERT INTO project VALUES ('$id','$user','$judul','$kategori','$deskripsi','$donasiterkumpul','$targetdonasi','$gambar1','$gambar2','$gambar3','$gambar4','$deskripsi2')";
        $query = mysqli_query($cn, $sql);

        if(isset($_POST['rewardCb'])){
            $id_reward = '';

            //mysqli_insert_id mengambil nilai auto_increment yg baru di input
            $id_project = mysqli_insert_id($cn);
         
            $jml_min_donasi = $_POST['jml_min_donasi'];
            $reward_img = $_POST['reward_img'];
            $judul_reward = $_POST['judul_reward'];
            $deskripsi_reward = $_POST['deskripsi_reward'];

            $sqlreward = "INSERT INTO reward VALUES ('$id_reward','$id_project','$jml_min_donasi','$reward_img','$judul_reward','$deskripsi_reward')";
            $queryreward = mysqli_query($cn, $sqlreward);
            
            header('location:../index.php?pesan=projectdenganreward');
        }
        else{
            header('location:../index.php?pesan=projektanpareward');
        }
        

    }
?>