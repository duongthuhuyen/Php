<?php
require_once('../common/comm.php');
require_once('../db/dbhelper.php');
$sql = "select * from fileupload";
$data = executeResult($sql);
//pre($data);
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

	
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>tên</th>
							<th>định dạng</th>
							<th>source</th>
							<th>Thời gian</th>
							<th style="width: 50px;"></th>
							<th style="width: 50px;"><a href="filter.php">Filter</a></th>
						</tr>
					</thead>
					<tbody id="result">
					<?php
					$c = 1;
					foreach ($data as $key):?>
					<tr>
							<th><?php echo $c++;?></th>
							<th><?php echo $key['name'];?></th>
							<th><?php echo $key['type'];?></th>
							<th><?php echo $key['source'];?></th>
							<th><?php echo $key['date'];?></th>
							<th style="width: 50px;">
                            <a href="delete.php?id=<?php echo $key['id'];?>">Xóa</a>
                        </th>
							<th style="width: 50px;"></th>
						</tr>
					<?php endforeach;?>
					</tbody>
				</table>
                <a href="upload.php">Upload</a>	
				
</body>
</html>