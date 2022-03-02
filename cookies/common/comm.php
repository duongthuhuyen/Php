<?php
$data = array();
function upload($upload_path,$filename){
    require_once('../db/dbhelper.php');
    if($_FILES[$filename]['name']!=''){
        $sql1 = "select * from fileupload";
        $data = executeResult($sql1);
        //echo $data;
       // pre($_FILES[$filename]);
        $count =count($data)+1;
        $name = 'image_'.$count.'.jpg';
        $fileupload =$upload_path.$name;
        //echo $_FILES[$filename]['tmp_name'];
        echo var_dump($fileupload);
       
        //echo var_dump($_FILES[$filename]['tmp_name']);
        if(move_uploaded_file($_FILES[$filename]['tmp_name'],$fileupload))
        {
            $date = date("Y-m-d h:i:sa");
            $sql = "insert into fileupload (name,type,source,date) values('".$name."','".$_FILES[$filename]['type']."','".$fileupload."','".$date."')";
            execute($sql);
            echo var_dump($sql);
            echo "Upload file thành công!";
            header('Location: uploadFile.php');
        }
        else{
        echo "Upload file không thành công!";
        }
    }else{
        echo "Chon file";
    }
}

function uploads($upload_path,$filename){
    
   foreach($_FILES[$filename]['error'] as $key =>$error){
        if($error == 0){
            $tmp_name = $_FILES[$filename]['tmp_name'][$key];
            $name = $_FILES[$filename]['name'][$key];
            move_uploaded_file($tmp_name,$upload_path.$name);
            //print_r($upload_path.$name);
            $date = date("F d Y H:i:s.", filemtime($upload_path.$name));
            $file = array(
                "name" => $_FILES[$filename]['name'],
                "source" => $upload_path.$name,
                "type" =>$_FILES[$filename]['type'],
                "date" => $date
            );
            $data[] = $file;
            
        }
   }
  // print_r($data);
}
function pre($data,$exit = true){
	echo "<pre>";
	print_r($data);
	if($exit){
		die();
	}
}

?>