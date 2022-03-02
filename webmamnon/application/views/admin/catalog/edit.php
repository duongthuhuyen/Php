<?php $this->load->view('admin/catalog/head');?>
<div class="line"></div>
<div class="wrapper">
      <div class="widget">
           <div class="title">
			<h6>Cập nhật danh muc san pham</h6>
		</div>
		
		 
      <form id="form" class="form" enctype="multipart/form-data" method="post" action="">
          <fieldset>
                <div class="formRow">
                	<label for="param_name" class="formLeft">Tên danh mục:<span class="req">*</span></label>
                	<div class="formRight">
                		<span class="oneTwo"><input type="text" _autocheck="true" id="param_name" value="<?php echo $info->name;?>" name="name"></span>
                		<span class="autocheck" name="name_autocheck"></span>
                		<div class="clear error" name="name_error"><?php echo form_error('name')?></div>
                	</div>
                	<div class="clear"></div>
                </div>
                
                 <div class="formRow">
                	<label for="param_username" class="formLeft">Site title:</label>
                	<div class="formRight">
                		<span class="oneTwo"><input type="text" _autocheck="true" value="<?php echo $info->site_title;?>" id="param_sitetitle" name="sitetitle"></span>
                		<span class="autocheck" name="name_autocheck"></span>
                		<div class="clear error" name="name_error"></div>
                	</div>
                	<div class="clear"></div>
                </div>
                
                 <div class="formRow">
                	<label for="param_username" class="formLeft">Meta desc:</label>
                	<div class="formRight">
                		<span class="oneTwo"><input type="text" _autocheck="true" value="<?php echo $info->meta_desc;?>" id="param_metadesc" name="metadesc"></span>
                		<span class="autocheck" name="name_autocheck"></span>
                		<div class="clear error" name="name_error"></div>
                	</div>
                	<div class="clear"></div>
                </div>
                
                
                 <div class="formRow">
                	<label for="param_username" class="formLeft">Meta key:</label>
                	<div class="formRight">
                		<span class="oneTwo"><input type="text" _autocheck="true" id="param_metakey" name="metakey" value="<?php echo $info->meta_key;?>"></span>
                		<span class="autocheck" name="name_autocheck"></span>
                		<div class="clear error" name="name_error"></div>
                	</div>
                	<div class="clear"></div>
                </div>
<div class="formRow">
	<label class="formLeft" for="param_cat">Thể loại:<span class="req">*</span></label>
	<div class="formRight">
		<select name="type" _autocheck="true" id="param_type" class="left">
			
						      <!-- kiem tra danh muc co danh muc con hay khong -->
		<optgroup label="Lựa chọn danh mục">
			<?php 
			$list = array('0'=>'Tivi',
			'1'=>'Laptop','2'=>'Điện thoại','3'=>'Điều hòa');
			for($i = 0;$i<4;$i++){
			
				if($i == $info->parent_id){?>
			<option value="<?php echo $i;?>" <?php echo 'Selected';?>>
				<?php echo $list[$i];?> 				            
			</option>
			
			<?php }else{?>
				<option value="<?php echo $i;?>">
					<?php echo $list[$i];?> 				            
				</option>
			<?php } }?>		        
		</select>
		<span name="cat_autocheck" class="autocheck"></span>
		<div name="cat_error" class="clear error"></div>
	</div>
	<div class="clear"></div>
</div>
<div class="formRow">
	<label class="formLeft" for="param_cat">Sort order:<span class="req">*</span></label>
	<div class="formRight">
		<select name="ordersort" _autocheck="true" id="param_ordersort" class="left">
			
						      <!-- kiem tra danh muc co danh muc con hay khong -->
		<optgroup label="Lựa chọn sắp xếp">
		<?php 
			$list = array('0'=>'0',
			'1'=>'1','2'=>'2','3'=>'3');
			for($i = 0;$i<4;$i++){
			
				if($i == $info->sort_order){?>
			<option value="<?php echo $i;?>" <?php echo 'Selected';?>>
				<?php echo $list[$i];?> 				            
			</option>
			
			<?php }else{?>
				<option value="<?php echo $i;?>">
					<?php echo $list[$i];?> 				            
				</option>
			<?php } }?>	       
		</select>
		<span name="cat_autocheck" class="autocheck"></span>
		<div name="cat_error" class="clear error"></div>
	</div>
	<div class="clear"></div>
</div>
                
                <div class="formSubmit">
	           			<input type="submit" class="redB" value="Cập nhật">
	           	</div>
          </fieldset>
      </form>
      
      </div>
</div>
