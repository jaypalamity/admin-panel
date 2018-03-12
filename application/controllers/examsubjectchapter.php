<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Examsubjectchapter extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('categorymodel');
        $this->load->model('subjectmodel');
        $this->load->library('session');
        $result = $this->session->all_userdata();
        if (!isset($result['user_data']['logged_in'])) {
            redirect('login');
        }
    }

    public function index() {
        $examsubject = $this->subjectmodel->getSubjects();
        $categorydata = $this->categorymodel->getCategories();
        $this->load->view('AdminLTE/examsubjectchapter/listing', ['categorydata' => $categorydata, 'examsubject' => $examsubject]);
    }

    public function getData() {

        $exam_category = $this->input->post('exam_category_id');
        $exam_subject = $this->input->post('exam_subject_id');
        $query = $this->db->query("SELECT  distinct 0 tagging_master_id, exam_master_id,subject_master_id,chapter_master_id,chapter_level  FROM tagging_exam_subject_chapter_topic WHERE exam_master_id = '" . $exam_category . "' AND subject_master_id = '".$exam_subject."' ");
        $results = $query->result();
        if ($results) {
            echo '<table class="table table-hover">
                                    <tr>
                                        <th>Exam Category</th>
                                        <th>Subject</th>
                                        <th>Chapter</th>
                                        <th>Order</th>
                                        <th>Chapter Order</th>
                                                                         
                                    </tr>';
            $varCount = 1;
            foreach ($results as $result) {
                $query = $this->db->query("SELECT exam_name FROM tbl_exam_master WHERE id = '" . $result->exam_master_id . "'");                                    
                $examName = $query->row();
                $querySubject = $this->db->query("SELECT subject_name FROM tbl_subject_master WHERE subject_master_id = '" . $result->subject_master_id . "'");
                $subjectName = $querySubject->row();
                
                $queryChapter = $this->db->query("SELECT chapter_name FROM tbl_chapter_master WHERE chapter_master_id = '" . $result->chapter_master_id . "'");
                $chapterName = $queryChapter->row();
                
                
                echo '<tr>
                    <input type="hidden" name="exam_master_id" value="' . $result->exam_master_id . '">
                 <input type="hidden"  name="subject_master_id[]" value="' . $result->subject_master_id . '">
                 <input type="hidden"  name="chapter_master_id[]" value="' . $result->chapter_master_id . '">
                                        <td>' . $examName->exam_name . '</td>
                                        <td>' . $subjectName->subject_name . '</td>
                                        <td>' . $chapterName->chapter_name . '</td>
                                        <td><input type="text" id="' . $varCount++ . '" class="exam_subject_order" name="chapter_order[]" required value="' . $result->chapter_level . '"></td>
                                        <td>' . $result->chapter_level . '</td>
                                      
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

    public function chapterlevelupdate() {
    echo '<pre>';    print_r($_POST);
        $examMasterId = $this->input->post('exam_master_id');
        $subjectMasterId = $this->input->post('subject_master_id');
        $chapterMasterId = $this->input->post('chapter_master_id');
        $chapter_order = $this->input->post('chapter_order');
        $count = count($chapter_order);
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
            $query = $this->db->query("UPDATE tagging_exam_subject_chapter_topic SET chapter_level= '" . $chapter_order[$i] . "' WHERE exam_master_id='" . $examMasterId . "' and subject_master_id='" . $subjectMasterId[$i] . "' and chapter_master_id='" . $chapterMasterId[$i] . "'");
           echo $this->db->last_query();
            // }
            //$count = $query->num_rows();
        }

        $this->session->set_flashdata('msg', 'Tagging Order Updated');
        redirect('examsubjectchapter');
    }

//    public function add() {
//        $this->load->view('AdminLTE/category/categoryAdd');
//    }

    public function edit($category_id) {
        $category = $this->categorymodel->find_category($category_id);
        $this->load->view('AdminLTE/category/categoryEdit', ['category' => $category]);
    }

    public function editForm() {

        $this->load->view('AdminLTE/category/categoryEdit');
    }

    public function view() {
        echo 'view logic';
    }

    public function insert() {
        $category_name = $this->input->post('category_name');
        $category_keyword = $this->input->post('category_name_keyword');
        $query = $this->db->query("SELECT * FROM tbl_exam_master WHERE exam_name = '" . $category_name . "'");
        $count = $query->num_rows();
        if ($category_name != '') {
            if ($count < 1) {
                $data = array(
                    'exam_name' => $this->input->post('category_name'),
                    'exam_name_keyword' => $this->input->post('category_name_keyword')
                );
                $this->categorymodel->add($data);
                $this->session->set_flashdata('msg', 'Category added succesfully');
                redirect('category');
            } else {
                $this->session->set_flashdata('msg-error', 'Category already exist');
                redirect('category');
            }
        } else {
            $this->session->set_flashdata('msg-error', 'Please enter category name');
            redirect('category');
        }
    }

    public function update($id) {
        $category_name = $this->input->post('category_name');
        $query = $this->db->query("SELECT * FROM tbl_exam_master WHERE exam_name = '" . $category_name . "' AND exam_name_keyword = '" . $category_name_keyword . "' AND id != '" . $id . "'");
        $count = $query->num_rows();
        //echo $count;die;
        if ($count < 1) {
            $data = array(
                'exam_name' => $this->input->post('category_name'),
                'exam_name_keyword' => $this->input->post('category_name_keyword'),
            );
            $category = $this->categorymodel->updateCategory($id, $data);
            $this->session->set_flashdata('msg', 'Category updated sucessfully');
            redirect('category');
        } else {
            $this->session->set_flashdata('msg-error', 'Category already Exist');
            redirect('category/edit/' . $id . '');
        }
    }

    public function delete($id) {
        $this->categorymodel->delete_category($id);
        $this->session->set_flashdata('msg', 'Category deleted');
        redirect('category');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */