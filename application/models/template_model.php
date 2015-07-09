<?php
class Template_model extends CI_Model 
{
    function __construct()
    {
		parent::__construct();
		$this->load->library('session');
		//ini_set('date.timezone', 'Asia/Calcutta');
    }
    
    
    /* Add new dataset
     * 
     * 
     */
	function insert_datarule($post)
	{
		@$dt=date('Y-m-d H:i:s'); 
		@$validto=date('Y-m-d H:i:s', strtotime('+1 year', strtotime($dt)));
		$uid=$this->session->userdata('logged_in');
		//@$rulenm=date('D d M Y');
		//pr($post); exit;
		 $data=array(
		 				'ruleset_name'=>$post['dsetName'],
						'user_id'=>$uid['id'],
						'status'=>'1',
						'valid_from'=>@$dt,
						'valid_to' =>@$validto
		  			);
			$result=$this->db->insert('rulesets', $data);
			return $this->db->insert_id(); 
	 }
	 
	function insert_template($ruleid, $post)
	{
		@$dt=date('Y-m-d H:i:s');
		$data=array(
		 				'ruleset_id'=>$ruleid,
						'tx_id'=>1,
						'tx_length'=>1,
						
						'no_doctors' =>$post['noDoc'],
						'no_chairs'=>$post['noChair'],
						'no_of_staff'=>$post['noStaff'],
						'no_of_rooms'=>$post['noRoom'],
						'no_of_columns'=>$post['noCol'],
						'active_patient'=>$post['activeP'],
						'start_time'=>$post['startTime'],
						'end_time'=>$post['endTime'],
						
						'status'=>'1',
						'created'=>$dt,
						'modified'=>$dt
						
		  			);
			return $result=$this->db->insert('apt_schedule_templates', $data);
			
	 }
	 
	function insert_template_data($ruleid, $chair, $stTm, $enTm, $post)
	{
		@$dt=date('Y-m-d H:i:s');
		$data=array(
		 				'ruleset_id'=>$ruleid,
						'doctor'=>$chair,
						'chair' =>$chair,
						'start_time'=>$stTm,
						'end_time'=>$enTm,
						'status'=>'1',
						'created'=>$dt,
						'modified'=>$dt
						
		  			);
			return $result=$this->db->insert('schedule_data', $data);
			
	 }
	function save_schedule($cellId, $post)
	{
		//pr($post);exit;
		@$dt=date('Y-m-d H:i:s');
		$userid=$this->session->userdata('logged_in');
		$data=array(
		 				'ruleset_id'=>$post['rulesetId'],
						'user_id'=>$userid['id'],
						'cell_id'=>$cellId,
						'class_name'=>$post['class']?$post['class']:'',
						'procedure_name'=>$post['procedure']?$post['procedure']:'',
						'doctor'=>$post['doctor']?$post['doctor']:'',
						'chair' =>$post['chair']?$post['chair']:'',
						'room'=>$post['room']?$post['room']:'',
						'staff' =>$post['assistant']?$post['assistant']:'',
						'break'=>$post['breaks']?$post['breaks']:'',
						//'apt_time' =>$post['aptTime'],
						'apt_status'=>'1',
						'created'=>@$dt,
						'modified'=>@$dt
						
		  			);
			return $result=$this->db->insert('apt_schedule', $data);
			
	 }
	 
	 function saveActualScheduleJson($userid, $post)
	 {
		 @$dt=date('Y-m-d H:i:s');
		 $gridData=json_decode($post);
		 //pr($gridData); exit;
		 $data=array(
		 				'user_id'=>$userid,
						'ruleset_id'=>$gridData->rulesetId,
						'save_actual_JSON'=>$post,
						'gen_month'=>$gridData->month,
						'gen_year'=>$gridData->year,
						'gen_date'=>$gridData->day,
						'working_date'=>$gridData->year.'-'.$gridData->month.'-'.$gridData->day,
						'created'=>$dt,
						'status'=>1,
						'modified'=>$dt
		 				
		 			);
					
			return $this->db->insert('apt_schedule_json_actual', $data);
			
	 }
	 
	function deleteSchedule($ruleId, $user_id)
	{
		//return $this->db->query("delete from apt_schedule where ruleset_id='$ruleId'");
		return $this->db->query("delete from apt_schedule_json_actual where ruleset_id='$ruleId' AND user_id='$user_id'");
	}
	 
	function getStaffDetails($id)
	{
			$query=$this->db->query("select * from op_staff where user_id='$id' and status='1'")->result_array();
			return $query;
		}
		
	function getRoomsDetails($id)
	{
			$query=$this->db->query("select * from op_rooms where user_id='$id' and status='1'")->result_array();
			return $query;
		}
	function getBreaksDetails($id)
	{
			$query=$this->db->query("select * from op_time_interval where user_id='$id' and status='1'")->result_array();
			return $query;
		}
	function getDoctorDetails($id)
	{
			$query=$this->db->query("select * from doctors where user_id='$id' and status='1'")->result_array();
			return $query;
		}
		
		
	function getTxClassDetails($id)
	{
			$query=$this->db->query("select * from op_classes where status='1'")->result_array();
			return $query;
	}
	function getProcDetails($id)
	{
			$query=$this->db->query("select * from op_procedures where status='1'")->result_array();
			return $query;
	}
	function getSavedSchedule($rulesetId)
	{
			$query=$this->db->query("select * from apt_schedule where ruleset_id='$rulesetId'")->result_array();
			return $query;
	}
	
	function getActualScheduleJson($rulesetId, $userID)
	{
			$query=$this->db->query("select * from apt_schedule_json_actual where ruleset_id='$rulesetId' AND user_id='$userID'")->result_array();
			return $query;
	}
	
	
	/*--------------getting data for generation schedule json--17-02-2014-----------------*/
	function getDataForStart($uid, $tmIntvl)
	{
		$query=$this->db->query("SELECT op_procedures.*, op_classes.id as classID, op_classes.time_attribute, op_classes.class_attribute, op_classes.color_code as colorCode, op_attributes.attribute as attributeName FROM op_procedures
								 LEFT JOIN op_classes ON op_classes.id = op_procedures.class_id
								 LEFT JOIN op_attributes ON op_attributes.id=op_classes.class_attribute
								 WHERE op_classes.time_attribute = 'S' and op_procedures.user_id='$uid' AND op_classes.status=1 AND op_procedures.status=1 AND op_procedures.proc_time_interval ='$tmIntvl' AND op_procedures.status='1' ORDER BY op_procedures.proc_weight DESC");
		return $query->result_array();
	}
	function getDataForMid($uid, $tmIntvl)
	{
		$query=$this->db->query("SELECT op_procedures.*, op_classes.id as classID, op_classes.time_attribute, op_classes.class_attribute, op_classes.color_code as colorCode, op_attributes.attribute as attributeName FROM op_procedures 
								 LEFT JOIN op_classes ON op_classes.id = op_procedures.class_id
								 LEFT JOIN op_attributes ON op_attributes.id=op_classes.class_attribute
								 WHERE op_classes.time_attribute = 'M' and op_procedures.user_id='$uid' AND op_classes.status=1 AND op_procedures.status=1 AND op_procedures.proc_time_interval ='$tmIntvl' AND op_procedures.status='1' ORDER BY op_procedures.proc_weight DESC");
		return $query->result_array();
	}
	function getDataForEnd($uid, $tmIntvl)
	{
		$query=$this->db->query("SELECT op_procedures.*, op_classes.id as classID, op_classes.time_attribute, op_classes.class_attribute, op_classes.color_code as colorCode, op_attributes.attribute as attributeName FROM op_procedures
								 LEFT JOIN op_classes ON op_classes.id = op_procedures.class_id
								 LEFT JOIN op_attributes ON op_attributes.id=op_classes.class_attribute
								 WHERE op_classes.time_attribute = 'E' and op_procedures.user_id='$uid' AND op_classes.status=1 AND op_procedures.status=1 AND op_procedures.proc_time_interval ='$tmIntvl' AND op_procedures.status='1' ORDER BY op_procedures.proc_weight DESC");
		return $query->result_array();
	}
	
	
	
	function saveInitializedJson($uid, $rulset_id, $json, $m, $y, $d)
	{
		@$dt=date('Y-m-d H:i:s');
		$chk=$this->db->query("select * from apt_schedule_json where user_id='$uid' AND gen_month='$m' AND gen_year='$y' AND gen_date='$d'")->result_array();
		$data=array(
						'user_id'=>$uid,
						'ruleset_id'=>$rulset_id,
						'php_generated_JSON'=>$json,
						'gen_month'=>$m,
						'gen_year'=>$y,
						'gen_date'=>$d,
						'created'=>$dt,
						'status'=>'1',
						'modified'=>$dt
					   );
		if(count($chk)>0){
		$this->db->query("delete from apt_schedule_json where user_id='$uid' AND gen_month='$m' AND gen_year='$y' AND gen_date='$d'");
		$this->db->insert('apt_schedule_json', $data);	
		
		}
		else{
		$this->db->insert('apt_schedule_json', $data);
		}
	}
	function getInitializedJson($uid, $rulset_id)
	{
		$query=$this->db->query("select * from apt_schedule_json where user_id='".$uid."' AND ruleset_id='".$rulset_id."'")->result_array();
		return $query;
	}
	
}
?>