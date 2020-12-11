<?php

session_start();

if( !isset($_SESSION["login"]) ){
    header("Location: userLogin.php");
    exit;
}


require '../../aplikasi/berandaController.php';

//$id_pengguna = $_SESSION['email'];

$rencana = query("SELECT * FROM rencana LIMIT 3");
$artikel = query("SELECT * FROM artikel LIMIT 3");

?>


<!DOCTYPE html>
<html>

    <head>
        <title>Beranda-Digikas</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../../css/berandaStyle.css">
        <script src="https://kit.fontawesome.com/e9a1d9dd4b.js" crossorigin="anonymous"></script>
        <style>

            .profile a{
                color: #3E4155;
                margin-left: 3px;
                font-size: 12px;
            }

            .report{
                display:grid;
                grid-template-columns: auto auto auto;
                margin-top: 30px;
            }

            .element{
                margin: 20px;
                width: 250px;
                height: 100px;
                background: #202E78;
                border-radius: 6px;
            }

            .element h5{
                font-size: 14px;
                font-weight: 600;
                color: #F4F5FA;
                margin: 15px;
                height: 25px;
            }

            .element p{
                font-size: 14px;
                font-weight: 500;
                color: #F4F5FA;
                margin: 15px;
            }


            .plan-list{
                display:grid;
                grid-template-columns: auto auto auto;
                margin-top: 30px;
            }
            .plan-card {
                width: 330px;
                height: 190px;
                padding: 20px;
                margin-top : 10px;
                margin-bottom : 10px;
                margin-right: 20px;
                border-radius: 20px;
                background-color: #F4F5FA;

            }
            

            @media screen and (max-width: 1024px){
                .plan-card{
                width: 271px;
            }


            @media screen and (max-width: 768px){
                .report{
                display:block;
                padding: 10px;
                }

                .element{
                padding: 5px;
                width : 500px;
                }
                .plan-list{
                display:block;
                }
                .plan-card{
                width: 660px;
                }
            }
            @media screen and (max-width: 600px){
                .report{
                display:block;
                }
                .element{
                width : 300px;
                }
                .plan-list{
                display:block;
                }
                .plan-card{
                width: 450px;
                margin-right: 0px;
                }
            }

            @media screen and (max-width: 320px){
                .report{
                display:block;
                }
                .plan-list{
                display:block;
                }
                .plan-card{
                width: 170px;
                margin-right: 0px;
                }
            }
            }

        </style>

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
                               <li><a href="beranda.php" class="active">
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
                           <div class="welcome">
                                <p>Halo, </p>
                                <h5>Selamat Datang!</h5>
                           </div>
                       </div>
                       <div class="profile">
                           <img src="../../image/man.svg">
                           <a href="userLogout.php">Logout</a>
                       </div>
                   </div>

                   <div class="main-container">
                        <div class="title-element">
                            <h3>Catatan keuangan anda</h3>
                        </div>
                         <div class= "note-element">
                             <div class="report">
                                 <div class="element">
                                    <h5>Saldo</h5>
                                    <p class="balance-value">Rp. 2900000</p>
                                 </div>
                                 <div class="element">
                                    <h5>Total pengeluaran</h5>
                                    <p class="spending-value">Rp. 3100000</p>
                                 </div>
                                 <div class="element"> 
                                    <h5>Pendapatan</h5>
                                    <p class="income-value">Rp. 6000000</p>
                                 </div>
                             </div>
                       </div>
                    <div class="finance-plan">
                     <div class="title-element">
                         <h3>Rencana keuangan anda</h3>
                     </div>
                      <div class= "plan-list">
                        <?php $i = 1; ?>
                        <?php foreach($rencana as $renc) : ?>
                        <div class="plan-card">
                             <h4><?= $renc["n_rencana"] ?></h4>
                             <p>Target           : <?= $renc["n_target"] ?></p>
                             <p>Nominal sekarang : <?= $renc["n_skrg"] ?> </p>
                             <p>Tenggat : <?= $renc["t_target"] ?> </p>
                        </div>  
                        <?php $i++ ?>
                        <?php  endforeach; ?>
                      </div>
                    </div>
                    <div class="article">
                     <div class="title-element">
                         <h3>Artikel</h3>
                     </div>
                      <div class= "article-list">
                          <?php $i = 1; ?>
                          <?php foreach($artikel as $arti) : ?> 
                          <div class="article-card">
                              <img src="../../image/<?= $arti["gambar"] ?>">
                             <h4><?= $arti["judul"] ?></h4>
                             <a href="isiArtikel.php?id_artikel=<?= $arti["id_artikel"];?>">Lihat lebih lanjut</a> 
                          </div>
                          <?php $i++ ?>
                          <?php  endforeach; ?>
                      </div>
                    </div>
                   </div> 
              </div>
            </div>
           </div>
        <script type="text/javascript" src="../../js/script.js"></script>
    </body>
</html>