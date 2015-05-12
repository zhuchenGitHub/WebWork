<?php
class Myinfomation extends CI_Controller {
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
		$myusername = $this->session->userdata('username');
		$myuserinfoarr = $this->userinfodb->user_select($myusername);
		$myusergrade = $myuserinfoarr[0]->grade;
		$myuserjingyanzhi = $myuserinfoarr[0]->jingyanzhi;
		$myzancount = $this->myinfodb->findallmyzan($myusername);
		$myputzancount=$this->myinfodb->myputzannum($myusername);
		$promotegrade=3*pow(2,$myusergrade)-$myuserjingyanzhi;
		$data=array();
		$data['username']=$myusername;
		$data['usergrade']=$myusergrade;
		$data['userzancount']=$myzancount;
		$data['userputzancount']=$myputzancount;
		$data['promotegrade']=$promotegrade;
		$this->load->view('myinfomationview',$data);
	}
}
?>