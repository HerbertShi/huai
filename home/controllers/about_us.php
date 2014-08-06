<?php
class About_Us extends CI_Controller {
	public $nav_list = array();
	
	function about_us() {
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$where = 'is_del=0';
		$sql = "SELECT id,title FROM about_bank WHERE ".$where." ORDER BY id desc";
		$query = $this->db->query($sql);
	 	$about_list = $query->result_array();
	 	foreach ($about_list as $key=>$item){
			$about_list[$key]['url']= site_url('/about_us/index/id/'.$item['id']);		
	 	}
	 	$this->nav_list = $about_list;
	}
	
	function index() {
		$cur_id = $this->uri->segment(4);
		 
		if ($cur_id == "" || !is_numeric($cur_id)) {
			$cur_id = 1;
		}
		
		$sql = "SELECT * FROM about_bank WHERE id=".$cur_id;
		$query = $this->db->query($sql);
	 	$info = $query->row_array();
		$data['info'] = $info;
		$data['cur_id'] = $cur_id;
		$data['nav_list'] = $this->nav_list;
		$this->load->view('/common/header');
		$this->load->view('/about/index', $data);
		$this->load->view('/common/foot');
	}
	
	function job_info() {
		$sql = "SELECT * FROM invite_position where id=".$obj_id;
		$query = $this->db->query($sql);
		$obj_info = $query->row_array();
		$data['obj_info'] = $obj_info;
		$data['nav_list'] = $this->nav_list;
		$this->load->view('/about/job_info',$data);
		$this->load->view('/common/foot');
	}
	
	function bank_site() {
		$data['nav_list'] = $this->nav_list;
		$this->load->view('/about/bank_site',$data);
		$this->load->view('/common/foot');
	}
	
	function notice_info() {
		$obj_id = $this->uri->segment(3);
		$this->load->view('/common/header');
		if ($obj_id != '') {
			$sql = "SELECT * FROM invite_notice where id=".$obj_id;
			$query = $this->db->query($sql);
			$obj_info = $query->row_array();
			$data['obj_info'] = $obj_info;
			$data['nav_list'] = $this->nav_list;
			$this->load->view('/about/item_info',$data);
			$this->load->view('/common/foot');
		}
	}
	
	function hire() {
		$where = 'is_del=0';
		$sql = "SELECT * FROM invite_position WHERE ".$where." ORDER BY id desc";
		$query = $this->db->query($sql);
	 	$position_list = $query->result_array();
	 	
	 	$sql = "SELECT * FROM invite_notice WHERE ".$where." ORDER BY id desc";
		$query = $this->db->query($sql);
	 	$notice_list = $query->result_array();
	 	$data['nav_list'] = $this->nav_list;
		$this->load->view('/common/header');
		$this->load->view('/about/item_info',$data);
		$this->load->view('/common/foot');
	}
	
}

?>