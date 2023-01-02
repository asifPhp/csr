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
    margin-top: 0px;
    border: none;
    color: blue;
	margin-bottom: -26px;
}

.modal-backdrop.in {
    filter: alpha(opacity=50);
    opacity: -0.5;
    display: none;
}
.is_edit_data{
	background-color: white !important;
    border: none !important;
    color: cornflowerblue !important;
}

</style>

<?php
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
		$project_cycle_id = $data_value[0]['project_cycle_id'];
		$additional_json = '';
		
		$csr_file_value='';
		$csr_file_value_actual='';
			
		
		if(isset($data_value[0]['additional_json'])){
			$additional_json = json_decode($data_value[0]['additional_json']);
			//var_dump($additional_json);
			if(isset($additional_json[0]->csr_file_value)){
				$csr_file_value = $additional_json[0]->csr_file_value;
			}
			if(isset($additional_json[0]->csr_file_value_actual)){
				$csr_file_value_actual = $additional_json[0]->csr_file_value_actual;
			}
			if(isset($additional_json[0]->payment_list)){
				$payment_list = $additional_json[0]->payment_list;
				//var_dump($payment_list);
			}
		}else{
			$csr_file_value='';
			$csr_file_value_actual='';
		}
	}else{
		$task_type =''; 
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
		//$ngo_status='';
		$ngo_status ='';
		$rejection_records='';
		$rejection_ngo='';
		
		$csr_file_value='';
		$csr_file_value_actual='';
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
					<input type="hidden" class="form-control" id="project_cycle_id_hidden" name="project_cycle_id_hidden" value="<?php echo $project_cycle_id;?>">
					<div class="row">
						<div class="col-lg-6">
							<?php 
							
								if($task_type=='pmp'){
									
									$sql_checker="SELECT additional_json,org_task_id FROM `org_tasks` WHERE org_id=$org_id AND prop_id=$prop_id AND org_task_list_id=14";
									$task_data_fetch_checker = $this->db->query($sql_checker)->result_array();
									if($task_data_fetch_checker){	
										$data['checker_data']=$task_data_fetch_checker[0]['additional_json'];
										if($data['checker_data']!=''){
											$this->load->view('organisation/pages/task/1/view_checker_review',$data);
										}
									}
									
									$sql_internal="SELECT additional_json,org_task_id FROM `org_tasks` WHERE org_id=$org_id AND prop_id=$prop_id AND org_task_list_id=13";
									$task_data_fetch_insernal = $this->db->query($sql_internal)->result_array();
									if($task_data_fetch_insernal){	
										$data['internal_data']=$task_data_fetch_insernal[0]['additional_json'];
										if($data['internal_data']!=''){
											$this->load->view('organisation/pages/task/1/view_internal_verification',$data);
										}
									}
									
									$sql3="SELECT additional_json FROM `org_tasks` WHERE org_id=$org_id AND prop_id=$prop_id AND org_task_list_id=12";
									$task_data_fetch = $this->db->query($sql3)->result_array();
									if($task_data_fetch){	
										$data['project_cycle_data']=$task_data_fetch[0]['additional_json'];
										if($data['project_cycle_data']!=''){
											$this->load->view('organisation/pages/task/1/view_focal_point',$data);
										}
									}
								}
								
								
								$sql3="SELECT * FROM `ngo` WHERE `id` =".$ngo_id;
										$result3 = $this->db->query($sql3); 
										if ($result3 && $result3->num_rows() > 0){
											$data['ngo_data'] = $result3->result();
										}else{
											$data['ngo_data'] = '';
										}
									
									$sql4="SELECT * FROM `org_ngo_review_status` WHERE `ngo_id` =".$ngo_id;
										$result4 = $this->db->query($sql4); 
										if ($result4 && $result4->num_rows() > 0){
											$data['org_ngo_review_status'] = $result4->result();
										}else{
											$data['org_ngo_review_status'] = '';
										}
							
							
								$this->load->view('organisation/pages/viw_project_detail_page/view_project_detail');
								
								$this->load->view('organisation/pages/viw_project_detail_page/view_project_donor_detail');
								
								$this->load->view('organisation/pages/viw_project_detail_page/view_project_proposal_detail');
								
								if($result3){
										$this->load->view('organisation/pages/viw_project_detail_page/view_project_ngo_detail',$data);
									}
								
								
								
							$this->load->view('organisation/pages/task/ngo_information_collapse');
							?>
						</div>
						<div class="col-lg-6">
							<?php $this->load->view('organisation/pages/task/Task_details_collapse'); ?>
							<div class="box box-primary ">
								<div class="box-header with-border " data-widget="collapse">
									<i class="fa btn btn-box-tool fa_plus fa-minus"></i>
									<h3 class="box-title"><?php echo $data_value[0]['org_task_label']; ?></h3>
								</div>
								<div class="box-body" >
									<div class="form-group row ">
										<label for="was_review" class="col-md-12 desk-review" id="was_review">Upload copy of CFO approval mail<span class="required">*</span> </label>
									  
										<div class="col-md-12">
											 <button type="button" id="comman_file_upload_class" name="comman_file_upload_class" image_upload_desc="" upload_type="file" file_count="single" img_primary="no" file_prev_class="cycle_file_upload_selected" file_input_id="cycle_file_upload" class="btn btn-primary btn-lg comman_file_upload_class" data-toggle="modal" data-target="#browseFile"><i class="fa fa-upload"></i> </button>
											<div class="">
												<input class="form-control cycle_file_upload " id="cycle_file_upload" name="cycle_file_upload" type="hidden" value="<?php if($csr_file_value){ echo $csr_file_value;}?>">
											</div>
											<span class="registration_80g_valid" ></span>
											<div class="image-preview inline_block cycle_file_upload_selected">
												<input readonly class="form-control is_edit_data  actual_disp" type="text" id="cycle_file_upload_actual" <?php if(!$csr_file_value_actual){ echo 'display_none' ;} ?> value="<?php if($csr_file_value_actual){ echo $csr_file_value_actual;}?>">
											</div>
											<div class="cycle_file_upload1_error error display_none"><label>assessment documents is required</label></div>
										</div>
									
									</div>
									
									<div class="form-group row ">	 
										<div class="row">
											 <div class="col-md-12">
												<div>&nbsp;</div>
												  <div class="button " style="margin-left: 17px;">
													  <button type="button" <?php if($status == 'Completed'){echo 'disabled';}?>  id="save<?php if($status == 'Completed'){echo 'disabled';}?>" class="btn btn-primary">Save</button>
													  <button type="button" <?php if($status == 'Completed'){echo 'disabled';}?>  id="submit_payment_conform<?php if($status == 'Completed'){echo 'disabled';}?>" class="btn btn-success">Submit</button>
													  <button type="button" class="btn btn-primary ngo_send_notification" style="float: right;display: none;">Notify</button>
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
		<!--</div>
	</div>
</div>-->
	

<script>

$('document').ready(function(){

	$('body').on('click','#save', function () {
				
		var org_task_id=$('#org_task_id').val();
		var org_task_list_id=$('#org_task_list_id').val();
		var org_id=$('#org_id').val();
		var ngo_id=$('#ngo_id').val();
		var prop_id=$('#prop_id').val();
		var superngo_id=$('#superngo_id').val();
		var org_staff_id=$('#org_staff_id').val();
		var project_id=$('#project_id').val();
		var additional_json=[];
			csr_file_value =$('.cycle_file_upload').val(),
			csr_file_value_actual =$('.actual_disp').val(),
			
			additional_json.push({
				csr_file_value:csr_file_value,
				csr_file_value_actual:csr_file_value_actual,
			});
		
			console.log(additional_json);
			$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
	
			$.post(APP_URL + 'organisation/tasks/update_onsave_org1', {
					additional_json:additional_json,
					org_task_id:org_task_id, 
					org_task_list_id:org_task_list_id,
					org_id:org_id,
					ngo_id:ngo_id,
					prop_id:prop_id,
					superngo_id:superngo_id,
					org_staff_id:org_staff_id,
					project_id:project_id,
					
					
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
	
	
	$('body').on('click','#submit_payment_conform', function () {
		var is_error='no';	
		var org_task_id=$('#org_task_id').val();
		var org_task_list_id=$('#org_task_list_id').val();
		var org_id=$('#org_id').val();
		var ngo_id=$('#ngo_id').val();
		var prop_id=$('#prop_id').val();
		var superngo_id=$('#superngo_id').val();
		var org_staff_id=$('#org_staff_id').val();
		var project_id=$('#project_id').val();
		var project_cycle_id_hidden=$('#project_cycle_id_hidden').val();
		var additional_json=[];
			csr_file_value =$('.cycle_file_upload').val();
			csr_file_value_actual =$('.actual_disp').val();
			if(csr_file_value){
				$(".cycle_file_upload1_error ").addClass('display_none');
			}else{
				is_error=='yes';
				$(".cycle_file_upload1_error ").removeClass('display_none');
			}
			additional_json.push({
				csr_file_value:csr_file_value,
				csr_file_value_actual:csr_file_value_actual,
			});
		
		
		
		console.log(additional_json);
		if(is_error=='no'){
			$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
	
			$.post(APP_URL + 'organisation/tasks/change_status_onsubmit_by_final_payemnt_approval', {
					additional_json:additional_json,
					org_task_id:org_task_id, 
					org_task_list_id:org_task_list_id,
					org_id:org_id,
					ngo_id:ngo_id,
					prop_id:prop_id,
					superngo_id:superngo_id,
					org_staff_id:org_staff_id,
					project_id:project_id,
					project_cycle_id_hidden:project_cycle_id_hidden,
					
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
		
		
	});	
	
	
	

});

</script>

