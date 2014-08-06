<?php
class Invite extends Bank_Controller {
	
	function invite() {
		parent::__construct();
	}
	
	function notice_list() {
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
		$sql = "SELECT * FROM invite_notice WHERE ".$where." ORDER BY id desc";
		$query = $this->db->query($sql);
		$total_num = $query->num_rows();
		
		$items_per_page = 20;
		$page_num = ceil($total_num / $items_per_page);
		
		if ($current_page < 1 ) {
			$current_page = 1;
		} else if ($current_page > $page_num) {
			$current_page = $page_num;
		}
		
		$notice_list = array();
		if ($total_num > 0) {
			$sql.= " LIMIT ".($current_page-1) * $items_per_page.",".$items_per_page;
			$query = $this->db->query ($sql);
			$notice_list = $query->result_array();
		}
		$this->load->helper('url');
		$this->load->library('pagination');
		$config['base_url'] = site_url('/invite/notice_list/');
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
		$data['notice_list'] = $notice_list;
		$this->load->view('/index/Public_header');
		$this->load->view('/invite/notice_list', $data);
	}
	
	function position_list() {
		$current_page = $this->uri->segment(3);
		if ($current_page == "" || !is_numeric($current_page)) {
			$current_page = 1;
		}
		$keyword = $this->input->post('keyword');
		$time_start = $this->input->post('time_start');
		$time_end = $this->input->post('time_end');
		$department = $this->input->post('department');
		$position_type = $this->input->post('position_type');
		
		$where = 'is_del=0';
		if (trim($keyword)) {
			$where .= " AND position_name LIKE '%".$keyword."%'";
		}
		if (trim($time_start)) {
			$time_start = strtotime($time_start);
			$where .= " AND add_time>='".$time_start."'";
		}
		if ($time_end) {
			$time_end =strtotime($time_end) ;
			$where .= " AND add_time<='".$time_end."'";
		}
		if (trim($department)) {
			$where .= " AND department LIKE '%".$department."%'";
		}
		if ($position_type != 1 && $position_type != '') {
			$where .= " AND position_type = ".$position_type."";
		}
		$this->load->database();
		$sql = "SELECT * FROM invite_position WHERE ".$where." ORDER BY id desc";
		$query = $this->db->query($sql);
		$total_num = $query->num_rows();
		
		$items_per_page = 20;
		$page_num = ceil($total_num / $items_per_page);
		
		if ($current_page < 1 ) {
			$current_page = 1;
		} else if ($current_page > $page_num) {
			$current_page = $page_num;
		}
		
		$position_list = array();
		if ($total_num > 0) {
			$sql.= " LIMIT ".($current_page-1) * $items_per_page.",".$items_per_page;
			$query = $this->db->query ($sql);
			$position_list = $query->result_array();
		}
		$this->load->helper('url');
		$this->load->library('pagination');
		$config['base_url'] = site_url('/invite/position_list/');
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
		$data['position_list'] = $position_list;
		$data['department'] = $department;
		$data['position_type'] = $position_type;
		$this->load->view('/index/Public_header');
		$this->load->view('/invite/position_list', $data);
	}
	
	function notice_info() {
		$obj_id = $this->uri->segment(3);
		$this->load->view('/index/Public_header');
		if ($obj_id != '') {
			$this->load->database();
			$sql = "SELECT * FROM invite_notice where id=".$obj_id;
			$query = $this->db->query($sql);
			$notice_info = $query->row_array();
			$data['notice_info'] = $notice_info;
			$this->load->helper('url');
			$this->load->view('/invite/notice_info',$data);
		}
	}
	
	function position_info() {
		$obj_id = $this->uri->segment(3);
		$this->load->view('/index/Public_header');
		if ($obj_id != '') {
			$this->load->database();
			$sql = "SELECT * FROM invite_position where id=".$obj_id;
			$query = $this->db->query($sql);
			$position_info = $query->row_array();
			$data['position_info'] = $position_info;
			$this->load->helper('url');
			$this->load->view('/invite/position_info',$data);
		}
	}
	
	function add_notice() {
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
			$this->load->view('/invite/add_notice',$data);
		} else {
			$this->load->database();
			$this->db->set('title', htmlspecialchars(trim($title),ENT_QUOTES));
			$this->db->set('add_time', time());
			$this->db->set('content', $content);
			$this->db->insert('invite_notice');
			$this->load->helper('url');
			redirect('/invite/notice_list');
		}
	}
	
	function add_position() {
		$this->load->library ('form_validation');
		$this->form_validation->set_rules('position_name',' ','required');
		$this->form_validation->set_rules('department',' ','required');
		$this->form_validation->set_rules('content',' ','required');
		$this->form_validation->set_rules('stop_time',' ','required');
		$this->form_validation->set_rules('position_type',' ','required');
		$position_name 	 = $this->input->post('position_name');
		$department = $this->input->post('department');
		$content = $this->input->post('content');
		$stop_time = $this->input->post('stop_time');
		$position_type = $this->input->post('position_type');
		$this->load->view('/index/Public_header');
		if ($this->form_validation->run() == FALSE) {
			$data['position_name'] 	 = $position_name;
			$data['department'] = $department;
			$data['content'] = $content;
			$data['stop_time'] = $stop_time;
			$data['position_type'] = $position_type;
			$this->load->helper('url');
			$this->load->view('/invite/add_position',$data);
		} else {
			$this->load->database();
			$this->db->set('position_name', htmlspecialchars(trim($position_name),ENT_QUOTES));
			$this->db->set('department', $department);
			$this->db->set('content',$content);
			$this->db->set('add_time', time());
			$this->db->set('stop_time', $stop_time);
			$this->db->set('position_type', $position_type);
			$this->db->insert('invite_position');
			$this->load->helper('url');
			redirect('/invite/position_list');
		}
	}
	
	function update_notice() {
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
				$this->db->update('invite_notice');
				$this->load->helper('url');
				redirect('/invite/notice_list/');
			} 
		} else {
			$obj_id = $this->uri->segment(3);
			$this->load->database();
			$sql = "SELECT * FROM invite_notice WHERE id=".$obj_id;
			$query = $this->db->query($sql);
			$notice_info = array();
			$notice_info = $query->row_array();
			$data['obj_id'] = $obj_id;
			$data['notice_info'] = $notice_info;
			$this->load->helper('url');
			$this->load->view('/invite/update_notice',$data);
		}
	}
	
	function update_position() {
		$obj_id = $this->input->post('id' );
		$this->load->view('/index/Public_header');
		if ($obj_id != "") {
			$this->load->library ('form_validation');
			$this->form_validation->set_rules('position_name',' ','required');
			$this->form_validation->set_rules('department',' ','required');
			$this->form_validation->set_rules('content',' ','required');
			$this->form_validation->set_rules('stop_time',' ','required');
			$this->form_validation->set_rules('position_type',' ','required');
			$position_name 	 = $this->input->post('position_name');
			$department = $this->input->post('department');
			$content = $this->input->post('content');
			$stop_time = $this->input->post('stop_time');
			$position_type = $this->input->post('position_type');
			if ($this->form_validation->run()) {
				$this->load->database();
				$this->db->set('position_name', htmlspecialchars(trim($position_name),ENT_QUOTES));
				$this->db->set('department', $department);
				$this->db->set('content',$content);
				$this->db->set('add_time', time());
				$this->db->set('stop_time', $stop_time);
				$this->db->set('position_type', $position_type);
				$this->db->where('id', $obj_id);
				$this->db->update('invite_position');
				$this->load->helper('url');
				redirect('/invite/position_list/');
			} 
		} else {
			$obj_id = $this->uri->segment(3);
			$this->load->database();
			$sql = "SELECT * FROM invite_position WHERE id=".$obj_id;
			$query = $this->db->query($sql);
			$position_info = array();
			$position_info = $query->row_array();
			$data['obj_id'] = $obj_id;
			$data['position_info'] = $position_info;
			$this->load->helper('url');
			$this->load->view('/invite/update_position',$data);
		}
	}
	
	public function delete_notice(){
		$ids_array = $this->input->post('id');
		if (!empty($ids_array)) {
			$this->load->database();
			foreach ($ids_array as $val){
				$this->db->set('is_del', 1);
				$this->db->where('id', $val);
				$this->db->update('invite_notice');
			}			
			$this->load->helper('url');
			redirect('/invite/notice_list', 'refresh');
		}
	}
	public function delete_position(){
		$ids_array = $this->input->post('id');
		if (!empty($ids_array)) {
			$this->load->database();
			foreach ($ids_array as $val){
				$this->db->set('is_del', 1);
				$this->db->where('id', $val);
				$this->db->update('invite_position');
			}			
			$this->load->helper('url');
			redirect('/invite/position_list', 'refresh');
		}
	}
	
}

?>