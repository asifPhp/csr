<style>
.marBot20{
	margin-bottom:20px;
}
.checkbox{margin-left: 15px;}

.fa_plus{
	float: right;
	font-size: 12px !important;
}
.edit_bttn{
	margin-top: -40px;
    margin-right: 35px;
    z-index: 999999;
    position: relative;
}
pre{
	border: none;
    background: white;
}
	.notification_content{    min-height: 0px;
    padding: 0px;}
</style>

<?php
//var_dump($project_list);
$project_id=$project_list[0]['id'];
//var_dump($project_id);die;
//var_dump($prop_data);die;
$content2='';
	if($prop_data){
		$category_array_data = json_decode($prop_data[0]['category_array']);
		if($category_array_data){
			$i = 1;
			foreach ($category_array_data as $value2) {
				$content2 .= '<tr class="darker-on-hover">';
				$content2 .= '<td class="text-center">' . $value2->category_name. '</td>';
				$content2 .= '<td class="text-center">' . $value2->value. '</td>';
				
				$content2 .= '</tr>';
				$i++;
			}
			$table_type = 'dataTables';
		}
		else{
		$content2 .= '<tr style="color: red;" class="darker-on-hover " >
		<td class="text-center" colspan="6">No data Available</td></tr>';
		$table_type = '';
		}
	}
	//var_dump($data_value);
?>
 <div class="content-wrapper proposals">
	
	<?php ?>
	
	<section class="content proposal_content <?php if($disp_project_section){if($disp_project_section=='yes'){}else{ echo 'display_none';}}?>">
	    <div class="row">
		     <!-- left column -->
            <div class="col-md-12">		
				<div class="box  box-primary collapsed-box">
					<div class="box-header with-border" data-widget="collapse">
						<i class="fa btn btn-box-tool fa_plus fa-plus"></i>
						<h3 class="box-title">Project Details</h3>
					</div>
					<!--<a href="<?php echo base_url();?>organisation/project/edit_project?id=<?php echo $project_list[0]['id'];?>" class="btn btn-default pull-right edit_click">Edit</a>-->
					<div class="box-body">
						<div class="form-group row">
							<label for="organisation_id" class="col-md-3 text-right">Project Title</label>
							<div class="col-md-9"> 
								<span class="is_edit_hide"><?php if($project_list){ echo $project_list[0]['title'];} ?></span>
							</div>
						</div>
						<div class="form-group row">
							<label for="organisation_id" class="col-md-3 text-right">Status</label>
							<div class="col-md-9"> 
								<span class="is_edit_hide label " style="background-color: <?php echo constant('STATUS_'.$project_list[0]['project_status']);?> !important;"><?php echo $project_list[0]['project_status']; ?></span>
							</div>
						</div>
						<div class="form-group row">
							<label for="organisation_id" class="col-md-3 text-right">Focal Point</label>
							<div class="col-md-9"> 
								<span class="is_edit_hide">
								<?php 
									$org_id = $this->session->userdata('org_id');
									$ngo_id=$project_list[0]['ngo_id'];
									$sql23 = "SELECT staff_id FROM org_assigner_mgmt WHERE ngo_id=$ngo_id and org_id=$org_id and user_type='project normal'" ;
									$result23 = $this->db->query($sql23)->result_array();
									if($result23){
										$staff_id_data=$result23[0]['staff_id'];
										$sql23 = "SELECT first_name,last_name FROM org_staff_account WHERE `staff_id`=$staff_id_data " ;
											$result23 = $this->db->query($sql23)->result_array();
											if($result23){
												$first_name = $result23[0]['first_name'];
												$last_name = $result23[0]['last_name'];
												$focal_point=$first_name .' '.$last_name;
												echo $focal_point;
											}
									}
								?>
								
								</span>
							</div>
						</div>
						<?php //var_dump($org_tasks_data) ;?>
						<h5 class="box-title">Current Task</h5>
						<div class="form-group row">
							<label for="organisation_id" class="col-md-3 text-right">Name</label>
							<div class="col-md-9"> 
								<span class="is_edit_hide"><?php if($data_value){ echo $org_task_label[0]['org_task_label'];} ?></span>
							</div>
							</div>
						<div class="form-group row">
							<label for="organisation_id" class="col-md-3 text-right">Assignee</label>
							<div class="col-md-9"> 
								<span class="is_edit_hide"><?php echo $assigned_to; ?></span>
							</div>
							</div>
						<div class="form-group row">
							<label for="organisation_id" class="col-md-3 text-right">Due Date</label>
							<div class="col-md-9"> 
								<span class="is_edit_hide"><?php if($org_tasks_data){ if($org_tasks_data[0]->due_date){ echo date_formats($org_tasks_data[0]->due_date); }} ?></span>
							</div>
						</div>
						<?php if($org_tasks_data){ ?>
						<div class="form-group row">
							<a href="<?php echo base_url() ?>organisation/tasks/detail?id=<?php if($org_tasks_data){ echo $org_tasks_data[0]->org_task_id;} ?>&sourse=tasks" class="col-md-3 text-right">Go to task</a>
						</div>
						<?php }?>
					</div>	
				</div>
			</div>
		</div>
	</section>	
	
	<section class="content proposal_content">
	    <div class="row">
		     <!-- left column -->
            <div class="col-md-12">
				<div class="box  box-primary collapsed-box">
					<div class="box-header with-border" data-widget="collapse">
						<i class="fa btn btn-box-tool fa_plus fa-plus"></i>
						<h3 class="box-title">Proposal Details</h3>
					</div>
					<div class="box-body">	
						<div class="form-group row">
							<label for="organisation_id" class="col-md-3 text-right">Title</label>
							<div class="col-md-9"> 
							<?php //var_dump($prop_data); ?>
								<a href="<?php echo base_url();?>organisation/proposals/details?id=<?php if($project_list){ echo $project_list[0]['prop_id']; }?>"> <?php if($prop_data){ echo $prop_data[0]['title'];} ?></a>
								<!--<span class=""><?php //var_dump($project_list[0]); ?></span>-->
							</div>
						</div>
						<h5>Focus Area : </h5>
						<div class="form-group row">
							<label for="organisation_id" class="col-md-3 text-right">Category</label>
							<div class="col-md-9"> 
								<span class="is_edit_hide"><?php if($prop_data){ echo $prop_data[0]['admin_category'];}?></span>
							</div>
						</div>
						<div class="form-group row">
							<label for="organisation_id" class="col-md-3 text-right">Sub category</label>
							<div class="col-md-9"> 
								<span class="is_edit_hide"><?php if($prop_data){ echo $prop_data[0]['admin_subcategory'];} ?></span>
							</div>
						</div>
						<div class="form-group row">
							<label for="organisation_id" class="col-md-3 text-right">Focus Category</label>
							<div class="col-md-9"> 
								<span class="is_edit_hide"><?php if($prop_data){ echo $prop_data[0]['category_input'];} ?></span>
							</div>
						</div>
						<h5>Benificiary Categorisation :</h5>
						<div class="form-group">
							<table class="table table-bordered">
								<thead class="thead-light">
									<tr>
										<th scope="col">Region</th>
										<th scope="col">Category</th>
										<th scope="col">Age group</th>
										<th scope="col">Target group</th>
									</tr>
								</thead>
								<tbody class="budget_details_class">
									<tr>
										<td><span ><?php if($prop_data){ echo $prop_data[0]['region']; }?></span></td>
										<td><span ><?php if($prop_data){ echo $prop_data[0]['benficial_cat'];} ?></span></td>
										<td><span ><?php if($prop_data){ echo $prop_data[0]['age_group'];} ?></span></td>
										<td><span ><?php if($prop_data){ echo $prop_data[0]['target_group'];} ?></span></td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="form-group row">
							<label for="organisation_id" class="col-md-3 text-right">Geographies</label>
							<div class="col-md-9"> 
								<span class="is_edit_hide"><?php if($prop_data){ echo $prop_data[0]['geo_location_values'];} ?></span>
							</div>
						</div>
						<div class="form-group row">
							<label for="organisation_id" class="col-md-3 text-right">Start Date</label>
							<div class="col-md-9"> 
								<span class="is_edit_hide"><?php if($prop_data){ if($prop_data[0]['start_date'] && $prop_data[0]['start_date'] !='0000-00-00'){ echo date_formats($prop_data[0]['start_date']);} }?></span>
							</div>
						</div>
						<div class="form-group row">
							<label for="organisation_id" class="col-md-3 text-right">End Date</label>
							<div class="col-md-9"> 
								<span class="is_edit_hide"><?php if($prop_data){ if($prop_data[0]['end_date'] && $prop_data[0]['end_date'] !='0000-00-00'){ echo date_formats($prop_data[0]['end_date']); }}?></span>
							</div>
						</div>
						<div class="form-group row">
							<label for="organisation_id" class="col-md-3 text-right">Local Address</label>
							<div class="col-md-9"> 
								<?php
								if($prop_data[0]['registration_detail']){
								$registration_city='';
								$registration_pin_code='';
								$registration_state='';
								$registration_detail = json_decode($prop_data[0]['registration_detail']);
									$registration_city = $registration_detail[0]['registration_city'];
									$registration_pin_code = $registration_detail[0]['registration_pin_code'];
									$registration_state = $registration_detail[0]['registration_state'];
								}else{
									$registration_city='';
									$registration_pin_code='';
									$registration_state='';
								}
								?>				
								
								<span class="is_edit_hide"><?php echo $registration_city.','.$registration_pin_code.','.$registration_state; ?></span>
							</div>
						</div>
						<h5>Contact Person Details :</h5>
						<div class="form-group row">
							<label for="organisation_id" class="col-md-3 text-right">Full Name</label>
							<div class="col-md-9"> 
								<span class="is_edit_hide"><?php if($prop_data){ echo $prop_data[0]['full_name'];} ?></span>
							</div>
						</div>
						<div class="form-group row">
							<label for="organisation_id" class="col-md-3 text-right">Designation</label>
							<div class="col-md-9"> 
								<span class="is_edit_hide"><?php if($prop_data){ echo $prop_data[0]['designation'];} ?></span>
							</div>
						</div>
						<div class="form-group row">
							<label for="organisation_id" class="col-md-3 text-right">Email Address</label>
							<div class="col-md-9"> 
								<span class="is_edit_hide"><?php if($prop_data){ echo $prop_data[0]['email_address'];} ?></span>
							</div>
						</div>
						<div class="form-group row">
							<label for="organisation_id" class="col-md-3 text-right">Contact Number</label>
							<div class="col-md-9"> 
								<span class="is_edit_hide"><?php if($prop_data){ echo $prop_data[0]['contact_no'];} ?></span>
							</div>
						</div>
						<div class="form-group row">
							<label for="organisation_id" class="col-md-3 text-right">Executive Summary</label>
							<div class="col-md-9"> 
								<span class="is_edit_hide"><?php if($prop_data){ echo $prop_data[0]['project_summary_proposal'];} ?></span>
							</div>
						</div>
						
						<div class="form-group row">
							<label for="organisation_id" class="col-md-3 text-right">Key activities</label>
							<div class="col-md-9">
								
								<div class="table-responsive">
									<table id="blog_view_table" class=" table table-striped table-bordered table-hover" >
										<thead>
											<tr>
												<th class="text-center">Category Name</th>
												<th class="text-center">Key activities</th>
											</tr>
										</thead>
										<tbody>
											<?php echo $content2; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section class="content proposal_content">
	    <div class="row">
		     <!-- left column -->
            <div class="col-md-12">
				<div class="box  box-primary collapsed-box">
					<div class="box-header with-border" data-widget="collapse">
						<i class="fa btn btn-box-tool fa_plus fa-plus"></i>
						<h3 class="box-title">NGO Details</h3>
					</div>
					<div class="box-body">
						<div class="form-group row">
							<label for="organisation_id" class="col-md-3 text-right">Name</label>
							<div class="col-md-9"> 
							
								<a href="<?php echo base_url() ?>organisation/ngo/detail?id=<?php if($ngo_data){ echo $ngo_data[0]->id;} ?>"><?php if($ngo_data){ echo $ngo_data[0]->legal_name;} ?></a>
							</div>
						</div>
						<div class="form-group row">
							<label for="organisation_id" class="col-md-3 text-right">Status</label>
							<div class="col-md-9">
							<span class="is_edit_hide label " style="background-color: <?php if($org_ngo_review_status){ echo constant('STATUS_'.$org_ngo_review_status[0]->status);}?> !important;"><?php if($org_ngo_review_status){  echo $org_ngo_review_status[0]->status; } ?></span>  
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
				
</div>				
	
	
	<!--
	<div class="content">
		<div class="box  box-primary collapsed-box">
			<div class="box-header with-border" data-widget="collapse">
				<i class="fa btn btn-box-tool fa_plus fa-plus"></i>
				<h3 class="box-title">Reporting/Payment Cycles</h3>
			</div>
			<div class="box-body">
				<div class="table-responsive">
					<table id="blog_view_table" class="<?php echo $table_type1;?> table table-striped table-bordered table-hover" >
						<thead>
							<tr>
								<th class="text-center">S. No.</th>
								<th class="text-center">Cycle Name</th>
								<th class="text-center">Cycle status</th>
								<th class="text-center">Cycle started date</th>
								<th class="text-center">Cycle end date</th>
								<th class="text-center">Is Payment Done</th>
								<th class="text-center">Cycle Donor Amount</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php echo $content; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	
	<div class="content">
		<div class="box  box-primary collapsed-box">
			<div class="box-header with-border" data-widget="collapse">
				<i class="fa btn btn-box-tool fa_plus fa-plus"></i>
				<h3 class="box-title">Donor(s)</h3>
			</div>
			<div class="box-body">
				<div class="table-responsive">
					<table id="blog_view_table" class="<?php echo $table_type;?> table table-striped table-bordered table-hover" >
						<thead>
							<tr>
								<th class="text-center">S. No.</th>
								<th class="text-center">Name</th>
								<th class="text-center">Allocated Amount</th>
								<th class="text-center">Amount disbursed</th>
								<th class="text-center">Pending</th>						
								<th class="text-center">Vendor Code</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php echo $content1; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>-->
	
	<!--<div class="content">
		<div class="box  box-primary collapsed-box">
			<div class="box-header with-border" data-widget="collapse">
				<i class="fa btn btn-box-tool fa_plus fa-plus"></i>
				<h3 class="box-title">Additional Documents</h3>
			</div>
			<div class="box-body">
				<h5>Documents shared by NGO </h5>
				<?php if($ngo_document_data){ 
					//var_dump($ngo_document_data);
						$j=0;
						foreach($ngo_document_data as $value){
							$j++;
				?>
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right"><?php echo $value->document_name; ?></label>
					<div class="col-md-9"> 
						<!--<span class="is_edit_hide"><?php// echo $value->document_value_actual; ?></span>
						<a href="<?php echo base_url();?>uploads/<?php echo $value->document_value; ?>"><?php echo $value->document_value_actual; ?></a>
					</div>
				</div>
				<?php }}
				?>
				<h5>Documents shared by us</h5>
				<?php if($csr_document_data){ 
						$i=0;
						foreach($csr_document_data as $value){
							$i++;
				?>
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right"><?php echo $value->document_name; ?></label>
					<div class="col-md-9"> 
						<a href="<?php echo base_url();?>uploads/<?php echo $value->document_value; ?>"><?php echo $value->document_value_actual; ?></a>
					</div>
				</div>
				<?php }}
					?>
			</div>
		</div>
	</div> -->
		
	

<script>
$('document').ready(function(){

	//------------------------------------------------------------------------
    /*
		* This script is used to fill modal for edit category
	*/
    
	$('body').on('click','.send_notification_by_vendor_code', function () {
		
		var project_id = $('#project_id').val();
		var ngo_id = $(this).attr('ngo_id');
		var doner_id = $(this).attr('id');
		console.log(doner_id);
		console.log(project_id);
		
		$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
		$.post(APP_URL + 'organisation/project/send_vandor_code_email', {
			doner_id: doner_id,
			project_id: project_id,
			ngo_id: ngo_id,
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
					//window.location.reload();
				});
			} else {
				$('#head_ngo_review').html("<div class='alert alert-danger fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
				$("#head_ngo_review").fadeTo(2000, 500).slideUp(500, function(){
					$('#head_ngo_review').empty();
				});
			}	
		}, 'json');
		return false;
	});
});
</script>

