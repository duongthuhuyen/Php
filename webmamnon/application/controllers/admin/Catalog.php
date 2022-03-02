<?php
class Catalog extends MY_Controller{
	function __construct(){
		parent:: __construct();
		$this->load->model('Catalog_Model');
	}

	function index(){
		$input = array();
		$total = $this->Catalog_Model->get_total();
		//echo $total;
		$this->data['total']=$total;
		//$listCatalog = $this->catalog_Model->get_list($input);
		// lấy nội dung của biến message
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		$page = $this->session->flashdata['page'];
		if($page == null){
			$page = 1;
		}
		
		$this->data['list']= $this->Catalog_Model->get_list_limit($input,10,10*($page-1));
		//echo var_dump($this->data['list']);
		$this->data['temp']='admin/catalog/index';
		$this->load->view('admin/main',$this->data);
	}

	function page(){
	
		$pae =  $this->uri->rsegment(3);
		$page = ($pae != null)? (int)$pae : 1;
	
		$this->session->set_flashdata('page',$page);
		redirect(admin_url('catalog'));
	}

	function add(){
		$this->load->library('form_validation');
		$this->load->helper('form');

	
		if($this->input->post()){
			$this->form_validation->set_rules('name','name','required|callback_check_namecatalog');
			if($this->form_validation->run()){
				$name = $this->input->post('name');
				$typecatalog = $this->input->post('type');
				$sort = $this->input->post('odersort');
				$metakey = $this->input->post('metakey');
				$metadesc = $this->input->post('metadesc');
				$sitetitle = $this->input->post('sitetitle');
				$dataa = array(
					'name' => $name,
					'parent_id' => (int)$typecatalog,
					'sort_order' =>(int)$sort,
					'site_title'=> $sitetitle,
					'meta_desc'=> $metadesc,
					'meta_key'=> $metakey
				);
				if($this->Catalog_Model->create($dataa)){
					$this->session->set_flashdata('message',"Thêm danh mục sản phẩm thành công");
				}else{
					$this->session->set_flashdata('message',"Thêm danh mục sản phẩm thất bại");
				}
				redirect(admin_url('catalog'));
			}
		}
		$this->data['temp'] = 'admin/catalog/add';
		$this->load->view('admin/main',$this->data);

		
	}

	function edit(){
		$this->load->library('form_validation');
		$this->load->helper('form');

		$id = $this->uri->rsegment(3);
		$this->data['info'] = $this->Catalog_Model->get_info($id);
		//echo var_dump($this->data['info']);
	
		if($this->input->post()){
			$this->form_validation->set_rules('name','name','required|callback_check_namecatalog');
			if($this->form_validation->run()){
				$name = $this->input->post('name');
				$typecatalog = $this->input->post('type');
				$sort = $this->input->post('odersort');
				$metakey = $this->input->post('metakey');
				$metadesc = $this->input->post('metadesc');
				$sitetitle = $this->input->post('sitetitle');
				$dataa = array(
					'name' => $name,
					'parent_id' => (int)$typecatalog,
					'sort_order' =>(int)$sort,
					'site_title'=> $sitetitle,
					'meta_desc'=> $metadesc,
					'meta_key'=> $metakey
				);
				
				if($this->Catalog_Model->update($id,$dataa)){
					$this->session->set_flashdata('message',"cập nhật danh mục sản phẩm thành công");
				}else{
					$this->session->set_flashdata('message',"cập nhật danh mục sản phẩm thất bại");
				}
				redirect(admin_url('catalog'));
			}
		}
		$this->data['temp'] = 'admin/catalog/edit';
		$this->load->view('admin/main',$this->data);
	}

	function delete(){
		$id = $this->uri->rsegment(3);
		if($this->Catalog_Model->delete($id)){
			$this->session->set_flashdata('message','Xóa thành công');
		}else{
			$this->session->set_flashdata('message','Xóa thất bại');
		}
		redirect(admin_url('catalog'));
	}

	function check_namecatalog(){
		$name = $this->input->post('name');
		$where = array(
			'name' => $name
		);
		if($this->Catalog_Model->check_exists($where)){
			$this->form_validation->set_message(__FUNCTION__,"Danh mục này đã tồn tại");
			return false;
		}
		return true;
	}

}
?>
