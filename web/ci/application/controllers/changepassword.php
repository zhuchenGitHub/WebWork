<?php
class Changepassword extends CI_Controller {
	function __construct() {
		parent :: __construct();
		$this->load->library('session');
		$this->load->helper(array (
			'form',
			'url'
		));
		$this->load->library('form_validation');
		$this->load->model('userinfodb');
	}

	function index() {
		$this->form_validation->set_rules('username', 'Username', 'callback_username_check');
		$this->form_validation->set_rules('password', 'Password', 'callback_password_check');
		$this->form_validation->set_rules('newpassword', 'Newpassword', 'callback_newpassword_check');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('changepasswordview');
		} else {
			$formusername = $this->input->post('username');
			$newpassword = $this->input->post('newpassword');
			$this->userinfodb->changepassword($formusername, $newpassword);
			redirect('http://localhost:81/ci/index.php/login', 'location');
		}

	}

	function username_check($str) {
		$myusername = $this->session->userdata('username');
		$this->load->model('userinfodb');

		$selectresult = $this->userinfodb->user_selectall();
		$usernamearr = array ();
		foreach ($selectresult as $row) {
			$usernamearr[] = $row->username;
		}
		if ($str == "") {
			$this->form_validation->set_message('username_check', 'null!');
			echo "<script>alert('请输入用户名！')</script>";
			return FALSE;
		} else
			if ($myusername != $str) {
				$this->form_validation->set_message('username_check', 'It is not your Username!');
				echo "<script>alert('这不是你的用户名！')</script>";
				return FALSE;
			} else {
				return TRUE;
			}
	}

	function password_check($str) {
		$this->load->model('userinfodb');
		$formusername = $this->input->post("username");

		$selectresult1 = $this->userinfodb->user_selectall();
		$usernamearr = array ();

		foreach ($selectresult1 as $row) {
			$usernamearr[] = $row->username;
		}

		if (in_array($formusername, $usernamearr)) {
			$judge = TRUE;
		} else {
			$judge = FALSE;

		}

		if ($judge == TRUE) {

			$selectresult = $this->userinfodb->user_select($formusername);
			foreach ($selectresult as $row1) {
				$passwordindb = $row1->password;
			}

			if ($str == "") {
				$this->form_validation->set_message('password_check', 'Your Password Is null!');
				echo "<script>alert('请输入密码！')</script>";
				return FALSE;

			} else
				if ($str != $passwordindb) {
					$this->form_validation->set_message('password_check', 'Your Username Or Your Password Is Wrong!');
					echo "<script>alert('用户名或密码错误！')</script>";
					return FALSE;

				} else {
					return TRUE;
				}
		} else {
			$this->form_validation->set_message('password_check', '');
			return FALSE;
		}

	}

	function newpassword_check($str) {
		if ($str == "") {

			$this->form_validation->set_message('newpassword_check', 'null!');
			echo "<script>alert('请输入新密码！')</script>";
			return FALSE;
		} else {
			return TRUE;
		}
	}
}
?>