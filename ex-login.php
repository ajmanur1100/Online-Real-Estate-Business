<?php

include ('dbconn.php');
include ('functions.php');

if(logged_in()){
   header("location: smain.php");
   exit();
}

$response = " ";

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $checkBox = isset($_POST['keep']);

    if(email_exists($email,$con))
    {
    
        $result = mysqli_query($con,"SELECT password FROM users WHERE email = '$email'");

        $retrievepass = mysqli_fetch_assoc($result);

        if(md5($password) !== $retrievepass['password']){

        $response = "Password is incorrect";
    }
    else
    {
    $_SESSION['email'] = $email;

    if($checkbox == "on"){

        setcookie("email",$email, time()+3600);
    }
    header("location: smain.php");
    }
}
else{
        $response = "Password is correct";
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
    <link rel="stylesheet" href="css/apartments.css">
    <link rel="stylesheet" href="css/registration.css">

    <script src="js/fa-cdn.js"></script>
</head>

<body>
    <div class="menu-bar right">
        <div class="wrapper">
            <a href="index.php" class="left">
                <i class="fas fa-home"></i>&nbsp; OREB</a>

            <a href="index.php">Home</a>
            <a href="adminPanel.php">Admin Panel</a>
            <a href="apartments.php">Apartments</a>
            <a href="newsletter.php">News Letter</a>
            <a href="registration.php">Client Login</a>
            <a href="contact.php">Contact</a>
        </div>
    </div>

    <div id="response" style=" <?php if ($response !=" ") { ?> display: block; <?php } ?> ">
        <?php echo $response; ?>
    </div>
    
    <div id="wrapper" style="margin-bottom: 170px">
        <div id="menu">
            <a href="registration.php">Registration</a>
            <a href="login.php">Login</a>
        </div>

        <div id="formDiv">
            <form method="POST" action="login.php">

                <label>Email:</label>
                <br/>
                <input type="email" class="inputFields" name="email" required=""/>
                <br/>

                <label>Password:</label>
                <br/>
                <input type="password" class="inputFields" name="password" required=""/>
                <br/>
                <br/>
                <input type="checkbox" name="keep" id="cbKeep" />
                <label for="cbKeep">keep me logged in</label>
                <br/>
                <br/>
                <input type="submit" class="theButtons" name="submit" value="Login" />
            </form>
        </div>
    </div>

    <div class="footer">
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