<?php
class Opsetting_model extends CI_Model 
{
    function __construct()
    {
		parent::__construct();
		$this->load->library('session');
    }
    
    
  /*---------------Change Password----------------------------------------------*/
	 function getUserPass($id)
	 {
		 $query=$this->db->query("select * from users where id='$id'")->result_array();
		 return $query;
	 }
	 function changePass($post, $id)
	 {
		 	$dt=date('Y-m-d H:i:s');
		 	$data=array(
						'password'=>md5($post['new_pass']),
						'modified_by'=>$dt
						);
			$this->db->where('id', $id);
			$query=$this->db->update('users', $data); 
			return $query;
	 }
	 
	 function deletePicture($id)
		{
			$query=$this->db->query("update users set profile_image='' where id='$id'");
			return $query;
		}
		
	function getScheduleTime($id)
		{
			$query=$this->db->query("select * from schedule_time_master where 1")->result_array();
			return $query;
		}
	function getScheduleTimeByUserId($id)
		{
			$query=$this->db->query("select * from schedule_time_master where user_id='$id' and status='1'")->result_array();
			return $query;
		}
	function getScheduleLogByUserId($id)
		{
			$query=$this->db->query("select log.*, log.created as cDate, log.modified as mDate, master.* from schedule_time_master master
			RIGHT JOIN schedule_time_log log on log.schedule_id=master.id where log.user_id='$id' order by log.id desc")->result_array();
			return $query;
		}	
	function getScheduleTimeById($id)
		{
			$query=$this->db->query("select * from schedule_time_master where id='$id'")->result_array();
			return $query;
		}
	function add_edit_scheduleTime($post, $id=null)
	{
		$userid=$this->session->userdata('logged_in');	
		@$dt=date('Y-m-d H:i:s');
		/*if($id!=''){
			
			$data=array(
						'user_id'=>$userid['id'],
						'schedule_time_intvl'=>$_POST['scheduleT'],
						'description'=>$post['desc'],
						'stagger_chair'=>$post['staggerChair'],
						'same_day_start'=>$post['offerSameDay'],
						'other_apt_avg'=>($post['otherApt']!=''?$post['otherApt']:'0'),
						'status'=>1,
						'modified'=>$dt
						
					);
			$scheduleTimeLog=array(
						'user_id'=>$userid['id'],
						'schedule_time'=>$_POST['scheduleT'],
						'description'=>$post['desc'],
						'modified'=>$dt,
						'created'=>$dt
					);
			$this->db->insert('schedule_time_log', $scheduleTimeLog);				
			$this->db->where('id', $id);
			return $this->db->update('schedule_time_master', $data);
			
		}*/
		//else{
		$data=array(
						'user_id'=>$userid['id'],
						//'schedule_time_intvl'=>$_POST['scheduleT'],
						'description'=>$post['desc'],
						'stagger_chair'=>$post['staggerChair'],
						'same_day_start'=>$post['offerSameDay'],
						'other_apt_avg'=>($post['otherApt']!=''?$post['otherApt']:'0'),
						'status'=>1,
						'modified'=>$dt,
						'created'=>$dt

						
					);
					
		
			$this->db->insert('schedule_time_master', $data);
			return $this->db->insert_id();		
		//}
			
	}
	
	
	function addScheduleTimeLog($post, $id)
	{
		//pr($post); exit;
		$userid=$this->session->userdata('logged_in');	
		@$dt=date('Y-m-d H:i:s');
		$scheduleTimeLog=array(
						'user_id'=>$userid['id'],
						'schedule_id'=>$id,
						//'schedule_time'=>$_POST['scheduleT'],
						'description'=>$post['desc'],
						'stg'=>$_POST['staggerChair'],
						'same_day'=>$_POST['offerSameDay'],
						'other_avg'=>($_POST['otherApt']!=''?$_POST['otherApt']:'0'),
						'modified'=>$dt,
						'created'=>$dt
					);
			$this->db->insert('schedule_time_log', $scheduleTimeLog);					
	}
	
	
	function delteScheduleTime($id)
	{
		//$this->db->where('id', $id);
		return $this->db->query("delete from schedule_time_master where user_id='$id'");
	}
	
	function getMaxScheduleTime($id)
	{
		//$this->db->where('id', $id);
		return $this->db->query("select max(id) as id from schedule_time_master where user_id='$id'")->result_array();
	}
	
	function getScheduleTimeByMaxId($id)
	{
		//$this->db->where('id', $id);
		$sql=$this->db->query("select * from schedule_time_master where id='$id'")->result_array();
		//pr($sql);exit;
		return $sql;
	}
	
	}
	
	
	
?>