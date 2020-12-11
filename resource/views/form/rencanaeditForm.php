<?php
session_start();

if( !isset($_SESSION["login"]) ){
    header("Location: userLogin.php");
    exit;
}
    require '../../../aplikasi/rencanaController.php';

    $id = $_GET["id_rencana"];

    $rencana = query("SELECT * FROM rencana WHERE id_rencana = $id")[0];


    if (isset ($_POST["submit"])){
       if( edit($_POST) > 0){
           echo "
            <script> 
                alert('Data berhasil diubah!');
                document.location.href = '../renKeuangan.php'
            </script>
           ";
       } else {
           echo "
           <script> 
                alert('Data tidak berhasil diubah!');
                document.location.href = 'rencanaeditForm.php'
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
            .form-plan{
                width: 1035px;
            }  
            
            .form-plan label{
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
                .form-plan{
                    width: 880px;
                }
    
                .field-input{
                    width: 880px;
                }
    
                .field-input input{
                    width: 860px;
                    height: 40px;
                }

            }

            @media screen and (max-width: 768px){
                .form-plan{
                    width: 645px;
                }

                .field-input{
                    width: 645px;
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
                .form-plan{
                    width: 450px;
                }
    
                .field-input{
                    width: 450px;
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
                               <li><a href="../beranda.php">
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
                               <li><a href="../renKeuangan.php" class="active">
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
                           <p>Rencana Keuangan</p>
                       </div>
                       <div class="profile">
                           <img src="../../../image/man.svg">
                           <a href="../userLogout.php">Logout</a>
                       </div>
                   </div>
   
                       <!--Main contain of page-->
                   <div class="main-container">
                        <button class="back"><a href="../renKeuangan.php">Kembali</a></button> <br><br><br>
                        <h3>Edit Rencana Keuangan<h3>
                        <br><br>    
                        <form class="form-plan" action="" method="post">
                        <input class="input" type="hidden" name="id-rencana" id="id-rencana" required value="<?= $rencana["id_rencana"]; ?>">
                                    <label for="n-target">Nama rencana</label><br>
                                    <div class="field-input">
                                        <input class="input" type="text" name="n-target" id="n-target" placeholder="mis. Dana darurat" required value="<?= $rencana["n_rencana"]; ?>">
                                    </div>
                                    <label for="j-target">Nominal target</label><br>
                                    <div class="field-input">
                                        <input class="input" type="text" name="j-target" id="j-target" placeholder="mis. 11000000" required value="<?= $rencana["n_target"]; ?>">
                                    </div>
                                    <label for="n-skrg">Nominal sekarang</label><br>
                                    <div class="field-input">
                                        <input class="input" type="text" name="n-skrg" id="n-skrg" placeholder="mis. 2000000" required value="<?= $rencana["n_skrg"]; ?>">
                                    </div>
                                    <label for="t-target">Tenggat waktu</label><br>
                                    <div class="field-input">
                                        <input class="input" type="date" name="t-target"  id="t-target" placeholder="mis. 01-03-2021" required value="<?= $rencana["t_target"]; ?>">
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