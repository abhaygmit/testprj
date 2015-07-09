<?php
class Common_model extends CI_Model {

    function __construct()
    {
    		parent::__construct();
		$this->load->library('session');
	}
	
	
	function displayTextWithDefinedLength($str,$len,$stripTagFlag=false){
		if(!$stripTagFlag) $str = strip_tags($str);		
		if($str=='') return false;
		return (strlen($str)>$len ? substr($str,0,$len).'...' :$str);  
		
	}
	
	function changeColorCode($id)
	{
		$query=$this->db->query("update appointments set apt_color='3' where id='$id'");
		return query;
	}
	
	function getRuleset()
	{
			$uid=$this->session->userdata('logged_in');
			$query=$this->db->query("select * from rulesets where user_id='".$uid['id']."' and status='1'");
			return $query->result_array();
	}
	
	function getAllRuleset()
	{
			$uid=$this->session->userdata('logged_in');
			$query=$this->db->query("SELECT schetemp . * , dsets . *
									 FROM `apt_schedule_templates` schetemp
									 LEFT JOIN rulesets dsets ON dsets.id = schetemp.ruleset_id
									  order by schetemp.id desc");
			return $query->result_array();
	}
	function getAllRulesetByUserId()
	{
			$uid=$this->session->userdata('logged_in');
			$query=$this->db->query("SELECT schetemp . * , dsets . *
									 FROM `apt_schedule_templates` schetemp
									 LEFT JOIN rulesets dsets ON dsets.id = schetemp.ruleset_id WHERE dsets.user_id='".$uid['id']."'
									  order by schetemp.id desc");
			return $query->result_array();
	}
	
	
	/*function getAllScheduleByUserId()
	{
			$uid=$this->session->userdata('logged_in');
			$query=$this->db->query("SELECT  distinct(sc.ruleset_id), sc.cell_id, sc.doctor, sc.room, sc.chair, sc.apt_status, sc.created, sc.modified, sc.id, sc.user_id, sc.class_id, sc.procedure_id, sc.staff, sc.break, rulesets.ruleset_name, sct.start_time, sct.end_time, sct.no_doctors, sct.no_chairs, sct.no_of_staff, sct.no_of_rooms, sct.no_of_columns, sct.active_patient 
FROM apt_schedule sc LEFT JOIN rulesets on rulesets.id=sc.ruleset_id
LEFT JOIN apt_schedule_templates sct on sct.ruleset_id=sc.ruleset_id
 where sc.user_id='".$uid['id']."'
group by ruleset_id order by id desc ");
			return $query->result_array();
	}*/
	
	function getAllScheduleByUserId()
	{
			$uid=$this->session->userdata('logged_in');
			$query=$this->db->query("SELECT  distinct(sc.ruleset_id), sc.cell_id, sc.doctor, sc.room, sc.chair, sc.apt_status, sc.created, sc.modified, sc.id, sc.user_id, sc.class_id, sc.procedure_id, sc.staff, sc.break, rulesets.ruleset_name, sct.start_time, sct.end_time, sct.no_doctors, sct.no_chairs, sct.no_of_staff, sct.no_of_rooms, sct.no_of_columns, sct.active_patient 
FROM apt_schedule sc LEFT JOIN rulesets on rulesets.id=sc.ruleset_id
LEFT JOIN apt_schedule_templates sct on sct.ruleset_id=sc.ruleset_id
 where sc.user_id='".$uid['id']."'
group by ruleset_id order by id desc ");
			return $query->result_array();
	}
	
	
	
	function getRulesetData($id)
	{
			//$uid=$this->session->userdata('logged_in');
			$query=$this->db->query("SELECT schetemp . * , dsets . *
									 FROM `apt_schedule_templates` schetemp
									 LEFT JOIN rulesets dsets ON dsets.id = schetemp.ruleset_id
									 WHERE dsets.id='$id'
									  order by schetemp.id desc");
			return $result=$query->result_array();
			
	}
	
	function countryNm($name)
	{
		$sql=$this->db->query("select country from countries where ccode='$name'");
		return $sql->result();
	}
	function getRuleSetName($name)
	{
		$sql=$this->db->query("select ruleset_name from rulesets where ruleset_name='$name'");
		return $sql->result();
		
	}
	
	///***** data and year query ***********/
	function getMonthList($name)
	{
		$sql=$this->db->query("select * from date_time_master where type='$name' and status=1");
		return $sql->result();
		
	}
	
	function getMonthNameFromId($name,$num_val)
	{
		$sql=$this->db->query("select value from date_time_master where type='$name' and numeric_value=$num_val");
		return $sql->result();
		
	}
	
	function getAnalysisData($m, $y, $userID)
	{
		$query=$this->db->query("select * from apt_schedule_json where user_id='$userID' AND gen_month='$m' AND gen_year='$y'")->result_array();
		return $query;
	}
	
	function getAnalysisDataRange($sDate, $eDate, $userID)
	{
		$query=$this->db->query("select * from apt_schedule_json where user_id='$userID' AND concat( gen_year, '-', gen_month, '-', gen_date) BETWEEN '".$sDate."' AND '".$eDate."'")->result_array();
		return $query;
	}
	
	
	function getAnalysisDataRangeActual($sDate, $eDate, $userID)
	{
		$query=$this->db->query("select * from apt_schedule_json_actual where user_id='$userID' AND concat( gen_year, '-', gen_month, '-', gen_date) BETWEEN '".$sDate."' AND '".$eDate."'")->result_array();
		return $query;
	}
	
	function getSavedScheduleData($userID)
	{
		$query=$this->db->query("select * from apt_schedule_json_actual where user_id='$userID' order by id desc")->result_array();
		return $query;
	}
	 
	function getSavedScheduleDataByRuleID($ruleID, $userID)
	{
		$query=$this->db->query("select * from apt_schedule_json_actual where user_id='$userID' AND ruleset_id='$ruleID'")->result_array();
		return $query;
	}
	
	
	function getAnalysisAptByDateRange($sDate, $eDate, $userID)
	{
		//echo $sDate;
		$query=$this->db->query("SELECT *
								FROM practice_monthly_calendar
								WHERE user_id='$userID'
								AND working_date
								BETWEEN '$sDate'
								AND '$eDate'
								AND is_workable = 'y'")->result_array();
		
		return $query;
	}
	
}