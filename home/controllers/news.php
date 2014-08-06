<?php
class News extends CI_Controller {
	
	function news() {
		parent::__construct();
	}
	
	function view_list() {
		$current_page = $this->uri->segment(3);
		if ($current_page == "" || !is_numeric($current_page)) {
			$current_page = 1;
		}
		$where = 'is_del=0';
	 
		$this->load->database();
		$sql = "SELECT * FROM news WHERE ".$where." ORDER BY id desc";
		$query = $this->db->query($sql);
		$total_num = $query->num_rows();
		
		$items_per_page = 20;
		$page_num = ceil($total_num / $items_per_page);
		
		if ($current_page < 1 ) {
			$current_page = 1;
		} else if ($current_page > $page_num) {
			$current_page = $page_num;
		}
		
		$news_list = array();
		if ($total_num > 0) {
			$sql.= " LIMIT ".($current_page-1) * $items_per_page.",".$items_per_page;
			$query = $this->db->query ($sql);
			$news_list = $query->result_array();
		}
		$this->load->helper('url');
		$this->load->library('pagination');
		$config['base_url'] = site_url('/news/view_list/');
		$config['total_rows'] = $total_num;
		$config['per_page'] = 20; 
		$config['first_link'] = '首页'; // 第一页显示   
		$config['last_link'] = '末页'; // 最后一页显示   
		$config['next_link'] = '下一页 >'; // 下一页显示   
		$config['prev_link'] = '< 上一页'; // 上一页显示   
		$this->pagination->initialize($config);
		$data['paginate'] = $this->pagination->create_links();
		$data['news'] = $news_list;
		$this->load->view('/common/header');
		$this->load->view('/news/list', $data);
		$this->load->view('/common/foot');
	}
	
	function info() {
		$obj_id = $this->uri->segment(3);
		$this->load->view('/common/header');
		if ($obj_id != '') {
			$this->load->database();
			$sql = "SELECT * FROM news where id=".$obj_id;
			$query = $this->db->query($sql);
			$obj_info = $query->row_array();
			$data['info'] = $obj_info;
			$this->load->helper('url');
			$this->load->view('/news/info',$data);
			$this->load->view('/common/foot');
		}
	}
	
	
}

?>