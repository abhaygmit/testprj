<?php 
include("connect.php");
class Template extends CI_Controller 
{
    
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('login_model', 'common_model', 'users_model', 'template_model', 'opadmin_model')); 
		//$this->load->library(array('session', 'form_validation', 'test'));
        $this->load->library(array('session', 'form_validation'));
		$this->load->helper(array('form', 'url', 'captcha', 'common'));
		
	}
        
        
     
	function index()
	{
	}
	
	function createDataset()
	{
		
		if($this->session->userdata('logged_in')==''):
		redirect(site_url(home/index));
		endif;
	
		/*
		/ Create dataset
		/
		*/
		
		if($_POST['dset'][0]==$this->config->item('dataset_btn_value'))
		{
			
			/*if($_POST['prevDataRule']!='')
			{
					$query=$this->common_model->getRulesetData($_POST['prevDataRule']);
					$uid=$this->session->userdata('logged_in');
   			$staff=$this->template_model->getStaffDetails($uid['id']);
			$rooms=$this->template_model->getRoomsDetails($uid['id']);
			$doctors=$this->template_model->getDoctorDetails($uid['id']);
			$classes=$this->opadmin_model->getTxClassDetails();
			$procs=$this->opadmin_model->getTxClassDetails();
			
			$get=$this->db->query("select * from apt_schedule_templates where ruleset_id='$insid'")->result_array();
			$result=$get[0];
			
			foreach($rooms as $room)
			{
				$roomid=$room['id'];
				$roomtp=$room['room_type'];
				$op_room[$roomid]=$roomtp;
			}
			foreach($staff as $staf)
			{
				$staffId=$staf['id'];
				$staff_name=$staf['staff_name'];
				$op_staff[$staffId]=$staff_name;
							
			}
			foreach($doctors as $doc)
			{
				$docid=$doc['id'];
				$doc_name=$doc['doctor_name'];
				$op_doc[$docid]=$doc_name;
							
			}
			foreach($classes as $class)
			{
				$clId=$class['id'];
				$class_name=$class['class_name'];
				$colorcode=$class['color_code'];
				$op_class[$class_name]=$colorcode;
							
			}
			foreach($procs as $proc)
			{
				$procId=$class['id'];
				$proc_name=$class['procedure_name'];
				$op_procs[$procId]=$proc_name;
							
			}
			for($i=1;$i<=$result['no_chairs'];$i++)
			{
				$op_chair[$i]= 'Chair '.$i;
			}
						
			$response=array();
			$response['header_name']='Normal '.date('l');
			$response['header']=array('no_rooms'=>$op_room,
									  'no_chairs'=>$op_chair,
						 			  'no_doctors'=>$op_doc,
									  'no_staff'=>$op_staff);
			$response['activeP']=$_POST['activeP'];
			$response['classes']=$op_class;
			$response['procs']=$op_procs;
			
			$response['time_slot']=array('start_time'=>$_POST['startTime'].':00', 'end_time'=>$_POST['endTime'].':00', 'time_interval'=>'15');
			
			
			$json_tepmlateData = json_encode($response);
					
			}
			
			
			else{*/
			
			$insid=$this->template_model->insert_datarule($_POST);
			$insid1=$this->template_model->insert_template($insid, $_POST);
			
			
			$noOfDoc=$_POST['noChair'];
			$noOfPatient=$_POST['activeP'];
			
			$startTm=$_POST['startTime'];
			$endTm=$_POST['endTime'];
			$timeS=strtotime($startTm.':00').'<br>';
			$timeE=strtotime($endTm.':00').'<br>';
		
			$timeDiff = round(($timeE - $timeS)/60/60);
			
			$startHour = date("G", $timeS);
			$endHour = $startHour + $timeDiff; 
		
			
			for ($i=$startHour; $i <= $endHour; $i++)
				{					
					for ($j = 0; $j <=45; $j+=15){
   							
							
						$time = $i.":".str_pad($j, 2, '0', STR_PAD_LEFT);

               $tm=(date(strtotime($time)) <= $timeE) ? date("g:i", strtotime($time)): "";
				$this->template_model->insert_template_data($insid, $noOfDoc, $tm, $tm, $_POST);
 						 }
					
				
				}
			
			
			$uid=$this->session->userdata('logged_in');
   			$staff=$this->template_model->getStaffDetails($uid['id']);
			$rooms=$this->template_model->getRoomsDetails($uid['id']);
			$doctors=$this->template_model->getDoctorDetails($uid['id']);
			$classes=$this->opadmin_model->getTxClassDetails();
			$procs=$this->opadmin_model->getTxClassDetails();
			
			$get=$this->db->query("select * from apt_schedule_templates where ruleset_id='$insid'")->result_array();
			$result=$get[0];
			
			foreach($rooms as $room)
			{
				$roomid=$room['id'];
				$roomtp=$room['room_type'];
				$op_room[$roomid]=$roomtp;
			}
			foreach($staff as $staf)
			{
				$staffId=$staf['id'];
				$staff_name=$staf['staff_name'];
				$op_staff[$staffId]=$staff_name;
							
			}
			foreach($doctors as $doc)
			{
				$docid=$doc['id'];
				$doc_name=$doc['doctor_name'];
				$op_doc[$docid]=$doc_name;
							
			}
			foreach($classes as $class)
			{
				$clId=$class['id'];
				$class_name=$class['class_name'];
				$colorcode=$class['color_code'];
				$op_class[$class_name]=$colorcode;
							
			}
			foreach($procs as $proc)
			{
				$procId=$class['id'];
				$proc_name=$class['procedure_name'];
				$op_procs[$procId]=$proc_name;
							
			}
			for($i=1;$i<=$result['no_chairs'];$i++)
			{
				$op_chair[$i]= 'Chair '.$i;
			}
						
			$response=array();
			$response['header_name']='Normal '.date('l');
			$response['header']=array('no_rooms'=>$op_room,
									  'no_chairs'=>$op_chair,
						 			  'no_doctors'=>$op_doc,
									  'no_staff'=>$op_staff);
			$response['activeP']=$_POST['activeP'];
			$response['classes']=$op_class;
			$response['procs']=$op_procs;
			
			$response['time_slot']=array('start_time'=>$_POST['startTime'].':00', 'end_time'=>$_POST['endTime'].':00', 'time_interval'=>'15');
			
			
			$json_tepmlateData = json_encode($response);
			//echo $json_tepmlateData;
			//}
			$this->data['jsonData']=$json_tepmlateData;
			//redirect(base_url().'template/view_template/'.$insid);
			$this->load->view('header_inner');
			$this->load->view('view_template', $this->data);
			$this->load->view('footer');
	
		}
		/*
		/ Create template
		/
		*/
		elseif($_POST['dset'][0]==$this->config->item('template_btn_value'))
		{
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
		
 
}