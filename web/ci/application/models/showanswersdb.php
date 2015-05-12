<?php
class Showanswersdb extends CI_Model {
	function __construct() {
		parent :: __construct();
		$this->load->database();
	}

	function getanswers($question, $limit, $offset) {
		mysql_query("SET NAMES gb2312");
		$this->db->select('*');
		$query = $this->db->get_where('answerlist', array (
			'question' => $question
		), $limit, $offset);
		$questionarr = array ();
		$answeridarr = array ();
		$answerarr = array ();
		$usernamearr = array ();
		$answerzanarr=array();
		foreach ($query->result() as $row) {
			$answerarr[] = $row->answer;
			$usernamearr[] = $row->usernameforanswer;
			$answeridarr[]=$row->answerid;
			$questionarr[]=$row->question;
			$answerzanarr[]=$row->answerzan;
		}
		$dataarr = array (
			'question' => $questionarr,
			'answerid' => $answeridarr,
			'answer' => $answerarr,
			'usernameforanswer' => $usernamearr,
			'answerzan'=>$answerzanarr
		);
		return $dataarr;
	}

	function getallcounts($question) {
		$this->db->where('question', $question);
		$this->db->from('answerlist');
		$counts = $this->db->count_all_results();
		return $counts;
	}
	
	function getanswerid($question){
		$this->db->select('answerid');
		$query=$this->db->get_where('answerlist',array('question'=>$question));
		$idarr=array();
		foreach($query->result() as $row){
			$idarr[]=$row->answerid;
		}
		return $idarr[0];
	
	}
		function getquestionbyid($id){
		$this->db->select('quesiton');
		$query=$this->db->get_where('answerlist',array('answerid'=>$id));
		$question=array();
		foreach($query->result() as $row){
			$question[]=$row->question;
		}
		return $question[0];
	}
		
	function insertanswer($arr){
		mysql_query("SET NAMES gb2312");
		$this->db->insert('answerlist',$arr);
	}
}
?>