<?php
class Createtabledb extends CI_Model {
	public function _construct() {
		parent :: _construct();
		$this->load->database();
	}

	public function getallasks($limit, $offset) {
		mysql_query("SET NAMES gb2312");
		$this->db->select('*');
		$query = $this->db->get('asks', $limit, $offset);
		$usernamearr = array ();
		$questionarr = array ();
		$labelarr = array ();
		$askidarr = array ();
		foreach ($query->result() as $row) {
			$usernamearr[] = $row->usernameforask;
			$questionarr[] = $row->question;
			$labelarr[] = $row->label;
			$askidarr[] = $row->askid;
		}
		$dataarr = array (
			'usernameforaskarr' => $usernamearr,
			'questionarr' => $questionarr,
			'labelarr' => $labelarr,
			'askidarr' => $askidarr
		);
		return $dataarr;
	}
	public function getcounts() {
		$countofasks = $this->db->count_all_results('asks');
		return $countofasks;

	}
	public function getquestion($questionid) {
		mysql_query("SET NAMES gb2312");
		$this->db->select('question');
		$query=$this->db->get_where('asks', array (
			'askid' => $questionid
		));
		foreach($query->result() as $row){
			$question=$row->question;
		}
		return $question;
	}
	
	public function insertask($ask){
		mysql_query("SET NAMES gb2312");
		$this->db->insert('asks',$ask);
	}
	
	public function search($keywords,$limit,$offset){
		mysql_query("SET NAMES gb2312");
		$this->db->select('*');
		$this->db->like('question',$keywords);
		$query = $this->db->get('asks', $limit, $offset);
		$usernamearr = array ();
		$questionarr = array ();
		$labelarr = array ();
		$askidarr = array ();
		foreach ($query->result() as $row) {
			$usernamearr[] = $row->usernameforask;
			$questionarr[] = $row->question;
			$labelarr[] = $row->label;
			$askidarr[] = $row->askid;
		}
		$dataarr = array (
			'usernameforaskarr' => $usernamearr,
			'questionarr' => $questionarr,
			'labelarr' => $labelarr,
			'askidarr' => $askidarr
		);
		return $dataarr;
	}
	
	public function searchall($keywords){
		mysql_query("SET NAMES gb2312");
		$this->db->select('*');
		$this->db->like('question',$keywords);
		$query = $this->db->get('asks');
		$usernamearr = array ();
		$questionarr = array ();
		$labelarr = array ();
		$askidarr = array ();
		foreach ($query->result() as $row) {
			$usernamearr[] = $row->usernameforask;
			$questionarr[] = $row->question;
			$labelarr[] = $row->label;
			$askidarr[] = $row->askid;
		}
		$dataarr = array (
			'usernameforaskarr' => $usernamearr,
			'questionarr' => $questionarr,
			'labelarr' => $labelarr,
			'askidarr' => $askidarr
		);
		return $dataarr;
	}
}
?>