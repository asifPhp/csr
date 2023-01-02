
<?php
$financial_years=$this->db->get_where('financial_years')->result();

if($entity_data){
	$defined_structure_decission_making=$entity_data['defined_structure_decission_making'];
	$upload_organogram=$entity_data['upload_organogram'];
	$upload_organogram_actual=$entity_data['upload_organogram_actual'];
	$entity_have_governing_board=$entity_data['entity_have_governing_board'];
	$detail_body_member=$entity_data['detail_body_member'];
	$number_of_employee=$entity_data['number_of_employee'];
	$number_of_employee_through_contractor=$entity_data['number_of_employee_through_contractor'];
	$number_parttime_employees=$entity_data['number_parttime_employees'];
	$governing_body_member_det= json_decode($entity_data['governing_body_member_det'] ,true);
	$renumeration_of_senior_leadership= json_decode($entity_data['renumeration_of_senior_leadership'] ,true);
	$full_time_staff_numbers= json_decode($entity_data['full_time_staff_numbers'] ,true);
	$part_time_staff_numbers= json_decode($entity_data['part_time_staff_numbers'] ,true);
	$vehicles_details= json_decode($entity_data['vehicles_details'] ,true);
	$foreign_travel_taken_by_staff= json_decode($entity_data['foreign_travel_taken_by_staff'] ,true);
	$entity_id=$entity_data['id'];
	$ngo_id=$entity_data['id'];
	$superngo_id=$entity_data['superngo_id'];
	$display_none='';
	$display_none_='display_none';
	$display_none1='';	
	$is_edit='';
	$is_add_edit='edit';
	$edit_title='<section class="content-header"><a href="'.base_url().'ngo/entity/edit?id='.$ngo_id.'" class="btn btn-default pull-right">Back</a>  <h1> Edit Entity </h1> </section>';
}else{
	$defined_structure_decission_making='';
	$upload_organogram='';
	$upload_organogram_actual='';
	$entity_have_governing_board='';
	$detail_body_member='';
	$number_of_employee='';
	$number_of_employee_through_contractor='';
	$number_parttime_employees='';
	$governing_body_member_det='';
	$renumeration_of_senior_leadership='';
	$full_time_staff_numbers='';
	$part_time_staff_numbers='';
	$vehicles_details='';
	$foreign_travel_taken_by_staff='';
	$entity_id='';
	$ngo_id='';
	$superngo_id='';
	$display_none='<!--';
	$display_none1='-->';
	$display_none_='';	
	$is_edit='display_none';
	$edit_title='';
	$is_add_edit='add';
}
?>
<style>
.display_upload_image_name{
	border: none;
    color: #3c8dbc;
    padding: 0;
    cursor: auto;	
}
.image-preview{
	margin-bottom: 1%;
    margin-top: 0;
    width: 100%;	
}
.input_description{font-weight: 400;}
</style>
<?php echo $display_none ?><div class="content-wrapper">
<?php echo $edit_title;?>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<input type="hidden" class="form-control" id="entity_id" name="entity_id" value="<?php echo $entity_id;?>">
				<input type="hidden" class="form-control" id="is_add_edit4" value='<?php echo $is_add_edit; ?>'>
				<div id="err_add_plan"></div><?php echo $display_none1 ?>	
				<?php //var_dump($entity_data)?>
				<?php //var_dump($governing_body_member_det)?>
				<div id="alert_danger_error"></div>
                <div role="tabpanel" class="tab-pane" id="page4">
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Staff & Budget Details</h3>
                    </div>
                    <div class="box-body">
                        <div class="row bs-wizard <?php echo $display_none_ ?>" style="border-bottom:0;">
                            <div class="col-xs-2 bs-wizard-step complete"><!-- active -->
                              <div class="text-center bs-wizard-stepnum">Step 1</div>
                              <div class="progress"><div class="progress-bar"></div></div>
                              <a href="#page1" role="tab" data-toggle="tab" class="bs-wizard-dot"></a>
                            </div>
                            <div class="col-xs-2 bs-wizard-step complete"><!-- active -->
                              <div class="text-center bs-wizard-stepnum">Step 2</div>
                              <div class="progress"><div class="progress-bar"></div></div>
                              <a href="#page2" role="tab" data-toggle="tab" class="bs-wizard-dot"></a>
                            </div>
                            <div class="col-xs-2 bs-wizard-step complete"><!-- active -->
                              <div class="text-center bs-wizard-stepnum">Step 3</div>
                              <div class="progress"><div class="progress-bar"></div></div>
                              <a href="#page3" role="tab" data-toggle="tab" class="bs-wizard-dot"></a>
                            </div>
                            <div class="col-xs-2 bs-wizard-step active"><!-- active -->
                              <div class="text-center bs-wizard-stepnum">Step 4</div>
                              <div class="progress"><div class="progress-bar"></div></div>
                              <a href="#page4" role="tab" data-toggle="tab" class="bs-wizard-dot"></a>
                            </div>
                            <div class="col-xs-2 bs-wizard-step disabled"><!-- disabled -->
                              <div class="text-center bs-wizard-stepnum">Step 5</div>
                              <div class="progress"><div class="progress-bar"></div></div>
                              <a href="#page2" class="bs-wizard-dot"></a>
                            </div>
                             <div class="col-xs-2 bs-wizard-step disabled"><!-- disabled -->
                              <div class="text-center bs-wizard-stepnum">Step 6</div>
                              <div class="progress"><div class="progress-bar"></div></div>
                              <a href="#page3" class="bs-wizard-dot"></a>
                            </div>
                        </div>
                        <form id="entity_step4_form" method="post" role="form">
                            <div class="form-group">
                                <label for=" ">Does the organisation have a clearly defined structure with reporting/decision making flow? <span class="required">*</span></label>
                                <label class="radio-inline" style="margin-left:10px;">
                                  <input type="radio" class="show_on_radio_click defined_structure_with_reporting" name="optradio9" value="Yes" <?php if ($defined_structure_decission_making === 'Yes'){ echo 'checked="checked"'; } ?>>Yes
                                </label>  
                                <label class="radio-inline">  
                                  <input type="radio" class="show_on_radio_click defined_structure_with_reporting" name="optradio9" value="No" <?php if ($defined_structure_decission_making === 'No'){ echo 'checked="checked"'; } ?>>No
                                </label>
								<div class="defined_structure_with_reporting_err"></div>
                                <div class="show_on_radio_data <?php if (!$defined_structure_decission_making || $defined_structure_decission_making === 'No'){ echo 'display_none'; } ?>" style="margin-top: 15px;">
                                    <div class="form-group">
                                        <label for="organogram_organisation">Please upload organogram of the organisation<span class="required">*</span></label>
                                        <div class="col-md-12">
                                            <button type="button" id="comman_file_upload_class" name="comman_file_upload_class" image_upload_desc="File must be less than 10MB in size.We prefer if you can provide .pdf versions of your document." upload_type="file" file_count="single" img_primary="no" file_prev_class="organogram_organisation_selected" file_input_id="organogram_organisation" class="btn btn-primary btn-lg comman_file_upload_class" data-toggle="modal" data-target="#browseFile"><i class="fa fa-upload"></i> </button>

                                            <input class="form-control organogram_organisation" id="organogram_organisation" name="organogram_organisation" type="hidden" value="<?php echo $upload_organogram ?>">
                                            <div class="image-preview inline_block organogram_organisation_selected">
                                                <input readonly class="form-control display_upload_image_name <?php if (!$upload_organogram_actual){ echo 'display_none'; } ?>" type="text" id="upload_organogram" value="<?php echo $upload_organogram_actual ?>">
                                            </div>
                                        </div>
										<div class="organogram_of_organisation_err display_none error">Please upload one file.</div>
                                    </div>    
                                </div>    
                            </div>
                            <h5>Details of Governing Body</h5>
                            <div class="form-group">
                                <label for=" ">Does the entity have a governing board?<span class="required">*</span></label><!-- add button after-->
                                <label class="radio-inline" style="margin-left:10px;">
                                  <input type="radio" class="show_on_radio_click entity_have_governing_body show_append" name="optradio10" value="Yes" <?php if ($entity_have_governing_board === 'Yes'){ echo 'checked="checked"'; } ?>>Yes
                                </label>  
                                <label class="radio-inline">  
									<input type="radio" class="show_on_radio_click entity_have_governing_body" name="optradio10" value="No" <?php if ($entity_have_governing_board === 'No'){ echo 'checked="checked"'; } ?>>No
                                </label>
								<div class="entity_have_governing_body_err"></div>
                                <div class="show_on_radio_data <?php if (!$entity_have_governing_board || $entity_have_governing_board === 'No'){ echo 'display_none'; } ?>" style="margin-top: 15px;">
                                    <div class="form-group display_none">
                                        <label for=" ">Number of governing body member(s)<span class="required">*</span></label>
                                        <input type="number" class="form-control" id="detail_body_member" name="detail_body_member" placeholder="Provide details for the governing body member" value="<?php echo $detail_body_member ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for=" ">Enter governing body member details<span class="required">*</span></label><br> 
                                        <a class="input_description" href="<?php echo base_url();?>assets/doc/Compass_Governing_Body_Template.xlsx" download target="_blank">
											Download and fill out this template with the required details.
										</a>Upload here once data has been entered. You can also fill out the details directly below.
                                        <br>
										<!--<div class="col-md-12">-->
											<button type="button" id="comman_file_upload_class" name="comman_file_upload_class" image_upload_desc="File must be less than 10MB in size.We prefer if you can provide .pdf versions of your document." upload_type="file" file_count="single" img_primary="no" file_prev_class="xl_file_upload" file_input_id="xl_file" class="btn btn-primary btn-lg comman_file_upload_class" data-toggle="modal" data-target="#browseFilePage4"><i class="fa fa-upload"></i> </button>
											<input class="form-control xl_file" id="xl_file" name="xl_file" type="hidden" value="">
											<div class="image-preview inline_block xl_file_upload">
												<input readonly class="form-control display_upload_image_name display_none" type="text" id="gst_certificate_actual" value="">
											</div>
										<!--</div>-->
										
                                        <div  id="GoverningMemberTextBoxContainer" class="new_member_array">
											<?php if(!$governing_body_member_det){ ?>	
											<div class="panel panel-default ">
                                                <div class="row panel-body ">
													
													<div class="row">
														<div class="col-md-12">
															<div class="form-group col-md-4">
															  <label for="name_of_member">Name of member <span class="required">*</span></label>
															  <input type="text" class="form-control name_of_member" name="name_of_member" placeholder="Enter name of member" value="">
															</div> 
															<div class="form-group col-md-2">
																<label for="member_age">Age <span class="required">*</span><span id="errmsg"></span></label>
																<input type="number" class="form-control member_age" name="member_age" placeholder="Age" value="">
															</div> 
															<div class="form-group col-md-2">
																<label for="member_gender">Gender <span class="required">*</span></label>
																<select name="member_gender" class="form-control select_button member_gender">       
																	<option value="">Select gender </option>
																	<option value="Male"> Male </option>
																	<option value="Female"> Female </option>
																</select>
															</div>
															<div class="form-group col-md-4">
																<label for="member_designation">Designation within the governing body <span class="required">*</span></label>
																<input type="text" class="form-control member_designation" name="member_designation" placeholder="Enter details here" value="">
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-md-12">
															<div class="form-group col-md-4">
																<label for="member_join_at">Since when is this person part of the governing body<span class="required">*</span></label>
																<input type="text" readonly class="form-control old_date member_join_at" name="member_join_at" placeholder="Enter details here" value="">
															</div>
															<div class="form-group col-md-4">
																<label for="member_related_to_other">Is the member related to any other governing body member by blood <span class="required">*</span></label>
																<input type="text" class="form-control member_related_to_other" name="member_related_to_other" placeholder="Enter details here" value="">
															</div>
															<div class="form-group col-md-4">
																<label for="member_occupation">Profession / Occupation of the member <span class="required">*</span><br/>&nbsp;</label>
																<input type="text" class="form-control member_occupation" name="member_occupation" placeholder="Enter details here" value="">
															</div>
														</div>
													</div>
													
												</div>
                                            </div>
											<?php } ?>
											
											<?php 
												if($governing_body_member_det){
													$i=0;
													$show_remove = '';
													foreach($governing_body_member_det as $details){
														$i++;
														if($i > 1){
															$show_remove = '';
														}else{
															$show_remove = 'display_none';
														}
											?>	
											<div class="panel panel-default">
                                                <div class="row panel-body">
													<div class="form-group col-md-12 <?php echo $show_remove ?>">
														<button type="button" class="btn btn-danger pull-right GoverningMemberRemovepara"><i class="fa fa-close"></i></button>                   
													</div>
                                                    <div class="row">
														<div class="col-md-12">
															<div class="form-group col-md-4">
															  <label for="name_of_member">Name of member <span class="required">*</span></label>
															  <input type="text" class="form-control name_of_member" name="name_of_member" placeholder="Enter name of member" value="<?php echo $details['name_of_member'] ?>">
															</div> 
															<div class="form-group col-md-2">
																<label for="member_age">Age <span class="required">*</span><span id="errmsg"></span></label>
																<input type="number" class="form-control member_age" name="member_age" placeholder="Age" value="<?php echo $details['member_age'] ?>">
															</div> 
															<div class="form-group col-md-2">
																<label for="member_gender">Gender <span class="required">*</span></label>
																<select name="member_gender" class="form-control select_button member_gender">       
																	<option value="">Select gender </option>
																	<option value="Male" <?php if($details['member_gender'] ==='Male') echo 'selected';?>> Male </option>
																	<option value="Female" <?php if($details['member_gender'] ==='Female') echo 'selected';?>> Female </option>
																</select>
															</div>
															<div class="form-group col-md-4">
																<label for="member_designation">Designation within the governing body <span class="required">*</span></label>
																<input type="text" class="form-control member_designation" name="member_designation" placeholder="Enter details here" value="<?php echo $details['member_designation'] ?>">
															</div>
														</div>
													</div>
                                                    <div class="row">
														<div class="col-md-12">
															<div class="form-group col-md-4">
																<label for="member_join_at">Since when is this person part of the governing body<span class="required">*</span></label>
																<input type="text" readonly class="form-control old_date member_join_at" name="member_join_at" placeholder="Enter details here" value="<?php echo $details['member_join_at'] ?>">
															</div>
															<div class="form-group col-md-4">
																<label for="member_related_to_other">Is the member related to any other governing body member by blood <span class="required">*</span></label>
																<input type="text" class="form-control member_related_to_other" name="member_related_to_other" placeholder="Enter details here" value="<?php echo $details['member_related_to_other'] ?>">
															</div>
															<div class="form-group col-md-4">
																<label for="member_occupation">Profession / Occupation of the member <span class="required">*</span><br/>&nbsp;</label>
																<input type="text" class="form-control member_occupation" name="member_occupation" placeholder="Enter details here" value="<?php echo $details['member_occupation'] ?>">
															</div>
														</div>
													</div>
												</div>
                                            </div>
											<?php }
												}	?>
                                        </div>
										<div class="governing_body_member_err display_none error">please provide all details</div>
                                    </div>
									<button type="button" id="GoverningMemberAddParabtn" class="btn btn-success add_button GoverningMemberAddParabtn"><i class="fa fa-plus"></i></button><label style="margin-left:5px;">Add another member</label>
                          
                                </div>
                            </div>
							
							
							<h5>Staff Details</h5>
                            
                            <div class="form-group">
                                <label for=" ">Number of direct employees<span class="required">*</span></label>
                                <input type="number" class="form-control" id="number_of_employee" name="number_direct_employee" placeholder=" Please enter only numerical digits" value="<?php echo $number_of_employee ?>">
                            </div>
                            <div class="form-group">
                                <label for=" ">Number of employees through contractor / manpower service provider <span class="required">*</span></label>
                                <input type="number" class="form-control" id="number_of_employee_through_contractor" name="number_of_employee_through_contractor" placeholder=" Please enter only numerical digits" value="<?php echo $number_of_employee_through_contractor ?>">
                            </div>
                            <div class="form-group">
                                <label for=" ">Number of part-time employees (including volunteers) <span class="required">*</span></label>
                                <input type="number" class="form-control" id="number_parttime_employees" name="number_parttime_employees" placeholder=" Please enter only numerical digits" value="<?php echo $number_parttime_employees ?>">
                            </div>

                            <h5>Institutional Costs Details</h5>
                            <div class="form-group">
                                <label for=" ">Renumeration of Senior Leadership<span class="required">*</span></label><br>
                                <a class="input_description" href="<?php echo base_url();?>assets/doc/Compass-Senior-Leadership-Renumeration-Template.xlsx" download target="_blank">
									Download and fill out this template with the required details.
								</a>Upload here once data has been entered. You can also fill out the details directly below.
								<br>
								<!--<div class="col-md-12">-->
									<button type="button" id="comman_file_upload_class" name="comman_file_upload_class" image_upload_desc="File must be less than 10MB in size.We prefer if you can provide .pdf versions of your document." upload_type="file" file_count="single" img_primary="no" file_prev_class="xl_file_upload" file_input_id="xl_file" class="btn btn-primary btn-lg comman_file_upload_class" data-toggle="modal" data-target="#browseFilePage4_2"><i class="fa fa-upload"></i> </button>
									<input class="form-control xl_file" id="xl_file" name="xl_file" type="hidden" value="">
									<div class="image-preview inline_block xl_file_upload">
										<input readonly class="form-control display_upload_image_name display_none" type="text" id="gst_certificate_actual" value="">
									</div>
								<!--</div>-->
								
							<div id="renumeration_senior"> 
								
									  <table class="table table-bordered ">
									  <thead>
										<tr>
										  <th scope="col" class="text-center">Title</th>
										  <th scope="col" class="text-center" style="width:15%;">Name</th>
										  <th scope="col" class="text-center" style="width:10%;">Annual CTC<br/>(in INR lakhs)</th>
										  <th scope="col" class="text-center">Degree(s)/<br/>Qualification(s)</th>
										  <th scope="col" class="text-center">Gender M/F</th>
										  <th scope="col" class="text-center" style="width:10%;">Age</th>
										  <th scope="col" class="text-center">Total experience<br/>(years)</th>
										  <th scope="col" class="text-center">Work experience <br/>within the <br/>organisation(years)</th>
										  <th scope="col" class="text-center">Work experience in<br/> social/development <br/>sector(years)</th>
										  <th scope="col" class="text-center">Signing authority(yes/No)</th>
										</tr>
									  </thead>
									  <tbody class="renumaration_of_senior_leadership">
										<tr>
										  <td>Head of Organisation</td>
										  <td><input type="text" class="form-control" value="<?php if($renumeration_of_senior_leadership){ echo $renumeration_of_senior_leadership[0]['input1']; } ?>"></td>
										  <td><input type="number" class="form-control" value="<?php if($renumeration_of_senior_leadership){ echo $renumeration_of_senior_leadership[0]['input2'];} ?>"></td>
										  <td><input type="text" class="form-control" value="<?php if($renumeration_of_senior_leadership){ echo $renumeration_of_senior_leadership[0]['input3']; }?>"></td>
										  <td><input type="text" class="form-control" value="<?php if($renumeration_of_senior_leadership){ echo $renumeration_of_senior_leadership[0]['input4']; }?>"></td>
										  <td><input type="number" class="form-control" value="<?php if($renumeration_of_senior_leadership){ echo $renumeration_of_senior_leadership[0]['input5']; }?>"></td>
										  <td><input type="number" class="form-control" value="<?php if($renumeration_of_senior_leadership){ echo $renumeration_of_senior_leadership[0]['input6'];} ?>"></td>
										  <td><input type="number" class="form-control" value="<?php if($renumeration_of_senior_leadership){ echo $renumeration_of_senior_leadership[0]['input7']; }?>"></td>
										  <td><input type="number" class="form-control" value="<?php if($renumeration_of_senior_leadership){ echo $renumeration_of_senior_leadership[0]['input8']; }?>"></td>
										  <td><input type="text" class="form-control" value="<?php if($renumeration_of_senior_leadership){ echo $renumeration_of_senior_leadership[0]['input9']; }?>"></td>
										</tr>
										<tr>
										  <td>Chief of Operations</td>
										  <td><input type="text" class="form-control text10" value="<?php if($renumeration_of_senior_leadership){ echo $renumeration_of_senior_leadership[1]['input1']; }?>"></td>
										  <td><input type="number" class="form-control text11" value="<?php if($renumeration_of_senior_leadership){ echo $renumeration_of_senior_leadership[1]['input2']; }?>"></td>
										  <td><input type="text" class="form-control text12" value="<?php if($renumeration_of_senior_leadership){ echo $renumeration_of_senior_leadership[1]['input3']; }?>"></td>
										  <td><input type="text" class="form-control text13" value="<?php if($renumeration_of_senior_leadership){ echo $renumeration_of_senior_leadership[1]['input4']; }?>"></td>
										  <td><input type="number" class="form-control text14" value="<?php if($renumeration_of_senior_leadership){ echo $renumeration_of_senior_leadership[1]['input5']; }?>"></td>
										  <td><input type="number" class="form-control text15" value="<?php if($renumeration_of_senior_leadership){ echo $renumeration_of_senior_leadership[1]['input6'];} ?>"></td>
										  <td><input type="number" class="form-control text16" value="<?php if($renumeration_of_senior_leadership){ echo $renumeration_of_senior_leadership[1]['input7']; }?>"></td>
										  <td><input type="number" class="form-control text17" value="<?php if($renumeration_of_senior_leadership){ echo $renumeration_of_senior_leadership[1]['input8']; }?>"></td>
										  <td><input type="text" class="form-control text18" value="<?php if($renumeration_of_senior_leadership){ echo $renumeration_of_senior_leadership[1]['input9']; }?>"></td>
										</tr>
										<tr>
										  <td>Chief of Finance/<br/>Accounts</td>
										  <td><input type="text" class="form-control text19" value="<?php if($renumeration_of_senior_leadership){  echo $renumeration_of_senior_leadership[2]['input1']; }?>"></td>
										  <td><input type="number" class="form-control text20" value="<?php if($renumeration_of_senior_leadership){  echo $renumeration_of_senior_leadership[2]['input2']; }?>"></td>
										  <td><input type="text" class="form-control text21" value="<?php if($renumeration_of_senior_leadership){  echo $renumeration_of_senior_leadership[2]['input3']; }?>"></td>
										  <td><input type="text" class="form-control text22" value="<?php if($renumeration_of_senior_leadership){  echo $renumeration_of_senior_leadership[2]['input4']; }?>"></td>
										  <td><input type="number" class="form-control text23" value="<?php if($renumeration_of_senior_leadership){  echo $renumeration_of_senior_leadership[2]['input5']; }?>"></td>
										  <td><input type="number" class="form-control text24" value="<?php if($renumeration_of_senior_leadership){  echo $renumeration_of_senior_leadership[2]['input6']; }?>"></td>
										  <td><input type="number" class="form-control text25" value="<?php if($renumeration_of_senior_leadership){  echo $renumeration_of_senior_leadership[2]['input7']; }?>"></td>
										  <td><input type="number" class="form-control text26" value="<?php if($renumeration_of_senior_leadership){  echo $renumeration_of_senior_leadership[2]['input8'];} ?>"></td>
										  <td><input type="text" class="form-control text27" value="<?php if($renumeration_of_senior_leadership){  echo $renumeration_of_senior_leadership[2]['input9']; }?>"></td>
										  
										  
										</tr>
									  </tbody>
									</table>
									
								</div>
								<div class="renumeration_err display_none error">Please provide all the details.</div>			
								
                            </div>
                            <div class="form-group">
                                <label for=" ">Full-time staff: numbers and breakup <span class="required">*</span></label><br>
								<a class="input_description"  href="<?php echo base_url();?>assets/doc/Compass-Full-Time-Staff-Template.xlsx" download target="_blank">
									Download and fill out this template with the required details.
								</a>Upload here once data has been entered. You can also fill out the details directly below.
								<br>
								<!--<div class="col-md-12">-->
									<button type="button" id="comman_file_upload_class" name="comman_file_upload_class" image_upload_desc="File must be less than 10MB in size.We prefer if you can provide .pdf versions of your document." upload_type="file" file_count="single" img_primary="no" file_prev_class="xl_file_upload" file_input_id="xl_file" class="btn btn-primary btn-lg comman_file_upload_class" data-toggle="modal" data-target="#browseFilePage4_3"><i class="fa fa-upload"></i> </button>
									<input class="form-control xl_file" id="xl_file" name="xl_file" type="hidden" value="">
									<div class="image-preview inline_block xl_file_upload">
										<input readonly class="form-control display_upload_image_name display_none" type="text" id="gst_certificate_actual" value="">
									</div>
								<!--</div>-->
								
							</div>
								
								<table class="table table-bordered">
								  <thead>
									<tr>
									  <th scope="row" class="text-center">Annual CTC</th>
									  <th scope="row" class="text-center">Male</th>
									  <th scope="row" class="text-center">Female</th>
									  
									</tr>
								  </thead>
								  <tbody class="full_time_staff">
									<tr>
									  <td>Upto INR 2 Lakhs</td>
									  <td><input type="number" class="form-control text1" value="<?php if($full_time_staff_numbers){ echo $full_time_staff_numbers[0]['input1']; }?>"></td>
									  <td><input type="number" class="form-control text2" value="<?php if($full_time_staff_numbers){ echo $full_time_staff_numbers[0]['input2']; }?>"></td>
									  
									</tr>
									<tr>
									  <td>INR 2.01-4 Lakhs</td>
									  <td><input type="number" class="form-control text3" value="<?php if($full_time_staff_numbers){ echo $full_time_staff_numbers[1]['input1']; }?>"></td>
									  <td><input type="number" class="form-control text4" value="<?php if($full_time_staff_numbers){ echo $full_time_staff_numbers[1]['input2']; }?>"></td>
									  
									</tr>
									<tr>
									  <td>INR 4.01-8 Lakhs</td>
									  <td><input type="number" class="form-control text5" value="<?php if($full_time_staff_numbers){ echo $full_time_staff_numbers[2]['input1']; }?>"></td>
									  <td><input type="number" class="form-control text6" value="<?php if($full_time_staff_numbers){ echo $full_time_staff_numbers[2]['input2']; }?>"></td>
									  
									 
									</tr>
									<tr>
									  <td>INR 8.01-13 Lakhs</td>
									  <td><input type="number" class="form-control text7" value="<?php if($full_time_staff_numbers){ echo $full_time_staff_numbers[3]['input1']; }?>"></td>
									  <td><input type="number" class="form-control text8" value="<?php if($full_time_staff_numbers){ echo $full_time_staff_numbers[3]['input2']; }?>"></td>
									  
									 
									</tr>
									<tr>
									  <td>INR 13.01-18 Lakhs</td>
									  <td><input type="number" class="form-control text9" value="<?php if($full_time_staff_numbers){ echo $full_time_staff_numbers[4]['input1'];} ?>"></td>
									  <td><input type="number" class="form-control text10" value="<?php if($full_time_staff_numbers){ echo $full_time_staff_numbers[4]['input2']; }?>"></td>
									  
									 
									</tr>
									<tr>
									  <td>INR 18.01-30 Lakhs</td>
									  <td><input type="number" class="form-control text11" value="<?php if($full_time_staff_numbers){ echo $full_time_staff_numbers[5]['input1']; }?>"></td>
									  <td><input type="number" class="form-control text12" value="<?php if($full_time_staff_numbers){ echo $full_time_staff_numbers[5]['input2']; }?>"></td>
									  
									 
									</tr>
									<tr>
									  <td>INR 30.01-60 Lakhs</td>
									  <td><input type="number" class="form-control text13" value="<?php if($full_time_staff_numbers){ echo $full_time_staff_numbers[6]['input1'];} ?>"></td>
									  <td><input type="number" class="form-control text14" value="<?php if($full_time_staff_numbers){ echo $full_time_staff_numbers[6]['input2']; }?>"></td>
									  
									 
									</tr>
									<tr>
									  <td>Greater than INR 60Lakhs</td>
									  <td><input type="number" class="form-control text15" value="<?php if($full_time_staff_numbers){ echo $full_time_staff_numbers[7]['input1']; }?>"></td>
									  <td><input type="number" class="form-control text16" value="<?php if($full_time_staff_numbers){ echo $full_time_staff_numbers[7]['input2']; }?>"></td>
									  
									 
									</tr>
									<!--<tr>
									  <td>INR 13.01-18 Lakhs</td>
									  <td><input type="number" class="form-control text17" value="<?php if($full_time_staff_numbers){ echo $full_time_staff_numbers[8]['input1']; }?>"></td>
									  <td><input type="number" class="form-control text18" value="<?php if($full_time_staff_numbers){ echo $full_time_staff_numbers[8]['input2'];} ?>"></td>
									  
									 
									</tr>-->
									
								  </tbody>
								</table>
								<div class="full_time_staff_err display_none error">Please provide the all details</div>
								
								
								
                            
                            <div class="form-group">
                                <label for=" ">Part-time staff: numbers and breakup <span class="required">*</span></label><br>
								<a class="input_description" href="<?php echo base_url();?>assets/doc/Compass-Part-Time-Staff-Template.xlsx" download target="_blank">
									Download and fill out this template with the required details.
								</a> Upload here once data has been entered. You can also fill out the details directly below.
								<br>
								<!--<div class="col-md-12">-->
									<button type="button" id="comman_file_upload_class" name="comman_file_upload_class" image_upload_desc="File must be less than 10MB in size.We prefer if you can provide .pdf versions of your document." upload_type="file" file_count="single" img_primary="no" file_prev_class="xl_file_upload" file_input_id="xl_file" class="btn btn-primary btn-lg comman_file_upload_class" data-toggle="modal" data-target="#browseFilePage4_4"><i class="fa fa-upload"></i> </button>
									<input class="form-control xl_file" id="xl_file" name="xl_file" type="hidden" value="">
									<div class="image-preview inline_block xl_file_upload">
										<input readonly class="form-control display_upload_image_name display_none" type="text" id="gst_certificate_actual" value="">
									</div>
								<!--</div>-->
							</div> 
							
							
							<table class="table table-bordered">
								  <thead class="thead-light">
									<tr>
									  <th scope="row" class="text-center">Monthly salary</th>
									  <th scope="row" class="text-center">Male</th>
									  <th scope="row" class="text-center">Female</th>
									  
									</tr>
								  </thead>
								  <tbody class="part_time_staff">
									<tr>
									  <td>Upto INR 2,500</td>
									  <td><input type="number" class="form-control text1" value="<?php if($part_time_staff_numbers){ echo $part_time_staff_numbers[0]['input1']; }?>"></td>
									  <td><input type="number" class="form-control text1" value="<?php if($part_time_staff_numbers){ echo $part_time_staff_numbers[0]['input2']; }?>"></td>
									  
									</tr>
									<tr>
									  <td>INR 2,501-5000</td>
									  <td><input type="number" class="form-control text1" value="<?php if($part_time_staff_numbers){ echo $part_time_staff_numbers[1]['input1']; }?>"></td>
									  <td><input type="number" class="form-control text1" value="<?php if($part_time_staff_numbers){ echo $part_time_staff_numbers[1]['input2']; }?>"></td>
									  
									</tr>
									<tr>
									  <td>Greater than INR 5,001</td>
									  <td><input type="number" class="form-control text1" value="<?php if($part_time_staff_numbers){ echo $part_time_staff_numbers[2]['input1']; }?>"></td>
									  <td><input type="number" class="form-control text1" value="<?php if($part_time_staff_numbers){ echo $part_time_staff_numbers[2]['input2']; }?>"></td>
									  
									 
									</tr>
									
								  </tbody>
								</table>
							<div class="part_time_staff_err display_none error">Please provide all the details</div>
							
							
                            <div class="form-group">
                                <label for=" ">Details of vehicles and other assets owned by the entity <span class="required">*</span></label><br>
								<a class="input_description" href="<?php echo base_url();?>assets/doc/Compass-Assets-Template.xlsx" download target="_blank">
									Download and fill out this template with the required details.
								</a>Upload here once data has been entered. You can also fill out the details directly below.
                                <br>
								<!--<div class="col-md-12">-->
									<button type="button" id="comman_file_upload_class" name="comman_file_upload_class" image_upload_desc="File must be less than 10MB in size.We prefer if you can provide .pdf versions of your document." upload_type="file" file_count="single" img_primary="no" file_prev_class="xl_file_upload" file_input_id="xl_file" class="btn btn-primary btn-lg comman_file_upload_class" data-toggle="modal" data-target="#browseFilePage4_5"><i class="fa fa-upload"></i> </button>
									<input class="form-control xl_file" id="xl_file" name="xl_file" type="hidden" value="">
									<div class="image-preview inline_block xl_file_upload">
										<input readonly class="form-control display_upload_image_name display_none" type="text" id="gst_certificate_actual" value="">
									</div>
								<!--</div>-->
						   </div>  
							<div id="detail_of_vehicles_and_other_assets" class="cladd_detail_of_vehicles_and_other_assets">
									<?php 
								if(!$vehicles_details){
									?>	
								<div class="panel panel-default">
									<div class=" panel-body">
										<div class="row">
											<div class="form-group col-md-4">
												<label for="name_of_asset">Name of Asset <span class="required">*</span></label>
												<input type="text" class="form-control name_of_asset" id="name_of_asset" name="name_of_asset" placeholder="Enter name of Asset" value="">
											</div> 
											<div class="form-group col-md-4">
												<label for="location">Location<span class="required">*</span><span id="errmsg"></span></label>
												<input type="text" class="form-control location" id="location" name="location" placeholder="location" value="">
											</div> 
											<div class="form-group col-md-4">
												<label for="value">Value<span class="required">*</span><span id="errmsg"></span></label>
												<input type="text" class="form-control value" id="value" name="value" placeholder="value" value="">
											</div> 
										</div>
									</div>
								</div>
								<?php }
								?>		
								<?php 
								if($vehicles_details){
									$i=0;
									$show_remove = '';
									$col_md = '';
									foreach($vehicles_details as $details){
										$i++;
										if($i > 1){
											$show_remove = '';
											$col_md = 'col-md-4';
										}else{
											$show_remove = 'display_none';
											$col_md = 'col-md-4';
										}
									?>	
								<div class="panel panel-default">
									<div class=" panel-body">
										<div class="form-group col-md-12 <?php echo $show_remove ?>" style="margin-bottom: -16px;margin-top: -8px;margin-left: 12px;">
											<button type="button" class="btn btn-danger pull-right RegistrationRemovepara"><i class="fa fa-close"></i></button>                     
										</div>
										<div class="row">
											<div class="form-group col-md-4">
												<label for="name_of_asset">Name of Asset <span class="required">*</span></label>
												<input type="text" class="form-control name_of_asset" id="name_of_asset" name="name_of_asset" placeholder="Enter name of Asset" value="<?php echo $details['name_of_asset']; ?>">
											</div> 
											<div class="form-group col-md-4">
												<label for="location">Location<span class="required">*</span><span id="errmsg"></span></label>
												<input type="text" class="form-control location" id="location" name="location" placeholder="location" value="<?php echo $details['location']; ?>">
											</div> 
											<div class="form-group <?php echo $col_md ?>">
												<label for="value">Value<span class="required">*</span><span id="errmsg"></span></label>
												<input type="text" class="form-control value" id="value" name="value" placeholder="value" value="<?php echo $details['value']; ?>">
											</div> 
											<!--<div class="form-group col-md-1 <?php //echo $show_remove ?>">
												<label for="value">&nbsp;</label><br/>
												<button type="button" class="btn btn-danger pull-right RegistrationRemovepara"><i class="fa fa-close"></i></button>                     
											</div>-->
										</div>
									</div>
								</div>
									<?php }
								}
								?>		
							</div>
							<div class="detail_vehicle_error display_none error">Please provide all details</div>
							<button type="button" id="detail_of_vehicle" class="btn btn-success add_button"><i class="fa fa-plus"></i></button><label style="margin-left:5px;">Add another asset</label>
							
                            <div class="form-group">
                                <label for=" ">Details of any foreign travel taken by staff at institutional expense<span class="required">*</span></label><br>
								<a class="input_description" href="<?php echo base_url();?>assets/doc/Compass-Foreign-Travel-Template.xlsx" download target="_blank">
									Download and fill out this template with the required details.
								</a>Upload here once data has been entered. You can also fill out the details directly below.
                                <br>
								<!--<div class="col-md-12">-->
									<button type="button" id="comman_file_upload_class" name="comman_file_upload_class" image_upload_desc="File must be less than 10MB in size.We prefer if you can provide .pdf versions of your document." upload_type="file" file_count="single" img_primary="no" file_prev_class="xl_file_upload" file_input_id="xl_file" class="btn btn-primary btn-lg comman_file_upload_class" data-toggle="modal" data-target="#browseFilePage4_6"><i class="fa fa-upload"></i> </button>
									<input class="form-control xl_file" id="xl_file" name="xl_file" type="hidden" value="">
									<div class="image-preview inline_block xl_file_upload">
										<input readonly class="form-control display_upload_image_name display_none" type="text" id="gst_certificate_actual" value="">
									</div>
								<!--</div>-->	
						   </div>      

							<div id="detail_of_foreign_travel">
								<?php 
								if(!$foreign_travel_taken_by_staff){
									?>	
								<div class="panel panel-default">
									<div class="row panel-body">
										<div class="row">
										
											<div class="col-md-12">
												<div class="form-group col-md-4">
													<label for="title_of_traveller">Title of Traveler<span class="required">*</span></label>
													<input type="text" class="form-control title_of_traveller" id="title_of_traveller" name="title_of_traveller" placeholder="Enter Title of Traveler" value="">
												</div> 
												<div class="form-group col-md-4">
													<label for="location_purpose">Location and purpose<span class="required">*</span><span id="errmsg"></span></label>
													<input type="text" class="form-control location_purpose" id="location_purpose" name="location_purpose" placeholder="Enter Location and Purpose" value="">
												</div> 
												<div class="form-group col-md-4">
													<label for="cost_incurred">Cost Incurred<span class="required">*</span><span id="errmsg"></span></label>
													<input type="number" class="form-control cost_incurred" id="cost_incurred" name="cost_incurred" placeholder="Enter cost incurred" value="">
												</div> 
											</div>
										</div>
									</div>
								</div>
								<?php }
								?>		
								<?php 
								if($foreign_travel_taken_by_staff){
									$i=0;
									$show_remove_ = '';
									$col_md_ = '';
									foreach($foreign_travel_taken_by_staff as $details){
										$i++;
										if($i > 1){
											$show_remove_ = '';
											$col_md_ = 'col-md-4';
										}else{
											$show_remove_ = 'display_none';
											$col_md_ = 'col-md-4';
										}
								?>	
								<div class="panel panel-default">
									<div class="row panel-body">
									<div class="form-group col-md-12 <?php echo $show_remove_ ?>" style="margin-bottom: -15px; margin-left: 0px;">
										<button type="button" class="btn btn-danger pull-right RegistrationRemovepara1"><i class="fa fa-close"></i></button>                  
									</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group col-md-4">
													<label for="title_of_traveller">Title of Traveler<span class="required">*</span></label>
													<input type="text" class="form-control title_of_traveller" id="title_of_traveller" name="title_of_traveller" placeholder="Enter Title of Traveler" value="<?php echo $details['title_of_traveller']; ?>">
												</div> 
												<div class="form-group col-md-4">
													<label for="location_purpose">Location and purpose<span class="required">*</span><span id="errmsg"></span></label>
													<input type="text" class="form-control location_purpose" id="location_purpose" name="location_purpose" placeholder="Enter Location and Purpose" value="<?php echo $details['location_and_purpose']; ?>">
												</div> 
												<div class="form-group <?php echo $col_md_ ?>">
													<label for="cost_incurred">Cost Incurred<span class="required">*</span><span id="errmsg"></span></label>
													<input type="number" class="form-control cost_incurred" id="cost_incurred" name="cost_incurred" placeholder="Enter cost incurred" value="<?php echo $details['cost_incurred']; ?>">
												</div> 
												<!--<div class="form-group col-md-1 <?php echo $show_remove_ ?>">
													<br/>
													<button type="button" class="btn btn-danger pull-right foreign_travel_remove"><i class="fa fa-close"></i></button>                  
												</div>-->
											</div>
										</div>
									</div>
								</div>
								<?php }
								}?>		
							</div>
							<div class="detail_foreign_travel_error display_none error">Please provide all the details.</div>
							<div>
								<button type="button" id="detail_of_foreign_travel_append" class="btn btn-success add_button"><i class="fa fa-plus"></i></button><label style="margin-left:5px;">Add another travel</label>
							</div>
							<div class="form-group" style="padding-top:5px;">
								<span class="btn btn-default cancel_page <?php echo $is_edit; ?>" align="<?php echo $entity_id; ?>">Cancel</span>
                                <span class="btn btn-success save_step save_page4 <?php echo $is_edit; ?>">Save Changes</span>
                                <!--<span class="btn btn-success save_step save_page4 <?php echo $display_none_; ?>">Save</span>-->
								<button type="submit" class="btn btn-success save_goto_next_step <?php echo $display_none_; ?>" id="submit_next_page4">Save & Next</button>
                                <span class="btn btn-primary skip_step_four display_none <?php echo $display_none_; ?>">Finish Later</span>
                            </div>
                        </form>
                    </div>
                  </div>
                </div>
			<?php echo $display_none ?></div>
		</div>
	</section>
</div><?php echo $display_none1 ?>