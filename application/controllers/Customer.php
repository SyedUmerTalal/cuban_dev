<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Customer extends Front_Controller
{
	public function index()
	{
		$data['customerDetails'] = $this->global_model->records_single('customer',array('customer_id' =>$this->session->userdata('customer_id')));
		$data['main_content']= 'customer/customer-dashboard';
		$this->load->view('front/inc/view',$data);
	}

	public function customer_dashboard()
	{
		$data['customerData'] = $this->global_model->records_single('customer',array('customer_id' =>$this->session->userdata('customer_id')));
		$data['main_content'] = 'customer/customer-dashboard';				
		$this->load->view('front/inc/view',$data);
	}
	
	public function customer_invoice($id)
	{
		$data['order'] = $this->global_model->records_single('orders',array('orders_id' =>$id));
		$data['main_content'] = 'customer/invoicenew';				
		$this->load->view('front/inc/view',$data);
	}

	public function sign_in()
	{
		if($_POST)
		{
			$email = $this->input->post('customer_email',TRUE);
			$password = $this->input->post('customer_password',TRUE);
			$this->form_validation->set_rules("customer_email","",'valid_email');
			if($this->form_validation->run())
			{
				$where = array('customer_email'=>$email);
			}
			else
			{
				$where = array('customer_username'=>$email);
			}
			
			$result = $this->global_model->records_single('customer',$where);

			if($result)
			{
				if($this->encryption->decrypt($result->customer_password) == $password)
				{
					$session_data = array(
						'customer_id' => $result->customer_id,				
						'customer_email' => $result->customer_email,						
					);				
					$this->session->set_userdata($session_data);
					$this->session->set_flashdata('msg', '1');
					$this->session->set_flashdata('alert_data', 'Login Successfull.');

					redirect('customer-dashboard');
				}
				else
				{
					$this->session->set_flashdata('msg', '2');
					$this->session->set_flashdata('alert_data', 'Invalid Email Or Password.');
					redirect($_SERVER['HTTP_REFERER']);
				}							
			}
			else
			{				
				$this->session->set_flashdata('msg', '2');
				$this->session->set_flashdata('alert_data', 'Invalid Email Or Password.');
				redirect($_SERVER['HTTP_REFERER']);
			}
		}
		else
		{
			if(!empty($this->session->userdata('customer_id')))
			{
				redirect('customer-dashboard');
			}
			else
			{
				$data['main_content'] = 'login';				
				$this->load->view('front/inc/view',$data);	
			}
			
		}
	}

	public function sign_up()
	{
		if($_POST)
		{

			$this->form_validation->set_rules("customer_first_name","Customer First Name",'required|alpha');
			$this->form_validation->set_rules("customer_last_name","Customer Last Name",'required|alpha');
			$this->form_validation->set_rules("customer_email","Customer Email",'required|is_unique[customer.customer_email]');
			$this->form_validation->set_rules("customer_password","",'required');
			$this->form_validation->set_rules("confirm_password","Confirm Password",'required|matches[customer_password]');
			$this->form_validation->set_rules("customer_username","Username Name",'required|is_unique[customer.customer_username]');

			if($this->form_validation->run())
			{
				$data = array(
					"customer_first_name" => $this->input->post("customer_first_name",TRUE),
					"customer_last_name" => $this->input->post("customer_last_name",TRUE),
					"customer_username" => $this->input->post("customer_username",TRUE),
					"date_of_birth" => $this->input->post("date_of_birth",TRUE),
					"customer_phone_number" => $this->input->post("customer_phone_number",TRUE),
					"customer_email" => $this->input->post("customer_email",TRUE),
					"customer_password" => $this->encryption->encrypt($this->input->post("customer_password",TRUE)),
				);
				$this->global_model->insert_record('customer',$data);

				$section['body'] = '<table width="100%" border="1px" >';
				$section['body'] .='<tr><td>First Name:</td><td>'.$this->input->post("customer_first_name",TRUE).'<td></tr>';
				$section['body'] .='<tr><td>Last Name:</td><td>'.$this->input->post("customer_last_name",TRUE).'<td></tr>';
				$section['body'] .='<tr><td>Username:</td><td>'.$this->input->post("customer_username",TRUE).'<td></tr>';
				$section['body'] .='<tr><td>Date Of Birth:</td><td>'.$this->input->post("date_of_birth",TRUE).'<td></tr>';
				$section['body'] .='<tr><td>Phone Number:</td><td>'.$this->input->post("customer_phone_number",TRUE).'<td></tr>';
				$section['body'] .='<tr><td>Email Address:</td><td>'.$this->input->post("customer_email",TRUE).'<td></tr>';
				$section['body'] .='<br>';
				$section['body'] .='<tr><td>Customer Registration</td></tr>';
				$section['body'].= '</table>';

				$section['subject'] = 'New Customer From Aptandidle';
				$body = $this->load->view('email/template',$section, TRUE);
				$result = send_email($this->adminEmail,'New Customer From Aptandidle',$body);	

				

				$this->session->set_flashdata('msg', '1');
				$this->session->set_flashdata('alert_data', 'customer Added Successfully Proceed To Login');
				redirect('sign-in');
			}
			else
			{
				$this->session->set_flashdata('msg', '2');
				$this->session->set_flashdata('alert_data','Registration Failed');
				$data['main_content'] = 'register';				
				$this->load->view('front/inc/view',$data);	
				
			}
			
		}
		else
		{
			$data['main_content'] = 'register';				
			$this->load->view('front/inc/view',$data);	
		}
	}
	public function customer_logout()
	{
		$this->session->unset_userdata('customer_id');
		$this->session->unset_userdata('customer_email');
		redirect();
	}

	public function customer_orders()
	{
		$data['orders'] = $this->global_model->records_all('orders',array('customer_id' => $this->session->userdata('customer_id')));
		$data['main_content']= 'customer/order-history';
		$this->load->view('front/inc/view',$data);
	}
	public function customer_edit_profile()
	{

		if($_POST)
		{
			if(!empty($_POST['new_password']))
			{
				$this->form_validation->set_rules("new_password","",'required');
				$this->form_validation->set_rules("cnf_password","Confirm Password",'required|matches[new_password]');
				if($this->form_validation->run())
				{
					$data = array(
						"customer_password" => $this->encryption->encrypt($this->input->post("new_password",TRUE)),
					);

					$this->global_model->update_record('customer',$data,array('customer_id'=>$this->session->userdata('customer_id')));
					$this->session->set_flashdata('msg', '1');
					$this->session->set_flashdata('alert_data', 'Password Successfully');
					redirect('customer-profile');
				}
				else
				{
					$this->session->set_flashdata('msg', '2');
					$this->session->set_flashdata('alert_data','Password match failed');
					redirect('customer-profile');
				}
			}
			else
			{
				$this->form_validation->set_rules("customer_first_name","Username Name",'required|alpha');
				$this->form_validation->set_rules("customer_last_name","Username Name",'required|alpha');
				if($this->form_validation->run())
				{
					$data = array(
						"customer_first_name" => $this->input->post("customer_first_name",TRUE),
						"customer_last_name" => $this->input->post("customer_last_name",TRUE),
						"customer_address" => $this->input->post("customer_address",TRUE),
						"customer_phone_number" => $this->input->post("customer_phone_number",TRUE),
					);

					$this->global_model->update_record('customer',$data,array('customer_id'=>$this->session->userdata('customer_id')));
					$this->session->set_flashdata('msg', '1');
					$this->session->set_flashdata('alert_data', 'Customer Updated Successfully');
					redirect('customer-profile');
				}
				else
				{
					$this->session->set_flashdata('msg', '2');
					$this->session->set_flashdata('alert_data','Update Failed');
					redirect('customer-profile');


				}
			}

			
			
		}
		else
		{
			$data['customerDetails'] = $this->global_model->records_single('customer',array('customer_id' =>$this->session->userdata('customer_id')));
			$data['main_content']= 'customer/account-details';
			$this->load->view('front/inc/view',$data);
		}
		
	}

	

	



	


}
