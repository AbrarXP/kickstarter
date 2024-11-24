<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">


<title>Login Kickstarter</title>
<link rel="icon" href="https://a.kickstarter.com/favicon.ico">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="../assets/css/main.css">
<link rel="stylesheet" href="../assets/css/custom.css">
<style>

    .alert-danger{
        background-color: rgba(255, 163, 163, 0.142);
        color: rgba(254, 83, 83, 0.915);
    }

    .form-control{
        background-color: transparent;
        border: none;
    }
    .input-container, .input-container:focus{
        background-color: white;
        background-color: rgba(100, 100, 100, 0.1);
        backdrop-filter: blur(0px);

        border: none;
    }
    
    label{
        color: white;
        background-color: transparent:
    }

    .btn-theme {
        border: none;
        background-color: #fff;
        box-shadow: 0 0 5px #ef97e8;
    }

    .btn-theme:hover {
        box-shadow: 0 0 10px #ef97e8, 0 0 20px #ef97e8, 0 0 20px #fff inset;
    }


    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background: #050801;
    }

    button {
        border:none;
        background-color:transparent;
        position: relative;
        display: inline-block;
        padding: 10px 15px;
        margin: 40px 0;
        color:  #fff;
        text-decoration: none;
        text-transform: uppercase;
        transition: 0.5s;
        letter-spacing: 4px;
        overflow: hidden;
        margin-right: 50px;

        font-size: 0.8rem;

    }

    button:hover {
        background:  #fff;
        color: #050801;
        box-shadow: 0 0 5px  #fff,
            0 0 25px  #fff,
            0 0 50px  #fff,
            0 0 200px  #fff;
        -webkit-box-reflect: below 1px linear-gradient(transparent, #0005);
    }

    button:nth-child(1) {
        filter: hue-rotate(270deg);
    }

    button:nth-child(2) {
        filter: hue-rotate(110deg);
    }

    button span {
        position: absolute;
        display: block;
    }

    button span:nth-child(1) {
        top: 0;
        left: 0;
        width: 100%;
        height: 2px;
        background: linear-gradient(90deg, transparent,  #fff);
        animation: animate1 1s linear infinite;
    }

    @keyframes animate1 {
        0% {
            left: -100%;
        }

        50%,
        100% {
            left: 100%;
        }
    }

    button span:nth-child(2) {
        top: -100%;
        right: 0;
        width: 2px;
        height: 100%;
        background: linear-gradient(180deg, transparent,  #fff);
        animation: animate2 1s linear infinite;
        animation-delay: 0.25s;
    }

    @keyframes animate2 {
        0% {
            top: -100%;
        }

        50%,
        100% {
            top: 100%;
        }
    }

    button span:nth-child(3) {
        bottom: 0;
        right: 0;
        width: 100%;
        height: 2px;
        background: linear-gradient(270deg, transparent,  #fff);
        animation: animate3 1s linear infinite;
        animation-delay: 0.50s;
    }

    @keyframes animate3 {
        0% {
            right: -100%;
        }

        50%,
        100% {
            right: 100%;
        }
    }


    button span:nth-child(4) {
        bottom: -100%;
        left: 0;
        width: 2px;
        height: 100%;
        background: linear-gradient(360deg, transparent,  #fff);
        animation: animate4 1s linear infinite;
        animation-delay: 0.75s;
    }

    @keyframes animate4 {
        0% {
            bottom: -100%;
        }

        50%,
        100% {
            bottom: 100%;
        }
    }

</style>

</head>
<body style="background-color: rgb(200, 200, 200);">


        <div style="height: 100vh" >
            <video style="object-fit:cover; width:100vw; height: inherit;" playsinline="" class="auth-sidebar-video" autoplay="" loop="" muted="" src="https://cdn.dribbble.com/uploads/48226/original/b8bd4e4273cceae2889d9d259b04f732.mp4?1689028949"></video>
        </div>

        <div class="overlay p-5 rounded-4 shadow" style="
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);

            background-color: white;
            background-color: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);

            width: 30vw;

        ">
            <div class="mb-5">
                <h1 class="font-weight-bold text-theme text-center" style="color:white;">Kick Starter<span style="color:#5369f8">.</span><br> Login</h1>
            </div>

            <p class="mb-0 text-center" style="color:white;">Selamat Datang Kembali</p>

            <?php
                if(isset($_GET['pesan']) && $_GET['pesan'] == "gagal"){
                        echo '<br>
                        <div class="alert alert-danger alert-dismissible fade show text-center ps-5" role="alert">
                            <strong>Username atau Password Salah!</strong>
                        </div>';
                }
                else if(isset($_GET['pesan']) && $_GET['pesan'] == "belumlogin"){
                    echo '<br>
                    <div class="alert alert-danger alert-dismissible fade show text-center ps-5" role="alert">
                        <strong>Login terlebih dahulu!</strong>
                    </div>';
                }
            ?>
            <br>
            <form action="proseslogin.php" class="needs-validation" method="post">
            <div class="form-control mb-4">
                <label for="exampleInputEmail1">Username</label>
                <input name = "username" type="text" class="input-container form-control" id="exampleInputEmail1" placeholder="Username">
            </div>
            <br>
            <div class="form-control mb-5">
                <label for="exampleInputPassword1">Password</label>
                <input name = "password" type="password" class="input-container form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
                <div class="buttoncontainer">
                <button style="margin-left: 18vw;" name="submitform">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Login
                </button>
                </div>

                <p class="text-center text-light">Tidak Punya Akun ? <a href="register.php" style="text-decoration:underline">register</a></p>
            </form>
        </div>
</body>
</html>