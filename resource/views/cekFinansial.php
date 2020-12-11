<?php

session_start();

if( !isset($_SESSION["login"]) ){
    header("Location: userLogin.php");
    exit;
}

if( !isset($_POST["submit"])){
 //   check($_POST);
}

?>


<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../css/cekfinansialStyle.css" type="text/css">
        <title>CekFinansial-Digikas</title> 
        <style>
            .profile a{
                color: #3E4155;
                margin-left: 3px;
                font-size: 12px;
            }
            .button{
                float: right;
                margin-top: 40px;
                margin-left: 15px;
                width: 90px;
                height: 40px;
                border: 0;
                outline: none;
                border-radius: 10px;
                background-color: #202E78;
                color: #F4F5FA ;
                letter-spacing: 0.1rem;
                font-size: 14px;
                font-weight: 500;
                cursor: pointer;
            }
            .button:hover{
                background-color:#1a234d;
                color: #F4F5FA;
            }

            .hasilCek p{
                margin-bottom: 15px;
            }
        </style>
        <script src="https://kit.fontawesome.com/e9a1d9dd4b.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <div class="inner-container"> 
   
               <!-- Vertical Navbar-->
             <div class="menu-container">
               <div class="backdrop"></div>
               <div class="menu-bar">
                   <div class ="menu">
   
                       <h3>Digikas</h3><br>
                       <p>Menu</p>
                       <br> <br> 
   
                           <ul>
                               <li><a href="beranda.php">
                                   <span class="menu-icon"><i class="fas fa-home fa-2x"></i></span>
                                   <span class="menu-desk">
                                       Beranda
                                   </span>
                               <br>

                               </a></li>
                               <li><a href="catatanList.php">
                                   <span class="menu-icon"><i class="fas fa-book-open fa-2x"></i></span>
                                   <span class="menu-desk">
                                       Catatan keuangan
                                   </span>
                               </a></li>
                               <li><a href="renKeuangan.php">
                                   <span class="menu-icon"><i class="fas fa-tasks fa-2x"></i></span>
                                   <span class="menu-desk">
                                   Rencana keuangan
                                   </span>
                               </a></li>
                               <li><a href="cekFinansial.php"  class="active">
                                   <span class="menu-icon"><i class="fas fa-clipboard-check fa-2x"></i></span>
                                   <span class="menu-desk">
                                       Cek finansial
                                   </span>
                               </a></li>
                               <li><a href="artikel.php">
                                   <span class="menu-icon"><i class="fas fa-newspaper fa-2x"></i></span>
                                   <span class="menu-desk">
                                       Artikel
                                   </span>
                               </a></li>
                           </ul>
                       </div>
                   </div>
           </div>
             
                   <!--Page Contain-->
             <div class="page-container">
   
                       <!--Upper contain-->
                   
                   <div class="header">
                       <div class="menu-button"> <i class="fas fa-bars"></i> </div>
                       <div class="title-page">
                           <p>Cek finansial</p>
                       </div>
                       <div class="profile">
                           <img src="../../image/man.svg">
                           <a href="userLogout.php">Logout</a>
                       </div>
                   </div>
   
                       <!--Main contain of page-->
                   <div class="main-container">
                        <div class="form-container">
                            <div class="tanggungan">
                                <form class="cek-form">
                                    <h4>Kekayaan</h4><br><br>
                                    <label for="j-pendapatan">Jumlah pendapatan</label><br>
                                    <div class="field-input">
                                        <input class="input" type="text" name="j-pendapatan" placeholder="mis. 7000000">
                                    </div>
                                    <label for="j-tabungan">Jumlah tabungan</label><br>
                                    <div class="field-input">
                                        <input class="input" type="text" name="j-tabungan" placeholder="mis. 40000000">
                                    </div>
                                   <br><br>
                                    <h4>Pengeluaran</h4><br><br>
                                    <label for="j-pengeluaran">Jumlah pengeluaran</label><br>
                                    <div class="field-input">
                                        <input class="input" type="text" name="j-pengeluaran" placeholder="mis. 2000000">
                                    </div>
                                    <label for="j-tabunganbulan">Jumlah tabungan per bulan</label><br>
                                    <div class="field-input">
                                        <input class="input" type="text" name="j-tabunganbulan" placeholder="mis. 800000">
                                    </div><br><br>
                                    <h4>Tanggungan</h4><br><br>
                                    <label for="status">Status</label><br>
                                    <div class="field-input">
                                        <select name="status" id="status">
                                            <option value="Single">Single</option>
                                            <option value="Menikah">Menikah</option>
                                            <option value="Berkeluarga">Berkeluarga</option>
                                        </select>
                                    </div>
                                    <label for="j-tanggungan">Jumlah orang yang ditanggung</label><br>
                                    <div class="field-input">
                                        <input class="input" type="text" name="j-tanggungan" placeholder="mis. 1">
                                    </div>
                                    <button class="button" name="submit" type ="submit">Cek</button>
                                </form>
                                <br><br><br><br><br><br><br><br>
                                <div class="hasilCek">
                                <h4>Hasil cek </h4>
                                <br><br>
                                <?php
                                    if(isset($_GET['submit'])){
                                        $pendapatan = $_GET['j-pendapatan'];
                                        $tabungan = $_GET['j-tabungan'];
                                        $pengeluaran = $_GET['j-pengeluaran'];
                                        $tabunganbulan = $_GET['j-tabunganbulan'];
                                        $tanggungan = $_GET['j-tanggungan'];
                                        rlikuiditas($tabungan, $pengeluaran, $tanggungan) ; 
                                        rtabungan($pendapatan, $tabunganbulan);
                                    }

                                    function rlikuiditas($tabungan, $pengeluaran, $tanggungan){
                                            $darurat= $pengeluaran * $tanggungan * 6;

                                            if($darurat < $tabungan){
                                                echo "Rasio likuiditas anda sudah ideal <br> 
                                                karena telah memenuhi nilai dana darurat";
                                            } else{
                                                echo "Rasio likuiditas anda belum ideal <br> 
                                                karena belum memenuhi nilai dana darurat <br>" ; 
                                                echo "Dana darurat yang harus dipenuhi : ". $darurat;
                                            }   
                                    }

                                    function rtabungan($pendapatan, $tabunganbulan){
                                        $rtabungan= $tabunganbulan / $pendapatan;
                                        echo "<br><br> Rasio tabungan anda : ". $rtabungan;
                                        if($rtabungan >= 0.2){
                                            echo " <br> Rasio tabungan anda sudah ideal";
                                        } else {
                                            echo " <br> Rasio tabungan anda belum ideal";
                                        }
                                    }
                                
                                ?>
                            
                                </div>
                            </div>
                        </div>

                        <div>
                            <div>
                               
                            </div>
                        </div>
                   </div>
             </div>
            </div>
           </div>
           <script type="text/javascript" src="../../js/script.js"></script>
       </body>
</html>