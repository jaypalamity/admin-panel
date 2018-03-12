<?php
class Examsubjectmodel extends CI_Model {
  
 function getSubjects(){
  $query = $this->db->query("SELECT  distinct 0 tagging_master_id, exam_master_id,subject_master_id,subject_level  FROM tagging_exam_subject_chapter_topic ");
           return  $results = $query->result();
 }
 
 public function add($data)
	{
		 return $this->db->insert( 'tbl_exam_master', $data);
	}
 public function find_category($category_id)
	{
		$q = $this->db->select(['id','exam_name','exam_name_keyword'])
					->where('id', $category_id)
					->get('tbl_exam_master');
		return $q->row();
	}
	
	public function updateCategory($id, $data) {
    return $this->db->where('id', $id)->update('tbl_exam_master', $data);
    }
	
	
	public function delete_category($id)
	{		
		return $this->db->delete('tbl_exam_master',['id'=>$id]);
		 //echo $this->db->last_query();die;
	}
}
?>