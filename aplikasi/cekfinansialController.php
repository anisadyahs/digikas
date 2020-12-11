<?php



function check($data){
    $pendapatan = parseInt($data["j-pendapatan"]);
    $tabungan =  parseInt($data["j-tabungan"]);
    $pengeluaran =  parseInt($data["j-pengeluaran"]);
    $tabunganbulan =  parseInt($data["j-tabunganbulan"]);
    $status =  ($data["status"]);
    $tanggungan =  parseInt($data["j-tanggungan"]);


    $rtabungan = $pendapatan / $tabungan;
    $ddarurat = 6 * $pengeluaran * $tanggungan;

    if($rtabungan < 2000/100 *$pendapatan){
        $rt = 'tidak ideal';
    } else {
        $rt = 'ideal';
    }

    if($tabungan >= $ddarurat){
        $rl = 'ideal';
    } else{
        $rl = 'tidak ideal';
    }
    return $rt, $rl;

}


?>