<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('pagenation'))
{
	function pagenation($page_url="",$per_page="",$total_row="")
	 { 
	  $ci =& get_instance(); 
	  $data["base_url"] = $page_url;
	  $data["total_rows"] = $total_row;
	  $data["per_page"] = $per_page;
	  $data['use_page_numbers'] = FALSE;
  	

	  $data['first_link'] = '';
	  $data['last_link'] = ''; 

	  $data['next_tag_open'] = '<li><a>';
	  $data['next_tag_close'] = '</a></li>';

	  $data['prev_tag_open'] = '<li><a>';
	  $data['prev_tag_close'] = '</a></li>';

	  $data['num_tag_open'] = '<li><a>';
	  $data['num_tag_close'] = '</a></li>';

 	  $data['cur_tag_open'] = '<li class="active"><a>';
	  $data['cur_tag_close'] = '</a></li>';
	  
	  $ci->pagination->initialize($data);
	  $links = $ci->pagination->create_links();
	  return $links;					
	 }
}

if (!function_exists('check_slug'))
{
	function check_slug($table,$slug)
	{		
		$ci =& get_instance();	
		$records = $ci->global_model->records_all($table,'','',$table.'_slug','',$slug);
		if($records){	
			$slug_temp = ''.$table.'_slug';
			foreach($records as $record){
				$result = $record->$slug_temp;
			}			
			$last_char = check_last_char($result);	
			if($last_char){
				$last_char = (int)substr($result , -1);	
				$new_slug = substr_replace($result, "", -2);
				if($new_slug != $slug){					
					return $slug;
				}else{					
					$new_slug = substr_replace($result, "", -1);
					$result = $new_slug.++$last_char;			
					return $result;
				}				
			}else{				
				$result = ''.$slug.'-0';			
				return $result;
			}				
		}else{
			return  $slug;
		}
			
	}
}
if (!function_exists('get_sub_total'))
{
	function get_sub_total()
	{	
		$ci =& get_instance();
		return $ci->cart->total();
	}	
}


if (!function_exists('get_grand_total'))
{
	function get_grand_total()
		{	
		$ci =& get_instance();
		if(isset($_SESSION['coupon_code']))
		{	
			$code = $_SESSION['coupon_code'];
			$result = $ci->global_model->records_all("coupon",array("coupon_code"=>$code));
			if($result){
				foreach($result as $res){
					$coupon_percent = $res->coupon_percent ;
				}	
			}
			$percent = (float)$coupon_percent;
			$sub_total = $ci->cart->total();
			$x = $percent/100;
			$y = $x*$sub_total;
			$z= $sub_total-$y;
			if(isset($_SESSION['tax'])){
			   $tax = $_SESSION['tax'];
			   $ab = $z*$tax; 
			   $total = $z+$ab;
			}else{
			    $total = $z;
			}
			
			return $ci->cart->format_number($total);
		}else{
		    if(isset($_SESSION['tax'])){
		       $tax = $_SESSION['tax']; 
		       $total = $ci->cart->total()*$tax;
			   $total = $ci->cart->format_number($ci->cart->total()+$total); 
			}else{
			   $total =  $ci->cart->format_number($ci->cart->total());
			}
			return $total;
		}
	}
}	

if (!function_exists('get_discounted_amount'))
{
	function get_discounted_amount()
	{		
		$ci =& get_instance();
		if(isset($_SESSION['coupon_code']))
		{	
			$code = $_SESSION['coupon_code'];
			$result = $ci->global_model->records_all("coupon",array("coupon_code"=>$code));
			if($result){
				foreach($result as $res){
					$coupon_percent = $res->coupon_percent;
				}	
			}
			$percent = (float)$coupon_percent;
			$sub_total = $ci->cart->total();
			$x = $percent/100;
			$y = $sub_total*$x;
			$total = $y;
			return $ci->cart->format_number($total);
		}else{
			return $ci->cart->format_number(0);
		}		
			
	}
	
}

if (!function_exists('get_tax_amount'))
{
	function get_tax_amount()
	{		
		$ci =& get_instance();
		if(isset($_SESSION['tax']))
		{	
		    if(isset($_SESSION['coupon_code']))
    		{	
    			$code = $_SESSION['coupon_code'];
    			$result = $ci->global_model->records_all("coupon",array("coupon_code"=>$code));
    			if($result){
    				foreach($result as $res){
    					$coupon_percent = $res->coupon_percent ;
    				}	
    			}
    			$percent = (float)$coupon_percent;
    			$sub_total = $ci->cart->total();
    			$x = $percent/100;
    			$y = $x*$sub_total;
    			$z= $sub_total-$y;
    			$total ='test2'; // $z*$_SESSION['tax'];
    		}else{
    		    $total = $_SESSION['tax'];
    		}	
		}else{
			   $total = 'test'; //$ci->cart->format_number(0);
		}
	    return $total;		
	}
}
						
if (!function_exists('check_slug_edit'))
{
	function check_slug_edit($table,$slug,$id)
	{		
		$ci =& get_instance();	
		$records = $ci->global_model->records_all($table,'','',$table.'_slug','',$slug);;
		if($records){	
			$slug_temp = ''.$table.'_slug';
			$id_temp = ''.$table.'_id';
			foreach($records as $record){
				$result = $record->$slug_temp;
				$id1 = $record->$id_temp;
			}		
			if($id1 == $id){
				return $slug;
			}else{
				$last_char = check_last_char($result);	
				if($last_char){
					$last_char = (int)substr($result , -1);	
					$new_slug = substr_replace($result, "", -2);
					if($new_slug != $slug){					
						return $slug;
					}else{					
						$new_slug = substr_replace($result, "", -1);
						$result = $new_slug.++$last_char;			
						return $result;
					}				
				}else{				
					$result = ''.$slug.'-0';			
					return $result;
				}
			}				
		}else{
			return  $slug;
		}
			
	}
}

if (!function_exists('check_last_char'))
{
	function check_last_char($result)
	{
		$r = preg_match_all("/.*?(\d+)$/", $result);
		if($r>0) {
		   return 1;
		}else{
			return FALSE;
		}
	}	
}

if (!function_exists('get_cat_count'))
{
	function get_cat_count($id)
	{	
		$ci =& get_instance();
		$result = $ci->global_model->records_all("product",array("category_id"=>$id));
		return count($result);
		
	}
}
if (!function_exists('get_subcat_count'))
{
	function get_subcat_count($id)
	{	
		$ci =& get_instance();
		$result = $ci->global_model->records_all("product",array("sub_category_id"=>$id));
		return count($result);
		
	}
}

if (!function_exists('get_coupon_amount'))
{
	function get_coupon_amount($coupon)
	{								
		$ci =& get_instance();
		$coupon = $ci->global_model->records_all("coupon",array("coupon_code"=>$coupon));
		if($coupon){
			foreach($coupon as $coup){
			$coupon_amount = $coup->coupon_amount;
			}			
			return $coupon_amount; 
		}else{
			return 0;
		}
	}
}	
	
if (!function_exists('get_rating'))
{
	function get_rating($product_id)
	{								
		$ci =& get_instance();
		$ratings = $ci->global_model->records_all("reviews",array("product_id"=>$product_id,"reviews_display"=>"0"));
		if($ratings){
			$tr = 0 ;
			$i = 0;
			foreach($ratings as $rating){
				$tr += $rating->rating_point;
				$i++;
			}
			$rtavg = $tr/$i;
			return $rtavg; 
		}
	}
}	

if (!function_exists('get_reviws_count'))
{
	function get_reviws_count($product_id)
	{								
		$ci =& get_instance();
		$reviews = $ci->global_model->records_all("reviews",array("product_id"=>$product_id,"reviews_display"=>"0"));
		if($reviews){			
			return count($reviews);			
		}else{
			return 0;
		} 
	}
}	

if (!function_exists('get_id_by_slug'))
{
	function get_id_by_slug($table,$slug)
	{								
		$ci =& get_instance();
		$temp = $ci->global_model->records_all($table,array(''.$table.'_slug'=>$slug));
		if($temp){			
			foreach($temp as $tp){
			    $id = $table.'_id';
				$result = $tp->$id;				
			}
			return $result;
		}else{
			return FALSE;
		} 
	}
}	

if (!function_exists('get_slug_by_id'))
{
	function get_slug_by_id($table,$id)
	{								
		$ci =& get_instance();
		$temp = $ci->global_model->records_all($table,$table.'_id='.$id);
		if($temp){			
			$slug = $table.'_slug';
			foreach($temp as $tp){
				$result = $tp->$slug;				
			}
			return $result;
		}else{
			return FALSE;
		} 
	}
}	

if (!function_exists('coloum_record_one'))
{
	function coloum_record_one($tabel="",$where="",$field="")		
	{	
		$ci =& get_instance();
		$result = $ci->global_model->coloum_record_one($tabel,$where,$field);
		if($result){			
			return $result;
		}else{
			return FALSE;
		}	
	}	
}

if (!function_exists('get_sku_by_id'))
{
	function get_sku_by_id($table,$id)
	{								
		$ci =& get_instance();
		$temp = $ci->global_model->records_all($table,$table.'_id='.$id);
		if($temp){			
			$slug = $table.'_sku';
			foreach($temp as $tp){
				$result = $tp->$slug;				
			}
			return $result;
		}else{
			return FALSE;
		} 
	}
}	

if (!function_exists('get_name_by_id'))
{
	function get_name_by_id($table,$id)
	{								
		$ci =& get_instance();
		$temp = $ci->global_model->records_all($table,$table.'_id='.$id);
		if($temp){			
			$name = $table.'_name';
			foreach($temp as $tp){
				$result = $tp->$name;				
			}
			return $result;
		}else{
			return FALSE;
		} 
	}
}	
if (!function_exists('get_image_by_id'))
{
	function get_image_by_id($table,$id)
	{								
		$ci =& get_instance();
		$temp = $ci->global_model->records_all($table,$table.'_id='.$id);
		if($temp){			
			$image = $table.'_image';
			foreach($temp as $tp){
				$result = $tp->$image;				
			}
			return $result;
		}else{
			return FALSE;
		} 
	}
}

if (!function_exists('records_all'))
{
	function records_all($tabel="",$where="",$limit="",$order_col="",$order_by="",$like="")
	{		
		$ci =& get_instance();
		$records = $ci->global_model->records_all($tabel,$where,$limit,$order_col,$order_by,$like);
		if($records){	
			return $records;
		}else{
			return  FALSE;
		}
			
	}
}


if (!function_exists('scan_images_by_date'))
{
	function scan_images_by_date($dir) {
	    $ignored = array('.', '..', '.svn', '.htaccess');
	    $files = array();    
		if(!file_exists($dir)){
			mkdir($dir, 0777, true);
		}
	    foreach (scandir($dir) as $file) {
	        if (in_array($file, $ignored)) continue;
	        $files[$file] = filemtime($dir . '/' . $file);
	    }
	    arsort($files);
	    $files = array_keys($files);
	    return ($files) ? $files : false;
	}
}

if(!function_exists('single_image_upload')){	
	function single_image_upload($image,$path){         
		$_FILES['image']['name']= $image['name'];
		$_FILES['image']['type']= $image['type'];
		$_FILES['image']['tmp_name']= $image['tmp_name'];
		$_FILES['image']['error']= $image['error'];
		$_FILES['image']['size']= $image['size']; 
		if(!file_exists($path)){
			mkdir($path, 0777, true);
		}
		$ci =& get_instance();
		$config['upload_path'] = ''.$path.'';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|docx|xlxs|txt';
		$config['max_width'] = '400000';
		$config['max_height'] = '400000';
		$ci->load->library('upload', $config);
		$ci->upload->initialize($config);
		if(!$ci->upload->do_upload('image')){ 
			return array('error' => $ci->upload->display_errors());
		}else{
			$file_detail = $ci->upload->data();				
			return	$file_detail['file_name'];			
		}
		return FALSE;
	}
}

if(!function_exists('send_email')){	
	function send_email($send_to,$subject,$body){
		$ci =& get_instance();
		$config['mailtype'] ='html';
		$ci->email->set_header('Header1', 'Email Information');
		$ci->email->initialize($config);    
		$ci->email->from("info@bricks.com","Straughn");
		$ci->email->to($send_to);		
		$ci->email->subject($subject);
		$ci->email->message($body);
		if($ci->email->send()){
			return TRUE;	
		}else{
			return FALSE;
		}
	}
}