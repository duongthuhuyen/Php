<?php
    require_once('../common/comm.php');
    require_once('../db/dbhelper.php');
    if(isset($_REQUEST['id']) and $_REQUEST['id']!=""){
        $id=$_GET['id'];
    
    $sql = "select * from fileupload where id =".$id;
    $data = executeResult($sql);
    if($data != null){
     //  pre($data[0]);
       $source = $data[0]['source'];
       $sql1 = "delete from fileupload where id = ".$id;
       execute($sql1);
      // echo var_dump($source);
       unlink($source);
       header('Location: uploadFile.php');
    }
    }

?>