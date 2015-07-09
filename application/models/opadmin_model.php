<?php
class Opadmin_model extends CI_Model 
{
    function __construct()
    {
		parent::__construct();
		$this->load->library('session');
    }
    
    
 
	/*--------- Tx Procedure Region----------------------------------------------------*/	
		
	
	
	
	function updateAssignDoc($procId, $dsc)
	{
		//pr($dsc);
		//pr($procId);
		$userid=$this->session->userdata('logged_in');	
		@$dt=date('Y-m-d H:i:s');
		$data=array(
						'description'=>($dsc!='')?$dsc:''
						
					);
		$this->db->where('id', $procId);
		return $this->db->update('doctor_to_procedure', $data);
		
	}
	function updateAssignDocTime($procId, $dsc)
	{
		$userid=$this->session->userdata('logged_in');	
		@$dt=date('Y-m-d H:i:s');
		$data=array(
						'assign_time'=>($dsc!='')?$dsc:''
						
					);
		$this->db->where('id', $procId);
		return $this->db->update('doctor_to_procedure', $data);
		
	}
	
	
	function getAssignDoc($userid, $procID)
	{
		$query=$this->db->query("select * from doctor_to_procedure where user_id='$userid' and proc_id='$procID'")->result_array();
		return $query;
	}
	
	function delteProcedure($id)
	{
		//$this->db->where('id', $id);
		return $this->db->query("delete from op_procedures where id='$id'");
	}
	
	
	
	/*--------- Doctor Management----------------------------------------------------*/	
		
	function getPropList()
		{
			$query=$this->db->query("select * from propositions where 1")->result_array();
			return $query;
		}
	function getDoctorDetailsById($id)
		{
			$query=$this->db->query("select * from doctors where id='$id'")->result_array();
			return $query;
		}
	function getPropDetailsById($id)
		{
			$query=$this->db->query("select * from propositions where id='$id'")->result_array();
			return $query;
		}
	function getDoctorsTimeAllot($id)
		{
			$query=$this->db->query("select * from doctors where user_id='$id' and status='1'")->result_array();
			return $query;
		}	
	function add_edit_doctor($post, $id=null)
	{
		@$dt=date('Y-m-d H:i:s');
		$uid=$this->session->userdata('logged_in');
		$countDoc=$this->db->query("select id from doctors where user_id='".$uid['id']."'")->result_array();
		$cDoc=count($countDoc);
		//echo $cDoc; 
		$d='d'.($cDoc+1);
		//exit;
		if($id!=''){
			
			$data=array(
						'user_id'=>$uid['id'],
						'doctor_name'=>$_POST['docName'],
						'doctor_email'=>$_POST['email'],
						'working_hours'=>$_POST['hourworks'],
						'doctor_phone'=>$_POST['phone'],
						'doctor_emergency_phone'=>$_POST['emergency_phone'],
						'doctor_qualification'=>$_POST['qualification'],
						'doctor_address1'=>$_POST['address'],
						'doctor_city'=>$_POST['city'],
						'doctor_state'=>$_POST['state'],
						'doctor_zipcode'=>$_POST['zip'],
						'status'=>$_POST['status'],
						'modified_by'=>$dt
						
					);
			$this->db->where('id', $id);
			return $this->db->update('doctors', $data);
			
		}
		else{
		$data=array(
						'user_id'=>$uid['id'],
						'doctor_name'=>$_POST['docName'],
						'doctor_code'=>$d,
						'doctor_email'=>$_POST['email'],
						'working_hours'=>$_POST['hourworks'],
						'doctor_phone'=>$_POST['phone'],
						'doctor_emergency_phone'=>$_POST['emergency_phone'],
						'doctor_qualification'=>$_POST['qualification'],
						'doctor_address1'=>$_POST['address'],
						'doctor_city'=>$_POST['city'],
						'doctor_state'=>$_POST['state'],
						'doctor_zipcode'=>$_POST['zip'],
						'status'=>$_POST['status'],
						'modified_by'=>$dt,						
						'created_by'=>$dt,

						
					);
			return $this->db->insert('doctors', $data);
					
		}
			
	}
	
	function deleteDoctor($id)
	{
		//$this->db->where('id', $id);
		return $this->db->query("delete from doctors where id='$id'");
	}
	
	
	/*---------Treatment Region----------------------------------------------------*/	
		
	function getTreatmentDetails($id)
		{
			$query=$this->db->query("select * from treatment_type where 1")->result_array();
			return $query;
		}
	function getTreatmentDetailsByUserId($id)
		{
			$query=$this->db->query("select * from treatment_type where user_id='$id'")->result_array();
			return $query;
		}
	function getTreatmentDetailsById($id)
		{
			$query=$this->db->query("select * from treatment_type where id='$id'")->result_array();
			return $query;
		}
	function add_edit_treatment($post, $id=null)
	{
		$userid=$this->session->userdata('logged_in');
		@$dt=date('Y-m-d H:i:s');
		if($id!=''){
			
			$data=array(
						'user_id'=>$userid['id'],
						'procedure_id'=>$_POST['proc_id'],
						'treatment_name'=>$_POST['treatName'],
						'tx_Avg_time'=>$_POST['treatTime'],
						//'procedure_length_in_minutes'=>$_POST['procLength'],
						'price'=>$_POST['price'],
						'status'=>$_POST['status'],
						'modified'=>$dt
						
					);
			$this->db->where('id', $id);
			return $this->db->update('treatment_type', $data);
			
		}
		else{
		$data=array(
						'user_id'=>$userid['id'],
						'procedure_id'=>$_POST['proc_id'],
						'treatment_name'=>$_POST['treatName'],
						'tx_Avg_time'=>$_POST['treatTime'],
						'price'=>$_POST['price'],
						'status'=>$_POST['status'],
						'modified'=>$dt,
						'created'=>$dt,

						
					);
			return $this->db->insert('treatment_type', $data);
					
		}
			
	}
	
	function delteTreatment($id)
	{
		//$this->db->where('id', $id);
		return $this->db->query("delete from treatment_type where id='$id'");
	}
	
	
	
	/*--------- Time Interval for Breaks Region----------------------------------------------------*/	
		
	function getBreakDetails($id)
		{
			$query=$this->db->query("select * from op_time_interval where 1")->result_array();
			return $query;
		}
		function getBreakDetailsByUserId($id)
		{
			$query=$this->db->query("select * from op_time_interval where user_id='$id' and status='1'")->result_array();
			return $query;
		}
		function getBreakDetailsList($id)
		{
			$query=$this->db->query("select * from op_time_interval where user_id='$id'")->result_array();
			return $query;
		}
	function getBreakDetailsById($id)
		{
			$query=$this->db->query("select * from op_time_interval where id='$id'")->result_array();
			return $query;
		}
	function add_edit_break($post, $id=null)
	{
		@$dt=date('Y-m-d H:i:s');
		$userid=$this->session->userdata('logged_in');
		if($id!=''){
			
			$data=array(
						'user_id'=>$userid['id'],	
						'break_type'=>$_POST['breakType'],
						'description'=>$_POST['description'],
						'time_interval'=>$_POST['tmInterval'],
						'no_of_breaks_allowed'=>$_POST['noOfBreaks'],
						'break_time'=>$_POST['applyTime'],
						'SME_option'=>$_POST['timeAttribute'],
						'color_code'=>$_POST['colorCode'],
						'status'=>$_POST['status'],
						'modified'=>$dt
						
					);
			$this->db->where('id', $id);
			return $this->db->update('op_time_interval', $data);
			
		}
		else{
		$data=array(
						'user_id'=>$userid['id'],	
						'break_type'=>$_POST['breakType'],
						'description'=>$_POST['description'],
						'time_interval'=>$_POST['tmInterval'],
						'no_of_breaks_allowed'=>$_POST['noOfBreaks'],
						'break_time'=>$_POST['applyTime'],
						'SME_option'=>$_POST['timeAttribute'],
						'color_code'=>$_POST['colorCode'],
						'status'=>$_POST['status'],
						'modified'=>$dt,
						'created'=>$dt,

						
					);
			return $this->db->insert('op_time_interval', $data);
					
		}
			
	}
	
	function delteBreak($id)
	{
		//$this->db->where('id', $id);
		return $this->db->query("delete from op_time_interval where id='$id'");
	}
	
	


	/*--------- Tx Staff Region----------------------------------------------------*/
	
	function getStaffDetails($id)
		{
			$query=$this->db->query("select * from op_staff where user_id='$id'")->result_array();
			return $query;
		}
		
		/*--------- Tx Room Region----------------------------------------------------*/
	function getRoomsDetails($id)
		{
			$query=$this->db->query("select * from op_rooms where user_id='$id'")->result_array();
			return $query;
		}
		
		
	/*--------------Schedule Calendar Region---------------------------------*/		
	
	function saveWorkingDays($post, $uid)
	{
		
		@$dt=date('Y-m-d H:i:s');
		$working_date=$post['year'].'-'.$post['month'].'-'.$post['date'];
		$data=array(
						'user_id'=>$uid,
						'month'=>$post['month'],
						'year'=>$post['year'],
						'date'=>($post['date'])?$post['date']:'0',
						'day'=>($post['day'])?$post['day']:'0',
						'working_date'=>$working_date,
						'is_workable'=>$post['is_workable'],
						//'is_weekly'=>($post['weekly'])?$post['Weekly']:'monthly',
						'status'=>'1',
						'modified'=>$dt,
						'created'=>$dt,
				
					);
			 $this->db->insert('practice_monthly_calendar', $data);
			return $this->db->insert_id();	
	
	}
	
	function isMonthDayExist($uid, $date, $day, $month, $year){
		$query=$this->db->query("select * from practice_monthly_calendar where user_id='$uid' and day='$day' AND date = '$date' AND month='$month' and year='$year'")->result_array();
		if(count($query)>0) return $query[0]['id'];
		return false;	
	}
	
	
	function isDayExist($uid, $day, $month, $year){
		$query=$this->db->query("select * from practice_monthly_calendar where user_id='$uid' and day='$day' AND month='$month' and year='$year'")->result_array();
		if(count($query)>0) return $query[0]['id'];
		return false;	
	}
	
	
	function getWorkingDays($id, $m, $y){
			$query=$this->db->query("select * from practice_monthly_calendar where user_id='$id' and month='$m' and year='$y'")->result_array();
			return $query;
	}
	
	function getWorkingDaysOnly($id, $m, $y){
			$query=$this->db->query("select * from practice_monthly_calendar where user_id='$id' and month='$m' and year='$y' And is_workable='Y'")->result_array();
			return $query;
	}
	
	
	function getSingleDayDetails($id, $m, $y, $d){
		$query=$this->db->query("select * from practice_monthly_calendar where user_id='$id' and date='$d' and month='$m' and year='$y' ")->result_array();
		return $query;
	}	
		
	function getSumWorkHour($id, $m, $y, $sum)
		{
			$query=$this->db->query("select working_hours as working_hours from practice_monthly_calendar where user_id='$id' and month='$m' and year='$y' and day='$sum' group by user_id")->result_array();
			return $query;
		}	
	
	/*function getWeeklyData($id, $m, $y)
		{
			$query=$this->db->query("select sum(working_hours) as working_hours from practice_monthly_calendar where user_id='$id' and month='$m' and year='$y' and day='$sum' group by user_id")->result_array();
			return $query;
		}	*/
	
			
		
	function deleteWorkingDays($id, $m, $y)
		{
			$query=$this->db->query("delete from practice_monthly_calendar where user_id='$id' and month='$m' and year='$y'")->result_array();
			return $query;
		}	
		
	
	/*function saveMonthly($post, $uid)
	{
		@$dt=date('Y-m-d H:i:s');
		
		$data=array(
						'user_id'=>$uid,
						'working_day_id'=>$post['work_day_id'],
						'month'=>$post['month1'],
						'year'=>$post['year'],
						'calendar_by'=>$post['calendar_type'],
						'no_monday'=>($post['mon_day'])?$post['mon_day']:'0',
						'no_tuesday'=>($post['tue_day'])?$post['tue_day']:'0',
						'no_wednesday'=>($post['wed_day'])?$post['wed_day']:'0',
						'no_thursday'=>($post['thu_day'])?$post['thu_day']:'0',
						'no_friday'=>($post['fri_day'])?$post['fri_day']:'0',
						'no_saturday'=>($post['sat_day'])?$post['sat_day']:'0',
						'no_sunday'=>($post['sun_day'])?$post['sun_day']:'0',
						'mon_hours'=>($post['mon_hour'])?$post['mon_hour']:'0',
						'tue_hours'=>($post['tue_hour'])?$post['tue_hour']:'0',
						'wed_hours'=>($post['wed_hour'])?$post['wed_hour']:'0',
						'thu_hours'=>($post['thu_hour'])?$post['thu_hour']:'0',
						'fri_hours'=>($post['fri_hour'])?$post['fri_hour']:'0',
						'sat_hours'=>($post['sat_hour'])?$post['sat_hour']:'0',
						'sun_hours'=>($post['sun_hour'])?$post['sun_hour']:'0',
						
						
						'modified'=>$dt,
						'created'=>$dt,
				
					);
			 $this->db->insert('schedule_calendar', $data);
			return $this->db->insert_id();	
	
	}*/
	
	function saveMonthly($post, $uid, $dayId, $wHour)
	{
		@$dt=date('Y-m-d H:i:s');
		
		$data=array(
						'user_id'=>$uid,
						'working_hours'=>$wHour,
						'is_weekly'=>'monthly',
						'modified'=>$dt
				);
			$this->db->where(array('day'=>$dayId, 'month'=>$post['month1'], 'year'=>$post['year'], 'user_id'=>$uid));
			return $this->db->update('practice_monthly_calendar', $data);
	
	}
	
	function updateDayEntry($id, $isWorkable, $working_date){
		
		@$dt=date('Y-m-d H:i:s');
		$data=array('is_workable'=>$isWorkable, 'modified'=>$dt);
		$this->db->where(array('id'=>$id));
		return $this->db->update('practice_monthly_calendar', $data);
	
	}
	
	function updateMonthlyEntry($id, $wHour){
		@$dt=date('Y-m-d H:i:s');
		$data=array('working_hours'=>$wHour, 'modified'=>$dt, 'is_weekly'=>'monthly');
		$this->db->where(array('id'=>$id));
		return $this->db->update('practice_monthly_calendar', $data);
	
	}
	
	
	function saveWeekly($post, $uid, $dayId, $wHour)
	{
		@$dt=date('Y-m-d H:i:s');
		
		$data=array(
						'user_id'=>$uid,
						'working_hours'=>$wHour,
						'is_weekly'=>'weekly',
						'modified'=>$dt
				);
			$this->db->where(array('date'=>$dayId, 'month'=>$post['month2'], 'year'=>$post['year2'], 'user_id'=>$uid));
			return $this->db->update('practice_monthly_calendar', $data);
	
	}
	
	function add_edit_inputs($post, $id='')
	{		
		
		@$dt=date('Y-m-d H:i:s');
		$uid=$this->session->userdata('logged_in');
		if($id!=''){
				$data=array(
						'user_id'=>$uid['id'],
						'month'=>$post['month'],
						'year'=>$post['year'],
						'estimated_treatment_length'=>$post['e_tx_len'],
						'estimated_conversion_rate'=>$post['e_conv_rate'],
						'annual_growth_decline_goal'=>$post['annual_goal'],
						'average_treatment_interval'=>$post['avg_tx_intvl'],
						'active_patients'=>$post['active_P'],
						'number_of_clinical_chairs'=>$post['no_chairs'],
						'number_of_exam_rooms'=>$post['no_rooms'],
						'number_of_doctor'=>$post['no_docs'],
						'average_tx_fee'=>$post['avg_tx_fee'],
						'calculated_completions_per_month'=>$post['completion_per_month'],
						'calculated_average_starts_per_month'=>$post['avg_start_per_month'], 
						'status'=>'Y',
						//'created_by'=>$dt,
						'modified_by'=>$dt
						
						
					);
			$this->db->where('id', $id);
			return $this->db->update('manage_practice_inputs', $data);
			
		}
		else{
		$data=array(
						'user_id'=>$uid['id'],
						'month'=>$post['month'],
						'year'=>$post['year'],
						'estimated_treatment_length'=>$post['e_tx_len'],
						'estimated_conversion_rate'=>$post['e_conv_rate'],
						'annual_growth_decline_goal'=>$post['annual_goal'],
						'average_treatment_interval'=>$post['avg_tx_intvl'],
						'active_patients'=>$post['active_P'],
						'number_of_clinical_chairs'=>$post['no_chairs'],
						'number_of_exam_rooms'=>$post['no_rooms'],
						'number_of_doctors'=>$post['no_docs'],
						'average_tx_fee'=>$post['avg_tx_fee'],
						'calculated_completions_per_month'=>$post['completion_per_month'],
						'calculated_average_starts_per_month'=>$post['avg_start_per_month'], 
						'status'=>'s',
						'created_by'=>$dt,
						'modified_by'=>$dt
						

						
					);
			return $this->db->insert('manage_practice_inputs', $data);
					
		}
			
	
	}
	
	function add_edit_doc_percent($post, $id='')
	{		
		
		@$dt=date('Y-m-d H:i:s');
		$uid=$this->session->userdata('logged_in');
		if($id!=''){
				$data=array(
						'user_id'=>$uid['id'],
						'doctors'=>'Doctor'.$post['doctor'],
						'time_percent'=>$post['docTime'],
						'month'=>$post['month'],
						'year'=>$post['year'],
						'status'=>'1',
						'modified'=>$dt
						
						
					);
			$this->db->where('id', $id);
			return $this->db->update('doctor_time_in_percent', $data);
			
		}
		else{
		$data=array(
						'user_id'=>$uid['id'],
						'doctors'=>'Doctor'.$post['doctor'],
						'time_percent'=>$post['docTime'],
						'month'=>$post['month'],
						'year'=>$post['year'],
						'status'=>'1',
						'created'=>$dt,
						'modified'=>$dt
						
					);
			return $this->db->insert('doctor_time_in_percent', $data);
					
		}
			
	
	}
	
	function getInputs($m, $y, $uid)
	{
		$query=$this->db->query("select * from manage_practice_inputs where user_id='$uid' and month='$m' and year='$y' order by id desc limit 0,1")->result_array();
		return $query;
	}
	
	
	
	function getPracticeInputs($m, $y, $uid)
	{
		$query=$this->db->query("select * from manage_practice_inputs where user_id='$uid' and month='$m' and year='$y'")->result_array();
		return $query;
	}
	
	/*-----------Attributes---------------*/
	function getAttributeList()
	{
			$query=$this->db->query("select * from op_attributes where status='1'");
			return $query->result_array();
	}
	function getDocPercent($m, $y, $uid)
	{
		$q=$this->db->query("SELECT * FROM doctor_time_in_percent WHERE user_id='$uid' AND month='$m' AND year='$y'");
		return $q->result_array();
	}
	
	function getActualWorkingDays($uid, $m, $y)
	{
		$query=$this->db->query("select count(id) as workingD from practice_monthly_calendar where user_id='$uid' and month='$m' and year='$y' and is_workable='Y'");
		return $query->result_array();
	}
	
	
	
	
	
}
?>