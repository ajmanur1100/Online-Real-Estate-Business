<?php
    $msg = "";
    //connect to the database
     $db = mysqli_connect("localhost","root","","db_image");

    //if upload button is pressed
    if(isset($_POST['upload'])){
        //the path to store the uploaded image
        $target = "images/".basename($_FILES['image']['name']);

        //Get all the submitted data from the form
        $image = basename($_FILES['image']['name']);
        $txt = $_POST['text'];

        $sql = "INSERT INTO img(image,txt) VALUES ('$image','$txt')";

        mysqli_query($db, $sql);//stores the submitted data into the database table: img

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
        }
    } 

    $sql ="SELECT * FROM `img`";
    $result = mysqli_query($db, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>News Letter</title>
    <style type="text/css">
       #img_div{
        width: 80%;
        padding: 5px;
        margin: 15px auto;
        border: 1px solid #cbcbcb;
       }
       #img_div:after{
        content: "";
        display: block;
        clear: both;
       }
       img{
        float: left;
        margin: 5px;
        width: 300px;
        height: 140px;
       }
       p{
        margin: 15px 0 10px;
       }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fa-cdn.css">
    <link rel="stylesheet" href="css/admin-panel.css">
    <link rel="stylesheet" href="css/newsletter.css">

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

    <div style="height:550px">
        <div>
            <?php 
                while ($row = mysqli_fetch_array($result)) {
                    echo "<div id='img_div'>";
                    echo "<img src='images/".$row['image']."' >";
                    echo "<p>".$row['txt']."</p>";
                    echo "</div>";
                }
            ?>
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