<?php
class Addzan extends CI_Model {
	function __construct() {
		parent :: __construct();
		$this->load->database();
	}

	function addaskzan($questionidtoadd) {
		mysql_query("SET NAMES gb2312");
		$query = $this->db->get_where('asks', array (
			'askid' => $questionidtoadd
		));
		foreach ($query->result() as $row) {
			$usernameforask = $row->usernameforask;
			$question = $row->question;
			$label = $row->label;
			$askzan = $row->askzan;
		}
		$askzan += 1;

		$arr = array (
			'usernameforask' => $usernameforask,
			'question' => $question,
			'label' => $label,
			'askzan' => $askzan
		);
		$this->db->where('askid', $questionidtoadd);
		$this->db->update('asks', $arr);
	}

	function addanswerzan($answeridtoadd) {
		mysql_query("SET NAMES gb2312");
		$query = $this->db->get_where('answerlist', array (
			'answerid' => $answeridtoadd
		));
		foreach ($query->result() as $row) {
			$usernameforanswer = $row->usernameforanswer;
			$question = $row->question;
			$answerzan = $row->answerzan;
			$answer = $row->answer;
		}
		$answerzan += 1;

		$arr = array (
			'usernameforanswer' => $usernameforanswer,
			'question' => $question,
			'answerzan' => $answerzan,
			'answer' => $answer
		);
		$this->db->where('answerid', $answeridtoadd);
		$this->db->update('answerlist', $arr);
	}

	function addanswerzan0($answeridtoadd) {
		mysql_query("SET NAMES gb2312");
		$query = $this->db->get_where('answerlist', array (
			'answerid' => $answeridtoadd
		));
		foreach ($query->result() as $row) {
			$usernameforanswer = $row->usernameforanswer;
			$question = $row->question;
			$answerzan = $row->answerzan;
			$answer = $row->answer;
		}
		$answerzan += 0;

		$arr = array (
			'usernameforanswer' => $usernameforanswer,
			'question' => $question,
			'answerzan' => $answerzan,
			'answer' => $answer
		);
		$this->db->where('answerid', $answeridtoadd);
		$this->db->update('answerlist', $arr);
	}
	function addaskzan0($questionidtoadd) {
		mysql_query("SET NAMES gb2312");
		$query = $this->db->get_where('asks', array (
			'askid' => $questionidtoadd
		));
		foreach ($query->result() as $row) {
			$usernameforask = $row->usernameforask;
			$question = $row->question;
			$label = $row->label;
			$askzan = $row->askzan;
		}
		$askzan += 0;

		$arr = array (
			'usernameforask' => $usernameforask,
			'question' => $question,
			'label' => $label,
			'askzan' => $askzan
		);
		$this->db->where('askid', $questionidtoadd);
		$this->db->update('asks', $arr);
	}

	function judgeaskzan($askid) {
		mysql_query("SET NAMES gb2312");
		$this->db->select('askid');
		$query1 = $this->db->get('askzanlist');
		$askidarr = array ();
		$zanusernamearr = array ();
		foreach ($query1->result() as $row1) {
			$askidarr[] = $row1->askid;
		}
		if (in_array($askid, $askidarr)) {
			$this->db->select('zanusername');
			$query = $this->db->get_where('askzanlist', array (
				'askid' => $askid
			));

			foreach ($query->result() as $row) {
				$zanusernamearr[] = $row->zanusername;
			}
			return $zanusernamearr;
		} else {
			$zanusernamearr[0] = 'k';
			return $zanusernamearr;
		}

	}

	function judgeanswerzan($answerid) {
		mysql_query("SET NAMES gb2312");
		$this->db->select('answerid');
		$query = $this->db->get('answerzanlist');
		$answeridarr = array ();
		$zanusernamearr = array ();
		foreach ($query->result() as $row) {
			$answeridarr[] = $row->answerid;
		}
		if (in_array($answerid, $answeridarr)) {
			$this->db->select('zanusername');
			$query1 = $this->db->get_where('answerzanlist', array (
				'answerid'=>$answerid
			));
			foreach ($query1->result() as $row1) {
				$zanusernamearr[] = $row1->zanusername;
			}
			return $zanusernamearr;
		} else {
			$zanusernamearr[0] = 'k';
			return $zanusernamearr;
		}

	}

	function adduser($askid, $zanusername) {
		mysql_query("SET NAMES gb2312");
		$arr = array (
			'askid' => $askid,
			'zanusername' => $zanusername
		);
		$this->db->insert('askzanlist', $arr);
	}

	function addansweruser($answerid, $zanusername) {
		mysql_query("SET NAMES gb2312");
		$arr = array (
			'answerid' => $answerid,
			'zanusername' => $zanusername
		);
		$this->db->insert('answerzanlist', $arr);
	}

	function countaskzanbyid($askid) {
		$query = $this->db->get_where('asks', array (
			'askid' => $askid
		));
		foreach ($query->result() as $row) {
			$askzannum = $row->askzan;
		}
		return $askzannum;
	}
	
	function findanswerzan($answerid){
		$query=$this->db->get_where('answerlist',array('answerid'=>$answerid));
		foreach($query->result() as $row){
			$answerzannum=$row->answerzan;
		}
		return $answerzannum;
	}
	
	function getaskusername($askid){
		mysql_query("SET NAMES gb2312");
		$query=$this->db->get_where('asks',array('askid'=>$askid));
		$askusername="";
		foreach($query->result() as $row){
			$askusername=$row->usernameforask;
		}
		return $askusername;
	}
	
	function getanswerusername($answerid){
		mysql_query("SET NAMES gb2312");
		$query=$this->db->get_where('answerlist',array('answerid'=>$answerid));
		$answerusername="";
		foreach($query->result() as $row){
			$answerusername=$row->usernameforanswer;
		}
		return $answerusername;
	}
	
	
	

}
?>