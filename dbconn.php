<?php

$con = mysqli_connect("localhost","root","","log_reg");

if(mysqli_connect_errno()){
	echo "Error".mysqli_connect_errno();
 
}
session_start();
?>
