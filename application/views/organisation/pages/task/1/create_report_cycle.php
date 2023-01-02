<link rel="stylesheet" href="<?php echo base_url()?>assets/css/comboTreePlugin.css">
<script src="<?php echo base_url()?>assets/js/comboTreePlugin.js"></script>
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
.actual_disp1{
	background-color: white !important;
    opacity: 1 !important;
    margin-top: 10px !important;
    border: none !important;
    color: blue !important;
}
.comboTreeInputBox{background-color: #fff !important;
    opacity: 1;border-radius: 0px !important;
	   
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
		$csr_file_value1='';
		$csr_file_value_actual1='';
		$cycle_list_additional_json='';
		
		
		if(isset($data_value[0]['additional_json'])){
			$additional_json = json_decode($data_value[0]['additional_json']);
			//var_dump($additional_json);
			if(isset($additional_json[0]->project_start_date)){
				$project_start_date = $additional_json[0]->project_start_date;
			}
			if(isset($additional_json[0]->project_end_date)){
				$project_end_date = $additional_json[0]->project_end_date;
			}
			
			if(isset($additional_json[0]->csr_file_value1)){
				$csr_file_value1 = $additional_json[0]->csr_file_value1;
			}
			if(isset($additional_json[0]->csr_file_value_actual1)){
				$csr_file_value_actual1 = $additional_json[0]->csr_file_value_actual1;
			}
			if(isset($additional_json[0]->cycle_list)){
				$cycle_list_additional_json = $additional_json[0]->cycle_list;
				//var_dump($cycle_list_additional_json);
			}
			
			
		}else{
			$project_start_date='';
			$project_end_date='';			
			$csr_file_value1='';
			$csr_file_value_actual1='';
			$cycle_list_additional_json='';
			
		}
	//$donor_list = $this->db->get_where('donor',array('org_id' =>$org_id))->result_array();
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
			
		$csr_file_value1='';
		$csr_file_value_actual1='';
		$cycle_list_additional_json='';
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
									<div id="CycleTextBoxContainer" class="display_none">
										<?php if($cycle_list_additional_json and $cycle_list_additional_json!=''){
											$i=0;
											foreach($cycle_list_additional_json as $cycle_val){
												$i++;
												//var_dump($cycle_val);
												
										?>
										<div class="panel panel-default cycle_creation_form">
											<div class="panel-body">
												<div class="form-group row">
													<div class="col-lg-12">
													<?php if($i!=1){?>
														<button type="button" class="btn btn-danger pull-right CycleRemovepara btn-sm " style="margin-top: -10px;"><i class="fa fa-close"></i></button> 
													<?php }?>  
													   <label>Cycle Name<span class="required">*</span> </label>
														<div class="my_internal_error"></div>
														<input type="hidden" class="form-control plan_Cycle ngo_doc_list"  name="" placeholder="Cycle name" value="<?php echo $cycle_val->ngo_doc; ?>">
														<input type="hidden" class="form-control plan_Cycle csr_doc_list"  name="cycle_name" placeholder="Cycle name" value="<?php echo $cycle_val->csr_doc; ?>">
														<input type="text" class="form-control plan_Cycle cycle_name"  name="cycle_name" placeholder="Cycle name" value="<?php echo $cycle_val->cycle_name; ?>">
														<div class="cycle_name_error display_none error">Cycle Name must be at least 3 characters longs</div>
													</div>
												</div>
												<div class="form-group row">
													<label for="startdate" class="col-md-12">Date this cycle ENDS<span class="required">*</span></label>
													<div class="col-md-12"> 
														<input type="text" class="form-control end_date readonly_date project_date" name="project_date" placeholder="date" value="<?php echo $cycle_val->cycle_start_date1; ?>" readonly>
														<div class="project_date_between_error display_none"><label class="error">Date this cycle must between Start date and End date.</label></div>
													</div>
												</div>
												<div class="form-group row ">
													<div class="form-group col-md-12">
														<label>Does this cycle involve a payment?<span class="required">*</span></label>
														<input type="radio"  class="is_payment" name="is_payment" value="yes" <?php if(isset($cycle_val->is_payment) == 'yes'){echo 'checked';}?> > Yes
														<input type="radio" class="is_payment"  name="is_payment" value="no" <?php if(isset($cycle_val->is_payment) == 'no'){echo 'checked';}?>> No
														<div class="is_payment_checked_error display_none"><label class="error">Please select any one </label></div>
													</div>
												</div>
												<?php 
													$db_result='';
													if($project_id>0){
													$sq4="select *,(select legal_name from donor where donor_id=project_donors.select_donor) as 'donor_legal_name'
															 from project_donors where project_id=$project_id";
													//var_dump($project_id);	 
													$db_result=$this->db->query($sq4)->result_array();
													//var_dump($db_result);	
													}
												?>		
												<div class="is_payment_yes <?php if(isset($cycle_val->is_payment) == 'yes'){}else{ echo 'display_none'; }?> ">	
													<div class="form-group row">
														<label for="donor_details" class="col-md-12">Donor<span class="required">*</span> </label>
													</div>
													<div class="TextBoxContainer1" >
														<?php if(isset($cycle_val->payment_list)){
																$j=0;
																foreach($cycle_val->payment_list as $payment_val){
																	$j++;
																	//var_dump($payment_val);
															?>
														<div class="panel panel-default payment_creation_form">
															<div class="panel-body">
																<input type="hidden" class="ngo_payemnt_documents"  value="<?php echo $payment_val->ngo_payment; ?>">
																<div class="form-group row">
																	<div class="remove-added-para" mytime="" >
																		<div class="col-md-12">
																			<label>Select Donor<span class="required">*</span> </label>
																			<?php if($j!=1){?>
																				<button class="btn btn-warning removepara radius50 pull-right btn-sm" style="margin-top: -12px;" >&times;</button>
																			<?php }?>
																			<select class="form-control select_donor"  name="select_donor" id="select_donor" >
																				<option value="">Select donor</option>
																				<?php 
																					if($db_result){
																						foreach($db_result as $val){ 
																							$is_selected='';
																							if($val['select_donor']==$payment_val->donor_dropdown_id){
																								$is_selected='selected';
																							}
																							echo '<option class="is_remove" '.$is_selected.' pre_amount="'.$val['donor_amount'].'" value="'.$val['select_donor'].'">'.$val['donor_legal_name'].'</option>';
																						}		
																					}		
																				?>
																			</select>
																		</div>
																		<div class="col-md-12 ">
																			<label>Amount<span class="required">*</span> </label>
																			<label class="input_description">Enter the full amount for this donor in INR. Amount must be a whole number. No decimal values (Paise) allowed.</label>
																			<input type="number" class="form-control donor_amount"  name="donor_amount" placeholder="Amount" value="<?php echo $cycle_val->cycle_donor_amount; ?>">
																		</div>
																	</div>
																</div>
																<div class="form-group row  col-md-12">
																	<label>Payment documents required from the NGO<span class="required">*</span></label>
																	<input type="text" readonly  class="form-control ngo_payment" name="ngo_payment" placeholder="Ngo payment" value="<?php echo $cycle_val->ngo_payment; ?>">
																</div>
															</div>
														</div>
														
														<?php }}else{?>
														<div class="panel panel-default payment_creation_form">
															<div class="panel-body">
																<div class="form-group row">
																	<div class="remove-added-para" mytime="" >
																		<div class="col-md-12">
																			<label>Select Donor<span class="required">*</span> </label>
																			<select class="form-control select_donor"  name="select_donor" id="select_donor" >
																				<option value="">Select donor</option>
																				<?php 
																					if($db_result){
																						foreach($db_result as $val){ 
																							echo '<option class="is_remove"  pre_amount="'.$val['donor_amount'].'" value="'.$val['select_donor'].'">'.$val['donor_legal_name'].'</option>';
																						}		
																					}		
																				?>
																			</select>
																		</div>
																		<div class="col-md-12 ">
																			<label>Amount<span class="required">*</span> </label>
																			<label class="input_description">Enter the full amount for this donor in INR. Amount must be a whole number. No decimal values (Paise) allowed.</label>
																			<input type="number" class="form-control donor_amount"  name="donor_amount" placeholder="Amount" value="<?php echo $cycle_val->cycle_donor_amount; ?>">
																		</div>
																	</div>
																</div>
																<div class="form-group row  col-md-12">
																	<label>Payment documents required from the NGO<span class="required">*</span></label>
																	<input type="text" readonly  class="form-control ngo_payment" name="ngo_payment" placeholder="Ngo payment" value="<?php echo $cycle_val->ngo_payment; ?>">
																</div>
															</div>
														</div>
														<?php }?>
													</div>
													
													<div class="form-group row">
														<div class="col-md-12"> 
															<button type="button"  class="btn btn-success addProSpeci"><i class="fa fa-plus"></i></button><label style="margin-left:5px;">Add another donor</label>
															<!--<input  class="btn btn-success addProSpeci" type="button" value="&#43 Add another donor" />	-->
															<div id="donor_list_error" class="display_none error ">Atleast one required.</div>
															<div id="donor_data_error" class="display_none error">All values are required.</div>
															<div class="error donor_duplicate_error display_none error" >Please select another donor.</div>
														</div>
													</div>
												</div>
												<div class="form-group row  col-md-12">
													<label>Project Assessment Documents required from the NGO for this cycle<span class="required">*</span></label>
													<input type="text" readonly  class="form-control ngo_doc " name="ngo_doc" placeholder="Ngo documents" ngo_type="" >
												</div>
												<div class="form-group row  col-md-12">
													<label>Documents to be provided by us<span class="required">*</span></label>
													<input type="text" readonly  class="form-control csr_doc" name="csr_doc" placeholder="Csr documents">
												</div>
											</div>
										</div>	
										<?php }}else{?>
										
										
										<div class="panel panel-default cycle_creation_form">
											<div class="panel-body">
												<div class="form-group row">
													<div class="col-lg-12">
													   <label>Cycle Name<span class="required">*</span> </label>
														<div class="my_internal_error"></div>
														<input type="text" class="form-control plan_Cycle cycle_name"  name="cycle_name" placeholder="Cycle name" value="">
														<div class="cycle_name_error display_none error">Cycle Name must be at least 3 characters longs</div>
													</div>
												</div>
												<div class="form-group row">
													<label for="startdate" class="col-md-12">Date this cycle ENDS<span class="required">*</span></label>
													<div class="col-md-12"> 
														<input type="text" class="form-control end_date readonly_date project_date" name="project_date" placeholder="date" value="" readonly>
														<div class="project_date_between_error display_none"><label class="error">Date this cycle must between Start date and End date.</label></div>
													</div>
												</div>
												<div class="form-group row ">
													<div class="form-group col-md-12">
														<label>Does this cycle involve a payment?<span class="required">*</span></label>
														<input type="radio"  class="is_payment" name="is_payment" value="yes" > Yes
														<input type="radio" class="is_payment"  name="is_payment" value="no" > No
														<div class="is_payment_checked_error display_none"><label class="error">Please select any one </label></div>
													</div>
												</div>
												<?php 
													$db_result='';
													if($project_id>0){
													$sq4="select *,(select legal_name from donor where donor_id=project_donors.select_donor) as 'donor_legal_name'
															 from project_donors where project_id=$project_id";
													//var_dump($project_id);	 
													$db_result=$this->db->query($sq4)->result_array();
													//var_dump($db_result);	
													}
												?>		
												<div class="is_payment_yes display_none ">	
													<div class="form-group row">
														<label for="donor_details" class="col-md-12">Donor<span class="required">*</span> </label>
													</div>
													<div class="TextBoxContainer1" >
														<div class="panel panel-default payment_creation_form">
															<div class="panel-body">
																<div class="form-group row">
																	<div class="remove-added-para" mytime="" >
																		<div class="col-md-12">
																			<label>Select Donor<span class="required">*</span> </label>
																			<select class="form-control select_donor"  name="select_donor" id="select_donor" >
																				<option value="">Select donor</option>
																				<?php 
																					if($db_result){
																						foreach($db_result as $val){ 
																							echo '<option class="is_remove" pre_amount="'.$val['donor_amount'].'" value="'.$val['select_donor'].'">'.$val['donor_legal_name'].'</option>';
																						}		
																					}		
																				?>
																			</select>
																		</div>
																		<div class="col-md-12 ">
																			<label>Amount<span class="required">*</span> </label>
																			<label class="input_description">Enter the full amount for this donor in INR. Amount must be a whole number. No decimal values (Paise) allowed.</label>
																			<input type="number" class="form-control donor_amount"  name="donor_amount" placeholder="Amount" value="">
																		</div>
																	</div>
																</div>
																<div class="form-group row  col-md-12">
																	<label>Payment documents required from the NGO<span class="required">*</span></label>
																	<input type="text" readonly  class="form-control ngo_payment" name="ngo_payment" placeholder="Ngo payment">
																</div>
															</div>
														</div>
													</div>
													
													<div class="form-group row">
														<div class="col-md-12"> 
															<button type="button"  class="btn btn-success addProSpeci"><i class="fa fa-plus"></i></button><label style="margin-left:5px;">Add another donor</label>
															<!--<input  class="btn btn-success addProSpeci" type="button" value="&#43 Add another donor" />	-->
															<div id="donor_list_error" class="display_none error ">Atleast one required.</div>
															<div id="donor_data_error" class="display_none error">All values are required.</div>
															<div class="error donor_duplicate_error display_none error" >Please select another donor.</div>
														</div>
													</div>
												</div>
												<div class="form-group row  col-md-12">
													<label>Project Assessment Documents required from the NGO for this cycle<span class="required">*</span></label>
													<input type="text" readonly  class="form-control ngo_doc " name="ngo_doc" placeholder="Ngo documents" ngo_type="" >
												</div>
												<div class="form-group row  col-md-12">
													<label>Documents to be provided by us<span class="required">*</span></label>
													<input type="text" readonly  class="form-control csr_doc" name="csr_doc" placeholder="Csr documents">
												</div>
											</div>
										</div>			
										<?php }?>
									</div>
									<div class="form-group row  col-md-12">
										<label>Reporting/Payment Cycles</label>
										<label class="input_description">We have created some for you in advance. You can click on the edit button near them to add additional details required.</label>
									</div>
									
									
											
									<div class="form-group row col-md-12">
										<a href="" type="button" id="CycleAddParabtn" class="btn btn-success"><i class="fa fa-plus"></i></a><label style="margin-left:5px;">Add another cycle</label>
										<!--<button class="btn btn-success  radius50" id="CycleAddParabtn">+ Add another cycle</button>-->
									</div>
									
									<div class="form-group row col-lg-12">
									<?php //var_dump($project_cycle_details_data)?>
										<div class="table-responsive">
											<table id="blog_view_table" class="<?php echo $table_type;?> table table-striped table-bordered table-hover" >
												<thead>
													<tr>
														<!--<th class="text-center">S. No.</th>-->
														<th class="text-center">Cycle Name</th>
														<!--<th class="text-center">Cycle status</th>-->
														<th class="text-center">Cycle started date</th>
														<th class="text-center">Cycle end date</th>
														<th class="text-center">Is Payment Done</th>
														<th class="text-center">Cycle Donor Amount</th>
														<th class="text-center">Action</th>
													</tr>
												</thead>
												<tbody>
													<?php if($project_cycle_details_data){
															foreach($project_cycle_details_data as $val){
															//var_dump($val);
														?>
														<tr>
															<td  class="text-center"><?php echo $val['cycle_name'];?></td>
															<td  class="text-center"><?php echo $val['cycle_start_date1'];?></td>
															<td  class="text-center"><?php echo $val['cycle_end_date2'];?></td>
															<td  class="text-center"><?php echo $val['is_payment'];?></td>
															<td  class="text-center"><?php echo $val['cycle_donor_amount'];?></td>
															<td  class="text-center">
															<?php
																echo '<a href="'.base_url().'organisation/donor/edit_donor?id='.$val['project_cycle_id'].'" class="label label-info">Edit</a>';
																echo '&nbsp<a href="'.base_url().'organisation/donor/edit_donor?id='.$val['project_cycle_id'].'" class="label label-danger">Delete</a>';
															?>
															</td>
														</tr>
													<?php }}?>
												</tbody>
											</table>
										</div>
									</div>
									
									
									
									<div class="reg_detail_err error display_none"><label>Please provide all the Cycle details.</label></div>		
									<div class="greater_error "></div>
									<div class="form-group row col-md-12 display_none">
										<button type="button" id="CycleAddParabtn" class="btn btn-success"><i class="fa fa-plus"></i></button><label style="margin-left:5px;">Add another cycle</label>
										<!--<button class="btn btn-success  radius50" id="CycleAddParabtn">+ Add another cycle</button>-->
									</div>
									<div class="form-group ">
										<div class="row">
											<div>&nbsp;</div>
											<div class="button " style="margin-left: 17px;">
												<button type="button" <?php if($status == 'Completed'){echo 'disabled';}?>  id="save<?php if($status == 'Completed'){echo 'disabled';}?>" class="btn btn-primary">Save</button>
												<button type="submit" <?php if($status == 'Completed'){echo 'disabled';}?>  id="create_cycle<?php if($status == 'Completed'){echo 'disabled';}?>" class="btn btn-success">Submit</button>
												<button type="submit" <?php if($status == 'Completed'){echo 'disabled';}?>  id="submit_cycle_creation<?php if($status == 'Completed'){echo 'disabled';}?>" class="btn btn-success display_none">Submit</button>
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

	<div style="display: none;">
    	<div id="Cycle_append_html">
			<div class="panel panel-default cycle_creation_form">
				<div class="panel-body">
						<div class="form-group row">
							<div class="col-lg-12">
								<button type="button" class="btn btn-danger pull-right CycleRemovepara btn-sm " style="margin-top: -10px;"><i class="fa fa-close"></i></button> 
							   <label>Cycle Name<span class="required">*</span> </label>
								<div class="my_internal_error"></div>
								<input type="text" class="form-control plan_Cycle cycle_name"  name="cycle_name" placeholder="Cycle name" value="">
								<div class="cycle_name_error display_none error">Cycle Name must be at least  3 characters longs</div>
								
							</div>
						</div>
						
						<div class="form-group row">
							<label for="startdate" class="col-md-12">Date this cycle ENDS<span class="required">*</span></label>
							<div class="col-md-12"> 
								<input type="text" class="form-control old_date_new readonly_date project_date" name="project_date" placeholder="date" value="" readonly>
								<div class="project_date_between_error display_none"><label class="error">Date this cycle must between Start date and End date.</label></div>
								
							</div>
						</div>
						
						<div class="form-group row ">
							<div class="form-group col-md-12">
								<label>Does this cycle involve a payment?<span class="required">*</span></label>
								<input type="radio"  class="is_payment" name="" value="yes" > Yes
								<input type="radio" class="is_payment"  name="" value="no" > No
								<div class="is_payment_checked_error display_none"><label class="error">Please select any one </label></div>
							</div>
									
						</div>
							<?php 
								$db_result='';
								if($project_id>0){
								$sq4="select *,(select legal_name from donor where donor_id=project_donors.select_donor) as 'donor_legal_name'
										 from project_donors where project_id=$project_id";
								//var_dump($project_id);	 
								$db_result=$this->db->query($sq4)->result_array();
								//var_dump($db_result);	
								}
							?>		
					<div class="is_payment_yes display_none ">
						<div class="form-group row">
							<label for="donor_details" class="col-md-12">Donor<span class="required">*</span> </label>
						</div>
						
						<div class="TextBoxContainer1" >
							<div class="panel panel-default payment_creation_form">
								<div class="panel-body">
									<div class="form-group row">
										<div class="remove-added-para" mytime="" >
											<div class="col-md-12">
												<label>Select Donor<span class="required">*</span> </label>
												<select class="form-control select_donor"  name="select_donor" id="select_donor" >
													<option value="">Select donor</option>
													<?php 
														if($db_result){
															foreach($db_result as $val){ 
															
															 echo '<option class="is_remove"  pre_amount="'.$val['donor_amount'].'"  value="'.$val['select_donor'].'">'.$val['donor_legal_name'].'</option>';
															 
													} }?>
												</select>
												
											</div>
											<div class="col-md-12 ">
												<label>Amount<span class="required">*</span> </label>
												<label class="input_description">Enter the full amount for this donor in INR. Amount must be a whole number. No decimal values (Paise) allowed.</label>
												<input type="number" class="form-control donor_amount"  name="donor_amount" placeholder="Amount" value="">
											</div>
											
										</div>
									</div>
									<div class="form-group row  col-md-12">
										<label>Payment documents required from the NGO<span class="required">*</span></label>
										<input type="text" readonly  class="form-control ngo_payment" name="ngo_payment" placeholder="Ngo payment">
									</div>
								</div>
							</div>
						</div>
						
						<div class="form-group row">
							<div class="col-md-12"> 
								<button type="button"  class="btn btn-success addProSpeci"><i class="fa fa-plus"></i></button><label style="margin-left:5px;">Add another donor</label>
								<!--<input  class="btn btn-success addProSpeci" type="button" value="&#43 Add another donor" />	-->
								<div id="donor_list_error" class="display_none error ">Atleast one required.</div>
								<div id="donor_data_error" class="display_none error">All values are required.</div>
								<div class="error donor_duplicate_error display_none error" >Please select another donor.</div>
							</div>
						</div>
					</div>
					<div class="form-group row  col-md-12">
						<label>Project Assessment Documents required from the NGO for this cycle<span class="required">*</span></label>
						<input type="text" readonly  class="form-control ngo_doc " name="ngo_doc" placeholder="Ngo documents" ngo_type="" >
					</div>
					
					<div class="form-group row  col-md-12">
						<label>Documents to be provided by us<span class="required">*</span></label>
						<input type="text" readonly  class="form-control csr_doc" name="csr_doc" placeholder="Csr documents">
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="row donor_html_div " style="display:none;">
		<div class="remove-added-para" mytime="" >
			<div class="panel panel-default payment_creation_form ">
				<div class="panel-body">
					<div class="form-group row">
						<div class="col-md-12">
							<label>Select Donor<span class="required">*</span> </label>
							<button class="btn btn-warning removepara radius50 pull-right btn-sm" style="margin-top: -12px;" >&times;</button>
							<select class="form-control select_donor"  name="select_donor" id="select_donor" >
								<option value="">Select donor</option>
								<?php 
									if($db_result){
										foreach($db_result as $val){ 
											echo '<option class="is_remove"  pre_amount="'.$val['donor_amount'].'" value="'.$val['select_donor'].'">'.$val['donor_legal_name'].'</option>';
										} 	
									}
								?>
							</select>
						</div>
						<div class="col-md-12">
							<label>Amount</label>
							<label class="input_description">Enter the full amount for this donor in INR. Amount must be a whole number. No decimal values (Paise) allowed.</label>
							<input type="number" class="form-control donor_amount"  name="donor_amount" placeholder="Amount" value="">
						</div>
					</div>
					<div class="form-group row  col-md-12">
						<label>Payment documents required from the NGO<span class="required">*</span></label>
						<input type="text" readonly  class="form-control ngo_payment" name="ngo_payment" placeholder="Ngo payment">
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
	
	$('body').on('click', '#CycleAddParabtn', function () {
		get_organisation_data();
		get_organisation_data1();
		get_organisation_data2();
		var is_payment_name=$.now();
		var timeee = 'old_date_new_'+$. now();
		var timeep = 'is_payment'+$. now();
		$('#Cycle_append_html .old_date_new').addClass(timeee);
		$('#Cycle_append_html .is_payment').addClass(timeep);
		$('#Cycle_append_html').find('.'+timeep).attr('name',timeep);
		//console.log(is_payment_name);
        var content = $('#Cycle_append_html').html();
        $('#Cycle_append_html .old_date_new').removeClass(timeee);
        $('#Cycle_append_html .is_payment').removeClass(timeep);
       	$("#CycleTextBoxContainer").append(content); 
        setTimeout(function() {
			$(function () {
				$('.'+timeee).datepicker({
					changeMonth: true,
					changeYear: true,
					dateFormat: 'yy-mm-dd',
					minDate: 'dateToday',
					yearRange : 'c-75:c+75',
				});
			});
		}, 500);

        $(this).find('.cycle_creation_form .is_payment').attr('name',is_payment_name);
    });

 	$('body').on('click', '.CycleRemovepara', function () {
        $(this).parent().parent().parent().parent().remove();
    }); 

	
	$('body').on('click','.send_notification_by_vendor_code', function (){
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
			console.log(project_donor_id);
		//var document_type = $('#ngo_document_type').val();
		//var project_cycle_id = $('.project_cycle_id').val();
		//var project_document_id = $('.project_document_id').val();	
			
			
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
		
		get_organisation_data2();
		var myctime = $.now();
		$(".donor_html_div").find('.remove-added-para').attr('mytime',myctime);
		var div = $(".donor_html_div").html();
		//console.log(div);
		$(this).parent().parent().parent().find(".TextBoxContainer1").append(div);
		
	});
	
	
	$("body").on("change", ".is_payment", function () {
		var is_payment = $(this).val();
		console.log(is_payment);
		if(is_payment == 'yes'){
			$(this).parent().parent().parent().find('.is_payment_yes').removeClass('display_none');
		}else{
			$(this).parent().parent().parent().find('.is_payment_yes').addClass('display_none');
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
	

	$("body").on("click", ".removepara", function () {
		$(this).parent().parent().parent().parent().remove();
	});
	
	/** Start Save Cycle Section*/
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
		var is_cycle_error = 'no';
		var is_error = 'no';
		var cycle_list = new Array();
		var payment_list = [];
		var is_payment = $('.is_payment:checked').val();
			console.log(is_payment);
		var amount_error = 'no';	
		/**Start Cycle Creater Looping here*/
		$("#CycleTextBoxContainer .cycle_creation_form").each(function() {
			var donor_dropdown_id = $(this).find('.select_donor').val();
			console.log(donor_dropdown_id);
			if(donor_dropdown_id){
				donor_dropdown_id =donor_dropdown_id;
			}else{
				donor_dropdown_id =0;
			}
			
				console.log($(this).find('.cycle_name').val());
				
			if($(this).find('.cycle_name').val()) {} else {
				console.log($(this).find('.cycle_name').val());
				is_cycle_error = 'yes';
			}
			if ($(this).find('.project_date').val()) {} else {
				is_cycle_error = 'yes';
			}
			if ($(this).find('.is_payment:checked').val()){
				var is_payment = $(this).find('.is_payment:checked').val();
				console.log(is_payment);
				if(is_payment == 'yes'){
					
					
					$(this).find(".payment_creation_form").each(function(){
						
						$('.greater_error').empty();
						var donor_id= $(this).find('.select_donor').val();
						var donor_amount= $(this).find('.donor_amount').val();
						var ngo_payment= $(this).find('.ngo_payment').val();
						pre_amount=$(this).find('.select_donor option:selected').attr('pre_amount');
						
						if(donor_id) {}else {
							is_cycle_error = 'yes';
							pre_amount=0;
						}
						if(donor_amount) {}else {
							is_cycle_error = 'yes';
						}
						if(ngo_payment){} else {
							is_cycle_error = 'yes';
						}
						var is_match='no';
						var amont1=0;
						var donor_amount1=0;
						console.log(pre_amount);
						console.log(donor_amount);
							amont1 = parseInt(pre_amount);
							donor_amount1 = parseInt(donor_amount);
							
						if(donor_amount1 <= amont1){
							console.log("amount Less yes");
						}else{
							console.log("amount Less No");
							 amount_error='yes';
							 is_cycle_error = 'yes';
							 //$('.greater_error').append('<label class="error">Amount must be less than  <i class="fa fa-inr" aria-hidden="true"></i><strong>' + pre_amount + '</strong> Please decrease the amount or update the total amount for this donor for this project.</label>');
						}
						
						console.log(amount_error);
						
						payment_list.push({
							is_payment : is_payment,
							donor_dropdown_id : donor_id,
							//$("#donor_dropdown option:selected").text();
							donor_dropdown : $(this).find('.select_donor option:selected').text(),
							cycle_donor_amount : donor_amount,
							ngo_payment : $(this).find('.ngo_payment').val(),
						
						});		
					
					});
						console.log("Asif aa");
						console.log(payment_list);
				}else{}
				
			}else{ 
				is_cycle_error = 'yes';
			}
			var ngo_doc=$(this).find('.ngo_doc').val(); 
			if(ngo_doc) {
			}else{
				is_cycle_error = 'yes';
			}
			if($(this).find('.csr_doc').val()) {} else {
				is_cycle_error = 'yes';
			}
			
			if (is_cycle_error == 'no') {
			//$(this).parent().parent().parent().parent().find(".reg_detail_err").addClass('display_none');

			}else {
				 is_error = 'yes';
				 if(amount_error=='yes'){
					//$(this).parent().parent().parent().parent().find(".reg_detail_err").addClass('display_none');
				 }else{
					 
					//$(this).parent().parent().parent().parent().find(".reg_detail_err").removeClass('display_none');
				 }
			}

			//if(is_cycle_error=='no'){
				
				cycle_list.push({
					payment_list:payment_list,
					cycle_name : $(this).find('.cycle_name').val(),
					cycle_start_date1 : $(this).find('.project_date').val(),
					is_payment : $(this).find('.is_payment:checked').val(),
					donor_dropdown_id : donor_dropdown_id,
					//$("#donor_dropdown option:selected").text();
					donor_dropdown : $(this).find('.select_donor option:selected').text(),
					cycle_donor_amount : $(this).find('.donor_amount').val(),
					ngo_payment : $(this).find('.ngo_payment').val(),
					ngo_doc : $(this).find('.ngo_doc').val(),
					csr_doc : $(this).find('.csr_doc').val(),
					
				}); 
				payment_list=[];
			//}
			
		});
			
		/**ENDS Cycle Creater Looping here*/
		
		additional_json.push({
			'cycle_list':cycle_list,
			
		});
		
		
		//if(is_error == 'no'){
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
		//}
	});	
	/** End  Save Cycle Section*/

	/** Start Submit- 1  Cycle Section*/
	$("body").on("click", "#create_cycle", function() {
		console.log("OK");
			//$.blockUI()
		var additional_json = [];	
		var is_error='no';	
		var org_task_id=$('#org_task_id').val();
		var org_task_list_id=$('#org_task_list_id').val();
		var org_id=$('#org_id').val();
		var ngo_id=$('#ngo_id').val();
		var prop_id=$('#prop_id').val();
		var superngo_id=$('#superngo_id').val();
		var org_staff_id=$('#org_staff_id').val();
		
		var project_id = $('#project_id').val();
		console.log(project_id);
		
		
		var is_cycle_error = 'no';
		
		var is_error = 'no';
		var cycle_list = [];
		var payment_list = [];
		var donor_list1 =[];
		var donor_list2 =[];
		  var count = 0;
		var pre_amount = 0;
		var mythis = $(this);
		var amount_error = 'no';
			/**Start Cycle Creater Looping here*/
			$("#CycleTextBoxContainer .cycle_creation_form").each(function() {
				var donor_dropdown_id = $(this).find('.select_donor').val();
				console.log(donor_dropdown_id);
				if(donor_dropdown_id){
					donor_dropdown_id =donor_dropdown_id;
				}else{
					donor_dropdown_id =0;
				}
				
            		console.log($(this).find('.cycle_name').val());
					
                if($(this).find('.cycle_name').val()) {} else {
                	console.log($(this).find('.cycle_name').val());
                    is_cycle_error = 'yes';
                }
                if ($(this).find('.project_date').val()) {} else {
					is_cycle_error = 'yes';
                }
                if ($(this).find('.is_payment:checked').val()){
					var is_payment = $(this).find('.is_payment:checked').val();
					console.log(is_payment);
                	if(is_payment == 'yes'){
						
						
                		$(this).find(".payment_creation_form").each(function(){
							
							$('.greater_error').empty();
							var donor_id= $(this).find('.select_donor').val();
							var donor_amount= $(this).find('.donor_amount').val();
							var ngo_payment= $(this).find('.ngo_payment').val();
							pre_amount=$(this).find('.select_donor option:selected').attr('pre_amount');
							
							if(donor_id) {}else {
								is_cycle_error = 'yes';
								pre_amount=0;
							}
							if(donor_amount) {}else {
								is_cycle_error = 'yes';
							}
							if(ngo_payment){} else {
								is_cycle_error = 'yes';
							}
							var is_match='no';
							var amont1=0;
							var donor_amount1=0;
							console.log(pre_amount);
							console.log(donor_amount);
								amont1 = parseInt(pre_amount);
								donor_amount1 = parseInt(donor_amount);
								
							if(donor_amount1 <= amont1){
								console.log("amount Less yes");
							}else{
								console.log("amount Less No");
								 amount_error='yes';
								 is_cycle_error = 'yes';
								 $('.greater_error').append('<label class="error">Amount must be less than  <i class="fa fa-inr" aria-hidden="true"></i><strong>' + pre_amount + '</strong> Please decrease the amount or update the total amount for this donor for this project.</label>');
							}
							
							console.log(amount_error);
							
							if(amount_error=='no'){
								payment_list.push({
									is_payment : is_payment,
									donor_dropdown_id : donor_id,
									//$("#donor_dropdown option:selected").text();
									donor_dropdown : $(this).find('.select_donor option:selected').text(),
									cycle_donor_amount : donor_amount,
									ngo_payment : $(this).find('.ngo_payment').val(),
								
								});		
							}
						});
							console.log("Asif aa");
							console.log(payment_list);
					}else{}
					
                }else{ 
					is_cycle_error = 'yes';
				}
                         
                if($(this).find('.ngo_doc').val()) {}else {
					is_cycle_error = 'yes';
                }
                if($(this).find('.csr_doc').val()) {} else {
					is_cycle_error = 'yes';
                }
				
				if (is_cycle_error == 'no') {
                $(this).parent().parent().parent().parent().find(".reg_detail_err").addClass('display_none');

				}else {
					 is_error = 'yes';
					 if(amount_error=='yes'){
						$(this).parent().parent().parent().parent().find(".reg_detail_err").addClass('display_none');
					 }else{
						 
						$(this).parent().parent().parent().parent().find(".reg_detail_err").removeClass('display_none');
					 }
				}
		
				if(is_cycle_error=='no'){
					
					cycle_list.push({
						payment_list:payment_list,
						cycle_name : $(this).find('.cycle_name').val(),
						cycle_start_date1 : $(this).find('.project_date').val(),
						is_payment : $(this).find('.is_payment:checked').val(),
						donor_dropdown_id : donor_dropdown_id,
						//$("#donor_dropdown option:selected").text();
						donor_dropdown : $(this).find('.select_donor option:selected').text(),
						cycle_donor_amount : $(this).find('.donor_amount').val(),
						ngo_payment : $(this).find('.ngo_payment').val(),
						ngo_doc : $(this).find('.ngo_doc').val(),
						csr_doc : $(this).find('.csr_doc').val(),
					}); 
					payment_list=[];
				}
				
            });
			
			/**ENDS Cycle Creater Looping here*/
			console.log("Asif");
			console.log(cycle_list);
			console.log(is_cycle_error);
            console.log("con cycle");
			console.log(cycle_list);
			
			additional_json.push({
				'cycle_list':cycle_list,
				
			});
		
			console.log(additional_json);
		if(is_error=='no'){	
			$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
							
			$.post(APP_URL + 'organisation/tasks/post_cycle_data_by_org1', {
					additional_json:additional_json,
					org_task_id:org_task_id, 
					org_task_list_id:org_task_list_id,
					org_id:org_id,
					ngo_id:ngo_id,
					prop_id:prop_id,
					superngo_id:superngo_id,
					org_staff_id:org_staff_id,
					project_id:project_id,
					cycle_list:cycle_list,
					
					
			},
			function (response) {
				$.unblockUI();
				$("html, body").animate({scrollTop: 0}, "slow");
                $('#head_ngo_review').empty();
				if (response.status == 200) {
					$('#submit_cycle_creation').trigger('click');
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
	/** End Submit- 1  Cycle Section*/
	
	/** Start Submit- 2  Cycle Section*/
	$("body").on("click", "#submit_cycle_creation", function() {
		console.log("OK");
			//$.blockUI()
		var additional_json = [];	
		var is_error='no';	
		var org_task_id=$('#org_task_id').val();
		var org_task_list_id=$('#org_task_list_id').val();
		var org_id=$('#org_id').val();
		var ngo_id=$('#ngo_id').val();
		var prop_id=$('#prop_id').val();
		var superngo_id=$('#superngo_id').val();
		var org_staff_id=$('#org_staff_id').val();
		
		var project_id = $('#project_id').val();
		console.log(project_id);
		
		var amount_error = 'no';
		var is_cycle_error = 'no';
		var is_error = 'no';
		var cycle_list = new Array();
		var payment_list = [];
		var is_payment = $('.is_payment:checked').val();
			console.log(is_payment);
		var amount_error = 'no';
		
		/**Start Cycle Create Looping*/	
		$("#CycleTextBoxContainer .cycle_creation_form").each(function() {
			var donor_dropdown_id = $(this).find('.select_donor').val();
			console.log(donor_dropdown_id);
			if(donor_dropdown_id){
				donor_dropdown_id =donor_dropdown_id;
			}else{
				donor_dropdown_id =0;
			}
			
				console.log($(this).find('.cycle_name').val());
				
			if($(this).find('.cycle_name').val()) {} else {
				console.log($(this).find('.cycle_name').val());
				is_cycle_error = 'yes';
			}
			if ($(this).find('.project_date').val()) {} else {
				is_cycle_error = 'yes';
			}
			if ($(this).find('.is_payment:checked').val()){
				var is_payment = $(this).find('.is_payment:checked').val();
				console.log(is_payment);
				if(is_payment == 'yes'){
					
					
					$(this).find(".payment_creation_form").each(function(){
						
						$('.greater_error').empty();
						var donor_id= $(this).find('.select_donor').val();
						var donor_amount= $(this).find('.donor_amount').val();
						var ngo_payment= $(this).find('.ngo_payment').val();
						pre_amount=$(this).find('.select_donor option:selected').attr('pre_amount');
						
						if(donor_id) {}else {
							is_cycle_error = 'yes';
							pre_amount=0;
						}
						if(donor_amount) {}else {
							is_cycle_error = 'yes';
						}
						if(ngo_payment){} else {
							is_cycle_error = 'yes';
						}
						var is_match='no';
						var amont1=0;
						var donor_amount1=0;
						console.log(pre_amount);
						console.log(donor_amount);
							amont1 = parseInt(pre_amount);
							donor_amount1 = parseInt(donor_amount);
							
						if(donor_amount1 <= amont1){
							console.log("amount Less yes");
						}else{
							console.log("amount Less No");
							 amount_error='yes';
							 is_cycle_error = 'yes';
							 $('.greater_error').append('<label class="error">Amount must be less than  <i class="fa fa-inr" aria-hidden="true"></i><strong>' + pre_amount + '</strong> Please decrease the amount or update the total amount for this donor for this project.</label>');
						}
						
						console.log(amount_error);
						
						if(amount_error=='no'){
							payment_list.push({
								is_payment : is_payment,
								donor_dropdown_id : donor_id,
								//$("#donor_dropdown option:selected").text();
								donor_dropdown : $(this).find('.select_donor option:selected').text(),
								cycle_donor_amount : donor_amount,
								ngo_payment : $(this).find('.ngo_payment').val(),
							
							});		
						}
					});
						console.log("Asif aa");
						console.log(payment_list);
				}else{}
				
			}else{ 
				is_cycle_error = 'yes';
			}
					 
			if($(this).find('.ngo_doc').val()) {}else {
				is_cycle_error = 'yes';
			}
			if($(this).find('.csr_doc').val()) {} else {
				is_cycle_error = 'yes';
			}
			
			if (is_cycle_error == 'no') {
			$(this).parent().parent().parent().parent().find(".reg_detail_err").addClass('display_none');

			}else {
				 is_error = 'yes';
				 if(amount_error=='yes'){
					$(this).parent().parent().parent().parent().find(".reg_detail_err").addClass('display_none');
				 }else{
					 
					$(this).parent().parent().parent().parent().find(".reg_detail_err").removeClass('display_none');
				 }
			}
			if(is_cycle_error=='no'){
				
				cycle_list.push({
					payment_list:payment_list,
					cycle_name : $(this).find('.cycle_name').val(),
					cycle_start_date1 : $(this).find('.project_date').val(),
					is_payment : $(this).find('.is_payment:checked').val(),
					donor_dropdown_id : donor_dropdown_id,
					//$("#donor_dropdown option:selected").text();
					donor_dropdown : $(this).find('.select_donor option:selected').text(),
					cycle_donor_amount : $(this).find('.donor_amount').val(),
					ngo_payment : $(this).find('.ngo_payment').val(),
					ngo_doc : $(this).find('.ngo_doc').val(),
					csr_doc : $(this).find('.csr_doc').val(),
				}); 
				payment_list=[];
			}
			
		});
		/**End Cycle Create Looping*/	
		
 		console.log(cycle_list);
		
		additional_json.push({
			'cycle_list':cycle_list,
			
		});
		
			console.log(additional_json);
		if(is_error=='no'){	
			$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
							
			$.post(APP_URL + 'organisation/tasks/change_status_onsubmit_by_cycle_creation_og1', {
					additional_json:additional_json,
					org_task_id:org_task_id, 
					org_task_list_id:org_task_list_id,
					org_id:org_id,
					ngo_id:ngo_id,
					prop_id:prop_id,
					superngo_id:superngo_id,
					org_staff_id:org_staff_id,
					project_id:project_id,
					cycle_list:cycle_list,
					
					
			},
			function (response) {
				$.unblockUI();
				$("html, body").animate({scrollTop: 0}, "slow");
                $('#head_ngo_review').empty();
				if (response.status == 200) {
					var message = response.message;
					$("html, body").animate({scrollTop: 0}, "slow");               
					$('#head_ngo_review').html("<div class='alert alert-success fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
					$("#head_ngo_review").fadeTo(2000, 500).slideUp(500, function(){
						$('#head_ngo_review').empty();
						window.location.href=APP_URL+"organisation/tasks/mytasks";
					});
					
					
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
	/** End Submit- 2  Cycle Section*/
	
	/*multi select*/
	
	var ngo_doc_list = $('.ngo_doc_list').val();
	var orgstaffData = [ ];
	var geo_instance ='';
	var categories_instance ='';
	get_organisation_data();
	var orgjeoData_id=[];
	function get_organisation_data(){
		//payment_processing_doc , ngo_document_list, csr_document_list
		$.post(APP_URL + 'organisation/tasks/get_cycle_data_of_documents', {
			'doc_type':'ngo_document_list'
        },
        function (response) {
        	var geoData=response.geoData;
        	var orgGeoData=response.orgGeoData;
        	console.log(geoData);
        	//$('#ngo_doc').attr('ngo_type');
			console.log("FD");
			console.log(geoData);
        	if(geoData){
				$.each(geoData, function(index, item) {
					console.log("f");
					var item22=(item.title);
					var item223=(item.id);
					console.log(item)
					if(ngo_doc_list){
						var sub_status_array = ngo_doc_list.split(",");
						console.log(sub_status_array);
						if(sub_status_array.length){
							$.each(sub_status_array, function(index1, item1) {
							var item12=$.trim(item1);
							console.log(item12)
							
							if(item22==item12)	
								orgstaffData.push(item223)
							});
						}
					}
					console.log("ss");
					console.log(orgstaffData);
				
				});
			}
			//console.log("AS");
			//console.log(orgjeoData_id);
			
			
        	geo_instance = $('.ngo_doc').comboTree({
			  	source : geoData,
			  	isMultiple:true,
			  	cascadeSelect:true,
			  	selected: orgstaffData
			});
			if(orgstaffData){
				geo_instance.setSelection(orgstaffData);
			}
			
			//var categoryData=response.categoryData;
        	//var orgcategoryData=response.orgcategoryData;
			
			//categories_instance = $('.ngo_doc').comboTree({
			  //	source : categoryData,
			  	//isMultiple:true,
			  	//cascadeSelect:true,
			  	//selected: orgGeoData
			//});
			
			//if(orgcategoryData){
				//categories_instance.setSelection(orgcategoryData);
			//}
        },'json');
		
	}
	/*multi select*/
	var csr_doc_list = $('.csr_doc_list').val();
	var orgstaffData1 = [ ];
	var geo_instance1 ='';
	var categories_instance1 ='';
	get_organisation_data1();
	function get_organisation_data1(){
		//payment_processing_doc , ngo_document_list, csr_document_list
		$.post(APP_URL + 'organisation/tasks/get_cycle_data_of_documents', {
			'doc_type':'csr_document_list'
        },
        function (response) {
        	var geoData=response.geoData;
        	var orgGeoData=response.orgGeoData;
			if(geoData){
				$.each(geoData, function(index, item) {
					console.log("fs");
					var item22=(item.title);
					var item223=(item.id);
					console.log(item)
					if(csr_doc_list){
						var sub_status_array = csr_doc_list.split(",");
						console.log(sub_status_array);
						if(sub_status_array.length){
							$.each(sub_status_array, function(index1, item1) {
							var item12=$.trim(item1);
							console.log(item12)
							
							if(item22==item12)	
								orgstaffData1.push(item223)
							});
						}
					}
					console.log("ssp");
					console.log(orgstaffData1);
				
				});
			}
			
        	geo_instance1 = $('.csr_doc').comboTree({
			  	source : geoData,
			  	isMultiple:true,
			  	cascadeSelect:true,
			  	selected: orgstaffData1
			});
			if(orgstaffData1){
				geo_instance1.setSelection(orgstaffData1);
			}
			/*var categoryData=response.categoryData;
        	var orgcategoryData=response.orgcategoryData;
			
			categories_instance1 = $('#').comboTree({
			  	source : categoryData,
			  	isMultiple:true,
			  	cascadeSelect:true,
			  	//selected: orgGeoData
			});
			
			if(orgcategoryData){
				categories_instance1.setSelection(orgcategoryData);
			}*/
        },'json');
		
	}
	
	/*multi select*/
	var ngo_payemnt_documents = $('.ngo_payemnt_documents').val();
	var orgstaffData2 = [ ];
	var geo_instance2 ='';
	var categories_instance2 ='';
	get_organisation_data2();
	function get_organisation_data2(){
		//payment_processing_doc , ngo_document_list, csr_document_list
		$.post(APP_URL + 'organisation/tasks/get_cycle_data_of_documents', {
			'doc_type':'payment_processing_doc'
        },
        function (response) {
        	var geoData=response.geoData;
        	var orgGeoData=response.orgGeoData;
			
			if(geoData){
				$.each(geoData, function(index, item) {
					console.log("fdss");
					var item22=(item.title);
					var item223=(item.id);
					console.log(item)
					if(ngo_payemnt_documents){
						var sub_status_array = ngo_payemnt_documents.split(",");
						console.log(sub_status_array);
						if(sub_status_array.length){
							$.each(sub_status_array, function(index1, item1) {
							var item12=$.trim(item1);
							console.log(item12)
							
							if(item22==item12)	
								orgstaffData2.push(item223)
							});
						}
					}
					console.log("ssfff");
					console.log(orgstaffData2);
				
				});
			}
        	geo_instance2 = $('.ngo_payment').comboTree({
			  	source : geoData,
			  	isMultiple:true,
			  	cascadeSelect:true,
			  	selected: orgstaffData2
			});
			if(orgstaffData2){
				geo_instance2.setSelection(orgstaffData2);
			}
			/*var categoryData=response.categoryData;
        	var orgcategoryData=response.orgcategoryData;
			
			categories_instance2 = $('#').comboTree({
			  	source : categoryData,
			  	isMultiple:true,
			  	cascadeSelect:true,
			  	selected: orgstaffData2
			});
			
			if(orgstaffData2){
				categories_instance2.setSelection(orgstaffData2);
			}*/
        },'json');
		
	}
	
	
	
});	

	
	
	</script>

	