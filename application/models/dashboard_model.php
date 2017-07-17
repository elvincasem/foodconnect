<?php


class Dashboard_model extends CI_Model
{
	
	public function toptengraduate()
	{
		$toptengraduate = $this->db->query("SELECT COUNT(*) AS noofschool,SUM(gradm+gradf) AS totalgraduate, mainprogram FROM b_program WHERE programlevel IN ('40','50','70','80','90') GROUP BY mainprogram ORDER BY totalgraduate DESC LIMIT 10");
		return $toptengraduate->result_array();
	}
	public function toptenenroll()
	{
		$topten = $this->db->query("SELECT COUNT(*) AS noofschool,SUM(newstudm+newstudf+oldstudm+oldstudf+secondm+secondf+thirdm+thirdf+fourthm+fourthf+fifthm+fifthf+sixthm+sixthf+seventhm+seventhf) AS totalenrollment, mainprogram FROM b_program WHERE programlevel IN ('40','50','70','80','90') GROUP BY mainprogram ORDER BY totalenrollment DESC limit 10");
		return $topten->result_array();
	}
	
	public function getcontacttotal()
	{
		$this->db->select('COUNT(*) as totalcontact');
		$this->db->from('contacts');
		return $this->db->get();
	}
	
	public function getinsttotal()
	{
		$this->db->select('COUNT(*) as totalinst');
		$this->db->from('a_institution_profile');
		return $this->db->get();
	}
	
	public function getactiveprograms()
	{
		$this->db->select('COUNT(*) AS programtotal');
		$this->db->from('b_program');
		return $this->db->get();
	}
	
	
	
	public function totalstrongly()
	{
		//$result = $this->db->get('contacts');
		$strongly = $this->db->query("SELECT COUNT(*) AS totalstrong FROM aces_form WHERE satisfied='Strongly Agree'");
		return $strongly;
		
		
	}
	public function totalsatisfied()
	{
		//$result = $this->db->get('contacts');
		$totalsatisfied = $this->db->query("SELECT COUNT(*) AS totalsatisfied FROM aces_form");
		return $totalsatisfied;
		
		
	}
	public function totalagree()
	{
		//$result = $this->db->get('contacts');
		$totalagree = $this->db->query("SELECT COUNT(*) AS totalagree FROM aces_form WHERE satisfied='Agree'");
		return $totalagree;
		
		
	}
	
	public function courteoussa()
	{
		//$result = $this->db->get('contacts');
		$totalstrong = $this->db->query("SELECT COUNT(*) AS totalstrong FROM aces_form WHERE courteous='Strongly Agree'");
		return $totalstrong;
		
		
	}
	
	public function courteousa()
	{
		//$result = $this->db->get('contacts');
		$totalagree = $this->db->query("SELECT COUNT(*) AS totalagree FROM aces_form WHERE courteous='Agree'");
		return $totalagree;
		
		
	}
	
	public function totalpermits()
	{
		//$result = $this->db->get('contacts');
		$totalpermits = $this->db->query("SELECT COUNT(*) AS permitstotal FROM permits_recognition");
		return $totalpermits;
		
		
	}
	
	
	public function discipline()
	{
		$discipline = $this->db->query("SELECT COUNT(*) as total, discipline FROM b_program WHERE discipline!='NONE' and programlevel IN ('40','50','60','70','80','90') GROUP BY discipline ORDER BY  discipline");
		return $discipline->result_array();
	}
	
	public function enrollmentperprovince()
	{
		$enrollmentperprovince = $this->db->query("SELECT SUM(newstudm+oldstudm+secondm+thirdm+fourthm+fifthm+sixthm+seventhm) AS totalmale,SUM(newstudf+oldstudf+secondf+thirdf+fourthf+fifthf+sixthf+seventhf) AS totalfemale,province1 FROM b_program LEFT JOIN a_institution_profile ON b_program.instcode = a_institution_profile.instcode WHERE programlevel IN ('40','50','60','70','80','90') GROUP BY a_institution_profile.province1");
		return $enrollmentperprovince->result_array();
	}
	
	public function get()
	{
		$result = $this->db->get('b_program');
		
		return $result->result_array();
	}
	
	public function getinstname($icode)
	{
			/*get institution name
			$this->db->select('*');
			$this->db->from('a_institution_profile');
			$this->db->where('instcode',$icode);
			//$query = $this->db->get();
			//if ($query->num_rows() > 0) {
			// query returned results
			return $this->db->get();
			//} else {
			// query returned no results
			//	$returnzero = array(array('result'=>'0'));
			//	return $returnzero;
			//}
			*/
		
	}
	public function getprograms($icode)
	{
			/*
			$this->db->select('*');
			$this->db->from('b_program');
			$this->db->where('instcode',$icode);
			$progs = $this->db->get();
			$progs = $this->db->query("SELECT mainprogram,supervisor,major,pstatuscode,authcat,authserial,authyear,(newstudm+oldstudm+secondm+thirdm+fourthm+fifthm+sixthm+seventhm) AS totalmale,(newstudf+oldstudf+secondf+thirdf+fourthf+fifthf+sixthf+seventhf) AS totalfemale FROM b_program where instcode='$icode'");
			return $progs->result_array();
		 */
	}
	public function getdeans($icode)
	{
			/*
			$this->db->select('*');
			$this->db->from('b_program');
			$this->db->where('instcode',$icode);
			$progs = $this->db->get();
			$deans = $this->db->query("SELECT * FROM a_deans where instcode='$icode'");
			return $deans->result_array();
		 */
	}
	
	public function getformernames($icode)
	{
			/*
			$this->db->select('*');
			$this->db->from('b_program');
			$this->db->where('instcode',$icode);
			$progs = $this->db->get(); 
			$formernames = $this->db->query("SELECT * FROM a_formernames where instcode='$icode'");
			return $formernames->result_array();
		*/
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