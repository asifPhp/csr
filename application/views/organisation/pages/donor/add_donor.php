<style>
.marBot20{
	margin-bottom:20px;
}
.checkbox{margin-left: 15px;}
.input_description{font-weight: 400;}
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
	
	<?php
	$heading = '';
  $page_heading = '';
	
	if($donor_data ){
		$page_heading = 'Edit Donor Entity';
        $heading = 'Donor Details';
        $is_page_edit="";
		    $donor_id =$donor_data['donor_id']; 
		    $legal_name =$donor_data['legal_name'];  
        $brand_name =$donor_data['brand_name'];  
		    $code =$donor_data['code'];  
        $pan_number =$donor_data['pan_number'];  
        $redistered_address =$donor_data['redistered_address'];  
        $city =$donor_data['city'];  
        $state =$donor_data['state'];  
        $pincode =$donor_data['pincode'];  
        $pan_image =$donor_data['pan_image'];  
        $auth_sign =$donor_data['auth_sign'];  
        $logo_image =$donor_data['logo_image'];  
        $donor_image =$donor_data['donor_image'];  
        $art_image =$donor_data['art_image'];  
        $facebook =$donor_data['facebook'];  
        $instagram =$donor_data['instagram'];  
        $twitter =$donor_data['twitter'];  
        $linkedin =$donor_data['linkedin'];  

        $is_editable='readOnly';
		$disp_cmt_op='';
		$disp_cmt_cl='';
	}else{
		$page_heading = 'Add a New Donor Entity';
        $heading = 'Donor Details';
        $is_page_edit="display_none";
		    $donor_id =0;
		    $legal_name ='';
        $brand_name ='';
		    $code ='';
        $pan_number ='';
        $redistered_address ='';
        $city ='';
        $state ='';
        $pincode ='';
        $pan_image ='';
        $auth_sign ='';
        $logo_image ='';
        $donor_image ='';
        $art_image ='';
        $facebook ='';
        $instagram ='';
        $twitter ='';
        $linkedin ='';
		$is_editable='';
		$disp_cmt_op='<!--';
		$disp_cmt_cl='-->';
	}
		
	?>

  <section class="content-header">
			  	<a href="<?php echo base_url();?>organisation/donor/list" class="btn btn-default pull-right">List All</a>
    <h1>
        <?php echo $page_heading; ?>
        <small></small>
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
              <h3 class="box-title"><?php echo $heading?></h3>
              <?php if($is_page_edit){if($is_permitted['is_list']){ ?>
			  <?php }}?>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="donor_form" method="post" role="form">
              <div class="box-body">
				        <input type="hidden" class="form-control" id="donor_id" name="donor_id" value="<?php echo $donor_id;?>"> 
			           <div id="err_add_plan"></div>
                <div class="form-group">
                  <label for="legal_name">Legal name of donor <span class="required">*</span></label><br/>
                  <label for="input_description" class="input_description" > As mentioned in registration documents</label>
                  <input type="text" class="form-control" id="legal_name" name="legal_name" placeholder="Enter name here" value="<?php echo $legal_name;?>">
                  <input type="hidden"  id="is_page_edit" name="is_page_edit" value="<?php echo $is_page_edit;?>">
                </div>
                <div class="form-group">
                  <label for="code">Donor Acronym (code) <span class="required">*</span></label><br/>
                  <label class="input_description">Must be a maximum of 6 characters</label><br/>
                  <label class="error input_description" >NOTE: This code CANNOT be changed in the future</label>
                  <input type="text" <?php echo $is_editable?> class="form-control" id="code" name="code" placeholder="Enter code here" value="<?php echo $code;?>">
                </div>
                <div class="form-group <?php echo $is_page_edit; ?>">
                  <label for="brand_name">Brand Name <span class="required">*</span></label>
                  <input type="text" class="form-control" id="brand_name" name="brand_name" placeholder="Brand Name" value="<?php echo $brand_name;?>">
                </div>
                <div class="form-group <?php echo $is_page_edit; ?>">
                  <label for="pan_number">PAN Number <span class="required">*</span></label>
                  <input type="text" class="form-control" id="pan_number" name="pan_number" placeholder="PAN Number" value="<?php echo $pan_number;?>">
                </div> 
                <div class="form-group <?php echo $is_page_edit; ?>">
					<div class="row">	
						<div class="col-md-3">
							<label for="pan_number">PAN Card Photo/Scan <span class="required">*</span></label><br>
							<button type="button" class="btn btn-primary btn-lg croppie_upload_image_click"> <i class="fa fa-upload"></i> </button>
							<input type="file" class="croppie_upload_image" image_input_id="pan_image" image_preview_div_id="org_logo_view" accept="image/*" style="display: none;" />
							<input class="form-control" id="pan_image" name="pan_image" type="hidden" value="<?php echo $pan_image; ?>">
						</div>
						<div class="col-md-9">
							<div class="image-preview inline_block" id="org_logo_view">
								<?php if($pan_image ){ 
								?>
								<img src="<?php echo base_url();?>uploads/<?php echo $pan_image ?>" style="width:200px;">
								<?php }else{
								?>
								<img src="" style="width:200px;">
								<?php }
								?>
							</div>
						</div>
					</div>
                </div> 
							
				<?php echo $disp_cmt_op;?> <h4>Registered Address &nbsp;</h4><?php echo $disp_cmt_cl;?>
				<div class="panel panel-default <?php echo $is_page_edit; ?>">
					<div class=" panel-body">
						<div class="row">
							<div class="form-group col-md-6 <?php echo $is_page_edit; ?>">
							  <label for="redistered_address">Street Address <span class="required">*</span></label>
							  <input type="text" class="form-control" id="redistered_address" name="redistered_address" placeholder="Street Address" value="<?php echo $redistered_address;?>">
							</div>
							<div class="form-group col-md-6 <?php echo $is_page_edit; ?>">
							  <label for="city">City <span class="required">*</span></label>
							  <input type="text" class="form-control" id="city" name="city" placeholder="city" value="<?php echo $city;?>">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-6 <?php echo $is_page_edit; ?>">
							  <label for="state">State <span class="required">*</span></label>
								<select name="state" id="state" class="form-control">
									<option value=""> Select State </option>
									<?php 
									if($state_data){
									  foreach ($state_data as $key => $value) {
										$selected='';
										if($state==$value['name']){ $selected= 'selected'; }
										echo '<option '.$selected.' value="'.$value['name'].'">'.$value['name'].'</option>';
									  }
									}
									  ?>
								</select>
							</div>
							<div class="form-group  col-md-6 <?php echo $is_page_edit; ?>">
							  <label for="pincode">Pin Code <span class="required">*</span></label>
							  <input type="number" class="form-control" id="pincode" name="pincode" placeholder="pincode" value="<?php echo $pincode;?>">
							</div>
						</div>
									
					</div>
				</div>
				
				
                <div class="form-group <?php echo $is_page_edit; ?>">
                  <label for="auth_sign">Full Name of Authorised Signatory <span class="required">*</span></label>
                  <input type="text" class="form-control" id="auth_sign" name="auth_sign" placeholder="Full Name " value="<?php echo $auth_sign;?>">
                </div>
				
                <div class="form-group <?php echo $is_page_edit; ?>">
					<div class="row">	
						<div class="col-md-3">
							<label for="pan_number">Primary Logo</label><br>
							<button type="button" class="btn btn-primary btn-lg croppie_upload_image_click"> <i class="fa fa-upload"></i> </button>
							<input type="file" class="croppie_upload_image" image_input_id="logo_image" image_preview_div_id="org_logo" accept="image/*" style="display: none;" />
							<input class="form-control" id="logo_image" name="logo_image" type="hidden" value="<?php echo $logo_image; ?>">
						</div>
						<div class="col-md-9">
							<div class="image-preview inline_block" id="org_logo">
								<?php if($logo_image ){ 
								?>
								<img src="<?php echo base_url();?>uploads/<?php echo $logo_image ?>" style="width:200px;padding: 15px;">
								<?php }else{
								?>
								<img src="" style="width:200px;padding: 15px;">
								<?php }
								?>
							</div>
						</div>
					</div>
                  
                </div>
                <div class="form-group row <?php echo $is_page_edit; ?>">
					<div class="col-md-3">
						<label for="pan_number">All Donor Artwork</label><br>
						<button type="button" class="btn btn-primary btn-lg croppie_upload_image_click"> <i class="fa fa-upload"></i> </button>
                    	<input type="file" class="croppie_upload_image" image_input_id="donor_image" image_preview_div_id="org_art_view" accept="image/*" style="display: none;" />
						<input class="form-control" id="donor_image" name="donor_image" type="hidden" value="<?php echo $donor_image; ?>">
					</div>
					<div class="col-md-9">
						<div class="image-preview inline_block" id="org_art_view">
							<?php if($donor_image ){ 
							?>
							<img src="<?php echo base_url();?>uploads/<?php echo $donor_image ?>" style="width:200px;padding: 15px;">
							<?php }else{
							?>
							<img src="" style="width:200px;padding: 15px;">
							<?php }
							?>
						</div>
					</div>
                  
                </div>
                <div class="form-group <?php echo $is_page_edit; ?>">
                 	<div class="row"> 
						<div class="col-md-3">
							<label for="pan_number">Instructions on how Doners are permitted to use the artwork <span class="required">*</span></label><br>
							<button type="button" class="btn btn-primary btn-lg croppie_upload_image_click"> <i class="fa fa-upload"></i> </button>
							<input type="file" class="croppie_upload_image" image_input_id="art_image" image_preview_div_id="org_artwork_view" accept="image/*" style="display: none;" />
							<input class="form-control" id="art_image" name="art_image" type="hidden" value="<?php echo $art_image; ?>">
						</div>
						<div class="col-md-9">
							<div class="image-preview inline_block" id="org_artwork_view">
								<?php if($art_image ){ 
								?>
								<img  src="<?php echo base_url();?>uploads/<?php echo $art_image ?>" style="width:200px;padding: 15px;">
								<?php }else{
								?>
								<img src="" style="width:200px; padding: 15px;">
								<?php }
								?>
							</div>
						</div>
					</div>
                </div>
				
                <div class="form-group <?php echo $is_page_edit; ?>">
                  <label for="facebook">Facebook</label>
                  <input type="url" class="form-control" id="facebook" name="facebook" placeholder="facebook" value="<?php echo $facebook;?>">
                </div>
                <div class="form-group <?php echo $is_page_edit; ?>">
                  <label for="instagram">Instagram</label>
                  <input type="url" class="form-control" id="instagram" name="instagram" placeholder="instagram" value="<?php echo $instagram;?>">
                </div>
                <div class="form-group <?php echo $is_page_edit; ?>">
                  <label for="twitter">Twitter</label>
                  <input type="url" class="form-control" id="twitter" name="twitter" placeholder="twitter" value="<?php echo $twitter;?>">
                </div>
                <div class="form-group <?php echo $is_page_edit; ?>">
                  <label for="linkedin">LinkedIn</label>
                  <input type="url" class="form-control" id="linkedin" name="linkedin" placeholder="linkedin" value="<?php echo $linkedin;?>">
                </div>
				
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
				<?php if($donor_id > 0){ ?>
					<a href="<?php echo base_url();?>organisation/donor/index?id=<?php echo $donor_id;?>"><button type="button" class="btn btn-default" id="save_goto_next_step1">Cancel</button></a>
				<?php }else{ ?>
					<a href="<?php echo base_url();?>organisation/donor/list"><button type="button" class="btn btn-default" id="save_goto_next_step1">Cancel</button></a>
				<?php } ?>

				<?php 
					if($is_page_edit){
						$button='<button type="submit" class="btn btn-success">Create</button>';
						echo $button;
					}else{
						$button='<button type="button" class="btn btn-success save_changes">Save Changes</button>';
						echo $button;
					}
				?>
				
              </div>
            </form>
          </div>
          <!-- /.box -->

        </div>

      </div>
      <!-- /.row -->

      
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  
<?php $this->load->view('single_image_upload_croppie');?>   
<script>
$('document').ready(function(){

  $.validator.addMethod("pan", function(value, element)
    {
        return this.optional(element) || /^[A-Z]{5}\d{4}[A-Z]{1}$/.test(value);
    }, "Invalid Pan Number");

	$('#donor_form').validate({
		//ignore:[],
        rules: {
            legal_name: {
                required: true,
            },
            brand_name: {
                required: true,
            },
             code: {
                required: true,
                maxlength: 6,
            },
            pan_number: {
                required: true,
                pan: true,
            },
            redistered_address: {
                required: true,
            },
            city: {
                required: true,
            },
             state: {
                required: true,
            },
            pincode: {
                required: true,
            },
             pan_image: {
                required: true,
            },
            auth_sign: {
                required: true,
            },
            art_image: {
                required: true,
            },
        },
        messages: {
            legal_name: {
                required: "Legal name of donor is required",
            },
            brand_name: {
                required: "brand name is required.",
            },
            code: {
                required: "Donor Acronym (code) is required",
                maxlength: "Max 6 characters allowed",
            },
            pan_number: {
                required: "pan number is required.",
            },
            redistered_address: {
                required: "redistered address is required",
            },
            city: {
                required: "city is required.",
            },
            state: {
                required: "state is required",
            },
            pincode: {
                required: "pincode is required.",
            },
            pan_image: {
                required: "pan image is required",
            },
            auth_sign: {
                required: "auth sign is required.",
            },
            art_image: {
                required: "art image is required",
            },
        },
        submitHandler: function (form) {
			$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
			
            var donor_id = $('#donor_id').val();

            var table_field = [];
			table_field={
				legal_name : $('#legal_name').val(),
				brand_name : $('#brand_name').val(),
				code : $('#code').val(),
				pan_number : $('#pan_number').val(),
				redistered_address : $('#redistered_address').val(),
				city : $('#city').val(),
				state : $('#state').val(),
				pincode : $('#pincode').val(),
				pan_image : $('#pan_image').val(),
				auth_sign : $('#auth_sign').val(),
				logo_image : $('#logo_image').val(),
				donor_image : $('#donor_image').val(),
				art_image : $('#art_image').val(),
				facebook : $('#facebook').val(),
				instagram : $('#instagram').val(),
				twitter : $('#twitter').val(),
				linkedin : $('#linkedin').val(),
			};
           
            $.post(APP_URL + 'organisation/donor/update_donor', {
                donor_id: donor_id,
                table_field: table_field,
            },
            function (response) {
				$.unblockUI();
				$("html, body").animate({scrollTop: 0}, "slow");
                $('#err_add_plan').empty();
                if (response.status == 200) {
					var is_page_edit = $('#is_page_edit').val();
                    $('#err_add_plan').empty();
                    $('#err_add_plan').html("<div class='alert alert-success fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + response.message + "</strong></div>");
					$("#err_add_plan").fadeTo(2000, 500).slideUp(500, function(){
						$('#err_add_plan').empty();
						if(is_page_edit){
							window.location.href = APP_URL+'organisation/donor/index?id='+response.last_id;
						}else{
							window.location.href = APP_URL+'organisation/donor/index?id=<?php echo $donor_id;?>';
						}
						
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
	
	$('body').on('click', '.save_changes', function() {
		$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
			
		var donor_id = $('#donor_id').val();

		var table_field = [];
		table_field={
			legal_name : $('#legal_name').val(),
			brand_name : $('#brand_name').val(),
			code : $('#code').val(),
			pan_number : $('#pan_number').val(),
			redistered_address : $('#redistered_address').val(),
			city : $('#city').val(),
			state : $('#state').val(),
			pincode : $('#pincode').val(),
			pan_image : $('#pan_image').val(),
			auth_sign : $('#auth_sign').val(),
			logo_image : $('#logo_image').val(),
			donor_image : $('#donor_image').val(),
			art_image : $('#art_image').val(),
			facebook : $('#facebook').val(),
			instagram : $('#instagram').val(),
			twitter : $('#twitter').val(),
			linkedin : $('#linkedin').val(),
		};
	   
		$.post(APP_URL + 'organisation/donor/update_donor', {
			donor_id: donor_id,
			table_field: table_field,
		},
		function (response) {
			$.unblockUI();
			$("html, body").animate({scrollTop: 0}, "slow");
			$('#err_add_plan').empty();
			if (response.status == 200) {
				var is_page_edit = $('#is_page_edit').val();
				$('#err_add_plan').empty();
				$('#err_add_plan').html("<div class='alert alert-success fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + response.message + "</strong></div>");
				$("#err_add_plan").fadeTo(2000, 500).slideUp(500, function(){
					$('#err_add_plan').empty();
					if(is_page_edit){
						window.location.href = APP_URL+'organisation/donor/index?id='+response.last_id;
					}else{
						window.location.href = APP_URL+'organisation/donor/index?id=<?php echo $donor_id;?>';
					}
					
				});
		   } else {
				$('#err_add_plan').empty();
				$('#err_add_plan').html("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + response.message + "</strong></div>");
				$("#err_add_plan").fadeTo(2000, 500).slideUp(500, function(){
					$('#err_add_plan').empty();
				});
			}
		}, 'json');
	}); 
     
});
</script>