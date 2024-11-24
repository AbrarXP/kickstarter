<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['submitform'])){

        session_start();

        include '../koneksi/cn.php';

        $user = $_POST['username'];
        $pass = $_POST['password'];


        $query = mysqli_query($cn,"select * from user where user = '$user'");
        $cek = mysqli_num_rows($query);

        if($cek > 0){
            header("location: register.php?pesan=sudahada");
        }
        else{
            $query = mysqli_query($cn,"insert into user values ('$user','$pass','https://t4.ftcdn.net/jpg/02/15/84/43/360_F_215844325_ttX9YiIIyeaR7Ne6EaLLjMAmy4GvPC69.jpg')");
            if($query){
                $_SESSION['username'] = $user;
                $_SESSION['status'] = "login";
                header("location:../index.php?pesan=register");
            }
            else{
                header("location:register.php?pesan=gagal");
            }
        }
    
    }
}
?>