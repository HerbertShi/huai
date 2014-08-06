<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Bank_Controller extends CI_Controller {
	var $userId;
	var $userPermission;
	
	function Bank_Controller() {
		parent::__construct();
		$this->load->library('session');
		$user_id = $this->session->userdata ( 'user_id' );
		
		if ($user_id == FALSE) {
			$this->load->helper('url');
			redirect('/login/', 'refresh' );
		}
		
		$this->userId = $user_id;
	}
	
	function getUserId() {
		return $this->userId;
	}
}
?>