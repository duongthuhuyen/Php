<?php
class Nguoidung extends CI_Controller{
	public function __construct(){
		parent:: __construct();
		$this->load->model('nguoidung/nd_table','ndtable');
	}
	public function danhsachnd(){
		$ndlist = $this->ndtable->ds_nd();
		$data['dsnd'] = $ndlist;
		$data['path'] = array('nguoidung/viewdsnd');
		$this->load->view('layoutAdmin',$data);
	}
	public function captcha(){
		$this->load->helper('captcha');
		$vals = array(
			'word'          => 'Random word',
			'img_path'      => './public/captcha',
			'img_url'       => 'http://localhost/webmamnon/public/captcha/',
			'font_path'     => 'http://localhost/webmamnon/public/fonts/texb.ttf',
			'img_width'     => '150',
			'img_height'    => 30,
			'expiration'    => 7200,
			'word_length'   => 8,
			'font_size'     => 16,
			'img_id'        => 'Imageid',
			'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
	
			// White background and border, black text and red grid
			'colors'        => array(
					'background' => array(255, 255, 255),
					'border' => array(255, 255, 255),
					'text' => array(0, 0, 0),
					'grid' => array(255, 40, 40)
			)
	);
	
	$cap = create_captcha($vals);
	var_dump($cap);
	}
}
?>
