<?php

	$page_heading = '';
    $heading = '';
	//var_dump($proposal_data);
	if($proposal_data){
		$page_heading = 'Edit Proposal';
        $heading = 'Edit Proposal';
		$prop_id =$proposal_data['prop_id']; 
		$title =$proposal_data['title'];  
        $organisation_id =$proposal_data['organisation_id'];  
        $ngo_id =$proposal_data['ngo_id'];  
        $code =$proposal_data['code']; 

        $organization_background_brief=$proposal_data['organization_background_brief']; 
        $project_summary_proposal=$proposal_data['project_summary_proposal']; 
        $benificiary_profile_brief=$proposal_data['benificiary_profile_brief']; 
        $benificiary_profile_statement=$proposal_data['benificiary_profile_statement'];
        $benificiary_profile_solution=$proposal_data['benificiary_profile_solution'];
        $key_activities=$proposal_data['key_activities'];
        $specific_outcomes=$proposal_data['specific_outcomes'];
        $project_sustainability=$proposal_data['project_sustainability'];
        $original_file_path=$proposal_data['original_file_path'];
        $generated_file_path=$proposal_data['generated_file_path'];
       
		$is_add_edit='edit';
        $is_readonly="readOnly" ;
        $disp_none='';
        $disp_1='';
        $disp_none_step='display_none';
        $disp_none_view='';
		
		if($edit_with_add=='yes'){
			$disp_none='<!--';
			$disp_1='-->';
			$disp_none_step='';
			$disp_none_view='display_none';
			$page_heading = 'Create New Proposal';
			$is_add_edit='add';	
		}
	
	
	}else{
		$page_heading = 'Create New Proposal';
        $heading = 'Add New Proposal';
		$prop_id =0;
		$title ='';
        $organisation_id ='';
        $ngo_id ='';
        $code ='';

 		$organization_background_brief= '';
        $project_summary_proposal= '';
        $benificiary_profile_brief='';
        $benificiary_profile_statement='';
        $benificiary_profile_solution='';
        $key_activities='';
        $specific_outcomes='';
        $project_sustainability='';
        $original_file_path='';
        $generated_file_path='';
		$is_add_edit='add';
        $is_readonly="";
		$disp_none='<!--';
        $disp_1='-->';
        $disp_none_step='';
        $disp_none_view='display_none';
	}
		
	?>
	<?php echo $disp_none;?>  
<div class="">
  <?php echo $disp_1;?> 
	<input type="hidden" class="form-control" id="is_add_edit4" value='<?php echo $is_add_edit; ?>'>
	<div id="alert_danger_error"></div>
	<div role="tabpanel" class="tab-pane" id="page4">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Proposal Features</h3>
			</div>
			<div class="box-body">
				<form id="add_proposal4" method="post" role="form">
					<input type="hidden" class="form-control" id="prop_id" name="prop_id" value="<?php echo $prop_id;?>"> 
					<div class="row bs-wizard <?php echo $disp_none_step;?>" style="border-bottom:0;">
                        <div class="col-xs-2 bs-wizard-step complete">
							<div class="text-center bs-wizard-stepnum">Step 1</div>
							<div class="progress"><div class="progress-bar"></div></div>
							<a href="#page1" role="tab" data-toggle="tab" class="bs-wizard-dot"></a>
						</div>
                        <div class="col-xs-2 bs-wizard-step complete"><!-- complete -->
							<div class="text-center bs-wizard-stepnum">Step 2</div>
							<div class="progress"><div class="progress-bar"></div></div>
							<a href="#page2" role="tab" data-toggle="tab" class="bs-wizard-dot"></a>
						</div> 
						<div class="col-xs-2 bs-wizard-step complete"><!-- active -->
							<div class="text-center bs-wizard-stepnum">Step 3</div>
							<div class="progress"><div class="progress-bar"></div></div>
							<a href="#page3" role="tab" data-toggle="tab" class="bs-wizard-dot"></a>
						</div>
						<div class="col-xs-2 bs-wizard-step active"><!-- disabled -->
							<div class="text-center bs-wizard-stepnum">Step 4</div>
							<div class="progress"><div class="progress-bar"></div></div>
							<a href="#page4" role="tab" data-toggle="tab" class="bs-wizard-dot"></a>
						</div>
						<div class="col-xs-2 bs-wizard-step disabled"><!-- disabled -->
							<div class="text-center bs-wizard-stepnum">Step 5</div>
							<div class="progress"><div class="progress-bar"></div></div>
							<a href="#page5" class="bs-wizard-dot"></a>
						</div>
					</div>
					<div class="form-group">
						<label for="organization_background">Organisation Profile<span class="required">*</span></label>
						<div class="row">
							<div class="col-md-12">	  
								<label for="organization_background_brief" class="input_description">please share a brief history of the organization, including work done in the proposed geography and on the proposed focus area</label>
								<textarea rows="10" class="form-control" id="organization_background_brief" name="organization_background_brief" placeholder="" value=""><?php echo $organization_background_brief?></textarea>
							</div>
						</div>	
					</div>
					<div class="form-group">
						<label for="project_summary">Project Summary<span class="required">*</span></label>
						<div class="row">
							<div class="col-md-12">	  
								<label for="project_summary_proposal"  class="input_description">An Executive summary of your project proposal</label>
								<textarea rows="10" class="form-control" id="project_summary_proposal" name="project_summary_proposal" placeholder="" value=""><?php echo $project_summary_proposal?></textarea>
							</div>
						</div>	
					</div>
					<div class="form-group">
						<label for="benificiary_profile">Benificiary Profile<span class="required">*</span></label>
						<div class="row">
							<div class="col-md-12">	  
								<label for="benificiary_profile_brief"  class="input_description">Describe in brief the target community, how they were identified, the number of benificiaries and their role in project execution</label>
								<textarea rows="10" class="form-control" id="benificiary_profile_brief" name="benificiary_profile_brief" placeholder="" value=""><?php echo $benificiary_profile_brief?></textarea>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-12">	  
								<label for="benificiary_profile_statement" >Problem statement: what is the specific problem being addressed<span class="required">*</span></label>
								<textarea rows="10" class="form-control" id="benificiary_profile_statement" name="benificiary_profile_statement" placeholder="" value=""><?php echo $benificiary_profile_statement?></textarea>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-12">	  
								<label for="benificiary_profile_solution" >Solution: Specify the solution being proposed and how will it address the problem<span class="required">*</span></label>
								<textarea rows="10" class="form-control" id="benificiary_profile_solution" name="benificiary_profile_solution" placeholder="" value=""><?php echo $benificiary_profile_solution?></textarea>
							</div>
						</div>	
					</div>
					<div class="form-group">
						<label for="benificiary_profile">Key Activities<span class="required">*</span></label>
						<div class="row">
							<div class="col-md-12">	  
								<label for="specific_outcomes"   class="input_description">List out the key activities proposed - with timelines if feasible</label>
								<textarea rows="10" class="form-control" id="key_activities" name="key_activities" placeholder="" value=""><?php echo $key_activities?></textarea>
							</div>
						</div>	
					</div>
					
					<div class="form-group">
						<label for="benificiary_profile">Outcomes of the project<span class="required">*</span></label>
						<div class="row">
							<div class="col-md-12">	  
								<label for="specific_outcomes"   class="input_description">What will be the specific outcomes of the projects and how will they be measured?</label>
								<textarea rows="10" class="form-control" id="specific_outcomes" name="specific_outcomes" placeholder="" value=""><?php echo $specific_outcomes?></textarea>
							</div>
						</div>	
					</div>
					<div class="form-group">
						<label for="project_sustainability">Project Sustainability<span class="required">*</span></label>
						<div class="row">
							<div class="col-md-12">	  
								<label for="project_sustainability"  class="input_description">For how long will the funding from this proposal cover the project expenses(Specifically in case of infrastructure)? Also specify what happens to project at the end of the funding from this proposal</label>
								<textarea rows="10" class="form-control" id="project_sustainability" name="project_sustainability" placeholder="" value=""><?php echo $project_sustainability?></textarea>
							</div>
						</div>	
					</div>
					<div class="form-group">
						<label for="file_upload_plan">Attach implementation/M & E plan of project activities<span class="required">*</span></label></br>
						<label for="file_upload_desc" class="input_description">File must be less than 10 MB in size</label><br>
								
						<button type="button" id="comman_file_upload_class" name="comman_file_upload_class" image_upload_desc="File must be less than 10MB in size.We prefer if you can provide .pdf versions of your document." upload_type="file" file_count="single" img_primary="no" file_prev_class="activitie_project_selected" file_input_id="activitie_project" class="btn btn-primary btn-lg comman_file_upload_class" data-toggle="modal" data-target="#browseFile"><i class="fa fa-upload"></i>
						</button>&nbsp;&nbsp;
						<div>
							<div class="">
								<input readOnly class="form-control project activitie_project " id="activitie_project" name="activitie_project" type="hidden" value="<?php echo $generated_file_path ?>" style="color:#3c8dbc; border:none;">
							</div>
							<span class="registration_80g_valid" ></span>
							<div class="image-preview inline_block activitie_project_selected ">
								<input readOnly class="form-control is_edit_data <?php if (!$original_file_path){ echo 'display_none'; } ?>" type="text" id="upload_80G_reg" value="<?php echo $original_file_path ?>" style="color:#3c8dbc; border:none;">
							</div>
						</div>
						<div class="">
							<div id="project_activities_error" class="display_none">
								<label class="required">Attachment is required.</label>
							</div>
						</div>
					</div>
					<div class="box-footer clearfix">
						<div class="form-group <?php echo $disp_none_view;?>">
							<span class="btn btn-default cancel_page" align="<?php echo $prop_id;?>">Cancel</span>
							<span type="submit" class="btn btn-success " id="save_step4">Save Changes</span>
						</div>
						<div class="form-group <?php echo $disp_none_step;?>">
							<!--<button type="button" class="btn btn-success" id="save_step4">Save</button>-->
							<button type="submit" class="btn btn-success" id="save_and_next_page4">Save & Next </button>
							<button type="button" class="btn btn-primary skip_step_four display_none">Finish Later</button>
							<!--<label><span class="required">*note: required field checking not applayed yet</span></label>-->
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php echo $disp_none;?>          
  </div>  <?php echo $disp_1;?>				