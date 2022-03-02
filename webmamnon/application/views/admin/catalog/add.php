<?php $this->load->view('admin/catalog/head');?>
<div class="line"></div>
<div class="wrapper">
      <div class="widget">
           <div class="title">
			<h6>Thêm mới danh muc san pham</h6>
		</div>
		
		 
      <form id="form" class="form" enctype="multipart/form-data" method="post" action="">
          <fieldset>
                <div class="formRow">
                	<label for="param_name" class="formLeft">Tên danh mục:<span class="req">*</span></label>
                	<div class="formRight">
                		<span class="oneTwo"><input type="text" _autocheck="true" id="param_name" value="<?php echo set_value('name')?>" name="name"></span>
                		<span class="autocheck" name="name_autocheck"></span>
                		<div class="clear error" name="name_error"><?php echo form_error('name')?></div>
                	</div>
                	<div class="clear"></div>
                </div>
                
                 <div class="formRow">
                	<label for="param_username" class="formLeft">Site title:</label>
                	<div class="formRight">
                		<span class="oneTwo"><input type="text" _autocheck="true" value="" id="param_sitetitle" name="sitetitle"></span>
                		<span class="autocheck" name="name_autocheck"></span>
                		<div class="clear error" name="name_error"></div>
                	</div>
                	<div class="clear"></div>
                </div>
                
                 <div class="formRow">
                	<label for="param_username" class="formLeft">Meta desc:</label>
                	<div class="formRight">
                		<span class="oneTwo"><input type="text" _autocheck="true" value="" id="param_metadesc" name="metadesc"></span>
                		<span class="autocheck" name="name_autocheck"></span>
                		<div class="clear error" name="name_error"></div>
                	</div>
                	<div class="clear"></div>
                </div>
                
                
                 <div class="formRow">
                	<label for="param_username" class="formLeft">Meta key:</label>
                	<div class="formRight">
                		<span class="oneTwo"><input type="text" _autocheck="true" id="param_metakey" name="metakey"></span>
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
			<option value="18">
				Ti Vi 				            
			</option>
			<option value="17">
				Laptop				            
			</option>
			<option value="16">
				Điện thoại				            
			</option>
			<option value="15">
				Điều hòa					           
			</option> 
			      			        
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
		<optgroup label="Lựa chọn danh mục">
			<option value="0">
				0 				            
			</option>
			<option value="1">
				1				            
			</option>
			<option value="2">
				2				            
			</option>
			<option value="3">
				3					           
			</option> 
			<option value="4">
				4					           
			</option> 
			<option value="5">
				5					           
			</option> 
			      			        
		</select>
		<span name="cat_autocheck" class="autocheck"></span>
		<div name="cat_error" class="clear error"></div>
	</div>
	<div class="clear"></div>
</div>
                
                <div class="formSubmit">
	           			<input type="submit" class="redB" value="Thêm mới">
	           	</div>
          </fieldset>
      </form>
      
      </div>
</div>
