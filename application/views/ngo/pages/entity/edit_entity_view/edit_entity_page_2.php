<?php
$financial_years=$this->db->get_where('financial_years')->result();

//$entity_data = false;

if($entity_data){
	$legal_name=$entity_data['legal_name'];
	$brand_name=$entity_data['brand_name'];
	$entity_id=$entity_data['id'];
	$code=$entity_data['code'];
	$website=$entity_data['website'];
	$category_array=$entity_data['category_array'];
	$geo_location=$entity_data['geo_location'];
	$city=$entity_data['city'];
	$ngo_id=$entity_data['id'];
	$superngo_id=$entity_data['superngo_id'];
	$is_12a_certificate=$entity_data['is_12a_certificate'];
	$is_tax_exemption_80g=$entity_data['is_tax_exemption_80g'];
	$is_perpetuity_valid=$entity_data['is_perpetuity_valid'];
	$tax_exemption_percentage=$entity_data['tax_exemption_percentage'];
	$pan_number=$entity_data['pan_number'];
	$soft_copy_pancard_actual=$entity_data['soft_copy_pancard_actual'];
	$tan_number=$entity_data['tan_number'];
	$epf_for_last_year_actual=$entity_data['epf_for_last_year_actual'];
	$proof_of_TAN_actual=$entity_data['proof_of_TAN_actual'];
	$tax_for_last_year_actual=$entity_data['tax_for_last_year_actual'];
	$professional_tax_number=$entity_data['professional_tax_number'];
	$is_certificate_exist=$entity_data['is_certificate_exist'];
	$is_valid_tax_exemption=$entity_data['is_valid_tax_exemption'];
	$registration_number_12a=$entity_data['registration_number_12a'];
	$from_date_12a_valid=$entity_data['from_date_12a_valid'];
	$expire_date_12a_valid=$entity_data['expire_date_12a_valid'];
	$is_12a_certificate_cancle=$entity_data['is_12a_certificate_cancle'];
	$upload_proof_12A_reg_actual=$entity_data['upload_proof_12A_reg_actual'];
	$upload_proof_80G_incometax_actual=$entity_data['upload_proof_80G_incometax_actual'];
	$upload_80G_reg_actual=$entity_data['upload_80G_reg_actual'];
	$upload_proof_tax_exemption_actual=$entity_data['upload_proof_tax_exemption_actual'];
	$credibility_alliance_report_actual=$entity_data['credibility_alliance_report_actual'];
	$credibility_alliance_report=$entity_data['credibility_alliance_report'];
	$certificate_date_80G=$entity_data['certificate_date_80G'];
	$registration_number_80g=$entity_data['registration_number_80g'];
	$tax_exemption_type=$entity_data['tax_exemption_type'];
	$upload_proof_12A_reg=$entity_data['upload_proof_12A_reg'];
	$registration_80g_valid=$entity_data['registration_80g_valid'];
	$upload_80G_reg=$entity_data['upload_80G_reg'];
	$upload_proof_80G_incometax=$entity_data['upload_proof_80G_incometax'];
	$upload_proof_tax_exemption=$entity_data['upload_proof_tax_exemption'];
	$soft_copy_pancard=$entity_data['soft_copy_pancard'];
	$proof_of_TAN=$entity_data['proof_of_TAN'];
	$epf_for_last_year=$entity_data['epf_for_last_year'];
	$tax_for_last_year=$entity_data['tax_for_last_year'];
	$other_appropriate_certification_input=$entity_data['other_appropriate_certification_input'];
	
	$csr1_registration_number_radio=$entity_data['csr1_registration_number_radio'];
	$csr1_registration_number=$entity_data['csr1_registration_number'];
	$upload_proof_csr1_actual=$entity_data['upload_proof_csr1_actual'];
	$upload_proof_csr1_value=$entity_data['upload_proof_csr1_value'];
	
	$display_none='';
	$display_none_='display_none';
	$display_none1='';
	$registration_detail=json_decode($entity_data['registration_detail'] ,true);
	$appropriate_certification=json_decode($entity_data['appropriate_certification'] ,true);
	$is_edit='';
	$is_add_edit='edit';
	$edit_title='<section class="content-header"><a href="'.base_url().'ngo/entity/edit?id='.$ngo_id.'" class="btn btn-default pull-right">Back</a>  <h1> Edit Entity </h1> </section>';
}else{
	
	$csr1_registration_number_radio='';
	$csr1_registration_number='';
	$upload_proof_csr1_actual='';
	$upload_proof_csr1_value='';
	
	$legal_name='';
	$brand_name='';
	$entity_id='';
	$code='';
	$website='';
	$category_array='';
	$geo_location='';
	$city='';
	$superngo_id='';
	$registration_detail='';
	$is_12a_certificate='';
	$is_perpetuity_valid='';
	$is_tax_exemption_80g='';
	$tax_exemption_percentage='';
	$pan_number='';
	$tan_number='';
	$epf_for_last_year_actual='';
	$proof_of_TAN_actual='';
	$tax_for_last_year_actual='';
	$is_valid_tax_exemption='';
	$registration_number_12a='';
	$professional_tax_number='';
	$soft_copy_pancard_actual='';
	$expire_date_12a_valid='';
	$is_12a_certificate_cancle='';
	$upload_proof_12A_reg_actual='';
	$upload_proof_80G_incometax_actual='';
	$upload_proof_tax_exemption_actual='';
	$credibility_alliance_report_actual='';
	$credibility_alliance_report ='';
	$upload_80G_reg_actual='';
	$is_certificate_exist='';
	$registration_number_80g='';
	$certificate_date_80G='';
	$tax_exemption_type='';
	$appropriate_certification='';
	$from_date_12a_valid='';
	$upload_proof_12A_reg='';
	$registration_80g_valid='';
	$upload_80G_reg='';
	$upload_proof_tax_exemption='';
	$upload_proof_80G_incometax='';
	$soft_copy_pancard='';
	$epf_for_last_year='';
	$proof_of_TAN='';
	$tax_for_last_year='';
	$other_appropriate_certification_input='';
	$display_none='<!--';
	$display_none1='-->';
	$display_none_='';
	$is_edit='display_none';
	$edit_title='';
	$is_add_edit='add';
}
?>  
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
.select2-container .select2-selection--multiple {
	min-height: 34px;
}
.select2-container--default .select2-selection--multiple {
    background-color: white;
    cursor: text;
    padding-bottom: 5px;
    padding-right: 5px;
    position: relative;
    border-radius: 0;
    border: 1px solid #d2d6de;
}
.select2-container--default .select2-selection--multiple ul{
   border: none;
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
.error{font-weight: 900;}
</style>
<?php echo $display_none ?><div class="content-wrapper">
<?php echo $edit_title;?>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<input type="hidden" class="form-control" id="entity_id" name="entity_id" value="<?php echo $entity_id;?>">
				<input type="hidden" class="form-control" id="is_add_edit2" value='<?php echo $is_add_edit; ?>'>
				<div id="err_add_plan"></div><?php echo $display_none1 ?>	
				<?php //var_dump($entity_data)?>
				<?php //var_dump($registration_detail)?>
				<div id="alert_danger_error"></div>
                <div role="tabpanel" class="tab-pane" id="page2">
					<div class="box box-primary">
						<div class="box-header with-border">
						  <h3 class="box-title">Legal Details</h3>
						</div>
						<div class="box-body">
							<div class="row bs-wizard <?php echo $display_none_ ?>" style="border-bottom:0;">
								<div class="col-xs-2 bs-wizard-step complete"><!-- complete -->
									<div class="text-center bs-wizard-stepnum">Step 1</div>
									<div class="progress"><div class="progress-bar"></div></div>
									<a href="#page1" role="tab" data-toggle="tab" class="bs-wizard-dot"></a>
								</div>
								<div class="col-xs-2 bs-wizard-step active"><!-- active -->
									<div class="text-center bs-wizard-stepnum">Step 2</div>
									<div class="progress"><div class="progress-bar"></div></div>
									<a href="#page2" role="tab" data-toggle="tab" class="bs-wizard-dot"></a>
								</div>
								<div class="col-xs-2 bs-wizard-step disabled"><!-- disabled -->
									<div class="text-center bs-wizard-stepnum">Step 3</div>
									<div class="progress"><div class="progress-bar"></div></div>
									<a href="#page3" class="bs-wizard-dot"></a>
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
							<form id="entity_step2_form" method="post" role="form">
								<div><span class="display_none" id="error_field2">Please fill in all required fields.</span></div>
								<h5>Registration Details &nbsp;</h5>
								<div id="RegistrationTextBoxContainer">
									<?php if(!$registration_detail){ ?>
									<div class="panel panel-default registration_details_form">
										<div class=" panel-body">
											<div class="row">
												<div class="form-group col-md-6">
													<label for="registration_type">Registration Type <span class="required">*</span></label>
													<select name="registration_type" class="registration_type form-control select_button">		
														<option value="">Select...</option>
														<option value="Registered Society"> Registered Society </option>
														<option value="Registered Trust"> Registered Trust </option>
														<option value="Section 25/Section 8 Company">Section 25/Section 8 Company</option>
													</select>
												</div>
												<div class="form-group col-md-6">
													<label for="registration_date">Date of Registration<span class="required">*</span></label>
													<input type="text" readonly class="form-control old_date date_of_reg" name="registration_date" placeholder="Enter Date" value="">
												</div>
											</div>
											<div class="row">
												<div class="form-group col-md-6">
													<label for ="Registered address">Registered address</label>
													<div>
													  <label for="registration_street_address">Street Address<span class="required">*</span></label>
													  <input type="text" class="form-control reg_street_add" name="registration_street_address" placeholder="Street Address" value="">
													</div> 
												</div>
												<div class="form-group col-md-2">
													<div for="registration_state">&nbsp;</div>
													<label for="registration_state" style="margin-bottom: 9px;">State<span class="required">*</span></label>
													<select class="form-control select_button state_select state js-example-basic-single1" name="state_name">
														<option value="">Select state</option>
														<?php
															if($admin_states){
																foreach ($admin_states as $key => $value) {
																	echo '<option value="'.$value['name'].'" id="'.$value['id'].'">'.$value['name'].'</option>';
																}
															}
														?>
													</select> 
												</div> 
												<div class="form-group col-md-2 ciytss">
													<div for="registration_state">&nbsp;</div>
													<label for="registration_city" style="margin-bottom: 5px;">City<span class="required">*</span></label>
													<input type="text" class="form-control city_select" name="registration_city" placeholder="City" value="">
													<!--<select class="form-control city_select js-example-basic-single1" name="registration_city" >
														<option>Select City</option>
														<?php
															/*if($admin_city){
																foreach ($admin_city as $key => $value) {
																	echo '<option value="'.$value['name'].'" id="'.$value['id'].'">'.$value['name'].'</option>';
																}
															}*/
														?>
													</select> -->
												</div>
												<div class="form-group col-md-2">
													<div for="registration_state">&nbsp;</div>
													<label for="registration_pin_code">Pin Code<span class="required">*</span></label>
													<input type="number" class="form-control pin_code" name="registration_pin_code" placeholder="Pin Code" value="">
												</div>
											</div> 
											<div class="row">
												<div class="form-group col-md-6">
													<label for="Registration Number">Registration Number <span class="required">*</span></label>
													<input type="text" class="form-control reg_num" name="Registration_Number" placeholder="Registration Number" value="">
												</div>
												<div class="form-group col-md-6">
													<label for=" ">Upload Scan/Soft Copy of Registration Certificate<span class="required">*</span></label>
													<div class="col-sm-6 ">
														<button type="button" style="margin-bottom: 10px;" name="comman_file_upload_class" image_upload_desc="File must be less than 10MB in size.We prefer if you can provide .pdf versions of your document." upload_type="file" file_count="single" img_primary="no" file_prev_class="registration_copy_selected" file_input_id="registration_copy" class="btn btn-primary btn-lg comman_file_upload_class" data-toggle="modal" data-target="#browseFile"><i class="fa fa-upload"></i> </button>
														<input class="form-control registration_copy reg_certificate" id="registration_copy" name="registration_copy" type="hidden" value="">
														<div class="image-preview_one inline_block registration_copy_selected">
															<input readonly class="form-control display_none upload_registration_certificate display_upload_image_name" name="upload_certificate" type="text" id="upload_registration_certificate" value="">
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<?php   } ?>
									<?php 
									//var_dump($registration_detail);
									if($registration_detail){
										$counter = 0;
										$show_remove = '';
										foreach($registration_detail as $details){
											//var_dump($details);
											$counter++ ;
											if($counter > 1){
												$show_remove = '';
											}else{
												$show_remove = 'display_none';
											}
											
									?>
									<div class="panel panel-default registration_details_form">
										<div class=" panel-body row">
											<div class="form-group col-md-12 <?php echo $show_remove ?>">
												<button type="button" class="btn btn-danger pull-right RegistrationRemovepara"><i class="fa fa-close"></i></button>                     
											</div>
											<div class="form-group col-md-6">
												<label for="registration_type">Registration Type <span class="required">*</span></label>
												<select name="registration_type" class="registration_type form-control select_button">		
													<option value="">Select...</option>
													<option value="Registered Society" <?php if($details['registration_type'] ==='Registered Society') echo 'selected';?>> Registered Society </option>
													<option value="Registered Trust" <?php if($details['registration_type'] ==='Registered Trust') echo 'selected';?>> Registered Trust </option>
													<option value="Section 25/Section 8 Company" <?php if($details['registration_type'] ==='Section 25/Section 8 Company') echo 'selected';?>>Section 25/Section 8 Company</option>
												</select>
											</div>
											<div class="form-group col-md-6">
												<label for="registration_date">Date of Registration<span class="required">*</span></label>
												<input type="text" readonly class="form-control old_date date_of_reg" name="registration_date" placeholder="Enter Date" value="<?php echo $details['registration_date'] ?>">
											</div>
											<div class="form-group col-md-12">
												<label>Registered Address</label>
											</div>
											<div class="form-group col-md-6">
												<label for="registration_street_address">Street Address<span class="required">*</span></label>
												<input type="text" class="form-control reg_street_add" name="registration_street_address" placeholder="Street Address" value="<?php echo $details['registration_street_address'] ?>">
											</div>
											<div class="form-group col-md-2">
												<label for="registration_state" style="margin-bottom: 9px;">State<span class="required">*</span></label>
												<select class="form-control select_button state_select state js-example-basic-single1" name="state_name">
													<option value="">Select state</option>
													<?php
														if($admin_states){
															foreach ($admin_states as $key => $value) {
																$is_selected='';
																if($details['registration_state'] == $value['name']){
																	$is_selected='selected';
																}	
																echo '<option '.$is_selected.' value="'.$value['name'].'" id="'.$value['id'].'">'.$value['name'].'</option>';
															}
														}
													?>
												</select> 
											</div> 
											<div class="form-group col-md-2">
											
												<label for="registration_city" style="margin-bottom: 5px;">City<span class="required">*</span></label>
												<input type="text" class="form-control city_select" name="registration_city" placeholder="City" value="<?php echo $details['registration_city'] ?>"> 
												<!--<select class="form-control city_select js-example-basic-single1" name="registration_city" >
													<option value="">Select City</option>
													<?php
														if($admin_city){
															foreach ($admin_city as $key => $value) {
																
																$is_selected='';
																if($details['registration_city'] == $value['name']){
																	$is_selected='selected';
																}	
																echo '<option '.$is_selected.' value="'.$value['name'].'" id="'.$value['id'].'">'.$value['name'].'</option>';
															}
														}
													?>
												</select> -->
											</div>
											<div class="form-group col-md-2">
												<label for="registration_pin_code">Pin Code<span class="required">*</span></label>
												<input type="number" class="form-control pin_code" name="registration_pin_code" placeholder="Pin Code" value="<?php echo $details['registration_pin_code'] ?>">
											</div>
											<div class="form-group col-md-6">
												<label for="Registration Number">Registration Number <span class="required">*</span></label>
												<input type="text" class="form-control reg_num" name="Registration_Number" placeholder="Registration Number" value="<?php echo $details['Registration_Number'] ?>">
											</div>
											<div class="form-group col-md-6">
												<label for=" ">Upload Scan/Soft Copy of Registration Certificate<span class="required">*</span></label>
												<div class="col-md-12">
													<button type="button" style="margin-bottom: 10px;" name="comman_file_upload_class" image_upload_desc="File must be less than 10MB in size.We prefer if you can provide .pdf versions of your document." upload_type="file" file_count="single" img_primary="no" file_prev_class="registration_copy_selected" file_input_id="registration_copy" class="btn btn-primary btn-lg comman_file_upload_class" data-toggle="modal" data-target="#browseFile"><i class="fa fa-upload"></i> </button>
													<input class="form-control registration_copy reg_certificate" id="registration_copy" name="registration_copy" type="hidden" value="<?php echo $details['registration_certificate'] ?>">
													<div class="image-preview_one inline_block registration_copy_selected">
														<input readonly class="form-control upload_registration_certificate display_upload_image_name <?php if (!$details['registration_certificate_actual']){ echo 'display_none'; } ?>" name="upload_certificate" type="text" id="upload_registration_certificate" value="<?php echo $details['registration_certificate_actual'] ?>">
													</div>
												</div>
											</div>
										</div>
									</div>
									<?php
										}
									}
									?>			
								</div>
											
								
								<div class="reg_detail_err display_none"><label>Please provide all the details.</label></div>
								<div>
									<button type="button" id="RegistrationAddParabtn" class="btn btn-success"><i class="fa fa-plus"></i></button><label style="margin-left:5px;">Add another registration type</label>
								</div><br>
								
								
								
								<h5>CSR-1 Registration</h5>
								<div class="form-group ">
									<label for="csr1_registration_number_radio">Does the entity have a CSR-1 Registration Number?<span class="required">*</span></label>
									<label class="radio-inline" style="margin-left:10px;">
										<input type="radio" class="show_on_radio_click csr1_registration_number_radio"  name="csr1_registration_number_radio" value="Yes"  <?php if ($csr1_registration_number_radio === 'Yes'){ echo 'checked="checked"'; } ?> >Yes
									</label>  
									<label class="radio-inline">  
										<input type="radio" class="show_on_radio_click csr1_registration_number_radio" name="csr1_registration_number_radio" value="No"  <?php if ($csr1_registration_number_radio === 'No'){ echo 'checked="checked"'; } ?> >No
									</label>
									
									<div class="csr1_registration_radio" name="oiuuu"></div>
									
									<div class="show_on_radio_data <?php if (!$csr1_registration_number_radio || $csr1_registration_number_radio === 'No'){ echo 'display_none'; } ?>" style="margin-top: 15px;">
										<div class="form-group">
										  <label for="registration_number_12a">Enter the CSR-1 registration number<span class="required">*</span></label>
										  <input type="text" class="form-control" id="csr1_registration_number" name="csr1_registration_number" placeholder="Enter details here..." value="<?php echo $csr1_registration_number; ?>">
										</div>
										<div class="csr1_registration_number_error display_none error">CSR-1 registration number is required.</div>
										
										<div class="form-group">
											<label for="upload_proof_csr1_value">Upload proof of CSR-1 registration<span class="required">*</span></label><br>
											<label class="input_description">File must be less than 10 MB in size</label>
											<div class="col-md-12">
												<button type="button" id="comman_file_upload_class" name="comman_file_upload_class" image_upload_desc="File must be less than 10MB in size.We prefer if you can provide .pdf versions of your document." upload_type="file" file_count="single" img_primary="no" file_prev_class="proof_12a_registration_selected" file_input_id="upload_proof_csr1_value" class="btn btn-primary btn-lg comman_file_upload_class" data-toggle="modal" data-target="#browseFile"><i class="fa fa-upload"></i> </button>
												<input  class="form-control upload_proof_csr1_value" id="upload_proof_csr1_value" name="upload_proof_csr1_value" type="hidden" value="<?php echo $upload_proof_csr1_value ?>">
												<div class="image-preview inline_block proof_12a_registration_selected">
													<input readonly class="form-control display_upload_image_name <?php if (!$upload_proof_csr1_actual){ echo 'display_none'; } ?> upload_proof_csr1_actual" type="text" id="upload_proof_csr1_actual" name="upload_proof_csr1_actual" value="<?php echo $upload_proof_csr1_actual ?>">
												</div>
											</div>
											<div class="upload_proof_csr1_actual_error display_none error">proof of CSR-1 registration is required.</div>
										</div>
										
										
									</div>
								</div>
								
								<h5>12A Certification</h5>
								<div class="form-group ">
									<label for="is_12a_certificate">Does the entity have a 12A certificate? <span class="required">*</span></label>
									<label class="radio-inline" style="margin-left:10px;">
										<input type="radio" class="show_on_radio_click is_12a_certificate"  name="is_12a_certificate" value="Yes"  <?php if ($is_12a_certificate === 'Yes'){ echo 'checked="checked"'; } ?> >Yes
									</label>  
									<label class="radio-inline">  
										<input type="radio" class="show_on_radio_click is_12a_certificate" name="is_12a_certificate" value="No"  <?php if ($is_12a_certificate === 'No'){ echo 'checked="checked"'; } ?> >No
									</label>
									<div class="12a_certificate"></div>
									<div class="show_on_radio_data <?php if (!$is_12a_certificate || $is_12a_certificate === 'No'){ echo 'display_none'; } ?>" style="margin-top: 15px;">
										<div class="form-group">
										  <label for="registration_number_12a">12A Registration Number<span class="required">*</span></label>
										  <input type="text" class="form-control" id="registration_number_12a" name="registration_number_12a" placeholder="Enter The 12A Registration Number " value="<?php echo $registration_number_12a; ?>">
										</div>
										<div class="12A_reg_num_err display_none error">Please provide the detail.</div>
										<div class="form-group">
											<label for="from_date_12a_valid">Enter Date from which 12A Certificate is valid<span class="required">*</span></label>
											<input type="text" readonly class="form-control old_date" id="from_date_12a_valid" name="from_date_12a_valid" placeholder="Enter Date" value="<?php echo $from_date_12a_valid; ?>">
										</div>
										<div class="form-group">
											<label for="expire_date_12a_valid">Enter Date up to which 12A certificate is valid (expiry date)<span class="required">*</span>
												<div>
													<span id="errmsg"></span>
												</div>
											</label>
											<input type="text" readonly class="form-control date" id="expire_date_12a_valid" name="expire_date_12a_valid" placeholder="Enter Date" value="<?php echo $expire_date_12a_valid; ?>">
										</div>
										<div><span id="date_err" class="display_none">Expire date must be later than start of 12A Certification.</span></div>
										<div class="form-group">
											<label for="is_12a_certificate_cancle">Has the organisation faced cancellation of 12A certification in the past?<span class="required">*</span></label>
											<label class="radio-inline" style="margin-left:10px;">
												<input type="radio" name="is_12a_certificate_cancle" value="Yes" <?php if ($is_12a_certificate_cancle === 'Yes'){ echo 'checked'; } ?>>Yes
											</label>  
											<label class="radio-inline">  
												<input type="radio" name="is_12a_certificate_cancle" value="No" <?php if ($is_12a_certificate_cancle === 'No'){ echo 'checked'; } ?>>No
											</label>
											<div class="is_12a_certificate_cancle_err display_none error">Please provide the detail.</div>
										</div>
										<div class="form-group">
											<label for="proof_12a_registration">Upload Proof of 12A Registration<span class="required">*</span></label><br>
											<label class="input_description">File must be less than 10 MB in size</label>
											<div class="col-md-12">
												<button type="button" id="comman_file_upload_class" name="comman_file_upload_class" image_upload_desc="File must be less than 10MB in size.We prefer if you can provide .pdf versions of your document." upload_type="file" file_count="single" img_primary="no" file_prev_class="proof_12a_registration_selected" file_input_id="proof_12a_registration" class="btn btn-primary btn-lg comman_file_upload_class" data-toggle="modal" data-target="#browseFile"><i class="fa fa-upload"></i> </button>
												<input  class="form-control proof_12a_registration" id="proof_12a_registration" name="proof_12a_registration" type="hidden" value="<?php echo $upload_proof_12A_reg ?>">
												<div class="image-preview inline_block proof_12a_registration_selected">
													<input readonly class="form-control display_upload_image_name <?php if (!$upload_proof_12A_reg_actual){ echo 'display_none'; } ?> upload_proof_12A_reg" type="text" id="upload_proof_12A_reg" name="upload_proof_12A_reg" value="<?php echo $upload_proof_12A_reg_actual ?>">
												</div>
											</div>
											<div class="proof_12a_registration_err display_none error">Please provide the detail.</div>
										</div>
									</div>
								</div>
								<h5>Tax Exemptions</h5>
								<div class="display_none">
									<div class="form-group">
										<label for="tax_exemption_percentage">Percentage of Tax Exemption <span class="required">*</span></label>
										<input type="number" class="form-control" id="tax_exemption_percentage" name="tax_exemption_percentage" placeholder=" Please enter a Number between 0-100" value="tax_exemption_percentage">
									</div>
								</div>
								
								
								<div class="form-group">
									<label for="is_tax_exemption_80g"> Does the entity have 80G tax exemption? <span class="required">*</span></label>
									<label class="radio-inline" style="margin-left:10px;">
										<input type="radio" class="show_on_radio_click entity_have_80g" name="is_tax_exemption_80g" value="Yes" <?php if ($is_tax_exemption_80g === 'Yes'){ echo 'checked="checked"'; } ?>>Yes
									</label>  
									<label class="radio-inline">  
										<input type="radio" class="show_on_radio_click entity_have_80g" name="is_tax_exemption_80g" value="No" <?php if ($is_tax_exemption_80g === 'No'){ echo 'checked="checked"'; } ?>>No
									</label>
									<div class="entity_80g_tax"></div>
									<div class="show_on_radio_data <?php if (!$is_tax_exemption_80g || $is_tax_exemption_80g === 'No'){ echo 'display_none'; } ?>" style="margin-top: 15px;">
										<div class="form-group">
											<label for="registration_number_80g ">Enter the 80G Registration Number <span class="required">*</span></label>
											<input type="text" class="form-control" id="registration_number_80g" name="registration_number_80g" placeholder="Enter the 80G Registration Number" value="<?php echo $registration_number_80g ?>">
										</div>
										<div class="registration_number_80g_err display_none error">Please provide the detail.</div>
										<div class="form-group">
											<label for="certificate_date_80G">Enter date from which the 80G certification is valid (In case you have had an 80G certification earlier, enter the date when it was first received)<span class="required">*</span></label>
											<input type="text" readonly class="form-control old_date" id="certificate_date_80G" name="certificate_date_80G" placeholder="Enter date from which the 80G certification is valid (In case you have had an 80G certification earlier, enter the date when it was first received)" value="<?php echo $certificate_date_80G ?>">
										</div>
										<div class="certificate_date_80g_error display_none error">Please provide the detail.</div>
										<div class="form-group">
											<label for="is_perpetuity_valid">Is the current 80G certification valid in perpetuity <span class="required">*</span></label>
											<label class="radio-inline" style="margin-left:10px;">
												<input type="radio" class="show_on_radio_click 80G_certificate_valid" name="is_perpetuity_valid" value="Yes" <?php if ($is_perpetuity_valid === 'Yes'){ echo 'checked="checked"'; } ?>>Yes
											</label>  
											<label class="radio-inline">  
												<input type="radio" class="show_on_radio_click 80G_certificate_valid" name="is_perpetuity_valid" value="No" <?php if ($is_perpetuity_valid === 'No'){ echo 'checked="checked"'; } ?>>No
											</label>
											<div class="80g_valid"></div>
											<div class="form-group show_on_radio_data_no <?php if (!$is_perpetuity_valid || $is_perpetuity_valid === 'Yes'){ echo 'display_none'; } ?>" style="margin-top: 15px;">
												<label for="registration_80g_valid">If no, enter date up to which registration is valid <span class="required">*</span></label>
												<input type="text" readonly class="form-control date" id="registration_80g_valid" name="registration_80g_valid" placeholder="If no, enter date up to which registration is valid" value="<?php echo $registration_80g_valid ?>">
											</div>
											<div class="date_upto_reg_valid_error display_none error">Please provide the detail.</div>
										</div>
										<div class="form-group">
											<label for="registration_80g_certificate">Upload scan/soft copy of 80G registration certificate <span class="required">*</span></label><br>
											<label class="input_description">File must be less than 10 MB in size</label>
											<div class="col-md-12">
												<button type="button" id="comman_file_upload_class" name="comman_file_upload_class" image_upload_desc="File must be less than 10MB in size.We prefer if you can provide .pdf versions of your document." upload_type="file" file_count="single" img_primary="no" file_prev_class="registration_80g_certificate_selected" file_input_id="registration_80g_certificate" class="btn btn-primary btn-lg comman_file_upload_class" data-toggle="modal" data-target="#browseFile"><i class="fa fa-upload"></i> </button>
												<input class="form-control registration_80g_certificate" id="registration_80g_certificate" name="registration_80g_certificate" type="hidden" value="<?php echo $upload_80G_reg ; ?>">
												<div class="image-preview inline_block registration_80g_certificate_selected">
													<input readonly class="form-control display_upload_image_name <?php if (!$upload_80G_reg_actual){ echo 'display_none'; } ?>" type="text" id="upload_80G_reg" name="upload_80G_reg" value="<?php echo $upload_80G_reg_actual ?>">
												</div>
											</div>
										</div>
										<div class="registration_80g_certificate_err display_none error">Please upload a file.</div>
										<div class="form-group">
											<label for="income_tax_80g_proof">Provide proof of 80G from the Income Tax Department Website: Visit <a target="_blank" href="https://www.incometaxindia.gov.in/Pages/utilities/exempted-institutions.aspx">https:// www.incometaxindia.gov.in/Pages/utilities/ exempted-institutions.aspx</a> and enter you pan number and upload the screenshot here<span class="required">*</span></label>
											<div class="col-md-12">
												<button type="button" id="comman_file_upload_class" name="comman_file_upload_class" image_upload_desc="File must be less than 10MB in size.We prefer if you can provide .pdf versions of your document." upload_type="file" file_count="single" img_primary="no" file_prev_class="income_tax_80g_proof_selected" file_input_id="income_tax_80g_proof" class="btn btn-primary btn-lg comman_file_upload_class" data-toggle="modal" data-target="#browseFile"><i class="fa fa-upload"></i> </button>
												<input class="form-control income_tax_80g_proof" id="income_tax_80g_proof" name="income_tax_80g_proof" type="hidden" value="<?php echo $upload_proof_80G_incometax ; ?>">
												<div class="image-preview inline_block income_tax_80g_proof_selected">
													<input readonly class="form-control display_upload_image_name <?php if (!$upload_proof_80G_incometax_actual){ echo 'display_none'; } ?>" type="text" id="upload_proof_80G_incometax" value="<?php echo $upload_proof_80G_incometax_actual ?>">
												</div>
											</div>
										</div>
										<div class="income_tax_80g_proof_err display_none error">Please upload a file.</div>
									</div>
								</div>
								<div class="form-group">
									<label for="is_valid_tax_exemption">Do you have any other valid tax exemption<span class="required">*</span></label>
									<label class="radio-inline" style="margin-left:10px;">
										<input type="radio" class="show_on_radio_click is_valid_tax_exemption" name="is_valid_tax_exemption" value="Yes" <?php if ($is_valid_tax_exemption === 'Yes'){ echo 'checked'; } ?>>Yes
									</label>  
									<label class="radio-inline">  
										<input type="radio" class="show_on_radio_click is_valid_tax_exemption" name="is_valid_tax_exemption" value="No" <?php if ($is_valid_tax_exemption === 'No'){ echo 'checked'; } ?>>No
									</label>
									<div class="valid_tax_exemption"></div>
									<input type="text" class="form-control show_on_radio_data <?php if (!$is_valid_tax_exemption || $is_valid_tax_exemption === 'No'){ echo 'display_none'; } ?>" id="tax_exemption_type" name="tax_exemption_type" placeholder="Enter type(s) of tax exemptions" value="<?php echo $tax_exemption_type ?>">
									<div class="80G_error display_none error">Please provide the details.</div>
									<div class="show_on_radio_data <?php if (!$is_valid_tax_exemption || $is_valid_tax_exemption === 'No'){ echo 'display_none'; } ?>" style="margin-top: 15px;">
										<div class="form-group">
											<label for="valid_tax_exemption_proof">Upload proof for other tax exemptions <span class="required">*</span></label><br>
											<label class="input_description">File must be less than 10 MB in size</label>
											<div class="col-md-12">
												<button type="button" id="comman_file_upload_class" name="comman_file_upload_class" image_upload_desc="File must be less than 10MB in size.We prefer if you can provide .pdf versions of your document." upload_type="file" file_count="single" img_primary="no" file_prev_class="valid_tax_exemption_proof_selected" file_input_id="valid_tax_exemption_proof" class="btn btn-primary btn-lg comman_file_upload_class" data-toggle="modal" data-target="#browseFile"><i class="fa fa-upload"></i> </button>
												<input class="form-control valid_tax_exemption_proof" id="valid_tax_exemption_proof" name="valid_tax_exemption_proof" type="hidden" value="<?php echo $upload_proof_tax_exemption ; ?>">
												<div class="image-preview inline_block valid_tax_exemption_proof_selected">
													<input readonly class="form-control display_upload_image_name <?php if (!$upload_proof_tax_exemption_actual){ echo 'display_none'; } ?>" type="text" id="upload_proof_tax_exemption" value="<?php echo $upload_proof_tax_exemption_actual ?>">
												</div>
											</div>
											<div class="proof_tax_exemption_error display_none error">Please upload one file.</div>
										</div>
									</div>
								</div>
								<h5>Other Details</h5>
								<div class="form-group">
									<label for="pan_number"> PAN number of the entity<span class="required">*</span></label>
									<input type="text" class="form-control" id="pan_number" name="pan_number" placeholder="PAN number of the entity" value="<?php echo $pan_number; ?>">
								</div>
								<div class="form-group">
									<label for="pan_soft_copy">Photo/soft copy of PAN card<span class="required">*</span></label>
									<div class="col-md-12">
										<button type="button" id="comman_file_upload_class" name="comman_file_upload_class" image_upload_desc="File must be less than 10MB in size.We prefer if you can provide .pdf versions of your document." upload_type="file" file_count="single" img_primary="no" file_prev_class="pan_soft_copy_selected" file_input_id="pan_soft_copy" class="btn btn-primary btn-lg comman_file_upload_class" data-toggle="modal" data-target="#browseFile"><i class="fa fa-upload"></i> </button>
										<input class="form-control pan_soft_copy" id="pan_soft_copy" name="pan_soft_copy" type="hidden" value="<?php echo $soft_copy_pancard ; ?>">
										<div class="image-preview inline_block pan_soft_copy_selected">
											<input readonly class="form-control display_upload_image_name <?php if (!$soft_copy_pancard_actual){ echo 'display_none'; } ?>" type="text" id="soft_copy_pancard" value="<?php echo $soft_copy_pancard_actual; ?>">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="tan_number">TAN number of the entity <span class="required">*</span></label>
									<input type="text" class="form-control" id="tan_number" name="tan_number" placeholder="TAN number of the entity" value="<?php echo $tan_number; ?>">
								</div>
								<div class="form-group">
									<label for="tan_proof">Proof of TAN<span class="required">*</span></label>
									<div class="col-md-12">
										<button type="button" id="comman_file_upload_class" name="comman_file_upload_class" image_upload_desc="File must be less than 10MB in size.We prefer if you can provide .pdf versions of your document." upload_type="file" file_count="single" img_primary="no" file_prev_class="tan_proof_selected" file_input_id="tan_proof" class="btn btn-primary btn-lg comman_file_upload_class" data-toggle="modal" data-target="#browseFile"><i class="fa fa-upload"></i> </button>
										<input  class="form-control tan_proof" id="tan_proof" name="tan_proof" type="hidden" value="<?php echo $proof_of_TAN ; ?>">
										<div class="image-preview inline_block tan_proof_selected">
											<input readonly class="form-control display_upload_image_name <?php if (!$proof_of_TAN_actual){ echo 'display_none'; } ?>" type="text" id="proof_of_TAN" value="<?php echo $proof_of_TAN_actual ?>">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="epf_number">EPF number<span class="required">*</span></label>
									<input type="text" class="form-control" id="epf_number" name="epf_number" placeholder="EPF number" value="<?php echo $tan_number; ?>">
								</div>
								<div class="form-group">
									<label for="last_year_epf_proof">Upload EPF filing for last financial year <span class="required">*</span></label>
									<div class="col-md-12">
										<button type="button" id="comman_file_upload_class" name="comman_file_upload_class" image_upload_desc="File must be less than 10MB in size.We prefer if you can provide .pdf versions of your document." upload_type="file" file_count="single" img_primary="no" file_prev_class="last_year_epf_proof_selected" file_input_id="last_year_epf_proof" class="btn btn-primary btn-lg comman_file_upload_class" data-toggle="modal" data-target="#browseFile"><i class="fa fa-upload"></i> </button>

										<input class="form-control last_year_epf_proof" id="last_year_epf_proof" name="last_year_epf_proof" type="hidden" value="<?php echo $epf_for_last_year ; ?>">
										<div class="image-preview inline_block last_year_epf_proof_selected">
											<input readonly class="form-control display_upload_image_name <?php if (!$epf_for_last_year_actual){ echo 'display_none'; } ?>" type="text" id="epf_for_last_year" value="<?php echo $epf_for_last_year_actual; ?>">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="professional_tax_number">Professional tax number<span class="required">*</span></label>
									<input type="text" class="form-control" id="professional_tax_number" name="professional_tax_number" placeholder=" Professional tax number" value="<?php echo $professional_tax_number; ?>">
								</div>
								<div class="form-group">
									<label for="professional_tax_filling_proof">Upload Professional Tax filing for the last financial year <span class="required">*</span></label>
									<div class="col-md-12">
										<button type="button" id="comman_file_upload_class" name="comman_file_upload_class" image_upload_desc="File must be less than 10MB in size.We prefer if you can provide .pdf versions of your document." upload_type="file" file_count="single" img_primary="no" file_prev_class="professional_tax_filling_proof_selected" file_input_id="professional_tax_filling_proof" class="btn btn-primary btn-lg comman_file_upload_class" data-toggle="modal" data-target="#browseFile"><i class="fa fa-upload"></i> </button>

										<input class="form-control professional_tax_filling_proof" id="professional_tax_filling_proof" name="professional_tax_filling_proof" type="hidden" value="<?php echo $tax_for_last_year ; ?>">
										<div class="image-preview inline_block professional_tax_filling_proof_selected">
											<input readonly class="form-control display_upload_image_name <?php if (!$tax_for_last_year_actual){ echo 'display_none'; } ?>" type="text" id="tax_for_last_year" value="<?php echo $tax_for_last_year_actual; ?>">
										</div>
									</div>
								</div>
								<h5>Certifications</h5>
								<div class="form-group">
									<label for="is_certificate_exist">Any existing empanellment certifications/ratings received?<span class="required">*</span></label>
									<label class="radio-inline" style="margin-left:10px;">
										<input type="radio" class="show_on_radio_click appropriate_certification_select" name="is_certificate_exist" value="Yes" <?php if ($is_certificate_exist === 'Yes'){ echo 'checked="checked"'; } ?>>Yes
									</label>  
									<label class="radio-inline">  
										<input type="radio" class="show_on_radio_click appropriate_certification_select" name="is_certificate_exist" value="No" <?php if ($is_certificate_exist === 'No'){ echo 'checked="checked"'; } ?>>No
									</label>
									<div class="appropriate_certificate_error"></div>
									<div class="show_on_radio_data <?php if (!$is_certificate_exist || $is_certificate_exist === 'No'){ echo 'display_none'; } ?>" style="margin-top: 15px;">
										<div class="form-group" id="checkbox_id">
											<label for="appropriate_certification_select">Please select the appropriate certification(s) <span class="required">*</span>&nbsp&nbsp</label>
											<label class="checkbox-inline">
												<input type="checkbox"  class="appropriate_certification"  name="Give_india" value="Give india" <?php if($appropriate_certification){ if((in_array("Give india",$appropriate_certification)) == true) { echo 'checked'; }}?>>  Give India 
											</label>
											<label class="checkbox-inline">
												<input type="checkbox" class="appropriate_certification credibility_appropriate_certification"  name="Credibility_Alliance" value="Credibility Alliance" <?php if($appropriate_certification){ if((in_array("Credibility Alliance",$appropriate_certification)) == true) { echo 'checked'; }}?>>Credibility Alliance 
											</label>

											<label class="checkbox-inline">
												<input type="checkbox" class="appropriate_certification"  name="BSE_Samman" value="BSE Samman" <?php if($appropriate_certification){ if((in_array("BSE Samman",$appropriate_certification)) == true) { echo 'checked'; }}?>> BSE Samman
											</label>
											<label class="checkbox-inline">
												<input type="checkbox" class="appropriate_certification"  name="IICA"  value="IICA" <?php if($appropriate_certification){ if((in_array("IICA",$appropriate_certification)) == true) { echo 'checked'; }}?>> IICA
											</label>
											<label class="checkbox-inline">
												<input type="checkbox"  class="appropriate_certification"  name="Goodera"  value="Goodera" <?php if($appropriate_certification){ if((in_array("Goodera",$appropriate_certification)) == true) { echo 'checked'; }}?>> Goodera
											</label>
											<label class="checkbox-inline">
												<input type="checkbox" class="appropriate_certification"  name="TISS"  value="TISS" <?php if($appropriate_certification){ if((in_array("TISS",$appropriate_certification)) == true) { echo 'checked'; }}?>> TISS
											</label> 
											<label class="checkbox-inline">
												<input type="checkbox"  class="appropriate_certification other_appropriate_certification" name="Other"  value="Other" <?php if($appropriate_certification){ if((in_array("Other",$appropriate_certification)) == true) { echo 'checked'; }}?>>  Other(s)
											</label>
											<div class="appropriate_certification_err"></div>
										</div>
										<div class="appropriate_certification_err_chkbox display_none error">Please choose one.</div>
										<div class="form-group othercertification_input <?php if($appropriate_certification){ if((in_array("Other",$appropriate_certification)) != true) { echo 'display_none'; }}else{ echo 'display_none';}?>">
										  <input type="text" class="form-control" id="other_appropriate_certification_input" name="other_appropriate_certification_input" placeholder="Enter the other certification names" value="<?php echo $other_appropriate_certification_input; ?>">
										</div>
										<div class="other_appropriate_certification_input_err display_none error">Please provide the detail.</div>
										
										
										<div class="form-group credibility_certification_input <?php if($appropriate_certification){ if((in_array("Credibility Alliance",$appropriate_certification)) != true) { echo 'display_none'; }}else{echo 'display_none'; }?>">
											<label for="credibility_report">If you are empanelled with Credibility Alliance, please attach the detailed report<span class="required">*</span></label>
											<div class="col-md-12">
												<button type="button" id="comman_file_upload_class" name="comman_file_upload_class" image_upload_desc="File must be less than 10MB in size.We prefer if you can provide .pdf versions of your document." upload_type="file" file_count="single" img_primary="no" file_prev_class="credibility_report_selected" file_input_id="credibility_report" class="btn btn-primary btn-lg comman_file_upload_class" data-toggle="modal" data-target="#browseFile"><i class="fa fa-upload"></i> </button>

												<input class="form-control credibility_report" id="credibility_report" name="credibility_report" type="hidden" value="<?php echo $credibility_alliance_report ; ?>">
												<div class="image-preview inline_block credibility_report_selected">
													<input readonly class="form-control display_upload_image_name <?php if (!$credibility_alliance_report_actual){ echo 'display_none'; } ?>" id="credibility_alliance_report" type="text" value="<?php echo $credibility_alliance_report_actual; ?>">
												</div>
												
											</div>
											<div class="credibility_report_error display_none error">Attachment is required.</div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<span class="btn btn-default cancel_page <?php echo $is_edit; ?>" align='<?php echo $ngo_id; ?>' >Cancel</span>
									<span class="btn btn-success save_step save_page2 <?php echo $is_edit; ?>">Save Changes</span>
									<!--<span class="btn btn-success save_step save_page2 <?php //echo $display_none_; ?>">Save</span>-->
									<button type="submit" class="btn btn-success save_goto_next_step <?php echo $display_none_; ?>" id="submit_next_page2">Save & Next</button>
									<span class="btn btn-primary skip_step_two display_none <?php echo $display_none_; ?>">Finish Later</span>
								</div>
							</form>
						</div>
					</div>
				</div>
			<?php echo $display_none ?></div>
		</div>
	</section>
</div><?php echo $display_none1 ?>