<?php
class Myinfodb extends CI_Model {
	function __construct() {
		parent :: __construct();
		$this->load->database();
	}

	function findallmyquestion($username) {
		mysql_query("SET NAMES gb2312");
		$this->db->select("question,askzan,putasktime,askid");
		$query = $this->db->get_where('asks', array (
			'usernameforask' => $username
		));
		$questionarr = array ();
		$askzanarr = array ();
		$putasktimearr = array ();
		$askidarr = array ();
		foreach ($query->result() as $row) {
			$questionarr[] = $row->question;
			$askzanarr[] = $row->askzan;
			$putasktimearr[] = $row->putasktime;
			$askidarr[] = $row->askid;
		}

		$myquestion = array (
			'questionarr' => $questionarr,
			'askzanarr' => $askzanarr,
			'putasktimearr' => $putasktimearr,
			'askidarr' => $askidarr
		);

		return $myquestion;
	}

	function findmyquestion($username, $limit, $offset) {
		mysql_query("SET NAMES gb2312");
		$this->db->select("question,askzan,putasktime,askid");
		$query = $this->db->get_where('asks', array (
			'usernameforask' => $username
		), $limit, $offset);
		$questionarr = array ();
		$askzanarr = array ();
		$putasktimearr = array ();
		$askidarr = array ();
		foreach ($query->result() as $row) {
			$questionarr[] = $row->question;
			$askzanarr[] = $row->askzan;
			$putasktimearr[] = $row->putasktime;
			$askidarr[] = $row->askid;
		}

		$myquestion = array (
			'questionarr' => $questionarr,
			'askzanarr' => $askzanarr,
			'putasktimearr' => $putasktimearr,
			'askidarr' => $askidarr
		);

		return $myquestion;
	}

	function findallmyanswer($username) {
		mysql_query("SET NAMES gb2312");
		$this->db->select("answerzan,question,answerid,questionid,answertime");
		$query = $this->db->get_where('answerlist', array (
			'usernameforanswer' => $username
		));
		$answerzanarr = array ();
		$questionarr = array ();
		$answeridarr = array ();
		$questionidarr = array ();
		$answertimearr=array();
		foreach ($query->result() as $row) {
			$answerzanarr[] = $row->answerzan;
			$questionarr[] = $row->question;
			$answeridarr[] = $row->answerid;
			$questionidarr[] = $row->questionid;
			$answertimearr[]=$row->answertime;
		}
		$myanswer = array (
			'answerzanarr' => $answerzanarr,
			'questionarr' => $questionarr,
			'answeridarr' => $answeridarr,
			'questionidarr' => $questionidarr,
			'answertimearr'=>$answertimearr
		);
		
		return $myanswer;
	}
	
	function findmyanswer($username,$limit,$offset){
		mysql_query("SET NAMES gb2312");
		$this->db->select("answerzan,question,answerid,questionid,answertime");
		$query = $this->db->get_where('answerlist', array (
			'usernameforanswer' => $username
		),$limit,$offset);
		$answerzanarr = array ();
		$questionarr = array ();
		$answeridarr = array ();
		$questionidarr = array ();
		$answertimearr=array();
		foreach ($query->result() as $row) {
			$answerzanarr[] = $row->answerzan;
			$questionarr[] = $row->question;
			$answeridarr[] = $row->answerid;
			$questionidarr[] = $row->questionid;
			$answertimearr[]=$row->answertime;
		}
		$myanswer = array (
			'answerzanarr' => $answerzanarr,
			'questionarr' => $questionarr,
			'answeridarr' => $answeridarr,
			'questionidarr' => $questionidarr,
			'answertimearr'=>$answertimearr
		);
		
		return $myanswer;
	}
	
	function findallmyzan($username){
		mysql_query("SET NAMES gb2312");
		$answerzanquery=$this->db->get_where('answerlist',array('usernameforanswer'=>$username));
		$answerzannum=0;
		foreach($answerzanquery->result() as $row1){
			$answerzannum+=$row1->answerzan;
		}
		$askzanquery=$this->db->get_where('asks',array('usernameforask'=>$username));
		$askzannum=0;
		foreach($askzanquery->result() as $row2){
			$askzannum+=$row2->askzan;
			
		}
		$zancount=$answerzannum+$askzannum;
		return $zancount;
	}
	
	function myputzannum($username){
		mysql_query("SET NAMES gb2312");
		$putzantoanswer=$this->db->get_where('answerzanlist',array('zanusername'=>$username));
		$answerarr=array();
		foreach($putzantoanswer->result() as $row){
			$answerarr[]=$row->answerid;
		}
		$putanswerzannum=count($answerarr);
		$putzantoask=$this->db->get_where('askzanlist',array('zanusername'=>$username));
		$askarr=array();
		foreach($putzantoask->result() as $row2){
			$askarr[]=$row2->askid;
		}
		
		$putaskzannum=count($askarr);
		$putzancount=$putanswerzannum+$putaskzannum;
		return $putzancount;
	}
}
?>