<?php
class Branch extends Bank_Controller {
	
	function branch() {
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
		$s_province 	 = $this->input->post('s_province');
		$s_city 	 = $this->input->post('s_city');
		$s_county 	 = $this->input->post('s_county');
		
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
		if ($s_province != '' && $s_province != '省份') {
			$where .= " AND s_province = '".$s_province."'";
		}
		if ($s_city != '' && $s_city != '地级市') {
			$where .= " AND s_city = '".$s_city."'";
		}
		if ($s_county != '' && $s_county != '市、县级市') {
			$where .= " AND s_county = '".$s_county."'";
		}
		$this->load->database();
		$sql = "SELECT * FROM branch WHERE ".$where." ORDER BY id desc";
		$query = $this->db->query($sql);
		$total_num = $query->num_rows();
		
		$items_per_page = 20;
		$page_num = ceil($total_num / $items_per_page);
		
		if ($current_page < 1 ) {
			$current_page = 1;
		} else if ($current_page > $page_num) {
			$current_page = $page_num;
		}
		
		$branch_list = array();
		if ($total_num > 0) {
			$sql.= " LIMIT ".($current_page-1) * $items_per_page.",".$items_per_page;
			$query = $this->db->query ($sql);
			$branch_list = $query->result_array();
		}
		$this->load->helper('url');
		$this->load->library('pagination');
		$config['base_url'] = site_url('/branch/view_list/');
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
		$data['branch_list'] = $branch_list;
		$this->load->view('/index/Public_header');
		$this->load->view('/branch/view_list', $data);
	}
	
	function item_info() {
		$obj_id = $this->uri->segment(3);
		$this->load->view('/index/Public_header');
		if ($obj_id != '') {
			$this->load->database();
			$sql = "SELECT * FROM branch where id=".$obj_id;
			$query = $this->db->query($sql);
			$obj_info = $query->row_array();
			$data['obj_info'] = $obj_info;
			$this->load->helper('url');
			$this->load->view('/branch/item_info',$data);
		}
	}
	
	function add() {
		$this->load->library ('form_validation');
		$this->form_validation->set_rules('title',' ','required');
		$this->form_validation->set_rules('content',' ','required');
		$title 	 = $this->input->post('title');
		$s_province 	 = $this->input->post('s_province');
		$s_city 	 = $this->input->post('s_city');
		$s_county 	 = $this->input->post('s_county');
		$address 	 = $this->input->post('address');
		$phone 	 = $this->input->post('phone');
		$start_time 	 = $this->input->post('start_time');
		$end_time 	 = $this->input->post('end_time');
		$content = $this->input->post('content');
		$this->load->view('/index/Public_header');
		if ($this->form_validation->run() == FALSE) {
			$data['title'] 	 = $title;
			$data['s_province'] 	 = $s_province;
			$data['s_city'] 	 = $s_city;
			$data['s_county'] 	 = $s_county;
			$data['address'] 	 = $address;
			$data['phone'] 	 = $phone;
			$data['start_time'] 	 = $start_time;
			$data['end_time'] 	 = $end_time;
			$data['content'] = $content;
			$this->load->helper('url');
			$this->load->view('/branch/add',$data);
		} else {
			$this->load->database();
			$this->db->set('title', htmlspecialchars(trim($title),ENT_QUOTES));
			$this->db->set('s_province', $s_province);
			$this->db->set('s_city', $s_city);
			$this->db->set('s_county', $s_county);
			$this->db->set('address', $address);
			$this->db->set('phone', $phone);
			$this->db->set('start_time', $start_time);
			$this->db->set('end_time', $end_time);
			$this->db->set('content', $content);
			$this->db->set('add_time', time());
			$this->db->insert('branch');
			$this->load->helper('url');
			redirect('/branch/view_list');
		}
	}
	
	function update() {
		$obj_id = $this->input->post('id' );
		$this->load->view('/index/Public_header');
		if ($obj_id != "") {
			$this->load->library ('form_validation');
			$this->form_validation->set_rules('title',' ','required');
			$this->form_validation->set_rules('s_province',' ','required');
			$this->form_validation->set_rules('s_city',' ','required');
			$this->form_validation->set_rules('s_county',' ','required');
			$this->form_validation->set_rules('address',' ','required');
			$this->form_validation->set_rules('phone',' ','required');
			$this->form_validation->set_rules('start_time',' ','required');
			$this->form_validation->set_rules('end_time',' ','required');
			$this->form_validation->set_rules('content',' ','required');
			$title 	 = $this->input->post('title');
			$s_province 	 = $this->input->post('s_province');
			$s_city 	 = $this->input->post('s_city');
			$s_county 	 = $this->input->post('s_county');
			$address 	 = $this->input->post('address');
			$phone 	 = $this->input->post('phone');
			$start_time 	 = $this->input->post('start_time');
			$end_time 	 = $this->input->post('end_time');
			$content = $this->input->post('content');
			if ($this->form_validation->run()) {
				$this->load->database();
				$sql = "SELECT * FROM branch WHERE id=".$obj_id;
				$query = $this->db->query($sql);
				$cur_info = array();
				$cur_info = $query->row_array();
				if ($s_province.$s_city.$s_county == $cur_info['s_province'].$cur_info['s_city'].$cur_info['s_county'] || $s_province.$s_city.$s_county == '省份地级市市、县级市') {
					$this->db->set('s_province', $cur_info['s_province']);
					$this->db->set('s_city', $cur_info['s_city']);
					$this->db->set('s_county', $cur_info['s_county']);
				} else {
					$this->db->set('s_province', $s_province);
					$this->db->set('s_city', $s_city);
					$this->db->set('s_county', $s_county);
				}
				$this->db->set('title', htmlspecialchars(trim($title),ENT_QUOTES));
				$this->db->set('address', $address);
				$this->db->set('phone', $phone);
				$this->db->set('start_time', $start_time);
				$this->db->set('end_time', $end_time);
				$this->db->set('content', $content);
				$this->db->set('update_time', time());
				$this->db->where('id', $obj_id);
				$this->db->update('branch');
				$this->load->helper('url');
				redirect('/branch/view_list/');
			} 
		} else {
			$obj_id = $this->uri->segment(3);
			$this->load->database();
			$sql = "SELECT * FROM branch WHERE id=".$obj_id;
			$query = $this->db->query($sql);
			$item_info = array();
			$item_info = $query->row_array();
			$data['obj_id'] = $obj_id;
			$data['item_info'] = $item_info;
			$this->load->helper('url');
			$this->load->view('/branch/update',$data);
			
		}
	}
	
	public function delete(){
		$ids_array = $this->input->post('id');
		if (!empty($ids_array)) {
			$this->load->database();
			foreach ($ids_array as $val){
				$this->db->set('is_del', 1);
				$this->db->where('id', $val);
				$this->db->update('branch');
			}			
			$this->load->helper('url');
			redirect('/branch/view_list', 'refresh');
		}
	}
	
}

?>