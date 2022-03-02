<?php $this->load->view('admin/catalog/head')?>
<div class="wrapper">

	<!-- Static table -->
	<div class="widget" id="main_content">
	<?php 
	if($message != null){
	$this->load->view("admin/catalog/message",$this->data);}?>
	
		<div class="title">
		    <span class="titleIcon"><div class="checker" id="uniform-titleCheck"><span><input type="checkbox" id="titleCheck" name="titleCheck" style="opacity: 0;"></span></div></span>
			<h6>Danh sách Danh mục</h6>
			<div class="num f12">Tổng số: <b><?php echo $total;?></b></div>
		</div>
		
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable taskWidget" id="checkAll">
			<thead>
				<tr>
				    <td style="width:21px;"><img src="<?php echo public_url('admin/');?>images/icons/tableArrows.png"></td>
					<td>Tên</td>
					<td style="width:150px;">Hành động</td>
				</tr>
			</thead>
			
			<tfoot class="auto_check_pages">
				<tr>
					<td colspan="3">
					     <div class="list_action itemActions">
								<a href="#submit" id="submit" class="button blueB" url="admin/cat/del_all.html">
									<span style="color:white;">Xóa hết</span>
								</a>
						 </div>
							
					     <div class="pagination">
							 <?php $totalPage = ceil($total/10);?>
							<a href="<?php echo admin_url('catalog/page/1');?>">1</a>&nbsp;
						   <a href="<?php echo admin_url('catalog/page/2');?>">2</a>&nbsp;
						   <?php if($totalPage>2){
							 
							   for($i=3;$i<= $totalPage;$i++){ ?>
						   <a href="<?php echo admin_url('catalog/page/'.$i);?>">Trang kế tiếp</a>&nbsp;			         
								<?php }}?>
						</div>
					</td>
				</tr>
			</tfoot>
			
			<tbody>
		<?php foreach($list as $l):?>
			 <tr class="row_8">
			        <td><div class="checker" id="uniform-undefined"><span><input type="checkbox" name="id[]" value="8" style="opacity: 0;"></span></div></td>
					
					<td><?php echo $l->name;?></td>  
					<td class="option">
						<a href="<?php echo admin_url('catalog/edit/'.$l->id);?>" class="tipS " original-title="Chỉnh sửa">
							<img src="<?php echo public_url('admin/');?>images/icons/color/edit.png">
						</a>
						
						<a href="<?php echo admin_url('catalog/delete/'.$l->id);?>" class="tipS verify_action" original-title="Xóa">
						    <img src="<?php echo public_url('admin/');?>images/icons/color/delete.png">
						</a>
					</td>
			</tr>
					
		<?php endforeach;?>						
			</tbody>
		</table>
	</div>
</div>
