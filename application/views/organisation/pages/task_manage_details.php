<style>
#headerMsg{	margin:20px 0px;}
.dataTables-example th{	text-align:center;}
.ibox-content{padding: 10px;}
</style>
<?php
$status1='Complete';
$status='STATUS_'.$status1;

$status_cons=constant('STATUS_'.$status1);

?>

<div class="content-wrapper animated fadeInRight">
	<div class="content">
		<div class="row">
			<div class="col-lg-12">
				<div class="box ">
					<div class="ibox float-e-margins">
						<div class="box-header with-border">
							<h3 class="box-title"><?php echo $heading; ?></h3>
							<?php if(isset($add_url)){ ?>
								<a style="float: right;" href="<?php echo $add_url; ?>"  class="btn btn-success pull-right">Add</a>
							<?php }?>
						</div>


						<div class="ibox-content">
							<div id="headerMsg"></div>
						
							<div class="form-group row">
								<label for="organisation_id" class="col-md-3 text-right">Task </label>
								<div class="col-md-9"> 
									<span class="is_edit_hide"><?php echo $data_value[0]['org_task_label']; ?></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="organisation_id" class="col-md-3 text-right">Proposal Name </label>
								<div class="col-md-9"> 
									<span class="is_edit_hide"><?php echo $data_value[0]['prop_name']; ?></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="organisation_id" class="col-md-3 text-right">NGO Name </label>
								<div class="col-md-9"> 
									<span class="is_edit_hide"><?php echo $data_value[0]['ngo_name']; ?></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="organisation_id" class="col-md-3 text-right">Assigned to </label>
								<div class="col-md-9"> 
									<span class="is_edit_hide"><?php echo $data_value[0]['assigned_to']; ?></span> <a href="javascript:void(0);" class="change_assignee" data-toggle="modal" data-target="#browseChangeAssignee" name='<?php echo $data_value[0]['org_task_id']; ?> '  org_staff_id='<?php echo $data_value[0]['org_staff_id'] ?>' >Change</a>
								</div>
							</div>
							<div class="form-group row">
								<label for="organisation_id" class="col-md-3 text-right">Assigned on </label>
								<div class="col-md-9"> 
									<span class="is_edit_hide"><?php echo $data_value[0]['created_date']; ?></span> 
								</div>
							</div>
							<div class="form-group row">
								<label for="organisation_id" class="col-md-3 text-right">Due Date </label>
								<div class="col-md-9"> 
									<span class="is_edit_hide"><?php echo $data_value[0]['due_date']; ?></span>  <a href="javascript:void(0);" class="change_due_date"  name='<?php echo  $data_value[0]['org_task_id']; ?>' data-toggle="modal" data-target="#browseChangeDate" name='<?php echo $data_value[0]['org_task_id']; ?>' due_date='<?php echo $data_value[0]['due_date']; ?>' >Change</a>
								</div>
							</div>
							<div class="form-group row">
								<label for="organisation_id" class="col-md-3 text-right">Status </label>
								<div class="col-md-9"> 
									<span class="is_edit_hide"> <label class="label" style="background-color: <?php echo constant('STATUS_'.$data_value[0]['status']);?> !important;"><?php echo $data_value[0]['status']; ?></label></span>  
								</div>
							</div>
						
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!---------------------------- Modal for Browse Change Status-------------------------->
<div class="modal fade" id="browseChangeDate" tabindex="-1" course_package="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Change Due Date</h3>
            </div> 
            <div class="modal-body row">
				<div class="col-md-12">
					<div id="headerMsg1"></div>
					<form id="category_form2" method="post" enctype="multipart/form-data">
						<input class="form-control" id="org_task_id" name="org_task_id" value=0 type="hidden">
						<div class="form-group col-md-12" style="padding: 15px 0px 15px 0px">
							<label class="control-label col-md-3" for="new_due_date">Due date<span class="required">*</span></label>
							<div class="col-md-9">
								<input class="form-control date" type="text" readonly id="new_due_date" name="new_due_date">
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-success">Update</button>
						</div>
					</form>
				</div>
			</div>
        </div>
    </div>
</div>
<!---------------------------- Modal for Browse Change Status-------------------------->
<div class="modal fade" id="browseChangeAssignee" tabindex="-1" course_package="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Change Assignee</h3>
            </div> 
            <div class="modal-body row">
				<div class="col-md-12">
					<div id="headerMsg3"></div>
					<form id="category_form3" method="post" enctype="multipart/form-data">
						<input class="form-control" id="org_task_id2" name="org_task_id2" value=0 type="hidden">
						<div class="form-group col-md-12" style="padding: 15px 0px 15px 0px">
							<label class="control-label col-md-3" for="new_due_date">Select Assignee<span class="required">*</span></label>
							<div class="col-md-9">
								<select class="form-control " id="new_assignee" name="new_assignee">
									<?php 
										$con1 = '';
										foreach($org_users as $user){
											$con1 .= '<option value="'.$user['staff_id'].'">'.$user['first_name'].' '.$user['first_name'].'</option>';
										}
										echo $con1;
									?>
								</select>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-success">Update</button>
						</div>
					</form>
				</div>
			</div>
        </div>
    </div>
</div>
<script>
$('document').ready(function(){
	$(".date").datepicker({
		changeMonth: true,
		changeYear: true,
		dateFormat: 'yy-mm-dd',
		yearRange : 'c-75:c+75',
		minDate : 'today',
	});
	//------------------------------------------------------------------------
    /*
     * This script is used to fill modal for edit category
     */
    $('body').on('click', '.change_due_date', function () {		
        $('#headerMsg1').empty();
        $('#headerMsg').empty();
		$('#category_form2 label.error').empty();
        $('#category_form2 input.error').removeClass('error');
        $('#category_form2 select.error').removeClass('error');
		
        var org_task_id = $(this).attr('name');
        var current_due_date = $(this).closest('tr').find('td:eq(6)').attr('name');		
        
		$('#org_task_id').val(org_task_id);
        $('#new_due_date').val(current_due_date);
	});
	
	$('#category_form2').validate({
		ignore: [],
        rules: {
            new_due_date: {
                required: true,
            },
		},
		 messages: {
			new_due_date: {
                required: "Due date is required.",
            },
		},
		submitHandler: function (form) {
			
			var org_task_id = $('#org_task_id').val();
            var new_due_date = $('#new_due_date').val();
			
            $.post(APP_URL + 'organisation/tasks/update_due_date', {
                org_task_id: org_task_id,
                new_due_date: new_due_date,
            },
			function (response) {
				$("html, body").animate({scrollTop: 0}, "slow");
                $('#headerMsg1').empty();
                $('#headerMsg').empty();
				if (response.status ==200) {
                    var message = response.message;
					$('#browseChangeDate').modal('hide');
					
					$('#headerMsg').html("<div class='alert alert-success fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + message + "</strong>&nbsp;&nbsp;<a href='"+APP_URL+"page/blog_view'></a></div>");
					$("#headerMsg").fadeTo(2000, 500).slideUp(500, function(){
						$('#headerMsg').empty();
						window.location.reload();
					});
                }else if (response.status == 201) {
                    $('#headerMsg1').html("<div class='alert alert-danger fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
					$("#headerMsg1").fadeTo(2000, 500).slideUp(500, function(){
						$('#headerMsg1').empty();
					});
                }				
			}, 'json');
		return false;
		},
	});
	
	
    $('body').on('click', '.change_assignee', function () {		
        $('#headerMsg3').empty();
		$('#category_form3 label.error').empty();
        $('#category_form3 input.error').removeClass('error');
        $('#category_form3 select.error').removeClass('error');
		
        var org_task_id = $(this).attr('name');
        var new_assignee = $(this).attr('org_staff_id');
        console.log(new_assignee);
		$('#org_task_id2').val(org_task_id);
        $('#new_assignee').val(new_assignee);
	});
	
	$('#category_form3').validate({
		ignore: [],
        rules: {
            new_assignee: {
                required: true,
            },
		},
		 messages: {
			new_assignee: {
                required: "Please select staff.",
            },
		},
		submitHandler: function (form) {
			
			var org_task_id = $('#org_task_id2').val();
            var new_assignee = $('#new_assignee').val();
			
            $.post(APP_URL + 'organisation/tasks/update_assignee', {
                org_task_id: org_task_id,
                new_assignee: new_assignee,
            },
			function (response) {
				$("html, body").animate({scrollTop: 0}, "slow");
                $('#headerMsg1').empty();
                $('#headerMsg').empty();
				if (response.status ==200) {
                    var message = response.message;
					$('#browseChangeAssignee').modal('hide');
					
					$('#headerMsg').html("<div class='alert alert-success fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + message + "</strong>&nbsp;&nbsp;<a href='"+APP_URL+"page/blog_view'></a></div>");
					$("#headerMsg").fadeTo(2000, 500).slideUp(500, function(){
						$('#headerMsg').empty();
						window.location.reload();
					});
                }else if (response.status == 201) {
                    $('#headerMsg1').html("<div class='alert alert-danger fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
					$("#headerMsg1").fadeTo(2000, 500).slideUp(500, function(){
						$('#headerMsg1').empty();
					});
                }				
			}, 'json');
		return false;
		},
	});
	
	
});
</script>

