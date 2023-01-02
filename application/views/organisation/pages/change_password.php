
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Change Password</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="change_password_form" method="post" role="form">
              <div class="box-body">
			   <div id="err_change_password_form"></div>
                <div class="form-group">
                  <label for="old_password">Old Password</label>
                  <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Old Password">
                </div>
				<div class="form-group">
                  <label for="new_password">New Password</label>
                  <input type="password" class="form-control"  id="new_password" name="new_password" placeholder="New Password">
                </div>
                <div class="form-group">
                  <label for="confirm_password">Confirm Password</label>
                  <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
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
 <script>
 $('document').ready(function(){
$('#change_password_form').validate({
        rules: {
            old_password: {
                required: true
            },
            new_password: {
                required: true,
                minlength: 6,
            },
            confirm_password: {
                required: true,
                equalTo: "#new_password"
            }

        },
        messages: {
            old_password: {
                required: "Old Password is required"
            },
            new_password: {
                required: "New Password is required",
                minlength: "Atleast 6 character Required",
                pwcheck: "Atleast One lower case Character." + '<br/>' + "Atleast One Upper case Character." + '<br/>' + "Atleast One Digit" + '<br/>' + "Contain any one of thses !\-@._*"
            },
            confirm_password: {
                required: "Confirm Password is required",
                equalTo: "Confirm Password should be same as New Password"
            }
        },
        submitHandler: function (form) {
            var old_password = $('#old_password').val();
            var new_password = $('#new_password').val();

            $.post(APP_URL + 'organisation/access/update_password', {
                old_password: old_password,
                new_password: new_password
            },
            function (response) {
				$("html, body").animate({scrollTop: 0}, "slow");
                $('#err_change_password_form').empty();
                if (response.status == 200) {
                    $('#err_change_password_form').empty();
                    $('#err_change_password_form').html("<div class='alert alert-success fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + response.message + "</strong></div>");
               	$("#err_change_password_form").fadeTo(2000, 500).slideUp(500, function(){
						$('#err_change_password_form').empty();
						window.location.href = APP_URL+'organisation/configure';
					});

			   }
                else {
                    $('#err_change_password_form').empty();
                    $('#err_change_password_form').html("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + response.message + "</strong></div>");
					$("#err_change_password_form").fadeTo(2000, 500).slideUp(500, function(){
						$('#err_change_password_form').empty();
					});
				}
				
				$('#old_password').val('');
                $('#new_password').val('');
				$('#confirm_password').val('');
            }, 'json');
            return false;
        }
    });
});
 </script>