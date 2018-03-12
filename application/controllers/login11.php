<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MX_Controller {
public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
		$this->load->helper('MY');
	}
	public function index()
	{
		//$this->load->view('login');
		$data['modules'] = 'login';
		$data['view_file'] = 'login';
		$result = $this->session->all_userdata();
		if(isset($result['user_data']['logged_in']) && $result['user_data']['logged_in'] == '1')
		{
			 redirect('dashboard');		
		}
		echo Modules::run ('template/master',$data);
		
	}
	public function forget()
	{
		//$this->load->view('login');
		$data['modules'] = 'login';
		$data['view_file'] = 'forget';
		if(isset($_POST['Submit']))
		{

			if(inputStringCheck($_POST['user'])!= '')
			{
				$query = $this->login_model->fetchAll(array("email"=>inputStringCheck($_POST['user'])));

				 if($query->num_rows()>0)
				{
					$password = uniqid();
					$queryResult = $query->result();
					
					$this->load->library('email');

						$this->email->from(EMAIL_ADMIN, EMAIL_ADMIN_NAME);
						$this->email->to($this->input->post('user',TRUE));

						$this->email->subject('Reset Password');
						$this->email->message('Your reset password is '.$password);

						$this->email->send();
						
						
					$this->login_model->edit(array("password"=>$password),"id = '".$queryResult['0']->id."'");
					$this->session->set_flashdata('smessage', 'Mail is sent to your email address with reset password.');
					redirect('login/forget');						
				}
				else
				{
					$this->session->set_flashdata('message', 'No account found with that email address.');
					 redirect('login/forget');	
				}
				
			}
			else
				{
					$this->session->set_flashdata('message', 'Please fill email id.');
					 redirect('login/forget');	
				}
		}
		echo Modules::run ('template/master',$data);		
	}
	public function loginCheck()
	{
		$username = inputStringCheck($this->input->post('username'));
		$password = inputStringCheck($this->input->post('password'));
		if($username != '' && $password  != '')
		{
			$value = $this->login_model->login($username,$password);
		}
		else
		{
			$this->session->set_flashdata( 'message', 'Invalid username or password' );
			redirect('login');
		}
		if($value)
		{
			redirect('dashboard');
		}
		else
		{
			$this->session->set_flashdata( 'message', 'Invalid username or password' );
			redirect('login');
			return false; 
		}
	}
	public function logout()
	{	
		$this->session->sess_destroy();
		redirect('login');
	}
	
	public function subscribe()
	{	
		if ($this->input->is_ajax_request()) {
			
			$email= $this->input->post('email');
			if($email!='')
			{
				echo $value = $this->login_model->subscribe($email);
				//print_r($value);
			}
            
        }

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */