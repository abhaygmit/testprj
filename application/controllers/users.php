<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//include("connect.php");
class Users extends CI_Controller {

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
		$this->load->model(array('login_model','common_model', 'users_model')); 
                $this->load->library(array('session', 'form_validation'));
                $this->load->helper(array('encode'));
	}
        
        
        /* function for users listing
         * 
         * 
         * 
         */
        function Viewusers()
        {
            if(!$this->session->userdata('id'))
            {
                    redirect(base_url().'admin/index');	
            }
            $con ='';
            $this->load->library('pagination');
            $config['base_url'] = base_url().'users/Viewusers/';	
	    $config['total_rows'] =$this->users_model->getTotalUsers();			
            $config['per_page']    = '100'; 
            $config['uri_segment']  = 3;
            $this->pagination->initialize($config); 
            
            $this->data['paging']= $this->pagination->create_links();
            $limit = $this->uri->segment(3);
            
            if($limit=="")
            {
                    $limit = 0;
            }
            $user=$this->users_model->UsersList($limit,$con,$this->pagination->per_page);
            $this->data['userslist']=$user;
            $this->load->view('admin/view_users',$this->data);
            $this->session->set_userdata('msg', "");
        }
        
        
        /* this function is for edit usder profile in admin section
         * 
         * 
         */
        
        function EdituserProfile()
	{ 
		if(!$this->session->userdata('id'))
		{
			redirect(base_url().'admin/index');	
		}	
		
                if($_POST)
                {   
                    $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required'); 
                    $this->form_validation->set_rules('address_line1', 'Address 1', 'trim|required'); 
                    $this->form_validation->set_rules('state', 'State', 'trim|required'); 
                    $this->form_validation->set_rules('country', 'Country', 'trim|required');  
                    
                    if ($this->form_validation->run() == TRUE)
                    {
                        $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required');
                        $this->form_validation->set_rules('address1', 'Address 1', 'trim|required');
                        $this->form_validation->set_rules('address2', 'Address 2', 'trim');
                        $this->form_validation->set_rules('country', 'Country', 'required');
                        $this->form_validation->set_rules('state', 'State', 'required');
                        $params =   array();
                        $params['full_name']    =   $_POST['full_name'];
                        $params['address_line2']    =   $_POST['address_line2'];
                        $params['address_line1']    =   $_POST['address_line1'];
                        $params['state']    =   $_POST['state'];
                        $params['country']    =   $_POST['country'];
                        $params['active_status']    =   $_POST['active_status'];
                        $params['id']    =   $_POST['id'];
                        $savedoredituser    =   $this->users_model->register_user($params);
                        if($savedoredituser)
                        {
                          $this->session->set_userdata('msg', "User has been updated successfully");
                          redirect(base_url().'users/Viewusers');  
                        }
                    }
                }
                
		$id= toInternalId($this->uri->segment(3));	
		$user_data = $this->users_model->getusers(array("userid"=>$id));
		$this->data['user_data'] = $user_data;
                $this->data['user_encoded'] = $this->uri->segment(3);
                $this->data['countylist']   =   $this->users_model->get_country_list();
		$this->load->view('admin/edit_user',$this->data);
		$this->session->set_userdata('msg', '');
	
	}
        
}
	
?>