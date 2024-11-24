<?php


    $cn = new mysqli("localhost","root","","kickstarter");

    if ($cn->connect_error) {
        die("Koneksi Gagal: " . $cn->connect_error);
    }

?>