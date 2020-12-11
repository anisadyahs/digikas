<?php

session_start();

if( !isset($_SESSION["login"]) ){
    header("Location: userLogin.php");
    exit;
}

require '../../aplikasi/artikelController.php';
$artikel = query("SELECT * FROM artikel");

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Artikel-Digikas</title>
        <link rel="stylesheet" href="../../css/artikelStyle.css" type="text/css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

                    <ul>
                        <li>
                        <?php $i = 1; ?>
                        <?php foreach($artikel as $arti) : ?>
                            <a href="isiArtikel.php?id_artikel=<?= $arti["id_artikel"];?>">
                                <div class="card">
                                    <img src="../../image/<?= $arti["gambar"] ?>">
                                    <div class="article-description">
                                        <h3><?= $arti["judul"] ?></h3>
                                        <p><?= $arti["tanggal"] ?></p>
                                        <p><?= $arti["penulis"] ?></p>
                                    </div>
                                </div>
                            </a>
                        <?php $i++ ?>
                        <?php  endforeach; ?>   
                        </li> <br>
                    </ul>
                </div>
          </div>
         </div>
        </div>
        <script type="text/javascript" src="../../js/script.js"></script>
    </body>
</html>