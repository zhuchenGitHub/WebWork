<?php
class Hisinfoquestion extends CI_Controller {
	function __construct() {
		parent :: __construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->model('myinfodb');
		$this->load->helper('url');
	}

	function index() {
		$hisusername = $this->session->userdata('hisusername');
		$allhisquestion = $this->myinfodb->findallmyquestion($hisusername);
		$length = count($allhisquestion['askidarr']);
		
		$this->load->library('pagination');
		$config['base_url'] = 'http://localhost:81/ci/index.php/hisinfoquestion/index/?any=5';
		$config['total_rows'] = $length;
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
		$data = array ();
		$infostr = $this->myinfodb->findmyquestion($hisusername, $config['per_page'], $offset);
		$data['infostr'] = $infostr;
		$data['pagestr'] = $this->pagination->create_links();
		$data['perpage'] = count($infostr['askidarr']);
		$this->load->view('hisinfoquestionview', $data);
	}
}
?>