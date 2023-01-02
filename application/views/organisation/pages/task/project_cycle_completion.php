<link rel="stylesheet" href="<?php echo base_url()?>assets/css/comboTreePlugin.css">
<script src="<?php echo base_url()?>assets/js/comboTreePlugin.js"></script>
<style>
#headerMsg{	margin:20px 0px;}
.dataTables-example th{	text-align:center;}
.ibox-content{padding: 10px;}
[data-toggle="collapse"] .fa:before {  
  content: "\f139";
}

[data-toggle="collapse"].collapsed .fa:before {
  content: "\f13a";
}
.cycle_html_div .marBot20{padding-top: 5px;}
.comboTreeInputBox{background-color: #fff !important;
    opacity: 1;border-radius: 0px !important;}
.modal-backdrop.in{display:none;opacity:0;}
#upload_80G_reg{background-color: #fff;}
.readonly_date{
	background-color: white !important;
}
.upload_input{
	background-color: white !important;
    opacity: 1;
    width: 430px;
    margin-left: 88px;
    margin-top: 6px;
    color: #3c8dbc;
   
}
</style>

<?php
	// var_dump($data_value);
	if($data_value){
		$superngo_id = $data_value[0]['superngo_id']; 
		$ngo_id = $data_value[0]['ngo_id']; 
		$comments = $data_value[0]['comments'];
		$org_task_id = $data_value[0]['org_task_id']; 
		$project_id = $data_value[0]['project_id']; 
		$status = $data_value[0]['status']; 
		$superngo_details = $this->db->get_where('superngo',array('id' =>$superngo_id))->result();
		$org_task_list_id=$data_value[0]['org_task_list_id'];
		$org_id=$data_value[0]['org_id'];
		$prop_id=$data_value[0]['prop_id'];
		$org_staff_id=$data_value[0]['org_staff_id'];
	}else{
		$superngo_id = 0;
		$ngo_id =  0;
		$comments = '';
		$org_task_id =  0;
		$project_id =  0;
		$status ='';
		$superngo_details ='';
		$org_task_list_id= 0;
		$org_id= 0;
		$prop_id= 0;
		$org_staff_id= 0;
		
	}
?>
<div class="animated fadeInRight">
		<div class="row">
			<div class="col-lg-12">
				<div class="ibox float-e-margins">
					<div class="ibox-content">
					<div id="head_ngo_review"></div>
					<input type="hidden" class="form-control" id="org_staff_id" name="org_staff_id" value="<?php echo $org_staff_id; ?>">		
					<input type="hidden" class="form-control" id="org_task_id" name="org_task_id" value="<?php echo $org_task_id; ?>">
					<input type="hidden" class="form-control" id="org_task_list_id" name="org_task_list_id" value="<?php echo $org_task_list_id; ?>">
					<input type="hidden" class="form-control" id="org_id" name="org_id" value="<?php echo $org_id; ?>">
					<input type="hidden" class="form-control" id="prop_id" name="prop_id" value="<?php echo $prop_id; ?>">
					<input type="hidden" class="form-control" id="superngo_id" name="superngo_id" value="<?php echo $superngo_id; ?>">
					<input type="hidden" class="form-control" id="project_id" name="project_id" value="<?php echo $project_id; ?>">
					<input type="hidden" class="form-control" id="ngo_id" name="ngo_id" value="<?php echo $ngo_id; ?>">
											
							<!--<div class="form-group row">
								<label for="organisation_id" class="col-md-3 text-right">NGO Name </label>
								<div class="col-md-9"> 
									<span class="is_edit_hide"><?php //echo $superngo_details[0]->brand_name; ?></span>
								</div>
							</div>-->		
					<div class="row">
						<div class="col-lg-6">
							<?php $this->load->view('organisation/pages/task/ngo_information_collapse'); ?>
						</div>
						<div class="col-lg-6">
							<?php $this->load->view('organisation/pages/task/Task_cycle_details_review'); ?>
						    <div class="box box-primary">
								<div class="box-header with-border " data-widget="collapse">
									<i class="fa btn btn-box-tool fa_plus fa-minus"></i>
									<h3 class="box-title"><?php echo $data_value[0]['org_task_label']; ?></h3>
								</div>
								<div class="box-body" >
		   							<div class="form-group row  col-md-12">
										<label class="form-control-label "> Whether Payment was done or not <span class="required">*</span>
										<input id="payment_radio_yes" type="radio" name="payment_radio" value="yes" class="payment_radio"> Yes
										<input id="payment_radio_no" class="payment_radio" type="radio" name="payment_radio" value="no"> No</label>
										<label class="error is_payment_checked_error display_none " >Please select any one </label>
									</div>
									<div  class="is_payment_disp display_none" >
										<div class="form-group row ">
										   <label for="comments" class="col-md-12">Amount disbursed<span class="required">*</span> </label>
											<div class="col-md-12"> 
												<input type="number" id="disbursed_amount" name="disbursed_amount" class="form-control" placeholder="Enter amount here">
											</div>
											<label class="error disbursed_amount_error col-lg-12 display_none " >Amount disbursed is required </label>
											<label class="error disbursed_amount_error1 col-lg-12 display_none " >Please enter valid number greater than 0 </label>
										</div>
										
										<div class="form-group row ">
											<label class="col-md-4">Proof of Payment <span class="required">*</span> </label>
											<div class="col-lg-8">
												<button type="button" id="comman_file_upload_class" name="comman_file_upload_class" image_upload_desc="" upload_type="file" file_count="single" img_primary="no" file_prev_class="cycle_file_upload_selected" file_input_id="cycle_file_upload" class="btn btn-primary btn-lg comman_file_upload_class" data-toggle="modal" data-target="#browseFile"><i class="fa fa-upload"></i> </button>
												<label class="error proof_of_payment_error display_none" >Attachment is required </label>
												<div class="">
												  <input class="form-control cycle_file_upload " id="cycle_file_upload" name="cycle_file_upload" type="hidden" value="">
												</div>
												<span class="registration_80g_valid" ></span>
												<div class="image-preview inline_block cycle_file_upload_selected">
													<input readonly class="form-control is_edit_data display_none upload_input" type="text" id="upload_80G_reg" value="" style="border:none;">
												</div>
												<div class="">
													<div id="cycle_file_upload_error" class="cycle_file_upload_error display_none">
														<label class="required">Attachment is required.</label>
													</div>
												</div>
												<div class="">
													<div id="cycle_file_upload_error" class="cycle_file_upload_error display_none">
														<label class="required">Attachment is required.</label>
													</div>
												</div>
												
											</div>
										</div>
									</div>
									<div class="form-group row ">
									   <label for="comments" class="col-md-12">Notes for this /next cycle</label>
										<div class="col-md-12"> 
											<textarea id="notes" name="notes" class="form-control" placeholder="Enter notes here" rows="3" ></textarea>
										</div>
							        </div>
									<div class="row">
										<div class="col-md-12">
											<div class="button">
											<button type="button" <?php if($status == 'Completed'){echo 'disabled';}?> id="submit_cycle_completion<?php if($status == 'Completed'){echo 'disabled';}?>" class="btn btn-primary">Make Cycle as Complete</button>
											</div>
										</div>
							   		</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
	$data['sub_folder_name']="";
    $data['image_cat']="entity";
    $this->load->view('file_upload',$data);
	?>
  
<script>
$('document').ready(function(){
	
	 $('body').on('click','#payment_radio_no',function(){
		$('.is_payment_disp').addClass('display_none'); 
	}); 
	 
    $('body').on('click','#payment_radio_yes',function(){
		$('.is_payment_disp').removeClass('display_none'); 

	});
	
	$('body').on('click','#submit_cycle_completion', function () {
		var is_error='no';
		var disbursed_amount = $('#disbursed_amount').val();
		var payment_file_value = $('#cycle_file_upload').val();
		var payment_value_actual = $('#upload_80G_reg').val();
		var project_cycle_id = $('#project_cycle_id').val();
		var notes = $('#notes').val();
		var org_task_id=$('#org_task_id').val();
		var org_task_list_id=$('#org_task_list_id').val();
		var org_id=$('#org_id').val();
		var prop_id=$('#prop_id').val();
		var superngo_id=$('#superngo_id').val();
		var ngo_id=$('#ngo_id').val();
		var org_staff_id=$('#org_staff_id').val();
		var project_id=$('#project_id').val();
		
		var is_payment = $('.payment_radio:checked').val();
		 if(is_payment){
				$('.is_payment_checked_error').addClass('display_none');
				if(is_payment=='yes'){
					if(disbursed_amount!=''){
						$('.disbursed_amount_error').addClass('display_none');
						if(disbursed_amount>0){
						$('.disbursed_amount_error1').addClass('display_none');
						}else{
							is_error='yes';	
							$('.disbursed_amount_error1').removeClass('display_none');
						}
					}else{
						is_error='yes';	
						$('.disbursed_amount_error').removeClass('display_none');
					}
					
					if(payment_file_value!=''){
						$('.proof_of_payment_error').addClass('display_none');
					}else{
						is_error='yes';	
						$('.proof_of_payment_error').removeClass('display_none');
					}
					
				}
		}else{
			is_error='yes';
			$('.is_payment_checked_error').removeClass('display_none');
		}
		
		console.log(payment_file_value);
		console.log(payment_value_actual);
		var additional_json = [];
		additional_json.push({
			'disbursed_amount':disbursed_amount,
			'payment_file_value':payment_file_value,
			'payment_value_actual':payment_value_actual,
			'is_payment':is_payment,
			'notes':notes,
			'project_id':project_id,
			
		});
		if(is_error=='no'){
			$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
			$.post(APP_URL + 'organisation/tasks/change_status_cycle_completion', {
				additional_json:additional_json,
				//comments: comments,
				org_task_id:org_task_id, 
				org_task_list_id:org_task_list_id,
				org_id:org_id,
				prop_id:prop_id,
				superngo_id:superngo_id,
				ngo_id:ngo_id,
				org_staff_id:org_staff_id,
				project_id: project_id,
				project_cycle_id:project_cycle_id,			
						
			},
			function (response) {
				$.unblockUI();
				$('#head_ngo_review').empty();
				if (response.status == 200) {
					var message = response.message;
					$("html, body").animate({scrollTop: 0}, "slow");               
					$('#head_ngo_review').html("<div class='alert alert-success fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
					$("#head_ngo_review").fadeTo(2000, 500).slideUp(500, function(){
						$('#head_ngo_review').empty();
						window.location.href=APP_URL+"organisation/tasks/mytasks";
					});
				} else {
					$('#head_ngo_review').html("<div class='alert alert-danger fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
					$("#head_ngo_review").fadeTo(2000, 500).slideUp(500, function(){
						$('#head_ngo_review').empty();
					});
				}	
				
			}, 'json');
		}
		 return false;
	})	
});
</script>

