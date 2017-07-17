<?php

class Functions extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('functions_model');
		 
	}

///////////////////////////////////////////////////////////////NEW CODE///////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////NEW CODE///////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////NEW CODE///////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////NEW CODE///////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////NEW CODE///////////////////////////////////////////////////////////
	
	//save restaurant details
	public function saverestaurant(){
		
		$restaurantname = $this->input->post('restaurantname');
		$street = $this->input->post('street');
		$barangay = $this->input->post('barangay');
		$municipality = $this->input->post('municipality');
		$contact = $this->input->post('contact');
		$email = $this->input->post('email');
		$shdayfrom = $this->input->post('shdayfrom');
		$shdayto = $this->input->post('shdayto');
		$shtimefrom = $this->input->post('shtimefrom');
		$shtimeto = $this->input->post('shtimeto');
		$logo = $this->input->post('logo');
		$coverphoto = $this->input->post('coverphoto');
		
		$sql = "INSERT INTO tblrestaurant (restaurantname,street,barangay,municipality,contact,email,storehoursfromday,storehourstoday,storehoursfromtime,storehourstotime,logo,coverphoto) VALUES (".$this->db->escape($restaurantname).", ".$this->db->escape($street).", ".$this->db->escape($barangay).", ".$this->db->escape($municipality).", ".$this->db->escape($contact).", ".$this->db->escape($email).", ".$this->db->escape($shdayfrom).", ".$this->db->escape($shdayto).", ".$this->db->escape($shtimefrom).", ".$this->db->escape($shtimeto).", ".$this->db->escape($logo).", ".$this->db->escape($coverphoto).")";
		$this->db->query($sql);
		//echo $sql;
		echo $this->db->affected_rows();
		
	}
	
	//save dish
	public function savedish(){
		
		$rid = $this->input->post('rid');
		$dishname = $this->input->post('dishname');
		$price = $this->input->post('price');
		$description = $this->input->post('description');
		$image = $this->input->post('image');
		
		$sql = "INSERT INTO tblbestsellers (rid,dishname,price,dishdescription,dishphoto) VALUES (".$this->db->escape($rid).", ".$this->db->escape($dishname).", ".$this->db->escape($price).", ".$this->db->escape($description).", ".$this->db->escape($image).")";
		$this->db->query($sql);
		//echo $sql;
		echo $this->db->affected_rows();
		
	}
	
	public function savetype(){
		
		$rid = $this->input->post('rid');
		$type = $this->input->post('type');
		
		$sql = "INSERT INTO tbltype (rid,type) VALUES (".$this->db->escape($rid).", ".$this->db->escape($type).")";
		$this->db->query($sql);
		//echo $sql;
		echo $this->db->affected_rows();
		
	}
	
	public function deleterestaurant($rid){

		$sql = "DELETE from tblrestaurant where rid='".$rid."'";
		$this->db->query($sql);
		echo $this->db->affected_rows();
	}
	
	public function deletedish($bsid){

		$sql = "DELETE from tblbestsellers where bsid='".$bsid."'";
		$this->db->query($sql);
		echo $this->db->affected_rows();
	}
	
	public function deletereview($reviewid){

		$sql = "DELETE from tblreviews where reviewid='".$reviewid."'";
		$this->db->query($sql);
		echo $this->db->affected_rows();
	}
	
	public function deletetype($typeid){

		$sql = "DELETE from tbltype where typeid='".$typeid."'";
		$this->db->query($sql);
		echo $this->db->affected_rows();
	}
	
	
	public function updaterestaurantmodal($rid)
	{
		//$result = $this->db->get('contacts');
		$result = $this->db->query("SELECT * FROM tblrestaurant WHERE rid= $rid");
		$resultarray = $result->result_array();
		echo json_encode($resultarray[0]);
	}
	
	public function updaterestaurant(){
		
		$rid = $this->input->post('rid');
		$restaurantname = $this->input->post('restaurantname');
		$street = $this->input->post('street');
		$barangay = $this->input->post('barangay');
		$municipality = $this->input->post('municipality');
		$email = $this->input->post('email');
		$contact = $this->input->post('contact');
		$storehoursfromday = $this->input->post('shdayfrom');
		$storehourstoday = $this->input->post('shdayto');
		$storehoursfromtime = $this->input->post('shtimefrom');
		$storehourstotime = $this->input->post('shtimeto');
		$logo = $this->input->post('logo');
		$coverphoto = $this->input->post('coverphoto');
		
		$sql = "UPDATE tblrestaurant SET restaurantname=".$this->db->escape($restaurantname)." ,street=".$this->db->escape($street)." ,barangay=".$this->db->escape($barangay)." ,municipality=".$this->db->escape($municipality)." ,email=".$this->db->escape($email)." ,contact=".$this->db->escape($contact)." ,storehoursfromday=".$this->db->escape($storehoursfromday)." ,storehourstoday=".$this->db->escape($storehourstoday)." ,storehoursfromtime=".$this->db->escape($storehoursfromtime)." ,storehourstotime=".$this->db->escape($storehourstotime)." ,logo=".$this->db->escape($logo)." ,coverphoto=".$this->db->escape($coverphoto)." where rid=".$this->db->escape($rid)."";

		$this->db->query($sql);
		echo $sql;
		
	}
	
	public function updatedishmodal($bsid)
	{
		//$result = $this->db->get('contacts');
		$result = $this->db->query("SELECT * FROM tblbestsellers, tblrestaurant WHERE tblbestsellers.rid = tblrestaurant.rid AND bsid= $bsid");
		$resultarray = $result->result_array();
		echo json_encode($resultarray[0]);
	}
	
	public function updatedish(){
		
		$bsid = $this->input->post('bsid');
		$rid = $this->input->post('rid');
		$dishname = $this->input->post('dishname');
		$price = $this->input->post('price');
		$photo = $this->input->post('photo');
		$description = $this->input->post('description');
		
		$sql = "UPDATE tblbestsellers SET rid=".$this->db->escape($rid)." ,dishname=".$this->db->escape($dishname)." ,price=".$this->db->escape($price)." ,dishphoto=".$this->db->escape($photo)." ,dishdescription=".$this->db->escape($description)." WHERE bsid=".$this->db->escape($bsid)."";

		$this->db->query($sql);
		echo $sql;
		
	}
	
///////////////////////////////////////////////////////////////NEW CODE///////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////NEW CODE///////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////NEW CODE///////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////NEW CODE///////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////NEW CODE///////////////////////////////////////////////////////////


	
	//save contact from hei details
	public function savecontact(){
		
		$instcode = $this->input->post('instcode');
		$contactname = $this->input->post('contactname');
		$position = $this->input->post('position');
		$email = $this->input->post('email');
		$telno = $this->input->post('telno');
		$address = $this->input->post('address');
		
		$sql = "INSERT INTO contacts (contactname,telno,position,address,email,instcode) VALUES (".$this->db->escape($contactname).", ".$this->db->escape($telno).", ".$this->db->escape($position).", ".$this->db->escape($address).", ".$this->db->escape($email).", ".$this->db->escape($instcode).")";
		$this->db->query($sql);
		echo $this->db->affected_rows();
		
	}
	
	public function saveaccount(){
		
		//$instcode = $this->input->post('instcode');
		$accountname = $this->input->post('accountname');
		$email = $this->input->post('email');
		$telno = $this->input->post('telno');
		$address = $this->input->post('address');
		
		$sql = "INSERT INTO accounts (accountname,address,telno,email) VALUES (".$this->db->escape($accountname).", ".$this->db->escape($address).", ".$this->db->escape($telno).", ".$this->db->escape($email).")";
		$this->db->query($sql);
		echo $this->db->affected_rows();
		
	}
	
	public function deleteaccount($accountid){

		$sql = "DELETE from accounts where accountid='".$accountid."'";
		$this->db->query($sql);
		
	}
	
	//save contact from Contacts Menu
	public function savesinglecontact(){
		
		$instcode = $this->input->post('instcode');
		$accountid = $this->input->post('accountid');
		$contactname = $this->input->post('contactname');
		$email = $this->input->post('email');
		$telno = $this->input->post('telno');
		$address = $this->input->post('address');
		$position = $this->input->post('position');
		$fax = $this->input->post('fax');
		$website = $this->input->post('website');
		
		$sql = "INSERT INTO contacts (contactname,telno,address,email,instcode,accountid,position,fax,website) VALUES (".$this->db->escape($contactname).", ".$this->db->escape($telno).", ".$this->db->escape($address).", ".$this->db->escape($email).", ".$this->db->escape($instcode).", ".$this->db->escape($accountid).", ".$this->db->escape($position).", ".$this->db->escape($fax).", ".$this->db->escape($website).")";
		$this->db->query($sql);
		echo $sql;
		//echo $this->db->affected_rows();
		
	}
	
	public function deletecontact($contactid){

		$sql = "DELETE from contacts where contactid='".$contactid."'";
		$this->db->query($sql);
		echo $this->db->affected_rows();
	}
	
	public function generatepermitno(){

		$spcode = $this->input->post('specialpermit');	
		//$result = $this->db->get('contacts');
		$lastpermitno = $this->db->query("SELECT * FROM permits_recognition where specialpermit='$spcode' order by permitno desc");
		$permitarray = $lastpermitno->result_array();
		echo intval($permitarray[0]['permitno']);
		
		
	
	}
	
	public function savepermits(){
		
		$instcode = $this->input->post('instcode');
		$permitdate = $this->input->post('permitdate');
		$programname = $this->input->post('programname');
		$specialpermit = $this->input->post('specialpermit');
		$permitno = $this->input->post('permitno');
		$seriesyear = $this->input->post('seriesyear');
		$effectivitydate = $this->input->post('effectivitydate');
		$programlevel = $this->input->post('programlevel');
		
		
		$sql = "INSERT INTO permits_recognition (instcode,permitdate,programname,specialpermit,permitno,seriesyear,effectivitydate,programlevel) VALUES (".$this->db->escape($instcode).", ".$this->db->escape($permitdate).", ".$this->db->escape($programname).", ".$this->db->escape($specialpermit).", ".$this->db->escape($permitno).", ".$this->db->escape($seriesyear).", ".$this->db->escape($effectivitydate).", ".$this->db->escape($programlevel).")";
		$this->db->query($sql);
		echo $this->db->affected_rows();
		
	}
	
	public function savecoordinates($instcode){
		
		//$instcode = $this->input->post('instcode');
		$latitude = $this->input->post('latitude');
		$longtitude = $this->input->post('longtitude');
		//$instcode =$this->input->post('instcode');
		
		$sql = "update a_institution_profile set latitude=".$this->db->escape($latitude)." ,longtitude=".$this->db->escape($longtitude)." where instcode=".$this->db->escape($instcode)."";

		$this->db->query($sql);
		
		echo $sql;
		//echo $this->db->affected_rows();
		
	}
	
	public function saveheiinfo($instcode){
		
		//$instcode = $this->input->post('instcode');
		//$latitude = $this->input->post('latitude');
		//$longtitude = $this->input->post('longtitude');
		$heitype =$this->input->post('heitype');
		$province2 =$this->input->post('province2');
		
		$sql = "update a_institution_profile set heitype=".$this->db->escape($heitype).", province2=".$this->db->escape($province2)." where instcode=".$this->db->escape($instcode)."";

		$this->db->query($sql);
		
		//echo $sql;
		//echo $this->db->affected_rows();
		
	}
	public function savesupervisorprogram($programid){
		
		
		$supervisor =$this->input->post('supervisor');
		
		$sql = "update b_program set supervisor=".$this->db->escape($supervisor)." where programid=".$this->db->escape($programid)."";

		$this->db->query($sql);
		
		echo $sql;
		//echo $this->db->affected_rows();
		
	}
	
	public function getprograminfo($programid){

		//$spcode = $this->input->post('specialpermit');	
		//$result = $this->db->get('contacts');
		$programinfo = $this->db->query("SELECT * FROM b_program where programid='$programid'");
		$programinfoarray = $programinfo->result_array();
		echo json_encode($programinfoarray[0]);
		//echo intval($permitarray[0]['permitno']);
	
	

	}
	
	public function updateprogram($programid){
		
		
		$supervisor =$this->input->post('supervisor');
		$discipline =$this->input->post('discipline');
		$discipline2 =$this->input->post('discipline2');
		
		$sql = "update b_program set supervisor=".$this->db->escape($supervisor).", discipline=".$this->db->escape($discipline).",discipline2=".$this->db->escape($discipline2)." where programid=".$this->db->escape($programid)."";

		$this->db->query($sql);
		
		echo $sql;
		//echo $this->db->affected_rows();
		
	}
	
	
	public function savesingleapplicant(){
		
		
		$this->load->library('session');
		$this->session;
		$uid = $this->session->userdata('uid');
		$lastname = $this->input->post('lastname');
		$firstname = $this->input->post('firstname');
		$middlename = $this->input->post('middlename');
		$dateofbirth = $this->input->post('dateofbirth');
		$placeofbirth = $this->input->post('placeofbirth');
		$gender = $this->input->post('gender');
		$civilstatus = $this->input->post('civilstatus');
		$citizenship = $this->input->post('citizenship');
		$contactno = $this->input->post('contactno');
		$email = $this->input->post('email');
		$extension = $this->input->post('extension');
		$barangay = $this->input->post('barangay');
		$towncity = $this->input->post('towncity');
		$province = $this->input->post('province');
		$zipcode = $this->input->post('zipcode');
		$congressionaldistrict = $this->input->post('congressionaldistrict');
		$heicode = $this->input->post('heicode');
		$course = $this->input->post('course');
		$father = $this->input->post('father');
		$foccupation = $this->input->post('foccupation');
		$mother = $this->input->post('mother');
		$moccupation = $this->input->post('moccupation');
		$siblingno = $this->input->post('siblingno');
		$disability = $this->input->post('disability');
		$yearofapplication = $this->input->post('yearofapplication');
		
		$sql = "INSERT INTO scholarship_applicant(lastname,firstname,middlename,extension,gender,barangay,towncity,province,zipcode,dateofbirth,placeofbirth,civilstatus,citizenship,congressionaldistrict,hei,course,contactno,email,father,foccupation,mother,moccupation,siblingno,disability,yearapplied,addedbyuid) VALUES (".$this->db->escape($lastname).", ".$this->db->escape($firstname).", ".$this->db->escape($middlename).", ".$this->db->escape($extension).", ".$this->db->escape($gender).", ".$this->db->escape($barangay).", ".$this->db->escape($towncity).", ".$this->db->escape($province).", ".$this->db->escape($zipcode).", ".$this->db->escape($dateofbirth).", ".$this->db->escape($placeofbirth).", ".$this->db->escape($civilstatus).", ".$this->db->escape($citizenship).", ".$this->db->escape($congressionaldistrict).", ".$this->db->escape($heicode).", ".$this->db->escape($course).", ".$this->db->escape($contactno).", ".$this->db->escape($email).", ".$this->db->escape($father).", ".$this->db->escape($foccupation).", ".$this->db->escape($mother).", ".$this->db->escape($moccupation).", ".$this->db->escape($siblingno).", ".$this->db->escape($disability).", ".$this->db->escape($yearofapplication).", ".$this->db->escape($uid).")";
		$this->db->query($sql);
		echo $sql;
		//echo $this->db->affected_rows();
		
	}
	public function deleteapplicant($applicantid){

		$sql = "DELETE from scholarship_applicant where applicantid='".$applicantid."'";
		$this->db->query($sql);
		echo $this->db->affected_rows();
	}
	
	public function savepayment($scholarid){
		
		
		$semester =$this->input->post('semester');
		$schoolyear =$this->input->post('schoolyear');
		$checkno =$this->input->post('checkno');
		$paymentdate =$this->input->post('paymentdate');
		$fundcluster =$this->input->post('fundcluster');
		$amount =$this->input->post('amount');
		$remarks =$this->input->post('remarks');
		$cy =$this->input->post('cy');
		$status =$this->input->post('status');
		
		$sql = "INSERT INTO scholarship_payment (scholarid,semester,schoolyear,paymentdate,fundcluster,checkno,amount,remarks,cy,status) VALUES (".$this->db->escape($scholarid).", ".$this->db->escape($semester).", ".$this->db->escape($schoolyear).", ".$this->db->escape($paymentdate).", ".$this->db->escape($fundcluster).", ".$this->db->escape($checkno).", ".$this->db->escape($amount).", ".$this->db->escape($remarks).", ".$this->db->escape($cy).", ".$this->db->escape($status).")";
		$this->db->query($sql);
		echo $this->db->affected_rows();
		//echo $this->db->affected_rows();
		
	}
	
	public function getpaymentinfo($spaymentid){

		//$spcode = $this->input->post('specialpermit');	
		//$result = $this->db->get('contacts');
		$paymentinfo = $this->db->query("SELECT * FROM scholarship_payment where spaymentid='$spaymentid'");
		$paymentinfoarray = $paymentinfo->result_array();
		echo json_encode($paymentinfoarray[0]);
		//echo intval($permitarray[0]['permitno']);
	
	

	}
	
	public function updatepayment($spaymentid){
		
		
		$semester =$this->input->post('semester');
		$schoolyear =$this->input->post('schoolyear');
		$checkno =$this->input->post('checkno');
		$amount =$this->input->post('amount');
		$remarks =$this->input->post('remarks');
		$cy =$this->input->post('cy');
		$status =$this->input->post('status');
		
		$details="Updated Status to ".$status;
		//$details+="Updated Schoolyear to $semester";
		//$details+="Updated Checkno to $semester";
		//$details+="Updated amount to $semester";
		//$details+="Updated remarks to $semester";
		
		
		//updatelog
		$sql2 = "INSERT INTO scholarship_payment_log (uid,spaymentid,details) VALUES ('1', ".$this->db->escape($spaymentid).", '$details')";

		$this->db->query($sql2);
		
		
		$sql = "update scholarship_payment set semester=".$this->db->escape($semester).", schoolyear=".$this->db->escape($schoolyear).",checkno=".$this->db->escape($checkno).", amount=".$this->db->escape($amount).", remarks=".$this->db->escape($remarks).", cy=".$this->db->escape($cy).", status=".$this->db->escape($status)." where spaymentid=".$this->db->escape($spaymentid)."";

		$this->db->query($sql);
		
		echo $sql;
		//echo $this->db->affected_rows();
		
	}
	
	public function permitsxls(){
		$this->load->library('excel');
		$this->excel->setActiveSheetIndex(0);
		$this->excel->getActiveSheet()->setTitle('Permit List');
		$this->load->model('permitsrecognition_model');
		$permit_list = $this->permitsrecognition_model->getxls();
		
		$this->excel->getActiveSheet()->fromArray($permit_list);
		$filename='permit_list.xls';
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		 $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5'); 
		 $objWriter->save('php://output');
		
	

	}
	
	public function savevoucher($scholarid){
		
		
		
		$fundcluster =$this->input->post('fundcluster');
		$voucherdate =$this->input->post('voucherdate');
		$dvno =$this->input->post('dvno');
		$modeofpayment =$this->input->post('modeofpayment');
		$orsno =$this->input->post('orsno');
		$vouchersemester =$this->input->post('vouchersemester');
		$voucherschoolyear =$this->input->post('voucherschoolyear');
		//$particulars =$this->input->post('particulars');
		$responsibility =$this->input->post('responsibility');
		$mfopap =$this->input->post('mfopap');
		$voucheramount =$this->input->post('voucheramount');
		$certifiedcash =$this->input->post('certifiedcash');
		$certifiedsubject =$this->input->post('certifiedsubject');
		$certifiedsupporting =$this->input->post('certifiedsupporting');
		$currentbatch =$this->input->post('currentbatch');
		
		
		$sql = "INSERT INTO scholarship_voucher (fundcluster,voucherdate,dvno,modeofpayment,scholarid,orsno,vouchersemester,vouchersy,responsibility,mfopap,amount,certifiedcash,certifiedsubject,certifiedsupporting,batch) VALUES (".$this->db->escape($fundcluster).", ".$this->db->escape($voucherdate).", ".$this->db->escape($dvno).", ".$this->db->escape($modeofpayment).", ".$this->db->escape($scholarid).", ".$this->db->escape($orsno).", ".$this->db->escape($vouchersemester).", ".$this->db->escape($voucherschoolyear).", ".$this->db->escape($responsibility).", ".$this->db->escape($mfopap).", ".$this->db->escape($voucheramount).", ".$this->db->escape($certifiedcash).", ".$this->db->escape($certifiedsubject).", ".$this->db->escape($certifiedsupporting).", ".$this->db->escape($currentbatch).")";
		$this->db->query($sql);
		//echo $sql;
		//echo $this->db->affected_rows();
		//echo $this->db->affected_rows();
		
		$voucherinfo = $this->db->query("SELECT MAX(voucherid) as lastid FROM scholarship_voucher where dvno='$dvno'");
		$voucherinfoarray = $voucherinfo->result_array();
		echo json_encode($voucherinfoarray[0]);
		
	}
	
	public function saveentry($dvno){
		
		
		
		
		$accounttitle2 =$this->input->post('accounttitle');
		if($accounttitle2 == "regular"){
			$accounttitle = "Cash - MDS, Regular Account";
			$uacscode = "1010404000";
		}if($accounttitle2 == "special"){
			$accounttitle = "Cash - MDS, Special Account";
			$uacscode = "1010405000";
		}if($accounttitle2 == "lcca"){
			$accounttitle = "Cash in Bank - LCCA - LBP";
			$uacscode = "1010202024";
		}
		//$uacscode =$this->input->post('uacscode');
		$columnentry =$this->input->post('columnentry');
		$accountentryamount =$this->input->post('accountentryamount');
		$voucherid =$this->input->post('voucherid');
		
		$sql2 = "INSERT INTO scholarship_voucher_b (voucherid,dvno,accounttitle,uacscode,columnentry,amount) VALUES (".$this->db->escape($voucherid).", ".$this->db->escape($dvno).", ".$this->db->escape("Donations").", ".$this->db->escape("5029908000").", ".$this->db->escape("Debit").", ".$this->db->escape($accountentryamount).")";
		$this->db->query($sql2);
		
		$sql = "INSERT INTO scholarship_voucher_b (voucherid,dvno,accounttitle,uacscode,columnentry,amount) VALUES (".$this->db->escape($voucherid).", ".$this->db->escape($dvno).", ".$this->db->escape($accounttitle).", ".$this->db->escape($uacscode).", ".$this->db->escape($columnentry).", ".$this->db->escape($accountentryamount).")";
		$this->db->query($sql);
		
		
		
		//echo $sql;
		//echo $this->db->affected_rows();
		//echo $this->db->affected_rows();
		//$voucherinfo = $this->db->query("SELECT MAX(voucherid) as lastid FROM scholarship_voucher");
		//$voucherinfoarray = $voucherinfo->result_array();
		//echo json_encode($voucherinfoarray[0]);
		
	}
	
	public function getentrydetails($dvno){

		//$spcode = $this->input->post('specialpermit');	
		//$result = $this->db->get('contacts');
		$entrycount = $this->db->query("SELECT count(*) as numberofentry FROM scholarship_voucher_b where dvno='$dvno'");
		$entrycountarray = $entrycount->result_array();
		echo json_encode($entrycountarray[0]);
		//echo intval($permitarray[0]['permitno']);
	
	

	}
	
	
	public function getscholarfiltered($typecode){

		$studentfiltered = $this->db->query("SELECT scholarship_studentprofile.scholarid,CONCAT(firstname,' ',lastname) AS fullname FROM scholarship_studentprofile LEFT JOIN scholarship_award_student ON scholarship_studentprofile.scholarid = scholarship_award_student.scholarid WHERE typecode='$typecode'");
		//return $studentfiltered->result_array();
		
		echo json_encode($studentfiltered->result_array());
		//echo intval($permitarray[0]['permitno']);
	
	

	}
	
		public function getscholarfullname($scholarid)
	{
		//$result = $this->db->get('contacts');
		$scholarfullname = $this->db->query("SELECT CONCAT(firstname,' ',lastname) AS fullname FROM scholarship_studentprofile where scholarid='$scholarid'");
		echo json_encode($scholarfullname->result_array());
		//print_r($scholarfullname);
		
		
		
	}
	
	
	
	
	public function index()
	{
		/*$data = $this->data;
		$data['page'] = "index";
		$data['details'] =array('instname'=>"Higher Education Institution Directory") ;
		$data['heidirectory'] = $this->heidirectory_model->get();
		//print_r($data['details']);
		
		
		
		$this->load->view('inc/header_view');
		$this->load->view('heidirectory/heidirectory_view',$data);
		$this->load->view('inc/footer_view');
		*/
	}
	
	
	public function institution($instcode){
		/*$data = $this->data;
		$data['page'] = "institution";
		$data['details'] = $this->heidirectory_model->getinstname($instcode)->row();
		
		//if($data['details']->result=='0'){
			//echo 'none';
		//}else{
			$data['programs'] = $this->heidirectory_model->getprograms($instcode);
			$data['deans'] = $this->heidirectory_model->getdeans($instcode);
			$data['formernames'] = $this->heidirectory_model->getformernames($instcode);
			
			
			//$data['subnavtitle'] = $data['instname'];
			//$data['heidirectory'] = $result->result();
			
			$this->load->view('inc/header_view');
			$this->load->view('heidirectory/heidirectorydetails_view',$data);
			$this->load->view('heidirectory/mapheader_view');
			$this->load->view('inc/footer_view');
			//print_r($data);
		//}
		*/
	}
	

	
	
}