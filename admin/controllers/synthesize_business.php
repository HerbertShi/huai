<?php
class Synthesize_business extends Bank_Controller {
	
	function synthesize_business() {
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
		
		$where = 'is_del=0';
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
		$sql = "SELECT * FROM synthesize_business WHERE ".$where." ORDER BY id desc";
		$query = $this->db->query($sql);
		$total_num = $query->num_rows();
		
		$items_per_page = 20;
		$page_num = ceil($total_num / $items_per_page);
		
		if ($current_page < 1 ) {
			$current_page = 1;
		} else if ($current_page > $page_num) {
			$current_page = $page_num;
		}
		
		$announce_list = array();
		if ($total_num > 0) {
			$sql.= " LIMIT ".($current_page-1) * $items_per_page.",".$items_per_page;
			$query = $this->db->query ($sql);
			$announce_list = $query->result_array();
		}
		$this->load->helper('url');
		$this->load->library('pagination');
		$config['base_url'] = site_url('/about_bank/view_list/');
		$config['total_rows'] = $total_num;
		$config['per_page'] = 20; 
		$config['first_link'] = '首页'; // 第一页显示   
		$config['last_link'] = '末页'; // 最后一页显示   
		$config['next_link'] = '下一页 >'; // 下一页显示   
		$config['prev_link'] = '< 上一页'; // 上一页显示   
		$this->pagination->initialize($config);
		$data['paginate'] = $this->pagination->create_links();
		$data['keyword'] = $keyword;		
		$data['time_start'] = $time_start;
		$data['time_end'] = $time_end;
		$data['announce_list'] = $announce_list;
		$this->load->view('/index/Public_header');
		$this->load->view('/synthesize_business/view_list', $data);
	}
	
	function item_info() {
		$obj_id = $this->uri->segment(3);
		$this->load->view('/index/Public_header');
		if ($obj_id != '') {
			$this->load->database();
			$sql = "SELECT * FROM synthesize_business where id=".$obj_id;
			$query = $this->db->query($sql);
			$obj_info = $query->row_array();
			$data['obj_info'] = $obj_info;
			$this->load->helper('url');
			$this->load->view('/synthesize_business/item_info',$data);
		}
	}
	
	function add() {
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
			$this->load->view('/synthesize_business/add',$data);
		} else {
			$this->load->database();
			$this->db->set('title', htmlspecialchars(trim($title),ENT_QUOTES));
			$this->db->set('add_time', time());
			$this->db->set('content', $content);
			$this->db->insert('synthesize_business');
			$this->load->helper('url');
			redirect('/synthesize_business/view_list');
		}
	}
	
	function update() {
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
				$this->db->update('synthesize_business');
				$this->load->helper('url');
				redirect('/synthesize_business/view_list/');
			} 
		} else {
			$obj_id = $this->uri->segment(3);
			$this->load->database();
			$sql = "SELECT * FROM synthesize_business WHERE id=".$obj_id;
			$query = $this->db->query($sql);
			$item_info = array();
			$item_info = $query->row_array();
			$data['item_info'] = $item_info;
			$this->load->helper('url');
			$this->load->view('/synthesize_business/update',$data);
			
		}
	}
	
	public function delete(){
		$ids_array = $this->input->post('id');
		if (!empty($ids_array)) {
			$this->load->database();
			foreach ($ids_array as $val){
				$this->db->set('is_del', 1);
				$this->db->where('id', $val);
				$this->db->update('synthesize_business');
			}			
			$this->load->helper('url');
			redirect('/synthesize_business/view_list', 'refresh');
		}
	}
	
}

?>