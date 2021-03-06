<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
    public function __construct() {
        parent::__construct();
      
        $result = $this->session->all_userdata();
		if(!isset($result['user_data']['logged_in']))
		{
			 redirect('login');		
		}
    }
	public function index()
	{    
            
            $result = $this->session->all_userdata();
            
		if(!isset($result['user_data']['logged_in']))
		{
			 redirect('login');		
		}
                else
                    {
		$this->load->view('AdminLTE/index');
                }
	}
	
	public function login()
	{
		$this->load->view('login');
	}
	public function register()
	{
		$this->load->view('AdminLTE/register');
	}
	}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */