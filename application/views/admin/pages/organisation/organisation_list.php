<style>
#headerMsg{	margin:20px 0px;}
.dataTables-example th{	text-align:center;}
.ibox-content{padding: 10px;}
</style>

<?php
if($sql_query){
	$listdata = $this->db->query($sql_query)->result_array();
}else{
	$listdata = $this->db->get($table_name)->result_array();
}


/*replace or add with query*/
$content = '';

if($listdata){
	$i = 1;
	foreach ($listdata as $key=>$value) {
		$jj = 0;
		$content .= '<tr class="darker-on-hover"><td class="text-center">' . $i . '</td>';
		for ($jj = 0; $jj < $table_body_column_count; $jj++) {
			$content .= '<td class="text-center">' . $value[$table_body_column[$jj]]. '</td>';
		}
		if($is_permitted['is_other1']){ 
			$content .= '<td class="text-center"><a href="#" data-toggle="modal" data-target="#browsePasswordModule" class="edit_module"  name="' . $value['staff_id'] . '" value=""><span class="label label-primary">Edit Password</span></a> </td>';
		}
		$content .= '<td class="text-center">';
			$content .= '<a href="'.base_url().'admin/organisation/organisation_task_list'.'?id='.$value[$primary_column_name].'" class="edit_module"  name="' . $value[$primary_column_name] . '" value=""><span class="label label-info">Task</span></a>&nbsp;';
			if(isset($edit_url)){ 
				$content .= '<a href="'.$edit_url.'?id='.$value[$primary_column_name].'" class="edit_module"  name="' . $value[$primary_column_name] . '" value=""><span class="label label-success">Edit</span></a>&nbsp;';
			}
			if(isset($is_remove)){
				$content .= '&nbsp;<a href="javascript:void(0);" class="remove_item" primary_column_name="'.$primary_column_name.'"  table_name="'.$table_name.'" name="' . $value[$primary_column_name] . '" staff_id="' . $value['staff_id'] . '"  ><span class="label label-danger">Remove</span></a>';
			}
		$content .= '</td>';
		$content .= '</tr>';
		$i++;
	}
}else{
	$content .= '<tr style="color: red;" class="darker-on-hover"><td class="text-center" colspan="'.($table_body_column_count+3).'">No data Available</td>';
}

?>


<div class="content-wrapper animated fadeInRight">
	<section class="content-header">
     	<h1>
        	<?php echo $page_heading; ?>
        	<small></small>
      	</h1>
     
    </section>
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
							<div class="table-responsive">
								<table id="blog_view_table" class="<?php echo $table_type;?> table table-striped table-bordered table-hover" >
									<thead>
										<tr>
											<th class="text-center">S. No.</th>
											<?php
											if($table_header_column){
												foreach($table_header_column as $val){  
													echo '<th class="text-center">'.$val.'</th>';
												}
											}
											?>
											<?php if($is_permitted['is_other1']){ ?>
											<th class="text-center">Password</th>
										<?php } ?>
											<th class="text-center">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php echo $content; ?>
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

<!----------------------- Modal for Browse Change Password------------------------>
<div class="modal fade" id="browsePasswordModule" tabindex="-1" course_package="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #fff;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Edit Password</h3>
            </div> 
            <div class="modal-body row">
				<div class="col-md-12">
					<div id="err_dlt_plan"></div>
					<form class="well" id="menu_form" method="post" enctype="multipart/form-data">
					<input class="form-control" id="query_id2" name="query_id2"  value="" type="hidden">
					  Password <input type="text" class="form-control" id="password" name="password" placeholder="Password" />
					
						<div class="clearfix"></div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" aria-hidden="true" class="btn btn-success">Save</button>
						</div>
					</form>
				</div>
			</div>
        </div>
    </div>
</div>

<!---------------------------- Modal for Browse Change Status-------------------------->
<div class="modal fade" id="browseChangeStatus" tabindex="-1" course_package="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #f5f5f5;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Change  Status</h3>
            </div> 
            <div class="modal-body row">
				<div class="col-md-12">
					<form class="well" id="category_form2" method="post" enctype="multipart/form-data">
						<input class="form-control" id="category_id2" name="category_id2" value=0 type="hidden">
						<div class="form-group col-md-12" style="padding: 15px 0px 15px 0px">
							<label class="control-label col-md-3" for="category_status">Blog Status<span class="required">*</span></label>
							<div class="col-md-9">
								<select class="form-control" id="category_status" name="category_status">
									<option value="">Select Status</option>
									<option value="active">Active</option>
									<option value="inactive">Inactive</option>
									<option value="remove">Remove</option>
								</select>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-success">Save</button>
						</div>
					</form>
				</div>
			</div>
        </div>
    </div>
</div>
<script>
$('document').ready(function(){

	$('body').on('click','.edit_module',function(){
 		var id = $(this).attr('name');

 		$('#query_id2').val(id);
 
 	});  

 	$('#menu_form').validate({
		rules: {
			password: {
				required: true,
			},
		},
		messages: {        
			status: {
				required: "password is required",
			},
		},
 		submitHandler: function (form) {
			$.blockUI();
			//$('#menu_form').find('button[type="submit"]').prop('disabled',true);
			var id = $('#query_id2').val();
			var password = $('#password').val();
           
            $.post(APP_URL + 'admin/organisation/update_organisation_password', {
            	id: id,
                password: password,
            },
			function (response) {
					$.unblockUI();
					$("html, body").animate({scrollTop: 0}, "slow");
					$('#err_dlt_plan').empty();
					if (response.status == 200) {
						$('#err_dlt_plan').empty();
						
						$('#err_dlt_plan').html("<div class='alert alert-success fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + response.message + "</strong></div>");
						$("#err_dlt_plan").fadeTo(2000, 500).slideUp(500, function(){
							$('#err_dlt_plan').empty();
							$('#browsePasswordModule').modal('hide');
							//window.location.href = APP_URL+'account/event/user_organisation_list';
						});

				   } else {
						$('#err_dlt_plan').empty();
						$('#err_dlt_plan').html("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + response.message + "</strong></div>");
						$("#err_dlt_plan").fadeTo(2000, 500).slideUp(500, function(){
							$('#err_dlt_plan').empty();
						});
					}
					
				}, 'json');
		return false;
		}
	});
	
	//------------------------------------------------------------------------
    /*
     * This script is used to fill modal for edit category
     */
    $('body').on('click', '.change_status', function () {		
        $('#headerMsg').empty();
		$('#category_form2 label.error').empty();
        $('#category_form2 input.error').removeClass('error');
        $('#category_form2 select.error').removeClass('error');
		
        var category_id = $(this).attr('name');
        var category_status = $(this).closest('tr').find('td:eq(4)').attr('name');		
        
		$('#category_id2').val(category_id);
        $('#category_status').val(category_status);
	});
	
	$('body').on('click', '.remove_item', function () {	
		if (!confirm("Do you want to delete")) {
            return false;
        }	
		$.blockUI();
        var id = $(this).attr('name');
        var staff_id = $(this).attr('staff_id');
        var primary_column_name = $(this).attr('primary_column_name');
        var table_name = $(this).attr('table_name');
		$.post(APP_URL + 'admin/organisation/remove', {
			id: id,
			table_name: table_name,
			primary_column_name: primary_column_name,
			staff_id: staff_id,
		},
		function (response) {
			$("html, body").animate({scrollTop: 0}, "slow");
			$('#headerMsg').empty();
			if (response.status == 200) {	
				$('#headerMsg').html("<div class='alert alert-success fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong>&nbsp;&nbsp;<a onclick='location.reload();' href='javascript:void(0);'></a></div>");
				$("#headerMsg").fadeTo(2000, 500).slideUp(500, function(){
					$('#headerMsg').empty();
					location.reload();
				});
			} else if (response.status == 201) {
				$('#headerMsg').html("<div class='alert alert-danger fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
				$("#headerMsg").fadeTo(2000, 500).slideUp(500, function(){
					$('#headerMsg').empty();
				});
			}
			$.unblockUI();
			
		}, 'json');
	});
});
</script>

