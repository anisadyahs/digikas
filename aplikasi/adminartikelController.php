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

    function tambah($data){
        global $koneksi;
        $judul = htmlspecialchars($data["title"]);
        $tanggal = htmlspecialchars($data["date"]);
        $penulis = htmlspecialchars($data["author"]);
        $gambar = upload();
         if ( !$gambar ){
             return false;
         }
        $isi = htmlspecialchars($data["article"]);

        
           

        $query = "INSERT INTO artikel
        VALUES
        ('', '$judul','$tanggal', '$penulis', '$gambar', '$isi')
        ";
        mysqli_query($koneksi, $query);
        
        return mysqli_affected_rows($koneksi);
    }

    function upload(){
        $namaFile = $_FILES['image']['name'];
        $ukuranFile = $_FILES['image']['size'];
        $error = $_FILES['image']['error'];
        $tmpName = $_FILES['image']['tmp_name'];

        //cek apakah ada file diupload
        if( $error === 4){
            echo "<script>
                alert('Masukkan file gambar terlebih dahulu!');
            </script>
            ";
            return false;
        }

        //cek file gambar
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'gif'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));

        if( !in_array($ekstensiGambar, $ekstensiGambarValid)){
            echo "<script>
                alert('Masukkan file gambar yang memiliki format jpg, jpeg, png atau gif');
            </script>
            ";
            return false;
        }

        if( $ukuranFile > 20000000 ){
            echo "<script>
            alert('File yang anda masukkan terlalu besar!');
        </script>
        ";
        return false;
        }



        //
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;

        //upload ke directory
        move_uploaded_file($tmpName, '../../../image/'.$namaFileBaru);
        
      //  move_uploaded_file( $tmpName, '../../../image/' . $namaFileBaru );

        return $namaFileBaru;

    }

    function hapus($id){
        global $koneksi;
        mysqli_query($koneksi, "DELETE FROM artikel WHERE id_artikel = $id");
        return mysqli_affected_rows($koneksi);
    }

?>