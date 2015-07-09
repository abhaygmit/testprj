<?php 
class Pages extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model'); 
		$this->load->library('session');
		$this->load->model('pagemodel');
		$this->load->library('facebook');
	}
	
	function index()
	{
		$this->view_pages();	
	}
	
	function view_pages()
	{
		  if(!$this->session->userdata('id'))
		  {
			  redirect(site_url('admin/index'));	
		  }
			
		  if($_POST['submit']=="update")
		  {    
		  	
			  $result=$this->pagemodel->editPage($_POST);
			  if($result)
			  {  
			  	 $this->data['message'] = "Page has been Updated Successfully.";
				  $this->session->set_userdata('msg', "Page has been updated successfully.");
				  redirect(site_url('pages/view_pages'),$this->data);
			  }
		  }
		  else
		  {    
			  $this->load->library('pagination');
			  $this->load->helper(array('form', 'url'));
			  if(isset($_POST['class_apply']))
			  {
				  $valueclass = @$_POST['class_apply'];
				  $this->data['classstud'] = $valueclass;
			  }
			  else
			  {
				  $valueclass='';
			  }
			 /*   pagination implementation 27-12-2012----------------*/
		  	
		  		$countRow=$this->db->count_all("pages");
					
				$config = array();
	       		 $config["base_url"] = base_url() . "index.php/pages/view_pages";
	       		 $config["total_rows"] = $countRow;
	       		 $config["per_page"] = 15;
	       		 $config["uri_segment"] = 3;
	 
	       		 $this->pagination->initialize($config);
	 
	      		  $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	      		  $this->data['paging'] = $this->pagination->create_links();
				$this->data['pageDetails'] = $this->fetch_pages($config["per_page"], $page);
				
		  /* -------------------------------------------------------*/
			//  $this->data['pageDetails'] = $pagedata;
			  $this->load->view('admin/view_pages',$this->data);
		  }
		  $this->session->set_userdata('msg', ""); 
	}
	
	public function fetch_pages($limit, $start) {
	        $this->db->limit($limit, $start);
	        $query = $this->db->get("pages");
	 
	        if ($query->num_rows() > 0) {
	            foreach ($query->result() as $row) {
	                $data[] = $row;
	            }
	            return $data;
	        }
	        return false;
	   }
	
	
	function add_page()
	{
		if(!$this->session->userdata('id')){
			redirect(site_url('admin/index'));	
		}
			
		/*$pagedata = $this->pagemodel->fetchPage();
		$this->data['PageDetails'] = $pagedata;*/
		
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('enter_page', 'Enter Page', 'required');
		if ($this->form_validation->run() == FALSE)
	    {
			  $this->load->view('admin/add_page',$this->data);
	    }
		else
		{
			  $this->load->view('admin/add_page');
			  $suc = $this->pagemodel->insertPage($_POST);
			  $this->session->set_userdata('msg', "Page has been added successfully. ");
			  redirect(site_url('page/add_page'),$this->data);	
		}
		$this->session->set_userdata('msg', "");
	}
			
	function edit()
	{
		  if(!$this->session->userdata('id'))
		  {
			  redirect(site_url('admin/index'));	
		  }
		 
		  $id = $this->uri->segment(3); 
		  $isMed=$this->pagemodel->getPageToEdit($id);
		  $this->data['pageToEdit'] = $isMed;
		  $pagedata = $this->pagemodel->fetchPage();
		  $this->data['pageDetails'] = $pagedata;
		  if(count($_POST) > 0):
		   print_r($_POST);
		  exit;
  		  $pagedata = $this->pagemodel->editPage($_POST);
		  endif;
		  
		  $this->load->view('admin/edit_page',$this->data);
	}
				
	function deletepage()
	{
		  if(!$this->session->userdata('id'))
		  {
			  redirect(site_url('admin/index'));	
		  }
		  $id = $this->uri->segment(3); 
		  $this->pagemodel->delete_page($id);
		  $this->session->set_userdata('msg','Page has been Deleted Successfully.');
		  redirect(site_url('pages/view_pages'));
	} 
			
	function page_exists()
	{
		$pageid = $_POST['data'];
		$this->db->where('parent_id', $pageid);
		$query = $this->db->get('page');
		if( $query->num_rows() > 0 ){ echo $query->num_rows(); } else { echo $query->num_rows(); }
	}	
			
	function page_child_exists()
	{
		$pageid = $_POST['data'];
		
		/*$this->db->where('page_id',$pageid);
		$query1 = $this->db->get('gallery');
		//$row = $query1->result();
		$numrow1 = $query1->num_rows();
		
		$this->db->where('page_id',$pageid);
		$query2 = $this->db->get('artist');
		//$row2 = $query2->result();
		$numrow2 = $query2->num_rows();
		
		$numrow = $numrow1 + $numrow2;*/
		$numrow = 0;
		if( $numrow > 0 ){ echo $numrow; } else { echo $numrow; }
	}	
	
	function pagestatus()
    { 
   		if(!$this->session->userdata('id'))
		{
			 redirect(site_url('admin/index'));	
		}
        $this->load->helper(array('form', 'url'));
		$id= $this->uri->segment(3);
		$status=$this->uri->segment(4);
		$this->load->library('form_validation');
		if($this->pagemodel->update_page_status($id,$status))
		{
			$this->session->set_userdata('msg', "Status Updated Successfully");
			redirect(site_url('pages/view_pages'),$this->data); 
		}
	}

}