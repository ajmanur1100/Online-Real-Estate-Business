<?php include "inc/header.php"; ?>

<div style="padding: 0 12%;">
<header class="headeroption">
<h2>Informations of Property</h2>
</header>
<div class="content">
<section class="subject">
<p>Property Details<p>
</section>

 <table class="tblone">
    <tr>
        <th>No</th>
        <th>Address</th>
        <th>Name Of Property</th>
        <th>Floor Space</th>
        <th>Utility</th>
        <th>Description</th>
        <th>Monthly Charge</th>
        
    </tr>

    <?php 

        $i = 0;
    foreach ($user as $key => $value){ 
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

    </tr>
    <?php } ?>
  </table>
<?php include "inc/client_footer.php"; ?>
