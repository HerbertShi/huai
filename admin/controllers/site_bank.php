<?php
class Site_Bank extends Bank_Controller {
	
	function site_bank() {
		parent::__construct();
	}
	
	function view_list() {
		$current_page = $this->uri->segment(3);
		if ($current_page == "" || !is_numeric($current_page)) {
			$current_page = 1;
		}
		$keyword = $this->input->post('keyword');
		$time_start = $this->input->post('time_start');
		$time_end = $this->input->post('time_end');
		$type = $this->input->post('type');
		
		$where = 'is_del=0';
		if (trim($type)) {
			$where .= " AND type = '".$type."'";
		}
		if (trim($keyword)) {
			$where .= " AND title LIKE '%".$keyword."%'";
		}
		if (trim($time_start)) {
			$time_start = strtotime($time_start);
			$where .= " AND add_time>='".$time_start."'";
		}
		if ($time_end) {
			$time_end =strtotime($time_end) ;
			$where .= " AND add_time<='".$time_end."'";
		}
		$this->load->database();
		$sql = "SELECT * FROM site_bank WHERE ".$where." ORDER BY id desc";
		$query = $this->db->query($sql);
		$total_num = $query->num_rows();
		
		$items_per_page = 20;
		$page_num = ceil($total_num / $items_per_page);
		
		if ($current_page < 1 ) {
			$current_page = 1;
		} else if ($current_page > $page_num) {
			$current_page = $page_num;
		}
		
		$list = array();
		if ($total_num > 0) {
			$sql.= " LIMIT ".($current_page-1) * $items_per_page.",".$items_per_page;
			$query = $this->db->query ($sql);
			$list = $query->result_array();
		}
		$this->load->helper('url');
		$this->load->library('pagination');
		$config['base_url'] = site_url('/site_bank/view_list/');
		$config['total_rows'] = $total_num;
		$config['per_page'] = 20; 
		$config['first_link'] = '首页'; // 第一页显示   
		$config['last_link'] = '末页'; // 最后一页显示   
		$config['next_link'] = '下一页 >'; // 下一页显示   
		$config['prev_link'] = '< 上一页'; // 上一页显示   
		$this->pagination->initialize($config);
		$data['paginate'] = $this->pagination->create_links();
		$data['keyword'] = $keyword;
		$data['type'] = $type;		
		$data['time_start'] = $time_start;
		$data['time_end'] = $time_end;
		$data['list'] = $list;
		$this->load->view('/index/Public_header');
		$this->load->view('/site_bank/view_list', $data);
	}
	
	function item_info() {
		$obj_id = $this->uri->segment(3);
		$this->load->view('/index/Public_header');
		if ($obj_id != '') {
			$this->load->database();
			$sql = "SELECT * FROM site_bank where id=".$obj_id;
			$query = $this->db->query($sql);
			$info = $query->row_array();
			$data['info'] = $info;
			$this->load->helper('url');
			$this->load->view('/site_bank/item_info',$data);
		}
	}
 
	function add_item() {
		$this->load->library ('form_validation');
		$this->form_validation->set_rules('title',' ','required');
		$this->form_validation->set_rules('content',' ','required');
		$title 	 = $this->input->post('title');
		$content = $this->input->post('content');
		$this->load->view('/index/Public_header');
		if ($this->form_validation->run() == FALSE) {
			$data['title'] 	 = $title;
			$data['content'] = $content;
			$this->load->helper('url');
			$this->load->view('/site_bank/add_item',$data);
		} else {
			$this->load->database();
			$this->db->set('title', htmlspecialchars(trim($title),ENT_QUOTES));
			$this->db->set('add_time', time());
			$this->db->set('content', $content);
			$this->db->insert('site_bank');
			$this->load->helper('url');
			redirect('/site_bank/view_list');
		}
	}
	
	function update_item() {
		$obj_id = $this->input->post('id' );
		$this->load->view('/index/Public_header');
		if ($obj_id != "") {
			$this->load->library ('form_validation');
			$this->form_validation->set_rules('title',' ','required');
			$this->form_validation->set_rules('content',' ','required');
			$title 	 = $this->input->post('title');
			$content = $this->input->post('content');
			if ($this->form_validation->run()) {
				$this->load->database();
				$this->db->set('title', htmlspecialchars(trim($title),ENT_QUOTES));
				$this->db->set('content', $content);
				$this->db->set('update_time', time());
				$this->db->where('id', $obj_id);
				$this->db->update('site_bank');
				$this->load->helper('url');
				redirect('/site_bank/view_list/');
			} 
		} else {
			$obj_id = $this->uri->segment(3);
			$this->load->database();
			$sql = "SELECT * FROM site_bank WHERE id=".$obj_id;
			$query = $this->db->query($sql);
			$info = $query->row_array();
			$data['obj_id'] = $obj_id;
			$data['info'] = $info;
			$this->load->helper('url');
			$this->load->view('/site_bank/update_item',$data);
		}
	}
	
	public function delete_item(){
		$ids_array = $this->input->post('id');
		if (!empty($ids_array)) {
			$this->load->database();
			foreach ($ids_array as $val){
				$this->db->set('is_del', 1);
				$this->db->where('id', $val);
				$this->db->update('site_bank');
			}			
			$this->load->helper('url');
			redirect('/site_bank/view_list', 'refresh');
		}
	}
	
}

?>