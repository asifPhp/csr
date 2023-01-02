<style>
.marBot20{
	margin-bottom:20px;
}

.readonly_date{
	background-color: white !important;
}
.error{
	font-weight: 900;
}
.actual_disp{
	background-color: white !important;
    opacity: 1 !important;
    margin-top: 10px !important;
    border: none !important;
    color: #3c8dbc !important;
}
</style>
  
 <?php
	$heading = '';
	//	var_dump($project_data);
	if($project_data){
		$page_heading = 'Edit project';
		$heading = 'Project Details';
		$project_id =$project_data[0]->id; 
		//var_dump($project_id);die;
		$prop_id =$project_data[0]->prop_id; 
		$superngo_id =$project_data[0]->superngo_id; 
        $ngo_id =$project_data[0]->ngo_id; 
        $organisation_id =$project_data[0]->organisation_id; 
        $created_time =$project_data[0]->created_time; 
        $updated_datetime =$project_data[0]->updated_datetime; 
        $project_status =$project_data[0]->project_status; 
        $is_deleted =$project_data[0]->is_deleted; 
        $generated_by =$project_data[0]->generated_by; 
        $title =$project_data[0]->title; 
        $code =$project_data[0]->code; 
		
        $project_start_date =$project_data[0]->project_start_date; 
        $project_end_date =$project_data[0]->project_end_date; 
       
	   $csr_file_value =$project_data[0]->cycle_file_upload; 
        $csr_file_value_actual =$project_data[0]->cycle_file_upload_actual; 
              	
        $is_readonly='readonly';	
       
        
	}else{
		$page_heading = 'Add a New Project';
        $heading = 'Project Details';
		$project_id =0;
		$prop_id =0; 
		$superngo_id =0; 
        $ngo_id =0;
        $organisation_id =0;
        $created_time = '';
        $updated_datetime ='';
        $project_status ='';
        $is_deleted =0;
        $generated_by ='';
        $title ='';
        $code ='';
       
	   $project_start_date ='';
	   $project_end_date ='';
	   
	   $csr_file_value ='';
	   $csr_file_value_actual ='';
		
    
	}	
?> 
<?php
$data['sub_folder_name']="";
$data['image_cat']="entity";
$this->load->view('file_upload',$data);
?> 
  
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper animated fadeInRight">
    <!-- Main content -->
    <section class="content-header content_h_m_b">
      <h1>
          <?php echo $page_heading; ?>
          <small></small>
        </h1>
		
		
    </section>
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box">
            <div class="box-header with-border">
            <h3 class="box-title"><?php echo $heading?></h3> 
           
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="add_organisation_form" method="post" role="form">
				<div class="box-body">
					<input type="hidden" class="form-control" id="project_id" name="project_id" value="<?php echo $project_id;?>"> 
					<div id="errHeadMsg"></div>
                
					<div> 
						<div>
							<label>Update Project Name<span class="required">*</span> </label>
						</div>
						<div class="my_internal_error"></div>
						<input type="text" class="form-control" name="project_update" id="project_update" value="<?php echo $title;?>">
						<div class="project_lendth_error display_none error">Project name must be at least 3 characters long</div>
						<div class="project_error display_none error">Project name is required</div>
					</div>

					<div class="value_read">
						<div class="form-group row ">
							<div class="col-md-12" >
								<label for="comments" >Upload Signed MOU for this project<span class="required">*</span> </label><br>
								<label class="input_description" >File must be less than 10 MB in size</label>
							</div>	
							<div class="col-md-12">
								<button type="button" id="comman_file_upload_class" name="comman_file_upload_class" image_upload_desc="" upload_type="file" file_count="single" img_primary="no" file_prev_class="cycle_file_upload_selected" file_input_id="cycle_file_upload" class="btn btn-primary btn-lg comman_file_upload_class" data-toggle="modal" data-target="#browseFile"><i class="fa fa-upload"></i> </button>
								<div class="cycle_file_upload1_error display_none error">Signed MOU for this project is required</div>
								<label id="cycle_file_upload_error1" class="required display_none cycle_file_upload_error1">Your file must be less than 10MB in size.</label>
								<div>
									<div class="">
										<input class="form-control cycle_file_upload " id="cycle_file_upload" name="cycle_file_upload" type="hidden" value="<?php if($csr_file_value){ echo $csr_file_value;}?>">
									</div>
									<span class="registration_80g_valid" ></span>
									<div class="image-preview inline_block cycle_file_upload_selected">
										<input readonly class="form-control is_edit_data  actual_disp" type="text" id="cycle_file_upload_actual" <?php if(!$csr_file_value_actual){ echo 'display_none' ;} ?> value="<?php if($csr_file_value_actual){ echo $csr_file_value_actual;}?>">
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="form-group row">
						<label for="startdate" class="col-md-12">Enter start date for this project<span class="required">*</span></label>
						<div class="col-md-12"> 
							<input type="text" class="form-control date readonly_date project_start_date" name="project_start_date" placeholder="Project Start Date" value="<?php echo $project_start_date;?>" readonly>
							<div class="project_start_date_error error display_none" style="font-weight :900;">Start date is required</div>
						</div>
					</div>
					
					<div class="form-group row">
						<label for="startdate" class="col-md-12">Enter end date for this project<span class="required">*</span></label>
						<div class="col-md-12"> 
							<input type="text" class="form-control end_date readonly_date project_end_date" name="project_end_date" placeholder="Project End Date" value="<?php echo $project_end_date;?>" readonly>
							<div id="visit_date_error " class="visit_date_error error  display_none" style="font-weight :900;">Date is required.</div>
							<div class="project_end_date_error error display_none" style="font-weight :900;">End date is required</div>
							<div class="project_greater_error error display_none" style="font-weight :900;">End date for the project must be later than the start date</div>
						</div>
					</div>
			
				</div>
              <!-- /.box-body -->

              <div class="box-footer">
                
                <a  href="<?php echo base_url();?>organisation/project/detail?id=<?php echo $project_id;?>"><button type="button" class="btn btn-default" id="save_goto_next_step1">Cancel</button></a>
                <button type="submit" class="btn btn-success">Save Changes</button>
                                
               
              </div>
            </form>
          </div>
          <!-- /.box -->

        </div>

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<?php $this->load->view('organisation/pages/single_image_upload_croppie');?>
  
<script>
$('document').ready(function(){
	$(".date").datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: 'yy-mm-dd',
			yearRange : 'c-75:c+75',
	});	
	$(".end_date").datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: 'yy-mm-dd',
			minDate: 'dateToday',
			yearRange : 'c-75:c+75',
	});
	
	$('#add_organisation_form').validate({
		ignore:[],
        rules: {
            project_update: {
                required: true,
            }, 
			cycle_file_upload: {
                required: true,
            },
			
            project_start_date: {
                required: true,
            },
			
            project_end_date: {
                required: true,
            },
            
           
        },
        messages: {
            project_update: {
                required: "Project name is required",
            },
			cycle_file_upload: {
                required: "Upload file is required",
            },
			project_start_date: {
                required: "Project start date is required",
            },
			project_end_date: {
                required: "Project end date is required",
            },
            
        },
        submitHandler: function (form) {
			//$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
			
            var project_id  = $('#project_id').val();
            var project_update  = $('#project_update').val();
            var project_start_date=$('.project_start_date').val();
			var project_end_date=$('.project_end_date').val();
			
			var csr_file_value = $('.cycle_file_upload').val();
			if(csr_file_value){}else{csr_file_value='';}
				console.log("v");
				console.log(csr_file_value)
			var csr_file_value_actual = $('.actual_disp').val();
			if(csr_file_value_actual){}else{csr_file_value_actual='';}
			var is_error='no';
			if(project_start_date){
			$('.project_start_date_error').addClass('display_none');
			}else {
				is_error = 'yes';
				$('.project_start_date_error').removeClass('display_none');
			}
		
			if(project_end_date){
				$('.project_end_date_error').addClass('display_none');
				if(project_end_date > project_start_date){
					$('.project_end_date_error').addClass('display_none');
					$('.project_greater_error').addClass('display_none');
				}else{
					is_error = 'yes';
					$('.project_end_date_error').addClass('display_none');
					$('.project_greater_error').removeClass('display_none');
				}
				
			}else{
				is_error = 'yes';
				$('.project_end_date_error').removeClass('display_none');
			}
				
			
			
            if(is_error=='no'){
				$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
				$.post(APP_URL + 'organisation/project/update_project_details', {       
					
					'project_id':project_id,
					
					'project_update':project_update,
					'project_start_date':project_start_date,
					'project_end_date':project_end_date,
					
					'csr_file_value':csr_file_value,
					'csr_file_value_actual':csr_file_value_actual,
					
				},
				function (response) {
					$.unblockUI();
					$("html, body").animate({scrollTop: 0}, "slow");
					$('#errHeadMsg').empty();
					if (response.status == 200) {
						$('#errHeadMsg').empty();
						$('#errHeadMsg').html("<div class='alert alert-success fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + response.message + "</strong></div>");
						$("#errHeadMsg").fadeTo(2000, 500).slideUp(500, function(){
							$('#errHeadMsg').empty();
							
							 window.location.href = APP_URL+'organisation/project/detail?id='+response.project_id;
						});
				   } else {
						$('#errHeadMsg').empty();
						$('#errHeadMsg').html("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + response.message + "</strong></div>");
						$("#errHeadMsg").fadeTo(2000, 500).slideUp(500, function(){
							$('#errHeadMsg').empty();
						});
					}
				}, 'json');
			}
            return false;
        }
    });
});
</script>