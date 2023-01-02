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
   		<p class="login-box-msg">Reset Password</p>
   		<form id="ngoResetPasswordForm"  role="form" method="post">
			<div id="errHeadMsg"></div>
            <input type="hidden" id="verify_code" value="<?php if(isset($_GET['v'])){ echo $_GET['v'];}?>">
            <input type="hidden" id="email_data" value="<?php if(isset($_GET['e'])){ echo $_GET['e'];}?>">
            <div class="form-group after_reset_passsord">
              <label for="staff_password">Password <span class="required">*</span></label>
              <input type="Password" class="form-control" id="staff_password" name="staff_password" placeholder="Password">
            </div>
            <div class="form-group after_reset_passsord">
              <label for="conform_password">Confirm Password<span class="required">*</span></label>
              <input type="Password" class="form-control" id="conform_password" name="conform_password" placeholder="Confirm Password">
            </div>
            <div class="form-group after_reset_passsord">
	          <button type="submit" class="btn btn-success btn-block btn-flat">Submit</button>
	        </div>
        </form>
        <a href="<?php echo base_url();?>organisation/login" class="text-center">Sign In</a>
    </div>
    <!-- /.box-body -->
</div>

<script>
$('document').ready(function(){
	$('#ngoResetPasswordForm').validate({
		ignore:[],
        rules: {
            staff_password: {
                required: true,
				minlength:6
			},
			conform_password: {
                required: true,
				equalTo : "#staff_password",
            },
        },
        messages: {
            staff_password: {
                required: "Password is required",
				minlength: "At least 6 characters are requried ",
            },
			conform_password: {
                required: "this is required",
				equalTo: " passwords don't match.",
            },
        },
        submitHandler: function (form) {
			$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });

			var staff_password = $('#staff_password').val();
            var verify_code = $('#verify_code').val();
            var email_data = $('#email_data').val();
           
            $.post(APP_URL + 'organisation/login/reset_password_submit', {
                verify_code: verify_code,
                email_data: email_data,
                staff_password: staff_password,
            },
            function (response) {
				$.unblockUI();
				$("html, body").animate({scrollTop: 0}, "slow");
                $('#errHeadMsg').empty();
                if (response.status == 200) {
                    $('#errHeadMsg').empty();
                    $('#errHeadMsg').html("<div class='alert alert-success fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + response.message + "</strong></div>");
                    
					
					$('.after_reset_passsord').addClass('display_none');
					//$("#errHeadMsg").fadeTo(2000, 500).slideUp(500, function(){
					//	$('#errHeadMsg').empty();
					//	window.location.href = APP_URL+'organisation/login';
					//});
					/*$("#errHeadMsg").fadeTo(2000, 500).slideUp(500, function(){
						$('#errHeadMsg').empty();

						$("#ngoRegistrationForm")[0].reset()
						//window.location.href = APP_URL+'organisation/login';
					});*/
			   } else {
                    $('#errHeadMsg').empty();
                    $('#errHeadMsg').html("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + response.message + "</strong></div>");
					$("#errHeadMsg").fadeTo(2000, 500).slideUp(500, function(){
						$('#errHeadMsg').empty();
					});
				}
            }, 'json');
            return false;
        }
    });
});
</script>