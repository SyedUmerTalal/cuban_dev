<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin	extends MY_Controller {

	function __construct() {
        parent::__construct();
        $this->developer = $this->global_model->records_single('developer');
    }

	public function index()
	{	
		if($this->session->userdata('user_id')){
			$data['main_content'] = 'admin/dashboard';		
			$this->load->view('admin/inc/view',$data);
		}		
		else{
			redirect('login');
		}		
	}
	public function general()
	{
		$data['site_title'] ="";
		return $data;	
	}

	public function profile()
	{	
		if($this->session->userdata('user_id')){
			$data['records'] = $this->global_model->records_all('user');
			$data['main_content'] = 'admin/user/edit';	
			$this->load->view('admin/inc/view',$data);
		}		
		else{
			redirect('login');
		}			
	}

	public function lists($table)
	{			
		if($this->session->userdata('user_active'))
		{
			$arraydata = $this->db->field_data($table);


			foreach($arraydata as $removeable)
			{
				
				if(($removeable->max_length == "301") && ($removeable->type == "varchar"))
				{
					if(in_array($removeable->name, array_column($arraydata, 'name'))) 
					{
						$data['fields'] = $this->removeElementWithValue($arraydata, "name", $removeable->name);
						$arraydata = $data['fields'];
					}
				}
				elseif($removeable->type == "text")
				{
					if(in_array($removeable->name, array_column($arraydata, 'name'))) 
					{
						$data['fields'] = $this->removeElementWithValue($arraydata, "name", $removeable->name);
						$arraydata = $data['fields'];
					}
				}
			}

			if(in_array($table.'_id', array_column($arraydata, 'name'))) 
			{
				$data['fields'] = $this->removeElementWithValue($arraydata, "name", $table.'_id');
				$arraydata = $data['fields'];
			}
			if(in_array($table.'_date', array_column($arraydata, 'name'))) 
			{
				$data['fields'] = $this->removeElementWithValue($arraydata, "name", $table.'_date');
				$arraydata = $data['fields'];
			}
			if(in_array($table.'_status', array_column($arraydata, 'name'))) 
			{
				$data['fields'] = $this->removeElementWithValue($arraydata, "name", $table.'_status');
				$arraydata = $data['fields'];
			}

			$data['fields'] = $arraydata;
			$data['table'] = $table;
			$data['records'] = $this->global_model->records_all($table);
			$data['main_content'] = 'admin/pages/list';		
			$this->load->view('admin/inc/view',$data);
		}		
		else{
			redirect('login');
		}			
	}

	function removeElementWithValue($array, $key, $value){

		foreach($array as $subKey => $subArray){

			if($subArray->$key == $value){
				unset($array[$subKey]);
			}
		}
		return $array;
	}

	public function view($table)
	{			
		if($this->session->userdata('user_id')){
			$id = $this->uri->segment(3);
			$table_id = $table.'_id	';

			$arraydata = $this->db->field_data($table);

			if(in_array($table.'_id', array_column($arraydata, 'name'))) 
			{
				$data['fields'] = $this->removeElementWithValue($arraydata, "name", $table.'_id');
				$arraydata = $data['fields'];
			}
			if(in_array($table.'_date', array_column($arraydata, 'name'))) 
			{
				$data['fields'] = $this->removeElementWithValue($arraydata, "name", $table.'_date');
				$arraydata = $data['fields'];
			}
			if(in_array($table.'_status', array_column($arraydata, 'name'))) 
			{
				$data['fields'] = $this->removeElementWithValue($arraydata, "name", $table.'_status');
				$arraydata = $data['fields'];
			}
			$data['fields'] = $arraydata;

			$data['table'] = $table;
			$data['records'] = $this->global_model->records_single($table,array($table_id => $id));
			$data['main_content'] = 'admin/pages/view';		
			$this->load->view('admin/inc/view',$data);
		}		
		else{
			redirect('login');
		}			
	}

	public function edit_extras($table)
	{			
		if($this->session->userdata('user_active')){
			$id = $this->uri->segment(3);
			$table_id = $table.'_id	';
			$data['records'] = $this->global_model->records_all($table,array($table_id => $id));
			$data['main_content'] = 'admin/'.$table.'/edit';;		
			$this->load->view('admin/inc/view',$data);
		}		
		else{
			redirect('login');
		}			
	}

	public function add($table)
	{			
		if($this->session->userdata('user_active'))
		{
			$data["table"] = $table;
			$data['coloums'] = $this->db->field_data($table);

			if(in_array($table.'_id', array_column($data['coloums'], 'name'))) 
			{
				$data['fields'] = $this->removeElementWithValue($data['coloums'], "name", $table.'_id');
				$data['coloums'] = $data['fields'];
			}

			if(in_array($table.'_date', array_column($data['coloums'], 'name'))) 
			{
				$data['fields'] = $this->removeElementWithValue($data['coloums'], "name", $table.'_date');
				$data['coloums'] = $data['fields'];
			}
			if(in_array($table.'_status', array_column($data['coloums'], 'name'))) 
			{
				$data['fields'] = $this->removeElementWithValue($data['coloums'], "name", $table.'_status');
				$data['coloums'] = $data['fields'];
			}
			
			$data['main_content'] = 'admin/pages/add';	
			$this->load->view('admin/inc/view',$data);
		}		
		else
		{
			redirect('login');
		}			
	}
	public function edit($table)
	{			
		if($this->session->userdata('user_active')){
			$data["table"] = $table;

			$data['coloums'] = $this->db->field_data($table);

			if(in_array($table.'_id', array_column($data['coloums'], 'name'))) 
			{
				$data['fields'] = $this->removeElementWithValue($data['coloums'], "name", $table.'_id');
				$data['coloums'] = $data['fields'];
			}

			if(in_array($table.'_date', array_column($data['coloums'], 'name'))) 
			{
				$data['fields'] = $this->removeElementWithValue($data['coloums'], "name", $table.'_date');
				$data['coloums'] = $data['fields'];
			}
			if(in_array($table.'_status', array_column($data['coloums'], 'name'))) 
			{
				$data['fields'] = $this->removeElementWithValue($data['coloums'], "name", $table.'_status');
				$data['coloums'] = $data['fields'];
			}

			$id = $this->uri->segment(3);
			$table_id = $table.'_id	';
			$data['records'] = $this->global_model->records_all($table,array($table_id => $id));
			$data['main_content'] = 'admin/pages/edit';
			$this->load->view('admin/inc/view',$data);
		}		
		else{
			redirect('login');
		}			
	}
	public function get_dropdown()
	{		
		$id = $this->input->post("id");
		$get_from = $this->input->post("get_from");
		$get_where = $this->input->post("get_where");
		$get_from_id = $get_from.'_id';
		$options = $this->global_model->records_all($get_from,array($get_where.'_id'=>$id));
		echo '<option value="">Please Select</option>';
		foreach($options as $option){
			echo '<option value="'. $option->$get_from_id .'">'. get_name_by_id($get_from,$option->$get_from_id) .'</option>';
		}
		return;	
	}
	public function add_data($table)
	{		
		if($this->session->userdata('user_active'))
		{
			foreach($_POST as $key => $val)  
			{  					
				if(strpos($key ,'slug') !== false)
				{
					$result = check_slug($table,$this->input->post($key));					
					$data[$key] = $result;					
				}
				else
				{
					$data[$key] = $this->input->post($key);  
				}				
			}  	
			$id = $this->global_model->insert_record($table,$data);	
			if($id)
			{				
				foreach($_FILES as $key => $val)  
				{  
					$this->upload_muntiimage('product_img',$key,$id);
				}  
				$this->session->set_flashdata('msg', '1');
				$this->session->set_flashdata('alert_data', 'Added Successfully');
			}
			else
			{
				$this->session->set_flashdata('msg', '2');
				$this->session->set_flashdata('alert_data', 'Failed To Add');
			}					
			redirect('list/'.$table,'refresh');
		}		
		else{
			redirect('login');
		}	

	}
	
	
	public function update_data($table)
	{	

		if($this->session->userdata('user_active')){
			$id = $this->uri->segment(3);
			foreach($_POST as $key => $val)  
			{  
				if(strpos($key ,'slug') !== false){
					$result = check_slug_edit($table,$this->input->post($key),$id);					
					$data[$key] = $result;					
				}
				elseif(strpos($key ,'product_info') !== false)
				{
					$data['product_info'] = serialize(array_combine($this->input->post('product_info_key'),$this->input->post('product_info_value')));			
				}
				else
				{
					if(strpos($key ,'product_img_image') !== false)
					{	
						$data2['product_img_status'] = '1'; 
						$this->global_model->update_record('product_img',$data2,'product_id ='.$id.'');
						$cpt = count($this->input->post($key));
						for($i=0; $i<$cpt; $i++)
						{  
							$data1[$key] = $_POST[$key][$i]; 
							$data1['product_id'] = $id;							
							$this->global_model->insert_record('product_img',$data1);
						}
					}
					else
					{
						$data[$key] = $this->input->post($key);  	
					}						
				}	
			}  
			foreach($_FILES as $key => $val)  
			{  
				if($_FILES[$key]['name']){
					
					if(strpos($key ,'product_img_image') !== false){
						$this->upload_muntiimage('product_img',$key,$id);
					}else{
						$data[$key] = $this->upload_image($table,$key);
					}					
				}			
			}  
			
			$table_id = $table.'_id	';
			$result = $this->global_model->update_record($table,$data,array($table_id=>$id));
			if($result)
			{
				$this->session->set_flashdata('msg', '1');
				$this->session->set_flashdata('alert_data', 'Updated Successfully');
			}
			else
			{
				$this->session->set_flashdata('msg', '2');
				$this->session->set_flashdata('alert_data', 'Update Failed');
			}
			redirect($_SERVER['HTTP_REFERER']);
		}		
		else
		{
			redirect('login');
		}			
	}
	public function delete($table)
	{			
		if($this->session->userdata('user_active')){
			$data[''.$table.'_status'] = 1;
			$id = $this->uri->segment(3);
			$table_id = $table.'_id	';
			$result = $this->global_model->update_record($table,$data,array($table_id => $id));
			if($result){
				$this->session->set_flashdata('msg', '1');
				$this->session->set_flashdata('alert_data', 'Deleted');
			}else{
				$this->session->set_flashdata('msg', '2');
				$this->session->set_flashdata('alert_data', 'Delete Failed');
			}
			redirect('list/'.$table,'refresh');
		}		
		else{
			redirect('login');
		}	
	}

	public function upload_muntiimage($table,$field,$id)
	{		
		$config['upload_path'] = './uploads/'.$table.'';
		$config['allowed_types'] = 'jpeg|jpg|png';
		$config['max_size']     = '0';
		$config['max_width'] = '0';
		$config['max_height'] = '0';
		$this->load->library('upload', $config);
		$this->upload->initialize($config);		
		$files = $_FILES;
		$cpt = count($_FILES[$field]['name']);
		$cpt;
		for($i=0; $i<$cpt; $i++)
		{           
			$_FILES['f']['name']= $files[$field]['name'][$i];
			$_FILES['f']['type']= $files[$field]['type'][$i];
			$_FILES['f']['tmp_name']= $files[$field]['tmp_name'][$i];
			$_FILES['f']['error']= $files[$field]['error'][$i];
			$_FILES['f']['size']= $files[$field]['size'][$i]; 
			if($this->upload->do_upload('f')){
				
				$file_detail = $this->upload->data();
				$data1['product_img_image'] = $file_detail['file_name'];
				$data1['product_id'] = $id;
				$result = $this->global_model->insert_record('product_img',$data1);	
				
			}else{						
				if(strpos($this->upload->display_errors(), 'did not select') !== false){
					return 1;
				}else{
					$_SESSION["msg_detail"] = $this->upload->display_errors() ; 
					$this->session->set_flashdata('msg', '2');
					$this->session->set_flashdata('alert_data', 'Failed');
					echo $this->upload->display_errors();
					return 0;
				}
			}
		}		
		return 1;
	}
	public function login()
	{
		if(!empty($_POST))
		{		
			$email = $this->input->post('email',TRUE);
			$password = $this->input->post('password',TRUE);
			$result = $this->global_model->records_all('user',array('user_email'=>$email));
			if($result){
				foreach($result as $row){
					$id = $row->user_id;
					$pass = $row->user_pass;
					$email = $row->user_email;
					$image = $row->user_image;
					$type =	$row->user_type;
				}

				if($this->encryption->decrypt($pass) == $password){
					$session_data = array(
						'user_id' => $id,				
						'user_email' => $email,
						'user_type' => $type,
						'user_image' => $image,
						'user_active' =>  'yes',							
					);				
					$this->session->set_userdata($session_data);
					$this->session->set_flashdata('msg', '1');
					$this->session->set_flashdata('alert_data', 'Login Successfull.');
					redirect('admin');
				}else{
					$this->session->set_flashdata('msg', '2');
					$this->session->set_flashdata('alert_data', 'Invalid Email Or Password.');
					redirect('login');
				}							
			}else{				
				$this->session->set_flashdata('msg', '2');
				$this->session->set_flashdata('alert_data', 'Invalid Email Or Password.');
				redirect('login');
			}
			
		}else{
			$this->load->view('admin/login');
		}
	}
	public function update_user()
	{
		if (!empty($_POST))
		{	
			$password = $this->input->post('user_pass',TRUE);
			$data['user_email'] = $this->input->post('user_email',TRUE);
			$data['user_pass'] = $this->encryption->encrypt($password);				
			$result = $this->global_model->update_record('user',$data,array('user_id'=>1));				
			if($result == 'TRUE' ){
				redirect();				
			}else{				
				$this->session->set_flashdata('msg', '2');
				$this->session->set_flashdata('alert_data', 'Failed To Update');
			}			
		}else{
			redirect('dashboard');
		}
	}

	public function update_password()
	{
		if (!empty($_POST))
		{	

			$password = $this->input->post('new_password',TRUE);
			$token = $this->uri->segment(3);
			$data['forgot_password_token'] = '';
			$data['user_pass'] = $this->encryption->encrypt($password);				
			$result = $this->global_model->update_record('user',$data,array('forgot_password_token'=>$token));				
			if($result == 'TRUE' ){
				$this->session->set_flashdata('msg', '1');
				$this->session->set_flashdata('alert_data', 'Password Changed Successfully');
				redirect('login','refresh');
			}else{				
				$this->session->set_flashdata('msg', '2');
				$this->session->set_flashdata('alert_data', 'Password Resset Failed');
				redirect('login','refresh');
			}			
		}else{
			$this->load->view('admin/reset-password');
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin');
	}

	public function forget_form()
	{
		$this->load->view('admin/forget-form');
	}

	public function password_recovery_email()
	{
		if (!empty($_POST))
		{	
			$email = $this->input->post('user_email',TRUE);
			$result = $this->global_model->records_all('user',array('user_email'=>$email));
			if($result){
				$today = date("Ymd");
				$rand = strtoupper(substr(uniqid(sha1(time())),0,120));
				$unique = $today . $rand;
				$forgot_password_token = $unique;
				$data['forgot_password_token'] = $forgot_password_token;
				$this->global_model->update_record('user',$data,array('user_email'=>$email));
				$this->resset_pass_email($email,$forgot_password_token);
				$this->session->set_flashdata('msg', '1');
				$this->session->set_flashdata('alert_data', 'Reset link send successfull');
				redirect('admin/login');	
			}else{			
				$this->session->set_flashdata('msg', '2');
				$this->session->set_flashdata('alert_data', 'Resset link send failed');			
				redirect('admin/login');
			}			
		}else{
			$this->load->view('login');
		}
	}	
	
	public function resset_pass_email($email,$forgot_password_token)
	{			
		$section['subject'] = 'Password Reset Link';
		$section['body'] = '<strong>Reset Link :</strong> <a href="'.base_url('admin/update_password/').$forgot_password_token.'">Click here and you will be redirected to the website.</a>';
		$body = $this->load->view('email/template',$section, TRUE);
		$result = send_email($email,'Password Reset Link',$body);
		if($result){
			return True;
		}else{			
			return False;
		}
	}

	public function photo_delete()
	{
		if (!unlink($_POST['photolink']))
		{
			echo 2;
		}
		else
		{
			echo 1;
		}

	}

	public function photo_upload()
	{
		if(!empty($_FILES['image']))
		{
			$image = single_image_upload($_FILES['image'],"./uploads/".$_POST['imagepath']);
			echo json_encode($image);
		}
		else
		{
			echo 2;
		}
	}

	public function admin_update_password()
	{
		$this->form_validation->set_rules('new_password', 'New Password', 'trim|min_length[3]|max_length[25]');
		$this->form_validation->set_rules('cnf_password', 'Confirm Password', 'trim|matches[new_password]');
		if (!$this->form_validation->run() == FALSE){

			$data = array(
				'user_pass' => $this->encryption->encrypt($this->input->post('new_password')),
			);
			$this->home_m->update_data('user',$data,array('user_id'=>5));

			$this->session->set_flashdata('msg', '1');
			$this->session->set_flashdata('alert_data', 'Password Updated');
			redirect($_SERVER['HTTP_REFERER']);
		}
		else
		{
			$this->session->set_flashdata('msg', '2');
			$this->session->set_flashdata('alert_data', 'Password Update Failed');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	
}
