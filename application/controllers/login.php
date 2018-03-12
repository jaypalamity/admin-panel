<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
        parent::__construct();
        $this->load->model('login_model');
    }

    public function index() {
        $this->load->view('AdminLTE/login');
    }

    public function loginCheck() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        if ($username != '' && $password != '') {
            $value = $this->login_model->login($username, $password);
        } else {
            $this->session->set_flashdata('message', 'Invalid username or password');
            redirect('login');
        }
        if ($value) {
            /////////// Set Remember Me Cookies /////////////////           
            if ($this->input->post("remember_me") == 1) {
                $hour = time() + 3600 * 24 * 30;
                setcookie('username', $username, $hour);
            }
            if ($this->input->post("remember_me") == 1) {
                $hour = time() + 3600 * 24 * 30;
                setcookie('password', $password, $hour);
            }
            /////////// Set Remember Me Cookies /////////////////
            $result = $this->session->all_userdata();
            if ($result['user_data']['status'] == 0) {
                $this->session->set_flashdata('message', 'User Inactive');
                redirect('login');
            } else {
                redirect('welcome');
            }
        } else {
            $this->session->set_flashdata('message', 'Invalid username or password');
            redirect('login');
            return false;
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */