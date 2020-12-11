<?php

session_start();

if( !isset($_SESSION["login"]) ){
    header("Location: adminLogin.php");
    exit;
}

require '../../../aplikasi/adminartikelController.php';
$artikel = query("SELECT * FROM artikel");

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Artikel-Digikas</title>
        <link rel="stylesheet" href="../../../css/artikelStyle.css" type="text/css">
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

            .article-list {
                width: 1040px;
                border-collapse: collapse;
            }
            .article-list a{
                color: #3E4155;
            }
            .article-list td, .article-list th {
                padding: 12px 15px;
                border: 1px solid rgba(179, 188, 245, 0.7);
                text-align: center;
            }

            .article-list th {
               background-color: #202E78;
               color: #F4F5FA;
            }

            .article-list tbody tr{
                font-size: 14px;
            }

            .article-list tbody tr:nth-child(even){
                background-color: #f5f5f5;
            }

            .article-list i{
                color: #202E78
            }

            @media screen and (max-width: 1024px){
                .article-list {
                width: 880px;
            }
            }

            @media screen and (max-width: 768px){
                .article-list {
                width: 650px;
                }
            }

            @media screen and (max-width: 600px){

                .article-list{
                    width: 450px;
                }
                .article-list thead{
                    display:none;
                }

                .article-list tbody, .article-list tr, .article-list td{
                    display: block;
                    width: 450px;

                }

                .article-list tr{
                    margin-bottom: 10px;
                }

                .article-list td{
                    height: 50px;
                    padding-left: 100px;
                    text-align: right;
                    position:relative;
                    text-align: left;
                }

                .article-list td::before{
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
                            <li><a href="penggunaList.php">
                                <span class="menu-icon"><i class="fas fa-users fa-2x"></i></span>
                                <span class="menu-desk">
                                    Pengguna
                                </span>
                            </a></li>
                            <li><a href="artikelList.php" class="active">
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
                        <img src="../../../image/man.svg">
                        <a href="adminLogout.php">Logout</a>
                    </div>
                </div>

                    <!--Main contain of page-->
                <div class="main-container">
                <button class="button"><a href="artikelForm.php">Tambah</a></button>
                <br><br><br><br>
                <div class="content-table">
                   <table class="article-list">
                        <thead>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Tanggal</th>
                        <th>Penulis</th>
                        <th>Aksi</th>
                        </thead>
                        <tbody>
                        <?php $i = 1; ?>
                        <?php foreach($artikel as $arti) : ?>
                        <tr>
                            <td data-label ="No"><?= $i ?></td>
                            <td data-label ="Judul"><?= $arti["judul"] ?></td>
                            <td data-label ="Tanggal"><?= $arti["tanggal"] ?></td>
                            <td data-label ="Penulis"><?= $arti["penulis"] ?></td>
                            <td data-label ="Aksi"><a href="hapusArtikel.php?id_artikel=<?= $arti["id_artikel"]; ?>"><i class="fas fa-trash-alt fa-1x"></i>  Hapus</a></td>
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