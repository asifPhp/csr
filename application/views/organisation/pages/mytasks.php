<link rel="stylesheet" href="<?php echo base_url()?>assets/css/comboTreePlugin.css">
<script src="<?php echo base_url()?>assets/js/comboTreePlugin.js"></script>
<script>
	$(document).ready(function(){
		$('.dataTablesOrder').DataTable( {
			"order": [[ 5, "desc" ]],
			"lengthMenu": [[50, 75, 100, -1], [50, 75, 100, "All"]]
			
		});
    });
	
	
	
</script>
<style>
#headerMsg{	margin:20px 0px;}
.dataTables-example th{	text-align:center;}
.ibox-content{padding: 10px;}
#blog_view_table td:hover {
    cursor: pointer;
}
.select_status
{
	width:auto;
	display:inline-block;
	margin-left:10px;
}
#all_status_list{background-color: #fff;}
</style>
<?php
//var_dump($status);
	if ($data_value == 0) {
		$table_type_ = '';
	} else {
		$table_type_ = 'dataTablesOrder';
	}
?>

<div class="content-wrapper animated fadeInRight">
<section class="content-header">
<h1><?php echo $heading;?></h1>
</section>
	<div class="content">
		<div class="row">
			<div class="col-lg-12">
				<div class="box  box-primary ">
					<div class="ibox float-e-margins">
						<div class="box-header ">
							
							<h3 class="box-title"><?php  if($status == 'New'){echo 'In Progress ';}else{echo 'Completed';} ?> Tasks</h3>
							
							<!--
							<select name="Status" id="Status_change" class="status_change select_status form-control">
							<option value="all" <?php if($status == 'all'){echo 'selected';}?> >Show all</option>
							<option value="Complete" <?php if($status == 'Completed'){echo 'selected';}?>>Complete</option>
							<option value="Pending"  <?php if($status == 'Pending'){echo 'selected';}?>>Pending</option>
							<option value="New" <?php if($status == 'New'){echo 'selected';}?>>New</option>
							</select>-->
							<input type="hidden" class="main_status" value="<?php echo $status ?>">
							<input type="hidden" class="sub_status" value="<?php echo $sstatus ?>">
							<input type="hidden" class="form-control" id="assign_task_list" value="<?php echo $task_type_id; ?>">
							<div class="btn-group" style="margin-top: -4px;">
								<button type="button" class="btn  <?php if($status == 'New'){ echo 'btn-info';}else{ echo 'btn-default';}?> mark_incomplete">In Progress</button>
								<button type="button" class="btn  <?php if($status == 'hold'){ echo 'btn-info';}else{ echo 'btn-default';}?> mark_hold">On Hold</button>
								<button type="button" class="btn  <?php if($status == 'Completed'){ echo 'btn-info';}else{ echo 'btn-default';}?>  mark_complete">Completed</button>
							  </div>
							  
							
							<div class="filter_box">
								<div style="display: inline-block;" class="select1">
									<label class="filter_label">Filter: </label>
								</div>
								<div style="display: inline-block;" class="comboTreeInputBoxOuterDiv">
								<input style="" type="text" placeholder="Task Type" class="comboTreeInputBoxInput" id="task_type_list"  >
								</div>
								<?php if($status == 'New'){ ?>
								<div style="display: inline-block;" class="comboTreeInputBoxOuterDiv">
									<input style="" type="text" placeholder="Task Status" class="comboTreeInputBoxInput" id="all_status_list"  >
								</div>
								<?php }?>
								<div class="" style="display: inline-block; margin-top: -4px;">
									<button type="button" class="apply_filter btn btn-default filter_btn">Filter</button>
									<button type="button" class="clear_filter btn btn-default filter_btn">Clear Filter(s)</button>
								</div>
							</div>
							
							 
							<?php if(isset($add_url)){ ?>
								<a style="float: right;" href="<?php echo $add_url; ?>"  class="btn btn-success pull-right">Add</a>
							<?php }?>
						</div>
						<input type="hidden" class="form-control" id="status" name="status" value="<?php echo $status; ?>">
						<div class="ibox-content">
							<div id="headerMsg"></div>
							<div class="table-responsive">
								<table id="blog_view_table" class="<?php echo $table_type_;?> table table-striped table-bordered table-hover" >
									<thead>
										<tr>
											<th class="text-center display_none">S. No.</th>
											<th class="text-center">Task</th>
											<th class="text-center">Project ID</th>
											<th class="text-center">Proposal Name</th>
											<th class="text-center">NGO Name</th>
											<th class="text-center">Assigned on</th>
											<th class="text-center">Due Date</th>
											<th class="text-center">Status</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$i = 1;
											if ($data_value == 0) {
												$content .= '<tr style="color: red;" class="darker-on-hover"><td class="text-center" colspan="5">No data Available</td>';
											} else {
												
												$content = '';
												foreach ($data_value as $value) {
													$content .= '<tr class="task_detail darker-on-hover" org_task_id='.$value['org_task_id'].'><td class="text-center display_none">' . $i . '</td>';
													$content .= '<td class="text-center">' . $value['org_task_label'] . '</td>';
													$content .= '<td class="text-center">' . $value['project_id'] . '</td>';
													$content .= '<td class="text-center">' . $value['proposal_title_org'] . '</td>';
													$content .= '<td class="text-center">' . $value['ngo_name'] . '</td>';
													$content .= '<td class="text-center">' . date_formats($value['created_date']) . '</td>';
													if($value['due_date']!=''){
													$content .= '<td class="text-center">' . date_formats($value['due_date']) . '</td>';
													}else{
													$due_date='';	
													$content .= '<td class="text-center">'.$due_date.'</td>';	
													}
													$content .= '<td class="text-center "><span class="label" style="text-transform: capitalize;background-color: '.constant('STATUS_'.$value['status']).' !important;">' . $value['status'] . '</span></td>';
													$content .= '</tr>';
													$i++;
												}
												echo $content;
											}
										?>
									</tbody>
								</table>
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
	
	/*multi select*/
	
/*	var myData = [{
		  id: "1",
		  title:'New'
		}, 
		{
		  id: "2",
		  title:'In progress'
		},
		{
		  id: "3",
		  title:'Needs Review'
		},
		{
		  id: "4",
		  title:'Task Revision'
		},
		{
		  id: "5",
		  title:'Revision Ready'
		},
		{
		  id: "6",
		  title:'NGO Revision'
		},
		{
		  id: "7",
		  title:'NGO Revised'
		},
	];
	var orgGeoData = [ ];
	var main_status = $('.main_status').val();
	var sub_status = $('.sub_status').val();
	console.log(main_status);
	if(sub_status){
		var sub_status_array = sub_status.split(",");
		console.log(sub_status_array);
		if(sub_status_array.length){
			$.each(sub_status_array, function(index, item) {
				if(($.trim(item)) == 'In progress'){orgGeoData.push("2");}
				if(($.trim(item)) == 'Needs Review'){orgGeoData.push("3");}
				if(($.trim(item)) == 'Task Revision'){orgGeoData.push("4");}
				if(($.trim(item)) == 'Revision Ready'){orgGeoData.push("5");}
				if(($.trim(item)) == 'NGO Revision'){orgGeoData.push("6");}
				if(($.trim(item)) == 'NGO Revision'){orgGeoData.push("6");}
				if(($.trim(item)) == 'NGO Revised'){orgGeoData.push("7");}
				
				if(($.trim(item)) == 'Submitted'){orgGeoData.push("2");}
				//if(($.trim(item)) == 'New'){orgGeoData.push("3");}
				//if(($.trim(item)) == 'Recommended for Rejection'){orgGeoData.push("4");}
				if(($.trim(item)) == 'Rejected'){orgGeoData.push("5");}
				//if(($.trim(item)) == 'Revision Request'){orgGeoData.push("6");}
				//if(($.trim(item)) == 'Processing'){orgGeoData.push("7");}
				//if(($.trim(item)) == 'Pending Revision by NGO'){orgGeoData.push("8");}
				if(($.trim(item)) == 'Approved'){orgGeoData.push("9");}
				
				if(($.trim(item)) == 'NGO Review Pending'){orgGeoData.push("11");}
				if(($.trim(item)) == 'NGO Decision Pending'){orgGeoData.push("12");}
				if(($.trim(item)) == 'Proposal Initial Review Pending'){orgGeoData.push("13");}
				if(($.trim(item)) == 'Proposal Final Review Pending'){orgGeoData.push("14");}
			});


			//$.trim(str)
		}
	}*/
	
	
		//console.log(orgGeoData);
		//console.log(myData);
		//console.log(main_status);
	var orgGeoData = [ ];
	var sub_status = $('.sub_status').val();
		
	if(sub_status){
		var sub_status_array = sub_status.split(",");
		console.log(sub_status_array);
		if(sub_status_array.length){
			$.each(sub_status_array, function(index, item) {
				orgGeoData.push(item)
			});
		}
	}	
	var geo_instance ='';
	var page_name='My Task'
	$.post(APP_URL + 'organisation/tasks/get_org_status_list', {
		page_name:page_name,
	},
	function (response) {
		console.log(response.listdata);
		geo_instance = $('#all_status_list').comboTree({
			source : response.listdata,
			isMultiple:true,
			cascadeSelect:true,
			//selected: orgGeoData
		});
		if(orgGeoData){
			geo_instance.setSelection(orgGeoData);
		}
	}, 'json');
	
	
	
	
	var assign_task_list = $('#assign_task_list').val();
	var orgstaffData1 = [ ];
	if(assign_task_list){
		var sub_status_array = assign_task_list.split(",");
		console.log(sub_status_array);
		if(sub_status_array.length){
			$.each(sub_status_array, function(index, item) {
				orgstaffData1.push(item)
			});
		}
	}
	console.log(orgstaffData1);
	var geo_instance222 ='';
	$.post(APP_URL + 'organisation/staff/get_task_type', {
		
	}, function (response) {
		geo_instance222 = $('#task_type_list').comboTree({
			source : response.listdata,
			isMultiple:true,
			cascadeSelect:true,
			//selected: orgstaffData
		});
		if(orgstaffData1){
			geo_instance222.setSelection(orgstaffData1);
		}
		
	}, 'json');
	
	
	
	
	
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
						window.location.href = APP_URL+'organisation/tasks/manage';
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
						window.location.href = APP_URL+'organisation/tasks/manage';
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
	
	
	$('body').on('click', '.clear_filter', function (e) {
		var url = APP_URL+"organisation/tasks/mytasks";
		console.log(url);
		window.location.href=url;
	});
	
	
	$('body').on('click', '.mark_complete', function (e) {
		var url = APP_URL+"organisation/tasks/mytasks";
		url +='?status=Completed';
		console.log(url);
		window.location.href=url;
	});
	
	$('body').on('click', '.mark_incomplete', function (e) {
		var url = APP_URL+"organisation/tasks/mytasks";
		console.log(url);
		window.location.href=url;
	});
	
	$('body').on('click', '.mark_hold', function (e) {
		var url = APP_URL+"organisation/tasks/mytasks";
		url +='?status=hold';
	    window.location.href=url;
	});
	
	
	$('body').on('click', '.apply_filter', function (e) {
		var main_status = $('.main_status').val();
		var all_status_list = $('#all_status_list').val();
		var task_type_id = geo_instance222.getSelectedIds();//$('#all_assignee_list').val();
		var url = APP_URL+"organisation/tasks/mytasks";
		var is_status = 'no';
		if(main_status){
			is_status = 'yes';
			url +='?status='+main_status +'&'
		}
		if(all_status_list){
			if(is_status == 'no'){
				url += '?';
			}
			url +='sstatus='+all_status_list +'&'
		}
		if(task_type_id){
			url +='task_type_id='+task_type_id +'&'
		} 
		console.log(url);
		window.location.href=url;
	});
	
//	$('#blog_view_table tr').click(function() {
		$('#blog_view_table').on("click", ".task_detail", function(){
        var href = $(this).attr("org_task_id");
        var sourse='&sourse=tasks';
        if(href) {
			window.location.href=APP_URL+'organisation/tasks/detail?id='+href+sourse;
        }
    });
});
</script>

