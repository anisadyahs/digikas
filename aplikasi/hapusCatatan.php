<?php

require 'catatanController.php';

$id = $_GET["id_catatan"];

if( hapus($id) > 0){
    echo "
    <script> 
        alert('Data berhasil dihapus!');
        document.location.href = '../resource/views/catatanList.php'
    </script>
    ";
} else{
    echo "
    <script> 
        alert('Data gagal dihapus!');
        document.location.href = 'catatanList.php'
    </script>
    ";
}

?>