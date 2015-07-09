<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://triviatournament/index.php/welcome
	 *	- or -  
	 * 		http://triviatournament/index.php/admin/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/Admin /<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	
	
	 function __construct()
    {
        // Call the Model constructor
		parent::__construct();
		$this->load->library('session');
    }
	
	
    public function index()
	{
		$this->load->view('welcome_message');
	}
	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/admin.php */