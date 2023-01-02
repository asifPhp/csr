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
		$is_payment='';
			$comments_no='';
			$comments_1='';
			$comments_2='';
			$is_review_radion='';
			$csr_file_value1='';
			$csr_file_value_actual1='';
			$cycle_is_payment='';
			
			$donor_amount='';
			$comments_change='';
			$target = 'target="_blank"';
			
			$project_id_radio='';
			$project_name_radio='';
			$startend_mou_radio='';
			$payment_period_radio='';
			$amount_show_radio='';
			$payment_request_radio='';
			
			$document_mou_radio='';
			$date_project_mou_radio='';
			$date_payment_mou_radio='';
			$total_expen_radio='';
			
			$bajaj_formate_radio='';
			$covor_all_mou_radio='';
			$period_covered_mou_radio='';
			$proper_photos_radio='';
			$donor_amount_list='';
			$was_focalPoint='';
			$comments_was_focal_no='';
			
			
		
		if(isset($data_value[0]['additional_json'])){
			$additional_json = json_decode($data_value[0]['additional_json']);
			//var_dump($additional_json);
			if(isset($additional_json[0]->is_review_radion)){
				$is_review_radion = $additional_json[0]->is_review_radion;
			}
			if(isset($additional_json[0]->comments_no)){
				$comments_no = $additional_json[0]->comments_no;
			}
			if(isset($additional_json[0]->comments_1)){
				$comments_1 = $additional_json[0]->comments_1;
			}
			if(isset($additional_json[0]->comments_2)){
				$comments_2 = $additional_json[0]->comments_2;
			}
			if(isset($additional_json[0]->csr_file_value1)){
				$csr_file_value1 = $additional_json[0]->csr_file_value1;
			}
			if(isset($additional_json[0]->csr_file_value_actual1)){
				$csr_file_value_actual1 = $additional_json[0]->csr_file_value_actual1;
			}
			if(isset($additional_json[0]->donor_amount)){
				$donor_amount = $additional_json[0]->donor_amount;
			}
			if(isset($additional_json[0]->comments_change)){
				$comments_change = $additional_json[0]->comments_change;
			}
			
			
			if(isset($additional_json[0]->project_id_radio)){
				$project_id_radio = $additional_json[0]->project_id_radio;
			}
			if(isset($additional_json[0]->project_name_radio)){
				$project_name_radio = $additional_json[0]->project_name_radio;
			}
			if(isset($additional_json[0]->startend_mou_radio)){
				$startend_mou_radio = $additional_json[0]->startend_mou_radio;
			}
			if(isset($additional_json[0]->payment_period_radio)){
				$payment_period_radio = $additional_json[0]->payment_period_radio;
			}
			if(isset($additional_json[0]->amount_show_radio)){
				$amount_show_radio = $additional_json[0]->amount_show_radio;
			}
			if(isset($additional_json[0]->payment_request_radio)){
				$payment_request_radio = $additional_json[0]->payment_request_radio;
			}
			
			
			if(isset($additional_json[0]->document_mou_radio)){
				$document_mou_radio = $additional_json[0]->document_mou_radio;
			}
			if(isset($additional_json[0]->date_project_mou_radio)){
				$date_project_mou_radio = $additional_json[0]->date_project_mou_radio;
			}
			if(isset($additional_json[0]->date_payment_mou_radio)){
				$date_payment_mou_radio = $additional_json[0]->date_payment_mou_radio;
			}
			if(isset($additional_json[0]->total_expen_radio)){
				$total_expen_radio = $additional_json[0]->total_expen_radio;
			}
			
			
			if(isset($additional_json[0]->bajaj_formate_radio)){
				$bajaj_formate_radio = $additional_json[0]->bajaj_formate_radio;
			}
			if(isset($additional_json[0]->covor_all_mou_radio)){
				$covor_all_mou_radio = $additional_json[0]->covor_all_mou_radio;
			}
			if(isset($additional_json[0]->period_covered_mou_radio)){
				$period_covered_mou_radio = $additional_json[0]->period_covered_mou_radio;
			}
			if(isset($additional_json[0]->proper_photos_radio)){
				$proper_photos_radio = $additional_json[0]->proper_photos_radio;
			}
			
			if(isset($additional_json[0]->donor_amount_list)){
				$donor_amount_list = $additional_json[0]->donor_amount_list;
				//var_dump($donor_amount_list);
			}
			if(isset($additional_json[0]->was_focalPoint)){
				$was_focalPoint = $additional_json[0]->was_focalPoint;
				//var_dump($donor_amount_list);
			}
			if(isset($additional_json[0]->comments_was_focal_no)){
				$comments_was_focal_no = $additional_json[0]->comments_was_focal_no;
				//var_dump($donor_amount_list);
			}
					
			
		
		}else{
			
			$was_focalPoint='';
			$comments_was_focal_no='';
			
			$donor_amount_list='';
			$project_id_radio='';
			$project_name_radio='';
			$startend_mou_radio='';
			$payment_period_radio='';
			$amount_show_radio='';
			$payment_request_radio='';
			
			$document_mou_radio='';
			$date_project_mou_radio='';
			$date_payment_mou_radio='';
			$total_expen_radio='';
			
			$bajaj_formate_radio='';
			$covor_all_mou_radio='';
			$period_covered_mou_radio='';
			$proper_photos_radio='';
			
			$comments_no='';
			$comments_1='';
			$comments_2='';
			$is_review_radion='';
			$csr_file_value1='';
			$csr_file_value_actual1='';
			
			$donor_amount='';
			$comments_change='';
			$cycle_is_payment='';
			
			
			
		}
		
		$payment_request_='no';
		$utilization_certificate_='no';
		$activity_report_='no';
		$payment_request_data = $this->db->get_where('project_document',array('project_id'=>$project_id,'project_cycle_id'=>$project_cycle_id,'document_type'=>'payment_processing_doc','document_name'=>'Payment Request'))->result_array();
		if($payment_request_data){
			$payment_request_='yes';
		}
		$utilization_certificate = $this->db->get_where('project_document',array('project_id'=>$project_id,'project_cycle_id'=>$project_cycle_id,'document_type'=>'payment_processing_doc','document_name'=>' Utilization Certificate (Audited/Internally verified as per MOU)'))->result_array();
		if($utilization_certificate){
			$utilization_certificate_='yes';
		}
		$activity_report_data = $this->db->get_where('project_document',array('project_id'=>$project_id,'project_cycle_id'=>$project_cycle_id,'document_type'=>'ngo_document_list','document_name'=>'Activity report (In Bajaj Format)'))->result_array();
		if($activity_report_data){
			$activity_report_='yes';
		}
	}else{
		$payment_request_='no';
		$utilization_certificate_='no';
		$activity_report_='no';
			
		$donor_amount_list='';
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
			
			$was_focalPoint='';
			$comments_was_focal_no='';
			$project_id_radio='';
			$project_name_radio='';
			$startend_mou_radio='';
			$payment_period_radio='';
			$amount_show_radio='';
			$payment_request_radio='';
			
			$document_mou_radio='';
			$date_project_mou_radio='';
			$date_payment_mou_radio='';
			$total_expen_radio='';
			
			$bajaj_formate_radio='';
			$covor_all_mou_radio='';
			$period_covered_mou_radio='';
			$proper_photos_radio='';
		
			$comments_no='';
			$comments_1='';
			$comments_2='';
			$is_review_radion='';
			$csr_file_value1='';
			$csr_file_value_actual1='';
			
			$donor_amount='';
			$comments_change='';
			$cycle_is_payment='';
			$task_type='';
			
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
					<input type="hidden" class="form-control" id="project_cycle_id" name="project_cycle_id" value="<?php echo $project_cycle_id;?>">
					<input type="hidden" class="form-control" id="payment_request_" name="payment_request_" value="<?php echo $payment_request_;?>">
					<input type="hidden" class="form-control" id="utilization_certificate_" name="utilization_certificate_" value="<?php echo $utilization_certificate_;?>">
					<input type="hidden" class="form-control" id="activity_report_" name="activity_report_" value="<?php echo $activity_report_;?>">
					
					
					<div class="row">
						<div class="col-lg-6">
							<?php 
								
								//var_dump($project_id);
								//$sql4="SELECT * FROM `project_cycle_details` WHERE project_id=$project_id AND is_completed='no' ORDER BY project_cycle_id ASC LIMIT 1";
								//$data['project_cycle_data'] = $this->db->query($sql4)->result_array();
								//var_dump($data['project_cycle_data']);
								//if($data['project_cycle_data']){	
									//$this->load->view('organisation/pages/task/1/view_focal_point',$data);
								//}
								
								if($task_type=='pmp'){
									$sql3="SELECT additional_json FROM `org_tasks` WHERE org_id=$org_id AND prop_id=$prop_id AND project_cycle_id=$project_cycle_id";
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
								
								
								
								$this->load->view('organisation/pages/task/ngo_information_collapse'); ?>
						</div>
						<div class="col-lg-6">
							<?php $this->load->view('organisation/pages/task/Task_cycle_details_review'); ?>
														
							
							<div class="box box-primary ">
								<div class="box-header with-border " data-widget="collapse">
									<i class="fa btn btn-box-tool fa_plus fa-minus"></i>
									<h3 class="box-title"><?php echo $data_value[0]['org_task_label']; ?></h3>
								</div>
								<div class="box-body" >
								
									<div class="form-group row ">
										<div>
											<label for="was_review" class="col-md-12 desk-review" id="was_review">Was the Focal Point Review done satisfactorily?<span class="required">*</span>
											</label>
										</div>
									 	<div class="col-md-12">
											<label style="font-weight: 400;">
												<input type="radio" class="was_focalPoint" name="was_focalPoint" value="Yes"  <?php if($was_focalPoint == 'Yes'){echo 'checked';}?>>&nbsp;
												<span>Yes</span> 
											</label>
											<label style="font-weight: 400;">
												<input type="radio"  class="was_focalPoint"  name="was_focalPoint" value="No"  <?php if($was_focalPoint == 'No'){echo 'checked';}?>>
												<span>No</span> 
											</label>
											<div class="was_focalPoint_error display_none "><label class="error"> Please Select any one</label></div>
										</div>
									</div>
									
									<div class="form-group row was_focalPoint_no <?php if($was_focalPoint=='No'){}else{ echo 'display_none';}?> " >
										<div class="col-md-12">
											<label for="comments" >What needs to be changed/improved?</label><br>
											<label class="input_description">This will be shared with the focal point to help them make the necessary improvements</label>
										 	<textarea id="comments_was_focal_no" name="comments_was_focal_no"  class="form-control"  rows="3" placeholder="Enter details here"><?php echo $comments_was_focal_no;?></textarea>
										</div>	
									</div>
									
									<div class="was_focalPoint_yes <?php if($was_focalPoint=='Yes'){}else{ echo 'display_none';}?> ">
									<?php
										if($payment_request_data){
									?>
										<h5>NGO Payment Request Doc Checklist</h5>
										
										<div class="form-group row ">
											<div>
												<label for="was_review" class="col-md-12 desk-review" id="was_review">Project ID entered correctly?<span class="required">*</span>
												</label>
											</div>
											<div class="col-md-12">
												<label style="font-weight: 400;">
													<input type="radio" class="project_id_radio" name="project_id_radio" value="Yes"  <?php if($project_id_radio == 'Yes'){echo 'checked';}?>>&nbsp;
													<span>Yes</span> 
												</label>
												<label style="font-weight: 400;">
													<input type="radio"  class="project_id_radio"  name="project_id_radio" value="No"  <?php if($project_id_radio == 'No'){echo 'checked';}?>>
													<span>No</span> 
												</label>
												<div class="project_id_radio_error display_none "><label class="error"> Please Select any one</label></div>
											</div>
										</div>
										
										<div class="form-group row ">
											<div>
												<label for="was_review" class="col-md-12 desk-review" id="was_review">Project name entered correctly?<span class="required">*</span>
												</label>
											</div>
											<div class="col-md-12">
												<label style="font-weight: 400;">
													<input type="radio" class="project_name_radio" name="project_name_radio" value="Yes"  <?php if($project_name_radio == 'Yes'){echo 'checked';}?>>&nbsp;
													<span>Yes</span> 
												</label>
												<label style="font-weight: 400;">
													<input type="radio"  class="project_name_radio"  name="project_name_radio" value="No"  <?php if($project_name_radio == 'No'){echo 'checked';}?>>
													<span>No</span> 
												</label>
												<div class="project_name_radio_error display_none "><label class="error"> Please Select any one</label></div>
											</div>
										</div>
																		
										<div class="form-group row ">
											<div>
												<label for="was_review" class="col-md-12 desk-review" id="was_review">Is Start and End Date as per MoU?<span class="required">*</span>
												</label>
											</div>
											<div class="col-md-12">
												<label style="font-weight: 400;">
													<input type="radio" class="startend_mou_radio" name="startend_mou_radio" value="Yes"  <?php if($startend_mou_radio == 'Yes'){echo 'checked';}?>>&nbsp;
													<span>Yes</span> 
												</label>
												<label style="font-weight: 400;">
													<input type="radio"  class="startend_mou_radio"  name="startend_mou_radio" value="No"  <?php if($startend_mou_radio == 'No'){echo 'checked';}?>>
													<span>No</span> 
												</label>
												<div class="startend_mou_radio_error display_none "><label class="error"> Please Select any one</label></div>
											</div>
										</div>
										
										<div class="form-group row ">
											<div>
												<label for="was_review" class="col-md-12 desk-review" id="was_review">Is Payment Period as per MOU?<span class="required">*</span>
												</label>
											</div>
											<div class="col-md-12">
												<label style="font-weight: 400;">
													<input type="radio" class="payment_period_radio" name="payment_period_radio" value="Yes"  <?php if($payment_period_radio == 'Yes'){echo 'checked';}?>>&nbsp;
													<span>Yes</span> 
												</label>
												<label style="font-weight: 400;">
													<input type="radio"  class="payment_period_radio"  name="payment_period_radio" value="No"  <?php if($payment_period_radio == 'No'){echo 'checked';}?>>
													<span>No</span> 
												</label>
												<div class="payment_period_radio_error display_none "><label class="error"> Please Select any one</label></div>
											</div>
										</div>
										
										<div class="form-group row ">
											<div>
												<label for="was_review" class="col-md-12 desk-review" id="was_review">Is the amount shown properly in LAKHS?<span class="required">*</span>
												</label>
											</div>
											<div class="col-md-12">
												<label style="font-weight: 400;">
													<input type="radio" class="amount_show_radio" name="amount_show_radio" value="Yes"  <?php if($amount_show_radio == 'Yes'){echo 'checked';}?>>&nbsp;
													<span>Yes</span> 
												</label>
												<label style="font-weight: 400;">
													<input type="radio"  class="amount_show_radio"  name="amount_show_radio" value="No"  <?php if($amount_show_radio == 'No'){echo 'checked';}?>>
													<span>No</span> 
												</label>
												<div class="amount_show_radio_error display_none "><label class="error"> Please Select any one</label></div>
											</div>
										</div>
										
										<div class="form-group row ">
											<div>
												<label for="was_review" class="col-md-12 desk-review" id="was_review">Is the Payment Request on the Organisation's Letter Head?<span class="required">*</span>
												</label>
											</div>
											<div class="col-md-12">
												<label style="font-weight: 400;">
													<input type="radio" class="payment_request_radio" name="payment_request_radio" value="Yes"  <?php if($payment_request_radio == 'Yes'){echo 'checked';}?>>&nbsp;
													<span>Yes</span> 
												</label>
												<label style="font-weight: 400;">
													<input type="radio"  class="payment_request_radio"  name="payment_request_radio" value="No"  <?php if($payment_request_radio == 'No'){echo 'checked';}?>>
													<span>No</span> 
												</label>
												<div class="payment_request_radio_error display_none "><label class="error"> Please Select any one</label></div>
											</div>
										</div>
									</div>
									<?php }?>
									<?php
									    if($utilization_certificate){
								    ?>
									<h5>Utilization Certificate Doc Checklist</h5>
									
									<div class="form-group row ">
										<div>
											<label for="was_review" class="col-md-12 desk-review" id="was_review">Is the document audited (or not) as per MOU?<span class="required">*</span>
											</label>
										</div>
									 	<div class="col-md-12">
											<label style="font-weight: 400;">
												<input type="radio" class="document_mou_radio" name="document_mou_radio" value="Yes"  <?php if($document_mou_radio == 'Yes'){echo 'checked';}?>>&nbsp;
												<span>Yes</span> 
											</label>
											<label style="font-weight: 400;">
												<input type="radio"  class="document_mou_radio"  name="document_mou_radio" value="No"  <?php if($document_mou_radio == 'No'){echo 'checked';}?>>
												<span>No</span> 
											</label>
											<div class="document_mou_radio_error display_none "><label class="error"> Please Select any one</label></div>
										</div>
									</div>
									
									<div class="form-group row ">
										<div>
											<label for="was_review" class="col-md-12 desk-review" id="was_review">Are dates for Project as per MOU?<span class="required">*</span>
											</label>
										</div>
									 	<div class="col-md-12">
											<label style="font-weight: 400;">
												<input type="radio" class="date_project_mou_radio" name="date_project_mou_radio" value="Yes"  <?php if($date_project_mou_radio == 'Yes'){echo 'checked';}?>>&nbsp;
												<span>Yes</span> 
											</label>
											<label style="font-weight: 400;">
												<input type="radio"  class="date_project_mou_radio"  name="date_project_mou_radio" value="No"  <?php if($date_project_mou_radio == 'No'){echo 'checked';}?>>
												<span>No</span> 
											</label>
											<div class="date_project_mou_radio_error display_none "><label class="error"> Please Select any one</label></div>
										</div>
									</div>
																	
									<div class="form-group row ">
										<div>
											<label for="was_review" class="col-md-12 desk-review" id="was_review">Are dates for Payment Period as per MOU?<span class="required">*</span>
											</label>
										</div>
									 	<div class="col-md-12">
											<label style="font-weight: 400;">
												<input type="radio" class="date_payment_mou_radio" name="date_payment_mou_radio" value="Yes"  <?php if($date_payment_mou_radio == 'Yes'){echo 'checked';}?>>&nbsp;
												<span>Yes</span> 
											</label>
											<label style="font-weight: 400;">
												<input type="radio"  class="date_payment_mou_radio"  name="date_payment_mou_radio" value="No"  <?php if($date_payment_mou_radio == 'No'){echo 'checked';}?>>
												<span>No</span> 
											</label>
											<div class="date_payment_mou_radio_error display_none "><label class="error"> Please Select any one</label></div>
										</div>
									</div>
									
									<div class="form-group row ">
										<div>
											<label for="was_review" class="col-md-12 desk-review" id="was_review">Is total expenditure and totals within each vertical correct?<span class="required">*</span>
											</label>
										</div>
									 	<div class="col-md-12">
											<label style="font-weight: 400;">
												<input type="radio" class="total_expen_radio" name="total_expen_radio" value="Yes"  <?php if($total_expen_radio == 'Yes'){echo 'checked';}?>>&nbsp;
												<span>Yes</span> 
											</label>
											<label style="font-weight: 400;">
												<input type="radio"  class="total_expen_radio"  name="total_expen_radio" value="No"  <?php if($total_expen_radio == 'No'){echo 'checked';}?>>
												<span>No</span> 
											</label>
											<div class="total_expen_radio_error display_none "><label class="error"> Please Select any one</label></div>
										</div>
									</div>
								<?php }?>
								<?php
								if($activity_report_data)
								{
								?>
									<h5>Activity Report Doc Checklist</h5>
									
									<div class="form-group row ">
										<div>
											<label for="was_review" class="col-md-12 desk-review" id="was_review">Is it as per Bajaj Format?<span class="required">*</span>
											</label>
										</div>
									 	<div class="col-md-12">
											<label style="font-weight: 400;">
												<input type="radio" class="bajaj_formate_radio" name="bajaj_formate_radio" value="Yes"  <?php if($bajaj_formate_radio == 'Yes'){echo 'checked';}?>>&nbsp;
												<span>Yes</span> 
											</label>
											<label style="font-weight: 400;">
												<input type="radio"  class="bajaj_formate_radio"  name="bajaj_formate_radio" value="No"  <?php if($bajaj_formate_radio == 'No'){echo 'checked';}?>>
												<span>No</span> 
											</label>
											<div class="bajaj_formate_radio_error display_none "><label class="error"> Please Select any one</label></div>
										</div>
									</div>
									
									<div class="form-group row ">
										<div>
											<label for="was_review" class="col-md-12 desk-review" id="was_review">Does it cover all the points mentioned in the MOU?<span class="required">*</span>
											</label>
										</div>
									 	<div class="col-md-12">
											<label style="font-weight: 400;">
												<input type="radio" class="covor_all_mou_radio" name="covor_all_mou_radio" value="Yes"  <?php if($covor_all_mou_radio == 'Yes'){echo 'checked';}?>>&nbsp;
												<span>Yes</span> 
											</label>
											<label style="font-weight: 400;">
												<input type="radio"  class="covor_all_mou_radio"  name="covor_all_mou_radio" value="No"  <?php if($covor_all_mou_radio == 'No'){echo 'checked';}?>>
												<span>No</span> 
											</label>
											<div class="covor_all_mou_radio_error display_none "><label class="error"> Please Select any one</label></div>
										</div>
									</div>
									
									
									<div class="form-group row ">
										<div>
											<label for="was_review" class="col-md-12 desk-review" id="was_review">Is the period covered as per the MOU?<span class="required">*</span>
											</label>
										</div>
									 	<div class="col-md-12">
											<label style="font-weight: 400;">
												<input type="radio" class="period_covered_mou_radio" name="period_covered_mou_radio" value="Yes"  <?php if($period_covered_mou_radio == 'Yes'){echo 'checked';}?>>&nbsp;
												<span>Yes</span> 
											</label>
											<label style="font-weight: 400;">
												<input type="radio"  class="period_covered_mou_radio"  name="period_covered_mou_radio" value="No"  <?php if($period_covered_mou_radio == 'No'){echo 'checked';}?>>
												<span>No</span> 
											</label>
											<div class="period_covered_mou_radio_error display_none "><label class="error"> Please Select any one</label></div>
										</div>
									</div>
									
									<div class="form-group row ">
										<div>
											<label for="was_review" class="col-md-12 desk-review" id="was_review">Have proper photos been provided?<span class="required">*</span>
											</label>
										</div>
										
									 	<div class="col-md-12">
											<label style="font-weight: 400;">
												<input type="radio" class="proper_photos_radio" name="proper_photos_radio" value="Yes"  <?php if($proper_photos_radio == 'Yes'){echo 'checked';}?>>&nbsp;
												<span>Yes</span> 
											</label>
											<label style="font-weight: 400;">
												<input type="radio"  class="proper_photos_radio"  name="proper_photos_radio" value="No"  <?php if($proper_photos_radio == 'No'){echo 'checked';}?>>
												<span>No</span> 
											</label>
											<div class="proper_photos_radio_error display_none "><label class="error"> Please Select any one</label></div>
										</div>
									</div>
									<?php
									}
									?>
									
									<div class="display_none">	
										<h5>Additional Details</h5>
										
										<div class="form-group row " >
											<div class="col-md-12">
												<label for="comments" >Additional details/comments for this cycle</label>
												<textarea id="comments_1" name="comments_1"  class="form-control"  rows="3" placeholder="Enter details here"><?php echo $comments_1;?></textarea>
											</div>	
										</div>
										
										<div class="form-group row " >
											<div class="col-md-12">
												<label for="comments">Additional details/comments for the NEXT cycle (if applicable)</label>
												<textarea id="comments_2" name="comments_2"  class="form-control"  rows="3" placeholder="Enter details here"><?php echo $comments_2;?></textarea>
											</div>	
										</div>
									</div>
									<?php
									$is_payment='';
									if($project_id){
										$sql4="SELECT project_cycle_id,is_payment FROM `project_cycle_details` WHERE project_cycle_id=$project_cycle_id ";
										$cycle_data = $this->db->query($sql4)->result_array();
										if($cycle_data){
											$is_payment=$cycle_data[0]['is_payment'];
											$project_cycle_id=$cycle_data[0]['project_cycle_id'];
										}
									?>
									<input type="hidden" name="is_payment_yes_no" id="is_payment_yes_no" value="<?php echo $is_payment;?>">
									
									<?php	if($is_payment=='yes'){?>
										<h5>Reviewer Summary</h5>	
										<div class="form-group row ">
											<div >
											
												<label for="was_review" class="col-md-12 desk-review" id="was_review">Should the payment be made for this cycle?<span class="required">*</span>
												</label>
											</div>
											<div class="col-md-12">
												<label style="font-weight: 400;">
													<input type="radio" class="is_review_radion" name="is_review_radion" value="Yes"  <?php if($is_review_radion == 'Yes'){echo 'checked';}?>>&nbsp;
															<span>Yes</span> 
												</label>
												<label style="font-weight: 400;">
													<input type="radio"  class="is_review_radion"  name="is_review_radion" value="No"  <?php if($is_review_radion == 'No'){echo 'checked';}?>>
																																																																																																																																																																																																																																																																																																																																																																																			<span>No</span> 
												</label>
												<label style="font-weight: 400;">
													<input type="radio"  class="is_review_radion"  name="is_review_radion" value="Change" <?php if($is_review_radion == 'Change'){echo 'checked';}?>>
														<span>Change Amount to be given</span> 
												</label> 
												<div class="is_review_radion_error display_none "><label class="error"> Please Select any one</label></div>
											</div>
													
										</div>
									<?php 
										}}
										$db_result='';
										
										if($project_id>0){
											$sql="SELECT * FROM project_cycle_donor_details WHERE project_id = $project_id AND project_cycle_id=$project_cycle_id ";
											$db_result = $this->db->query($sql)->result_array();
											
										}
									?>
									
									<div class="is_review_radion_change <?php if($is_review_radion == 'Change'){}else{ echo 'display_none'; }?>">
										<div class="form-group row  " >
											<div class="col-md-12"> 
												<label for="comments" >Enter the new amount for each donor</label>
												<label class="input_description">It must be less than or equal to the amount already allocated for this cycle. It cannot be more.</label>
												<div class="table-responsive">
													<table id="blog_view_table" class=" table table-striped table-bordered table-hover" >
														<thead>
															<tr>
																<th class="text-center">Donor</th>
																<th class="text-center">Amount</th>
															</tr>
														</thead>
														<tbody class="donor_amount_table">
															
															<?php if(!$db_result){?>
																<td class="text-center" colspan="5" >No data Available</td>
															<?php }
																if($db_result and $db_result>0){
																	//var_dump($db_result);die;
																	$donor_amount='';
																	$code='';
																	foreach($db_result as $row){
																		//var_dump($row);
																		$donor_id=$row['donor_dropdown_id'];
																		$sql6="SELECT code FROM donor WHERE donor_id=$donor_id";
																		$donor_list = $this->db->query($sql6)->result_array();
																		if($donor_list){
																			$code=$donor_list[0]['code'];
																		}
																		$donor_amount=$row['cycle_donor_amount'];
																		
																		if($donor_amount_list){
																			
																			foreach($donor_amount_list as $res){
																				//var_dump($res);
																				//var_dump($row['id']);
																				if($res->project_cycle_donor_id==$row['id']){
																					//var_dump("Matcht yes");
																					$donor_amount=$res->donor_amount;
																				}
																			}
																		}
																		
																	//var_dump($row);
																?>
																<tr>
																	<td  class="text-center" project_cycle_donor_id=<?php echo $row['id'];?>  project_id=<?php echo $row['project_id'];?> project_cycle_id=<?php echo $row['project_cycle_id'];?> ><?php echo $code;?></td>
																	<td  class="text-center"><input type="number" class="form-control donor_amount" name="donor_amount" placeholder="Amount" value="<?php echo $donor_amount;?>">
																	<div class="amount_error display_none "><label class="error">Amount is required.</label></div>	
																	</td>
																</tr>	
																
																												
																<?php } }?>
																
														</tbody>
													</table>
												</div>
												<div class="greater_error "></div>	
												
											</div>
										</div>
										
										<div class="form-group row " >
											<div class="col-md-12">
												<label for="comments">Reasons for amount change</label>
												<textarea id="comments_change" name="comments_change"  class="form-control"  rows="3" placeholder="Enter details here"><?php echo $comments_change;?></textarea>
											</div>	
										</div>
									</div>
									
									
									
									<div class="form-group row is_review_radion_no <?php if($is_review_radion == 'No'){}else{ echo 'display_none'; }?>" >
										<div class="col-md-12">
											<label for="comments">Why not?</label>
										 	<textarea id="comments_no" name="comments_no"  class="form-control"  rows="3" placeholder="Enter details here"><?php echo $comments_no;?></textarea>
										</div>	
									</div>

									<div class="form-group row ">	 
										<div class="col-md-12">
										<?php 
											
											$sql_is_payemnt="SELECT project_cycle_id,is_payment FROM project_cycle_details WHERE project_id=$project_id AND project_cycle_id=$project_cycle_id  ORDER BY project_cycle_id ASC LIMIT 1";
											$cycle_result = $this->db->query($sql_is_payemnt)->result_array();
												//var_dump($cycle_result);
											if($cycle_result){
												$is_payment=$cycle_result[0]['is_payment'];
												//var_dump($is_payment);
												if($is_payment=='no'){
													echo '<b>Submitting this task will mark this cycle as complete and initiate the next reporting/payment cycle.</b>';
												}else{
													echo '<b>Submitting this task will initiate Checker Review.</b>';
												}
											}
											?>
										
										
										
										<div>&nbsp;</div>
											<div class="button " style="margin-left: 17px;">
												<button type="button" <?php if($status == 'Completed'){echo 'disabled';}?>  id="save<?php if($status == 'Completed'){echo 'disabled';}?>" class="btn btn-primary">Save</button>
												<button type="button" <?php if($status == 'Completed'){echo 'disabled';}?>  id="submit_focal_point<?php if($status == 'Completed'){echo 'disabled';}?>" class="btn btn-success">Submit</button>
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

<script>

$('document').ready(function(){
	/* $('body').on('click','#payment_radio_no',function(){
		$('.is_payment_disp').removeClass('display_none'); 
	}); 
	 
    $('body').on('click','# ',function(){
		$('.is_payment_disp').addClass('display_none'); 

	});
	*/
	
	
	$('body').on('click','.is_review_radion', function () {
		var radio_value = $('input[name="is_review_radion"]:radio:checked').val();
		
	   console.log(radio_value);
	   if(radio_value == 'Change'){
			
			$('.is_review_radion_change').removeClass('display_none')
			$('.is_review_radion_no').addClass('display_none')
			
	   }else if(radio_value == 'No'){
			$('.is_review_radion_no').removeClass('display_none')
			$('.is_review_radion_change').addClass('display_none')
		   
	   }else{
			$('.is_review_radion_change').addClass('display_none')
			$('.is_review_radion_no').addClass('display_none')
	   }
	});
	
	
	$('body').on('click','.was_focalPoint', function () {
		var radio_value = $('input[name="was_focalPoint"]:radio:checked').val();
		
	   console.log(radio_value);
	   if(radio_value == 'No'){
			$('.was_focalPoint_no').removeClass('display_none')
			$('.was_focalPoint_yes').addClass('display_none')
		}else{
			$('.was_focalPoint_no').addClass('display_none')
			$('.was_focalPoint_yes').removeClass('display_none')
		}
	});
	
	
	$('body').on('click','#save', function () {
				
		var org_task_id=$('#org_task_id').val();
		var org_task_list_id=$('#org_task_list_id').val();
		var org_id=$('#org_id').val();
		var ngo_id=$('#ngo_id').val();
		var prop_id=$('#prop_id').val();
		var superngo_id=$('#superngo_id').val();
		var org_staff_id=$('#org_staff_id').val();
		
		var payment_request_=$('#payment_request_').val();
		var utilization_certificate_=$('#utilization_certificate_').val();
		var activity_report_=$('#activity_report_').val();
		
		var additional_json = [];	
		var is_review_radion=$('input[name="is_review_radion"]:radio:checked').val();
		var was_focalPoint=$('input[name="was_focalPoint"]:radio:checked').val();
		console.log("is_review_radion");
		console.log(is_review_radion);
		console.log(was_focalPoint);
		
		var csr_list = [];
		var is_error = 'no';
			
				
		console.log(csr_list);
		
		if(was_focalPoint=='Yes'){
			if(payment_request_=='yes'){
				var project_id_radio=$('input[name="project_id_radio"]:radio:checked').val();
				var project_name_radio=$('input[name="project_name_radio"]:radio:checked').val();
				var startend_mou_radio=$('input[name="startend_mou_radio"]:radio:checked').val();
				var payment_period_radio=$('input[name="payment_period_radio"]:radio:checked').val();
				var amount_show_radio=$('input[name="amount_show_radio"]:radio:checked').val();
				var payment_request_radio=$('input[name="payment_request_radio"]:radio:checked').val();
			}
		}else{
			var comments_was_focal_no = $('#comments_was_focal_no').val();
		}
		
		if(utilization_certificate_=='yes'){
			var document_mou_radio=$('input[name="document_mou_radio"]:radio:checked').val();
			var date_project_mou_radio=$('input[name="date_project_mou_radio"]:radio:checked').val();
			var date_payment_mou_radio=$('input[name="date_payment_mou_radio"]:radio:checked').val();
			var total_expen_radio=$('input[name="total_expen_radio"]:radio:checked').val();
		}
		if(activity_report_=='yes'){
			var bajaj_formate_radio=$('input[name="bajaj_formate_radio"]:radio:checked').val();
			var covor_all_mou_radio=$('input[name="covor_all_mou_radio"]:radio:checked').val();
			var period_covered_mou_radio=$('input[name="period_covered_mou_radio"]:radio:checked').val();
			var proper_photos_radio=$('input[name="proper_photos_radio"]:radio:checked').val();
		}
		
		var comments_1 = $('#comments_1').val();
		var comments_2 = $('#comments_2').val();	
		if(is_review_radion=='Change'){
			var amount_erro = 'no';	
			var donor_amount_list = [];
			var comments_change = $('#comments_change').val();
		
			
				$(".donor_amount_table tr").each(function(){
					var project_cycle_donor_id= $(this).find("td:eq(0)").attr('project_cycle_donor_id');
					var project_cycle_id= $(this).find("td:eq(0)").attr('project_cycle_id');
					var donor_amount= $(this).find("td:eq(1) input").val();
					donor_amount_list.push({
						project_cycle_donor_id : project_cycle_donor_id,
						project_cycle_id : project_cycle_id,
						donor_amount : donor_amount,
					});		
				});
				
				console.log(donor_amount_list);
				additional_json.push({
					//'csr_list':csr_list,
					donor_amount_list:donor_amount_list,
					is_review_radion:is_review_radion,
					//'csr_file_value1':csr_file_value1,
					//'csr_file_value_actual1':csr_file_value_actual1,
					
					project_id_radio : project_id_radio,
					project_name_radio : project_name_radio,
					startend_mou_radio : startend_mou_radio,
					payment_period_radio : payment_period_radio,
					amount_show_radio : amount_show_radio,
					payment_request_radio : payment_request_radio,
					
					was_focalPoint:was_focalPoint,
					comments_was_focal_no:comments_was_focal_no,
					
					
					document_mou_radio : document_mou_radio,
					date_project_mou_radio:date_project_mou_radio,
					date_payment_mou_radio:date_payment_mou_radio,
					total_expen_radio:total_expen_radio,
					
					bajaj_formate_radio:bajaj_formate_radio,
					covor_all_mou_radio:covor_all_mou_radio,
					period_covered_mou_radio:period_covered_mou_radio,
					proper_photos_radio:proper_photos_radio,
					
					comments_change:comments_change,
					
				
				});
		}else if(is_review_radion=='No'){
			
			var comments_no = $('#comments_no').val();
			additional_json.push({
				//csr_list:csr_list,
				is_review_radion:is_review_radion,
				//'csr_file_value1':csr_file_value1,
				//'csr_file_value_actual1':csr_file_value_actual1,
				
				project_id_radio : project_id_radio,
				project_name_radio : project_name_radio,
				startend_mou_radio : startend_mou_radio,
				payment_period_radio : payment_period_radio,
				amount_show_radio : amount_show_radio,
				payment_request_radio : payment_request_radio,
				
				was_focalPoint:was_focalPoint,
				comments_was_focal_no:comments_was_focal_no,
				
				document_mou_radio : document_mou_radio,
				date_project_mou_radio:date_project_mou_radio,
				date_payment_mou_radio:date_payment_mou_radio,
				total_expen_radio:total_expen_radio,
				
				bajaj_formate_radio:bajaj_formate_radio,
				covor_all_mou_radio:covor_all_mou_radio,
				period_covered_mou_radio:period_covered_mou_radio,
				proper_photos_radio:proper_photos_radio,
			
				'comments_1':comments_1,
				'comments_2':comments_2,
				'comments_no':comments_no,
			});
		}else{
			additional_json.push({
				//'csr_list':csr_list,
				is_review_radion:is_review_radion,
				//'csr_file_value1':csr_file_value1,
				//'csr_file_value_actual1':csr_file_value_actual1,
				
				project_id_radio : project_id_radio,
				project_name_radio : project_name_radio,
				startend_mou_radio : startend_mou_radio,
				payment_period_radio : payment_period_radio,
				amount_show_radio : amount_show_radio,
				payment_request_radio : payment_request_radio,
				
				was_focalPoint:was_focalPoint,
				comments_was_focal_no:comments_was_focal_no,
				
				document_mou_radio : document_mou_radio,
				date_project_mou_radio:date_project_mou_radio,
				date_payment_mou_radio:date_payment_mou_radio,
				total_expen_radio:total_expen_radio,
				
				bajaj_formate_radio:bajaj_formate_radio,
				covor_all_mou_radio:covor_all_mou_radio,
				period_covered_mou_radio:period_covered_mou_radio,
				proper_photos_radio:proper_photos_radio,
			
				'comments_1':comments_1,
				'comments_2':comments_2,
				
			});
		}  
		
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
					csr_list:csr_list,
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
	
	$('body').on('click','#submit_focal_point', function () {
			
			var is_error='no';
			var org_task_id=$('#org_task_id').val();
			var org_task_list_id=$('#org_task_list_id').val();
			var org_id=$('#org_id').val();
			var ngo_id = $('#ngo_id').val();
			var prop_id=$('#prop_id').val();
			var superngo_id=$('#superngo_id').val();
			var org_staff_id=$('#org_staff_id').val();
			var project_id=$('#project_id').val();
			var additional_json = [];	
			var comments_1 = $('#comments_1').val();
			var comments_2 = $('#comments_2').val();
			var project_cycle_id = $('#project_cycle_id').val();
			console.log(project_cycle_id);
			
			var payment_request_=$('#payment_request_').val();
			var utilization_certificate_=$('#utilization_certificate_').val();
			var activity_report_=$('#activity_report_').val();
			
			var was_focalPoint=$('input[name="was_focalPoint"]:radio:checked').val();
			var comments_was_focal_no='';
			if(was_focalPoint){
				$(".was_focalPoint_error").addClass('display_none');
			}else{
				is_error='yes';
				$(".was_focalPoint_error").removeClass('display_none');
			}
			if(was_focalPoint=='Yes'){
				if(payment_request_=='yes'){
					var project_id_radio=$('input[name="project_id_radio"]:radio:checked').val();
					if(project_id_radio){
						$(".project_id_radio_error").addClass('display_none');
					}else{
						is_error='yes';
						$(".project_id_radio_error").removeClass('display_none');
					}
					
					var project_name_radio=$('input[name="project_name_radio"]:radio:checked').val();
					if(project_name_radio){
						$(".project_name_radio_error").addClass('display_none');
					}else{
						is_error='yes';
						$(".project_name_radio_error").removeClass('display_none');
					}
					var startend_mou_radio=$('input[name="startend_mou_radio"]:radio:checked').val();
					if(startend_mou_radio){
						$(".startend_mou_radio_error").addClass('display_none');
					}else{
						is_error='yes';
						$(".startend_mou_radio_error").removeClass('display_none');
					}
					var payment_period_radio=$('input[name="payment_period_radio"]:radio:checked').val();
					if(payment_period_radio){
						$(".payment_period_radio_error").addClass('display_none');
					}else{
						is_error='yes';
						$(".payment_period_radio_error").removeClass('display_none');
					}
					var amount_show_radio=$('input[name="amount_show_radio"]:radio:checked').val();
					if(amount_show_radio){
						$(".amount_show_radio_error").addClass('display_none');
					}else{
						is_error='yes';
						$(".amount_show_radio_error").removeClass('display_none');
					}
					var payment_request_radio=$('input[name="payment_request_radio"]:radio:checked').val();
					if(payment_request_radio){
						$(".payment_request_radio_error").addClass('display_none');
					}else{
						is_error='yes';
						$(".payment_request_radio_error").removeClass('display_none');
					}
				}
			}else{
				
				comments_was_focal_no = $('#comments_was_focal_no').val();
			}
			
			if(utilization_certificate_=='yes'){
				var document_mou_radio=$('input[name="document_mou_radio"]:radio:checked').val();
				if(document_mou_radio){
					$(".document_mou_radio_error").addClass('display_none');
				}else{
					is_error='yes';
					$(".document_mou_radio_error").removeClass('display_none');
				}
				var date_project_mou_radio=$('input[name="date_project_mou_radio"]:radio:checked').val();
				if(date_project_mou_radio){
					$(".date_project_mou_radio_error").addClass('display_none');
				}else{
					is_error='yes';
					$(".date_project_mou_radio_error").removeClass('display_none');
				}
				var date_payment_mou_radio=$('input[name="date_payment_mou_radio"]:radio:checked').val();
				if(date_payment_mou_radio){
					$(".date_payment_mou_radio_error").addClass('display_none');
				}else{
					is_error='yes';
					$(".date_payment_mou_radio_error").removeClass('display_none');
				}
				var total_expen_radio=$('input[name="total_expen_radio"]:radio:checked').val();
				if(total_expen_radio){
					$(".total_expen_radio_error").addClass('display_none');
				}else{
					is_error='yes';
					$(".total_expen_radio_error").removeClass('display_none');
				}
			}
			if(activity_report_=='yes'){
				var bajaj_formate_radio=$('input[name="bajaj_formate_radio"]:radio:checked').val();
				if(bajaj_formate_radio){
					$(".bajaj_formate_radio_error").addClass('display_none');
				}else{
					is_error='yes';
					$(".bajaj_formate_radio_error").removeClass('display_none');
				}
				var covor_all_mou_radio=$('input[name="covor_all_mou_radio"]:radio:checked').val();
				if(covor_all_mou_radio){
					$(".covor_all_mou_radio_error").addClass('display_none');
				}else{
					is_error='yes';
					$(".covor_all_mou_radio_error").removeClass('display_none');
				}
				var period_covered_mou_radio=$('input[name="period_covered_mou_radio"]:radio:checked').val();
				if(period_covered_mou_radio){
					$(".period_covered_mou_radio_error").addClass('display_none');
				}else{
					is_error='yes';
					$(".period_covered_mou_radio_error").removeClass('display_none');
				}
				var proper_photos_radio=$('input[name="proper_photos_radio"]:radio:checked').val();
				if(proper_photos_radio){
					$(".proper_photos_radio_error").addClass('display_none');
				}else{
					is_error='yes';
					$(".proper_photos_radio_error").removeClass('display_none');
				}
			}
		
			var is_payment_yes_no = $('#is_payment_yes_no').val();
			console.log("is_payment_yes_no");
			console.log(is_payment_yes_no);
			
			if(is_payment_yes_no=='yes'){
				
				var is_review_radion=$('input[name="is_review_radion"]:radio:checked').val();
				 
				if(is_review_radion){
					  $(".is_review_radion_error").addClass('display_none');
				}else{
					is_error='yes';
					$(".is_review_radion_error").removeClass('display_none'); 
				}
					 
				
				var is_cycle_error='no';	
				if(is_review_radion=='Change'){
					var amount_erro = 'no';	
					var donor_amount_list = [];
					var comments_change = $('#comments_change').val();
								
					$(".donor_amount_table tr").each(function(){
						var project_cycle_donor_id= $(this).find("td:eq(0)").attr('project_cycle_donor_id');
						var project_cycle_id= $(this).find("td:eq(0)").attr('project_cycle_id');
						var donor_amount= $(this).find("td:eq(1) input").val();
						console.log("fsdf");
						console.log(donor_amount);
						if(donor_amount){
							$(this).find(".amount_error").addClass('display_none');
						}else{
							is_error='yes';
							$(this).find(".amount_error").removeClass('display_none');
						}
						donor_amount_list.push({
							project_cycle_donor_id : project_cycle_donor_id,
							project_cycle_id : project_cycle_id,
							donor_amount : donor_amount,
											
						});		
						
					});
					
							
					additional_json.push({
						
						donor_amount_list:donor_amount_list,
						is_review_radion:is_review_radion,
						//'csr_file_value1':csr_file_value1,
						//'csr_file_value_actual1':csr_file_value_actual1,
						project_id_radio : project_id_radio,
						project_name_radio : project_name_radio,
						startend_mou_radio : startend_mou_radio,
						payment_period_radio : payment_period_radio,
						amount_show_radio : amount_show_radio,
						payment_request_radio : payment_request_radio,
						
						was_focalPoint:was_focalPoint,
						comments_was_focal_no:comments_was_focal_no,
						
						document_mou_radio : document_mou_radio,
						date_project_mou_radio:date_project_mou_radio,
						date_payment_mou_radio:date_payment_mou_radio,
						total_expen_radio:total_expen_radio,
						
						bajaj_formate_radio:bajaj_formate_radio,
						covor_all_mou_radio:covor_all_mou_radio,
						period_covered_mou_radio:period_covered_mou_radio,
						proper_photos_radio:proper_photos_radio,
								
						comments_change:comments_change,
					
					});
					
				}else if(is_review_radion=='No'){
					var comments_no = $('#comments_no').val();
					additional_json.push({
						
						is_review_radion:is_review_radion,
						//'csr_file_value1':csr_file_value1,
						//'csr_file_value_actual1':csr_file_value_actual1,
						project_id_radio : project_id_radio,
						project_name_radio : project_name_radio,
						startend_mou_radio : startend_mou_radio,
						payment_period_radio : payment_period_radio,
						amount_show_radio : amount_show_radio,
						payment_request_radio : payment_request_radio,
						
						was_focalPoint:was_focalPoint,
						comments_was_focal_no:comments_was_focal_no,
						
						document_mou_radio : document_mou_radio,
						date_project_mou_radio:date_project_mou_radio,
						date_payment_mou_radio:date_payment_mou_radio,
						total_expen_radio:total_expen_radio,
						
						bajaj_formate_radio:bajaj_formate_radio,
						covor_all_mou_radio:covor_all_mou_radio,
						period_covered_mou_radio:period_covered_mou_radio,
						proper_photos_radio:proper_photos_radio,
							
						comments_no:comments_no,
					});
				}else{
					additional_json.push({
						is_review_radion:is_review_radion,
						//'csr_file_value1':csr_file_value1,
						//'csr_file_value_actual1':csr_file_value_actual1,
						project_id_radio : project_id_radio,
						project_name_radio : project_name_radio,
						startend_mou_radio : startend_mou_radio,
						payment_period_radio : payment_period_radio,
						amount_show_radio : amount_show_radio,
						payment_request_radio : payment_request_radio,
						
						was_focalPoint:was_focalPoint,
						comments_was_focal_no:comments_was_focal_no,
						
						document_mou_radio : document_mou_radio,
						date_project_mou_radio:date_project_mou_radio,
						date_payment_mou_radio:date_payment_mou_radio,
						total_expen_radio:total_expen_radio,
						
						bajaj_formate_radio:bajaj_formate_radio,
						covor_all_mou_radio:covor_all_mou_radio,
						period_covered_mou_radio:period_covered_mou_radio,
						proper_photos_radio:proper_photos_radio,
				
						
						'comments_1':comments_1,
						'comments_2':comments_2,
						
					});
				}
			}else{
				additional_json.push({
					is_review_radion:is_review_radion,
					//'csr_file_value1':csr_file_value1,
					//'csr_file_value_actual1':csr_file_value_actual1,
					project_id_radio : project_id_radio,
					project_name_radio : project_name_radio,
					startend_mou_radio : startend_mou_radio,
					payment_period_radio : payment_period_radio,
					amount_show_radio : amount_show_radio,
					payment_request_radio : payment_request_radio,
					
					was_focalPoint:was_focalPoint,
					comments_was_focal_no:comments_was_focal_no,
					
					document_mou_radio : document_mou_radio,
					date_project_mou_radio:date_project_mou_radio,
					date_payment_mou_radio:date_payment_mou_radio,
					total_expen_radio:total_expen_radio,
					
					bajaj_formate_radio:bajaj_formate_radio,
					covor_all_mou_radio:covor_all_mou_radio,
					period_covered_mou_radio:period_covered_mou_radio,
					proper_photos_radio:proper_photos_radio,
			
				});
			}
		
			
			console.log("additional_json");
			console.log(additional_json);
			console.log(cycle_payment_yes_no);
			if(is_error=='no'){
				$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
				
				$.post(APP_URL + 'organisation/tasks/change_status_onsubmit_by_internal_verification', {
						additional_json:additional_json,
						org_task_id:org_task_id, 
						org_task_list_id:org_task_list_id,
						org_id:org_id,
						ngo_id:ngo_id,
						prop_id:prop_id,
						superngo_id:superngo_id,
						org_staff_id:org_staff_id,	
						project_id:project_id,	
						was_focalPoint:was_focalPoint,	
						comments_was_focal_no:comments_was_focal_no,	
						is_payment_yes_no:is_payment_yes_no,	
						project_cycle_id:project_cycle_id,	
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
							/*var is_cycle_complete = response.is_cycle_complete;
							var cycle_payment_yes_no = response.cycle_payment_yes_no;
							var org_task_id = response.org_task_id;
							if(cycle_payment_yes_no=='yes' && is_cycle_complete=='no'){
								window.location.href=APP_URL+"organisation/tasks/mytasks";
							}else if(cycle_payment_yes_no=='no' && is_cycle_complete=='no'){
								window.location.href=APP_URL+"organisation/tasks/mytasks";//detail?id="+org_task_id+"&sourse=tasks";
							}else{
								window.location.href=APP_URL+"organisation/tasks/mytasks";
							}*/
							
							
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
	
	});
	
});

</script>

