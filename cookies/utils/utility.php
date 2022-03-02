<?php
require_once('../db/config.php');
require_once('../db/dbhelper.php');
function getPwdSecurity($pwd) {
	return sha1($pwd);
}
function validateToken(){
    if(isset($_SESSION['user'])){
      return $_SESSION['user'];
    }
    $token = '';
    if(isset($_COOKIE['token'])){
        $token = $_COOKIE['token'];
        $sql = "select * from users where token = '$token'";
        $data  = executeResult($sql);
        if($data != NULL && count($data)>0){
            $_SESSION['user']=$data[0];
            return $data[0];
        }
    }
    return NULL;
}
function getGET($key){
    $value = '';
    if(isset($_GET[$key])){
        $value = $_GET[$key];
    }
    $value = fixSqlInjection($value);
    return $value;
}

function getPOST($key){
    $value = '';
    if(isset($_POST[$key])){
        $value = $_POST[$key];
    }
    $value = fixSqlInjection($value);
    return $value;
}

function fixSqlInjection($str){
    $str = str_replace("\\","\\\\",$str);
    $str = str_replace("'","\'",$str);
    return $str;
}