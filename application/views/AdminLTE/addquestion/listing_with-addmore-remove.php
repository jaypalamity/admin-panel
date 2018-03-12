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
    $(document).ready(function () {
       
        var counter = 5;
        $("#addButton").click(function () {
            if (counter > 10) {
                alert("Only 10 Textarea allowed");
                return false;
            }
            var newTextBoxDiv = $(document.createElement('div'))
                    .attr("id", 'TextBoxDiv' + counter);
            newTextBoxDiv.after().html('http://172.16.5.58:81/CodeIgniter2/ckeditor/ckeditor.js');
            newTextBoxDiv.after().html('<label>Option #' + counter + ' : </label>' +
                    "<textarea class='ckeditor' id='correct_answer1' name='correct_answer1'></textarea>");
            newTextBoxDiv.appendTo("#TextBoxesGroup");
            counter++;
        });
        $("#removeButton").click(function () {
            if (counter == 1) {
                alert("No more textbox to remove");
                return false;
            }
            counter--;
            $("#TextBoxDiv" + counter).remove();
        });
    });
  
  
  function AddMoreButton()
  {
      debugger;
      if(parseInt($("#hdnAddmore").val())<6){
      $("#hdnAddmore").val(parseInt($("#hdnAddmore").val())+parseInt("1"));
      
      if(parseInt($("#hdnAddmore").val()) > 0 && parseInt($("#hdnAddmore").val()) < 7)
      {
          var i;
          for(i=0;i<parseInt($("#hdnAddmore").val());i++)
          {
              $("#ckEditor"+(i+5)).show();
          }
      }
      else
      {
          alert("You cannot add more than 10 options!");
      }
      }
  }
  
  function removeButton()
  {
      debugger;
     // alert($("#hdnAddmore").val());
      
       if(parseInt($("#hdnAddmore").val()) > 0){
       
      $("#hdnAddmore").val(parseInt($("#hdnAddmore").val())-parseInt("1"));
      //if(parseInt($("#hdnAddmore").val()) > 5){
       $("#ckEditor"+(parseInt($("#hdnAddmore").val())+parseInt("5"))).hide();
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

                                        <label for="Option A" class="col-sm-2 control-label">Option 1</label>
                                        <textarea class="ckeditor" id="ckeditor" name="option_1">              
                                        </textarea>

                                        <label for="Option B" class="col-sm-2 control-label">Option 2</label>
                                        <textarea class="ckeditor" id="ckeditor" name="option_2">              
                                        </textarea>

                                        <label for="Option C" class="col-sm-2 control-label">Option 3</label>
                                        <textarea class="ckeditor" id="ckeditor" name="option_3">              
                                        </textarea>

                                        <label for="Option D" class="col-sm-2 control-label">Option 4</label>
                                        <textarea class="ckeditor" id="ckeditor" name="option_4">              
                                        </textarea>
                                        <div id="ckEditor5" class="manualHide">
                                        
                                        
                                         <label for="Option E" class="col-sm-2 control-label">Option 5</label>
                                        <textarea class="ckeditor" id="ckeditor5" name="option_4">              
                                        </textarea></div>
                                           <div id="ckEditor6" class="manualHide">
                                      
                                          <label for="Option D" class="col-sm-2 control-label">Option 6</label>
                                        <textarea class="ckeditor" id="ckeditor6" name="option_4">              
                                        </textarea></div>
                                            <div id="ckEditor7" class="manualHide">
                                       
                                           <label for="Option D" class="col-sm-2 control-label">Option 7</label>
                                        <textarea class="ckeditor" id="ckeditor7" name="option_4">              
                                        </textarea>
                                            </div>
                                            <div id="ckEditor8" class="manualHide">
                                        
                                            <label for="Option D" class="col-sm-2 control-label">Option 8</label>
                                        <textarea class="ckeditor" id="ckeditor8" name="option_4">              
                                        </textarea></div>
                                            <div id="ckEditor9" class="manualHide">
                                       
                                            <label for="Option D" class="col-sm-2 control-label">Option 9</label>
                                        <textarea class="ckeditor" id="ckeditor9" name="option_4">              
                                        </textarea></div>
                                             <div id="ckEditor10" class="manualHide">
    <label for="Option D" class="col-sm-2 control-label">Option 10</label>
                                           <textarea class="ckeditor" id="ckeditor10" name="option_4">              
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
                                        <label for="Correct Answer" class="col-sm-2 control-label">Correct Answer</label>
                                        <textarea class="ckeditor" id="correct_answer" name="correct_answer">              
                                        </textarea>  





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
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">

                                <!-- /.box-header -->

                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->

                            <div class="box">
                                <div class="box-header">
                                </div>			
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Question Type</th>                                                
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
//   $queryParent = $this->db->query("SELECT a.question_type_name,a.question_type_master_id,a.status,
//                  case when a.parent_id = 0 then a.question_type_name else b.question_type_name end as parent
//                   FROM tbl_question_type_master 
//                   a left join tbl_question_type_master b on a.parent_id = b.question_type_master_id");
//                                                    $parent = $queryParent->result();
                                            //echo '<pre>';
                                            // print_r($parent);
                                            ?>
                                            <?php
                                            foreach ($questiontype as $data) {                                              
                                                ?>
                                                <tr>
                                                    <td><?php echo $data->question_type_name; ?></td>
                                                    <td><a href="<?php echo base_url('questiontype/edit/'); ?>/<?php echo $data->question_type_master_id ?>">Edit</a></td>
                                                    <td><a href="<?php echo base_url('questiontype/delete/'); ?>/<?php echo $data->question_type_master_id ?>" onClick="return doconfirm();">Delete</a></td>

                                                </tr>
                                            <?php } ?>
                                            </tfoot>
                                    </table>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </section>
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

            <!-- Control Sidebar -->

            <!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed
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

