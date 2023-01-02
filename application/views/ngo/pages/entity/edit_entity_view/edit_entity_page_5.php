    <?php
	$current_year=date('Y');
	$current_date=date('Y-m-d');
	$april_date =$current_year.'-04-01';
	
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
	//var_dump($entity_data);
if($entity_data){
	$entity_id=$entity_data['id'];
	$ngo_id=$entity_data['id'];
	$superngo_id=$entity_data['superngo_id'];
	$display_none='';
	$display_none_='display_none';
	$display_none1='';	
	$budget_details= json_decode($entity_data['budget_details'] ,true);
	$major_donors= json_decode($entity_data['major_donors'] ,true);
	$upload_financial_statement1= $entity_data['upload_financial_statement1'];
	$upload_financial_statement2= $entity_data['upload_financial_statement2'];
	$upload_financial_statement3= $entity_data['upload_financial_statement3'];
	$uplpad_ITR_1= $entity_data['uplpad_ITR_1'];
	$uplpad_ITR_2= $entity_data['uplpad_ITR_2'];
	$uplpad_ITR_3= $entity_data['uplpad_ITR_3'];
	$uplpad_ITR_1_actual= $entity_data['uplpad_ITR_1_actual'];
	$uplpad_ITR_2_actual= $entity_data['uplpad_ITR_2_actual'];
	$uplpad_ITR_3_actual= $entity_data['uplpad_ITR_3_actual'];
	$upload_financial_statement1_actual= $entity_data['upload_financial_statement1_actual'];
	$upload_financial_statement2_actual= $entity_data['upload_financial_statement2_actual'];
	$upload_financial_statement3_actual= $entity_data['upload_financial_statement3_actual'];
	$entity_have_gst_num= $entity_data['entity_have_gst_num'];
	$gst_exemption_letter= $entity_data['gst_exemption_letter'];
	$gst_certificate= $entity_data['gst_certificate'];
	$gst_certificate_actual= $entity_data['gst_certificate_actual'];
	$gst_exemption_letter_actual= $entity_data['gst_exemption_letter_actual'];
	$upload_cancelled_cheque_actual= $entity_data['upload_cancelled_cheque_actual'];
	$gst_number= $entity_data['gst_number'];
	$upload_cancelled_cheque= $entity_data['upload_cancelled_cheque'];
	$name_of_organization= $entity_data['name_of_organization'];
	$uploaded_xl_file= $entity_data['xl_file'];
	$uploaded_xl_file_actual= $entity_data['xl_file_actual'];
	
	$name_of_organization= $entity_data['name_of_organization'];
	$is_edit='';
	$is_add_edit='edit';
	$edit_title='<section class="content-header"><a href="'.base_url().'ngo/entity/edit?id='.$ngo_id.'" class="btn btn-default pull-right">Back</a>  <h1> Edit Entity </h1> </section>';
	
	$budget_details_input1=$budget_details[0]['input1'];
	$budget_details_input2=$budget_details[0]['input2'];
	$budget_details_input3=$budget_details[0]['input3'];
	
	$budget_details_input4=$budget_details[1]['input1'];
	$budget_details_input5=$budget_details[1]['input2'];
	$budget_details_input6=$budget_details[1]['input3'];
	
	$page5_financial_years= json_decode($entity_data['page5_financial_years'] ,true);
	if($page5_financial_years){
			$financial_years1=$page5_financial_years[0]['financial_years1'];
			$financial_years2=$page5_financial_years[0]['financial_years2'];
			$financial_years3=$page5_financial_years[0]['financial_years3'];
		//var_dump($page5_financial_years);
	}
	
	
}else{
	
	
	$uploaded_xl_file='';
	$uploaded_xl_file_actual='';
	
	$budget_details_input1='';
	$budget_details_input2='';
	$budget_details_input3='';
	$budget_details_input4='';
	$budget_details_input5='';
	$budget_details_input6='';
	
	$upload_financial_statement1='';
	$upload_financial_statement2='';
	$upload_financial_statement3='';
	$uplpad_ITR_1='';
	$uplpad_ITR_2='';
	$uplpad_ITR_3='';
	$budget_details='';
	$major_donors='';
	$entity_have_gst_num='';
	$gst_exemption_letter='';
	$gst_certificate='';
	$gst_certificate_actual='';
	$gst_exemption_letter_actual='';
	$upload_cancelled_cheque_actual='';
	$gst_number='';
	$upload_cancelled_cheque='';
	$name_of_organization='';
	$upload_financial_statement1_actual='';
	$upload_financial_statement2_actual='';
	$upload_financial_statement3_actual='';
	$uplpad_ITR_1_actual='';
	$uplpad_ITR_2_actual='';
	$uplpad_ITR_3_actual='';
	$entity_id='';
	$ngo_id='';
	$superngo_id='';
	$display_none='<!--';
	$display_none1='-->';
	$display_none_='';	
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
.input_description{font-weight: 400;}
.append_span{background-color: #e7e5e5  !important;
	min-width: 80px !important;
	}
</style>
<?php echo $display_none ?><div class="content-wrapper">
<?php echo $edit_title;?>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<input type="hidden" class="form-control" id="entity_id" name="entity_id" value="<?php echo $entity_id;?>">
				<input type="hidden" class="form-control" id="is_add_edit5" value='<?php echo $is_add_edit; ?>'>
				
				<input type="hidden" class="form-control" id="budget_details_input1" value='<?php echo $budget_details_input1; ?>'>
				<input type="hidden" class="form-control" id="budget_details_input2" value='<?php echo $budget_details_input2; ?>'>
				<input type="hidden" class="form-control" id="budget_details_input3" value='<?php echo $budget_details_input3; ?>'>
				<input type="hidden" class="form-control" id="budget_details_input4" value='<?php echo $budget_details_input4; ?>'>
				<input type="hidden" class="form-control" id="budget_details_input5" value='<?php echo $budget_details_input5; ?>'>
				<input type="hidden" class="form-control" id="budget_details_input6" value='<?php echo $budget_details_input6; ?>'>
				
				<div id="err_add_plan"></div><?php echo $display_none1 ?>	
				<?php //var_dump($entity_data)?>
				<div id="alert_danger_error"></div>
	<div role="tabpanel" class="tab-pane" id="page5">
		<div class="box box-primary">
			<div class="box-header with-border">
			  <h3 class="box-title">Financial Details</h3>
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
					<div class="col-xs-2 bs-wizard-step active"><!-- active -->
						<div class="text-center bs-wizard-stepnum">Step 5</div>
						<div class="progress"><div class="progress-bar"></div></div>
						<a href="#page5" role="tab" data-toggle="tab" class="bs-wizard-dot"></a>
					</div>
					<div class="col-xs-2 bs-wizard-step disabled"><!-- disabled -->
						<div class="text-center bs-wizard-stepnum">Step 6</div>
						<div class="progress"><div class="progress-bar"></div></div>
						<a href="#page6" class="bs-wizard-dot"></a>
					</div>
				</div>
				<form id="entity_step5_form" method="post" role="form">
					<div class="form-group">
						<label for=" ">Please add budget details for the organisation   <span class="required">*</span></label><br>
						<a class="input_description" href="<?php echo base_url();?>assets/doc/Compass-Annual-Budget-Template.xlsx" download target="_blank">
							Download and fill out this template with the required details.
						</a>Upload here once data has been entered. You can also fill out the details directly below.
						<br>
						<div class="col-md-12">
							<button type="button" id="comman_file_upload_class" name="comman_file_upload_class" image_upload_desc="File must be less than 10MB in size.We prefer if you can provide .pdf versions of your document." upload_type="file" file_count="single" img_primary="no" file_prev_class="xl_file_upload" file_input_id="xl_file" class="btn btn-primary btn-lg comman_file_upload_class" data-toggle="modal" data-target="#browseFilePage5_1"><i class="fa fa-upload"></i> </button>
							<input class="form-control xl_file" id="xl_file" name="xl_file" type="hidden" value="">
							<div class="image-preview inline_block xl_file_upload">
								<input readonly class="form-control display_upload_image_name display_none" type="text" id="gst_certificate_actual" value="">
							</div>
						</div>
					
					</div>
					<table class="table table-bordered">
						<thead class="thead-light">
							<tr>
								<th scope="col">Date for last 3 years of mandatory</th>
								<th scope="col">Immediately preceding financial year.<br/>provide 
								provisional/unaudited number if last year's number is not finalized yet. (<?php echo $financial_years3;?>)</th>
								<th scope="col">second preceding financial year <br/>(<?php echo $financial_years2;?>)</th>
								<th scope="col">Third preceding financial year <br/> (<?php echo $financial_years1;?>)</th>
								<th scope="col">Additional Year(s)(Optional)</th>
							</tr>
						</thead>
						<tbody class="budget_details_class">
							<tr class="tr_class_data">
								<td>Organisational income(in INR lakhs)</td>
								<td>
									<div class="input-group">
										<input  aria-label="Amount" onkeypress="return (event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57))" type="text" class="form-control text1 finalized text-right" value="<?php if($budget_details_input1){ echo $budget_details_input1;}?>">
										<span class="input-group-addon append_span append_span_finalized"><?php if($budget_details_input1){echo '('.$budget_details_input1.',00,000)';}?></span>
									</div>
								</td>
								<td>
									<div class="input-group">
										<input aria-label="Amount" onkeypress="return (event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57))" type="text" class="form-control text1 finalized  text-right" value="<?php if($budget_details_input2){echo $budget_details_input2;}?>">
										<span class="input-group-addon append_span append_span_preceding_financial1"></span>
									</div>
								</td>
								<td>
									<div class="input-group">
										<input aria-label="Amount" onkeypress="return (event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57))" type="text" class="form-control  finalized text1 text-right" value="<?php if($budget_details_input3){echo $budget_details_input3;}?>">
										<span class="input-group-addon append_span append_span_preceding_financial2"></span>
									</div>
								</td>
								<td><input type="text" onkeypress="return (event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control text1" value="<?php if($budget_details){ echo $budget_details[0]['input4']; }?>"></td>
							</tr>
							<tr class="tr_class_data">
								<td>Organisational expenditure(in INR lakhs)</td>
								<td>
									<div class="input-group">
										<input aria-label="Amount" onkeypress="return (event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57))"  type="text" class="form-control text1 finalized text-right" value="<?php if($budget_details_input4){ echo $budget_details_input4;}?>">
										<span class="input-group-addon append_span append_span_finalized1"></span>
									</div>
								</td>
									
								<td>
									<div class="input-group">
										<input aria-label="Amount" onkeypress="return (event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57))"  type="text" class="form-control text1 finalized text-right" value="<?php if($budget_details_input5){ echo $budget_details_input5; }?>">
										<span class="input-group-addon append_span append_span_preceding_financial3"></span>
									</div>
								</td>
								<td>
									<div class="input-group">
										<input aria-label="Amount" onkeypress="return (event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57))"  type="text" class="form-control text1 finalized text-right" value="<?php if($budget_details_input6){ echo $budget_details_input6; }?>">
										<span class="input-group-addon append_span append_span_preceding_financial4"></span>
									</div>
								</td>
								<td><input type="text" onkeypress="return (event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57))"  class="form-control text1" value="<?php if($budget_details){ echo $budget_details[1]['input4']; }?>"></td>
							</tr>
						</tbody>
					</table>
					
					<div class="budget_detail_err display_none">Please provide all the details.</div>
					<div class="form-group">
						<label for=" ">Please share details for your major donors in the last 3 years<span class="required">*</span></label><br>
						<a class="input_description" href="<?php echo base_url();?>assets/doc/Compass-Previous-Donors-Template.xlsx" download target="_blank">
							Download and fill out this template with the required details.
						</a> Upload here once data has been entered. You can also fill out the details directly below.
						<br>
						<!--<div class="col-md-12">-->
							<button type="button" id="comman_file_upload_class" name="comman_file_upload_class" image_upload_desc="File must be less than 10MB in size.We prefer if you can provide .pdf versions of your document." upload_type="file" file_count="single" img_primary="no" file_prev_class="xl_file_upload" file_input_id="xl_file" class="btn btn-primary btn-lg comman_file_upload_class" data-toggle="modal" data-target="#browseFilePage5_2"><i class="fa fa-upload"></i> </button>
							<input class="form-control xl_file" id="xl_file" name="xl_file" type="hidden" value="">
							<div class="image-preview inline_block xl_file_upload">
								<input readonly class="form-control display_upload_image_name display_none" type="text" id="gst_certificate_actual" value="">
							</div>
						<!--</div>-->
					</div>  
					<div id="detail_of_donor_page" class="detail_of_donor_page">
					<?php 
						$i=0;
						if($major_donors){
							$show_remove = '';
							foreach($major_donors as $details){
								$i++;
								if($i > 1){
									$show_remove = '';
								}else{
									$show_remove = 'display_none';
								}
					?>
						<div class="panel panel-default">
							<div class="row panel-body">
								<div class="form-group col-md-12 <?php echo $show_remove ?>" style="margin-bottom: -14px;">
									<button type="button" class="btn btn-danger pull-right donor_remove"><i class="fa fa-close"></i></button>                    
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group col-md-4">
											<label for="name_of_donor">Name<span class="required">*</span></label>
											<input type="text" class="form-control name_of_donor" id="name_of_donor" name="name_of_donor" placeholder="Enter name of Donor" value="<?php echo $details['name_of_donor']; ?>">
										</div> 
										<div class="form-group col-md-4">
											<label for="title_of_project">Project Title<span class="required">*</span><span id="errmsg"></span></label>
											<input type="text" class="form-control title_of_project" name="title_of_project" placeholder="Title of the project" value="<?php echo $details['title_of_project']; ?>">
										</div> 
										<div class="form-group col-md-4">
											<label for="project_period_from">Project period from<span class="required">*</span><span id="errmsg"></span></label>
											<input type="text" readonly class="form-control old_date project_period_from" name="project_period_from" placeholder="Project period from" value="<?php echo $details['project_period_from']; ?>">
										</div> 
										<div class="form-group col-md-4">
											<label for="project_period_to">Project period To<span class="required">*</span><span id="errmsg"></span></label>
											<input type="text" readonly class="form-control old_date project_period_to" name="project_period_to" placeholder="Project period to" value="<?php echo $details['project_period_to']; ?>">
										</div>
										<div class="form-group col-md-4">
											<label for="amount">Amount(in INR lakhs)<span class="required">*</span><span id="errmsg"></span></label>
											<input type="number" class="form-control value amount" name="amount" placeholder="amount(in INR lakhs)" value="<?php echo $details['project_amount']; ?>">
										</div> 														
									</div>
								</div>
								<div class="project_period_date_err display_none error">This date must be later than start date</div>
							</div>
						</div>
						<?php					
								}
							}
						?>
						
						<?php 
						if(!$major_donors){
						?>
						<div class="panel panel-default">
							<div class="row panel-body">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group col-md-4">
											<label for="name_of_donor">Name<span class="required">*</span></label>
											<input type="text" class="form-control name_of_donor" id="name_of_donor" name="name_of_donor" placeholder="Enter name of Donor" value="">
										</div> 
										<div class="form-group col-md-4">
											<label for="title_of_project">Project Title<span class="required">*</span><span id="errmsg"></span></label>
											<input type="text" class="form-control title_of_project" name="title_of_project" placeholder="Title of the project" value="">
										</div> 
										<div class="form-group col-md-4">
											<label for="project_period_from">Project period from<span class="required">*</span><span id="errmsg"></span></label>
											<input type="text" readonly class="form-control old_date project_period_from" name="project_period_from" placeholder="Project period from" value="">
										</div> 
										<div class="form-group col-md-4">
											<label for="project_period_to">Project period To<span class="required">*</span><span id="errmsg"></span></label>
											<input type="text" readonly class="form-control old_date project_period_to" name="project_period_to" placeholder="Project period to" value="">
										</div>
										<div class="form-group col-md-4">
											<label for="amount">Amount(in INR lakhs)<span class="required">*</span><span id="errmsg"></span></label>
											<input type="number" class="form-control value amount" name="amount" placeholder="amount(in INR lakhs)" value="">
										</div> 														
									</div>
								</div>
								<div class="project_period_date_err display_none error">This date must be later than start date</div>
							</div>
						</div>
						<?php					
						}
						?>
					</div>
					<div class="major_details_err display_none">Please provide the details.</div>
					<button type="button" id="detail_of_donor" class="btn btn-success add_button"><i class="fa fa-plus"></i></button><label style="margin-left:5px;">Add another donor</label>
					
					<h5>Financial Statements & Income Tax Returns</h5>
					
					<div class="row">
						<div class="col-md-3"></div>
						<div class="col-md-3"><span class="page5_financial_years1_text"><?php echo $financial_years1; ?></span></div>
						<div class="col-md-3"><span class="page5_financial_years2_text"><?php echo $financial_years2; ?></span> </div>
						<div class="col-md-3"><span class="page5_financial_years3_text"><?php echo $financial_years3; ?></span> </div>
					</div>
				
					<div class="row">	
						<div class="col-md-3">Upload audited financial statements</div>
						<div class="col-md-3">
							<button type="button" id="comman_file_upload_class" image_upload_desc="File must be less than 10MB in size.We prefer if you can provide .pdf versions of your document." name="comman_file_upload_class" upload_type="file" file_count="single" img_primary="no" file_prev_class="image_selected1" file_input_id="image_id1" class="btn btn-primary btn-lg comman_file_upload_class" data-toggle="modal" data-target="#browseFile"><i class="fa fa-upload"></i> </button>
							<input class="form-control image_id1" id="image_id1" name="image_id1" type="hidden" value="<?php echo $upload_financial_statement1 ?>">
							<div class="image-preview inline_block image_selected1" style="width: 100%;margin-top: 0px;">
								<input readonly class="form-control display_upload_image_name <?php if (!$upload_financial_statement1_actual){ echo 'display_none'; } ?>" type="text" id="upload_financial_statement1" value="<?php echo $upload_financial_statement1_actual ?>">
							</div>
							<label id="cycle_file_upload_error1" class="required display_none cycle_file_upload_error1">Your file must be less than 10MB in size.</label>
						</div>
						<div class="col-md-3">
							<button type="button" id="comman_file_upload_class" image_upload_desc="File must be less than 10MB in size.We prefer if you can provide .pdf versions of your document." name="comman_file_upload_class" upload_type="file" file_count="single" img_primary="no" file_prev_class="image_selected2" file_input_id="image_id2" class="btn btn-primary btn-lg comman_file_upload_class" data-toggle="modal" data-target="#browseFile"><i class="fa fa-upload"></i> </button>
							<input class="form-control image_id2" id="image_id2" name="image_id2" type="hidden" value="<?php echo $upload_financial_statement2 ?>">
							<div class="image-preview inline_block image_selected2" style="width: 100%;margin-top: 0px;">
								<input readonly class="form-control display_upload_image_name <?php if (!$upload_financial_statement2_actual){ echo 'display_none'; } ?>" type="text" id="upload_financial_statement2" value="<?php echo $upload_financial_statement2_actual ?>">
							</div>
							<label id="cycle_file_upload_error1" class="required display_none cycle_file_upload_error1">Your file must be less than 10MB in size.</label>
						</div>
						<div class="col-md-3">
							<button type="button" id="comman_file_upload_class" image_upload_desc="File must be less than 10MB in size.We prefer if you can provide .pdf versions of your document." name="comman_file_upload_class" upload_type="file" file_count="single" img_primary="no" file_prev_class="image_selected3" file_input_id="image_id3" class="btn btn-primary btn-lg comman_file_upload_class" data-toggle="modal" data-target="#browseFile"><i class="fa fa-upload"></i> </button>
							<input class="form-control image_id3" id="image_id3" name="image_id3" type="hidden" value="<?php echo $upload_financial_statement3 ?>">
							<div class="image-preview inline_block image_selected3" style="width: 100%;margin-top: 0px;">
								<input readonly class="form-control display_upload_image_name <?php if (!$upload_financial_statement3_actual){ echo 'display_none'; } ?>" type="text" id="upload_financial_statement3" value="<?php echo $upload_financial_statement3_actual ?>">
							</div>
							<label id="cycle_file_upload_error1" class="required display_none cycle_file_upload_error1">Your file must be less than 10MB in size.</label>
						</div>
					</div>
					<div class="row">	
						<div class="col-md-3">Upload ITR Documents</div>
						<div class="col-md-3">
							<button type="button" id="comman_file_upload_class" name="comman_file_upload_class" image_upload_desc="File must be less than 10MB in size.We prefer if you can provide .pdf versions of your document." upload_type="file" file_count="single" img_primary="no" file_prev_class="image_selected4" file_input_id="image_id4" class="btn btn-primary btn-lg comman_file_upload_class" data-toggle="modal" data-target="#browseFile"><i class="fa fa-upload"></i> </button>

							<input class="form-control image_id4" id="image_id4" name="image_id4" type="hidden" value="<?php echo $uplpad_ITR_1 ?>">
							<div class="image-preview inline_block image_selected4" style="width: 100%;margin-top: 0px;">
								<input readonly class="form-control display_upload_image_name <?php if (!$uplpad_ITR_1_actual){ echo 'display_none'; } ?>" type="text" id="uplpad_ITR_1" value="<?php echo $uplpad_ITR_1_actual ?>">
							</div>
							<label id="cycle_file_upload_error1" class="required display_none cycle_file_upload_error1">Your file must be less than 10MB in size.</label>
						</div>
						<div class="col-md-3">
						
							<button type="button" id="comman_file_upload_class" name="comman_file_upload_class" image_upload_desc="File must be less than 10MB in size.We prefer if you can provide .pdf versions of your document." upload_type="file" file_count="single" img_primary="no" file_prev_class="image_selected5" file_input_id="image_id5" class="btn btn-primary btn-lg comman_file_upload_class" data-toggle="modal" data-target="#browseFile"><i class="fa fa-upload"></i> </button>

							<input class="form-control image_id5" id="image_id5" name="image_id5" type="hidden" value="<?php echo $uplpad_ITR_2 ?>">
							<div class="image-preview inline_block image_selected5" style="width: 100%;margin-top: 0px;">
								<input readonly class="form-control display_upload_image_name <?php if (!$uplpad_ITR_2_actual){ echo 'display_none'; } ?>" type="text" id="uplpad_ITR_2" value="<?php echo $uplpad_ITR_2_actual ?>">
							</div>
							<label id="cycle_file_upload_error1" class="required display_none cycle_file_upload_error1">Your file must be less than 10MB in size.</label>
						</div>
						<div class="col-md-3">
						
							<button type="button" id="comman_file_upload_class" name="comman_file_upload_class" image_upload_desc="File must be less than 10MB in size.We prefer if you can provide .pdf versions of your document." upload_type="file" file_count="single" img_primary="no" file_prev_class="image_selected5" file_input_id="image_id6" class="btn btn-primary btn-lg comman_file_upload_class" data-toggle="modal" data-target="#browseFile"><i class="fa fa-upload"></i> </button>

							<input class="form-control image_id6" id="image_id6" name="image_id6" type="hidden" value="<?php echo $uplpad_ITR_3 ?>">
							<div class="image-preview inline_block image_selected5" style="width: 100%;margin-top: 0px;">
								<input readonly class="form-control display_upload_image_name <?php if (!$uplpad_ITR_3_actual){ echo 'display_none'; } ?>" type="text" id="uplpad_ITR_3" value="<?php echo $uplpad_ITR_3_actual ?>">
							</div>
							<label id="cycle_file_upload_error1" class="required display_none cycle_file_upload_error1">Your file must be less than 10MB in size.</label>
						</div>
					</div>
				
					<div style="display: none;">
						<div class="form-group">
							<label for=" ">Upload audited financial statements for <?php echo $financial_years[0]->name;?>  <span class="required">*</span></label>
							<div class="col-md-12">
								<button type="button" id="comman_file_upload_class" name="comman_file_upload_class" image_upload_desc="File must be less than 10MB in size.We prefer if you can provide .pdf versions of your document." upload_type="file" file_count="single" img_primary="no" file_prev_class="image_selected" file_input_id="image_id" class="btn btn-primary btn-lg comman_file_upload_class" data-toggle="modal" data-target="#browseFile"><i class="fa fa-upload"></i> </button>

								<input readonly class="form-control image_id" id="image_id" name="image_id" type="hidden" value="">
								<div class="image-preview inline_block image_selected">
									<input readonly class="form-control display_none display_upload_image_name" type="text" value="">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for=" ">Upload audited financial statements for <?php echo $financial_years[0]->name;?>  <span class="required">*</span></label>
							<div class="col-md-12">
								<button type="button" id="comman_file_upload_class" name="comman_file_upload_class" image_upload_desc="File must be less than 10MB in size.We prefer if you can provide .pdf versions of your document." upload_type="file" file_count="single" img_primary="no" file_prev_class="image_selected" file_input_id="image_id" class="btn btn-primary btn-lg comman_file_upload_class" data-toggle="modal" data-target="#browseFile"><i class="fa fa-upload"></i> </button>

								<input readonly class="form-control image_id" id="image_id" name="image_id" type="hidden" value="">
								<div class="image-preview inline_block image_selected">
									<input readonly class="form-control display_none display_upload_image_name" type="text" value="">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for=" ">Upload audited financial statements for <?php echo $financial_years[0]->name; ?>  <span class="required">*</span></label>
						</div>
						<div class="form-group">
							<label for=" ">Upload ITR Documents for <?php echo $financial_years[0]->name;?>  <span class="required">*</span></label>
						</div>
						<div class="form-group">
							<label for=" ">Upload ITR Documents for <?php echo $financial_years[0]->name;?>  <span class="required">*</span></label>
						</div>
						<div class="form-group">
							<label for=" ">Upload ITR Documents for <?php echo $financial_years[0]->name;?> <span class="required">*</span></label>
						</div>
					</div>
					<h5>Bank Details</h5>
					<div class="form-group">
						<label for=" ">Download the provided bank template. Upload once filled.<span class="required">*</span></label><br>
						<a class="input_description" href="<?php echo base_url();?>assets/doc/Bajaj_Bank_Template.xlsx" download target="_blank">
							Download and fill out this template with the required details.
						</a>Upload here once data has been entered.
						<br>
						<div class="col-md-12">
							<button type="button" id="comman_file_upload_class" name="comman_file_upload_class" image_upload_desc="File must be less than 10MB in size.We prefer if you can provide .pdf versions of your document." upload_type="file" file_count="single" img_primary="no" file_prev_class="xl_file_uploaded" file_input_id="uploaded_xl_file" class="btn btn-primary btn-lg comman_file_upload_class" data-toggle="modal" data-target="#browseFile2"><i class="fa fa-upload"></i> </button>
							<input class="form-control uploaded_xl_file" id="uploaded_xl_file" name="uploaded_xl_file" type="hidden" value="<?php if($uploaded_xl_file){ echo $uploaded_xl_file;}?>">
							<div class="image-preview inline_block xl_file_uploaded">
								<input readonly class="form-control display_upload_image_name <?php if(!$uploaded_xl_file_actual){ echo 'display_none' ;}?>" type="text" id="uploaded_xl_file_actual" value="<?php if($uploaded_xl_file_actual){echo $uploaded_xl_file_actual;} ?>">
							</div>
						</div>
						<div class="xl_file_err display_none error">Please upload a file.</div>
					</div>
					<div class="form-group">
						<label for=" ">Does the entity have a GST number?<span class="required">*</span></label>
						<label class="radio-inline" style="margin-left:10px;">
							<input type="radio" class="show_on_radio_click entity_have_gst_number" name="optradio_entity" value="Yes" <?php if ($entity_have_gst_num === 'Yes'){ echo 'checked="checked"'; } ?>>Yes
						</label>  
						<label class="radio-inline">  
							<input type="radio" class="show_on_radio_click entity_have_gst_number" name="optradio_entity" value="No" <?php if ($entity_have_gst_num === 'No'){ echo 'checked="checked"'; } ?>>No
						</label>
						<div class="gst_number_error"></div>
						<div class="show_on_radio_data <?php if (!$entity_have_gst_num || $entity_have_gst_num === 'No'){ echo 'display_none'; } ?>">
							<div class="form-group">
								<label for=" ">Please enter the GST number for the entity<span class="required">*</span><span id="errmsg"></span></label>
								<input type="text" class="form-control" id="gst_number" name="gst_number" placeholder="Please enter GST number of the organization" value="<?php echo $gst_number ?>">
							</div> 
							<div class="gst_number_valid_err display_none error">Please provide valid GST number.</div>
							<div class="gst_number_err display_none error">Please provide the detail.</div>
					   
							<div class="form-group">
								<label for="gst_certificate">Please upload the entity's GST certificate<span class="required">*</span></label>
								<div class="col-md-12">
									<button type="button" id="comman_file_upload_class" name="comman_file_upload_class" image_upload_desc="File must be less than 10MB in size.We prefer if you can provide .pdf versions of your document." upload_type="file" file_count="single" img_primary="no" file_prev_class="gst_certificate_selected" file_input_id="gst_certificate" class="btn btn-primary btn-lg comman_file_upload_class" data-toggle="modal" data-target="#browseFile"><i class="fa fa-upload"></i> </button>

									<input class="form-control gst_certificate" id="gst_certificate" name="gst_certificate" type="hidden" value="<?php echo $gst_certificate ?>">
									<div class="image-preview inline_block gst_certificate_selected">
										<input readonly class="form-control display_upload_image_name gst_certificate_actual <?php if (!$gst_certificate_actual){ echo 'display_none'; } ?>" type="text" id="gst_certificate_actual" value="<?php echo $gst_certificate_actual ?>">
									</div>
								</div>
								<div class="gst_certificate_err display_none error">Please upload a file.</div>
							</div>
						</div>
						<div class="show_on_radio_data_no  <?php if (!$entity_have_gst_num || $entity_have_gst_num === 'Yes'){ echo 'display_none'; } ?>">
							<div class="form-group">
								<label for="gst_exemption_letter">Please upload GST exemption letter <span class="required">*</span></label><br>
								<a href="<?php echo base_url();?>assets/doc/GST NON-APPLICABILITY.docx" download target="_blank">
									Please use this template document
								</a>
								
								<div class="col-md-12" style="margin-top:15px;">
									<button type="button" id="comman_file_upload_class" name="comman_file_upload_class" image_upload_desc="File must be less than 10MB in size.We prefer if you can provide .pdf versions of your document." upload_type="file" file_count="single" img_primary="no" file_prev_class="gst_exemption_letter_selected" file_input_id="gst_exemption_letter" class="btn btn-primary btn-lg comman_file_upload_class" data-toggle="modal" data-target="#browseFile"><i class="fa fa-upload"></i> </button>

									<input class="form-control gst_exemption_letter" id="gst_exemption_letter" name="gst_exemption_letter" type="hidden" value="<?php echo $gst_exemption_letter ?>">
									<div class="image-preview inline_block gst_exemption_letter_selected">
										<input readonly class="form-control display_upload_image_name <?php if (!$gst_exemption_letter_actual){ echo 'display_none'; } ?>" type="text" id="gst_exemption_letter_upload" value="<?php echo $gst_exemption_letter_actual ?>">
									</div>
								</div>
								<div class="gst_exemption_letter_err display_none error">Please upload a file.</div>
							</div>
						</div>
					</div> 
					<div class="form-group">
						<label for=" ">Attach scan/photo of pre-printed cancelled cheque<span class="required">*</span></label>
						<div class="col-md-12">
							<button type="button" id="comman_file_upload_class" name="comman_file_upload_class" image_upload_desc="File must be less than 10MB in size.We prefer if you can provide .pdf versions of your document." upload_type="file" file_count="single" img_primary="no" file_prev_class="cancelled_cheque_selected" file_input_id="cancelled_cheque" class="btn btn-primary btn-lg comman_file_upload_class" data-toggle="modal" data-target="#browseFile"><i class="fa fa-upload"></i> </button>

							<input class="form-control cancelled_cheque" id="cancelled_cheque" name="cancelled_cheque" type="hidden" value="<?php echo $upload_cancelled_cheque ?>">
							<div class="image-preview inline_block cancelled_cheque_selected">
								<input readonly class="form-control display_upload_image_name <?php if (!$upload_cancelled_cheque_actual){ echo 'display_none'; } ?>" type="text" id="upload_cancelled_cheque" value="<?php echo $upload_cancelled_cheque_actual ?>">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for=" ">Provide the name of the organization as mentioned in all the statutory documents  <span class="required">*</span></label>
						<input type="text" class="form-control" id="name_of_organization" name="name_of_organization" placeholder="Enter name here" value="<?php echo $name_of_organization ?>">
					</div>

					<div class="form-group">
						<span class="btn btn-default cancel_page <?php echo $is_edit; ?>" align="<?php echo $entity_id; ?>" >Cancel</span>
						<span class="btn btn-success save_step save_page5 <?php echo $is_edit; ?>">Save Changes</span>
						<!--<span class="btn btn-success save_step save_page5 <?php echo $display_none_; ?>">Save</span>-->
						<button type="submit" class="btn btn-success save_goto_next_step <?php echo $display_none_; ?>" id="submit_next_page5">Save & Next</button>
						<span class="btn btn-primary skip_step_five display_none <?php echo $display_none_; ?>">Finish Later</span>
					</div>
				</form>
			</div>
		</div>
	</div>
		<?php echo $display_none ?></div>
		</div>
	</section>
</div><?php echo $display_none1 ?>