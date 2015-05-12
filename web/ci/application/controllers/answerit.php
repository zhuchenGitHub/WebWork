<?php
class Answerit extends CI_Controller {
	function __construct() {
		parent :: __construct();
		$this->load->database();
		$this->load->model('showanswersdb');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('userinfodb');
	}

	function index() {
		$question = $this->session->userdata('questioninfo');
		$questionid=$this->session->userdata('questionid');
		$username = $this->session->userdata('username');
		$data = array ();
		$data['question'] = $question;

		$this->form_validation->set_rules('answer', 'Answer', 'callback_answer_check');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('answeritview', $data);
		} else {
			$answer = $_POST['answer'];
			$time=date('Y-m-d H:i:s',time());
			$arrtoinsert = array (
				'question' => $question,
				'answer' => $answer,
				'usernameforanswer' => $username,
                'answerzan'=>0,
                'questionid'=>$questionid,
				'answertime'=>$time
			);

//			print_r($arrtoinsert);
			$this->showanswersdb->insertanswer($arrtoinsert);
            $this->userinfodb->answeritupdate($username);
			redirect('http://localhost:81/ci/index.php/showasks', 'location');
		}
	}
	
	function answer_check($str){
		if($str==""){
			$this->form_validation->set_message('answer_check', 'Your Answer is null!');
			echo "<script>alert('ÇëÊäÈëÄãµÄ½â´ğ£¡')</script>";
			return FALSE;
		}else{
			return TRUE;
		}
	}
}
?>