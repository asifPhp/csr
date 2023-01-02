<style>
.marBot20{
	margin-bottom:20px;
}
.checkbox{margin-left: 15px;}

.fa_plus{
	float: right;
	font-size: 12px !important;
}
.edit_click{
	margin-top: -40px;
    margin-right: 35px;
    z-index: 999;
    position: relative;
}
.incomplete_status{ height: 21px;
    float: right;
    margin-right: 70px;
    font-size: 13px;}
	
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper entity_content_wrapper">

	
	<?php
	$page_heading = '';
    $heading = '';
   
	//var_dump($entity_data);
	if($entity_data){

        $heading = 'Edit Entity';
		$entity_id =$entity_data['id']; 
		$legal_name =$entity_data['legal_name'];  
        $website =$entity_data['website'];  
        $code =$entity_data['code']; 
        $is_readonly="readOnly" ;
		$brand_name=$entity_data['brand_name'];
		
		$page_heading = $legal_name .' - '.$code;
		$operation_nature=$entity_data['operation_nature'];
		//$category=$entity_data['category_array'];
		//$category_detail=$entity_data['category_detail'];
		$geo_location=$entity_data['geo_location'];
		$city=$entity_data['city'];
		//$resource_management=$entity_data['resource_management'];
		$geographical_reach=$entity_data['geographical_reach'];
		$beneficiary_reach=$entity_data['beneficiary_reach'];
		$registration_number_12a=$entity_data['registration_number_12a'];
		$from_date_12a_valid=$entity_data['from_date_12a_valid'];
		$expire_date_12a_valid=$entity_data['expire_date_12a_valid'];
		$tax_exemption_percentage=$entity_data['tax_exemption_percentage'];
		$registration_number_80g=$entity_data['registration_number_80g'];
		$certificate_date_80G=$entity_data['certificate_date_80G'];
		$registration_80g_valid=$entity_data['registration_80g_valid'];
		$upload_80G_reg=$entity_data['upload_80G_reg'];
		//$income_tax_80g_proof=$entity_data['income_tax_80g_proof'];
		$tax_exemption_type=$entity_data['tax_exemption_type'];
		$pan_number=$entity_data['pan_number'];
		$tan_number=$entity_data['tan_number'];
		$epf_number=$entity_data['epf_number'];
		//$registration_type=$entity_data['registration_type'];
		$other_appropriate_certification_input=$entity_data['other_appropriate_certification_input'];
		$registration_detail=$entity_data['registration_detail'];
		//$registration_street_address=$entity_data['registration_street_address'];
		//$registration_state=$entity_data['registration_state'];
		//$registration_city=$entity_data['registration_city'];
		//$registration_pin_code=$entity_data['registration_pin_code'];
		//$Registration_Number=$entity_data['Registration_Number'];
		//$upload_registration_certificate=$entity_data['upload_registration_certificate'];
		$is_12a_certificate=$entity_data['is_12a_certificate'];
		$is_certificate_exist=$entity_data['is_certificate_exist'];
		$appropriate_certification=$entity_data['appropriate_certification'];
		
		$created_time=$entity_data['created_time'];
		$update_datetime=$entity_data['update_datetime'];
		
		$page1_validation_error=$entity_data['page1_validation_error'];
		$page2_validation_error=$entity_data['page2_validation_error'];
		$page3_validation_error=$entity_data['page3_validation_error'];
		$page4_validation_error=$entity_data['page4_validation_error'];
		$page5_validation_error=$entity_data['page5_validation_error'];
		$page6_validation_error=$entity_data['page6_validation_error'];
		//var_dump($page1_validation_error);
	}else{
		$page_heading = 'Setup/Create Entity';
        $heading = 'Add New Entity';
		$entity_id =0;
		$legal_name ='';
        $website ='';
        $code ='';
        $brand_name='';
        $is_readonly="";
		$operation_nature='';
		//$category='';
		//$category_detail='';
		$geo_location='';
		$city='';
		$geographical_reach='';
		$beneficiary_reach='';
		$registration_number_12a='';
		$from_date_12a_valid='';
		$expire_date_12a_valid='';
		$registration_detail='';
		//$registration_type='';
		//$resource_management='';
		$tax_exemption_percentage='';
		$registration_number_80g='';
		$certificate_date_80G='';
		$registration_80g_valid='';
		$upload_80G_reg='';
		//$income_tax_80g_proof='';
		$tax_exemption_type='';
		$pan_number='';
		$tan_number='';
		$epf_number='';
		$credibility_alliance_report='';
		$other_appropriate_certification_input='';
		//$registration_date='';
		//$registration_street_address='';
		//$registration_state='';
		//$registration_city='';
		//$registration_pin_code='';
		//$Registration_Number='';
		//$upload_registration_certificate='';
		$is_12a_certificate='';
		$is_certificate_exist='';
		$appropriate_certification='';
		
		$created_time='';
		$update_datetime='';
		
		$page1_validation_error='';
		$page2_validation_error='';
		$page3_validation_error='';
		$page4_validation_error='';
		$page5_validation_error='';
		$page6_validation_error='';
		
		
	}
	if($superngo_data){
		$brand_name=$superngo_data['brand_name'];
	}else{
		$brand_name='';
	}
	
	
	
	if($page_heading_disp=='yes'){	
	?>
    <section class="content-header">
        <?php if($is_permitted['is_list']){ if($back_ngo_list_button){
			if($back_ngo_list_button=='yes'){
			?>
				<a href="<?php echo base_url();?>organisation/ngo/listing" class="btn btn-default pull-right">Back to Ngo List</a>
			<?php }else{?>
				<a href="<?php echo base_url();?>ngo/entity/list" class="btn btn-default pull-right">Back to Entity List</a>
			<?php }}}?>
        <h1>
          <?php  echo $page_heading;?>
          <small></small>
        </h1>
    
    </section>
    <?php }?>
    <!-- Main content -->
    <section class="content entity_content">
        <div class="row">
			<?php if($ngo_notification){ $i=0;?>
			<div class="col-md-12">
				<?php
					foreach ($ngo_notification as $value) {
				?>
				<input type="hidden" name="notification_id" class="notification_id"  value="<?php echo $value->notification_id;?>">
				<input type="hidden" name="org_id" class="org_id"  value="<?php echo $value->org_id;?>">
				<input type="hidden" name="org_task_id" class="org_task_id"  value="<?php echo $value->org_task_id;?>">
				<input type="hidden" name="ngo_id" class="ngo_id"  value="<?php echo $value->ngo_id;?>">
				<input type="hidden" name="superngo_id" class="superngo_id"  value="<?php echo $value->superngo_id;?>">
				<input type="hidden" name="proposal_id" class="proposal_id"  value="<?php echo $value->proposal_id;?>">
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
			
				<?php } ?>
			</div>
			<?php } ?>
		
		
		
            <!-- left column -->
            <div class="<?php echo $page_col_md;?> margTop">
                <input type="hidden" class="form-control" id="entity_id" name="entity_id" value="<?php echo $entity_id;?>">
                <div id="err_add_plan"></div>
                <div id="headerMsg"></div>
                <!-- general form elements -->
                <div class="box box-primary collapsed-box">
                    <div class="box-header with-border" data-widget="collapse">
						<i class="fa fa-plus btn btn-box-tool fa_plus"></i>
						<h3 class="box-title">Basic Details</h3> 
						<?php if($edit_hide=='no'){ if($page1_validation_error){ if($page1_validation_error=='no'){ $page1_status='Complete';}else{ $page1_status='Incomplete';}}else{ $page1_status='Incomplete';}  echo '<span class="label incomplete_status" style="text-transform: capitalize;background-color: '.constant('STATUS_'.$page1_status).' !important;">' . $page1_status. '</span>';}?>
					</div>	
					
					<?php if($edit_hide=='no'){?>
					<a type="button" class="btn btn-default pull-right edit_click" href="<?php echo base_url() ?>ngo/entity/edit_page1?id=<?php echo $entity_id?>">	Edit</a>
					<?php }?>
					<!-- /.box-header -->
					<div class="box-body">
                        <form id="entity_step1_form" method="post" role="form">
                         <?php $this->load->view('ngo/pages/entity/edit_entity_page1'); ?>
							
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                <!-- general form elements -->
                <div class="box box-primary collapsed-box">
                    <div class="box-header with-border" data-widget="collapse">
						<i class="fa fa-plus btn btn-box-tool fa_plus"></i>
						<h3 class="box-title">Legal Details</h3>
						<?php if($edit_hide=='no'){ if($page2_validation_error){ if($page2_validation_error=='no'){ $page2_status='Complete';}else{ $page2_status='Incomplete';}}else{ $page2_status='Incomplete';}   echo '<span class="label incomplete_status" style="text-transform: capitalize;background-color: '.constant('STATUS_'.$page2_status).' !important;">' . $page2_status. '</span>';}?>
						
					</div>
					<?php if($edit_hide=='no'){?>
					<a type="button" class="btn btn-default pull-right edit_click" href="<?php echo base_url() ?>ngo/entity/edit_page2?id=<?php echo $entity_id?>">Edit</a>
					<?php }?>
                    <!-- /.box-header -->
					<div class="box-body">
                        <form id="entity_step2_form" method="post" role="form">
							<?php $this->load->view('ngo/pages/entity/edit_entity_page2'); ?>	   
							
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
				
				<div class="box box-primary collapsed-box">
                    <div class="box-header with-border" data-widget="collapse">
                        <i class="fa fa-plus btn btn-box-tool fa_plus"></i>
						<h3 class="box-title">Other Details</h3>
						<?php if($edit_hide=='no'){ if($page3_validation_error){ if($page3_validation_error=='no'){ $page3_status='Complete';}else{ $page3_status='Incomplete';}}else{ $page3_status='Incomplete';}   echo '<span class="label incomplete_status" style="text-transform: capitalize;background-color: '.constant('STATUS_'.$page3_status).' !important;">' . $page3_status. '</span>';}?>
						
					</div>
					<?php if($edit_hide=='no'){?>
					<a type="button" class="btn btn-default pull-right edit_click" href="<?php echo base_url() ?>ngo/entity/edit_page3?id=<?php echo $entity_id?>">Edit</a>
					<?php }?>
                    <!-- /.box-header -->
					<div class="box-body">
                        <form id="entity_step3_form" method="post" role="form">
                          <?php $this->load->view('ngo/pages/entity/edit_entity_page3'); ?>
							
                        </form>
                    </div>
                    <!-- /.box-body -->
				</div>
				
				<div class="box box-primary collapsed-box">
                    <div class="box-header with-border" data-widget="collapse">
						<i class="fa fa-plus btn btn-box-tool fa_plus"></i>
						<h3 class="box-title">Staff & Budget Details</h3>
						<?php if($edit_hide=='no'){ if($page4_validation_error){ if($page4_validation_error=='no'){ $page4_status='Complete';}else{ $page4_status='Incomplete';}}else{ $page4_status='Incomplete';}   echo '<span class="label incomplete_status" style="text-transform: capitalize;background-color: '.constant('STATUS_'.$page4_status).' !important;">' . $page4_status. '</span>';}?>
						
					</div>
					<?php if($edit_hide=='no'){?>
						<a type="button" class="btn btn-default pull-right edit_click" href="<?php echo base_url() ?>ngo/entity/edit_page4?id=<?php echo $entity_id?>">Edit</a>
					<?php }?>
                    <!-- /.box-header -->
					<div class="box-body">
                        <form id="entity_step4_form" method="post" role="form">
                         <?php $this->load->view('ngo/pages/entity/edit_entity_page4'); ?>
							
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
				
				<div class="box box-primary collapsed-box">
                    <div class="box-header with-border" data-widget="collapse">
						<i class="fa fa-plus btn btn-box-tool fa_plus"></i>
						<h3 class="box-title">Financial Details</h3>
						<?php if($edit_hide=='no'){ if($page5_validation_error){ if($page5_validation_error=='no'){ $page5_status='Complete';}else{ $page5_status='Incomplete';}}else{ $page5_status='Incomplete';}   echo '<span class="label incomplete_status" style="text-transform: capitalize;background-color: '.constant('STATUS_'.$page5_status).' !important;">' . $page5_status. '</span>';}?>
						
					</div>
					<?php if($edit_hide=='no'){?>
						<a type="button" class="btn btn-default pull-right edit_click" href="<?php echo base_url() ?>ngo/entity/edit_page5?id=<?php echo $entity_id?>">Edit</a>
					<?php }?>
                    <!-- /.box-header -->
					<div class="box-body">
                        <form id="entity_step5_form" method="post" role="form">
                         <?php $this->load->view('ngo/pages/entity/edit_entity_page5'); ?>
							
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
				
				<div class="box box-primary collapsed-box">
                    <div class="box-header with-border" data-widget="collapse">
                        <i class="fa fa-plus btn btn-box-tool fa_plus"></i>
						<h3 class="box-title">Organisation Policies & Other Documents</h3>
						<?php if($edit_hide=='no'){ if($page6_validation_error){ if($page6_validation_error=='no'){ $page6_status='Complete';}else{ $page6_status='Incomplete';}}else{ $page6_status='Incomplete';}   echo '<span class="label incomplete_status" style="text-transform: capitalize;background-color: '.constant('STATUS_'.$page6_status).' !important;">' . $page6_status. '</span>';}?>
						
					</div>
					<?php if($edit_hide=='no'){?>
						<a type="button" class="btn btn-default pull-right edit_click" href="<?php echo base_url() ?>ngo/entity/edit_page6?id=<?php echo $entity_id?>">Edit</a>
					<?php }?>
                    <!-- /.box-header -->
					<div class="box-body">
                        <form id="entity_step6_form" method="post" role="form">
                         <?php $this->load->view('ngo/pages/entity/edit_entity_page6'); ?>
							
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
			
			<?php
				
				if($page_splite=='yes'){?>
		<div class="<?php if($pro_ngo_hide=='yes'){ echo 'display_none';}?>">	
			<div class="<?php echo $page_col_md;?>">
                <input type="hidden" class="form-control" id="entity_id" name="entity_id" value="<?php echo $entity_id;?>">
                <div id="err_add_plan"></div>
                <div id="headerMsg"></div>
                <!-- general form elements -->
                <div class="box box-primary collapsed-box">
                    <div class="box-header with-border" data-widget="collapse">
						<i class="fa fa-plus btn btn-box-tool fa_plus"></i>
						<h3 class="box-title">NGO Entity Details
						<?php if($page3_validation_error){ if($page3_validation_error=='no'){ $page3_status='Complete';}else{ $page3_status='Incomplete';}}else{ $page3_status='Incomplete';}   echo '<span class="label" style="text-transform: capitalize;background-color: '.constant('STATUS_'.$page3_status).' !important;">' . $page3_status. '</span>';?>
						</h3>
					</div>
					<?php if($edit_hide=='no'){?>
					<a type="button" class="btn btn-default pull-right edit_click" href="<?php echo base_url() ?>ngo/entity/edit_page1?id=<?php echo $entity_id?>">	Edit</a>
				<?php }?>
				
					<!-- /.box-header -->
					<div class="box-body">
                       <div class="row">
							<label for="brand_name" class="col-md-4 text-right">Parent Brand:</label>
							<div class="col-md-8"> 
								<span class="is_edit_hide" ><?php echo $brand_name?></span>
							</div>
						</div>
						<div class="row">
						
							<label for="brand_name" class="col-md-4 text-right">Status:</label>
							<div class="col-md-8"> 
								<?php 
								if(isset($org_ngo_review_status_data)){	
									if($org_ngo_review_status_data){
								?>
								<span class="is_edit_hide label " style="background-color: <?php echo constant('STATUS_'.$org_ngo_review_status_data[0]['status']);?> !important;"><?php echo $org_ngo_review_status_data[0]['status']; ?></span>
								<?php }}?>
							</div>
						</div>
						<div class="row">
							<label for="brand_name" class="col-md-4 text-right">First Submitted On:</label>
							<div class="col-md-8"> 
								<span class="is_edit_hide" ><?php echo date_formats($created_time);?></span>
							</div>
						</div>
						<div class="row">
							<label for="brand_name" class="col-md-4 text-right">Last Updated On:</label>
							<div class="col-md-8"> 
								<span class="is_edit_hide" ><?php echo date_formats($update_datetime);?></span>
							</div>
						</div>
						<div class="row">
							<label for="brand_name" class="col-md-4 text-right">Focal Point:</label>
							<div class="col-md-8"> 
								<span class="is_edit_hide" >
								<?php 
								$org_id = $this->session->userdata('org_id');
								//$ngo_id=$value['ngo_id'];
								$sql23 = "SELECT staff_id FROM org_assigner_mgmt WHERE ngo_id=$entity_id and org_id=$org_id and user_type='normal'" ;
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
													
								
								
								
								
								
								?></span>
							</div>
						</div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                <!-- general form elements -->
               <?php if(isset($project_data)){?>
				 <div class="box box-primary collapsed-box">
                    <div class="box-header with-border" data-widget="collapse">
						<i class="fa fa-plus btn btn-box-tool fa_plus"></i>
						<h3 class="box-title">Projects</h3>
					</div>
					<div class="box-body">
					
						<div class="table-responsive">
							<table class=" table table-striped table-bordered table-hover" >
								<thead>
									<tr>
										
										<th class="text-center">Name</th>
										<th class="text-center">Start Date</th>
										<th class="text-center">Status</th>
										<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$content ='';
									if(isset($project_data)){ 	
										foreach ($project_data as  $value) {
											$content ='';
											//var_dump($value);
											$content .= '<a href="'.base_url().'organisation/project/detail?id='.$value['id'].'" class="edit_module"  name="' . $value['id'] . '" value=""><span class="label label-primary">View </span></a>&nbsp;';
									   
											echo '<tr>
													<td class="text-center">'.$value['title'].'</td>
													<td class="text-center">'.date_formats($value['created_time']).'</td>
													<td class="text-center">
														<span class="label" style="text-transform: capitalize;background-color: '.constant('STATUS_'.$value['project_status']).' !important;">' . $value['project_status'] . '</span>
													</td>
													<td class="text-center">'.$content.'</td>
												</tr>';
										}
									}else{
										$table_type_ = '';
										echo $content .= '<tr style="color: red;" class="darker-on-hover"><td class="text-center" colspan="10">No data Available</td></tr>';
									}
								?>
								</tbody>
							</table>
						</div>
					
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
			   <?php }?>
				<div class="box box-primary collapsed-box">
                    <div class="box-header with-border" data-widget="collapse">
						<i class="fa fa-plus btn btn-box-tool fa_plus"></i>
						<h3 class="box-title">Proposals</h3>
					</div>
					<div class="box-body">
                    
						<div class="table-responsive">
							<table class=" table table-striped table-bordered table-hover" >
								<thead>
									<tr>
										
										<th class="text-center">Name</th>
										<th class="text-center">Submitted On</th>
										<th class="text-center">Status</th>
										<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$content ='';
									if($proposal_data){
										foreach ($proposal_data as  $value) {
											$content ='';
											//var_dump($value);
											$content .= '<a href="'.base_url().'organisation/proposals/detail?id='.$value['prop_id'].'" class="edit_module"  name="' . $value['prop_id'] . '" value=""><span class="label label-primary">View Proposal</span></a>&nbsp;';
									   
											echo '<tr>
													<td class="text-center">'.$value['title'].'</td>
													<td class="text-center">'.date_formats($value['created_time']).'</td>
													<td class="text-center">
														<span class="label" style="text-transform: capitalize;background-color: '.constant('STATUS_'.$value['proposal_status']).' !important;">' . $value['proposal_status'] . '</span>
													</td>
													<td class="text-center">'.$content.'</td>
												</tr>';
										}
									}else{
										$table_type_ = '';
										echo $content .= '<tr style="color: red;" class="darker-on-hover"><td class="text-center" colspan="10">No data Available</td>';
									}
									?>
								</tbody>
							</table>
						</div>
					
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
                <!-- /.box -->
				
				
				
			</div>
			<?php }?>
			
			
			
			
        </div>
      </section>
	  
  </div>  
  
  <div class="modal fade" id="submitResolvedModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
        <h4 class="modal-title" id="myModalLabel"> Are you sure you want to mark this notification as resolved?</h4>
      </div>
      <div class="modal-body">
		<span>When you resolve this notification, </span><strong class="org_name" > </strong> 
			<span>will be informed of your updates. To prevent further issues, ONLY resolve this notification once you have completed the updates requested by </span>
			<strong class="org_name" > </strong>
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
				<input type="hidden" name"a" id="proposal_id_set" value="">
				<button type="hidden" class="btn btn-primary resolved_submit">Resolve</button>
			</div>
		</div>
    </div>
  </div>
</div>
  
<script>
$('document').ready(function(){

	$("body").on("click",".edit_click",function(){
        var this_data=$(this);
        this_data.parent().parent().find(".is_edit_hide").addClass("display_none");
        this_data.parent().parent().find(".is_edit_data").removeClass("display_none");
		
		
    });
	$('body').on('click','.send_notification_by_ngo_doc_resolved', function () {
		var is_error='no';
		var notification_id = $(this).parent().parent().find('.notification_id').val();
		var org_task_id = $(this).parent().parent().find('.org_task_id').val();
		var document_type = $(this).parent().parent().find('.document_type').val();
		var org_id = $(this).parent().parent().find('.org_id').val();
		var superngo_id = $(this).parent().parent().find('.superngo_id').val();
		var ngo_id = $(this).parent().parent().find('.ngo_id').val();
		var proposal_id = $(this).parent().parent().find('.proposal_id').val();
		console.log(proposal_id);
		$('#org_id_set').val(org_id);
		$('#notification_id_set').val(notification_id);
		$('#org_task_id_set').val(org_task_id);
		$('#document_type_set').val(document_type);
		$('#ngo_id_set').val(ngo_id);
		$('#superngo_id_set').val(superngo_id);
		$('#proposal_id_set').val(proposal_id);
		console.log(org_task_id);
		console.log(notification_id);
		
			$.post(APP_URL + 'ngo/project/get_org_name', {
					org_id,
				}, 
				
				function (response) {
					$('.org_name').text(response.org_name);
					
				},'json');
				$('#submitResolvedModal').modal('show');
				
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
		var proposal_id_send = $(this).parent().find('#proposal_id_set').val();
			console.log(notification_id_send);
			console.log(org_id_send);
			var entity_status_update='yes';
			if(is_error=='no'){	
				$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
				$.post(APP_URL + 'ngo/proposals/resolved_submit', {
					notification_id_send: notification_id_send,
					org_task_id_send: org_task_id_send,
					document_type_send: document_type_send,
					org_id_send: org_id_send,
					ngo_id_send: ngo_id_send,
					superngo_id_send: superngo_id_send,
					proposal_id_send: proposal_id_send,
					entity_status_update: entity_status_update,
								
				},
				function (response) {
					$.unblockUI();
					$('#head_ngo_review').empty();
					if (response.status == 200) {
						$('#submitResolvedModal').modal('hide');
						$.toaster({ priority :'success', message :'Resolve Notification Successfully'});
						setTimeout(function(){
							window.location.reload();
						},2000);

						//var message = response.message;
						//$("html, body").animate({scrollTop: 0}, "slow");               
						//$('#head_ngo_review').html("<div class='alert alert-success fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
						//$("#head_ngo_review").fadeTo(2000, 500).slideUp(500, function(){
							//$('#head_ngo_review').empty();
							
						//});
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
	
	
	
	
	
	$('#entity_step1_form').validate({
		ignore:[],
        rules: {
            website: {
                required: true,
            },
        },
        messages: {
            website: {
                required: "Website is required.",
            },
        },
        submitHandler: function (form) {
			//$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /> Just a moment...</h1>' });
			
            finail_entity_submit();
            return false;
        }
    });

    $('#entity_step2_form').validate({
        ignore:[],
        rules: {
            legal_name: {
                required: true,
            },
        },
        messages: {
            legal_name: {
                required: "Name is required",
            },
        },
        submitHandler: function (form) {
            //$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /> Just a moment...</h1>' });
            
            finail_entity_submit();
            return false;
        }
    });

    function finail_entity_submit(){
        var entity_id = $('#entity_id').val();
        var code = $('#code').val();

        var table_field = [];
        table_field={
            legal_name : $('#legal_name').val(),
            website : $('#website').val(),
        };
       
        $.post(APP_URL + 'ngo/entity/update_entity', {
            entity_id: entity_id,
            code: code,
            table_field: table_field,
        },
        function (response) {
            $.unblockUI();
            $("html, body").animate({scrollTop: 0}, "slow");
            $('#err_add_plan').empty();
            if (response.status == 200) {
                $('#err_add_plan').empty();
                $('#err_add_plan').html("<div class='alert alert-success fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + response.message + "</strong></div>");
                $("#err_add_plan").fadeTo(2000, 500).slideUp(500, function(){
                    $('#err_add_plan').empty();
                    window.location.href = APP_URL+'ngo/entity/list';
                });
           } else {
                $('#err_add_plan').empty();
                $('#err_add_plan').html("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + response.message + "</strong></div>");
                $("#err_add_plan").fadeTo(2000, 500).slideUp(500, function(){
                    $('#err_add_plan').empty();
                });
            }
        }, 'json');
    }

    $('body').on('click', '.remove_item', function () { 
        if (!confirm("Do you want to delete")) {
            return false;
        }   
        $.blockUI();
        var id = $(this).attr('name');
        var primary_column_name = $(this).attr('primary_column_name');
        var table_name = $(this).attr('table_name');
        $.post(APP_URL + 'ngo/common/remove', {
            id: id,
            table_name: table_name,
            primary_column_name: primary_column_name,
        },
        function (response) {
            $("html, body").animate({scrollTop: 0}, "slow");
            $('#headerMsg').empty();
            if (response.status == 200) {   
                $('#headerMsg').html("<div class='alert alert-success fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong>&nbsp;&nbsp;<a onclick='location.reload();' href='javascript:void(0);'></a></div>");
                $("#headerMsg").fadeTo(2000, 500).slideUp(500, function(){
                    $('#headerMsg').empty();
                    window.location.reload();
                });
            } else if (response.status == 201) {
                $('#headerMsg').html("<div class='alert alert-danger fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
                $("#headerMsg").fadeTo(2000, 500).slideUp(500, function(){
                    $('#headerMsg').empty();
                });
            }
            $.unblockUI();
            
        }, 'json');
    });
	
	
	$('body').on('click', '#edit_click_page1', function () { 
	$('.page_1').removeClass('display_none');
	
	});
	
	
});
</script>




<?php 
    $data['sub_folder_name']="";
    $data['image_cat']="entity";
    $this->load->view('file_upload_xl',$data);?>

<?php 
    $data['sub_folder_name']="";
    $data['image_cat']="entity";
    $this->load->view('file_upload',$data);?>