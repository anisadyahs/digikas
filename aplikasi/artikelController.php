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

    function baca($query){
        global $koneksi;
        $result = mysqli_query($koneksi, $query);
        $rows = [];
        while ( $row = mysqli_fetch_array($result)){
            $rows[] = $row;
        }
        return $rows;
    }



 /*   function baca($id){
        global $koneksi;
        mysqli_query($koneksi, "SELECT FROM artikel WHERE id_artikel = $id");
    }*/

?>