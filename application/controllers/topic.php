<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Topic extends CI_Controller {
 public function __construct() {
        parent::__construct();
        $this->load->helper('url');        
        $this->load->model('topicmodel');
        $this->load->library('session');
         $result = $this->session->all_userdata();
		if(!isset($result['user_data']['logged_in']))
		{
			 redirect('login');		
		}
    }

	public function index()
	{		
		$categorydata = $this->topicmodel->getTopics();
		$this->load->view('AdminLTE/topic/listing', ['topicdata' => $categorydata]);
	}
	public function add()
	{
		$this->load->view('AdminLTE/topic/topicAdd');
	}
	public function edit($topic_master_id)
	{		
		$topic = $this->topicmodel->find_topic($topic_master_id);		
		$this->load->view('AdminLTE/topic/topicEdit',['topic'=>$topic]);
	}
	
	public function editForm()
	{		
			
		$this->load->view('AdminLTE/topic/topicEdit');
	}
	public function view()
	{
		echo 'view logic';
	}
		
	public function insert()
	{
		$topic_name = $this->input->post('topic_name');
		$topic_name_keyword = $this->input->post('topic_name_keyword');
		$query = $this->db->query("SELECT * FROM tbl_topic_master WHERE topic_name = '".$topic_name."'");
       $count =  $query->num_rows();
	    if($topic_name != ''){
	if($count < 1){
	$data = array(
		'topic_name' => $this->input->post('topic_name'),
		'topic_name_keyword' => $this->input->post('topic_name_keyword')
			   );
	$this->topicmodel->add($data);
$this->session->set_flashdata('msg', 'Topic added succesfully');
		redirect('topic');
	}
	else{
		$this->session->set_flashdata('msg-error', 'Topic already exist');
		redirect('topic');
	}
		}
		else{
			$this->session->set_flashdata('msg-error', 'Please enter topic name');
		redirect('topic');
		}
	}
	public function update($topic_master_id) {
		$topic_name = $this->input->post('topic_name');
		$topic_name_keyword = $this->input->post('topic_name_keyword');
		$query = $this->db->query("SELECT * FROM tbl_topic_master WHERE topic_name = '".$topic_name."' AND topic_master_id != '".$topic_master_id."' ");
        $count =  $query->num_rows();		
		if($count < 1){
        $data = array(
            'topic_name' => $this->input->post('topic_name'),
            'topic_name_keyword' => $this->input->post('topic_name_keyword'),
                   );
       $topic =  $this->topicmodel->updateTopic($topic_master_id, $data);		
        $this->session->set_flashdata('msg', 'Topic updated sucessfully');
		redirect('topic');
		}
		else {
			$this->session->set_flashdata('msg-error', 'Topic already Exist');
		redirect('topic/edit/'.$topic_master_id.'');
		}
    }
	public function delete($topic_master_id)
	{
		    $this->topicmodel->delete_topic($topic_master_id);
			$this->session->set_flashdata('msg', 'Topic deleted');
		    redirect('topic');	
					
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */