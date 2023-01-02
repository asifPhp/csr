

<!-- Modal -->
<div class="modal fade" id="superNGOModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="margin-top:80px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <!-- form start -->
      <form id="profile_update_form" method="post" role="form">
        <div class="modal-body">
			<div id="err_profile_update_form"></div>
            <div class="form-group">
              <label for="brand_name">Brand Name</label>
              <input type="text" class="form-control" id="brand_name" name="brand_name" placeholder="Name" value="<?php if($profile_data){ echo $profile_data['brand_name']; } ?>">
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
    $('#profile_update_form').validate({
        rules: {
            brand_name: {
                required: true
            },
        },
        messages: {
            brand_name: {
                required: "Brand Name is required"
            },
        },
        submitHandler: function (form) {

            var table_field = [];
            table_field={
                brand_name : $('#brand_name').val(),
            };
            $.post(APP_URL + 'ngo/entity/update_ngo_profile_data', {
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
                        window.location.reload();
						//window.location.href = APP_URL+'ngo/configure';
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