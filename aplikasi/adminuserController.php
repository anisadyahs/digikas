<?php

    $koneksi = mysqli_connect("localhost", "root", "", "digikas");

    function query($query){
        global $koneksi;
        $result = mysqli_query($koneksi, $query);
        $rows = [];
        while ( $row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    function hapus($email){
        global $koneksi;
        mysqli_query($koneksi, "DELETE FROM pengguna WHERE email = '$email'");
        return mysqli_affected_rows($koneksi);
    }
?>