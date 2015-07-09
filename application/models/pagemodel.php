<?php
class Pagemodel extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
		parent::__construct();
		$this->load->library('session');
	}
	
	function insertPage($post)
	{
		  $currdate = date("Y-m-d h:i:s");
		  $data = array(
				  	'status' 		=> $post['status'],
				  	'page_name' 	=> $post['enter_page'],
				  	'submit_date' 		=> $currdate,
				  	'modified_by' 		=> $currdate,
				  	'parent_id'			=> $post['parent_id']
		  			);
		  $suc = $this->db->insert('pages', $data); 
		  if($suc)
		  {
				return true;
		  }
		  else
		  {	
				return false;
		  }	
	}
	
	function fetchPage()
	{
		$query = $this->db->query("SELECT * FROM pages WHERE parent_id='0'");
		return $query->result() ;
	}
	
	function getToatlPage()
	{
		$query = $this->db->query("SELECT * FROM pages WHERE parent_id='0'");
		return  $query->num_rows();
	}
	
	function fetchPageforpaging($segment,$perpage)
	{
		$query = $this->db->query("SELECT * FROM pages WHERE parent_id='0' LIMIT $segment,$perpage");
		return $query->result() ;
	}
	
	function getPageChild($parentId)
	{
		$query = $this->db->query("SELECT * FROM pages WHERE parent_id='".$parentId."'");
		return $query->result() ;
	}
	
	function getPageToEdit($id)
	{
		$query = $this->db->query("SELECT * FROM pages WHERE id='".$id."'");
		return $query->result() ;
	}
	
	function editPage($post)
	{
		$creator_id = $this->session->userdata('id');
		 $currdate = date("Y-m-d h:i:s");
		$data = array(
				  	'status' 		=> '1',
				  	'page_name' 	=> $post['page_name'],
				  	'page_title' 	=> $post['page_title'],
				  	'meta_keywords' 	=> $post['meta_keywords'],
				  	'meta_description' 	=> $post['meta_description'],
				  	'page_content' 	=> $post['page_content'],
				  	'modified_date' 		=> $currdate,
				  	'parent_id'			=> $post['parent_id']
		  			);
					
		$this->db->where('id',$post['id']);
		$suc = $this->db->update('pages', $data); 
		if($suc)
		{
			  return true;
		}
		else
		{	
			  return false;
		}
	}
	
	function fetchPagelist($name)
	{
		$query1 = $this->db->query("SELECT * FROM pages WHERE page_name='".$name."'");
		$res	= $query1->result();
		$query	= $this->db->query("SELECT * FROM pages WHERE parent_id='".$res[0]->id."'");
		return $query->result() ;
	}
	function fetchPagename($id)
	{
		if($id>0){
		$query = $this->db->query("SELECT page_name FROM pages WHERE id='".$id."'");
		$res=$query->result();
		return $res[0]->page_name ;
		}else{
		return 'No Art form';
		}
	}
	function fetchPageDetail($id)
	{
		if($id>0){
		$query = $this->db->query("SELECT page_details FROM pages WHERE id='".$id."'");
		$res=$query->result();
		return $res[0]->page_details ;
		}else{
		return '';
		}
	}
	function delete_page($id)
	{
					$data1 = array(
					'id' => $id
					);
					
			$suc	= $this->db->delete('pages', $data1 );
			if($suc)
			{				
			return true;
			}
			 else 
			 {
			return false;
			}
	
		
	}
function fetch_pageBy_name($name)
	{
		$query1 = $this->db->query("SELECT * FROM pages WHERE page_name like '".$name."'");
		$res	= $query1->result();
		return $res[0]->id;
	}
	
	
	function update_status($id)
	{
		$this->db->select('*');
		$this->db->where('id',$id); 
		$query = $this->db->get('pages');
		$row=$query->result();
		if($row[0]->status=='1')
			$status='0';
		else
			$status='1';
		
		$data1 = array('status' => $status );
		$this->db->where('id',$id);
		$suc = $this->db->update('pages', $data1); 
		
		if($suc)				
			return true;
		else 
			return false;
	}
	
	function update_page_status($id,$status)
	{
		$data1 = array('status' => $status); 
		$this->db->where('id',$id);	
		$suc=$this->db->update('pages', $data1);
		if($suc)
			return true;
		else
			return false;	
	}
	
}