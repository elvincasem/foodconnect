<?php


class Contacts_model extends CI_Model
{
	
	public function get()
	{
		//$result = $this->db->get('contacts');
		$contacts = $this->db->query("SELECT contacts.contactid,contacts.contactname,contacts.telno,contacts.address,contacts.email,a_institution_profile.instname,accounts.accountname,contacts.position,contacts.fax,contacts.website FROM contacts LEFT JOIN a_institution_profile ON contacts.instcode = a_institution_profile.instcode LEFT JOIN accounts ON contacts.accountid = accounts.accountid");
		return $contacts->result_array();
		
		
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