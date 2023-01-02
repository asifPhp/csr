<style>
.marBot20{
	margin-bottom:20px;
}
.checkbox{margin-left: 15px;}


</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	
	<?php
	$page_heading = '';
    $heading = '';
    

	if($profile_data ){
        $page_heading = 'View Profile';
        $heading = 'Edit Profile';
		
		$first_name=$profile_data['first_name'];
		$last_name=$profile_data['last_name'];
		$staff_email=$profile_data['staff_email'];
		$staff_mobile=$profile_data['staff_mobile'];
		$staff_profile_image=$profile_data['staff_profile_image'];      
        $is_readonly="readOnly" ;
    }
		
	?>
    <section class="content-header">
            <a href="<?php echo base_url();?>ngo/proposals/list" class="btn btn-default pull-right">List All</a>
     
        
        <h1 >
          <?php echo $page_heading; ?>
          <small ></small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <input type="hidden" class="form-control" id="prop_id" name="prop_id" value="<?php ?>"> 
                <div id="err_add_plan"></div>
                <!-- general form elements -->
                              
				<!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title" ><?php echo $page_heading;?></h3>
                        <a href="<?php echo base_url();?>ngo/access/profile_edit"><button type="button" class="btn btn-default pull-right ">Edit</button></a>
                    </div>
                    <div class="box-body">
               			<div class="form-group row">
							<label for="title" class="col-md-3 text-right">First Name <span class="required is_edit_data display_none">*</span></label>
							<div class="col-md-9"> 
								<span class="is_edit_hide" ><?php echo $first_name;?></span>
							</div>
						</div>

                        <div class="form-group row">
                            <label for="title" class="col-md-3 text-right">Last Name <span class="required is_edit_data display_none">*</span></label>
                            <div class="col-md-9"> 
                                <span class="is_edit_hide" ><?php echo $last_name;?>
                                 
                             </span>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="title" class="col-md-3 text-right">Email <span class="required is_edit_data display_none">*</span></label>
                            <div class="col-md-9"> 
                                <span class="is_edit_hide" ><?php echo $staff_email;?></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-md-3 text-right">Mobile<span class="required is_edit_data display_none">*</span></label>
                            <div class="col-md-9"> 
                                <span class="is_edit_hide" ><?php echo $staff_mobile;?></span>
                            </div>
                        </div>
						<div class="form-group row">
                            <label for="title" class="col-md-3 text-right">Entity<span class="required is_edit_data display_none">*</span></label>
                            <div class="col-md-9"> 
                                <span class="is_edit_hide" >
									<?php if($ngo_data){
										$ngo_name=$ngo_data[0]['legal_name'];
									echo $ngo_name;}?>
								</span>
                            </div>
                        </div>
						<div class="form-group row">
                            <label for="title" class="col-md-3 text-right">User Type <span class="required is_edit_data display_none">*</span></label>
                            <div class="col-md-9"> 
                                <span class="is_edit_hide" >
									<?php if($role_data){
										$role_name=$role_data[0]['role_name'];
									echo $role_name;}?>
								</span>
                            </div>
                        </div>
						
						<div class="form-group row">
							<label for="title" class="col-md-3 text-right">Profile Image<span class="required is_edit_data display_none">*</span></label>
								<div class="col-lg-8">
										<div class="image-preview inline_block" id="staff_profile_image_view">
										<img src="<?php echo base_url();?>uploads/<?php if($profile_data){ echo $profile_data['staff_profile_image']; } ?>" style="width:200px;">
									</div>
								</div>
						</div>

                	  
                        <div class="form-group row">
                       

						<div class="form-group row" style="display:none;">
							<label for="code" class="col-md-3 text-right">Code <span class="required is_edit_data display_none">*</span></label>
							<div class="col-md-9"> 
								<span class="is_edit_hide" ><?php echo $code;?></span>
							</div>
						</div>
                    </div>
					
                </div>
				
				
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <div class="modal fade" id="submitConformModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
        <h4 class="modal-title" id="myModalLabel">Alert</h4>
      </div>
      <div class="modal-body">
        Are You sure you want to submit?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancle</button>
        <button type="button" class="btn btn-primary finail_proposal_submit">Submit</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="submitErrorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
        <h4 class="modal-title" id="myModalLabel">Alert</h4>
      </div>
      <div class="modal-body">
        you have not filling all required information?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Continue</button>
        <button type="button" class="btn btn-primary green_request_submit">Request green chanal</button>
      </div>
    </div>
  </div>
</div>
<script>
$('document').ready(function(){
    
    $("body").on("click",".edit_click",function(){
        var this_data=$(this);
        this_data.parent().parent().find(".is_edit_hide").addClass("display_none");
        this_data.parent().parent().find(".is_edit_data").removeClass("display_none");
    });
	
	$('#proposal_step1_form').validate({
        ignore:[],
        rules: {
            organisation_id: {
                required: true,
            },
            ngo_id: {
                required: true,
            },
        },
        messages: {
            organisation_id: {
                required: "Organisation is required.",
            },
            ngo_id: {
                required: "NGO is required.",
            },
        },
        submitHandler: function (form) {
            //$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /> Just a moment...</h1>' });
            
            $('#page1').removeClass('active');
            $('#page2').addClass('active');
            return false;
        }
    });

    $('#proposal_step2_form').validate({
        ignore:[],
        rules: {
            title: {
                required: true,
            },
           /* code: {
                required: true,
                remote:{
                    url: APP_URL + "ngo/proposals/check_entity_code",
                    type: "post",
                    data: {
                        param: 'Entity',
                    }
                }
            },*/
        },
        messages: {
            title: {
                required: "Title is required",
            },
           /* code: {
                required: "Code is required.",
                remote: "This code is assinged to an proposals.",
            },*/
        },
        submitHandler: function (form) {
            //$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /> Just a moment...</h1>' });
            
            finail_entity_submit();
            return false;
        }
    });

    function finail_entity_submit(){
        var prop_id = $('#prop_id').val();
        var code = $('#code').val();

        var table_field = [];
        table_field={
            title : $('#title').val(),
            organisation_id : $('#organisation_id').val(),
            ngo_id : $('#ngo_id').val(),
        };
       
        $.post(APP_URL + 'ngo/proposals/update_proposals', {
            prop_id: prop_id,
            //code: code,
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
                    window.location.href = APP_URL+'ngo/proposals/list';
                });
           } else {
                $('#err_add_plan').empty();
                $('#err_add_plan').html("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + response.message + "</strong></div>");
                $("#err_add_plan").fadeTo(2000, 500).slideUp(500, function(){
                    $('#err_add_plan').empty();
                });
            }
        }, 'json');
    }

     $("body").on("click",".submit_proposal",function(){
        var is_valid=0;
        $("html, body").animate({scrollTop: 0}, "slow");
         $('#err_add_plan').empty();
        if(!$('#title').val()){
            is_valid=1;
            message="title is required";
            //$('#err_add_plan').empty();
            $('#err_add_plan').append("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + message + "</strong></div>");
            /*$("#err_add_plan").fadeTo(2000, 500).slideUp(500, function(){
                //$('#err_add_plan').empty();
            });*/
        }
        if(!$('#code').val()){
            is_valid=1;
            message="code is required";
            //$('#err_add_plan').empty();
            $('#err_add_plan').append("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + message + "</strong></div>");
            /*$("#err_add_plan").fadeTo(2000, 500).slideUp(500, function(){
                //$('#err_add_plan').empty();
            });*/
        }
        if(!$('#organisation_id').val()){
            is_valid=1;
            message="organisation is required";
            //$('#err_add_plan').empty();
            $('#err_add_plan').append("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + message + "</strong></div>");
            /*$("#err_add_plan").fadeTo(2000, 500).slideUp(500, function(){
                //$('#err_add_plan').empty();
            });*/
        }
        if(!$('#ngo_id').val()){
            is_valid=1;
            message="NGO is required";
            //$('#err_add_plan').empty();
            $('#err_add_plan').append("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + message + "</strong></div>");
            /*$("#err_add_plan").fadeTo(2000, 500).slideUp(500, function(){
                $('#err_add_plan').empty();
            });*/
        }
        var gc_requested=$(this).attr('gc_requested');
        var gc_granted=$(this).attr('gc_granted');
        if(is_valid==0 || gc_granted=='yes'){
            $('#submitConformModal').modal('show');
        }else{
            if(gc_requested=='no')
                $('#submitErrorModal').modal('show');
        }
    }) 

    $("body").on("click",".finail_proposal_submit",function(){
        var prop_id = $('#prop_id').val();

        var table_field = [];
        table_field={
            is_submit : 1,
            proposal_status : 'Submitted',
        };
       
        $.post(APP_URL + 'ngo/proposals/submit_proposals', {
            prop_id: prop_id,
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
                    window.location.href = APP_URL+'ngo/proposals/edit?id='+prop_id;
                });
           } else {
                $('#err_add_plan').empty();
                $('#err_add_plan').html("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + response.message + "</strong></div>");
                $("#err_add_plan").fadeTo(2000, 500).slideUp(500, function(){
                    $('#err_add_plan').empty();
                });
            }
        }, 'json');
    })
    $("body").on("click",".green_request_submit",function(){
        var prop_id = $('#prop_id').val();

        var table_field = [];
        table_field={
            gc_requested : 'yes',
        };
       
        $.post(APP_URL + 'ngo/proposals/submit_proposal_gcrequest', {
            prop_id: prop_id,
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
                    window.location.href = APP_URL+'ngo/proposals/edit?id='+prop_id;
                });
           } else {
                $('#err_add_plan').empty();
                $('#err_add_plan').html("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + response.message + "</strong></div>");
                $("#err_add_plan").fadeTo(2000, 500).slideUp(500, function(){
                    $('#err_add_plan').empty();
                });
            }
        }, 'json');
    })
});
</script>