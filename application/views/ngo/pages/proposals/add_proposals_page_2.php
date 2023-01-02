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
        $is_readonly="readOnly" ;
        $disp_none='';
        $disp_1='';
        $disp_none_step='display_none';
        $disp_none_view='';
		//$is_add_edit='edit';
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
		$is_add_edit='add';	
        $is_readonly="";
        $disp_none='<!--';
        $disp_1='-->';
        $disp_none_step='';
        $disp_none_view='display_none';
	}
	
	if(isset($_GET['prop_id']) and isset($_GET['autofill'])){
		$prop_id=$_GET['prop_id'];
		if($_GET['autofill']=='true'){
			$prop_id=0;
		}
	}
		
	 ?>
	<input type="hidden" class="form-control" id="prop_id" name="prop_id" value="<?php echo $prop_id;?>">
	<input type="hidden" class="form-control" id="is_add_edit2" value='<?php echo $is_add_edit; ?>'>
<?php echo $disp_none;?>  
<div class="">
  <?php echo $disp_1;?> 


 
				<div id="alert_danger_error"></div>
               <div role="tabpanel" class="tab-pane" id="page2">
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Proposal Submission Advisory for <span class="title_org_name"></span></h3>
                      
                    </div>
                    <div class="box-body">
                     
                        <div class="row bs-wizard <?php echo $disp_none_step;?>" style="border-bottom:0;">
                            
                            <div class="col-xs-2 bs-wizard-step complete">
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
                              <a href="#page4" class="bs-wizard-dot"></a>
                            </div>
							<div class="col-xs-2 bs-wizard-step disabled"><!-- disabled -->
                              <div class="text-center bs-wizard-stepnum">Step 5</div>
                              <div class="progress"><div class="progress-bar"></div></div>
                              <a href="#page5" class="bs-wizard-dot"></a>
                            </div>
							
                        </div>
                       
                 
                        <div class="form-group">
                          <span>This is  dummey content</span>
                        </div>
                        
                        <div class="form-group" style="display: none;">
                          <label for="code">Code <span class="required">*</span></label>
                          <input type="text" class="form-control" id="code" name="code" <?php echo $is_readonly;?> placeholder="Code" value="<?php echo $code;?>">
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <div class="form-group <?php echo $disp_none_view;?>">
                            <span class="btn btn-default cancel_page" align="<?php echo $prop_id;?>">Cancel</span>
                            <button type="button" class="btn btn-success  step2_next1">Save Changes</button>
                       </div>

                        <div class="form-group <?php echo $disp_none_step;?> ">
                            <button type="button" class="btn btn-primary  step2_next">Next</button>
                            <!--<button type="button" class="btn btn-primary step2_submit">Finish Later</button>
                            <button type="button" class="btn btn-primary step2_next">Skip For Now</button>-->
                            <!--<label><span class="required">*note: required field checking not applayed yet</span></label>-->
                        </div>
                        
                    </div>
                  </div>
                </div>
 <?php echo $disp_none;?>          
  </div>  <?php echo $disp_1;?>

    