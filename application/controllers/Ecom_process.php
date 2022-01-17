<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ecom_process extends Front_Controller
{
	

	public function cart_insert()
	{

		
		$product_info = $this->global_model->records_single('product',array('product_id' => $_POST['product_id']));
		$ProWeight = $this->global_model->coloum_record_one('product',array('product_id'=>$_POST['product_id']),'product_weight');

		if($product_info->product_discounted_price > 0)
		{
			$price = $product_info->product_discounted_price;
		}
		else
		{
			$price = $product_info->product_regular_price;
		}
		
		$data=array(
			'id' => $product_info->product_id,
			'name'=> $product_info->product_name,
			'price'=> $price,
			'qty'=>$_POST['product_quantity'],
			'image'=>$product_info->product_image,
			'options' => array('weight' => $ProWeight)
		);

		
		$this->cart->insert($data);
		echo count($this->cart->contents());
	}

	public function check_cart()
	{
		echo count($this->cart->contents());
	}
    
    public function ship()
	{
		$zipCode = $this->input->post('zipcode');

		$totalWeight = 0;
		foreach($this->cart->contents() as $item)
		{
			$totalWeight += ($item['options']['weight'])*($item['qty']);
		}

		$this->load->library('USPS');
		$rate = array(
			array(
				'service' =>"Priority",
				'zip_origination' =>"90042",
				'zip_destination' => $zipCode,
				'pounds' => $totalWeight,
				'ounces' => "0",
				'container' =>""
			)
		);

		$verified_address = $this->usps->shipping_rate_lookup($rate);
		$rateValue =  $verified_address->Package->Postage->Rate;

		if(!empty($rateValue))
		{
			echo $rateValue;
		}
		else
		{
			echo 0;
		}
		
	}
	
	public function apply_coupon()
	{	
		$code = $_POST['coupon_code'];
		$result = $this->global_model->records_single('coupon',array('coupon_code'=>$code));
		$ip = $this->input->ip_address();
		if($result)
		{
			$this->session->set_userdata('coupon_code', $_POST['coupon_code']);
			echo 1;
		}
		else
		{
			echo 2;
		}			
	}
	
	public function get_states()
	{		
		$country = $this->input->post("id");
		$options = $this->global_model->records_all('states',array('country_id'=>$country));
		echo '<option value="">Please Select</option>';
		foreach($options as $option)
		{
			echo '<option value="'. $option->states_id .'">'. $option->name .'</option>';
		}
		return;	
	}

	public function get_cities()
	{		
		$state = $this->input->post("id");
		$opStates = $this->global_model->records_all('cities',array('state_id'=>$state));
		echo '<option value="">Please Select</option>';
		foreach($opStates as $cities)
		{
			echo '<option value="'. $cities->cities_id .'">'. $cities->name .'</option>';
		}
		return;	
	}
	
	public function removeCartItem($rowid) 
	{   
		$data = array(
			'rowid'   => $rowid,
			'qty'     => 0,
		);

		$this->cart->update($data);
	}

	public function updatecart()
	{
		
		$data = array(
			'rowid' => $_POST['id'],
			'qty'   => $_POST['qty'],
		);

		$result = $this->cart->update($data);

		if($result)
		{
			echo 1;
		}
		else
		{
			echo 2;
		}
	}
	
	public function ship_calculation($internalZip="")
	{
			$zipCode = $internalZip;
		$totalWeight = 0;
		foreach($this->cart->contents() as $item)
		{
			$totalWeight += ($item['options']['weight'])*($item['qty']);
		}

		$this->load->library('USPS');
		$rate = array(
			array(
				'service' =>"Priority",
				'zip_origination' =>"90042",
				'zip_destination' => $zipCode,
				'pounds' => $totalWeight,
				'ounces' => "0",
				'container' =>""
			)
		);

		$verified_address = $this->usps->shipping_rate_lookup($rate);
		$rateValue =  $verified_address->Package->Postage->Rate;

		if(!empty($rateValue))
		{
			return $rateValue;
		}
		else
		{
			return 0;
		}
		
	}
	
	public function proceed_checkout()
	{

		if(!empty($_POST))
		{

			$firstName = $this->input->post('first_name');
			$lastName = $this->input->post('last_name');
			$phoneNumber = $this->input->post('phone');
			$emailAddress = $this->input->post('email');
			$zip = $this->input->post('zip');

			$country = $this->input->post('country');
			$state = $this->input->post('state');
			$address = $this->input->post('address').' '.$this->input->post('address_optional').' '.$this->input->post('country').' '.$this->input->post('state');

			$updatingUser = array(
				'customer_first_name' => $firstName,
				'customer_last_name' => $lastName,
				'zip_code' => $this->input->post('zip'),
				'customer_phone_number' => $phoneNumber,
				'customer_address' => $this->input->post('address'),
				'optional_address' => $this->input->post('address_optional'),
			);

			$this->global_model->update_record('customer',$updatingUser,array('customer_id' => $this->session->userdata('customer_id')));

			$grandTotal = get_grand_total();
            if(get_sub_total() > 999999)
            {
                $shippingRates = 0;
            }
            else
            {
                $shippingRates = $this->ship_calculation($zip);
                $shippingRates = floatval($shippingRates);
            }
		
			$totalToPay = $grandTotal+$shippingRates;

		
			$today = date("Ymd");
			$rand = strtoupper(substr(uniqid(sha1(time())),0,12));
			$unique = $today . $rand;
			$orders_no = $unique;
			$data['orders_no'] = $orders_no;
			$data['orders_sub_total_amt'] = get_sub_total();
			$data['orders_diss_amt'] = get_discounted_amount();
			$data['orders_total_amt'] = $grandTotal;
			$data['shipping_charges'] = $shippingRates;
			$data['total_with_ship'] = $totalToPay;
			$data['order_type'] = "UNPAID";
			$data['currency'] = $this->currency;
			if($this->session->userdata('customer_id'))
			{
				$data['customer_id'] = $this->session->userdata('customer_id');		
			}
			foreach($_POST as $key => $val)
			{
				$data[$key] = $this->input->post($key,TRUE);
			}	


			$orders_id = $this->global_model->insert_record('orders',$data);
			
			$this->session->set_userdata('orders_no',$orders_no);


			foreach ($this->cart->contents() as $items)
			{
				$data2['orders_id'] = $orders_id;
				$data2['orders_no'] = $orders_no;
				$data2['product_id'] = $items["id"];
				$data2['product_name'] = $items["name"];
				$data2['product_qty'] = $items["qty"];
				$data2['product_price'] = round($items["price"],2);
				$data2['order_items_total_amt'] = round($items["subtotal"],2);
				$this->global_model->insert_record('order_items',$data2);				
			}

			
			$totalToPay = round($totalToPay,2);
			
			
			
			if(isset($_SESSION['coupon_code']) && !empty($this->session->userdata('coupon_code')))
			{
				$coupons = $this->global_model->coloum_record_one('coupon',array('coupon_code'=> $this->session->userdata('coupon_code')),'coupon_id');
				if($coupons ){
					$data3['coupon_id'] = $coupons;
					$data3['orders_id'] = $orders_id;
					$data3['orders_no'] = $orders_no;
					$data3['coupon_availed_ip'] = $this->input->ip_address();
					$this->global_model->insert_record('coupon_availed',$data3);
				}	
			}
			
			
			if($_POST['cod_check'] == "yes")
			{
				$this->success_checkout();
			}
			else
			{
				$this->paypal($orders_id);
			}
			
			
			
		}
		else
		{
			redirect('sign-in');
		}
	}

	//---------------------------------------------------------------------------------------------------------------------------------------------------------------		
//---------------------------------------------------------------PayPal Configration-----------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------------------------------------------------

	public function paypal($id)
	{	

		$this->load->library('paypal_lib');
		//Set variables for paypal form
		$returnURL = base_url('ecom_process/paypal_success'); //payment success url
		$cancelURL = base_url('ecom_process/paypal_cancel'); //payment cancel url
		$notifyURL = base_url('ecom_process/paypal_ipn'); //ipn url
		//get particular product data		
		$logo = base_url('uploads/settings/').$this->settings->header_logo_image;		
		$order_details = $this->global_model->records_single('orders',array('orders_id'=>$id,'order_type'=> 'UNPAID'));

		$this->paypal_lib->add_field('item_name', 'Divalicious Hair Product Purchase');
		$this->paypal_lib->add_field('item_number',$order_details->orders_no);
		$this->paypal_lib->add_field('amount', $order_details->total_with_ship);				

		$this->paypal_lib->add_field('return', $returnURL);
		$this->paypal_lib->add_field('cancel_return', $cancelURL);
		$this->paypal_lib->add_field('notify_url', $notifyURL);
		$this->paypal_lib->image($logo);
		$this->paypal_lib->paypal_auto_form();
	}
	
	public function paypal_success()
	{	
        print_r($_REQUEST);
        die();
		$paypalInfo = $this->input->get();
        
		if($this->input->get())
		{		
			$paypalInfo = $this->input->get();
			$data['orders_no'] = $paypalInfo['item_number']; 
			$data['txn_id'] = $paypalInfo["tx"];
			$data['payment_amt'] = $paypalInfo["amt"];
			$data['currency_code'] = $paypalInfo["cc"];
			$data['currency_code'] = $paypalInfo["cc"];
			$data['status'] = $paypalInfo["st"];

			$today = date("Ymd");
			$rand = strtoupper(substr(uniqid(sha1(time())),0,4));
			$unique = $today . $rand;
			$payment_no = $unique;	
			$data['payment_no'] = $payment_no;	
			$data2['order_type'] = 'PAID';
			$this->global_model->update_record('orders',$data2,array('orders_no'=>$paypalInfo['item_number']));	
			$id = $this->global_model->insert_record('payment',$data);
			if($id){

			$userRecords = $this->global_model->records_single('orders',array('orders_no'=>$paypalInfo['item_number']));

			$section['body'] = '<table width="100%" border="1px" >';
			$section['body'] .='<tr><td>First Name:</td><td>'.$userRecords->first_name.'<td></tr>';
			$section['body'] .='<tr><td>Last Name:</td><td>'.$userRecords->last_name.'<td></tr>';
			$section['body'] .='<tr><td>Email Address:</td><td>'.$userRecords->email.'<td></tr>';
			$section['body'] .='<tr><td>Phone Number:</td><td>'.$userRecords->phone.'<td></tr>';
            $section['body'] .='<tr><td>Address:</td><td>'.$userRecords->address.'<td></tr>';
            $section['body'] .='<tr><td>Optional Address:</td><td>'.$userRecords->address_optional.'<td></tr>';
            $section['body'] .='<tr><td>Country:</td><td>'.$userRecords->country.'<td></tr>';
            $section['body'] .='<tr><td>State:</td><td>'.$userRecords->state.'<td></tr>';
            $section['body'] .='<tr><td>City:</td><td>'.$userRecords->city.'<td></tr>';
            $section['body'] .='<tr><td>Zip Code:</td><td>'.$userRecords->zip.'<td></tr>';
			$section['body'] .='<br>';

			foreach($this->cart->contents() as $email_product)
			{
				$section['body'] .='<tr><td>Product Name:</td><td>'.$email_product["name"].'<td></tr>';
				$section['body'] .='<tr><td>Product Quantity:</td><td>'.$email_product["qty"].'<td></tr>';
				$section['body'] .='<tr><td>Product Price:</td><td>'.$email_product["price"].'<td></tr>';
				$section['body'] .='<td></tr>';
				$section['body'] .='<br>';
			}
			$section['body'] .='<tr><td>Currency:</td><td>'.$userRecords->currency.'<td></tr>';
			$section['body'] .='<tr><td>Sub Total:</td><td>'.$userRecords->orders_sub_total_amt.'<td></tr>';
			$section['body'] .='<tr><td>Discount Amount:</td><td>'.$userRecords->orders_diss_amt.'<td></tr>';
			$section['body'] .='<tr><td>Shipping Amount:</td><td>'.$userRecords->shipping_charges.'<td></tr>';
			$section['body'] .='<tr><td>Order Total:</td><td>'.$userRecords->total_with_ship.'<td></tr>';
			$section['body'] .='<tr><td>Thankyou For Your Purchase</td></tr>';
			$section['body'].= '</table>';


			$section['subject'] = 'New order from Cuban lashes';
			$body = $this->load->view('email/template',$section, TRUE);
            send_email('sartaj.akbar@informiatech.com','Cuban lashes',$body);
				
				$this->cart->destroy();
				$this->session->unset_userdata('coupon_code');
				$this->session->set_flashdata('msg', '1');
				$this->session->set_flashdata('alert_data', 'Order Successfull');
				redirect();				
			}
			else
			{			
				$this->session->set_flashdata('msg', '2');
				$this->session->set_flashdata('alert_data', 'Something Went Wrong, Please Try Again Later.');
			}
		}
		else
		{	
			$this->session->set_flashdata('msg', '2');
			$this->session->set_flashdata('alert_data', 'Unable To Get Paypal Response.');			
			redirect();
		}
		
	}
	
	public function paypal_cancel()
	{	
		$this->session->set_flashdata('msg', '2');
		$this->session->set_flashdata('alert_data', 'Order Has Been Canceled.');			
		redirect();
	}

	public function paypal_ipn()
	{			
		$paypalInfo	= $this->input->post();
		
		$data['orders_no']	= $paypalInfo["item_number"];
		$data['txn_id']	= $paypalInfo["txn_id"];
		$data['payment_amt'] = $paypalInfo["payment_gross"];
		$data['currency_code'] = $paypalInfo["mc_currency"];
		$data['status']	= $paypalInfo["payment_status"];

		$today = date("Ymd");
		$rand = strtoupper(substr(uniqid(sha1(time())),0,4));
		$unique = $today . $rand;
		$payment_no = $unique;	
		$data['payment_no'] = $payment_no;				
		$id = $this->general->add_data('payment',$data);
		
		$paypalURL = $this->paypal_lib->paypal_url;		
		$result	= $this->paypal_lib->curlPost($paypalURL,$paypalInfo);
		
	}


}
?>