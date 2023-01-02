
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
.readonly{
	background-color: white;
}
.upload_input{
	background-color: white !important;
    opacity: 1;
    width: 430px;
    margin-left: 88px;
    margin-top: 6px;
    color: #3c8dbc;
   
}
.input_description{font-weight: 400;}
</style>

<?php
	//var_dump($data_value);
	if($data_value){
		$superngo_id = $data_value[0]['superngo_id']; 
		$comments = $data_value[0]['comments'];
		$org_task_id = $data_value[0]['org_task_id']; 
		$project_id= $data_value[0]['project_id'];
		$ngo_id= $data_value[0]['ngo_id'];
		$status = $data_value[0]['status'];	
		$superngo_details = $this->db->get_where('superngo',array('id' =>$superngo_id))->result();
		$org_task_list_id=$data_value[0]['org_task_list_id'];
		$org_id=$data_value[0]['org_id'];
		$prop_id=$data_value[0]['prop_id'];
		$org_staff_id=$data_value[0]['org_staff_id'];
		$is_payment='';
		$target = 'target="_blank"';
	}else{
		$superngo_id = 0;
		$comments = '';
		$org_task_id =  0;
		$project_id=  0;
		$ngo_id=  0;
		$status = 0;
		$superngo_details = '';
		$org_task_list_id= 0;
		$org_id= 0;
		$prop_id= 0;
		$org_staff_id= 0;
		$is_payment='';
		$target = 'target="_blank"';
		
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
<?php 
	$project_cycle_id=0;
	$db_result = $this->db->get_where('project_cycle_details',array('project_id' => $project_id,'is_completed'=>'no'))->result();
	if($db_result){
	$project_cycle_id=$db_result[0]->project_cycle_id;	
	$db_result1 = $this->db->get_where('project_document',array('project_id' => $project_id,'project_cycle_id'=>$project_cycle_id));
	}else{
		$db_result1=0;
	}
	
?>
										
							<div class="box box-primary">
								<div class="box-header with-border" data-widget="collapse">
									<i class="fa btn btn-box-tool fa_plus fa-minus"></i>
									<h3 class="box-title">Cycle Documents from NGO</h3>	</div>
									<div class="box-body" >
											
			            				
					            	<?php 
										if ($db_result1 && $db_result1->num_rows() > 0) {
			           				?>
			           				<label class="form-control-label ">Project Assessment Doucuments required from the NGO for this cycle</label>
       								 <?php
       								 	foreach ($db_result1->result()  as $row) {
       									  if($row->document_type=='ngo_document_list' && $row->document_name!=''){?>
										<div class="form-group row">
											<label class="col-md-2"></label>
											<label for="comments" class="col-md-8 ">
												<input type="hidden" id="ngo_document_type" name="document_type" class="document_type"value="<?php echo $row->document_type;?>">
												<input type="hidden" name="project_document_id" class="project_document_id"value="<?php echo $row->id;?>">
												
												<input type="hidden" name="project_cycle_id" class="project_cycle_id"  value="<?php echo $row->project_cycle_id;?>">
												<label ><?php echo $row->document_name;?></label>
												<a  href="<?php echo base_url()?>uploads/<?php echo $row->document_value;?>"  target="_blank"><?php echo $row->document_value_actual;?></a>
											</label>
												
										</div>
									<?php }}?>
										<div class="form-group row">
											<label class="col-md-2"></label>
											<button type="button" value="<?php if($project_cycle_id){echo $project_cycle_id;}?>" type="button" id="send_notification_by_ngo_doc" class="btn btn-info btn-sm ">Nudge NGO</button>
										</div>
												
									<?php }?>

									
									<?php 

										if ($db_result1 && $db_result1->num_rows() > 0) {
											$payment_no=$db_result1->result();
									?>
										
      								 <?php
      								 	$counter=0;
										$i=0;
       								 	foreach ($db_result1->result()  as $row) {
											//var_dump($db_result1->result());
										if($row->document_type=='payment_processing_doc' && $row->document_name!=''){
											//var_dump($row->document_type);
											$counter=$counter+1;
											//var_dump($counter);
										if($counter==1){
									?>
									  <label class="form-control-label ">Payment Documents required from the NGO for this cycle</label>
									<?php }?>
										
										<div class="form-group row">
											
											<label class="col-md-2"></label>
											<label for="comments" class="col-md-8 ">
												<input type="hidden" id="payment_document_type"name="document_type" class="document_type"value="<?php echo $row->document_type;?>">
												<input type="hidden" name="project_document_id" class="project_document_id"value="<?php echo $row->id;?>">
												
												<input type="hidden" name="project_cycle_id" class="project_cycle_id"  value="<?php echo $row->project_cycle_id;?>">
												<label ><?php echo $row->document_name;?></label>
												<a  href="<?php echo base_url()?>uploads/<?php echo $row->document_value;?>"  target="_blank"><?php echo $row->document_value_actual;?></a>
											</label>
										</div>
																	
										
										
										
										<?php } }
										if($row->document_type=='payment_processing_doc' && $row->document_name!=''){
											?>
											<div class="form-group row">
												<label class="col-md-2"></label>
												<button type="button" id="send_notification_payment_doc" class="btn btn-info btn-sm ">Nudge NGO</button>
											</div>		
										<?php }}?>
								</div>	
							</div>

							<div class="box box-primary">
								<div class="box-header with-border" data-widget="collapse">
									<?php 
										if ($db_result1 && $db_result1->num_rows() > 0) {
									
		           					 ?><i class="fa btn btn-box-tool fa_plus fa-minus"></i>
       									<h3 class="box-title">Cycle Documents</h3>	</div>
       								<div class="box-body" >
										<label class="form-control-label ">Upload assessment documnets for this donation/reporting cycle <span class="required">*</span></label>
										<label for="input_description" class="input_description" >File must be less than 10MB in size</label>
       								 <?php 
			           					 foreach ($db_result1->result() as $row) {
			           					 	if($row->document_type=='csr_document_list' and $row->document_name!=''){?>
										<div class="form-group row">
											 <div class="csr_list_class" >
												<label class="col-md-2"></label>
												<input type="hidden" name="project_document_id" id="project_document_id" value="<?php echo $row->id;?>">
												<input type="hidden" name="project_cycle_id" id="project_cycle_id" value="<?php echo $row->project_cycle_id;?>">
												<label class="csr_label_class" name="<?php echo $row->document_name;?>" type="<?php echo $row->document_type;?>" id=<?php echo $row->id;?> ><?php echo $row->document_name;?></label>
												<button type="button" id="comman_file_upload_class" name="comman_file_upload_class" image_upload_desc="" upload_type="file" file_count="single" img_primary="no" file_prev_class="cycle_file_upload_selected" file_input_id="cycle_file_upload" class="btn btn-primary btn-lg comman_file_upload_class cycle_file_upload" data-toggle="modal" data-target="#browseFile" ><i class="fa fa-upload"></i> </button>
													<input readonly class="form-control display_none  file_size" type="text"  value="">
												
													<label  id="cycle_file_upload_error1" class="required display_none cycle_file_upload_error1">Your file must be less than 10MB in size.</label>
													<label  id="cycle_file_upload_error" class="required display_none cycle_file_upload_error">Attachment is required.</label>
												
												
												<div>
													<div class="">
														<input class="form-control cycle_file_upload cycle_file_upload1 " id="cycle_file_upload" name="cycle_file_upload" type="hidden" value="<?php echo $row->document_value;?>">
													</div>
													<span class="registration_80g_valid" ></span>
													<div class="image-preview inline_block cycle_file_upload_selected">
														<p <?php if($row->document_value_actual){ echo $target ;}?> class="document_value_ <?php if (!$row->document_value_actual){ echo 'display_none'; } ?>">
															<input readonly class="form-control is_edit_data  upload_input" type="text" id="upload_80G_reg" value="<?php if($row->document_value_actual){ echo $row->document_value_actual;} ?>" style="border:none;">
															
														</p> 
													</div>
												</div>
											
												
											
										</div>
									</div>
									<?php } }?>

										<div class="form-group row col-lg-12">
											<label class="form-control-label">Sholud the payment be made for this cycle?<span class="required">*</span></label>
											<label> 
												<input id="payment_radio_yes" type="radio" name="payment_radio" value="yes" class="payment_radio" <?php if($is_payment == 'yes'){echo 'checked';}?>> Yes
											</label>
											<label>
												<input id="payment_radio_no" class="payment_radio" type="radio" name="payment_radio" value="no" <?php if($is_payment == 'no'){echo 'checked';}?>> No
											</label>
											<label class="error is_payment_checked_error display_none " >Please select any one </label>
										</div>
										
										
												
									<?php }?>
									
									<div class="form-group row is_payment_disp display_none">
									   <label for="comments" class="col-md-12">Why Not? </label>
										<div class="col-md-12"> 
											<textarea id="comments" name="comments" class="form-control" placeholder="Enter details here" rows="3" ></textarea>
										  
										</div>
							        </div>
									
										<div class="row">
										<div class="col-md-12">
										<div class="button">
											<button type="button" <?php if($status == 'Completed'){echo 'disabled';}?> id="temp_save1<?php if($status == 'Completed'){echo 'disabled';}?>"  class="btn btn-success">Save</button>
											<button type="button" <?php if($status == 'Completed'){echo 'disabled';}?> id="submit_cycle_assessment<?php if($status == 'Completed'){echo 'disabled';}?>" class="btn btn-success">Submit</button>
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
		$('.is_payment_disp').removeClass('display_none'); 
	}); 
	 
    $('body').on('click','#payment_radio_yes',function(){
		$('.is_payment_disp').addClass('display_none'); 

	});
	
	$('body').on('click', '#send_notification', function () {	
		if (!confirm("Do you want to delete")) {
            return false;
        }	
		$.blockUI();
		var id = $('#comments').val();
        var id = $(this).attr('name');
        var primary_column_name = $(this).attr('primary_column_name');
        var table_name = $(this).attr('table_name');
		$.post(APP_URL + 'organisation/common/remove', {
			id: id,
			table_name: table_name,
			primary_column_name: primary_column_name,
		},
		function (response) {
			$("html, body").animate({scrollTop: 0}, "slow");
			$('#headerMsg').empty();
			if (response.status == 200) {	
				$('#headerMsg').html("<div class='alert alert-success fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong>&nbsp;&nbsp;<a onclick='location.reload();' href='javascript:void(0);'></a></div>");
				$("#headerMsg").fadeTo(2000, 500).slideUp(500, function(){
					$('#headerMsg').empty();
					location.reload();
				});
			} else if (response.status == 201) {
				$('#headerMsg').html("<div class='alert alert-danger fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
				$("#headerMsg").fadeTo(2000, 500).slideUp(500, function(){
					$('#headerMsg').empty();
				});
			}
			$.unblockUI();
			
		}, 'json');
	});
	
	
	
	
	$("body").on("click", "#temp_save1", function () {
		var is_error='no';
		var is_payment = $('.payment_radio:checked').val();
		console.log(is_payment);
       	var comments = $('#comments').val();
		var project_id = $('#project_id').val();
		var org_task_id = $('#org_task_id').val();
		var cycle_file_upload1 = $('.cycle_file_upload').val();
		console.log(cycle_file_upload1);
				
		var csr_list = [];
		if(is_error=='no'){
			$('.csr_list_class').each(function(key,val){
				csr_file_value = $(this).find('.cycle_file_upload').val();
				if(csr_file_value){
					$(this).find('.cycle_file_upload_error').addClass('display_none');
				}else{
					is_error = 'yes';
					$(this).find('.cycle_file_upload_error').removeClass('display_none');
				}
				
				csr_list.push({
					csr_id : $(this).find('.csr_label_class').attr('id'),
					csr_name : $(this).find('.csr_label_class').attr('name'),
					csr_type : $(this).find('.csr_label_class').attr('type'),
					csr_file_value : $(this).find('.cycle_file_upload').val(),
					csr_file_value_actual: $(this).find('.upload_input').val(),
					
					
				}); 
			});
		}
		 if(is_payment){
				$('.is_payment_checked_error').addClass('display_none');
		}else{
			is_error='yes';
			$('.is_payment_checked_error').removeClass('display_none');
		}
		console.log(csr_list);
		if(is_error=='no'){
			var additional_json = [];
			additional_json.push({
				'csr_list':csr_list,
				'is_payment':is_payment,
				'comments':comments,
				'project_id':project_id,
				
			});
		}
		if(is_error=='no'){
			$.post(APP_URL + 'organisation/tasks/save_cycle_data1',{
						
				additional_json:additional_json,
				project_id:project_id,
				org_task_id:org_task_id, 
				},
			function (response) {
				$('#head_ngo_review').empty();
				if (response.status == 200) {
					$.toaster({ priority :'success', message :'Saved'});
					
					//$('#submit_cycle_creation').trigger('click');
				} else {
					$('#head_ngo_review').html("<div class='alert alert-danger fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
					$("#head_ngo_review").fadeTo(2000, 500).slideUp(500, function(){
						$('#head_ngo_review').empty();
					});
				}
			},'json');	
		}		
	});

	$('body').on('click','#submit_cycle_assessment', function () {
		var is_error='no';
		var is_payment = $('.payment_radio:checked').val();
		if(is_payment){
				$('.is_payment_checked_error').addClass('display_none');
		}else{
			is_error='yes';
			$('.is_payment_checked_error').removeClass('display_none');
		}
		var project_id = $('#project_id').val();
		var comments = $('#comments').val();
		var org_task_id=$('#org_task_id').val();
		var org_task_list_id=$('#org_task_list_id').val();
		var org_id=$('#org_id').val();
		var prop_id=$('#prop_id').val();
		var superngo_id=$('#superngo_id').val();
		var org_staff_id=$('#org_staff_id').val();
		var ngo_id=$('#ngo_id').val();
		var csr_list = [];
		
		$('.csr_list_class').each(function(key,val){
			csr_file_value = $(this).find('.cycle_file_upload').val();
				if(csr_file_value){
					$(this).find('.cycle_file_upload_error').addClass('display_none');
				}else{
					is_error = 'yes';
					$(this).find('.cycle_file_upload_error').removeClass('display_none');
				}
				csr_list.push({
				csr_id : $(this).find('.csr_label_class').attr('id'),
				csr_name : $(this).find('.csr_label_class').attr('name'),
				csr_type : $(this).find('.csr_label_class').attr('type'),
				csr_file_value : $(this).find('.cycle_file_upload1').val(),
				csr_file_value_actual: $(this).find('.upload_input').val(),
				
				
			}); 
		});
		
		//console.log(csr_list);
		if(is_error=='no'){
			var additional_json = [];
			additional_json.push({
				'csr_list':csr_list,
				'is_payment':is_payment,
				'comments':comments,
				'project_id':project_id,
				
			});
			console.log(additional_json);
			if(is_error=='no'){	
				$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
				$.post(APP_URL + 'organisation/tasks/change_status_onsubmit_by_cycle_accessment', {
					csr_list : csr_list,
					project_id: project_id,
					additional_json: additional_json,
					org_task_id:org_task_id, 
					org_task_list_id:org_task_list_id,
					org_id:org_id,
					prop_id:prop_id,
					superngo_id:superngo_id,
					org_staff_id:org_staff_id,			
					ngo_id:ngo_id,			
							
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
		}
		 return false;
		
	});	
	
	$('body').on('click','#send_notification_by_ngo_doc', function () {
		var is_error='no';
		var project_id = $('#project_id').val();
		var org_task_id=$('#org_task_id').val();
		var org_id=$('#org_id').val();
		var prop_id=$('#prop_id').val();
		var superngo_id=$('#superngo_id').val();
		var ngo_id=$('#ngo_id').val();
		//$(this).find('.select_donor').val(),
		var document_type = $('#ngo_document_type').val();
		var project_cycle_id = $('.project_cycle_id').val();
		var project_document_id = $('.project_document_id').val();	
			
			
			if(is_error=='no'){	
				$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
				$.post(APP_URL + 'organisation/tasks/send_notification_by_ngo_doc_request', {
					project_id: project_id,
					org_task_id:org_task_id,
					org_id:org_id,
					prop_id:prop_id,
					superngo_id:superngo_id,
					ngo_id:ngo_id,			
					project_cycle_id:project_cycle_id,			
					project_document_id:project_document_id,			
					document_type:document_type,			
							
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
							window.location.reload();
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
		
	});
	$('body').on('click','#send_notification_payment_doc', function () {
		var is_error='no';
		var project_id = $('#project_id').val();
		var org_task_id=$('#org_task_id').val();
		var org_id=$('#org_id').val();
		var prop_id=$('#prop_id').val();
		var superngo_id=$('#superngo_id').val();
		var ngo_id=$('#ngo_id').val();
		//$(this).find('.select_donor').val(),
		var document_type = $('#payment_document_type').val();
		var project_cycle_id = $('.project_cycle_id').val();
		var project_document_id = $('.project_document_id').val();	
			
			
			if(is_error=='no'){	
				$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
				$.post(APP_URL + 'organisation/tasks/send_notification_by_payemnt_request', {
					project_id: project_id,
					org_task_id:org_task_id,
					org_id:org_id,
					prop_id:prop_id,
					superngo_id:superngo_id,
					ngo_id:ngo_id,			
					project_cycle_id:project_cycle_id,			
					project_document_id:project_document_id,			
					document_type:document_type,			
							
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
							window.location.reload();
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
		
	});	
	
});
</script>

