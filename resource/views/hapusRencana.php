<?php

require '../../aplikasi/rencanaController.php';

$id = $_GET["id_rencana"];

if( hapus($id) > 0){
    echo "
    <script> 
        alert('Data berhasil dihapus!');
        document.location.href = 'renKeuangan.php'
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