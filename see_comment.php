<!DOCTYPE html>
<html>
<head>
	<title>Message Send</title>
	<link rel="stylesheet" href="css/email.css">
	<link rel="stylesheet" href="css/s_c.css">
</head>
<body>
	<form action="" method="POST">
		<div class="email s-e">
			<h1>Comments</h1>
			<table>
				<tr>
					<td>
						Name:
					</td>
					<td>
						<input type="text" name="name" required="">
					</td>
				</tr>
				<tr>
					<td>
						Comments: 
					</td>
					<td>
						<textarea cols="45" rows="5" name="mes" required=""></textarea>
					</td>
				</tr>
			</table>
			<div class="controls c-over">
				<input type="submit" name="post" value="Post">
				<a href = "admin_inlay.php" class="back">BACK</a>
			</div>
		</div>
	</form>
</body>
</html>

<?php 
		$post='';
		if(isset($_POST['name']) && isset($_POST['mes']) && isset($_POST['post'])){
	    $name=$_POST ["name"];
        $text=$_POST["mes"];
 	  	$post=$_POST["post"];
	 	}

	if($post){
		
	$write = fopen("com.txt", "a+");
	fwrite($write,"<u><b>$name<b></u><br>$text</br>");
	fclose($write);

	$read = fopen("com.txt", "r+t");
		echo "All Comments:<br>";

	while(!feof($read)){
		echo fread($read, 1024);
	}
	fclose($read);
	}
	else{
	$read = fopen("com.txt", "r+t");
		echo "All Comments:<br>";

	while(!feof($read)){
		echo fread($read, 1024);
	}
	fclose($read);
	}
?>