<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bulk extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
    public function __construct() {
        parent::__construct();
      $this->load->helper('custom');
        $result = $this->session->all_userdata();
		if(!isset($result['user_data']['logged_in']))
		{
			 redirect('login');		
		}
    }
	public function index()
	{    
            
            $result = $this->session->all_userdata();
            
		if(!isset($result['user_data']['logged_in']))
		{
			 redirect('login');		
		}
                else
                    {
		$this->load->view('AdminLTE/bulk/listing');
                }
	}	
	public function upload()
	{  
	
if (($_FILES['image_folder']['name']!="")){
// Where the file is going to be stored
	$target_dir = "uploads/";
	$file = $_FILES['image_folder']['name'];
	$path = pathinfo($file);
	$filename = $path['filename'];
	$ext = $path['extension'];
	$temp_name = $_FILES['image_folder']['tmp_name'];
	$path_filename_ext = $target_dir.$filename.".".$ext; 
// Check if file already exists
if (file_exists($path_filename_ext)) {
 //echo "Sorry, file already exists.";
 $this->session->set_flashdata('msg-error', 'File already exist');
		redirect('bulk'); 
 }else{
 move_uploaded_file($temp_name,$path_filename_ext);
 echo "Congratulations! File Uploaded Successfully.";
 $this->session->set_flashdata('msg', 'Congratulations!  File Uploaded Successfully');	
 }	            
    }
if (($_FILES['image_folder_bulk']['name']!="")){
// Where the file is going to be stored
	$target_dir_bulk = "uploads/";
	$file_bulk = $_FILES['image_folder_bulk']['name'];
	$path = pathinfo($file_bulk);
	$filename_bulk = $path['filename'];
	$ext_bulk = $path['extension'];
	$temp_name_bulk = $_FILES['image_folder_bulk']['tmp_name'];
	$path_filename_ext_bulk = $target_dir_bulk.$filename_bulk.".".$ext_bulk; 
// Check if file already exists
if (file_exists($path_filename_ext_bulk)) {
 $this->session->set_flashdata('msg-error', 'Bulk File already exist');
		redirect('bulk');
 }else{
 move_uploaded_file($temp_name_bulk,$path_filename_ext_bulk);
 $this->session->set_flashdata('msg', 'Congratulations! Bulk File Uploaded Successfully');
 }	            
    }
		$file = fopen("uploads/".$file, "r");
		while (!feof($file)) {
		@$html.=fgets($file);
		}
		$html = strip_tags($html, '<img>');
		 $new_file_name="uploads/".$file_bulk;
$zip = new ZipArchive;
  $res = $zip->open($new_file_name);
  if ($res === TRUE) {
     $zip->extractTo('.');
     $zip->close();
     echo 'extraction successful';
     } else {
     echo 'extraction error';
     }	
unlink($new_file_name);
		$queArray = explode("Question)).", $html);
	//////////////////////	
	for ($index = 1; $index < count($queArray); $index++) {	
    $optArray = array();
    $sqlOpt = array();
    $optArray = explode("opt)).", $queArray[$index]);
	  $question =   "Que" . $index . ":" . $optArray[0] . "<br>";
      $que =   $optArray[0];    
    $ans = explode("Ans)).", $optArray[count($optArray) - 1]);
    $hint = explode("Hint)).", $ans[1]);
    $ANS = trim(str_replace("&nbsp;", "", $hint[0]));
    $ansNumber = ord($ANS) - 64;
    echo $ANS . $ansNumber . "<br>";//die;
     $sqlQuestion = "INSERT INTO question_master (question_type, question_name, question_level,avg_time_to_solve,hints) VALUES (1,'".$que."', 1, 1,'" . $hint[1] . "' )";
         if ($this->db->query($sqlQuestion) === TRUE) {
      echo "New record created successfully";
      } else {
      echo "Error";
      }
      $questionID = $this->db->insert_id();    
    for ($index1 = 1; $index1 < count($optArray) - 1; $index1++) {
        $optionsName = $index1;
        $optionsValue = $optArray[$index1];
        if ($index1 + 1 == $ansNumber+1) {
            $sqlOpt[] = "('" . $questionID . "','" . $optionsName . "','" . $optionsValue . "','Yes')";
        } else {
            $sqlOpt[] = "('" . $questionID . "','" . $optionsName . "','" . $optionsValue . "','No')";
        }
    }
    if ($index1 + 1 == $ansNumber+1) {
        $sqlOpt[] = "('" . $questionID . "','" . $index1 . "','" . $ans[0] . "','Yes')";
    } else {
        $sqlOpt[] = "('" . $questionID . "','" . $index1 . "','" . $ans[0] . "','No')";
    }
    //print_r($sqlOpt);
     $sqlOption = "INSERT INTO question_option_master (question_id, option_name,option_value,is_right_answer) value " . implode(", ", $sqlOpt);
 if ($this->db->query($sqlOption)) {
      echo "New record created successfully";	  
      } else {
      echo "Error:";
      }
	  
	  $sqlTagging = "INSERT INTO question_tagging_master(question_id, tagging_id) VALUES ('".$questionID."',10)";
 if ($this->db->query($sqlTagging)) {
      echo "New record created successfully";	  
      } else {
      echo "Error:";
      }
	  
	  
}
	redirect('addquestion');
	}	
	
	}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */