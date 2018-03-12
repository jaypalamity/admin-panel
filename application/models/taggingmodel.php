<?php

class Taggingmodel extends CI_Model {

    function getTaggings() {
        $this->db->select("*");
        $this->db->from('tagging_exam_subject_chapter_topic');
        $query = $this->db->get();
        return $query->result();
    }

    public function add($data) {
        return $this->db->insert('tagging_exam_subject_chapter_topic', $data);
    }

    public function find_tagging($tagging_master_id) {
        $q = $this->db->select('*')
                ->where('tagging_master_id', $tagging_master_id)
                ->get('tagging_exam_subject_chapter_topic');
        return $q->row();
    }

    public function updateTagging($tagging_master_id, $data) {
        return $this->db->where('tagging_master_id', $tagging_master_id)->update('tagging_exam_subject_chapter_topic', $data);
    }

    public function delete_tagging($tagging_master_id) {
        return $this->db->delete('tagging_exam_subject_chapter_topic', ['tagging_master_id' => $tagging_master_id]);
        //echo $this->db->last_query();die;
    }

}

?>