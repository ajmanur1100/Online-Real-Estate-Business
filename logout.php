<?php 	
	session_start();
	session_destroy();
	setcookie("email",'',time()-3600);

	if (!isset($SESSION['email'])) {
		//$uri .= "/Project";
		header("location: index.php");
	}
?>
 