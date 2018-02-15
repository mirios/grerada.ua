<?php 
class MY_Controller extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->check_installer();
	}

	function check_installer(){
	$CI = & get_instance();
	$CI->load->database();
	$CI->load->dbutil();
		if ($CI->db->database == "") {
			header('Location: install');
		} else {
			if (!$CI->dbutil->database_exists($CI->db->database))
			{
				header('Location: install/index.php?e=db');

			}else if (is_dir('install')) {
				header('Location: install/index.php?e=folder');
			}
		}
	}
}
