<?php
$financial_years=$this->db->get_where('financial_years')->result();

//$entity_data = false;
//var_dump($entity_data);
//var_dump($entity_data['category_array']);
if($entity_data){
	$legal_name=$entity_data['legal_name'];
	$brand_name=$entity_data['brand_name'];
	if(isset($entity_data['id'])){
		$entity_id=$entity_data['id'];
	}
	$geo_location_id=$entity_data['geo_location_id'];
	//var_dump($geo_location_id);
	//$city_id=json_decode($entity_data['city_id']);
	$city_id=$entity_data['city_id'];
	$code=$entity_data['code'];
	$website=$entity_data['website'];
	$category_array=json_decode($entity_data['category_array'],true);
	//var_dump($category_array);
	$geo_location=$entity_data['geo_location'];
	$city=json_decode($entity_data['city']);
	//var_dump($city);
	//$city=$entity_data['city'];
	$ngo_id=$entity_data['id'];
	//var_dump($ngo_id);
	$superngo_id=$entity_data['superngo_id'];
	$operation_nature=$entity_data['operation_nature'];
	$resource_managment=$entity_data['resource_managment'];
	$geographical_reach=$entity_data['geographical_reach'];
	$beneficiary_reach=$entity_data['beneficiary_reach'];
	$other_spacify_ddtail=$entity_data['other_spacify_ddtail'];
	
	$category_detail='';
	$display_none='';
	$display_none_='display_none';
	$display_none1='';
	$is_edit='';
	$is_add_edit='edit';
	if($code){
		$disabled='disabled';
	}else{
		$disabled='';
	}
	
	$edit_title='<section class="content-header"><a href="'.base_url().'ngo/entity/edit?id='.$ngo_id.'" class="btn btn-default pull-right">Back</a>  <h1> Edit Entity </h1> </section>';
}else{
	$legal_name='';
	$brand_name='';
	$entity_id='';
	$geo_location_id='';
	$city_id='';
	$code='';
	$ngo_id='';
	$website='';
	$category_array='';
	$geo_location='';
	$city='';
	$operation_nature='';
	$superngo_id='';
	$resource_managment='';
	$geographical_reach='';
	$beneficiary_reach='';
	$category_detail='';
	$display_none='<!--';
	$display_none1='-->';
	$display_none_='';
	$disabled='';
	$is_add_edit='add';
	$is_edit='display_none';
	$edit_title='';
	$other_spacify_ddtail='';
	
}
?>
<style>
.input_description{font-weight: 400;}
.cat_bold{
	font-weight: 900;
    color: #3a3838;
}
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

.legal_name_error{color:red;}
.brand_name_error{color:red;}
.input_description_error{color:red;}
.website_error{color:red;}
.resource_managment_error{color:red;}
.geographical_reach_error{color:red;}
.beneficiary_reach_error{color:red;}
.operation_nature_error{color:red;}
.legal_name_length_error{color:red;}
.brand_name_length_error{color:red;}
.other_spacify_ddtail_error{color:red;}
.legal_name_duplicate_error{color:red;}

</style>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<?php echo $display_none ?><div class="content-wrapper">
	<?php echo $edit_title;?>
	<section class="content">
	<div class="row">
			<div class="col-md-12">
				<input type="hidden" class="current_page" value="<?php echo $current_page; ?>" >	 
				<input type="hidden" class="form-control" id="entity_id" name="entity_id" value="<?php echo $entity_id;?>">
				<input type="hidden" class="form-control" id="geo_location_id" value='<?php echo $geo_location_id; ?>'>
				<input type="hidden" class="form-control" id="city_id" value='<?php echo $city_id; ?>'>
				<input type="hidden" class="form-control" id="city" value='<?php echo $city; ?>'>
				<input type="hidden" class="form-control" id="is_add_edit" value='<?php echo $is_add_edit; ?>'>
				<div id="err_add_plan"></div><?php echo $display_none1 ?>	
				<?php //var_dump($entity_data)?>
				<?php //var_dump($category_data);?>
				<?php //var_dump($city)?>
				<?php //var_dump($city_id)?>
				<div id="alert_danger_error"></div>
				<div role="tabpanel" class="tab-pane active" id="page1">
					  <!-- general form elements -->
					<div class="box box-primary">
						<div class="box-header with-border">
						  <h3 class="box-title">Basic Details</h3>
						</div>
						<!-- /.box-header -->
						<!-- form start -->
						<div class="box-body">
							<div class="row bs-wizard <?php echo $display_none_ ?>" style="border-bottom:0;">
								<div class="col-xs-2 bs-wizard-step active">
								  <div class="text-center bs-wizard-stepnum">Step 1</div>
								  <div class="progress"><div class="progress-bar"></div></div>
								  <a href="#page1" role="tab" data-toggle="tab" class="bs-wizard-dot"></a>
								</div>
								<div class="col-xs-2 bs-wizard-step disabled"><!-- active -->
								  <div class="text-center bs-wizard-stepnum">Step 2</div>
								  <div class="progress"><div class="progress-bar"></div></div>
								  <a href="#page2" class="bs-wizard-dot"></a>
								</div>
								<div class="col-xs-2 bs-wizard-step disabled"><!-- active -->
								  <div class="text-center bs-wizard-stepnum">Step 3</div>
								  <div class="progress"><div class="progress-bar"></div></div>
								  <a href="#page3" class="bs-wizard-dot"></a>
								</div>
								<div class="col-xs-2 bs-wizard-step disabled"><!-- active -->
								  <div class="text-center bs-wizard-stepnum">Step 4</div>
								  <div class="progress"><div class="progress-bar"></div></div>
								  <a href="#page4" class="bs-wizard-dot"></a>
								</div>
								<div class="col-xs-2 bs-wizard-step disabled"><!-- active -->
								  <div class="text-center bs-wizard-stepnum">Step 5</div>
								  <div class="progress"><div class="progress-bar"></div></div>
								  <a href="#page5" class="bs-wizard-dot"></a>
								</div>
								<div class="col-xs-2 bs-wizard-step disabled"><!-- active -->
								  <div class="text-center bs-wizard-stepnum">Step 6</div>
								  <div class="progress"><div class="progress-bar"></div></div>
								  <a href="#page6" class="bs-wizard-dot"></a>
								</div>
							</div>
							<div><label class="display_none" id="error_field">Please fill all required fields.</label></div>
							<form id="entity_step1_form" class=" entity_step1_form" method="post" role="form">
								
								<div class="form-group">
								  <label for="legal_name">Legal Name of Your Organisation <span class="required">*</span></label>
									<div>
									  <label for="input_description" class="input_description">Exactly as entered in registration documents</label>
									  <input type="text" class="form-control" id="legal_name" name="legal_name" placeholder="Enter name here"duplicate="no" value="<?php echo $legal_name; ?>">
									</div>
									<label class="legal_name_error display_none">Legal Name is required.</label>
									<label class="legal_name_length_error display_none">Please enter a valid legal name</label>
									<label class="legal_name_duplicate_error display_none">This Legal name already exists. Please choose another. </label>
								</div>
								<div class="form-group">
									<label for="brand_name">Brand Name of Your Organisation <span class="required">*</span></label>
									<div>
									  <label for="input_description" class="input_description">What name you are commonly known as by your funders and beneficiaries</label>
									  <input type="text" class="form-control" id="brand_name" name="brand_name" placeholder="Enter name here" value="<?php echo $brand_name;?>">
									</div>
									<label class="brand_name_error display_none">Brand Name is required.</label>
									<label class="brand_name_length_error display_none">Your name must be at least 3 characters long</label>
								</div>
								<div class="form-group">
								  <label for="code">Provide a Unique Short Code for This Entity <span class="required">*</span></label><br/>
								  <label for="input_description" class="input_description" style="color: red;">WARNING: This code cannot be changed in the future.it can be a maximum of 6 characters in length.</label>
								  <input <?php echo $disabled; ?> type="text" class="form-control" id="code" name="code" placeholder="Enter code here" value="<?php echo $code;?>" maxlength="6">
									<label class="input_description_error display_none">Code is required.</label>
								</div>
								<div class="form-group">
								  <label for="website">Provide a link to the organisation's website <span class="required">*</span></label>
								  <input type="url" class="form-control" id="website" name="website" placeholder="Enter url here" value="<?php echo $website;?>">
								<label class="website_error  display_none">Please enter a valid web address.</label>
								</div>
								<div class="form-group">
									<label for="operation_nature">What is the Primary Nature of Operations? <span class="required">*</span></label>
									<div id="box">
										<select id="operation_nature" name="operation_nature" class="form-control select_button">
											<option value="">Select...</option>
											<option value="Direct Implementing Agency" <?php if($operation_nature==='Direct Implementing Agency') echo 'selected="selected"';?>>Direct Implementing Agency</option>
											<option value="Funding Agency" <?php if($operation_nature==='Funding Agency') echo 'selected="selected"';?>>Funding Agency </option>
											<option value="Advocacy" <?php if($operation_nature==='Advocacy') echo 'selected="selected"';?>>Advocacy </option>
											<option value="Others" <?php if($operation_nature==='Others') echo 'selected="selected"';?>>Others </option>
										</select>
									</div>
									<label class="operation_nature_error  display_none">Primary Nature is required.</label>
								</div>
								
								<div class="form-group other_spacify_ddtail <?php if($operation_nature==='Others'){}else{ echo 'display_none';} ?> ">
								  <label for="website">Please specify details for the above<span class="required">*</span> </label>
								  <input type="text" class="form-control" id="other_spacify_ddtail" name="other_spacify_ddtail" placeholder="Enter details here..." value="<?php echo $other_spacify_ddtail;?>">
								<label class="other_spacify_ddtail_error  display_none">Specify details is required.</label>
								</div>
								<!--<div class="form-group">
									<label>List The Key Activities Undertaken by The Organisation <span class="required">*</span></label>
									<table class="table table-condensed">
										<thead>
											<tr>
												<th>Category</th>
												<th>Deatils</th>
												<th></th>
											</tr>
										</thead>
										<tbody class="append_activities select_category">
											<?php 
												if($category_array){
													$i = 0;
													foreach ($category_array as $value) { $i++ ; ?>
											<tr class="mydata" category="<?php echo $value['category_id'] ?>">
												<td class="category_name" name="<?php echo $value['category_name'] ?>"><?php echo $value['category_name'] ?></td>
												<td><?php echo $value['value'] ?></td>
												<td><button type="button" class="btn btn-danger remove_category_data"><i class="fa fa-close"></i></button></td>
											</tr>
											<?php 	}
												}?>
										</tbody>
										<tr class="">
											<td>
												<select id="category" name="category" class="form-control select_button"> 
													<option value="">Select Category</option>
													<?php 
													if($category_data){
														foreach ($category_data as $key => $value) {
															echo '<option value="'.$value['id'].'" name="'.$value['name'].'">'.$value['name'].'</option>';
														}
													}?>
												</select>
											</td>
											<td>
												<input type="text" class="form-control " id="category_detail" name="category_detail" placeholder="Enter key activities in this category" value="<?php echo $category_detail;?>">
											</td>
										</tr>
										<div>
										
										</div>
										<tr>
											
											<td id="append_button" class=" "><button type="button" class="btn btn-default submit_category_data">+</button><label style="margin-left:10px;">Add another Category</label></td>
											<td></td>
										</tr>
									</table>
									<span class="category_err_2 display_none">please add all fields.</span>
								</div>-->
								
						<label>List The Key Activities Undertaken by The Organisation <span class="required">*</span></label>
													
						<div id="CycleTextBoxContainer" class="mydata row">
							<?php
							if($category_array){
								$i = 0;
								foreach ($category_array as $value) { $i++ ; 
									$category_detail=$value['value'];
									$category_id = $value['category_id'];
									//var_dump($category_data);
							?>
							<div class="selected_class" >
								<div class="form-group col-md-4">
									<select class="form-control select_button category" id="category"> 
										<option value="" >Select Category</option>
										<?php
										if($category_data){
											foreach ($category_data as $key => $value) {
												$is_selected='';
												$name='';
												if(isset($value['category_id'])){
													$disabled = '';
													$cat_bold = '';
													$category_name=$value['category_name'];
												}else{
													$cat_bold = 'font-weight: 900;color: #3a3838;';
													$disabled = 'disabled="disabled';
													$category_name='';
												}
												if($category_id==$value['id']){
													$is_selected='selected';
													$name= $value['name'];
												}
												echo '<option category_name="'.$category_name.'" '.$disabled.' '.$is_selected.' class="category_name" style="'.$cat_bold.'" value="'.$value['id'].'" name="'.$name.'">'.$value['name'].'</option>';
											}
										}
										?>
									</select>
								</div>
								<div class="form-group col-md-7">
									<input type="text" class="form-control category_detail"  name="category_detail" placeholder="Enter key activities in this category" value="<?php echo $category_detail;?>">
								</div>
								<div class="form-group col-md-1">
										<button type="button" class="btn btn-danger CycleRemovepara"><i class="fa fa-close"></i></button>
								</div>
										
							</div>
								
								<?php }}
								if(!$category_array){
									foreach ($category_data as $key => $value) {
										//var_dump($value);
										if(isset($value['category_id'])){
											
										}else{
											//var_dump($value['name']);
											//var_dump($value['id']);
										}
									}
								?>
									<div class="selected_class" >
										<div class="form-group col-md-4">
											<select  class="form-control select_button category" id="category"> 
												<option value="" >Select Category</option>
												<?php
												if($category_data){
													foreach ($category_data as $key => $value) {
														if(isset($value['category_id'])){
															$disabled = '';
															$cat_bold = '';
															$category_name=$value['category_name'];
														}else{
															$cat_bold = 'font-weight: 900;color: #3a3838;';
															$disabled = 'disabled="disabled';
															$category_name='';
														}
														echo '<option category_name="'.$category_name.'" '.$disabled.' class="category_name" style="'.$cat_bold.'" value="'.$value['id'].'" name="'.$value['name'].'">'.$value['name'].'</option>';
													}
												}
												?>
											</select>
										</div>
										<div class="form-group col-md-8">
											<input type="text" class="form-control category_detail"  name="category_detail" placeholder="Enter key activities in this category" value="<?php echo $category_detail;?>">
										</div>
									</div>
								<?php } ?>
						</div>
							<label class="duplicate_category_error display_none col-md-12" style="color:red;">Please select another category</label>
							<label class="category_err_2 col-md-12 display_none">Key Activities is required.</label>
						
								<div style="display: none;">
									<div id ="Cycle_append_html">
										<div class="selected_class" >
											<div class="form-group col-md-4">
												<select  class="form-control select_button category" id="category_temp"> 
													<option value="" >Select Category</option>
													<?php
													if($category_data){
														foreach ($category_data as $key => $value) {
															if(isset($value['category_id'])){
																$disabled = '';
																$cat_bold = '';
																$category_name=$value['category_name'];
															}else{
																$cat_bold = 'font-weight: 900;color: #3a3838;';
																$disabled = 'disabled="disabled';
																$category_name='';
															}
															echo '<option category_name="'.$category_name.'" '.$disabled.' class="category_name" style="'.$cat_bold.'" value="'.$value['id'].'" name="'.$value['name'].'">'.$value['name'].'</option>';
														}
													}
													?>
												</select>
											</div>
											
											<div class="form-group col-md-7">
												<input type="text" class="form-control category_detail " name="category_detail" placeholder="Enter key activities in this category" value="">
											</div>
											<div class="form-group col-md-1">
												<button type="button" class="btn btn-danger CycleRemovepara"><i class="fa fa-close"></i></button>
											</div>
										</div>	
									</div>
								</div>
								<div class="form-group">
									<button type="button" id="CycleAddParabtn" class="btn btn-success submit_category_data"><i class="fa fa-plus"></i></button><label style="margin-left:5px;">Add another Category</label>
								</div>	
								<div class="form-group">
									<label for="geo_location">Choose the entity's geographies of operation<span class="required">*</span></label>
									<input type="text" readonly class="form-control" id="geo_location" name="geo_location" placeholder="Choose The Entity's Areas of Operation" value="<?php echo $geo_location;?>">
									<label class="error_geo_location display_none">Please choose one.</label>
								</div>
								<div class="form-group">
									<label for="city1">Mention Cities where the Organisation's Offices are Located <span class="required">*</span></label>
									<!--<input type="text" readonly class="form-control" id="city" name="city" placeholder="Select Cities" value="<?php //echo $city;?>">-->
									<!--<select class="form-control js-example-tags" id="city" name="city" multiple="multiple">
										<?php/*
											if($city){
												foreach ($city as $key => $valuex) {
													$is_match='no';
													if($admin_city){
														foreach ($admin_city as $key1 => $value) {
															$is_selected='';
															if($is_match == 'no'){
																if($valuex == $value['name']){
																	$is_selected='selected';
																	$is_match='yes';
																}	
															}	
															echo '<option '.$is_selected.' value="'.$value['name'].'" id="'.$value['id'].'">'.$value['name'].'</option>';
														}	
													}	
													if($is_match == 'no'){
														echo '<option selected value="'.$valuex.'" id="">'.$valuex.'</option>';
													}
												}
											}
										*/?>
									</select>-->
									<select id="city" name="city" class="form-control js-example-tags" multiple="multiple">		
									
									</select>
									<label class="error_city display_none">Please choose one.</label>
								</div>
								<h5>Organisation Scale of Work</h5>
								<div class="row">
									<div class="form-group col-md-4">
										<label for="resource_managment">Management Resources <span class="required">*</span></label>
										<select id="resource_managment" name="resource_managment" class="form-control select_button">		
											<option value="">Select...</option>
											<option value="At least 25% of the organisation has professional qualification AND work experience greater than 10 years" <?php if($resource_managment==='At least 25% of the organisation has professional qualification AND work experience greater than 10 years') echo 'selected="selected"';?>>At least 25% of the organisation has professional qualification AND work experience greater than 10 years</option>
											<option value="At least 25% of the organisation has professional qualification OR work experience greater than 10 years" <?php if($resource_managment==='At least 25% of the organisation has professional qualification OR work experience greater than 10 years') echo 'selected="selected"';?>>At least 25% of the organisation has professional qualification OR work experience greater than 10 years</option>
											<option value="Neither" <?php if($resource_managment==='Neither') echo 'selected="selected"';?>>Neither</option>
										</select>
										<label class="resource_managment_error  display_none">Management Resources is required.</label>
									</div>
									<div class="form-group col-md-4">
									  <label for="geographical_reach">Geographical Reach <span class="required">*</span></label>
										<select id="geographical_reach" name="geographical_reach" class="form-control select_button">		
											<option value="">Select...</option>
											<option value="Reaches more than 500 villages" <?php if($geographical_reach==='Reaches more than 500 villages') echo 'selected="selected"';?>>Reaches more than 500 villages </option>
											<option value="Reaches more than 100 villages/slums/vastis" <?php if($geographical_reach==='Reaches more than 100 villages/slums/vastis') echo 'selected="selected"';?>>Reaches more than 100 villages/slums/vastis</option>
											<option value="Reaches less than that 100 villages/slums/vastis" <?php if($geographical_reach==='Reaches less than that 100 villages/slums/vastis') echo 'selected="selected"';?>>Reaches less than that 100 villages/slums/vastis </option>
										</select>
										<label class="geographical_reach_error  display_none">Geographical Reach is required.</label>
									</div>
									<div class="form-group col-md-4">
									  <label for="beneficiary_reach">Beneficiary Reach <span class="required">*</span></label>
										<select id="beneficiary_reach" name="beneficiary_reach" class="form-control select_button">		
											<option value="">Select...</option>
											<option value="Reaches more than 1 lakh beneficiaries" <?php if($beneficiary_reach==='Reaches more than 1 lakh beneficiaries') echo 'selected="selected"';?>> Reaches more than 1 lakh beneficiaries </option>
											<option value="Reaches between 50,000 - 1 Lakh beneficiaries" <?php if($beneficiary_reach==='Reaches between 50,000 - 1 Lakh beneficiaries') echo 'selected="selected"';?>>Reaches between 50,000 - 1 Lakh beneficiaries</option>
											<option value="Reaches less than 50,000 beneficiaries" <?php if($beneficiary_reach==='Reaches less than 50,000 beneficiaries') echo 'selected="selected"';?>>Reaches less than 50,000 beneficiaries </option>
										</select>
										<label class="beneficiary_reach_error  display_none">Beneficiary Reach is required.</label>
									</div>
								</div>
								<div class="form-group">
									<span class="btn btn-default cancel_page <?php echo $is_edit; ?>" align="<?php echo $entity_id; ?>">Cancel</span>
									<span class="btn btn-success save_step <?php echo $is_edit; ?>" id="save_page1">Save Changes</span>
									<!--<span class="btn btn-success save_step <?php //echo $display_none_; ?>" id="save_page1">Save</span>-->

									<button type="submit" class="btn btn-success save_goto_next_step <?php echo $display_none_; ?>" id="submit_next_page1">Save & Next</button>

									<span class="btn btn-primary skip_step_one display_none <?php echo $display_none_; ?>" id="skip_step_one">Finish Later</span>
								</div>
							</form>
						</div>
					</div>
				</div>
			<?php echo $display_none ?></div>
		</div>
	</section>
</div><?php echo $display_none1 ?>