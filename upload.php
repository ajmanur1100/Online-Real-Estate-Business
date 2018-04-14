<!DOCTYPE html>
<html>
<head>
	<title>Upload News</title>
	<style type="text/css">
	   #content{
		   	width: 50%;
		   	margin: 20px auto;
		   	border: 1px solid #cbcbcb;
		   	border-radius: 3px;
		   	margin-top: 50px;
		   	height: 310px;
	   }

	   form{
	   	width: 46%;
	    height: 300px;
	    margin: 20px auto;
	    padding: 30px 0px 50px 0px;
	    box-sizing: border-box;
	   }

	   form div{
	   	margin-top: 5px;
	   }
	   input[type="submit"]{
	   	height: 40px;
	   	width:150px;
	   	border-radius: 3px;
	   	background: #fff;
	   	border:1px solid #ddd;
	   	font:bold 16px calibri;
	   	cursor: pointer;
	   	outline: none;
	   	transition: all 0.33s ease-in-out;
	   	margin-top: 20px;
	   }
		input[type="submit"]:hover{
			background: #f1f1f1;

		}
		textarea{
			resize: none;
			border-radius: 3px;
			box-sizing: border-box;
			padding-left: 10px;
			height: 100px;
		}
		a{
			text-decoration: none;
			float: right;
			font:bold 14px calibri;
			
		}
		a:hover{
			text-decoration: underline;
		}
		input[type="file"]{
			margin-bottom: 20px;
		}
		h1{
			text-align: center;
			font-family: calibri;
		}
   </style>
</head>
<body>
	<h1>Posting Updated News</h1>
	<div id="content">
		<form method="post" action="newsletter.php" enctype="multipart/form-data">
		<input type="hidden" name="size" value="1000000">
		<div>
			<input type="file" name="image">
		</div>
		<div>
			<textarea name="text" cols="40" rows="4" placeholder="Say something about this image..."></textarea>
		</div>
		<div>
			<input type="submit" name="upload" value="Upload Image">
		</div>	
		<a href = "admin_inlay.php">BACK</a>
		</form>
	</div>
</body>
</html>