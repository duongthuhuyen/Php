<?php
require_once('../Bai1/db/dbhelper.php');
 // $Registered_firstname = $_GET["fistname"];
  // $Registered_lastname = $_GET["lastname"];
  
  $firstname = $lastname = "";
  if(isset($_POST["firstname"])){
      $firstname = $_POST["firstname"];
  }
  if(isset($_POST["lastname"])){
      $lastname = $_POST["lastname"];
  }
  $sql = 'select * from admins where username = '.$firstname .'and password ='.md5($lastname);
    $data = executeResult($sql);
  if($data != null){
      header('Location: welcome.php');
      die();
  }else{
    echo '<h1>Login false!</h1>';
  }

?>
<!DOCTYPE html>
<html>
<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
<body>


<div>
  <form method = "POST" >
    <label for="fname">username</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name..">

    <label for="lname">password</label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name..">

  
    <input type="submit" value="Login">
  </form>
</div>


</body>
</html>


