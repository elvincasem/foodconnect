<?php

class Restaurant extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('restaurant_model');
		 $this->data = array(
            'title' => 'Restaurant Directory',
			'heiclass' => '',
			'heilist' => '',
			'programlist' => '',
			'deanslist' => '',
			'programapplication' => '',
			'accounts' => '',
			'restaurant' => 'active',
			'bestseller' => '',
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
		$data['details'] =array('instname'=>"Restaurant Directory") ;
		//$data['contact_list'] = $this->contacts_model->get();
		//$data['hei_list'] = $this->contacts_model->gethei();
		$data['account_list'] = $this->restaurant_model->getdetails();
		//$data['update_list'] = $this->restaurant_model->updaterestaurantmodal();
		//print_r($data['details']);
		
		$this->load->view('inc/header_view');
		$this->load->view('restaurant/restaurant_view',$data,array('error'=>''));
		$this->load->view('inc/footer_view');
		
	}
	
	public function upload(){
		
		if ( ! empty($_FILES)){
			
			$config['upload_path'] = "./assets/uploads";
			$config['allowed_types'] = 'jpg|jpeg|svg|png|gif';
			
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload("reslogo")){
				echo "File cannot be uploaded";
			}
			
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload("rescoverphoto")){
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
	
	/*
	public function upload(){
		
		if ( ! empty($_FILES)){
			
			$config['upload_path'] = "./assets/uploads";
			$config['allowed_types'] = 'jpg|jpeg|svg|png|gif';
			
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload("file")){
				echo "File cannot be uploaded";
			}
			
		}elseif($this->input->post('file_to_remove')){
			$file_to_remove = $this->input->post('file_to_remove');
			unlink("./assets/uploads/" . $file_to_remove);
		}else{
				$this->listFiles();
		}
		
		
	}
	
	private function listFiles(){
		
		$this->load->helper('file');
		$files = get_filenames("./assets/uploads");
		echo json_encode($files);
		
	}
	*/
	
	
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