<?php
class Register extends CI_Controller {
	public function __construct() {
		parent :: __construct();
	}

	public function index() {
		$this->load->helper(array (
			'form',
			'url'
		));
		$this->load->library('form_validation');
		$this->load->model('userinfodb');

		$this->form_validation->set_rules('username', 'Username', 'callback_username_check');
		$this->form_validation->set_rules('password', 'Password', 'callback_password_check');
		$this->form_validation->set_rules('passwordconfirm', 'PasswordConfirm', 'callback_passwordconfirm_check');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('registerform');
		} else {
			$formusername = $this->input->post('username');
			$formpassword = $this->input->post('password');
			$arr = array (
				'username' => $formusername,
				'password' => $formpassword
			);
			//			print_r ($arr);
			$this->userinfodb->user_insert($arr);
			redirect('http://localhost:81/ci/index.php/login', 'location');
		}
	}

	public function username_check($str) {
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
			if (in_array($str, $usernamearr)) {
				$this->form_validation->set_message('username_check', 'Your Username has existed!');
				echo "<script>alert('用户名已存在！')</script>";
				return FALSE;
			} else {
				return TRUE;
			}

	}

	public function password_check($str) {
		if ($str == "") {
			$this->form_validation->set_message('password_check', 'null!');
			echo "<script>alert('请输入密码！')</script>";
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function passwordconfirm_check($str) {
		$password = $this->input->post("password");
		if ($str == "") {
			$this->form_validation->set_message('passwordcomfirm_check', 'null!');
			echo "<script>alert('请再次输入密码！')</script>";
			return FALSE;
		} else
			if ($password != $str) {
				$this->form_validation->set_message('passwordcomfirm_check', 'not same!');
				echo "<script>alert('确认密码和密码不一致！')</script>";
				return FALSE;
			} else {
				return TRUE;
			}
	}
}
?>