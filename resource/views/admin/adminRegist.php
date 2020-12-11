<?php

require '../../../aplikasi/regadminController.php';

if( isset($_POST["register"]) ){
    if( register($_POST) > 0){
        echo "<script>
            alert('Admin baru telah ditambahkan');
            document.location.href = 'adminLogin.php'
        </script>
        ";
    } else{
        echo mysqli_error($koneksi);
    }
}

?>


<!DOCTYPE html>
<html>

    <head>
        <title>Registrasi</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type= "text/css" href="../../../css/regisloginStyle.css">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    </head>
    <body>
        <div class="container">
                <div class= "img">
                    <img src="../../../image/undraw_finance_0bdk.svg">
                </div>
                <div class="login-container">
                    <form action="" method="post">
                        <h2>Registrasi</h2>
                        <div class="input-div one">
                            <div class="i">
                                <i class="fas fa-user"></i>
                            </div>
                            <div>
                                <h5>E-mail</h5>
                                <input class="input" name="email" type="text" required>
                            </div>
                        </div>
                        <div class="input-div two">
                            <div class="i">
                                <i class="fas fa-user"></i>
                            </div>
                            <div>
                                <h5>Username</h5>
                                <input class="input" name="username" type="text" required>
                            </div>
                        </div>
                        <div class="input-div three">
                            <div class="i">
                                <i class="fas fa-lock"></i>
                            </div>
                            <div>
                                <h5>Password</h5>
                                <input class="input" name="password" type="password" required>
                            </div>
                        </div>
                        <div class="input-div four">
                            <div class="i">
                                <i class="fas fa-lock"></i>
                            </div>
                            <div>
                                <h5>Konfirmasi Password</h5>
                                <input class="input" name="kpassword" type="password" required>
                            </div>
                        </div>
                        <a href="adminLogin.php">Sudah memiliki akun?</a>
                        <button type="submit" name = "register" class="btn">Register</button>
                    </form>
                </div>
        </div>
        <script type="text/javascript" src="../../../js/regisloginScript.js"></script>
    </body>
</html>