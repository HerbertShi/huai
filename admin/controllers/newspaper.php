<?php
class Newspaper extends Bank_Controller {

	function newspaper() {
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
		$cate = $this->input->post('cate');
		
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
		
		if ($cate) {
			$where .= " AND cate='".$cate."'";
		}
		
		$this->load->database();
		$sql = "SELECT * FROM newspaper where ".$where." ORDER BY id desc";
		$query = $this->db->query($sql);
		$total_num = $query->num_rows();
		
		$items_per_page = 10;
		$page_num = ceil($total_num / $items_per_page);
		
		if ($current_page < 1 ) {
			$current_page = 1;
		} else if ($current_page > $page_num) {
			$current_page = $page_num;
		}
		
		$ad_list = array();
		if ($total_num > 0) {
			$sql.= " LIMIT ".($current_page-1) * $items_per_page.",".$items_per_page;
			$query = $this->db->query ($sql);
			$ad_list = $query->result_array();
		}
		$this->load->helper('url');
		$this->load->library('pagination');
		$config['base_url'] = site_url('/newspaper/view_list/');
		$config['total_rows'] = $total_num;
		$config['per_page'] = 10; 
		$config['first_link'] = '首页'; // 第一页显示   
		$config['last_link'] = '末页'; // 最后一页显示   
		$config['next_link'] = '下一页 >'; // 下一页显示   
		$config['prev_link'] = '< 上一页'; // 上一页显示   
		$this->pagination->initialize($config);
		$data['paginate'] = $this->pagination->create_links();
		
		$data['keyword'] = $keyword;		
		$data['time_start'] = $time_start;
		$data['time_end'] = $time_end;
		$data['cate'] = $cate;
		$data['ad_list'] = $ad_list;
		$this->load->view('/index/Public_header');
		$this->load->view('/newspaper/view_list', $data);
	}
	
	function ad_info() {
		$obj_id = $this->uri->segment(3);
		if ($obj_id == "" || !is_numeric($obj_id)) {
			$obj_id = 1;
		}
		
		if ($obj_id != '') {
			$this->load->database();
			$sql = "SELECT * FROM newspaper where id=".$obj_id;
			$query = $this->db->query($sql);
			$obj_info = $query->row_array();
			$data['obj_info'] = $obj_info;
			$this->load->helper('url');
			$this->load->view('/newspaper/info',$data);
		}
	}
	
	function add() {
		$this->load->helper('url');
		$this->load->library ('form_validation');
		$this->form_validation->set_rules('title',' ','required');
		$this->form_validation->set_rules('url',' ','required');
		
		$title 	 = $this->input->post('title');
		$url = $this->input->post('url');
		$content = $this->input->post('content');
		
		$this->load->view('/index/Public_header');
		if ($this->form_validation->run() == FALSE) {
			$data['title'] 	 = $title;
			$data['url'] = $url;
			$data['content'] = $content;
			$this->load->view('/newspaper/add',$data);
		} else {
			$ord 	 = $this->input->post('ord');
			$cate 	 = $this->input->post('cate');
			$content = $this->input->post('content');
			if ($_FILES['upload_img']['name'] != '') {
				$config['upload_path'] = './uploads/Ad';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '512';
				$config['max_width']  = '1024';
				$config['max_height']  = '768';
				
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('upload_img')) {
			   		$error = array('error' => $this->upload->display_errors());
			   		$this->load->view('/newspaper/add', $error);
			  	} else{
			   		$upload_data = $this->upload->data();
				   	$img = '/uploads/newspaper/'.$upload_data['file_name'];
			  	}
			}
			
			$this->load->database();
			$this->db->set('title', htmlspecialchars(trim($title),ENT_QUOTES));
			$this->db->set('url', $url);
			$this->db->set('img', $img);
			$this->db->set('content', $content);
			$this->db->set('cate', $cate);
			$this->db->set('ord', $ord);
			$this->db->set('add_time', time());
			$this->db->insert('newspaper');
			redirect('/newspaper/view_list');
		}
	}
	
	function edit() {
		$this->load->library ('form_validation');
		$this->form_validation->set_rules('title',' ','required');
		$this->form_validation->set_rules('url',' ','required');
		
		$this->load->view('/index/Public_header');
		$this->load->helper('url');
		$this->load->database();
	
		if ($this->form_validation->run() == FALSE) {
			$obj_id = $this->uri->segment(3);
			if ($obj_id == "" || !is_numeric($obj_id)) {
				$obj_id = 1;
			}
			$sql = "SELECT * FROM newspaper WHERE id=".$obj_id;
			$query = $this->db->query($sql);
			$ad_info = array();
			$ad_info = $query->row_array();
			$data['obj_id'] = $obj_id;
			$data['ad_info'] = $ad_info;
			$this->load->view('/newspaper/edit',$data);
		} else {
			$obj_id 	 = $this->input->post('id');
			$title 	 = $this->input->post('title');
			$url = $this->input->post('url');
			$ord 	 = $this->input->post('ord');
			$cate 	 = $this->input->post('cate');
			$content = $this->input->post('content');
			
			if ($_FILES['upload_img']['name'] != '') {
				$config['upload_path'] = './uploads/Ad';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '512';
				$config['max_width']  = '1024';
				$config['max_height']  = '768';
				
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('upload_img')) {
			   		$error = array('error' => $this->upload->display_errors());
			   		$this->load->view('/newspaper/edit', $error);
			  	} else{
			   		$upload_data = $this->upload->data();
			   		$img = '/uploads/newspaper/'.$upload_data['file_name'];
			   		$this->db->set('img', $img);
			  	}
			}
			
			$this->db->set('title', htmlspecialchars(trim($title),ENT_QUOTES));
			$this->db->set('cate', $cate);
			$this->db->set('url', $url);
			$this->db->set('content', $content);
			$this->db->set('ord', $ord);
			$this->db->set('add_time',time());
			$this->db->where('id', $obj_id);
			$this->db->update('newspaper');
			redirect('/newspaper/view_list');
		}
	}
	
	//删除
	public function delete(){
		$ids_array = $this->input->post('id');
		if (!empty($ids_array)) {
			$this->load->database();
			foreach ($ids_array as $val){
				$this->db->set('is_del', 1);
				$this->db->where('id', $val);
				$this->db->update('newspaper');
			}			
			$this->load->helper('url');
			redirect('/newspaper/view_list', 'refresh');
		}
	}
	
	//排序
	public function order(){
		$ids_array = $this->input->post('orders');
		if (!empty($ids_array)) {
			$this->load->database();
			
			foreach ($ids_array as $id => $ord) {
				$this->db->set('ord', $ord);
				$this->db->where('id', $id);
				$this->db->update('newspaper');
			}
			$this->load->helper('url');
			redirect('/newspaper/view_list', 'refresh');
		}
	}
}

?>