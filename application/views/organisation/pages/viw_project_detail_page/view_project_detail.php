<style>
.marBot20{
	margin-bottom:20px;
}

.edit_click{
	margin-top: -40px;
    margin-right: 35px;
    z-index: 999;
    position: relative;
}

	
</style>
<?php
if($sql_query){
	$project_list = $this->db->query($sql_query)->result_array();
	//var_dump($project_list);
	//var_dump($focal_point);
}
if($sql_query1){
	$project__cycle_list = $this->db->query($sql_query1)->result_array();
	//var_dump($project__cycle_list);
	//var_dump($prop_data);
}
?>
	
		
		
		
		<div class="box  box-primary collapsed-box">
			<div class="box-header with-border" data-widget="collapse">
				<i class="fa btn btn-box-tool fa_plus fa-plus"></i>
				<h3 class="box-title">Project Details</h3>
			</div>
			<?php if($edit_button_hide=='no'){?>
				<a href="<?php echo base_url();?>organisation/project/edit_project?id=<?php echo $project_list[0]['id'];?>" class="btn btn-default pull-right edit_click">Edit</a>
			<?php }?>
			<div class="box-body">
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right">Project ID</label>
					<div class="col-md-9"> 
						<span class="is_edit_hide"><?php if($project_list){ echo $project_list[0]['new_project_id'];} ?></span>
					</div>
				</div>
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right">Project Title</label>
					<div class="col-md-9"> 
						<span class="is_edit_hide"><?php if($project_list){ echo $project_list[0]['title'];} ?></span>
					</div>
				</div>
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right">NGO</label>
					<div class="col-md-9"> 
						<a href="<?php echo base_url() ?>organisation/ngo/detail?id=<?php if($project_ngo_data){ echo $project_ngo_data[0]->id;} ?>"><?php if($project_ngo_data){ echo $project_ngo_data[0]->legal_name;} ?></a>
					</div>
				</div>
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right">NGO Parent Brand</label>
					<div class="col-md-9"> 
						<span class="is_edit_hide"><?php if($project_superngo_data){ echo $project_superngo_data[0]['brand_name'];} ?></span>
					</div>
				</div>
				
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right">Status</label>
					<div class="col-md-9"> 
						<span class="is_edit_hide label " style="background-color: <?php echo constant('STATUS_'.$project_list[0]['project_status']);?> !important;"><?php echo $project_list[0]['project_status']; ?></span>
					</div>
				</div>
				
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right">Project Duration</label>
					<div class="col-md-9"> 
						<span class="is_edit_hide">
						<?php 
							if($project_list){ 
								$project_start_date= $project_list[0]['project_start_date']; 
								$project_end_date=$project_list[0]['project_end_date'];
								if($project_start_date and $project_end_date){
									$start_date1=strtotime($project_start_date);
									$end_date1=strtotime($project_end_date);
									
									$year1 = date('Y', $start_date1);
									$year2 = date('Y', $end_date1);

									$month1 = date('m', $start_date1);
									$month2 = date('m', $end_date1);
									
									$diff = (($year2 - $year1) * 12) + ($month2 - $month1);
									$diff_year = ($year2 - $year1); 
									$diff_month= ($month2 - $month1);
									//var_dump($diff_year);
									//var_dump($diff_month);
									echo $diff_month .' months '.$diff_year.' yrs';
									/*if($diff_year and $diff_month ){
										//echo $diff_month .' months.';
										echo $diff_year.' yrs  '.$diff_month .' months.';
									}else if($diff_year!=0){
										echo $diff_year .' yrs.';
									}else if($diff_month!=0){
										echo $diff_month .' months.';
									}else if($diff_month==0){
										echo $diff_month .' months.';
									}*/
								
								}
							 } 
						?>
						</span>
					</div>
				</div>
				
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right">Start Date</label>
					<div class="col-md-9"> 
						<span class="is_edit_hide"><?php if($project_list){ if($project_list[0]['project_start_date']){ echo date_formats($project_list[0]['project_start_date']);}else{}} ?></span>
					</div>
				</div>
				
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right">End Date</label>
					<div class="col-md-9"> 
						<span class="is_edit_hide"><?php if($project_list){ if($project_list[0]['project_end_date']) {echo date_formats($project_list[0]['project_end_date']);}else{}} ?></span>
					</div>
				</div>
				
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right">Focal Point</label>
					<div class="col-md-9"> 
						<span class="is_edit_hide">
						<?php 
							$focal_point='';
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
							
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right">Approver</label>
					<div class="col-md-9"> 
						<span class="is_edit_hide">
						<?php 
						$approver='';
							$org_id = $this->session->userdata('org_id');
							$ngo_id=$project_list[0]['ngo_id'];
							$sql23 = "SELECT staff_id FROM org_assigner_mgmt WHERE ngo_id=$ngo_id and org_id=$org_id and user_type='project approver'" ;
							$result23 = $this->db->query($sql23)->result_array();
							if($result23){
								$staff_id_data=$result23[0]['staff_id'];
								$sql23 = "SELECT first_name,last_name FROM org_staff_account WHERE `staff_id`=$staff_id_data " ;
									$result23 = $this->db->query($sql23)->result_array();
									if($result23){
										$first_name = $result23[0]['first_name'];
										$last_name = $result23[0]['last_name'];
										$approver=$first_name .' '.$last_name;
										echo $approver;
									}
							}
						?>
						
						</span>
					</div>
				</div>
				
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right">Checker</label>
					<div class="col-md-9"> 
						<span class="is_edit_hide">
						<?php 
							$checker='';
							$org_id = $this->session->userdata('org_id');
							$ngo_id=$project_list[0]['ngo_id'];
							$sql23 = "SELECT staff_id FROM org_assigner_mgmt WHERE ngo_id=$ngo_id and org_id=$org_id and user_type='project checker'" ;
							$result23 = $this->db->query($sql23)->result_array();
							if($result23){
								$staff_id_data=$result23[0]['staff_id'];
								$sql23 = "SELECT first_name,last_name FROM org_staff_account WHERE `staff_id`=$staff_id_data " ;
									$result23 = $this->db->query($sql23)->result_array();
									if($result23){
										$first_name = $result23[0]['first_name'];
										$last_name = $result23[0]['last_name'];
										$checker=$first_name .' '.$last_name;
										echo $checker;
									}
							}
						?>
						
						</span>
					</div>
				</div>
				
				<h5>NGO Contact Details</h5>
				
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right">Name</label>
					<div class="col-md-9"> 
						<span class="is_edit_hide"><?php if($prop_data){ if($prop_data[0]['full_name']){echo $prop_data[0]['full_name'];}} ?></span>
					</div>
				</div>
				
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right">Designation</label>
					<div class="col-md-9"> 
						<span class="is_edit_hide"><?php if($prop_data){ if($prop_data[0]['designation']){echo $prop_data[0]['designation'];}} ?></span>
					</div>
				</div>
				
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right">Email Address</label>
					<div class="col-md-9"> 
						<span class="is_edit_hide"><?php if($prop_data){ if($prop_data[0]['email_address']){echo $prop_data[0]['email_address'];}} ?></span>
					</div>
				</div>
				
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right">Contact Number</label>
					<div class="col-md-9"> 
						<span class="is_edit_hide"><?php if($prop_data){ if($prop_data[0]['contact_no']){echo $prop_data[0]['contact_no'];}} ?></span>
					</div>
				</div>
			
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right">Upload Signed MOU for this project</label>
					<div class="col-md-9"> 
						<a  href="<?php echo base_url()?>uploads/<?php if($project_list){ echo $project_list[0]['cycle_file_upload'];}?>"  target="_blank"><?php if($project_list){ echo $project_list[0]['cycle_file_upload_actual'];}?></a>
						<a project_id="<?php if($project_list){ echo $project_list[0]['id'];}?>" uploaded_type="mou"  href="javascript:void(0);" data-toggle="modal" data-target="#view_mou_and_aproval_popup" class="label label-warning view_mou_and_aproval_popup ">View MOU History</a>
					</div>
				</div>
				
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right">Upload final signed approval sheet</label>
					<div class="col-md-9"> 
						<a  href="<?php echo base_url()?>uploads/<?php if($project_list){ echo $project_list[0]['board_review_upload'];}?>"  target="_blank"><?php if($project_list){ echo $project_list[0]['board_review_upload_actual'];}?></a>
						<a project_id="<?php if($project_list){ echo $project_list[0]['id'];}?>" uploaded_type="approval"  href="javascript:void(0);" data-toggle="modal" data-target="#view_mou_and_aproval_popup" class="label label-warning view_mou_and_aproval_popup ">View Approval History</a>
					</div>
				</div>
				
			</div>	
		</div>
		
		
		
		<!--<div class="box  box-primary collapsed-box">
			<div class="box-header with-border" data-widget="collapse">
				<i class="fa btn btn-box-tool fa_plus fa-plus"></i>
				<h3 class="box-title">Current Task</h3>
			</div>
			<div class="box-body">
				<?php //var_dump($org_tasks_data) ;?>
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
				<div class="form-group row">
					<a href="<?php echo base_url() ?>organisation/tasks/detail?id=<?php if($org_tasks_data){ echo $org_tasks_data[0]->org_task_id;} ?>&sourse=tasks" class="col-md-3 text-right">Go to task</a>
				</div>
				<?php }?>
				
			</div>
		</div>-->
		
	<!---------------------------- Edit Modal for Browse Change Status-------------------------->
	<div class="modal fade" id="view_mou_and_aproval_popup" tabindex="-1" course_package="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content" >
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h3 id="header_view"></h3>
				</div> 
				<div class="modal-body row">
					<div class="form-group col-md-12">
						<label class="control-label col-md-4" >Uploaded Date</label>
						<label class="control-label col-md-8" >Uploaded File</label>
					</div>
					<div id="view_mou_and_aproval_popup_id" >
								
						
					</div>
								
				</div>
			</div>
		</div>
	</div>	
		
		
		
		
<script>
$('document').ready(function(){		
	$('body').on('click', '.goto_task', function (e) {
		var task_id = $('#task_id').val();
		console.log(task_id);
		var url = APP_URL+"organisation/tasks/detail?id="+task_id+'&sourse=tasks';
		console.log(url);
		window.location.href=url;
	});	

	


	 $('body').on('click', '.view_mou_and_aproval_popup', function () {	
		var project_id=$(this).attr('project_id');
		var uploaded_type=$(this).attr('uploaded_type');
		console.log(project_id);
		console.log(uploaded_type);
		
		$.post(APP_URL + 'organisation/project/get_view_mou_and_aproval_history', {
			project_id:project_id,
			uploaded_type:uploaded_type,
			
		}, function (response) {
			if (response.status == 200) {
					var return_data = response.return_data;
					console.log(return_data);
					if(return_data){
						var i=0;
						var content='';
						var file_type='';
						$(return_data).each (function(key,val){
							console.log("val");
							console.log(val);
							i++;
							var project_id=val.project_id;
							var uploaded_datetime=val.uploaded_datetime;
							var uploaded_file=val.uploaded_file;
							var uploaded_file_actual=val.uploaded_file_actual;
							var uploaded_type=val.uploaded_type;
							if(uploaded_type=='mou'){
								file_type='View MOU History';
							}
							if(uploaded_type=='approval'){
								file_type='View Approval History';
							}
							var uploaded_datetime=($.datepicker.formatDate("d M y", new Date(uploaded_datetime)));
							content+='<div class="form-group col-md-12">';
							content+='<span class="control-label col-md-4" >'+uploaded_datetime+'</span>';
							content+='<div class="col-md-4">';
							content+='<a  href="'+APP_URL+'uploads/'+uploaded_file+'"  target="_blank">'+uploaded_file_actual+'</a>';
							content+='</div>';
							content+='</div>';
							
						});
						
						$("#header_view").empty(file_type);
						$("#header_view").append(file_type);
						$("#view_mou_and_aproval_popup_id").empty(content);
						$("#view_mou_and_aproval_popup_id").append(content);
						
						
					}
					
			} else {
				
			}
			
		}, 'json');
	});	
});
</script>			
		
				
	

