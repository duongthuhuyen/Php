<?php
require_once('../common/comm.php');
require_once('../db/dbhelper.php');

if(!empty($_POST)){
    upload('upload/','image');
}
//upload('upload/','image');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Users Page</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <form method='post' action="" enctype="multipart/form-data">

			<input type ="file" id = "image" name ="image">
			
			<input type="submit" class="button" value ="Uploads" name ="submit">
	</form>
	
</body>
</html>