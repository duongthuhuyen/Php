<html>
	<head>
		<?php $this->load->view('admin/head');?>
	</head>
	<body>
	<div id="left_content">
		<?php $this->load->view('admin/left');?>
	</div>
	<div id = "rightSide">
		<div class="topNav">
			<?php $this->load->view('admin/header');?>
		</div>
		<?php $this->load->view($temp,$this->data);?>
		<div id ="footer">
			<?php $this->load->view('admin/footer')?>
		</div>
	</div>
	<div class="clear"></div>
	</body>
</html>
