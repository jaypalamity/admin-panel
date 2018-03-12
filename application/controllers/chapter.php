<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chapter extends CI_Controller {
 public function __construct() {
        parent::__construct();
        $this->load->helper('url');        
        $this->load->model('chaptermodel');
        $this->load->library('session');
         $result = $this->session->all_userdata();
		if(!isset($result['user_data']['logged_in']))
		{
			 redirect('login');		
		}
    }

	public function index()
	{		
		$chapterdata = $this->chaptermodel->getChapters();
		$this->load->view('AdminLTE/chapter/listing', ['chapterdata' => $chapterdata]);
	}
	public function add()
	{
		$this->load->view('AdminLTE/chapter/chapterAdd');
	}
	public function edit($chapter_master_id)
	{		
		$chapter = $this->chaptermodel->find_chapter($chapter_master_id);		
		$this->load->view('AdminLTE/chapter/chapterEdit',['chapter'=>$chapter]);
	}
	
	public function editForm()
	{		
			
		$this->load->view('AdminLTE/chapter/chapterEdit');
	}
	public function view()
	{
		echo 'view logic';
	}
		
	public function insert()
	{
		$chapter_name = $this->input->post('chapter_name');
		$chapter_name_keyword = $this->input->post('chapter_name_keyword');
		$query = $this->db->query("SELECT * FROM tbl_chapter_master WHERE chapter_name = '".$chapter_name."'");
       $count =  $query->num_rows();
	   if($chapter_name != ''){
	if($count < 1){
	$data = array(
		'chapter_name' => $this->input->post('chapter_name'),
		'chapter_name_keyword' => $this->input->post('chapter_name_keyword')
			   );
	$this->chaptermodel->add($data);
$this->session->set_flashdata('msg', 'Chapter added succesfully');
		redirect('chapter');
	}
	else{
		$this->session->set_flashdata('msg-error', 'Chapter already exist');
		redirect('chapter');
	   }}
	else{
		$this->session->set_flashdata('msg-error', 'Please enter chapter name');
		redirect('chapter');
	}
	}
	
	public function update($id) {
		$chapter_name = $this->input->post('chapter_name');
		$chapter_name_keyword = $this->input->post('chapter_name_kewword');
		$query = $this->db->query("SELECT * FROM tbl_chapter_master WHERE chapter_name = '".$chapter_name."' AND chapter_master_id != '".$id."'");
        $count =  $query->num_rows();
		//echo $count;die;
		if($count < 1){
        $data = array(
            'chapter_name' => $this->input->post('chapter_name'),
            'chapter_name_keyword' => $this->input->post('chapter_name_keyword'),
                   );
       $chapter =  $this->chaptermodel->updateChapter($id, $data);		
        $this->session->set_flashdata('msg', 'Chapter updated sucessfully');
		redirect('chapter');
		}
		else {
			$this->session->set_flashdata('msg-error', 'Chapter already Exist');
		redirect('chapter/edit/'.$id.'');
		}
    }
	public function delete($chapter_master_id)
	{
		    $this->chaptermodel->delete_chapter($chapter_master_id);
			$this->session->set_flashdata('msg', 'Chapter deleted');
		    redirect('chapter');	
					
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */