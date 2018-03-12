<!DOCTYPE html>
<html>
<?php $this->load->view('AdminLTE/element/header'); ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php $this->load->view('AdminLTE/element/header_navigation'); ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php $this->load->view('AdminLTE/element/left'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <script>
        $(document).ready(function () {
            $("input[name$='is_parentRadio']").click(function () {
                var test = $(this).val();
                if (test == 'NO') {
                    $("#QuestionType").show();
                } else {
                    $("#QuestionType").hide();
                }
            });
        });

        function check() {
            var question_type_name = $("#question_type_name").val();
            var is_parentSelect = $("#is_parentSelect").val();
            var is_parentRadio = $("input[name='is_parentRadio']:checked").val();

            if (question_type_name == '') {
                alert('Please enter question type');
                return false;
            }
            if (is_parentRadio == 'NO') {
                if (is_parentSelect == '') {
                    alert('Please Select Question Parent');
                    return false;
                }

            }
        }
        function doconfirm()
        {

            job = confirm("Are you sure to delete permanently?");
            if (job != true)
            {
                return false;
            }
        }
    </script>

    <!-- Main content -->
    <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-info">		  
                                <div class="box-header with-border">
                                    <h3 class="box-title">Add Question Type</h3>
                                </div>
                                <?php if ($this->session->flashdata('msg')) { ?>
                                    <div class="alert alert-success"> <?= $this->session->flashdata('msg') ?> </div>

                                <?php } if ($this->session->flashdata('msg-error')) { ?>
                                    <div class="alert alert-danger"> <?= $this->session->flashdata('msg-error'); ?> </div>
                                <?php } ?>
                                <form  method="post" class="validator-form form-horizontal" action="<?php echo base_url('index.php/questiontype/update').'/'.@$questionTypeRow->question_type_master_id; ?>" onsubmit="return check();">
                                    <div class="box-body">
                                        <div class="form-group">
                                            
                                            <?php //echo '<pre>'; print_r($questionTypeRow); ?>
                                            <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="question_type_name" required class="form-control" id="question_type_name" value="<?php echo @$questionTypeRow->question_type_name; ?>" placeholder="Question Type Name">
                                            </div>
                                        </div> 

                                        <div class="form-group">
                                            <label for="is_parent" class="col-sm-2 control-label">Is Parent</label>
                                            <div class="col-sm-10">
                                                <input type="radio" name="is_parentRadio" <?php if(@$questionTypeRow->parent_id==0){ echo 'checked';} ?>   id="is_parent_yes" value="YES">
                                                <input type="radio" name="is_parentRadio" <?php if(@$questionTypeRow->parent_id!=0){ echo 'checked';} ?>  id="is_parent_no" value="NO">
                                            </div>
                                        </div>
                                        <?php if($questiontype){ ?>
                                        <div class="form-group" id="QuestionType" <?php if($questionTypeRow->parent_id==0){ echo 'style="display: none;"';} ?>>
                                            <label for="Question Type" class="col-sm-2 control-label">Select Question Type</label>
                                            
                                            <div class="col-sm-4">
                                                
                                                <select class="form-control" name="is_parentSelect" id="is_parentSelect">
                                                    <option value="" selected="true">Question Type</option>
                                                    <?php foreach ($questiontype as $data) { ?> 
                                                        <option value="<?php echo $data->question_type_master_id; ?>"><?php echo $data->question_type_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <?php } ?>
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
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php $this->load->view('AdminLTE/element/footer'); ?>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->

</body>
</html>
