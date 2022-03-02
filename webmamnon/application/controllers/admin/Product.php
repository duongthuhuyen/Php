<?php
 class Product extends MY_Controller{

	function __construct(){
		parent:: __construct();
		$this->load->model('Product_Model');
		$this->load->model('Catalog_Model');
	}
	 function index(){
		 $input = array();
		 $list = $this->Product_Model->get_list($input);
		 $total = $this->Product_Model->get_total();
		 $listCatalog = $this->Catalog_Model->get_list($input);
		 $this->data['total']= $total;
		 $this->data['list']=$list;
		 $listc = array();
		 for($i = 0;$i<4;$i++){
			 $l = array();
			 foreach($listCatalog as $key){
				 if($i == $key->parent_id){
					 $l[]=$key;
				 }
			 }
			 $listc[$i]=$l;
		 }
		 $this->data['listCatalog']=$listc;
		 $this->data['message'] = $this->session->flashdata['message'];

		 $this->data['temp']='admin/product/index';
		 $this->load->view('admin/main',$this->data); 
	 }
	 function add(){
		$input = array();
		$listCatalog = $this->Catalog_Model->get_list($input);
		$listc = array();
		for($i = 0;$i<4;$i++){
			$l = array();
			foreach($listCatalog as $key){
				if($i == $key->parent_id){
					$l[]=$key;
				}
			}
			$listc[$i]=$l;
		}
		$this->load->library('form_validation');
		$this->load->helper('form');
		// nếu submit lên mà có dữ liệu push lên
		if($this->input->post()){
			$this->form_validation->set_rules('name', 'Tên', 'required');
            //$this->form_validation->set_rules('image', 'hình ảnh', 'required');
            $this->form_validation->set_rules('price', 'giá', 'required');
            $this->form_validation->set_rules('catalog', 'danh mục', 'required');
			if($this->form_validation->run()){
				// nhập liệu chính xác-> thêm vào cơ sở dữ liệu
				$name = $this->input->post('name');
				$catalogid = $this->input->post('catalog');
				$price = $this->input->post('price');
				$price = str_replace(',','',$price);
				$discount = $this->input->post('discount');
				$this->load->library('upload_library');
				$image =$this->upload_library->upload('./upload/product','image');
				
				$imageLink = '';
				if(isset($image['file_name'])){
					$imageLink= $image['file_name'];
				}
				$listimage = $this->upload_library->uploads('./upload/product','image_list');
				$imagelist = json_encode($listimage);// chuyển đổi dạng mảng về dạng json
				$data = array(
					'name' => $name,
					'catalog_id' => $catalogid,
					'price' => $price,
					'discount'=> $discount,
					'image_link' => $imageLink,
					'image_list' => $imagelist,
					'warranty' => $this->input->post('warranty'),
					'gifts' => $this->input->post('gifts'),
					'site_title' => $this->input->post('site_title'),
					'meta_desc'  => $this->input->post('meta_desc'),
					'meta_key'   => $this->input->post('meta_key'),
					'content'	 =>	$this->input->post('content')
				);
				if($this->Product_Model->create($data)){
					$this->session->set_flashdata('message',"Thêm mới sản phẩm thành công");
				}else{
					$this->session->set_flashdata('message',"Thêm mới sản phẩm thất bại");
				}
				redirect(admin_url('product'));
				//$name = $this->form_validation->post('name');
			}
		}
		$this->data['listCatalog']=$listc;
		$this->data['temp']='admin/product/add';
		$this->load->view('admin/main',$this->data); 
	 }

	 function edit(){
		$id = $this->uri->rsegment('3');
		$product = $this->Product_Model->get_info($id);
		//pre($product);
		$this->data['product'] = $product;
		$input = array();
		$listCatalog = $this->Catalog_Model->get_list($input);
		$listc = array();
		for($i = 0;$i<4;$i++){
			$l = array();
			foreach($listCatalog as $key){
				if($i == $key->parent_id){
					$l[]=$key;
				}
			}
			$listc[$i]=$l;
		}
		$this->load->library('form_validation');
		$this->load->helper('form');
		// nếu submit lên mà có dữ liệu push lên
		if($this->input->post()){
			$this->form_validation->set_rules('name', 'Tên', 'required');
            $this->form_validation->set_rules('price', 'giá', 'required');
            $this->form_validation->set_rules('catalog', 'danh mục', 'required');
			if($this->form_validation->run()){
				// nhập liệu chính xác-> thêm vào cơ sở dữ liệu
				$name = $this->input->post('name');
				$catalogid = $this->input->post('catalog');
				$price = $this->input->post('price');
				$price = str_replace(',','',$price);
				$discount = $this->input->post('discount');
				$this->load->library('upload_library');
				$image =$this->upload_library->upload('./upload/product','image');
				//pre($image['file_name']);
				$listimage = $this->upload_library->uploads('./upload/product','image_list');
				$imagelist = json_encode($listimage);// chuyển đổi dạng mảng về dạng json
				$data = array(
					'name' => $name,
					'catalog_id' => $catalogid,
					'price' => $price,
					'discount'=> $discount,
					//'image_link' => $imageLink,
					//'image_list' => $imagelist,
					'warranty' => $this->input->post('warranty'),
					'gifts' => $this->input->post('gifts'),
					'site_title' => $this->input->post('site_title'),
					'meta_desc'  => $this->input->post('meta_desc'),
					'meta_key'   => $this->input->post('meta_key'),
					'content'	 =>	$this->input->post('content')
				);
				//$data = $this->Product_Model->get_list();
				//$count = count($data)+1;
				if(!empty($image)){
					
					//pre($imagelink);
					$imageLink = '';
					if(isset($image['file_name'])){
						//$image['file_name']='image_'.$count.$image['file_ext'];
						//echo var_dump($image['file_name']);
						$imageLink= $image['file_name'];
					}
					$data['image_link']= $imageLink;
					echo $imageLink;
				}
				if(!empty($listimage)){
					$data['image_list']= $imagelist;
				}
				if($this->Product_Model->update((int)$id,$data)){
					$this->session->set_flashdata('message',"Cập nhật sản phẩm thành công");
				}else{
					$this->session->set_flashdata('message',"Cập nhật sản phẩm thất bại");
				}
				redirect(admin_url('product/index'));
				//$name = $this->form_validation->post('name');
			}
		}
		$this->data['listCatalog']=$listc;
		$this->data['temp']='admin/product/edit';
		$this->load->view('admin/main',$this->data); 
	 }

	 function delete(){
		$id = $this->uri->rsegment('3');
		$product = $this->Product_Model->get_info($id);
		$path  = './upload/product/'.$product->image_link;
		if(file_exists($path)){
			unlink($path);
		}
		$imagelist = json_decode($product->image_list);
		if(!empty($imagelist)){
			foreach($imagelist as $image){
				$path  = './upload/product/'.$image;
				if(file_exists($path)){
					unlink($path);
				}
			}
		}
		if($this->Product_Model->delete($id)){
			$this->session->set_flashdata('message',"Xóa sản phẩm thành công");
		}else{
			$this->session->set_flashdata('message',"Xóa sản phẩm thất bại");
		}
		redirect(admin_url('product/index'));
	 }
 }

?>
