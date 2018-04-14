<?php 
	if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['message'])){
	if(!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['email']) && !empty($_POST['message'])){

		$fname = $_POST['fname'];
		$lname  = $_POST['lname'];
		$email = $_POST['email'];
		$message=$_POST['message'];

		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			echo "Kindly Provide Valid Email";
		}else{
			
			$subject="Website Response";

			$sender = "\nMd.Ajmanur Jaman\nStudent of Daffodil International Univarsity.\nDepartment of Software Engineering.";

			$body = "$fname $lname\n$message\n$sender";

			mail("$email",$subject,$body,"From: ajmanur35-1100@diu.edu.bd");
				echo "E-mail send.";
		}

	}else{
		echo "All Fields are required.";
	}

} else{
	echo "NOT OK";
}
?>

<!DOCTYPE html>
<html>
<head>

	<meta http-equiv="content_type" content="text/html" />
	<meta name="author" content="Ajmanur Jaman" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
	<link rel="stylesheet" type="text/css" href="css/email.css">
	<title>send email</title>
</head>
<body>

	<div class="email">
		<form action="" method="POST">
			<h2>Your Details</h2>
			<table>
				<tr>
					<td>
						First Name:
					</td>
					<td>
						<input type="text" name="fname" required=""><br />
					</td>
				</tr>
				<tr>
					<td>
						Last Name:
					</td>
					<td>
						<input type="text" name="lname" required=""><br />
					</td>
				</tr>
				<tr>
					<td>
						Email ID:
					</td>
					<td>
						<input type="text" name="email" required=""><br />
					</td>
				</tr>
				<tr>
					<td>
						Your Message:
					</td>
					<td>
						<textarea name="message" required="" rows="7" cols="30"></textarea>
					</td>
				</tr>
			</table>

			<div class="controls">
				<button>Send</button>
				<a href ="admin_inlay.php" class="back">BACK</a>
			</div>
		</form>
	</div>
</body>
</html>