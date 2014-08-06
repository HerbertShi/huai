<?php
class Admin extends Bank_Controller{

	function Admin() {
		parent::__construct();
	}
	
	//管理员列表
	public function view_list(){
		$current_page = $this->uri->segment(3);
		if ($current_page == "" || !is_numeric($current_page)) {
			$current_page = 1;
		}
		$this->load->database();
		$sql = "SELECT * FROM admin where is_del=0 ORDER BY id asc";
		$query = $this->db->query($sql);
		$total_num = $query->num_rows();
		
		$items_per_page = 20;
		$page_num = ceil($total_num / $items_per_page);
		
		if ($current_page < 1 ) {
			$current_page = 1;
		} else if ($current_page > $page_num) {
			$current_page = $page_num;
		}
		
		$admin_list = array();
		if ($total_num > 0) {
			$sql.= " LIMIT ".($current_page-1) * $items_per_page.",".$items_per_page;
			$query = $this->db->query ($sql);
			$admin_list = $query->result_array();
		}
		$this->load->helper('url');
		$this->load->library('pagination');
		$config['base_url'] = site_url('/admin/view_list/');
		$config['total_rows'] = $total_num;
		$config['per_page'] = 20; 
		$config['first_link'] = '首页'; // 第一页显示   
		$config['last_link'] = '末页'; // 最后一页显示   
		$config['next_link'] = '下一页 >'; // 下一页显示   
		$config['prev_link'] = '< 上一页'; // 上一页显示   
		$this->pagination->initialize($config);
		$data['paginate'] = $this->pagination->create_links();
		$data['admin_list'] = $admin_list;
		$this->load->view('/index/Public_header');
		$this->load->view('/admin/view_list', $data);
	}
	
	//添加管理员
	public function add(){
		$this->load->library ('form_validation');
		$this->form_validation->set_rules('user_name',' ','required');
		$this->form_validation->set_rules('password',' ','required');
		$user_name 	 = $this->input->post('user_name');
		$password = $this->input->post('password');
		$this->load->view('/index/Public_header');
		if ($this->form_validation->run() == FALSE) {
			$data['user_name'] 	 = $user_name;
			$data['password'] = $password;
			$this->load->helper('url');
			$this->load->view('/admin/add',$data);
		} else {
			$this->load->database();
			$this->db->set('user_name', htmlspecialchars(trim($user_name),ENT_QUOTES));
			$this->db->set('add_time', time());
			$this->db->set('password', $password);
			$this->db->insert('admin');
			$this->load->helper('url');
			redirect('/admin/view_list');
		}
	}
	
	//修改管理员信息
	public function edit(){
		$obj_id = $this->input->post('id');
		$this->load->view('/index/Public_header');
		if ($obj_id != "") {
			$this->load->library ('form_validation');
			$this->form_validation->set_rules('password',' ','required');
			$this->form_validation->set_rules('is_del',' ','required');
			$is_del 	 = $this->input->post('is_del');
			$password = $this->input->post('password');
			if ($this->form_validation->run()) {
				$this->load->database();
				$this->db->set('password', md5($password));
				$this->db->set('is_del', $is_del);
				$this->db->where('id', $obj_id);
				$this->db->update('admin');
				$this->load->helper('url');
				redirect('/admin/view_list');
			}
		}else{
			$obj_id = $this->uri->segment(3);
			$this->load->database();
			$sql = "SELECT * FROM admin WHERE id=".$obj_id;
			$query = $this->db->query($sql);
			$item_info = $query->row_array();
			$data['obj_id'] = $obj_id;
			$data['item_info'] = $item_info;
			$this->load->helper('url');
			$this->load->view('/admin/edit',$data);
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
				$this->db->update('admin');
			}			
			$this->load->helper('url');
			redirect('/admin/view_list', 'refresh');
		}
	}
	
}