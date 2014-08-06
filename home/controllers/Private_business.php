<?php
class Private_business extends CI_Controller {
	
	function private_business() {
		parent::__construct();
	}
	
	function index() {
		$where = 'is_del=0';
		$this->load->database();
		$sql = "SELECT * FROM private_save_business WHERE ".$where." ORDER BY id desc";
		$query = $this->db->query($sql);
		$save_list = $query->result_array();

		$sql = "SELECT * FROM private_lend_business WHERE ".$where." ORDER BY id desc";
		$query = $this->db->query($sql);
		$lend_list = $query->result_array();
		 
		$this->load->helper('url');
		$data['save_list'] = $save_list;
		$data['lend_list'] = $lend_list;
		$this->load->view('/common/header');
		$this->load->view('/private/index', $data);
		$this->load->view('/common/foot');
	}
	
	function save_info() {
		$obj_id = $this->uri->segment(3);
		$this->load->view('/common/header');
		if ($obj_id != '') {
			$this->load->database();
			$sql = "SELECT * FROM private_save_business where id=".$obj_id;
			$query = $this->db->query($sql);
			$obj_info = $query->row_array();
			$data['info'] = $obj_info;
			$this->load->helper('url');
			$this->load->view('/private/info',$data);
			$this->load->view('/common/foot');
		}
	}
	
	function lend_info() {
		$obj_id = $this->uri->segment(3);
		$this->load->view('/common/header');
		if ($obj_id != '') {
			$this->load->database();
			$sql = "SELECT * FROM private_lend_business where id=".$obj_id;
			$query = $this->db->query($sql);
			$obj_info = $query->row_array();
			$data['info'] = $obj_info;
			$this->load->helper('url');
			$this->load->view('/private/info',$data);
			$this->load->view('/common/foot');
		}
	}
	
}

?>