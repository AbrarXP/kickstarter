<?php
    session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['username'])){

        include '../koneksi/cn.php';

        $nominal = $_POST['nominal'];
        $id_donasi = '';

        $id_project = $_POST['id'];
        $donatur = $_POST['donatur'];

        //Menyimpan riwayat donasi
        mysqli_query($cn, "INSERT INTO riwayat_donasi VALUES ('$id_donasi','$id_project','$donatur','$nominal')");




        // Menambahkan total donasi terkumpul sesuai dengan nominal yang di donasikan oleh donatur
        mysqli_query($cn, "UPDATE project SET donasi_terkumpul = donasi_terkumpul + $nominal WHERE id_project = $id_project");





        // Cek sudah pernah donasi atau belum
        $data_total_donasi = mysqli_query($cn,"SELECT * FROM total_donasi where donatur = '$donatur'");
        $cek_donatur = mysqli_num_rows($data_total_donasi);

        if($cek_donatur > 0){
            // Kalau sudah pernah donasi, tinggal kita update
            mysqli_query($cn, "UPDATE total_donasi SET total_donasi = total_donasi + $nominal WHERE donatur = '$donatur'");

            // Ambil data total donasi terbaru nya buat di bandingkan sma jml_min_donasi
            $data_total_donasi = mysqli_query($cn,"SELECT * FROM total_donasi where donatur = '$donatur'");
        }else{
            // Kalau belum, kita masukan namanya
            mysqli_query($cn, "INSERT INTO total_donasi VALUES ('$donatur', '$id_project','$nominal')");

            // Ambil data total donasi terbaru nya buat di bandingkan sma jml_min_donasi
            $data_total_donasi = mysqli_query($cn,"SELECT * FROM total_donasi where donatur = '$donatur'");
        }






        //Cek apakah project ini punya reward atau tidak
        $jml = mysqli_query($cn,"SELECT * FROM reward WHERE id_project = '$id_project'");
        $jml = mysqli_num_rows($jml);
        if($jml == 1){
            $datareward = mysqli_query($cn, "SELECT jml_min_donasi, id_reward FROM reward WHERE id_project = '$id_project'");

            // Proses fetching data tabel reward dan total_donasi
            $datareward = mysqli_fetch_array($datareward);
            $data_total_donasi = mysqli_fetch_array($data_total_donasi);



            // Membandingkan total donasi si user apakah sudah mencukupi atau belum
            if($data_total_donasi['total_donasi'] >= $datareward['jml_min_donasi']){

                $id_reward = $datareward['id_reward'];
                
                // Cek apakah user sudah pernah dapat atau belum
                $jml = mysqli_query($cn, "SELECT * FROM donasi_reward where user = '$donatur' and id_reward = '$id_reward'");
                $jml = mysqli_num_rows($jml);
                if($jml > 0){
                    header("location:../proyek/project-details.php?id=$id_project&pesan=berhasildonasi&reward=sudahdapatreward");
                }
                else{
                    // Mencatat nama user di dalam tabel donasi_reward
                    mysqli_query($cn,"INSERT into donasi_reward VALUES ('$donatur','$id_reward')");
                    header("location:../proyek/project-details.php?id=$id_project&pesan=berhasildonasi&reward=ditambahkan");
                }
            }
            else{
                header("location:../proyek/project-details.php?id=$id_project&pesan=berhasildonasi&reward=false");

            }
        }
        else{
            header("location:../proyek/project-details.php?id=$id_project&pesan=berhasildonasi");
        }




    }
    else{
        header("location:../login/login.php?pesan=belumlogin");
    }

?>