<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        echo 'hi';
        //$this->legacy_db = $this->load->database(testing2, true);
// fetch result from 'cloudwaysdb'
        $otherdb = $this->load->database('inventorydb', TRUE);
//$query = $otherdb->select('column_one, column_two')->get('table'); 
        $otherdb->select('*');
        $otherdb->from('product');
        $query = $otherdb->get();
        $result = $query->result();
        echo '<pre>';
        print_r($result);

        $query1 = $this->db->get('tbl_subject_master');
        foreach ($query1->result() as $row) {
            echo '<pre>';
            print_r($row);
        }
    }

}
