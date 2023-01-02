
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content-header">
      <h1>
          My Profile Details/ Edit
          <small></small>
        </h1>
    </section>
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Profile</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="profile_update_form" method="post" role="form">
              <div class="box-body">
			       <div id="err_profile_update_form"></div>
                <div class="form-group">
                  <label for="first_name">First Name</label>
                  <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="<?php if($profile_data){ echo $profile_data['first_name']; } ?>">
                </div>
                <div class="form-group">
                  <label for="last_name">Last Name</label>
                  <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="<?php if($profile_data){ echo $profile_data['last_name']; } ?>">
                </div>
                <div class="form-group">
                  <label for="staff_email">Email</label>
                  <input type="email" readonly class="form-control" id="staff_email" name="staff_email" placeholder="Email" value="<?php if($profile_data){ echo $profile_data['staff_email']; } ?>" />
                </div>
                <div class="form-group">
                  <label for="staff_phone_no">Phone Number</label>
                  <input type="number" class="form-control" id="staff_phone_no" name="staff_phone_no" placeholder="Phone Number" value="<?php if($profile_data){ echo $profile_data['staff_phone_no']; } ?>" />
                </div>
                <div class="form-group ">
                  <div class="col-lg-3" >
					<label class="control-label"  for="staff_profile_image">Profile Image</label><br>
					<button type="button" class="btn btn-primary btn-lg croppie_upload_image_click" id="croppie_upload_image_click"> <i class="fa fa-upload"></i> </button>
					<input type="file" name="upload_image" id="upload_image" accept="image/*" style="display: none;" />
                    <input type="file" class="croppie_upload_image" image_input_id="staff_profile_image" image_preview_div_id="staff_profile_image_view" accept="image/*" style="display: none;" />

                    <input class="form-control" id="staff_profile_image" name="staff_profile_image" type="hidden" value="<?php if($profile_data){ echo $profile_data['staff_profile_image']; } ?>">
                  </div>
                  <div class="col-lg-8">
            		<div class="image-preview inline_block" id="staff_profile_image_view">
                      <img src="<?php echo base_url();?>uploads/<?php if($profile_data){ echo $profile_data['staff_profile_image']; } ?>" style="width:200px;">
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <a href="<?php echo base_url();?>organisation/access/profile"><button type="button" class="btn btn-default" id="save_goto_next_step1">Cancel</button></a>
                <button type="submit" class="btn btn-success">Update</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

        </div>
        <div class="col-md-6">
        </div>

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
	<?php $this->load->view('single_image_upload_croppie');?> 
 <script>
 $('document').ready(function(){
$('#profile_update_form').validate({
        rules: {
            first_name: {
                required: true
            }, 
            last_name: {
                required: true
            },
            
        },
        messages: {
            first_name: {
                required: "First Name is required"
            },
            last_name: {
                required: "Last Name is required"
            },
            
        },
        submitHandler: function (form) {

            var staff_email = $('#staff_email').val();
            var table_field = [];
            table_field={
              first_name : $('#first_name').val(),
              last_name : $('#last_name').val(),
              staff_profile_image : $('#staff_profile_image').val(),
              staff_phone_no : $('#staff_phone_no').val(),
            };
            $.post(APP_URL + 'organisation/access/update_profile_data', {
                table_field: table_field,
            },
            function (response) {
				$("html, body").animate({scrollTop: 0}, "slow");
                $('#err_profile_update_form').empty();
                if (response.status == 200) {
                    $('#err_profile_update_form').empty();
                    $('#err_profile_update_form').html("<div class='alert alert-success fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + response.message + "</strong></div>");
               	$("#err_profile_update_form").fadeTo(2000, 500).slideUp(500, function(){
						$('#err_profile_update_form').empty();
						//window.location.href = APP_URL+'organisation/access/profile';
					});

			   }
                else {
                    $('#err_profile_update_form').empty();
                    $('#err_profile_update_form').html("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + response.message + "</strong></div>");
					$("#err_profile_update_form").fadeTo(2000, 500).slideUp(500, function(){
						$('#err_profile_update_form').empty();
					});
				}
            }, 'json');
            return false;
        }
    });
});
 </script>