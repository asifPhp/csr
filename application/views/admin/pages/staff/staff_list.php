<style>
#headerMsg{	margin:20px 0px;}
.dataTables-example th{	text-align:center;}
.ibox-content{padding: 10px;}
.checkbox{margin-left: 15px;}
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
			$content .= '<td class="text-center">';
				if($value['default']=='0'){
				$content .= '<a href="#" class="edit_module" data-toggle="modal" data-target="#editPasswordModule" name="' . $value[$primary_column_name] . '" value=""><span class="label label-success">Edit</span></a>';
				}
			$content .= '</td>';
		}
		$content .= '<td class="text-center">';
			if($is_permitted['is_other2']){ 
				$content .= '<a href="#" class="define_access" data-toggle="modal" data-target="#browseAccessModal" name="' . $value[$primary_column_name] . '" value=""><span class="label label-info">Define Access</span></a> &nbsp;';
			}
			if(isset($edit_url)){ 
				$content .= '<a href="'.$edit_url.'?id='.$value[$primary_column_name].'" class="edit_module"  name="' . $value[$primary_column_name] . '" value=""><span class="label label-success">Edit</span></a>&nbsp;';
			}
			if($value['default']=='0'){
				
				if(isset($is_remove)){
					$content .= '&nbsp;<a href="javascript:void(0);" class="remove_item" primary_column_name="'.$primary_column_name.'"  table_name="'.$table_name.'" name="' . $value[$primary_column_name] . '"  ><span class="label label-danger">Remove</span></a>';
				}
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
												<th class="text-center">Edit Password</th>
											<?php }?>
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

<!----------------------- Modal for Browse Edit Password level--------------------->
<div class="modal fade" id="editPasswordModule" tabindex="-1" course_package="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #fff;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Edit Password</h3>
            </div> 
            <div class="modal-body row">
				<div class="col-md-12">
					<div id="editPasswordHeadMsg"></div>
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

<!--------------------------- Modal for Browse Access level------------------------>
<!-- Modal -->
<div class="modal fade" id="browseAccessModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Update Staff Access</h4>
      </div>
      <form id="access_define_form" method="post">
      <div class="modal-body">
      	<input type="hidden" name="emp_id2" id="emp_id2" value="0">
      	<div id="accessDefineHeadMsg"></div>
        <div class="form-group">
			<label class="control-label" for="access_define">Access Define<span class="required">*</span></label>		
			<div>
				<?php 
				if($acces_module_list){
					$content='';
					foreach ($acces_module_list as $key => $value) {
						$content.='<div class="form-group">
							<label class="control-label">'.$value['module_name'].'</label>';
						if($value['submodule']){
							foreach ($value['submodule'] as $key => $val) {
								$content.='<div class="checkbox sub_module_items" module_id="'.$val['FK_module_id'].'" submodule_id="'.$val['submodule_id'].'">';
									$content.='<p class="control-label"><strong>'.$val['submodule_name'].' : &nbsp;</strong></p>';
									if($val['show_link']=='yes'){
										$content.='<label class="checkbox-inline">
										  <input type="checkbox" name="submodule" value="add_access" submodule_id="'.$val['submodule_id'].'"> Add
										</label>';
									}
									if($val['show_list']=='yes'){
										$content.='<label class="checkbox-inline">
										  <input type="checkbox" name="submodule" value="list_access" submodule_id="'.$val['submodule_id'].'"class="list_input_click"> List
										</label>';
									}
									if($val['show_edit']=='yes'){
										$content.='<label class="checkbox-inline">
										  <input type="checkbox" name="submodule" value="edit_access" disabled submodule_id="'.$val['submodule_id'].'" class="show_disabled_input_click"> edit
										</label>';
									}
									if($val['show_remove']=='yes'){
										$content.='<label class="checkbox-inline">
										  <input type="checkbox" name="submodule" value="remove_access" disabled submodule_id="'.$val['submodule_id'].'" class="show_disabled_input_click"> remove
										</label>';
									}
									if($val['show_link1']=='yes'){
										$content.='<label class="checkbox-inline">
										  <input type="checkbox" name="submodule" value="other_access_1" disabled submodule_id="'.$val['submodule_id'].'" class="show_disabled_input_click"> '.$val['other_name1'].'
										</label>';
									}
									if($val['show_link2']=='yes'){
										$content.='<label class="checkbox-inline">
										  <input type="checkbox" name="submodule" value="other_access_2" disabled submodule_id="'.$val['submodule_id'].'" class="show_disabled_input_click"> '.$val['other_name2'].'
										</label>';
									}
									if($val['show_link3']=='yes'){
										$content.='<label class="checkbox-inline">
										  <input type="checkbox" name="submodule" value="other_access_3" disabled submodule_id="'.$val['submodule_id'].'" class="show_disabled_input_click"> '.$val['other_name3'].'
										</label>';
									}
								$content.='</div>';
							}
						}
						$content.='</div>';
					}
					echo $content;
				}
				?>
			</div>
		</div>
					
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Save changes</button>
      </div>
  	  </form>
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
			var user_id = $('#query_id2').val();
			var password = $('#password').val();
           
            $.post(APP_URL + 'admin/staff/update_user_password', {
            	user_id: user_id,
                password: password,
            },
			function (response) {
					$.unblockUI();
					//$("html, body").animate({scrollTop: 0}, "slow");
					$('#editPasswordHeadMsg').empty();
					if (response.status == 200) {
						$('#editPasswordHeadMsg').empty();
						
						$('#editPasswordHeadMsg').html("<div class='alert alert-success fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + response.message + "</strong></div>");
						$("#editPasswordHeadMsg").fadeTo(2000, 500).slideUp(500, function(){
							$('#editPasswordHeadMsg').empty();
							$('#editPasswordModule').modal('hide');
							//window.location.href = APP_URL+'account/event/user_organisation_list';
						});

				   } else {
						$('#editPasswordHeadMsg').empty();
						$('#editPasswordHeadMsg').html("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + response.message + "</strong></div>");
						$("#editPasswordHeadMsg").fadeTo(2000, 500).slideUp(500, function(){
							$('#editPasswordHeadMsg').empty();
						});
					}
					
				}, 'json');
		return false;
		}
	});

	$('body').on('click','.list_input_click',function(){
		if($(this).prop("checked") == true){
			$(this).parent().parent().find('.show_disabled_input_click').prop( "disabled", false);
		}else{
			$(this).parent().parent().find('.show_disabled_input_click').prop( "disabled", true);
			$(this).parent().parent().find('.show_disabled_input_click').prop( 'checked',false);
		}
	});
	//------------------------------------------------------------------------
    /*
     * This script is used to fill modal for edit emp
     */

    $('body').on('click', '.define_access', function () {
		$('input[type="checkbox"]').prop('checked',false);
        $.blockUI();
		$('#headerMsg').empty();
        $('#add_emp_form label.error').empty();
        $('#add_emp_form input.error').removeClass('error');
        $('#add_emp_form select.error').removeClass('error');
		$('#emp_id2').val(0);
        $('#emp_name2').text('');
		$('input[type="checkbox"].submenu').prop('checked',false);
        var emp_id = $(this).attr('name');
        var emp_name = $(this).closest('tr').find('td:eq(1)').text();
		
        $('#emp_id2').val(emp_id);
        $('#emp_name2').text(emp_name);
		
		/*Now Fetching emp access detail*/
	   $.post(APP_URL+'admin/staff/get_emp_accessibility_detail',{
			emp_id : emp_id,
		},function(response){
			$.unblockUI();
			if(response.status==200){
				$(response.data).each(function(key,val){
					var module_id = val['module_id'];
					var submodule_id = val['submodule_id'];
					if(val['add_access']=='yes'){
						$('input[type="checkbox"][submodule_id="'+submodule_id+'"][value="add_access"]').prop('checked',true);
					}
					if(val['edit_access']=='yes'){
						$('input[type="checkbox"][submodule_id="'+submodule_id+'"][value="edit_access"]').prop('checked',true);
					}
					if(val['list_access']=='yes'){
						$('input[type="checkbox"][submodule_id="'+submodule_id+'"][value="list_access"]').prop('checked',true);
						$('input[type="checkbox"][submodule_id="'+submodule_id+'"][value="list_access"]').parent().parent().find('.show_disabled_input_click').prop( "disabled", false);
					}
					if(val['remove_access']=='yes'){
						$('input[type="checkbox"][submodule_id="'+submodule_id+'"][value="remove_access"]').prop('checked',true);
					}
					if(val['other_access_1']=='yes'){
						$('input[type="checkbox"][submodule_id="'+submodule_id+'"][value="other_access_1"]').prop('checked',true);
					}
					if(val['other_access_2']=='yes'){
						$('input[type="checkbox"][submodule_id="'+submodule_id+'"][value="other_access_2"]').prop('checked',true);
					}
					if(val['other_access_3']=='yes'){
						$('input[type="checkbox"][submodule_id="'+submodule_id+'"][value="other_access_3"]').prop('checked',true);
					}
				});
			}else{
				
				return false;
			}
		},'json');
		/*now opening the modal*/
		//$('#browseAccessModal').modal('show');
    });

    //-----------------------------------------------------------------------
    /* 
     * validation of access_define
     */
	$('#access_define_form').validate({
		ignore: [],
        rules: {
            submodule: {
                required: true,
            },
        },
		messages: {
			submodule: {
                required: "At least one Sub Menu is required.",
            },
		},
		errorPlacement: function(error, element) {
            if (element.hasClass('submenu')) {
					error.insertAfter(element.closest('div.form-group').find('.submenu-error'));
			}else  {
                error.insertAfter(element);
            }
		},
		submitHandler: function (form) {
			$.blockUI();
			$('#access_define_form').find('button[type="submit"]').prop('disabled',true);
			var emp_id = $('#emp_id2').val();
			var access_define = [];
			
			$('.sub_module_items').each(function(){
				var data={
					emp_id : emp_id,
					module_id : $(this).attr('module_id'),
					submodule_id : $(this).attr('submodule_id'),
					add_access : 'no',
					edit_access : 'no',
					list_access : 'no',
					remove_access : 'no',
					other_access_1 : 'no',
					other_access_2 : 'no',
					other_access_3 : 'no',
				};
				var value='';
				$(this).find('input[type="checkbox"]:checked').each(function(){
					//console.log($(this).parent().find('span').text());
					value=$(this).val();

					data[value]='yes';
				});
				if(value){
					access_define.push(data);
				}
				
			});
			console.log(access_define);
			console.log(emp_id);
			/*
			var subject_list = [];
			$('.checked_category:checked').each(function(key,value){
				var subject_id = $(this).attr('category_id');
				subject_list[key] = subject_id;
			});
			console.log(subject_list);
			*/
            $.post(APP_URL + 'admin/staff/update_accessibility', {
                emp_id: emp_id,
                access_define: access_define,
            },
			function (response) {
				//$("html, body").animate({scrollTop: 0}, "slow");
                $('#accessDefineHeadMsg').empty();
				if (response.status == 200) {
                    var message = response.message;
					
					$('#accessDefineHeadMsg').html("<div class='alert alert-success fade in'>  <button class='close' type='button' data-dismiss='alert'>x</button><strong>" + message + "</strong></div>");
                    $("#accessDefineHeadMsg").fadeTo(2000, 500).slideUp(500, function(){
						$('#accessDefineHeadMsg').empty();
						$('#browseAccessModal').modal('hide');
						window.location.reload();
					});
				} else if (response.status == 201) {
                    $('#accessDefineHeadMsg').html("<div class='alert alert-danger fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
                    $("#accessDefineHeadMsg").fadeTo(2000, 500).slideUp(500, function(){
						$('#accessDefineHeadMsg').empty();
					}); 
                }				
				$.unblockUI();
				$('#access_define_form').find('button[type="submit"]').prop('disabled',false);
				
			}, 'json');
		return false;
		},
	});
	
	$('body').on('click', '.remove_item', function () {	
		if (!confirm("Do you want to delete")) {
            return false;
        }	
		$.blockUI();
        var id = $(this).attr('name');
        var primary_column_name = $(this).attr('primary_column_name');
        var table_name = $(this).attr('table_name');
		$.post(APP_URL + 'admin/common/remove', {
			id: id,
			table_name: table_name,
			primary_column_name: primary_column_name,
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

