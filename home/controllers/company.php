<?php
class Company extends CI_Controller {
	
	function Company() {
		parent::__construct();
	}
	
	function index() {
		$where = 'is_del=0';
	
		$this->load->database();
		$sql = "SELECT * FROM company_save_business WHERE ".$where." ORDER BY id desc";
		$query = $this->db->query($sql);
		$save_list = $query->result_array();

		$sql = "SELECT * FROM company_lend_business WHERE ".$where." ORDER BY id desc";
		$query = $this->db->query($sql);
		$lend_list = $query->result_array();
		
		$this->load->helper('url');
		$data['lend_list'] = $lend_list;
		$data['save_list'] = $save_list;
		$this->load->view('/common/header');
		$this->load->view('/company/index', $data);
		$this->load->view('/common/foot');
	}
	
	
	function save_info() {
		$obj_id = $this->uri->segment(3);
		if ($obj_id != '') {
			$this->load->database();
			$sql = "SELECT * FROM company_save_business where id=".$obj_id;
			$query = $this->db->query($sql);
			$obj_info = $query->row_array();
			$data['info'] = $obj_info;
			$this->load->helper('url');
			$this->load->view('/common/header');
			$this->load->view('/company/info',$data);
			$this->load->view('/common/foot');
		}
	}
	
	function lend_info() {
		$obj_id = $this->uri->segment(3);
		if ($obj_id != '') {
			$this->load->database();
			$sql = "SELECT * FROM company_lend_business where id=".$obj_id;
			$query = $this->db->query($sql);
			$obj_info = $query->row_array();
			$data['info'] = $obj_info;
			$this->load->helper('url');
			$this->load->view('/common/header');
			$this->load->view('/company/info',$data);
			$this->load->view('/common/foot');
		}
	}
	
}

?>