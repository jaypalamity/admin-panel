<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Questiontype extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('questiontypemodel');
        $this->load->library('session');
        $result = $this->session->all_userdata();
        if (!isset($result['user_data']['logged_in'])) {
            redirect('login');
        }
    }

    public function index() {
        $questiontype = $this->questiontypemodel->getQuestiontype();
        $this->load->view('AdminLTE/questiontype/listing', ['questiontype' => $questiontype]);
    }

    public function edit($question_type_id) {  
        $questiontype = $this->questiontypemodel->getQuestiontype();
         $questionTypeRow = $this->questiontypemodel->find_questiontype($question_type_id);
        $this->load->view('AdminLTE/questiontype/questiontypeEdit', ['questiontype' => $questiontype,'questionTypeRow' => $questionTypeRow]);
     
    }

    public function insert() {


        $question_type_name = $this->input->post('question_type_name');
//        $is_parentRadio = $this->input->post('is_parentRadio');
//        $is_parentSelect = $this->input->post('is_parentSelect');
//        if ($is_parentRadio == 'NO') {
//            $parent = $is_parentSelect;
//        } else {
//            $parent = 0;
//        }
        
        $query = $this->db->query("SELECT * FROM tbl_question_type_master WHERE question_type_name = '" . $question_type_name . "'");
        $count = $query->num_rows();
        if ($question_type_name != '') {
            if ($count < 1) {
                $data = array(
                    'question_type_name' => $this->input->post('question_type_name'),                                  
                    'created_date' => date('Y-m-d H:i:s'),
                );
                $this->questiontypemodel->add($data);
                $this->session->set_flashdata('msg', 'Question added succesfully');
                redirect('questiontype');
            } else {
                $this->session->set_flashdata('msg-error', 'Question type already exist');
                redirect('questiontype');
            }
        } else {
            $this->session->set_flashdata('msg-error', 'Please enter Question type');
            redirect('questiontype');
        }
    }

    public function update($id) {
        //echo $id;die;
       //echo '<pre>'; print_r($_POST);//die;
       $question_type_name = $this->input->post('question_type_name');
//        $is_parentRadio = $this->input->post('is_parentRadio');
//        $is_parentSelect = $this->input->post('is_parentSelect');
//        if ($is_parentRadio == 'NO') {
//            $parent = $is_parentSelect;
//        } else {
//            $parent = 0;
//        }
        
        //echo  $parent;die;
         $query = $this->db->query("SELECT * FROM tbl_question_type_master WHERE question_type_name = '" . $question_type_name . "' AND question_type_master_id != '".$id."' ");
        $count = $query->num_rows();
        //echo $count;die;
        if ($count < 1) {
             $data = array(
                    'question_type_name' => $this->input->post('question_type_name'),
                   // 'parent_id' => $parent,                 
                    'modified_date' => date('Y-m-d H:i:s'),
                );
            $category = $this->questiontypemodel->updateQuestiontype($id, $data);
            $this->session->set_flashdata('msg', 'Question Type updated sucessfully');
            redirect('questiontype');
        } else {
            $this->session->set_flashdata('msg-error', 'Question Type already Exist');
            redirect('questiontype/edit/' . $id . '');
        }
    }

    public function delete($id) {
        $this->questiontypemodel->delete_questiontype($id);
        $this->session->set_flashdata('msg', 'Question deleted succesfully');
        redirect('questiontype');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */