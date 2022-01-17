<?php
	$this->load->view('admin/inc/header');
	$this->load->view('admin/inc/side_nav');
	$this->load->view('admin/inc/nav');
	isset($main_content)?$this->load->view(''.$main_content.''):'';
	$this->load->view('admin/inc/footer');	
?>