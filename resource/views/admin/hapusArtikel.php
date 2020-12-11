<?php

require '../../../aplikasi/adminartikelController.php';

$id = $_GET["id_artikel"];

if( hapus($id) > 0){
    echo "
    <script> 
        alert('Data berhasil dihapus!');
        document.location.href = 'artikelList.php'
    </script>
    ";
} else{
    echo "
    <script> 
        alert('Data gagal dihapus!');
        document.location.href = 'artikelList.php'
    </script>
    ";
}

?>