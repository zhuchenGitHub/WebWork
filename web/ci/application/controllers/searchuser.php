<?php
class Searchuser extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper(array (
			'form',
			'url'
		));
		$this->load->library('session');
	}
	
	function index(){
		$this->form_validation->set_rules('searchusername', 'Searchusername', 'callback_searchusername_check');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('searchuserview');
		} else {
			$this->session->set_userdata('hisusername',$_POST['searchusername']);
			redirect('http://localhost:81/ci/index.php/hisinfomation','location');
		}
	}
	
	function searchusername_check($str){
	$this->load->model('userinfodb');

		$selectresult = $this->userinfodb->user_selectall();
		$usernamearr = array ();
		foreach ($selectresult as $row) {
			$usernamearr[] = $row->username;
		}

		if ($str == "") {
			$this->form_validation->set_message('username_check', 'Your Username is null!');
			echo "<script>alert('������Ҫ��ѯ�û�����')</script>";
			return FALSE;
		} else
			if (!(in_array($str, $usernamearr))) {
				$this->form_validation->set_message('username_check', 'Your Username does not exist!');
				echo "<script>alert('���û��������ڣ�')</script>";
				return FALSE;

			} else {
				return TRUE;
			}
	}
}
?>