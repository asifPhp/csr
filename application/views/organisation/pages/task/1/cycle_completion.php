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
		
		$comments_no='';
			$comments_1='';
			$comments_2='';
			$comments_3='';
			$comments_4='';
			$comments_5='';
			$comments_6='';
			$comments_7='';
			$comments_8='';
			$comments_9='';
			$comments_10='';
			$comments_11='';
			$comments_12='';
			$comments_13='';
			$comments_14='';
			$comments_15='';
			$comments_16='';
			$comments_17='';
			$comments_18='';
			$comments_19='';
			$comments_20='';
			$is_review_radion='';
			
			$is_prior='';	
			$is_reference='';
			$is_leadership='';
			$is_recognition='';
			$is_linkage='';
			$is_management='';
			$is_geographical='';
			$is_benificiary='';
			$is_past='';
			$is_existing='';
			$is_target='';
			$is_subsector='';
			$is_problem='';
			$is_robust='';
			$is_outcome='';
			$is_me='';
			$is_budget='';
			$is_contribution='';
			$is_sustainable='';
			$is_rec='';
			
			$csr_file_value1='';
			$csr_file_value2='';
			$csr_file_value3='';
			
			$csr_file_value_actual1='';
			$csr_file_value_actual2='';
			$csr_file_value_actual3='';
		
		if(isset($data_value[0]['additional_json'])){
			$additional_json = json_decode($data_value[0]['additional_json']);
			//var_dump($additional_json);
			if(isset($additional_json[0]->comments_no)){
				$comments_no = $additional_json[0]->comments_no;
			}
			if(isset($additional_json[0]->comments_1)){
				$comments_1 = $additional_json[0]->comments_1;
			}
			if(isset($additional_json[0]->comments_2)){
				$comments_2 = $additional_json[0]->comments_2;
			}
			if(isset($additional_json[0]->comments_3)){
				$comments_3 = $additional_json[0]->comments_3;
			}
			if(isset($additional_json[0]->comments_4)){
				$comments_4 = $additional_json[0]->comments_4;
			}
			if(isset($additional_json[0]->comments_5)){
				$comments_5 = $additional_json[0]->comments_5;
			}
			if(isset($additional_json[0]->comments_6)){
				$comments_6 = $additional_json[0]->comments_6;
			}
			if(isset($additional_json[0]->comments_7)){
				$comments_7 = $additional_json[0]->comments_7;
			}
			if(isset($additional_json[0]->comments_8)){
				$comments_8 = $additional_json[0]->comments_8;
			}
			if(isset($additional_json[0]->comments_9)){
				$comments_9 = $additional_json[0]->comments_9;
			}
			if(isset($additional_json[0]->comments_10)){
				$comments_10 = $additional_json[0]->comments_10;
			}
			if(isset($additional_json[0]->comments_11)){
				$comments_11 = $additional_json[0]->comments_11;
			}
			if(isset($additional_json[0]->comments_12)){
				$comments_12 = $additional_json[0]->comments_12;
			}
			if(isset($additional_json[0]->comments_13)){
				$comments_13 = $additional_json[0]->comments_13;
			}
			if(isset($additional_json[0]->comments_14)){
				$comments_14 = $additional_json[0]->comments_14;
			}
			if(isset($additional_json[0]->comments_15)){
				$comments_15 = $additional_json[0]->comments_15;
			}
			if(isset($additional_json[0]->comments_16)){
				$comments_16 = $additional_json[0]->comments_16;
			}
			if(isset($additional_json[0]->comments_17)){
				$comments_17 = $additional_json[0]->comments_17;
			}
			if(isset($additional_json[0]->comments_18)){
				$comments_18 = $additional_json[0]->comments_18;
			}
			if(isset($additional_json[0]->comments_19)){
				$comments_19 = $additional_json[0]->comments_19;
			}
			if(isset($additional_json[0]->comments_20)){
				$comments_20 = $additional_json[0]->comments_20;
			}
			
			if(isset($additional_json[0]->is_review_radion)){
				$is_review_radion = $additional_json[0]->is_review_radion;
			}
			
			if(isset($additional_json[0]->is_prior)){
				$is_prior = $additional_json[0]->is_prior;
			}
			if(isset($additional_json[0]->is_reference)){
				$is_reference = $additional_json[0]->is_reference;
			}
			if(isset($additional_json[0]->is_leadership)){
				$is_leadership = $additional_json[0]->is_leadership;
			}
			if(isset($additional_json[0]->is_recognition)){
				$is_recognition = $additional_json[0]->is_recognition;
			}
			if(isset($additional_json[0]->is_linkage)){
				$is_linkage = $additional_json[0]->is_linkage;
			}
			if(isset($additional_json[0]->is_management)){
				$is_management = $additional_json[0]->is_management;
			}
			if(isset($additional_json[0]->is_geographical)){
				$is_geographical = $additional_json[0]->is_geographical;
			}
			if(isset($additional_json[0]->is_benificiary)){
				$is_benificiary = $additional_json[0]->is_benificiary;
			}
			if(isset($additional_json[0]->is_past)){
				$is_past = $additional_json[0]->is_past;
			}
			if(isset($additional_json[0]->is_existing)){
				$is_existing = $additional_json[0]->is_existing;
			}
			if(isset($additional_json[0]->is_target)){
				$is_target = $additional_json[0]->is_target;
			}
			if(isset($additional_json[0]->is_subsector)){
				$is_subsector = $additional_json[0]->is_subsector;
			}
			if(isset($additional_json[0]->is_problem)){
				$is_problem = $additional_json[0]->is_problem;
			}
			if(isset($additional_json[0]->is_robust)){
				$is_robust = $additional_json[0]->is_robust;
			}
			if(isset($additional_json[0]->is_outcome)){
				$is_outcome = $additional_json[0]->is_outcome;
			}
			if(isset($additional_json[0]->is_me)){
				$is_me = $additional_json[0]->is_me;
			}
			if(isset($additional_json[0]->is_budget)){
				$is_budget = $additional_json[0]->is_budget;
			}
			if(isset($additional_json[0]->is_contribution)){
				$is_contribution = $additional_json[0]->is_contribution;
			}
			if(isset($additional_json[0]->is_sustainable)){
				$is_sustainable = $additional_json[0]->is_sustainable;
			}
			if(isset($additional_json[0]->is_rec)){
				$is_rec = $additional_json[0]->is_rec;
			}
			
			if(isset($additional_json[0]->csr_file_value1)){
				$csr_file_value1 = $additional_json[0]->csr_file_value1;
			}
			if(isset($additional_json[0]->csr_file_value2)){
				$csr_file_value2 = $additional_json[0]->csr_file_value2;
			}
			if(isset($additional_json[0]->csr_file_value3)){
				$csr_file_value3 = $additional_json[0]->csr_file_value3;
			}
			
			if(isset($additional_json[0]->csr_file_value_actual1)){
				$csr_file_value_actual1 = $additional_json[0]->csr_file_value_actual1;
			}
			if(isset($additional_json[0]->csr_file_value_actual2)){
				$csr_file_value_actual2 = $additional_json[0]->csr_file_value_actual2;
			}
			if(isset($additional_json[0]->csr_file_value_actual3)){
				$csr_file_value_actual3 = $additional_json[0]->csr_file_value_actual3;
			}
		
		}else{
			
			$comments_no='';
			$comments_1='';
			$comments_2='';
			$comments_3='';
			$comments_4='';
			$comments_5='';
			$comments_6='';
			$comments_7='';
			$comments_8='';
			$comments_9='';
			$comments_10='';
			$comments_11='';
			$comments_12='';
			$comments_13='';
			$comments_14='';
			$comments_15='';
			$comments_16='';
			$comments_17='';
			$comments_18='';
			$comments_19='';
			$comments_20='';
			$is_review_radion='';
			
			$is_prior='';	
			$is_reference='';
			$is_leadership='';
			$is_recognition='';
			$is_linkage='';
			$is_management='';
			$is_geographical='';
			$is_benificiary='';
			$is_past='';
			$is_existing='';
			$is_target='';
			$is_subsector='';
			$is_problem='';
			$is_robust='';
			$is_outcome='';
			$is_me='';
			$is_budget='';
			$is_contribution='';
			$is_sustainable='';
			$is_rec='';
			
			$csr_file_value1='';
			$csr_file_value2='';
			$csr_file_value3='';
			
			$csr_file_value_actual1='';
			$csr_file_value_actual2='';
			$csr_file_value_actual3='';
			
			
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
		
			$comments_no='';
			$comments_1='';
			$comments_2='';
			$comments_3='';
			$comments_4='';
			$comments_5='';
			$comments_6='';
			$comments_7='';
			$comments_8='';
			$comments_9='';
			$comments_10='';
			$comments_11='';
			$comments_12='';
			$comments_13='';
			$comments_14='';
			$comments_15='';
			$comments_16='';
			$comments_17='';
			$comments_18='';
			$comments_19='';
			$comments_20='';
			$is_review_radion='';
			
			$is_prior='';	
			$is_reference='';
			$is_leadership='';
			$is_recognition='';
			$is_linkage='';
			$is_management='';
			$is_geographical='';
			$is_benificiary='';
			$is_past='';
			$is_existing='';
			$is_target='';
			$is_subsector='';
			$is_problem='';
			$is_robust='';
			$is_outcome='';
			$is_me='';
			$is_budget='';
			$is_contribution='';
			$is_sustainable='';
			$is_rec='';
			
			$csr_file_value1='';
			$csr_file_value2='';
			$csr_file_value3='';
			
			$csr_file_value_actual1='';
			$csr_file_value_actual2='';
			$csr_file_value_actual3='';
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
									
									$sql_payment_con="SELECT additional_json,org_task_id FROM `org_tasks` WHERE org_id=$org_id AND prop_id=$prop_id AND org_task_list_id=16";
									$task_data_fetch_payment_confirmation = $this->db->query($sql_payment_con)->result_array();
									if($task_data_fetch_payment_confirmation){	
										$data['payment_confirmation_data']=$task_data_fetch_payment_confirmation[0]['additional_json'];
										if($data['payment_confirmation_data']!=''){
											$this->load->view('organisation/pages/task/1/view_payment_confirmation',$data);
										}
									}
									
									/*$sql_checker="SELECT additional_json,org_task_id FROM `org_tasks` WHERE org_id=$org_id AND prop_id=$prop_id AND org_task_list_id=14";
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
									*/
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
									
<?php 
	$project_cycle_id=0;
	$db_result = $this->db->get_where('project_cycle_details',array('project_id' => $project_id,'is_completed'=>'yes'))->result();
	//var_dump($db_result);
	if($db_result){
	$project_cycle_id=$db_result[0]->project_cycle_id;	
	//var_dump($project_cycle_id);
	//$db_result1 = $this->db->get_where('project_document',array('project_id' => $project_id,'project_cycle_id'=>$project_cycle_id));
	//var_dump($db_result1->result());
	
	}else{
		$db_result1=0;
	}
	
?>
									<div class="form-group row  col-md-12">
										<label >NGO GST receipt for this payment (entered by NGO in their cycle details page for this cycle)</label>
									</div>	
									<input type="hidden" class="project_cycle_id" value="<?php echo $project_cycle_id;?>" >
										<?php 
										
										/*$result=$db_result1->result_array();
										var_dump($result);
											foreach($result as $row){
												//var_dump($row);
												$document_type=$row['document_type'];
												if($document_type=='ngo_document_list'){
													$document_value=$row['document_value'];
													$document_name=$row['document_name'];
											*/		
										?>
										<!--<div class="form-group row col-md-12">
											<input type="hidden" id="ngo_document_type" value="<?php echo $document_type;?>" >
											<input type="hidden" class="project_cycle_id" value="<?php echo $row['project_cycle_id'];?>" >
											<input type="hidden" class="project_document_id" value="<?php echo $row['id'];?>" >
											<span><?php echo $document_name;?></span>
											
										</div>
										<?php //} }if($document_value==''){?>	
											<button type="button" value="<?php echo  $project_cycle_id;?>" type="button" id="send_notification_by_ngo_doc" class="btn btn-info btn-sm ">Nudge NGO</button>
										<?php //}?>-->
									<div class="form-group row ">	 
										<div class="col-md-12">
											<div>&nbsp;</div>
												<div class="button ">
													<button type="button" <?php if($status == 'Completed'){echo 'disabled';}?>  id="save<?php if($status == 'Completed'){echo 'disabled';}?>" class="btn btn-primary display_none">Save</button>
													<button type="button" <?php if($status == 'Completed'){echo 'disabled';}?>  id="submit_cycle_complete<?php if($status == 'Completed'){echo 'disabled';}?>" class="btn btn-primary">Mark Cycle as Complete</button>
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
		<!--</div>
	</div>
</div>-->
	

<script>

$('document').ready(function(){

	/*$('body').on('click','.is_review_radion', function () {
		var radio_value = $('input[name="is_review_radion"]:radio:checked').next().html();

	   console.log(radio_value);
	   if(radio_value == 'Yes'){
			$('.is_review_radion_yes_no').removeClass('display_none')
			$('.is_review_radion_yes').removeClass('display_none')
			$('.is_review_radion_no').addClass('display_none')
			
	   }else{
			$('.is_review_radion_yes_no').removeClass('display_none')
			$('.is_review_radion_no').removeClass('display_none')
			$('.is_review_radion_yes').addClass('display_none')
		   
	   }
	});
	
	*/
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
	
	
	
	
	
	
	
	$("body").on("click",'.addProSpeci', function () {
		
		//get_organisation_data2();
		var myctime = $.now();
		$(".donor_html_div").find('.remove-added-para').attr('mytime',myctime);
		var div = $(".donor_html_div").html();
		//console.log(div);
		$(this).parent().parent().parent().find(".TextBoxContainer1").append(div);
		
	});
	
	$('body').on('click', '.removepara', function () {
        $(this).parent().parent().parent().parent().parent().remove();
    }); 
	
	$('body').on('click','#save', function () {
				
		var org_task_id=$('#org_task_id').val();
		var org_task_list_id=$('#org_task_list_id').val();
		var org_id=$('#org_id').val();
		var ngo_id=$('#ngo_id').val();
		var prop_id=$('#prop_id').val();
		var superngo_id=$('#superngo_id').val();
		var org_staff_id=$('#org_staff_id').val();
		var project_id=$('#project_id').val();
		var project_cycle_id = $('#project_cycle_id').val();
		var additional_json = [];
		var payment_list = [];
		
		var csr_file_value1 = $('.cycle_file_upload1').val();
			if(csr_file_value1){}else{csr_file_value1='';}
		var csr_file_value_actual1 = $('.actual_disp1').val();
			if(csr_file_value_actual1){}else{csr_file_value_actual1='';}
			
			$(".TextBoxContainer1 .payment_creation_form").each(function(){
				 							
				payment_list.push({
					donor_dropdown_id : $(this).find('.select_donor').val(),
					donor_dropdown : $(this).find('.select_donor option:selected').text(),
					cycle_donor_amount : $(this).find('.donor_amount').val(),
					project_cycle_donor_details_id : $(this).find('.project_cycle_donor_details_id').val(),
				});

			});  
			console.log(payment_list);
			additional_json.push({
				'payment_list':payment_list,
				'csr_file_value1':csr_file_value1,
				'csr_file_value_actual1':csr_file_value_actual1,
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
	
	
	$('body').on('click','#submit_cycle_complete', function () {
				
		var org_task_id=$('#org_task_id').val();
		var org_task_list_id=$('#org_task_list_id').val();
		var org_id=$('#org_id').val();
		var ngo_id=$('#ngo_id').val();
		var prop_id=$('#prop_id').val();
		var superngo_id=$('#superngo_id').val();
		var org_staff_id=$('#org_staff_id').val();
		var project_id=$('#project_id').val();
		var project_cycle_id_hidden = $('#project_cycle_id_hidden').val();
		var additional_json = [];
			additional_json.push({
				
			});
		
			$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
	
			$.post(APP_URL + 'organisation/tasks/change_status_onsubmit_by_cycle_completion_org1', {
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
		
		
		
	});	
	
	
	

});

</script>

