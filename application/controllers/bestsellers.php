<?php

class Bestsellers extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('bestsellers_model');
		 $this->data = array(
            'title' => 'Bestseller Directory',
			'heiclass' => '',
			'heilist' => '',
			'programlist' => '',
			'deanslist' => '',
			'programapplication' => '',
			'accounts' => '',
			'bestseller' => 'active',
			'restaurant' => '',
			'review' => '',
			'tags' => '',
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
		$data['details'] =array('instname'=>"Bestseller Directory") ;
		//$data['contact_list'] = $this->contacts_model->get();
		//$data['hei_list'] = $this->contacts_model->gethei();
		$data['bestsellers_list'] = $this->bestsellers_model->getdishdetails();
		$data['restaurant_list'] = $this->bestsellers_model->getrestaurantdetails();
		//print_r($data['details']);
		
		$this->load->view('inc/header_view');
		$this->load->view('bestsellers/bestsellers_view',$data);
		$this->load->view('inc/footer_view');
		
	}
	
	
	
	
	
	public function upload(){
		
		if ( ! empty($_FILES)){
			
			$config['upload_path'] = "./assets/uploads";
			$config['allowed_types'] = 'jpg|jpeg|svg|png|gif';
			
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload("dishphoto")){
				echo "File cannot be uploaded";
			}

		}else{
				$this->listFiles();
		}
		
		
	}
	
	private function listFiles(){
		
		$this->load->helper('file');
		$files = get_filenames("./assets/uploads");
		echo json_encode($files);
		
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