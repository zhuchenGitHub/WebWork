<?php
class UserInfoDB extends CI_Model {

	public function _construct() {
		parent :: _construct();
		$this->load->database();
	}

	public function user_insert($arr) {
		mysql_query("SET NAMES gb2312");
		$this->db->insert('userinfo', $arr);
	}

	public function user_update($id, $arr) {
		mysql_query("SET NAMES gb2312");
		$this->db->where('username', $id);
		$this->db->update('userinfo', $arr);
	}

	public function user_delete($id) {
		mysql_query("SET NAMES gb2312");
		$this->db->where('username', $id);
		$this->db->delete('userinfo');
	}

	public function user_select($id) {
		mysql_query("SET NAMES gb2312");
		$this->db->where('username', $id);
		$this->db->select('*');
		$query = $this->db->get('userinfo');
		return $query->result();
	}

	public function user_selectall() {
		mysql_query("SET NAMES gb2312");
		$this->db->select('*');
		$query = $this->db->get('userinfo');
		return $query->result();
	}

	public function answeritupdate($username) {
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
		$target['jingyanzhi'] += 1;
		$nextgradejingyan = 3 * pow(2, $target['grade']);
		if ($target['jingyanzhi'] >= $nextgradejingyan) {
			$target['grade'] += 1;
		}
		$this->db->where('username', $username);
		$this->db->update('userinfo', $target);
	}

	public function zanaddupdate($username) {
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

	public function comparetime($username, $time) {
		mysql_query("SET NAMES gb2312");
		$query = $this->db->get_where('asks', array (
			'usernameforask' => $username
		));
		$temp = array ();
		foreach ($query->result() as $row) {
			$temp[] = $row->putasktime;
		}
		$count = 0;
		foreach ($temp as $row2) {

			$row2 = date("Y-m-d", strtotime($row2));
			if (strtotime($row2) == strtotime($time)) {
				$count++;
			}
		}
		return $count;
	}

	public function changepassword($username, $password) {
		mysql_query("SET NAMES gb2312");
		$query = $this->db->get_where('userinfo', array (
			'username' => $username
		));
		$target=array();
		$target['username'] = "";
		$target['password'] = "";
		$target['grade'] = 0;
		$target['jingyanzhi'] = 0;
		foreach($query->result() as $row){
			$target['username']=$row->username;
			$target['password']=$row->password;
			$target['grade']=$row->grade;
			$target['jingyanzhi']=$row->jingyanzhi;
		}
		$target['password']=$password;
		$this->db->where('username',$username);
		$this->db->update('userinfo',$target);
	}

}
?>