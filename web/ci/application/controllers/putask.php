<?php
class Putask extends CI_Controller {
	function __construct() {
		parent :: __construct();
		$this->load->database();
		$this->load->model('createtabledb');
		$this->load->model('userinfodb');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
	}

	function index() {

		$this->form_validation->set_rules('askdiscription', 'Askdiscription', 'callback_askdiscription_check');
		$this->form_validation->set_rules('asklabel', 'Asklabel', 'callback_asklabel_check');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('putaskview');
		} else {
			$askdiscription = $this->input->post('askdiscription');
			$asklabel = $this->input->post('asklabel');
			$usernameforask = $this->session->userdata('username');
			$time = date('Y-m-d H:i:s', time());
			$asktoinsert = array (
				'usernameforask' => $usernameforask,
				'question' => $askdiscription,
				'label' => $asklabel,
				'askzan' => 0,
				'putasktime' => $time
			);
			$userinfo = $this->userinfodb->user_select($usernameforask);
			$mygrade = $userinfo[0]->grade;
			$timecompare = date("Y-m-d", strtotime($time));
			$todaycount = $this->userinfodb->comparetime($usernameforask, $timecompare);

			if ($todaycount >= $mygrade) {
				$this->load->view('putaskview');
				echo "<script>alert('今天所提问题数已达上限')</script>";
			} else {
				$this->createtabledb->insertask($asktoinsert);
				redirect('http://localhost:81/ci/index.php/searchcontroll', 'location');
			}

		}
	}

	function askdiscription_check($str) {
		if ($str == "") {
			$this->form_validation->set_message('askdiscription_check', 'null!');
			echo "<script>alert('请输入问题描述！')</script>";
			return FALSE;
		} else {
			return TRUE;
		}
	}
	
	function asklabel_check($str) {
		if ($str == "") {
			$this->form_validation->set_message('asklabel_check', 'null!');
			echo "<script>alert('请输入问题标签！')</script>";
			return FALSE;
		} else {
			return TRUE;
		}
	}
}
?>