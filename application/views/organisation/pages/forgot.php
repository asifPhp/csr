<style>
body{background-image: url(<?php echo base_url();?>assets/img/bg1.jpg); background-repeat: no-repeat; background-size: 100% 100%;}
html {    background-color: #2D66B3;}
.skin-blue .wrapper, .skin-blue .main-sidebar, .skin-blue .left-side {
    background-color: transparent;
}
.login-logo a, .register-logo a{color:#fff;}
.login-box, .register-box{background-color: #1abb9c}
.login-logo{margin-bottom: 6px;}
</style>
<div class="login-box">
  <div class="login-logo">
    <a href="javascript:void(0);"><?php echo PROJECT_NAME;?></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Forgot Password</p>
	<div id="err_login_form"></div>
    <form id="userForgotForm"  role="form" method="post">
      <div class="form-group has-feedback">
		    <label>Email address <span class="required">*</span></label>
        <input type="email" name="loginUserEmail" id="loginUserEmail" class="form-control" placeholder="Email">
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

          <button type="submit" class="btn btn-success btn-block btn-flat">Submit</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <a href="<?php echo base_url();?>organisation/login" class="text-center">Sign In CSR</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<script>
$('document').ready(function () {

	/* 
     * add_user_form validation
     */
    $('#userForgotForm').validate({
        //ignore: [],
		rules: {
            loginUserEmail: {
                required: true,
                remote:{
                    url: APP_URL + "organisation/login/check_email_availability",
                    type: "post",
                    data: {
                        param: 'login',
                    }
                }
            },
        },
        messages: {
            loginUserEmail: {
                required: "Email is required",
                remote: "Email not register",
            },
        },
        submitHandler: function (form) {
            var loginUserEmail = $('#loginUserEmail').val();
			$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
            $.post(APP_URL + 'organisation/login/forgot_password_submit', {
                loginUserEmail: loginUserEmail,
            },
            function (response) {
				$.unblockUI();
				//$("html, body").animate({scrollTop: 0}, "slow");
                $('#err_login_form').empty();
               	if (response.status ==200) {
                    var message = response.message;
					
					$('#err_login_form').html("<div class='alert alert-success fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + message + "</strong></div>");
					$("#err_login_form").fadeTo(1000, 500).slideUp(500, function(){
						$('#err_login_form').empty();
						window.location.href = APP_URL+'organisation/configure';
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