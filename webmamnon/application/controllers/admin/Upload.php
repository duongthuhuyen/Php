<?php
class Upload extends MY_Controller{
	function __construct(){
		parent:: __construct();
		$this->load->model('upload_Model');
	}
	function index(){
		$this->load->library('form_validation');
		if($this->input->post('submit')){
			if($this->form_validation->run()){
			$this->load->library('upload_library');
			$image = $this->upload_library->upload('./upload/user','image');
			pre($image);
			$da =array(
				'name' => $data['file_name']
			);
			
			}
		}
		
		$this->data['temp'] = 'admin/upload/index';
		$this->load->view('admin/main',$this->data);
	} 

	function upload_file(){

		if($this->input->post('submit')){
			$this->load->library('upload_library');
			$data = $this->upload_library->uploads('./upload/user','image_list');

			pre($data);
		}
		$this->data['temp'] = 'admin/upload/index';
		$this->load->view('admin/main',$this->data);
	}
}
?>
