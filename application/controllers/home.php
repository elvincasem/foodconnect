<?php

class Home extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('dashboard_model');
		  $this->data = array(
            'title' => 'Welcome',
			'restaurant' => '',
			'review' => '',
			'bestseller' => ''
			);
	}
	
	public function index()
	{
		/*$this->load->helper('url');
		$data['title'] = "Welcome";
		$data['heiclass'] = "";
		$data['heilist'] = "";
		$data['programlist'] = "";
		$data['deanslist'] = "";
		$data['contacts'] = "";
		$data['accounts'] = "";
		$data['programapplication'] = "";
		$data['permits'] = "";*/
		$data = $this->data;
		$this->load->view('inc/header_view');
		
		//$data['totalinstitution'] = $this->dashboard_model->getinsttotal()->row();
		//$data['totalcontacts'] = $this->dashboard_model->getcontacttotal()->row();
		//$data['totalprograms'] = $this->dashboard_model->getactiveprograms()->row();
		//$data['toptenenroll'] = $this->dashboard_model->toptenenroll();
		//$data['toptengraduate'] = $this->dashboard_model->toptengraduate();
		
		//aces dashboard_model
		//$data['totalstrongly'] = $this->dashboard_model->totalstrongly()->row();
		
		//$data['totalagree'] = $this->dashboard_model->getactiveprograms()->row();
		//$data['totalagreelist'] = $this->dashboard_model->totalagree()->row();
		
		//$data['courteoussa'] = $this->dashboard_model->courteoussa()->row();
		//$data['courteousa'] = $this->dashboard_model->courteousa()->row();
		
		//$data['totalpermits'] = $this->dashboard_model->totalpermits()->row();
		//$data['discipline'] = $this->dashboard_model->discipline();
		//$data['enrollmentperprovince'] = $this->dashboard_model->enrollmentperprovince();
		
		$this->load->view('home/home_view',$data);
		$this->load->view('inc/footer_view');
		
	}
	
	
	public function name($productID,$two){
		//$this->load->view('inc/header_view');
		//$productID =  $this->uri->segment(3);
		echo $two;
	}
	
	
}