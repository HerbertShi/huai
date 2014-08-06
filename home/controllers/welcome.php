<?php 
class Welcome extends CI_Controller {

	public function index()
	{
		parent::__construct();
	  		$this->load->database();
  		
  		$where = 'is_del=0';
		$sql = "SELECT id,title FROM news WHERE ".$where." ORDER BY add_time desc LIMIT 5";
		$query = $this->db->query($sql);
		$news = $query->result_array();
		 
		$sql = "SELECT id,title FROM promotion WHERE ".$where." ORDER BY add_time desc LIMIT 5";
		$query = $this->db->query($sql);
		$promotions = $query->result_array();
  		
  		$sql = "SELECT id,title FROM notice WHERE ".$where." ORDER BY add_time desc LIMIT 5";
		$query = $this->db->query($sql);
		$notices = $query->result_array();
		
		$this->load->helper('url');
		$data['news'] = $news;
		$data['promotions'] = $promotions;
		$data['notices'] = $notices;
    	$this->load->view('/index/index',$data);
    	$this->load->view('/common/foot');
  	}
  	
	public function show(){
		$this->load->helper('url');
		$this->load->view('index/Public_top');
		$this->load->view('index/show');
	}
	
	public function faq(){
		$this->load->helper('url');
    	$data['server_info'] = $server_info;
		$this->load->view('index/Public_top');
		$this->load->view('index/faq');
	}
}

?>
