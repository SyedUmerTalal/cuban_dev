<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class products extends Front_Controller
{
	public function index()
	{
		
		$data['productsData']=$this->global_model->records_all("product");
		$data['categoryData']=$this->global_model->records_all("category");
		$data['main_content']= 'products';
		$this->load->view('front/inc/view',$data);
	}
	public function category_wise_products($slug)
	{

		$categoriesData= $this->global_model->records_single('category',array('category_slug'=>$slug));
		$data['productsData']=$this->global_model->records_all('product',array('category_id'=>$categoriesData->category_id));
		$data['categoryData']=$this->global_model->records_all("category");
		$data['main_content']= 'products';
		$this->load->view('front/inc/view',$data);
	}

	
	
}
?>