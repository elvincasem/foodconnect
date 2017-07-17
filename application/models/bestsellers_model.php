<?php


class Bestsellers_model extends CI_Model
{
	
	public function getdishdetails()
	{
		//$result = $this->db->get('contacts');
		$result = $this->db->query("SELECT * FROM tblrestaurant, tblbestsellers WHERE tblrestaurant.rid = tblbestsellers.rid");
		return $result->result_array();
	}
	
	public function getrestaurantdetails()
	{
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