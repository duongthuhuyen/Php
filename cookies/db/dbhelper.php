<?php
require_once('config.php');
// function which uses for delete/ insert/ update 
function execute($sql){
    // open connect to database
    $conn = mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);
    mysqli_set_charset($conn, 'utf8');
    // query - insert
    mysqli_query($conn,$sql);
    // close connect to database
    mysqli_close($conn);
}
// function which use for select 

function executeResult($sql){
    $conn = mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);
    mysqli_set_charset($conn,'utf8');
    $resultset = mysqli_query($conn,$sql);

    
    $data = [];
    if($resultset){
    while (($row = mysqli_fetch_array($resultset))!=NULL) {
       // echo'$row';
       //echo var_dump($row);
		$data[] = $row;
	}
}
    mysqli_close($conn);
    return $data;
}