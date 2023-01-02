<style>
.marBot20{
	margin-bottom:20px;
}
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        
      </h1>

    </section>

	
	<?php
	$heading = '';
	
	if($profile_data ){
		$heading = 'Edit Staff Profile';
		$user_id =$profile_data['user_id']; 
		$user_role_id =$profile_data['user_role_id']; 
		$user_name =$profile_data['user_name']; 
		$user_email =$profile_data['user_email']; 
		$phone_no =$profile_data['phone_no']; 
		$profile_picture =$profile_data['profile_picture']; 
    $is_readonly='readonly';  
	}else{
		$heading = 'Add New Staff Profile';
		$user_id =0;
		$user_role_id ='';
		$user_name ='';
		$user_email ='';
		$phone_no ='';
		$profile_picture ='default_profile.jpg';
    $is_readonly='';
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
			  	<a href="<?php echo base_url();?>admin/staff/staff_list" class="btn btn-default pull-right">All User List</a>
			  <?php }?>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="plan_form" method="post" role="form">
              <div class="box-body">
				<input type="hidden" class="form-control" id="user_id" name="user_id" value="<?php echo $user_id;?>"> 
			  <div id="err_add_plan"></div>
                <div class="form-group">
                  <label for="user_name">Staff Role</label>
                  <select class="form-control" id="user_role_id" name="user_role_id">
                  	<option value="">select</option>
                  	<?php 
                  	if($role_data){
                  		foreach ($role_data as $key => $value) {
                  			$is_selected='';
                  			if($user_role_id==$value['role_id']){
                  				$is_selected='selected';
                  			}
                  			echo '<option '.$is_selected.' name="'.$value['role_id'].'" value="'.$value['role_name'].'">'.$value['role_name'].'</option>';
                  		}
                  	}
                  	?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="user_name">Staff name</label>
                  <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Staff name" value="<?php echo $user_name;?>">
                </div>
				<div class="form-group">
                  <label for="user_email">Staff email</label>
                  <input type="text" class="form-control" id="user_email" name="user_email" placeholder="Staff email" value="<?php echo $user_email;?>" <?php echo $is_readonly;?>>
                </div>
				<div class="form-group">
                  <label for="plan_charge">Staff Phone no</label>
                  <input type="number" class="form-control"  id="phone_no" min="0" name="phone_no" placeholder="Staff Phone no" value="<?php echo $phone_no;?>">
                </div>
               <div class="form-group">
					<label class="col-lg-3 control-label"  for="slider_image">Staff Profile image</label>
					<div class="col-lg-8">
						<button type="button" class="btn btn-primary btn-lg croppie_upload_image_click"> <i class="fa fa-upload"></i> </button>
						<input type="file" class="croppie_upload_image" image_input_id="profile_picture" image_preview_div_id="profile_picture_view" accept="image/*" style="display: none;" />

						<input class="form-control" id="profile_picture" name="profile_picture" type="hidden" value="<?php echo $profile_picture; ?>">

						<div class="image-preview inline_block" id="profile_picture_view">
							<?php if($profile_picture ){
							?>
								<img src="<?php echo base_url();?>uploads/<?php echo $profile_picture ?>" style="width:200px;">
							<?php }else{
							?>
								<img src="" style="width:200px;">
							<?php }
							?>
						</div>
					</div>
				</div>
				
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
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

	$('#plan_form').validate({
		ignore:[],
        rules: {
            user_role_id: {
                required: true,
            },
            profile_picture: {
                required: true,
            },
            phone_no: {
                required: true,
            },
			user_email: {
                required: true,
            },
			user_name: {
                required: true,
            }
        },
        messages: {
            user_name: {
                required: "Staff name is required",
            },
            user_email: {
                required: "Staff email is required",
            },
			phone_no: {
                required: "Staff phone no select period",
            },
			      profile_picture: {
                required: "Image is required",
            },
            user_role_id: {
                required: "Staff role is required",
            }
        },
        submitHandler: function (form) {
			$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /> Just a moment...</h1>' });
			
            var user_id = $('#user_id').val();

            var table_field = [];
			table_field={
				user_name : $('#user_name').val(),
				user_email : $('#user_email').val(),			
				phone_no : $('#phone_no').val(),
				profile_picture : $('#profile_picture').val(),
				user_role_id : $('#user_role_id option:selected').attr('name'),
				user_role : $('#user_role_id option:selected').attr('value'),
				status : 'Active',
			};
           
            $.post(APP_URL + 'admin/staff/update_user_profile', {
                user_id: user_id,
                table_field: table_field,
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
						window.location.href = APP_URL+'admin/staff/staff_list';
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