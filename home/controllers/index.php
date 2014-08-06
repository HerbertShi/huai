<?php 
class Index extends CI_Controller{
	function Index(){  
		parent::__construct();
  	}  

  	public function mobile_bank(){
		$this->load->helper('url');
		$this->load->view('/common/header');
    	$this->load->view('/mobile-bank/index');
    	$this->load->view('/common/foot');
  	}
  	
	public function show(){
		$this->load->helper('url');
		$this->load->view('/common/header');
		$this->load->view('index/show');
	}
	
	public function faq(){
		$this->load->helper('url');
    	$data['server_info'] = $server_info;
		$this->load->view('/common/header');
		$this->load->view('index/faq');
	}
	
	public function ir(){
		$this->load->helper('url');
		$this->load->view('/common/header');
		$this->load->view('index/ir');
		$this->load->view('/common/foot');
	}
}

?>