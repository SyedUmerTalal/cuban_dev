<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends Front_Controller
{
	public function index()
	{
		$data['faqData']=$this->global_model->records_single("faq_page");
		$data['main_content']= 'faq';
		$this->load->view('front/inc/view',$data);
	}
}
?>