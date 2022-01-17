<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends Front_Controller
{
	public function index()
	{
		$data['aboutData']=$this->global_model->records_single("about_page");
		$data['main_content']= 'about';
		$this->load->view('front/inc/view',$data);
	}
}
?>