<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Addquestion extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('custom');
        $this->load->model('questiontypemodel');
        $this->load->model('addquestionmodel');
        $this->load->library('session');
        $result = $this->session->all_userdata();
        if (!isset($result['user_data']['logged_in'])) {
            redirect('login');
        }
    }

    public function index() {
        $questionData = $this->addquestionmodel->getQuestion();
        $this->load->view('AdminLTE/addquestion/questionAdd', ['questionData' => $questionData]);
    }

    public function edit($question_master_id) {
        //echo $question_master_id;die;
        $questionDetailRow = $this->addquestionmodel->find_question($question_master_id);
        $questionOptionRow = $this->addquestionmodel->find_question_option($question_master_id);
        $questionTaggingRow = $this->addquestionmodel->find_question_tagging($question_master_id);
        $this->load->view('AdminLTE/addquestion/questionEdit', ['questionDetailRow' => $questionDetailRow, 'questionOptionRow' => $questionOptionRow, 'questionTaggingRow' => $questionTaggingRow]);
    }

    public function view($id) {
        $questionDetailRow = $this->addquestionmodel->find_question($id);
        $questionOptionRow = $this->addquestionmodel->find_question_option($id);
        $questionTaggingRow = $this->addquestionmodel->find_question_tagging($id);
        $this->load->view('AdminLTE/addquestion/view', ['questionDetailRow' => $questionDetailRow, 'questionOptionRow' => $questionOptionRow, 'questionTaggingRow' => $questionTaggingRow]);
    }

    public function insert() {
        //echo '<pre>'; print_r($_POST);die;
        $question_type = $this->input->post('question_type');
        $question = $this->input->post('question');
        $question_level = $this->input->post('question_level');
        $avg_time_to_solve = $this->input->post('avg_time_to_solve');
        $created_date = date("Y-m-d H:i:s"); 
        ///////////// Condition for question name already exist /////////////////////////////////
        $query = $this->db->query("SELECT * FROM question_master WHERE question_name = '" . $question . "'");
        $count = $query->num_rows();

        if ($count < 1) {

            $sql = "INSERT INTO question_master(question_type,question_name,question_level,avg_time_to_solve,created_date) VALUES ('" . $question_type . "','" . $question . "',$question_level,$avg_time_to_solve,'".$created_date."'); ";
            $questionInsert = $this->db->query($sql);
            $question_id = $this->db->insert_id();
            $s = 'ABCDEFGHIJ';
            if ($sql) {
                $len = strlen($s);
                for ($i = 0; $i < $len; $i++) {
                    if (isset($_POST[$s{$i} . "_answer"]) == 1) {
                        $optionName = $_POST["option_" . $s{$i}];
                        $optionValue = $_POST[$s{$i} . "_value"];
                        $optionAnswer = $_POST[$s{$i} . "_answer"];
                        $sql = "INSERT INTO question_option_master(question_id,option_name,option_value,is_right_answer) VALUES ('" . $question_id . "','" . $optionName . "','" . $optionValue . "','" . $optionAnswer . "'); ";
                        $questionInsert = $this->db->query($sql);
                        echo '</br>';
                    } else {
                        break;
                    }
                }

                $tagging_id = $_POST['tagging_id'];
                $count = count($tagging_id);
                for ($i = 0; $i < $count; $i++) {
                    $taggingId = $_POST["tagging_id"][$i];
                    $sqlQuestionTagging = "INSERT INTO question_tagging_master(question_id,tagging_id) VALUES ('" . $question_id . "','" . $taggingId . "'); ";
                    $questionInsertQuestionTagging = $this->db->query($sqlQuestionTagging);
                }

                $this->session->set_flashdata('msg', 'Question Added Sucessfully');
                redirect('addquestion');
            }
        } else {
            $this->session->set_flashdata('msg-error', 'Question Already Exist');
            redirect('addquestion');
        }
    }

    public function update($id) {
        //echo '<pre>'; print_r($_POST);die;
        $question_type = $this->input->post('question_type');
        $question = $this->input->post('question');
        $question_level = $this->input->post('question_level');
        $avg_time_to_solve = $this->input->post('avg_time_to_solve');
        ///////////// Condition for question name already exist /////////////////////////////////
        ///$query = $this->db->query("SELECT * FROM question_master WHERE question_name = '" . $question . "'");
        //$count = $query->num_rows();
        //if ($count < 1) {


        $question_type = $this->input->post('question_type');
        $question = $this->input->post('question');
        $question_level = $this->input->post('question_level');
        $avg_time_to_solve = $this->input->post('avg_time_to_solve');
        $modified_date = date("Y-m-d H:i:s"); 
        //$sql = "INSERT INTO question_master(question_type,question_name,question_level,avg_time_to_solve) VALUES ('" . $question_type . "','" . $question . "',$question_level,$avg_time_to_solve); ";
        //$count = $query->num_rows();
        
       $query = $this->db->query("SELECT * FROM question_master WHERE question_name = '" . $question . "' AND question_type = '" . $question_type . "' AND id != '".$id."'");
        $count = $query->num_rows();

        if ($count < 1) {
        
        $sql = "UPDATE `question_master` SET `question_type` = '".$question_type."', `question_name` = '".$question."', `question_level` = '".$question_level."', `avg_time_to_solve` = '".$avg_time_to_solve."',`modified_date` = '".$modified_date."'  WHERE `question_master`.`id` = '".$id."'";
        $questionUpdate = $this->db->query($sql);
     
        $queryDeleteQuestionTagging = $this->db->query("DELETE FROM `question_tagging_master` WHERE `question_tagging_master`.`question_id` = '".$id."'");
        $queryDeleteQuestionTagging = $this->db->query("DELETE FROM `question_option_master` WHERE `question_option_master`.`question_id` = '".$id."'");
        //$queryDeleteQuestionOption = $this->db->query("Delete * FROM question_option_master WHERE question_id = '" . $id . "'");
        
   
        //$sql = "INSERT INTO question_master(question_type,question_name,question_level,avg_time_to_solve) VALUES ('" . $question_type . "','" . $question . "',$question_level,$avg_time_to_solve); ";
        //$questionInsert = $this->db->query($sql);
        //$question_id = $this->db->insert_id();
        $s = 'ABCDEFGHIJ';
        if ($sql) {
            $len = strlen($s);
            for ($i = 0; $i < $len; $i++) {
                if (isset($_POST[$s{$i} . "_answer"]) == 1) {
                    $optionName = $_POST["option_" . $s{$i}];
                    $optionValue = $_POST[$s{$i} . "_value"];
                    $optionAnswer = $_POST[$s{$i} . "_answer"];
                    $sql = "INSERT INTO question_option_master(question_id,option_name,option_value,is_right_answer) VALUES ('" . $id . "','" . $optionName . "','" . $optionValue . "','" . $optionAnswer . "'); ";
                    $questionInsert = $this->db->query($sql);
                    echo '</br>';
                } else {
                    break;
                }
            }

            $tagging_id = $_POST['tagging_id'];
            $count = count($tagging_id);
            for ($i = 0; $i < $count; $i++) {
                $taggingId = $_POST["tagging_id"][$i];
                $sqlQuestionTagging = "INSERT INTO question_tagging_master(question_id,tagging_id) VALUES ('" . $id . "','" . $taggingId . "'); ";
                $questionInsertQuestionTagging = $this->db->query($sqlQuestionTagging);
            }
//echo $this->db->last_query();die;
            $this->session->set_flashdata('msg', 'Question Updated Sucessfully');
            redirect('addquestion');
        }}
        $this->session->set_flashdata('msg-error', 'Question Already Exist');         
            redirect('addquestion/edit/'.$id.'');
    }

    public function delete($id) {
        $this->addquestionmodel->delete_question($id);
        $this->addquestionmodel->delete_question_option($id);
        $this->addquestionmodel->delete_question_tagging($id);
        $this->session->set_flashdata('msg', 'Question deleted succesfully');
        redirect('addquestion');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */