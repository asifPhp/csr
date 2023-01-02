<style>
.actual_disp3{
	background-color: white !important;
    opacity: 1;
    margin-top: 10px;
    border: none;
    color: #3c8dbc;
}
</style>


<?php if($none_granted_ngo_data){//die;?>
  <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<section class="content-header">
			<h1>Grant Ticket</h1>
		</section>
    <!-- Main content -->
		<section class="content">
			<div class="row">
				<!-- left column -->
				<div class="col-md-12">
				<!-- general form elements -->
					<div class="box box-primary">
						<div class="box-header with-border">
						  <h3 class="box-title">Grant Ticket Details</h3>
						</div>
						<form id="upload_gc_ticket_form" method="post" role="form">
							<div class="box-body">
								<input type="hidden" class="form-control" id="ngo_id" name="ngo_id"  value="<?php if($none_granted_ngo_data){ echo $none_granted_ngo_data[0]['ngo_id']; } ?>">
							   <div id="err_profile_update_form"></div>
								<div class="form-group row">
									<div  class="col-md-2">
										<label for="title">NGO Legal Name</label>
									</div>
									<div class="col-md-10"> 
										<span class="is_edit_hide"><?php if($none_granted_ngo_data){ echo $none_granted_ngo_data[0]['legal_name']; } ?></span>
									</div>
								</div>
								
								<div class="form-group row">
									<div class="col-md-2">
										<label for="org_name">Parent Brand</label>
									</div>
									<div  class="col-md-10">
										<span ><?php if($none_granted_ngo_data){ echo $none_granted_ngo_data[0]['brand_name']; } ?></span>
									</div>
								</div>
								
								<div class="form-group row">
									<div class="col-md-2">
										<label for="org_name">Owner</label>
									</div>
									<div class="col-md-10">
										<span><?php if($none_granted_ngo_data){ echo $none_granted_ngo_data[0]['first_name'].' '.$none_granted_ngo_data[0]['last_name']; } ?></span>
									</div>
								</div>
								
								<div class="form-group row">
									<div class="col-md-2">
										<label for="org_name">Previously Granted</label><br>
									</div>
									<div class="col-md-10">	
										<span ><?php if($none_granted_ngo_data){ echo $none_granted_ngo_data[0]['pre_count']; } ?></span>
									</div>
								</div>
							
								<div class="form-group row ">
								
									<label for="comments" class="col-md-12">Upload signed GC Granting document<span class="required">*</span></label>
									
									<div class="col-md-12">
										<button type="button" id="comman_file_upload_class" name="comman_file_upload_class" image_upload_desc="" upload_type="file" file_count="single" img_primary="no" file_prev_class="cycle_file_upload_selected" file_input_id="cycle_file_upload3" class="btn btn-primary btn-lg comman_file_upload_class" data-toggle="modal" data-target="#browseFile"><i class="fa fa-upload"></i> </button>
										<div class="cycle_file_upload1_error display_none error" style="font-weight: 900;">Signed GC Granting document is required</div>
										<label id="cycle_file_upload_error1" class="required display_none cycle_file_upload_error1">Your file must be less than 10MB in size.</label>
										<div>
											<div class="">
												<input class="form-control cycle_file_upload3 " id="cycle_file_upload3" name="cycle_file_upload3" type="hidden" value="">
											</div>
										   <span class="registration_80g_valid" ></span>
											<div class="image-preview inline_block cycle_file_upload_selected">	
												<input readonly class="form-control is_edit_data  actual_disp3 display_none" type="text" id="actual_disp3"  value="">
											</div>
										</div>
									</div>
								</div>
								
								<div class="box-footer">
									<button type="submit" class="btn btn-success">Grant Ticket</button>
									<a href="<?php echo base_url();?>organisation/gc_requests/index" type="button" class="btn btn-warning">Cancel</a>
								</div>
							</div>
						  <!-- /.box-body -->

							  
						</form>
					</div>
         		</div>
       		</div>
      <!-- /.row -->
		</section>
    <!-- /.content -->
	</div>

<div class="modal fade" id="available_gc_yes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
        <h4 class="modal-title" id="myModalLabel">GC Ticket is Not Use</h4>
      </div>
      <div class="modal-body">
			Use the execting ticket before creating a new ticket
		</div>
	  <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Okay</button>
        <!--<button type="button" class="btn btn-primary green_request_submit">Use Ticket</button>-->
      </div>
    </div>
  </div>
</div>	
	
<?php }
$data['sub_folder_name']="";
$data['image_cat']="entity";
$this->load->view('file_upload',$data);
?>
<script>
$('document').ready(function(){
	
    $('body').on('change','#state_id',function(){
        var state_id=$(this).val();
        $('#district_id').val('');
        $('#district_id').find('option').addClass("display_none");
        $('#district_id').find('option[value=""]').removeClass("display_none");

        $('#district_id').find('option[state_id="'+state_id+'"]').removeClass("display_none");
    });  

    $('#upload_gc_ticket_form').validate({
        rules: {
            cycle_file_upload3: {
                required: true
            },
        },
        messages: {
            cycle_file_upload3: {
                required: "Signed GC Granting document is required"
            },
        },
        submitHandler: function (form) {
			var is_error='no';
			var cycle_file_upload3 =$('#cycle_file_upload3').val();
			var actual_disp3 =$('#actual_disp3').val();
			var ngo_id =$('#ngo_id').val();
			if(cycle_file_upload3){
					 $(".cycle_file_upload1_error").addClass('display_none');
			}else{
				is_error='yes';
				$(".cycle_file_upload1_error").removeClass('display_none');
			}
			console.log("asdf");
			console.log(cycle_file_upload3);
			console.log(actual_disp3);
			console.log(ngo_id);
			if(is_error=='no'){
				$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
				$.post(APP_URL + 'organisation/gc_requests/submit_gc_ticket', {
				   cycle_file_upload3:cycle_file_upload3,
				   actual_disp3:actual_disp3,
				   ngo_id:ngo_id,
				},
				function (response) {
					$.unblockUI();
					$("html, body").animate({scrollTop: 0}, "slow");
					$('#err_profile_update_form').empty();
					
					if (response.status == 200) {
						if(response.popup_show=='yes'){
							$('#available_gc_yes').modal('show');
						}else{
							$('#err_profile_update_form').empty();
							$('#err_profile_update_form').html("<div class='alert alert-success fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + response.message + "</strong></div>");
							$("#err_profile_update_form").fadeTo(2000, 500).slideUp(500, function(){
							$('#err_profile_update_form').empty();
							window.location.href = APP_URL+'organisation/gc_requests/index';
							});
						}

				   }
					else {
						$('#err_profile_update_form').empty();
						$('#err_profile_update_form').html("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + response.message + "</strong></div>");
						$("#err_profile_update_form").fadeTo(2000, 500).slideUp(500, function(){
							$('#err_profile_update_form').empty();
						});
					}
				}, 'json');
			}
            return false;
        }
    });
});
 </script>