<link rel="stylesheet" href="<?php echo base_url()?>assets/css/comboTreePlugin.css">
<script src="<?php echo base_url()?>assets/js/comboTreePlugin.js"></script>
<style>
.marBot20{
	margin-bottom:20px;
}
.checkbox{margin-left: 15px;}
.bs-wizard {margin-top: 10px;}

/*Form Wizard*/
.bs-wizard {border-bottom: solid 1px #e0e0e0; padding: 0 0 10px 0;}
.bs-wizard > .bs-wizard-step {padding: 0; position: relative;}
.bs-wizard > .bs-wizard-step + .bs-wizard-step {}
.bs-wizard > .bs-wizard-step .bs-wizard-stepnum {color: #595959; font-size: 16px; margin-bottom: 5px;}
.bs-wizard > .bs-wizard-step .bs-wizard-info {color: #999; font-size: 14px;}
.bs-wizard > .bs-wizard-step > .bs-wizard-dot {position: absolute; width: 30px; height: 30px; display: block; background: #fbe8aa; top: 45px; left: 50%; margin-top: -15px; margin-left: -15px; border-radius: 50%;} 
.bs-wizard > .bs-wizard-step > .bs-wizard-dot:after {content: ' '; width: 14px; height: 14px; background: #fbbd19; border-radius: 50px; position: absolute; top: 8px; left: 8px; } 
.bs-wizard > .bs-wizard-step > .progress {position: relative; border-radius: 0px; height: 8px; box-shadow: none; margin: 20px 0;}
.bs-wizard > .bs-wizard-step > .progress > .progress-bar {width:0px; box-shadow: none; background: #fbe8aa;}
.bs-wizard > .bs-wizard-step.complete > .progress > .progress-bar {width:100%;}
.bs-wizard > .bs-wizard-step.active > .progress > .progress-bar {width:50%;}
.bs-wizard > .bs-wizard-step:first-child.active > .progress > .progress-bar {width:0%;}
.bs-wizard > .bs-wizard-step:last-child.active > .progress > .progress-bar {width: 100%;}
.bs-wizard > .bs-wizard-step.disabled > .bs-wizard-dot {background-color: #f5f5f5;}
.bs-wizard > .bs-wizard-step.disabled > .bs-wizard-dot:after {opacity: 0;}
.bs-wizard > .bs-wizard-step:first-child  > .progress {left: 50%; width: 50%;}
.bs-wizard > .bs-wizard-step:last-child  > .progress {width: 50%;}
.bs-wizard > .bs-wizard-step.disabled a.bs-wizard-dot{ pointer-events: none; }
/*END Form Wizard*/
.table td:nth-child(1){
	width:30%;
}
.checkbox_label
{
	margin-left:25px;
}
#errmsg
{
	color:red;
}
.form-control[readonly], fieldset[disabled] .form-control {
    background-color: #fff;
    opacity: 1;
}
#gsterror
{
	color:red;
}
.image-preview
{
	margin-bottom:1%;
	
}
.image-preview_one
{
margin-top:1%;
}
#date_err{color:red;}
#comman_file_upload_class
{
	margin-bottom:10px;
}
#error_field{color:red;}
#error_field2{color:red;}
.select_button{
	padding:2px 2px!important;
	

}
.governing_body_member_err{color:red;}
.error_geo_location{color:red;}
.error_city{color:red;}
.category_err{color:red;}
.category_err_2{color:red;}
.reg_detail_err{color:red;}
.detail_vehicle_error{color:red;}
.detail_foreign_travel_error{color:red;}
.major_details_err{color:red;}
.full_time_staff_err{color:red;}
.renumeration_err{color:red;}
.part_time_staff_err{color:red;}
.budget_detail_err{color:red;}
.other_relevanterr{color:red;}
.other_relevanterr{color:red;}
.copies_policies_err{color:red;}
.input_description{font-weight: 400;}
.display_upload_image_name{
	border: none;
    color: blue;
    padding: 0;
    cursor: auto;	
	

}



</style>

<?php
$financial_years=$this->db->get_where('financial_years')->result();

$data_value = false;
if($data_value){
	//$legal_name=$data_value[0]['legal_name'];
	$brand_name=$data_value[0]['brand_name'];
	$entity_id=$data_value[0]['entity_id'];
	$code=$data_value[0]['code'];
	$website=$data_value[0]['website'];
	$category_detail=$data_value[0]['category_detail'];
	$geo_location=$data_value[0]['geo_location'];
	$city=$data_value[0]['city'];
	$ngo_id=$data_value[0]['ngo_id'];
	$superngo_id=$data_value[0]['superngo_id'];
	
	
}else{
	//$legal_name='';
	$brand_name='';
	$entity_id='';
	$code='';
	$website='';
	$category_detail='';
	$geo_location='';
	$city='';
	$superngo_id='';
	
	
}
?>





  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php 
    $last_financial_year=date('n') <= 3 ? (date('Y') - 2).'-'.(date('y') - 1) : (date('Y') - 1).'-'.date('y');
    $second_last_financial_year=date('n') <= 3 ? (date('Y') - 3).'-'.(date('y') - 2) : (date('Y') - 2).'-'.(date('y') - 1);
    $third_last_financial_year=date('n') <= 3 ? (date('Y') - 4).'-'.(date('y') - 3) : (date('Y') - 3).'-'.(date('y') - 2);
    ?>
    <section class="content-header">
        <?php if($is_permitted['is_list']){ ?>
                <a href="<?php echo base_url();?>ngo/entity/list" class="btn btn-default pull-right">Back to Entity List</a>
              <?php }?>
        <h1>
          Setup Organisation
        </h1>
        
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
			<input type="hidden" class="current_page" value="<?php echo $current_page; ?>" >	 
            <input type="hidden" class="form-control" id="entity_id" name="entity_id" value="<?php echo $entity_id;?>">
		 	
            <div id="err_add_plan"></div>
           <!-- <div id="alert_danger_error"></div>-->
            <div class="tab-content">  
			   <?php $this->load->view('ngo/pages/entity/edit_entity_view/edit_entity_page_1');?>
			   <?php $this->load->view('ngo/pages/entity/edit_entity_view/edit_entity_page_2');?>
			   <?php $this->load->view('ngo/pages/entity/edit_entity_view/edit_entity_page_3');?>
			   <?php $this->load->view('ngo/pages/entity/edit_entity_view/edit_entity_page_4');?>
			   <?php $this->load->view('ngo/pages/entity/edit_entity_view/edit_entity_page_5');?>
			   <?php $this->load->view('ngo/pages/entity/edit_entity_view/edit_entity_page_6');?>
			   <?php $this->load->view('ngo/pages/entity/edit_entity_view/edit_entity_js_test');?>
			</div>
            <!-- /.box -->

        </div>

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

<!-- Registration form of page2 -->
<div style="display: none;">
    <div id="registration_append_html">
        <div class="panel panel-default registration_details_form">
            <div class="row panel-body">
                <div class="form-group col-md-12">
                    <button type="button" class="btn btn-danger pull-right RegistrationRemovepara"><i class="fa fa-close"></i></button>                     
                </div>
                <div class="form-group col-md-6">
                    <label for="registration_type">Registration Type <span class="required">*</span></label>
                    <select id="registration_type" name="registration_type" class="form-control registration_type select_button">       
                          <option value="">Registration Type </option>
                          <option value="Registered Society"> Registered Society </option>
                          <option value="Registered Trust"> Registered Trust </option>
                          <option value="Section 25/Section 8 Company">Section 25/Section 8 Company</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="registration_date">Date of Registration <span class="required">*</span></label>
                  <input type="text"  class="form-control old_date_new date_of_reg" name="registration_date" placeholder="Date of Registration " value="">
                </div>
                <div class="form-group col-md-12">
                    <h5>Registered Address</h5>
                </div>
                <div class="form-group col-md-6">
                  <label for="registration_street_address">Street Address <span class="required">*</span></label>
                  <input type="text" class="form-control reg_street_add" name="registration_street_address" placeholder="Street Address" value="">
                </div> 
                <div class="form-group col-md-2">
					<label for="registration_state" style="margin-bottom: 9px;">State<span class="required">*</span></label>
					<select class="form-control select_button state_select state single_2" name="state_name">
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
                <div class="form-group col-md-2">
					<label for="registration_city" style="margin-bottom: 5px;">City <span class="required">*</span></label>
					<input type="text" class="form-control city_select" name="registration_city" placeholder="City" value="">
					<!--<select class="form-control city_select single_2" name="registration_city" placeholder="Select City">
						<?php
							/*if($admin_city){
								foreach ($admin_city as $key => $value) {
									echo '<option value="'.$value['name'].'" id="'.$value['id'].'">'.$value['name'].'</option>';
								}
							}*/
						?>
					</select>-->
                </div>
                <div class="form-group col-md-2">
                  <label for="registration_pin_code">Pin Code <span class="required">*</span></label>
                  <input type="number" class="form-control pin_code" name="registration_pin_code" placeholder="Pin Code" value="">
                </div>
                <div class="form-group col-md-6">
                  <label for=" ">Registration Number <span class="required">*</span></label>
                  <input type="text" class="form-control reg_num" name="Registration_Number" placeholder="Registration Number" value="">
                </div>
                <div class="form-group col-md-6">
                    <label for=" ">Upload Scan/Soft Copy of Registration Certificate <span class="required">*</span></label>
                    <div class="col-md-12">
                        <button type="button" id="comman_file_upload_class" name="comman_file_upload_class" image_upload_desc="File must be less than 10MB in size.We prefer if you can provide .pdf versions of your document." upload_type="file" file_count="single" img_primary="no" file_prev_class="registration_copy_selected" file_input_id="registration_copy" class="btn btn-primary btn-lg comman_file_upload_class" data-toggle="modal" data-target="#browseFile"><i class="fa fa-upload"></i> </button>
						<input readonly class="form-control registration_copy reg_certificate" id="registration_copy" name="registration_copy" type="hidden" value="">
                        <div class="image-preview inline_block registration_copy_selected">
                            <input readonly class="form-control display_none upload_registration_certificate display_upload_image_name" type="text" value="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Registration form of page2 -->

<!-- Governing body member of page4 -->
<div style="display: none;">
    <div id="governing_member_append_html">
        <div class="panel panel-default">
            <div class="row panel-body">
                <div class="form-group col-md-12">
                    <button type="button" class="btn btn-danger pull-right GoverningMemberRemovepara"><i class="fa fa-close"></i></button>                     
                </div>
                <div class="form-group col-md-4">
                  <label for="name_of_member">Name of member <span class="required">*</span></label>
                  <input type="text" class="form-control name_of_member" name="name_of_member" placeholder="Enter name of member" value="">
                </div> 
                <div class="form-group col-md-2">
                  <label for="member_age">Age <span class="required">*</span></label>
                  <input type="number" class="form-control member_age" name="member_age" placeholder="Age" value="">
                </div> 
                <div class="form-group col-md-2">
                  <label for="member_gender">Gender <span class="required">*</span></label>
                  <select name="member_gender" class="form-control member_gender">       
                        <option value="">Select gender </option>
                        <option value="Male"> Male </option>
                        <option value="Female"> Female </option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="member_designation">Designation within the governing body <span class="required">*</span></label>
                  <input type="text" class="form-control member_designation" name="member_designation" placeholder="Enter details here" value="">
                </div>
                <div class="form-group col-md-4">
                  <label for="member_join_at">Since when is this person part of the governing body <span class="required">*</span></label>
                  <input readonly type="text" class="form-control old_date_again member_join_at" name="member_join_at" placeholder="Enter details here" value="">
                </div>
                <div class="form-group col-md-4">
                  <label for="member_related_to_other">Is the member related to any other governing body member by blood <span class="required">*</span></label>
                  <input type="text" class="form-control member_related_to_other" name="member_related_to_other" placeholder="Enter details here" value="">
                </div>
                <div class="form-group col-md-4">
                  <label for="member_occupation">Profession / Occupation of the member <span class="required">*</span> <br/>&nbsp;</label>
                  <input type="text" class="form-control member_occupation" name="member_occupation" placeholder="Enter details here" value="">
                </div>
            </div>
        </div>
    </div>
</div>


<!--Detail of vehicles and other assets of page 4-->
<div style="display: none;">
    <div id="details_of_vehicles_html">
	
         <div id="">
			<div class="panel panel-default">
				<div class="row panel-body">
					<div class="form-group col-md-4">
					  <label for="name_of_asset">Name of Asset <span class="required">*</span></label>
					  <input type="text" class="form-control name_of_asset" id="name_of_asset" name="name_of_asset" placeholder="Enter name of Asset" value="">
					</div> 
					<div class="form-group col-md-4">
					
					  <label for="location">Location<span class="required">*</span><span id="errmsg"></span></label>
					  <input type="text" class="form-control location" id="location" name="location" placeholder="location" value="">
					  
					</div> 
					<div class="form-group col-md-3">
					
					  <label for="value">Value<span class="required">*</span><span id="errmsg"></span></label>
					  <input type="text" class="form-control value" id="value" name="value" placeholder="value" value="">
					  
					</div> 
					<div class="form-group col-md-1">
					    <label for="value">&nbsp;</label><br/>
						<button type="button" class="btn btn-danger pull-right RegistrationRemovepara"><i class="fa fa-close"></i></button>                     
					</div>
				</div>
			</div>
		</div>
    </div>
</div>
<!--end of vehicles detail-->



<!-- Details of any foreign travel taken by staff-->
<div style="display: none;">
	<div id="detail_of_foreign_travel_html">
		<div class="panel panel-default">
			<div class=" panel-body">
				<div class="row">
					<div class="form-group col-md-4">
					  <label for="title_of_traveller">Title of Traveler<span class="required">*</span></label>
					  <input type="text" class="form-control title_of_traveller" id="title_of_traveller" name="title_of_traveller" placeholder="Enter Title of Traveler" value="">
					</div> 
					<div class="form-group col-md-4">
						<label for="location_purpose">Location and purpose<span class="required">*</span><span id="errmsg"></span></label>
						<input type="text" class="form-control location_purpose" id="location_purpose" name="location_purpose" placeholder="Enter Location and Purpose" value="">
					</div> 
					<div class="form-group col-md-3">
						<label for="cost_incurred">Cost Incurred<span class="required">*</span><span id="errmsg"></span></label>
						<input type="number" class="form-control cost_incurred" id="cost_incurred" name="cost_incurred" placeholder="Enter cost incurred" value="">
					</div> 
					<div class="form-group col-md-1">
						<br/>
						<button type="button" class="btn btn-danger pull-right foreign_travel_remove"><i class="fa fa-close"></i></button>                  
					</div>
				</div>
			</div>
		</div>
	</div>

</div>

<!---->
<!---->
		<div style="display: none;">
			<div id="detail_of_donor_html">
                <div id="">
					<div class="panel panel-default">
					    <div class=" panel-body">
							<div class="form-group col-md-12">
								<button type="button" class="btn btn-danger pull-right donor_remove"><i class="fa fa-close"></i></button>                    
							</div>
							<div class="row">
								<div class="form-group col-md-4">
									<label for="name_of_donor">Name<span class="required">*</span></label>
									<input type="text" class="form-control name_of_donor" name="name_of_donor" placeholder="Enter name of Donor" value="">
								 </div> 
								<div class="form-group col-md-4">
									<label for="title_of_project">Project Title<span class="required">*</span><span id="errmsg"></span></label>
									<input type="text" class="form-control title_of_project" name="title_of_project" placeholder="Title of the project" value="">
								</div> 
								<div class="form-group col-md-4">
									<label for="project_period_from">Project period from<span class="required">*</span><span id="errmsg"></span></label>
									<input type="text" readonly class="form-control date_1 project_period_from" name="project_period_from" placeholder="Project period from" value="">
								</div> 
								<div class="form-group col-md-4">
									<label for="project_period_to">Project period To<span class="required">*</span><span id="errmsg"></span></label>
									<input type="text" readonly class="form-control date_2 project_period_to" name="project_period_to" placeholder="Project period to" value="">
								</div>
								<div class="form-group col-md-4">
									<label for="amount">Amount(in INR lakhs)<span class="required">*</span><span id="errmsg"></span></label>
									<input type="number" class="form-control amount" name="amount" placeholder="amount(in INR lakhs)" value="">
								</div> 	
							</div>
						</div>
					</div>
				</div>
         </div>
       </div>



<?php


?>
<!-- End Governing body member of page4 -->
<?php 
    /*$data['sub_folder_name']="";
    $data['image_cat']="entity";
    $this->load->view('image_upload',$data);*/ ?>
	
	
<?php 
    $data['sub_folder_name']="";
    $data['image_cat']="entity";
    $this->load->view('file_upload',$data);?>	
<?php 
    $data['sub_folder_name']="";
    $data['image_cat']="entity";
    $this->load->view('file_upload_xl',$data);?>

<?php $this->load->view('single_image_upload_croppie');?> 
<?php 

 $data['sub_folder_name']="";
 $data['image_cat']="entity";
 $this->load->view('file_with_input_upload',$data); ?>
 
<script>
</script>