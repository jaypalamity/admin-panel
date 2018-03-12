<!DOCTYPE html>
<html>

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
                                                <select class="form-control" name="exam_category" id="exam_category" required>

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
                                        <textarea class="ckeditor" id="ckeditor" name="option_A">              
                                        </textarea>

                                        <label for="Option B" class="col-sm-2 control-label">Option B</label>
                                        <textarea class="ckeditor" id="ckeditor" name="option_B">              
                                        </textarea>

                                        <label for="Option C" class="col-sm-2 control-label">Option C</label>
                                        <textarea class="ckeditor" id="ckeditor" name="option_C">              
                                        </textarea>

                                        <label for="Option D" class="col-sm-2 control-label">Option D</label>
                                        <textarea class="ckeditor" id="ckeditor" name="option_D">              
                                        </textarea>

                                        
                                        <div id="ckEditor5" class="manualHide">
                                            <label for="Option E" class="col-sm-2 control-label">Option E</label>
                                            <textarea class="ckeditor" id="ckeditor5" name="option_E">              
                                            </textarea>
                                        </div>

                                        <div id="ckEditor6" class="manualHide">
                                            <label for="Option F" class="col-sm-2 control-label">Option F</label>
                                            <textarea class="ckeditor" id="ckeditor6" name="option_F">              
                                            </textarea>
                                        </div>

                                        <div id="ckEditor7" class="manualHide">
                                            <label for="Option G" class="col-sm-2 control-label">Option G</label>
                                            <textarea class="ckeditor" id="ckeditor7" name="option_G">              
                                            </textarea>
                                        </div>

                                        <div id="ckEditor8" class="manualHide">
                                            <label for="Option H" class="col-sm-2 control-label">Option H</label>
                                            <textarea class="ckeditor" id="ckeditor8" name="option_H">              
                                            </textarea>
                                        </div>

                                        <div id="ckEditor9" class="manualHide">
                                            <label for="Option I" class="col-sm-2 control-label">Option I</label>
                                            <textarea class="ckeditor" id="ckeditor9" name="option_I">              
                                            </textarea>
                                        </div>

                                        <div id="ckEditor10" class="manualHide">
                                            <label for="Option J" class="col-sm-2 control-label">Option J</label>
                                            <textarea class="ckeditor" id="ckeditor10" name="option_J">              
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
                                            <label for="inputEmail3" class="col-sm-2 control-label">Question Level</label>
                                            <div class="col-sm-4">                                                                                    
                                                <select class="form-control" name="exam_category" id="exam_category" required="">
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
                                                <select class="form-control" name="exam_category" id="exam_category" required="">
                                                    <option value="" selected="true">Select</option>
                                                    <option value="1">10 Sec</option>
                                                    <option value="2">20 Sec</option>
                                                    <option value="3">30 Sec</option>
                                                    <option value="3">1 Minute</option>
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

                <!-- Main content -->
                
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 2.4.0
                </div>
                <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
                reserved.
            </footer>
            immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->
        <!-- jQuery 3 -->
        <script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- DataTables -->
        <script src="assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <!-- SlimScroll -->
        <script src="assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="assets/bower_components/fastclick/lib/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="assets/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="dist/js/demo.js"></script>
        <!-- page script -->
        <script>
                                                    $(function () {
                                                        $('#example1').DataTable()
                                                        $('#example2').DataTable({
                                                            'paging': true,
                                                            'lengthChange': false,
                                                            'searching': false,
                                                            'ordering': true,
                                                            'info': true,
                                                            'autoWidth': false
                                                        })
                                                    })
        </script>
    </body>
</html>
