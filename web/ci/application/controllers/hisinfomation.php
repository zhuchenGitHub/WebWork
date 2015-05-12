<?php
class Hisinfomation extends CI_Controller {
	function __construct() {
		parent :: __construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->model('userinfodb');
		$this->load->model('myinfodb');
	}

	function index() {
		//0�������������⣬ÿ��һ�����Զ���һ������ÿ��
		//0-1:3;
		//1-2:6;
		//2-3:12;
		//''''  ÿ���һ���޼�3���ش�һ�������1
		$hisusername = $this->session->userdata('hisusername');
		$hisuserinfoarr = $this->userinfodb->user_select($hisusername);
		$hisusergrade = $hisuserinfoarr[0]->grade;
		$hisuserjingyanzhi = $hisuserinfoarr[0]->jingyanzhi;
		$hiszancount = $this->myinfodb->findallmyzan($hisusername);
		$hisputzancount=$this->myinfodb->myputzannum($hisusername);
		$promotegrade=3*pow(2,$hisusergrade)-$hisuserjingyanzhi;
		$data=array();
		$data['username']=$hisusername;
		$data['usergrade']=$hisusergrade;
		$data['userzancount']=$hiszancount;
		$data['userputzancount']=$hisputzancount;
		$data['promotegrade']=$promotegrade;
		$this->load->view('hisinfomationview',$data);
	}
}
?>