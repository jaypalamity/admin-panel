<?php
class Chaptermodel extends CI_Model {
  
 function getChapters(){
  $this->db->select("*");
  $this->db->from('tbl_chapter_master');
  $query = $this->db->get();
  return $query->result();
 }
 
 public function add($data)
	{
		 return $this->db->insert( 'tbl_chapter_master', $data);
	}
 public function find_chapter($chapter_master_id)
	{
		$q = $this->db->select(['chapter_master_id','chapter_name','chapter_name_keyword'])
					->where('chapter_master_id', $chapter_master_id)
					->get('tbl_chapter_master');
		return $q->row();
	}
	
	public function updateChapter($chapter_master_id, $data) {
    return $this->db->where('chapter_master_id', $chapter_master_id)->update('tbl_chapter_master', $data);
    }
	
	
	public function delete_chapter($chapter_master_id)
	{		
		return $this->db->delete('tbl_chapter_master',['chapter_master_id'=>$chapter_master_id]);
		 //echo $this->db->last_query();die;
	}
}
?>