<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_detail extends Front_Controller
{
	public function index()
	{
		
		$data['main_content']= 'product-detail';
		$this->load->view('front/inc/view',$data);
	}
	public function show_single_product($id)
	{
		$data['productsData']=$this->global_model->records_all("product",'',9);
		$data['result']= $this->global_model->records_single("product",array('product_id'=>$id));
		$data['images'] = $this->global_model->records_all("product_img",array('product_id'=>$id));
		$data['main_content']= 'product-detail';
		$this->load->view('front/inc/view',$data);
	}
}
?>