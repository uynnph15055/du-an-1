<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Bài 5: Đăng nhập với facebook và google</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            .box-content{
                margin: 0 auto;
                width: 800px;
                border: 1px solid #ccc;
                text-align: center;
                padding: 20px;
            }
            #user_login form{
                width: 300px;
                margin: 40px auto;
            }
            #user_login form input{
                margin: 5px 0;
            }
        </style>
    </head>
    <body>
        <?php
        session_start();
        if (!empty($_SESSION['current_user'])) {
            $currentUser = $_SESSION['current_user'];
            ?>
            <div id="login-notify" class="box-content">
                Xin chào <?= $currentUser['fullname'] ?><br/>
                <a href="./edit.php">Đổi mật khẩu</a><br/>
                <a href="./logout.php">Đăng xuất</a>
            </div>
            <?php
        } else {
            include './facebook_source.php';
            include './google_source.php';
            ?>
            <div id="user_login" class="box-content">
                <h1>Đăng nhập tài khoản</h1>
                <form action="./login.php" method="Post" autocomplete="off">
                    <label>Username</label></br>
                    <input type="text" name="username" value="" /><br/>
                    <label>Password</label></br>
                    <input type="password" name="password" value="" /></br>
                    <br>
                    <input type="submit" value="Đăng nhập" /><br/>
                    <a href="./register.php">Click vào đây để đăng ký</a>
                </form>
                <h2>Hoặc đăng nhập với mạng xã hội</h2>
                <div id="login-with-social">
                    <a href="<?= $loginUrl ?>"><img src="./images/facebook.png" alt='facebook login' title="Facebook Login" height="50" width="280" /></a>
                    <?php if(isset($authUrl)){ ?>
                    <a href="<?= $authUrl ?>"><img src="./images/google.png" alt='google login' title="Google Login" height="50" width="280" /></a>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </body>
</html>