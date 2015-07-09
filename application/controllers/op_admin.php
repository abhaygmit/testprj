<?php 
include("connect.php");
class Op_admin extends CI_Controller 
{
    
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('login_model', 'common_model', 'users_model', 'opadmin_model', 'opsetting_model')); 
		//$this->load->library(array('session', 'form_validation', 'test'));
        $this->load->library(array('session', 'form_validation'));
		$this->load->helper(array('form', 'url', 'captcha', 'common'));
	}
	function index()
	{
	}
	/*----------- Treatment Class mannagement ------------------------------*/
	function classes()
	{
		$uid=$this->session->userdata('logged_in');
		if($uid['id']=='')
		{
			redirect(base_url());
		}
		
				$result=$this->opadmin_model->getTxClassDetails();
				$this->data['result']=$result;
				$attributes=$this->opadmin_model->getAttributeList();
				$this->data['attributeList']=$attributes;
				$this->load->view('header_inner');
               	$this->load->view('ortho_admin/manage_classes',$this->data);
                $this->load->view('footer_inner');
		
	}
	function addClass()
	{
		$uid=$this->session->userdata('logged_in');
		if($uid['id']=='')
		{
			redirect(base_url());
		}
						$id=$this->uri->segment(3);
						$result=$this->opadmin_model->getTxClassDetailsById($id);
						$attributes=$this->opadmin_model->getAttributeList();
						$this->data['result']=$result[0];
						$this->data['attributeList']=$attributes;
				if(count($_POST) !='')
				{
					if($id!=''){
						if(trim($result[0]['class_name'])==trim($_POST['clName'])):
						$this->opadmin_model->add_edit_class($_POST, $id);
						redirect('op_admin/classes');
						
						else:
						$this->form_validation->set_rules('clName', 'Class Name', 'required|callback_class_check');
						$this->form_validation->set_rules('classAttribute', 'Class Attribute', 'required');
						$this->form_validation->set_rules('colorCode', 'Color Code', 'required');
						$this->form_validation->set_rules('status', 'Status', 'required');
						$this->form_validation->set_rules('timeAttribute', 'Time Attribute', 'required');
						if($this->form_validation->run() == FALSE):
			  			else:
			  			$result=$this->opadmin_model->add_edit_class($_POST, $id);
						redirect('op_admin/classes');
						endif;
					endif;
					}
					
					
					else
					{
						$this->form_validation->set_rules('clName', 'Class Name', 'required|callback_class_check');
						$this->form_validation->set_rules('classAttribute', 'Class Attribute', 'required');
						$this->form_validation->set_rules('colorCode', 'Color Code', 'required');
						$this->form_validation->set_rules('status', 'Status', 'required');
						$this->form_validation->set_rules('timeAttribute', 'Time Attribute', 'required');
						
						if($this->form_validation->run() == FALSE):
			  			else:
			  			$result=$this->opadmin_model->add_edit_class($_POST);
						redirect('op_admin/classes');
						endif;
				}
				}
				$this->load->view('header_inner');
               	$this->load->view('ortho_admin/add_edit_classes',$this->data);
                $this->load->view('footer_inner');
		
	}
	function deleteClass()
	{
		$uid=$this->session->userdata('logged_in');
		if($uid['id']=='')
		{
			redirect(base_url());
		}
		$id=$this->uri->segment(3);
		$this->opadmin_model->delteClass($id);
		redirect(base_url().'op_admin/classes');
		
	}
	function resources()
	{
				$id=$this->uri->segment(3);
				$classList=$this->opadmin_model->getTxClassDetailsById($id);
				$this->data['classList']=$classList;
				$resourceMaster=$this->opadmin_model->getResourceMaster();
				$this->data['resourceMaster']=$resourceMaster;
				$resourceId=$this->opadmin_model->getResourceByClassId($id);
				$getDoctor=$this->opadmin_model->getDoctorsDetail();
				
				$this->data['resource']=$resourceId[0];
				if(count($_POST)> 0)
				{
					if($resourceId!=''){
					$result=$this->opadmin_model->add_edit_resource($_POST, $resourceId[0]['id']);
					redirect('op_admin/classes');	
					}
					else{
					$result=$this->opadmin_model->add_edit_resource($_POST);
					redirect('op_admin/classes');
					}
				}
				$this->data['docDetails']=$getDoctor;
				$this->load->view('header_inner');
               	$this->load->view('ortho_admin/manage_resources',$this->data);
                $this->load->view('footer_inner');
	}
	function class_check()
	{		$result = $_POST['clName'];
			$uid=$this->session->userdata('logged_in');
			$query=$this->db->query("select class_name from op_classes where class_name='$result' and user_id='".$uid['id']."'")->result_array();
			if($query)
			{
  			  	$this->form_validation->set_message('class_check', 'Class name already exist.');
   				 return FALSE;
			}
			else
			{		
				return TRUE;
			}
	}
	
	function class_check_forEdit()
	{		$result = $_POST['clName'];
			$uid=$this->session->userdata('logged_in');
			$query=$this->db->query("select class_name from op_classes where class_name!='$result' and user_id='".$uid['id']."'")->result_array();
			if($query)
			{
  			  	$this->form_validation->set_message('class_check', 'Class name already exist.');
   				 return FALSE;
			}
			else
			{		
				return TRUE;
			}
	}
	
	/*----------------Procedures management--------------------------------------*/
	function procedures()
	{
		$uid=$this->session->userdata('logged_in');
		if($uid['id']=='')
		{
			redirect(base_url());
		}
				$result=$this->opadmin_model->getTxProcDetailsByUserId($uid['id']);
				$this->data['result']=$result;
				$this->load->view('header_inner');
               	$this->load->view('ortho_admin/manage_procedures',$this->data);
                $this->load->view('footer_inner');
		
	}
	function addProcedure()
	{
		$uid=$this->session->userdata('logged_in');
		if($uid['id']=='')
		{
			redirect(base_url());
		}
			$id=$this->uri->segment(3);
			$classList=$this->opadmin_model->getTxClassDetailsByUserId($uid['id']);
			$scheduleTime=$this->opsetting_model->getScheduleTimeByUserId($uid['id']);
			$result1=$this->opadmin_model->getTxProcDetailsById($id);
			$prc=$this->opadmin_model->getAssignDoc($uid['id'], $id);
			//pr($prc);
			$this->data['result']=$result1[0];
			$this->data['classList']=$classList;
			$this->data['scheduleTime']=$scheduleTime[0];
			$this->data['resource']=$prc;
			if(count($_POST) !='')
			{	
				if(!empty($_POST['assignTime']))
				{
					$i=0;
					foreach($_POST['assignTime'] as $assignTm)
					{
						$a[$i]['assignTime']=$assignTm;
						$a[$i]['docno']=$_POST['docno'][$i];
						$a[$i]['desc']=$_POST['desc'][$i];
						$i++;
					}
				}
				if($id!=''){
						
							$result=$this->opadmin_model->add_edit_procs($_POST, $id);
							$this->db->query("delete from doctor_to_procedure where proc_id='$id' and user_id='".$uid['id']."'");
							foreach($a as $value){
								$docAssign=$this->opadmin_model->doctorAssignToProc($id, $value);
							}
							redirect('op_admin/procedures');
				}
				else
				{
				$this->form_validation->set_rules('procAbbr', 'Abbreviation', 'required|callback_proc_abbriviation_check');
				
				if ($this->form_validation->run() == FALSE)
			  			{
				  		}
			  			else
			  			{ 
						//pr($_POST);
						//pr($a);
						//exit;
						$result=$this->opadmin_model->add_edit_procs($_POST);
							foreach($a as $value){
								$docAssign=$this->opadmin_model->doctorAssignToProc($result, $value);
							}
						redirect('op_admin/procedures');
						}
					}
				}
				$this->load->view('header_inner');
               	$this->load->view('ortho_admin/add_edit_procedures',$this->data);
                $this->load->view('footer_inner');
		
	}
	function proc_details()
	{
		$uid=$this->session->userdata('logged_in');
		if($uid['id']=='')
		{
			redirect(base_url());
		}
		$procId=$this->uri->segment(3);
		$details=$this->opadmin_model->getTxProcDetailsById($procId);
		
		$scheduleTime=$this->opsetting_model->getScheduleTimeByUserId($uid['id']);
		$this->data['scheduleTime']=$scheduleTime[0];
		
		$prc=$this->opadmin_model->getAssignDoc($uid['id'], $procId);
		$this->data['resource']=$prc;
			
		$this->data['result']=$details[0];
		$this->load->view('header_inner');
               	$this->load->view('ortho_admin/proc_details',$this->data);
                $this->load->view('footer_inner');
	}
	
	function getScTime()
	{
		$uid=$this->session->userdata('logged_in');
		$tm=$_GET['tm'];
		$res='';
		
		 $res.='<select name="procLength" id="procLength" style="color:#000" onChange="showGrid(this.value, '.$tm.')">
               <option value="">-----Procedure Length-----</option>';
               if($tm==15){ 
               $res.='<option value="15" '.(($result['procedure_length_in_minutes']==15)?'selected':"").'>15 Minutes</option>';
               $res.='<option value="30" '.(($result['procedure_length_in_minutes']==30)?'selected':'').' '.((isset($_POST['procLength'])!='')?'selected':'').'>30 Minutes</option>';
              $res.='<option value="45" '.(($result['procedure_length_in_minutes']==45)?'selected':'').' '.((isset($_POST['procLength'])!='')?'selected':'').'>45 Minutes</option>
               <option value="60" '.(($result['procedure_length_in_minutes']==60)?'selected':'').' '.((isset($_POST['procLength'])!='')?'selected':'').'>60 Minutes</option>
               <option value="75" '.(($result['procedure_length_in_minutes']==75)?'selected':'').' '.((isset($_POST['procLength'])!='')?'selected':'').'>75 Minutes</option>
               <option value="90" '.(($result['procedure_length_in_minutes']==90)?'selected':'').' '.((isset($_POST['procLength'])!='')?'selected':'').'>90 Minutes</option>
               <option value="105" '.(($result['procedure_length_in_minutes']==105)?'selected':'').' '.((isset($_POST['procLength'])!='')?'selected':'').'>105 Minutes</option>
               <option value="120" '.(($result['procedure_length_in_minutes']==120)?'selected':'').' '.((isset($_POST['procLength'])!='')?'selected':'').'>120 Minutes</option>';
               
               
                } elseif($tm==10){ 
               
               $res.='<option value="10" '.(($result['procedure_length_in_minutes']==10)?'selected':'').' '.((isset($_POST['procLength'])!='')?'selected':'').'>10 Minutes</option>
               <option value="20" '.(($result['procedure_length_in_minutes']==20)?'selected':'').' '.((isset($_POST['procLength'])!='')?'selected':'').'>20 Minutes</option>
              <option value="30" '.(($result['procedure_length_in_minutes']==30)?'selected':'').' '.((isset($_POST['procLength'])!='')?'selected':'').'>30 Minutes</option>
               <option value="40" '.(($result['procedure_length_in_minutes']==40)?'selected':'').' '.((isset($_POST['procLength'])!='')?'selected':'').'>40 Minutes</option>
               <option value="50" '.(($result['procedure_length_in_minutes']==50)?'selected':'').' '.((isset($_POST['procLength'])!='')?'selected':'').'>50 Minutes</option>
               <option value="60" '.(($result['procedure_length_in_minutes']==60)?'selected':'').' '.((isset($_POST['procLength'])!='')?'selected':'').'>60 Minutes</option>';
              
               
               } elseif($tm==20){
               
              
               $res.='<option value="20" '.(($result['procedure_length_in_minutes']==20)?'selected':'').' '.((isset($_POST['procLength'])!='')?'selected':'').'>20 Minutes</option>
              <option value="40" '.(($result['procedure_length_in_minutes']==40)?'selected':'').' '.((isset($_POST['procLength'])!='')?'selected':'').'>40 Minutes</option>
               <option value="60" '.(($result['procedure_length_in_minutes']==60)?'selected':'').' '.((isset($_POST['procLength'])!='')?'selected':'').'>60 Minutes</option>
                <option value="80" '.(($result['procedure_length_in_minutes']==80)?'selected':'').' '.((isset($_POST['procLength'])!='')?'selected':'').'>80 Minutes</option>
              <option value="100" '.(($result['procedure_length_in_minutes']==100)?'selected':'').' '.((isset($_POST['procLength'])!='')?'selected':'').'>100 Minutes</option>
               <option value="120" '.(($result['procedure_length_in_minutes']==120)?'selected':'').' '.((isset($_POST['procLength'])!='')?'selected':'').'>120 Minutes</option>';
               
               
                } elseif($tm==5){ 
               $res.='<option value="5" '.(($result['procedure_length_in_minutes']==5)?'selected':'').' '.((isset($_POST['procLength'])!='')?'selected':'').'>5 Minutes</option>
               <option value="10" '.(($result['procedure_length_in_minutes']==10)?'selected':'').' '.((isset($_POST['procLength'])!='')?'selected':'').'>10 Minutes</option>
               <option value="15" '.(($result['procedure_length_in_minutes']==15)?'selected':'').' '.((isset($_POST['procLength'])!='')?'selected':'').'>15 Minutes</option>
			    <option value="20" '.(($result['procedure_length_in_minutes']==20)?'selected':'').' '.((isset($_POST['procLength'])!='')?'selected':'').'>20 Minutes</option>
               <option value="25" '.(($result['procedure_length_in_minutes']==25)?'selected':'').' '.((isset($_POST['procLength'])!='')?'selected':'').'>25 Minutes</option>
              <option value="30" '.(($result['procedure_length_in_minutes']==30)?'selected':'').' '.((isset($_POST['procLength'])!='')?'selected':'').'>30 Minutes</option>
               <option value="45" '.(($result['procedure_length_in_minutes']==45)?'selected':'').' '.((isset($_POST['procLength'])!='')?'selected':'').'>45 Minutes</option>
               <option value="60" '.(($result['procedure_length_in_minutes']==60)?'selected':'').' '.((isset($_POST['procLength'])!='')?'selected':'').'>60 Minutes</option>';
               
               
               
              } elseif($tm==3) {
                $res.='<option value="3" '.(($result['procedure_length_in_minutes']==3)?'selected':'').' '.((isset($_POST['procLength'])!='')?'selected':'').'>3 Minutes</option>
               <option value="6" '.(($result['procedure_length_in_minutes']==6)?'selected':'').' '.((isset($_POST['procLength'])!='')?'selected':'').'>6 Minutes</option>
               <option value="9" '.(($result['procedure_length_in_minutes']==9)?'selected':'').' '.((isset($_POST['procLength'])!='')?'selected':'').'>9 Minutes</option>
               <option value="12" '.(($result['procedure_length_in_minutes']==12)?'selected':'').' '.((isset($_POST['procLength'])!='')?'selected':'').'>12 Minutes</option>
               <option value="15" '.( ($result['procedure_length_in_minutes']==15)?'selected':'').' '.((isset($_POST['procLength'])!='')?'selected':'').'>15 Minutes</option>
               <option value="30" '.(($result['procedure_length_in_minutes']==30)?'selected':'').' '.((isset($_POST['procLength'])!='')?'selected':'').'>30 Minutes</option>
               <option value="45" '.(($result['procedure_length_in_minutes']==45)?'selected':'').' '.((isset($_POST['procLength'])!='')?'selected':'').'>45 Minutes</option>
               <option value="60" '.(($result['procedure_length_in_minutes']==60)?'selected':'').' '.((isset($_POST['procLength'])!='')?'selected':'').'>60 Minutes</option>';
               
               }
                $res.='</select>';
		
		echo $res;
	}
			
	function uploadCSV()
	{
		$uid=$this->session->userdata('logged_in');
		if($uid['id']=='')
		{
			redirect(base_url());
		}
		//pr($_POST); exit;
		//Download a csv file format to fill procedure data
		if($_POST['dwnloadCSV_x']!='')
		{
			
			$file = 'opProc.csv';

			if (file_exists($file)) {
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename='.basename($file));
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header('Content-Length: ' . filesize($file));
			ob_clean();
			flush();
			readfile($file);
			exit;
			}
		}
		
		//Upload  a csv file format to import  procedures in db
		if($_POST['Save'] !='')
		{
			
		$this->form_validation->set_rules('uploadCSV', 'Upload CSV', 'callback_uploadFile_chk');
		if($this->form_validation->run() == FALSE)
		{
		}
		else{
		 $handle = fopen($_FILES['uploadCSV']['tmp_name'], "r");
		 $data = fgetcsv($handle, 1000, ",");
		
	     while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
			$alreadyExists=$this->opadmin_model->getProcDetailsByAbbr($data[1], $uid['id']);
			if(count($alreadyExists) <= 0){
			$_POST['class_id']=$data[0];
			$_POST['procName']=$data[2];
			$_POST['procAbbr']=$data[1];
			$_POST['scheduleT']=$data[3];
			$_POST['procLength']=$data[4];
			$_POST['procWeight']=$data[5]; 
			$_POST['price']=0;
			$_POST['status']=1;
			$doc=explode(',', $data['7']);
			$tm=explode(',', $data['6']);
			//pr($doc);
			//pr($tm);
			if(!empty($doc))
				{
					$i=0;
					foreach($doc as $assignTm)
					{
						$a[$i]['assignTime']=$tm[$i];
						$a[$i]['docno']=$doc[$i];
						//$a[$i]['desc']=$_POST['desc'][$i];
						$i++;
					}
				}
			$result=$this->opadmin_model->add_edit_procs($_POST);
			if($result!=''){
				foreach($a as $value)
				{
					//pr($value);
					$docAssign=$this->opadmin_model->doctorAssignToProc($result, $value);	
				}
				
			}
			
			 }
			 
	    }
		 fclose($handle);
		 //exit;
		redirect('op_admin/procedures');
		}
		}
		$this->load->view('header_inner');
        $this->load->view('ortho_admin/upload_csv_procedures',$this->data);
        $this->load->view('footer_inner');
		
	}
	
	function showGrid()
	{
		$tm=$_GET['tm'];
		$val=$_GET['val'];
		$cId=$_GET['cl'];
		$rest=$val/$tm;
		$k='';
		for($i=1; $i <= $rest; $i++)
		{
			$j=0;
			$g=$j;
			$f=$j+$k;
			$k+=$tm;
			$result=$this->opadmin_model->getResourceByClassId($cId);
			$data='
			<div class="hlogin" >
			<div class="hlogin_label">Time Assignment '.$i.'</div>
			<div class="hlogin_inputs" >
			<div style="width:80px; float:left; padding-top:5px ">'.$f.'-'.$k.' Minutes</div>
			<input type="hidden" name="assignTime[]" value="'.$f.'-'.$k.'" />
				   <div style="width:140px; float:left"><select name="docno[]" id="docno[]">
				   ';
				   
				 //  if(isset($result[0]['resource'])==1): 
				 $data.='<option value="a">Staff</option>';
				  $data.='<option value="e">Physical Equipment</option>';
				 $data.=' <option value="d">Doctor</option>';
				 // endif;
				   $data.='</select>
				   </div>
				   <div style="float:left; width:280px"><input type="text" name="desc[]" id="desc" /></div>
				   <div style="clear:both"></div>
				   </div>
              <div class="clear"></div>
            </div>';
			echo $data;	
		}
	}
	function deleteProcedure()
	{
		$uid=$this->session->userdata('logged_in');
		if($uid['id']=='')
		{
			redirect(base_url());
		}
		$id=$this->uri->segment(3);
		$this->opadmin_model->delteProcedure($id);
		redirect(base_url().'op_admin/procedures');
		
	}
	function proc_abbriviation_check()
	{		$result = $_POST['procAbbr'];
			$uid=$this->session->userdata('logged_in');
			$query=$this->db->query("select proc_abbr from op_procedures where proc_abbr='$result' and user_id='".$uid['id']."'")->result_array();
				if($query)
				{
  			  	$this->form_validation->set_message('proc_abbriviation_check', 'Procedure Abbreviation already exists.');
   				 return FALSE;
				}
				else{return TRUE;}
	
	}
	
	function uploadFile_chk()
	{
		$handle = fopen($_FILES['uploadCSV']['tmp_name'], "r");
		$data = fgetcsv($handle, 1000, ",");
		 
		if($data[0]!='Class ID' || $data[1]!='Procedure Abbrivation' || $data[2]!='Procedure Name' || $data[3]!='Time Interval'|| $data[4]!='Procedure Length'|| $data[5]!='Procedure Weight'|| $data[6]!='Time Assignment'|| $data[7]!='Staff'|| $data[8]!='Status')
		{
			$this->form_validation->set_message('uploadFile_chk', 'Please select valid CSV file format.');
			return FALSE;	
		}
		else{return TRUE;}
	}
	
	
	function procName_check()
	{		$result = $_POST['procName'];
			$uid=$this->session->userdata('logged_in');
			$query=$this->db->query("select procedure_name from op_procedures where procedure_name='$result' and user_id='".$uid['id']."'")->result_array();
			if($query)
			{
  			  	$this->form_validation->set_message('procName_check', 'Procedure Name already exists.');
   				 return FALSE;
			}
			else
			{		
				return TRUE;
			}
	} 
	/*----------------Doctors Management--------------------------------------*/
	function doctors()
	{
		$uid=$this->session->userdata('logged_in');
		if($uid['id']=='')
		{
			redirect(base_url());
		}
				$result=$this->opadmin_model->getDoctorDetailsByUserId($uid['id']);
				$this->data['result']=$result;
				$this->load->view('header_inner');
               	$this->load->view('ortho_admin/manage_doctors',$this->data);
                $this->load->view('footer_inner');
		
	}
	function addDoctor()
	{
		$uid=$this->session->userdata('logged_in');
		if($uid['id']=='')
		{
			redirect(base_url());
		}
						$id=$this->uri->segment(3);
						$result=$this->opadmin_model->getDoctorDetailsById($id);
						$this->data['result']=$result[0];
						//print_r($result);
				if(count($_POST) !='')
				{
					
					if($id!=''){
						
						$this->opadmin_model->add_edit_doctor($_POST, $id);
						redirect('op_admin/doctors');
					}
					else
					{
						$result=$this->opadmin_model->add_edit_doctor($_POST);
						redirect('op_admin/doctors');
					}
				}
				$this->load->view('header_inner');
               	$this->load->view('ortho_admin/add_edit_doctors',$this->data);
                $this->load->view('footer_inner');
		
	}
	function deleteDoctor()
	{
		$uid=$this->session->userdata('logged_in');
		if($uid['id']=='')
		{
			redirect(base_url());
		}
		$id=$this->uri->segment(3);
		$this->opadmin_model->deleteDoctor($id);
		redirect(base_url().'op_admin/doctors');
		
	}
	function docTime()
	{
		$uid=$this->session->userdata('logged_in');
		if($uid['id']=='')
		{
			redirect(base_url());
		}
		$docDetails=$this->opadmin_model->getDoctorsTimeAllot($uid['id']);
		$this->data['doctors']=$docDetails;
		
		
		$this->load->view('header_inner');
        $this->load->view('ortho_admin/doctor_time_allotment',$this->data);
        $this->load->view('footer_inner');
		
	}
	
		/*----------------Treatment management--------------------------------------*/
	function treatments()
	{
		$uid=$this->session->userdata('logged_in');
		if($uid['id']=='')
		{
			redirect(base_url());
		}
				$result=$this->opadmin_model->getTreatmentDetailsByUserId($uid['id']);
				$this->data['result']=$result;
				$this->load->view('header_inner');
               	$this->load->view('ortho_admin/manage_treatments',$this->data);
                $this->load->view('footer_inner');
		
	}
	function addTreatment()
	{
		$uid=$this->session->userdata('logged_in');
		if($uid['id']=='')
		{
			redirect(base_url());
		}
						$id=$this->uri->segment(3);
						$procList=$this->opadmin_model->getProcDetails();
						$result=$this->opadmin_model->getTreatmentDetailsById($id);
						$this->data['result']=$result[0];
						$this->data['procList']=$procList;
						//print_r($result);
				if(count($_POST) !='')
				{
					
					if($id!=''){
						
						$this->opadmin_model->add_edit_treatment($_POST, $id);
						redirect('op_admin/treatments');
					}
					else
					{
						$this->form_validation->set_rules('treatName', 'Treatment Name', 'required|callback_treatment_check');
					if ($this->form_validation->run() == FALSE)
			  			{
				  		//$this->data['message']='something wrong';
						
			  			}
			  			else
			  			{ 
					
						$result=$this->opadmin_model->add_edit_treatment($_POST);
						redirect('op_admin/treatments');
					}
				}
				}
				$this->load->view('header_inner');
               	$this->load->view('ortho_admin/add_edit_treatments',$this->data);
                $this->load->view('footer_inner');
		
	}
	function deleteTreatment()
	{
		$uid=$this->session->userdata('logged_in');
		if($uid['id']=='')
		{
			redirect(base_url());
		}
		$id=$this->uri->segment(3);
		$this->opadmin_model->delteTreatment($id);
		redirect(base_url().'op_admin/treatments');
		
	}
	function treatment_check()
	{		$result = $_POST['treatName'];
			$uid=$this->session->userdata('logged_in');
			$query=$this->db->query("select treatment_name from treatment_type where treatment_name='$result' and user_id='".$uid['id']."'")->result_array();
			if($query)
			{
  			  	$this->form_validation->set_message('treatment_check', 'Treatment name already exist.');
   				 return FALSE;
			}
			else
			{		
				return TRUE;
			}
	}  
	
	/*----------------Manage Inputs--------------------------------------*/
	
	
	function practiceInputs(){
		$uid=$this->session->userdata('logged_in');
		if($uid['id']==''){
			redirect(base_url());
		}
		//$result=$this->opadmin_model->getInputs($uid['id']);
		//$this->data['result']=$result;
		$month_arr=$this->common_model->getMonthList('month');
		$this->data['month_arr']=$month_arr; 
		
		if(isset($_POST['Save'])){
			$this->form_validation->set_rules('tx_type', 'Treatment Type', 'trim|required');
            $this->form_validation->set_rules('tx_avg_time', 'Treatment Avg Time', 'trim|required|is_numeric');
            $this->form_validation->set_rules('tx_visit', 'Treatment Visit', 'trim|required|is_numeric');
            $this->form_validation->set_rules('tx_timegap', 'Treatment Time Gap', 'trim|required|is_numeric');	
			
			$this->db->query("delete from manage_practice_inputs where month='".$_POST['month']."' and year='".$_POST['year']."' and user_id='".$uid['id']."'");
			$this->db->query("delete from doctor_time_in_percent where month='".$_POST['month']."' and year='".$_POST['year']."' and user_id='".$uid['id']."'");
			
			foreach($_POST['doctor'] as $key=>$value)
			{
					$_POST['doctor']=$key;
					$_POST['docTime']=$value;
					//pr($_POST);
				$this->opadmin_model->add_edit_doc_percent($_POST);
			}
			//pr($_POST); 
			//exit;
			$this->opadmin_model->add_edit_inputs($_POST);
			redirect('op_admin/practiceInputs');
		}
		
		$this->load->view('header_inner');
       	$this->load->view('ortho_admin/manage_inputs',$this->data);
        $this->load->view('footer_inner');
	}
	
	function getUserInputs(){
				
		if (!isset($_GET["month"])) $_GET["month"] = date("n");
			if (!isset($_GET["year"])) $_GET["year"] = date("Y");
			//echo $_REQUEST['month']; exit;
			
			$cMonth = $_GET["month"];
			$cYear = $_GET["year"];
	}		
	
	
	/*----------------Hour breaks management--------------------------------------*/
	function breaks()
	{
		$uid=$this->session->userdata('logged_in');
		if($uid['id']=='')
		{
			redirect(base_url());
		}
				$result=$this->opadmin_model->getBreakDetailsList($uid['id']);
				$this->data['result']=$result;
				$this->load->view('header_inner');
               	$this->load->view('ortho_admin/manage_breaks',$this->data);
                $this->load->view('footer_inner');
		
	}
	function addBreak()
	{
		$uid=$this->session->userdata('logged_in');
		if($uid['id']=='')
		{
			redirect(base_url());
		}
			$id=$this->uri->segment(3);
			$result=$this->opadmin_model->getBreakDetailsById($id);
			$this->data['result']=$result[0];
			//pr($result);
			if(count($_POST) !='')
			{
				if($id!=''){
					//pr($_POST);
					//$this->form_validation->set_rules('breakType', 'Break yype', 'required|callback_break_check');
					$this->form_validation->set_rules('applyTime', 'Apply time', 'required|callback_break_time_chk');
					if ($this->form_validation->run() == FALSE)
			  		{
				  		//$this->data['message']='something wrong';
						
			  		}
			  			else
			  			{ 
						//$this->opadmin_model->delteBreak($id);
				$this->opadmin_model->add_edit_break($_POST, $id);
				redirect('op_admin/breaks');
				}
				}
				else
				{
					$this->form_validation->set_rules('breakType', 'Break type', 'required|callback_break_check');
					$this->form_validation->set_rules('applyTime', 'Apply time', 'required|callback_break_time_chk');
					if ($this->form_validation->run() == FALSE)
			  		{
				  		//$this->data['message']='something wrong';
						
			  		}
			  			else
			  			{ 
						$result=$this->opadmin_model->add_edit_break($_POST);
						redirect('op_admin/breaks');
					}
				}
				}
				$this->load->view('header_inner');
               	$this->load->view('ortho_admin/add_edit_breaks',$this->data);
                $this->load->view('footer_inner');
		
	}
	function deleteBreak()
	{
		$uid=$this->session->userdata('logged_in');
		if($uid['id']=='')
		{
			redirect(base_url());
		}
		$id=$this->uri->segment(3);
		$this->opadmin_model->delteBreak($id);
		redirect(base_url().'op_admin/breaks');
		
	}
	function break_check()
	{		$result = $_POST['breakType'];
			$uid=$this->session->userdata('logged_in');
			$query=$this->db->query("select break_type from op_time_interval where break_type='$result' and user_id='".$uid['id']."'")->result_array();
			if($query)
			{
  			  	$this->form_validation->set_message('break_check', 'Interval type already exist.');
   				 return FALSE;
			}
			else
			{		
				return TRUE;
			}
	} 
	function break_time_chk()
	{
		$result = $_POST['applyTime'];
		$brkType = $_POST['breakType'];
		$uid=$this->session->userdata('logged_in');
		$query=$this->db->query("select break_time from op_time_interval where break_time='$result' and user_id='".$uid['id']."' AND break_type !='$brkType'")->result_array();
		if($query)
		{
  		  	$this->form_validation->set_message('break_time_chk', 'This break time is already applied.');
   			 return FALSE;
		}
		else
		{		
			return TRUE;
		}
	}
	
	/*----------------Schedule Calendar management--------------------------------------*/	
	
	
		
	function scheduleCalendar()
	{
		$uid=$this->session->userdata('logged_in');
		if($uid['id']=='')
		{
			redirect(base_url());
		}
		$month_arr=$this->common_model->getMonthList('month');
		$this->data['month_arr']=$month_arr;
		$this->data['uid'] = $uid['id']; 
		
		if(count($_POST) > 0){
			$working=array_diff_key($_POST['D'], $_POST['day']);
			$nonWork=$_POST['day'];
			
			
			
			if($_POST['day']==''){
				
				foreach($_POST['D'] as $key=>$work){
				$_POST['is_workable']='Y';
				$_POST['date']=$key;
				$_POST['day']=$work;
				$isRecordExist = false;
				$isRecordExist = $this->opadmin_model->isMonthDayExist($uid['id'], $_POST['date'], $_POST['day'], $_POST['month'], $_POST['year']);
				if($isRecordExist){
					 // update the record.
					
					$this->opadmin_model->updateDayEntry($isRecordExist, $_POST['is_workable']);
				}else{ // add a new record. 
					$this->opadmin_model->saveWorkingDays($_POST, $uid['id']);
				}	
			}
			}
			elseif($working== '')
			{
				foreach($_POST['day'] as $key=>$work){
				$_POST['is_workable']='N';
				$_POST['date']=$key;
				$_POST['day']=$work;
				// to avoid the duplicacy, we need to check each day before adding a new day entry.
				$isRecordExist = false;
				$isRecordExist = $this->opadmin_model->isMonthDayExist($uid['id'], $_POST['date'], $_POST['day'], $_POST['month'], $_POST['year']);
				if($isRecordExist){ // update the record.
					$this->opadmin_model->updateDayEntry($isRecordExist, $_POST['is_workable']);
				}else{ // add a new record. 
					$this->opadmin_model->saveWorkingDays($_POST, $uid['id']);
				}	
			}
			}
			
			else{
			
			// To insert records for working days.
			foreach($working as $key=>$work){
				$_POST['is_workable']='Y';
				$_POST['date']=$key;
				$_POST['day']=$work;
				
				// to avoid the duplicacy, we need to check each day before adding a new day entry.
				$isRecordExist = false;
				$isRecordExist = $this->opadmin_model->isMonthDayExist($uid['id'], $_POST['date'], $_POST['day'], $_POST['month'], $_POST['year']);
				if($isRecordExist){ // update the record.
					$this->opadmin_model->updateDayEntry($isRecordExist, $_POST['is_workable']);
				}else{ // add a new record. 
					$this->opadmin_model->saveWorkingDays($_POST, $uid['id']);
				}	
			}
			
			// To insert records for non-working days.
			foreach($nonWork as $key=>$nonWork)	{
				$_POST['is_workable']='N';
				$_POST['date']=$key;
				$_POST['day']=$nonWork;
				
				// to avoid the duplicacy, we need to check each day before adding a new day entry.
				$isRecordExist = false;
				$isRecordExist = $this->opadmin_model->isMonthDayExist($uid['id'], $_POST['date'], $_POST['day'], $_POST['month'], $_POST['year']);
				if($isRecordExist){ // update the record.
					$this->opadmin_model->updateDayEntry($isRecordExist, $_POST['is_workable']);
				}else{ // add a new record.
					$this->opadmin_model->saveWorkingDays($_POST, $uid['id']);
				}	
			}
			}
			redirect('op_admin/scheduleCalendar');
			
		}
		$this->load->view('header_inner');
        $this->load->view('ortho_admin/schedule_calendar',$this->data);
        $this->load->view('footer_inner');
		
	}
	
	function dayWise()
	{
		$uid=$this->session->userdata('logged_in');
		if($uid['id']=='')
		{
			redirect(base_url());
		}
		
		$month_arr=$this->common_model->getMonthList('month');
		$this->data['month_arr']=$month_arr;
		$this->data['uid'] = $uid['id']; 
		$workingD=$this->opadmin_model->getWorkingDays($uid['id'], $_POST['month1'], $_POST['year']);	
		$this->data['wDay']=$workingD;
		
		
			
		if(isset($_POST['cal'])== 'Monthly')
		{
			
			foreach($workingD as $mon)
				{
				if($mon['day']=='Mon'){
						$isRecordExist = false;
						$isRecordExist = $this->opadmin_model->isMonthDayExist($uid['id'], $mon['date'], 'Mon', $_POST['month1'], $_POST['year']);
						if($isRecordExist){ // update the record.
						$this->opadmin_model->updateMonthlyEntry($isRecordExist, $_POST['mon_hour']);
						}
						else{ 
							$this->opadmin_model->saveMonthly($_POST, $uid['id'], $mon['day'], $_POST['mon_hour']);
						}
					}
				}
				foreach($workingD as $mon)
				{
				if($mon['day']=='Tue')
					{
						$isRecordExist = false;
						$isRecordExist = $this->opadmin_model->isMonthDayExist($uid['id'],$mon['date'], 'Tue', $_POST['month1'], $_POST['year']);
						//pr($isRecordExist);exit;
						if($isRecordExist){ // update the record.
						$this->opadmin_model->updateMonthlyEntry($isRecordExist, $_POST['tue_hour']);
				}else{ 
					$this->opadmin_model->saveMonthly($_POST, $uid['id'], $mon['day'], $_POST['tue_hour']);
					}
					}
				}
				foreach($workingD as $mon)
				{
				if($mon['day']=='Wed')
					{
						$isRecordExist = false;
						$isRecordExist = $this->opadmin_model->isMonthDayExist($uid['id'], $mon['date'], 'Wed', $_POST['month1'], $_POST['year']);
						//pr($isRecordExist);exit;
						if($isRecordExist){ // update the record.
						$this->opadmin_model->updateMonthlyEntry($isRecordExist, $_POST['wed_hour']);
				}else{ 
					$this->opadmin_model->saveMonthly($_POST, $uid['id'], $mon['day'], $_POST['wed_hour']);
					}}
				}
				foreach($workingD as $mon)
				{
				if($mon['day']=='Thu')
					{$isRecordExist = false;
						$isRecordExist = $this->opadmin_model->isMonthDayExist($uid['id'], $mon['date'], 'Thu', $_POST['month1'], $_POST['year']);
						//pr($isRecordExist);exit;
						if($isRecordExist){ // update the record.
						$this->opadmin_model->updateMonthlyEntry($isRecordExist, $_POST['thu_hour']);
				}else{ 
					$this->opadmin_model->saveMonthly($_POST, $uid['id'], $mon['day'], $_POST['thu_hour']);
					}}
				}
				foreach($workingD as $mon)
				{
				if($mon['day']=='Fri')
					{$isRecordExist = false;
						$isRecordExist = $this->opadmin_model->isMonthDayExist($uid['id'], $mon['date'], 'Fri', $_POST['month1'], $_POST['year']);
						//pr($isRecordExist);exit;
						if($isRecordExist){ // update the record.
						$this->opadmin_model->updateMonthlyEntry($isRecordExist, $_POST['fri_hour']);
				}else{ 
					$this->opadmin_model->saveMonthly($_POST, $uid['id'], $mon['day'], $_POST['fri_hour']);
					}}
				}
				foreach($workingD as $mon)
				{
				if($mon['day']=='Sat')
					{$isRecordExist = false;
						$isRecordExist = $this->opadmin_model->isMonthDayExist($uid['id'], $mon['date'], 'Sat', $_POST['month1'], $_POST['year']);
						//pr($isRecordExist);exit;
						if($isRecordExist){ // update the record.
						$this->opadmin_model->updateMonthlyEntry($isRecordExist, $_POST['sat_hour']);
				}else{ 
					$this->opadmin_model->saveMonthly($_POST, $uid['id'], $mon['day'], $_POST['sat_hour']);
					}}
				}
				foreach($workingD as $mon)
				{
				if($mon['day']=='Sun')
					{$isRecordExist = false;
						$isRecordExist = $this->opadmin_model->isMonthDayExist($uid['id'], $mon['date'], 'Sun', $_POST['month1'], $_POST['year']);
						//pr($isRecordExist);exit;
						if($isRecordExist){ // update the record.
						$this->opadmin_model->updateMonthlyEntry($isRecordExist, $_POST['sun_hour']);
				}else{ 
					$this->opadmin_model->saveMonthly($_POST, $uid['id'], $mon['day'], $_POST['sun_hour']);
					}}
				}
				//$this->session->set_userdata('msg', "Hours added successfully.");
				echo "<script>alert('Hours added successfully.')</script>";
				redirect('op_admin/dayWise');
			//}
			
			
		}
		elseif(isset($_POST['SaveWeekly'])){
			
				foreach($_POST['mondayhour'] as $key=>$mon)
				{
					$this->opadmin_model->saveWeekly($_POST, $uid['id'], $key, $mon);
				}
				foreach($_POST['tuesdayhour'] as $key=>$tue)
				{
					$this->opadmin_model->saveWeekly($_POST, $uid['id'], $key, $tue);
				}
				foreach($_POST['wednesdayhour'] as $key=>$wed)
				{
					$this->opadmin_model->saveWeekly($_POST, $uid['id'], $key, $wed);
				}
				foreach($_POST['thursdayhour'] as $key=>$thu)
				{
					$this->opadmin_model->saveWeekly($_POST, $uid['id'], $key, $thu);
				}
				foreach($_POST['fridayhour'] as $key=>$fri)
				{
					$this->opadmin_model->saveWeekly($_POST, $uid['id'], $key, $fri);
				}
				foreach($_POST['saturdayhour'] as $key=>$sat)
				{
					$this->opadmin_model->saveWeekly($_POST, $uid['id'], $key, $sat);
				}
				foreach($_POST['sundayhour'] as $key=>$sun)
				{
					$this->opadmin_model->saveWeekly($_POST, $uid['id'], $key, $sun);
				}
				echo "<script>alert('Hours added successfully.')</script>";
				redirect('op_admin/dayWise');
				//pr($_POST);
		}
		$this->load->view('header_inner');
        $this->load->view('ortho_admin/schedule_dayWise', $this->data);
        $this->load->view('footer_inner');
				
	}
	
	function generateCal()
	{
				
		if (!isset($_GET["month"])) $_GET["month"] = date("n");
			if (!isset($_GET["year"])) $_GET["year"] = date("Y");
			//echo $_REQUEST['month']; exit;
			
			$cMonth = $_GET["month"];
			$cYear = $_GET["year"];
			$uid = $_GET["user_id"];
 
			$prev_year = $cYear;
			$next_year = $cYear;
			$prev_month = $cMonth-1;
			$next_month = $cMonth+1;
			 
			if ($prev_month == 0 ) {
				$prev_month = 12;
				$prev_year = $cYear - 1;
			}
			if ($next_month == 13 ) {
				$next_month = 1;
				$next_year = $cYear + 1;
			}
			$month_name= $this->common_model->getMonthNameFromId('month',$cMonth);
							
				$cal='<table width="450" height="210" style="margin-left:100px; border:solid #ccc 1px; margin-bottom:10px ">
						<tr align="center">
						<td bgcolor="#999999" style="color:#FFFFFF">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
							
						</table>
						</td>
						</tr>
						<tr>
						<td align="center" style="vertical-align:top">
						<table width="100%" border="0" cellpadding="2" cellspacing="2">
						<tr align="center">
						<td colspan="7" bgcolor="#999999" style="color:#FFFFFF"><B>'.$month_name[0]->value.', '.$cYear.'</B></td>
						</tr>
						<tr>
						<td align="center" bgcolor="#999999" style="color:#FFFFFF"><B>S</B></td>
						<td align="center" bgcolor="#999999" style="color:#FFFFFF"><B>M</B></td>
						<td align="center" bgcolor="#999999" style="color:#FFFFFF"><B>T</B></td>
						<td align="center" bgcolor="#999999" style="color:#FFFFFF"><B>W</B></td>
						<td align="center" bgcolor="#999999" style="color:#FFFFFF"><B>T</B></td>
						<td align="center" bgcolor="#999999" style="color:#FFFFFF"><B>F</B></td>
						<td align="center" bgcolor="#999999" style="color:#FFFFFF"><B>S</B></td>
						</tr>';
			$timestamp = mktime(0,0,0,$cMonth,1,$cYear);
			$maxday = date("t",$timestamp);
			$thismonth = getdate ($timestamp);
			$startday = $thismonth['wday'];
			for ($i=0; $i<($maxday+$startday); $i++) {
				
				$chk_flag = false;
				$date_arr = $this->opadmin_model->getSingleDayDetails($uid, $cMonth, $cYear,($i - $startday + 1));
				if(count($date_arr)>0){
					if($date_arr[0]['is_workable']=='N'){
						$chk_flag = true;
					}elseif($date_arr[0]['is_workable']=='Y'){
						$chk_flag = false;
					}
				}else{
					if(($i % 7)==6 || ($i % 7)==0){
						$chk_flag = true;
					}
				}	
					
				$d='';
				if(($i % 7) == 1){
				if(($i - $startday + 1) > 0){
					$d='Mon';
				}}
				if(($i % 7) == 2){
				 if(($i - $startday + 1) > 0){
					$d='Tue';
				}}
				if(($i % 7) == 3){
				 if(($i - $startday + 1) > 0){
				 $d='Wed';
				}}
				if(($i % 7) == 4){
				 if(($i - $startday + 1) > 0){
				 $d='Thu';
				}}
				if(($i % 7) == 5){
				 if(($i - $startday + 1) > 0){
				 $d='Fri';			
				}}
				if(($i % 7) == 6){
				 if(($i - $startday + 1) > 0){
				 $d='Sat';
				}}
				if(($i % 7) == 0){
					if(($i - $startday + 1) > 0){
				$d='Sun';
				}}
				
				
				
				if(($i % 7) == 0 ) $cal.='<tr>';
				if($i < $startday) $cal.='<td></td>';
				else $cal.='<td align="left"  height="30px" width="15px"><div style="margin-left:10px; padding-top:3px; width:10px; float:left">'. ($i - $startday + 1) . '</div><span style="padding:0 5px 5px 5px"><input type="checkbox" onclick="checkClick(this.id)" id="day'.($i - $startday + 1).'" name="day['.($i - $startday + 1).']" value="'.$d.'" '.(($chk_flag)?'checked=true':'').'/>';
				
				$cal.=' </span>';
				if($i >= $startday)
				$cal.='<input type="hidden" id="D_'.($i - $startday + 1).'" name="D['.($i - $startday + 1).']" value="'.$d.'" />
				</td>';
				if(($i % 7) == 6 ) $cal.='</tr>';
				
				//echo 'i ='.$i.'<br/>';
			}
			$cal.='</table>
			</td>
			</tr>
			</table>';
echo $cal;
	}
	
	function generateMonthly()
	{
			$uid=$this->session->userdata('logged_in');		
		if (!isset($_GET["month"])) $_GET["month"] = date("n");
			if (!isset($_GET["year"])) $_GET["year"] = date("Y");
			$cMonth = $_GET["month"];
			$cYear = $_GET["year"];
			
			$q=$this->opadmin_model->getWorkingDays($uid['id'], $cMonth, $cYear);
			if(count($q) > 0){
			
 			
			$prev_year = $cYear;
			$next_year = $cYear;
			$prev_month = $cMonth-1;
			$next_month = $cMonth+1;
			 
			if ($prev_month == 0 ) {
				$prev_month = 12;
				$prev_year = $cYear - 1;
			}
			if ($next_month == 13 ) {
				$next_month = 1;
				$next_year = $cYear + 1;
			}
			$timestamp = mktime(0,0,0,$cMonth,1,$cYear);
			$maxday = date("t",$timestamp);
			$thismonth = getdate ($timestamp);
			$startday = $thismonth['wday'];
			
			for ($i=0; $i<($maxday+$startday); $i++) {
				if(($i % 7) == 1){
				if(($i - $startday + 1) > 0){
				echo $mon=($i - $startday + 1).'~';
				 
				}}
				if(($i % 7) == 2){
				 if(($i - $startday + 1) > 0){
				echo $tue=($i - $startday + 1).'_';
				
				}}
				if(($i % 7) == 3){
				 if(($i - $startday + 1) > 0){
				 echo $wed=($i - $startday + 1).'-';
				
				}}
				if(($i % 7) == 4){
				 if(($i - $startday + 1) > 0){
				 echo $thu=($i - $startday + 1).'!';
				
				}}
				if(($i % 7) == 5){
				 if(($i - $startday + 1) > 0){
				 echo $fri=($i - $startday + 1).'^';	
					
				}}
				if(($i % 7) == 6){
				 if(($i - $startday + 1) > 0){
				 echo $sat=($i - $startday + 1).',';
				
				}}
				if(($i % 7) == 0){
					if(($i - $startday + 1) > 0){
				echo $sun=($i - $startday + 1).'|';
				
				}}
			}
		}
		else
		{
		}
			$query=$this->opadmin_model->getWorkingDays($uid['id'], $cMonth, $cYear);
		
	}
	function getSumOfDays()
	{
		$uid=$this->session->userdata('logged_in');	
		$cMonth = $_GET["month"];
		$cYear = $_GET["year"];
		$a=array('1'=>'Mon','2'=>'Tue','3'=>'Wed','4'=>'Thu','5'=>'Fri','6'=>'Sat','7'=>'Sun');
		foreach($a as $a){
		$workingD=$this->opadmin_model->getSumWorkHour($uid['id'], $cMonth, $cYear, $a);
		if(count($workingD) > 0){
		echo $workingD[0]['working_hours'].'@';
		}
		}
	}
	
	function generateWeekly()
	{
		$uid=$this->session->userdata('logged_in');			
		if (!isset($_GET["month"])) $_GET["month"] = date("n");
			if (!isset($_GET["year"])) $_GET["year"] = date("Y");
			$cMonth = $_GET["month"];
			$cYear = $_GET["year"];
 			$q=$this->opadmin_model->getWorkingDays($uid['id'], $cMonth, $cYear);
			if(count($q) > 0){
			$prev_year = $cYear;
			$next_year = $cYear;
			$prev_month = $cMonth-1;
			$next_month = $cMonth+1;
			 
			if ($prev_month == 0 ) {
				$prev_month = 12;
				$prev_year = $cYear - 1;
			}
			if ($next_month == 13 ) {
				$next_month = 1;
				$next_year = $cYear + 1;
			}
			$timestamp = mktime(0,0,0,$cMonth,1,$cYear);
			$maxday = date("t",$timestamp);
			$thismonth = getdate ($timestamp);
			$startday = $thismonth['wday'];
			$weekcal='<div id="countDays">
			<div style="float:left;padding:7px;font-weight:bold;width:130px">Monday Hours:</div>';
			$monD='';$tueD='';$wedD='';$thuD='';$friD='';$satD='';$sunD='';
			for ($i=0; $i<($maxday+$startday); $i++) {
				if(($i % 7) == 1){
				if(($i - $startday + 1) > 0){
				
				$md=$this->db->query("select * from practice_monthly_calendar where user_id='".$uid['id']."' and month='".$cMonth."' and year='".$cYear."' and date='".($i - $startday + 1)."'")->result_array();	
				if(count($md) > 0)
				{
					$monD=$md[0]['working_hours'];
					
				}
				
									
				$weekcal.='<div style="float:left; width:100px"><span style="float:left;width:15px; padding:8px 1px 5px 2px; border-radius:5px 0px 0px 5px; height:17px; text-align:center; background-color:#ccc; color:#333333">'.($i - $startday + 1).'</span>
				<input type="text" name="mondayhour['.($i - $startday + 1).']" id="mondayhour[]" style="width:50%; border-radius:0px 4px 4px 0px" value="'.$monD.'" '.(($md[0]['is_workable']=='N')?'readonly':"").'/>';
				
				$weekcal.='</div>';
				}}
			}
			$weekcal.='</div><div class="clear"></div>
			<div id="countDays">
			<div style="float:left;padding:7px;font-weight:bold;width:130px">Tuesday Hours:</div>';
			for ($i=0; $i<($maxday+$startday); $i++) {
				if(($i % 7) == 2){
				if(($i - $startday + 1) > 0){
				
				$md=$this->db->query("select * from practice_monthly_calendar where user_id='".$uid['id']."' and month='".$cMonth."' and year='".$cYear."' and date='".($i - $startday + 1)."'")->result_array();	
				if(count($md) > 0)
				{
					$monD=$md[0]['working_hours'];
				}
				$weekcal.='<div style="float:left; width:100px"><span style="float:left;width:15px; padding:8px 1px 5px 2px; border-radius:5px 0px 0px 5px; height:17px; text-align:center; background-color:#ccc; color:#333333">'.($i - $startday + 1).'</span><input type="text" name="tuesdayhour['.($i - $startday + 1).']" id="tuesdayhour[]" style="width:50%; border-radius:0px 4px 4px 0px" value="'.$monD.'" '.(($md[0]['is_workable']=='N')?'readonly':"").'/></div>';
				}}
			}
			$weekcal.='</div><div class="clear"></div>
			<div id="countDays">
			<div style="float:left;padding:7px;font-weight:bold;width:130px">Wednesday Hours:</div>';
				for ($i=0; $i<($maxday+$startday); $i++) {
				if(($i % 7) == 3){
				if(($i - $startday + 1) > 0){
					
				$md=$this->db->query("select * from practice_monthly_calendar where user_id='".$uid['id']."' and month='".$cMonth."' and year='".$cYear."' and date='".($i - $startday + 1)."'")->result_array();	
				if(count($md) > 0)
				{
					$monD=$md[0]['working_hours'];
				}
					
				$weekcal.='<div style="float:left; width:100px"><span style="float:left;width:15px; padding:8px 1px 5px 2px; border-radius:5px 0px 0px 5px; height:17px; text-align:center; background-color:#ccc; color:#333333">'.($i - $startday + 1).'</span><input type="text" name="wednesdayhour['.($i - $startday + 1).']" id="wednesdayhour[]" style="width:50%; border-radius:0px 4px 4px 0px" value="'.$monD.'" '.(($md[0]['is_workable']=='N')?'readonly':"").' /></div>';
				}}
			}
			
			$weekcal.='</div><div class="clear"></div>
			<div id="countDays">
			<div style="float:left;padding:7px;font-weight:bold;width:130px">Thursday Hours:</div>';
			for ($i=0; $i<($maxday+$startday); $i++) {
				if(($i % 7) == 4){
				if(($i - $startday + 1) > 0){
					
				$md=$this->db->query("select * from practice_monthly_calendar where user_id='".$uid['id']."' and month='".$cMonth."' and year='".$cYear."' and date='".($i - $startday + 1)."'")->result_array();	
				if(count($md) > 0)
				{
					$monD=$md[0]['working_hours'];
				}		
					
				$weekcal.='<div style="float:left; width:100px"><span style="float:left;width:15px; padding:8px 1px 5px 2px; border-radius:5px 0px 0px 5px; height:17px; text-align:center; background-color:#ccc; color:#333333">'.($i - $startday + 1).'</span><input type="text" name="thursdayhour['.($i - $startday + 1).']" id="thursdayhour[]" style="width:50%; border-radius:0px 4px 4px 0px" value="'.$monD.'" '.(($md[0]['is_workable']=='N')?'readonly':"").' /></div>';
				}}
			}
			
			$weekcal.='</div><div class="clear"></div>
			<div id="countDays">
			<div style="float:left;padding:7px;font-weight:bold;width:130px">Friday Hours:</div>';
			for ($i=0; $i<($maxday+$startday); $i++) {
				if(($i % 7) == 5){
				if(($i - $startday + 1) > 0){
					
				$md=$this->db->query("select * from practice_monthly_calendar where user_id='".$uid['id']."' and month='".$cMonth."' and year='".$cYear."' and date='".($i - $startday + 1)."'")->result_array();	
				if(count($md) > 0)
				{
					$monD=$md[0]['working_hours'];
				}	
					
				$weekcal.='<div style="float:left; width:100px"><span style="float:left;width:15px; padding:8px 1px 5px 2px; border-radius:5px 0px 0px 5px; height:17px; text-align:center; background-color:#ccc; color:#333333">'.($i - $startday + 1).'</span><input type="text" name="fridayhour['.($i - $startday + 1).']" id="fridayhour[]" style="width:50%; border-radius:0px 4px 4px 0px" value="'.$monD.'" '.(($md[0]['is_workable']=='N')?'readonly':"").' /></div>';
				}}
			}
			
			$weekcal.='</div><div class="clear"></div>
			<div id="countDays">
			<div style="float:left;padding:7px;font-weight:bold;width:130px">Saturday Hours:</div>';
			for ($i=0; $i<($maxday+$startday); $i++) {
				if(($i % 7) == 6){
				if(($i - $startday + 1) > 0){
					
				$md=$this->db->query("select * from practice_monthly_calendar where user_id='".$uid['id']."' and month='".$cMonth."' and year='".$cYear."' and date='".($i - $startday + 1)."'")->result_array();	
				if(count($md) > 0)
				{
					$monD=$md[0]['working_hours'];
				}	
					
				$weekcal.='<div style="float:left; width:100px"><span style="float:left;width:15px; padding:8px 1px 5px 2px; border-radius:5px 0px 0px 5px; height:17px; text-align:center; background-color:#ccc; color:#333333">'.($i - $startday + 1).'</span><input type="text" name="saturdayhour['.($i - $startday + 1).']" id="saturdayhour[]" style="width:50%; border-radius:0px 4px 4px 0px" value="'.$monD.'" '.(($md[0]['is_workable']=='N')?'readonly':"").' /></div>';
				}}
			}
			$weekcal.='</div><div class="clear"></div>
			<div  id="countDays">
			<div style="float:left;padding:7px;font-weight:bold;width:130px">Sunday Hours:</div>';
			for ($i=0; $i<($maxday+$startday); $i++) {
				if(($i % 7) == 0){
				if(($i - $startday + 1) > 0){
					
				$md=$this->db->query("select * from practice_monthly_calendar where user_id='".$uid['id']."' and month='".$cMonth."' and year='".$cYear."' and date='".($i - $startday + 1)."'")->result_array();	
				if(count($md) > 0)
				{
					$monD=$md[0]['working_hours'];
				}	
					
				$weekcal.='<div style="float:left; width:100px"><span style="float:left;width:15px; padding:8px 1px 5px 2px; border-radius:5px 0px 0px 5px; height:17px; text-align:center; background-color:#ccc; color:#333333">'.($i - $startday + 1).'</span><input type="text" name="sundayhour['.($i - $startday + 1).']" id="sundayhour[]" style="width:50%; border-radius:0px 4px 4px 0px" value="'.$monD.'" '.(($md[0]['is_workable']=='N')?'readonly':"").' /></div>';
				}}
			}
			$weekcal.='</div><div class="clear"></div>';		
			
		echo $weekcal;
			} 
			else
			{
			}
	}
	
	function validateDate()
	{
		$uid=$this->session->userdata('logged_in');		
		$cMonth = $_GET["month"];
		$cYear = $_GET["year"];
		$curM=date('Y-m-01');
		$getDt=date('Y-m-d',strtotime($cYear.'-'.$cMonth.'-1'));
		if(strtotime($getDt) < strtotime($curM))
		{
			echo 'N';
		}
		else
		{
			echo 'Y';
		}
	}
	
	function getInputsData()
	{
		$uid=$this->session->userdata('logged_in');		
		$cMonth =$_GET['month'];
		$cYear = $_GET['year'];
		
		$inputs=$this->opadmin_model->getInputs(trim($cMonth), trim($cYear), $uid['id']);
		foreach($inputs as $input)
		{
			if(count($input) > 0)
			{
				foreach($input as $ip){
				echo $ip.'@';			
			}
			}
		}
				
	}
	
	function getDoctimeInPer()
	{	
		$j=1;
		$uid=$this->session->userdata('logged_in');		
		$cMonth = $_GET["month"];
		$cYear = $_GET["year"];
		$ress=$this->opadmin_model->getDocPercent($cMonth, $cYear, $uid['id']);
		
		//pr($ress);
		$res='';
		foreach($ress as $r)
		{
				//echo $j;
			$res.='<div>
			<div style="float:left; width:120px">Doctor'.$j.'</div>
			<div style="float:left; width:150px; margin-bottom:10px"><input type="text" name="doctor['.$j.']" id="doctor_'.$j.'" style="width:90%" value="'.$r['time_percent'].'" /></div><span style="float:left">%</span>
			</div><div style="clear:both"></div>';
		  ++$j;	
		}
		echo $res;
		
	}
	
	function checkMonthly()
	{
		$uid=$this->session->userdata('logged_in');	
		$cMonth = $_GET["month"];
		$cYear = $_GET["year"];
		$q=$this->opadmin_model->getWorkingDays($uid['id'], $cMonth, $cYear);
		if(count($q) >0)
		{
			if($q[0]['is_weekly']=='monthly')
			{
				echo $is_weekly='monthly';
			}
			elseif($q[0]['is_weekly']=='weekly')
			{
				echo $is_weekly='weekly';
			}
			
		}
	}
	
	function getInputs()
	{
		$counter=$_GET['counter'];
		
		$res='';
		for($i=1; $i<=$counter; $i++)
		{
			$res.='<div>
			<div style="float:left; width:120px">Doctor'.$i.'</div>
			<div style="float:left; width:150px; margin-bottom:10px"><input type="text" name="doctor['.$i.']" id="doctor_'.$i.'" style="width:90%" /></div><span style="float:left">%</span>
			</div><div style="clear:both"></div>';
		}
		echo $res;
	}
	function enabledisablecontrol()
	{
		$m=$_GET['month'];
		$y=$_GET['year'];
		$uid=$this->session->userdata('logged_in');
		$workingD=$this->opadmin_model->getWorkingDays($uid['id'], $m, $y);
		foreach($workingD as $wrkD)
		{
			if(($wrkD['day']=='Sun' && $wrkD['is_workable']=='Y') || ($wrkD['day']=='Sat' && $wrkD['is_workable']=='Y')){
				$disable='Disable';
			}
			elseif($wrkD['day']=='Mon' && $wrkD['is_workable']=='N') {
				$disable='Disable';
			}
			elseif($wrkD['day']=='Tue' && $wrkD['is_workable']=='N') {
				$disable='Disable';
			}
			elseif($wrkD['day']=='Wed' && $wrkD['is_workable']=='N') {
				$disable='Disable';
			}
			elseif($wrkD['day']=='Thu' && $wrkD['is_workable']=='N') {
				$disable='Disable';
			}
			elseif($wrkD['day']=='Fri' && $wrkD['is_workable']=='N') {
				$disable='Disable';
			}
			elseif($wrkD['is_weekly']=='weekly')
			{
				$disable='Disable';
			}

		}
		echo $disable;
		
		
	}
	
	
}