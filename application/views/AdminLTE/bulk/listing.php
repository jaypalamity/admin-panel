<!DOCTYPE html>
<html>
    <?php $this->load->view('AdminLTE/element/header'); ?>
     <?php
    $var = get_question();
    ?>
    <script>
        function doconfirm()
        {
            job = confirm("Are you sure to update Subject order ?");
            if (job != true)
            {
                return false;
            }
        }
		
		function doValidation()
        {		
						var fileValue = $('#image_folder').val();
						var fileValueBulk = $('#image_folder_bulk').val();
						var tagging_id = $('#tagging_id').val();
                        var jfile = $('input[name=image_folder]').val();
						var extension = jfile.substr((jfile.lastIndexOf('.') + 1));
						var accepted_file_endings_htm = ["htm"];
						extension = extension.toLowerCase();
                        var jfile_bulk = $('input[name=image_folder_bulk]').val();
						var extension_bulk = jfile_bulk.substr((jfile_bulk.lastIndexOf('.') + 1));
						var accepted_file_endings_zip = ["zip"];
						extension_bulk = extension_bulk.toLowerCase();						
			if(fileValue==''){
				alert('Select document to uopload');
				$('#image_folder').focus();
				return false;
			}
			if(fileValueBulk==''){
				alert('Select document to uopload');
				return false;
			}    
			 if( $.inArray(extension, accepted_file_endings_htm) == -1)
						{
						alert('File not allowed');
						$("#image_folder").focus();
						return false;
						}
						
			if( $.inArray(extension_bulk, accepted_file_endings_zip) == -1)
			{
						alert('Only zip file allowed');
						$("#image_folder_bulk").focus();
						return false;
			}	

if(tagging_id==''){
				alert('Select Tagging to uopload');
				$('#tagging_id').focus();
				return false;
			}			
        }
        $(document).ready(function () { 

           //////////// populating Exam subject on page load /////////////
                  $.ajax({
                    url: '<?php echo base_url('examsubject/getData'); ?>',
                    dataType: 'html',
                    type: 'POST',
                    // This is query string i.e. country_id=123
                    data: {exam_category_id: $('#exam_category').val()},
                    success: function (data) {                                                   
                        $("#result").html(data); 
                        $("#subjectlevelupdate").show(); 
                        
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                    }
                });
                 //////////// populating Exam subject on page load /////////////
            $('#exam_category').change(function () {
                //alert($('#exam_category').val());
                $.ajax({
                    url: '<?php echo base_url('examsubject/getData'); ?>',
                    dataType: 'html',
                    type: 'POST',
                    // This is query string i.e. country_id=123
                    data: {exam_category_id: $('#exam_category').val()},
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
                                    <label for="exam_category" class="col-sm-2 control-label">Select File to Upload</label>
                                    
                                    <div class="col-sm-4">                                                                                    
 <form action="<?php echo base_url('index.php/bulk/upload'); ?>" method="post" enctype="multipart/form-data" onsubmit="return doValidation()">
  	Choose Image to upload:
	    <input type="file" name="image_folder" id="image_folder"><br/>
	Choose bulk Image ZIP folder :
    <input type="file" name="image_folder_bulk" id="image_folder_bulk">	<br/>
	
                                                <select  name="tagging_id[]" id="tagging_id" style="width:750px">
<!--                                                <select class="multipleSelect" multiple name="tagging_id[]" id="tagging_id">-->
                                                    <?php
                                                    $get_taggingData = get_taggingData();
                                                    foreach ($get_taggingData as $data) {
                                                        // echo '<pre>';print_r($data);

                                                        $taggingMasterId = $data->tagging_master_id;
                                                        //echo '<br>';
//     echo  $exam_master_id = $data->exam_master_id;echo '<br>';
//     echo $subject_master_id = $data->subject_master_id;echo '<br>';
//     echo $chapter_master_id = $data->chapter_master_id;echo '<br>';
//      echo $topic_master_id = $data->topic_master_id;echo '<br>';

                                                        $query = $this->db->query("SELECT exam_name FROM tbl_exam_master WHERE id = '" . $data->exam_master_id . "'");
                                                        $examName = $query->row();

                                                        $querySubject = $this->db->query("SELECT subject_name FROM tbl_subject_master WHERE subject_master_id = '" . $data->subject_master_id . "'");
                                                        $subjectName = $querySubject->row();

                                                        $queryChapter = $this->db->query("SELECT chapter_name FROM tbl_chapter_master WHERE chapter_master_id = '" . $data->chapter_master_id . "'");
                                                        $chapterName = $queryChapter->row();
                                                        $queryTopic = $this->db->query("SELECT topic_name FROM tbl_topic_master WHERE topic_master_id = '" . $data->topic_master_id . "'");
                                                        $topicName = $queryTopic->row();
                                                        ?>
                                                        <option value="<?php echo $taggingMasterId; ?>"><?php echo $examName->exam_name; ?>-<?php echo $subjectName->subject_name; ?>-<?php echo $chapterName->chapter_name; ?>-<?php echo $topicName->topic_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            <script>
                                            //$('.multipleSelect').fastselect();
                                        </script>
    <input type="submit" value="Upload Paper" name="upload">
</form>
                                    </div>
                                </div>
<!--                                <h3 class="box-title">Responsive Hover Table</h3>-->                                
                            </div>
                            <!-- /.box-header -->
                            
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
            var length = $(".exam_subject_order").length;      
            var check = false;
            for(i=1;i<=length;i++)
            {              
             if($("#"+i).val() > length)
             {
                 alert("Value is greater than length.");               
                 check = false;
                 break;
             }
             else
             {
                 check = true;
             }
             
            for(j=1;j<=length;j++)
            { 
                if(j!=i){
                if($("#"+j).val() ==  $("#"+i).val())
                {
                    alert("Order value already exists!");
                    if(i > j){
                    $("#"+j).val("");
                    }
                    else
                    {

                    $("#"+i).val("");    
                    }
                    check = false;
                    break;
                }
                else{
                    check = true;
                }
            }
            }
            }
            if(check == true)
            {
                $("#subjectPost").click();
            }
            
            }        
        </script>
</html>