<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends Front_Controller
{
	public function index()
	{
		$data['galleryData']=$this->global_model->records_single("gallery_page");
		$data['galleryimageData']=$this->global_model->records_all("gallery_page_images");
		$data['main_content']= 'gallery';
		$this->load->view('front/inc/view',$data);
	}
}
?>