<?php
class Searchcontroll extends CI_Controller {
	function __construct() {
		parent :: __construct();
		$this->load->library('session');
		$this->load->helper(array (
			'form',
			'url'
		));
		$this->load->library('form_validation');

	}

	function index() {
		$this->form_validation->set_rules('searchkeywords', 'Searchkeywords', 'callback_searchkeywords_check');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('search');
		} else {
			$this->session->set_userdata('keyword', $_POST['searchkeywords']);
			redirect('http://localhost:81/ci/index.php/showasks', 'location');
		}
	}

	function searchkeywords_check($str) {
		if ($str == "") {
			$this->form_validation->set_message('searchkeywords_check', 'Your keywords Is null!');
			echo "<script>alert('ÇëÊäÈëËÑË÷¹Ø¼ü×Ö£¡')</script>";
			return FALSE;

		} else {
			return TRUE;
		}
	}
}
?>