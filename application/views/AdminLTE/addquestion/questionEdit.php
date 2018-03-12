<!DOCTYPE html>
<html>
    <script>
        //AddMoreButton();
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
    </style>
    <script>
        $(document).ready(function () {
            //$("#removeButton1").hide();
            //removeButton();
            var numItems = $('.is_right_answer:visible').length;
//            if (numItems == '8') {
//                $("#removeButton1").hide();
//            }

            $(".is_right_answer").change(function () {
//var numItems = $('.is_right_answer:visible').length;
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
                $('.is_right_answer:visible').prop('checked', false);
                $("#questionType").focus();
                return false;
            }

            if (question == '')
            {
                alert('Please Enter Question Description');
                $("#question").focus();
                return false;
            }
            if (questionA_value == '')
            {
                alert('Please Enter Option A Description');
                $("#questionA_value").focus();
                return false;
            }
            if (questionB_value == '')
            {
                alert('Please Enter Option B Description');
                $("#questionB_value").focus();
                return false;
            }
            if (questionC_value == '')
            {
                alert('Please Enter Option C Description');
                $("#questionC_value").focus();
                return false;
            }
            if (questionD_value == '')
            {
                alert('Please Enter Option D Description');
                $("#questionD_value").focus();
                return false;
            }

            if ($('#ckEditor5').is(":visible")) {//               
                if (questionE_value == '')
                {
                    alert('Please Enter Option E Description');
                    $("#questionE_value").focus();
                    return false;
                }
            }

            if ($('#ckEditor6').is(":visible")) {//  

                if (questionF_value == '')
                {
                    alert('Please Enter Option F Description');
                    $("#questionF_value").focus();
                    return false;
                }
            }


            if ($('#ckEditor7').is(":visible")) {//               
                if (questionG_value == '')
                {
                    alert('Please Enter Option G Description');
                    $("#questionG_value").focus();
                    return false;
                }
            }

            if ($('#ckEditor8').is(":visible")) {
                if (questionH_value == '')
                {
                    alert('Please Enter Option H Description');
                    $("#questionH_value").focus();
                    return false;
                }
            }

            if ($('#ckEditor9').is(":visible")) {
                if (questionI_value == '')
                {
                    alert('Please Enter Option I Description');
                    $("#questionI_value").focus();
                    return false;
                }
            }

            if ($('#ckEditor10').is(":visible")) {
                if (questionJ_value == '')
                {
                    alert('Please Enter Option J Description');
                    $("#questionJ_value").focus();
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


        function AddMoreButton()
        {
            //myFunctionName();
            var numItems = $('.is_right_answer:visible').length;
            if (parseInt($("#hdnAddmore").val()) < 6) {
                $("#hdnAddmore").val(parseInt($("#hdnAddmore").val()) + parseInt("1"));
                if (parseInt($("#hdnAddmore").val()) > 0 && parseInt($("#hdnAddmore").val()) < 7)
                {
                    var i;
                    for (i = 0; i < parseInt($("#hdnAddmore").val()); i++)
                    {
                        $("#ckEditor" + (i + 5)).show();
                        var numItems = $('.is_right_answer:visible').length;
//            alert(numItems);
//            if(numItems=='10' || numItems=='12' || numItems=='14' || numItems=='16' || numItems=='18' || numItems=='20'){
//                myFunctionName(); 
//            }
                        //$("#removeButton1").show();
                        //myFunctionName(); 
                    }
                }
            } else
            {
                alert("You cannot add more than 10 options!");
            }
        }

        function removeButton()
        {
            alert('ji');
            //jay();
            // debugger;
            var value = $("#hdnAddmore").val();
            alert(value);
            if (value == '1') {
                alert('1');
                $('#option_E').val('');
                $('input[name="E_answer"]').attr('checked', false);
            }


            if (value == '2') {
                alert('2');
                $('#option_F').val('');
                $('input[name="F_answer"]').attr('checked', false);
            }
            if (value == '3') {
                alert('3');
                $('#option_G').val('');
                $('input[name="G_answer"]').attr('checked', false);
            }
            if (value == '4') {
                alert('4');
                $('#option_H').val('');
                $('input[name="H_answer"]').attr('checked', false);
            }
            if (value == '5') {
                alert('5');
                $('#option_I').val('');
                $('input[name="I_answer"]').attr('checked', false);
            }
            if (value == '6') {
                alert('5');
                $('#option_J').val('');
                $('input[name="J_answer"]').attr('checked', false);
            }



            if (parseInt($("#hdnAddmore").val()) > 0) {
                $("#hdnAddmore").val(parseInt($("#hdnAddmore").val()) - parseInt("1"));
                //if(parseInt($("#hdnAddmore").val()) > 5){
                $("#ckEditor" + (parseInt($("#hdnAddmore").val()) + parseInt("5"))).hide();
                //alert(("#hdnAddmore").val());


            }
            alert(("#hdnAddmore").val());
        }
    </script>
    <script>
        $(document).ready(function () {
            //alert('ji');
            //myFunctionName();
            var numItems = $('.is_right_answer:visible').length;
            //alert(numItems);
            if (numItems == '10') {
                $('#hdnAddmore').val('1');
            }
            if (numItems == '12') {
                $('#hdnAddmore').val('2');
            }
            if (numItems == '14') {
                $('#hdnAddmore').val('3');
            }
            if (numItems == '16') {
                $('#hdnAddmore').val('4');
            }
            if (numItems == '18') {
                $('#hdnAddmore').val('5');
            }
            if (numItems == '20') {
                $('#hdnAddmore').val('6');
            }
            //});
            //$(window).on("load", function () {
            // myFunctionName();
            ///    //alert('ji');
        });
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
                                <form  method="post" class="validator-form form-horizontal" action="<?php echo base_url('index.php/addquestion/update') . '/' . @$questionDetailRow->id; ?>" onSubmit="return myFunctionName()">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Select Question Type</label>
                                            <div class="col-sm-4">                                                                                    
                                                <select class="form-control" name="question_type" id="question_type">

                                                    <option value="" selected="true">Select question type</option>


                                                    <?php foreach ($questionTypeList as $data) { ?>                                                    
                                                        <option value="<?php echo @$data->question_type_master_id; ?>" <?php
                                                        if (@$questionDetailRow->question_type == @$data->question_type_master_id) {
                                                            echo 'selected';
                                                        }
                                                        ?>><?php echo @$data->question_type_name; ?></option>
                                                            <?php } ?>
                                                </select>
                                            </div>
                                        </div> 
                                        <label for="Question" class="col-sm-2 control-label">Question</label>
                                        <textarea class="ckeditor" id="question" name="question">
                                            <?php echo @$questionDetailRow->question_name; ?>        
                                        </textarea>

                                        <?php
                                        // echo '<pre>';
                                        //print_r($questionOptionRow);
                                        ?>

                                        <label for="Option A" class="col-sm-2 control-label">Option A</label>
                                        <input type="hidden" name="option_A" value="<?php echo @$questionOptionRow[0]->option_name; ?>">
                                        <textarea class="ckeditor" id="questionA_value"  name="A_value">
                                            <?php echo @$questionOptionRow[0]->option_value; ?>
                                        </textarea>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Is Right Answer</label>
                                            <div class="col-sm-4">                                                                                    
                                                <input type="radio"  class="is_right_answer" name="A_answer" <?php
                                                if (@$questionOptionRow[0]->is_right_answer == 'Yes') {
                                                    echo 'checked';
                                                }
                                                ?>  value="Yes">Yes
                                                <input type="radio" class="is_right_answer" name="A_answer" <?php
                                                if (@$questionOptionRow[0]->is_right_answer == 'No') {
                                                    echo 'checked';
                                                }
                                                ?> value="No">No
                                            </div>
                                        </div> 


                                        <label for="Option B" class="col-sm-2 control-label">Option B</label>
                                        <input type="hidden" name="option_B" value="B">
                                        <textarea class="ckeditor" id="questionB_value"  name="B_value"> 
                                            <?php echo @$questionOptionRow[1]->option_value; ?>             
                                        </textarea>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Is Right Answer</label>
                                            <div class="col-sm-4">                                                                                    
                                                <input type="radio" class="is_right_answer" name="B_answer" <?php
                                                if (@$questionOptionRow[1]->is_right_answer == 'Yes') {
                                                    echo 'checked';
                                                }
                                                ?> value="Yes">Yes
                                                <input type="radio" class="is_right_answer" name="B_answer" <?php
                                                if (@$questionOptionRow[1]->is_right_answer == 'No') {
                                                    echo 'checked';
                                                }
                                                ?> value="No">No
                                            </div>
                                        </div>



                                        <label for="Option C" class="col-sm-2 control-label">Option C</label>
                                        <input type="hidden" name="option_C" value="C">
                                        <textarea class="ckeditor" id="questionC_value"  name="C_value"> 
                                            <?php echo @$questionOptionRow[2]->option_value; ?>             
                                        </textarea>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Is Right Answer</label>
                                            <div class="col-sm-4">                                                                                    
                                                <input type="radio" class="is_right_answer" name="C_answer" <?php
                                                if (@$questionOptionRow[2]->is_right_answer == 'Yes') {
                                                    echo 'checked';
                                                }
                                                ?> value="Yes">Yes
                                                <input type="radio" class="is_right_answer" name="C_answer" <?php
                                                if (@$questionOptionRow[2]->is_right_answer == 'No') {
                                                    echo 'checked';
                                                }
                                                ?> value="No">No
                                            </div>
                                        </div>


                                        <label for="Option D" class="col-sm-2 control-label">Option D</label>
                                        <input type="hidden" name="option_D" value="D">
                                        <textarea class="ckeditor" id="questionD_value"  name="D_value">
                                            <?php echo @$questionOptionRow[3]->option_value; ?>              
                                        </textarea>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Is Right Answer</label>
                                            <div class="col-sm-4">                                                                                    
                                                <input type="radio" class="is_right_answer" name="D_answer" <?php
                                                if (@$questionOptionRow[3]->is_right_answer == 'Yes') {
                                                    echo 'checked';
                                                }
                                                ?> value="Yes">Yes
                                                <input type="radio" class="is_right_answer" name="D_answer" <?php
                                                if (@$questionOptionRow[3]->is_right_answer == 'No') {
                                                    echo 'checked';
                                                }
                                                ?> value="No">No
                                            </div>
                                        </div>
                                        <div id="ckEditor5" <?php
                                        if (empty(@$questionOptionRow[4]->option_value)) {
                                            echo 'class="manualHide"';
                                        }
                                        ?> >
                                            <label for="Option E" class="col-sm-2 control-label">Option E</label>
                                            <input type="hidden" name="option_E" value="E">
                                            <textarea class="ckeditor" id="questionE_value"  name="E_value"> 
                                                <?php
                                                if (@$questionOptionRow[4]->option_value) {
                                                    echo @$questionOptionRow[4]->option_value;
                                                }
                                                ?>             
                                            </textarea>
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-2 control-label">Is Right Answer</label>
                                                <div class="col-sm-4">                                                                                    
                                                    <input type="radio" class="is_right_answer" name="E_answer" <?php
                                                    if (@$questionOptionRow[4]->is_right_answer == 'Yes') {
                                                        echo 'checked';
                                                    }
                                                    ?> value="Yes">Yes
                                                    <input type="radio" class="is_right_answer" name="E_answer" <?php
                                                    if (@$questionOptionRow[4]->is_right_answer == 'No') {
                                                        echo 'checked';
                                                    }
                                                    ?> value="No">No
                                                </div>
                                            </div>
                                        </div>
                                        <div id="ckEditor6" <?php
                                        if (empty(@$questionOptionRow[5]->option_value)) {
                                            echo 'class="manualHide"';
                                        }
                                        ?> >
                                            <label for="Option F" class="col-sm-2 control-label">Option F</label>
                                            <input type="text" name="option_F" id="option_F" class="optionFelement" value="F">
                                            <textarea class="ckeditor" class="optionFelement"  id="questionF_value"  name="F_value">
                                                <?php
                                                if (@$questionOptionRow[5]->option_value) {
                                                    echo @$questionOptionRow[5]->option_value;
                                                }
                                                ?>                
                                            </textarea>
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-2 control-label">Is Right Answer</label>
                                                <div class="col-sm-4">                                                                                    
                                                    <input type="radio" class="is_right_answer optionFelement" name="F_answer" <?php
                                                    if (@$questionOptionRow[5]->is_right_answer == 'Yes') {
                                                        echo 'checked';
                                                    }
                                                    ?> value="Yes">Yes
                                                    <input type="radio" class="is_right_answer optionFelement" name="F_answer" <?php
                                                    if (@$questionOptionRow[5]->is_right_answer == 'No') {
                                                        echo 'checked';
                                                    }
                                                    ?> value="No">No
                                                </div>
                                            </div>
                                        </div>

                                        <div id="ckEditor7" <?php
                                        if (empty(@$questionOptionRow[6]->option_value)) {
                                            echo 'class="manualHide"';
                                        }
                                        ?> >
                                            <label for="Option G" class="col-sm-2 control-label">Option G</label>
                                            <input type="hidden" name="option_G" value="G">
                                            <textarea class="ckeditor" id="questionG_value" name="G_value">
                                                <?php
                                                if (@$questionOptionRow[6]->option_value) {
                                                    echo @$questionOptionRow[6]->option_value;
                                                }
                                                ?>              
                                            </textarea>
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-2 control-label">Is Right Answer</label>
                                                <div class="col-sm-4">                                                                                    
                                                    <input type="radio" class="is_right_answer" name="G_answer" <?php
                                                    if (@$questionOptionRow[6]->is_right_answer == 'Yes') {
                                                        echo 'checked';
                                                    }
                                                    ?> value="Yes">Yes
                                                    <input type="radio" class="is_right_answer" name="G_answer" <?php
                                                    if (@$questionOptionRow[6]->is_right_answer == 'No') {
                                                        echo 'checked';
                                                    }
                                                    ?>  value="No">No
                                                </div>
                                            </div>
                                        </div>

                                        <div id="ckEditor8" <?php
                                        if (empty(@$questionOptionRow[7]->option_value)) {
                                            echo 'class="manualHide"';
                                        }
                                        ?> >
                                            <label for="Option H" class="col-sm-2 control-label">Option H</label>
                                            <input type="hidden" name="option_H" value="H">
                                            <textarea class="ckeditor" id="questionH_value"  name="H_value">
                                                <?php
                                                if (@$questionOptionRow[7]->option_value) {
                                                    echo @$questionOptionRow[7]->option_value;
                                                }
                                                ?>              
                                            </textarea>
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-2 control-label">Is Right Answer</label>
                                                <div class="col-sm-4">                                                                                    
                                                    <input type="radio" class="is_right_answer" name="H_answer" <?php
                                                    if (@$questionOptionRow[7]->is_right_answer == 'Yes') {
                                                        echo 'checked';
                                                    }
                                                    ?>  value="Yes">Yes
                                                    <input type="radio" class="is_right_answer" name="H_answer" <?php
                                                    if (@$questionOptionRow[7]->is_right_answer == 'No') {
                                                        echo 'checked';
                                                    }
                                                    ?> value="No">No
                                                </div>
                                            </div>
                                        </div>

                                        <div id="ckEditor9" <?php
                                        if (empty(@$questionOptionRow[8]->option_value)) {
                                            echo 'class="manualHide"';
                                        }
                                        ?> >
                                            <label for="Option I" class="col-sm-2 control-label">Option I</label>
                                            <input type="hidden" name="option_I" value="I">
                                            <textarea class="ckeditor" id="questionI_value"  name="I_value"> 
                                                <?php
                                                if (@$questionOptionRow[8]->option_value) {
                                                    echo @$questionOptionRow[8]->option_value;
                                                }
                                                ?>             
                                            </textarea>
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-2 control-label">Is Right Answer</label>
                                                <div class="col-sm-4">                                                                                    
                                                    <input type="radio" class="is_right_answer" name="I_answer" <?php
                                                    if (@$questionOptionRow[8]->is_right_answer == 'Yes') {
                                                        echo 'checked';
                                                    }
                                                    ?> value="Yes">Yes
                                                    <input type="radio" class="is_right_answer" name="I_answer" <?php
                                                    if (@$questionOptionRow[8]->is_right_answer == 'No') {
                                                        echo 'checked';
                                                    }
                                                    ?> value="No">No
                                                </div>
                                            </div>
                                        </div>

                                        <div id="ckEditor10" <?php
                                        if (empty(@$questionOptionRow[9]->option_value)) {
                                            echo 'class="manualHide"';
                                        }
                                        ?> >
                                            <label for="Option J" class="col-sm-2 control-label">Option J</label>
                                            <input type="hidden" name="option_J" value="J">
                                            <textarea class="ckeditor" id="questionJ_value" name="J_value">
                                                <?php
                                                if (@$questionOptionRow[9]->option_value) {
                                                    echo @$questionOptionRow[9]->option_value;
                                                }
                                                ?>              
                                            </textarea>
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-2 control-label">Is Right Answer</label>
                                                <div class="col-sm-4">                                                                                    
                                                    <input type="radio" class="is_right_answer" name="J_answer" <?php
                                                    if (@$questionOptionRow[9]->is_right_answer == 'Yes') {
                                                        echo 'checked';
                                                    }
                                                    ?> value="Yes">Yes
                                                    <input type="radio" class="is_right_answer" name="J_answer" <?php
                                                    if (@$questionOptionRow[9]->is_right_answer == 'No') {
                                                        echo 'checked';
                                                    }
                                                    ?> value="No">No
                                                </div>
                                            </div>
                                        </div>

                                        <div id="TextBoxesGroup"> 
                                            <div id="TextBoxDiv1">
                                            </div>
                                        </div>

                                        <div style="text-align: right;">
                                            <input type="button" onclick="AddMoreButton();" value="Add More Option" id="addButton1">
                                            <?php //if ($questionOptionRow[4]->option_name) {                                                    
                                            ?>
                                            <input type="button" onclick="removeButton();" value="Remove Button" id="removeButton1">                                            
                                            <?php //} ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="Question Level" class="col-sm-2 control-label">Question Level</label>
                                            <div class="col-sm-4">                                                                                    
                                                <select class="form-control" name="question_level" id="question_level">
                                                    <option value="" selected="true">Select</option>
                                                    <option value="1" <?php
                                                    if (@$questionDetailRow->question_level == '1') {
                                                        echo 'selected';
                                                    }
                                                    ?>>Easy</option>
                                                    <option value="2" <?php
                                                    if (@$questionDetailRow->question_level == '2') {
                                                        echo 'selected';
                                                    }
                                                    ?>>Difficult</option>
                                                    <option value="3" <?php
                                                    if (@$questionDetailRow->question_level == '3') {
                                                        echo 'selected';
                                                    }
                                                    ?>>Average</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Average time to solve</label>
                                            <div class="col-sm-4">                                                                                    
                                                <select class="form-control" name="avg_time_to_solve" id="avg_time_to_solve">
                                                    <option value="" selected="true">Select</option>
                                                    <option value="1" <?php
                                                    if (@$questionDetailRow->avg_time_to_solve == '1') {
                                                        echo 'selected';
                                                    }
                                                    ?>>10 Sec</option>
                                                    <option value="2" <?php
                                                    if (@$questionDetailRow->avg_time_to_solve == '2') {
                                                        echo 'selected';
                                                    }
                                                    ?>>20 Sec</option>
                                                    <option value="3" <?php
                                                    if (@$questionDetailRow->avg_time_to_solve == '3') {
                                                        echo 'selected';
                                                    }
                                                    ?>>30 Sec</option>
                                                    <option value="4" <?php
                                                    if (@$questionDetailRow->avg_time_to_solve == '4') {
                                                        echo 'selected';
                                                    }
                                                    ?>>1 Minute</option>
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
                                        <?php
                                        $queryTagingEditValues = $this->db->query("SELECT * FROM question_tagging_master WHERE question_id = '" . $this->uri->segment(3) . "'");
                                        $queryTagingEditValueId = $queryTagingEditValues->result();
                                        ?>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Tagging to subject</label>
                                            <div class="col-sm-4">                                                                                    
                                                <select class="form-control multipleSelect" name="tagging_id[]" id="tagging_id" multiple="true" style="width:750px">


                                                    <!--                                                    <option value="" selected="true">Select</option>-->
                                                    <?php
                                                    $get_taggingData = get_taggingData();

                                                    foreach ($get_taggingData as $data) {
                                                        // echo '<pre>';print_r($data);

                                                        $taggingMasterId = $data->tagging_master_id;
                                                        //echo '<br>';
                                                        $exam_master_id = $data->exam_master_id;
                                                        //echo '<br>';
                                                        $subject_master_id = $data->subject_master_id;
                                                        // echo '<br>';
                                                        $chapter_master_id = $data->chapter_master_id;
                                                        //echo '<br>';
                                                        $topic_master_id = $data->topic_master_id;
                                                        //echo '<br>';

                                                        $query = $this->db->query("SELECT exam_name FROM tbl_exam_master WHERE id = '" . $data->exam_master_id . "'");
                                                        $examName = $query->row();

                                                        $querySubject = $this->db->query("SELECT subject_name FROM tbl_subject_master WHERE subject_master_id = '" . $data->subject_master_id . "'");
                                                        $subjectName = $querySubject->row();

                                                        $queryChapter = $this->db->query("SELECT chapter_name FROM tbl_chapter_master WHERE chapter_master_id = '" . $data->chapter_master_id . "'");
                                                        $chapterName = $queryChapter->row();
                                                        $queryTopic = $this->db->query("SELECT topic_name FROM tbl_topic_master WHERE topic_master_id = '" . $data->topic_master_id . "'");
                                                        $topicName = $queryTopic->row();
                                                        ?>


                                                        <?php
                                                        foreach ($queryTagingEditValueId as $id) {
                                                            $tagid = $id->tagging_id;
                                                            ?>
                                                            <option value="<?php echo $taggingMasterId; ?>" <?php
                                                            if ($taggingMasterId == $tagid) {
                                                                echo 'selected';
                                                            }
                                                        }
                                                        ?>><?php echo @$examName->exam_name; ?>-<?php echo $subjectName->subject_name; ?>-<?php echo $chapterName->chapter_name; ?>-<?php echo $topicName->topic_name; ?></option>
<?php } ?>                                                           

                                                </select>
                                            </div>
                                            <script>
                                                $('.multipleSelect').fastselect();
                                            </script>

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
    $('.fstSelected').on('click', function () {
        alert('fstSelected');


    })
</script>