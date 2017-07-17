<?php


class Review_model extends CI_Model
{
	
	public function getreview()
	{
		//$result = $this->db->get('contacts');
		$result = $this->db->query("SELECT * FROM tblreviews, tblrestaurant WHERE tblreviews.rid = tblrestaurant.rid");
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