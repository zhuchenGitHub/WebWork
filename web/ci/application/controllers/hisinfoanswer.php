<?php 
class Hisinfoanswer extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('myinfodb');
	}
	
	function index(){
		$hisusername=$this->session->userdata('hisusername');
		$allhisanswer=$this->myinfodb->findallmyanswer($hisusername);
		$length=count($allhisanswer['answeridarr']);
		
		$this->load->library('pagination');
		$config['base_url'] = 'http://localhost:81/ci/index.php/hisinfoanswer/index/?any=5';
		$config['total_rows'] = $length;
		$config['per_page'] = 3;
		$config['url_segment'] = 3;
		$config['full_tag_open'] = '<p>';
		$config['full_tag_close'] = '</p>';
		$config['first_link'] = '��ҳ';
		$config['last_link'] = 'βҳ';
		$config['next_link'] = '��һҳ>';
		$config['prev_link'] = '<��һҳ';
		$config['num_links'] = 2;
		$config['page_query_string'] = TRUE;
		$this->pagination->initialize($config);

		if (isset ($_GET['per_page'])) {
			$offset = $_GET['per_page'];
		} else {
			$offset = $this->uri->segment(3);
		}
		
		$data=array();
		$infostr=$this->myinfodb->findmyanswer($hisusername,$config['per_page'],$offset);
		$data['infostr']=$infostr;
		$data['pagestr'] = $this->pagination->create_links();
		$data['perpage']=count($infostr['answeridarr']);
		$this->load->view('hisinfoanswerview',$data);
		
	}
}
?>