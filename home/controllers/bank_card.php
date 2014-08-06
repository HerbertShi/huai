<?php
class Bank_card extends CI_Controller {
	
	function bank_card() {
		parent::__construct();
	}
	
	function index() {
		
		$where = 'is_del=0';
		$this->load->database();
		$sql = "SELECT * FROM bank_card WHERE ".$where." ORDER BY id desc";
		$query = $this->db->query($sql);
		$bankcard_list = $query->result_array();
		
		$this->load->helper('url');
		$config['base_url'] = site_url('/bank_card/index/');
		 
		$data['bankcard_list'] = $bankcard_list;
		$this->load->view('/common/header');
		$this->load->view('/bank_card/index', $data);
		$this->load->view('/common/foot');
	}
	
	function item_info() {
		$obj_id = $this->uri->segment(3);
		$this->load->view('/common/header');
		if ($obj_id != '') {
			$this->load->database();
			$sql = "SELECT * FROM bank_card where id=".$obj_id;
			$query = $this->db->query($sql);
			$obj_info = $query->row_array();
			$data['obj_info'] = $obj_info;
			$this->load->helper('url');
			$this->load->view('/common/header');
			$this->load->view('/bank_card/item_info',$data);
			$this->load->view('/common/foot');
		}
	}
	
	
}

?>