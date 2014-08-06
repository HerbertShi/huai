<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller {
	function Login(){  
    	parent::__construct();  
  	}  
  
	public function index() {
		$this->load->helper('url');
		$this->load->view('/index/Public_top');
		$this->load->view('login');
	}
	
	public function log(){
		
		$this->load->helper('url');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('user_name','用户名','trim|required');
		$this->form_validation->set_rules('password','密码','trim|required|md5');
		
		if ($this->form_validation->run() == FALSE) {
			$checkdata['check_error'] = '请输入验证码!';
            $this->load->view('login',$checkdata);
		} else {
			$name = $this->input->post('user_name');
			$password = $this->input->post('password');
			$this->load->database();
			$sql = "select * from admin where user_name = '".$name."' and password = '".$password."' and is_del = 0";
			$query = $this->db->query($sql);
			if ($query->num_rows() > 0) {
				$row = $query->row(); 
				$this->load->library('session');
				$this->session->set_userdata(array('user_id'=>$row->id,'user_name' => $row->user_name,'user_permission' => $row->user_permission,'user_type' => $row->user_type) );
				redirect('/index/center','refresh' );
			} else {
				/*暂时不需要验证码
				$this->load->library('vLRandcode');
				$results = $this->vlrandcode->make();
				$this->session->set_userdata(array('check_number' => $results['check_number']));
				$checkdata['check_tip'] = $results['check_tip'];*/
				$checkdata['check_error'] = '请输入验证码!';
				$checkdata['login_error'] = '您输入的用户名或者密码有错!';
				$this->load->view('/index/Public_top');
				$this->load->view('login',$checkdata);
			}
		}
	}
	
	function logout() {
		$this->load->library('session');
		$array_items = array('user_id' => '','user_name' => '','user_permission' => '', 'user_type' => '');
		$this->session->unset_userdata($array_items);
		$this->load->helper('url');
		redirect('/login', 'refresh');
	}
}

?>