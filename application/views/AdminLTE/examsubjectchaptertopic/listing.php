<!DOCTYPE html>
<html>
    <?php $this->load->view('AdminLTE/element/header'); ?>

    <script>
        function doconfirm()
        {
            job = confirm("Are you sure to update Subject order ?");
            if (job != true)
            {
                return false;
            }
        }

        $(document).ready(function () {
            //////////// populating Exam subject on page load /////////////
            $.ajax({
                url: '<?php echo base_url('examsubjectchaptertopic/getData'); ?>',
                dataType: 'html',
                type: 'POST',
                // This is query string i.e. country_id=123
                data: {
                    exam_category_id: $('#exam_category').val(),
                    exam_subject_id: $('#exam_subject').val(),
                    exam_subject_topic_id: $('#exam_subject_chapter').val()

                },
                success: function (data) {
                    $("#result").html(data);
                    $("#subjectlevelupdate").show();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
            //////////// populating Exam subject on page load /////////////
            $('.examsubjectchaptertopic').change(function () {
                $.ajax({
                    url: '<?php echo base_url('examsubjectchaptertopic/getData'); ?>',
                    dataType: 'html',
                    type: 'POST',
                    data: {
                        exam_category_id: $('#exam_category').val(),
                        exam_subject_id: $('#exam_subject').val(),
                        exam_subject_topic_id: $('#exam_subject_chapter').val()

                    },
                    success: function (data) {
                        $("#result").html(data);
                        $("#subjectlevelupdate").show();

                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                    }
                });
            });
        });

    </script>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <?php $this->load->view('AdminLTE/element/header_navigation'); ?>          
            <?php $this->load->view('AdminLTE/element/left'); ?>
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <div class="form-group">
                                    <?php if ($this->session->flashdata('msg')) { ?>
                                        <div class="alert alert-success"> <?php echo $this->session->flashdata('msg') ?> </div>

                                    <?php } if ($this->session->flashdata('msg-error')) { ?>
                                        <div class="alert alert-danger"> <?php echo $this->session->flashdata('msg-error'); ?> </div>
                                    <?php } ?>
                                  
<label for="exam_category" class="col-sm-1 control-label">Category</label>
                                    <div class="col-sm-2"> 
                                          
                                        <select class="form-control examsubjectchaptertopic" name="exam_category" id="exam_category" required>

                                            <?php foreach ($categorydata as $data) { ?>                                                    
                                                <option value="<?php echo $data->id; ?>"><?php echo $data->exam_name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>


                                    <label for="exam_category" class="col-sm-1 control-label">Subject</label>

                                    <div class="col-sm-2"> 
                                        
                                        <select class="form-control examsubjectchaptertopic" name="exam_subject_chapter" id="exam_subject" required>

                                            <?php foreach ($examsubject as $data) { ?>                                                    
                                                <option value="<?php echo $data->subject_master_id; ?>"><?php echo $data->subject_name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    
                                    
                                   
 <label for="chapter" class="col-sm-1 control-label ">Chapter</label>
                                    <div class="col-sm-2">
                                        
                                        <select class="form-control examsubjectchaptertopic" name="exam_subject_chapter" id="exam_subject_chapter" required>

                                            <?php foreach ($examsubjectchapter as $data) { ?>                                                    
                                                <option value="<?php echo $data->chapter_master_id; ?>"><?php echo $data->chapter_name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    


                                </div>
                                <!--                                <h3 class="box-title">Responsive Hover Table</h3>-->

                                <!--                                <div class="box-tools">
                                                                    <div class="input-group input-group-sm" style="width: 150px;">
                                                                        <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
                                                                        <div class="input-group-btn">
                                                                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                                                        </div>
                                                                    </div>
                                                                </div>-->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive no-padding">
                                <form name="exam_subject_level_update" method="post" action="<?php echo base_url('examsubjectchaptertopic/topiclevelupdate'); ?>" onsubmit="return doconfirm();">
                                    <div id="result"> 

                                    </div>
                                    <div class="input-group-btn" id="subjectlevelupdate" style="display:none; text-align: center; margin-bottom: 10px;    width: 100%;
    float: left;">
                                        <input id="subjectPost" type="submit" style="display:none;" name="subjectlevelupdate"  class="btn btn-info pull-right">
                                        <input id="subjectOrderCheck" onclick="return checkValid();" type="button" value="Submit" class="btn btn-info">
                                    </div> 
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view('AdminLTE/element/footer'); ?>
            <div class="control-sidebar-bg"></div>
        </div>     
    </body>
    <script>
        function checkValid()
        {
           
            debugger;
            var length = $(".exam_subject_chapter_topic_order").length;
            var check = false;
            for (i = 1; i <= length; i++)
            {
                if ($("#" + i).val() > length)
                {
                    alert("Value is greater than length.");
                    check = false;
                    break;
                } else
                {
                    check = true;
                }

                for (j = 1; j <= length; j++)
                {
                    if (j != i) {
                        if ($("#" + j).val() == $("#" + i).val())
                        {
                            alert("Order value already exists!");
                            if (i > j) {
                                $("#" + j).val("");
                            } else
                            {

                                $("#" + i).val("");
                            }
                            check = false;
                            break;
                        } else {
                            check = true;
                        }
                    }
                }
            }
            if (check == true)
            {
                $("#subjectPost").click();
            }

        }
    </script>
</html>