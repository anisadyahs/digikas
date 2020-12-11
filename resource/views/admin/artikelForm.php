<?php

session_start();

if( !isset($_SESSION["login"]) ){
    header("Location: adminLogin.php" );
    exit;
}

require '../../../aplikasi/adminartikelController.php';

if (isset ($_POST["submit"])){
    
    if( tambah($_POST) > 0){
        echo "
         <script> 
             alert('Data berhasil ditambahkan!');
             document.location.href = 'artikelList.php'
         </script>
        ";
    } else {
        echo "
        <script> 
             alert('Data tidak berhasil ditambahkan!');
             document.location.href = '#'
         </script>
        
        ";
    }

 }
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../../css/renkeuanganStyle.css" type="text/css">
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

            .back{
                margin-top: 20px;
                width: 100px;
                height: 40px;
                border: 1px;
                border-style: solid;
                border-radius: 10px;
                background-color: white;
                color: #202E78;
                letter-spacing: 0.1rem;
                font-size: 14px;
                font-weight: 500;
                margin-left: 0px;
                cursor: pointer;
            }

            .back a{
                text-decoration: none;
                color: #202E78;
            }

            .back:hover{
                background-color:#202E78;
            }

            .back a:hover{
                color: #F4F5FA;
            }

            .button{
                float: right;
                width: 100px;
                height: 40px;
                border: 0;
                outline: none;
                border-radius: 10px;
                background-color: #202E78;
                color: #F4F5FA;
                letter-spacing: 0.1rem;
                font-size: 14px;
                font-weight: 500;
                margin-top: 20px;
                cursor: pointer;
                
            }
            
            .button:hover{
                background-color:#1a234d;
                color: #F4F5FA;
            }
            h3{
                color: #3E4155;
            }
            .form{
                width: 1035px;
            }  
            
            .form label{
                font-size: 14px;
                font-weight: 400;
                letter-spacing: 0.05em;
                color: #3E4155;
            }
            .field-input{
                width: 1035px;
                height: 40px;
                margin: 10px 0;
                border-radius: 10px;
                border: 1px solid rgba(179, 188, 245, 0.7);
            }

            .field-input-area{
                width: 1035px;
                height: 1000px;
                margin: 10px 0;
                border-radius: 10px;
                border: 1px solid rgba(179, 188, 245, 0.7);
            }

            .field-input-area textarea{
                width: 1035px;
                height: 1000px;
                margin-top: 10px;
                margin-bottom: 10px;
                margin-left: 10px;
                margin-right: 10px;
                background: none;
                outline: none;
                border: none;
                font-family: 'Montserrat', sans-serif;
                letter-spacing: 0.05em;
                color:  #3E4155;

            }

            .field-input input{
                width: 1015px;
                height: 40px;
                margin-left: 10px;
                margin-right: 10px;
                background: none;
                outline: none;
                border: none;
                font-family: 'Montserrat', sans-serif;
                letter-spacing: 0.05em;
                color:  #3E4155;
            }


            @media screen and (max-width: 1024px){
                .form{
                    width: 880px;
                }
    
                .field-input{
                    width: 880px;
                }

                .field-input-area{
                    width: 880px;
                }
                
                .field-input-area textarea{
                    width: 860px;
                    height: 980px;
                }

                .field-input input{
                    width: 860px;
                    height: 40px;
                }

            }

            @media screen and (max-width: 768px){
                .form{
                    width: 645px;
                }

                .field-input{
                    width: 645px;
                }

                .field-input-area{
                    width: 645px;
                }

                .field-input-area textarea{
                    width: 620px;
                    height: 980px;
                }
    
                .field-input input{
                    width: 625px;
                    height: 40px;
                }
            }
            @media screen and (max-width: 600px){
                h3 {
                    font-size: 16px;
                }
                .form{
                    width: 450px;
                }
    
                .field-input{
                    width: 450px;
                }

                .field-input-area{
                    width: 450px;
                    height: 920px;
                }

                .field-input-area textarea{
                    width: 430px;
                    height: 900px;
                }
 
                .field-input input{
                    width: 430px;
                    height: 40px;
                }
            }

            @media screen and (max-width: 320pxpx){
                
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
                        <button class="back"><a href="artikelList.php">Kembali</a></button> <br><br><br>
                        <h3>Tambah Artikel Baru<h3>
                        <br><br>    
                        <form class="form" action="" method="post" enctype="multipart/form-data">
                                    <label for="title">Judul</label><br>
                                    <div class="field-input">
                                        <input class="input" type="text" name="title" placeholder="Judul Artikel" required>
                                    </div>
                                    <label for="date">Tanggal</label><br>
                                    <div class="field-input">
                                        <input class="input" type="date" name="date" placeholder="Tanggal" required>
                                    </div>
                                    <label for="author">Nama Penulis</label><br>
                                    <div class="field-input">
                                        <input class="input" type="input" name="author" placeholder="Nama Penulis" required>
                                    </div>
                                    <label for="image">Gambar</label><br>
                                    <div class="field-input">
                                        <input class="input" type="file" name="image" placeholder="Masukkan file gambar" required>
                                    </div>
                                    <label for="article">Isi artikel</label><br>
                                    <div class="field-input-area">
                                        <textarea class="input" name="article" placeholder="Artikel" required></textarea>
                                    </div>
                                    
                                        <button class="button" type="submit" name="submit">Tambah</button>
                        </form>
                        
                   </div>
             </div>
            </div>
           </div>
           <script type="text/javascript" src="../../../js/script.js"></script>
       </body>
</html>