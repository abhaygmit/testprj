<?php
class Login_model extends CI_Model 
{
    var $title   = '';
    var $content = '';
    var $date    = '';

    function __construct()
    {
        // Call the Model constructor
		parent::__construct();
		$this->load->library('session');
    }
/****************Check User Login *************************/    
    function isCorrectUser($userName, $password)
    {
		//echo $userName;
		$pass='0'; 
		$this->db->select('*');
		$this->db->where('email',$userName); 
		$query = $this->db->get('users');/*Retrive data from admin table*********/
		//prn($query->result());exit;
		
		foreach($query->result() as $row)
		{
			$pass 		= $row->password;
			//$username 	= $row->username;
			$id			= $row->id;
			$email		= $row->email;
			//$status		= $row->status;
		}
		if($pass == $password)
		{
				$this->session->set_userdata('id', $id);
				//$this->session->set_userdata('username', $username);
				$this->session->set_userdata('email', $email);
				return TRUE;
			
		}
		else
		{
			return FALSE;	
		}		
    }
/******************END*********************************/	
/*****************forgot password *********************/	
	
	function forgot($post)
	{
		$this->load->library('email');
		$config['protocol'] = 'smtp';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$config['smtp_host'] = 'smtp.srmps.ac.in';
		$config['smtp_port'] = 25;
		$config['smtp_user'] = 'test@srmps.ac.in';
		$config['smtp_pass'] = 'password';
		$config['mailtype'] ='html';

		$this->email->initialize($config);
		$this->email->from('admin@visionair.com', 'Admin');
		$this->email->to($post['email']); 
		$this->email->subject('Recover Password from Health Care Management SRMPS');

		$this->db->select('*');
		$this->db->where('email',$post['email']); 
		$query = $this->db->get('usermgmt');
	
		foreach($query->result() as $row)
		{
			$username=$row->username;
			$pass=$row->password;
			$name=$row->fname." ".$row->lname;
		}
			
		$message='Hello '.$name.' <br><br>
					Your Username and Password is as follows:
		 			<br><br><b>Username:</b>'.$username.' <br><br> 
					<b>Password:</b>'.$pass.'';
		$this->email->message($message);	
		
		$suc=$this->email->send();
		if($suc)
		{
			return true;
		}
		else
		{
			echo $this->email->print_debugger();
			return false;
		}
	}
	
/*****************END *********************/	
/****************Change Password ***********/
 	function updatePassword($post)
    {
		  $data1 = array('password' => $post['password']);
		  $this->db->where('id',$post['adminid']);
		  $suc = $this->db->update('admin', $data1);
		  
		  if($suc)
			  return true;
		  else
			  return false;
   }
	 
/******************END************************/	 
}
 ?>