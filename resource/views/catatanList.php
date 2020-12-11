<?php

session_start();


if( !isset($_SESSION["login"]) ){
    header("Location: userLogin.php");
    exit;
}

require '../../aplikasi/catatanController.php';
$catatan = query("SELECT * FROM catatan");

?>



<!DOCTYPE html>
<html>
    <head>
        <title>CatatanKeuangan-Digikas</title>
        <link rel="stylesheet" href="../../css/artikelStyle.css" type="text/css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/e9a1d9dd4b.js" crossorigin="anonymous"></script>
        <style> 

            .profile a{
                color: #3E4155;
                margin-left: 3px;
                font-size: 12px;
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

            .catatan-list {
                width: 1040px;
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

            .catatan-list i{
                color: #202E78
            }

            @media screen and (max-width: 1024px){
                .catatan-list {
                width: 880px;
            }
            }

            @media screen and (max-width: 768px){
                .catatan-list {
                width: 650px;
                }
            }

            @media screen and (max-width: 600px){

                .catatan-list{
                    width: 450px;
                }
                .catatan-list thead{
                    display:none;
                }

                .catatan-list tbody, .catatan-list tr, .article-list td{
                    display: block;
                    width: 450px;

                }

                .catatan-list tr{
                    margin-bottom: 10px;
                }

                .catatan-list td{
                    height: 50px;
                    padding-left: 100px;
                    text-align: right;
                    position:relative;
                    text-align: left;
                }

                .catatan-list td::before{
                    content: attr(data-label);
                    position: absolute;
                    left: 0;
                    width : 100px;
                    padding-left: 10px;
                    font-size: 14px;
                    font-weight: bold;
                    text-align: left;
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
                               <li><a href="catatanList" class="active">
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
                        <p>Catatan Keuangan</p>
                    </div>
                    <div class="profile">
                        <img src="../../image/man.svg">
                        <a href="userLogout.php">Logout</a>
                    </div>
                </div>

                    <!--Main contain of page-->
                <div class="main-container">
                <button class="button"><a href="form/catatanForm.php">Tambah</a></button>
                <br><br><br><br>
                <div class="content-table">
                   <table class="catatan-list">
                        <thead>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Jenis</th>
                        <th>Nominal</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
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
                            <td data-label ="Aksi">
                                <a href="../../aplikasi/hapusCatatan.php?id_catatan=<?= $cat["id_catatan"]; ?>"><i class="fas fa-trash-alt fa-1x"></i>  Hapus</a>
                                <a href="form/catataneditForm.php?id_catatan=<?= $cat["id_catatan"]; ?>"><i class="fas fa-edit fa-1x"></i>  Edit</a>
                            </td>
                        </tr>
                        <?php $i++ ?>
                        <?php  endforeach; ?>
                        </tbody>
                   </table>
                </div>
                </div>
          </div>
         </div>
        </div>
        <script type="text/javascript" src="../../../js/script.js"></script>
    </body>
</html>