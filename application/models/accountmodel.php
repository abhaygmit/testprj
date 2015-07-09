<?php
class Accountmodel extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
		parent::__construct();
		$this->load->library('session');
	}
	
	function getOldPassword($post)
	{
		$password = $post['old_password'];
		$id = $this->session->userdata('id');
		$this->db->select('*');
		//$where = array('password'=>$post['old_password'],'id'=>$id);
		$this->db->where('password',$post['old_password']); 
		$this->db->where('id',$id); 
		$query = $this->db->get('admin');
	
		foreach($query->result() as $row)
		{
			$pass=$row->password;
		}
		if($pass == $password)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function updateUserPassword($post)
	{
		$id = $this->session->userdata('id');
		$data = array(
						'password' => $post['new_password']
				     );
				 
		$this->db->where('id',$id);
		$suc=$this->db->update('admin', $data); 
		if($suc )
		{
			return true;
		}
		else
		{	
			return false;
		}
	}
	function updatepreferences($post)
	{
		$id = $post['id'];
		$data = array(
						'title' => $post['title'],
						'email' => $post['email'],
						'homepage'=>$post['homepage']
				     );
				 
		$this->db->where('id',$id);
		$suc=$this->db->update('homepage', $data); 
		if($suc )
		{
			return true;
		}
		else
		{	
			return false;
		}
	}
	function fetchpreferences(){
	$this->db->select('*');
		//$where = array('password'=>$post['old_password'],'id'=>$id);
		$this->db->where('id','1');
		$query = $this->db->get('homepage');
		return $query->result(); 
	}
}