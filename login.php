<?php

include ('dbconn.php');
include ('functions.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password)) {

        if(email_exists($email,$con))
        {
        
            $result = mysqli_query($con,"SELECT password FROM users WHERE email = '$email'");

            $retrievepass = mysqli_fetch_assoc($result);

            if(md5($password) !== $retrievepass['password']){

                $_SESSION['error'] = "Email or Password is incorrect.";
            }
            else
            {
                $rs = mysqli_query($con,"SELECT roles FROM users WHERE email = '$email'");
                $role = mysqli_fetch_assoc($rs);

                if ($role['roles'] == 0) {
                    $_SESSION['email'] = $email;

                    setcookie("email",$email, time()+3600);
                    
                    header("location: smain.php");
                }

                if ($role['roles'] == 1) {
                    $_SESSION['ad_name'] = $email;
                    
                    header("location: admin_inlay.php");
                    exit();
                }

            }

        }
        else{
            $_SESSION['error'] = "Email or Password is incorrect.";
        }

    }

    else{
        $_SESSION['error'] = "Email or Password is empty.";
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fa-cdn.css">
    <link rel="stylesheet" href="css/admin-panel.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/fa-cdn.js"></script>
</head>

<body>
    <div class="menu-bar right">
        <div class="wrapper">
            <a href="index.php" class="left">
                <i class="fas fa-home"></i>&nbsp; OREB</a>

            <a href="index.php">Home</a>
            <!-- <a href="adminPanel.php">Admin Panel</a> -->
            <a href="apartments.php">Apartments</a>
            <a href="newsletter.php">News Letter</a>
            <a href="login.php">Login</a>
            <a href="contact.php">Contact</a>
        </div>
    </div>

    <div class="login-wrapper">
        <div class="login-main-con">

            <img src="images/user-icon.png" alt="User Icon">
            <br/>
            <form action="" method="POST">
            <?php if (isset($_SESSION['error'])) {
                echo $_SESSION['error'];

                unset($_SESSION['error']);
            } ?>
            <input type="text" name="email" id="txtUsername" placeholder="Enter your mail" required="">
            <br/>
            <input type="password" name="password" id="txtPassword" placeholder="Enter password" required="">
            <br/>
            <!-- <input type="submit" name="take" value="Login" class="btn-submit"> -->
            <button name="take" class="btn-submit">Login</button>
            <br>
            <p style="margin: 10px 0;">Need an account? Click<a href="registration.php"> here </a>for<a href="registration.php"> Registration</a></p>
            </form>
            
            <?php
            // if(isset($_POST['take'])){

            // $uname = $_POST['uname'];
            // $upass = $_POST['upass'];

            // $person = new User("ajmanur","123456");
            // $person->checkUserInfo($uname,$upass);
            // }
            ?>

    </div>
    </div>
    <div class="footer" style="margin-top: 40px;">
        <div class="wrapper">
            <div class="socaial-links">
                <a href="https://www.facebook.com/">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://bd.linkedin.com/">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a href="https://twitter.com/">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="https://plus.google.com/discover">
                    <i class="fab fa-google-plus"></i>
                </a>
            </div>
        </div>
    </div>
</body>