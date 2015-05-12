<?php
class Answer extends CI_Controller {
	function __construct() {
		parent :: __construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->model('showanswersdb');
		$this->load->model('createtabledb');
		$this->load->model('addzan');
		$this->load->library('session');
		$this->load->model('userinfodb');
	}

	function index() {
		$questionid = $_GET['questionid'];

		$question = $this->createtabledb->getquestion($questionid);
		$this->session->set_userdata('questioninfo', $question);
		$this->session->set_userdata('questionid', $questionid);
		//		echo $question;
		$this->load->library('pagination');
		$config['base_url'] = 'http://localhost:81/ci/index.php/answer/index/?questionid=' . $questionid;
		$config['total_rows'] = $this->showanswersdb->getallcounts($question);
		$config['per_page'] = 3;
		$config['url_segment'] = 3;
		$config['full_tag_open'] = '<p>';
		$config['full_tag_close'] = '</p>';
		$config['first_link'] = '首页';
		$config['last_link'] = '尾页';
		$config['next_link'] = '下一页>';
		$config['prev_link'] = '<上一页';
		$config['num_links'] = 2;
		$config['page_query_string'] = TRUE;
		$this->pagination->initialize($config);
		if (isset ($_GET['per_page'])) {
			$offset = $_GET['per_page'];
		} else {
			$offset = $this->uri->segment(3);
		}

		$infostr = $this->showanswersdb->getanswers($question, $config['per_page'], $offset);
		//		echo $this->session->userdata('questioninfo');
		//		$answerid=$this->showanswersdb->getanswerid($question);
		//		print_r($infostr);
		$data = array ();
		//		$data['id']=$answerid;
		//		echo $data['id'];
		$askzannum = $this->addzan->countaskzanbyid($questionid);
		$data['askzannum'] = $askzannum;
		$data['infostr'] = $infostr;
		$data['pagestr'] = $this->pagination->create_links();
		$data['perpage'] = count($infostr['answer']);
		$data['questionid'] = $questionid;
		$this->load->view('answerview', $data);
	}

	function add() {
		$questionidtoadd = $this->input->post('questionid');
		$myusername = $this->session->userdata('username');
		$usernameforask = $this->addzan->getaskusername($questionidtoadd);
		$zanusernamearr = $this->addzan->judgeaskzan($questionidtoadd);
		$askzannum = $this->addzan->countaskzanbyid($questionidtoadd);

		if ($zanusernamearr[0] == 'k') {
			$this->addzan->addaskzan($questionidtoadd);
			$this->addzan->adduser($questionidtoadd, $myusername);
			$this->userinfodb->zanaddupdate($usernameforask);
			echo "+" . ($askzannum +1);
		} else {
			if (in_array($myusername, $zanusernamearr)) {

				$this->addzan->addaskzan0($questionidtoadd);
				echo "+$askzannum";

			} else {

				$this->addzan->addaskzan($questionidtoadd);
				$this->addzan->adduser($questionidtoadd, $myusername);
				$this->userinfodb->zanaddupdate($usernameforask);
				echo "+" . ($askzannum +1);
			}
		}

	}

	function answeradd() {
		$answeridtoadd = $this->input->post('answerid');
		$myusername = $this->session->userdata('username');
        $usernameforanswer=$this->addzan->getanswerusername($answeridtoadd);
		$zanusernamearr = $this->addzan->judgeanswerzan($answeridtoadd);

		if ($zanusernamearr[0] == 'k') {
			$this->addzan->addanswerzan($answeridtoadd);
			$this->addzan->addansweruser($answeridtoadd, $myusername);
			$this->userinfodb->zanaddupdate($usernameforanswer);
		} else {
			if (in_array($myusername, $zanusernamearr)) {
				$this->addzan->addanswerzan0($answeridtoadd);
			} else {
				$this->addzan->addanswerzan($answeridtoadd);
				$this->addzan->addansweruser($answeridtoadd, $myusername);
				$this->userinfodb->zanaddupdate($usernameforanswer);
			}
		}
		$answerzannum = $this->addzan->findanswerzan($answeridtoadd);
		$info = array (
			array (
				'idtoupdate' => $answeridtoadd,
				'zannum' => $answerzannum
			)
		);
		$zaninfo = json_encode($info);
		echo $zaninfo;
	}

}
?>