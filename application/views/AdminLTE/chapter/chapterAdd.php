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
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">		  
            <div class="box-header with-border">
              <h3 class="box-title">Chapter Listing</h3>
            </div>
			<?php if ($this->session->flashdata('msg')) { ?>
        <div class="alert alert-success"> <?= $this->session->flashdata('msg') ?> </div>
    
<?php } if ($this->session->flashdata('msg-error')) { ?>
<div class="alert alert-danger"> <?= $this->session->flashdata('msg-error'); ?> </div>
<?php } ?>
			<form  method="post" class="validator-form form-horizontal" action="<?php echo base_url('index.php/chapter/insert'); ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Category Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="chapter_name" required class="form-control" id="inputEmail3" value="" placeholder="Chapter Name">
                  </div>
                </div> 				
              </div>
              <div class="box-footer">              
                <button type="submit" class="btn btn-info pull-right">Save	</button>
              </div>
            </form>
          </div>
          <div class="box box-warning">
          </div>
        </div>
      </div>
    </section>
  </div>
  <?php $this->load->view('AdminLTE/element/footer'); ?>
  <aside class="control-sidebar control-sidebar-dark">
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
  </aside>
  <div class="control-sidebar-bg"></div>
</div>
</body>
</html>
