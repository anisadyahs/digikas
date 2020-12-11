<?php

require '../../../aplikasi/adminuserController.php';

$email = $_GET["email"];

if( hapus($email) > 0){
    echo "
    <script> 
        alert('Data berhasil dihapus!');
        document.location.href = 'penggunaList.php'
    </script>
    ";
} else{
    echo "
    <script> 
        alert('Data gagal dihapus!');
        document.location.href = 'penggunaList.php'
    </script>
    ";
}

?>