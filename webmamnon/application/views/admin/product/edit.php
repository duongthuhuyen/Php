<!-- head -->
<?php $this->load->view('admin/product/head', $this->data)?>

<div class="line"></div>

<div class="wrapper">
    
	   	<!-- Form -->
<form enctype="multipart/form-data" method="post" action="" id="form" class="form">
			<fieldset>
				<div class="widget">
				    <div class="title">
						<img class="titleIcon" src="<?php echo public_url('admin')?>/images/icons/dark/add.png">
						<h6>Thêm mới Sản phẩm</h6>
					</div>
					
				    <ul class="tabs">
		                <li class="activeTab"><a href="#tab1">Thông tin chung</a></li>
		                <li class=""><a href="#tab2">SEO Onpage</a></li>
		                <li class=""><a href="#tab3">Bài viết</a></li>
		                
					</ul>
					
					<div class="tab_container">
					     <div class="tab_content pd0" id="tab1" style="display: block;">
					         <div class="formRow">
	<label for="param_name" class="formLeft">Tên:<span class="req">*</span></label>
	<div class="formRight">
		<span class="oneTwo"><input type="text" _autocheck="true" id="param_name" name="name" value="<?php echo $product->name;?>"></span>
		<span class="autocheck" name="name_autocheck"></span>
		<div class="clear error" name="name_error"></div>
	</div>
	<div class="clear"></div>
</div>

<div class="formRow">
	<label class="formLeft">Hình ảnh:<span class="req">*</span></label>
	<div class="formRight">
		<div class="left">
    		<input type="file" name="image" id="image" size="25" >
		</div>
		<img src="<?php echo base_url('upload/product/'.$product->image_link);?>" width="100" height="100">
		<div class="clear error" name="image_error"></div>
	</div>
	<div class="clear"></div>
</div>

<div class="formRow">
	<label class="formLeft">Ảnh kèm theo:</label>
	<div class="formRight">
		<div class="left">
    		<input type="file" multiple="" name="image_list[]" id="image_list" size="25" >
			
		</div>
		<?php
		$imagelist = json_decode($product->image_list);
		if(!empty($imagelist)){
		foreach($imagelist as $image):?>
			<img src="<?php echo base_url('upload/product/'.$image);?>" width="100" height="100">
		
		<?php endforeach;}?>
		
		<div class="clear error" name="image_list_error"></div>
	</div>
	<div class="clear"></div>
</div>

<!-- Price -->
<div class="formRow">
	<label for="param_price" class="formLeft">
		Giá :
		<span class="req">*</span>
	</label>
	<div class="formRight">
		<span class="oneTwo">
			<input type="text" _autocheck="true" class="format_number" id="param_price" style="width:100px" name="price" value="<?php echo $product->price;?>">
			<img src="<?php echo public_url('admin')?>/crown/images/icons/notifications/information.png" style="margin-bottom:-8px" class="tipS" original-title="Giá bán sử dụng để giao dịch">
		</span>
		<span class="autocheck" name="price_autocheck"></span>
		<div class="clear error" name="price_error"></div>
	</div>
	<div class="clear"></div>
</div>

<!-- Price -->
<div class="formRow">
	<label for="param_discount" class="formLeft">
		Giảm giá (VND) 
		<span></span>:
	</label>
	<div class="formRight">
		<span>
			<input type="text" class="format_number" id="param_discount" style="width:100px" name="discount" value="<?php echo $product->discount;?>">
			<img src="<?php echo public_url('admin')?>/crown/images/icons/notifications/information.png" style="margin-bottom:-8px" class="tipS" original-title="Số tiền giảm giảm giá">
		</span>
		<span class="autocheck" name="discount_autocheck"></span>
		<div class="clear error" name="discount_error"></div>
	</div>
	<div class="clear"></div>
</div>


<div class="formRow">
	<label for="param_cat" class="formLeft">Thể loại:<span class="req">*</span></label>
	<div class="formRight">
	    <select name="catalog"  class="left" >
			<option value=""></option>
				<!-- kiem tra danh muc co danh muc con hay khong -->
				<?php
				  $title = array("TIVI",'Điện Thoại','Laptop','Điều hòa');
				for($i = 0;$i<4;$i++){
				?>
				<optgroup label="<?php echo $title[$i];?>">
				<?php foreach($listCatalog[$i] as $key):?>
				<option value="<?php echo $key->id;?>" <?php if($key->id == $product->id){echo "selected";}?>>
					<?php echo $key->name;?>
				</option>
				<?php endforeach;?>								              
				</optgroup>
				<?php } ?>
									       
		</select>
		<span class="autocheck" name="cat_autocheck"></span>
		<div class="clear error" name="cat_error"></div>
	</div>
	<div class="clear"></div>
</div>


<!-- warranty -->
<div class="formRow">
	<label for="param_warranty" class="formLeft">
		Bảo hành :
	</label>
	<div class="formRight">
		<span class="oneFour"><input type="text" id="param_warranty" name="warranty" value="<?php echo $product->warranty;?>"></span>
		<span class="autocheck" name="warranty_autocheck"></span>
		<div class="clear error" name="warranty_error"></div>
	</div>
	<div class="clear"></div>
</div>

<div class="formRow">
	<label for="param_sale" class="formLeft">Tặng quà:</label>
	<div class="formRight">
		<span class="oneTwo"><textarea cols="" rows="4" id="param_gifts" name="gifts" value="<?php echo $product->gifts;?>"></textarea></span>
		<span class="autocheck" name="sale_autocheck"></span>
		<div class="clear error" name="sale_error"></div>
	</div>
	<div class="clear"></div>
</div>					         <div class="formRow hide"></div>
						 </div>
						 
						 <div class="tab_content pd0" id="tab2" style="display: none;">
						     			
<div class="formRow">
	<label for="param_site_title" class="formLeft">Title:</label>
	<div class="formRight">
		<span class="oneTwo"><textarea cols="" rows="4" _autocheck="true" id="param_site_title" name="site_title" value="<?php echo $product->site_title;?>"></textarea></span>
		<span class="autocheck" name="site_title_autocheck"></span>
		<div class="clear error" name="site_title_error"></div>
	</div>
	<div class="clear"></div>
</div>

<div class="formRow">
	<label for="param_meta_desc" class="formLeft">Meta description:</label>
	<div class="formRight">
		<span class="oneTwo"><textarea cols="" rows="4" _autocheck="true" id="param_meta_desc" name="meta_desc" value="<?php echo $product->meta_desc;?>"></textarea></span>
		<span class="autocheck" name="meta_desc_autocheck"></span>
		<div class="clear error" name="meta_desc_error"></div>
	</div>
	<div class="clear"></div>
</div>

<div class="formRow">
	<label for="param_meta_key" class="formLeft">Meta keywords:</label>
	<div class="formRight">
		<span class="oneTwo"><textarea cols="" rows="4" _autocheck="true" id="param_meta_key" name="meta_key" value="<?php echo $product->meta_key;?>"></textarea></span>
		<span class="autocheck" name="meta_key_autocheck"></span>
		<div class="clear error" name="meta_key_error"></div>
	</div>
	<div class="clear"></div>
</div>
						     <div class="formRow hide"></div>
						 </div>
						 
						 <div class="tab_content pd0" id="tab3" style="display: none;">
						      <div class="formRow">
                            	<label class="formLeft">Nội dung:</label>
                            	<div class="formRight">
                            		<textarea class="editor" id="param_content" name="content" value="<?php echo $product->content;?>"></textarea>
                            		<div class="clear error" name="content_error"></div>
                            	</div>
                            	<div class="clear"></div>
                            </div>
						      <div class="formRow hide"></div>
						 </div>
						
						
	        		</div><!-- End tab_container-->
	        		
	        		<div class="formSubmit">
	           			<input type="submit" class="redB" value="Cập nhật">
	           			<input type="reset" class="basic" value="Hủy bỏ">
	           		</div>
	        		<div class="clear"></div>
				</div>
			</fieldset>
		</form>
</div>
<div class="clear mt30"></div>
