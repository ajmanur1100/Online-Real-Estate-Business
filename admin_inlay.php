<?php
session_start();

include "admin_in.php";


if (!isset($_SESSION['ad_name'])) {
        $uri .= "/NewProject";
        header("location:".$uri."/adminPanel.php");
    }
?>

<?php 
spl_autoload_register(function($class){
    include "classes/".$class.".php";
});
?>


<!DOCTYPE HTML>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Informations of Property</title>

  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Ubuntu" rel="stylesheet">
  <link rel="stylesheet" href="css/fa-cdn.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="js/fa-cdn.js"></script>
<style>
body{
    font-family: arial;font-size: 15px;line-height: 18px;margin: 0 auto;
    background-image: url(img/river1.jpg);
}
.lnk:hover{
    background: white !important;
    color: black !important;
}
a{color:#3399FF;}
.headeroption {background: #f2f2ff no-repeat scroll 56px 18px;height: 80px;overflow: hidden;padding-left: 160px;}
.headeroption h2 {color: #000;font-size: 30px;padding-top: 5px;text-shadow: 0 1px 1px #fff;}
.content{background: #f2f2ff;/*border: 4px solid #3399ff;*/font-size: 16px;line-height: 22px;margin-bottom: 3px;margin-top: 3px;min-height: 400px;overflow: hidden;padding: 10px;}
.subject {border-bottom: 1px solid #3399ff;font-size: 20px;margin-bottom: 10px;padding-bottom: 10px;}
.subject p{margin:0;}

.insert{color:#06960E;font-weight:bold;}
.delete{color:#DE5A24;font-weight:bold;}

.mainleft{border-right: 1px dotted #999;float: left;margin-right: 16px;width: 350px;}
.mainright{float:right;width:633px;}

.tblone{width:100%;border:1px solid #fff;}
.tblone td{padding:5px 10px;text-align:center;}

table.tblone tr:nth-child(2n+1){background:#fff;height:30px;}
table.tblone tr:nth-child(2n){background:#fdf0f1 none repeat scroll 0 0;height:30px;}
input[type="text"] {border:1px solid #ddd;margin-bottom:5px;padding:5px;width:228px;font-size:16px}
input[type="submit"]{cursor: pointer}

.footeroption{height:90px;background:#f2f2ff;overflow:hidden;padding-top:10px;overflow: hidden;}
.footerone {background: #3aa0ff;border-radius: 5px;float: left;font-size: 18px;line-height: 23px;margin-left: 10px;padding: 6px 10px;text-align: center;text-shadow: 1px 0 2px #fff;width: 390px;overflow: hidden;}
.footerone p{margin:0;}
</style>
</head>
<body>
    <div class="menu-bar">
        <a href="index.php">Home</a>
        <!-- <a href="adminPanel.php">Admin Panel</a> -->
        <a href="apartments.php">Apartments</a>
        <a href="newsletter.php">News Letter</a>
        <a href="login.php">Login</a>
        <a href="contact.php">Contact</a>
    </div>

<div style="padding: 0 12%;">

    <header class="headeroption">
        <h2>Informations of Property</h2>
    </header>
    <div class="content">
    <section class="subject">
        <p>Property Details<p>
    </section>
<div style="display: inline-flex;">
<section class="mainleft">
<?php 
    $user = new Employee();

    if (isset($_POST['create'])) {
        
        $address    = $_POST['address'];
        $property   = $_POST['property'];
        $floor_space    = $_POST['floor_space'];
        $utility = $_POST['utility'];
        $description = $_POST['description'];
        $cost = $_POST['cost'];

        $user->setaddress($address);
        $user->setproperty($property);
        $user->setfloor_space($floor_space);
        $user->setutility($utility);
        $user->setdescription($description);
        $user->setcost($cost);

        if ($user->insert()) {            
            echo "<span class = 'insert'>Inserted Successfully...</span>";
        }
    }

    if (isset($_POST['edit'])) {
        
        $id   = $_POST['id'];
        $address    = $_POST['address'];
        $property   = $_POST['property'];
        $floor_space    = $_POST['floor_space'];
        $utility = $_POST['utility'];
        $description = $_POST['description'];
        $cost = $_POST['cost'];


        $user->setaddress($address);
        $user->setproperty($property);
        $user->setfloor_space($floor_space);
        $user->setutility($utility);
        $user->setdescription($description);
        $user->setcost($cost);

        if ($user->edit($id)) {
            
            echo "<span class = 'insert'>Updated Successfully...</span>";
        }
    }
 ?>

<!-- <?php   
    if(isset($_GET['action']) && $_GET['action']=='delete') {
       $id = (int)$_GET['id'];
       if ($user->delete($id)) { 
           echo "<span class = 'delete'>Deleted Successfully...</span>";
       }      
    }   
?>
 -->
<?php   
    if(isset($_GET['action']) && $_GET['action']=='edit') {
       $id = (int)$_GET['id'];
       $result = $user->readById($id);
?>
       <form action="" method="post">
 <table>

        <input type="hidden" name="id" value="<?php echo $result['id']; ?>"/>
    <tr>
        <td>Address:</td>
        <td><input type="text" name="address" value="<?php echo $result['address']; ?>" required="1"/></td>    
    </tr>
    <tr>
        <td>Name Of Property:</td>
        <td><input type="text" name="property" value="<?php echo $result['property']; ?>" required="1"/></td>    
    </tr>
    <tr>
       <td>Floor Space:</td>
        <td><input type="text" name="floor_space" value="<?php echo $result['floor_space']; ?>" required="1"/></td>
    </tr>
    <tr>
       <td>Utility:</td>
        <td><input type="text" name="utility" value="<?php echo $result['utility']; ?>" required="1"/></td>
    </tr>
    <tr>
       <td>Description:</td>
        <td><input type="text" name="description" value="<?php echo $result['description']; ?>" required="1"/></td>
    </tr>
    <tr>
       <td>Monthly Charge:</td>
        <td><input type="text" name="cost" value="<?php echo $result['cost']; ?>" required="1"/></td>
    </tr>

    <tr>
      <td></td>
        <td>
        <input type="submit" name="edit" value="Submit"/>
        </td>
    </tr>
  </table>
</form>
<?php } else { ?>

<form action="" method="post">
 <table>
    <tr>
        <td>Address:</td>
        <td><input type="text" name="address" required="1"/></td>    
    </tr>
    <tr>
        <td>Name Of Property:</td>
        <td><input type="text" name="property" required="1"/></td>    
    </tr>
    <tr>
       <td>Floor Space:</td>
        <td><input type="text" name="floor_space" required="1"/></td>
    </tr>
    <tr>
       <td>Utility Demands:</td>
        <td><input type="text" name="utility" required="1"/></td>
    </tr>
    <tr>
       <td>Description:</td>
        <td><input type="text" name="description" required="1"/></td>
    </tr>
    <tr>
       <td>Monthly Charge:</td>
        <td><input type="text" name="cost" required="1"/></td>
    </tr>
    <tr>
      <td></td>
        <td>
        <input type="submit" name="create" value="Submit"/>
        </td>
    </tr>
  </table>
</form>
<?php } ?>
</section>

<section class="mainright">
  <table class="tblone">
    <tr>
        <th>No</th>
        <th>Address</th>
        <th>Name Of Property</th>
        <th>Floor Space</th>
        <th>Utility Demands</th>
        <th>Description</th>
        <th>Monthly Charge</th>
        <th>Action</th>
    </tr>

    <?php 

    $i = 0;
    foreach ($user->readAll() as $key => $value)
    { 
        $i++;   
    ?>    
    
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $value['address']; ?></td>
        <td><?php echo $value['property']; ?></td>
        <td><?php echo $value['floor_space']; ?></td>
        <td><?php echo $value['utility']; ?></td>
        <td><?php echo $value['description']; ?></td>
        <td><?php echo $value['cost']; ?></td>
        <td>
           <?php echo "<a href = 'admin_inlay.php?action=edit&id=".$value['id']."'>Edit</a>"; ?>
        </td>
    </tr>
    <?php } ?>
  </table>
</section>
</div>

</div>

<footer class="footeroption" style="width: 100%;">

  <a class="lnk" href = "logout.php" style="float: right; padding: 10px; margin-right: 40px; background-color:#eee; color: #333; text-decoration: none; border-radius: 4px;">Logout</a>
  <a class="lnk" href = "see_comment.php" style="float: right; padding: 10px; margin-right: 40px; background-color:#eee; color: #333; text-decoration: none; border-radius: 4px;">See Comment</a>
  <a class="lnk" href = "email.php" style="float: right; padding: 10px; margin-right: 40px; background-color:#eee; color: #333; text-decoration: none; border-radius: 4px;">Send Email</a>
  <a class="lnk" href = "upload.php" style="float: right; padding: 10px; margin-right: 40px; background-color:#eee; color: #333; text-decoration: none; border-radius: 4px;">News Upload</a>

</footer>

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
</html>