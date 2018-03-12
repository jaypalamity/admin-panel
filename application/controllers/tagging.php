<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tagging extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('categorymodel');
        $this->load->model('subjectmodel');
        $this->load->model('chaptermodel');
        $this->load->model('topicmodel');
        $this->load->model('taggingmodel');
        $this->load->library('session');
        $result = $this->session->all_userdata();
        if (!isset($result['user_data']['logged_in'])) {
            redirect('login');
        }
    }

    public function index() {
        $taggingdata = $this->taggingmodel->getTaggings();
        $categorydata = $this->categorymodel->getCategories();
        $subjectdata = $this->subjectmodel->getSubjects();
        $chapterdata = $this->chaptermodel->getChapters();
        $topicdata = $this->topicmodel->getTopics();
        $this->load->view('AdminLTE/tagging/listing', ['taggingdata' => $taggingdata, 'categorydata' => $categorydata, 'subjectdata' => $subjectdata, 'chapterdata' => $chapterdata, 'topicdata' => $topicdata]);
    }

    public function add() {
        $exam_category = $this->input->post('exam_category');
        $subject_name = $this->input->post('subject_name');
        $chapter_name = $this->input->post('chapter_name');
        $topic_name = $this->input->post('topic_name');
        $topic_implode = implode(',',$topic_name);
        $query = $this->db->query("SELECT * FROM tagging_exam_subject_chapter_topic WHERE exam_master_id = '" . $exam_category . "' AND subject_master_id = '" . $subject_name . "' AND chapter_master_id = '" . $chapter_name . "' AND topic_master_id IN ({$topic_implode})  ");
        $this->db->last_query();//die;
        $count = $query->num_rows();//die;
        if($count < 1){     
        for ($i = 0; $i < count($topic_name); $i++) {
            $exam_category = $this->input->post('exam_category');
            $subject_name = $this->input->post('subject_name');
            $chapter_name = $this->input->post('chapter_name');
            $topic = $topic_name[$i];
            echo $sql = "insert into tagging_exam_subject_chapter_topic(exam_master_id, subject_master_id, chapter_master_id,topic_master_id) values('{$exam_category}', {$subject_name}, {$chapter_name},{$topic})";
            $query = $this->db->query($sql);
        }
        if ($query) {
            $this->session->set_flashdata('msg', 'Tagging Data Succesfully');
            redirect('tagging');
        }
    }else{
        $this->session->set_flashdata('msg-error', 'Tagging Data already Exist');
            redirect('tagging');
    }
    }
    

    public function edit($tagging_master_id) {
        // echo $tagging_master_id;//die;
        $tagging = $this->taggingmodel->find_tagging($tagging_master_id);
        $taggingdata = $this->taggingmodel->getTaggings();
        $categorydata = $this->categorymodel->getCategories();
        $subjectdata = $this->subjectmodel->getSubjects();
        $chapterdata = $this->chaptermodel->getChapters();
        $topicdata = $this->topicmodel->getTopics();
        $this->load->view('AdminLTE/tagging/taggingEdit', ['tagging' => $tagging, 'categorydata' => $categorydata, 'subjectdata' => $subjectdata, 'chapterdata' => $chapterdata, 'topicdata' => $topicdata]);
    }

    public function insert() {
        $exam_category = $this->input->post('exam_category');
        $subject_name = $this->input->post('subject_name');
        $chapter_name = $this->input->post('chapter_name');
        $topic_name = $this->input->post('topic_name');
        $query = $this->db->query("SELECT * FROM tagging_exam_subject_chapter_topic WHERE exam_master_id = '" . $exam_category . "' AND subject_master_id = '" . $subject_name . "' AND chapter_master_id = '" . $chapter_name . "' AND topic_master_id = '" . $topic_name . "'  ");
        $count = $query->num_rows();
        if ($exam_category != '' AND $subject_name != '' AND $chapter_name != '' AND $topic_name != '') {
            if ($count < 1) {
                $data = array(
                    'exam_master_id' => $this->input->post('exam_category'),
                    'subject_master_id' => $this->input->post('subject_name'),
                    'chapter_master_id' => $this->input->post('chapter_name'),
                    'topic_master_id' => $this->input->post('topic_name'),
                );
                $this->taggingmodel->add($data);
                $this->session->set_flashdata('msg', 'Tagging Data Succesfully');
                redirect('tagging');
            } else {
                $this->session->set_flashdata('msg-error', 'Tagging data already exist');
                redirect('tagging');
            }
        } else {
            $this->session->set_flashdata('msg-error', 'All Field are required');
            redirect('tagging');
        }
    }

    public function update($tagging_master_id) {
        $exam_category = $this->input->post('exam_category');
        $subject_name = $this->input->post('subject_name');
        $chapter_name = $this->input->post('chapter_name');
        $topic_name = $this->input->post('topic_name');
        $query = $this->db->query("SELECT * FROM tagging_exam_subject_chapter_topic WHERE exam_master_id = '" . $exam_category . "' AND subject_master_id = '" . $subject_name . "' AND chapter_master_id = '" . $chapter_name . "' AND topic_master_id = '" . $topic_name . "' AND tagging_master_id != '" . $tagging_master_id . "'");
        $count = $query->num_rows();
        if ($count < 1) {
            $data = array(
                'exam_master_id' => $exam_category,
                'subject_master_id' => $subject_name,
                'chapter_master_id' => $chapter_name,
                'topic_master_id' => $topic_name,
            );
            $category = $this->taggingmodel->updateTagging($tagging_master_id, $data);
            $this->session->set_flashdata('msg', 'Tagging data updated sucessfully');
            redirect('tagging');
        } else {
            $this->session->set_flashdata('msg-error', 'Tagging data already Exist');
            redirect('tagging/edit/' . $tagging_master_id . '');
        }
    }

    public function delete($tagging_master_id) {
        $this->taggingmodel->delete_tagging($tagging_master_id);
        $this->session->set_flashdata('msg', 'tagging data deleted');
        redirect('tagging');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */