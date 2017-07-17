<?php


class Restaurant_model extends CI_Model
{
	
	public function getdetails()
	{
		//$result = $this->db->get('contacts');
		$result = $this->db->query("SELECT * FROM tblrestaurant");
		return $result->result_array();
	}
	
	
	
	
	public function insert()
	{
			
	}
	
	public function update()
	{
		
	}
	
	public function delete()
	{
		
	}
}

?>