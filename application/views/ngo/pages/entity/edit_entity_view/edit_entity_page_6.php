   <?php
$financial_years=$this->db->get_where('financial_years')->result();

if($entity_data){
	$display_none='';
	$display_none_='display_none';
	$display_none1='';	
	$entity_id=$entity_data['id'];
	$ngo_id=$entity_data['id'];
	$optradio_policy=$entity_data['optradio_policy'];
	$optradio_whistleblower_policy=$entity_data['optradio_whistleblower_policy'];
	$optradio_child_protection_policy=$entity_data['optradio_child_protection_policy'];
	$superngo_id=$entity_data['superngo_id'];
	$other_policies_name=$entity_data['other_policies_name'];
	$other_policies= json_decode($entity_data['other_policies'] ,true);
	$multiple_img_upload= json_decode($entity_data['multiple_img_upload'] ,true);
	$multiple_img_upload2= json_decode($entity_data['multiple_img_upload2'] ,true);
	$padding='padding-left: 18px';	
	$is_edit='';	
	$is_add_edit='edit';
	$edit_title='<section class="content-header"><a href="'.base_url().'ngo/entity/edit?id='.$ngo_id.'" class="btn btn-default pull-right">Back</a>  <h1> Edit Entity </h1> </section>';
}else{
	$entity_id='';
	$superngo_id='';
	$ngo_id='';
	$optradio_policy='';
	$optradio_whistleblower_policy='';
	$optradio_child_protection_policy='';
	$other_policies_name='';
	$other_policies='';
	$multiple_img_upload='';
	$multiple_img_upload2='';
	$display_none='<!--';
	$display_none1='-->';
	$display_none_='';	
	$padding='padding-left: 0px';
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

.multii_1{
	border:none;
	color:#3c8dbc;
}.multii_2{
	border:none;
	color:#3c8dbc;
}
.input_description{font-weight: 400;}
</style>
<?php echo $display_none ?><div class="content-wrapper">
<?php echo $edit_title;?>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<input type="hidden" class="form-control" id="entity_id" name="entity_id" value="<?php echo $entity_id;?>">
				<input type="hidden" class="form-control" id="is_add_edit6" value='<?php echo $is_add_edit; ?>'>
				<div id="err_add_plan"></div><?php echo $display_none1 ?>	
				<?php //var_dump($entity_data)?>
				<?php //var_dump($multiple_img_upload2)?>
				<div id="alert_danger_error"></div>
<div role="tabpanel" class="tab-pane" id="page6">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Organisation Policies & Other Documents</h3>
		</div>
		<div class="box-body">
			<div class="row bs-wizard <?php echo $display_none_ ?>" style="border-bottom:0;">
				<div class="col-xs-2 bs-wizard-step complete"><!-- complete -->
					<div class="text-center bs-wizard-stepnum">Step 1</div>
					<div class="progress"><div class="progress-bar"></div></div>
					<a href="#page1" role="tab" data-toggle="tab" class="bs-wizard-dot"></a>
				</div>
				<div class="col-xs-2 bs-wizard-step complete"><!-- complete -->
					<div class="text-center bs-wizard-stepnum">Step 2</div>
					<div class="progress"><div class="progress-bar"></div></div>
					<a href="#page2" role="tab" data-toggle="tab" class="bs-wizard-dot"></a>
				</div>
				<div class="col-xs-2 bs-wizard-step complete"><!-- complete -->
					<div class="text-center bs-wizard-stepnum">Step 3</div>
					<div class="progress"><div class="progress-bar"></div></div>
					<a href="#page3" role="tab" data-toggle="tab" class="bs-wizard-dot"></a>
				</div>
				<div class="col-xs-2 bs-wizard-step complete"><!-- complete -->
					<div class="text-center bs-wizard-stepnum">Step 4</div>
					<div class="progress"><div class="progress-bar"></div></div>
					<a href="#page4" role="tab" data-toggle="tab" class="bs-wizard-dot"></a>
				</div>
				<div class="col-xs-2 bs-wizard-step complete"><!-- complete -->
					<div class="text-center bs-wizard-stepnum">Step 5</div>
					<div class="progress"><div class="progress-bar"></div></div>
					<a href="#page5" role="tab" data-toggle="tab" class="bs-wizard-dot"></a>
				</div>
				<div class="col-xs-2 bs-wizard-step active"><!-- active -->
					<div class="text-center bs-wizard-stepnum">Step 6</div>
					<div class="progress"><div class="progress-bar"></div></div>
					<a href="#page6" role="tab" data-toggle="tab" class="bs-wizard-dot"></a>
				</div>
			</div>
			<form id="entity_step6_form" method="post" role="form">
				<h5>Key Organisation Policies</h5>
				<div class="form-group">
					<label for=" ">Do you have policies related to the Prevention of Sexual Harassment at the Workplace?<span class="required">*</span></label>
					<label class="radio-inline" style="margin-left:10px;">
						<input type="radio" class="policy_related_prevention" name="optradio_policy" value="yes" <?php if ($optradio_policy === 'yes'){ echo 'checked="checked"'; } ?>>Yes
					</label>  
					<label class="radio-inline">  
						<input type="radio" class="policy_related_prevention" name="optradio_policy" value="No" <?php if ($optradio_policy === 'No'){ echo 'checked="checked"'; } ?>>No
					</label>
					<div class="policies1_error"></div>
				</div>
				<div class="form-group">
					<label for=" ">Do you have a Whistleblower policy?<span class="required">*</span></label>
					<label class="radio-inline" style="margin-left:10px;">
						<input type="radio" class="whistleblower_policy" name="optradio_whistleblower_policy" value="yes" <?php if ($optradio_whistleblower_policy === 'yes'){ echo 'checked="checked"'; } ?>>Yes
					</label>  
					<label class="radio-inline">  
						<input type="radio" class="whistleblower_policy" name="optradio_whistleblower_policy" value="No" <?php if ($optradio_whistleblower_policy === 'No'){ echo 'checked="checked"'; } ?>>No
					</label>
					<div class="whistleblower_policy_error"></div>
				</div>
				<div class="form-group">
					<label for=" ">Do you have a Child Protection policy in place?  <span class="required">*</span></label>
					<label class="radio-inline" style="margin-left:10px;">
						<input type="radio" class="child_protection_policy" name="optradio_child_protection_policy" value="yes" <?php if ($optradio_child_protection_policy === 'yes'){ echo 'checked="checked"'; } ?>>Yes
					</label>  
					<label class="radio-inline">  
						<input type="radio" class="child_protection_policy" name="optradio_child_protection_policy" value="No" <?php if ($optradio_child_protection_policy === 'No'){ echo 'checked="checked"'; } ?>>No
					</label>
					<div class="child_protection_policy_error"></div>
				</div>
				<div class="form-group">
					<label for=" ">What other policies do you have? <span class="required">*</span></label>
					<label class="checkbox" style="<?php echo $padding; ?>">
						<input type="checkbox" class="other_policies" name="optradio" value="Travel Policy (including details of incidentals)" <?php if($other_policies){ if((in_array("Travel Policy (including details of incidentals)",$other_policies)) == true) { echo 'checked'; }}?>>Travel Policy (including details of incidentals)
					</label>  
					<label class="checkbox" style="<?php echo $padding; ?>">  
						<input type="checkbox" class="other_policies" name="optradio" value="Salary and Perks/Benefits Policy" <?php if($other_policies){ if((in_array("Salary and Perks/Benefits Policy",$other_policies)) == true) { echo 'checked'; }}?>>Salary and Perks/Benefits Policy
					</label>
					<label class="checkbox" style="<?php echo $padding; ?>">  
						<input type="checkbox" class="other_policies" name="optradio" value="Recruitment Policy" <?php if($other_policies){ if((in_array("Recruitment Policy",$other_policies)) == true) { echo 'checked'; }}?>>Recruitment Policy
					</label>
					<label class="checkbox" style="<?php echo $padding; ?>">  
						<input type="checkbox" class="other_policies" name="optradio" value="Accounting and Audit Policy" <?php if($other_policies){ if((in_array("Accounting and Audit Policy",$other_policies)) == true) { echo 'checked'; }}?>>Accounting and Audit Policy
					</label>
					<label class="checkbox" style="<?php echo $padding; ?>">  
						<input type="checkbox" class="other_policies other_policies_name" name="optradio" value="Other(s)" <?php if($other_policies){ if((in_array("Other(s)",$other_policies)) == true) { echo 'checked'; }}?>>Other(s)
					</label>
					
					<label class="checkbox" style="<?php echo $padding; ?>">  
						<input type="checkbox" class="other_policies what_other_policies" name="optradio" value="None" <?php if($other_policies){ if((in_array("None",$other_policies)) == true) { echo 'checked'; }}?>>None
					</label>
					
					<div class="form-group otherpolicies <?php if($other_policies){ if((in_array("Other(s)",$other_policies)) == true) {}else{ echo 'display_none'; }}else{ echo 'display_none';}?>">
						<input type="text" class="form-control otherpolicies" id="other_policies_name" name="other_policies_name" placeholder="Enter the other policies name" value="<?php echo $other_policies_name ?>">
					</div>
					
					<div class="other_policies_error"></div>
				</div>
				<div class="other_policies_error_txt display_none error">Please provide the detail</div>
				<div class="form-group">
					<label for=" ">Please upload copies of all the policies you have indicated above<span class="required">*</span></label><br>
					<label class="input_description">You can upload multiple documents here</label>
					<div class="col-lg-12" id="multiple_img_upload_div" style="min-height: 55px;">
						<button type="button" upload_type="file" file_count="multiple" img_primary="no" image_upload_desc="File must be less than 10MB in size.We prefer if you can provide .pdf versions of your document." file_prev_class="copies_all_policies" file_input_id="fy_3last_year" class="btn btn-primary btn-lg comman_file_upload_class1" data-toggle="modal" data-target="#browseFile1"><i class="fa fa-upload"></i> </button>
						<input class="form-control fy_3last_year" id="fy_3last_year" name="fy_3last_year" type="hidden" value="">
						<div class="image-preview inline_block image_preview_div copies_all_policies" id="image_preview_div">
							<input readonly class="form-control display_none image1_preview_input display_upload_image_name" name="image1_preview_input" type="text" id="multiple_img" value="">
							<?php 
								if($multiple_img_upload){
									foreach($multiple_img_upload as $details){
							?>
								<div class="file_dives col-sm-3" addr="<?php echo $details['file_dives'] ?>">
									<div class="input" >
										<input readonly="" type="text" class="form-control multii_2" value="<?php echo $details['file_dives_actual'] ?>">
										<input type="text" style="margin-top:3%;" class="form-control file_description" value="<?php echo $details['file_name'] ?>" placeholder="File name/Description">
										<button type="button" class="btn img_remover1">x</button>
									</div>
								</div>
							<?php 
									}
								}
							?>	
						</div>
					</div>
				</div>
				<div class="copies_policies_err display_none error">Please upload one file.</div>
				<br/>
				<h5>Additional Documents</h5>
				<div class="form-group">
					<label for="upload documents">Please upload any other relevant documents you would like to share with us about this entity</label><br>
					<label class="input_description">For each document, enter a short sentence that states what the document is</label>
					<div class="col-lg-12" style="min-height: 55px;">
						<button type="button" upload_type="file" file_count="multiple" img_primary="no" image_upload_desc="File must be less than 10MB in size.We prefer if you can provide .pdf versions of your document." file_prev_class="other_relevant_doc" file_input_id="fy_3last_year2" class="btn btn-primary btn-lg comman_file_upload_class1" data-toggle="modal" data-target="#browseFile1"><i class="fa fa-upload"></i> </button>
						<input class="form-control fy_3last_year" id="fy_3last_year2" name="fy_3last_year2" type="hidden" value="">
						<div class="image-preview inline_block image_preview_div2 other_relevant_doc">
							<input readonly class="form-control display_none image_preview_input display_upload_image_name" type="text" id="" value="">
							<?php 
								if($multiple_img_upload2){
									foreach($multiple_img_upload2 as $details){
							?>
								<div class="file_dives col-sm-3" addr="<?php echo $details['file_dives'] ?>"><div class="input" ><input readonly="" type="text" class="form-control multii_2" value="<?php echo $details['file_dives_actual'] ?>">
								<input type="text" style="margin-top:3%;" class="form-control file_description" value="<?php echo $details['file_name'] ?>" placeholder="File name/Description">
								<button type="button" class="btn btn-danger img_remover1" style="margin-top:2%;color:white;border-radius:50%;">x</button></div></div>
							<?php 
									}
								}
							?>
						</div>
					</div>
				</div>
				<div class="other_relevanterr display_none error">Please upload one file.</div>							
				<br/>			
				<div class="image_preview_div2" id="image_preview2"></div>		
				<div class="form-group">
					<span class="btn btn-default cancel_page <?php echo $is_edit; ?>" align="<?php echo $entity_id; ?>" >Cancel</span>
					<button type="button" class="btn btn-success save_page6 <?php echo $is_edit; ?>">Save Changes</button>
					<?php if($is_edit == 'display_none'){?>
					<button type="submit" class="btn btn-success" id="submit_page6">Save</button>
					<?php }?>
					<span class="btn btn-primary skip_step_six display_none">Finish Later</span>
				</div>
			</form>
		</div>
	</div>
</div>
<?php echo $display_none ?></div>
		</div>
	</section> 
</div><?php echo $display_none1 ?>