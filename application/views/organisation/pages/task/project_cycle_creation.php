<link rel="stylesheet" href="<?php echo base_url()?>assets/css/comboTreePlugin.css">
<script src="<?php echo base_url()?>assets/js/comboTreePlugin.js"></script>
<style>
#headerMsg{	margin:20px 0px;}
.dataTables-example th{	text-align:center;}
.ibox-content{padding: 10px;}
[data-toggle="collapse"] .fa:before {  
  content: "\f139";
}

[data-toggle="collapse"].collapsed .fa:before {
  content: "\f13a";
}
.cycle_html_div .marBot20{padding-top: 5px;}
.comboTreeInputBox{background-color: #fff !important;
    opacity: 1;border-radius: 0px !important;}
.modal-backdrop.in{display:none;opacity:0;}
#upload_80G_reg{background-color: #fff;}
.readonly_date{
	background-color: white !important;
}
.reg_detail_err{color:red;}
	.fa_plus{float: right;
	font-size: 12px !important;}
.input_description{font-weight: 400;}
.actual_disp{
	background-color: white !important;
	opacity: 1;
	margin-top: 10px !important;
	}
</style>

<?php
	//var_dump($data_value);
	if($data_value){
	$superngo_id = $data_value[0]['superngo_id']; 
	$comments = $data_value[0]['comments'];
	$org_task_id = $data_value[0]['org_task_id']; 
	$project_id = $data_value[0]['project_id']; 
	$org_task_list_id=$data_value[0]['org_task_list_id'];
	$org_id=$data_value[0]['org_id'];
	$prop_id=$data_value[0]['prop_id'];
	$org_staff_id=$data_value[0]['org_staff_id'];
	$ngo_id = $data_value[0]['ngo_id'];
	$status = $data_value[0]['status'];	
	$title = $data_value[0]['title'];	
	$superngo_details = $this->db->get_where('superngo',array('id' =>$superngo_id))->result();
	$donor_list = $this->db->get_where('donor',array('org_id' =>$org_id))->result_array();
	}else{
		$superngo_id = 0; 
		$comments = '';
		$org_task_id =0;
		$project_id = 0; 
		$org_task_list_id=0;
		$org_id=0;
		$prop_id=0;
		$org_staff_id=0;
		$ngo_id = 0;
		$status = '';
		$title = '';
		$superngo_details = '';
		$donor_list = '';
	}
	
?>

<div class="animated fadeInRight">
		<div class="row">
			<div class="col-lg-12">
					<div class="ibox-content">
						<div id="head_ngo_review"></div>
						<input type="hidden" class="form-control" id="org_staff_id" name="org_staff_id" value="<?php echo $org_staff_id; ?>">		
						<input type="hidden" class="form-control" id="org_task_id" name="org_task_id" value="<?php echo $org_task_id; ?>">
						<input type="hidden" class="form-control" id="org_task_list_id" name="org_task_list_id" value="<?php echo $org_task_list_id; ?>">
						<input type="hidden" class="form-control" id="org_id" name="org_id" value="<?php echo $org_id; ?>">
						<input type="hidden" class="form-control" id="prop_id" name="prop_id" value="<?php echo $prop_id; ?>">
						<input type="hidden" class="form-control" id="superngo_id" name="superngo_id" value="<?php echo $superngo_id; ?>">
						<input type="hidden" class="form-control" id="project_id" name="project_id" value="<?php echo $project_id; ?>">
						<input type="hidden" class="form-control" id="org_task_id" name="org_task_id" value="<?php echo $org_task_id; ?>">
						<input type="hidden" class="form-control" id="ngo_id" name="ngo_id" value="<?php echo $ngo_id; ?>">
												
							<!--<div class="form-group row">
								<label for="organisation_id" class="col-md-3 text-right">NGO Name </label>
								<div class="col-md-9"> 
									<span class="is_edit_hide"><?php //echo $superngo_details[0]->brand_name; ?></span>
								</div>
							</div>-->
							<div class="row">
							<div class="col-lg-6">
							<?php $this->load->view('organisation/pages/task/ngo_information_collapse'); ?>
						    </div>
					        <div class="col-lg-6">
						
						    <?php $this->load->view('organisation/pages/task/Task_details_collapse'); ?>
						
							
								
						   <div class="box box-primary">
							<div class="box-header with-border" data-widget="collapse">
								<i class="fa btn btn-box-tool fa_plus fa-minus"></i>
								<h3 class="box-title"><?php echo $data_value[0]['org_task_label']; ?></h3>
							</div>
				
							<div class="box-body">
						    	<label for="basic_details">Basic Details</label>
						    	<br/>
								<div class="form-group row">
									<label for="startdate" class="col-md-12">Update Project Name <span class="required">*</span></label>
									<div class="col-md-12"> 
										<input type="text" class="form-control  update_project_name"  name="update_project_name" placeholder="Update Project Name" value="<?php echo $title;?>" >
										<div id="update_project_name" class="update_project_name_error display_none"><label class="error">Project Name must be at least  3 characters longs</label></div>
								    </div>
								</div>
							 <div class="value_read">
								 <div class="form-group row">
									<label for="comments" class="col-md-12">Upload signed MOU for this project <span class="required">*</span></label>
									<label for="input_description" class=" col-md-12 input_description " >File must be less than 10MB in size</label>
									<div class="col-md-12"> 
										<button type="button" id="comman_file_upload_class" name="comman_file_upload_class" image_upload_desc="" upload_type="file" file_count="single" img_primary="no" file_prev_class="cycle_file_upload_selected" file_input_id="cycle_file_upload" class="btn btn-primary btn-lg comman_file_upload_class" data-toggle="modal" data-target="#browseFile"><i class="fa fa-upload"></i> </button>
										<div>
                                        <div class="">
                                          <input class="form-control cycle_file_upload " id="cycle_file_upload" name="cycle_file_upload" type="hidden" value="">
										</div>
									    <span class="registration_80g_valid" ></span>
										<div class="image-preview inline_block cycle_file_upload_selected">
                                            <input readonly class="form-control is_edit_data display_none actual_disp" type="text" id="cycle_file_upload_actual" value="">
                                        </div>
										</div>
										<div class="">
											<label  id="cycle_file_upload_error1" class="required display_none cycle_file_upload_error1">Your file must be less than 10MB in size.</label>
											<label  id="cycle_file_upload_error" class="required display_none cycle_file_upload_error">Attachment is required.</label>
											
										</div>
									</div>
								 </div>
								<div class="form-group row">
									<label for="startdate" class="col-md-12">Enter Start date for this project <span class="required">*</span></label>
									<div class="col-md-12"> 
										<input type="text" class="form-control  date readonly_date project_start_date"  name="project_start_date" placeholder="Start date" value="" readonly >
										<div id="project_date_error" class="project_start_date_error display_none"><label class="error">Start date is required.</label></div>
								    </div>
								</div>
								<div class="form-group row">
									<label for="startdate" class="col-md-12">Enter End date for this project <span class="required">*</span></label>
									<div class="col-md-12"> 
										<input type="text" class="form-control end_date readonly_date project_end_date" name="project_end_date" placeholder="End date" value="" readonly>
										<div id="project_date_error" class="project_end_date_error display_none"><label class="error">End date is required.</label></div>
								    </div>
									<div id="end_date_error1" class="display_none col-lg-12">
										<label class="required">End Date for the project must be later than the start date.</label>
									</div>
								</div>
							</div>
								
							<!--- Start here Donor section --->
							<div class="form-group row">
								<label for="donor_details" class="col-md-12">Donor details<span class="required">*</span> </label>
								<div class="col-md-12"> 
									<div id="TextBoxContainer1" >
										<div class="remove-added-para row" mytime="" style="margin-top: 10px;">
											<div class="col-md-6">
												<select class="form-control select_donor"  name="select_donor" id="select_donor" >
													<option value="">Select donor</option>
													<?php 
													if($donor_list){
														foreach($donor_list as $val){ 

														 $selected="";
														 echo '<option class="is_remove" '.$selected.' value="'.$val['donor_id'].'">'.$val['legal_name'].'</option>';
														 
														}
													  }?>
												</select>
												
											</div>
											
											<div class="col-md-6 marBot20">
												<input type="number" class="form-control donor_amount"  name="donor_amount" placeholder="Amount" value="">
											</div>
										</div>
									</div>
								</div>
					        </div>

							<div class="row donor_html_div " style="display:none;">
								<div class="remove-added-para row" mytime="" style="margin-top: 10px;">
									<div class="col-md-6">
										<select class="form-control select_donor"  name="select_donor" id="select_donor" >
											<option value="">Select donor</option>
											<?php 
											if($donor_list){
												foreach($donor_list as $val){ 

											     $selected="";
												 echo '<option class="is_remove" '.$selected.' value="'.$val['donor_id'].'">'.$val['legal_name'].'</option>';
												 
												}
											  }?>
										</select>
										
									</div>
									
									<div class="col-md-5 marBot20">
										<input type="number" class="form-control donor_amount"  name="donor_amount" placeholder="Amount" value="">
									</div>
									<div class="col-md-1 ">
										<button style="margin-left: -16px;" class="btn btn-warning removepara radius50">&times;</button>
									</div>
								</div>
							</div>
							
							<div class="form-group row ">
								<div class="col-md-12">
									<div id="donor_list_error" class="display_none "><label class="error">Atleast one required.</label></div>
									<div id="donor_data_error" class="display_none"><label class="error">All values are required.</label></div>
									<div class="error donor_duplicate_error display_none" ><label class="error">Please select another donor.</label></div>
									<button  id="addProSpeci"  type="button"  class="btn btn-success addProSpeci"><i class="fa fa-plus"></i></button><label style="margin-left:5px;">Add another donor</label>
									<!--<input id="addProSpeci" class="btn btn-success" type="button" value="&#43 Add another donor" />	-->
								</div>
							</div>
							<!--- End here Donor section --->
						
							<div class="form-group row ">
								<div class="col-md-12">
									<label for="cycle_creation" class="">Cycle creation </label>
								</div>
							</div>
	
	
						<div id="CycleTextBoxContainer">
							<div class="panel panel-default cycle_creation_form">
								<div class="panel-body">
									<div class=" cycle_html_div " >
										<div class="remove-added-para row" style="margin-top: 10px;">
											<div class="form-group col-md-12">
												<label >Cycle Name <span class="required">*</span></label>
												<input type="text" class="form-control plan_Cycle cycle_name"  name="cycle_name" placeholder="Cycle name" value="">
												<div class="cycle_name_error display_none"><label class="error">Cycle Name must be at least  3 characters longs</label></div>
											</div>
											
											<div class="form-group col-md-12">
												<label>Date this cycle <span class="required">*</span></label>
												<input type="text" class="form-control date readonly_date project_date" name="project_date" placeholder="date" value="" readonly>
												<div class="project_date_between_error display_none"><label class="error">Date this cycle must between Start date and End date.</label></div>
											</div>

											<div class="form-group col-md-12">
												<label>Does this cycle involve a payment ? <span class="required">*</span></label>
													<input type="radio" class="is_payment" name="is_payment" value="yes" > Yes
													<input type="radio"  class="is_payment" name="is_payment" value="no" > No
												<div class="is_payment_checked_error display_none"><label class="error">Please select any one </label></div>
											</div>

											<div class="form-group col-md-12 is_payment_yes display_none">
												<label >Select donor<span class="required">*</span></label>
												<select class="form-control donor_dropdown" id="donor_dropdown" name="donor_dropdown" >
													<option value="">Select donor</option>
													<?php 
													if($donor_list){
														foreach($donor_list as $val){ 
													     $selected="";
														 echo '<option '.$selected.' value="'.$val['donor_id'].'">'.$val['legal_name'].'</option>';
														 
														}
													  }?>
													
											    </select>
												<div class="donor_matched_error display_none"><label class="error">Donor did not match</label></div>
											</div>
											<div class="form-group col-md-12 is_payment_yes display_none">
												<label>Amount<span class="required">*</span></label>
												<input type="number" id="cycle_donor_amount" class="form-control cycle_donor_amount" name="cycle_donor_amount" placeholder="amount">
											</div>

											<div class="form-group col-md-12 is_payment_yes display_none">
												<label>NGO Payment<span class="required">*</span></label>
												<input type="text" readonly  class="form-control ngo_payment" name="ngo_payment" placeholder="Ngo payment">
											</div>

											<div class="form-group col-md-12">
												<label>NGO Documents<span class="required">*</span></label>
												<input type="text" readonly  class="form-control ngo_doc" name="ngo_doc"  placeholder="Ngo documents" ngo_type="" >
											</div>

											<div class="form-group col-md-12">
												<label >CSR Documents<span class="required">*</span></label>
												<input type="text" readonly  class="form-control csr_doc" name="csr_doc" placeholder="Csr documents">
											</div>
											
										</div>
										<div class="cylce_data_error display_none "><label class="error">Please fill all required inputs.</label></div>
										<div class="cylce_date_error display_none "><label class="error">Cycle enddate is greater than startdate.</label></div>
										<div class="cycle_list_error display_none "><label class="error">Atleast one required.</label></div>
									</div>
								</div>
							</div>
						</div>
						<div class="reg_detail_err display_none"><label>Please provide all the Cycle details.</label></div>
						<div>
							<div class="form-group row col-md-12">
								<button  id="CycleAddParabtn"  type="button"  class="btn btn-success addProSpeci"><i class="fa fa-plus"></i></button><label style="margin-left:5px;">Add another cycle</label>
								<!--<button class="btn btn-success radius50" id="CycleAddParabtn">+ Add another cycle</button>-->
							</div>
					
									<div class="form-group row display_none">
									   <label for="comments" class="col-md-12">Review </label>
								    <div class="col-md-12"> 
									   <textarea class="form-control comments"  name="comments" rows="3" ><?php echo $comments; ?></textarea>
									</div>
							        </div>
									<div class="form-group row">
										<div class="col-md-12">
											<div class="button">
											   <button type="button"  <?php if($status == 'Completed'){echo 'disabled';}?> id="temp_save<?php if($status == 'Completed'){echo 'disabled';}?>" class="btn btn-success" >Save</button>
											   <button type="button" <?php if($status == 'Completed'){echo 'disabled';}?> id="create_cycle<?php if($status == 'Completed'){echo 'disabled';}?>" class="btn btn-success">Submit</button>
											   <button type="button" <?php if($status == 'Completed'){echo 'disabled';}?> id="submit_cycle_creation<?php if($status == 'Completed'){echo 'disabled';}?>" class="btn btn-success display_none ">Submit</button>
											</div>
										</div>
								    </div>
								</div>
							</div>
						</div>
					</div>
				</div>
		    </div>
		</div>
	</div>


	<div style="display: none;">
    	<div id="Cycle_append_html">
			<div class="panel panel-default cycle_creation_form">
				<div class="panel-body">
					<div class="form-group col-md-12">
						<button type="button" class="btn btn-danger pull-right CycleRemovepara"><i class="fa fa-close"></i></button>                     
						</div> 
					<div class=" cycle_html_div " >
						<div class="remove-added-para row" style="margin-top: 10px;">
							<div class="form-group col-md-12">
								<label >Cycle Name<span class="required">*</span></label>
								<input type="text" class="form-control cycle_name"  name="cycle_name" placeholder="Cycle name" value="">
								<div class="cycle_name_error display_none"><label class="error">Cycle Name must be at least  3 characters longs</label></div>
							</div>
							
							<div class="form-group col-md-12">
								<label>Date this cycle<span class="required">*</span></label>
								<input type="text" class="form-control old_date_new readonly_date project_date" name="project_date" placeholder="date" value="" readonly>
								<div class="project_date_between_error display_none"><label class="error">Date this cycle must between Start date and End date.</label></div>
							</div>

							<div class="form-group col-md-12">
								<label>Does this cycle involve a payment?<span class="required">*</span></label>
								<input type="radio"  class="is_payment" name="" value="yes" > Yes
								<input type="radio" class="is_payment"  name="" value="no" > No
								<div class="is_payment_checked_error display_none"><label class="error">Please select any one </label></div>
							</div>
							<div class="form-group col-md-12 is_payment_yes display_none">
								<label >Select donor<span class="required">*</span></label>
								<select class="form-control donor_dropdown" id="donor_dropdown" name="donor_dropdown" >
									<option value="">Select donor</option>
									<?php 
									if($donor_list){
										foreach($donor_list as $val){ 
									     $selected="";
										 echo '<option '.$selected.' value="'.$val['donor_id'].'">'.$val['legal_name'].'</option>';
										 
										}
									  }?>
									
							    </select>
								<div class="donor_matched_error display_none"><label class="error">Donor did not match</label></div>
							</div>
							
							<div class="form-group col-md-12 is_payment_yes display_none">
								<label>Amount<span class="required">*</span></label>
								<input type="number" id="cycle_donor_amount" class="form-control cycle_donor_amount" name="cycle_donor_amount" placeholder="amount">
							</div>

							<div class="form-group col-md-12 is_payment_yes display_none">
								<label>NGO Payment<span class="required">*</span></label>
								<input type="text" readonly  class="form-control ngo_payment" name="ngo_payment" placeholder="Ngo payment">
							</div>

							<div class="form-group col-md-12">
								<label>NGO Documents<span class="required">*</span></label>
								<input type="text" readonly  class="form-control ngo_doc " name="ngo_doc" placeholder="Ngo documents" ngo_type="" >
							</div>
							<div class="form-group col-md-12">
								<label >CSR Documents<span class="required">*</span></label>
								<input type="text" readonly  class="form-control csr_doc" name="csr_doc" placeholder="Csr documents">
							</div>
							
						</div>
						<div class="cylce_data_error display_none "><label class="error">Please fill all required inputs.</label></div>
						<div class="cylce_date_error display_none "><label class="error">Cycle enddate is greater than startdate.</label></div>
						<div class="cycle_list_error display_none "><label class="error">Atleast one required.</label></div>
					</div>
				</div>
			</div>
		</div>
	</div>


   <?php
	$data['sub_folder_name']="";
    $data['image_cat']="entity";
    $this->load->view('file_upload',$data);
	?>
<script>
$('document').ready(function(){
	
	$('body').on('click', '#CycleAddParabtn', function () {
		get_organisation_data();
		get_organisation_data1();
		get_organisation_data2();
		var is_payment_name=$.now();
		var timeee = 'old_date_new_'+$. now();
		var timeep = 'is_payment'+$. now();
		$('#Cycle_append_html .old_date_new').addClass(timeee);
		$('#Cycle_append_html .is_payment').addClass(timeep);
		$('#Cycle_append_html').find('.'+timeep).attr('name',timeep);
		//console.log(is_payment_name);
        var content = $('#Cycle_append_html').html();
        $('#Cycle_append_html .old_date_new').removeClass(timeee);
        $('#Cycle_append_html .is_payment').removeClass(timeep);
       	$("#CycleTextBoxContainer").append(content); 
        setTimeout(function() {
			$(function () {
				$('.'+timeee).datepicker({
					changeMonth: true,
					changeYear: true,
					dateFormat: 'yy-mm-dd',
					yearRange : 'c-75:c+75',
				});
			});
		}, 500);

        $(this).find('.cycle_creation_form .is_payment').attr('name',is_payment_name);
    });

 	$('body').on('click', '.CycleRemovepara', function () {
        $(this).parent().parent().parent().remove();
    }); 

	
	$("body").on("click", "#temp_save", function () {
		
		var cycle_file_upload_actual = $('#cycle_file_upload_actual').val();		
	    var cycle_file_upload = $('#cycle_file_upload').val();
		var project_start_date = $('.project_start_date').val();
		var project_end_date = $('.project_end_date').val();
		var project_date = $('.project_date').val();
		var comments = $('.comments').val();
		var project_id = $('#project_id').val();
		var org_task_id = $('#org_task_id').val();
		var org_id=$('#org_id').val();
		var superngo_id=$('#superngo_id').val();
		var org_staff_id=$('#org_staff_id').val();
		var org_task_id=$('#org_task_id').val();
		
		
		var donor_list = [];
		$('#TextBoxContainer1 .remove-added-para').each(function(key,val){
			donor_list.push({
				select_donor : $(this).find('.select_donor').val(),
				donor_amount : $(this).find('.donor_amount').val(),
			}); 
		});
		

			var is_cycle_error = 'no';
            var is_error = 'no';
            var cycle_list = new Array();
           	var is_payment = $('.is_payment:checked').val();
			$("#CycleTextBoxContainer .cycle_creation_form").each(function() {
            		console.log($(this).find('.cycle_name').val());
                if ($(this).find('.cycle_name').val()) {} else {
                	console.log($(this).find('.cycle_name').val());
                    is_cycle_error = 'yes';
                }
                if ($(this).find('.project_date').val()) {} else {
					is_cycle_error = 'yes';
                }
                if ($(this).find('.is_payment:checked').val()){
                	if(is_payment == 'yes'){
                		 if ($(this).find('.donor_dropdown').attr('id')) {

		                } else {
							is_cycle_error = 'yes';
		                }
		                if ($(this).find('.donor_dropdown').val()) {

		                } else {
							is_cycle_error = 'yes';
		                }
		                if ($(this).find('.cycle_donor_amount').val()) {

		                }else {
							is_cycle_error = 'yes';
		                }
		                 if ($(this).find('.ngo_payment').val()) {

		                } else {
							is_cycle_error = 'yes';
		                }

	                }else{}
                }else{
						is_cycle_error = 'yes';
		             }
                         
                if ($(this).find('.ngo_doc').val()) {

                } else {
					is_cycle_error = 'yes';
                }
                if ($(this).find('.csr_doc').val()) {

                } else {
					is_cycle_error = 'yes';
                }
            })

             if (is_cycle_error == 'no') {
                $(".reg_detail_err").addClass('display_none');

            }else {
            	 is_error = 'yes';
            	$(".reg_detail_err").removeClass('display_none');
               
            }
    
       	var cycle_list = [];
		if(is_cycle_error=='no'){
			$('#CycleTextBoxContainer .cycle_creation_form').each(function(key,val){
				var donor_dropdown_id = $(this).find('.donor_dropdown').val();
				console.log(donor_dropdown_id);
				if(donor_dropdown_id){
					donor_dropdown_id =donor_dropdown_id;
				}else{
					donor_dropdown_id =0;
				}
				
				cycle_list.push({
					cycle_name : $(this).find('.cycle_name').val(),
					cycle_start_date1 : $(this).find('.project_date').val(),
					is_payment : $(this).find('.is_payment:checked').val(),
					donor_dropdown_id : donor_dropdown_id,
					//$("#donor_dropdown option:selected").text();
					donor_dropdown : $(this).find('.donor_dropdown option:selected').text(),
					cycle_donor_amount : $(this).find('.cycle_donor_amount').val(),
					ngo_payment : $(this).find('.ngo_payment').val(),
					ngo_doc : $(this).find('.ngo_doc').val(),
					csr_doc : $(this).find('.csr_doc').val(),
				}); 
			});
 		}

 		console.log(cycle_list);
		
		var additional_json = [];
		additional_json.push({
			'cycle_list':cycle_list,
			'donor_list':donor_list,
			'cycle_file_upload':cycle_file_upload,
			'cycle_file_upload_actual':cycle_file_upload_actual,
			'project_start_date':project_start_date,
			'project_end_date':project_end_date,
			'comments':comments,
			'project_id':project_id,
			'org_id':org_id,
			'superngo_id':superngo_id,
			'org_staff_id':org_staff_id,
			'is_saved_once':'yes',
		});
		if(is_cycle_error=='no'){
			$.post(APP_URL + 'organisation/tasks/save_cycle_data', {
			  
				additional_json:additional_json,
				cycle_list:cycle_list,
				donor_list:donor_list,
				cycle_file_upload:cycle_file_upload,
				cycle_file_upload_actual:cycle_file_upload_actual,
				project_start_date:project_start_date,
				project_end_date:project_end_date,
				comments:comments,
				project_id:project_id,
				org_id:org_id,
				superngo_id:superngo_id,
				org_task_id:org_task_id, 
				org_staff_id:org_staff_id,
			
			},
			function (response) {
				$('#head_ngo_review').empty();
				if (response.status == 200) {
					$.toaster({ priority :'success', message :'Saved'});
					
					//$('#submit_cycle_creation').trigger('click');
				} else {
					$('#head_ngo_review').html("<div class='alert alert-danger fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
					$("#head_ngo_review").fadeTo(2000, 500).slideUp(500, function(){
						$('#head_ngo_review').empty();
					});
				}
			},'json');
		}
	
	});

 
	$("body").on("click", "#create_cycle", function () {
		var is_error = 'no';
	    var cycle_file_upload_actual = $('#cycle_file_upload_actual').val();
	    var cycle_file_upload = $('#cycle_file_upload').val();
		var project_start_date = $('.project_start_date').val();
		var project_end_date = $('.project_end_date').val();
		var update_project_name = $('.update_project_name').val();
		var comments = $('#comments').val();
		var project_id = $('#project_id').val();
		var org_task_id = $('#org_task_id').val();
		var org_id=$('#org_id').val();
		var superngo_id=$('#superngo_id').val();
		var org_staff_id=$('#org_staff_id').val();
		var ngo_id = $('#ngo_id').val();
		//var is_payment='';
		
		//console.log(is_payment);
		
		if(cycle_file_upload){
			$('.cycle_file_upload_error').addClass('display_none');
		}else{
			is_error = 'yes';
			$('.cycle_file_upload_error').removeClass('display_none');
		}
		if(project_start_date){
			$('.project_start_date_error').addClass('display_none');
		}else{
			is_error = 'yes';
			$('.project_start_date_error').removeClass('display_none');
		}
		if(project_end_date){
			$('.project_end_date_error').addClass('display_none');
			if(project_end_date > project_start_date){
				$('#end_date_error1').addClass('display_none');
			}else{
				$('#end_date_error1').removeClass('display_none');
				is_error = 'yes';
			}
		}else{
			$('.project_end_date_error').removeClass('display_none');
				is_error = 'yes';
			//return false;
		}
		
		
		if(update_project_name){
			var title = $('.update_project_name').val().length;
				console.log(title);
					if(title>3){
						$('.update_project_name_error').addClass('display_none');
					}else{
						is_error = 'yes';
						$('.update_project_name_error').removeClass('display_none');
					}
		}else{
			is_error = 'yes';
			$('.update_project_name_error').removeClass('display_none');
		}
				
		var is_cycle_error = 'no';
        var cycle_list = new Array();
			var is_payment = $('.is_payment:checked').val();
			$("#CycleTextBoxContainer .cycle_creation_form").each(function() {
				//console.log($(this).find('.cycle_name').val());
				
			   var cycle_name = $(this).find('.cycle_name').val();
				if(cycle_name){
				var  cycle_name_length= cycle_name.length;
					//console.log(cycle_name_length);
					//console.log(cycle_name);
					if(cycle_name_length>=3){
						$(this).find('.cycle_name_error').addClass('display_none');
					}else{
						is_cycle_error = 'yes';
						$(this).find('.cycle_name_error').removeClass('display_none');
					}
				}else{
					is_cycle_error = 'yes';
					$('.cycle_name_required_error').removeClass('display_none');
				}
				var project_date = $(this).find('.project_date').val();
					console.log(project_start_date);
					console.log(project_end_date);
					console.log(project_date);
				if (project_date){
					if(project_date >= project_start_date && project_date <=project_end_date){
						$(this).find('.project_date_between_error').addClass('display_none');
					}else{
						is_cycle_error = 'yes';
						$(this).find('.project_date_between_error').removeClass('display_none');
					}
					
				} else {
					is_cycle_error = 'yes';
				}
				var is_payment= $(this).find('.is_payment:checked').val();	
					
				var donor_select=$(this).find('.donor_dropdown').val();
				var donor_amount_data=$(this).find('.cycle_donor_amount').val();
				var ngo_payment_data= $(this).find('.ngo_payment').val();
				var select_donor=$(this).find('.select_donor').val();
				var donor_list1 =[];
				var donor_dropdown_id_data = $(this).find('.donor_dropdown').val();
				var mythis = $(this);
				if(is_payment){
					if(is_payment == 'yes'){
						
						 if(donor_dropdown_id_data) {
								donor_list1.length = 0;
								console.log("Alam");
								console.log(donor_dropdown_id_data);
								$('#TextBoxContainer1 .remove-added-para').each(function(key,val){
									var select_donor=$(this).find('.select_donor').val();
									var donor_amount=$(this).find('.donor_amount').val();
									donor_list1.push({
										select_donor : $(this).find('.select_donor').val(),
										
									});
									console.log("RA");
									//console.log(donor_list1.length);
									var is_match='no';
									$(donor_list1).each(function(key,val1){
										if(val1.select_donor == donor_dropdown_id_data){
											is_match='yes';
										
										}
										
									});
									
									if(is_match=='yes'){
										console.log("Match data");
										is_cycle_error = 'no';
										$(mythis).find('.donor_matched_error').addClass('display_none');
									}else{
										is_cycle_error = 'yes';
										console.log("Did not Match data");
										$(mythis).find('.donor_matched_error').removeClass('display_none');
									}
									console.log(is_match);
								});
								
						}else{
							is_cycle_error = 'yes';
						}
						if (donor_select) {} else {
							is_cycle_error = 'yes';
						}
						if (donor_amount_data) {}else {
							is_cycle_error = 'yes';
						}
						if (ngo_payment_data) {} else {
							is_cycle_error = 'yes';
						}

					}else{}
				}else{
					is_cycle_error = 'yes';
				}
							 
					if ($(this).find('.ngo_doc').val()) {} else {
						is_cycle_error = 'yes';
					}
					if ($(this).find('.csr_doc').val()) {} else {
						is_cycle_error = 'yes';
					}
			})

			 console.log(is_cycle_error);
			 if(is_cycle_error == 'no') {
				$(".reg_detail_err").addClass('display_none');

            }else {
            	 is_error = 'yes';
            	$(".reg_detail_err").removeClass('display_none');
               
            }
    
       	var cycle_list = [];
		if(is_cycle_error=='no'){
			$('#CycleTextBoxContainer .cycle_creation_form').each(function(key,val){
				var donor_dropdown_id = $(this).find('.donor_dropdown').val();
				console.log(donor_dropdown_id);
				if(donor_dropdown_id){
					donor_dropdown_id =donor_dropdown_id;
				}else{
					donor_dropdown_id =0;
				}
					cycle_start_date1 = $(this).find('.project_date').val();
					cycle_list.push({
					cycle_name : $(this).find('.cycle_name').val(),
					cycle_start_date1 : $(this).find('.project_date').val(),
					is_payment : $(this).find('.is_payment:checked').val(),
					donor_dropdown_id : donor_dropdown_id,
					donor_dropdown : $(this).find('.donor_dropdown option:selected').text(),
					cycle_donor_amount : $(this).find('.cycle_donor_amount').val(),
					ngo_payment : $(this).find('.ngo_payment').val(),
					ngo_doc : $(this).find('.ngo_doc').val(),
					csr_doc : $(this).find('.csr_doc').val(),
				}); 
			});
 		}

 		console.log(cycle_list);


		
		var is_donor_error = 'no';
		var donor_list = [];
		
		$('#TextBoxContainer1 .remove-added-para').each(function(key,val){
			var select_donor=$(this).find('.select_donor').val();
			var donor_amount=$(this).find('.donor_amount').val();
			if(select_donor){}else{
				is_donor_error = 'yes';
			}
			if(donor_amount){}else{
				is_donor_error = 'yes';
			}
					
			var is_av = 'no';
			$(donor_list).each(function(key1,val1){
				console.log(val1);
				console.log(val1.select_donor);
				if(select_donor == val1.select_donor){
									
					$(".donor_duplicate_error").removeClass('display_none');
					is_av = 'yes';
					is_error = 'yes';
				}else{
					
					$(".donor_duplicate_error").addClass('display_none');
				}
				
			});
			console.log(is_av);
			if(is_av =='no'){
				donor_list.push({
					select_donor : $(this).find('.select_donor').val(),
					donor_amount : $(this).find('.donor_amount').val(),
				});
			}
			
		});
			  
		console.log(donor_list);
		
		
		if(is_donor_error == 'yes'){
			is_error = 'yes';
			$(".donor_duplicate_error").addClass('display_none');
			$('#donor_data_error').removeClass('display_none');
			$('#donor_list_error').addClass('display_none');
		}else{
			$('#donor_data_error').addClass('display_none');
			
		}
		if(donor_list.length==0){
			is_error = 'yes';
			$('#donor_list_error').removeClass('display_none');
			$('#donor_data_error').addClass('display_none');
		}else{
			$('#donor_list_error').addClass('display_none');
		}
		
		
		
		
		var additional_json = [];
		if(is_error=='no'){
			additional_json.push({
				'cycle_list':cycle_list,
				'donor_list':donor_list,
				'cycle_file_upload':cycle_file_upload,
				'cycle_file_upload_actual':cycle_file_upload_actual,
				'project_start_date':project_start_date,
				'project_end_date':project_end_date,
				'comments':comments,
				'project_id':project_id,
				'org_id':org_id,
				'superngo_id':superngo_id,
				'org_staff_id':org_staff_id,
				'is_saved_once':'yes',
			});
		}
		
		if(is_error=='no'){		
			$.post(APP_URL + 'organisation/tasks/post_cycle_data', {
				additional_json:additional_json,
				cycle_list:cycle_list,
				donor_list:donor_list,
				cycle_file_upload:cycle_file_upload,
				cycle_file_upload_actual:cycle_file_upload_actual,
				project_start_date:project_start_date,
				project_end_date:project_end_date,
				comments:comments,
				project_id:project_id,
				org_id:org_id,
				superngo_id:superngo_id,
				org_staff_id:org_staff_id,
				org_task_id:org_task_id,
				ngo_id:ngo_id,
				update_project_name:update_project_name,
			
			},
		
			function (response) {
				$('#head_ngo_review').empty();
				if (response.status == 200) {
					$('#submit_cycle_creation').trigger('click');
				} else {
					$('#head_ngo_review').html("<div class='alert alert-danger fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
					$("#head_ngo_review").fadeTo(2000, 500).slideUp(500, function(){
						$('#head_ngo_review').empty();
					});
				}
			},'json');	
		}	
	});

 
	$("body").on("click",'#addProSpeci', function () {
		var myctime = $.now();
		$(".donor_html_div").find('.remove-added-para').attr('mytime',myctime);
		var div = $(".donor_html_div").html();
		$("#TextBoxContainer1").append(div);
		
	});
	
	
	$("body").on("change", ".is_payment", function () {
		var is_payment = $(this).val();
		console.log(is_payment);
		if(is_payment == 'yes'){
			$(this).parent().parent().find('.is_payment_yes').removeClass('display_none');
		}else{
			$(this).parent().parent().find('.is_payment_yes').addClass('display_none');
		}
	});

	/*$("body").on("click", ".addcycle", function () {
		var is_error = 'no';
		var cycle_name = $('#cycle_name').val();
		var project_date = $('#project_date').val();
		
		var ngo_doc = $('#ngo_doc').val();
		var csr_doc = $('#csr_doc').val();
		var is_payment = $('#is_payment').val();
		var donor_dropdown = $("#donor_dropdown option:selected").text();
		var donor_dropdown_id = $('#donor_dropdown').val();
		var cycle_donor_amount = $('#cycle_donor_amount').val();
		var ngo_payment = $('#ngo_payment').val();
		//console.log(donor_dropdown);
		//console.log(donor_dropdown_id);
		if(cycle_name){}else{is_error = 'yes'}
		if(project_date){}else{is_error = 'yes'}
		if(ngo_doc){}else{is_error = 'yes'}
		if(csr_doc){}else{is_error = 'yes'}
		if(is_payment){}else{is_error = 'yes'}
		if(is_payment == 'yes' && !donor_dropdown){is_error = 'yes'}
		if(is_payment == 'yes' && !cycle_donor_amount){is_error = 'yes'}
		if(is_payment == 'yes' && !ngo_payment){is_error = 'yes'}
		
		
			if(is_error == 'yes'){
				$('.cylce_data_error').removeClass('display_none');
			}else{
				$('.cylce_data_error').addClass('display_none');
		
				
				var html = '<div class="cycle_data">\n\
							<div class="row">\n\
								<div class="col-sm-6">\n\
									Cycle Name:\n\
								</div>\n\
								<div class="col-sm-6">\n\
									<span class="cycle_name">'+cycle_name+'</span>\n\
									<span class="pull-right remove_cycle_data">Remove</span>\n\
								</div>\n\
							</div>\n\
							<div class="row"><div class="col-sm-6">Date:</div><div class="col-sm-6 project_date">'+project_date+'</div></div>\n\
							<div class="row"><div class="col-sm-6">Is Payment:</div><div class="col-sm-6 is_payment">'+is_payment+'</div></div>';
						if(is_payment == 'yes'){
							html += '<div class="row"><div class="col-sm-6">Donor name:</div><div class="col-sm-6 donor_dropdown" id="'+donor_dropdown_id+'">'+donor_dropdown+'</div></div>\n\
							<div class="row"><div class="col-sm-6">Donor amount:</div><div class="col-sm-6 cycle_donor_amount">'+cycle_donor_amount+'</div></div>\n\
							<div class="row"><div class="col-sm-6">Donor payment:</div><div class="col-sm-6 ngo_payment">'+ngo_payment+'</div></div>';
						}
							html += '<div class="row"><div class="col-sm-6">NGO document:</div><div class="col-sm-6 ngo_doc">'+ngo_doc+'</div></div>\n\
							<div class="row"><div class="col-sm-6">CSR document:</div><div class="col-sm-6 csr_doc">'+csr_doc+'</div></div>\n\
						</div>';
				$('.append_cycle_data').append(html);
				
				$('#cycle_name').val('')
				$('#project_date').val('');
				$('#ngo_doc').val('');
				$('#csr_doc').val('');
				$('#is_payment').val('');
				$('#donor_dropdown').val('');
				$('#cycle_donor_amount').val('');
				$('#ngo_payment').val('');
				$('#is_payment').trigger('change');
				
			}
			
		
	});*/
	$("body").on("click", ".removepara", function () {
		$(this).parent().parent().remove();
	});
	
	
	/*multi select*/
	var geo_instance ='';
	var categories_instance ='';
	get_organisation_data();
	function get_organisation_data(){
		//payment_processing_doc , ngo_document_list, csr_document_list
		$.post(APP_URL + 'organisation/tasks/get_cycle_data_of_documents', {
			'doc_type':'ngo_document_list'
        },
        function (response) {
        	var geoData=response.geoData;
        	var orgGeoData=response.orgGeoData;
        	console.log(geoData);
        	//$('#ngo_doc').attr('ngo_type');
        	
        	geo_instance = $('.ngo_doc').comboTree({
			  	source : geoData,
			  	isMultiple:true,
			  	cascadeSelect:true,
			  	//selected: orgGeoData
			});
			if(orgGeoData){
				geo_instance.setSelection(orgGeoData);
			}
			var categoryData=response.categoryData;
        	var orgcategoryData=response.orgcategoryData;
			
			categories_instance = $('#').comboTree({
			  	source : categoryData,
			  	isMultiple:true,
			  	cascadeSelect:true,
			  	//selected: orgGeoData
			});
			
			if(orgcategoryData){
				categories_instance.setSelection(orgcategoryData);
			}
        },'json');
		
	}
	
	/*multi select*/
	var geo_instance1 ='';
	var categories_instance1 ='';
	get_organisation_data1();
	function get_organisation_data1(){
		//payment_processing_doc , ngo_document_list, csr_document_list
		$.post(APP_URL + 'organisation/tasks/get_cycle_data_of_documents', {
			'doc_type':'csr_document_list'
        },
        function (response) {
        	var geoData=response.geoData;
        	var orgGeoData=response.orgGeoData;

        	geo_instance1 = $('.csr_doc').comboTree({
			  	source : geoData,
			  	isMultiple:true,
			  	cascadeSelect:true,
			  	//selected: orgGeoData
			});
			if(orgGeoData){
				geo_instance1.setSelection(orgGeoData);
			}
			var categoryData=response.categoryData;
        	var orgcategoryData=response.orgcategoryData;
			
			categories_instance1 = $('#').comboTree({
			  	source : categoryData,
			  	isMultiple:true,
			  	cascadeSelect:true,
			  	//selected: orgGeoData
			});
			
			if(orgcategoryData){
				categories_instance1.setSelection(orgcategoryData);
			}
        },'json');
		
	}
	
	/*multi select*/
	var geo_instance2 ='';
	var categories_instance2 ='';
	get_organisation_data2();
	function get_organisation_data2(){
		//payment_processing_doc , ngo_document_list, csr_document_list
		$.post(APP_URL + 'organisation/tasks/get_cycle_data_of_documents', {
			'doc_type':'payment_processing_doc'
        },
        function (response) {
        	var geoData=response.geoData;
        	var orgGeoData=response.orgGeoData;

        	geo_instance2 = $('.ngo_payment').comboTree({
			  	source : geoData,
			  	isMultiple:true,
			  	cascadeSelect:true,
			  	//selected: orgGeoData
			});
			if(orgGeoData){
				geo_instance2.setSelection(orgGeoData);
			}
			var categoryData=response.categoryData;
        	var orgcategoryData=response.orgcategoryData;
			
			categories_instance2 = $('#').comboTree({
			  	source : categoryData,
			  	isMultiple:true,
			  	cascadeSelect:true,
			  	//selected: orgGeoData
			});
			
			if(orgcategoryData){
				categories_instance2.setSelection(orgcategoryData);
			}
        },'json');
		
	}
		/*data pickers*/
		$(".start_date").datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: 'yy-mm-dd',
			maxDate: 'dateToday',
			yearRange : 'c-75:c+75',
		});
		$(".end_date").datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: 'yy-mm-dd',
			minDate: 'dateToday',
			yearRange : 'c-75:c+75',
		});	
		$(".date").datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: 'yy-mm-dd',
			yearRange : 'c-75:c+75',
		});	

			
	$('body').on('click','#submit_cycle_creation', function () {
		var is_error='no';
		var comments = $('.comments').val();
		var org_task_id=$('#org_task_id').val();
		var org_task_list_id=$('#org_task_list_id').val();
		var org_id=$('#org_id').val();
		var prop_id=$('#prop_id').val();
		var superngo_id=$('#superngo_id').val();
		var org_staff_id=$('#org_staff_id').val();
		var cycle_file_upload = $('#cycle_file_upload').val();
		var cycle_file_upload_actual = $('#cycle_file_upload_actual').val();
		var project_start_date = $('.project_start_date').val();
		var project_end_date = $('.project_end_date').val();
		var project_id = $('#project_id').val();
		var ngo_id = $('#ngo_id').val();
			
		if(cycle_file_upload){
			$('.cycle_file_upload_error').addClass('display_none');
		}else{
			is_error = 'yes';
			$('.cycle_file_upload_error').removeClass('display_none');
		}
		if(project_start_date){
			$('.project_start_date_error').addClass('display_none');
		}else{
			is_error = 'yes';
			$('.project_start_date_error').removeClass('display_none');
		}
		if(project_end_date){
			$('.project_end_date_error').addClass('display_none');
		}else{
			is_error = 'yes';
			$('.project_end_date_error').removeClass('display_none');
		}
		
		var is_donor_error = 'no';
		var donor_list = [];
		$('#TextBoxContainer1 .remove-added-para').each(function(key,val){
			if(!$(this).find('.select_donor').val()){
				is_donor_error = 'yes';
			}
			if(!$(this).find('.donor_amount').val()){
				is_donor_error = 'yes';
			}
			donor_list.push({
				select_donor : $(this).find('.select_donor').val(),
				donor_amount : $(this).find('.donor_amount').val(),
			}); 
		});
			  
		console.log(donor_list);

		
			var is_cycle_error = 'no';
        var cycle_list = new Array();
			var is_payment = $('.is_payment:checked').val();
			$("#CycleTextBoxContainer .cycle_creation_form").each(function() {
				//console.log($(this).find('.cycle_name').val());
				
			   var cycle_name = $(this).find('.cycle_name').val();
				if(cycle_name){
				var  cycle_name_length= cycle_name.length;
					//console.log(cycle_name_length);
					//console.log(cycle_name);
					if(cycle_name_length>=3){
						$(this).find('.cycle_name_error').addClass('display_none');
					}else{
						is_cycle_error = 'yes';
						$(this).find('.cycle_name_error').removeClass('display_none');
					}
				}else{
					is_cycle_error = 'yes';
					$('.cycle_name_required_error').removeClass('display_none');
				}
				var project_date = $(this).find('.project_date').val();
					console.log(project_start_date);
					console.log(project_end_date);
					console.log(project_date);
				if (project_date){
					if(project_date >= project_start_date && project_date <=project_end_date){
						$(this).find('.project_date_between_error').addClass('display_none');
					}else{
						is_cycle_error = 'yes';
						$(this).find('.project_date_between_error').removeClass('display_none');
					}
					
				} else {
					is_cycle_error = 'yes';
				}
				var is_payment= $(this).find('.is_payment:checked').val();	
					
				var donor_select=$(this).find('.donor_dropdown').val();
				var donor_amount_data=$(this).find('.cycle_donor_amount').val();
				var ngo_payment_data= $(this).find('.ngo_payment').val();
				var select_donor=$(this).find('.select_donor').val();
				var donor_list1 =[];
				var donor_dropdown_id_data = $(this).find('.donor_dropdown').val();
				
				if(is_payment){
					if(is_payment == 'yes'){
						 if (donor_dropdown_id_data) {
							
								console.log("Alam");
								console.log(donor_dropdown_id_data);
								$('#TextBoxContainer1 .remove-added-para').each(function(key,val){
									var select_donor=$(this).find('.select_donor').val();
									var donor_amount=$(this).find('.donor_amount').val();
									donor_list1.push({
										select_donor : $(this).find('.select_donor').val(),
										
									});
									console.log("RA");
									console.log(donor_list1.length);
									var is_match='no';
									$(donor_list1).each(function(key,val){
										if(val.select_donor == donor_dropdown_id_data){
											
											//alert("ASif");
											is_match='yes';
											$('.donor_matched_error').addClass('display_none');
											return 
									}else{}
										
									});
									
																			
									
									
								});
						 }else {
							is_cycle_error = 'yes';
						}
						if (donor_select) {} else {
							is_cycle_error = 'yes';
						}
						if (donor_amount_data) {}else {
							is_cycle_error = 'yes';
						}
						if (ngo_payment_data) {} else {
							is_cycle_error = 'yes';
						}

					}else{}
				}else{
					is_cycle_error = 'yes';
				}
							 
					if ($(this).find('.ngo_doc').val()) {} else {
						is_cycle_error = 'yes';
					}
					if ($(this).find('.csr_doc').val()) {} else {
						is_cycle_error = 'yes';
					}
			})

			 
			 if(is_cycle_error == 'no') {
				$(".reg_detail_err").addClass('display_none');

            }else {
            	 is_error = 'yes';
            	$(".reg_detail_err").removeClass('display_none');
               
            }
    
       	var cycle_list = [];
		if(is_cycle_error=='no'){
			$('#CycleTextBoxContainer .cycle_creation_form').each(function(key,val){
				var donor_dropdown_id = $(this).find('.donor_dropdown').val();
				console.log(donor_dropdown_id);
				if(donor_dropdown_id){
					donor_dropdown_id =donor_dropdown_id;
				}else{
					donor_dropdown_id =0;
				}
					cycle_start_date1 = $(this).find('.project_date').val();
					cycle_list.push({
					cycle_name : $(this).find('.cycle_name').val(),
					cycle_start_date1 : $(this).find('.project_date').val(),
					is_payment : $(this).find('.is_payment:checked').val(),
					donor_dropdown_id : donor_dropdown_id,
					donor_dropdown : $(this).find('.donor_dropdown option:selected').text(),
					cycle_donor_amount : $(this).find('.cycle_donor_amount').val(),
					ngo_payment : $(this).find('.ngo_payment').val(),
					ngo_doc : $(this).find('.ngo_doc').val(),
					csr_doc : $(this).find('.csr_doc').val(),
				}); 
			});
 		}

 		console.log(cycle_list);

 
		//console.log(cycle_list);
		
		if(cycle_list.length==0){
			is_error = 'yes';
			$('.cycle_list_error').removeClass('display_none');
		}else{
			
			$('.cycle_list_error').addClass('display_none');
		}
	 	
		
		var additional_json = [];
		additional_json.push({
			'cycle_list':cycle_list,
			'donor_list':donor_list,
			'cycle_file_upload':cycle_file_upload,
			'cycle_file_upload_actual':cycle_file_upload_actual,
			'project_start_date':project_start_date,
			'project_end_date':project_end_date,
			'comments':comments,
			'project_id':project_id,
			'org_id':org_id,
			'superngo_id':superngo_id,
			'org_staff_id':org_staff_id,
			'is_saved_once':'yes',
		});	
		//var additional_json = ''
		console.log(additional_json);
		if(is_error=='no'){
			$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
			$.post(APP_URL + 'organisation/tasks/change_status_onsubmit_by_cycle_creation_org2', {
				additional_json: additional_json,
				comments: comments,
				org_task_id:org_task_id, 
				org_task_list_id:org_task_list_id,
				org_id:org_id,
				prop_id:prop_id,
				superngo_id:superngo_id,
				org_staff_id:org_staff_id,			
				project_id:project_id,		
				ngo_id:ngo_id,		
			},
			function (response) {
				$.unblockUI();
				$('#head_ngo_review').empty();
				if (response.status == 200) {
					var message = response.message;
					$("html, body").animate({scrollTop: 0}, "slow");               
					$('#head_ngo_review').html("<div class='alert alert-success fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
					$("#head_ngo_review").fadeTo(2000, 500).slideUp(500, function(){
						$('#head_ngo_review').empty();
						window.location.href=APP_URL+"organisation/tasks/mytasks";
					});
				} else {
					$('#head_ngo_review').html("<div class='alert alert-danger fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
					$("#head_ngo_review").fadeTo(2000, 500).slideUp(500, function(){
						$('#head_ngo_review').empty();
					});
				}	
				
			}, 'json');
		}	
		 return false;
	})	
});
</script>

