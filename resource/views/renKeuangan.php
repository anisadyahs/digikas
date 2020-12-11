<?php
session_start();


if( !isset($_SESSION["login"]) ){
    header("Location: userLogin.php");
    exit;
}

require '../../aplikasi/rencanaController.php';
$rencana = query("SELECT * FROM rencana");



?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../css/renkeuanganStyle.css" type="text/css">
        <title>RencanaKeuangan-Digikas</title> 
        <script src="https://kit.fontawesome.com/e9a1d9dd4b.js" crossorigin="anonymous"></script>
        <style>
            .profile a{
                color: #3E4155;
                margin-left: 3px;
                font-size: 12px;
            }
            .main-container{
                display:block;

            }
             .button{
                float: right;
                margin-right: 15px;
                width: 100px;
                height: 40px;
                border: 0;
                outline: none;
                border-radius: 10px;
                background-color: #202E78;
                letter-spacing: 0.1rem;
                font-size: 14px;
                font-weight: 500;
                cursor: pointer;
                
            }
            .button a{
                text-decoration: none;
                color: #F4F5FA ;
                align-items: center;
            }
            .button:hover{
                background-color:#1a234d;
                color: #F4F5FA;
            }
            .plan-list{
                display:grid;
                grid-template-columns: auto auto auto;
                margin-top: 60px;
            }
            .plan-card{
                width: 330px;
                height: 190px;
                padding: 20px;
                margin-top : 10px;
                margin-bottom : 10px;
                margin-right: 20px;
                border-radius: 20px;
                background-color: #F4F5FA;
            }

            .plan-card .action{
                display:flex;
                float: right;
            }

            .plan-card .action div {
                width: 25px;
                height: 25px;
                margin-left: 2px;
            }

            .plan-card .action i{
                color: #202E78;
            }

            .plan-card .action i:hover{
                color: #1a234d;
            }

            .plan-card h4{
                height: 35px;
            }

            .plan-card p{
                font-size: 14px;
                margin-top:10px;
                margin-bottom: 10px;
            }

            @media screen and (max-width: 1024px){
                .plan-card{
                width: 271px;
            }

            }

            @media screen and (max-width: 768px){
                .plan-list{
                display:block;
                }
                .plan-card{
                width: 660px;
                }
            }
            @media screen and (max-width: 600px){
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
                               <li><a href="renKeuangan.php" class="active">
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
                           <p>Rencana Keuangan</p>
                       </div>
                       <div class="profile">
                           <img src="../../image/man.svg">
                           <a href="userLogout.php">Logout</a>
                       </div>
                   </div>
   
                       <!--Main contain of page-->
                   <div class="main-container">
                        <button class="button"><a href="form/rencanaForm.php">Tambah</a></button>
                        <div class="plan-list">
                        <?php $i = 1; ?>
                        <?php foreach($rencana as $renc) : ?>
                        <div class="plan-card">
                            <div class="action">
                                <div><a  href="../../aplikasi/hapusRencana.php?id_rencana=<?= $renc["id_rencana"]; ?>"><i class="fas fa-trash-alt fa-1x"></i></a></div>
                                <div><a href="form/rencanaeditForm.php?id_rencana=<?= $renc["id_rencana"]; ?>"><i class="fas fa-edit fa-1x"></i></a></div>
                             </div>
                             <h4><?= $renc["n_rencana"] ?></h4>
                             <p>Target           : <?= $renc["n_target"] ?></p>
                             <p>Nominal sekarang : <?= $renc["n_skrg"] ?> </p>
                             <p>Tenggat : <?= $renc["t_target"] ?> </p>
                        </div>  
                        <?php $i++ ?>
                        <?php  endforeach; ?>
                        </div>                       
                   </div>
             </div>
            </div>
           </div>
           <script type="text/javascript" src="../../js/script.js"></script>
       </body>
</html>