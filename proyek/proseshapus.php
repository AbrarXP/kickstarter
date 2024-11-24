<?php

    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        include '../koneksi/cn.php';

        $creator = $_POST['creator'];
        $id_project = $_POST['id_project'];

        if($creator == $_SESSION['username']){
            if(mysqli_query($cn, "DELETE FROM project WHERE id_project = '$id_project'")){
                echo "<script>alert('Proyek berhasil dihapus');</script>";
                header("location:../index.php?pesan=terhapus");
            }
            else{
                header("location:../index.php");
            }
        }
    }
    
      


?>