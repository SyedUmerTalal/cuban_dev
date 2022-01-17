<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Terms extends Front_Controller
{
	public function index()
	{
		$data['termsData']=$this->global_model->records_single("terms_page");
		$data['main_content']= 'terms';
		$this->load->view('front/inc/view',$data);
	}
}
?>