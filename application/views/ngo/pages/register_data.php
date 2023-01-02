<style>
	body{background-image: url(<?php echo base_url();?>assets/img/bg1.jpg); background-repeat: no-repeat; background-size: 100% 100%;}
	html {    background-color: #2D66B3;}
	.skin-blue .wrapper, .skin-blue .main-sidebar, .skin-blue .left-side {
	    background-color: transparent;
	}
	.login-logo a, .register-logo a{color:#fff;}
	.login-box, .register-box{background-color: #10ACD6}
	.login-logo{margin-bottom: 6px;}
</style>
<div class="login-box">
	<div class="login-logo">
	    <a href="javascript:void(0);"><?php echo PROJECT_NAME_REGISTER;?></a>
	</div>
  	<!-- /.login-logo -->
  	<div class="login-box-body">
   		<p class="login-box-msg">Sign Up to Create a New NGO</p>
		
   		<form id="ngoRegistrationForm"  role="form" method="post">
			<div id="errHeadMsg"></div>
			<p class="login-box-msg " style="color:red">
			Warning: You must be a Trust/Society/Section 25/Section 8 company, and you must have valid CSR-1 and 80G registrations to apply for grants.
			</p>
		    <div class="form-group">
                <label for="brand_name">Name of Main/Parent Brand of Organisation<span class="required">*</span></label>
                <input type="text" class="form-control" id="brand_name" name="brand_name" placeholder="Name of Main/Parent Brand of Organisation">
            </div>
			<!--<div class="form-group">
              <label for="legal_name">Leagal Name of Ngo <span class="required">*</span></label>
              <input type="text" class="form-control" id="legal_name" name="legal_name" placeholder="Leagal Name of Ngo">
            </div>-->
            <div class="form-group">
              <label for="first_name">Owner First Name <span class="required">*</span></label>
              <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Owner First Name">
            </div>
            <div class="form-group">
              <label for="last_name">Owner Last Name <span class="required">*</span></label>
              <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Owner Last Name">
            </div>
			<div class="form-group">
              <label for="staff_email">Owner Email <span class="required">*</span></label>
              <input type="email" class="form-control" id="staff_email" name="staff_email" placeholder="Owner Email">
            </div>
            <div class="form-group">
              <label for="staff_password">Password <span class="required">*</span></label>
              <input type="Password" class="form-control" id="staff_password" name="staff_password" placeholder="Password">
            </div>
            <div class="form-group">
              <label for="conform_password">Confirm Password<span class="required">*</span></label>
              <input type="Password" class="form-control" id="conform_password" name="conform_password" placeholder="Confirm Password">
            </div>
            <div class="form-group">
	          <button type="submit" class="btn btn-success btn-block btn-flat">CREATE ACCOUNT</button>
	        </div>
        </form>
        <a href="<?php echo base_url();?>ngo/login" class="text-center">Sign In</a>
    </div>
    <!-- /.box-body -->
</div>

<script>
$('document').ready(function(){ 

	$('#ngoRegistrationForm').validate({
		ignore:[],
        rules: {
            brand_name: {
                required: true,
            },
            /*legal_name: {
                required: true,
            },*/
            first_name: {
                required: true,
            },
            last_name: {
                required: true,
            },
            staff_email: {
                required: true,
            },
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
            ngo_name: {
                required: "Name Of Super NGO is required",
            },
            /*legal_name: {
                required: "Leagal Name of Ngo is required",
            },*/
            first_name: {
                required: "Owner First Name is required",
            },
            last_name: {
                required: "Owner Last Name is required",
            },
            staff_email: {
                required: "Owner Email is required",
            },
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
			$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" />	</h1>' });

			var staff_password = $('#staff_password').val();

            var super_ngo = [];
			super_ngo={
				brand_name : $('#brand_name').val(),
			};
            /*var table_field = [];
            table_field={
                legal_name : $('#legal_name').val(),
            };*/
			var owner_field = [];
			owner_field={
				first_name : $('#first_name').val(),
                last_name : $('#last_name').val(),
				staff_email : $('#staff_email').val(),
			};
           
            $.post(APP_URL + 'ngo/register/register_submit', {
                super_ngo: super_ngo,
                //table_field: table_field,
                owner_field: owner_field,
                staff_password: staff_password,
            },
            function (response) {
				$.unblockUI();
				$("html, body").animate({scrollTop: 0}, "slow");
                $('#errHeadMsg').empty();
                if (response.status == 200) {
                    $('#errHeadMsg').empty();
                    $('#errHeadMsg').html("<div class='alert alert-success fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + response.message + "</strong></div>");
                    $("#ngoRegistrationForm")[0].reset();
					$("#errHeadMsg").fadeTo(2000, 500).slideUp(500, function(){
						$('#errHeadMsg').empty();
						//window.location.href = APP_URL+'ngo/login';
                        window.location.href = APP_URL+'ngo/entity/create';
					});
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