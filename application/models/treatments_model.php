<?php
class Treatments_model extends CI_Model 
{
    function __construct()
    {
		parent::__construct();
		$this->load->library('session');
    }
    
    
    /* Get all treatment typoe listing data
     * 
     * 
     */
    function gettreatmenttypes($params = array())
    {
        
        $this->db->select('*');
        $this->db->from('treatment_type');
        $this->db->where('status',1);
        if(isset($params['txnid']))
        {
        $this->db->where('id',$params['txnid']);    
        }
        $validate_user = $this->db->get();
        $details  =   $validate_user->result();
        return $details;
    }
    
    /* Function to create a treatment type
     * 
     * 
     */
    function add_txn_type($params = array())
    {
        if(isset($params['id']))
        {
            $id = $params['id'];
            unset($params['id']);
            ########### code here to update existing record ###  
            $this->db->where("id",$id)->update('treatment_type', $params);  
            return $id;
        }
        else
        {
            ########### code here to insert new record ###   
            //asd($params);
            $this->db->insert('treatment_type', $params);
            return $this->db->insert_id();
        }
    }
    
    
    function delete_user($paramsdelete = array())			       
    {
        if(isset($paramsdelete['id']) && $paramsdelete['id'] != "")
        {
            return $this->db->delete('treatment_type', $paramsdelete );
        }
        else
        {
            return 0;
        }
    }
}
?>