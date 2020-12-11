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

    function register($data){
        global $koneksi;

        $email = strtolower(stripslashes($data["email"]));
        $username = strtolower(stripslashes($data["username"]));
        $password = mysqli_real_escape_string($koneksi, $data["password"]);
        $password2 = mysqli_real_escape_string($koneksi, $data["kpassword"]);

        //cek username sudah ada atau belum

        $result = mysqli_query($koneksi, "SELECT email FROM pengguna WHERE email = '$email'");
        if(mysqli_fetch_assoc($result)){
            echo"<script>
                alert('Email sudah terdaftar, silahkan untuk login');
            </script>
            ";
            return false;
        }

        if( $password !== $password2){
            echo"<script>
                alert('Konfirmasi password tidak sesuai');
            </script>
            ";
            return false;
        }

        $password = password_hash($password, PASSWORD_DEFAULT);

        mysqli_query($koneksi, "INSERT INTO pengguna VALUES('$email','$username','$password')");

        return mysqli_affected_rows($koneksi);


    }
?>