<?php


class Programapplication_model extends CI_Model
{
	
	
	public function get()
	{
		//$result = $this->db->get('contacts');
		$permits = $this->db->query("SELECT permitid,permitdate,a_institution_profile.instcode,a_institution_profile.instname,programname,specialpermit,permitno,seriesyear,effectivitydate FROM permits_recognition LEFT JOIN a_institution_profile ON permits_recognition.instcode = a_institution_profile.instcode");
		return $permits->result_array();
		
		
	}
	
	public function gethei()
	{
		//$result = $this->db->get('contacts');
		$heilist = $this->db->query("SELECT * FROM a_institution_profile");
		return $heilist->result_array();
		
		
	}
	
	public function getaccount()
	{
		//$result = $this->db->get('contacts');
		$account = $this->db->query("SELECT * FROM accounts");
		return $account->result_array();
		
		
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