<?php
class Showasks extends CI_Controller {
	function __construct() {
		parent :: __construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->model('createtabledb');
		$this->load->library('session');

	}

	function index() {
		$this->load->library('pagination');
		$config['base_url'] = 'http://localhost:81/ci/index.php/showasks/index/?any=5';
		$config['total_rows'] = $this->createtabledb->getcounts();
		$config['per_page'] = 5;
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
		if(isset($_GET['per_page'])){
			$offset = $_GET['per_page'];
		}else{
			$offset=$this->uri->segment(3);
		}

		$keywords = $this->session->userdata('keyword');
        $strall=$this->createtabledb->searchall($keywords);
		
		$filter_str = array_filter($strall);
		if (!empty ($filter_str)) {
			$str = $this->createtabledb->search($keywords, $config['per_page'], $offset);
			$infostr = $str;
			$data['infostr'] = $infostr;
			$data['pagestr'] = $this->pagination->create_links();
			$data['perpage'] = count($infostr['usernameforaskarr']);
			$this->load->view('asksview', $data);
		} else {
			$infostr = $this->createtabledb->getallasks($config['per_page'], $offset);
			$data['infostr'] = $infostr;
			$data['pagestr'] = $this->pagination->create_links();
			$data['perpage'] = count($infostr['usernameforaskarr']);
			$this->load->view('asksview', $data);
		}
	}
}
?>