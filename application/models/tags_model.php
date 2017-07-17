<?php


class Tags_model extends CI_Model
{
	
	public function getrestaurantdetails()
	{
		//$result = $this->db->get('contacts');
		$result = $this->db->query("SELECT * FROM tblrestaurant, tbltype WHERE tblrestaurant.rid = tbltype.rid");
		return $result->result_array();
	}
	
	public function getrestaurants()
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