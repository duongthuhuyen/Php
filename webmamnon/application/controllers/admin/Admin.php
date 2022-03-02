<?php
class Admin extends MY_Controller{
	function __construct(){
		parent:: __construct();
		$this->load->model('admin_Model');
	}
	function index(){
		$input = array();
		$list = $this->admin_Model->get_list($input);
		$total = $this->admin_Model->get_total();
		//pre($list);
		$this->data['temp'] = 'admin/admin/index';
		$this->data['total'] = $total;
		$this->data['list'] = $list;
		// lấy nội dung của biến message
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		$this->load->view('admin/main',$this->data);
	}
	// thêm mới quản trị viên
	function add(){
		$this->load->library('form_validation');
		$this->load->helper('form');
		// nếu submit lên mà có dữ liệu push lên
		if($this->input->post()){
			$this->form_validation->set_rules('name', 'Tên', 'required|min_length[8]');
            $this->form_validation->set_rules('username', 'Tài khoản đăng nhập', 'required|callback_check_username');
            $this->form_validation->set_rules('password', 'Mật khẩu', 'required|min_length[6]');
            $this->form_validation->set_rules('re_password', 'Nhập lại mật khẩu', 'matches[password]');
			if($this->form_validation->run()){
				// nhập liệu chính xác-> thêm vào cơ sở dữ liệu
				$name = $this->input->post('name');
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$data = array(
					'name' => $name,
					'username' => $username,
					'password' => md5($password)
				);
				if($this->admin_Model->create($data)){
					$this->session->set_flashdata('message',"Thêm mới admin thành công");
				}else{
					$this->session->set_flashdata('message',"Thêm mới thất bại");
				}
				redirect(admin_url('admin'));
				//$name = $this->form_validation->post('name');
			}
		}
		$this->data['temp'] = 'admin/admin/add';
		$this->load->view('admin/main',$this->data);
	}
	function check_username(){
		// kiểm tra username đã tồn tại chưa
		$username = $this->input->post('username');
		$where = array('username' => $username);
		if($this->admin_Model->check_exists($where)){
			$this->form_validation->set_message(__FUNCTION__,"Tài khoản đã tồn tại");
			return false;
		}
		return true;
	}
	function edit(){
		$id = $this->uri->rsegment('3');
		//echo $id;
		$this->data['temp'] = 'admin/admin/edit';
		$this->load->library('form_validation');
		$this->load->helper('form');
		$infor = $this->admin_Model->get_info($id);
		$this->data['infor'] = $infor;
		//pre($infor);
		if($this->input->post()){
			$this->form_validation->set_rules('name', 'Tên', 'required|min_length[8]');
            $this->form_validation->set_rules('username', 'Tài khoản đăng nhập', 'required|callback_check_username');

			$password = $this->input->post('password');
			if($password){
           		$this->form_validation->set_rules('password', 'Mật khẩu', 'required|min_length[6]');
        		$this->form_validation->set_rules('re_password', 'Nhập lại mật khẩu', 'matches[password]');
			}
			if($this->form_validation->run()){
				$name = $this->input->post('name');
				$username = $this->input->post('username');
				$data = array(
					'name' => $name,
					'username' => $username,
					
				);
				if($password){
					$data['password'] = md5($password);
				}
				if($this->admin_Model->update($id,$data)){
					$this->session->set_flashdata('message',"Update thành công");
				}else{
					$this->session->set_flashdata('message',"Update thất bại");
				}
				redirect(admin_url('admin'));
			}
		}
		$this->load->view('admin/main',$this->data);
	}
	function delete(){
		$id = $this->uri->rsegment(3);
		if($this->admin_Model->delete($id)){
			$this->session->set_flashdata('message',"Xóa thành công");
		}else{
			$this->session->set_flashdata('message',"Xóa thành công");
		}
		redirect(admin_url('admin'));
		
	}

	function logout(){
		
		if($this->session->userdata['login']){
			$this->session->unset_userdata['login'];
		}
		redirect(admin_url('login'));
	}

	
}

?>
