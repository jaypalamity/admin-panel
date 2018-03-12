<?php
class Topicmodel extends CI_Model {
  
 function getTopics(){
  $this->db->select("*");
  $this->db->from('tbl_topic_master');
  $query = $this->db->get();
  return $query->result();
 }
 
 public function add($data)
	{
		 return $this->db->insert( 'tbl_topic_master', $data);
	}
 public function find_topic($topic_master_id)
	{
		$q = $this->db->select(['topic_master_id','topic_name','topic_name_keyword'])
					->where('topic_master_id', $topic_master_id)
					->get('tbl_topic_master');
		return $q->row();
	}
	
	public function updateTopic($topic_master_id, $data) {
     $this->db->where('topic_master_id', $topic_master_id)->update('tbl_topic_master', $data);
	 echo $this->db->last_query();
    }
	
	
	public function delete_topic($topic_master_id)
	{		
		return $this->db->delete('tbl_topic_master',['topic_master_id'=>$topic_master_id]);
		 //echo $this->db->last_query();die;
	}
}
?>