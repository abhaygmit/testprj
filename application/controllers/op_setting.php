<?php 
include("connect.php");
class Op_setting extends CI_Controller 
{
    public function __construct()
	{
		parent::__construct();
		$this->load->model(array('common_model', 'users_model', 'opadmin_model', 'opsetting_model')); 
		//$this->load->library(array('session', 'form_validation', 'test'));
        $this->load->library(array('session', 'form_validation'));
		$this->load->helper(array('form', 'url', 'captcha', 'common'));
	}
	function index()
	{
		$userId=$this->session->userdata('logged_in');
		if($userId['id']==''){
		redirect(base_url());	
		}
		else
		{		
				$this->load->view('header_inner');
               	$this->load->view('ortho_settings/home');
                $this->load->view('footer_inner');
		}
	}
	/*----------- Manage user profile ------------------------------*/
	function profile()
	{
		$userId=$this->session->userdata('logged_in');
		if($userId['id']==''){
		redirect(base_url());	
		}
		else
		{
			//echo $userId['id'];exit;
		$user=$this->users_model->getusers(array("userid"=>$userId['id']));
		$this->data['result']=$user[0];
		
		$this->load->view('header_inner');
        $this->load->view('ortho_settings/profile', $this->data);
        $this->load->view('footer_inner');	
		$this->session->set_userdata('updateSuccess', '');
		}
	}
	function update_profile()
	{
		$userId=$this->session->userdata('logged_in');
		if($userId['id']==''){
		redirect(base_url());	
		}
		else
		{
		$this->data['countylist']   =   $this->users_model->get_country_list();
		//pr($this->data['countylist']);
		$userId=$this->session->userdata('logged_in');
		$user=$this->users_model->getusers(array("userid"=>$userId['id']));
		$this->data['result']=$user[0];
		//print_r($this->input->post());exit;
		 if ($this->input->post()) 
                        {  
                            $params = array();
		 ######### image upload section #################################    
                            if($_FILES['userfile']['name']!="")
                               { 
                                $config['upload_path'] = './uploads/';
                                $config['allowed_types'] = 'gif|jpg|png|GIF|JPEG|PNG';	
                                $config['max_width'] 	 = '5000';
                                $config['max_height'] 	 = '5000';			
                                $config['encrypt_name']  = TRUE;
                                $this->load->library('upload', $config);
                                $this->upload->initialize($config);
                                $configThumb = array();
                                $configThumb['image_library'] = 'gd2';
                                $configThumb['create_thumb'] = TRUE;
                                $configThumb['maintain_ratio'] = FALSE;
                                $configThumb['width'] = 100;
                                $configThumb['height'] = 100;
                                $this->load->library('image_lib');

                                if($this->upload->do_upload('userfile'))
                                {
                                    $pic = $this->upload->data();
                                }
                                else
                                {
                                    return $this->upload->display_errors();	
                                }
                                ### This code is for creating thumbnail ############
                                if($pic['is_image'] == 1) {
                                    $configThumb['source_image'] = $pic['full_path'];
                                    $this->image_lib->initialize($configThumb);
                                    $this->image_lib->resize();
                                    $params['profile_image'] =   $pic['raw_name']."_thumb".$pic['file_ext'];
                                }
                            }

                        $params['full_name'] = $this->input->post("uname");
                        $params['email'] = $this->input->post("email");
						$params['address_line1'] = $this->input->post("address1");
						$params['address_line2'] = $this->input->post("address2");
						$params['state'] = $this->input->post("state");
						$params['country'] = $this->input->post("country");
						$params['zipcode'] = $this->input->post("zip");
						$params['phone'] = $this->input->post("phone");
						$params['website'] = $this->input->post("website");
						$params['modified_by'] = date('Y-m-d H:i:s');
						$params['id'] = $userId['id'];
						$result = $this->users_model->register_user($params);
						$this->session->set_userdata("updateSuccess","User has been updated successfully");
						redirect('op_setting/profile');
						}
		
		
		
		
		$this->load->view('header_inner');
        $this->load->view('ortho_settings/add_edit_profile', $this->data);
        $this->load->view('footer_inner');	
		}
	}
	function deletePic()
	{
		$userId=$this->session->userdata('logged_in');
		$id=$userId['id'];
		if($id){
		$this->opsetting_model->deletePicture($id);
		redirect('op_setting/update_profile');
		}
	}
	/*----------- Change Password ------------------------------*/
	function changePass()
	{
		
		$uid=$this->session->userdata('logged_in');
		if($uid['id']=='')
		{
			redirect(base_url());
		}
				$result=$this->opsetting_model->getUserPass($uid['id']);
				if(count($_POST)>0){
				
				$this->form_validation->set_rules('curr_pass', 'Current Password', 'required|callback_user_password_check');
				$this->form_validation->set_rules('new_pass', 'New Password', 'required|min_length[8]|max_length[20]');
				$this->form_validation->set_rules('confirmPass', 'Confirm password', 'required|matches[new_pass]|min_length[8]|max_length[20]');
			 if ($this->form_validation->run() == FALSE)
			  {
				  //$this->data['message']='something wrong';
			  }
			  else
			  { 
				  if($this->opsetting_model->changePass($_POST, $uid['id']))
				  {
					  
					  $this->data['message']='Password Updated Successfully';
					  //$this->load->view('opsettings/changePass', $this->data);
					  
				  }
			  }
			
			}		
				$this->data['result']=$result;
				$this->load->view('header_inner');
               	$this->load->view('ortho_settings/changePass',$this->data);
                $this->load->view('footer_inner');
		
	}
	function user_password_check()
	{		$result = md5($_POST['curr_pass']);
			$uid=$this->session->userdata('logged_in');
			$query=$this->db->query("select password from users where password='$result' and id='".$uid['id']."'")->result_array();
			
			if(!$query)
			{
  			  	$this->form_validation->set_message(__FUNCTION__, 'Current password is incorrect');
   				 return FALSE;
			}
			else
			{		
				return TRUE;
			}
	} 
	/*----------- Manage Schedule Time ------------------------------*/
	
	function scheduleTime()
	{
		
		$uid=$this->session->userdata('logged_in');
		if($uid['id']=='')
		{
			redirect(base_url());
		}
				//$maxId=$this->opsetting_model->getMaxScheduleTime($uid['id']);
				$master=$this->opsetting_model->getScheduleTimeByUserId($uid['id']);
				$this->data['master']=$master[0];
				$result=$this->opsetting_model->getScheduleLogByUserId($uid['id']);
				$this->data['result']=$result;
				$this->load->view('header_inner');
               	$this->load->view('ortho_settings/manage_scheduleTime',$this->data);
                $this->load->view('footer_inner');
		
	}
	function addScheduleTime()
	{
		$uid=$this->session->userdata('logged_in');
		if($uid['id']=='')
		{
			redirect(base_url());
		}
		
			    $id=$this->uri->segment(3);
				$classList=$this->opsetting_model->getScheduleTimeByUserId($uid['id']);
				//pr($classList);exit;
				$this->data['result']=$classList[0];
				if(count($_POST) !='')
				{
					//pr($_POST);exit;
					if(count($classList) > 0){
					$this->opsetting_model->delteScheduleTime($uid['id']);
					$insert=$this->opsetting_model->add_edit_scheduleTime($_POST);
					$this->opsetting_model->addScheduleTimeLog($_POST, $insert);
					//$this->session->set_userdata("msg","<font class='success'>Schedule time updated successfully.</font>");
					redirect('op_setting/scheduleTime');
					}
					else
					{
					$result=$this->opsetting_model->add_edit_scheduleTime($_POST);
					$this->opsetting_model->addScheduleTimeLog($_POST, $result);
					//$this->session->set_userdata("msg","<font class='success'>Schedule time updated successfully.</font>");
					redirect('op_setting/scheduleTime');
					}
				}
				$this->load->view('header_inner');
               	$this->load->view('ortho_settings/add_edit_scheduleTime',$this->data);
                $this->load->view('footer_inner');
		
	}
	function deleteScheduleTime()
	{
		$uid=$this->session->userdata('logged_in');
		if($uid['id']=='')
		{
			redirect(base_url());
		}
		$id=$this->uri->segment(3);
		$this->opsetting_model->delteScheduleTime($id);
		redirect(base_url().'op_setting/scheduleTime');
		
	}
	

}