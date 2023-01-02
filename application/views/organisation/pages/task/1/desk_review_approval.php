<style>
#headerMsg{	margin:20px 0px;}
.dataTables-example th{	text-align:center;}
.ibox-content{padding: 10px;}
[data-toggle="collapse"] .fa:before {  
  content: "\f139";
}ev

[data-toggle="collapse"].collapsed .fa:before {
  content: "\f13a";
}
.input_description{font-weight: 400;}
.actual_disp{
 background-color: white;
    opacity: 1;
    margin-top: 10px;
    border: none;
    color: blue;
}

.modal-backdrop.in {
    filter: alpha(opacity=50);
    opacity: -0.5;
    display: none;
}
.margTop{margin-top: -0px !important;}
</style>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<?php
	//var_dump($this->session->userdata);
	if($data_value){
		//var_dump($data_value);
		$superngo_id = $data_value[0]['superngo_id']; 
		$comments = $data_value[0]['comments'];
		$org_task_id = $data_value[0]['org_task_id']; 
		$project_id = $data_value[0]['project_id']; 
		$superngo_details = $this->db->get_where('superngo',array('id' =>$superngo_id))->result();
		$org_task_list_id=$data_value[0]['org_task_list_id'];
		$org_id=$data_value[0]['org_id'];
		$prop_id=$data_value[0]['prop_id'];
		$org_staff_id=$data_value[0]['org_staff_id'];
		$status = $data_value[0]['status'];
		$ngo_id = $data_value[0]['ngo_id'];
		$task_type = $data_value[0]['task_type'];
		$additional_json = '';
		
		$was_review_radion='';
		$my_final='';
		$comments_no_approval ='';
		$comments_request ='';
		$donor_dropdown_text='';
		$donor_dropdown_id='';
		$comments_recommend_yes='';
		$comments_my_reject_yes1='';
		$comments_my_reject_yes2='';
		
		if(isset($data_value[0]['additional_json'])){
			$additional_json = json_decode($data_value[0]['additional_json']);
			//var_dump($additional_json);
			if(isset($additional_json[0]->was_review_radion)){
				$was_review_radion = $additional_json[0]->was_review_radion;
			}
			if(isset($additional_json[0]->my_final)){
				$my_final = $additional_json[0]->my_final;	
			}
			if(isset($additional_json[0]->comments_no_approval)){
				$comments_no_approval = $additional_json[0]->comments_no_approval;
			}
			if(isset($additional_json[0]->comments_request)){
				$comments_request = $additional_json[0]->comments_request;
			}
			if(isset($additional_json[0]->donor_dropdown_text)){
				$donor_dropdown_text = $additional_json[0]->donor_dropdown_text;
			}
			if(isset($additional_json[0]->donor_dropdown_id)){
				$donor_dropdown_id = $additional_json[0]->donor_dropdown_id;
			}
			if(isset($additional_json[0]->comments_recommend_yes)){
				$comments_recommend_yes = $additional_json[0]->comments_recommend_yes;
			}
			if(isset($additional_json[0]->comments_my_reject_yes1)){
				$comments_my_reject_yes1 = $additional_json[0]->comments_my_reject_yes1;
			}
			if(isset($additional_json[0]->comments_my_reject_yes2)){
				$comments_my_reject_yes2 = $additional_json[0]->comments_my_reject_yes2;
			}
			
		}else{
			$was_review_radion='';
			$my_final='';
			$comments_no_approval ='';
			$comments_request ='';
			$donor_dropdown_text='';
			$donor_dropdown_id='';
			$comments_recommend_yes='';
			$comments_my_reject_yes1='';
			$comments_my_reject_yes2='';
			
		}
	}else{
		$superngo_id =0; 
		$comments = '';
		$org_task_id = 0; 
		$project_id =0;
		$org_task_list_id=0;
		$org_id=0;
		$prop_id=0;
		$org_staff_id=0;
		$status = '';
		$ngo_id =0;
				
		$was_review_radion='';
		$my_final='';
		$comments_no_approval ='';
		$comments_request ='';
		$donor_dropdown_text='';
		$donor_dropdown_id='';
		$comments_recommend_yes='';
		$comments_my_reject_yes1='';
		$comments_my_reject_yes2='';
		$task_type='';
	}

        $brand_name_superngo_p = $this->db->get_where('superngo',array('id'=>$superngo_id))->result_array();
		$ngo_data_p = $this->db->get_where('ngo',array('id'=>$ngo_id))->result_array();
		if($brand_name_superngo_p){
			$data['brand_name'] = $brand_name_superngo_p[0]['brand_name'];    
		}else{
			$data['brand_name'] = '';
		}				   
		if($ngo_data_p){                                       
			$data['created_time'] = $ngo_data_p[0]['created_time'];
			$data['update_datetime'] = $ngo_data_p[0]['update_datetime'];
			$data['entity_id'] = $ngo_id;									
		}else{
			$data['created_time'] = '';
			$data['update_datetime'] = '';
			$data['entity_id'] = '';
		} 		
?>
<?php
$data['sub_folder_name']="";
$data['image_cat']="entity";
$this->load->view('file_upload',$data);
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
					<input type="hidden" class="form-control" id="superngo_id" name="superngo_id" value="<?php echo $superngo_id;?>">
					<input type="hidden" class="form-control" id="ngo_id" name="ngo_id" value="<?php echo $ngo_id;?>">
					<input type="hidden" class="form-control" id="project_id" name="project_id" value="<?php echo $project_id;?>">
					<div class="row">
						<div class="col-lg-6">
							<?php 
							    $this->load->view('organisation/pages/ngo_entity_detail',$data);
								if($task_type=='nrp'){
									$sql3="SELECT additional_json FROM `org_tasks` WHERE org_id=$org_id AND prop_id=$prop_id AND org_task_list_id=1";
									$task_data_fetch = $this->db->query($sql3)->result_array();
									if($task_data_fetch){	
										$data['ngo_desk_review_data']=$task_data_fetch[0]['additional_json'];
										if($data['ngo_desk_review_data']!=''){
											$this->load->view('organisation/pages/task/1/view_desk_review',$data);
										}
									}
								}
							
								$this->load->view('organisation/pages/task/ngo_information_collapse'); ?>
						</div>
						<div class="col-lg-6">
							<?php $this->load->view('organisation/pages/task/Task_details_collapse'); ?>
							<div class="box box-primary ">
								<div class="box-header with-border " data-widget="collapse">
									<i class="fa btn btn-box-tool fa_plus fa-minus"></i>
									<h3 class="box-title"><?php echo $data_value[0]['org_task_label']; ?></h3>
								</div>
								<div class="box-body" >
									<form id="product" method="post" role="form">
										<div class="form-group row ">
											<div >
												<label for="was_review" class="col-md-12 desk-review" id="was_review">Was the Desk Review done satisfactorily?<span class="required">*</span>
												</label>
											</div>
											<div class="col-md-12">
												<label style="font-weight: 400;">
													<input type="radio" class="was_review_radion" name="was_review_radion" value="Yes" id="approved_radio" <?php if($was_review_radion == 'Yes'){echo 'checked';}?>>&nbsp;
													<span>Yes</span> 
												</label>
												<label style="font-weight: 400;">
													<input type="radio"  class="was_review_radion"  name="was_review_radion" value="No" id="rejection_radio" <?php if($was_review_radion == 'No'){echo 'checked';}?>>
													<span>No</span> 
												</label> 
												<div class=" was_review_radion_error"></div>
											</div>
										</div>
										<div class="form-group row was_review_radion_no <?php if($was_review_radion == 'No'){}else{ echo 'display_none'; }?>">
											<div class="col-md-12"> 
												<label>What needs to be changed/improved?</label><br>
												<label class="input_description">This will be shared with the desk reviewer to help them make the necessary improvements.</label>
												<textarea id="comments_no_approval" name="comments_no_approval" class="form-control"  rows="3" placeholder="Details/Comments on above"><?php echo $comments_no_approval;?></textarea>
											</div>
										</div>
									
										<div class="form-group row was_review_radion_yes <?php if($was_review_radion == 'Yes'){}else{ echo 'display_none'; }?>">
											<div class="col-md-12">
												<div>
													<label for="my_final">My final evaluation of the NGO/Proposal<span class="required">*</span></label>	
													<div >
														<label style="font-weight: 400;">
															<input type="radio" name="my_final" class="my_final"  value="my_approve" <?php if($my_final == 'my_approve'){echo 'checked';}?> >
															<span><b> Approve the NGO </b> and initiate further review of the proposal.</span> &nbsp;
														</label>
														<label style="font-weight: 400;display: block;">
															<input type="radio" name="my_final" class="my_final"  value="my_request" <?php if($my_final == 'my_request'){echo 'checked';}?> >
															<span><b> Request a revision</b> of NGO organisation details from the NGO (NGO will be notified and further review of the proposal will be paused). 
															</span> &nbsp;
														</label>
														<label style="font-weight: 400;display: block; display:none">
															<input type="radio" name="my_final" class="my_final"  value="my_recommend" <?php if($my_final == 'my_recommend'){echo 'checked';}?> >
															<span>Recommend the NGO and Proposal for rejection (further review of the proposal will be skipped and proposal will be directly sent for Board Review).</span> 
														</label> 
														<label style="font-weight: 400;display: block;">
															<input type="radio" name="my_final" class="my_final"  value="my_reject" <?php if($my_final == 'my_reject'){echo 'checked';}?> >
															<span><b>Reject the NGO </b>and Proposal outright (Both NGO and Proposal will rejected immediately and NGO will be notified of the same).</span> 
														</label> 
														<div class="my_final_error"></div>		
													</div>
												</div>
											</div>  
										</div> 
									 
										<div class="form-group my_request_yes <?php if($my_final == 'my_request'){}else{ echo 'display_none'; }?>">
											<div > 
												<div>
													<label name="my_revise">Enter details of what the NGO needs to revise in its organisation details and/or proposal<span class="required">*</span> </label><br/>
													<label class="input_description">The details entered here will be sent to the NGO when this form is submitted.</label>
													<div class="my_revise_error"></div>
												</div>
												<textarea id="comments_request" name="comments_request" class="form-control "  rows="3" placeholder="Details/Comments on above"><?php echo $comments_request;?></textarea>
											</div>	
										</div>
								
										<div class="form-group  my_recommend_yes  <?php if($my_final == 'my_recommend'){}else{ echo 'display_none'; }?>">
											<div> 
												<div>
													<label>Enter reasons for this rejection recommendation.<span class="required">*</span> </label><br/>
													<label class="input_description">These details are for internal use only</label>
												</div>
												<div class="my_internal_error"></div>
												<textarea id="comments_recommend_yes" name="comments_recommend_yes"  class="form-control"  rows="3" placeholder="Details/Comments on above"><?php echo $comments_recommend_yes;?></textarea>
											</div>
										</div>
										
										<div class=" form-group my_reject_yes <?php if($my_final == 'my_reject'){}else{ echo 'display_none'; }?>">
											<div> 
												<div>
												   <label>Enter reasons for rejection (internal)<span class="required">*</span> </label><br/>
												   <label class="input_description">These details are for internal use only</label>
												</div>
												<div class="my_submission_error"></div>
												<textarea id="comments_my_reject_yes1" name="comments_my_reject_yes1" class="form-control"  rows="3" placeholder="Details/Comments on above"><?php echo $comments_my_reject_yes1;?></textarea>
											</div>											
										</div>
									
										<div class=" form-group my_reject_yes <?php if($my_final == 'my_reject'){}else{ echo 'display_none'; }?>">
											<div> 
												<div>
													<label>Enter reasons for rejection (for submission to NGO)<span class="required">*</span> </label><br/>
													<label class="input_description">The details entered here will be sent to the NGO when this form is submitted.</label>
												</div>
												<div class="my_submission_error"></div>
												<textarea id="comments_my_reject_yes2" name="comments_my_reject_yes2" class="form-control"  rows="3" placeholder="Details/Comments on above"><?php echo $comments_my_reject_yes2;?></textarea>
											</div>											
										</div>
									
										<div class="form-group  my_approve_yes <?php if($my_final == 'my_approve'){}else{ echo 'display_none'; }?>">
											<div>    
												<label >Assign a Focal Point for this NGO<span class="required">*</span></label><br/>
												<label class="input_description">This person will be the primary contact for this NGO and all its proposals going forward.</label>
											</div>
											<div>  <?php //var_dump($focal_point_data);?>
												<select class="form-control donor_dropdown js-example-basic-single" id="donor_dropdown" name="donor_dropdown">
													<option value="">Select</option>
													<?php if($focal_point_data){
													foreach($focal_point_data as $val){
														$is_selected='';
														$is_role='';
														if($val['staff_id']==$donor_dropdown_id){
															$is_selected='selected';
														}
														if($val['first_name']!=''){
													?>
														<option <?php echo $is_selected; ?> value="<?php echo $val['staff_id'] ;?>" ><?php echo  $val['first_name'].' '. $val['last_name'];?></option>
																										
													<?php } if($val['is_deleted'] == '0'){ 
														echo '<option disabled value="" > '.$val['role_name'].' </option>';
													}}}?>		
												</select>
												<!--<input type="text" autocomplete="new-name" class="form-control donor_dropdown" id="donor_dropdown" name="donor_dropdown" placeholder="Type to search.." value="<?php echo $donor_dropdown_id;?>">-->
											</div>
											<div class="my_ngo_error"></div>
										</div> 
										 
										<div class="form-group my_request_yes_no <?php if($was_review_radion == 'Yes' || $was_review_radion=='No'){}else{ echo 'display_none'; }?>">
											<div class="row">
												<div>
													<div>&nbsp;</div>
													<div class="button " style="margin-left: 17px;">
														<button type="button" <?php if($status == 'Completed'){echo 'disabled';}?>  id="save<?php if($status == 'Completed'){echo 'disabled';}?>" class="btn btn-primary ">Save</button>
														<button type="submit" <?php if($status == 'Completed'){echo 'disabled';}?>  id="submit<?php if($status == 'Completed'){echo 'disabled';}?>" class="btn btn-success">Submit</button>
														<button type="button" class="btn btn-primary ngo_send_notification" style="float: right;display: none;">Notify</button>
													</div>
												</div>
											</div>
										</div>
										
									</form>	
								</div>			
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
		<!--	</div>
		</div>
	</div>
</div>-->

<style>
	.select2-container--default .select2-selection--single {
		padding: 4px !important;
	}
	.select2-container--default .select2-results__option[aria-disabled=true] {
		color: #000;
		font-weight: 600;
	}
</style>
<script>
$('document').ready(function(){
	$('body').on('click','.was_review_radion', function () {
		var radio_value = $('input[name="was_review_radion"]:radio:checked').next().html();
  
	   console.log(radio_value);
	   if(radio_value == 'Yes'){
		    $('.my_request_yes_no').removeClass('display_none')
		    $('.was_review_radion_yes').removeClass('display_none')
		    $('.was_review_radion_no').addClass('display_none')
			
	   }else{
			$('.my_final').prop('checked', false);
		    $('.my_request_yes_no').removeClass('display_none')
		    $('.was_review_radion_no').removeClass('display_none')
		    $('.was_review_radion_yes').addClass('display_none')
			
			$('.my_approve_yes').addClass('display_none')
			$('.my_request_yes').addClass('display_none')
			$('.my_recommend_yes').addClass('display_none')
			$('.my_reject_yes').addClass('display_none')
		}
	});
	
	$('.js-example-basic-single').select2();
	
	$('body').on('click','.my_final', function () {
		var radio_value = $('input[name="my_final"]:radio:checked').val();
  
	   console.log(radio_value);
	   if(radio_value == 'my_approve'){
			$('.my_approve_yes').removeClass('display_none')
			$('.my_request_yes').addClass('display_none')
			$('.my_recommend_yes').addClass('display_none')
			$('.my_reject_yes').addClass('display_none')
		}
	    else if (radio_value=='my_request'){
		   	$('.my_request_yes').removeClass('display_none')
			$('.my_approve_yes').addClass('display_none')
			$('.my_recommend_yes').addClass('display_none')
			$('.my_reject_yes').addClass('display_none')
		 
	   }else if (radio_value=='my_recommend'){
			$('.my_recommend_yes').removeClass('display_none')
			$('.my_approve_yes').addClass('display_none')
			$('.my_request_yes').addClass('display_none')
			$('.my_reject_yes').addClass('display_none')
	   }else {
		   $('.my_reject_yes').removeClass('display_none')
			$('.my_approve_yes').addClass('display_none')
			$('.my_request_yes').addClass('display_none')
			$('.my_recommend_yes').addClass('display_none')
	   }
	});
	
});

	$('body').on('click','#save', function () {
				
		var org_task_id=$('#org_task_id').val();
		var org_task_list_id=$('#org_task_list_id').val();
		var org_id=$('#org_id').val();
		var ngo_id=$('#ngo_id').val();
		var prop_id=$('#prop_id').val();
		var superngo_id=$('#superngo_id').val();
		var org_staff_id=$('#org_staff_id').val();
		var additional_json = [];	
		var was_review_radion=$('input[name="was_review_radion"]:radio:checked').val();
			console.log(was_review_radion);
		if(was_review_radion=='Yes'){
		
			var my_final=$('input[name="my_final"]:radio:checked').val();
				console.log(my_final);
				if(my_final){
					if(my_final=='my_approve'){
						var donor_dropdown_text = $('.donor_dropdown option:selected').text();
						var donor_dropdown_id = $('.donor_dropdown').val();
							
						additional_json.push({
							'was_review_radion':was_review_radion,
							'my_final':my_final,
							'donor_dropdown_text':donor_dropdown_text,
							'donor_dropdown_id':donor_dropdown_id,
						});
					}else if(my_final=='my_request'){
						var comments_request = $('#comments_request').val();
											
						additional_json.push({
							'was_review_radion':was_review_radion,
							'my_final':my_final,
							'comments_request':comments_request,
						});
					}else if(my_final=='my_recommend'){
						var comments_recommend_yes = $('#comments_recommend_yes').val();
						
						additional_json.push({
							'was_review_radion':was_review_radion,
							'my_final':my_final,
							'comments_recommend_yes':comments_recommend_yes,
							
						});
					
					}else{
						var comments_my_reject_yes1 = $('#comments_my_reject_yes1').val();
						var comments_my_reject_yes2 = $('#comments_my_reject_yes2').val();
						
						additional_json.push({
							'was_review_radion':was_review_radion,
							'my_final':my_final,
							'comments_my_reject_yes1':comments_my_reject_yes1,
							'comments_my_reject_yes2':comments_my_reject_yes2,
						});
					
					}
				}
				
				
		}else{
			
			var comments_no_approval = $('#comments_no_approval').val();
			additional_json.push({
				'was_review_radion':was_review_radion,
				'comments_no_approval':comments_no_approval,
			});
		}   
		
		console.log(additional_json);
		$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });

		$.post(APP_URL + 'organisation/tasks/save_org1_normal_all_pages', {
				additional_json:additional_json,
				org_task_id:org_task_id, 
				org_task_list_id:org_task_list_id,
				org_id:org_id,
				ngo_id:ngo_id,
				prop_id:prop_id,
				superngo_id:superngo_id,
				org_staff_id:org_staff_id,
		},
		function (response) {
			$.unblockUI();
			$('#head_ngo_review').empty();
			if (response.status == 200) {
				var message = response.message; 
				$.toaster({ priority :'success', message :'Saved'});
				//$('#head_ngo_review').html("<div class='alert alert-success fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
				//$('.remove_image[name=' + contact_id + ']').closest("tr").remove();
				//$("#head_ngo_review").fadeTo(2000, 500).slideUp(500, function(){
					//$('#head_ngo_review').empty();
					//window.location.reload();
					//window.location.href=APP_URL+"organisation/tasks/mytasks";
				//});
			} else {
				$('#head_ngo_review').html("<div class='alert alert-danger fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
				$("#head_ngo_review").fadeTo(2000, 500).slideUp(500, function(){
					$('#head_ngo_review').empty();
				});
			}	
		}, 'json');
	});	
	
	$('#product').validate({
		
		//ignore: [],
        rules: {
			was_review_radion: {
                required: true,
            },	
			my_final : {
			   required: true,
			},
			
			donor_dropdown : {
			   required: true,
			},
			comments_request : {
			   required: true,
			},
			comments_recommend_yes :{
			   required: true,
			},
			comments_my_reject_yes1 :{
			   required: true,
			},
			comments_my_reject_yes2 :{
			   required: true,
			},
			
			
		},
		messages: {
			was_review_radion: {
                required: "Was review is required.",
            },
			my_final: {
                required: "final evalution is required.",
            },
			
			donor_dropdown : {
			   required: "Assign a Focal Point is required.",
			},
			comments_request  : {
			   required: "final evalution is required.",
			},
			
			comments_recommend_yes :{
			   required: "final evalution is required.",
			},
			comments_my_reject_yes1 :{
			   required: "reasons for rejection is required.",
			},
			comments_my_reject_yes2 :{
			   required: "reasons for rejection is required.",
			},
			
			
			
		},
		
		errorPlacement: function(error, element) {
            if (element.hasClass('was_review_radion')) {
				error.insertAfter(element.closest('div.form-group').find('.was_review_radion_error'));
            }else if (element.hasClass('is_valid_tax_exemption')) {
				error.insertAfter(element.closest('div.form-group').find('.valid_tax_exemption'));
            }
			else if (element.hasClass('my_final')) {
				error.insertAfter(element.closest('div.form-group').find('.my_final_error'));
            }else if (element.hasClass('is_valid_tax_exemption')) {
				error.insertAfter(element.closest('div.form-group').find('.valid_tax_exemption'));
			
			}
			else if (element.hasClass('is_valid_tax_exemption')) {
				error.insertAfter(element.closest('div.form-group').find('.valid_tax_exemption'));
			}else if (element.hasClass('my_internal')) {
				error.insertAfter(element.closest('div.form-group').find('.my_internal_error'));
            }else if (element.hasClass('is_valid_tax_exemption')) {
				error.insertAfter(element.closest('div.form-group').find('.valid_tax_exemption'));
			}else if (element.hasClass('my_submission')) {
				error.insertAfter(element.closest('div.form-group').find('.my_submission_error'));
            }else if (element.hasClass('is_valid_tax_exemption')) {
				error.insertAfter(element.closest('div.form-group').find('.valid_tax_exemption'));
			}else if (element.hasClass('my_revise')) {
				error.insertAfter(element.closest('div.form-group').find('.my_revise_error'));
            }else if (element.hasClass('is_valid_tax_exemption')) {
				error.insertAfter(element.closest('div.form-group').find('.valid_tax_exemption'));
			}else if (element.hasClass('donor_dropdown')) {
				error.insertAfter(element.closest('div.form-group').find('.my_ngo_error'));
            }else if (element.hasClass('is_valid_tax_exemption')) {
				error.insertAfter(element.closest('div.form-group').find('.valid_tax_exemption'));
       
			}
            else{	
				error.insertAfter(element);
			}
		},

		submitHandler: function (form) {
			//$.blockUI()
			
			console.log('submit');
			var org_task_id=$('#org_task_id').val();
			var org_task_list_id=$('#org_task_list_id').val();
			var org_id=$('#org_id').val();
			var ngo_id=$('#ngo_id').val();
			var prop_id=$('#prop_id').val();
			var superngo_id=$('#superngo_id').val();
			var org_staff_id=$('#org_staff_id').val();
			var additional_json = [];	
			var was_review_radion=$('input[name="was_review_radion"]:radio:checked').val();
			var my_final=$('input[name="my_final"]:radio:checked').val();
			console.log(was_review_radion);
			
			 $(".donor_dropdownss").trigger("click");
			if(was_review_radion=='Yes'){
			
				var my_final=$('input[name="my_final"]:radio:checked').val();
					console.log(my_final);
					if(my_final){
						if(my_final=='my_approve'){
							
							
							var donor_dropdown_text = $('.donor_dropdown option:selected').text();
							var donor_dropdown_id = $('.donor_dropdown option:selected').val();
							
							//console.log(donor_dropdown_text);
							//console.log(donor_dropdown_id);
							
							//org_staff_id=donor_dropdown_id;
								
							additional_json.push({
								'was_review_radion':was_review_radion,
								'my_final':my_final,
								'donor_dropdown_text':donor_dropdown_text,
								'donor_dropdown_id':donor_dropdown_id,
							});
						}
						else if(my_final=='my_request'){
							var comments_request = $('#comments_request').val();
											
							additional_json.push({
								'was_review_radion':was_review_radion,
								'my_final':my_final,
								'comments_request':comments_request,
							});
						}
						else if(my_final=='my_recommend'){
							var comments_recommend_yes = $('#comments_recommend_yes').val();
							
							additional_json.push({
								'was_review_radion':was_review_radion,
								'my_final':my_final,
								'comments_recommend_yes':comments_recommend_yes,
								
							});
						
						}else{
							var comments_my_reject_yes1 = $('#comments_my_reject_yes1').val();
							var comments_my_reject_yes2 = $('#comments_my_reject_yes2').val();
							
							additional_json.push({
								'was_review_radion':was_review_radion,
								'my_final':my_final,
								'comments_my_reject_yes1':comments_my_reject_yes1,
								'comments_my_reject_yes2':comments_my_reject_yes2,
							});
						
						}
					}
					
					
			}else{
				
				var comments_no_approval = $('#comments_no_approval').val();
				additional_json.push({
					'was_review_radion':was_review_radion,
					'comments_no_approval':comments_no_approval,
					'my_final':my_final,
				});
			}   
			var url_type= 'entity';
			var due_date='proposal_desk_review';
			console.log(additional_json);
			$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
			$.post(APP_URL + 'organisation/tasks/change_status_onsubmit_by_ngo_desk_approval', {
					additional_json:additional_json,
					org_task_id:org_task_id, 
					org_task_list_id:org_task_list_id,
					org_id:org_id,
					ngo_id:ngo_id,
					prop_id:prop_id,
					superngo_id:superngo_id,
					org_staff_id:org_staff_id,
					my_final:my_final,
					was_review_radion:was_review_radion,
					url_type:url_type,
			},
			function (response) {
				$.unblockUI();
				$("html, body").animate({scrollTop: 0}, "slow");
                $('#head_ngo_review').empty();
				if (response.status ==200) {
                    var message = response.message;
					
					$('#head_ngo_review').html("<div class='alert alert-success fade show in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + message + "</strong></div>");
					$("#head_ngo_review").fadeTo(2000, 500).slideUp(500, function(){
						$('#head_ngo_review').remove();
						window.location.href=APP_URL+"organisation/tasks/mytasks";
					})
                }else {
                    $('#head_ngo_review').html("<div class='alert alert-danger fade show'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
					$("#head_ngo_review").fadeTo(2000, 500).slideUp(500, function(){
						$('#head_ngo_review').empty();
					});
				}					
				
			}, 'json');
			return false;
		},
	});
	</script>

	