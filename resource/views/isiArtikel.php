<?php
session_start();

if( !isset($_SESSION["login"]) ){
    header("Location: userLogin.php");
    exit;
}

$id = $_GET["id_artikel"];


$koneksi = mysqli_connect("localhost", "root", "", "digikas");
$query   = mysqli_query($koneksi, "SELECT * FROM artikel WHERE id_artikel='$id'");
$arti    = mysqli_fetch_array($query);


?>


<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../css/isiartikelStyle.css" type="text/css">
        <title>Artikel-Digikas</title> 
        <style>
            .profile a{
                color: #3E4155;
                margin-left: 3px;
                font-size: 12px;
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
                               <li><a href="#">
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
                               <li><a href="cekFinansial.php">
                                   <span class="menu-icon"><i class="fas fa-clipboard-check fa-2x"></i></span>
                                   <span class="menu-desk">
                                       Cek finansial
                                   </span>
                               </a></li>
                               <li><a href="artikel.php" class="active">
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
                           <p>Artikel</p>
                       </div>
                       <div class="profile">
                           <img src="../../image/man.svg">
                           <a href="userLogout.php">Logout</a>
                       </div>
                   </div>
   
                       <!--Main contain of page-->
                   <div class="main-container">
                        <div class="article">
                            <div class="image-article">
                                <img src="../../image/<?= $arti["gambar"] ?>">
                            </div>
                            <div class="info-article">
                                <p class="writer"><?= $arti["penulis"] ?></p>
                                <p class="date"><?= $arti["tanggal"] ?></p>
                            </div>
                            <div class="title-article">
                                <h2><?= $arti["judul"] ?></h2>
                            </div>
                            <div class="body-article">
                                <p> <?= $arti["isi"] ?> </p>
                            </div>
                        </div>
                   </div>
             </div>
            </div>
           </div>
           <script type="text/javascript" src="../../js/script.js"></script>
       </body>
</html>