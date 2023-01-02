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
		$created_date = $data_value[0]['created_date'];
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
			$is_review_radion1='';
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
			$is_rec='';
			
			$csr_file_value1='';
			$csr_file_value2='';
			$csr_file_value3='';
			
			$csr_file_value_actual1='';
			$csr_file_value_actual2='';
			$csr_file_value_actual3='';
			
			$organisation_three='';
			$organisation_eighty='';
			$organisation_csr1='';
		
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
			
			
			if(isset($additional_json[0]->is_review_radion)){
				$is_review_radion1 = $additional_json[0]->is_review_radion;
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
			if(isset($additional_json[0]->organisation_three)){
				$organisation_three = $additional_json[0]->organisation_three;
			}
			if(isset($additional_json[0]->organisation_eighty)){
				$organisation_eighty = $additional_json[0]->organisation_eighty;
			}
			if(isset($additional_json[0]->organisation_csr1)){
				$organisation_csr1 = $additional_json[0]->organisation_csr1;
			}
		
		}else{
			$organisation_three='';
			$organisation_eighty='';
			$organisation_csr1='';
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
			
			$is_review_radion1='';
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
			
			$is_rec='';
			
			$csr_file_value1='';
			$csr_file_value2='';
			$csr_file_value3='';
			
			$csr_file_value_actual1='';
			$csr_file_value_actual2='';
			$csr_file_value_actual3='';
			
			
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
		//$ngo_status='';
		$ngo_status ='';
		$rejection_records='';
		$rejection_ngo='';
		
			$organisation_three='';
			$organisation_eighty='';
			$organisation_csr1='';
			
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
			
			$is_review_radion1='';
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
					<div class="row">
						<div class="col-lg-6">
						        
							<?php 
								$brand_name_superngo_p = $this->db->get_where('superngo',array('id'=>$superngo_id))->result_array();
								$ngo_data_p = $this->db->get_where('ngo',array('id'=>$ngo_id))->result_array();
                              //  var_dump($brand_name);
                               // var_dump($ngo_data[0]['created_time']);
                               // var_dump($ngo_data[0]['update_datetime']);
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
								$this->load->view('organisation/pages/ngo_entity_detail',$data);  
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
										<div class=" row ">
											<div >
												<label for="is_review" class="col-md-12 desk-review" id="is_review">Is a desk review required to be done?<span class="required">*</span>
												</label>
											</div>
											<div class="col-md-12">
												<label style="font-weight: 400;">
													<input type="radio" class="is_review_radion1" name="is_review_radion1" value="Yes" <?php if($is_review_radion1 == 'Yes'){echo 'checked';}?> id="review_radio_yes">&nbsp;
													<span>Yes</span> 
												</label>
												<label style="font-weight: 400;">
													<input type="radio"  class="is_review_radion1"  name="is_review_radion1" value="No"  <?php if($is_review_radion1 == 'No'){echo 'checked';}?> id="review_radio_no">
													<span>No</span> 
												</label> 
												<div class=" row is_review_radion_error"></div>
											</div>
										</div>
										<div class="form-group row  is_review_radion_no <?php if($is_review_radion1 == 'No'){}else{ echo 'display_none'; }?>">
											<div class="col-md-12"> 
												<div>
													<label>Briefly state why not </label>
												</div>
												<textarea  id="comments_no" name="comments_no"   class="form-control"  rows="3" placeholder="Details/Comments on the above"><?php echo $comments_no;?></textarea>
											</div>
										</div>
										<div class="form- row is_review_radion_yes   <?php if($is_review_radion == 'Yes'){}else{ echo 'display_none'; }?>" >
											<div class="col-md-12"> 
												<h5>Credibility</h5>      
											</div>
											<div>
												<label for="prior" class="col-md-12 ">Prior Assessments: Part of rating organisations such as Goodera / BSE Samman / Credibility Alliance / TISS CISR empanelment / others<span class="required">*</span></label>	
												<div class="col-md-12">
													<label style="font-weight: 400;">
														<input type="radio" name="is_prior" class="is_prior"  value="is_prior_one"  <?php if($is_prior == 'is_prior_one'){echo 'checked';}?>>
														<span>Listed on 3 more panels</span> 
													</label><br>
													<label style="font-weight: 400;">
														<input type="radio" name="is_prior" class="is_prior"  value="is_prior_two" <?php if($is_prior == 'is_prior_two'){echo 'checked';}?>>
														<span>Listed on atleast 1 panel</span> &nbsp;
													</label><br>
													<label style="font-weight: 400;">
														<input type="radio" name="is_prior" class="is_prior"  value="is_prior_three" <?php if($is_prior == 'is_prior_three'){echo 'checked';}?> >
														<span>Not on any portals. Adverse stories on web.</span> 
													</label> 
													<div class="is_prior_error"></div>
												</div>
											</div>
											   
											<div class="col-md-12"> 
												<div>
												   <label>Details/Comments on the above  </label>
												</div>
												<textarea id="comments_1" name="comments_1"  class="form-control"  rows="3" placeholder="Enter details here..."><?php echo $comments_1;?></textarea>
											</div>	
										</div>
										<div class="form-group row is_review_radion_yes <?php if($is_review_radion == 'Yes'){}else{ echo 'display_none'; }?>">										
											
											<div>
											  <label for="ref" class="col-md-12" >References<span class="required">*</span></label>
												<div class="col-md-12">
													<label style="font-weight: 400;">
														<input type="radio" name="is_reference" class="is_reference" value="is_reference_one" class="is_reference" <?php if($is_reference == 'is_reference_one'){echo 'checked';}?>>
														<span>Referred by Chairmain's Office / Other Directors / Presidents of the company. Past partner with positive work report.</span> 
													</label><br>
													<label style="font-weight: 400;">
														<input type="radio" name="is_reference" class="is_reference" value="is_reference_two" class="is_reference" <?php if($is_reference == 'is_reference_two'){echo 'checked';}?>>
														<span>Other references (including from existing partners and other business leads).</span> 
													</label><br>
													<label style="font-weight: 400;">
														<input type="radio" name="is_reference" class="is_reference" value="is_reference_three" <?php if($is_reference == 'is_reference_three'){echo 'checked';}?>>
														<span>No references.</span> 
													</label>
													<div class=" is_reference_error "></div>
												</div>
											</div>
											<div class="col-md-12"> 
												<div>
													<label>Details/Comments on the above</label>
												</div>
												<textarea id="comments_2" name="comments_2" class="form-control"  rows="3" placeholder="Enter details here..."><?php echo $comments_2;?></textarea>
											</div>	
										</div>
										<div class="form-group row is_review_radion_yes <?php if($is_review_radion == 'Yes'){}else{ echo 'display_none'; }?>">
											<div>
												<label for="led" class="col-md-12 " >Leadership<span class="required">*</span></label>
												<label class="col-md-12 input_description ">TBD</label>
												<div class="col-md-12">
													<label style="font-weight: 400;">
															<input type="radio" name="is_leadership" class="is_leadership" value="is_leadership_one" <?php if($is_leadership == 'is_leadership_one'){echo 'checked';}?> >
															<span>High Reputation. Positive comments.</span>
													</label><br>
													<label style="font-weight: 400;">
															<input type="radio" name="is_leadership" class="is_leadership" value="is_leadership_two" <?php if($is_leadership == 'is_leadership_two'){echo 'checked';}?> >
															<span>No adverse comments/stories.</span> 
													</label><br>
													<label style="font-weight: 400;">
															<input type="radio" name="is_leadership" class="is_leadership" value="is_leadership_three" <?php if($is_leadership == 'is_leadership_three'){echo 'checked';}?>>
															<span>Significant number of adverse stories.</span> 
													</label>
													<div class="is_leadership_error"></div>
												</div>
												
											</div>	
												
											<div class="col-md-12">
												<div>
												   <label>Details/Comments on the above</label>
												</div>
												<textarea id="comments_3" name="comments_3" class="form-control"  rows="3" placeholder="Enter details here..."><?php echo $comments_3;?></textarea>
											</div>
										</div>
											
										<div class="form-group row is_review_radion_yes <?php if($is_review_radion == 'Yes'){}else{ echo 'display_none'; }?>">
											<div>								
												<label for="recog" class="col-md-12 " id="recog">Recognition and Awards<span class="required">*</span></label>
												<div class="col-md-12">
													<label style="font-weight: 400;">
														<input type="radio" name="is_recognition" class="is_recognition" value="is_recognition_one" <?php if($is_recognition == 'is_recognition_one'){echo 'checked';}?> >
														<span>Jamnalal Bajaj Awardee / International / Significant National Awards (Institution or leadership).</span>&nbsp; 
													</label><br>
													<label style="font-weight: 400;">
													  <input type="radio" name="is_recognition" class="is_recognition" value="is_recognition_two" <?php if($is_recognition == 'is_recognition_two'){echo 'checked';}?>>
														<span>Other National level awards.</span> &nbsp;
													</label><br>
													<label style="font-weight: 400;">
														<input type="radio" name="is_recognition" class="is_recognition" value="is_recognition_three" <?php if($is_recognition == 'is_recognition_three'){echo 'checked';}?> >
														<span>Others.</span> 
													</label>
													<div class=" is_recognition_error"></div>
												</div>	
											</div> 
											<div class="col-md-12">
												<div>
													<label>Details/Comments on the above</label>
												</div>
												<textarea id="comments_4" name="comments_4" class="form-control"  rows="3" placeholder="Enter details here..."><?php echo $comments_4;?></textarea>
											</div>
										</div>
											
										<div class="form-group row is_review_radion_yes <?php if($is_review_radion == 'Yes'){}else{ echo 'display_none'; }?>">
											<div>
												<label for="lin" class="col-md-12">Linkages<span class="required">*</span></label>
												<div class="col-md-12">
													<label style="font-weight: 400;">
														<input type="radio" name="is_linkage" class="is_linkage" value="is_linkage_one" <?php if($is_linkage == 'is_linkage_one'){echo 'checked';}?> >
														<span>Leadership of national networks, member of global networks; good donor portfolio (e.g. Tata Trusts, global funders); international university linkages.</span> 
													</label><br>
													<label style="font-weight: 400;">
														<input type="radio" name="is_linkage" class="is_linkage" value="is_linkage_two" <?php if($is_linkage == 'is_linkage_two'){echo 'checked';}?>>
														<span>Membership of national or leadership of local networks; local university linkages; local corporate CSR.</span> &nbsp;
													</label><br>
													<label style="font-weight: 400;">
														<input type="radio" name="is_linkage" class="is_linkage" value="is_linkage_three" <?php if($is_linkage == 'is_linkage_three'){echo 'checked';}?>>
														<span>No significant linkages.</span> &nbsp;
													</label>
													<div class=" is_linkage_error"></div>
												</div>	
											</div>
											<div class="col-md-12">
												<div>
													<label>Details/Comments on the above  </label>
												</div>
													<textarea id="comments_5" name="comments_5" class="form-control"  rows="3" placeholder="Enter details here..."><?php echo $comments_5;?></textarea>
											</div>
										</div>
										   
										<div class="form-group row is_review_radion_yes <?php if($is_review_radion == 'Yes'){}else{ echo 'display_none'; }?>">
											<div class="col-md-12">
												<h5>Capability</h5>
											</div>	
										</div>
										
										<div class="form-group row is_review_radion_yes <?php if($is_review_radion == 'Yes'){}else{ echo 'display_none'; }?>">
											<div>					 
												<label for="manage" class="col-md-12 " >Management Capability<span class="required">*</span></label>
												<div class="col-md-12">
													<label style="font-weight: 400;">
														<input type="radio" name="is_management" class="is_management" value="is_management_one" <?php if($is_management == 'is_management_one'){echo 'checked';}?> >
														<span>At least 25% of the organisation has professional qualification AND work experience greater than 10 years. 
														</span>
													</label><br>
													<label style="font-weight: 400;">
														 <input type="radio" name="is_management" class="is_management" value="is_management_two" <?php if($is_management == 'is_management_two'){echo 'checked';}?>>
														 <span>At least 25% of the organisation has professional qualification OR work experience greater than 10 years.</span> 
													</label><br>
													<label style="font-weight: 400;">
														 <input type="radio" name="is_management" class="is_management" value="is_management_three" <?php if($is_management == 'is_management_three'){echo 'checked';}?>>
														 <span>Others.</span> 
													</label> 
													<div class=" is_management_error"></div>
												 </div>
											</div>
												  
												<div class="col-md-12 is_review_radion_yes <?php if($is_review_radion == 'Yes'){}else{ echo 'display_none'; }?>">
													<div>
													   <label>Details/Comments on the above  </label>
													</div>
													<textarea id="comments_6" name="comments_6" class="form-control"  rows="3" placeholder="Enter details here..."><?php echo $comments_6;?></textarea>
												</div>
										</div>
										
										<div class="form-group row is_review_radion_yes <?php if($is_review_radion == 'Yes'){}else{ echo 'display_none'; }?>">
											<div>					
												<label for="geog" class="col-md-12 ">Geographical Reach<span class="required">*</span></label>
												<div class="col-md-12">
													<label style="font-weight: 400;">
														<input type="radio" name="is_geographical" class="is_geographical" value="is_geographical_one"   <?php if($is_geographical == 'is_geographical_one'){echo 'checked';}?>>
														<span>Reaches more than 500 villages.</span> 
													</label><br>
													<label style="font-weight: 400;">
														<input type="radio" name="is_geographical" class="is_geographical" value="is_geographical_two"  <?php if($is_geographical == 'is_geographical_two'){echo 'checked';}?>>
														<span>Reaches more than 100 villages.</span> &nbsp;
													</label><br>
													<label style="font-weight: 400;">
													   <input type="radio" name="is_geographical" class="is_geographical" value="is_geographical_three"  <?php if($is_geographical == 'is_geographical_three'){echo 'checked';}?> >
													   <span>Reaches less than 100 villages.</span> &nbsp;
													</label>
													<div class="is_geographical_error"></div>												
												</div>
											</div>			
											<div class="col-md-12">
												<div>
												   <label>Details/Comments on the above  </label>
												</div>
												<textarea id="comments_7" name="comments_7" class="form-control"  rows="3" placeholder="Enter details here..."><?php echo $comments_7;?></textarea>
											</div>
										</div>
										
										<div class="form-group row is_review_radion_yes <?php if($is_review_radion == 'Yes'){}else{ echo 'display_none'; }?>">
											<div>
												<label for="benifit" class="col-md-12" id="benifit">Beneficiary reach<span class="required">*</span></label>
												<div class="col-md-12">
													<label style="font-weight: 400;">
														<input type="radio" name="is_benificiary" class="is_benificiary" value="is_benificiary_one" <?php if($is_benificiary == 'is_benificiary_one'){echo 'checked';} ?> >
														<span>Reaches more than 1 lakh beneficiaries.</span>
													</label><br>
													<label style="font-weight: 400;">
														 <input type="radio" name="is_benificiary" class="is_benificiary" value="is_benificiary_two" <?php if($is_benificiary == 'is_benificiary_two'){echo 'checked';}?>>
														 <span>Reaches between 50,000 - 1 lakh beneficiaries.</span> &nbsp;
													</label><br>
													<label style="font-weight: 400;">
														 <input type="radio" name="is_benificiary" class="is_benificiary" value="is_benificiary_three" <?php if($is_benificiary == 'is_benificiary_three'){echo 'checked';}?>>
														 <span>Reaches less than 50,000 beneficiaries.</span> &nbsp;
													</label>
														<div class=" is_benificiary_error"></div>
												</div>
											</div>
											<div class="col-md-12 is_review_radion_yes <?php if($is_review_radion == 'Yes'){}else{ echo 'display_none'; }?>">
												 <div>
												   <label>Details/Comments on the above  </label>
												 </div>
													<textarea id="comments_8" name="comments_8" class="form-control"  rows="3" placeholder="Enter details here..."><?php echo $comments_8;?></textarea>
											</div>
										</div>
										
										<div class="form-group row is_review_radion_yes <?php if($is_review_radion == 'Yes'){}else{ echo 'display_none'; }?>">
											<div>
												<label for="comments" class="col-md-12 ">Past Experience<span class="required">*</span></label>
												<div class="col-md-12">
													<label style="font-weight: 400;">
														<input type="radio" name="is_past" class="is_past" value="is_past_one"  <?php if($is_past == 'is_past_one'){echo 'checked';}?> >
														<span>Yes, at same scale or greater. Has impacted policy and practice.</span> 
													</label><br>
													<label style="font-weight: 400;">
														<input type="radio" name="is_past" class="is_past" value="is_past_two"  <?php if($is_past == 'is_past_two'){echo 'checked';}?>>
														<span>Yes, but between 50 - 100% of proposed scale.</span> 
													</label><br>
													<label style="font-weight: 400;">
														<input type="radio" name="is_past" class="is_past" value="is_past_three"  <?php if($is_past == 'is_past_three'){echo 'checked';}?>>
														<span>No, or lower.</span>&nbsp; 
													</label>
													<div class=" is_past_error"></div>
												</div>					
											</div>
											<div class="col-md-12 is_review_radion_yes <?php if($is_review_radion == 'Yes'){}else{ echo 'display_none'; }?>">
												<div>
													<label>Details/Comments on the above  </label>
												</div>
												<textarea id="comments_9" name="comments_9" class="form-control"  rows="3" placeholder="Enter details here..."><?php echo $comments_9;?></textarea>
											</div>
										</div>
										
										<div class="form-group row is_review_radion_yes <?php if($is_review_radion == 'Yes'){}else{ echo 'display_none'; }?>">
											<div>
												<label for="comments" class="col-md-12 ">Existing Presence in Project Area<span class="required">*</span></label>
												<div class="col-md-12">
													<label style="font-weight: 400;">
														<input type="radio" name="is_existing" class="is_existing" value="is_existing_one" <?php if($is_existing == 'is_existing_one'){echo 'checked';}?>>
														<span>More than 2 years with dedicated office and staff</span>
													</label><br>
													<label style="font-weight: 400;">
														<input type="radio" name="is_existing" class="is_existing" value="is_existing_two" <?php if($is_existing == 'is_existing_two'){echo 'checked';}?>>
														<span>0.5 to 2 years. May or may not have dedicated staff in the area</span> &nbsp;
													</label><br> 
													<label style="font-weight: 400;">
														<input type="radio" name="is_existing" class="is_existing" value="is_existing_three" <?php if($is_existing == 'is_existing_three'){echo 'checked';}?>>
														<span>Less than 0.5 years</span> &nbsp;
													</label>
													<div class=" is_existing_error"></div>
												</div>
											</div> 
											<div class="col-md-12 is_review_radion_yes <?php if($is_review_radion == 'Yes'){}else{ echo 'display_none'; }?>">
												<div>
													<label>Details/Comments on the above  </label>
												</div>
												<textarea id="comments_1022" name="comments_1022" class="form-control"  rows="3" placeholder="Enter details here..."><?php echo $comments_10;?></textarea>
											</div>
										</div>
										
										<div class="form-group row is_review_radion_yes <?php if($is_review_radion == 'Yes'){}else{ echo 'display_none'; }?>">
											<div  class="col-md-12">
												<h5>Summary</h5>
											</div>
										</div>
										<div class="form-group row is_review_radion_yes <?php if($is_review_radion == 'Yes'){}else{ echo 'display_none'; }?>">
											<div  class="col-md-6">
												<label>Static text</label>
											</div>
											<div  class="col-md-6">
												<small>TBD</small>
											</div>
										</div>	
										<div class="form-group row is_review_radion_yes1 <?php if($is_review_radion1 == 'Yes'){}else{ echo 'display_none'; }?>">
											<div  class="col-md-12">
												<div>
													<label>Overall organisation profile summary for approval sheet<span class="required">*</span></label><br>
													<label class="input_description">Please keep it under 200 words</label>
												</div>
												<textarea id="comments_10" name="comments_10" class="form-control"  rows="3" placeholder="Enter details here..."><?php echo $comments_10;?></textarea>
											</div>
										</div>
										
										<div class="form-group row is_review_radion_yes1 <?php if($is_review_radion1 == 'Yes'){}else{ echo 'display_none'; }?>">
											<div>
												<label for="comments" class="col-md-12 ">Does the organisation have a 3 year track record?<span class="required">*</span></label>
												<div class="col-md-12">
													<label style="font-weight: 400;">
														<input type="radio" name="organisation_three" class="organisation_three" value="Yes" <?php if($organisation_three == 'Yes'){echo 'checked';}?>>
														<span>Yes</span>
													</label>
													<label style="font-weight: 400;">
														<input type="radio" name="organisation_three" class="organisation_three" value="No" <?php if($organisation_three == 'No'){echo 'checked';}?>>
														<span>No</span> &nbsp;
													</label><br> 
													<div class="organisation_three_error"></div>
												</div>
											</div> 
										</div>
										
										<div class="form-group row is_review_radion_yes1 <?php if($is_review_radion1 == 'Yes'){}else{ echo 'display_none'; }?>">
											<div>
												<label for="comments" class="col-md-12 ">Does the organisation have a valid 80G Certificate?<span class="required">*</span></label>
												<div class="col-md-12">
													<label style="font-weight: 400;">
														<input type="radio" name="organisation_eighty" class="organisation_eighty" value="Yes" <?php if($organisation_eighty == 'Yes'){echo 'checked';}?>>
														<span>Yes</span>
													</label>
													<label style="font-weight: 400;">
														<input type="radio" name="organisation_eighty" class="organisation_eighty" value="No" <?php if($organisation_eighty == 'No'){echo 'checked';}?>>
														<span>No</span> &nbsp;
													</label><br> 
													<div class="organisation_eighty_error"></div>
												</div>
											</div> 
										</div>
										
										
										<div class="form-group row is_review_radion_yes1 <?php if($is_review_radion1 == 'Yes'){}else{ echo 'display_none'; }?>">
											<div>
												<label for="comments" class="col-md-12 ">Does the organisation have a valid CSR-1 Registration?<span class="required">*</span></label>
												<div class="col-md-12">
													<label style="font-weight: 400;">
														<input type="radio" name="organisation_csr1" class="organisation_csr1" value="Yes" <?php if($organisation_csr1 == 'Yes'){echo 'checked';}?>>
														<span>Yes</span>
													</label>
													<label style="font-weight: 400;">
														<input type="radio" name="organisation_csr1" class="organisation_csr1" value="No" <?php if($organisation_csr1 == 'No'){echo 'checked';}?>>
														<span>No</span> &nbsp;
													</label><br> 
													<div class="organisation_csr1_error"></div>
												</div>
											</div> 
										</div>
										
										<div class="form-group row is_review_radion_yes1 <?php if($is_review_radion1 == 'Yes'){}else{ echo 'display_none'; }?>">
											<div  class="col-md-12">
												<div>
													<label>Key additional questions to be asked during field visit</label><br>
												</div>
												<textarea id="comments_11" name="comments_11" class="form-control"  rows="3" placeholder="Enter questions here..."><?php echo $comments_11;?></textarea>
											</div>
										</div>
										
										
										
										<div class="form-group row is_review_radion_yes1 <?php if($is_review_radion1 == 'Yes'){}else{ echo 'display_none'; }?>">
											<div  class="col-md-12">
												<h5>Documents</h5>
											</div>
										</div>	
										<div class="value_read">
											<div class="form-group row is_review_radion_yes1 <?php if($is_review_radion1 == 'Yes'){}else{ echo 'display_none'; }?>">
												<label for="comments" class="col-md-12">Provide proof of 80G from the Income Tax Department Website (TBD)</label>
												<label for="input_description" class=" col-md-12 input_description " >TBD</label>
												<div class="col-md-12">
													<button type="button" id="comman_file_upload_class" name="comman_file_upload_class" image_upload_desc="" upload_type="file" file_count="single" img_primary="no" file_prev_class="cycle_file_upload_selected" file_input_id="cycle_file_upload1" class="btn btn-primary btn-lg comman_file_upload_class" data-toggle="modal" data-target="#browseFile"><i class="fa fa-upload"></i> </button>
													<div>
														<div class="">
															<input class="form-control cycle_file_upload1 " id="cycle_file_upload1" name="cycle_file_upload1" type="hidden" value="<?php if($csr_file_value1){ echo $csr_file_value1;}?>">
														</div>
														<span class="registration_80g_valid" ></span>
														<div class="image-preview inline_block cycle_file_upload_selected">
															<input readonly class="form-control is_edit_data  actual_disp1" type="text" id="cycle_file_upload_actual" <?php if(!$csr_file_value_actual1){ echo 'display_none' ;} ?> value="<?php if($csr_file_value_actual1){ echo $csr_file_value_actual1;}?>">
														</div>
													</div>
												</div>
											</div>
											<div class="form-group row is_review_radion_yes1 <?php if($is_review_radion1 == 'Yes'){}else{ echo 'display_none'; }?>">
												<label for="comments" class="col-md-12">Upload NGO Desk Review document</label><br>
												<label class="input_description col-md-12"><a href="<?php echo base_url();?>assets/doc/gst_file.docx" download target="_blank">Use this latest format for the review</a></label>
												<div class="col-md-12">
													<button type="button" id="comman_file_upload_class" name="comman_file_upload_class" image_upload_desc="" upload_type="file" file_count="single" img_primary="no" file_prev_class="cycle_file_upload_selected" file_input_id="cycle_file_upload2" class="btn btn-primary btn-lg comman_file_upload_class" data-toggle="modal" data-target="#browseFile"><i class="fa fa-upload"></i> </button>
													<div>
														<div class="">
															<input class="form-control cycle_file_upload2 " id="cycle_file_upload2" name="cycle_file_upload2" type="hidden" value="<?php if($csr_file_value2){ echo $csr_file_value3;}?>">
														</div>
														<span class="registration_80g_valid" ></span>
														<div class="image-preview inline_block cycle_file_upload_selected">
															<input readonly class="form-control is_edit_data  actual_disp2" type="text" id="cycle_file_upload_actual" <?php if(!$csr_file_value_actual1){ echo 'display_none' ;} ?> value="<?php if($csr_file_value_actual1){ echo $csr_file_value_actual1;}?>">
														</div>
													</div>
												</div>
											</div>  
											<div class="">
												<label  id="cycle_file_upload_error1" class="required display_none cycle_file_upload_error1">Your file must be less than 10MB in size.</label>
												<label  id="cycle_file_upload_error" class="required display_none cycle_file_upload_error">Attachment is required.</label>
											</div>
											<div class="form-group row is_review_radion_yes1 <?php if($is_review_radion1 == 'Yes'){}else{ echo 'display_none'; }?>">
												<label for="comments" class="col-md-12">Upload Financial Review document</label><br>
												<label class="input_description col-md-12"><a href="<?php echo base_url();?>assets/doc/gst_file.docx" download target="_blank">Use this latest format for the review</a></label>
												<div class="col-md-12">
													<button type="button" id="comman_file_upload_class" name="comman_file_upload_class" image_upload_desc="" upload_type="file" file_count="single" img_primary="no" file_prev_class="cycle_file_upload_selected" file_input_id="cycle_file_upload3" class="btn btn-primary btn-lg comman_file_upload_class" data-toggle="modal" data-target="#browseFile"><i class="fa fa-upload"></i> </button>
													<div>
														<div class="">
															<input class="form-control cycle_file_upload3 " id="cycle_file_upload3" name="cycle_file_upload3" type="hidden" value="<?php if($csr_file_value3){ echo $csr_file_value3;}?>">
														</div>
													   <span class="registration_80g_valid" ></span>
														<div class="image-preview inline_block cycle_file_upload_selected">
															<input readonly class="form-control is_edit_data  actual_disp3" type="text" id="cycle_file_upload_actual" <?php if(!$csr_file_value_actual1){ echo 'display_none' ;} ?> value="<?php if($csr_file_value_actual1){ echo $csr_file_value_actual1;}?>">
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="form-group row is_review_radion_yes1 <?php if($is_review_radion1 == 'Yes'){}else{ echo 'display_none'; }?>">
											<div  class="col-md-12">
												<h5>Recommendation</h5>
											</div>
										</div>
										<div class="form-group row is_review_radion_yes1 <?php if($is_review_radion1 == 'Yes'){}else{ echo 'display_none'; }?>">
											<div>				 
												<label for="comments" class="col-md-12 ">Do you recommend this application?<span class="required">*</span></label>			 
												<div class="col-md-12">                 
													<label style="font-weight: 400;">		
														<input type="radio" name="is_rec" class="is_rec" value="Yes, recommended" <?php if($is_rec == 'Yes, recommended'){echo 'checked';}?>>
														<span>Yes, recommended</span> &nbsp; 
													</label>
													<label style="font-weight: 400;">
														<input type="radio" name="is_rec" class="is_rec" value="No, not recommended" <?php if($is_rec == 'No, not recommended'){echo 'checked';}?> >
														<span>No, not recommended</</span> &nbsp; 
													</label>
													<div class=" is_rec_error"></div>
												</div>
											</div>
										</div>
										
										<div class="form-group row is_review_radion_yes1 <?php if($is_review_radion1 == 'Yes'){}else{ echo 'display_none'; }?>">
											<div  class="col-md-12">
												<div>
													<label>Details/Comments on the above<span class="required">*</span></label>
												</div>
												<textarea id="comments_12" name="comments_12" class="form-control"  rows="3" placeholder="Enter main reasons for your decision here"><?php echo $comments_12;?></textarea>
											</div>
										</div>
									
										<div class="form-group row is_review_radion_yes_no <?php if($is_review_radion1 == 'Yes' || $is_review_radion1=='No'){}else{ echo 'display_none'; }?>">		 
											<div class="row">
												<div class="col-md-12">
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
		<!--</div>
	</div>
</div>-->

<script>

$('document').ready(function(){

	$('body').on('click','.is_review_radion1', function () {
		var radio_value = $('input[name="is_review_radion1"]:radio:checked').next().html();

	   console.log(radio_value);
	   if(radio_value == 'Yes'){
			$('.is_review_radion_yes_no').removeClass('display_none')
			$('.is_review_radion_yes1').removeClass('display_none')
			$('.is_review_radion_no').addClass('display_none')
			
	   }else{
			$('.is_review_radion_yes_no').removeClass('display_none')
			$('.is_review_radion_no').removeClass('display_none')
			$('.is_review_radion_yes1').addClass('display_none')
		   
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
		var additional_json = [];	
		var is_review_radion=$('input[name="is_review_radion1"]:radio:checked').val();
		if(is_review_radion=='Yes'){
		
			var is_prior=$('input[name="is_prior"]:radio:checked').val();
				if(is_prior){}else{is_prior='';}
			var is_reference=$('input[name="is_reference"]:radio:checked').val();
				if(is_reference){}else{is_reference='';}
			var is_leadership =$('input[name="is_leadership"]:radio:checked').val();
				if(is_leadership){}else{is_leadership='';}
			var is_recognition=$('input[name="is_recognition"]:radio:checked').val();
				if(is_recognition){}else{is_recognition='';}
			var is_linkage=$('input[name="is_linkage"]:radio:checked').val();
				if(is_linkage){}else{is_linkage='';}
			var is_management=$('input[name="is_management"]:radio:checked').val();
				if(is_management){}else{is_management='';}
			var is_geographical=$('input[name="is_geographical"]:radio:checked').val();
				if(is_geographical){}else{is_geographical='';}
			var is_benificiary=$('input[name="is_benificiary"]:radio:checked').val();
				if(is_benificiary){}else{is_benificiary='';}
			var is_past=$('input[name="is_past"]:radio:checked').val();
				if(is_past){}else{is_past='';}
			var is_existing=$('input[name="is_existing"]:radio:checked').val();
				if(is_existing){}else{is_existing='';}
				
				
			var organisation_three=$('input[name="organisation_three"]:radio:checked').val();
				if(organisation_three){}else{organisation_three='';}
			var organisation_eighty=$('input[name="organisation_eighty"]:radio:checked').val();
				if(organisation_eighty){}else{organisation_eighty='';}
			var organisation_csr1=$('input[name="organisation_csr1"]:radio:checked').val();
				if(organisation_csr1){}else{organisation_csr1='';}
				
				
			
			var is_rec =$('input[name="is_rec"]:radio:checked').val();
				if(is_rec){}else{is_rec='';}
				
			var csr_file_value1 = $('.cycle_file_upload1').val();
				if(csr_file_value1){}else{csr_file_value1='';}
			var csr_file_value2 = $('.cycle_file_upload2').val();
				if(csr_file_value2){}else{csr_file_value2='';}
			var csr_file_value3 = $('.cycle_file_upload3').val();	
				if(csr_file_value3){}else{csr_file_value3='';}
				
			var csr_file_value_actual1 = $('.actual_disp1').val();
				if(csr_file_value_actual1){}else{csr_file_value_actual1='';}
			var csr_file_value_actual2 = $('.actual_disp2').val();
				if(csr_file_value_actual2){}else{csr_file_value_actual2='';}
			var csr_file_value_actual3 = $('.actual_disp3').val();
				if(csr_file_value_actual3){}else{csr_file_value_actual3='';}
			
			//$.blockUI()
			var comments_1 = $('#comments_1').val();
			var comments_2 = $('#comments_2').val();
			var comments_3 = $('#comments_3').val();
			var comments_4 = $('#comments_4').val();
			var comments_5 = $('#comments_5').val();
			var comments_6 = $('#comments_6').val();
			var comments_7 = $('#comments_7').val();
			var comments_8 = $('#comments_8').val();
			var comments_9 = $('#comments_9').val();
			var comments_10 = $('#comments_10').val();
			var comments_11 = $('#comments_11').val();
			var comments_12 = $('#comments_12').val();
			
			
			
			additional_json.push({
				'comments_1':comments_1,
				'comments_2':comments_2,
				'comments_3':comments_3,
				'comments_4':comments_4,
				'comments_5':comments_5,
				'comments_6':comments_6,
				'comments_7':comments_7,
				'comments_8':comments_8,
				'comments_9':comments_9,
				'comments_10':comments_10,
				'comments_11':comments_11,
				'comments_12':comments_12,
				
				'is_review_radion':is_review_radion,
				
				'is_prior':is_prior,
				'is_reference':is_reference,
				'is_leadership':is_leadership,
				'is_recognition':is_recognition,
				'is_linkage':is_linkage,
				'is_management':is_management,
				'is_geographical':is_geographical,
				'is_benificiary':is_benificiary,
				'is_past':is_past,
				'is_existing':is_existing,
				'is_rec':is_rec,
				
				
				'organisation_three':organisation_three,
				'organisation_eighty':organisation_eighty,
				'organisation_csr1':organisation_csr1,
				
				'csr_file_value1':csr_file_value1,
				'csr_file_value2':csr_file_value2,
				'csr_file_value3':csr_file_value3,
				
				'csr_file_value_actual1':csr_file_value_actual1,
				'csr_file_value_actual2':csr_file_value_actual2,
				'csr_file_value_actual3':csr_file_value_actual3,
				
				
				

			});
		}else{
			
			var comments_no = $('#comments_no').val();
			additional_json.push({
				'is_review_radion':is_review_radion,
				'comments_no':comments_no,
			});
		}   
		
			console.log(additional_json);
			$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
	
			$.post(APP_URL + 'organisation/tasks/update_onsave_ngo_desk_review_page', {
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
			organisation_three: {
                required: true,
            },
			organisation_eighty: {
                required: true,
            },
			organisation_csr1: {
                required: true,
            },
			comments_12: {
                required: true,
            },
			
			is_review_radion1: {
                required: true,
            },
			is_review_radion: {
                required: true,
            },	
			is_prior : {
			   required: true,
			},
			is_reference : {
				   required: true,
			},
			is_leadership: {
				   required: true,
			},
			is_recognition: {
				   required: true,
			},
			is_linkage : {
				   required: true,
			},
			is_management : {
				   required: true,
			},
			is_geographical : {
				   required: true,
            },		
		    is_benificiary : {
				   required: true,
            },	
            is_past	: {
				   required: true,
            },
            is_existing : {
				   required: true,
            },	
            is_rec	:{
				required: true,
			},	
		
		},
		messages: {
			organisation_three: {
                required: "This field is required.",
            },
			organisation_eighty: {
                required: "This field is required.",
            },
			organisation_csr1: {
                required: "This field is required.",
            },
			comments_12: {
                required: "Details/Comments on the above",
            },
			
			is_review_radion1: {
                required: "Is review is required.",
            },
			is_review_radion: {
                required: "Is review is required.",
            },
			
			is_prior: {
                required: "Prior is required.",
            },
			
			is_reference : {
				   required: "reference is required.",
			},
			is_leadership  : {
				   required: "Leadership is required.",
			},
			is_recognition: {
				   required: "Recognition is required.",
			},
			is_linkage : {
				   required: "Linkage is required.",
			},
			is_management : {
				   required: "Management & Capability is required.",
			},
			is_geographical : {
				   required: "Geographical Reach is required.",
			},
			 is_benificiary : {
				   required: "Beneficiary reach is required.",
			},
			is_past: {
				   required: "Past Experience is required.",
			},
			is_existing : {
				required: "Existing Presence is required.",
			},
						
	         is_rec:{
				required: "Recommendation is required",
			},
		
		},
		
		errorPlacement: function(error, element) {
            if (element.hasClass('organisation_three')) {
				error.insertAfter(element.closest('div.form-group').find('.organisation_three_error'));
            } 
			else if (element.hasClass('organisation_eighty')) {
				error.insertAfter(element.closest('div.form-group').find('.organisation_eighty_error'));
            } 
			else if (element.hasClass('organisation_csr1')) {
				error.insertAfter(element.closest('div.form-group').find('.organisation_csr1_error'));
            } 
			
			else if (element.hasClass('is_review_radion')) {
				error.insertAfter(element.closest('div.form-group').find('.is_review_radion_error'));
            }
			else if (element.hasClass('is_valid_tax_exemption')) {
				error.insertAfter(element.closest('div.form-group').find('.valid_tax_exemption'));
            }
			else if (element.hasClass('is_prior')) {
				error.insertAfter(element.closest('div.form-group').find('.is_prior_error'));
            }else if (element.hasClass('is_valid_tax_exemption')) {
				error.insertAfter(element.closest('div.form-group').find('.valid_tax_exemption'));
			}
            else if (element.hasClass('is_reference')) {
				error.insertAfter(element.closest('div.form-group').find('.is_reference_error'));
            }else if (element.hasClass('is_valid_tax_exemption')) {
				error.insertAfter(element.closest('div.form-group').find('.valid_tax_exemption'));
			}
			else if (element.hasClass('is_leadership')) {
				error.insertAfter(element.closest('div.form-group').find('.is_leadership_error'));
            }else if (element.hasClass('is_valid_tax_exemption')) {
				error.insertAfter(element.closest('div.form-group').find('.valid_tax_exemption'));
			}
            else if (element.hasClass('is_recognition')) {
				error.insertAfter(element.closest('div.form-group').find('.is_recognition_error'));
            }else if (element.hasClass('is_valid_tax_exemption')) {
				error.insertAfter(element.closest('div.form-group').find('.valid_tax_exemption'));
            }
			 else if (element.hasClass('is_linkage')) {
				error.insertAfter(element.closest('div.form-group').find('.is_linkage_error'));
            }else if (element.hasClass('is_valid_tax_exemption')) {
				error.insertAfter(element.closest('div.form-group').find('.valid_tax_exemption'));
            }
			 else if (element.hasClass('is_management')) {
				error.insertAfter(element.closest('div.form-group').find('.is_management_error'));
            }else if (element.hasClass('is_valid_tax_exemption')) {
				error.insertAfter(element.closest('div.form-group').find('.valid_tax_exemption'));
            }
			 else if (element.hasClass('is_geographical')) {
				error.insertAfter(element.closest('div.form-group').find('.is_geographical_error'));
            }else if (element.hasClass('is_valid_tax_exemption')) {
				error.insertAfter(element.closest('div.form-group').find('.valid_tax_exemption'));
            }
			 else if (element.hasClass('is_benificiary')) {
				error.insertAfter(element.closest('div.form-group').find('.is_benificiary_error'));
            }else if (element.hasClass('is_valid_tax_exemption')) {
				error.insertAfter(element.closest('div.form-group').find('.valid_tax_exemption'));
            }
			 else if (element.hasClass('is_past')) {
				error.insertAfter(element.closest('div.form-group').find('.is_past_error'));
            }else if (element.hasClass('is_valid_tax_exemption')) {
				error.insertAfter(element.closest('div.form-group').find('.valid_tax_exemption'));
            }
			 
			 else if (element.hasClass('is_existing')) {
				error.insertAfter(element.closest('div.form-group').find('.is_existing_error'));
            }else if (element.hasClass('is_valid_tax_exemption')) {
				error.insertAfter(element.closest('div.form-group').find('.valid_tax_exemption'));
            }
			
			else if (element.hasClass('is_rec')) {
				error.insertAfter(element.closest('div.form-group').find('.is_rec_error'));
            }else if (element.hasClass('is_valid_tax_exemption')) {
				error.insertAfter(element.closest('div.form-group').find('.valid_tax_exemption'));
            }
			 
	  
            else{	
				error.insertAfter(element);
			}

         },

	  
		
		submitHandler: function (form) {
			var org_task_id=$('#org_task_id').val();
			var org_task_list_id=$('#org_task_list_id').val();
			var org_id=$('#org_id').val();
			var ngo_id = $('#ngo_id').val();
			var prop_id=$('#prop_id').val();
			var superngo_id=$('#superngo_id').val();
			var org_staff_id=$('#org_staff_id').val();
			var additional_json = [];	
			var is_review_radion=$('input[name="is_review_radion1"]:radio:checked').val();
			if(is_review_radion=='Yes'){
		
				var is_prior=$('input[name="is_prior"]:radio:checked').val();
					if(is_prior){}else{is_prior='';}
				var is_reference=$('input[name="is_reference"]:radio:checked').val();
					if(is_reference){}else{is_reference='';}
				var is_leadership =$('input[name="is_leadership"]:radio:checked').val();
					if(is_leadership){}else{is_leadership='';}
				var is_recognition=$('input[name="is_recognition"]:radio:checked').val();
					if(is_recognition){}else{is_recognition='';}
				var is_linkage=$('input[name="is_linkage"]:radio:checked').val();
					if(is_linkage){}else{is_linkage='';}
				var is_management=$('input[name="is_management"]:radio:checked').val();
					if(is_management){}else{is_management='';}
				var is_geographical=$('input[name="is_geographical"]:radio:checked').val();
					if(is_geographical){}else{is_geographical='';}
				var is_benificiary=$('input[name="is_benificiary"]:radio:checked').val();
					if(is_benificiary){}else{is_benificiary='';}
				var is_past=$('input[name="is_past"]:radio:checked').val();
					if(is_past){}else{is_past='';}
				var is_existing=$('input[name="is_existing"]:radio:checked').val();
					if(is_existing){}else{is_existing='';}
				var is_rec =$('input[name="is_rec"]:radio:checked').val();
					if(is_rec){}else{is_rec='';}
					
				var organisation_three=$('input[name="organisation_three"]:radio:checked').val();
					if(organisation_three){}else{organisation_three='';}
				var organisation_eighty=$('input[name="organisation_eighty"]:radio:checked').val();
					if(organisation_eighty){}else{organisation_eighty='';}
				var organisation_csr1=$('input[name="organisation_csr1"]:radio:checked').val();
					if(organisation_csr1){}else{organisation_csr1='';}	
					
				
			
				var csr_file_value1 = $('.cycle_file_upload1').val();
				if(csr_file_value1){}else{csr_file_value1='';}
				var csr_file_value2 = $('.cycle_file_upload2').val();
					if(csr_file_value2){}else{csr_file_value2='';}
				var csr_file_value3 = $('.cycle_file_upload3').val();	
					if(csr_file_value3){}else{csr_file_value3='';}
					
				var csr_file_value_actual1 = $('.actual_disp1').val();
					if(csr_file_value_actual1){}else{csr_file_value_actual1='';}
				var csr_file_value_actual2 = $('.actual_disp2').val();
					if(csr_file_value_actual2){}else{csr_file_value_actual2='';}
				var csr_file_value_actual3 = $('.actual_disp3').val();
					if(csr_file_value_actual3){}else{csr_file_value_actual3='';}

						
				//$.blockUI()
				var comments_1 = $('#comments_1').val();
				var comments_2 = $('#comments_2').val();
				var comments_3 = $('#comments_3').val();
				var comments_4 = $('#comments_4').val();
				var comments_5 = $('#comments_5').val();
				var comments_6 = $('#comments_6').val();
				var comments_7 = $('#comments_7').val();
				var comments_8 = $('#comments_8').val();
				var comments_9 = $('#comments_9').val();
				var comments_10 = $('#comments_10').val();
				var comments_11 = $('#comments_11').val();
				var comments_12 = $('#comments_12').val();
				
				
				additional_json.push({
					'comments_1':comments_1,
					'comments_2':comments_2,
					'comments_3':comments_3,
					'comments_4':comments_4,
					'comments_5':comments_5,
					'comments_6':comments_6,
					'comments_7':comments_7,
					'comments_8':comments_8,
					'comments_9':comments_9,
					'comments_10':comments_10,
					'comments_11':comments_11,
					'comments_12':comments_12,
					
					'is_review_radion':is_review_radion,
					
					'is_prior':is_prior,
					'is_reference':is_reference,
					'is_leadership':is_leadership,
					'is_recognition':is_recognition,
					'is_linkage':is_linkage,
					'is_management':is_management,
					'is_geographical':is_geographical,
					'is_benificiary':is_benificiary,
					'is_past':is_past,
					'is_existing':is_existing,
					'is_rec':is_rec,
					
					'organisation_three':organisation_three,
					'organisation_eighty':organisation_eighty,
					'organisation_csr1':organisation_csr1,
					
					
					'csr_file_value1':csr_file_value1,
					'csr_file_value2':csr_file_value2,
					'csr_file_value3':csr_file_value3,
					
					'csr_file_value_actual1':csr_file_value_actual1,
					'csr_file_value_actual2':csr_file_value_actual2,
					'csr_file_value_actual3':csr_file_value_actual3,

				});
			}else{
				var comments_no = $('#comments_no').val();
				additional_json.push({
					'is_review_radion':is_review_radion,
					'comments_no':comments_no,
				});
			}   
		var due_date='approval';
			console.log(additional_json);
			$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
			
			$.post(APP_URL + 'organisation/tasks/change_status_onsubmit_by_ngo_desk_review', {
					additional_json:additional_json,
					org_task_id:org_task_id, 
					org_task_list_id:org_task_list_id,
					org_id:org_id,
					ngo_id:ngo_id,
					prop_id:prop_id,
					superngo_id:superngo_id,
					org_staff_id:org_staff_id,	
					due_date:due_date,	
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

});

</script>

