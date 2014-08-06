<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends Bank_Controller{
	function Index(){  
    	parent::__construct();  
  	}  

  	public function center(){
  		$this->load->library('session');
  		$this->load->helper('url');
  		$this->load->view('index/Public_top');
  		$this->load->view('index/index');
  	}
  	
	public function left(){
		$this->load->helper('url');
		$obj_id = $this->uri->segment(3);
		$data['obj_id'] = $obj_id;
		$this->load->view('index/Public_top');
		$this->load->view('index/left',$data);
	}
	
	public function main(){
		$this->load->helper('url');
		$server_info = array(
    		'admin版本'=> '1.0',
    		'操作系统'=>PHP_OS,
    		'运行环境'=>$_SERVER["SERVER_SOFTWARE"],
    		'PHP运行方式'=>php_sapi_name(),
    		'最大上传限制'=>ini_get('upload_max_filesize'),
    		'最大执行时间'=>ini_get('max_execution_time').'秒',
    		'服务器时间'=>date("Y年n月j日 H:i:s"),
    		//'北京时间'=>gmdate("Y年n月j日 H:i:s",time()+8*3600),
    		'服务器域名/IP'=>$_SERVER['SERVER_NAME'].' ['.gethostbyname($_SERVER['SERVER_NAME']).']',
    		'剩余空间'=>round((@disk_free_space(".")/(1024*1024)),2).'M',
    	);
    	$data['server_info'] = $server_info;
		$this->load->view('index/Public_top',$data);
		$this->load->view('index/main');
	}
	
}

?>