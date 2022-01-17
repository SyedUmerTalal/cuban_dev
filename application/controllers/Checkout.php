<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends Front_Controller
{
	public function index()
	{
	    $data['countries'] = $this->global_model->records_all('countries');
		$data['cusDetails'] = $this->global_model->records_single('customer',array('customer_id' => $this->session->userdata('customer_id')));
		$data['main_content']= 'checkout';
		$this->load->view('front/inc/view',$data);
	}
}
?>