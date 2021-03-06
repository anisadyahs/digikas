<?php

session_start();

if( !isset($_SESSION["login"]) ){
    header("Location: userLogin.php");
    exit;
}
    require '../../../aplikasi/catatanController.php';

    $id = $_GET["id_catatan"];

    $catatan = query("SELECT * FROM catatan WHERE id_catatan = $id")[0];


    if (isset ($_POST["submit"])){
       if( edit($_POST) > 0){
           echo "
            <script> 
                alert('Data berhasil diubah!');
                document.location.href = '../catatanList.php'
            </script>
           ";
       } else {
           echo "
           <script> 
                alert('Data tidak berhasil diubah!');
                document.location.href = 'catataneditForm.php'
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
        <title>CatatanKeuangan-Digikas</title> 
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
            .form-note{
                width: 1035px;
            }  
            
            .form-note label{
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

            .field-input select{
                width: 1015px;
                height:40px;
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
                .form-note{
                    width: 880px;
                }
    
                .field-input{
                    width: 880px;
                }
    
                .field-input input{
                    width: 860px;
                    height: 40px;
                }

                .field-input select{
                 width: 860px;
                height:40px;
                }

            }

            @media screen and (max-width: 768px){
                .form-note{
                    width: 645px;
                }

                .field-input{
                    width: 645px;
                }
    
                .field-input input{
                    width: 625px;
                    height: 40px;
                }
                .field-input select{
                    width: 625px;
                    height:40px;
                }
            }
            @media screen and (max-width: 600px){
                h3 {
                    font-size: 16px;
                }
                .form-note{
                    width: 450px;
                }
    
                .field-input{
                    width: 450px;
                }
 
                .field-input input{
                    width: 430px;
                    height: 40px;
                }

                .field-input select{
                    width: 430px;
                    height:40px;
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
                               <li><a href="../beranda.php">
                                   <span class="menu-icon"><i class="fas fa-home fa-2x"></i></span>
                                   <span class="menu-desk">
                                       Beranda
                                   </span>
                               <br>
                               </a></li>
                               <li><a href="../catatanList" class="active">
                                   <span class="menu-icon"><i class="fas fa-book-open fa-2x"></i></span>
                                   <span class="menu-desk">
                                       Catatan keuangan
                                   </span>
                               </a></li>
                               <li><a href="../renKeuangan.php">
                                   <span class="menu-icon"><i class="fas fa-tasks fa-2x"></i></span>
                                   <span class="menu-desk">
                                   Rencana keuangan
                                   </span>
                               </a></li>
                               <li><a href="../cekFinansial.php">
                                   <span class="menu-icon"><i class="fas fa-clipboard-check fa-2x"></i></span>
                                   <span class="menu-desk">
                                       Cek finansial
                                   </span>
                               </a></li>
                               <li><a href="../artikel.php">
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
                           <img src="../../../image/man.svg">
                           <a href="../userLogout.php">Logout</a>
                       </div>
                   </div>
   
                       <!--Main contain of page-->
                   <div class="main-container">
                        <button class="back"><a href="../catatanList.php">Kembali</a></button> <br><br><br>
                        <h3>Edit Catatan Keuangan <h3>
                        <br><br>  
                        <form class="form-note" action="" method="post">
                        <input class="input" type="hidden" name="id-catatan" id="id-catatan" required value="<?= $catatan["id_catatan"]; ?>">  
                        <input class="input" type="hidden" name="id-pengguna" id="id-pengguna" required value="<?= $catatan["id_pengguna"]; ?>">  
                                    <label for="tanggal">Tanggal</label><br>
                                    <div class="field-input">
                                        <input class="input" type="date" name="tanggal" value="<?= $catatan["tanggal_cat"]; ?>" id="tanggal"  required>
                                    </div>
                                    <label for="jenis">Jenis</label><br>
                                    <div class="field-input">
                                        <select class="input" type="text" name="jenis" id="jenis" value="<?= $catatan["jenis"]; ?>"  required>
                                            <option value="Pemasukan">Pemasukan</option>
                                            <option value="Pengeluaran">Pengeluaran</option>
                                        </select>
                                    </div>
                                    <label for="nominal">Nominal</label><br>
                                    <div class="field-input">
                                        <input class="input" type="text" name="nominal" id="nominal" value="<?= $catatan["nominal"]; ?>"  required>
                                    </div>
                                    <label for="keterangan">Keterangan</label><br>
                                    <div class="field-input">
                                        <input class="input" type="text" name="keterangan" id="keterangan"  value="<?= $catatan["keterangan"]; ?>" required>
                                    </div>
                                    
                                        <button class="button" name ="submit" type="submit">Edit</button>
                        </form>
                        
                   </div>
             </div>
            </div>
           </div>
           <script type="text/javascript" src="../../../js/script.js"></script>
       </body>
</html>