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


                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->

                        <!--/.col (left) -->
                        <!-- right column -->
                        <div class="col-md-12">
                            <!-- Horizontal Form -->
                            <div class="box box-info">

                                <div class="box-header with-border">
                                    <h3 class="box-title">Exam Category</h3>
                                </div>
                                <?php if ($this->session->flashdata('msg')) { ?>
                                    <div class="alert alert-success"> <?= $this->session->flashdata('msg') ?> </div>

                                <?php } if ($this->session->flashdata('msg-error')) { ?>
                                    <div class="alert alert-danger"> <?= $this->session->flashdata('msg-error'); ?> </div>
                                <?php } ?>

                                <form  method="post" class="validator-form form-horizontal" action="<?php echo base_url('tagging/update') . '/' . @$tagging->tagging_master_id; ?>">

                                    <div class="box-body">
                                        <div class="form-group">
                                           
                                            <label for="exam_category" class="col-sm-2 control-label">Exam Category</label>
                                            <div class="col-sm-4">                                                                                    
                                                <select class="form-control" name="exam_category">
                                                    <option>Select Exam</option>
                                                    <?php foreach ($categorydata as $data) {  
                                                        //echo $data->id;
                                                        ?>                                                    
                                                        <option value="<?php echo $data->id; ?>" <?php if($data->id == $tagging->exam_master_id){ echo 'selected = true';} ?>><?php echo $data->exam_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="subject_name" class="col-sm-2 control-label">Select Subject</label>
                                            <div class="col-sm-4">
                                                <select class="form-control" name="subject_name">
                                                    <option>Select Subject</option>
                                                    <?php foreach ($subjectdata as $data) { ?> 
                                                        <option value="<?php echo $data->subject_master_id; ?>" <?php if($data->subject_master_id == $tagging->subject_master_id){ echo 'selected = true';} ?> ><?php echo $data->subject_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="chapter_name" class="col-sm-2 control-label">Select Chapter</label>
                                            <div class="col-sm-4">
                                                <select class="form-control" name="chapter_name">
                                                    <option>Select Chapter</option>
                                                    <?php foreach ($chapterdata as $data) { ?> 
                                                        <option value="<?php echo $data->chapter_master_id; ?>" <?php if($data->chapter_master_id == $tagging->chapter_master_id){ echo 'selected = true';} ?>><?php echo $data->chapter_name; ?></option>
                                                    <?php } ?> 
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="topic_name" class="col-sm-2 control-label">Select Topic</label>
                                            <div class="col-sm-4">
                                                <select class="form-control" name="topic_name" >
                                                    <option>Select Topic</option>
                                                    <?php foreach ($topicdata as $data) { ?> 
                                                        <option value="<?php echo $data->topic_master_id; ?>"<?php if($data->topic_master_id == $tagging->topic_master_id){ echo 'selected = true';} ?>><?php echo $data->topic_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>			  
                                    <!-- /.box-body -->
                                    <div class="box-footer">              
                                        <a href="<?php echo base_url('index.php/tagging'); ?>" class="btn btn-info pull-right">Back to Listing</a>
                                        <button type="submit" class="btn btn-info pull-right">Save	</button>
                                    </div>
                                    <!-- /.box-footer -->
                                </form>
                            </div>
                            <!-- /.box -->
                            <!-- general form elements disabled -->
                            <div class="box box-warning">

                                <!-- /.box-header -->

                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!--/.col (right) -->
                    </div>
                    <!-- /.row -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <?php $this->load->view('AdminLTE/element/footer'); ?>
            <!-- Control Sidebar -->
            
            <!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->

        <!-- jQuery 3 -->

    </body>
</html>
