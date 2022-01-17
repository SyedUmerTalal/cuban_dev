<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_signup extends Front_Controller
{
	public function index()
	{
		
		$data['main_content']= 'login-signup';
		$this->load->view('front/inc/view',$data);
	}
}
?>