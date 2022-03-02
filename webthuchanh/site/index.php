<?php
require_once('../db/dbhelper.php');
$sql = "SELECT DISTINCT * FROM `sinhvien`,dangky,monhoc WHERE dangky.mssv = sinhvien.mssv and dangky.mamh= monhoc.mamh;";
$data = executeResult($sql);
//echo var_dump($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
<table class="table">
  <thead>
    <tr>
      <th scope="col">MSSV</th>
      <th scope="col">Họ Tên</th>
      <th scope="col">Kỳ</th>
      <th scope="col">Đăng Ký</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach($data as $d):?>
    <tr>
      <th scope="row"><?php echo $d['mssv'];?></th>
      <td><?php echo $d['hoten'];?></td>
      <td><?php echo $d['ky'];?></td>
      <td><?php echo $d['tenmh'];?></td>
    </tr>
    <?php endforeach;?>
  
  </tbody>
</table>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>