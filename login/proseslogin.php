<?php
   if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['submitform'])){

        session_start();

        if(isset($_POST["submitform"])) {
        include '../koneksi/cn.php';

        $user = $_POST['username'];
        $pass = $_POST['password'];

        $query = mysqli_query($cn,"select * from user where user = '$user' and pass = '$pass'");
        $hasil = mysqli_num_rows($query);
        if($hasil > 0){
            $_SESSION['username'] = $user;
            $_SESSION['status'] = "login";
            header("location:../index.php?pesan=login");
        }
        else{
            header("location:login.php?pesan=gagal");
        }
    }
        
    }
}
?>