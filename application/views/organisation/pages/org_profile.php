
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Organisation Profile</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="profile_update_form" method="post" role="form">
              <div class="box-body">
			       <div id="err_profile_update_form"></div>
                <div class="form-group">
                  <label for="org_name">Name</label>
                  <input type="text" class="form-control" id="org_name" name="org_name" placeholder="Name" value="<?php if($profile_data){ echo $profile_data['org_name']; } ?>">
                </div>
                <div class="form-group row">
                  <label class="col-lg-3 control-label"  for="org_logo">Organisation Logo</label>
                  <div class="col-lg-8">
                    <button type="button" class="btn btn-primary btn-lg croppie_upload_image_click"> <i class="fa fa-upload"></i> </button>

                    <input type="file" class="croppie_upload_image" image_input_id="org_logo" image_preview_div_id="org_logo_image_view" accept="image/*" style="display: none;" />

                    <input class="form-control" id="org_logo" name="org_logo" type="hidden" value="<?php if($profile_data){ echo $profile_data['org_logo']; } ?>">

                    <div class="image-preview inline_block" id="org_logo_image_view">
                      <img src="<?php echo base_url();?>uploads/<?php if($profile_data){ echo $profile_data['org_logo']; } ?>" style="width:200px;">
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
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
    $('body').on('change','#state_id',function(){
        var state_id=$(this).val();
        $('#district_id').val('');
        $('#district_id').find('option').addClass("display_none");
        $('#district_id').find('option[value=""]').removeClass("display_none");

        $('#district_id').find('option[state_id="'+state_id+'"]').removeClass("display_none");
    });  

    $('#profile_update_form').validate({
        rules: {
            org_name: {
                required: true
            },
        },
        messages: {
            org_name: {
                required: "Name is required"
            },
        },
        submitHandler: function (form) {

            var table_field = [];
            table_field={
              org_name : $('#org_name').val(),
              org_logo : $('#org_logo').val(),
            };
            $.post(APP_URL + 'organisation/access/update_ngo_profile_data', {
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
						window.location.href = APP_URL+'organisation/configure';
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