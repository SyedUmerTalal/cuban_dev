<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Global_model extends CI_Model 
{
	//---------------------- THIS FUNCTION GET ALL RECORDS FROM THE TABLE DEPENDING ON CONDITIONS ----------------------
	public function records_all($tabel="",$where="",$limit="",$order_col="",$order_by="",$like="",$group_by="",$join_tabel="",$join="")
	{
		$this->db->select('*');
		$this->db->from($tabel);						
		$this->db->where(''.$tabel.'_status',0);		
		if($where){
			$this->db->where($where);
		}	
		if($limit){
			$this->db->limit($limit);
		}
		if($order_by){
			$this->db->order_by($order_col, $order_by);
		}	
		if($like){
			$this->db->like($order_col,$like);
		}
		if($group_by){
			$this->db->group_by($group_by);
		}
		if($join){
			$this->db->join($join_tabel,$join,'left');		
		}
		$query = $this->db->get();
		$result = $query->result();
		return $result; 		
	}
	public function records_select($select="",$tabel="",$where="",$limit="")
	{
		if($select)
		{
			$this->db->select($select);
		}
		else
		{
			$this->db->select('*');
		}
		
		$this->db->from($tabel);						
		$this->db->where(''.$tabel.'_status',0);		
		if($where){
			$this->db->where($where);
		}	
		if($limit){
			$this->db->limit($limit);
		}
		$query = $this->db->get();
		$result = $query->row();
		return $result; 		
	}

	public function records_select_all($select="",$tabel="",$where="",$limit="",$join_tabel="",$join="",$group_by="")
	{
		if($select)
		{
			$this->db->select($select);
		}
		else
		{
			$this->db->select('*');
		}
		
		$this->db->from($tabel);						
		$this->db->where(''.$tabel.'_status',0);		
		if($where){
			$this->db->where($where);
		}	
		if($limit){
			$this->db->limit($limit);
		}
		if($join){
			$this->db->join($join_tabel,$join,'left');		
		}
		if($group_by){
			$this->db->group_by($group_by);
		}
		$query = $this->db->get();
		$result = $query->result();
		return $result; 		
	}
	
	//---------------------- THIS FUNCTION GET SINGLE RECORDS FROM THE TABLE DEPENDING ON CONDITIONS ----------------------
	
	public function records_single($tabel="",$where="",$limit="",$order_col="",$order_by="",$like="")
	{
		$this->db->select('*');
		$this->db->from($tabel);						
		$this->db->where(''.$tabel.'_status',0);		
		if($where){
			$this->db->where($where);
		}	
		if($limit){
			$this->db->limit($limit);
		}
		if($order_by){
			$this->db->order_by($order_col, $order_by);
		}	
		if($like){
			$this->db->like($order_col,$like);
		}	
		$query = $this->db->get();
		$result = $query->row();
		return $result; 		
	}

	//---------------------- THIS FUNCTION GET SINGLE COLOUM RECORD FROM THE TABLE DEPENDING ON CONDITIONS ----------------------
	public function coloum_record_one($tabel="",$where="",$field="")		
	{
		$this->db->select('*');
		$this->db->from($tabel);	
		if(!$where){
			$where = $tabel.'_id > 0';
		}	
		$this->db->where($where);	
		$this->db->where(''.$tabel.'_status',0);
		$query = $this->db->get();
		$result = $query->row();
		if($result){
			$output = $result->$field;			
			return $output;  
		}else{
			return;
		}  
	}

	//---------------------- THIS FUNCTION ADD ANY RECORD TO ANY TABLE ON PARAMTERS GIVEN ----------------------
	public function insert_record($tabel,$data) 
	{
		$this->db->insert($tabel,$data);
		return $this->db->insert_id();
	}

	//---------------------- THIS FUNCTION UPDATE ANY RECORD TO ANY TABLE ON PARAMTERS GIVEN ----------------------
	public function update_record($tabel,$data,$where)
	{
		$this->db->where(''.$tabel.'_status',0);			
		$this->db->where($where);			
		$result = $this->db->update($tabel, $data);
		return $result; 
	}


	//======================================================== WILL DECIDE LATE BELOW TRASH -=================================================
	


	public function sum_money($col,$where) 
	{	
		$this->db->select('*');
		$this->db->from('order_items');
		$this->db->where('order_items_status',0);
		if($where){
			$this->db->where($where);
		}
		
		$this->db->select_sum($col);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	public function sum_money_order($col,$where) 
	{	
		$this->db->select('*');
		$this->db->from('orders');
		$this->db->where('orders_status',0);
		if($where){
			$this->db->where($where);
		}
		
		$this->db->select_sum($col);
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
	public function sum_money_tax($tabel="",$col,$date_from,$date_to,$where="")
	{
		$this->db->select('*');
		$this->db->from($tabel);
		$this->db->where(''.$tabel.'_status',0);		
		if($where){
			$this->db->where($where);
		}
		
		$this->db->where('orders_created_date >=', date('Y-m-d H:i:s', strtotime($date_from)));
		$this->db->where('orders_created_date <=', date('Y-m-d H:i:s', strtotime($date_to)));

		$this->db->select_sum($col);
		$query = $this->db->get();
		$result = $query->result();
		return $result; 		
	}

		public function get_list_members($tabel="",$where="")
	{
		$this->db->select('*');
		$this->db->from($tabel);		
		if($where){
			$this->db->where($where);
		}		
		$query = $this->db->get();
		$result = $query->result();
		return $result; 		
	}
	
	public function update_data_member($tabel,$data,$where)
	{			
		$this->db->where($where);			
		$result = $this->db->update($tabel, $data);
		return $result; 
	}		

}