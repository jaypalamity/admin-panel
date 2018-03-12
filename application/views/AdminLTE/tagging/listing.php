<!DOCTYPE html>
<html>
    <?php $this->load->view('AdminLTE/element/header'); ?>
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
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <?php $this->load->view('AdminLTE/element/header_navigation'); ?>
            <?php $this->load->view('AdminLTE/element/left'); ?>
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-info">		  
                                <div class="box-header with-border">
                                    <h3 class="box-title">Add Exam Category</h3>
                                </div>
                                <?php if ($this->session->flashdata('msg')) { ?>
                                    <div class="alert alert-success"> <?php echo $this->session->flashdata('msg') ?> </div>

                                <?php } if ($this->session->flashdata('msg-error')) { ?>
                                    <div class="alert alert-danger"> <?php echo $this->session->flashdata('msg-error'); ?> </div>
                                <?php } ?>
                                <form  method="post" class="validator-form form-horizontal" action="<?php echo base_url('tagging/add'); ?>">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exam_category" class="col-sm-2 control-label">Select Exam Category</label>
                                            <div class="col-sm-4">                                                                                    
                                                <select class="form-control" name="exam_category" required>
                                                    <option value="">Select Exam</option>
                                                    <?php foreach ($categorydata as $data) { ?>                                                    
                                                        <option value="<?php echo $data->id; ?>"><?php echo $data->exam_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="subject_name" class="col-sm-2 control-label">Select Subject</label>
                                            <div class="col-sm-4">
                                                <select class="form-control" name="subject_name" required>
                                                    <option value="">Select Subject</option>
                                                    <?php foreach ($subjectdata as $data) { ?> 
                                                        <option value="<?php echo $data->subject_master_id; ?>"><?php echo $data->subject_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="chapter_name" class="col-sm-2 control-label">Select Chapter</label>
                                            <div class="col-sm-4">
                                                <select class="form-control" name="chapter_name" required>
                                                    <option value="">Select Chapter</option>
                                                    <?php foreach ($chapterdata as $data) { ?> 
                                                        <option value="<?php echo $data->chapter_master_id; ?>"><?php echo $data->chapter_name; ?></option>
                                                    <?php } ?> 
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="topic_name" class="col-sm-2 control-label">Select Topic</label>
                                            <div class="col-sm-4">
                                                <select class="form-control" name="topic_name[]" required multiple>
                                                    <option value="">Select Topic</option>
                                                    <?php foreach ($topicdata as $data) {
                                                        ?> 
                                                        <option value="<?php echo $data->topic_master_id; ?>"><?php echo $data->topic_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-footer">              
                                        <button type="submit" class="btn btn-info" style="margin-left: 450px;">Save	</button>
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
                            </div>                       
                            <div class="box">
                                <div class="box-header">
                                </div>
                                <div class="box-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Category</th>
                                                <th>subject</th>
                                                <th>Chapter</th>
                                                <th>Topic</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($taggingdata as $data) { ?>
                                                <?php
                                                $query = $this->db->query("SELECT exam_name FROM tbl_exam_master WHERE id = '" . $data->exam_master_id . "'");
                                                $examName = $query->row();

                                                $querySubject = $this->db->query("SELECT subject_name FROM tbl_subject_master WHERE subject_master_id = '" . $data->subject_master_id . "'");
                                                $subjectName = $querySubject->row();

                                                $queryChapter = $this->db->query("SELECT chapter_name FROM tbl_chapter_master WHERE chapter_master_id = '" . $data->chapter_master_id . "'");
                                                $chapterName = $queryChapter->row();
                                                $queryTopic = $this->db->query("SELECT topic_name FROM tbl_topic_master WHERE topic_master_id = '" . $data->topic_master_id . "'");
                                                $topicName = $queryTopic->row();
                                                ?>
                                                <tr>
                                                    <td><?php echo $examName->exam_name; ?></td>
                                                    <td><?php echo $subjectName->subject_name; ?></td>
                                                    <td><?php echo $chapterName->chapter_name; ?></td>
                                                    <td><?php echo $topicName->topic_name; ?></td>


                                                    <td><a href="<?php echo base_url('tagging/edit/'); ?>/<?php echo $data->tagging_master_id; ?>">Edit</a></td>
                                                    <td><a href="<?php echo base_url('tagging/delete/'); ?>/<?php echo $data->tagging_master_id; ?>" onClick="return doconfirm();">Delete</a></td>

                                                </tr>
<?php } ?>
                                            </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
<?php $this->load->view('AdminLTE/element/footer'); ?>
        </div>
    </body>
</html>