<?php

$count = 0;
require_once('../db/dbhelper.php');
require_once('../utils/utility.php');
$user = validateToken();
if($user == null){
    header('Location: login.php');
    die();
}
$s = "select * from users";
$userl = executeResult($s);
$totalproduct = count($userl);
$currentpage =!empty($_GET['page'])?$_GET['page']:1;
//echo var_dump($currentpage);
$numpage = !empty($_GET['numberpage'])?$_GET['numberpage']:2;
//echo var_dump($numpage);
$totalpage =(int) ceil($totalproduct/$numpage);
//echo var_dump($totalpage); 
$limit = ($currentpage-1)*$numpage;

$sql = "select * from users limit $numpage offset $limit";
$userlist = executeResult($sql);
//echo var_dump(count($userlist));