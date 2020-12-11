<?php
session_start();

if(isset($_SESSION["login"])){
    header("Location: beranda.php");
    exit;
}

require '../../aplikasi/reguserController.php';

if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE username ='$username'");
    //cek username
    if( mysqli_num_rows($result) === 1){
        //cek password
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"])){
            //session
            $_SESSION["login"] = true;
            header("Location: beranda.php");
            exit;
        }

    }

    $error = true;

}


    

?>

<!DOCTYPE html>
<html>

    <head>
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type= "text/css" href="../../css/regisloginStyle.css">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    </head>
    <body>
        <div class="container">
                <div class= "img">
                    <img src="../../image/undraw_finance_0bdk.svg">
                </div>
                <div class="login-container">
                    <form action="" method="post">
                        <h2>Selamat Datang</h2>

                        <?php if( isset($error) ) : ?>
                            <p style="color: red; font-style: italic;">Username atau password yang anda masukkan salah!</p>
                        <?php endif; ?> 
                        <div class="input-div one">
                            <div class="i">
                                <i class="fas fa-user"></i>
                            </div>
                            <div>
                                <h5>Username</h5>
                                <input class="input" name="username" type="text">
                            </div>
                        </div>
                        <div class="input-div two">
                            <div class="i">
                                <i class="fas fa-lock"></i>
                            </div>
                            <div>
                                <h5>Password</h5>
                                <input class="input" name="password" type="password">
                            </div>
                        </div>
                        <a href="userRegister.php">Belum memiliki akun</a>
                        <button type="submit" class="btn" name="login">Login</button>
                    </form>
                </div>
        </div>
        <script type="text/javascript" src="../../js/regisloginScript.js"></script>
    </body>
</html>