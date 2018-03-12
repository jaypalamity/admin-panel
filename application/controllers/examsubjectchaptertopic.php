<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Examsubjectchaptertopic extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('categorymodel');
        $this->load->model('subjectmodel');
        $this->load->model('chaptermodel');
        $this->load->library('session');
        $result = $this->session->all_userdata();
        if (!isset($result['user_data']['logged_in'])) {
            redirect('login');
        }
    }

    public function index() {
        $examsubject = $this->subjectmodel->getSubjects();
        $categorydata = $this->categorymodel->getCategories();
        $examsubjectchapter = $this->chaptermodel->getChapters();
        $this->load->view('AdminLTE/examsubjectchaptertopic/listing', ['categorydata' => $categorydata, 'examsubject' => $examsubject,'examsubjectchapter' => $examsubjectchapter]);
    }

    public function getData() {

        $exam_category = $this->input->post('exam_category_id');
        $exam_subject = $this->input->post('exam_subject_id');
        $exam_subject_chapter = $this->input->post('exam_subject_topic_id');
        $query = $this->db->query("SELECT  distinct 0 tagging_master_id, exam_master_id,subject_master_id,chapter_master_id,topic_master_id,topic_level  FROM tagging_exam_subject_chapter_topic WHERE exam_master_id = '" . $exam_category . "' AND subject_master_id = '".$exam_subject."' AND chapter_master_id = '".$exam_subject_chapter."'  ");
        $results = $query->result();
        if ($results) {
            echo '<table class="table table-hover">
                                    <tr>
                                        <th>Exam Category</th>
                                        <th>Subject</th>
                                        <th>Chapter</th>
                                        <th>Topic</th>
                                        <th>Topic Order</th>
                                        <th>Topic Order</th>
                                                                      
                                    </tr>';
            $varCount = 1;
            foreach ($results as $result) {
                $query = $this->db->query("SELECT exam_name FROM tbl_exam_master WHERE id = '" . $result->exam_master_id . "'");                                    
                $examName = $query->row();
                $querySubject = $this->db->query("SELECT subject_name FROM tbl_subject_master WHERE subject_master_id = '" . $result->subject_master_id . "'");
                $subjectName = $querySubject->row();
                
                $queryChapter = $this->db->query("SELECT chapter_name FROM tbl_chapter_master WHERE chapter_master_id = '" . $result->chapter_master_id . "'");
                $chapterName = $queryChapter->row();
                
                $queryTopic = $this->db->query("SELECT topic_name FROM tbl_topic_master WHERE topic_master_id = '" . $result->topic_master_id . "'");
                $topicName = $queryTopic->row();
                
                
                echo '<tr>
                    <input type="hidden" name="exam_master_id" value="' . $result->exam_master_id . '">
                 <input type="hidden"  name="subject_master_id[]" value="' . $result->subject_master_id . '">
                 <input type="hidden"  name="chapter_master_id[]" value="' . $result->chapter_master_id . '">
                 <input type="hidden"  name="topic_master_id[]" value="' . $result->topic_master_id . '">
                                        <td>' . $examName->exam_name . '</td>
                                        <td>' . $subjectName->subject_name . '</td>
                                        <td>' . $chapterName->chapter_name . '</td>
                                        <td>' . $topicName->topic_name . '</td>
                                        <td><input type="text" id="' . $varCount++ . '" class="exam_subject_chapter_topic_order" name="topic_order[]" required value="' . $result->topic_level . '"></td>
                                        <td>' . $result->topic_level . '</td>                                      
                                   </tr>';
            }
        } else {
            echo 'Data not found';
        }
    }

    public function examsubject() {
        $examsubject = $this->examsubjectmodel->getSubjects();
        print_r($examsubject);
        $this->load->view('AdminLTE/examsubject/listing', ['examsubject' => $examsubject]);
    }

    public function topiclevelupdate() {
    //echo '<pre>';    print_r($_POST);
        $examMasterId = $this->input->post('exam_master_id');
        $subjectMasterId = $this->input->post('subject_master_id');
        $chapterMasterId = $this->input->post('chapter_master_id');
        
        $topicMasterId = $this->input->post('topic_master_id');
        
        $topic_order = $this->input->post('topic_order');
        $count = count($topic_order);
        //print_r($_POST);die;
        for ($i = 0; $i < $count; $i++) {
            //$rows =   $this->db->query("select * from tagging_exam_subject_chapter_topic where subject_level= '".$subject_order[$i]."' and subject_master_id = '".$subjectMasterId[$i]."' and exam_master_id='".$examMasterId."'");
            //echo  $countRows = count($rows);//die;
            //if($countRows > 1)
            //{
            ///$this->session->set_flashdata('msg-error', 'Already Exists!');
            // redirect('examsubject');
            // echo("Already Exists!"); //die;
            //}
            //else{
            $query = $this->db->query("UPDATE tagging_exam_subject_chapter_topic SET topic_level= '" . $topic_order[$i] . "' WHERE exam_master_id='" . $examMasterId . "' and subject_master_id='" . $subjectMasterId[$i] . "' and chapter_master_id='" . $chapterMasterId[$i] . "' and topic_master_id='" . $topicMasterId[$i] . "'");
           
            // }
            //$count = $query->num_rows();
        }
//echo $this->db->last_query();die;
        $this->session->set_flashdata('msg', 'Tagging Order Updated');
        redirect('examsubjectchaptertopic');
    }

//    public function add() {
//        $this->load->view('AdminLTE/category/categoryAdd');
//    }

    

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */