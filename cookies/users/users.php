<?php
session_start();
$count = 0;
require_once('../db/dbhelper.php');
require_once('../utils/utility.php');
$sql = "select * from users limit 0,3";
$data = executeResult($sql);
$c = count($data);
$user = validateToken();
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
	<?php
	include('../users/api-user.php');
	?>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Users Page(<a href="logout.php">logout</a>)</h2>
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Full Name</th>
							<th>Email</th>
							<th>Birthday</th>
							<th>Address</th>
							<th style="width: 50px;"></th>
							<th style="width: 50px;"></th>
						</tr>
					</thead>
					<tbody id="result">
					<?php
						
					if($c>0){
						//echo "<h1>var_dump($data)</h1>";
						foreach($userlist as $d){
							
							echo '<tr>
							<th>'.(++$limit).'</th>
							<th>'.$d["fullname"].'</th>
							<th>'.$d["email"].'</th>
							<th>'.$d["birthday"].'</th>
							<th>'.$d["address"].'</th>
							<th><button class="btn btn-warning">Edit</button></th>
							<th><button class="btn btn-danger">Delete</button></th>
							</tr>';
						}
					}
					?>
					</tbody>
				</table>
				<?php
					include ('../users/paging.php');
					//include ('../users/api-user.php');
					
				?>
			</div>
		</div>
	</div>
</body>
</html>