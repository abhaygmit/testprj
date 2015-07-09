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
	 
	function deleteSchedule($ruleId)
	{
		return $this->db->query("delete from apt_schedule where ruleset_id='$ruleId'");
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
	
	
	/*--------------getting data for generation schedule json--17-02-2014-----------------*/
	function getDataForStart($uid)
	{
		$query=$this->db->query("SELECT op_procedures.*, op_classes.id as classID, op_classes.time_attribute, op_classes.class_attribute, op_classes.color_code as colorCode, op_attributes.attribute as attributeName FROM op_procedures
								 LEFT JOIN op_classes ON op_classes.id = op_procedures.class_id
								 LEFT JOIN op_attributes ON op_attributes.id=op_classes.class_attribute
								 WHERE time_attribute = 'S' and op_procedures.user_id='$uid' ORDER BY op_procedures.proc_weight DESC");
		return $query->result_array();
	}
	function getDataForMid($uid)
	{
		$query=$this->db->query("SELECT op_procedures.*, op_classes.id as classID, op_classes.time_attribute, op_classes.class_attribute, op_classes.color_code as colorCode, op_attributes.attribute as attributeName FROM op_procedures 
								 LEFT JOIN op_classes ON op_classes.id = op_procedures.class_id
								 LEFT JOIN op_attributes ON op_attributes.id=op_classes.class_attribute
								 WHERE time_attribute = 'M' and op_procedures.user_id='$uid' ORDER BY op_procedures.proc_weight DESC");
		return $query->result_array();
	}
	function getDataForEnd($uid)
	{
		$query=$this->db->query("SELECT op_procedures.*, op_classes.id as classID, op_classes.time_attribute, op_classes.class_attribute, op_classes.color_code as colorCode, op_attributes.attribute as attributeName FROM op_procedures
								 LEFT JOIN op_classes ON op_classes.id = op_procedures.class_id
								 LEFT JOIN op_attributes ON op_attributes.id=op_classes.class_attribute
								 WHERE time_attribute = 'E' and op_procedures.user_id='$uid' ORDER BY op_procedures.proc_weight DESC");
		return $query->result_array();
	}
	function saveInitializedJson($uid, $rulset_id, $json)
	{
		@$dt=date('Y-m-d H:i:s');
		$data=array(
						'user_id'=>$uid,
						'ruleset_id'=>$rulset_id,
						'php_generated_JSON'=>$json,
						'created'=>$dt,
						'status'=>'1',
						'modified'=>$dt
					   );
		$this->db->insert('apt_schedule_json', $data);
	}
	
}
?>