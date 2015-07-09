<?php 
include("connect.php");
class Login extends CI_Controller 
{
    
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('login_model', 'common_model', 'users_model')); 
		//$this->load->library(array('session', 'form_validation', 'test'));
                $this->load->library(array('session', 'form_validation'));
		$this->load->helper(array('form', 'url', 'captcha', 'common'));
		//$this->output->enable_profiler(TRUE);
	}
        
        
        /* This function is made to index file as login form
         * 
         * 
         * 
         */
	/*function logintop()
	{
           
		$this->form_validation->set_rules('username_login', 'Email/Practice ID', 'trim|required');
                $this->form_validation->set_rules('password_login', 'Password', 'trim|required');
                
                if ($_POST)
                {
                    if ($this->form_validation->run() == TRUE)
                    {   
                         $username = $this->input->post('username_login');
                         $practice_id = $this->input->post('practice_login');
                         $password = $this->input->post('password_login');
                        if( $username && $password && $this->users_model->validate_user($username,$password,$practice_id)) {
                            redirect(base_url().'home/welcome');
                        } else {
                          $this->session->set_userdata('loginerror',"Error..! Username / Password Wrong");
                          redirect(base_url());
                        }
                    }
                    ############### captcha code for home page once again #########
                    $vals = array(
                   'img_path'	 => './captcha/',
                   'img_url'	 => base_url().'captcha/',
                   'img_width'	 => '200',
                   'img_height' => 30,
                   'border' => 0, 
                   'expiration' => 7200
                   );
                   $cap = create_captcha($vals);
                   $this->session->set_userdata('word', $cap['word']);
                   $this->data['image'] = $cap['image'];
                    ############### captcha code for home page once again #########
                }

                
                $this->load->view('header');
		$this->load->view('home',$this->data);
		$this->load->view('footer');
		$this->session->set_userdata('msg', '');
	}*/
        
        /* This function is made to index file as login form
         * 
         * 
         * 
         */
	/*function index()
	{
           
		$this->form_validation->set_rules('username', 'Email', 'trim|required');
		$this->form_validation->set_rules('practice_id_login', 'Practice ID', 'trim|required');
                $this->form_validation->set_rules('password_login_bottom', 'Password', 'trim|required');
                
                if ($_POST)
                {
                    if ($this->form_validation->run() == TRUE)
                    {   
                         $username = $this->input->post('username');
                         $practice_id = $this->input->post('practice_id_login');
                         $password = $this->input->post('password_login_bottom');
                        if( $username && $password && $this->users_model->validate_user($username,$password,$practice_id)) {
                            redirect(base_url().'home/welcome');
                        } else {
                          $this->session->set_flashdata("loginerror","Error..! Username / Password Wrong");  
                          redirect(base_url());
                        }
                    }
                
                }
                 ############### captcha code for home page once again #########
                 $vals = array(
                'img_path'	 => './captcha/',
                'img_url'	 => base_url().'captcha/',
                'img_width'	 => '200',
                'img_height' => 30,
                'border' => 0, 
                'expiration' => 7200
                );
                $cap = create_captcha($vals);
                $this->session->set_userdata('word', $cap['word']);
                $this->data['image'] = $cap['image'];
                 ############### captcha code for home page once again #########
                $this->load->view('header');
		$this->load->view('home',$this->data);
		$this->load->view('footer');
		$this->session->set_userdata('msg', '');
	}*/
        
        
        /* function here for logout
         * 
         * 
         * 
         */
        function logout()
	{
		$this->session->unset_userdata('logged_in');
                @session_destroy();
                redirect(base_url(), 'refresh');
	}
        
        function forgot_password()
	{
            $this->form_validation->set_rules('user_email', 'Email', 'trim|required|valid_email');
            if($_POST)
            {
                    if ($this->form_validation->run() == TRUE)
                    { 
                        $username = $_POST['user_email'];
                        $userdetails    =   $this->users_model->getusers(array("useremail"=>$username));
                        //asd($userdetails);
                        if($userdetails)
                        {
                                $this->load->library('email');                                  
                                #########  code here to send email ##################################
                                $email = $userdetails[0]->email;
                                $to_name = $userdetails[0]->full_name;
                                $this->load->library('email');
                                $encodeemail    = base64_encode($email);
                                $emaillink = base_url()."login/change_new_password/".$encodeemail;
                                $linktosend =   "<a href='".$emaillink."'>Click here to change password</a>";
                                $mail_subject = "Office Pilot Forgot Password.";
                                $mess = '<table align="center" cellpadding="0" cellspacing="0" width="100%">
                                  <tr>
                                        <td style="padding:10px; height:auto;font-family:Arial, Helvetica, sans-serif;">
                                          <table cellspacing="0" cellpadding="0" style="width:100%; background-color:#ffffff">
                                                <tr>
                                                  <td style="padding:10px;">
                                                      Full Name : '.$userdetails[0]->full_name.'
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td style="padding:10px;">
                                                      Click Link : '.$linktosend.'
                                                  </td>
                                                </tr>
                                          </table></td>
                                  </tr>
                                </table>';
                                $emailparams    =   array();
                                $emailparams['email'] = $email;
                                $emailparams['to_name'] = $to_name;
                                $emailparams['mail_subject'] = $mail_subject;
                                $emailparams['message'] = $mess;
                                sendMail($emailparams);
                                $this->session->set_userdata('msg', 'Password has been sent successfully to your registered email address.');
                                redirect(base_url('login/forgot_password'));
                        }
                        else
                        {
                                $this->session->set_userdata('msg',"Invalid email, please try again.");
                                redirect(base_url('login/forgot_password'));
                        }
                    }

            }	    
            $this->load->view('header');
            $this->load->view('forgot_password');
            $this->load->view('footer');
            $this->session->set_userdata('msg',"");
	}

        
        
        /* this function is for change new password
         * 
         * 
         * 
         */
        function change_new_password($encodedemail = "")
	{
            $this->form_validation->set_rules('new_pass', 'New Password', 'trim|required|min_length[8]|max_length[40]');
            $this->form_validation->set_rules('cnew_pass', 'Confirm Password', 'trim|required|matches[new_pass]');
            $this->data = "";
            if(isset($encodedemail))
            {    
            $this->data['emailencoded']  =   $encodedemail;
            }
            if($_POST)
            {
                    if ($this->form_validation->run() == TRUE)
                    { 
                        
                        if($this->input->post("linkedemail") && $this->input->post("linkedemail") !="")
                        {
                        $userdetails    =   $this->users_model->getusers(array("useremail"=>base64_decode($this->input->post("linkedemail"))));
                        $params['id'] = $userdetails[0]->id;
                        }
                        else
                        {
                            $sessionvalues  =   $this->session->userdata('logged_in');
                            $params['id'] = $sessionvalues['id'];
                        }
                        $params['password'] = md5($this->input->post("new_pass"));
                        $changeduserdetails    =   $this->users_model->register_user($params);
                        if($changeduserdetails)
                        {
                                $this->session->set_userdata('msg', 'Password changed successfully.');
                                redirect(base_url('login/change_new_password/'.$encodedemail));
                        }
                    }
                    else
                    {
                            $this->session->set_userdata('msg',"Invalid password or confirm password.");
                            redirect(base_url('login/change_new_password/'.$encodedemail));
                    }

            }	    
            $this->load->view('header');
            $this->load->view('change_new_password',$this->data);
            $this->load->view('footer');
            $this->session->set_userdata('msg',"");
	}
}