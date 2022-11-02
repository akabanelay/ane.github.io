<?php
require 'form.php';

if(isset($_POST['register'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];

    if($pass === $cpass) {
        $pass = $pass;
        $result = mysqli_query($form, "SELECT username FROM tb_user WHERE username = '$username'");

        if(mysqli_fetch_assoc($result)) {
            echo"
            <script>
                alert('Username Telah Digunakan');
                document.location.href = 'index.php';
            </script>";
        } else {
            $sql = "INSERT INTO tb_user VALUES ('', '$nama', '$email', '$username', '$pass', 'user')";
            $result = mysqli_query($form, $sql);

            if(mysqli_affected_rows($form) > 0) {
                echo"
                <script>
                    alert('Registrasi Berhasil');
                    document.location.href = 'logins.php';
                </script>";
            } else {
                echo"
                <script>
                    alert('Registrasi Gagal');
                    document.location.href = 'index.php';
                </script>";
            }
        }


    } else {
        echo"
        <script>
            alert('Password Tidak Sama !');
            document.location.href = 'index.php';
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@500&display=swap" rel="stylesheet">
    <title>Login</title>
    <style>

:root {
    --font-style: 'Rubik', sans-serif;
    --warna-utama: #FFF5FD;
    --warna-nav: #005A8D;
    --warna-text: #FF96AD;
}

* {
    box-sizing: border-box;
}

body {
    background: white;
    --font-family: var(--font-style);
}

.login-box {
    position: absolute;
    top: 50%;
    left:50%;
    width: 700px;
    padding: 40px;
    transform: translate(-50%, -50%);
    background: var(--warna-text);
    box-shadow: 0 15px 25px rgba(143, 124, 236,0.7);
    border-radius: 10px;
    height: 600px;
}

.login-box h2 {
    margin: 0 0 30px;
    padding: 0;
    font-size: 30px;
    color: #fff;
    text-align: center;
}

.login-box .user-box input {
    position: relative;
    width: 100%;
    padding: 10px 0;
    font-size: 16px;
    color: var(--warna-utama);
    margin-bottom: 30px;
    border: none;
    border-bottom: 1px solid var(--warna-nav);
    outline: none;
    background: transparent;
}

.login-box .user-box label {
    position: relative;
    left: 0;
    top: -60px;
    padding: 10px 0;
    font-size: 16px;
    color: var(--warna-utama);
    pointer-events: none;
    transition: .5s;
}

.login-box .user-box input:focus~label,
.login-box .user-box input:valid~label {
    top: -85px;
    left: 0;
    color: #8F7CEC;
    font-size: 12px;
}

#submit {
    padding: 5px 20px;
    color: #CBBDDB;
    font-size: 16px;
    text-decoration: none;
    text-transform: uppercase;
    overflow: hidden;
    transition: .5s;
    letter-spacing: 4px;
    border: 1px solid #8F7CEC;
    margin: auto;
}

#submit:hover {
    background: var(--warna-nav);
    color: var(--warna-nav);
    border-radius: 5px;
    box-shadow:  0 0 50px var(--warna-nav), 0 0 25px var(--warna-nav), 0 0 50px var(--warna-nav), 0 0 100px var(--warna-nav);
}

.button-form {
    display: relative;
    text-align:center;
    flex-direction: row;
    text-decoration: none;
    margin-top: -15px;
}

.button-form button {
    border: 1px solid #8F7CEC;
    border-radius: 5px;
    width: 20%;
    box-shadow:  0 0 5px var(--warna-utama), 0 0 5px var(--warna-utama), 0 0 5px var(--warna-utama), 0 0 5px var(--warna-utama);
}

.button-for{
    color: var(--warna-nav);
    display: relative;
    text-align:center;
    flex-direction: row;
    margin-top: 10px;
}

.button-for a{
    color: var(--warna-nav);
    text-decoration: none;
}

#register {
    font-size: 14px;
    text-decoration: none;
    color: var(--warna-utama);
    background: var(--warna-nav);
    margin: auto;
    width: 60%;
    text-align: center;
}

#register button {
    margin: auto;
    color: #8F7CEC;
    text-decoration: none;
}

#register a {
    margin: auto;
    color: #8F7CEC;
    text-decoration: none;
}

    </style>
</head>
<body>
    <div class="login-box">
        <h2>Register</h2>
        <form action="" method="POST">
            <div class="user-box">
                <input type="text" name="nama" id="nama" required>
                <label for="nama"> Name </label>
            </div>
            <div class="user-box">
                <input type="email" name="email" id="email" required>
                <label for="email"> E-mail </label>
            </div>
            <div class="user-box">
                <input type="text" name="username" id="username" required>
                <label for="username"> Username </label>
            </div>
            <div class="user-box">
                <input type="password" name="pass" id="pass" required>
                <label for="pass"> Password </label>
            </div>
            <div class="user-box">
                <input type="password" name="cpass" id="cpass" required>
                <label for="cpass"> Password Confirm </label>
            </div>
            <div class="button-form">
                <button type="submit" name="register" id="register"> Register </button>

                <div class="button-for" id="login" style ='color:#FFF5FD;'>
                    Already Have an Account ?
                    <a href="logins.php"> Login </a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>