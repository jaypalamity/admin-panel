<!DOCTYPE html>
<html>
    <script>
        function doconfirm()
        {
            job = confirm("Are you sure to delete permanently?");
            if (job != true)
            {
                return false;
            }
        }
    </script>

    <?php
    //echo '<pre>';print_r($get_taggingData);


    $var = get_question();
//echo '<pre>';print_r($var);
    ?>
    <?php //echo base_url('ckeditor/ckeditor.js');die; ?>
    <?php $this->load->view('AdminLTE/element/header'); ?>
    <script src="<?php echo base_url('ckeditor'); ?>/ckeditor.js"></script>
    <style>
        .manualHide
        {
            display:none;
        }
    </style>
    <script type="text/javascript">
//$(function(){
//    alert('hi');
//    alert($('#ckeditor').find("div:visible").length);
//});
        function AddMoreButton()
        {
            //alert(parseInt($("#hdnAddmore").val()));
            //debugger;
            if (parseInt($("#hdnAddmore").val()) < 6) {
                $("#hdnAddmore").val(parseInt($("#hdnAddmore").val()) + parseInt("1"));
                if (parseInt($("#hdnAddmore").val()) > 0 && parseInt($("#hdnAddmore").val()) < 7)
                {
                    var i;
                    for (i = 0; i < parseInt($("#hdnAddmore").val()); i++)
                    {
                        $("#ckEditor" + (i + 5)).show();
                    }
                }
            } else
            {
                alert("You cannot add more than 10 options!");
            }
        }

        function removeButton()
        {
            // debugger;
            // alert($("#hdnAddmore").val());
            if (parseInt($("#hdnAddmore").val()) > 0) {
                $("#hdnAddmore").val(parseInt($("#hdnAddmore").val()) - parseInt("1"));
                //if(parseInt($("#hdnAddmore").val()) > 5){
                $("#ckEditor" + (parseInt($("#hdnAddmore").val()) + parseInt("5"))).hide();
            }
        }
    </script>
    <body class="hold-transition skin-blue sidebar-mini">
        <input type="hidden" id ="hdnAddmore" value="0"/>
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
                                    <h3 class="box-title">Add Question</h3>
                                </div>
                                <?php if ($this->session->flashdata('msg')) { ?>
                                    <div class="alert alert-success"> <?= $this->session->flashdata('msg') ?> </div>

                                <?php } if ($this->session->flashdata('msg-error')) { ?>
                                    <div class="alert alert-danger"> <?= $this->session->flashdata('msg-error'); ?> </div>
                                <?php } ?>

                                <?php
                                $questionTypeList = get_question_type();
                                ?>
                                <form  method="post" class="validator-form form-horizontal" action="<?php echo base_url('index.php/addquestion/insert'); ?>">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Select Question Type</label>
                                            <div class="col-sm-4">                                                                                    
                                                <select class="form-control" name="question_type" id="question_type" required>
                                                    <option value="" selected="true">Select question type</option>
                                                    <?php foreach ($questionTypeList as $data) { ?>                                                    
                                                        <option value="<?php echo $data->question_type_master_id; ?>"><?php echo $data->question_type_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div> 



                                        <label for="Question" class="col-sm-2 control-label">Question</label>
                                        <textarea class="ckeditor" id="ckeditor" name="question">              
                                        </textarea>
                                        
                                       

                                        <label for="Option A" class="col-sm-2 control-label">Option A</label>
                                        <textarea class="ckeditor" id="ckeditor" name="A">              
                                        </textarea>
                                        
                                         <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Is Right Answer</label>
                                            <div class="col-sm-4">                                                                                    
                                                <input type="radio" name="A_answer" value="Yes">
                                                <input type="radio" name="A_answer" value="No">
                                            </div>
                                        </div> 

                                        <label for="Option B" class="col-sm-2 control-label">Option B</label>
                                        <textarea class="ckeditor" id="ckeditor" name="B">              
                                        </textarea>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Is Right Answer</label>
                                            <div class="col-sm-4">                                                                                    
                                                <input type="radio" name="B_answer" value="Yes">
                                                <input type="radio" name="B_answer" value="No">
                                            </div>
                                        </div>

                                        <label for="Option C" class="col-sm-2 control-label">Option C</label>
                                        <textarea class="ckeditor" id="ckeditor" name="C">              
                                        </textarea>

                                        <label for="Option D" class="col-sm-2 control-label">Option D</label>
                                        <textarea class="ckeditor" id="ckeditor" name="D">              
                                        </textarea>


                                        <div id="ckEditor5" class="manualHide">
                                            <label for="Option E" class="col-sm-2 control-label">Option E</label>
                                            <textarea class="ckeditor" id="ckeditor5" name="E">              
                                            </textarea>
                                        </div>

                                        <div id="ckEditor6" class="manualHide">
                                            <label for="Option F" class="col-sm-2 control-label">Option F</label>
                                            <textarea class="ckeditor" id="ckeditor6" name="F">              
                                            </textarea>
                                        </div>

                                        <div id="ckEditor7" class="manualHide">
                                            <label for="Option G" class="col-sm-2 control-label">Option G</label>
                                            <textarea class="ckeditor" id="ckeditor7" name="G">              
                                            </textarea>
                                        </div>

                                        <div id="ckEditor8" class="manualHide">
                                            <label for="Option H" class="col-sm-2 control-label">Option H</label>
                                            <textarea class="ckeditor" id="ckeditor8" name="H">              
                                            </textarea>
                                        </div>

                                        <div id="ckEditor9" class="manualHide">
                                            <label for="Option I" class="col-sm-2 control-label">Option I</label>
                                            <textarea class="ckeditor" id="ckeditor9" name="I">              
                                            </textarea>
                                        </div>

                                        <div id="ckEditor10" class="manualHide">
                                            <label for="Option J" class="col-sm-2 control-label">Option J</label>
                                            <textarea class="ckeditor" id="ckeditor10" name="J">              
                                            </textarea>
                                        </div>

                                        <div id="TextBoxesGroup"> 
                                            <div id="TextBoxDiv1">
                                            </div>
                                        </div>

                                        <div style="text-align: right;">
                                            <input type="button" onclick="AddMoreButton();" value="Add More Option" id="addButton1">
                                            <input type="button" onclick="removeButton();" value="Remove Button" id="removeButton1">
                                        </div>
                                        <div class="form-group">
                                            <label for="Correct Answer" class="col-sm-2 control-label">Correct Answer</label>
                                            <div class="col-sm-4">                                                                                    
                                                <select class="form-control" name="correct_answer" id="correct_answer" required="">
                                                    <option value="" selected="true">Select</option>
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="C">C</option>
                                                    <option value="C">D</option>
                                                    <option value="C">E</option>
                                                    <option value="C">F</option>
                                                    <option value="C">G</option>
                                                    <option value="C">H</option>
                                                    <option value="C">I</option>
                                                    <option value="C">J</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="Question Level" class="col-sm-2 control-label">Question Level</label>
                                            <div class="col-sm-4">                                                                                    
                                                <select class="form-control" name="question_level" id="question_level" required="">
                                                    <option value="" selected="true">Select</option>
                                                    <option value="1">Easy</option>
                                                    <option value="2">Difficult</option>
                                                    <option value="3">Average</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Average time to solve</label>
                                            <div class="col-sm-4">                                                                                    
                                                <select class="form-control" name="avg_time_to_solve" id="avg_time_to_solve" required="">
                                                    <option value="" selected="true">Select</option>
                                                    <option value="1">10 Sec</option>
                                                    <option value="2">20 Sec</option>
                                                    <option value="3">30 Sec</option>
                                                    <option value="3">1 Minute</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Tagging to subject</label>
                                            <div class="col-sm-4">                                                                                    
                                                <select class="form-control" name="tagging_id" id="tagging_id" required="">

                                                    <option value="" selected="true">Select</option>
                                                    <?php
                                                    $get_taggingData = get_taggingData();
                                                    foreach ($get_taggingData as $data) {
                                                        // echo '<pre>';print_r($data);

                                                        echo $taggingMasterId = $data->tagging_master_id;
                                                        echo '<br>';
//     echo  $exam_master_id = $data->exam_master_id;echo '<br>';
//     echo $subject_master_id = $data->subject_master_id;echo '<br>';
//     echo $chapter_master_id = $data->chapter_master_id;echo '<br>';
//      echo $topic_master_id = $data->topic_master_id;echo '<br>';

                                                        $query = $this->db->query("SELECT exam_name FROM tbl_exam_master WHERE id = '" . $data->exam_master_id . "'");
                                                        $examName = $query->row();

                                                        $querySubject = $this->db->query("SELECT subject_name FROM tbl_subject_master WHERE subject_master_id = '" . $data->subject_master_id . "'");
                                                        $subjectName = $querySubject->row();

                                                        $queryChapter = $this->db->query("SELECT chapter_name FROM tbl_chapter_master WHERE chapter_master_id = '" . $data->chapter_master_id . "'");
                                                        $chapterName = $queryChapter->row();
                                                        $queryTopic = $this->db->query("SELECT topic_name FROM tbl_topic_master WHERE topic_master_id = '" . $data->topic_master_id . "'");
                                                        $topicName = $queryTopic->row();
                                                        ?>
                                                        <option value="<?php echo $taggingMasterId; ?>"><?php echo $examName->exam_name; ?>-<?php echo $subjectName->subject_name; ?>-<?php echo $chapterName->chapter_name; ?>-<?php echo $topicName->topic_name; ?></option>
                                                    <?php } ?>

                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="box-footer">              
                                        <button type="submit" id="addQuestionType" class="btn btn-info" style="margin-left: 450px;">Save</button>
                                    </div>
                                </form>
                            </div>
                            <div class="box box-warning">
                            </div>
                        </div>
                    </div>
                </section>
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                            </div>                       
                            <div class="box">
                                <div class="box-header">
                                </div>
                                <div class="box-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Question Type</th>
                                                <th>Question</th>
                                                <th>Correct Answer</th>
                                                <th>Tagged Exam</th>
                                                <th>Edit</th>
                                                <th>View</th>
                                                <th>Delete</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($questionData as $data) { ?>
                                                <?php
                                                $queryQuestionTtype = $this->db->query("SELECT question_type_name FROM tbl_question_type_master WHERE question_type_master_id = '" . $data->question_type . "'");
                                                $QuestionTypeName = $queryQuestionTtype->row();

                                                $taggingIds = get_tagging($data->tagging_id);
                                                //echo '<pre>';
                                                //print_r($taggingIds);
                                                $exam_id = $taggingIds->exam_master_id;
                                                $subject_id = $taggingIds->subject_master_id;
                                                $chapter_id = $taggingIds->chapter_master_id;
                                                $topic_id = $taggingIds->topic_master_id;

                                                $queryExam = $this->db->query("SELECT exam_name FROM tbl_exam_master WHERE id = '" . $exam_id . "'");
                                                $examName = $queryExam->row();

                                                $querySubject = $this->db->query("SELECT subject_name FROM tbl_subject_master WHERE subject_master_id = '" . $subject_id . "'");
                                                $subjectName = $querySubject->row();

                                                $queryChapter = $this->db->query("SELECT chapter_name FROM tbl_chapter_master WHERE chapter_master_id = '" . $chapter_id . "'");
                                                $chapterName = $queryChapter->row();
                                                $queryTopic = $this->db->query("SELECT topic_name FROM tbl_topic_master WHERE topic_master_id = '" . $topic_id . "'");
                                                $topicName = $queryTopic->row();
                                                //print_r($data);
                                                $eName = $examName->exam_name;
                                                $sName = $subjectName->subject_name;
                                                $cName = $chapterName->chapter_name;
                                                $tName = $topicName->topic_name;
                                                $taggingName = $eName . '-' . $sName . '-' . $cName . '-' . $tName;
                                                ?>
                                                <tr>
                                                    <td><?php echo $QuestionTypeName->question_type_name; ?></td>
                                                    <td><?php echo $data->question; ?></td>
                                                    <td><?php echo $data->correct_answer; ?></td>
                                                    <td><?php echo $taggingName; ?></td>


                                                    <td><a href="<?php echo base_url('addquestion/edit/'); ?>/<?php echo $data->tbl_question_master_id; ?>">Edit</a></td>
                                                    <td><a href="<?php echo base_url('addquestion/view/'); ?>/<?php echo $data->tbl_question_master_id; ?>">View</a></td>
                                                    <td><a href="<?php echo base_url('addquestion/delete/'); ?>/<?php echo $data->tbl_question_master_id; ?>" onClick="return doconfirm();">Delete</a></td>

                                                </tr>
                                            <?php } ?>
                                            </tfoot>
                                    </table>
                                </div>
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
<script>
    $('#question_type').on('change', function () {
        var value = $(this).val();
        if (value == '2') {
            $("#correct_answer").prop('multiple', true);
        } else {
            $("#correct_answer").prop('multiple', false);
        }

    })
</script>