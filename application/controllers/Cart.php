<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends Front_Controller
{
	public function index()
	{
		$data['productsData']=$this->global_model->records_all("product",'',9);
		$data['main_content']= 'cart';
		$this->load->view('front/inc/view',$data);
	}
}
?>