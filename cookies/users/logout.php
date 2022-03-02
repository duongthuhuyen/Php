<?php

$token = '';

if (isset($_COOKIE['token'])) {
	require_once ('../db/dbhelper.php');
	require_once ('../utils/utility.php');

	$token = $_COOKIE['token'];
	$sql   = "update users set token = null where token = '$token'";
	execute($sql);
}
setcookie('token', '', time()-7*24*60*60, '/');
header('Location: login.php');
die();