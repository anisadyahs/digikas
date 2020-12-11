<?php


        //membuat koneksi ke database

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

function tambah($data){
    global $koneksi;
    $nama = htmlspecialchars($data["n-target"]);
    $jskrg = htmlspecialchars($data["n-skrg"]);
    $jumlah = htmlspecialchars($data["j-target"]);
    $tenggat = htmlspecialchars($data["t-target"]);

    $query = "INSERT INTO rencana
    VALUES
    ('', '$nama',$jskrg, $jumlah, '$tenggat', '')
    ";
    mysqli_query($koneksi, $query);
    
    return mysqli_affected_rows($koneksi);
}

function hapus($id){
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM rencana WHERE id_rencana = $id");
    return mysqli_affected_rows($koneksi);
}

function edit($data){
    global $koneksi;
    $id = $data["id-rencana"];
    $nama = htmlspecialchars($data["n-target"]);
    $jskrg = htmlspecialchars($data["n-skrg"]);
    $jumlah = htmlspecialchars($data["j-target"]);
    $tenggat = htmlspecialchars($data["t-target"]);

    $query = "UPDATE rencana SET
        n_rencana = '$nama',
        n_skrg = $jskrg,
        n_target = $jumlah,
        t_target = '$tenggat'
     WHERE id_rencana = $id
    ";

    mysqli_query($koneksi, $query);
    
    return mysqli_affected_rows($koneksi);
}

?>