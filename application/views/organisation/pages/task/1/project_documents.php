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
.readonly_date{
	background-color: white !important;
}
.error{
	font-weight: 900;
}
.actual_disp{
	background-color: white !important;
    opacity: 1 !important;
    margin-top: 10px !important;
    border: none !important;
    color: #3c8dbc !important;
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
		$prop_name = $data_value[0]['prop_name'];
		$title = $data_value[0]['title'];
		
		$additional_json = '';
		$project_start_date='';
		$project_end_date='';
		$csr_file_value='';
		$csr_file_value_actual='';
		$project_update='';
		
		
		if(isset($data_value[0]['additional_json'])){
			$additional_json = json_decode($data_value[0]['additional_json']);
			//var_dump($additional_json);
			if(isset($additional_json[0]->project_start_date)){
				$project_start_date = $additional_json[0]->project_start_date;
			}
			if(isset($additional_json[0]->project_end_date)){
				$project_end_date = $additional_json[0]->project_end_date;
			}
			
			if(isset($additional_json[0]->csr_file_value)){
				$csr_file_value = $additional_json[0]->csr_file_value;
			}
			if(isset($additional_json[0]->csr_file_value_actual)){
				$csr_file_value_actual = $additional_json[0]->csr_file_value_actual;
			}
			if(isset($additional_json[0]->project_update)){
				$prop_name = $additional_json[0]->project_update;
			}
			
		}else{
			$project_start_date='';
			$project_end_date='';			
			$csr_file_value='';
			$csr_file_value_actual='';
			$prop_name='';
			$project_update='';
			
		}
	$donor_list = $this->db->get_where('donor',array('org_id' =>$org_id))->result_array();
	//var_dump($donor_list);
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
		$prop_name ='';
				
		$project_start_date='';
		$project_end_date='';
			
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
					<div class="row">
						<div class="col-lg-6">
							<?php 
									
								
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
										
										$sql3="SELECT additional_json FROM `org_tasks` WHERE org_id=$org_id AND prop_id=$prop_id AND org_task_list_id=9";
										$task_data_fetch = $this->db->query($sql3)->result_array();
										if($task_data_fetch){	
											$data['board_review_data']=$task_data_fetch[0]['additional_json'];
												if($data['board_review_data']){
													$this->load->view('organisation/pages/task/1/view_board_review',$data);
												}
										}
										
										if($prop_data){
										//	$this->load->view('organisation/pages/view_proposal_detail_page/view_proposal_right_1',$data);
										$this->load->view('organisation/pages/viw_project_detail_page/view_project_proposal_detail');
										}
										//$this->load->view('organisation/pages/viw_project_detail_page/view_project_proposal_detail');
										$this->load->view('organisation/pages/viw_project_detail_page/view_project_ngo_detail',$data);
								
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
									<form id="product" method="post" role="form">
										<h5>Basic Details</h5>
										
										<div class="form-group"> 
											<div>
												<label>Update Project Name (if required)<span class="required">*</span> </label>
											</div>
											<div class="my_internal_error"></div>
											<input type="text" class="form-control" name="project_update" id="project_update" value="<?php echo $prop_name;?>">
											<div class="project_lendth_error display_none error">Project name must be at least 3 characters long</div>
											<div class="project_error display_none error">Project name is required</div>
										</div>
									
										<div class="value_read">
											<div class="form-group row ">
												<div class="col-md-12" >
													<label for="comments" >Upload Signed MOU for this project<span class="required">*</span> </label><br>
													<label class="input_description" >File must be less than 10 MB in size</label>
												</div>	
												<div class="col-md-12">
													<button type="button" id="comman_file_upload_class" name="comman_file_upload_class" image_upload_desc="" upload_type="file" file_count="single" img_primary="no" file_prev_class="cycle_file_upload_selected" file_input_id="cycle_file_upload" class="btn btn-primary btn-lg comman_file_upload_class" data-toggle="modal" data-target="#browseFile"><i class="fa fa-upload"></i> </button>
													<div class="cycle_file_upload1_error display_none error">Signed MOU for this project is required</div>
													<label id="cycle_file_upload_error1" class="required display_none cycle_file_upload_error1">Your file must be less than 10MB in size.</label>
													<div>
														<div class="">
															<input class="form-control cycle_file_upload " id="cycle_file_upload" name="cycle_file_upload" type="hidden" value="<?php if($csr_file_value){ echo $csr_file_value;}?>">
														</div>
														<span class="registration_80g_valid" ></span>
														<div class="image-preview inline_block cycle_file_upload_selected">
															<input readonly class="form-control is_edit_data  actual_disp" type="text" id="cycle_file_upload_actual" <?php if(!$csr_file_value_actual){ echo 'display_none' ;} ?> value="<?php if($csr_file_value_actual){ echo $csr_file_value_actual;}?>">
														</div>
													</div>
												</div>
											</div>
										</div>
										
										<div class="form-group row">
											<label for="startdate" class="col-md-12">Enter start date for this project<span class="required">*</span></label>
											<div class="col-md-12"> 
												<input type="text" class="form-control date readonly_date project_start_date" name="project_start_date" placeholder="Project Start Date" value="<?php echo $project_start_date;?>" readonly>
												<div class="project_start_date_error error display_none" style="font-weight :900;">Start date is required</div>
											</div>
										</div>
										
										<div class="form-group row">
											<label for="startdate" class="col-md-12">Enter end date for this project<span class="required">*</span></label>
											<div class="col-md-12"> 
												<input type="text" class="form-control end_date readonly_date project_end_date" name="project_end_date" placeholder="Project End Date" value="<?php echo $project_end_date;?>" readonly>
												<div id="visit_date_error " class="visit_date_error error  display_none" style="font-weight :900;">Date is required.</div>
												<div class="project_end_date_error error display_none" style="font-weight :900;">End date is required</div>
												<div class="project_greater_error error display_none" style="font-weight :900;">End date for the project must be later than the start date</div>
											</div>
										</div>
										<?php 
											$db_result='';
											if($project_id>0){
												$sq4="select *,(select legal_name from donor where donor_id=project_donors.select_donor) as 'donor_legal_name'
														 from project_donors where project_id=$project_id";
												//var_dump($project_id);	 
												$db_result=$this->db->query($sq4)->result_array();
												//var_dump($db_result)	
											}
										?>					
										<div class="form-group row ">
											<div  class="col-md-12">
											   <label>Donor Details</label><br>
											   <label class="input_description">Donor details can be edited directly in the project details page for this project</label>
											</div>
										</div>	
									
										<div class="table-responsive">
											<table id="blog_view_table" class=" table table-striped table-bordered table-hover" >
												<thead>
													<tr>
														<th class="text-center">Donor</th>
														<th class="text-center">Amount</th>
														<th class="text-center">Vendor Code</th>
													</tr>
												</thead>
												<tbody>
													<?php
													if($db_result){
														
														foreach($db_result as $row){
														$donor_list = $this->db->get_where('donor',array('org_id' =>$org_id))->result_array();
														//var_dump($row);
													?>
													<tr>
														<td  class="text-center"><?php echo $row['donor_legal_name'];?></td>
														<td  class="text-center"><?php echo $row['donor_amount'];?> </td>
														<td  class="text-center"><?php if($row['vendor_code']!=''){ echo $row['vendor_code']; }else{?>
															<label style="cursor: pointer;" value="<?php echo $row['project_donor_id']?>" main_donor_id="<?php echo $row['select_donor'];?>"  class="label label-primary send_notification_by_vendor_code">Request Vendor Code</label>
															<?php }?>
														</td>
													</tr>
													<?php }}else{?>
														<tr><td></td>
															<tr style="color: red;" class="darker-on-hover"><td class="text-center" colspan="5">No data Available</td><tr>
														</tr>
													<?php }?>
												</tbody>
											</table>
										</div>
										<div class="form-group ">
											<div class="row">
												<div>
													<div>&nbsp;</div>
													<div class="button " style="margin-left: 17px;">
														<button type="button" <?php if($status == 'Completed'){echo 'disabled';}?>  id="save<?php if($status == 'Completed'){echo 'disabled';}?>" class="btn btn-primary">Save</button>
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
		
<script>
$('document').ready(function(){
	$(".date").datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: 'yy-mm-dd',
			yearRange : 'c-75:c+75',
	});	
	$(".end_date").datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: 'yy-mm-dd',
			minDate: 'dateToday',
			yearRange : 'c-75:c+75',
	});
		
	$('body').on('click','.send_notification_by_vendor_code', function () {
		var is_error='no';
		var project_id = $('#project_id').val();
		var org_task_id=$('#org_task_id').val();
		var org_task_list_id=$('#org_task_list_id').val();
		var org_id=$('#org_id').val();
		var prop_id=$('#prop_id').val();
		var superngo_id=$('#superngo_id').val();
		var ngo_id=$('#ngo_id').val();
		var org_staff_id=$('#org_staff_id').val();
		
		var project_donor_id=$(this).val();
		var main_donor_id=$(this).attr('main_donor_id');
			console.log("fdf");
			console.log(main_donor_id);
			if(is_error=='no'){	
				$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
				$.post(APP_URL + 'organisation/tasks/send_vandor_code_email', {
					project_id: project_id,
					org_task_id:org_task_id,
					org_task_list_id:org_task_list_id,
					org_id:org_id,
					prop_id:prop_id,
					superngo_id:superngo_id,
					ngo_id:ngo_id,			
					org_staff_id:org_staff_id,			
					project_donor_id:project_donor_id,			
					main_donor_id:main_donor_id,			
								
							
				},
				function (response) {
					$.unblockUI();
					$('#head_ngo_review').empty();
					if (response.status == 200) {
						var message = response.message;
						$.toaster({ priority :'success', message :'Vendor Code Send Successfully'});
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
	
	
	
		$("body").on("click",'#addProSpeci', function () {
		var myctime = $.now();
		$(".donor_html_div").find('.remove-added-para').attr('mytime',myctime);
		var div = $(".donor_html_div").html();
		$("#TextBoxContainer1").append(div);
		/*
		$('#TextBoxContainer1 .remove-added-para').each(function(){
			var myctime_ = $(this).attr('myctime');
			var myctime_ = $(this).find('.select_donor').attr('myctime');
			if(myctime_ != myctime){
				is_remove
				if($(this).attr('id') != optVal){
					
				}
			}
			var t = $(this).text();
			var v = ($(this).attr('value'));
			var i = ($(this).attr('id'));
			if($(this).attr('id') == optVal){
				optionh += '<option value="'+v+'" id="'+i+'">'+t+'</option>';
			}
		});*/
	});
	
		
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
			
			
		   
	   }
	});
	
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
		 
	   }else{
			//$('.my_recommend_yes').removeClass('display_none')
			$('.my_approve_yes').addClass('display_none')
			$('.my_request_yes').addClass('display_none')
			$('.my_reject_yes').removeClass('display_none')
	   }
	});
	
});
	$("body").on("click", ".removepara", function () {
		$(this).parent().parent().remove();
	});
	

	$('body').on('click','#save', function () {
		var additional_json = [];		
		var org_task_id=$('#org_task_id').val();
		var org_task_list_id=$('#org_task_list_id').val();
		var org_id=$('#org_id').val();
		var ngo_id=$('#ngo_id').val();
		var prop_id=$('#prop_id').val();
		var superngo_id=$('#superngo_id').val();
		var org_staff_id=$('#org_staff_id').val();
		var project_id = $('#project_id').val();
		console.log(project_id);
		var project_update=$('#project_update').val();
		var project_start_date=$('.project_start_date').val();
		var project_end_date=$('.project_end_date').val();
			
		var csr_file_value = $('.cycle_file_upload').val();
		if(csr_file_value){}else{csr_file_value='';}
			console.log("v");
			console.log(csr_file_value)
		var csr_file_value_actual = $('.actual_disp').val();
		if(csr_file_value_actual){}else{csr_file_value_actual='';}
		
		additional_json.push({
						
			'project_update':project_update,
			'project_start_date':project_start_date,
			'project_end_date':project_end_date,
			
			'csr_file_value':csr_file_value,
			'csr_file_value_actual':csr_file_value_actual,
			
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
					project_update:project_update,
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


	
	$('#product').validate({
		
		submitHandler: function (form) {
			//$.blockUI()
		var additional_json = [];	
		var is_error='no';	
		console.log('submit');
		var org_task_id=$('#org_task_id').val();
		var org_task_list_id=$('#org_task_list_id').val();
		var org_id=$('#org_id').val();
		var ngo_id=$('#ngo_id').val();
		var prop_id=$('#prop_id').val();
		var superngo_id=$('#superngo_id').val();
		var org_staff_id=$('#org_staff_id').val();
		
		var project_id = $('#project_id').val();
		console.log(project_id);
		var project_update=$('#project_update').val();
		var project_start_date=$('.project_start_date').val();
		var project_end_date=$('.project_end_date').val();
		
		if(project_update){
			$('.project_error').addClass('display_none');
			var  project_update_length= project_update.length;
			console.log(project_update_length);
			if(project_update_length>=3){
				
				$('.project_lendth_error').addClass('display_none');
			}else{
				is_error = 'yes';
				$('.project_error').addClass('display_none');
				$('.project_lendth_error').removeClass('display_none');
			}
		}else{
			is_error = 'yes';
			$('.project_error').removeClass('display_none');
		}
		
		if(project_start_date){
			$('.project_start_date_error').addClass('display_none');
		}else {
			is_error = 'yes';
			$('.project_start_date_error').removeClass('display_none');
		}
		
		if(project_end_date){
			$('.project_end_date_error').addClass('display_none');
			if(project_end_date > project_start_date){
				$('.project_end_date_error').addClass('display_none');
				$('.project_greater_error').addClass('display_none');
			}else{
				is_error = 'yes';
				$('.project_end_date_error').addClass('display_none');
				$('.project_greater_error').removeClass('display_none');
			}
			
		}else{
			is_error = 'yes';
			$('.project_end_date_error').removeClass('display_none');
		}

		
		var csr_file_value = $('.cycle_file_upload').val();
		if(csr_file_value){}else{csr_file_value='';}
		
		if(csr_file_value){
					 $(".cycle_file_upload1_error").addClass('display_none');
		}else{
			is_error='yes';
			$(".cycle_file_upload1_error").removeClass('display_none');
		}
	
		var csr_file_value_actual = $('.actual_disp').val();
		if(csr_file_value_actual){}else{csr_file_value_actual='';}
		
		additional_json.push({
			
			
			'project_update':project_update,
			'project_start_date':project_start_date,
			'project_end_date':project_end_date,
			
			'csr_file_value':csr_file_value,
			'csr_file_value_actual':csr_file_value_actual,
			
		});
		
				
		   
		
			console.log(additional_json);
		if(is_error=='no'){	
			$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
		
			$.post(APP_URL + 'organisation/tasks/change_status_onsubmit_by_project_documents', {
					additional_json:additional_json,
					org_task_id:org_task_id, 
					org_task_list_id:org_task_list_id,
					org_id:org_id,
					ngo_id:ngo_id,
					prop_id:prop_id,
					superngo_id:superngo_id,
					org_staff_id:org_staff_id,
					project_id:project_id,
					project_update:project_update,
					csr_file_value:csr_file_value,
					csr_file_value_actual:csr_file_value_actual,
					project_start_date:project_start_date,
					project_end_date:project_end_date,
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
		}
			return false;
		},
	
	
	
	
	});
	</script>

	