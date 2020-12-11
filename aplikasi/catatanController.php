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
    $tanggal = htmlspecialchars($data["tanggal"]);
    $jenis = htmlspecialchars($data["jenis"]);
    $nominal = htmlspecialchars($data["nominal"]);
    $keterangan = htmlspecialchars($data["keterangan"]);

    $query = "INSERT INTO catatan
    VALUES
    ('', '$tanggal','$jenis', $nominal, '$keterangan', '')
    ";
    mysqli_query($koneksi, $query);
    
    return mysqli_affected_rows($koneksi);
}

function hapus($id){
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM catatan WHERE id_catatan = $id");
    return mysqli_affected_rows($koneksi);
}

function edit($data){
    global $koneksi;
    $id = $data["id-catatan"];
    $tanggal = htmlspecialchars($data["tanggal"]);
    $jenis = htmlspecialchars($data["jenis"]);
    $nominal = htmlspecialchars($data["nominal"]);
    $keterangan = htmlspecialchars($data["keterangan"]);
    $pengguna = $data["id-pengguna"];

    $query = "UPDATE catatan SET
        tanggal_cat = '$tanggal',
        jenis = '$jenis',
        nominal = $nominal,
        keterangan = '$keterangan',
        id_pengguna = '$pengguna'
     WHERE id_catatan = $id
    ";

    mysqli_query($koneksi, $query);
    
    return mysqli_affected_rows($koneksi);
}

?>