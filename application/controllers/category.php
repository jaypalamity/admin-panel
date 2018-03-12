<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {
 public function __construct() {
        parent::__construct();
        $this->load->helper('url');        
        $this->load->model('categorymodel');
        $this->load->library('session');
        $result = $this->session->all_userdata();
		if(!isset($result['user_data']['logged_in']))
		{
			 redirect('login');		
		}
    }

	public function index()
	{		
		$categorydata = $this->categorymodel->getCategories();
		$this->load->view('AdminLTE/category/listing', ['categorydata' => $categorydata]);
	}
	public function add()
	{
		$this->load->view('AdminLTE/category/categoryAdd');
	}
	public function edit($category_id)
	{		
		$category = $this->categorymodel->find_category($category_id);		
		$this->load->view('AdminLTE/category/categoryEdit',['category'=>$category]);
	}
	
	public function editForm()
	{		
			
		$this->load->view('AdminLTE/category/categoryEdit');
	}
	public function view()
	{
		echo 'view logic';
	}
		
	public function insert()
	{
		$category_name = $this->input->post('category_name');
		$category_keyword = $this->input->post('category_name_keyword');
		$query = $this->db->query("SELECT * FROM tbl_exam_master WHERE exam_name = '".$category_name."'");
       $count =  $query->num_rows();
	    if($category_name != ''){
	if($count < 1){
	$data = array(
		'exam_name' => $this->input->post('category_name'),
		'exam_name_keyword' => $this->input->post('category_name_keyword')
			   );
	$this->categorymodel->add($data);
$this->session->set_flashdata('msg', 'Category added succesfully');
		redirect('category');
	}
	else{
		$this->session->set_flashdata('msg-error', 'Category already exist');
		redirect('category');
	}
	}
	else{
		$this->session->set_flashdata('msg-error', 'Please enter category name');
		redirect('category');
	}
	}
	public function update($id) {
		$category_name = $this->input->post('category_name');
		$query = $this->db->query("SELECT * FROM tbl_exam_master WHERE exam_name = '".$category_name."' AND exam_name_keyword = '".$category_name_keyword."' AND id != '".$id."'");
        $count =  $query->num_rows();
		//echo $count;die;
		if($count < 1){
        $data = array(
            'exam_name' => $this->input->post('category_name'),
            'exam_name_keyword' => $this->input->post('category_name_keyword'),
                   );
       $category =  $this->categorymodel->updateCategory($id, $data);		
        $this->session->set_flashdata('msg', 'Category updated sucessfully');
		redirect('category');
		}
		else {
			$this->session->set_flashdata('msg-error', 'Category already Exist');
		redirect('category/edit/'.$id.'');
		}
    }
	public function delete($id)
	{
		    $this->categorymodel->delete_category($id);
			$this->session->set_flashdata('msg', 'Category deleted');
		    redirect('category');	
					
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */