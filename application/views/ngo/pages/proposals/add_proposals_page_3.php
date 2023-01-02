<?php

	$page_heading = '';
    $heading = '';
	//var_dump($proposal_dropdown_data);
	if($proposal_data){
		$page_heading = 'Edit Proposal';
        $heading = 'Edit Proposal';
		$prop_id =$proposal_data['prop_id']; 
		$title =$proposal_data['title'];  
        $organisation_id =$proposal_data['organisation_id'];  
        $ngo_id =$proposal_data['ngo_id'];  
        $code =$proposal_data['code']; 

        $focus_category=$proposal_data['focus_category'];
        $focus_subcategory=$proposal_data['focus_subcategory'];
        $category_input=$proposal_data['category_input'];
        $region=$proposal_data['region'];
        $benficial_cat=$proposal_data['benficial_cat'];
        $age_group=$proposal_data['age_group'];
        $target_group=$proposal_data['target_group'];
        $slums_villages=$proposal_data['slums_villages'];
        $women_adult=$proposal_data['women_adult'];
        $men_adult=$proposal_data['men_adult'];
        $children=$proposal_data['children'];
        $geo_location=$proposal_data['geo_location'];
        $geo_location_values=$proposal_data['geo_location_values'];
        $start_date=$proposal_data['start_date'];
        $end_date=$proposal_data['end_date'];
        $local_address=$proposal_data['local_address'];
        $street_address=$proposal_data['street_address'];
        $state=$proposal_data['state'];
        $city=$proposal_data['city'];
        $pincode=$proposal_data['pincode'];
        $full_name=$proposal_data['full_name'];
        $designation=$proposal_data['designation'];
        $email_address=$proposal_data['email_address'];
        $contact_no=$proposal_data['contact_no'];
        $new_prop_id=$proposal_data['new_prop_id'];
		//var_dump($new_prop_id);
		$is_add_edit='edit';	
		$is_readonly="readOnly" ;
        $disp_none='';
        $disp_1='';
        $disp_none_view='';
        $display_none_='display_none';
		//$page_counter3=3;
		$disp_none_step='display_none';
		if($edit_with_add=='yes'){
			$disp_none='<!--';
			$disp_1='-->';
			$disp_none_step='';
			$disp_none_view='display_none';
			$page_heading = 'Create New Proposal';
			$is_add_edit='add';	
			$display_none_='';
			
		}
	
	}else{
		//$page_counter3=3;
		$page_heading = 'Create New Proposal';
        $heading = 'Add New Proposal';
		$prop_id =0;
		$title ='';
        $organisation_id ='';
        $ngo_id ='';
        $code ='';
        $focus_category='';
        $focus_subcategory='';
        $category_input='';
        $region='';
        $benficial_cat='';
        $age_group='';
        $target_group='';
        $slums_villages='';
        $women_adult='';
        $men_adult='';
        $children='';
        $geo_location='';
        $geo_location_values='';
        $start_date ='';
        $end_date='';
        $local_address='';
        $street_address='';
        $state='';
        $city='';
        $pincode='';
        $full_name='';
        $designation='';
        $email_address='';
        $contact_no='';
		$is_add_edit='add';
        $is_readonly="";
		$disp_none='<!--';
        $disp_1='-->';
        $disp_none_step='';
        $disp_none_view='display_none';
        $display_none_='';
	}
	
	if(isset($_GET['prop_id']) and isset($_GET['autofill'])){
		$prop_id=$_GET['prop_id'];
		if($_GET['autofill']=='true'){
			$prop_id=0;
		}
	}
	
	
		//var_dump($organisation_id);
	?>
	
<style>
.select2-container {
	width: 100% !important;
}
</style>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<?php //var_dump($state);?>  
	<?php //var_dump($city);?>  
	<?php echo $disp_none;?>  
<div class="">
  <?php echo $disp_1;?> 
  
				<input type="hidden" class="form-control" id="is_add_edit3" value='<?php echo $is_add_edit; ?>'>
				<input type="hidden" class="form-control" id="organisation_id" value='<?php echo $organisation_id; ?>'>
				<input type="hidden" class="form-control" id="ngo_id" value='<?php echo $ngo_id; ?>'>
				<div id="alert_danger_error"></div>
				<div role="tabpanel" class="tab-pane" id="page3">
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Proposal Overview</h3>
                      
                    </div>
                    <div class="box-body">
					<label id="headerMsg"></label>
					  <form id="add_proposal3" method="post" role="form">

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
                            <div class="col-xs-2 bs-wizard-step active"><!-- active -->
                              <div class="text-center bs-wizard-stepnum">Step 3</div>
                              <div class="progress"><div class="progress-bar"></div></div>
                              <a href="#page3" role="tab" data-toggle="tab" class="bs-wizard-dot"></a>
                            </div>
							<div class="col-xs-2 bs-wizard-step disabled"><!-- disabled -->
                              <div class="text-center bs-wizard-stepnum">Step 4</div>
                              <div class="progress"><div class="progress-bar"></div></div>
                              <a href="#page4" class="bs-wizard-dot"></a>
                            </div>
							<div class="col-xs-2 bs-wizard-step disabled"><!-- disabled -->
                              <div class="text-center bs-wizard-stepnum">Step 5</div>
                              <div class="progress"><div class="progress-bar"></div></div>
                              <a href="#page5" class="bs-wizard-dot"></a>
                            </div>
							
                        </div>
						
						
						<div class="form-group">
                          <label for="project_title">Project Title <span class="required">*</span></label>
                          <input type="text" class="form-control" id="project_title" name="project_title" placeholder="Project Title" value="<?php echo $title;?>">
                        </div>
						
						<div class="form-group">
                          <label for="focus_area_project">Focus area of the Project</label>
								 <div class="row">
									<div class="col-md-4">
										<label for="focus_category">Category<span class="required">*</span></label>
										
											<select class="form-control" id="focus_category" name="focus_category" >
											  <option value="">Select category</option>
											<?php
                                              
											  if($category_data){
														  
													foreach($category_data as $val){ 
														$is_selected='';
						                                  if($focus_category==$val['id']){
						                                    $is_selected='selected';
						                                  }
												
													 echo '<option '.$is_selected.' value="'.$val['id'].'">'.$val['name'].'</option>';
													}
												  }
											?>
										  </select> 
									</div>
									
									<div class="col-md-4">
									<?php  //var_dump($admin_states); 
											//var_dump($admin_city);?>
										<label for="focus_subcategory">Sub category<span class="required">*</span></label>
										   <select class="form-control" id="focus_subcategory" name="focus_subcategory">
											  <option value="">Select Subcategory </option>
											 <?php
											  if($subcategory_data){
													foreach ($subcategory_data as $key => $value) {
														$is_selected='';
														if($focus_category==$value['category_id']){
															if($focus_subcategory==$value['id']){
																$is_selected='selected';
															}	
															echo '<option '.$is_selected.' value="'.$value['id'].'" id="'.$value['category_id'].'">'.$value['name'].'</option>';
														}
													}
												  }
												  ?>
										  </select> 
										   <select class="form-control" style="display:none;" id="sub_category_temp" name="sub_category_temp" >
											  <option value="">Sub Category </option>
											  <?php
											  if($subcategory_data){
													foreach ($subcategory_data as $key => $value) {
														$is_selected='';
														if($val['id']==$value['category_id']){
															$is_selected='selected';
														}
														echo '<option '.$is_selected.' value="'.$value['id'].'" id="'.$value['category_id'].'">'.$value['name'].'</option>';
													}
												  }
												  ?>
										  </select> 
									</div>
									<div class="col-md-4">
										 <label for="category_input">Focus area within this category<span class="required">*</span></label>
											<input type="text" class="form-control" id="category_input" name="category_input" placeholder="" value="<?php echo $category_input;?>">
								 </div>
								</div>
									 
						</div>
						<div class="form-group">
                          <label for="benificiary_categorisation">Benificiary Categorisation</label></br>
						
							  <div class="row">
									<div class="col-md-3">
										<label for="region">Region<span class="required">*</span></label>
										   <select class="form-control" id="region" name="region" >
											  <option value="">Select region</option>
											  <option value="Urban/Slums" <?php if($region=="Urban/Slums"){?> selected <?php }?>>Urban/Slums</option>
											  <option value="Rural/Villages" <?php if($region=="Rural/Villages"){?> selected <?php }?>>Rural/Villages</option>
											  <option value="Mixed" <?php if($region=="Mixed"){?> selected <?php }?> >Mixed</option>
											</select>
									</div>
									<div class="col-md-3">
										<label for="benficial_cat">Category<span class="required">*</span></label>
										   <select class="form-control" id="benficial_cat" name="benficial_cat" >
											  <option value="">Select category</option>
											  <option value="SC/ST" <?php if($benficial_cat=="SC/ST"){?> selected <?php }?>>SC/ST</option>
											  <option value="General" <?php if($benficial_cat=="General"){?> selected <?php }?>>General</option>
											  <option value="Mixed" <?php if($benficial_cat=="Mixed"){?> selected <?php }?>>Mixed</option>
											</select>
									</div>
									<div class="col-md-3">
										<label for="age_group">Age group<span class="required">*</span></label>
										   <select class="form-control" id="age_group" name="age_group" >
											  <option value="">Select age group</option>
											  <option value="Children" <?php if($age_group=="Children"){?> selected <?php }?> >Children</option>
											  <option value="Adults" <?php if($age_group=="Adults"){?> selected <?php }?>>Adults</option>
											  <option value="Mixed" <?php if($age_group=="Mixed"){?> selected <?php }?> >Mixed</option>
											</select>
									</div>
									<div class="col-md-3">
										<label for="target_group">Target group<span class="required">*</span></label>
										   <select class="form-control" id="target_group" name="target_group" >
											  <option value="">Select target group</option>
											  <option value="Male" <?php if($target_group=="Male"){?> selected <?php }?> >Male</option>
											  <option value="Female" <?php if($target_group=="Female"){?> selected <?php }?> >Female</option>
											  <option value="Family" <?php if($target_group=="Family"){?> selected <?php }?> >Family</option>
											  <option value="Community" <?php if($target_group=="Community"){?> selected <?php }?> >Community</option>
											  <option value="Mixed" <?php if($target_group=="Mixed"){?> selected <?php }?> >Mixed</option>
											</select>
									</div>
							  </div>
                        </div>
							
						<div class="form-group">
							<label for="benificiary_number">Benificiary Numbers</label></br>
							<label for="benificiary_disc" class="input_description">If you do not know the exact number, enter as close an approximation as you can</label>
							<div class="row">
								<div class="col-md-3">
								   <label for="slums_villages">Slums/Villages <span class="required">*</span></label>
									<input type="number" class="form-control" id="slums_villages" name="slums_villages" placeholder="Slums/Villages" value="<?php echo $slums_villages;?>">
								</div>
								<div class="col-md-3">
									<label for="women_adult">Women(Adult) <span class="required">*</span></label>
									<input type="number" class="form-control" id="women_adult" name="women_adult" placeholder="Women(Adults)" value="<?php echo $women_adult;?>">
								</div>
								<div class="col-md-3">
									<label for="men_adult">Men(Adult) <span class="required">*</span></label>
									<input type="number" class="form-control" id="men_adult" name="men_adult" placeholder="Men(Adults)" value="<?php echo $men_adult;?>">
								</div>
								<div class="col-md-3">
									<label for="children">Children <span class="required">*</span></label>
									<input type="number" class="form-control" id="children" name="children" placeholder="Children" value="<?php echo $children;?>">
								</div>
							</div>
                        </div>
                        
						<div class="form-group">
							<h5>Project Details</h5>
						</div>
						<input type="hidden" name="" id="geo_location_alue" value="<?php echo $geo_location;?>">
                        <input type="hidden" name="" class="page_counter" value="<?php echo $page_counter;?>">
						<div class="form-group">
							<label for="target_geography">Target geography(s) of the Project<span class="required">*</span></label>
							<input type="text" readonly id="geo_location" name="geo_location" placeholder="" value="<?php echo $geo_location_values;?>">
							<div class="">
								<div id="geography_error" class="display_none">
									<label class="required">Target geography is required.</label>
								</div>
							</div>
                        </div>
                        
						<div class="form-group">
							<label for="start_date">Start Date <span class="required">*</span></label>
                            <input type="text" readOnly class="form-control old_date" id="start_date" name="start_date" placeholder="Start date" value="<?php echo $start_date;?>">
							<div id="start_date_error" class="display_none">
								<label class="required">Start Date is required.</label>
							</div>
						</div>
						<div class="form-group">
							<label for="end_date">End Date <span class="required">*</span></label>
                            <input type="text" readOnly class="form-control new_date" id="end_date" name="end_date" placeholder="End date" value="<?php echo $end_date;?>">
							<div id="end_date_error" class="display_none">
								<label class="required">End Date is required.</label>
							</div>
							<div id="end_date_error1" class="display_none">
								<label class="required">End Date should be grater than Start Date.</label>
							</div>
						</div>
						<div class="form-group">
							<label for="local_address">Local Address</label><br>
							<label class="input_description">Select an address from the list or enter a new address below</label>
							<div class="row">
								<div class="col-md-12">
								  
									<select class="form-control" id="local_address" name="local_address" >
										<!--<option value="" >Select</option>-->
										<?php 
											$this->load->model('Comman_model', 'obj_comman', TRUE);
											$superngo_id = $this->session->userdata('superngo_id');
											//echo $superngo_id;
											$ngo_data = $this->obj_comman->get_by('ngo',array('superngo_id'=>$superngo_id));
										   
											foreach ($ngo_data as $row) {
												if($row['registration_detail']){
													$json_pretty = json_decode($row['registration_detail']);
													if($json_pretty){
														foreach($json_pretty as $item){
															var_dump($item);
															if($item->registration_state!=''){
																$selected = '';
																if($proposal_data['local_address']){
																	if($proposal_data['local_address'] == $row['id']){ 
																		$selected = 'selected';
																	}
																}
																echo '<option '.$selected.' registration_date="'.$item->registration_date.'" registration_street_address="'.$item->registration_street_address.'" registration_city="'.$item->registration_city.'" registration_pin_code="'.$item->registration_pin_code.'" Registration_Number="'.$item->Registration_Number.'" registration_certificate="'.$item->registration_certificate.'" value="'.$row['id'].'" id="'.$item->registration_state.'">
																	'.$item->registration_city.','.$item->registration_pin_code.','.$item->registration_state.'
																</option>';
															}
												  		}
													} 
												} 
											}
									  
										?>  
  									</select>
								</div>
								<div class="col-md-12">	  
									<label for="street_address">Street Address <span class="required">*</span></label>
									<input type="text" class="form-control" id="street_address" name="street_address" placeholder="Street Address" value="<?php echo $street_address;?>">
								</div>
								<div class="col-md-12">
									<label for="state">State<span class="required">*</span></label>
									<!--<input type="text" class="form-control" id="state" name="state" placeholder="State" value="<?php //echo $state;?>">-->
									<select class="form-control state js-example-basic-single" id="state" name="state">
										<option value="">Select state</option>
										<?php
											if($admin_states){
												foreach ($admin_states as $key => $value) {
													$is_selected='';
													if($state==$value['name']){
														$is_selected='selected';
													}	
													echo '<option '.$is_selected.' value="'.$value['name'].'" id="'.$value['id'].'">'.$value['name'].'</option>';
												}
											}
										?>
									</select> 
									
									<select class="form-control temp_state display_none" id="temp_state" name="temp_state">
										<option value="">Select state</option>
										<?php
											if($admin_states){
												foreach ($admin_states as $key => $value) {
													$is_selected='';
													if($state==$value['name']){
														$is_selected='selected';
													}	
													echo '<option '.$is_selected.' value="'.$value['name'].'" id="'.$value['id'].'">'.$value['name'].'</option>';
												}
											}
										?>
									</select> 
									
									
									<div id="state_error" class="display_none">
										<label class="required">State is required.</label>
									</div>
								</div>
								<div class="col-md-12">
									<label for="city">City<span class="required">*</span></label>
									<input type="text" class="form-control" id="city" name="city" placeholder="City" value="<?php echo $city;?>">
									<!--<select class="form-control js-example-basic-single" id="city" name="city">
										<option value="">Select city</option>
										<?php
											/*if($admin_city){
												foreach ($admin_city as $key => $value) {
													$is_selected='';
													if($city==$value['name']){
														$is_selected='selected';
													}	
													echo '<option '.$is_selected.' value="'.$value['name'].'" id="'.$value['id'].'" state_id="'.$value['state_id'].'">'.$value['name'].'</option>';
												}
											}*/
										?>
									</select>
									
									<select class="form-control" style="display:none;" id="city_temp">
										<?php
											/*if($admin_city){
												foreach ($admin_city as $key => $value) {
													$is_selected='';
													if($city==$value['name']){
														$is_selected='selected';
													}	
													echo '<option '.$is_selected.' value="'.$value['name'].'" id="'.$value['id'].'" state_id="'.$value['state_id'].'">'.$value['name'].'</option>';
												}
											}*/
										?>
									</select>-->
								</div>
								<div class="col-md-12">
									<label for="pincode">Pincode <span class="required">*</span></label>
									<input type="number" class="form-control" id="pincode" name="pincode" placeholder="pincode" value="<?php echo $pincode;?>">
								</div>
							</div>
						</div>
                       
						<div class="form-group">
							<h5 >Project Contact Person</h5>
							<div class="row">
								<div class="col-md-12">	  
									<label for="full_name">Full Name<span class="required">*</span></label>
									<input type="text" class="form-control" id="full_name" name="full_name" placeholder="Full Name" value="<?php echo $full_name;?>">
								</div>
								<div class="col-md-12">	  
									<label for="designation">Designation<span class="required">*</span></label>
									<input type="text" class="form-control" id="designation" name="designation" placeholder="Designation" value="<?php echo $designation;?>">
								</div>
								<div class="col-md-12">	  
									<label for="email_address">Email Address<span class="required">*</span></label>
									<input type="email" class="form-control" id="email_address" name="email_address" placeholder="Email Address" value="<?php echo $email_address;?>">
								</div>
								<div class="col-md-12">	  
									<label for="contact_no">Contact Number<span class="required">*</span></label></br>
									<label for="contact_no_desc" class="input_description">Enter Number without any spaces e.g.9876543210 or 02287654321</label>
									<input type="number" class="form-control" id="contact_no" name="contact_no" placeholder="Contact Number" value="<?php echo $contact_no;?>" >
								</div>
							</div>
					    </div>
						
						<div class="box-footer clearfix">
							<div class="form-group <?php echo $disp_none_view;?>">
								<span class="btn btn-default cancel_page" align="<?php echo $prop_id;?>">Cancel</span>
								<span class="btn btn-success " id="save_goto_next_step1">Save Changes</span>
							</div>
							<div class="form-group <?php echo $disp_none_step;?>">
								<!--<button type="submit" class="btn btn-primary  ">Save 1</button>-->
								<!--<button type="button" class="btn btn-success " id="save_goto_next_step1">Save</button>-->
								<button type="submit" class="btn btn-success save_goto_next_step <?php echo $display_none_; ?>" id="save_goto_next_step2">Save & Next </button>
								<button type="button" class="btn btn-primary skip_step_three display_none <?php echo $display_none_; ?>">Finish Later</button>
							</div>
						</div>
						
						
						</form>
                    </div>
		
                  </div>
						
                </div>
<?php echo $disp_none;?>          
  </div>  <?php echo $disp_1;?>