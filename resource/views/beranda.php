<?php

session_start();

if( !isset($_SESSION["login"]) ){
    header("Location: userLogin.php");
    exit;
}


require '../../aplikasi/berandaController.php';

//$id_pengguna = $_SESSION['email'];

$catatan = query("SELECT * FROM catatan LIMIT 7");
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
                overflow -x: auto;
                overflow -y: auto;
                margin-top: 30px;
            }

            .catatan-list {
                margin: 10px;
                width: 1020px;
                border-collapse: collapse;
            }
            .catatan-list a{
                color: #3E4155;
            }
            .catatan-list td, .catatan-list th {
                padding: 12px 15px;
                border: 1px solid rgba(179, 188, 245, 0.7);
                text-align: center;
            }

            .catatan-list th {
               background-color: #202E78;
               color: #F4F5FA;
            }

            .catatan-list tbody tr{
                font-size: 14px;
            }

            .catatan-list tbody tr:nth-child(even){
                background-color: #f5f5f5;
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
                .catatan-list {
                width: 860px;
            }
                .plan-card{
                width: 271px;
            }


            @media screen and (max-width: 768px){

                .catatan-list {
                width: 630px;
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
                overflow-x: auto;
                overflow-y: auto;
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
                             <table class="catatan-list">
                        <thead>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Jenis</th>
                        <th>Nominal</th>
                        <th>Keterangan</th>
                        </thead>
                        <tbody>
                        <?php $i = 1; ?>
                        <?php foreach($catatan as $cat) : ?>
                        <tr>
                            <td data-label ="No"><?= $i ?></td>
                            <td data-label ="Tanggal"><?= $cat["tanggal_cat"] ?></td>
                            <td data-label ="Jenis"><?= $cat["jenis"] ?></td>
                            <td data-label ="Nominal"><?= $cat["nominal"] ?></td>
                            <td data-label ="Keterangan"><?= $cat["keterangan"] ?></td>
                        </tr>
                        <?php $i++ ?>
                        <?php  endforeach; ?>
                        </tbody>
                   </table>
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