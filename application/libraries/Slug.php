<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Slug {
/*      public function __construct()
        {
                $ci =& get_instance();
                $ci->load->model('general');

        }
    */
    //--------------
    
    public function add_slug($table,$slug)
	{		
	    $ci =& get_instance();	
		$data['table'] = $table;
		$data['output_type'] = 'result';
		$data['where'] = array($table.'_slug'=>$slug);
		$records = $ci->general->get($data);
		if($records){	
			$slug_temp = ''.$table.'_slug';
			foreach($records as $record){
				$result = $record->$slug_temp;
			}			
			$last_char = $this->check_last_char($result);	
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

	public function edit_slug($table,$slug,$id)
	{		
		$ci =& get_instance();	
		$data['table'] = $table;
		$data['output_type'] = 'result';
		$data['where'] = array($table.'_slug'=>$slug);
		$records = $ci->general->get($data);
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
				$last_char = $this->check_last_char($result);	
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
	
    private	function check_last_char($result)
	{
		$r = preg_match_all("/.*?(\d+)$/", $result);
		if($r>0) {
		   return 1;
		}else{
			return FALSE;
		}
	}	



   }

