<?php

class Tags extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('tags_model');
		 $this->data = array(
            'title' => 'Tags Directory',
			'heiclass' => '',
			'heilist' => '',
			'programlist' => '',
			'deanslist' => '',
			'programapplication' => '',
			'accounts' => '',
			'restaurant' => '',
			'bestseller' => '',
			'review' => '',
			'tags' => 'active',
			'permits' => '',
			'scholarship' => '',
			'scholarslist' => '',
			'accreditedhei' => '',
			'scholarshipapplicant' => '',
			'paymentlist' => '',
			'voucherlist' => ''
			);
	}
	
	public function index()
	{
		$data = $this->data;
		$data['page'] = "index";
		$data['details'] =array('instname'=>"Tags Directory") ;
		//$data['contact_list'] = $this->contacts_model->get();
		//$data['hei_list'] = $this->contacts_model->gethei();
		$data['restaurant_list'] = $this->tags_model->getrestaurantdetails();
		$data['restaurants_list'] = $this->tags_model->getrestaurants();
		//$data['update_list'] = $this->restaurant_model->updaterestaurantmodal();
		//print_r($data['details']);
		
		$this->load->view('inc/header_view');
		$this->load->view('tags/tags_view',$data,array('error'=>''));
		$this->load->view('inc/footer_view');
		
	}
	
	public function institution($instcode){
		$data = $this->data;
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
		
	}
	

	
	
}