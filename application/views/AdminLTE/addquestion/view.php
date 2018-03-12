<!DOCTYPE html>
<html>


    <?php
    //echo '<pre>';print_r($get_taggingData);
//echo '<pre>';print_r($var);
    ?>

    <?php //echo base_url('ckeditor/ckeditor.js');die; ?>
    <?php $this->load->view('AdminLTE/element/header'); ?>
    <script src="<?php echo base_url('ckeditor'); ?>/ckeditor.js"></script>


    <body class="hold-transition skin-blue sidebar-mini">

        <div class="wrapper">

            <?php $this->load->view('AdminLTE/element/header_navigation'); ?>
            <!-- Left side column. contains the logo and sidebar -->
            <?php $this->load->view('AdminLTE/element/left'); ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-info">		  
                                <div class="box-header with-border">
                                    <h3 class="box-title">View Question Details</h3>
                                </div>                              
                                <div class="box-body">                                        
                                    <div class="container"> 
                                        Question Type:-<p><?php $questionTypeId =  $questionDetailRow->question_type;
                                        if($questionTypeId=='1'){
                                            $questionType =  'Single Choice';
                                        }
                                        if($questionTypeId=='2'){
                                             $questionType = 'Multiple Choice';
                                        }
                                        echo $questionType;
                                        ?></p>            
                                        Question :<p><?php echo $questionDetailRow->question_name; ?></p>            
                                        Hints :<p><?php echo $questionDetailRow->hints; ?></p>            
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Option</th>
                                                    <th>Option Description</th>
                                                    <th>Answer</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($questionOptionRow as $data) { ?>   
                                                    <tr>
                                                        <td> <?php echo $data->option_name; ?></td>
                                                        <td> <?php echo $data->option_value; ?></td>
                                                        <td> <?php echo $data->is_right_answer; ?></td>
                                                    </tr>
                                                <?php } ?>
                                                <tr>
                                                    <td>Tagging to topic</td>
                                                </tr>
                                                <?php                                               
                                                $query = $this->db->query("SELECT a.exam_name,c.subject_name,d.chapter_name,e.topic_name,f.question_id
FROM tbl_exam_master a 
JOIN tagging_exam_subject_chapter_topic b ON a.id = b.exam_master_id
JOIN tbl_subject_master c ON c.subject_master_id = b.subject_master_id
JOIN tbl_chapter_master d ON d.chapter_master_id = b.chapter_master_id
JOIN tbl_topic_master e ON e.topic_master_id = b.topic_master_id
JOIN question_tagging_master f On f.tagging_id = b.tagging_master_id
WHERE f.question_id = '" . $this->uri->segment(3) . "'");
                                                $taggings = $query->result();
                                                ?>                                                
                                                <tr>
                                                    <td><?php //echo $taggingData->tagging_id;  ?></td>
                                                </tr>
                                                <?php foreach ($taggings as $taggingsData) { ?> 
                                                    <tr>
                                                        <td><?php echo $taggingsData->exam_name; ?>-<?php echo $taggingsData->subject_name; ?>-<?php echo $taggingsData->chapter_name; ?>-<?php echo $taggingsData->topic_name; ?></td>                                                            
                                                    </tr>
                                                <?php } ?> 
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>                           
                            <div class="box box-warning">
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Main content -->
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <?php $this->load->view('AdminLTE/element/footer') ?>
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->
        <!-- jQuery 3 -->

    </body>
</html>
