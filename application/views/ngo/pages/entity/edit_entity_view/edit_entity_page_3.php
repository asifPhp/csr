<?php
	$current_year=date('Y');
	$current_date=date('Y-m-d');
	$april_date =$current_year.'-04-01';
	//$current_date=('2021-03-01');
	//var_dump($april_date);
	//var_dump($current_date);
	
	if($current_date >$april_date){
		$current_year = $current_year-1;
		$april_date=$current_year.'-04-01';
	}else{
		$current_year = $current_year-2;
		$april_date=$current_year.'-04-01';
	}
	$sql5="SELECT * FROM `financial_years` WHERE start_date <= '$april_date'  ORDER BY financial_id DESC LIMIT 3" ;
	$financial_years = $this->db->query($sql5)->result_array(); 
	$financial_years1=$financial_years[2]['name'];
	$financial_years2=$financial_years[1]['name'];
	$financial_years3=$financial_years[0]['name'];
	
	
if($entity_data){
	$entity_id=$entity_data['id'];
	$ngo_id=$entity_data['id'];
	$superngo_id=$entity_data['superngo_id'];
	$is_non_financial_partnerships=$entity_data['is_non_financial_partnerships'];  
	$non_financial_partnerships='';
	if($is_non_financial_partnerships == 'Yes'){
		$non_financial_partnerships=$entity_data['non_financial_partnerships'];
	}
	$optradio2=$entity_data['optradio2'];
	$optradio3=$entity_data['optradio3'];
	$optradio4=$entity_data['optradio4'];
	$optradio5=$entity_data['optradio5'];
	$optradio6=$entity_data['optradio6'];
	$optradio7=$entity_data['optradio7'];
	$is_political_affiliation=$entity_data['is_political_affiliation'];
	$is_guilty=$entity_data['is_guilty'];
	$is_leadership_network=$entity_data['is_leadership_network'];
	$is_blacklist=$entity_data['is_blacklist'];
	$leadership_network='';
	if($is_leadership_network == 'Yes'){
		$leadership_network=$entity_data['leadership_network'];
	}
	$guilty='';
	if($is_guilty == 'Yes'){
		$guilty=$entity_data['guilty'];
	}
	$blacklist='';
	if($is_blacklist == 'Yes'){
		$blacklist=$entity_data['blacklist'];
	}
	$religious_affiliation_on_radio='';
	if($is_political_affiliation == 'Yes'){
		$religious_affiliation_on_radio=$entity_data['religious_affiliation_on_radio'];
	}
	$bajaj_group_involved='';
	if($optradio2 == 'Yes'){
		$bajaj_group_involved=$entity_data['bajaj_group_involved'];
	}
	$senior_member_involved='';
	if($optradio3 == 'Yes'){
		$senior_member_involved=$entity_data['senior_member_involved'];
	}
	$previously_recieve_funding='';
	if($optradio4 == 'Yes'){
		$previously_recieve_funding=$entity_data['previously_recieve_funding'];
	}
	$received_award='';
	if($optradio5 == 'Yes'){
		$received_award=$entity_data['received_award'];
	}
	$received_national_award='';
	if($optradio6 == 'Yes'){
		$received_national_award=$entity_data['received_national_award'];
	}
	$upload_annual_report_1=$entity_data['upload_annual_report_1'];
	$upload_annual_report_2=$entity_data['upload_annual_report_2'];
	$upload_annual_report_3=$entity_data['upload_annual_report_3'];
	$upload_annual_report_1_actual=$entity_data['upload_annual_report_1_actual'];
	$upload_annual_report_2_actual=$entity_data['upload_annual_report_2_actual'];
	$upload_annual_report_3_actual=$entity_data['upload_annual_report_3_actual'];
	$display_none='';
	$display_none_='display_none';
	$display_none1='';
	$padding='padding-left: 18px';
	$governing_council=json_decode($entity_data['governing_council'], true);
	$is_edit='';
	$edit_title='<section class="content-header"><a href="'.base_url().'ngo/entity/edit?id='.$ngo_id.'" class="btn btn-default pull-right">Back</a><h1> Edit Entity </h1> </section>';
	$is_add_edit='edit';
	
	$page3_financial_years=json_decode($entity_data['page3_financial_years'], true);
	if($page3_financial_years){
		$financial_years1=$page3_financial_years[0]['financial_years1'];
		$financial_years2=$page3_financial_years[0]['financial_years2'];
		$financial_years3=$page3_financial_years[0]['financial_years3'];
		//var_dump($page3_financial_years);
	}else{
		$current_year=date('Y');
		//var_dump($current_year);
		$current_date=date('Y-m-d');
		$april_date =$current_year.'-04-01';
		//$current_date=('2021-03-01');
		//var_dump($current_date);
		//var_dump($april_date);
		if($current_date >$april_date){
			$current_year = $current_year-1;
			$april_date=$current_year.'-04-01';
		}else{
			$current_year = $current_year-2;
			$april_date=$current_year.'-04-01';
		}
		
		
		$sql5="SELECT * FROM `financial_years` WHERE start_date <= '$april_date'  ORDER BY financial_id DESC LIMIT 3" ;
		$financial_years = $this->db->query($sql5)->result_array(); 
		$financial_years1=$financial_years[2]['name'];
		$financial_years2=$financial_years[1]['name'];
		$financial_years3=$financial_years[0]['name'];
		//var_dump($financial_years3);
	}
	
	
}else{
	
	
	$entity_id='';
	$ngo_id='';
	$superngo_id='';
	$is_non_financial_partnerships='';
	$optradio2='';
	$optradio3='';
	$optradio4='';
	$optradio5='';
	$optradio6='';
	$optradio7='';
	$is_political_affiliation='';
	$is_guilty='';
	$is_leadership_network='';
	$leadership_network='';
	$blacklist='';
	$is_blacklist='';
	$guilty='';
	$non_financial_partnerships='';
	$religious_affiliation_on_radio='';
	$bajaj_group_involved='';
	$senior_member_involved='';
	$previously_recieve_funding='';
	$received_award='';
	$received_national_award='';
	$upload_annual_report_1='';
	$upload_annual_report_2='';
	$upload_annual_report_3='';
	$upload_annual_report_1_actual='';
	$upload_annual_report_2_actual='';
	$upload_annual_report_3_actual='';
	$governing_council='';
	$display_none='<!--';
	$display_none1='-->';
	$display_none_='';
	$padding='padding-left: 0px';
	$is_edit='display_none';
	$edit_title='';
	$is_add_edit='add';
}
//var_dump((in_array("been_found_guilty_of_diversion_or_misutilisation_of_funds",$governing_council)));

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
				<input type="hidden" class="form-control" id="is_add_edit3" value='<?php echo $is_add_edit; ?>'>
				
				<div id="err_add_plan"></div><?php echo $display_none1 ?>	
				
				<?php //var_dump($entity_data);?>
				<div id="alert_danger_error"></div>
				<div role="tabpanel" class="tab-pane" id="page3">
					<div class="box box-primary">
						<div class="box-header with-border">
							<h3 class="box-title">Other Details</h3>
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
								<div class="col-xs-2 bs-wizard-step active"><!-- active -->
								  <div class="text-center bs-wizard-stepnum">Step 3</div>
								  <div class="progress"><div class="progress-bar"></div></div>
								  <a href="#page3" role="tab" data-toggle="tab" class="bs-wizard-dot"></a>
								</div>
								<div class="col-xs-2 bs-wizard-step disabled"><!-- disabled -->
								  <div class="text-center bs-wizard-stepnum">Step 4</div>
								  <div class="progress"><div class="progress-bar"></div></div>
								  <a href="#page1" role="tab" data-toggle="tab" class="bs-wizard-dot"></a>
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
							<form id="entity_step3_form" method="post" role="form">
								<h5>Linkages</h5>
								<div class="form-group">
									<label for="is_non_financial_partnerships">Does the organisation have any non-financial partnerships (University linkages etc)? <span class="required">*</span></label>
									<label class="radio-inline" style="margin-left:10px;">
									  <input type="radio" class="show_on_radio_click is_non_financial" name="is_non_financial_partnerships" value="Yes" <?php if ($is_non_financial_partnerships === 'Yes'){ echo 'checked="checked"'; } ?>>Yes
									</label>  
									<label class="radio-inline">  
									  <input type="radio" class="show_on_radio_click is_non_financial" name="is_non_financial_partnerships" value="No" <?php if ($is_non_financial_partnerships === 'No'){ echo 'checked="checked"'; } ?>>No
									</label>
									<textarea class="form-control show_on_radio_data  <?php if (!$is_non_financial_partnerships || $is_non_financial_partnerships === 'No'){ echo 'display_none'; } ?>" id="non_financial_partnerships" name="non_financial_partnerships" placeholder="Provide the details of such associations" ><?php echo $non_financial_partnerships ?></textarea>
									<div class="org_nonfinancial"></div>
								</div>
								<div class="nonfinancial_err display_none error">Please provide the details.</div>
								<div class="form-group">
									<label for="is_leadership_network">Is the leadership of the organisation part of any networks? <span class="required">*</span></label>
									<label class="radio-inline" style="margin-left:10px;">
									  <input type="radio" class="show_on_radio_click leadership_of_org" name="is_leadership_network" value="Yes" <?php if ($is_leadership_network === 'Yes'){ echo 'checked="checked"'; } ?>>Yes
									</label>  
									<label class="radio-inline">  
									  <input type="radio" class="show_on_radio_click leadership_of_org" name="is_leadership_network" value="No" <?php if ($is_leadership_network === 'No'){ echo 'checked="checked"'; } ?>>No
									</label>
									<textarea class="form-control show_on_radio_data  <?php if (!$is_leadership_network || $is_leadership_network === 'No'){ echo 'display_none'; } ?>" id="leadership_network" name="leadership_network" placeholder="Provide details for the same" ><?php echo $leadership_network ?></textarea>
									<div class="org_leadership"></div>
									<div class="leadership_err display_none error">Please provide the details.</div>
								</div>
								<h5>Litigation, Blacklists, and Violations</h5>
								<div class="form-group">
									<label for="is_blacklist">Please indicate if the organisation has ever been blacklisted (By any government agencies/departments, donors, lenders, development agencies) <span class="required">*</span>   </label>
									<label class="radio-inline" style="margin-left:10px;">
									  <input type="radio" class="show_on_radio_click org_has_ever_blacklisted" name="is_blacklist" value="Yes" <?php if ($is_blacklist === 'Yes'){ echo 'checked="checked"'; } ?>>Yes
									</label>  
									<label class="radio-inline">  
									  <input type="radio" class="show_on_radio_click org_has_ever_blacklisted" name="is_blacklist" value="No" <?php if ($is_blacklist === 'No'){ echo 'checked="checked"'; } ?>>No
									</label>
									<textarea class="form-control show_on_radio_data <?php if (!$is_blacklist || $is_blacklist === 'No'){ echo 'display_none'; } ?>" id="blacklist" name="blacklist" placeholder="Provide details for the same" ><?php echo $blacklist ?></textarea>
									<div class="org_has_ever_blacklisted_err"></div>
									<div class="org_has_ever_blacklisted_err_textarea display_none error">Please provide the details.</div>
								</div>
								<div class="form-group">
									<label for="is_guilty">Please indicate if the organisation has been found guilty or penalised for any policy guideline issued by various government bodies or regulators <span class="required">*</span></label>
									<label class="radio-inline" style="margin-left:10px;">
									  <input type="radio" class="show_on_radio_click org_found_guilty" name="is_guilty" value="Yes" <?php if ($is_guilty === 'Yes'){ echo 'checked="checked"'; } ?>>Yes
									</label>  
									<label class="radio-inline">  
									  <input type="radio" class="show_on_radio_click org_found_guilty" name="is_guilty" value="No" <?php if ($is_guilty === 'No'){ echo 'checked="checked"'; } ?>>No
									</label>
									<textarea class="form-control show_on_radio_data <?php if (!$is_guilty || $is_guilty === 'No'){ echo 'display_none'; } ?>" id="guilty" name="guilty" placeholder="Provide details for the same" ><?php echo $guilty ?></textarea>
									<div class="org_found_guilty_radio"></div>
									<div class="org_found_guilty_err display_none error">Please provide the details.</div>
								</div>
								<div class="form-group">
									<label for="">Please indicate if the organisation or any member of governing council/executive committee, including chief functionary has: <span class="required">*</span>&nbsp&nbsp</label>
									<label class="checkbox checkbox_label" style="<?php echo $padding; ?>">
										<input type="checkbox" name="organisation_chief_functionary" class="organisation_chief_functionary governing_council"  value="been convicted by any court of law" <?php if($governing_council){ if((in_array("been convicted by any court of law",$governing_council)) == true) { echo 'checked'; }}?>> been convicted by any court of law 
									</label>
									<label class="checkbox checkbox_label" style="<?php echo $padding; ?>">
										<input type="checkbox" name="organisation_chief_functionary" class="organisation_chief_functionary governing_council"  value="been found guilty of diversion or misutilisation of funds" <?php if($governing_council){ if((in_array("been found guilty of diversion or misutilisation of funds",$governing_council)) == true){ echo 'checked'; }}?>> been found guilty of diversion or misutilisation of funds 
									</label>
									<label class="checkbox checkbox_label" style="<?php echo $padding; ?>">
										<input type="checkbox" name="organisation_chief_functionary" class="organisation_chief_functionary governing_council"  value="defaulted to any financial institution/bank" <?php if($governing_council){ if((in_array("defaulted to any financial institution/bank",$governing_council)) == true) { echo 'checked'; }}?>> defaulted to any financial institution/bank
									</label>
									<label class="checkbox checkbox_label" style="<?php echo $padding; ?>">
										<input type="checkbox" name="organisation_chief_functionary" class="pending_criminal_cases_against_him_her governing_council"  value="pending criminal cases against him/her" <?php if($governing_council){ if((in_array("pending criminal cases against him/her",$governing_council)) == true) { echo 'checked'; }}?>> pending criminal cases against him/her
									</label>
									<label class="checkbox checkbox_label" style="<?php echo $padding; ?>">
										<input type="checkbox" name="organisation_chief_functionary" class="none_of_the_above governing_council"  value="none of the above" <?php if($governing_council){ if((in_array("none of the above",$governing_council)) == true) { echo 'checked'; }}?>> none of the above
									</label>
									<div class="organisation_chief_functionary_err"></div>
								</div>
								<h5>Affiliations</h5>
								<div class="form-group">
									<label for="is_political_affiliation">Does the organisation have any political or religious affiliation?  <span class="required">*</span></label>
									<label class="radio-inline" style="margin-left:10px;">
									  <input type="radio" class="show_on_radio_click org_have_religious_affi" name="is_political_affiliation" value="Yes" <?php if ($is_political_affiliation === 'Yes'){ echo 'checked="checked"'; } ?>>Yes
									</label>  
									<label class="radio-inline">  
									  <input type="radio" class="show_on_radio_click org_have_religious_affi" name="is_political_affiliation" value="No" <?php if ($is_political_affiliation === 'No'){ echo 'checked="checked"'; } ?>>No
									</label>
									<textarea class="form-control show_on_radio_data <?php if (!$is_political_affiliation || $is_political_affiliation === 'No'){ echo 'display_none'; } ?>" id="religious_affiliation_on_radio" name="religious_affiliation_on_radio" placeholder="Provide details for the same" ><?php echo $religious_affiliation_on_radio ?></textarea>
									<div class="organisation_political_err"></div>
									<div class="organisation_political_err_textarea display_none error">Please provide the details.</div>
								</div>
								<div class="form-group">
									<label for=" ">Are any Board members/senior managers (including relatives) of the Bajaj Group involved with the organisation? <span class="required">*</span></label>
									<label class="radio-inline" style="margin-left:10px;">
									  <input type="radio" class="show_on_radio_click board_members_senior_managers" name="optradio2" value="Yes" <?php if ($optradio2 === 'Yes'){ echo 'checked="checked"'; } ?>>Yes
									</label>  
									<label class="radio-inline">  
									  <input type="radio" class="show_on_radio_click board_members_senior_managers" name="optradio2" value="No" <?php if ($optradio2 === 'No'){ echo 'checked="checked"'; } ?>>No
									</label>
									<textarea class="form-control show_on_radio_data <?php if (!$optradio2 || $optradio2 === 'No'){ echo 'display_none'; } ?>" id="bajaj_group_involved" name="bajaj_group_involved " placeholder="Provide details for the same" ><?php echo $bajaj_group_involved ?></textarea>
									<div class="board_member_err"></div>
									<div class="board_member_err_textarea display_none error">Please provide the details.</div>
								</div>
								<div class="form-group">
									<label for=" ">Are any senior members of the organisation involved with the Bajaj Group (including associations such as vendors)? <span class="required">*</span></label>
									<label class="radio-inline" style="margin-left:10px;">
									  <input type="radio" class="show_on_radio_click senior_member_involved_bajaj" name="optradio3" value="Yes" <?php if ($optradio3 === 'Yes'){ echo 'checked="checked"'; } ?>>Yes
									</label>  
									<label class="radio-inline">  
									  <input type="radio" class="show_on_radio_click senior_member_involved_bajaj" name="optradio3" value="No" <?php if ($optradio3 === 'No'){ echo 'checked="checked"'; } ?>>No
									</label>
									<input type="text" class="form-control show_on_radio_data <?php if (!$optradio3 || $optradio3 === 'No'){ echo 'display_none'; } ?>" id="senior_member_involved" name="senior_member_involved " placeholder="Provide details for the same" value="<?php echo $senior_member_involved ?>">
									<div class="senior_member_involved_bajaj_err"></div>
									<div class="senior_member_involved_bajaj_err_textarea display_none error">Please provide the details.</div>
								</div>
								<div class="form-group">
									<label for=" ">Has the organisation previously received funding from a Bajaj Company or Trust? <span class="required">*</span></label>
									<label class="radio-inline" style="margin-left:10px;">
									  <input type="radio" class="show_on_radio_click received_funding_from_bajaj" name="optradio4" value="Yes" <?php if ($optradio4 === 'Yes'){ echo 'checked="checked"'; } ?>>Yes
									</label>  
									<label class="radio-inline">  
									  <input type="radio" class="show_on_radio_click received_funding_from_bajaj" name="optradio4" value="No" <?php if ($optradio4 === 'No'){ echo 'checked="checked"'; } ?>>No
									</label>
									<textarea class="form-control show_on_radio_data <?php if (!$optradio4 || $optradio4 === 'No'){ echo 'display_none'; } ?>" id="previously_recieve_funding" name="previously_recieve_funding " placeholder="Provide details of the funding" ><?php echo $previously_recieve_funding ?></textarea>
									<div class="received_funding_from_bajaj_err"></div>
									<div class="received_funding_from_bajaj_err_textarea display_none error">Please provide the details.</div>
								</div>
								<div class="form-group">
									<label for=" ">Has the organisation received any award(s) from a Bajaj Company or Trust?<span class="required">*</span></label>
									<label class="radio-inline" style="margin-left:10px;">
									  <input type="radio" class="show_on_radio_click award_from_bajaj" name="optradio5" value="Yes" <?php if ($optradio5 === 'Yes'){ echo 'checked="checked"'; } ?>>Yes
									</label>  
									<label class="radio-inline">  
									  <input type="radio" class="show_on_radio_click award_from_bajaj" name="optradio5" value="No" <?php if ($optradio5 === 'No'){ echo 'checked="checked"'; } ?>>No
									</label>
									<textarea class="form-control show_on_radio_data <?php if (!$optradio5 || $optradio5 === 'No'){ echo 'display_none'; } ?>" id="received_award" name="received_award " placeholder="Provide details of the award(s) received" ><?php echo $received_award ?></textarea>
									<div class="award_from_bajaj_err"></div>
									<div class="award_from_bajaj_err_textarea display_none error">Please provide all the details.</div>
								</div>
								<div class="form-group">
									<label for=" ">Has the organisation received any national/international award(s)?<span class="required">*</span></label>
									<label class="radio-inline" style="margin-left:10px;">
									  <input type="radio" class="show_on_radio_click received_national_award" name="optradio6" value="Yes" <?php if ($optradio6 === 'Yes'){ echo 'checked="checked"'; } ?>>Yes
									</label>  
									<label class="radio-inline">  
									  <input type="radio" class="show_on_radio_click received_national_award" name="optradio6" value="No" <?php if ($optradio6 === 'No'){ echo 'checked="checked"'; } ?>>No
									</label>
									<textarea class="form-control show_on_radio_data <?php if (!$optradio6 || $optradio6 === 'No'){ echo 'display_none'; } ?>" id="received_national_award" name="received_national_award " placeholder="Provide details of the award(s) received" ><?php echo $received_national_award ?></textarea>
									<div class="received_national_award_err"> </div>
									<div class="received_national_award_textfield__err display_none error">Please provide the details.</div>
								</div>
								<div class="form-group">
									<label for=" ">Does the organisation publish annual reports every year?<span class="required">*</span></label>
									<label class="radio-inline" style="margin-left:10px;">
									  <input type="radio" class="show_on_radio_click org_publish_annual_report" name="optradio7" value="Yes" <?php if ($optradio7 === 'Yes'){ echo 'checked="checked"'; } ?>>Yes
									</label>  
									<label class="radio-inline">  
									  <input type="radio" class="show_on_radio_click org_publish_annual_report" name="optradio7" value="No" <?php if ($optradio7 === 'No'){ echo 'checked="checked"'; } ?>>No
									</label>
									<div class="org_publish_annual_report_err"></div>
									
									<div class="show_on_radio_data <?php if (!$optradio7 || $optradio7 === 'No'){ echo 'display_none'; } ?>">
										<!--<label>upload entity annual reports for the previous 3 financial years</label>-->
										<div class="row">
											<div class="form-group col-md-12">
												<label for="fy_last_year">Upload annual report for <span class="financial_years1_text"><?php echo $financial_years1; ?></span><span class="required">*</span></label>
												<div class="col-md-12">
													<button type="button" id="comman_file_upload_class" name="comman_file_upload_class" image_upload_desc="File must be less than 10MB in size.We prefer if you can provide .pdf versions of your document." upload_type="file" file_count="single" img_primary="no" file_prev_class="fy_last_year_selected" file_input_id="fy_last_year" class="btn btn-primary btn-lg comman_file_upload_class" data-toggle="modal" data-target="#browseFile"><i class="fa fa-upload"></i> </button>

													<input class="form-control fy_last_year" id="fy_last_year" name="fy_last_year" type="hidden" value="<?php echo $upload_annual_report_1 ?>">
													<div class="image-preview inline_block fy_last_year_selected">
														<input readonly class="form-control display_upload_image_name <?php if (!$upload_annual_report_1_actual){ echo 'display_none'; } ?>" type="text" id="upload_annual_report_1" value="<?php echo $upload_annual_report_1_actual ?>">
													</div>
												</div>
												<div class="fy_last_year_err display_none error">Please upload one file.</div>
											</div> 
											<div class="form-group col-md-12">
												<label for="fy_2last_year">Upload annual report for <span class="financial_years2_text"><?php echo $financial_years2; ?></span><span class="required">*</span></label>
												<div class="col-md-12">
													<button type="button" id="comman_file_upload_class" name="comman_file_upload_class" image_upload_desc="File must be less than 10MB in size.We prefer if you can provide .pdf versions of your document." upload_type="file" file_count="single" img_primary="no" file_prev_class="fy_2last_year_selected" file_input_id="fy_2last_year" class="btn btn-primary btn-lg comman_file_upload_class" data-toggle="modal" data-target="#browseFile"><i class="fa fa-upload"></i> </button>

													<input class="form-control fy_2last_year" id="fy_2last_year" name="fy_2last_year" type="hidden" value="<?php echo $upload_annual_report_2 ?>">
													<div class="image-preview inline_block fy_2last_year_selected">
														<input readonly class="form-control display_upload_image_name <?php if (!$upload_annual_report_2_actual){ echo 'display_none'; } ?>" id="upload_annual_report_2" type="text" value="<?php echo $upload_annual_report_2_actual ?>">
													</div>
												</div>
												<div class="fy_2last_year_err display_none error">Please upload one file.</div>
											</div>   
											<div class="form-group col-md-12">
												<label for="fy_3last_year">Upload annual report for <span class="financial_years3_text"><?php echo $financial_years3; ?></span><span class="required">*</span></label>
												<div class="col-md-12">
													<button type="button" id="comman_file_upload_class" image_upload_desc="File must be less than 10MB in size.We prefer if you can provide .pdf versions of your document." name="comman_file_upload_class" upload_type="file" file_count="single" img_primary="no" file_prev_class="fy_3last_year_selected" file_input_id="fy_3last_year" class="btn btn-primary btn-lg comman_file_upload_class" data-toggle="modal" data-target="#browseFile"><i class="fa fa-upload"></i> </button>

													<input class="form-control fy_3last_year" id="fy_3last_year" name="fy_3last_year" type="hidden" value="<?php echo $upload_annual_report_3 ?>">
													<div class="image-preview inline_block fy_3last_year_selected">
														<input readonly class="form-control display_upload_image_name <?php if (!$upload_annual_report_3_actual){ echo 'display_none'; } ?>" type="text" id="upload_annual_report_3" value="<?php echo $upload_annual_report_3_actual ?>">
													</div>
												</div>
												<div class="fy_3last_year_err display_none error">Please upload one file.</div>
											</div>    
										</div>    
									</div>    
								</div>
								<div class="form-group">
									<span class="btn btn-default cancel_page <?php echo $is_edit; ?>" align="<?php echo $entity_id; ?>">Cancel</span>
									<span class="btn btn-success save_step save_page3 <?php echo $is_edit; ?>">Save Changes</span>
									<!--<span class="btn btn-success save_step save_page3 <?php echo $display_none_; ?>">Save</span>-->
									<button type="submit" class="btn btn-success save_goto_next_step <?php echo $display_none_; ?>" id="submit_next_page3">Save & Next</button>
									<span class="btn btn-primary skip_step_three display_none <?php echo $display_none_; ?>">Finish Later</span>
								</div>
							</form>
						</div>
					</div>
				</div>
			<?php echo $display_none ?></div>
		</div>
	</section>
</div><?php echo $display_none1 ?>