<?php 
require_once('../utils/utility.php');
require_once('../db/dbhelper.php');
$fullname = $password = $email = $birthday = $address = '';

if(!empty($_POST)){
    $fullname = getPOST('fullname');
    $password = getPOST('password');
    $email = getPOST('email');
    $birthday = getPOST('birthday');
    $address = getPOST('address');
    if($fullname != ''&& $password !='' && $email != ''){
        $password = getPwdSecurity($password);
        $sql = "insert into users (fullname, password, email, birthday,address) values ('$fullname','$password','$email','$birthday','$address')";
        execute($sql);
        header ('Location: login.php');
        die();
    }
}