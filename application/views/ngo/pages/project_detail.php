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
.content{
		min-height: 0px;
		padding: 15px;
		<!--margin-top: -42px;-->
	}
	.box{    margin-bottom: -18px !important;}
.callout {
    border-radius: 3px;
    margin: 0 0 20px 0;
    padding: 15px 30px 15px 15px;
    border-left: 5px solid #eee;
}
.fa_plus{float: right;
	font-size: 12px !important;}
	.content{
		
	}
</style>

<?php
if($sql_query){
	$project_list = $this->db->query($sql_query)->result_array();	
}
if($sql_query1){
	$cycle_list = $this->db->query($sql_query1)->result_array();
	$content = '';
	$content1 = '';
	$content2 = '';
//var_dump($cycle_list);
	if($cycle_list){
		$i = 1;
		foreach ($cycle_list as $value) {
			$content .= '<tr class="darker-on-hover"><td class="text-center">' . $i . '</td>';
			
			$content .= '<td class="text-center">' . $value['cycle_name']. '</td>';
			$content .= '<td class="text-center">' . $value['cycle_status']. '</td>';
			$content .= '<td class="text-center">' . date_formats($value['cycle_start_date1']). '</td>';
			$content .= '<td class="text-center">' . date_formats($value['cycle_end_date2']). '</td>';
			$content .= '<td class="text-center">' . $value['is_payment']. '</td>';
			$content .= '<td class="text-center">' . '<i class="fa fa-inr" aria-hidden="true"></i>'.' '. $value['cycle_donor_amount']. '</td>';
			$content .= '<td class="text-center"><a href="'.base_url().'ngo/project/project_cycle_detail?id='.$value['project_cycle_id'].'" class="label label-info">View Cycle</a></td>';
			$content .= '</tr>';
			$i++;
		}
		$table_type1 = 'dataTables';
	}else{
		$table_type1 = '';
		$content .= '<tr style="color: red;" class="darker-on-hover " >
		<td class="text-center" colspan="6">No data Available</td></tr>';
		
	}
}
	if($prop_data){
		$category_array_data = json_decode($prop_data[0]->category_array);
		if($category_array_data){
			$i = 1;
			foreach ($category_array_data as $value2) {
				$content2 .= '<tr class="darker-on-hover">';
				$content2 .= '<td class="text-center">' . $value2->subcategory_name. '</td>';
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
	if($donors_data){
		$i = 1;
		foreach ($donors_data as $value1) {
			$content1 .= '<tr class="darker-on-hover"><td class="text-center">' . $i . '</td>';
			$content1 .= '<td class="text-center">' . $value1['legal_name']. '</td>';
			$content1 .= //'<td class="text-center"><a href="'.base_url().'no/project/project?id='.$value1['donor_id'].'" class="label label-info">View Donor</a></td>';
						'<td class="text-center"> </td>';
			$content1 .= '</tr>';
			$i++;
		}
		
	}else{
		$content1 .= '<tr style="color: red;" class="darker-on-hover " >
		<td class="text-center" colspan="6">No data Available</td></tr>';
		$table_type = '';
	}
?>


<div class="content-wrapper animated fadeInRight">
	<section class="content-header">
		<a href="<?php echo base_url();?>ngo/project/listing" class="btn btn-default pull-right">List All</a>
        <h1>
			<?php if($project_list){ echo $project_list[0]['title'];} ?>
        </h1>
    </section>
	
	<?php if($ngo_notification){ ?>
	<div class="content" style="margin-bottom: -38px;">
		<div class="row">
			<?php
			$i=0;
				foreach ($ngo_notification as $value) {
			?>
			<div class="col-lg-12">
				
				<div>
					<input type="hidden" name="notification_id" class="notification_id"  value="<?php echo $value->notification_id;?>">
					<input type="hidden" name="org_id" class="org_id"  value="<?php echo $value->org_id;?>">
					<input type="hidden" name="org_task_id" class="org_task_id"  value="<?php echo $value->org_task_id;?>">
					<input type="hidden" name="ngo_id" class="ngo_id"  value="<?php echo $value->ngo_id;?>">
					<input type="hidden" name="superngo_id" class="superngo_id"  value="<?php echo $value->superngo_id;?>">
					<input type="hidden" name="project_id" class="project_id"  value="<?php echo $value->project_id;?>">
					<input type="hidden" name="document_type" class="document_type"  value="<?php echo $value->document_type;?>">
					<div class="callout callout-info">
						<h4><?php echo $value->title;?></h4>
						<p>Created Date:(<?php echo  date_formats(date('Y-m-d'));?> / <?php 
						$d=$value->created_date.' '.$value->created_time;
						//var_dump($d);
						echo time_elapsed_string($d); ?>) </p><hr>
						<pre class="color_white"><?php echo $value->description;?></pre><hr>
						<button type="button"  class="btn btn-default btn-sm  send_notification_by_ngo_doc_resolved">Mark as Resolved</button>
					</div>
				</div>
			</div>
			<?php }?>
		</div>
	</div>
	<?php } ?>
						
	
	<div class="content">
		<div class="row">
			<div class="col-lg-12">
				<div id="head_ngo_review"></div>
			</div>
		</div>
		
		<div class="box  box-primary collapsed-box">
		
			<div class="box-header with-border" data-widget="collapse">
				<i class="fa btn btn-box-tool fa_plus fa-plus"></i>
				<h3 class="box-title">NGO Details</h3>
			</div>
			
			<div class="box-body">
				
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right">Name</label>
					<div class="col-md-9"> 
					<a href=" JavaScript:void <?php echo base_url() ?>ngo/detail?id=<?php if($ngo_data){ echo $ngo_data[0]->id;} ?>"><?php if($ngo_data){ echo $ngo_data[0]->legal_name;} ?></a>
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

	
	
	<div class="content" >
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
						<a href=" JavaScript:void <?php echo base_url();?>organisation/proposals/details?id=<?php if($project_list){ echo $project_list[0]['prop_id']; }?>"> <?php if($prop_data){ echo $prop_data[0]->title;} ?></a>
						<!--<span class=""><?php //var_dump($project_list[0]); ?></span>-->
					</div>
				</div>
				<h5>Focus Area : </h5>
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right">Category</label>
					<div class="col-md-9"> 
						<span class="is_edit_hide"><?php if($prop_data){ echo $prop_data[0]->admin_category ;}?></span>
					</div>
				</div>
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right">Sub category</label>
					<div class="col-md-9"> 
						<span class="is_edit_hide"><?php if($prop_data){ echo $prop_data[0]->admin_subcategory;} ?></span>
					</div>
				</div>
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right">Focus Category</label>
					<div class="col-md-9"> 
						<span class="is_edit_hide"><?php if($prop_data){ echo $prop_data[0]->category_input;} ?></span>
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
								<td><span ><?php if($prop_data){ echo $prop_data[0]->region; }?></span></td>
								<td><span ><?php if($prop_data){ echo $prop_data[0]->benficial_cat;} ?></span></td>
								<td><span ><?php if($prop_data){ echo $prop_data[0]->age_group;} ?></span></td>
								<td><span ><?php if($prop_data){ echo $prop_data[0]->target_group;} ?></span></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right">Geographies</label>
					<div class="col-md-9"> 
						<span class="is_edit_hide"><?php if($prop_data){ echo $prop_data[0]->geo_location_values;} ?></span>
					</div>
				</div>
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right">Start Date</label>
					<div class="col-md-9"> 
						<span class="is_edit_hide"><?php if($prop_data){ if($prop_data[0]->start_date && $prop_data[0]->start_date !='0000-00-00'){ echo date_formats($prop_data[0]->start_date);} }?></span>
					</div>
				</div>
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right">End Date</label>
					<div class="col-md-9"> 
						<span class="is_edit_hide"><?php if($prop_data){ if($prop_data[0]->end_date && $prop_data[0]->end_date !='0000-00-00'){ echo date_formats($prop_data[0]->end_date); }}?></span>
					</div>
				</div>
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right">Local Address</label>
					<div class="col-md-9"> 
						<?php
						if($prop_data[0]->registration_detail){
						$registration_city='';
						$registration_pin_code='';
						$registration_state='';
						$registration_detail = json_decode($prop_data[0]->registration_detail);
							$registration_city = $registration_detail[0]->registration_city;
							$registration_pin_code = $registration_detail[0]->registration_pin_code;
							$registration_state = $registration_detail[0]->registration_state;
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
						<span class="is_edit_hide"><?php if($prop_data){ echo $prop_data[0]->full_name;} ?></span>
					</div>
				</div>
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right">Designation</label>
					<div class="col-md-9"> 
						<span class="is_edit_hide"><?php if($prop_data){ echo $prop_data[0]->designation;} ?></span>
					</div>
				</div>
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right">Email Address</label>
					<div class="col-md-9"> 
						<span class="is_edit_hide"><?php if($prop_data){ echo $prop_data[0]->email_address;} ?></span>
					</div>
				</div>
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right">Contact Number</label>
					<div class="col-md-9"> 
						<span class="is_edit_hide"><?php if($prop_data){ echo $prop_data[0]->contact_no;} ?></span>
					</div>
				</div>
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right">Executive Summary</label>
					<div class="col-md-9"> 
						<span class="is_edit_hide"><?php if($prop_data){ echo $prop_data[0]->project_summary_proposal;} ?></span>
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
	
	
	<div class="content">		
		<div class="box  box-primary collapsed-box">
			<div class="box-header with-border" data-widget="collapse">
				<i class="fa btn btn-box-tool fa_plus fa-plus"></i>
				<h3 class="box-title">Project Details</h3>
			</div>
			<!--<a href="http://localhost/csr/ngo/project/edit_project?id=<?php echo $project_list[0]['id'];?>" class="btn btn-default pull-right edit_click">Edit</a>-->
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
						<span class="is_edit_hide"><?php ?></span>
					</div>
				</div>
				<?php //var_dump($org_tasks_data) ;?>
				<h5 class="box-title">Current Task</h5>
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right">Name</label>
					<div class="col-md-9"> 
						<span class="is_edit_hide"><?php if($org_tasks_data){ echo $org_tasks_data[0]->org_task_label;} ?></span>
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
				<!--<div class="form-group row">
					<a href="<?php echo base_url() ?>organisation/tasks/detail?id=<?php if($org_tasks_data){ echo $org_tasks_data[0]->org_task_id;} ?>&sourse=tasks" class="col-md-3 text-right">Go to task</a>
				</div>-->
				<?php }?>
			</div>	
		</div>
	</div>	
	
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
								<th class="text-center">Legal Name</th>
												
								
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
	</div>
	<div class="content">
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
					
					<label for="organisation_id" class="col-md-3 text-right"><span style="margin-right: 5px;"><?php echo $j ?> ) </span><?php echo $value->document_name; ?></label>
					<div class="col-md-9"> 
						<span class="is_edit_hide"><?php echo $value->document_value_actual; ?></span>
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
					
					<label for="organisation_id" class="col-md-3 text-right"><span style="margin-right: 5px;"><?php echo $i ?> ) </span><?php echo $value->document_name; ?></label>
					<div class="col-md-9"> 
						<span class="is_edit_hide"><?php echo $value->document_value_actual; ?></span>
					</div>
					
				</div>
				<?php }}
					?>
			</div>
		</div>
	</div> 
	
	
<div class="modal fade" id="submitConformModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
        <h4 class="modal-title" id="myModalLabel"> Are you sure you want to mark this notification as resolved?</h4>
      </div>
      <div class="modal-body">
		<h5 id="org_name"></h5>
      </div>
		<div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<input type="hidden" name"a" id="org_id_set" value="">
				<input type="hidden" name"a" id="notification_id_set" value="">
				<input type="hidden" name"a" id="org_task_id_set" value="">
				<input type="hidden" name"a" id="document_type_set" value="">
				<input type="hidden" name"a" id="ngo_id_set" value="">
				<input type="hidden" name"a" id="superngo_id_set" value="">
				<input type="hidden" name"a" id="project_id_set" value="">
				<button type="button" class="btn btn-primary resolved_submit">Resolve</button>
			</div>
		</div>
    </div>
  </div>
</div>

<script>
$('document').ready(function(){

	//------------------------------------------------------------------------
    /*
     * This script is used to fill modal for edit category
     */
    $('body').on('click','.send_notification_by_ngo_doc_resolved', function () {
		var is_error='no';
		var notification_id = $(this).parent().parent().find('.notification_id').val();
		var org_task_id = $(this).parent().parent().find('.org_task_id').val();
		var document_type = $(this).parent().parent().find('.document_type').val();
		var org_id = $(this).parent().parent().find('.org_id').val();
		var superngo_id = $(this).parent().parent().find('.superngo_id').val();
		var ngo_id = $(this).parent().parent().find('.ngo_id').val();
		var project_id = $(this).parent().parent().find('.project_id').val();
		console.log(ngo_id);
		$('#org_id_set').val(org_id);
		$('#notification_id_set').val(notification_id);
		$('#org_task_id_set').val(org_task_id);
		$('#document_type_set').val(document_type);
		$('#ngo_id_set').val(ngo_id);
		$('#superngo_id_set').val(superngo_id);
		$('#project_id_set').val(project_id);
		console.log(org_task_id);
		console.log(notification_id);
		
			$.post(APP_URL + 'ngo/project/get_org_name', {
					org_id,
				}, 
				
				function (response) {
					$('#org_name').text(response.org_name);
					
				},'json');
				$('#submitConformModal').modal('show');
				
		return false;
		
	});

	$('body').on('click','.resolved_submit', function () {
		var is_error='no';
		var notification_id_send = $(this).parent().find('#notification_id_set').val();
		var org_task_id_send = $(this).parent().find('#org_task_id_set').val();
		var document_type_send = $(this).parent().find('#document_type_set').val();
		var org_id_send = $(this).parent().find('#org_id_set').val();
		var ngo_id_send = $(this).parent().find('#ngo_id_set').val();
		var superngo_id_send = $(this).parent().find('#superngo_id_set').val();
		var project_id_send = $(this).parent().find('#project_id_set').val();
			console.log(notification_id_send);
			console.log(org_id_send);
			
			if(is_error=='no'){	
				$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
				$.post(APP_URL + 'ngo/project/resolved_submit', {
					notification_id_send: notification_id_send,
					org_task_id_send: org_task_id_send,
					document_type_send: document_type_send,
					org_id_send: org_id_send,
					ngo_id_send: ngo_id_send,
					superngo_id_send: superngo_id_send,
					project_id_send: project_id_send,
								
				},
				function (response) {
					$.unblockUI();
					$('#head_ngo_review').empty();
					if (response.status == 200) {
						$('#submitConformModal').modal('hide');
						var message = response.message;
						$("html, body").animate({scrollTop: 0}, "slow");               
						$('#head_ngo_review').html("<div class='alert alert-success fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
						$("#head_ngo_review").fadeTo(2000, 500).slideUp(500, function(){
							$('#head_ngo_review').empty();
							window.location.reload();
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
		
	});
	
});
</script>

