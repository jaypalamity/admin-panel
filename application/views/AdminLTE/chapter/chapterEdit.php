<!DOCTYPE html>
<html>
<?php $this->load->view('AdminLTE/element/header'); ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php $this->load->view('AdminLTE/element/header_navigation'); ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php $this->load->view('AdminLTE/element/left'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"  >
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content" style="min-height: 100px !important;">
      <div class="row">
        <!-- left column -->
        
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
		  
            <div class="box-header with-border">
              <h3 class="box-title">Chapter Name</h3>
            </div>
			<?php if ($this->session->flashdata('msg')) { ?>
        <div class="alert alert-success"> <?= $this->session->flashdata('msg') ?> </div>
    
<?php } if ($this->session->flashdata('msg-error')) { ?>
<div class="alert alert-danger"> <?= $this->session->flashdata('msg-error'); ?> </div>
<?php } ?>
			<?php //print_r($category); ?>
            <!-- /.box-header -->
            <!-- form start -->
           
			<form  method="post" class="validator-form form-horizontal" action="<?php echo base_url('index.php/chapter/update').'/'.@$chapter->chapter_master_id; ?>">
		
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Chapter Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="chapter_name" class="form-control" required id="inputEmail3"  value="<?php echo @$chapter->chapter_name; ?>" placeholder="Chapter Name">
                  </div>
                </div> 
                  
                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Chapter Keyword</label>
                  <div class="col-sm-10">
                    <input type="text" name="chapter_name_keyword" class="form-control"  id="chapter_name_keyword"  value="<?php echo @$chapter->chapter_name_keyword; ?>" placeholder="Chapter Keyword">
                  </div>
                </div>
                  
                  
                  
              </div>			  
              <!-- /.box-body -->
              <div class="box-footer">              
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
