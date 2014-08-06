<?php
class e_bank extends CI_Controller {
	
	function e_bank() {
		parent::__construct();
	}
	
	function index() {
		
		$current_page = $this->uri->segment(3);
		if ($current_page == "" || !is_numeric($current_page)) {
			$current_page = 1;
		}
		$where = 'is_del=0';
		$this->load->database();
		$sql = "SELECT * FROM electron_bank WHERE ".$where." ORDER BY id desc";
		$query = $this->db->query($sql);
		$electronbank_list = $query->result_array();
		
		$this->load->helper('url');
		$this->load->library('pagination');
		$config['base_url'] = site_url('/e_bank/index/');
		$data['electronbank_list'] = $electronbank_list;
		$this->load->view('/common/header');
		$this->load->view('/e_bank/index', $data);
		$this->load->view('/common/foot');
	}
	function son_view_list() {
		$parent_id = $this->uri->segment(3);
		$this->load->database();
		$sql = "SELECT * FROM electron_bank_son WHERE is_del=0 and parent_id=".$parent_id." ORDER BY id desc";
		$query = $this->db->query($sql);
		$total_num = $query->num_rows();
		$son_list = array();
		if ($total_num > 0) $son_list = $query->result_array();
		$data['son_list'] = $son_list;
		$data['total_num'] = $total_num;
		$data['parent_id'] = $parent_id;
		$this->load->helper('url');
		$this->load->view('/common/header');
		$this->load->view('/e_bank/son_view_list', $data);
		$this->load->view('/common/foot');
	}
	
	function item_info() {
		$obj_id = $this->uri->segment(3);
		$this->load->view('/common/header');
		if ($obj_id != '') {
			$this->load->database();
			$sql = "SELECT * FROM electron_bank where id=".$obj_id;
			$query = $this->db->query($sql);
			$obj_info = $query->row_array();
			$data['obj_info'] = $obj_info;
			$this->load->helper('url');
			$this->load->view('/e_bank/item_info',$data);
			$this->load->view('/common/foot');
		}
	}
	
	function son_item_info() {
		$obj_id = $this->input->post('obj_id');
		$parents_id = $this->uri->segment(3);
		$this->load->view('/common/header');
		if ($obj_id != '') {
			$this->load->database();
			$sql = "SELECT * FROM electron_bank_son where id=".$obj_id;
			$query = $this->db->query($sql);
			$obj_info = $query->row_array();
			$p_sql = "SELECT title FROM e_bank where id=".$obj_info['parent_id'];
			$query = $this->db->query($p_sql);
			$parent_info = $query->row_array();
			if ($parents_id == '') {
				$parent_id = $obj_info['parent_id'];
			} else {
				$parent_id = $parents_id;
			}
			$data['obj_info'] = $obj_info;
			$data['parent_info'] = $parent_info;
			$data['parent_id'] = $parent_id;
			$this->load->helper('url');
			$this->load->view('/e_bank/son_item_info',$data);
			$this->load->view('/common/foot');
		}
	}
	
	 
}

?>