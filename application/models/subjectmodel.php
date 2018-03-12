<?php
class Subjectmodel extends CI_Model {
  
 function getSubjects(){
  $this->db->select("*");
  $this->db->from('tbl_subject_master');
  $query = $this->db->get();
  return $query->result();
 }
 
 public function add($data)
	{
		 return $this->db->insert( 'tbl_subject_master', $data);
	}
 public function find_subject($subject_master_id)
	{
		$q = $this->db->select(['subject_master_id','subject_name','subject_name_keyword'])
					->where('subject_master_id', $subject_master_id)
					->get('tbl_subject_master');
		return $q->row();
	}
	
	public function updateSubject($id, $data) {
    return $this->db->where('subject_master_id', $id)->update('tbl_subject_master', $data);
    }
	
	
	public function delete_subject($id)
	{		
		return $this->db->delete('tbl_subject_master',['subject_master_id'=>$id]);
		 //echo $this->db->last_query();die;
	}
}
?>