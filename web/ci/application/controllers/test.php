<?php 
class Test extends CI_Controller{
	function __construct() {
		parent :: __construct();
		$this->load->database();
		$this->load->model('userinfodb');
		
	}
	
	
	public function index(){
		$username="Öì³¿";
	
		
		
mysql_query("SET NAMES gb2312");
		$query = $this->db->get_where('userinfo', array (
			'username' => $username
		));
		$target = array ();
		$target['username'] = "";
		$target['password'] = "";
		$target['grade'] = 0;
		$target['jingyanzhi'] = 0;
		foreach ($query->result() as $row) {
			$target['username'] = $row->username;
			$target['password'] = $row->password;
			$target['grade'] = $row->grade;
			$target['jingyanzhi'] = $row->jingyanzhi;
		}
		$target['jingyanzhi'] += 3;
		$nextgradejingyan = 3 * pow(2, $target['grade']);
		if ($target['jingyanzhi'] >= $nextgradejingyan) {
			$target['grade'] += 1;
		}
		$this->db->where('username', $username);
		$this->db->update('userinfo', $target);
}
}
?>