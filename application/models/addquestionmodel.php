<?php

class Addquestionmodel extends CI_Model {

    function getQuestion() {
        $this->db->select("*");
        $this->db->from('question_master');
        $query = $this->db->get();
        return $query->result();
        //echo $this->db->last_query()
    }

    public function add($data) {
        return $this->db->insert('tbl_question_master', $data);
    }

    public function find_question($id) {
        $q = $this->db->select('*')
                ->where('id', $id)
                ->get('question_master');
        return $q->row();
    }
    
    public function find_question_option($question_id) {
        $q = $this->db->select('*')
                ->where('question_id', $question_id)
                ->get('question_option_master');
        return $q->result();
    }
    public function find_question_tagging($question_id) {
        $q = $this->db->select('*')
                ->where('question_id', $question_id)
                ->get('question_tagging_master');
        return $q->result();
    }
    
    

    public function updateQuestion($id, $data) {
        return $this->db->where('tbl_question_master_id', $id)->update('tbl_question_master', $data);
        //echo $this->db->last_query();die;
    }

    public function delete_question($id) {
        return $this->db->delete('question_master', ['id' => $id]);        
        //echo $this->db->last_query();die;
    }
    
    public function delete_question_option($id) {       
        return $this->db->delete('question_option_master', ['question_id' => $id]);    
        //echo $this->db->last_query();die;
    }
    public function delete_question_tagging($id) {        
        return $this->db->delete('question_tagging_master', ['question_id' => $id]);
        //echo $this->db->last_query();die;
    }
    

}

?>