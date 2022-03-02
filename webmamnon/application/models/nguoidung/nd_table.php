<?php
class Nd_table extends CI_Model{
	public function ds_nd(){
		$query = $this->db->get('users');
		if($query->num_rows()>0){
			return $query->result_array();
		}
		return false;
	}
	public function nd_id($id){
		$sql = 'select * from users where id = ?';
		$query = $this->db->query($sql,array($id));
		if($query->num_rows()>0){
           return $query->row_array();
		}
		return false;
	}
	public function them_nd($nd){
       $sql = 'insert into users(`fullname`,`email`,`birthday`,`password`,`address`) values (?,?,?,?,?)';
	   $result = $this->db->query($sql,array($data['fullname'],$data['email'],$data['birthday'],$data['password'],$data['address']));
	   return $result;
	}
}
?>
