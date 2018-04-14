<?php 

include ('dbconn.php');
include ('functions.php');


// if(logged_in()){
    
//    header("location: other.php");
//    exit();
// }

$response = " ";
if (isset($_POST['submit'])) {
    
    $firstName = $_POST['fname'];
    $lastName = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConfirm = $_POST['passwordConfirm'];

    $image = $_FILES['image']['name'];
    $tmp_image = $_FILES['image']['tmp_name'];
    $imageSize = $_FILES['image']['size'];


    $conditions = isset($_POST['conditions']);

    $date = date("F, d y");


    if(strlen($firstName)<3){
        $response = "First Name is too short.";
    }
    elseif (strlen($lastName)<3) {
        $response = "Last Name is too short.";
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response = "Please enter valid email.";
    }

    elseif (email_exists($email, $con)){

        $response = "Someone is already registered with this email.";
    }
    elseif (strlen($password)<8) {
        $response = "Password must be greater than 8 characters.";
    }
    elseif ($password !== $passwordConfirm) {
        
        $response = "Password does no match.";
    }
    elseif ($image == "") {
        
        $response = "Please upload your image"; 
    }
    elseif ($imageSize > 1048576) {
        $response = "Image size must be less than 1 MB";
    }
    elseif (!$conditions) {
        $response = "You must be agree with the terms & conditions.";
    }
    else{
        
        $password = md5($password); 

        $imageExt = explode(".", $image);
        $imageExtension = $imageExt[1];

    if ($imageExtension == "PNG" || $imageExtension == "png" || $imageExtension == "JPG" || $imageExtension == "jpg"){
            
        $image = rand(0,100000).rand(0,100000).rand(0,100000).time().".".$imageExtension;

        $insertQuery = "INSERT INTO users(firstName,lastName,email,password,image,date) VALUES ('$firstName','$lastName','$email','$password','$image','$date')";

        if(mysqli_query($con,$insertQuery))
        {
            if(move_uploaded_file($tmp_image, "images/$image")){
                $success_response = "You are successfully registered.";
            }else{
                $response = "Image is not uploaded.";
            }
        }

        }else{
            $response = "File must be an image";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
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
            <!-- <a href="adminPanel.php">Admin Panel</a> -->
            <a href="apartments.php">Apartments</a>
            <a href="newsletter.php">News Letter</a>
            <a href="login.php">Login</a>
            <a href="contact.php">Contact</a>
        </div>
    </div>

    <div id="response" style=" <?php if ($response !=" ") { ?> display: block; <?php } ?> ">
        <?php echo $response; ?>
    </div>
    <div id="response" style=" <?php if ($success_response !=" ") { ?> display: block;background-color: #1eb11ef2; <?php } ?> ">
        <?php echo $success_response; ?>
    </div>

    <div id="wrapper">
        <div id="menu">
            <a href="registration.php">Registration</a>
            <!-- <a href="login.php">Login</a> -->
        </div>

        <div id="formDiv">
            <form method="POST" action="registration.php" enctype="multipart/form-data">
                <label>First Name:</label>
                <br/>
                <input type="text" class="inputFields" name="fname" required="" />
                <br/>

                <label>Last Name:</label>
                <br/>
                <input type="text" class="inputFields" name="lname" required=""/>
                <br/>

                <label>Email:</label>
                <br/>
                <input type="text" class="inputFields" name="email" required=""/>
                <br/>

                <label>Password:</label>
                <br/>
                <input type="password" class="inputFields" name="password" required=""/>
                <br/>

                <label>Re-enter Password:</label>
                <br/>
                <input type="password" class="inputFields" name="passwordConfirm" required=""/>
                <br/>

                <label>Image:</label>
                <br/>
                <input type="file" id="imageUpload" name="image" />
                <br/>
                <input type="checkbox" name="conditions" id="cbAgree" />
                <label for="cbAgree">I am agree with terms and conditions</label>
                <br/>
                <input type="submit" class="theButtons" name="submit" />
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