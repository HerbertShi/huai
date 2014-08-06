<?php
class Msg extends Bank_Controller {
	
	function msg() {
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
		$sql = "SELECT * FROM msg WHERE ".$where." ORDER BY id desc";
		$query = $this->db->query($sql);
		$total_num = $query->num_rows();
		
		$items_per_page = 20;
		$page_num = ceil($total_num / $items_per_page);
		
		if ($current_page < 1 ) {
			$current_page = 1;
		} else if ($current_page > $page_num) {
			$current_page = $page_num;
		}
		
		$msg_list = array();
		if ($total_num > 0) {
			$sql.= " LIMIT ".($current_page-1) * $items_per_page.",".$items_per_page;
			$query = $this->db->query ($sql);
			$msg_list = $query->result_array();
		}
		$this->load->helper('url');
		$this->load->library('pagination');
		$config['base_url'] = site_url('/msg/view_list/');
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
		$data['msg_list'] = $msg_list;
		$this->load->view('/index/Public_header');
		$this->load->view('/msg/view_list', $data);
	}
	
	function item_info() {
		$obj_id = $this->uri->segment(3);
		$this->load->view('/index/Public_header');
		if ($obj_id != '') {
			$this->load->database();
			$sql = "SELECT * FROM msg where id=".$obj_id;
			$query = $this->db->query($sql);
			$obj_info = $query->row_array();
			$data['obj_info'] = $obj_info;
			$this->load->helper('url');
			$this->load->view('/msg/item_info',$data);
		}
	}
	
	public function delete(){
		$ids_array = $this->input->post('id');
		if (!empty($ids_array)) {
			$this->load->database();
			foreach ($ids_array as $val){
				$this->db->set('is_del', 1);
				$this->db->where('id', $val);
				$this->db->update('msg');
			}			
			$this->load->helper('url');
			redirect('/msg/view_list', 'refresh');
		}
	}
	
}

?>