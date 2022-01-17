<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends Front_Controller
{
	public function index()
	{
		$data['contactData']=$this->global_model->records_single("contact_page");
		$data['main_content']= 'contact';
		$this->load->view('front/inc/view',$data);
	}
	public function form_validation()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('message','Message','required');

		if($this->form_validation->run()== TRUE)
		{
			$value =array('name'=>$this->input->post('name'),
						'email'=>$this->input->post('email'),
						'message'=>$this->input->post('message')
															);
			$this->global_model->insert_record('contact_form',$value);
			redirect('contact');
		}
		else
		{
			
		$data['contactData']=$this->global_model->records_single("contact_page");
		$data['main_content']= 'contact';
		$this->load->view('front/inc/view',$data);
		}

	}
}
?>