<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 
	 
	 
	 public function __construct()
	{
	   parent::__construct();
	   
	      $this->load->model(array('login_model', 'proposition_model')); 
	      $this->load->library('session');
              $this->load->model('common_model');		
	}


	public function index()
	{ 
		
		if($this->session->userdata('id'))
		{
		
		
		$this->load->view('admin/admin.php');
		}
		else
		{
		
		$this->load->view('admin/login.php');		
		
		}
		$this->session->set_userdata('msg', "");
	 }
	
	 
	public function checkLogin()
	{ 
		$isUser=FALSE;
		$this->data['message']='';
		$userName=$_POST['username'];
		$pass=$_POST['password'];
		$isUser=$this->login_model->isCorrectUser($userName,$pass);

		if($isUser)
		{		
			redirect(base_url().'admin');  
		}
		else
		{
			$this->session->set_userdata('msg', "Please enter valid username and password.");
			redirect(base_url().'admin');  
			
		}
		$this->session->set_userdata('msg', "");
		
	} 
	 
	
	
	function logout()
	 {
        //Put here for PHP 4 users
		$this->CI =& get_instance();        
		
		//Destroy session
		$this->CI->session->sess_destroy();
		$array_items = array('id' => '');
		
		$this->session->unset_userdata($array_items);
		$this->load->view('admin/login.php');
		$this->session->set_userdata('msg', "");
    }
	
	#################### Change PAssword ####################
	 
	 
	 function changePassword()
	{
			$session=$this->session->userdata;
		    $adminid=$session['id'];
			$this->load->helper(array('form', 'url'));
			//$this->load->view('gallery');
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('confirm_password', ' Confirmation Password', 'required');
			//$this->form_validation->set_rules('userfile', 'image', 'required');		
			if ($this->form_validation->run() == FALSE)
			{$this->data['id']=$adminid;  
			$this->load->view('admin/admin_changepassword',$this->data);
			}
			else
			{ 
			if($this->login_model->updatePassword($_POST))
			{$this->data['id']=$adminid; 
			$this->data['message']='Password Updated Successfully';
			$this->load->view('admin/admin_changepassword',$this->data);
			/*  redirect(base_url().'home/changeP',$this->data);*/
			
			}
			
			}
			$this->session->set_userdata('msg', "");
	
	}
	
	 
	
	
	
	
	public function forgotpass()
	{ 
		$isUser=FALSE;
		$this->data['msg']='';
		//$email=$_POST['email'];
			$this->load->helper(array('form', 'url'));
			//$this->load->view('gallery');
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			//$this->form_validation->set_rules('userfile', 'image', 'required');		
			if ($this->form_validation->run() == FALSE)
			{
				//$this->data['id']=$userid;  
				$this->load->view('admin/forgot_password',$this->data);
			}
			else
			{
				$isUser=$this->login_model->forgot($_POST);
				if($isUser)
				{	
					$this->data['success']='Password has been sent, please check your email.';
					$this->load->view('admin/forgot_password',$this->data);
					//redirect(base_url().'admin/forgotpass/?sent=suc');  
				}
				else
				{
					$this->data['message']='Invalid email please try again';
					$this->load->view('admin/login.php',$this->data);
				}
		}
		
	}
	
	
		
	function proposition()
	{
		
		if($this->session->userdata('id')=='')
		{
			redirect(base_url().'admin');  
		}
		
				$result=$this->proposition_model->getPropList();
				$this->data['data']=$result;
				$this->load->view('admin/admin_header');
               	$this->load->view('admin/propList',$this->data);
               
		
	}
	function createProps()
	{
		if($this->session->userdata('id')=='')
		{
			redirect(base_url().'admin');  
		}
						$id=$this->uri->segment(3);
						$result=$this->proposition_model->getPropDetailsById($id);
						$this->data['data']=$result[0];
						//print_r($result);
				if(count($_POST) !='')
				{
					
					if($id!=''){
						
						$this->proposition_model->add_edit_props($_POST, $id);
						redirect('admin/proposition');
					}
					else
					{
						//prn($_POST);
						$result=$this->proposition_model->add_edit_props($_POST);
						redirect('admin/proposition');
					}
				}
				$this->load->view('admin/admin_header');
               	$this->load->view('admin/createProp',$this->data);
               
		
	}
	function deleteProp()
	{
		if($this->session->userdata('id')=='')
		{
			redirect(base_url().'admin');  
		}
		$id=$this->uri->segment(3);
		$query=$this->db->query("delete from propositions where id=".$id);
		//$this->proposition_model->deleteDoctor($id);
		redirect(base_url().'admin/proposition');
		
	}
	
	function generate_result()
	{
		if($this->session->userdata('id')=='')
		{
			redirect(base_url().'admin');  
		}
				
				if(isset($_POST['save'])){
					//prn($_POST);exit;
					
					$result=$this->db->query("Select ub.*, p.id as proposition_id, p.tournament_name, p.tournament_id, p.match_id, p.match_name, m.match_date from user_bets ub
											Left join propositions p on p.id=ub.bet_id
											Left join matches m on m.tournament_id=p.tournament_id 
											where p.tournament_id='".$_POST['tournament_id']."' and p.match_id='".$_POST['match_id']."'")->result();
					//prn($result);exit;
					$this->data['data']=$result;
					$this->data['disp']='block';
					$this->load->view('admin/admin_header');
               		$this->load->view('admin/viewBetResults',$this->data);
                	
					
				}elseif(isset($_POST['generate'])){
					//prn($_POST);
				$dt=date('Y-m-d H:i:s');
					foreach($_POST['winner'] as $key=>$value){
						
						$q=$this->db->query("select * from user_bets where id='".$key."' ")->result();
						
						$data=array(
									'tournament_id'=>$_POST['tid'],
									'match_id'=>$_POST['mid'],
									'proposition_id'=>$q[0]->bet_id,
									'bet_id'=>$key,
									'bet_as'=>$q[0]->bet_as,
									'bet_result'=>1,
									'status'=>1,
									'created_at'=>$dt,
									'updated_at'=>$dt,
									);
						//print_r($data);
						$this->db->insert('bet_result', $data);
						
					}
					
					redirect(base_url().'admin/viewResult');  
				
				}else{
				$result=$this->proposition_model->getPropList();
				//$this->data['data']=$result;
				$this->data['disp']='none';
				$this->load->view('admin/admin_header');
               	$this->load->view('admin/viewBetResults',$this->data);
               
				}
	}
	
	function viewResult()
	{
		if($this->session->userdata('id')=='')
		{
			redirect(base_url().'admin');  
		}
		$result=$this->db->query("Select br.*, p.tournament_name, p.proposition_title, p.match_name, ub.user_name, ub.betting_code, ub.bet_amount from bet_result br
								  Left Join propositions p on p.id=br.proposition_id
								  Left join user_bets ub on ub.id=br.bet_id where br.tournament_id=1 and br.match_id=1 ")->result();
				
				//prn($result);
				$this->data['data']=$result;
				
				$this->load->view('admin/admin_header');
               	$this->load->view('admin/viewResult',$this->data);
               
	}
	
	 
}	
?>
