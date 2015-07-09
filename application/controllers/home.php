<?php 
include("connect.php");
class Home extends CI_Controller 
{
    
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('login_model', 'common_model', 'users_model')); 
		$this->load->library(array('session', 'form_validation'));
		$this->load->helper(array('form', 'url', 'captcha', 'common','encode'));
	}


	function tournament()
	{
		$tid=$this->uri->segment(3);
		$teams=$this->db->query("select * from teams where tournament_id=".$tid)->result();
		$squads=$this->db->query("select team_squad.*, teams.team_name from team_squad left join teams on teams.id=team_squad.team_id where team_squad.tournament_id=".$tid)->result();
		$stats=$this->db->query("select * from players where match_played >= 1 order by runs desc limit 0, 20")->result();
		$bowlerStats=$this->db->query("select * from players where match_played >= 1 and overs>=1 order by wickets desc limit 0, 20")->result();
		$points_table=$this->db->query("select points_table.*, teams.team_name from points_table left join teams on teams.id=points_table.team_id where points_table.tournament_id = 1 order by points desc")->result();
				
		
		$this->data['teams']=$teams;
		$this->data['squads']=$squads;	
		$this->data['stats']=$stats;
		$this->data['points_table']=$points_table;
		$this->data['bowlerStats']=$bowlerStats;			
		$this->load->view('header');
		$this->load->view('tournaments', $this->data);
                
	}
        
        
        
	function index()
	{
           
		
	}
	
	
   
	
    function welcome()
	{
           
            
        }
		
	
	 
        function change_password()
	{
           
            $this->load->view('header');
            $this->load->view('change_password');
            //$this->load->view('footer_inner');
            $this->session->set_userdata('msg',"");
	}
        
        
        
	
	
	
	
	
	
	
}
