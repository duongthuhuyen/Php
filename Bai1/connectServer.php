<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webproduct";
$conn = new mysqli($servername, $username, $password,$dbname);
if($conn -> connect_error){
    die("Connection false: ". $conn->connect_error);
}
function getData($sql){
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
  // output data of each row
        return true;
    }
    return false;
}
$conn->close();
?>