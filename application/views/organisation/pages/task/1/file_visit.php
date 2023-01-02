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
.actual_disp1{
	background-color: white !important;
    opacity: 1 !important;
    margin-top: 10px !important;
    border: none !important;
    color: #3c8dbc !important;
}
.approval_sheet{
	cursor:pointer;
}
.modal-backdrop.in {
    filter: alpha(opacity=50);
    opacity: -0.5;
    display: none;
}
.readonly_date{
	background-color: white !important;
}
.multii_1{
	border:none;
	color: #3c8dbc;
    background: white !important;
}
.file_dives{
	    width: 230px !important;
		min-height: 84px !important;
}
.input_description{font-weight: 400;}
	.multii_2{
		border:none;
		color: #3c8dbc;
		background-color: white !important;
	}
.margTop{margin-top: -18px !important;}

.select2-container--default .select2-selection--multiple ul{
   border: none;
}
.select2-container--default .select2-selection--multiple {
    background-color: white !important;
    cursor: text !important;
    padding-bottom: 5px !important;
    padding-right: 5px !important;
    position: relative !important;
    border-radius: 0 !important;
    border: 1px solid #d2d6de !important;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #dedddda8;
    border: 1px solid #a59b9b;
    border-radius: 4px;
    box-sizing: border-box;
    display: inline-block;
    margin-left: 4px;
    margin-top: 4px;
    padding: 1px;
    padding-left: 20px;
    position: relative;
    max-width: 100%;
    overflow: hidden;
    text-overflow: ellipsis;
    vertical-align: bottom;
    white-space: nowrap;
    color: #403d3d;
    font-weight: 600;
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
		$additional_json = '';
		
		
		$comments_1 ='';
		$comments_2 ='';
		$comments_3 ='';
		$comments_4 ='';
		$overall_summary_of_visit ='';
		$donor_dropdown_text='';
		//$donor_dropdown_id='';
			
		if(isset($new_focal_point_data)){
			if($new_focal_point_data){
				foreach($new_focal_point_data as $val){
					
					//var_dump($val);
					$user_type=$val['user_type'];
					if($user_type=='field'){
						$staff_id=$val['staff_id'];
						//var_dump($staff_id);
						$donor_dropdown_id=$staff_id;
						
					}
				}
			}
		}else{
			$donor_dropdown_id='';
			
		}
		
		//$donor_dropdown_id=$org_staff_id;
		
		$visit_date='';
		$duration_visit='';
		$registration_detail='';
		$recommended='';
		$csr_file_value1='';
		$csr_file_value_actual1='';
		$person_list='';
		$location_name_list='';
		
		$multiple_img_upload2='';
		
		$multi_focal_point_id='';
		
		if(isset($data_value[0]['additional_json'])){
			$additional_json = json_decode($data_value[0]['additional_json']);
			//var_dump($additional_json);
				
						
			if(isset($additional_json[0]->donor_dropdown_text)){
				$donor_dropdown_text = $additional_json[0]->donor_dropdown_text;
			}
			if(isset($additional_json[0]->multi_focal_point_id)){
				$multi_focal_point_id = $additional_json[0]->multi_focal_point_id;
				
				$multi_focal_point_id=json_encode($multi_focal_point_id);
			///var_dump($multi_focal_point_id);
			}
			if(isset($additional_json[0]->donor_dropdown_id)){
				$donor_dropdown_id = $additional_json[0]->donor_dropdown_id;
			}
			if(isset($additional_json[0]->visit_date)){
				$visit_date = $additional_json[0]->visit_date;
			}
			if(isset($additional_json[0]->registration_detail)){
				$registration_detail = $additional_json[0]->registration_detail;
			}
			if(isset($additional_json[0]->recommended)){
				$recommended = $additional_json[0]->recommended;
			}
			if(isset($additional_json[0]->comments_my_reject_yes2)){
				$comments_my_reject_yes2 = $additional_json[0]->comments_my_reject_yes2;
			}
			if(isset($additional_json[0]->duration_visit)){
				$duration_visit = $additional_json[0]->duration_visit;
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
			if(isset($additional_json[0]->overall_summary_of_visit)){
				$overall_summary_of_visit = $additional_json[0]->overall_summary_of_visit;
			}
			
			if(isset($additional_json[0]->csr_file_value1)){
				$csr_file_value1 = $additional_json[0]->csr_file_value1;
			}
			if(isset($additional_json[0]->csr_file_value_actual1)){
				$csr_file_value_actual1 = $additional_json[0]->csr_file_value_actual1;
			}
			
			if(isset($additional_json[0]->person_list)){
				$person_list = $additional_json[0]->person_list;
			}
			if(isset($additional_json[0]->location_name_list)){
				$location_name_list = $additional_json[0]->location_name_list;
				//var_dump($location_name_list);
			}
			if(isset($additional_json[0]->multiple_img_upload2)){
				$multiple_img_upload2 = $additional_json[0]->multiple_img_upload2;
				//var_dump($multiple_img_upload2);
			}
			
		}else{
			$overall_summary_of_visit='';
			$comments_1 ='';
			$comments_2 ='';
			$comments_3 ='';
			$comments_4 ='';
			$donor_dropdown_text='';
			//$donor_dropdown_id=$org_staff_id;
			$visit_date='';
			$duration_visit='';
			$registration_detail='';
			$recommended='';
			
			$person_list='';
			$location_name_list='';
			
			$csr_file_value1='';
			$csr_file_value_actual1='';
			$multiple_img_upload2='';
			
			$multi_focal_point_id='';
		}
	}else{
		$multi_focal_point_id ='';
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
				
		
		$comments_1 ='';
		$comments_2 ='';
		$comments_3 ='';
		$comments_4 ='';
		$overall_summary_of_visit ='';
		$donor_dropdown_text='';
		$donor_dropdown_id='';
		
		$visit_date='';
		$duration_visit='';
		$registration_detail='';
		$recommended='';
		
		$person_list='';
		$location_name_list='';
		
		$csr_file_value1='';
		$csr_file_value_actual1='';
		$multiple_img_upload2='';
	}
?>
<?php
$data['sub_folder_name']="";
$data['image_cat']="entity";
$this->load->view('file_upload',$data);

$data['sub_folder_name']="";
$data['image_cat']="entity";
$this->load->view('file_with_input_upload',$data); 


?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
									$sql3="SELECT additional_json FROM `org_tasks` WHERE org_id=$org_id AND prop_id=$prop_id AND org_task_list_id=3";
									$task_data_fetch = $this->db->query($sql3)->result_array();
									if($task_data_fetch){	
										$data['proposal_desk_review_data']=$task_data_fetch[0]['additional_json'];
										if($data['proposal_desk_review_data']!=''){
											$this->load->view('organisation/pages/task/1/view_proposal_desk_review',$data);
										}
									}
								}	
								if($prop_data){
									$this->load->view('organisation/pages/view_proposal_detail_page/view_proposal_right_1',$data);
								}
								
								$this->load->view('organisation/pages/task/ngo_information_collapse'); ?>
						</div>
						<div class="col-lg-6">
							<?php $this->load->view('organisation/pages/task/Task_details_collapse'); ?>
									<?php 
									$additional_json='';
									$additional_json1='';
									$comments_11='';
									$comments_approve='';
									
									if($data['proposal_desk_review_data']){
										$additional_json=json_decode($data['proposal_desk_review_data']);
										if(isset($additional_json[0]->comments_11)){
											$comments_11 = $additional_json[0]->comments_11;
											//var_dump($comments_11);
										}else{
											$comments_11='';
										}
										
									$sql1="SELECT additional_json FROM `org_tasks` WHERE org_id=$org_id AND prop_id=$prop_id AND org_task_list_id=4 AND org_task_label='Begin Proposal Processing'";
										$begin_prop_data = $this->db->query($sql1)->result_array();
									if($begin_prop_data){
										$additional_json1=json_decode($begin_prop_data[0]['additional_json']);
										if(isset($additional_json1[0]->comments_approve)){
											$comments_approve = $additional_json1[0]->comments_approve;
											//var_dump($comments_approve);
										}else{
											$comments_approve='';
										}
									}
									
									?>
									
									
								<div class="box box-primary ">
									<div class="box-header with-border" data-widget="collapse">
										<i class="fa btn btn-box-tool fa_plus fa-minus"></i>
										<h3 class="box-title">Key/Special Questions</h3>
									</div>
									
									<div class="box-body">
										<div class="form-group row">
											<div  class="col-md-12">
												<label for="title">Key Questions from Desk Reviewer</label><br>
												<pre class="is_edit_hide"><?php if($comments_11)echo $comments_11;?></pre>
											</div>
										</div>
										<div class="form-group row">
											<div  class="col-md-12">
												<label for="title">Additional Questions to be asked</label><br>
												<pre class="is_edit_hide"><?php if($comments_approve)echo $comments_approve;?></pre>
											</div>
										</div>
											
											
											
										
										
									</div>
								</div>
									<?php }?>
							
							
							
							<div class="box box-primary ">
								<div class="box-header with-border " data-widget="collapse">
									<i class="fa btn btn-box-tool fa_plus fa-minus"></i>
									<h3 class="box-title"><?php echo $data_value[0]['org_task_label']; ?></h3>
								</div>
								<?php //var_dump($focal_point_data);?>
								<div class="box-body" >
									<form id="product" method="post" role="form">
										<div class="form-group ">
											<div>    
												<label >Actual field visit was done by<span class="required">*</span></label>
											</div>
											<div class="my_ngo_error"></div>
											<div>  
												<select name="my_ngo" class="form-control donor_dropdown js-example-basic-single" id="organisation_id" name="donor_dropdown" multiple="multiple">
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
																										
														<?php } if(isset($val['is_deleted'])){ 
															echo '<option disabled value="" > '.$val['role_name'].' </option>';
														}
													
													}}?>		
												</select>
											</div>
											<div id="focal_point_data_error " class="focal_point_data_error error display_none " style="font-weight :900;">Focal Point is required.</div>
										</div> 
										<div class="form-group row">
											<label for="startdate" class="col-md-12">Date of visit<span class="required">*</span></label>
											<div class="col-md-12"> 
												<input type="text" class="form-control date readonly_date visit_date" name="visit_date" placeholder="date" value="<?php echo $visit_date;?>" readonly>
												<div id="visit_date_error " class="visit_date_error error  display_none" style="font-weight :900;">Date is required.</div>
											</div>
										</div>
										<div class="form-group row">
											<label for="donor_details" class="col-md-12">Details of persons met<span class="required">*</span> </label>
										</div>
										<div id="CycleTextBoxContainer" class="mydata ">
											<?php if($person_list){
													$i=0;
													if($person_list and $person_list>0){
														foreach($person_list as $row){
															$i++;
												?>
											<div class="form-group row">
												<div class="remove-added-para " mytime="">
													<div class="col-md-6"> 
														<label>Name</label>
														<input type="text" class="form-control person_name " name="person_name" placeholder="Enter name here" value="<?php echo $row->person_name ?>" >
													</div>
													<div class="<?php if($i==1){echo 'col-md-6';}else{ echo 'col-md-5';} ?>">
														<label>Designation</label>
														<input type="text" class="form-control person_dege"  name="person_dege" placeholder="Enter designation here" value="<?php echo $row->person_dege;?>">
													</div>
													<?php if($i!=1){?>
													<div class="col-md-1 " style="margin-left: -11px; margin-top: 27px;">
														<button class="btn btn-warning CycleRemovepara btn-sm">&times;</button>
													</div>
													<?php }?>
												</div>
											</div>
											<?php }}}else{?>
											<div class="form-group row">
												<div class="remove-added-para " mytime="">
													<div class="col-md-6"> 
														<label>Name</label>
														<input type="text" class="form-control person_name " name="person_name" placeholder="Enter name here" value="" >
													</div>
													<div class="col-md-6 ">
														<label>Designation</label>
														<input type="text" class="form-control person_dege"  name="person_dege" placeholder="Enter designation here" value="">
													</div>
												</div>
											</div>
											<?php }?>
										</div>	
										<div style="display:none">
											<div id ="Cycle_append_html" >
												<div class="form-group row">
													<div class="remove-added-para " mytime="">
														<div class="col-md-6"> 
															<label>Name</label>
															<input type="text" class="form-control person_name" name="person_name" placeholder="Enter name here" value="" >
														</div>
														<div class="col-md-5 ">
															<label>Designation</label>
															<input type="text" class="form-control person_dege"  name="person_dege" placeholder="Enter designation here" value="">
														</div>
														<div class="col-md-1 " style="margin-left: -11px; margin-top: 27px;">
															<button class="btn btn-warning CycleRemovepara btn-sm">&times;</button>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="disp_person_length_error  error display_none"><label>Atleast one required.</label></div>
											<div class="disp_person_error  error display_none"><label>Please provide all the values.</label></div>
											<!--<button type="button" id="CycleAddParabtn" class="btn btn-success submit_category_data">+ Add another Person</button>-->
										<button type="button" id="CycleAddParabtn" class="btn btn-success"><i class="fa fa-plus"></i></button><label style="margin-left:5px;">Add another Person</label>
										</div>	
										<div class="form-group row ">
											<div >
												<label for="was_review" class="col-md-12 desk-review" id="was_review">Registration details and certificates verified?<span class="required">*</span></label>
											</div>
											<div class="col-md-12">
												<label style="font-weight: 400;">
													<input type="radio" class="registration_detail" name="registration_detail" value="Yes" <?php if($registration_detail == 'Yes'){echo 'checked';}?>>&nbsp;
													<span>Yes</span> 
												</label>
												<label style="font-weight: 400;">
													<input type="radio"  class="registration_detail"  name="registration_detail" value="No" <?php if($registration_detail == 'No'){echo 'checked';}?> >
													<span>No</span> 
												</label> 
												<div class=" registration_detail_radion_error error display_none"><label>Please select any one</label></div>
											</div>
										</div>
										<label  for="donor_details" class=" row col-md-12">Locations visited<span class="required">*</span></label>
										<div id="CycleTextBoxContainer1" class="mydata ">	
											<?php 
												if($location_name_list){
													$i=0;
													foreach($location_name_list as $val){
														$i++;
											?>	
												<div class="form-group row">
													<div class="remove-added-para " mytime="">
														<div class="<?php if($i==1){echo 'col-md-12';}else{ echo 'col-md-11';} ?>"> 
															<input type="text" class="form-control location_name" name="location_name" placeholder="Enter location here" value="<?php echo $val->location_name?>" >
														</div>
														<?php if($i!=1){?>
														<div class="col-md-1" style="margin-left: -14px;" >
															<button class="btn btn-warning CycleRemovepara1 ">&times;</button>
														</div>
														<?php }?>
													</div>
												</div>
											<?php }}else{?>
												<div class="form-group row">
													<div class="remove-added-para " mytime="">
														<div class="col-md-12"> 
															<input type="text" class="form-control location_name" name="location_name" placeholder="Enter location here" value="" >
														</div>
													</div>
												</div>
											<?php }?>
										</div>	
										<div style="display:none">
											<div id ="Cycle_append_html1" >
												<div class="form-group row">
													<div class="remove-added-para " mytime="">
														<div class="col-md-11"> 
															<input type="text" class="form-control location_name" name="location_name" placeholder="Enter Location here" value="" >
														</div>
														<div class="col-md-1" style="margin-left: -14px;" >
															<button class="btn btn-warning CycleRemovepara1 ">&times;</button>
														</div>
													</div>
												</div>
											</div>
										</div>
							
										<div class="form-group">
											<div class="location_name_length_error  error display_none"><label>Atleast one required.</label></div>
											<div class="location_name_error  error  display_none"><label>Please provide all the values.</label></div>
											<!--<button type="button" id="CycleAddParabtn1" class="btn btn-success">+ Add another Location</button>-->
											<button type="button" id="CycleAddParabtn1" class="btn btn-success"><i class="fa fa-plus"></i></button><label style="margin-left:5px;">Add another Location</label>
										</div>	
						
										<div class="form-group  ">
											<div> 
												<div>
												   <label>Duration of visit<span class="required">*</span></label><br>
												   <label class="input_description">Enter for how long you visited each location</label>
												</div>
												<input type="text" class="form-control duration_visit" name="duration_visit" placeholder="Enter duration here" value="<?php echo $duration_visit;?>" >
											</div>
										</div>

										<div class="form-group row ">
											<div >
												<label for="was_review" class="col-md-12 desk-review" id="was_review">Do you recommend the application?<span class="required">*</span>
												</label>
											</div>
									 
											<div class="col-md-12">
												<label style="font-weight: 400;">
													<input type="radio" class="recommended" name="recommended" value="Yes"<?php if($recommended == 'Yes'){echo 'checked';}?>>&nbsp;
													<span>Yes</span> 
												</label>
												<label style="font-weight: 400;">
													<input type="radio"  class="recommended"  name="recommended" value="No" <?php if($recommended == 'No'){echo 'checked';}?> >
													<span>No</span> 
												</label> 
												<div class=" was_review_radion_error error display_none"><label>Please select any one</label></div>
											</div>
										</div>
                                        
										<div class="form-group row was_review_radion_no">
											<div class="col-md-12"> 
												<label>Overall summary of visit</label><span class="required">*</span><br>
												<label class="input_description">This will be automatically entered into the approval sheet</label>
												<textarea id="overall_summary_of_visit" name="overall_summary_of_visit" class="form-control"  rows="3" placeholder="Enter Summary Here"><?php echo $overall_summary_of_visit;?></textarea>
											</div>
										</div>
									
										<div class="display_none">
										<div class="form-group ">
											<div> 
												<div>
												   <label>Comments on the organisation</label>
												</div>
												<div class="my_internal_error"></div>
												<textarea id="comments_1" name="comments_1"  class="form-control"  rows="5" placeholder="Enter Comments here"><?php echo $comments_1;?></textarea>
											</div>
										</div>
						
										<div class="form-group ">
											<div> 
												<div>
												   <label>Comments on stakeholders/community/beneficiaries</label>
												</div>
												<div class="my_internal_error"></div>
												<textarea id="comments_2" name="comments_2"  class="form-control"  rows="5" placeholder="Enter Comments here"><?php echo $comments_2;?></textarea>
											</div>
										</div>
						
										<div class="form-group ">
											<div> 
												<div>
												   <label>Comments on the project</label>
												</div>
												<div class="my_internal_error"></div>
												<textarea id="comments_3" name="comments_3"  class="form-control"  rows="5" placeholder="Enter Comments here"><?php echo $comments_3;?></textarea>
											</div>
										</div>
										
										<div class="form-group ">
											<div> 
												<div>
												   <label>Overall summary of visit</label>
												</div>
												<div class="my_internal_error"></div>
												<textarea id="comments_4" name="comments_4"  class="form-control"  rows="5" placeholder="Enter Comments here"><?php echo $comments_4;?></textarea>
											</div>
										</div>
									</div>
												
										<div class="value_read">
											<div class="form-group row ">
												<label for="comments" class="col-md-12">Upload scanned copy of field visit report<span class="required">*</span></label>
												<div class="col-md-12">
													<button type="button" id="comman_file_upload_class" name="comman_file_upload_class" image_upload_desc="" upload_type="file" file_count="single" img_primary="no" file_prev_class="cycle_file_upload_selected" file_input_id="cycle_file_upload1" class="btn btn-primary btn-lg comman_file_upload_class" data-toggle="modal" data-target="#browseFile"><i class="fa fa-upload"></i> </button>
													<label id="cycle_file_upload_error1" class="required display_none cycle_file_upload_error1">Your file must be less than 10MB in size.</label>
													<div class="cycle_file_upload1_error error display_none"><label>scanned copy of field is required</label></div>
													<div >
														<div class="">
															<input class="form-control cycle_file_upload1" id="cycle_file_upload1" name="cycle_file_upload1" type="hidden" value="<?php if($csr_file_value1){ echo $csr_file_value1;}?>">
														</div>
														<span class="registration_80g_valid" ></span>
														<div class="image-preview inline_block cycle_file_upload_selected">
															<input readonly class="form-control is_edit_data  actual_disp1" type="text" id="cycle_file_upload_actual" <?php if(!$csr_file_value_actual1){ echo 'display_none' ;} ?> value="<?php if($csr_file_value_actual1){ echo $csr_file_value_actual1;}?>">
														</div>
													</div>
												</div>
											</div>
										</div>
											
										<div class="form-group">
											<label for="file_upload_related">Photographs from the visit</label></br>
											<label for="file_upload_multi" class="input_description">You can upload multiple files here</label></br>
											<button type="button"  name="comman_file_upload_class1" id="comman_file_upload_class1" image_upload_desc="File must be less than 10MB in size.We prefer if you can provide .pdf versions of your document." upload_type="file" file_count="multiple" img_primary="no" file_prev_class="other_proposal_related_documents" file_input_id="registration_80g_certificate" class="btn btn-primary btn-lg comman_file_upload_class1" data-toggle="modal" data-target="#browseFile1"><i class="fa fa-upload"></i> </button>
											
											<div class="row">
												<div class="image-preview inline_block other_proposal_related_documents">
													<?php 
														if($multiple_img_upload2){
															foreach($multiple_img_upload2 as $details){
																//var_dump($details);
													?>
																<div class="file_dives col-sm-3" addr="<?php echo $details->file_dives ?>">
																	<div class="input" style="padding:4%;">
																		<input readonly="" type="text" class="form-control multii_2" value="<?php echo $details->file_dives_actual ?>" >
																		<input type="text" style="margin-top:3%;" class="form-control file_description " value="<?php echo $details->file_description;?>" placeholder="File name/Description">
																		<button type="button" class="btn btn-danger img_remover1" style="margin-top:2%;color:white;border-radius:50%;">x</button>
																	</div>
																</div>
													<?php 
															}
														}
													?>
												</div>
											</div>
											<div id="other_proposal_related_documents_error" class="display_none">
												<label class="required">Atleast one file attachment is required.</label>
											</div>
											
											<div class="form-group  my_recommend_yes">
												<div> 
													<div>
														<label>Approval sheet available for download</label><br/>
														<a proposal_id="<?php echo $prop_id;?>" class="approval_sheet">Approval sheet</a>
														<div class="download_sheet1"></div>
													</div>
												</div>
										    </div>
											
											
											
										</div>
										
										<div class="form-group row ">
											<div class="col-lg-12 ">
												<div>&nbsp;</div>
												<div class="button " >
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
	
	$('body').on('click','.approval_sheet', function () {
		var proposal_id = $(this).attr('proposal_id');
		$.post(APP_URL + 'xls/generateXls',
			{proposal_id : proposal_id}, 
			function (response) {
            if (response.status == 200) {
				$('.download_sheet1').html("<a class='download_sheet' style='visibility:hidden' href='"+response.message+"'>"+response.message+"</a>");
                setTimeout( function(){					
				$(".download_sheet").trigger('click');
				}  , 1000 );
			} else {
                $('#headerMsg').html("<div class='alert alert-danger fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
				$("#headerMsg").fadeTo(1000, 500).slideUp(500, function(){
					$('#headerMsg').empty();
				});
			}
        }, 'json');		
	});
	
    $('body').on('click','.download_sheet', function () {
	    var href = $('.download_sheet').attr('href');
        window.location.href = href; 
	});

	$(".date").datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: 'yy-mm-dd',
			yearRange : 'c-75:c+75',
		});	
	$('.js-example-basic-single').select2();	
	$('body').on('click', '#CycleAddParabtn', function () {
		var content = $('#Cycle_append_html').html();
        $("#CycleTextBoxContainer").append(content); 
        // $(content).insertAfter( "#CycleTextBoxContainer" );    
    });
	
	$('body').on('click', '#CycleAddParabtn1', function () {
		var content = $('#Cycle_append_html1').html();
        $("#CycleTextBoxContainer1").append(content); 
        // $(content).insertAfter( "#CycleTextBoxContainer" );    
    });

 	$('body').on('click', '.CycleRemovepara', function () {
        $(this).parent().parent().parent().remove();
    }); 
	
	$('body').on('click', '.CycleRemovepara1', function () {
        $(this).parent().parent().parent().remove();
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


	$('body').on('click','#save', function () {
				
		var org_task_id=$('#org_task_id').val();
		var org_task_list_id=$('#org_task_list_id').val();
		var org_id=$('#org_id').val();
		var ngo_id=$('#ngo_id').val();
		var prop_id=$('#prop_id').val();
		var superngo_id=$('#superngo_id').val();
		var org_staff_id=$('#org_staff_id').val();
		
		var multi_focal_point = [];
		obj = $("#organisation_id").select2("data");
		console.log(obj);
		
		var multi_focal_point = [];
		var multi_focal_point_id = [];
		$(obj).each(function(key,val) {
			multi_focal_point.push(val['text']);
			
			if($.isNumeric(val['id'])){
				multi_focal_point_id.push(val['id']);
			}else{
				multi_focal_point_id.push('0');
			}
			
		});
	//	console.log("multi_focal_point");
	//	console.log(multi_focal_point);
	//	console.log(multi_focal_point_id);
		if(multi_focal_point.length==0){
			//$(".focal_point_data_error").removeClass('display_none');
		}else{
			//$(".focal_point_data_error").addClass('display_none');
		}
		
		
		
		
		$('#organisation_id').each(function(key,val){
			var donor_dropdown_text = $('option:selected').text();
			var donor_dropdown_id = $('option:selected').val();
			console.log(donor_dropdown_text);
			
			multi_focal_point.push({
					donor_dropdown_text : donor_dropdown_text,
					donor_dropdown_id : donor_dropdown_id,
				});
		
		});
		
		//console.log("multi_focal_point");
		//console.log(multi_focal_point);
	
		
		
		var visit_date = $('.visit_date').val();
		var duration_visit = $('.duration_visit').val();
		var comments_1 = $('#comments_1').val();
		var comments_2 = $('#comments_2').val();
		var comments_3 = $('#comments_3').val();
		var comments_4 = $('#comments_4').val();
		var overall_summary_of_visit = $('#overall_summary_of_visit').val();
		
		var registration_detail=$('input[name="registration_detail"]:radio:checked').val();
			if(registration_detail){}else{registration_detail='';}
			
		var recommended=$('input[name="recommended"]:radio:checked').val();
			if(recommended){}else{recommended='';}
		
		var additional_json = [];	
		var person_list = [];
		var location_name_list = [];
		
		
		$('#CycleTextBoxContainer .remove-added-para').each(function(key,val){
			var person_name = $(this).find('.person_name').val();
			var person_dege = $(this).find('.person_dege').val();
			console.log(person_name);
			console.log(person_dege);
					
				person_list.push({
					person_name : $(this).find('.person_name').val(),
					person_dege : $(this).find('.person_dege').val(),
				});
			
		});
			  
		console.log(person_list);
		
		$('#CycleTextBoxContainer1 .remove-added-para').each(function(key,val){
			var location_name = $(this).find('.location_name').val();
			console.log(location_name);
					
				location_name_list.push({
					location_name : $(this).find('.location_name').val(),
					
				});
			
		});
			  
		console.log(location_name_list);
		var csr_file_value1 = $('.cycle_file_upload1').val();
		if(csr_file_value1){}else{csr_file_value1='';}
		
		var csr_file_value_actual1 = $('.actual_disp1').val();
		if(csr_file_value_actual1){}else{csr_file_value_actual1='';}
				
		var multiple_img_upload2 = [];
		$('.other_proposal_related_documents .file_dives').each(function(key, val) {
			multiple_img_upload2.push({
				file_dives: $(this).attr("addr"),
				file_dives_actual: $(this).find('.multii_2').val(),
				file_description: $(this).find('.file_description').val(),
			});
		});
       //  console.log("dsfdfsdf");
        // console.log(multiple_img_upload2);

		additional_json.push({
			
			'person_list':person_list,
			'location_name_list':location_name_list,
			multi_focal_point:multi_focal_point,
			multi_focal_point_id:multi_focal_point_id,
			//'donor_dropdown_text':donor_dropdown_text,
			//'donor_dropdown_id':donor_dropdown_id,
			'visit_date':visit_date,
			'duration_visit':duration_visit,
			'registration_detail':registration_detail,
			'recommended':recommended,
			
			'comments_1':comments_1,
			'comments_2':comments_2,
			'comments_3':comments_3,
			'comments_4':comments_4,
			'overall_summary_of_visit':overall_summary_of_visit,
			'csr_file_value1':csr_file_value1,
			'csr_file_value_actual1':csr_file_value_actual1,
			multiple_img_upload2: multiple_img_upload2,
		});
		
	
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
			visit_date: {
                required: true,
            },	
			
			duration_visit : {
			   required: true,
			},	
			overall_summary_of_visit : {
			   required: true,
			},
			/*comments_1 : {
			   required: true,
			},
			comments_2 : {  

			   required: true,
			},
			comments_3 : {
			   required: true,
			},
			comments_4 : {  

			   required: true,
			},*/
			csr_file_value1 : {  

			   required: true,
			},
			
			
		},
		messages: {
			visit_date: {
                required: "visit date is required.",
            },
			
			duration_visit : {
			   required: "Duration of visit is required.",
			},
			overall_summary_of_visit : {
			   required: "Overal Summary of visit is required.",
			},
			/*comments_1  : {
			   required: "Comments on the organisation is required.",
			},
			comments_2 : {
			   required: "Comments on stakeholders is required.",
			},
			comments_3  : {
			   required: "Comments on the project  is required.",
			},
			comments_4 : {
			   required: "Overall summary of visit is required.",
			},*/
			csr_file_value1 : {
			   required: "Upload scanned copy of field visit report is required.",
			},
		
			
		},
		
		
		submitHandler: function (form) {
			//$.blockUI()
		var is_error='no';
		var person_error='no';
		console.log('submit');
		var org_task_id=$('#org_task_id').val();
		var org_task_list_id=$('#org_task_list_id').val();
		var org_id=$('#org_id').val();
		var ngo_id=$('#ngo_id').val();
		var prop_id=$('#prop_id').val();
		var superngo_id=$('#superngo_id').val();
		var org_staff_id=$('#org_staff_id').val();
		
		
		var multi_focal_point = [];
		obj = $("#organisation_id").select2("data");
		console.log(obj);
		
		var multi_focal_point = [];
		var multi_focal_point_id = [];
		$(obj).each(function(key,val) {
			multi_focal_point.push(val['text']);
			
			if($.isNumeric(val['id'])){
				multi_focal_point_id.push(val['id']);
			}else{
				multi_focal_point_id.push('0');
			}
			
		});
		console.log("multi_focal_point");
		console.log(multi_focal_point);
		console.log(multi_focal_point_id);
		if(multi_focal_point.length==0){
			is_error='yes';
			$(".focal_point_data_error").removeClass('display_none');
		}else{
			$(".focal_point_data_error").addClass('display_none');
		}
		
		
		
		
		//var donor_dropdown_text = $('.donor_dropdown option:selected').text();
		//var donor_dropdown_id = $('.donor_dropdown').val();
		
		var visit_date = $('.visit_date').val();
		
		if(visit_date){
			 $(".visit_date_error").addClass('display_none');
		}else{
			is_error='yes';
			$(".visit_date_error").removeClass('display_none');
		}
		var duration_visit = $('.duration_visit').val();
		var comments_1 = $('#comments_1').val();
		var comments_2 = $('#comments_2').val();
		var comments_3 = $('#comments_3').val();
		var comments_4 = $('#comments_4').val();
		var overall_summary_of_visit = $('#overall_summary_of_visit').val();
		
		var registration_detail=$('input[name="registration_detail"]:radio:checked').val();
		
			if(registration_detail){
				 $(".registration_detail_radion_error").addClass('display_none');
			}else{
				is_error='yes';
				$(".registration_detail_radion_error").removeClass('display_none');
				
				}
			
		var recommended=$('input[name="recommended"]:radio:checked').val();
		
			if(recommended){
				 $(".was_review_radion_error").addClass('display_none');
			}else{
				is_error='yes';
				$(".was_review_radion_error").removeClass('display_none');
				
				}
		
		var additional_json = [];	
		var person_list = [];
		var location_name_list = [];
		
		var person_error='no';
		$('#CycleTextBoxContainer .remove-added-para').each(function(key,val){
			var person_error='no';
			var person_name = $(this).find('.person_name').val();
			var person_dege = $(this).find('.person_dege').val();
				console.log("person name");
				console.log(person_name);
			if(person_name){}else{
				person_error='yes';
			}
			if(person_dege){}else{
				person_error='yes';
			}
			
			if(person_error =='yes'){
					is_error='yes';
				$(".disp_person_length_error").addClass('display_none');
				$(".disp_person_error").removeClass('display_none');
			}else{
				 $(".disp_person_error").addClass('display_none');
				
			}
			
			console.log(person_error);
			console.log(person_name);
			console.log(person_dege);
				if(person_error=='no'){	
					person_list.push({
						person_name : $(this).find('.person_name').val(),
						person_dege : $(this).find('.person_dege').val(),
					});
				}
			
		});
			  
		console.log("sdfsdf");
		var person_list_length=person_list.length;
		if(person_list_length==0){
				is_error='yes';
			$(".disp_person_error").addClass('display_none');
			$(".disp_person_length_error").removeClass('display_none');
		}else{
			$(".disp_person_length_error").addClass('display_none');
		}
		
		
		console.log(person_list);
		var is_location_error='no';
		$('#CycleTextBoxContainer1 .remove-added-para').each(function(key,val){
			var location_name = $(this).find('.location_name').val();
			console.log(location_name);
					
				if(location_name){
					 $(".location_name_error").addClass('display_none');
				}else{
					is_error='yes';
					is_location_error='yes';
					$(".location_name_length_error").addClass('display_none');
					$(".location_name_error").removeClass('display_none');
				}
				if(is_location_error=='no'){
					location_name_list.push({
						location_name : $(this).find('.location_name').val(),
						
					});
				}
			
		});
		
		var location_name_list_lenght=location_name_list.length;
		if(location_name_list_lenght==0){
				is_error='yes';
			$(".location_name_error").addClass('display_none');	
			$(".location_name_length_error").removeClass('display_none');
		}else{
			$(".location_name_length_error").addClass('display_none');
		}	

			
		console.log(location_name_list);
		
		var csr_file_value1 = $('.cycle_file_upload1').val();
		if(csr_file_value1){}else{csr_file_value1='';}
			
		var csr_file_value_actual1 = $('.actual_disp1').val();
		if(csr_file_value_actual1){}else{csr_file_value_actual1='';}
		
		if(csr_file_value1){
					 $(".cycle_file_upload1_error").addClass('display_none');
		}else{
			is_error='yes';
			$(".cycle_file_upload1_error").removeClass('display_none');
		}
		
		
		var multiple_img_upload2 = [];
		$('.other_proposal_related_documents .file_dives').each(function(key, val) {
			multiple_img_upload2.push({
				file_dives: $(this).attr("addr"),
				file_dives_actual: $(this).find('.multii_2').val(),
				file_description: $(this).find('.file_description').val(),
			});
		});
         console.log("dsfdfsdf");
         console.log(multiple_img_upload2);
		
		additional_json.push({
			
			'person_list':person_list,
			'location_name_list':location_name_list,
			
			'multi_focal_point':multi_focal_point,
			'multi_focal_point_id':multi_focal_point_id,
			
			//'donor_dropdown_text':donor_dropdown_text,
			//'donor_dropdown_id':donor_dropdown_id,
			
			'visit_date':visit_date,
			'duration_visit':duration_visit,
			'registration_detail':registration_detail,
			'recommended':recommended,
			
			'comments_1':comments_1,
			'comments_2':comments_2,
			'comments_3':comments_3,
			'comments_4':comments_4,
			'overall_summary_of_visit':overall_summary_of_visit,
			'csr_file_value1':csr_file_value1,
			'csr_file_value_actual1':csr_file_value_actual1,
			multiple_img_upload2: multiple_img_upload2,
		});
		
	
		console.log(additional_json);
		if(is_error=='no'){
			$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
			$.post(APP_URL + 'organisation/tasks/change_status_onsubmit_by_field_visit', {
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
	
	
	
		var org_task_id = $('#org_task_id').val();
		$.post(APP_URL + 'organisation/tasks/get_multi_focal_point_id', {
			org_task_id:org_task_id,
		},
		function(response) {
			$('#head_ngo_review').empty();
			if (response.status == 200) {
				var message = response.message;
				//	ngo_id = response.ngo_id;
				if(response.multi_focal_point_id){
					/*$(".js-example-basic-single").select2({
						data:response.multi_focal_point_id,
						width: '100%',
						tags: true,
						placeholder: "Select Focal Point",
						multiple: true
					});*/
					
					//console.log(response.admin_city);
					console.log(response.multi_focal_point_id);
				
					(response.multi_focal_point_id).forEach(function(e){
						console.log("e");
						console.log(e);
					});
					
					$(".js-example-basic-single").val(response.multi_focal_point_id).trigger("change");
				}/*(else{
					$(".js-example-basic-single").select2({
						data:response.multi_focal_point_id,
						width: '100%',
						tags: true,
						placeholder: "Select Focal Point",
						multiple: true
					});
				}*/
			} /*else {
				$('#head_ngo_review').html("<div class='alert alert-danger fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
				$("#head_ngo_review").fadeTo(2000, 500).slideUp(500, function() {
					$('#head_ngo_review').empty();
				});
			}*/
		}, 'json');
		/*$(".js-example-tags").select2({
			placeholder: "Select Cities",
			tags: true
		});*/
	
	
	
	
	
});
	</script>

	