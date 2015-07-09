<?php 
include("connect.php");
class Template extends CI_Controller 
{
    
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('login_model', 'common_model', 'users_model', 'template_model', 'opadmin_model', 'opsetting_model')); 
		//$this->load->library(array('session', 'form_validation', 'test'));
        $this->load->library(array('session', 'form_validation'));
		$this->load->helper(array('form', 'url', 'captcha', 'common'));
		
	}
 	function index()
	{
	}
	function convertToHoursMins($time, $format = '%d:%d') {
    settype($time, 'integer');
    if ($time < 1) {
        return;
    }
    $hours = floor($time / 60);
    $minutes = ($time % 60);
    return sprintf($format, $hours, $minutes);
}
function h2m($hours) { 
            $t = EXPLODE(".", $hours); 
            $h = $t[0]; 
            IF (ISSET($t[1])) { 
                $m = $t[1]; 
            } ELSE { 
                $m = "00"; 
            } 
            $mm = ($h * 60)+$m; 
            return $mm; 
    } 
	
	function createDataset()
	{
		if($this->session->userdata('logged_in')==''):
		redirect(site_url(home/index));
		endif;
		$uid=$this->session->userdata('logged_in');
		if($_POST['dset'][0]==$this->config->item('dataset_btn_value'))
		{
			//save ruleset data in database and get inster id//
			$insid=$this->template_model->insert_datarule($_POST);
			//-------------------------------------------------------//
			$mdy=explode('/', $_POST['selectDt']);
			$m=$mdy[0];
			$y=$mdy[2];
			$d=$mdy[1];
			
			$query=$this->opadmin_model->getPracticeInputs($m, $y, $uid['id']);
			$qSetting=$this->opsetting_model->getScheduleTimeByUserId($uid['id']);
			$docTimeInPer=$this->opadmin_model->getDocPercent($m, $y, $uid['id']);
			$getWorkingD=$this->opadmin_model->getWorkingDaysOnly($uid['id'], $m, $y);
			///pr($docTimeInPer);
			//$breaks=$this->template_model->getBreaksDetails($uid['id']);
			
			$startProcs=$this->template_model->getDataForStart($uid['id']);
			$midProcs=$this->template_model->getDataForMid($uid['id']);
			$endProcs=$this->template_model->getDataForEnd($uid['id']);
			
			
			//-----save template data in database ----------------//
			
			$_POST['noDoc']=$query[0]['number_of_doctors'];
			$_POST['noChair']=$query[0]['number_of_clinical_chairs'];
			$_POST['noStaff']='0';
			$_POST['noRoom']=$query[0]['number_of_exam_rooms'];
			$_POST['activeP']=$query[0]['active_patients'];
			$insid1=$this->template_model->insert_template($insid, $_POST);
			//---------------------------------------------------------------//
			
		if(count($query) > 0){
		
		$examNeeded=($query[0]['calculated_average_starts_per_month']/($query[0]['estimated_conversion_rate']/100));
		$startNeeded=$query[0]['calculated_average_starts_per_month'];
		$treatmentNeeded=((($query[0]['calculated_average_starts_per_month']-$query[0]['calculated_completions_per_month'])+$query[0]['active_patients'])*(52/$query[0]['average_treatment_interval'])/12);
		$finishNeeded=($query[0]['active_patients']/$query[0]['estimated_treatment_length']);
		
		$recordNeeded=$startNeeded;
		$otherNeeded=($examNeeded+$startNeeded+$treatmentNeeded+$finishNeeded+$recordNeeded)/((100-$qSetting[0]['other_apt_avg'])/100)-($examNeeded+$startNeeded+$treatmentNeeded+$finishNeeded+$recordNeeded);
		$totalApt=($examNeeded+$startNeeded+$treatmentNeeded+$finishNeeded+$recordNeeded+$otherNeeded);
		 $examPerD=round($examNeeded/$_POST['workingD']);
		 $startPerD=round($startNeeded/$_POST['workingD']);
		 $treatmentPerD=round($treatmentNeeded/$_POST['workingD']);
		 $finishPerD=round($finishNeeded/$_POST['workingD']);
		 $recordPerD=round($recordNeeded/$_POST['workingD']);
		 $otherPerD=round($otherNeeded/$_POST['workingD']);
		 
		 $aptPerDay=($examPerD+$startPerD+$treatmentPerD+$finishPerD+$recordPerD+$otherPerD);
		 
		 $no_of_docs=count($docTimeInPer);
		 
		 foreach($docTimeInPer as $docExam)
		 {
			$docno=$docExam['doctors'];
			
			
			$docs[$docno]=array('docEstimatedPctg'=>$docExam['time_percent'], 'Proc'=>array('Start'=>round((($startPerD*$docExam['time_percent'])/100)),
								'Exam'=>round((($examPerD*$docExam['time_percent'])/100)),
								'Treatment'=>round((($treatmentPerD*$docExam['time_percent'])/100)),
								'Finish'=>round((($finishPerD*$docExam['time_percent'])/100)),
								'Other'=>round((($otherPerD*$docExam['time_percent'])/100)),
								'Records'=>round((($recordPerD*$docExam['time_percent'])/100))
								));
			
		 }
		/*foreach($docTimeInPer as $dT)
		{
				$docno=$dT['doctors'];
			$docN[$docno]=$dT['time_percent'];
		}*/
		
		if(!empty($_POST['break'])){
				$i=0;
				foreach($_POST['break'] as $brk)
				{
					$a[$i]['break']=$brk;
					$a[$i]['timeinterval']=$_POST['tmInterval'][$i];
					$a[$i]['applytime']=$_POST['applyTime'][$i];
					$i++;
				}
			}
		$total_break_time= 0;
		foreach($a as $break)
			{
				$break_type=$break['break'];
				//$bId=$break['id'];
				$breakTime=$break['timeinterval'];
				$total_break_time = $total_break_time + $breakTime;
				$op_breaks[$break_type]=array('interval'=>$breakTime, 'time'=>$break['applytime'].":00");	
			}
			//pr($breaks);
		 
		}
		
		$aptStart=ceil(($_POST['aptHours']/3));
		$aptMid = ceil(($_POST['aptHours'] - $aptStart)/2);
		$aptEnd= ($_POST['aptHours'] - ($aptStart + $aptMid));
	
		//exit;
		$response['day']=$d;
		$response['month']=$m;
		$response['year']=$y;
		$response['attribute']=array('Exam', 'Start', 'Treatment', 'Finish', 'Record', 'Other');	
		//$response['docEstimatedPctg']=$docN;	
		$response['docEstimatedApts']=array('no_of_est_apts'=>round($totalApt), 'no_of_apt_per_day'=>$aptPerDay, 'no_of_docs'=>$no_of_docs, 'doc_apt_plan'=>$docs);	
		
			if($aptStart==1){$apts=$_POST['startTime']+1;}
			elseif($aptStart==2){$apts=$_POST['startTime']+2;}
			elseif($aptStart==3){$apts=$_POST['startTime']+3;}
			elseif($aptStart==4){$apts=$_POST['startTime']+4;}
			elseif($aptStart==5){$apts=$_POST['startTime']+5;}
			elseif($aptStart==6){$apts=$_POST['startTime']+6;}
			elseif($aptStart==7){$apts=$_POST['startTime']+7;}
		
		if($op_breaks['LUNCH']){$lun=explode(':', $op_breaks['LUNCH']['time']);}
		if($op_breaks['MEETING']){$meet=explode(':', $op_breaks['MEETING']['time']);}
		if($op_breaks['TEA']){$tea=explode(':', $op_breaks['TEA']['time']);}
		
		//---------For START Time Section-----------------------//
		//echo 'Start Hours='.$aptStart.'<br>';
		//echo 'Mid Hours='.$aptMid.'<br>';
		//echo 'End Hours='.$aptEnd.'<br>';
		//echo $_POST['startTime'].'=='.$tea[0].'=='.$apts.'<BR>'; 
		if($_POST['startTime']<$lun[0] && $apts>$lun[0])
			{
				//$enTmS=$apts+(($op_breaks['LUNCH']['interval']/60)*60/100);
				$aa=(($op_breaks['LUNCH']['interval']/60)*60);
				$tt=$apts;
				$enTmS1=$this->h2m($tt);
				$test=$enTmS1+$aa;
				$enTmS=$this->convertToHoursMins($test, '%02d.%02d');
				$stTm=array('Start'=>$_POST['startTime'], 'break'=>$lun[0], 'end'=>$enTmS);
			}
		elseif($_POST['startTime']<$meet[0] && $apts>$meet[0])
			{
				$aa=(($op_breaks['MEETING']['interval']/60)*60);
				$tt=$apts;
				$enTmS1=$this->h2m($tt);
				$test=$enTmS1+$aa;
				$enTmS=$this->convertToHoursMins($test, '%02d.%02d');
				$stTm=array('Start'=>$_POST['startTime'], 'break'=>$meet[0], 'end'=>$enTmS);
			}
		elseif($_POST['startTime']<$tea[0] && $apts>$tea[0])
			{
				//$enTmS=$apts+(($op_breaks['TEA']['interval']/60)*60/100);
				$aa=(($op_breaks['TEA']['interval']/60)*60);
				$tt=$apts;
				$enTmS1=$this->h2m($tt);
				$test=$enTmS1+$aa;
				$enTmS=$this->convertToHoursMins($test, '%02d.%02d');
				$stTm=array('Start'=>$_POST['startTime'], 'break'=>$tea[0], 'end'=>$enTmS);
			}
			
		//---------For Mid Time Section-----------------------//
		//echo $enTmS;
		if($aptMid==1){$aptm=$enTmS+1; $inMinute=1;}
			elseif($aptMid==2){$aptm=$enTmS+2; $inMinute=2;}
			elseif($aptMid==3){$aptm=$enTmS+3; $inMinute=3;}
			elseif($aptMid==4){$aptm=$enTmS+4; $inMinute=4;}
			elseif($aptMid==5){$aptm=$enTmS+5; $inMinute=5;}
			elseif($aptMid==6){$aptm=$enTmS+6; $inMinute=6;}
			elseif($aptMid==7){$aptm=$enTmS+7; $inMinute=7;}
		//echo $enTmS.'=='.$lun[0].'=='.$aptm.'<BR>'; 
		if($enTmS<$lun[0] && $aptm>$lun[0])
			{
				//$aa=(($op_breaks['LUNCH']['interval']/60));
				$aa=(($op_breaks['LUNCH']['interval']/60)*60);
				 $tt=$enTmS;
				 $aptM=($inMinute*60);
				 $enTmM1=$this->h2m($tt);
				 $test=$enTmM1+$aa+$aptM;
				$enTmM=$this->convertToHoursMins($test, '%02d.%02d');
				$mdTm=array('Start'=>$enTmS, 'break'=>$lun[0], 'end'=>$enTmM);
			}
		elseif($enTmS<$meet[0] && $aptm>$meet[0])
			{
				//$enTmM=$aptm+(($op_breaks['MEETING']['interval']/60)*60/100);
				$aa=(($op_breaks['MEETING']['interval']/60)*60);
				 $tt=$enTmS;
				 $aptM=($inMinute*60);
				 $enTmM1=$this->h2m($tt);
				 $test=$enTmM1+$aa+$aptM;
				$enTmM=$this->convertToHoursMins($enTmM1, '%02d.%02d');
				$mdTm=array('Start'=>$enTmS, 'break'=>$meet[0], 'end'=>$enTmM);
			}
		elseif($enTmS<$tea[0] && $aptm>$tea[0])
			{
				//$enTmM=$aptm+(($op_breaks['TEA']['interval']/60)*60/100);
				$aa=(($op_breaks['TEA']['interval']/60)*60);
				 $tt=$enTmS;
				 $aptM=($inMinute*60);
				 $enTmM1=$this->h2m($tt);
				 $test=$enTmM1+$aa+$aptM;
				$enTmM=$this->convertToHoursMins($enTmM1, '%02d.%02d');
				$mdTm=array('Start'=>$enTmS, 'break'=>$tea[0], 'end'=>$enTmM);
			}	
			
			
			//---------For End Time Section-----------------------//
		
			if($aptEnd==1){$apte=$enTmM+1;$inMin=1;}
			elseif($aptEnd==2){$apte=$enTmM+2;$inMin=2;}
			elseif($aptEnd==3){$apte=$enTmM+3;$inMin=3;}
			elseif($aptEnd==4){$apt=$enTmM+4;$inMin=4;}
			elseif($aptEnd==5){$apte=$enTmM+5;$inMin=5;}
			elseif($aptEnd==6){$apte=$enTmM+6;$inMin=6;}
			elseif($aptEnd==7){$apte=$enTmM+7;$inMin=7;}
			//echo $enTmM.'=='.$meet[0].'=='.$apte; 
		if($enTmM<$lun[0] && $apte>$lun[0])
			{
				//$enTmE=$apte+(($op_breaks['LUNCH']['interval']/60)*60/100);
				$aa=(($op_breaks['LUNCH']['interval']/60)*60);
				$tt=$enTmM;
				$aptE=($inMin*60);
				$enTmE1=$this->h2m($tt);
				$test=$enTmE1+$aa+$aptE;
				$enTmE=$this->convertToHoursMins($test, '%02d.%02d');
				$edTm=array('Start'=>$enTmM, 'break'=>$lun[0], 'end'=>$enTmE);
			}
		elseif($enTmM<$meet[0] && $apte>$meet[0])
			{
				//$enTmE=$apte+(($op_breaks['MEETING']['interval']/60)*60/100);
				$aa=(($op_breaks['MEETING']['interval']/60)*60);
				$tt=$enTmM;
				$aptE=($inMin*60);
				$enTmE1=$this->h2m($tt);
				$test=$enTmE1+$aa+$aptE;
				$enTmE=$this->convertToHoursMins($test, '%02d.%02d');
				$edTm=array('Start'=>$enTmM, 'break'=>$meet[0], 'end'=>$enTmE);
			}
		elseif($enTmM<$tea[0] && $apte>$tea[0])
			{
				//$enTmE=$apte+(($op_breaks['TEA']['interval']/60)*60/100);
				$aa=(($op_breaks['TEA']['interval']/60)*60);
				$tt=$enTmM;
				$aptE=($inMin*60);
				$enTmE1=$this->h2m($tt);
				$test=$enTmE1+$aa+$aptE;
				$enTmE=$this->convertToHoursMins($test, '%02d.%02d');
				$edTm=array('Start'=>$enTmM, 'break'=>$tea[0], 'end'=>$enTmE);
			}	
			
		
		$aptOriginalHours=$_POST['aptHours']*60;
		$response['workingHours']=array($_POST['aptDy']=>($aptOriginalHours+($total_break_time/60*60)), 'start'=>($aptStart*60), 'mid'=>($aptMid*60), 'end'=>($aptEnd*60), 'working_days'=>count($getWorkingD), 'startTimeSlot'=>$stTm, 'midTimeSlot'=>$mdTm, 'endTimeSlot'=>$edTm);	
		$response['break']=$op_breaks;	
		$response['time_slot']=array('start_time'=>$_POST['startTime'].':00', 'end_time'=>$_POST['endTime'].':00', 'time_interval'=>$qSetting[0]['schedule_time_intvl'], 'no_colomns'=>$_POST['noCol'], 'no_rooms'=>$_POST['noRoom'], 'no_chairs'=>$_POST['noChair']);
		$response['rulesetId']= $insid;
		foreach($midProcs as $m){
			$sel=$this->opadmin_model->getAssignDoc($uid['id'], $m['id']);
			$ddd='';
			foreach($sel as $key=>$value){
				$assignTm=explode('-', $value['assign_time']);
				$ddd[$key]=$assignTm[0];
			}				
			$e=$m['proc_abbr'];
			$exp=implode('-', $ddd);
			if($m['attributeName']=='START' || $m['attributeName']=='Treatment' || $m['attributeName']=='Finish'){
				$txType='N';
			}
			else if($m['attributeName']=='Exam' || $m['attributeName']=='Record' || $m['attributeName']=='Other')
			{
				$txType='E';
			}
			$PM[$e]=array('proc_id'=>$m['id'], 'color_code'=>$m['colorCode'], 'length'=>$m['procedure_length_in_minutes'], 'weight'=>$m['proc_weight'], 'class'=>$m['attributeName'], 'docAvailability'=>$exp, 'treatmentType'=>$txType);
			
		}
		foreach($startProcs as $m){
			$sel=$this->opadmin_model->getAssignDoc($uid['id'], $m['id']);
			$ddd='';
			foreach($sel as $key=>$value){
				$assignTm=explode('-', $value['assign_time']);
				
				$ddd[$key] = $assignTm[0];
			}
			$e=$m['proc_abbr'];
			$exp=implode('-', $ddd);
			if($m['attributeName']=='START' || $m['attributeName']=='Treatment' || $m['attributeName']=='Finish'){
				$txType='N';
			}
			else if($m['attributeName']=='Exam' || $m['attributeName']=='Record' || $m['attributeName']=='Other')
			{
				$txType='E';
			}			
			$PS[$e]=array('proc_id'=>$m['id'], 'color_code'=>$m['colorCode'], 'length'=>$m['procedure_length_in_minutes'], 'weight'=>$m['proc_weight'], 'class'=>$m['attributeName'], 'docAvailability'=>$exp, 'treatmentType'=>$txType);
			
			
		}
		//exit;
		foreach($endProcs as $m){
			$sel=$this->opadmin_model->getAssignDoc($uid['id'], $m['id']);
			$ddd='';
			foreach($sel as $key=>$value){
				$assignTm=explode('-', $value['assign_time']);
				$ddd[$key]=$assignTm[0];
			}				
			$e=$m['proc_abbr'];
			$exp=implode('-', $ddd);
			if($m['attributeName']=='START' || $m['attributeName']=='Treatment' || $m['attributeName']=='Finish'){
				$txType='N';
			}
			else if($m['attributeName']=='Exam' || $m['attributeName']=='Record' || $m['attributeName']=='Other')
			{
				$txType='E';
			}	
			$PE[$e]=array('proc_id'=>$m['id'], 'color_code'=>$m['colorCode'], 'length'=>$m['procedure_length_in_minutes'], 'weight'=>$m['proc_weight'], 'class'=>$m['attributeName'], 'docAvailability'=>$exp, 'treatmentType'=>$txType);
			
		}
		$response['S']=$PS;
		$response['M']=$PM;
		$response['E']=$PE;
		pr($response);exit;	
			/*$insid=$this->template_model->insert_datarule($_POST);
			$insid1=$this->template_model->insert_template($insid, $_POST);
			$noOfDoc=$_POST['noChair'];
			$noOfPatient=$_POST['activeP'];
			$noOfColumn=$_POST['noCol'];
			$startTm=$_POST['startTime'];
			$endTm=$_POST['endTime'];
			@$timeS=strtotime($startTm.':00').'<br>';
			@$timeE=strtotime($endTm.':00').'<br>';
			$timeDiff = round(($timeE - $timeS)/60/60);
			@$startHour = date("G", $timeS);
			$endHour = $startHour + $timeDiff; 
			for ($i=$startHour; $i <= $endHour; $i++)
				{					
					for ($j = 0; $j <=45; $j+=15){
   						$time = $i.":".str_pad($j, 2, '0', STR_PAD_LEFT);
		       @$tm=(date(strtotime($time)) <= $timeE) ? date("g:i", strtotime($time)): "";
				$this->template_model->insert_template_data($insid, $noOfDoc, $tm, $tm, $_POST);
 						 }
				}
			$uid=$this->session->userdata('logged_in');
   			//$staff=$this->template_model->getStaffDetails($uid['id']);
			//$rooms=$this->template_model->getRoomsDetails($uid['id']);
			$doctors=$this->template_model->getDoctorDetails($uid['id']);
			$breaks=$this->template_model->getBreaksDetails($uid['id']);
			$classes=$this->opadmin_model->getTxClassDetailsByUserId($uid['id']);
			$procs=$this->opadmin_model->getTxProcDetailsByUserId($uid['id']);
			
			
			
			$get=$this->db->query("select * from apt_schedule_templates where ruleset_id='$insid'")->result_array();
			$result=$get[0];
			
			for($i=1; $i<=$_POST['noRoom']; $i++)
			{
				$op_room[$i]= 'Room '.$i;
			}
			//for($i=1; $i<=$_POST['noDoc']; $i++)
			//{
			//	$op_doc[$i]= 'Doctor '.$i;
			//}
			for($i=1; $i<=$_POST['noChair']; $i++)
			{
				$op_chair[$i]= 'Chair '.$i;			
			}
			
			for($i=1;$i<=$_POST['noStaff'];$i++)
			{
				$op_staff[$i]= 'Assistant '.$i;
			}
			
			$op_column[1]= $_POST['noCol'];
			
			//=================================== Edited to send doctor's details via json====================//
			foreach($doctors as $d)
			{
				$docId=$d['id'];
				$op_doc[$docId]=$d['doctor_name'];
			}
			//===============================================================================================//
			foreach($classes as $class)
			{
				$userid=$this->session->userdata('logged_in');
				$query=$this->db->query("select * from op_resources where user_id='".$userid['id']."' and class_id='".$class['id']."'")->result_array();
				
				foreach($query as $res)
					{
					
						$doctor=($res['doctor']==1)?'Doctor':'';
						$room=($res['room']==1)?'Room':'';
						$chair=($res['chair']==1)?'Chair':'';
						$assistant=($res['assistant']==1)?'Assistant':''; 
					}	
				$clId=$class['id'];
				$class_name=$class['class_name'];
				$colorcode=$class['color_code'];
				$op_class[$class_name]=$colorcode.'~'.(($doctor!='')?$doctor.'|':'').(($room!='')?$room.'|':'').(($chair!='')?$chair.'|':'').(($assistant!='')?$assistant.'|':'');
							
			}
			
			foreach($procs as $proc)
			{
				$classNm=$this->opadmin_model->getTxClassDetailsById($proc['class_id']);
				$maxId=$this->opsetting_model->getMaxScheduleTime($uid['id']);	
				$scTime=$this->opsetting_model->getScheduleTimeByMaxId($maxId[0]['id']);
				$procId=$proc['procedure_length_in_minutes'];
				$proc_name=$proc['procedure_name'];
				$pid=$proc['id'];
				$op_procs[$proc_name]=$pid.'|'.$procId.'#'.$proc['proc_abbr'].'~'.$classNm[0]['class_name'];
							
			}
			foreach($breaks as $break)
			{
				$break_type=$break['break_type'];
				$bId=$break['id'];
				$breakTime=$break['time_interval'];
				$op_breaks[$break_type]=$bId.'#'.$breakTime.'~'.$break['no_of_breaks_allowed'].'|'.$break['color_code'];	
			}
			
			
			$maxID=$this->opsetting_model->getMaxScheduleTime($uid['id']);	
			$scTIME=$this->opsetting_model->getScheduleTimeByMaxId($maxId[0]['id']);
						
			$response=array();
			$response['header_name']='Normal '.date('l');
			$response['header']=array('no_rooms'=>$op_room,
									  'no_chairs'=>$op_chair,
						 			  'no_doctors'=>$op_doc,
									  'no_assistant'=>$op_staff,
									  'no_columns'=>$op_column);
			$response['activeP']=$_POST['activeP'];
			$response['classes']=$op_class;
			$response['procs']=$op_procs;
			$response['break']=$op_breaks;
			
			$response['time_slot']=array('start_time'=>$_POST['startTime'].':00', 'end_time'=>$_POST['endTime'].':00', 'time_interval'=>$scTIME[0]['schedule_time_intvl']);
			$response['rulesetId']= $insid;
			//$response['doctor_assign_proc']=$op_assign;
			
			$json_tepmlateData = json_encode($response);
			$this->data['jsonData']=$json_tepmlateData;
			$this->load->view('header_inner');
			$this->load->view('view_template', $this->data);
			$this->load->view('footer');
	*/
	
	
	/*	$response['day']='27';
		$response['month']='Jan';
		$response['year']='2014';
		$response['attribute']=array('Exam', 'Start', 'Treatment', 'Finish', 'Record', 'Other');
		$response['docEstimatedPctg']=array('D1'=>'70', 'D2'=>'30');
		$response['docEstimatedApts']=array('no_of_est_apts'=>'52', 'no_of_docs'=>'2', 'doc_apt_plan'=>array('D1'=>array('Start'=>'2', 'Exam'=>'4',
		'Treatment'=>'22',
		'Finish'=>'1',
		'Others'=>'6',
		'Records'=>'2'), 'D2'=>array('Start'=>'1', 'Exam'=>'1',
		'Treatment'=>'9',
		'Finish'=>'1',
		'Others'=>'2',
		'Records'=>'1')));
		$response['workingHours']=array('Mon'=>'7');
		$response['break']=array('Lunch'=>array('interval'=>'60', 'time'=>'1:00', 'SME_option'=>'mid'), 'Meeting'=>array('interval'=>'15', 'time'=>'10:00', 'SME_option'=>'end'));
		$response['time_slot']=array('start_time'=>'08:00', 'end_time'=>'16:15', 'time_interval'=>'5', 'no_colomns'=>'10');
		$response['rulesetId']= 15;
		
			
		$response['S']=array('PE1'=>array('length'=>'30', 'weight'=>'100', 'docAvailability'=>array('0-5', '15-20', '25-30')),
					'PE2'=>array('length'=>'60', 'weight'=>'100', 'docAvailability'=>array('10-15', '20-25')),
					'PS1'=>array('length'=>'15', 'weight'=>'100', 'docAvailability'=>array('5-10', '10-15')),
					'PT1'=>array('length'=>'20', 'weight'=>'100', 'docAvailability'=>array('0-5', '5-10')),
					'PT2'=>array('length'=>'10', 'weight'=>'100', 'docAvailability'=>array('0-5')),
					'FP1'=>array('length'=>'15', 'weight'=>'100', 'docAvailability'=>array('5-10', '10-15')),
					'PS2'=>array('length'=>'45', 'weight'=>'100', 'docAvailability'=>array('10-15', '15-20', '20-25', '40-45')));
		
		$response['M']=array('PT3'=>array('length'=>'30', 'weight'=>'100', 'docAvailability'=>array('10-15', '15-20', '25-30')),
					'PE3'=>array('length'=>'15', 'weight'=>'90', 'docAvailability'=>array('0-5', '5-10')),
					'PS3'=>array('length'=>'15', 'weight'=>'90', 'docAvailability'=>array('0-5', '5-10')),
					'PT4'=>array('length'=>'30', 'weight'=>'90', 'docAvailability'=>array('5-10', '25-30')),
					'FP2'=>array('length'=>'15', 'weight'=>'90', 'docAvailability'=>array('5-10', '10-15')),
					'PE4'=>array('length'=>'15', 'weight'=>'80', 'docAvailability'=>array('5-10')),
					'PS4'=>array('length'=>'15', 'weight'=>'80', 'docAvailability'=>array('0-5')),
					'FP3'=>array('length'=>'30', 'weight'=>'80', 'docAvailability'=>array('15-20', '25-30')),
					'OP1'=>array('length'=>'15', 'weight'=>'50', 'docAvailability'=>array('5-10', '10-15')),
					'OP2'=>array('length'=>'15', 'weight'=>'40', 'docAvailability'=>array('5-10', '10-15')),
					'RP1'=>array('length'=>'15', 'weight'=>'40', 'docAvailability'=>array('5-10', '10-15')),
						);
						
		$response['E']=array('PE5'=>array('length'=>'30', 'weight'=>'70', 'docAvailability'=>array('15-20', '25-30')),
					'PS5'=>array('length'=>'15', 'weight'=>'70', 'docAvailability'=>array('0-5', '5-10')),
					'PT5'=>array('length'=>'30', 'weight'=>'70', 'docAvailability'=>array('15-20', '25-30')),
					'FP4'=>array('length'=>'15', 'weight'=>'70', 'docAvailability'=>array('10-15')),
					'FP5'=>array('length'=>'10', 'weight'=>'50', 'docAvailability'=>array('5-10')),
					'OP3'=>array('length'=>'15', 'weight'=>'40', 'docAvailability'=>array('5-10')),
					'OP4'=>array('length'=>'10', 'weight'=>'40', 'docAvailability'=>array('0-5')),
					'OP5'=>array('length'=>'15', 'weight'=>'30', 'docAvailability'=>array('0-0')),
					'RP2'=>array('length'=>'10', 'weight'=>'30', 'docAvailability'=>array('5-10')),
					'RP3'=>array('length'=>'15', 'weight'=>'30', 'docAvailability'=>array('10-15')),
					'RP4'=>array('length'=>'10', 'weight'=>'30', 'docAvailability'=>array('5-10')),
					'RP5'=>array('length'=>'10', 'weight'=>'30', 'docAvailability'=>array('5-10'))
					
						);		*/		
			//pr($response);
			//die;
		
		$json_tepmlateData = json_encode($response);
		$this->data['ruleID']=$insid;
		$this->template_model->saveInitializedJson($uid['id'], $insid, $json_tepmlateData);
		$this->data['jsonData']=$json_tepmlateData;
		$this->load->view('header_inner');
		$this->load->view('view_template', $this->data);
		$this->load->view('footer');
		
		}
		/*
		/ Create template
		*/
		elseif($_POST['dset'][0]==$this->config->item('template_btn_value'))
		{
		}
		
			if(empty($_POST))
			{
				redirect(site_url('home/index'));
			}
		
	}
	function view_template($ruleId)
	{
			$ruleId=$this->uri->segment(3);
			
			/*$uid=$this->session->userdata('logged_in');
   			$staff=$this->template_model->getStaffDetails($uid['id']);
			$rooms=$this->template_model->getRoomsDetails($uid['id']);*/
			
			
			$get=$this->db->query("select * from apt_schedule_templates where ruleset_id='$ruleId'")->result_array();
			$get1=$this->db->query("select * from schedule_data where ruleset_id='$ruleId'")->result_array();
			//echo '<pre>';print_r($get);echo '</pre>';
			//$this->data['staff']=$staff;
			//$this->data['rooms']=$rooms;
			$this->data['result']=$get[0];
			$this->data['result1']=$get1;
			$this->load->view('header_inner');
			$this->load->view('view_template', $this->data);
			$this->load->view('footer');
		}
		
		/*
		function add_template()
		{
			$uid=$this->session->userdata('logged_in');
   			$staff=$this->template_model->getStaffDetails($uid['id']);
			$rooms=$this->template_model->getRoomsDetails($uid['id']);
			$doctors=$this->template_model->getDoctorDetails($uid['id']);
			
			foreach($rooms as $room)
			{
				$roomid=$room['id'];
				$roomtp=$room['room_type'];
				$op_room[]=array($roomid=>$roomtp);
							
			}
			foreach($staff as $staf)
			{
				$staffId=$staf['id'];
				$staff_name=$room['staff_name'];
				$op_staff[]=array($staffId=>$staff_name);
							
			}
			foreach($doctors as $doc)
			{
				$docid=$doc['id'];
				$doc_name=$doc['doctor_name'];
				$op_doc[]=array($docid=>$doc_name);
							
			}
			//echo '<pre>';print_r($test);exit;
			
			$response=array();
			$response['header_name']='Normal '.date('l');
			$response['header']=array('no_rooms'=>$op_room,
									  'no_chairs'=>array('1'=>'Chair1', '2'=>'Chair2', '3'=>'Chair3'),
						 			  'no_doctors'=>$op_doc,
									  'no_staff'=>$op_staff);
			$response['activeP']='50';
			$response['time_slot']=array('start_time'=>'09:00', 'end_time'=>'15:00', 'time_interval'=>'15');
			
			
			$json_logindata = json_encode($response);
			echo $json_logindata;
	   					
		
	
	}*/
		
	function save_schedule()
	{
		//json_encode($json_data);
		
		$gridData=json_decode($_REQUEST['gridData']);
		$rulId=$this->template_model->getSavedSchedule($gridData->rulesetId);
		if($rulId[0]['ruleset_id']==$gridData->rulesetId)
		{
			$this->template_model->deleteSchedule($rulId[0]['ruleset_id']);
			
			if(count($gridData)>0)
			{
				foreach ($gridData as $gridC)
				{
			
					foreach($gridC as $gc=>$value){
						$_POST['doctor']=$value->Doctor;
						$_POST['room']=$value->Room;
						$_POST['chair']=$value->Chair;
						$_POST['assistant']=$value->Assistant;
						$_POST['breaks']=$value->breaks;
						$_POST['class']=$value->class;
						$_POST['procedure']=$value->procedure;
						$_POST['rulesetId']=$gridData->rulesetId;
						
						$this->template_model->save_schedule($gc, $_POST);
					}
				}
				$response=array('message'=>'Schedule data has been successfully updated');
				//redirect(base_url().'home/schedule');
			}
			
			
		}
		else if(count($rulId[0]['ruleset_id'])==0){
		if(count($gridData)>0)
		{
		foreach ($gridData as $gridC)
		{
			
			foreach($gridC as $gc=>$value){
						$_POST['doctor']=$value->Doctor;
						$_POST['room']=$value->Room;
						$_POST['chair']=$value->Chair;
						$_POST['assistant']=$value->Assistant;
						$_POST['breaks']=$value->breaks;
						$_POST['class']=$value->class;
						$_POST['procedure']=$value->procedure;
						$_POST['rulesetId']=$gridData->rulesetId;
						
						$this->template_model->save_schedule($gc, $_POST);
			}
		}
			$response=array('message'=>'Schedule data has been successfully saved');
			//redirect(base_url().'home/schedule');
		}
		}
		else {
			$response = array('message'=>'Please apply any property before saving.');
			
		}
		$jsonSuccess=json_encode($response);
		echo $jsonSuccess;
		//redirect('template/dataset');		
		//$json_data = array('message'=>'success');
		
	}
	
	
	function get_doctor_to_procedure()
	{
		$gridData=json_decode($_REQUEST['proc_id']);
		
		$uid=$this->session->userdata('logged_in');
		
		$procToDoc=$this->opadmin_model->getAssignDoc($uid['id'], $gridData);
		$c=1;
		foreach($procToDoc as $assign)
		{
			$assign_id=$assign['id'];
			$procId=$assign['proc_id'];
			//pr($assign);
			//$doc=$this->db->query("SELECT * FROM DOCTOR_TO_PROCEDURE WHERE ID=".$assign['doctor_id'])->result_array();
			//$proc_name=$this->db->query("SELECT * FROM op_procedures WHERE ID=".$assign['proc_id'])->result_array();
			//$p=$proc_name[0]['procedure_name'];
		
			$op_assign[$c++]=(($assign['doctor_id']=='d')?trim('doctor'):'0').'~'.(($assign['assistant']=='a')?trim('assistant'):'0');	
			}
		$response['assignDoctor']=$op_assign;
		$jsonSuccess=json_encode($response);
		echo $jsonSuccess;
		}
	
	
	
	function edit_schedule()
	{
		 if($this->session->userdata('logged_in'))
            {
		$sessionvalues  =   $this->session->userdata('logged_in');
                $getuserdetailspaymentmade  =  $this->users_model->getpaymentcheck(array("userid"=>$sessionvalues['id'])); 
                if($getuserdetailspaymentmade == 0)
                {
                 $this->session->set_userdata('msg', "Please make payment.");
                 redirect(base_url('home/payment'));
                }   
                else
                {
			$ruleId=$this->uri->segment(3);
			$uid=$this->session->userdata('logged_in');
			
   			$breaks=$this->template_model->getBreaksDetails($uid['id']);
			$classes=$this->opadmin_model->getTxClassDetailsByUserId($uid['id']);
			$procs=$this->opadmin_model->getTxProcDetailsByUserId($uid['id']);
			$tm=$this->common_model->getAllScheduleByUserId($ruleId);
			
			$get=$this->db->query("select * from apt_schedule where ruleset_id='$ruleId'")->result_array();
			$result=$get[0];
			$opCell= array();
		foreach($get as $value)
		{
			//pr($value);
			$opCell[$value['cell_id']]=array(			
			'Doctor'=>$value['doctor'],
			'Room'=>$value['room'],
			'Assistant'=>$value['staff'],
			'Chair'=>$value['chair'],
			'Break'=>$value['break'],
			'Class'=>$value['class_name'],
			'Procedure'=>$value['procedure_name']
			
			);
			
		}
		
		//pr($opCell);
		
		for($i=1; $i<=$tm[0]['no_of_rooms']; $i++)
			{
				$op_room[$i]= 'Room '.$i;
			}
			/*for($i=1; $i<=$tm[0]['no_doctors']; $i++)
			{
				$op_doc[$i]= 'Doctor '.$i;
			}*/
			for($i=1; $i<=$tm[0]['no_chairs']; $i++)
			{
				$op_chair[$i]= 'Chair '.$i;			
			}
			
			for($i=1;$i<=$tm[0]['no_of_staff'];$i++)
			{
				$op_staff[$i]= 'Assistant '.$i;
			}
			$op_column[1]= $tm[0]['no_of_columns'];
		
		
			//=================================== Edited to send doctor's details via json====================//
			foreach($doctors as $d)
			{
				$docId=$d['id'];
				$op_doc[$docId]=$d['doctor_name'];
			}
			//===============================================================================================//
		
		foreach($classes as $class)
			{
				$userid=$this->session->userdata('logged_in');
				$query=$this->db->query("select * from op_resources where user_id='".$userid['id']."' and class_id='".$class['id']."'")->result_array();
				//
				foreach($query as $res)
					{
					
						$doctor=($res['doctor']==1)?'Doctor':'';
						$room=($res['room']==1)?'Room':'';
						$chair=($res['chair']==1)?'Chair':'';
						$assistant=($res['assistant']==1)?'Assistant':''; 
					}	
					//pr($doctor);exit;					
				$clId=$class['id'];
				$class_name=$class['class_name'];
				$colorcode=$class['color_code'];
				$op_class[$class_name]=$colorcode.'~'.(($doctor!='')?$doctor.'|':'').(($room!='')?$room.'|':'').(($chair!='')?$chair.'|':'').(($assistant!='')?$assistant.'|':'');
							
			}
			
			foreach($procs as $proc)
			{
				$classNm=$this->opadmin_model->getTxClassDetailsById($proc['class_id']);	
				$maxId=$this->opsetting_model->getMaxScheduleTime($uid['id']);	
				$scTime=$this->opsetting_model->getScheduleTimeByMaxId($maxId[0]['id']);
				$procId=$proc['procedure_length_in_minutes'];
				$proc_name=$proc['procedure_name'];
				$op_procs[$proc_name]=$procId.'#'.$proc['proc_abbr'].'~'.$classNm[0]['class_name'].'|'.$scTime[0]['schedule_time_intvl'];
							
			}
			foreach($breaks as $break)
			{
				$break_type=$break['break_type'];
				$bId=$break['id'];
				$breakTime=$break['time_interval'];
				$op_breaks[$break_type]=$bId.'#'.$breakTime.'~'.$break['no_of_breaks_allowed'];	
			}
						
			$response=array();
			$response['header_name']='Normal '.date('l');
			$response['header']=array('no_rooms'=>$op_room,
									  'no_chairs'=>$op_chair,
						 			  'no_doctors'=>$op_doc,
									  'no_assistant'=>$op_staff,
									  'no_columns'=>$op_column);
			$response['activeP']=$_POST['activeP'];
			$response['classes']=$op_class;
			$response['procs']=$op_procs;
			$response['break']=$op_breaks;
			
			
			$response['time_slot']=array('start_time'=>$tm[0]['start_time'].':00', 'end_time'=>$tm[0]['end_time'].':00', 'time_interval'=>'15');
			$response['rulesetId']= $ruleId;
			$response['gridCell']=$opCell;
			$json_tepmlateData = json_encode($response);
		
			$this->data['jsonData']=$json_tepmlateData;
			$this->load->view('header_inner');
			$this->load->view('edit_template', $this->data);
			$this->load->view('footer');
				}
			}else
            {
                $this->session->set_userdata('msg', "Please login to access the page.");
                redirect(base_url());
            }
			
		
	}
	
	function delete_schedule()
	{
		$ruleId=$this->uri->segment(3);
			$this->template_model->deleteSchedule($ruleId);
			redirect('home/savedschedule');
	}
	
	
	function testSchedule()
	{
		//$priorities=array('S', 'M', 'E');
		$response['day']='27';
		$response['month']='Jan';
		$response['year']='2014';
		$response['attribute']=array('Exam', 'Start', 'Treatment', 'Finish', 'Record', 'Other');
		$response['docAllotedApts']=array('D1'=>'70', 'D2'=>'30');
		$response['workingHours']=array('Mon'=>'7');
		$response['S']=array('PE1'=>array('length'=>'30', 'weight'=>'100', 'docAvailability'=>array('0-5', '15-20', '25-30')),
					'PE2'=>array('length'=>'60', 'weight'=>'100', 'docAvailability'=>array('10-15', '20-25')),
					'PS1'=>array('length'=>'15', 'weight'=>'100', 'docAvailability'=>array('5-10', '10-15')),
					'PT1'=>array('length'=>'20', 'weight'=>'100', 'docAvailability'=>array('0-5', '5-10')),
					'PT2'=>array('length'=>'10', 'weight'=>'100', 'docAvailability'=>array('0-5')),
					'FP1'=>array('length'=>'15', 'weight'=>'100', 'docAvailability'=>array('5-10', '10-15')),
					'PS2'=>array('length'=>'45', 'weight'=>'100', 'docAvailability'=>array('10-15', '15-20', '20-25', '40-45')));
		
		$response['M']=array('PT3'=>array('length'=>'30', 'weight'=>'100', 'docAvailability'=>array('10-15', '15-20', '25-30')),
					'PE3'=>array('length'=>'15', 'weight'=>'90', 'docAvailability'=>array('0-5', '5-10')),
					'PS3'=>array('length'=>'15', 'weight'=>'90', 'docAvailability'=>array('0-5', '5-10')),
					'PT4'=>array('length'=>'30', 'weight'=>'90', 'docAvailability'=>array('5-10', '25-30')),
					'FP2'=>array('length'=>'15', 'weight'=>'90', 'docAvailability'=>array('5-10', '10-15')),
					'PE4'=>array('length'=>'15', 'weight'=>'80', 'docAvailability'=>array('5-10')),
					'PS4'=>array('length'=>'15', 'weight'=>'80', 'docAvailability'=>array('0-5')),
					'FP3'=>array('length'=>'30', 'weight'=>'80', 'docAvailability'=>array('15-20', '25-30')),
					'OP1'=>array('length'=>'15', 'weight'=>'50', 'docAvailability'=>array('5-10', '10-15')),
					'OP2'=>array('length'=>'15', 'weight'=>'40', 'docAvailability'=>array('5-10', '10-15')),
					'RP1'=>array('length'=>'15', 'weight'=>'40', 'docAvailability'=>array('5-10', '10-15')),
						);
						
		$response['E']=array('PE5'=>array('length'=>'30', 'weight'=>'70', 'docAvailability'=>array('15-20', '25-30')),
					'PS5'=>array('length'=>'15', 'weight'=>'70', 'docAvailability'=>array('0-5', '5-10')),
					'PT5'=>array('length'=>'30', 'weight'=>'70', 'docAvailability'=>array('15-20', '25-30')),
					'FP4'=>array('length'=>'15', 'weight'=>'70', 'docAvailability'=>array('10-15')),
					'FP5'=>array('length'=>'10', 'weight'=>'50', 'docAvailability'=>array('5-10')),
					'OP3'=>array('length'=>'15', 'weight'=>'40', 'docAvailability'=>array('5-10')),
					'OP4'=>array('length'=>'10', 'weight'=>'40', 'docAvailability'=>array('0-5')),
					'OP5'=>array('length'=>'15', 'weight'=>'30', 'docAvailability'=>array('0-0')),
					'RP2'=>array('length'=>'10', 'weight'=>'30', 'docAvailability'=>array('5-10')),
					'RP3'=>array('length'=>'15', 'weight'=>'30', 'docAvailability'=>array('10-15')),
					'RP4'=>array('length'=>'10', 'weight'=>'30', 'docAvailability'=>array('5-10')),
					'RP5'=>array('length'=>'10', 'weight'=>'30', 'docAvailability'=>array('5-10'))
					
						);				
		$response['break']=array('Lunch'=>array('interval'=>'60', 'time'=>'1:00', 'SME_option'=>'mid'), 'Meeting'=>array('interval'=>'15', 'time'=>'10:00', 'SME_option'=>'end'));
		$response['time_slot']=array('start_time'=>'08:00', 'end_time'=>'16:15', 'time_interval'=>'5');
			$response['rulesetId']= 15;
			
			//pr($response);
		
		$json_tepmlateData = json_encode($response);
		pr($json_tepmlateData);
		//$this->data['jsonData']=$json_tepmlateData;
		
	}
 
}