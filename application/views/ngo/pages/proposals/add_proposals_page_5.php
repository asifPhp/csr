<?php

	$page_heading = '';
    $heading = '';
	
	if($proposal_data ){
		$page_heading = 'Edit Proposal';
        $heading = 'Edit Proposal';
		$prop_id =$proposal_data['prop_id']; 
		$title =$proposal_data['title'];  
        $organisation_id =$proposal_data['organisation_id'];  
        $ngo_id =$proposal_data['ngo_id'];  
        $code =$proposal_data['code'];

        $total_funds=$proposal_data['total_funds'];
        $total_funds_org=$proposal_data['total_funds_org'];
        $balance_funds=$proposal_data['balance_funds'];
        $upload_budget_file_template=$proposal_data['upload_budget_file_template'];
        $upload_budget_file_template_actual=$proposal_data['upload_budget_file_template_actual'];
		
		$multiple_img_upload2= json_decode($proposal_data['multiple_img_upload2'] ,true);
		$is_add_edit='edit';
        $is_readonly="readOnly" ;
        $disp_none='';
        $disp_1='';
        $disp_none_step='display_none';
        $disp_none_view='';
		
		if($organisation_data){
			foreach($organisation_data as $value){
				if($organisation_id == $value['org_id']){
					$org_name = $value['org_name'];
				}
			}
		}
		
		if($edit_with_add=='yes'){
			$disp_none='<!--';
			$disp_1='-->';
			$disp_none_step='';
			$disp_none_view='display_none';
			$page_heading = 'Create New Proposal';
			$is_add_edit='add';	
		}else{
			$disp_none='';
			$disp_1='';
			$disp_none_view='';
			$disp_none_step='display_none';
		}
	
	}else{
		$page_heading = 'Create New Proposal';
        $heading = 'Add New Proposal';
		$prop_id =0;
		$title ='';
        $organisation_id ='';
        $ngo_id ='';
        $code ='';
		$org_name ='';
        $total_funds='';
        $total_funds_org='';
        $balance_funds='';
        $multiple_img_upload2='';
		$is_add_edit='add';
        $is_readonly="";
		$disp_none='<!--';
        $disp_1='-->';
        $disp_none_step='';
        $disp_none_view='display_none';
        $upload_budget_file_template='';
        $upload_budget_file_template_actual='';
	}
	
	
	?>
<style>	
	.input_description{font-weight: 400;}
	.multii_2{
		border:none;
		color: #3c8dbc;
	}
</style>	
	<?php echo $disp_none;?>  
<div class="">
  <?php echo $disp_1;?> 
	<div id="alert_danger_error"></div>
	<input type="hidden" class="form-control" id="is_add_edit5" value='<?php echo $is_add_edit; ?>'>
	<div role="tabpanel" class="tab-pane" id="page5">
		<div class="box box-primary">
		<?php //var_dump($proposal_data)?>
		<?php //var_dump($organisation_data)?>
			<div class="box-header with-border">
				<h3 class="box-title">Budgeting Details</h3>
            </div>
			<div class="box-body">
				<form id="add_proposal5" method="post" role="form">
					<input type="hidden" class="form-control" id="prop_id" name="prop_id" value="<?php echo $prop_id;?>">
					<div class="row bs-wizard  <?php echo $disp_none_step;?>" style="border-bottom:0;">
						
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
						<div class="col-xs-2 bs-wizard-step complete"><!-- disabled -->
						  <div class="text-center bs-wizard-stepnum">Step 4</div>
						  <div class="progress"><div class="progress-bar"></div></div>
						  <a href="#page4" role="tab" data-toggle="tab" class="bs-wizard-dot"></a>
						</div>
						<div class="col-xs-2 bs-wizard-step active"><!-- disabled -->
						  <div class="text-center bs-wizard-stepnum">Step 5</div>
						  <div class="progress"><div class="progress-bar"></div></div>
						  <a href="#page5" role="tab" data-toggle="tab" class="bs-wizard-dot"></a>
						</div>
						
					</div>
					<div class="form-group">
						<label for="total_funds">Total funds required for the project (in INR Lakhs)<span class="required">*</span></label>
						<input type="number" class="form-control" id="total_funds" name="total_funds" placeholder="Enter amount here" value="<?php echo $total_funds;?>">
					</div>
					<div class="form-group">
						<label for="total_funds_org">Total funds requested from <span class="selected_csr_organisation"></span><?php echo $org_name;?> (in INR Lakhs)<span class="required">*</span></label>
						<input type="number" class="form-control" id="total_funds_org" name="total_funds_org" placeholder="Enter amount here" value="<?php echo $total_funds_org;?>">
					</div>
					<div class="form-group">
						<label for="balance_funds">Source of balance funds<span class="required">*</span></label>
						<textarea rows="3" class="form-control" id="balance_funds" name="balance_funds" placeholder="Source of balance funds" value=""><?php echo $balance_funds;?></textarea>
					</div>
					
					<div class="form-group">
						<label for="file_upload_template">Please download attached budget file template. Upload once it has been filled.<span class="required">*</span></label><br>
						<a href="<?php echo base_url();?>assets/doc/Budget_Template.xlsx" download target="_blank">
							Download and fill out this template with the required details. Upload here once data has been entered.
						</a><br>
						<!--<label class="input_description">Download and fill out this template with the required details. Upload here once data has been entered.</label>-->
						
						<div class="col-md-12" style="margin-top: 15px;">
							<button type="button" id="comman_file_upload_class" name="comman_file_upload_class" image_upload_desc="File must be less than 10MB in size.We prefer if you can provide .pdf versions of your document." upload_type="file" file_count="single" img_primary="no" file_prev_class="activitie_project_selected" file_input_id="upload_budget_file_template" class="btn btn-primary btn-lg comman_file_upload_class" data-toggle="modal" data-target="#browseFile"><i class="fa fa-upload"></i>
							</button>&nbsp;&nbsp;
							<div>
								<div class="">
									<input readOnly class="form-control project upload_budget_file_template " id="upload_budget_file_template" name="upload_budget_file_template" type="hidden" value="<?php echo $upload_budget_file_template ?>" style="color:#3c8dbc; border:none;">
								</div>
								<span class="registration_80g_valid" ></span>
								<div class="image-preview inline_block activitie_project_selected ">
									<input readOnly class="form-control is_edit_data <?php if (!$upload_budget_file_template_actual){ echo 'display_none'; } ?>" type="text" id="upload_budget_file_template_actual" value="<?php echo $upload_budget_file_template_actual ?>" style="color:#3c8dbc; border:none;">
								</div>
							</div><br>
							<label  class="project_activities_error required display_none">Atleast one file attachment is required.</label>
							
						</div>
						
					</div><br>
					
					<br><div class="form-group">
						<label for="file_upload_related">Upload any other proposal related documents</label></br>
						<label for="file_upload_multi" class="input_description">You can upload multiple documents here</label></br>
					<div class="col-md-12">	
						<button type="button"  name="comman_file_upload_class1" id="comman_file_upload_class1" image_upload_desc="File must be less than 10MB in size.We prefer if you can provide .pdf versions of your document." upload_type="file" file_count="multiple" img_primary="no" file_prev_class="other_proposal_related_documents" file_input_id="registration_80g_certificate" class="btn btn-primary btn-lg comman_file_upload_class1" data-toggle="modal" data-target="#browseFile1"><i class="fa fa-upload"></i> </button>
					</div>	
						<div class="row">
							<div class="image-preview inline_block other_proposal_related_documents">
								<?php 
									if($multiple_img_upload2){
										foreach($multiple_img_upload2 as $details){
								?>
											<div class="file_dives col-sm-3" addr="<?php echo $details['file_dives'] ?>">
												<div class="input" style="padding:4%;">
													<input readonly="" type="text" class="form-control multii_2" value="<?php echo $details['file_dives_actual'] ?>" >
													
													<input type="text" style="margin-top:3%;" class="form-control file_description " value="<?php echo $details['file_name'] ?>" placeholder="File name/Description">
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
					</div>
					<div class="box-footer clearfix">
						<div class="form-group <?php echo $disp_none_view;?>">
							<span class="btn btn-default cancel_page" align="<?php echo $prop_id;?>">Cancel</span>
							<span  class="btn btn-success " id="save_page5">Save Changes</span>
						</div>

						<div class="form-group <?php echo $disp_none_step;?>">
							<!--<button type="button" class="btn btn-success save_page5">Save</button>-->
							<button type="submit" class="btn btn-success" id="save_step5">Save</button>
							<button type="button" class="btn btn-primary skip_step_five display_none">Finish Later</button>
							<!--<label><span class="required">*note: required field checking not applayed yet</span></label>-->
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php echo $disp_none;?>          
</div>  <?php echo $disp_1;?>				