<?php
    session_start();
    include '../koneksi/cn.php';
    
    if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['edit'] == 'project'){

        $id_project = $_POST['id'];
        $nama_project = $_POST['nama_project'];
        $kategori = $_POST['kategori'];
        $deskripsi = $_POST['deskripsi_singkat'];
        $target_donasi = $_POST['target_donasi'];
        $gambar1 = $_POST['gambar1'];
        $gambar2 = $_POST['gambar2'];
        $gambar3 = $_POST['gambar3'];
        $gambar4 = $_POST['gambar4'];
        $dkpanjang = $_POST['deskripsi_panjang'];

        $query = mysqli_query($cn, "UPDATE project SET nama_project='$nama_project', kategori='$kategori', deskripsi='$deskripsi', 
        target_donasi='$target_donasi', gambar1='$gambar1',
        gambar2='$gambar2',gambar3='$gambar3',gambar4='$gambar4',dkpanjang='$dkpanjang'
        WHERE id_project = '$id_project'")
        or die(mysqli_error($cn));
        if ($query) {
            header("location:../proyek/project-details.php?id=$id_project&pesan=berhasileditproject");
        } 
    }
    else if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['edit'] == 'reward'){

        $id_reward = $_POST['id_reward'];
        $id_project = $_POST['id_project'];
        $reward_img = $_POST['reward_img'];
        $jml_min_donasi = $_POST['jml_min_donasi'];
        $judul_reward = $_POST['judul_reward'];
        $deskripsi_reward = $_POST['deskripsi_reward'];
        
        $query = mysqli_query($cn, "UPDATE reward SET id_project='$id_project', reward_img='$reward_img', jml_min_donasi='$jml_min_donasi',
        judul_reward='$judul_reward',deskripsi_reward='$deskripsi_reward'
        WHERE id_reward = '$id_reward'");

        if($query){
            header("location:../proyek/project-details.php?id=$id_project&pesan=berhasileditreward");
        }
    }
    
?>