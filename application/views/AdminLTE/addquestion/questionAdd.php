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
    $var = get_question();
    ?>

    <?php //echo base_url('ckeditor/ckeditor.js');die; ?>
    <?php $this->load->view('AdminLTE/element/header'); ?>
    <script src="<?php echo base_url('ckeditor'); ?>/ckeditor.js"></script>
    <style>
        .manualHide
        {
            display:none;
        }
        .toggleBtn
        {
            display:none;
        }

        .inner select{ font-size:14px!important;}
    </style>
    <script>
        $(document).ready(function () {
            $(".is_right_answer").change(function () {
//var numItems = $('.is_right_answer:visible').length;
//alert(numItems);
                var questionType = $("#question_type").val();
                if (questionType == '')
                {
                    alert('Please Select Question Type');
                    $('.is_right_answer:visible').prop('checked', false);
                    $("#questionType").focus();
                    return false;
                }
                var currValue = $(this).val();
                if (questionType == '1') {
                    debugger;
                    if (currValue == 'Yes') {
                        $("input.is_right_answer:visible[value='No']").prop('checked', true);
                        // $('.is_right_answer:visible').val('No').prop('checked', true);
                        $(this).prop('checked', true);
                    }
                    if (currValue == 'No') {
                        $("input.is_right_answer:visible[value='No']").prop('checked', true);
                        //$('.is_right_answer:visible').val('No').prop('checked', true);
                        // $(this).val('No').prop('checked', true);
                        //$('.is_right_answer:visible').val('Yes').prop('checked', false);
                        $(this).prop('checked', true);
                    }
                }
            });
        });
    </script>
    <script type="text/javascript">
        function myFunctionName() {
            var questionType = $("#question_type").val();
            var question_level = $("#question_level").val();
            var avg_time_to_solve = $("#avg_time_to_solve").val();
            var tagging_id = $("#tagging_id").val();
            var question = CKEDITOR.instances.question.getData();
            var questionA_value = CKEDITOR.instances.questionA_value.getData();
            var questionB_value = CKEDITOR.instances.questionB_value.getData();
            var questionC_value = CKEDITOR.instances.questionC_value.getData();
            var questionD_value = CKEDITOR.instances.questionD_value.getData();
            var questionE_value = CKEDITOR.instances.questionE_value.getData();
            var questionF_value = CKEDITOR.instances.questionF_value.getData();
            var questionG_value = CKEDITOR.instances.questionG_value.getData();
            var questionH_value = CKEDITOR.instances.questionH_value.getData();
            var questionI_value = CKEDITOR.instances.questionI_value.getData();
            var questionJ_value = CKEDITOR.instances.questionJ_value.getData();
            if (questionType == '')
            {
                alert('Please Select Question Type');
                //$('#questionType').focus();
                $('select').first().focus();
                return false;
            }

            if (question == '')
            {
                alert('Please Enter Question Description');
                //$("#question").focus();
                CKEDITOR.instances['question'].focus();
                return false;
            }
            if (questionA_value == '')
            {
                alert('Please Enter Option A Description');
                CKEDITOR.instances['questionA_value'].focus();
                return false;
            }
            if (questionB_value == '')
            {
                alert('Please Enter Option B Description');
                CKEDITOR.instances['questionB_value'].focus();
                return false;
            }
            if (questionC_value == '')
            {
                alert('Please Enter Option C Description');
                CKEDITOR.instances['questionC_value'].focus();
                return false;
            }
            if (questionD_value == '')
            {
                alert('Please Enter Option D Description');
                CKEDITOR.instances['questionD_value'].focus();
                return false;
            }

            if ($('#ckEditor5').is(":visible")) {//               
                if (questionE_value == '')
                {
                    alert('Please Enter Option E Description');
                    CKEDITOR.instances['questionE_value'].focus();
                    return false;
                }
            }

            if ($('#ckEditor6').is(":visible")) {//               
                if (questionF_value == '')
                {
                    alert('Please Enter Option F Description');
                    CKEDITOR.instances['questionF_value'].focus();
                    return false;
                }
            }


            if ($('#ckEditor7').is(":visible")) {//               
                if (questionG_value == '')
                {
                    alert('Please Enter Option G Description');
                    CKEDITOR.instances['questionG_value'].focus();
                    return false;
                }
            }

            if ($('#ckEditor8').is(":visible")) {
                if (questionH_value == '')
                {
                    alert('Please Enter Option H Description');
                    CKEDITOR.instances['questionH_value'].focus();
                    return false;
                }
            }

            if ($('#ckEditor9').is(":visible")) {
                if (questionI_value == '')
                {
                    alert('Please Enter Option I Description');
                    CKEDITOR.instances['questionI_value'].focus();
                    return false;
                }
            }

            if ($('#ckEditor10').is(":visible")) {
                if (questionJ_value == '')
                {
                    alert('Please Enter Option J Description');
                    CKEDITOR.instances['questionJ_value'].focus();
                    return false;
                }
            }



            if (!$("input[name='A_answer']:checked").val()) {
                alert('Please select A answer!');
                return false;
            }
            if (!$("input[name='B_answer']:checked").val()) {
                alert('Please select B answer!');
                return false;
            }
            if (!$("input[name='C_answer']:checked").val()) {
                alert('Please select C answer!');
                return false;
            }
            if (!$("input[name='D_answer']:checked").val()) {
                alert('Please select D answer!');
                return false;
            }

            if ($('#ckEditor5').is(":visible")) {
                if (!$("input[name='E_answer']:checked").val()) {
                    alert('Please select E answer!');
                    return false;
                }
            }

            if ($('#ckEditor6').is(":visible")) {
                if (!$("input[name='F_answer']:checked").val()) {
                    alert('Please select F answer!');
                    return false;
                }
            }

            if ($('#ckEditor7').is(":visible")) {
                if (!$("input[name='G_answer']:checked").val()) {
                    alert('Please select G answer!');
                    return false;
                }
            }

            if ($('#ckEditor8').is(":visible")) {
                if (!$("input[name='H_answer']:checked").val()) {
                    alert('Please select H answer!');
                    return false;
                }
            }

            if ($('#ckEditor9').is(":visible")) {
                if (!$("input[name='I_answer']:checked").val()) {
                    alert('Please select I answer!');
                    return false;
                }
            }

            if ($('#ckEditor10').is(":visible")) {
                if (!$("input[name='J_answer']:checked").val()) {
                    alert('Please select J answer!');
                    return false;
                }
            }


            var checkboxValArry = [];
            $('.is_right_answer:checked').each(function () {
                checkboxValArry.push($(this).val());
            })
            //alert(checkboxValArry);
            //return false;
            if (jQuery.inArray("Yes", checkboxValArry) == -1) {
                alert("Please select atleast one right answer");
                return false;
            }

            if (question_level == '')
            {
                alert('Please Select Question Level');
                $("#question_level").focus();
                // $('select').second().focus();
                return false;
            }
            if (avg_time_to_solve == '')
            {
                alert('Please Select average time to solve');
                $("#avg_time_to_solve").focus();
                return false;
            }
            if (tagging_id == null)
            {
                alert('Please Select and map Question to  Exam and  Topic');
                $("#tagging_id").focus();
                return false;
            }



        }

        function checkNoInRadio11() {
            alert('checkNoInRadio');

            /////////////////// code for if all values have false \\\\\\\\\\\\\\\\\\\\\\\\\\

            var checkboxValArry = [];
            $('.is_right_answer:checked').each(function () {
                checkboxValArry.push($(this).val());
            })
            alert(checkboxValArry);
            return false;
            if ($.inArray('Yes', checkboxValArry) < -1)
            {
                alert('Select atleast one true option');
                //$(this)..prop('checked', false);
                //$('.is_right_answer:visible').val('No').prop('checked', false);
                return false;
            }
            /////////////////////////////////////////////////////////////////////////////////

            //alert(currValue); 

        }
        function AddMoreButton()
        {
            var numItems = $('.is_right_answer:visible').length;
            //alert(numItems);
            //alert(parseInt($("#hdnAddmore").val()));
            //debugger;
            //if (parseInt($("#hdnAddmore").val()) < 6) {
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
                                <form  method="post" class="validator-form form-horizontal" action="<?php echo base_url('index.php/addquestion/insert'); ?>" onSubmit="return myFunctionName()">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Select Question Type</label>
                                            <div class="col-sm-4">                                                                                    
                                                <select class="form-control" name="question_type" id="question_type">
                                                    <option value="" selected="true">Select question type</option>
                                                    <?php foreach ($questionTypeList as $data) { ?>                                                    
                                                        <option value="<?php echo $data->question_type_master_id; ?>"><?php echo $data->question_type_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div> 



                                        <label for="Question" class="col-sm-2 control-label">Question</label>
                                        <textarea class="ckeditor" id="question" name="question">              
                                        </textarea>


                                        <label for="Option A" class="col-sm-2 control-label">Option A</label>
                                        <input type="hidden" name="option_A" value="A">
                                        <textarea class="ckeditor" id="questionA_value"  name="A_value">              
                                        </textarea>

                                        <div class="form-group ">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Is Right Answer</label>
                                            <div class="col-sm-4">                                                                                    
                                                <input type="radio" class="is_right_answer" name="A_answer" value="Yes">Yes
                                                <input type="radio" class="is_right_answer" name="A_answer" value="No">No
                                            </div>
                                        </div> 

                                        <label for="Option B" class="col-sm-2 control-label">Option B</label>
                                        <input type="hidden" name="option_B" value="B">
                                        <textarea class="ckeditor" id="questionB_value"  name="B_value">              
                                        </textarea>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Is Right Answer</label>
                                            <div class="col-sm-4">                                                                                    
                                                <input type="radio" class="is_right_answer" name="B_answer" value="Yes">Yes
                                                <input type="radio" class="is_right_answer" name="B_answer" value="No">No
                                            </div>
                                        </div>

                                        <label for="Option C" class="col-sm-2 control-label">Option C</label>
                                        <input type="hidden" name="option_C" value="C">
                                        <textarea class="ckeditor" id="questionC_value"  name="C_value">              
                                        </textarea>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Is Right Answer</label>
                                            <div class="col-sm-4">                                                                                    
                                                <input type="radio" class="is_right_answer" name="C_answer" value="Yes">Yes
                                                <input type="radio" class="is_right_answer" name="C_answer" value="No">No
                                            </div>
                                        </div>


                                        <label for="Option D" class="col-sm-2 control-label">Option D</label>
                                        <input type="hidden" name="option_D" value="D">
                                        <textarea class="ckeditor" id="questionD_value"  name="D_value">              
                                        </textarea>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Is Right Answer</label>
                                            <div class="col-sm-4">                                                                                    
                                                <input type="radio" class="is_right_answer" name="D_answer" value="Yes">Yes
                                                <input type="radio" class="is_right_answer" name="D_answer" value="No">No
                                            </div>
                                        </div>

                                        <div id="ckEditor5" class="manualHide">
                                            <label for="Option E" class="col-sm-2 control-label">Option E</label>
                                            <input type="hidden" name="option_E" value="E">
                                            <textarea class="ckeditor" id="questionE_value"  name="E_value">              
                                            </textarea>
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-2 control-label">Is Right Answer</label>
                                                <div class="col-sm-4">                                                                                    
                                                    <input type="radio" class="is_right_answer" name="E_answer" value="Yes">Yes
                                                    <input type="radio" class="is_right_answer" name="E_answer" value="No">No
                                                </div>
                                            </div>

                                        </div>

                                        <div id="ckEditor6" class="manualHide">
                                            <label for="Option F" class="col-sm-2 control-label">Option F</label>
                                            <input type="hidden" name="option_F" value="F">
                                            <textarea class="ckeditor" id="questionF_value"  name="F_value">              
                                            </textarea>
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-2 control-label">Is Right Answer</label>
                                                <div class="col-sm-4">                                                                                    
                                                    <input type="radio" class="is_right_answer" name="F_answer" value="Yes">Yes
                                                    <input type="radio" class="is_right_answer" name="F_answer" value="No">No
                                                </div>
                                            </div>
                                        </div>

                                        <div id="ckEditor7" class="manualHide">
                                            <label for="Option G" class="col-sm-2 control-label">Option G</label>
                                            <input type="hidden" name="option_G" value="G">
                                            <textarea class="ckeditor" id="questionG_value" name="G_value">              
                                            </textarea>
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-2 control-label">Is Right Answer</label>
                                                <div class="col-sm-4">                                                                                    
                                                    <input type="radio" class="is_right_answer" name="G_answer" value="Yes">Yes
                                                    <input type="radio" class="is_right_answer" name="G_answer" value="No">No
                                                </div>
                                            </div>
                                        </div>

                                        <div id="ckEditor8" class="manualHide">
                                            <label for="Option H" class="col-sm-2 control-label">Option H</label>
                                            <input type="hidden" name="option_H" value="H">
                                            <textarea class="ckeditor" id="questionH_value"  name="H_value">              
                                            </textarea>
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-2 control-label">Is Right Answer</label>
                                                <div class="col-sm-4">                                                                                    
                                                    <input type="radio" class="is_right_answer" name="H_answer" value="Yes">Yes
                                                    <input type="radio" class="is_right_answer" name="H_answer" value="No">No
                                                </div>
                                            </div>
                                        </div>

                                        <div id="ckEditor9" class="manualHide">
                                            <label for="Option I" class="col-sm-2 control-label">Option I</label>
                                            <input type="hidden" name="option_I" value="I">
                                            <textarea class="ckeditor" id="questionI_value"  name="I_value">              
                                            </textarea>
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-2 control-label">Is Right Answer</label>
                                                <div class="col-sm-4">                                                                                    
                                                    <input type="radio" class="is_right_answer" name="I_answer" value="Yes">Yes
                                                    <input type="radio" class="is_right_answer" name="I_answer" value="No">No
                                                </div>
                                            </div>
                                        </div>

                                        <div id="ckEditor10" class="manualHide">
                                            <label for="Option J" class="col-sm-2 control-label">Option J</label>
                                            <input type="hidden" name="option_J" value="J">
                                            <textarea class="ckeditor" id="questionJ_value" name="J_value">              
                                            </textarea>
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-2 control-label">Is Right Answer</label>
                                                <div class="col-sm-4">                                                                                    
                                                    <input type="radio" class="is_right_answer" name="J_answer" value="Yes">Yes
                                                    <input type="radio" class="is_right_answer" name="J_answer" value="No">No
                                                </div>
                                            </div>
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
                                            <label for="Question Level" class="col-sm-2 control-label">Question Level</label>
                                            <div class="col-sm-4">                                                                                    
                                                <select class="form-control" name="question_level" id="question_level">
                                                    <?php
                                                    $questionLevel = getQuestionLevelData();
                                                    ?>

                                                    <option value="">Select</option>
                                                    <?php foreach ($questionLevel as $level) { ?>
                                                        <option value="<?php echo $level->id; ?>"><?php echo $level->question_level_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Average time to solve</label>
                                            <div class="col-sm-4">                                                                                    
                                                <select class="form-control" name="avg_time_to_solve" id="avg_time_to_solve">
                                                    <option value="" selected="true">Select</option>
                                                    <option value="1">10 Sec</option>
                                                    <option value="2">20 Sec</option>
                                                    <option value="3">30 Sec</option>
                                                    <option value="3">1 Minute</option>
                                                </select>
                                            </div>
                                        </div>


                                        <script>
                                            $(document).ready(function () {

                                                $.noConflict();
                                                $("#tagging_id").select2();
                                                //                                                $("#checkbox").click(function () {
                                                //                                                    if ($("#checkbox").is(':checked')) {
                                                //                                                        $("#e1 > option").prop("selected", "selected");
                                                //                                                        $("#e1").trigger("change");
                                                //                                                    } else {
                                                //                                                        $("#e1 > option").removeAttr("selected");
                                                //                                                        $("#e1").trigger("change");
                                                //                                                    }
                                                //                                                });
                                                //
                                                //                                                $("#button").click(function () {
                                                //                                                    alert($("#e1").val());
                                                //                                                });
                                            });


                                        </script>


                                        <section id="section-examples" class="attireBlock mod1">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Select Tagging</label>
                                            <div class="inner">
                                                <select multiple  name="tagging_id[]" id="tagging_id" style="width:750px">
<!--                                                <select class="multipleSelect" multiple name="tagging_id[]" id="tagging_id">-->
                                                    <?php
                                                    $get_taggingData = get_taggingData();
                                                    foreach ($get_taggingData as $data) {
                                                        // echo '<pre>';print_r($data);

                                                        $taggingMasterId = $data->tagging_master_id;
                                                        //echo '<br>';
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
                                        </section>
                                        <script>
                                            $('.multipleSelect').fastselect();
                                        </script>

                                        <!--                                        <div class="form-group">
                                                                                    <label for="inputEmail3" class="col-sm-2 control-label">Tagging to subject</label>
                                                                                    <div class="col-sm-4">                                                                                    
                                                                                        <select class="form-control" name="tagging_id[]" id="tagging_id"   multiple="true">
                                        
                                                                                                                                                <option value="" selected="true">Select</option>
                                        <?php
                                        //$get_taggingData = get_taggingData();
                                        //foreach ($get_taggingData as $data) {
                                        // echo '<pre>';print_r($data);
                                        // echo $taggingMasterId = $data->tagging_master_id;
                                        //echo '<br>';
//     echo  $exam_master_id = $data->exam_master_id;echo '<br>';
//     echo $subject_master_id = $data->subject_master_id;echo '<br>';
//     echo $chapter_master_id = $data->chapter_master_id;echo '<br>';
//      echo $topic_master_id = $data->topic_master_id;echo '<br>';
                                        ///$query = $this->db->query("SELECT exam_name FROM tbl_exam_master WHERE id = '" . $data->exam_master_id . "'");
                                        //$examName = $query->row();
                                        //$querySubject = $this->db->query("SELECT subject_name FROM tbl_subject_master WHERE subject_master_id = '" . $data->subject_master_id . "'");
                                        //$subjectName = $querySubject->row();
                                        //$queryChapter = $this->db->query("SELECT chapter_name FROM tbl_chapter_master WHERE chapter_master_id = '" . $data->chapter_master_id . "'");
                                        //$chapterName = $queryChapter->row();
                                        //$queryTopic = $this->db->query("SELECT topic_name FROM tbl_topic_master WHERE topic_master_id = '" . $data->topic_master_id . "'");
                                        //$topicName = $queryTopic->row();
                                        ?>
                                                                                                <option value="<?php //echo $taggingMasterId;       ?>"><?php //echo $examName->exam_name;       ?>-<?php //echo $subjectName->subject_name;       ?>-<?php //echo $chapterName->chapter_name;       ?>-<?php //echo $topicName->topic_name;       ?></option>
                                        <?php //} ?>
                                        
                                                                                        </select>
                                                                                    </div>
                                                                                </div>-->

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

                                                <th>Edit</th>
                                                <th>View</th>
                                                <th>Delete</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($questionData as $data) { ?>
                                                <?php
//                                                $queryQuestionTtype = $this->db->query("SELECT question_type_name FROM tbl_question_type_master WHERE question_type_master_id = '" . $data->question_type . "'");
//                                                $QuestionTypeName = $queryQuestionTtype->row();
//
//                                                //$taggingIds = get_tagging($data->tagging_id);
//                                                //echo '<pre>';
//                                                //print_r($taggingIds);
//                                                $exam_id = $taggingIds->exam_master_id;
//                                                $subject_id = $taggingIds->subject_master_id;
//                                                $chapter_id = $taggingIds->chapter_master_id;
//                                                $topic_id = $taggingIds->topic_master_id;
//
//                                                $queryExam = $this->db->query("SELECT exam_name FROM tbl_exam_master WHERE id = '" . $exam_id . "'");
//                                                $examName = $queryExam->row();
//
//                                                $querySubject = $this->db->query("SELECT subject_name FROM tbl_subject_master WHERE subject_master_id = '" . $subject_id . "'");
//                                                $subjectName = $querySubject->row();
//
//                                                $queryChapter = $this->db->query("SELECT chapter_name FROM tbl_chapter_master WHERE chapter_master_id = '" . $chapter_id . "'");
//                                                $chapterName = $queryChapter->row();
//                                                $queryTopic = $this->db->query("SELECT topic_name FROM tbl_topic_master WHERE topic_master_id = '" . $topic_id . "'");
//                                                $topicName = $queryTopic->row();
//                                                //print_r($data);
//                                                $eName = $examName->exam_name;
//                                                $sName = $subjectName->subject_name;
//                                                $cName = $chapterName->chapter_name;
//                                                $tName = $topicName->topic_name;
//                                                $taggingName = $eName . '-' . $sName . '-' . $cName . '-' . $tName;
                                                ?>
                                                <tr>

                                                    <?php
                                                    $query = $this->db->query("SELECT question_type_name FROM tbl_question_type_master WHERE question_type_master_id = '" . $data->question_type . "'");
                                                    $questionTypeName = $query->row();
                                                    ?>
                                                    <td><?php echo $questionTypeName->question_type_name; ?></td>
                                                    <td><?php echo $data->question_name; ?></td>
                                                    <td><a href="<?php echo base_url('addquestion/edit/'); ?>/<?php echo $data->id; ?>">Edit</a></td>
                                                    <td><a href="<?php echo base_url('addquestion/view/'); ?>/<?php echo $data->id; ?>">View</a></td>
                                                    <td><a href="<?php echo base_url('addquestion/delete/'); ?>/<?php echo $data->id; ?>" onClick="return doconfirm();">Delete</a></td>

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