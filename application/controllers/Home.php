<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Front_Controller {
	//-------------------------------------------------------------------------------------------------------------
	//--------------------------------------- PAGE LOAD AND DATA ALLOCATION SECTION -------------------------------
	//-------------------------------------------------------------------------------------------------------------
	public function index()
	{
		$data['categoryData']=$this->global_model->records_all("category");
		$data['homeData'] =$this->global_model->records_single('home_page');
		$data['feedbackData'] =$this->global_model->records_all('home_page_feedback');
		$data['galleryimageData']=$this->global_model->records_all("gallery_page_images","","5");
		$data['main_content'] = 'homeView';			
		$this->load->view('front/inc/view',$data);
	}

//End of Program Write All Funtions Above this line ----------------------------------------------------	
}
