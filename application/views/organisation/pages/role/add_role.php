<style>
.marBot20{
	margin-bottom:20px;
}
.checkbox{margin-left: 15px;}
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     	<a href="<?php echo base_url();?>organisation/staff/staff_list" class="btn btn-default pull-right">List All</a>
			   <h1>
        Role
      </h1>

    </section>

	
	<?php
	$heading = '';
	
	if($role_data ){
		$heading = 'Edit Role';
		$role_id =$role_data['role_id']; 
		$role_name =$role_data['role_name'];  
	}else{
		$heading = 'Add New Role';
		$role_id =0;
		$role_name ='';
	}
		
	?>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $heading?></h3>
              <?php if($is_permitted['is_list']){ ?>
			  <?php }?>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="role_form" method="post" role="form">
              <div class="box-body">
				<input type="hidden" class="form-control" id="role_id" name="role_id" value="<?php echo $role_id;?>"> 
			  <div id="err_add_plan"></div>
                <div class="form-group">
                  <label for="role_name">Role name</label>
                  <input type="text" class="form-control" id="role_name" name="role_name" placeholder="Role name" value="<?php echo $role_name;?>">
                </div>
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
										$is_disabled='disabled';
										$is_add='';
										$is_edit='';
										$is_list='';
										$is_remove='';
										$is_other1='';
										$is_other2='';
										$is_other3='';
										if($role_access_data){
											foreach ($role_access_data as $key => $access) {
												if($access['submodule_id']==$val['submodule_id']){
													if($access['add_access']=='yes'){ $is_add='checked';}
													if($access['edit_access']=='yes'){ $is_edit='checked';}
													if($access['list_access']=='yes'){
														$is_list='checked'; 
														$is_disabled= '';
													}
													if($access['remove_access']=='yes'){ $is_remove='checked';}
													if($access['other_access_1']=='yes'){ $is_other1='checked';}
													if($access['other_access_2']=='yes'){ $is_other2='checked';}
													if($access['other_access_3']=='yes'){ $is_other3='checked';}
												}
											}
										}
										$content.='<div class="checkbox sub_module_items" module_id="'.$val['FK_module_id'].'" submodule_id="'.$val['submodule_id'].'">';
											$content.='<p class="control-label"><strong>'.$val['submodule_name'].' : &nbsp;</strong></p>';
											if($val['show_link']=='yes'){
												$content.='<label class="checkbox-inline">
												  <input type="checkbox" name="submodule" '.$is_add.' value="add_access" submodule_id="'.$val['submodule_id'].'"> Add
												</label>';
											}
											if($val['show_list']=='yes'){
												$content.='<label class="checkbox-inline">
												  <input type="checkbox" name="submodule" '.$is_list.' value="list_access" submodule_id="'.$val['submodule_id'].'"class="list_input_click"> List
												</label>';
											}
											if($val['show_edit']=='yes'){
												$content.='<label class="checkbox-inline">
												  <input type="checkbox" name="submodule" '.$is_edit.' value="edit_access" '.$is_disabled.' submodule_id="'.$val['submodule_id'].'" class="show_disabled_input_click"> edit
												</label>';
											}
											if($val['show_remove']=='yes'){
												$content.='<label class="checkbox-inline">
												  <input type="checkbox" name="submodule" '.$is_remove.' value="remove_access" '.$is_disabled.' submodule_id="'.$val['submodule_id'].'" class="show_disabled_input_click"> remove
												</label>';
											}
											if($val['show_link1']=='yes'){
												$content.='<label class="checkbox-inline">
												  <input type="checkbox" name="submodule" '.$is_other1.' value="other_access_1" '.$is_disabled.' submodule_id="'.$val['submodule_id'].'" class="show_disabled_input_click"> '.$val['other_name1'].'
												</label>';
											}
											if($val['show_link2']=='yes'){
												$content.='<label class="checkbox-inline">
												  <input type="checkbox" name="submodule" '.$is_other2.' value="other_access_2" '.$is_disabled.' submodule_id="'.$val['submodule_id'].'" class="show_disabled_input_click"> '.$val['other_name2'].'
												</label>';
											}
											if($val['show_link3']=='yes'){
												$content.='<label class="checkbox-inline">
												  <input type="checkbox" name="submodule" '.$is_other3.' value="other_access_3" '.$is_disabled.' submodule_id="'.$val['submodule_id'].'" class="show_disabled_input_click"> '.$val['other_name3'].'
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
  
<script>
$('document').ready(function(){
	$('body').on('click','.list_input_click',function(){
		if($(this).prop("checked") == true){
			$(this).parent().parent().find('.show_disabled_input_click').prop( "disabled", false);
		}else{
			$(this).parent().parent().find('.show_disabled_input_click').prop( "disabled", true);
			$(this).parent().parent().find('.show_disabled_input_click').prop( 'checked',false);
		}
	});

	$('#role_form').validate({
		ignore:[],
        rules: {
            role_name: {
                required: true,
            },
            submodule: {
                required: true,
            },
        },
        messages: {
            role_name: {
                required: "Role name is required",
            },
            submodule: {
                required: "At least one Sub Menu is required.",
            },
        },
        submitHandler: function (form) {
			$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /> Just a moment...</h1>' });
			
            var role_id = $('#role_id').val();

            var table_field = [];
			table_field={
				role_name : $('#role_name').val(),
			};

			var access_define = [];
			
			$('.sub_module_items').each(function(){
				var data={
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
           
            $.post(APP_URL + 'organisation/role/update_roles', {
                role_id: role_id,
                table_field: table_field,
                access_define: access_define,
            },
            function (response) {
				$.unblockUI();
				$("html, body").animate({scrollTop: 0}, "slow");
                $('#err_add_plan').empty();
                if (response.status == 200) {
                    $('#err_add_plan').empty();
                    $('#err_add_plan').html("<div class='alert alert-success fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + response.message + "</strong></div>");
					$("#err_add_plan").fadeTo(2000, 500).slideUp(500, function(){
						$('#err_add_plan').empty();
						window.location.href = APP_URL+'organisation/staff/staff_list';
					});
			   } else {
                    $('#err_add_plan').empty();
                    $('#err_add_plan').html("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + response.message + "</strong></div>");
					$("#err_add_plan").fadeTo(2000, 500).slideUp(500, function(){
						$('#err_add_plan').empty();
					});
				}
            }, 'json');
            return false;
        }
    });
});
</script>