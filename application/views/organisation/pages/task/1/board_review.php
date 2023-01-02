<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
		$task_type = $data_value[0]['task_type'];
		
		$additional_json = '';
		$was_review_radion='';
		$my_final='';
		$comments_no ='';
		$comments_1 ='';
		$comments_request ='';
		$donor_dropdown_id1=$org_staff_id;
		$donor_dropdown_id2=$org_staff_id;
		$donor_dropdown_id3=$org_staff_id;
		
		$donor_dropdown_text='';
		
		
		$comments_recommend_yes='';
		$comments_my_reject_yes1='';
		$comments_my_reject_yes2='';
		$comments_first='';
		$visit_date='';
		$comments_reject_yes1='';
		$comments_reject_yes2='';
		
		$csr_file_value1='';
		$csr_file_value_actual1='';
		
		$donor_list_additional='';
		
		$select_donor_id='';
		$donor_amount='';
		
		if(isset($data_value[0]['additional_json'])){
			$additional_json = json_decode($data_value[0]['additional_json']);
			//var_dump($additional_json);
			if(isset($additional_json[0]->was_review_radion)){
				$was_review_radion = $additional_json[0]->was_review_radion;
			}
			if(isset($additional_json[0]->my_final)){
				$my_final = $additional_json[0]->my_final;	
			}
			if(isset($additional_json[0]->comments_no)){
				$comments_no = $additional_json[0]->comments_no;
			}
			if(isset($additional_json[0]->comments_1)){
				$comments_1 = $additional_json[0]->comments_1;
			}
			if(isset($additional_json[0]->comments_request)){
				$comments_request = $additional_json[0]->comments_request;
			}
			if(isset($additional_json[0]->donor_dropdown_text)){
				$donor_dropdown_text = $additional_json[0]->donor_dropdown_text;
			}
			if(isset($additional_json[0]->donor_dropdown_id1)){
				$donor_dropdown_id1 = $additional_json[0]->donor_dropdown_id1;
			}
			if(isset($additional_json[0]->donor_dropdown_id2)){
				$donor_dropdown_id2 = $additional_json[0]->donor_dropdown_id2;
			}
			if(isset($additional_json[0]->donor_dropdown_id3)){
				$donor_dropdown_id3 = $additional_json[0]->donor_dropdown_id3;
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
			if(isset($additional_json[0]->comments_first)){
				$comments_first = $additional_json[0]->comments_first;
			}
			if(isset($additional_json[0]->visit_date)){
				$visit_date = $additional_json[0]->visit_date;
			}
			if(isset($additional_json[0]->comments_reject_yes1)){
				$comments_reject_yes1 = $additional_json[0]->comments_reject_yes1;
			}
			if(isset($additional_json[0]->comments_reject_yes2)){
				$comments_reject_yes2 = $additional_json[0]->comments_reject_yes2;
			}
			if(isset($additional_json[0]->csr_file_value1)){
				$csr_file_value1 = $additional_json[0]->csr_file_value1;
			}
			if(isset($additional_json[0]->csr_file_value_actual1)){
				$csr_file_value_actual1 = $additional_json[0]->csr_file_value_actual1;
			}
			if(isset($additional_json[0]->donor_list)){
				$donor_list_additional = $additional_json[0]->donor_list;
				//var_dump($donor_list_additional);
			}
			if(isset($additional_json[0]->select_donor_id)){
				$select_donor_id = $additional_json[0]->select_donor_id;
				//var_dump($donor_list_additional);
			}
			if(isset($additional_json[0]->donor_amount)){
				$donor_amount = $additional_json[0]->donor_amount;
				//var_dump($donor_list_additional);
			}
			
		}else{
			$select_donor_id='';
			$donor_amount='';
			$was_review_radion='';
			$my_final='';
			$comments_no ='';
			$comments_1 ='';
			$comments_request ='';
			
			$donor_dropdown_id1=$org_staff_id;
			$donor_dropdown_id2=$org_staff_id;
			$donor_dropdown_id3=$org_staff_id;
			
			$donor_dropdown_text='';
			$comments_recommend_yes='';
			$comments_my_reject_yes1='';
			$comments_my_reject_yes2='';
			$comments_first='';
			$visit_date='';
			$comments_reject_yes1='';
			$comments_reject_yes2='';
			
			$csr_file_value1='';
			$csr_file_value_actual1='';
			$donor_list_additional='';
			
		}
	$donor_list = $this->db->get_where('donor',array('org_id' =>$org_id))->result_array();
	//var_dump($donor_list);
	}else{
		
		$select_donor_id='';
		$donor_amount='';
		
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
				
		$was_review_radion='';
		$my_final='';
		$comments_no ='';
		$comments_1 ='';
		$comments_request ='';
		
		$donor_dropdown_id1='';
		$donor_dropdown_id2='';
		$donor_dropdown_id3='';
		
		$donor_dropdown_text='';
		$comments_recommend_yes='';
		$comments_my_reject_yes1='';
		$comments_my_reject_yes2='';
		$comments_first='';
		$visit_date='';
		$comments_reject_yes1='';
		$comments_reject_yes2='';
		$donor_list='';
			
		$csr_file_value1='';
		$csr_file_value_actual1='';
		$donor_list_additional='';
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
								
								if($task_type=='prp'){
									$sql5="SELECT additional_json FROM `org_tasks` WHERE org_id=$org_id AND prop_id=$prop_id AND org_task_list_id=8 AND task_type='prp'";
									$task_data_fetch_by_sc_review= $this->db->query($sql5)->result_array();
									if($task_data_fetch_by_sc_review){
										$data['sc_review'] =$task_data_fetch_by_sc_review[0]['additional_json'];
										if($data['sc_review']!=''){	
											$this->load->view('organisation/pages/task/1/view_sc_review',$data);
										}
									}
									$sql5="SELECT additional_json FROM `org_tasks` WHERE org_id=$org_id AND prop_id=$prop_id AND org_task_list_id=7 AND task_type='prp'";
									$task_data_fetch_by_leadership = $this->db->query($sql5)->result_array();
									if($task_data_fetch_by_leadership)	{
										$data['leadership_data']=$task_data_fetch_by_leadership[0]['additional_json'];
										if($data['leadership_data']!=''){
											$this->load->view('organisation/pages/task/1/view_leadership',$data);
										}
									}
									$sql4="SELECT additional_json FROM `org_tasks` WHERE org_id=$org_id AND prop_id=$prop_id AND org_task_list_id=5 AND task_type='prp'";
									$task_data_fetch_by_field_visit= $this->db->query($sql4)->result_array();
									if($task_data_fetch_by_field_visit){
										$data['file_visit_data']=$task_data_fetch_by_field_visit[0]['additional_json'];
										if($data['file_visit_data']!=''){
											$this->load->view('organisation/pages/task/1/view_file_visit',$data);
										}
									}
									
									$sql3="SELECT additional_json FROM `org_tasks` WHERE org_id=$org_id AND prop_id=$prop_id AND org_task_list_id=3";
									$task_data_fetch = $this->db->query($sql3)->result_array();
									if($task_data_fetch){
										$data['proposal_desk_review_data']=$task_data_fetch[0]['additional_json'];
										if($data['proposal_desk_review_data']!=''){
											$this->load->view('organisation/pages/task/1/view_proposal_desk_review',$data);
										}
									}
									
									if($prop_data){
										$this->load->view('organisation/pages/view_proposal_detail_page/view_proposal_right_1',$data);
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
										<div class="form-group row">
											<label for="startdate" class="col-md-12">Date of Advisory Board Meeting<span class="required">*</span></label>
											<div class="col-md-12"> 
												<input readonly type="text" class="form-control date readonly_date visit_date" name="visit_date" placeholder="date" value="<?php echo $visit_date;?>">
												<div id="visit_date_error " class="visit_date_error error  display_none" style="font-weight :900;">Date is required.</div>
											</div>
										</div>
										<div class="form-group row">
											<div class="col-md-12">
												<label for="was_review" desk-review" id="was_review">Summary of relevant comments by Advisory Board</label>
												<textarea id="comments_first" name="comments_first" class="form-control"  rows="3" placeholder="Enter details here..."><?php echo $comments_first;?></textarea>
											</div>
										</div>
										<div class="form-group row ">
											<div class="col-md-12">
												<div>
													<label for="my_final">Select the final decision for this proposal<span class="required">*</span></label>	
													<div >
														<label style="font-weight: 400;display: block;">
															<input type="radio" name="my_final" class="my_final"  value="my_approve" <?php if($my_final == 'my_approve'){echo 'checked';}?> >
															<span><b>Approve proposal and create project</b></span><br>
														</label>
														<label style="font-weight: 400;display: block;">
															<input type="radio" name="my_final" class="my_final"  value="my_request" <?php if($my_final == 'my_request'){echo 'checked';}?> >
															<span><b>Request revision of Proposal</b> details from the NGO (NGO will be notified and further review of the proposal will be paused). 
															</span><br>
														</label>
														<label style="font-weight: 400;display: block;">
															<input type="radio" name="my_final" class="my_final"  value="my_reject" <?php if($my_final == 'my_reject'){echo 'checked';}?> >
															<span><b>Reject the Proposal </b>(NGO will be notified of the same as per the details below).</span> 
														</label> 
													</div>
												</div>
												<div class="my_final_error"></div>    
											</div>  
										</div> 
										
										<div class="my_approve_yes <?php if($my_final == 'my_approve'){}else{ echo 'display_none'; }?>">
											<div class="form-group row ">
												<div  class="col-md-12">
												   <h5>Project Details</h5>
												</div>
											</div>
											<div class="form-group row">
												<label for="donor_details" class="col-md-12">Donor details<span class="required">*</span> </label>
												<div class="col-md-12"> 
													<div id="TextBoxContainer1" >
														
														<?php /*if($donor_list_additional && $donor_list_additional!=''){
															$i=0;
															foreach($donor_list_additional as $res){
																$i++;
																$donor_amount=$res->donor_amount;
																$select_donor=$res->select_donor;*/
																//var_dump($donor_amount);
														?>
														<!--<div class="remove-added-para" mytime="" style="margin-top: 10px;">
															<div class="panel panel-default payment_creation_form ">
																<div class="panel-body">
																	<div class="form-group row">
																		<div class="col-md-12">
																			<label>Select Donor<span class="required">*</span> </label>
																			<?php //if($i!=1){?>
																			<button class="btn btn-warning removepara radius50 pull-right btn-sm" style="margin-top: -12px;" >&times;</button>
																			<?php //}?>
																			<select class="form-control select_donor"  name="select_donor" id="select_donor" >
																				<option value="">Select donor</option>
																				<?php 
																				/*if($donor_list){
																					foreach($donor_list as $val){ 
																					$is_selected='';
																					 if($val['donor_id']==$select_donor){
																						$is_selected='selected';
																					}
																					 
																					 echo '<option class="is_remove" '.$is_selected.' value="'.$val['donor_id'].'">'.$val['legal_name'].'</option>';
																					 
																					}
																				  }*/?>
																			</select>
																		</div>
																		<div class="col-md-12 marBot20">
																			<label>Amount<span class="required">*</span></label><br>
																			<label class="input_description">Enter the full amount for this donor in INR. Amount must be a whole number. No decimal values (Paise) allowed.</label>
																			<input type="number" class="form-control donor_amount"  name="donor_amount" placeholder="Amount" value="<?php echo $donor_amount;?>">
																		</div>
																	</div>
																</div>
															</div>
														</div>-->
														<?php //}}else{ ?>
														<!--<div class="remove-added-para" mytime="" style="margin-top: 10px;">
															<div class="panel panel-default payment_creation_form ">
																<div class="panel-body">-->
																	<div class="form-group row">
																		<div class="col-md-12">
																			<!--<label>Donor<span class="required">*</span> </label>-->
																			<!--<button class="btn btn-warning removepara radius50 pull-right btn-sm" style="margin-top: -12px;" >&times;</button>-->
																			<!--<select class="form-control select_donor"  name="select_donor" id="select_donor" style="margin-top: 25px;">
																				<option value="">Select donor</option>
																				<?php 
																				/*if($donor_list){
																					foreach($donor_list as $val){ 
																					$is_selected='';
																					 if($val['donor_id']==$select_donor_id){
																						$is_selected='selected';
																					}
																					 
																					 echo '<option class="is_remove" '.$is_selected.' value="'.$val['donor_id'].'">'.$val['legal_name'].'</option>';
																					 
																					}
																				  }*/?>
																			</select>-->
																			<div class="table-responsive">
																				<table id="blog_view_table" class=" table table-striped table-bordered table-hover" >
																					<thead>
																						<tr>
																							<th class="text-center">Donor</th>
																							<th class="text-center">Amount <br><label class="input_description" >Enter the amount in INR Lakhs</label></th>
																						</tr>
																					</thead>
																					<tbody class="donor_detail_data">
																						<?php if(!$donor_list){?>
																							<tr><td class="text-center" colspan="5" >No data Available</td><tr>
																						<?php }
																							if($donor_list and $donor_list>0){
																								foreach($donor_list as $row){
																									if($donor_list_additional){
																										foreach($donor_list_additional as $row1){
																											//var_dump($row1);
																											if($row['donor_id']==$row1->select_donor){
																												$donor_amount=$row1->donor_amount;
																												//var_dump($donor_amount);
																											}
																										}
																									}
																									//var_dump($row);
																								
																							?>
																							<tr>
																								<td class="text-center" donor_id="<?php echo $row['donor_id'];?>"><?php echo $row['code'];?></td>
																								<td  class="text-center"><input type="number"  min="0" onkeypress="return (event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control donor_amount"  name="donor_amount" placeholder="Amount" value="<?php echo $donor_amount;?>"></td>
																							</tr>	
																																			
																							<?php } }?>
																						
																					</tbody>
																				</table>
																			</div>
																		</div>
																		<!--<div class="col-md-6">
																			<label>Amount<span class="required">*</span></label><br>
																			<label class="input_description">Enter the amount in INR Lakhs</label>
																			<input type="number" class="form-control donor_amount"  name="donor_amount" placeholder="Amount" value="<?php echo $donor_amount;?>">
																		</div>-->
																	</div>
																<!--</div>
															</div>
															<?php //}?>
														</div>-->
													</div>
													<div id="donor_list_error" class="display_none error ">Atleast one required.</div>
													<div id="donor_data_error" class="display_none error">All values are required.</div>
													<div class="donor_duplicate_error display_none error" >Please select another donor.</div>
												</div>
											</div>
											<div class="form-group row display_none">
												<div class="col-md-12">
													<!--<input id="addProSpeci" class="btn btn-success" type="button" value="&#43 Add another donor" />	-->
													<button type="button" id="addProSpeci" class="btn btn-success"><i class="fa fa-plus"></i></button><label style="margin-left:5px;">Add another donor</label><br>
												</div>
											</div>
											
											<!--<div class="row donor_html_div " style="display:none;">
												<div class="remove-added-para" mytime="" style="margin-top: 10px;">
													<div class="panel panel-default payment_creation_form ">
														<div class="panel-body">
															<div class="form-group row">
																<div class="col-md-12">
																	<label>Select Donor<span class="required">*</span> </label>
																	<button class="btn btn-warning removepara radius50 pull-right btn-sm" style="margin-top: -12px;" >&times;</button>
																	<select class="form-control select_donor"  name="select_donor" id="select_donor" >
																		<option value="">Select donor</option>
																		<?php 
																		/*if($donor_list){
																			foreach($donor_list as $val){ 
																			$is_selected='';
																			 if($val['donor_id']==$donor_dropdown_id){
																				$is_selected='selected';
																			}
																			echo '<option class="is_remove" '.$is_selected.' value="'.$val['donor_id'].'">'.$val['legal_name'].'</option>';
																			 
																			}
																		  }*/?>
																	</select>
																</div>
																<div class="col-md-12" style="margin-top: 14px;">
																	<label>Amount<span class="required">*</span></label><br>
																	<label class="input_description">Enter the full amount for this donor in INR. Amount must be a whole number. No decimal values (Paise) allowed.</label>
																	<input type="number" class="form-control donor_amount"  name="donor_amount" placeholder="Amount" value="">
																</div>
															</div>
														</div>
													</div>
													
												</div>
											</div>-->
											
											<div class="form-group">
												<div>    
													<label >Assign a Focal Point for this Project<span class="required">*</span></label><br>
													<label class="input_description">This person will be the primary contact for this project going forward.</label>
												</div>
												<div class="my_ngo_error"></div>
												<div>  
													<select name="my_ngo" class="form-control donor_dropdown1 js-example-basic-single" id="organisation_id1" name="donor_dropdown1">
														<?php if($focal_point_data){
														foreach($focal_point_data as $val){
															$is_selected='';
															$is_role='';
															if(isset($val['staff_id'])){
																if($val['staff_id']==$donor_dropdown_id1){
																	$is_selected='selected';
																}
															
																if($val['first_name']!=''){
															}
														?>
															<option <?php echo $is_selected; ?> value="<?php echo $val['staff_id'] ;?>" ><?php echo  $val['first_name'].' '. $val['last_name'];?></option>
																											
														<?php } if($val['is_deleted'] == '0'){ 
															echo '<option disabled value="" > '.$val['role_name'].' </option>';
														}}}?>		
													</select>
												</div>
											</div> 
											
											<div class="form-group">
												<div>    
													<label >Assign an Approver for this Project. <span class="required">*</span></label><br>
													<label class="input_description">This person will be in charge of doing the Internal Verification (IV) and Approving the Focal Point Review</label>
												</div>
												<div class="my_ngo_error"></div>
												<div>  
													<select name="my_ngo" class="form-control donor_dropdown2 js-example-basic-single" id="organisation_id2" name="donor_dropdown2">
														<?php if($focal_point_data){
														foreach($focal_point_data as $val){
															$is_selected='';
															$is_role='';
															if(isset($val['staff_id'])){
																if($val['staff_id']==$donor_dropdown_id2){
																	$is_selected='selected';
																}
															
																if($val['first_name']!=''){
															}
														?>
															<option <?php echo $is_selected; ?> value="<?php echo $val['staff_id'] ;?>" ><?php echo  $val['first_name'].' '. $val['last_name'];?></option>
																											
														<?php } if($val['is_deleted'] == '0'){ 
															echo '<option disabled value="" > '.$val['role_name'].' </option>';
														}}}?>		
													</select>
												</div>
											</div> 
											
											<div class="form-group">
												<div>    
													<label >Assign a Checker for this Project<span class="required">*</span></label><br>
													<label class="input_description">This person will give the final sign off for release of a payment to a donee</label>
												</div>
												<div class="my_ngo_error"></div>
												<div>  
													<select name="my_ngo" class="form-control donor_dropdown3 js-example-basic-single" id="organisation_id3" name="donor_dropdown3">
														<?php if($focal_point_data){
														foreach($focal_point_data as $val){
															$is_selected='';
															$is_role='';
															if(isset($val['staff_id'])){
																if($val['staff_id']==$donor_dropdown_id3){
																	$is_selected='selected';
																}
																if($val['first_name']!=''){
															}
														?>
															<option <?php echo $is_selected; ?> value="<?php echo $val['staff_id'] ;?>" ><?php echo  $val['first_name'].' '. $val['last_name'];?></option>
																											
														<?php } if($val['is_deleted'] == '0'){ 
															echo '<option disabled value="" > '.$val['role_name'].' </option>';
														}}}?>		
													</select>
												</div>
											</div> 
											
											<div class="value_read">
												<div class="form-group row ">
													<label for="comments" class="col-md-12">Upload final signed approval sheet<span class="required">*</span></label>
													<div class="col-md-12">
														<button type="button" id="comman_file_upload_class" name="comman_file_upload_class" image_upload_desc="" upload_type="file" file_count="single" img_primary="no" file_prev_class="cycle_file_upload_selected" file_input_id="cycle_file_upload1" class="btn btn-primary btn-lg comman_file_upload_class" data-toggle="modal" data-target="#browseFile"><i class="fa fa-upload"></i> </button>
														<label id="cycle_file_upload_error1" class="required display_none cycle_file_upload_error1">Your file must be less than 10MB in size.</label>
														<div class="cycle_file_upload1_error error display_none"><label>final signed approval sheet</label></div>
														<div>
															<div class="">
																<input class="form-control cycle_file_upload1 " id="cycle_file_upload1" name="cycle_file_upload1" type="hidden" value="<?php if($csr_file_value1){ echo $csr_file_value1;}?>">
															</div>
															   <span class="registration_80g_valid" ></span>
															<div class="image-preview inline_block cycle_file_upload_selected">
															   <input readonly class="form-control is_edit_data  actual_disp1 <?php if(!$csr_file_value_actual1){ echo 'display_none' ;} ?>" type="text" id="cycle_file_upload_actual"  value="<?php if($csr_file_value_actual1){ echo $csr_file_value_actual1;}?>">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										
								
										<div class="form-group  my_request_yes <?php if($my_final == 'my_request'){}else{ echo 'display_none'; }?>">
											<div>
												<label name="my_revise">Enter details of what the NGO needs to revise in this proposal.<span class="required">*</span> </label><br>
												<label class="input_description">The details entered here will be sent to the NGO when this form is submitted.</label>
												<div class="my_revise_error"></div>
												<textarea id="comments_request" name="comments_request" class="form-control "  rows="3" placeholder="Enter details here..."><?php echo $comments_request;?></textarea>
											</div>	
											
										</div>
									
										<div class="form-group  my_reject_yes  <?php if($my_final == 'my_reject'){}else{ echo 'display_none'; }?>">
											<div class="col-md-12"> 
												<div>
													<label>Enter reasons for rejection (internal)<span class="required">*</span> </label><br>
													<label class="input_description">These details are for internal use only</label>
												</div>
												<div class="my_internal_error"></div>
												<textarea id="comments_reject_yes1" name="comments_reject_yes1"  class="form-control"  rows="3" placeholder="Enter details here..."><?php echo $comments_reject_yes1;?></textarea>
											</div>
											<div class="col-md-12">
												<div>
													<label>Enter reasons for rejection (for submission to NGO)<span class="required">*</span> </label><br>
													<label class="input_description">The details entered here will be sent to the NGO when this form is submitted.</label>
												</div>
												<div class="my_internal_error"></div>
												<textarea id="comments_reject_yes2" name="comments_reject_yes2"  class="form-control"  rows="3" placeholder="Details/Comments on above"><?php echo $comments_reject_yes2;?></textarea>
											</div>
										</div>
										<div class="form-group row">
											
											<div class="col-lg-12">
												<div>&nbsp;</div>
												<div class="button " style="margin-left: 10px;">
													<button type="button" <?php if($status == 'Completed'){echo 'disabled';}?>  id="save<?php if($status == 'Completed'){echo 'disabled';}?>" class="btn btn-primary">Save</button>
													<button type="submit" <?php if($status == 'Completed'){echo 'disabled';}?>  id="submit<?php if($status == 'Completed'){echo 'disabled';}?>" class="btn btn-success">Submit</button>
													<button type="button" class="btn btn-primary ngo_send_notification" style="float: right;display: none;">Notify</button>
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
	$('.js-example-basic-single').select2();
	$(".date").datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: 'yy-mm-dd',
			yearRange : 'c-75:c+75',
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
		$(this).parent().parent().parent().parent().remove();
	});


	$('body').on('click','#save', function () {
				
		var org_task_id=$('#org_task_id').val();
		var org_task_list_id=$('#org_task_list_id').val();
		var org_id=$('#org_id').val();
		var ngo_id=$('#ngo_id').val();
		var prop_id=$('#prop_id').val();
		var superngo_id=$('#superngo_id').val();
		var org_staff_id=$('#org_staff_id').val();
		var visit_date = $('.visit_date').val();
		var comments_first=$('#comments_first').val();
		var additional_json = [];	
			
			var my_final=$('input[name="my_final"]:radio:checked').val();
				console.log(my_final);
				if(my_final){
					if(my_final=='my_approve'){
						//var select_donor_text = $('.select_donor option:selected').text();
						//var select_donor_id = $('.select_donor').val();
						//var donor_amount = $('.donor_amount').val();
						//console.log("select_donor_text");
						//console.log(select_donor_text);
						//console.log(select_donor_id);
						//console.log(donor_amount);
						
						var donor_dropdown_text1 = $('.donor_dropdown1 option:selected').text();
						var donor_dropdown_id1 = $('.donor_dropdown1').val();
						
						var donor_dropdown_text2 = $('.donor_dropdown2 option:selected').text();
						var donor_dropdown_id2 = $('.donor_dropdown2').val();
						
						var donor_dropdown_text3 = $('.donor_dropdown3 option:selected').text();
						var donor_dropdown_id3 = $('.donor_dropdown3').val();
						
						var csr_file_value1 = $('.cycle_file_upload1').val();
						if(csr_file_value1){}else{csr_file_value1='';}
						
						var csr_file_value_actual1 = $('.actual_disp1').val();
						if(csr_file_value_actual1){}else{csr_file_value_actual1='';}
						
						var donor_list = [];
						$('.donor_detail_data tr').each(function(key,val){
							var select_donor_text= $(this).find("td:eq(0)").text();
							var select_donor= $(this).find("td:eq(0)").attr('donor_id');
							var donor_amount= $(this).find("td:eq(1) input").val();
							donor_list.push({
								//select_donor_text :select_donor_text ,
								select_donor :select_donor ,
								donor_amount : donor_amount,
							});
						});
						console.log(donor_list);
						
						additional_json.push({
							
							'my_final':my_final,
							
							//'select_donor_text':select_donor_text,
							//'select_donor_id':select_donor_id,
							//'donor_amount':donor_amount,
							
							'donor_dropdown_text1':donor_dropdown_text1,
							'donor_dropdown_id1':donor_dropdown_id1,
							
							'donor_dropdown_text2':donor_dropdown_text2,
							'donor_dropdown_id2':donor_dropdown_id2,
							
							'donor_dropdown_text3':donor_dropdown_text3,
							'donor_dropdown_id3':donor_dropdown_id3,
							
							'donor_list':donor_list,
							'comments_first':comments_first,
							'visit_date':visit_date,
							'csr_file_value1':csr_file_value1,
							'csr_file_value_actual1':csr_file_value_actual1,
						});
						
					}else if(my_final=='my_request'){
						var comments_request = $('#comments_request').val();
						
						additional_json.push({
							
							'my_final':my_final,
							'comments_request':comments_request,
							'comments_first':comments_first,
							'visit_date':visit_date,
							
						});
					}else {
						var comments_reject_yes1 = $('#comments_reject_yes1').val();
						var comments_reject_yes2 = $('#comments_reject_yes2').val();
						additional_json.push({
							'my_final':my_final,
							'comments_reject_yes1':comments_reject_yes1,
							'comments_reject_yes2':comments_reject_yes2,
							'comments_first':comments_first,
							'visit_date':visit_date,
							
						});
					
					}
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
			
			donor_dropdown1: {
			   required: true,
			},
			donor_dropdown2 : {
			   required: true,
			},
			donor_dropdown3 : {
			   required: true,
			},
			comments_1 : {
			   required: true,
			},
			comments_request : {
			   required: true,
			},
			
			comments_recommend_yes :{
			   required: true,
			},
			visit_date :{
			   required: true,
			},
			actual_disp1 :{
			   required: true,
			},
			
			
		},
		messages: {
			was_review_radion: {
                required: "Was review is required.",
            },
			my_final: {
                required: "Select the next step is required.",
            },
			
			donor_dropdown1 : {
			   required: "Focal Point is required.",
			},
			donor_dropdown2 : {
			   required: "final evalution is required.",
			},
			donor_dropdown3 : {
			   required: "final evalution is required.",
			},
			comments_1  : {
			   required: "any special questions is required.",
			},
			
			comments_request  : {
			   required: "details of what the NGO is required.",
			},
			
			comments_recommend_yes :{
			   required: "reasons for this rejection is required.",
			},
			visit_date :{
			   required: "Date is required.",
			},
			actual_disp1 :{
			   required: "Date is required.",
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
			
			}else if (element.hasClass('donor_dropdown1')) {
				error.insertAfter(element.closest('div.form-group').find('.my_ngo1_error'));
            }else if (element.hasClass('is_valid_tax_exemption')) {
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
			}else if (element.hasClass('my_ngo1')) {
				error.insertAfter(element.closest('div.form-group').find('.my_ngo1_error'));
            }else if (element.hasClass('is_valid_tax_exemption')) {
				error.insertAfter(element.closest('div.form-group').find('.valid_tax_exemption'));
       
			}
            else{	
				error.insertAfter(element);
			}

         },

	  
		
		submitHandler: function (form) {
			//$.blockUI()
		var project='no';
		var prop_update_status='no';
		var donor_list = [];
		var is_error='no';	
		console.log('submit');
		var org_task_id=$('#org_task_id').val();
		var org_task_list_id=$('#org_task_list_id').val();
		var org_id=$('#org_id').val();
		var ngo_id=$('#ngo_id').val();
		var prop_id=$('#prop_id').val();
		var superngo_id=$('#superngo_id').val();
		var org_staff_id=$('#org_staff_id').val();
		//var prop_update=$('#prop_update').val();
		var comments_first=$('#comments_first').val();
		var visit_date = $('.visit_date').val();
		
		if(visit_date){
			 $(".visit_date_error").addClass('display_none');
		}else{
			is_error='yes';
			$(".visit_date_error").removeClass('display_none');
		}
		
			//console.log(prop_update);
		var additional_json = [];	
		var was_review_radion=$('input[name="was_review_radion"]:radio:checked').val();
		var my_final=$('input[name="my_final"]:radio:checked').val();
			console.log(was_review_radion);
		
		
			var my_final=$('input[name="my_final"]:radio:checked').val();
				console.log(my_final);
				if(my_final){
					if(my_final=='my_approve'){
						
						//var select_donor_text = $('.select_donor option:selected').text();
						//var select_donor_id = $('.select_donor').val();
						//var donor_amount = $('.donor_amount').val();
						//console.log("select_donor_text");
						//console.log(select_donor_text);
						//console.log(select_donor_id);
						//console.log(donor_amount);
						/*if(select_donor_id){
							$('#donor_data_error').addClass('display_none');
							//$('#donor_list_error').removeClass('display_none');
						}else{
							$('#donor_list_error').removeClass('display_none');
							$('#donor_data_error').removeClass('display_none');
						}*/
						
						var donor_dropdown_text1 = $('.donor_dropdown1 option:selected').text();
						var donor_dropdown_id1 = $('.donor_dropdown1').val();
						
						var donor_dropdown_text2 = $('.donor_dropdown2 option:selected').text();
						var donor_dropdown_id2 = $('.donor_dropdown2').val();
						
						var donor_dropdown_text3 = $('.donor_dropdown3 option:selected').text();
						var donor_dropdown_id3 = $('.donor_dropdown3').val();
							
							
						org_staff_id=donor_dropdown_id1;
						
						var csr_file_value1 = $('.cycle_file_upload1').val();
						var csr_file_value_actual1 = $('.actual_disp1').val();
									
						if(csr_file_value1){
								$('.cycle_file_upload1_error').addClass('display_none');
						}else{
							is_error = 'yes';
							$('.cycle_file_upload1_error').removeClass('display_none');
						}
						
						var is_donor_error = 'no';
						var donor_list = [];
						var match_data='no';
							
						
						
						
						
						$('.donor_detail_data tr').each(function(key,val){
							var select_donor_text= $(this).find("td:eq(0)").text();
							var select_donor= $(this).find("td:eq(0)").attr('donor_id');
							var donor_amount= $(this).find("td:eq(1) input").val();
							
							if(select_donor){}else{
								is_donor_error = 'yes';
							}
							if(donor_amount){}else{
								is_donor_error = 'yes';
							}
									
							var is_av = 'no';
							/*$(donor_list).each(function(key1,val1){
								console.log(val1);
								console.log(val1.select_donor);
								if(select_donor == val1.select_donor){
													
									$(".donor_duplicate_error").removeClass('display_none');
									console.log("Asif");
									is_av = 'yes';
									is_error = 'yes';
									match_data = 'yes';
									
								}else{
									if(match_data=='no'){
										$(".donor_duplicate_error").addClass('display_none');
									}
								}
								
							});*/
							console.log(is_av);
							if(is_av =='no'){
								donor_list.push({
									select_donor : select_donor,
									donor_amount : donor_amount,
								});
							}
						});
							  
						console.log(donor_list);
						
						
						if(is_donor_error == 'yes'){
							is_error = 'yes';
							$(".donor_duplicate_error").addClass('display_none');
							$('#donor_data_error').removeClass('display_none');
							$('#donor_list_error').addClass('display_none');
						}else{
							$('#donor_data_error').addClass('display_none');
							
						}
						if(donor_list.length==0){
							is_error = 'yes';
							$('#donor_list_error').removeClass('display_none');
							$('#donor_data_error').addClass('display_none');
						}else{
							$('#donor_list_error').addClass('display_none');
						}
					
						project='yes';
						prop_update_status='yes';
						additional_json.push({
							'my_final':my_final,
							
							'donor_dropdown_text1':donor_dropdown_text1,
							'donor_dropdown_id1':donor_dropdown_id1,
							
							'donor_dropdown_text2':donor_dropdown_text2,
							'donor_dropdown_id2':donor_dropdown_id2,
							
							'donor_dropdown_text3':donor_dropdown_text3,
							'donor_dropdown_id3':donor_dropdown_id3,
							
							'comments_first':comments_first,
							'visit_date':visit_date,
							'donor_list':donor_list,
							'csr_file_value1':csr_file_value1,
							'csr_file_value_actual1':csr_file_value_actual1,
						});
						
					}
					else if(my_final=='my_request'){
						var comments_request = $('#comments_request').val();
										
						additional_json.push({
							'my_final':my_final,
							'comments_request':comments_request,
							'comments_first':comments_first,
							'visit_date':visit_date,
							
						});
					}else {
						var comments_reject_yes1 = $('#comments_reject_yes1').val();
						var comments_reject_yes2 = $('#comments_reject_yes2').val();
						
						additional_json.push({
							'my_final':my_final,
							'comments_reject_yes1':comments_reject_yes1,
							'comments_reject_yes2':comments_reject_yes2,
							'comments_first':comments_first,
							'visit_date':visit_date,
						});
					
					}
				}
			
			console.log(additional_json);
		if(is_error=='no'){	
			$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
		
			$.post(APP_URL + 'organisation/tasks/change_status_onsubmit_by_org1_board_reaview', {
					additional_json:additional_json,
					org_task_id:org_task_id, 
					org_task_list_id:org_task_list_id,
					org_id:org_id,
					ngo_id:ngo_id,
					prop_id:prop_id,
					superngo_id:superngo_id,
					org_staff_id:org_staff_id,
					my_final:my_final,
					prop_update_status:prop_update_status,
					donor_list:donor_list,
					project:project,
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

	