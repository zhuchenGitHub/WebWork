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
		//0级不可以提问题，每升一级可以多提一个问题每天
		//0-1:3;
		//1-2:6;
		//2-3:12;
		//''''  每获得一个赞加3，回答一个问题加1
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