<style>
body{background-image: url(<?php echo base_url();?>assets/img/bg1.jpg); background-repeat: no-repeat; background-size: 100% 100%;}
html {    background-color: #2D66B3;}
.skin-blue .wrapper, .skin-blue .main-sidebar, .skin-blue .left-side {
    background-color: transparent;
}
.login-logo a, .register-logo a{color:#fff;}
.login-box, .register-box{background-color: #2D66B3}
</style>
<div class="login-box">
  <div class="login-logo">
    <a href="javascript:void(0);"><?php echo PROJECT_NAME;?></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
	<div id="err_login_form"></div>
    <form id="userLoginForm"  role="form" method="post">
      <div class="form-group has-feedback">
		<label>Email address</label>
        <input type="email" name="loginUserEmail" id="loginUserEmail" class="form-control" placeholder="Email">
      </div>
      <div class="form-group has-feedback">
		<label>Password</label>
        <input type="password" name="loginPassword" id="loginPassword" class="form-control" placeholder="Password">
      </div>
      <div class="row" style="margin-left: 8px;">
        <div class="col-xs-8">
          <div class="checkbox icheck" style="display:none;">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center" style="display:none;">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div>
    <!-- /.social-auth-links -->

    <a href="#" style="display:none;">I forgot my password</a><br>
    <a  style="display:none;" href="register.html" class="text-center">Register a new membership</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<script>
$('document').ready(function () {

	/* 
     * add_user_form validation
     */
    $('#userLoginForm').validate({
        //ignore: [],
		rules: {
            loginUserEmail: {
                required: true,
            },
			loginPassword: {
                required: true,
			}
        },
        messages: {
            loginUserEmail: {
                required: "Email is required",
            },
			loginPassword: {
                required: "Password is required",
            }
        },
        submitHandler: function (form) {
            var loginUserEmail = $('#loginUserEmail').val();
            var loginPassword = $('#loginPassword').val();

            $.post(APP_URL + 'admin/admin/check_login_credentials', {
                loginUserEmail: loginUserEmail,
                loginPassword: loginPassword,
            },
            function (response) {
				//$("html, body").animate({scrollTop: 0}, "slow");
                $('#err_login_form').empty();
               	if (response.status ==200) {
                    var message = response.message;
					
					$('#err_login_form').html("<div class='alert alert-success fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + message + "</strong></div>");
					$("#err_login_form").fadeTo(1000, 500).slideUp(500, function(){
						$('#err_login_form').empty();
						window.location.href = APP_URL+'admin/configure';
					});
					
                }
                else if (response.status == 201) {
                    $('#err_login_form').html("<div class='alert alert-danger fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
					$("#err_login_form").fadeTo(2000, 500).slideUp(500, function(){
						$('#err_login_form').empty();
					});
					
                }
                $('#loginUserEmail').val('');
                $('#loginPassword').val('');
            }, 'json');
            return false;
        }
    });	
	
	
});
</script>