<style>
.marBot20{
	margin-bottom:20px;
}
</style>
 
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper animated fadeInRight">
 <?php
	$heading = '';
    $page_heading = '';
	
	if($task_data){
        $page_heading = 'View/Edit Organisation Task';
        $heading = 'view and edit a Organisation  Task';
		$task_type =$task_data[0]['task_type'];  
		$task_position =$task_data[0]['task_position']; 
		$task_label =$task_data[0]['task_label']; 
		$view_file_name =$task_data[0]['view_file_name']; 
		$is_cycle_start=$task_data[0]['is_cycle_start'];
		//$org_id =$task_data[0]['org_id']; 
		$task_id =$task_data[0]['task_id']; 
        $is_add_edit='edit';
			}
			else{
        $page_heading = 'Create Organisation Task';
        $heading = 'Add a Organisation  Task';
		$task_type  ='';
        $task_position ='';
		$task_label ='';
		$view_file_name ='';
		$is_cycle_start='';
		//$org_id = '';
		$task_id = '';
		$is_add_edit ='add';
		
	}	
?>
    <!-- Main content -->
    <section class="content-header">
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
              <?php if($is_permitted['is_list']){  ?>
			     <a href="<?php echo base_url();?>admin/organisation/organisation_add_task" class="btn btn-default pull-right">List All</a>
              <?php }?>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="add_task_form" method="post" role="form">
				<div class="box-body">
					<input type="hidden" class="form-control" id="is_add_edit" name="is_add_edit" value="<?php echo $is_add_edit;?>"> 
					<input type="hidden" class="form-control" id="org_id" name="org_id" value="<?php echo $organisation_id;?>"> 
					<input type="hidden" class="form-control" id="task_id" name="task_id" value="<?php echo $task_id;?>"> 
					<div id="errHeadMsg"></div>
					<div class="form-group">
					  <label for="task_type">Task Type</label>
					  <input type="text" class="form-control" id="task_type" name="task_type" placeholder="Enter Task Type" value="<?php echo $task_type;?>">
					</div>
					<div class="form-group">
					  <label for="task_position">Task Position</label>
					  <input type="number" class="form-control" id="task_position" name="task_position" placeholder=" Enter Task Position" value="<?php echo $task_position;?>">
					</div>
					<div class="form-group">
					  <label for="task_label">Task Label</label>
					  <input type="text" class="form-control" id="task_label" name="task_label" placeholder="Enter Task Label" value="<?php echo $task_label;?>">
					</div>
					<div class="form-group">
					  <label for="view_file_name">View File Name</label>
					  <input type="text" class="form-control" id="view_file_name" name="view_file_name" placeholder="Enter View File Name" value="<?php echo $view_file_name;?>">
					</div>
					<div class="form-group">
					  <label for="is_cycle_start">Is Cycle Start</label>
					  <input type="text" class="form-control" id="is_cycle_start" name="is_cycle_start" placeholder="Enter Is Cycle Start" value="<?php echo $is_cycle_start;?>">
					</div>
                </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-success">Submit</button>
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
<?php $this->load->view('admin/pages/single_image_upload_croppie');?>
  
<script>
$('document').ready(function(){
    
	$('#add_task_form').validate({
		ignore:[],
        rules: {
            task_type: {
                required: true,
            },
            task_position: {
                required: true,
            },
			task_label: {
                required: true,
            },
			view_file_name: {
                required: true,
            },
			is_cycle_start:{
				required: true,
			},
            
        },
        messages: {
            task_type: {
                required: "Task type is required",
            },
            task_position: {
                required: "Task position is required",
            },
			task_label: {
                required: "Task label is required",
            },
			view_file_name: {
                required: "viewfile name is required",
            },
			is_cycle_start: {
                required: "Is cycle start is required",
            },
           
        },
        submitHandler: function (form) {
			$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /> Just a moment...</h1>' });
			
            var task_type = $('#task_type').val();
            var task_position = $('#task_position').val();
			var task_label = $('#task_label').val();
            var view_file_name = $('#view_file_name').val();
			var is_cycle_start = $('#is_cycle_start').val();
            var org_id = $('#org_id').val();
            var is_add_edit = $('#is_add_edit').val();
            var task_id = $('#task_id').val();

           
           
            $.post(APP_URL + 'admin/organisation/update_organisation_add_task', {
                task_type:task_type,
                task_position:task_position,
                task_label: task_label,
                view_file_name:view_file_name,
				is_cycle_start:is_cycle_start,
                task_id:task_id,
                org_id:org_id,
                is_add_edit:is_add_edit,
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
					});
					window.location.href = APP_URL+'admin/organisation/organisation_task_list?id='+org_id;
					
					task_type = $('#task_type').val('');
					task_position = $('#task_position').val('');
					task_label = $('#task_label').val('');
					view_file_name = $('#view_file_name').val('');
					is_cycle_start = $('#is_cy').val('');
					org_id = $('#org_id').val('');
					is_add_edit = $('#is_add_edit').val('');
					task_id = $('#task_id').val('');
				} else {
                    $('#errHeadMsg').empty();
                    $('#errHeadMsg').html("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + response.message + "</strong></div>");
					$("#errHeadMsg").fadeTo(2000, 500).slideUp(500, function(){
						$('#errHeadMsg').empty();
					});
				}
            }, 'json');
            return false;
        }
    });
});
</script>