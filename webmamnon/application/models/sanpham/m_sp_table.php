<?php
class M_sp_table extends CI_Model{
	public function getSP(){
		return "Đây là danh sach";
	}

	public function getSPID($id){
		return "san pham ".$id;
	}
}
?>
