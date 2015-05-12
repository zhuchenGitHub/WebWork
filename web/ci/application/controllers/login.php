<?php
class Login extends CI_Controller {

	public function __construct() {
		parent :: __construct();
		$this->load->library('session');

	}

	public function index() {

		$this->load->helper(array (
			'form',
			'url'
		));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'callback_username_check');
		$this->form_validation->set_rules('password', 'Password', 'callback_password_check');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('loginform');
		} else {
			$this->session->set_userdata('username', $_POST['username']);
			redirect('http://localhost:81/ci/index.php/searchcontroll', 'location');
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
			$this->form_validation->set_message('username_check', 'Your Username is null!');
			echo "<script>alert('请输入用户名！')</script>";
			return FALSE;
		} else
			if (!(in_array($str, $usernamearr))) {
				$this->form_validation->set_message('username_check', 'Your Username does not exist!');
				echo "<script>alert('用户名不存在！')</script>";
				return FALSE;

			} else {
				return TRUE;
			}

	}

	public function password_check($str) {
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

}
?>