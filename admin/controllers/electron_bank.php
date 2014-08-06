<?php
class Electron_bank extends Bank_Controller {
	
	function electron_bank() {
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
		$sql = "SELECT * FROM electron_bank WHERE ".$where." ORDER BY id desc";
		$query = $this->db->query($sql);
		$total_num = $query->num_rows();
		
		$items_per_page = 20;
		$page_num = ceil($total_num / $items_per_page);
		
		if ($current_page < 1 ) {
			$current_page = 1;
		} else if ($current_page > $page_num) {
			$current_page = $page_num;
		}
		
		$electronbank_list = array();
		if ($total_num > 0) {
			$sql.= " LIMIT ".($current_page-1) * $items_per_page.",".$items_per_page;
			$query = $this->db->query ($sql);
			$electronbank_list = $query->result_array();
		}
		$this->load->helper('url');
		$this->load->library('pagination');
		$config['base_url'] = site_url('/electron_bank/view_list/');
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
		$data['electronbank_list'] = $electronbank_list;
		$this->load->view('/index/Public_header');
		$this->load->view('/electron_bank/view_list', $data);
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
		$this->load->view('/index/Public_header');
		$this->load->view('/electron_bank/son_view_list', $data);
	}
	
	function item_info() {
		$obj_id = $this->uri->segment(3);
		$this->load->view('/index/Public_header');
		if ($obj_id != '') {
			$this->load->database();
			$sql = "SELECT * FROM electron_bank where id=".$obj_id;
			$query = $this->db->query($sql);
			$obj_info = $query->row_array();
			$data['obj_info'] = $obj_info;
			$this->load->helper('url');
			$this->load->view('/electron_bank/item_info',$data);
		}
	}
	
	function son_item_info() {
		$obj_id = $this->input->post('obj_id');
		$parents_id = $this->uri->segment(3);
		$this->load->view('/index/Public_header');
		if ($obj_id != '') {
			$this->load->database();
			$sql = "SELECT * FROM electron_bank_son where id=".$obj_id;
			$query = $this->db->query($sql);
			$obj_info = $query->row_array();
			$p_sql = "SELECT title FROM electron_bank where id=".$obj_info['parent_id'];
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
			$this->load->view('/electron_bank/son_item_info',$data);
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
			$this->load->view('/electron_bank/add',$data);
		} else {
			$this->load->database();
			$this->db->set('title', htmlspecialchars(trim($title),ENT_QUOTES));
			$this->db->set('add_time', time());
			$this->db->set('content', $content);
			$this->db->insert('electron_bank');
			$this->load->helper('url');
			redirect('/electron_bank/view_list');
		}
	}
	function son_add() {
		$parent_id = $this->uri->segment(3);
		if ($parent_id != "") {
			$this->load->library ('form_validation');
			$this->form_validation->set_rules('title',' ','required');
			$this->form_validation->set_rules('parent_id',' ','required');
			$this->form_validation->set_rules('content',' ','required');
			$title 	 = $this->input->post('title');
			$content = $this->input->post('content');
			$this->load->view('/index/Public_header');
			if ($this->form_validation->run() == FALSE) {
				$data['title'] 	 = $title;
				$data['parent_id'] 	 = $parent_id;
				$data['content'] = $content;
				$this->load->helper('url');
				$this->load->view('/electron_bank/son_add',$data);
			} else {
				$this->load->database();
				$this->db->set('title', htmlspecialchars(trim($title),ENT_QUOTES));
				$this->db->set('add_time', time());
				$this->db->set('parent_id', $parent_id);
				$this->db->set('content', $content);
				$this->db->insert('electron_bank_son');
				$this->db->set('is_have_son', 1);
				$this->db->where('id', $parent_id);
				$this->db->update('electron_bank');
				$this->load->helper('url');
				redirect('/electron_bank/view_list/');
			}
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
				$this->db->update('electron_bank');
				$this->load->helper('url');
				redirect('/electron_bank/view_list/');
			} 
		} else {
			$obj_id = $this->uri->segment(3);
			$this->load->database();
			$sql = "SELECT * FROM electron_bank WHERE id=".$obj_id;
			$query = $this->db->query($sql);
			$item_info = array();
			$item_info = $query->row_array();
			$data['obj_id'] = $obj_id;
			$data['item_info'] = $item_info;
			$this->load->helper('url');
			$this->load->view('/electron_bank/update',$data);
		}
	}
	function son_update() {
		$parent_id = $this->uri->segment(3);
		$obj_id = $this->input->post('id' );
		if ($obj_id != "") {
			$this->load->library ('form_validation');
			$this->form_validation->set_rules('title',' ','required');
			$this->form_validation->set_rules('content',' ','required');
			$title 	 = $this->input->post('title');
			$content = $this->input->post('content');
			$this->load->view('/index/Public_header');
			$this->load->database();
			$sql = "SELECT * FROM electron_bank_son WHERE id=".$obj_id;
			$query = $this->db->query($sql);
			$item_info = array();
			$item_info = $query->row_array();
			$data['item_info'] = $item_info;
			if ($this->form_validation->run() == FALSE) {
				$data['obj_id'] = $obj_id;
				$data['parent_id'] = $parent_id;
				$this->load->helper('url');
				$this->load->view('/electron_bank/son_update',$data);
			} else {
				$this->load->database();
				$this->db->set('title', htmlspecialchars(trim($title),ENT_QUOTES));
				$this->db->set('content', $content);
				$this->db->set('update_time', time());
				$this->db->where('id', $obj_id);
				$this->db->update('electron_bank_son');
				$this->load->helper('url');
				redirect('/electron_bank/son_view_list/'.$parent_id);
			}
		} 
	}
	
	public function delete(){
		$ids_array = $this->input->post('id');
		if (!empty($ids_array)) {
			$this->load->database();
			foreach ($ids_array as $val){
				$this->db->set('is_del', 1);
				$this->db->where('id', $val);
				$this->db->update('electron_bank');
				$this->db->set('is_del', 1);
				$this->db->where('parent_id', $val);
				$this->db->update('electron_bank_son');
			}			
			$this->load->helper('url');
			redirect('/electron_bank/view_list', 'refresh');
		}
	}
	
	public function son_delete(){
		$id = $this->input->post('obj_id');
		$parent_id = $this->uri->segment(3);;
		if ($id != '') {
			$this->load->database();
			$sql = "SELECT * FROM electron_bank_son WHERE parent_id=".$parent_id;
			$query = $this->db->query($sql);
			$total_num = $query->num_rows();
			if ($total_num == 1) {
				$this->db->set('is_have_son', 0);
				$this->db->where('id', $parent_id);
				$this->db->update('electron_bank');
			}
			$this->db->set('is_del', 1);
			$this->db->where('id', $id);
			$this->db->update('electron_bank_son');
			$this->load->helper('url');
			redirect('/electron_bank/son_view_list/'.$parent_id, 'refresh');
		}
	}
}

?>