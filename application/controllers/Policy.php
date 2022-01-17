<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Policy extends Front_Controller
{
	public function index()
	{
		$data['policyData']=$this->global_model->records_single("policy_page");
		$data['main_content']= 'policy';
		$this->load->view('front/inc/view',$data);
	}
}
