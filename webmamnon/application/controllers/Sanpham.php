<?php
class Sanpham extends CI_Controller{
	public function __contruct(){
		parent::__contruct;
	}

	public function index(){
		echo "hello everyone";
	}
	public function danhsach(){
		$this->load->model('sanpham/m_sp_table','tbsp');// load model, để thay tên class bg tên tbsp 
		$dssp = $this->tbsp->getSP();//gọi đến class rồi gọi đến phương thức
		$data['ds'] = $dssp; 
		$this->load->view('sanpham/vdssp',$data);
		
		
	}
}
?>
