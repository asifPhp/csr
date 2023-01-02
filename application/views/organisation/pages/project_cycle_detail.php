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

<div class="content-wrapper animated fadeInRight">
	<section class="content-header">
        <h1>
			Detail of Cycle
			<small></small>
        </h1>
    </section>
	
	<div class="content">
		<div class="row">
			<div class="col-lg-12">
				<div class="box  box-primary ">
					<div class="box-header with-border" data-widget="collapse">
						<i class="fa btn btn-box-tool fa_plus fa-minus"></i>
						<h3 class="box-title">Cycle Details</h3>
					</div>
					<div class="box-body">
							<?php //var_dump($project_cycle_data); ?>
							<input type="hidden" class="form-control" id="project_cycle_id" value="<?php echo $project_cycle_data[0]['project_cycle_id'] ?>">
							
							<div id="headerMsg"></div>
							<div class="form-group row">
								<label for="project_cycle_data" class="col-md-3 text-right">Project Title</label>
								<div class="col-md-9"> 
									<!--<a href="<?php //echo base_url();?>ngo/proposals/edit?id=<?php //echo $project_list[0]['prop_id']; ?>"> <?php //echo $prop_data[0]->title ?></a>-->
									<span class="is_edit_hide"><?php if($project_data){ echo $project_data[0]->title;} ?></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="project_cycle_data" class="col-md-3 text-right">Cycle Number</label>
								<div class="col-md-9"> 
									<span class="is_edit_hide"><?php echo $project_cycle_data[0]['no_of_cycle'];?></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="project_cycle_data" class="col-md-3 text-right">Status</label>
								<div class="col-md-9"> 
									<span class="is_edit_hide label " style="background-color: <?php if($project_cycle_data){ echo constant('STATUS_'.$project_cycle_data[0]['cycle_status']);} ?> !important;"><?php if($project_cycle_data){ echo $project_cycle_data[0]['cycle_status'] ;} ?></span>
								</div>
							</div>
							
							<!--<h5 class="box-title">Cycle Details</h5>-->
							<div class="form-group row">
								<label for="project_cycle_data" class="col-md-3 text-right">Cycle Name</label>
								<div class="col-md-9"> 
									<span class="is_edit_hide"><?php if($project_cycle_data){ echo $project_cycle_data[0]['cycle_name'];} ?></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="project_cycle_data" class="col-md-3 text-right">Date this cycle ENDS</label>
								<div class="col-md-9"> 
									<span class="is_edit_hide"><?php if($project_cycle_data){  echo date_formats($project_cycle_data[0]['cycle_end_date2']);} ?></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="project_cycle_data" class="col-md-3 text-right">Does this cycle involve a payment?</label>
								<div class="col-md-9"> 
									<span class="is_edit_hide"><?php if($project_cycle_data){  echo ucfirst($project_cycle_data[0]['is_payment']);} ?></span>
								</div>
							</div>
							
							
							
							<div class="form-group row">
								<label for="project_cycle_data" class="col-md-3 text-right">Project Assessment Documents required from the NGO for this cycle</label>
							</div>
							<?php if($ngo_doc_data){
									$i=0;
									foreach($ngo_doc_data as $value){ $i++;
							?>	
										<div class="form-group row">
											<label for="project_cycle_data" class="col-md-3 text-right"><?php echo $i ?>)&nbsp; <?php echo $value->document_name ?></label>
											<div class="col-md-9"> 
												<a target = '_blank' href="<?php echo base_url();?>uploads/<?php echo $value->document_value ?>"><?php echo $value->document_value_actual ?></a>
											</div>
										</div>
							<?php	}
								}
							?>
							<div class="form-group row">
								<label for="project_cycle_data" class="col-md-3 text-right">Documents to be provided by us</label>
							</div>
							<?php if($csr_doc_data){
									$i=0;
									foreach($csr_doc_data as $value){ $i++;
							?>	
										<div class="form-group row">
											<label for="project_cycle_data" class="col-md-3 text-right"><?php echo $i ?>)&nbsp; <?php echo $value->document_name ?></label>
											<div class="col-md-9"> 
												<a target = '_blank' href="<?php echo base_url();?>uploads/<?php echo $value->document_value ?>"><?php echo $value->document_value_actual ?></a>
											</div>
										</div>
							<?php	}
								}
							?>
							
							<!--<div class="form-group row">
								<label for="project_cycle_data" class="col-md-3 text-right">Payment Proof</label>
								<div class="col-md-9"> 
									tbd
								</div>
							</div>-->
							
							<?php	
								if($project_cycle_data){ 
								if($project_cycle_data[0]['is_completed'] == 'no'){
							?>
							<?php if($org_tasks_data){ ?>
							<div class="form-group row">
								<a class="col-md-3 text-right" href="<?php echo base_url();?>/organisation/project/edit_project_cycle_creation?id=<?php if($org_tasks_data){ echo $org_tasks_data[0]->org_task_id ;}?>">Edit Cycle</a>
							</div>
							<?php	
								}
							?>
							<?php	
								}}
							?>
					</div> 
				</div>
				
				<div class="box  box-primary collapsed-box">
					<div class="box-header with-border" data-widget="collapse">
						<i class="fa btn btn-box-tool fa_plus fa-plus"></i>
						<h3 class="box-title">Current Task</h3>
					</div>
					<div class="box-body">	
						<div class="form-group row">
							<label for="organisation_id" class="col-md-3 text-right">Cycle Name</label>
							<div class="col-md-9"> 
								<span class="is_edit_hide"><?php if($org_tasks_data){ echo $org_tasks_data[0]->org_task_label;} ?></span>
							</div>
						</div>
						
						<div class="form-group row">
							<label for="organisation_id" class="col-md-3 text-right">Assignee</label>
							<div class="col-md-9"> 
								<span class="is_edit_hide"><?php echo $assigned_to ?></span>
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
						
						<?php } ?>
					</div>
				</div>
				
				<?php  
				//var_dump($project_cycle_data);
					$is_payment=$project_cycle_data[0]['is_payment'];
					
					if($is_payment=='yes'){
						
				?>
				<div class="box  box-primary collapsed-box">
					<div class="box-header with-border" data-widget="collapse">
						<i class="fa btn btn-box-tool fa_plus fa-plus"></i>
						<h3 class="box-title">Payment Details</h3>
					</div>
					<div class="box-body">	
						<div class="form-group row">
							<label for="project_cycle_data" class="col-md-3 text-right">Payment 80G Receipt</label>
							<div class="col-md-9"> 
								tbd
							</div>
						</div>
						
						<div class="form-group row">
							<label for="title" class="col-md-3 text-right">Donor:</label>
							<div class="col-md-9"> 
								<div class="table-responsive">
									<table id="blog_view_table" class=" table table-striped table-bordered table-hover" >
										<thead>
											<tr>
												<th class="text-center">Donor</th>
												<th class="text-center">Amount</th>
												<th class="text-center">NGO Payment Documents</th>
												<th class="text-center">Payment Proof</th>
											</tr>
										</thead>
										<tbody class="table_value">
											<?php if(!$cycle_document_donor_data){?>
												<td class="text-center" colspan="5" >No data Available</td>
											<?php }
												if($cycle_document_donor_data and $cycle_document_donor_data>0){
													foreach($cycle_document_donor_data as $cycle_donor_row){
													//var_dump($cycle_donor_row);
												?>
												<tr>
													<td  class="text-center"><?php echo $cycle_donor_row->donor_dropdown;?></td>
													<td  class="text-center"><i class="fa fa-inr" aria-hidden="true"></i><?php echo $cycle_donor_row->cycle_donor_amount;?></td>
													<td  class="text-center"><?php echo $cycle_donor_row->ngo_payment;?></td>
													<td  class="text-center"><a  href="<?php echo base_url()?>uploads/<?php echo $cycle_donor_row->payment_proof;?>"  target="_blank"><?php echo $cycle_donor_row->payment_proof_actual;?></a></td>
												</tr>	
																								
												<?php } }?>
											
										</tbody>
									</table>
								</div>
							</div>
						</div>	
					</div>	
				</div>	
						<?php }?>
						
				
				
				
			</div>
		</div>
	</div>
	
</div>
<?php 
    $data['sub_folder_name']="";
    $data['image_cat']="entity";
    $this->load->view('file_upload',$data);?>
<script>
$('document').ready(function(){

	//------------------------------------------------------------------------
    /*
     * This script is used to fill modal for edit category
     */
    
	
	$('body').on('click','#submit_cycle_details', function () {
		
		var project_cycle_id = $('#project_cycle_id').val();
		var ngo_payment_actual = $('#ngo_payment_actual').val();
		var payment_proof_actual = $('#payment_proof_actual').val();
		var ngo_payment = $('#ngo_payment').val();
		var payment_proof = $('#payment_proof').val();
		
		$.post(APP_URL + 'ngo/project/update_cycle_data', {
			ngo_payment: ngo_payment,
			payment_proof: payment_proof,
			payment_proof_actual: payment_proof_actual,
			ngo_payment_actual: ngo_payment_actual,
			project_cycle_id: project_cycle_id,
        },
		function(response) {
			$('#head_ngo_review').empty();
			if (response.status == 200) {
				$.toaster({
					priority: 'success',
					message: 'Saved'
				});
				$("html, body").animate({
					scrollTop: 0
				}, "slow");
				$('#head_ngo_review').html("<div class='alert alert-success fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
				$("#head_ngo_review").fadeTo(2000, 500).slideUp(500, function() {
					$('#head_ngo_review').empty();
					//window.location.href=APP_URL+"organisation/tasks/mytasks";
				});
			} else {
				$('#head_ngo_review').html("<div class='alert alert-danger fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
				$("#head_ngo_review").fadeTo(2000, 500).slideUp(500, function() {
					$('#head_ngo_review').empty();
				});
			}

		}, 'json');
		return false;
	
	});
});
</script>

