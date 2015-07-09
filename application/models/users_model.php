<?php
class Users_model extends CI_Model 
{
    function __construct()
    {
		parent::__construct();
		$this->load->library('session');
    }
    
    /* Function to create a new user
     * 
     * 
     */
    function register_user($params = array())
    {
        if(isset($params['id']))
        {
            $id = $params['id'];
            unset($params['id']);
            ########### code here to update existing record ###  
            $this->db->where("id",$id)->update('users', $params);  
            return $id;
        }
        else
        {
            ########### code here to insert new record ###   
            //asd($params);
            $this->db->insert('users', $params);
            return $this->db->insert_id();
        }
    }
	
	 
	
    
    
    /* function to store traction 
     * 
     * 
     */
    function register_transaction($params = array())
    {
            return $this->db->insert('users_transactions', $params);
    }
    
    /* This function is for login check
     * 
     * 
     */
    function validate_user($username, $password,$practice_id)
    {
       /* echo $username.'<br>';
		echo $password.'<br>';
		echo $practice_id.'<br>';exit;*/
		
		$where = "(email='".$username."' AND practice_id='".mysql_real_escape_string($practice_id)."') AND password='".md5($password)."'";
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where($where);
        $validate_user = $this->db->get();
        $login  =   $validate_user->result();
		//pr($login);
        if ( is_array($login) && count($login) == 1 ) {
            $this->details = $login[0];
            $this->set_session();
            return true;
        }
        return false;
    }
	
	function validate_ApiUser($username)
    {
       /* echo $username.'<br>';
		echo $password.'<br>';
		echo $practice_id.'<br>';exit;*/
		
		//$where = "email='".$username."'";
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email', $username);
        $validate_user = $this->db->get();
        $login  =   $validate_user->result();
		return $login;
       
    }
    
    /* This function is for maintaining sessions and assigning values to session
     * 
     * 
     */
    function set_session() {
        $sess_array =  array(
                'id'=>$this->details->id,
                'practice_id'=> $this->details->practice_id,
                'email'=>$this->details->email,
                'full_name'=>$this->details->full_name,
                'isLoggedIn'=>true
            );
        $this->session->set_userdata('logged_in',$sess_array);
    }
    
    
    /* Get all users or specific user as per id
     * 
     * 
     */
    function getusers($params = array())
    {
        
        $this->db->select('*');
        $this->db->from('users');
        //$this->db->where('is_admin','0');
        //$this->db->where('is_active','1');
        if(isset($params['userid']))
        {
        $this->db->where('id',$params['userid']);    
        }
        if(isset($params['useremail']))
        {
        $this->db->where('email',$params['useremail']);    
        }
        
        $validate_user = $this->db->get();
        $details  =   $validate_user->result();
        return $details;
    }
    
	function getUserById($id)
	{
		$this->db->select('*');
        $this->db->from('users');
		$this->db->where('id',$id); 
		$user_details = $this->db->get();
		return $details  =  $user_details->result();
	}
    
    /* This function is for login check
     * 
     * 
     */
    function get_country_list()
    {
        $countryCode=array('DZ','AQ','BV','IO','CF','CX','HM','NP','ST', 'AO', 'BY');// These contry code not valid for paypal payment pro.
		$this->db->select('*');
        $this->db->from('countries');
        $this->db->where('statusid',1);
		$this->db->where_not_in('ccode',$countryCode);    
        $county_list = $this->db->get();
        $details  =   $county_list->result();
        return $details;
    }
    
    
    
    /* Get paymentstatus of users
     * 
     * 
     */
    function getpaymentcheck($params = array())
    {
        
        $this->db->select('*');
        $this->db->from('users');
        if(isset($params['userid']))
        {
        $this->db->where('id',$params['userid']);    
        }
        $validate_user = $this->db->get();
        $details  =   $validate_user->result();
        if($details)
        {
            return $details[0]->payment_status;
        }
        else
        {
            return 0;
        }
    }
    
    
    
    /* This function is seloect max id from table
     * 
     * 
     */
    function get_max_id()
    {
        $tablename      = "users";
        $next_increment     = 0;
        $qShowStatus        = "SHOW TABLE STATUS LIKE '$tablename'";
        $qShowStatusResult  = mysql_query($qShowStatus) or die ( "Query failed: " . mysql_error() . "<br/>" . $qShowStatus );
        $row = mysql_fetch_assoc($qShowStatusResult);
        $next_increment = $row['Auto_increment'];
        return $next_increment;
    }
    
    
    function UsersList($segment,$con='',$perpage)
    {
        $query = $this->db->query("select * from users where 1 $con  order by id LIMIT $segment,$perpage"); 
        return $query->result() ;
    }
        
    function getTotalUsers(){
            $query = $this->db->query("select * from users where 1 ");
            return  $query->num_rows();
    }
}
?>