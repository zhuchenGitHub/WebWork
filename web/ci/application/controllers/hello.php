<?php
class Hello extends CI_Controller {
	public function __construct() {
		parent :: __construct();
	}

	public function index() {
//		$this->load->helper('url');
		$this->load->view("helloview");
	}
//	public function tiaozhuan() {
//		redirect("/login/","location");
//
//	}
}
?>