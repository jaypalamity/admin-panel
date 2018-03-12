<?php
class Questiontypemodel extends CI_Model {
  
 function getQuestiontype(){
  $this->db->select("*");
  $this->db->from('tbl_question_type_master');
  $query = $this->db->get();
  return $query->result();
  //echo $this->db->last_query()
 }
 
 public function add($data)
	{
		 return $this->db->insert( 'tbl_question_type_master', $data);
	}
 public function find_questiontype($question_type_id)
	{
		$q = $this->db->select('*')
					->where('question_type_master_id', $question_type_id)
					->get('tbl_question_type_master');
		return $q->row();
	}
	
	public function updateQuestiontype($id, $data) {
     return $this->db->where('question_type_master_id', $id)->update('tbl_question_type_master', $data);
    //echo $this->db->last_query();die;
    }
	
	
	public function delete_questiontype($id)
	{		
		return $this->db->delete('tbl_question_type_master',['question_type_master_id'=>$id]);
		 //echo $this->db->last_query();die;
	}
}
?>