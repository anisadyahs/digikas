<?php

require 'rencanaController.php';

$id = $_GET["id_rencana"];

if( hapus($id) > 0){
    echo "
    <script> 
        alert('Data berhasil dihapus!');
        document.location.href = '../resource/views/renKeuangan.php'
    </script>
    ";
} else{
    echo "
    <script> 
        alert('Data gagal dihapus!');
        document.location.href = 'renKeuangan.php'
    </script>
    ";
}

?>