<!DOCTYPE html>
<html>
    <?php $this->load->view('AdminLTE/element/header'); ?>
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
                                    <h3 class="box-title">Add Question Type</h3>
                                </div>
                                <?php if ($this->session->flashdata('msg')) { ?>
                                    <div class="alert alert-success"> <?= $this->session->flashdata('msg') ?> </div>

                                <?php } if ($this->session->flashdata('msg-error')) { ?>
                                    <div class="alert alert-danger"> <?= $this->session->flashdata('msg-error'); ?> </div>
                                <?php } ?>
                                <form  method="post" class="validator-form form-horizontal" action="<?php echo base_url('index.php/questiontype/insert'); ?>" onsubmit="return check();">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="question_type_name" required class="form-control" id="question_type_name" value="" placeholder="Enter Question Type">
                                            </div>
                                        </div> 

<!--                                        <div class="form-group">
                                            <label for="is_parent" class="col-sm-2 control-label">Is Parent</label>
                                            <div class="col-sm-10">
                                                <input type="radio" name="is_parentRadio" checked="checked" id="is_parent_yes" value="YES"> Yes
                                                <?php //if($questiontype){ ?>
                                                <input type="radio" name="is_parentRadio"  id="is_parent_no" value="NO"> No
                                                <?php //} ?>
                                            </div>
                                        </div>-->
                                        <?php //if($questiontype){ ?>
<!--                                        <div class="form-group" id="QuestionType" style="display: none;">
                                            <label for="Question Type" class="col-sm-2 control-label">Question Type parent</label>
                                            <div class="col-sm-4">
                                                <select class="form-control" name="is_parentSelect" id="is_parentSelect">
                                                    <option value="" selected="true">Question Type</option>
                                                    <?php ///foreach ($questiontype as $data) { ?> 
                                                        <option value="<?php //echo $data->question_type_master_id; ?>"><?php //echo $data->question_type_name; ?></option>
                                                    <?php //} ?>
                                                </select>
                                            </div>
                                        </div>-->
                                        
                                        <?php //} ?>
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
                                            <?php foreach ($questiontype as $data) {
                                              //echo '<pre>';  print_r($data);
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
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Create the tabs -->
                <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                    <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
                    <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Home tab content -->
                    <div class="tab-pane" id="control-sidebar-home-tab">
                        <h3 class="control-sidebar-heading">Recent Activity</h3>
                        <ul class="control-sidebar-menu">
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                        <p>Will be 23 on April 24th</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon fa fa-user bg-yellow"></i>

                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                        <p>New phone +1(800)555-1234</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                        <p>nora@example.com</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon fa fa-file-code-o bg-green"></i>

                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                        <p>Execution time 5 seconds</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <!-- /.control-sidebar-menu -->

                        <h3 class="control-sidebar-heading">Tasks Progress</h3>
                        <ul class="control-sidebar-menu">
                            <li>
                                <a href="javascript:void(0)">
                                    <h4 class="control-sidebar-subheading">
                                        Custom Template Design
                                        <span class="label label-danger pull-right">70%</span>
                                    </h4>

                                    <div class="progress progress-xxs">
                                        <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <h4 class="control-sidebar-subheading">
                                        Update Resume
                                        <span class="label label-success pull-right">95%</span>
                                    </h4>

                                    <div class="progress progress-xxs">
                                        <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <h4 class="control-sidebar-subheading">
                                        Laravel Integration
                                        <span class="label label-warning pull-right">50%</span>
                                    </h4>

                                    <div class="progress progress-xxs">
                                        <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <h4 class="control-sidebar-subheading">
                                        Back End Framework
                                        <span class="label label-primary pull-right">68%</span>
                                    </h4>

                                    <div class="progress progress-xxs">
                                        <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <!-- /.control-sidebar-menu -->

                    </div>
                    <!-- /.tab-pane -->
                    <!-- Stats tab content -->
                    <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                    <!-- /.tab-pane -->
                    <!-- Settings tab content -->
                    <div class="tab-pane" id="control-sidebar-settings-tab">
                        <form method="post">
                            <h3 class="control-sidebar-heading">General Settings</h3>

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Report panel usage
                                    <input type="checkbox" class="pull-right" checked>
                                </label>

                                <p>
                                    Some information about this general settings option
                                </p>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Allow mail redirect
                                    <input type="checkbox" class="pull-right" checked>
                                </label>

                                <p>
                                    Other sets of options are available
                                </p>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Expose author name in posts
                                    <input type="checkbox" class="pull-right" checked>
                                </label>

                                <p>
                                    Allow the user to show his name in blog posts
                                </p>
                            </div>
                            <!-- /.form-group -->

                            <h3 class="control-sidebar-heading">Chat Settings</h3>

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Show me as online
                                    <input type="checkbox" class="pull-right" checked>
                                </label>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Turn off notifications
                                    <input type="checkbox" class="pull-right">
                                </label>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Delete chat history
                                    <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                                </label>
                            </div>
                            <!-- /.form-group -->
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                </div>
            </aside>
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
