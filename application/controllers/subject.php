<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Subject extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('custom');
        //$this->load->library('pro');
        $this->load->model('subjectmodel');
        $this->load->library('session');
        $result = $this->session->all_userdata();
        if (!isset($result['user_data']['logged_in'])) {
            redirect('login');
        }
    }
    //////////////////// Demo for calling Helper in controller ////////////////
public function helper(){
    $user_details = get_user_details(28);
    print_r($user_details);
}
/////////////// calling library function from liabrary ////////////////////
public function library(){
    $this->load->library('liabrary');
        echo $this->liabrary->show_hello_world();
}
 //////////////////// Demo for calling Helper in controller ////////////////
    public function index() {
        $subjectdata = $this->subjectmodel->getSubjects();
        $this->load->view('AdminLTE/subject/listing', ['subjectdata' => $subjectdata]);
    }

    public function add() {
        $this->load->view('AdminLTE/subject/subjectAdd');
    }

    public function edit($subject_master_id) {
        $subject = $this->subjectmodel->find_subject($subject_master_id);
        $this->load->view('AdminLTE/subject/subjectEdit', ['subject' => $subject]);
    }

    public function editForm() {
        $this->load->view('AdminLTE/subject/subjectEdit');
    }

    public function insert() {
        $subject_name = $this->input->post('subject_name');
        $query = $this->db->query("SELECT * FROM tbl_subject_master WHERE subject_name = '" . $subject_name . "'");
        $count = $query->num_rows();
        if ($subject_name != '') {
            if ($count < 1) {
                $data = array(
                    'subject_name' => $this->input->post('subject_name'),
                    'subject_name_keyword' => $this->input->post('subject_name_keyword')
                );
                $this->subjectmodel->add($data);
                $this->session->set_flashdata('msg', 'Subject added succesfully');
                redirect('subject');
            } else {
                $this->session->set_flashdata('msg-error', 'Subject already exist');
                redirect('subject');
            }
        } else {
            $this->session->set_flashdata('msg-error', 'Please enter subject name');
            redirect('subject');
        }
    }

    public function update($id) {

        $subject_name = $this->input->post('subject_name');
        $query = $this->db->query("SELECT * FROM tbl_subject_master WHERE subject_name = '" . $subject_name . "' AND subject_master_id != '" . $id . "'");
        $count = $query->num_rows();
        if ($count < 1) {
            $data = array(
                'subject_name' => $this->input->post('subject_name'),
                'subject_name_keyword' => $this->input->post('subject_name_keyword'),
            );
            $subject = $this->subjectmodel->updateSubject($id, $data);
            $this->session->set_flashdata('msg', 'Subject updated sucessfully');
            redirect('subject');
        } else {
            $this->session->set_flashdata('msg-error', 'Subject already Exist');
            redirect('subject/edit/' . $id . '');
        }
    }

    public function delete($id) {
        $this->subjectmodel->delete_subject($id);
        $this->session->set_flashdata('msg', 'Subject deleted');
        redirect('subject');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */