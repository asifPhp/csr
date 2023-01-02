<?php

	 $page_heading = '';
    $heading = '';
	$prop_id1='';
	$org_id1='';
	$ngo_id1='';
	$autofill1='';
	
	if($proposal_data){
		$page_heading = 'Edit Proposal';
        $heading = 'Donor/Donee'; //  'Edit Proposal';
		$prop_id =$proposal_data['prop_id']; 
		$title =$proposal_data['title'];  
        $organisation_id =$proposal_data['organisation_id'];  
        $ngo_id =$proposal_data['ngo_id'];  
        $code =$proposal_data['code']; 
        $is_readonly="readOnly" ;
        
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
			$disp_none_step='';
			$is_add_edit='edit';	
		}
		
		
	}else{
		$page_heading = 'Create New Proposal';
		$prop_id =0;
        $heading = 'Donor/Donee'; //'Add New Proposal';
		$title ='';
        $organisation_id ='';
        $ngo_id ='';
        $code ='';
		$is_add_edit='add';	
        $is_readonly="";
		$disp_none='<!--';
		$disp_1='-->';
		$disp_none_step='';
		$disp_none_view='display_none';
		
	
	}
	
	if(isset($_GET['prop_id']) && isset($_GET['org_id'])&& isset($_GET['ngo_id']) && isset($_GET['autofill']) ){
		$prop_id1=$_GET['prop_id'];
		$org_id1=$_GET['org_id'];
		$ngo_id1=$_GET['ngo_id'];
		$autofill1=$_GET['autofill'];
		$organisation_id=$org_id1;
		$ngo_id=$ngo_id1;
		if($autofill1=='true'){
			$prop_id=0;
			
		}
	}


	
	
	?>

<input type="hidden" class="form-control" id="prop_id" name="prop_id" value="<?php echo $prop_id;?>"> 
<input type="hidden" class="form-control" id="is_add_edit" value='<?php echo $is_add_edit; ?>'>

<?php echo $disp_none;?>  
<div class="">
  <?php echo $disp_1;?> 
				<div id="alert_danger_error"></div>
              <div role="tabpanel" class="tab-pane active" id="page1">
                  <!-- general form elements -->
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title"><?php echo $heading?></h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        
                        
                        <div class="row bs-wizard <?php echo $disp_none_step;?>" style="border-bottom:0;">
                            
                            <div class="col-xs-2 bs-wizard-step active">
                              <div class="text-center bs-wizard-stepnum">Step 1</div>
                              <div class="progress"><div class="progress-bar"></div></div>
                              <a href="#page1" role="tab" data-toggle="tab" class="bs-wizard-dot"></a>
                            </div>
                            
                            <div class="col-xs-2 bs-wizard-step disabled"><!-- disabled -->
                              <div class="text-center bs-wizard-stepnum">Step 2</div>
                              <div class="progress"><div class="progress-bar"></div></div>
                              <a href="#page2" class="bs-wizard-dot"></a>
                            </div>
                            <div class="col-xs-2 bs-wizard-step disabled"><!-- disabled -->
                              <div class="text-center bs-wizard-stepnum">Step 3</div>
                              <div class="progress"><div class="progress-bar"></div></div>
                              <a href="#page3" class="bs-wizard-dot"></a>
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
							<label for="organisation_id">First select the CSR Organisation or Foundation you would like to submit your project proposal to <span class="required">*</span></label>
							<label for="input_description" class="input_description">This is so that you can make sure that the Organisation you are requesting funds from accepts proposals in your category and location.</label>
							<select class="form-control" id="organisation_id" name="organisation_id">
								<option value="">Select</option>
								<?php if($organisation_data){
									rsort($organisation_data); 
									foreach ($organisation_data as $key => $value) {
									  $is_selected='';
									  if($organisation_id==$value['org_id']){
										$is_selected='selected';
									  }
										echo '<option '.$is_selected.' value="'.$value['org_id'].'">'.$value['org_name'].'</option>';
									}
								}?>
                            </select>
							<div id="organisation_required_error" class="display_none">
								<label class="required">Organisation is required.</label>
							</div>
                        </div>
						<?php //var_dump($ngo_data);?>
                        <div class="form-group">
							<label for="ngo_id">Which entity within your NGO will be receiving the grant? <span class="required">*</span></label>
							<select class="form-control" id="ngo_id" name="ngo_id">
								<option value="">Select</option>
								<?php if($ngo_data){
										rsort($ngo_data); 
									foreach ($ngo_data as $key => $value) {
									  $is_selected='';
									  if($ngo_id==$value['id']){
										$is_selected='selected';
									  }if($value['legal_name']!=''){
										echo '<option '.$is_selected.' value="'.$value['id'].'">'.$value['legal_name'].'</option>';
									  }
									  }
									}
								?>
                            </select>
							<div id="ngo_required_error" class="display_none">
								<label class="required">NGO is required.</label>
							</div>
                        </div>
						<?php //var_dump($proposal_dropdown_data);?>
						<div class="form-group">
							<label for="state">Do you want to create a new proposal from scratch or copy data from a previously created proposal?</label><br>
							<!--<label class="input_description">Input options are Select list of all other proposals of this superNGO: for each item in the list show Proposal.entity.code - Proposal.csrorg - ProjectID - Proposal.title     This should be a searchable dropdown, like geographies dropdown. FIRST OPTION SHOULD BE 'Create new proposal from scratch". This option should be PRESELECTED</label>-->
							<!--<input type="text" class="form-control" id="state" name="state" placeholder="State" value="<?php //echo $state;?>">-->
							<select class="form-control state js-example-basic-single" id="proposal_dropdown" name="proposal_dropdown">
								<option value="">Create new proposal from scratch</option>
								<?php
									if($proposal_dropdown_data){
										foreach ($proposal_dropdown_data as $key => $value) {
											$is_selected='';
											$list_data=$value['code'].' - '.$value['org_name'].' - '.$value['new_prop_id'].' - '.$value['title'];
											if($prop_id1==$value['prop_id']){
												$is_selected='selected';
											}	
											echo '<option '.$is_selected.' ngo_id="'.$value['id'].'" org_id="'.$value['org_id'].'" prop_id="'.$value['prop_id'].'">'.$list_data.'</option>';
										}
									}
								?>
							</select> 
							<div id="state_error" class="display_none">
								<label class="required">State is required.</label>
							</div>
						</div>
						
                    </div>
                    <div class="box-footer clearfix">
						<div class="form-group <?php echo $disp_none_view;?>">
                            <span class="btn btn-default cancel_page" align="<?php echo $prop_id;?>">Cancel</span>
                            <button type="button" class="btn btn-success step1_next">Save Changes</button>
						</div>
                        <div class="form-group <?php echo $disp_none_step;?> ">
                            <!--<button type="button" class="btn btn-success save_step1">Save</button>-->
                            <button type="button" class="btn btn-success step1_save_and_next">Save & Next</button>
                        </div>
                    </div>
                  </div>
                </div>

<?php echo $disp_none;?>          
  </div>  <?php echo $disp_1;?>