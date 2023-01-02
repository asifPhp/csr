<link rel="stylesheet" href="<?php echo base_url()?>assets/css/comboTreePlugin.css">
<script src="<?php echo base_url()?>assets/js/comboTreePlugin.js"></script>
<style>
#headerMsg{	margin:20px 0px;}
.dataTables-example th{	text-align:center;}
.ibox-content{padding: 10px;}
[data-toggle="collapse"] .fa:before {  
  content: "\f139";
}ev

[data-toggle="collapse"].collapsed .fa:before {
  content: "\f13a";
}
.input_description{font-weight: 400;}
.actual_disp{
 background-color: white;
    opacity: 1;
    margin-top: 10px;
    border: none;
    color: blue;
}

.modal-backdrop.in {
    filter: alpha(opacity=50);
    opacity: -0.5;
    display: none;
}
.readonly_date{
	background-color: white !important;
}
.error{
	font-weight: 900;
}
.actual_disp1{
	background-color: white !important;
    opacity: 1 !important;
    margin-top: 10px !important;
    border: none !important;
    color: blue !important;
}
.comboTreeInputBox{background-color: #fff !important;
    opacity: 1;border-radius: 0px !important;
	   
	}

</style>

<?php
	
	if($data_value){
		//var_dump($data_value);
		$superngo_id = $data_value[0]['superngo_id']; 
		$comments = $data_value[0]['comments'];
		$org_task_id = $data_value[0]['org_task_id']; 
		$project_id = $data_value[0]['project_id']; 
		$superngo_details = $this->db->get_where('superngo',array('id' =>$superngo_id))->result();
		$org_task_list_id=$data_value[0]['org_task_list_id'];
		$org_id=$data_value[0]['org_id'];
		$prop_id=$data_value[0]['prop_id'];
		$org_staff_id=$data_value[0]['org_staff_id'];
		$status = $data_value[0]['status'];
		$ngo_id = $data_value[0]['ngo_id'];
		$prop_name = $data_value[0]['prop_name'];
		$title = $data_value[0]['title'];
		
		$additional_json = '';
		$project_start_date='';
		$project_end_date='';
		$csr_file_value1='';
		$csr_file_value_actual1='';
		$cycle_list_additional_json='';
		
		
		if(isset($data_value[0]['additional_json'])){
			$additional_json = json_decode($data_value[0]['additional_json']);
			//var_dump($additional_json);
			if(isset($additional_json[0]->project_start_date)){
				$project_start_date = $additional_json[0]->project_start_date;
			}
			if(isset($additional_json[0]->project_end_date)){
				$project_end_date = $additional_json[0]->project_end_date;
			}
			
			if(isset($additional_json[0]->csr_file_value1)){
				$csr_file_value1 = $additional_json[0]->csr_file_value1;
			}
			if(isset($additional_json[0]->csr_file_value_actual1)){
				$csr_file_value_actual1 = $additional_json[0]->csr_file_value_actual1;
			}
			if(isset($additional_json[0]->cycle_list)){
				$cycle_list_additional_json = $additional_json[0]->cycle_list;
				//var_dump($cycle_list_additional_json);
			}
			
			
		}else{
			$project_start_date='';
			$project_end_date='';			
			$csr_file_value1='';
			$csr_file_value_actual1='';
			$cycle_list_additional_json='';
			
		}
	//$donor_list = $this->db->get_where('donor',array('org_id' =>$org_id))->result_array();
	//var_dump($donor_list);
	}else{
		$superngo_id =0; 
		$comments = '';
		$org_task_id = 0; 
		$project_id =0;
		$org_task_list_id=0;
		$org_id=0;
		$prop_id=0;
		$org_staff_id=0;
		$status = '';
		$ngo_id =0;
		$prop_name ='';
				
		$project_start_date='';
		$project_end_date='';
			
		$csr_file_value1='';
		$csr_file_value_actual1='';
		$cycle_list_additional_json='';
	}
?>
<?php
$data['sub_folder_name']="";
$data['image_cat']="entity";
$this->load->view('file_upload',$data);
?>
<div class="animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-content">
					<div id="head_ngo_review"></div>
					<input type="hidden" class="form-control" id="org_staff_id" name="org_staff_id" value="<?php echo $org_staff_id; ?>">		
					<input type="hidden" class="form-control" id="org_task_id" name="org_task_id" value="<?php echo $org_task_id; ?>">
					<input type="hidden" class="form-control" id="org_task_list_id" name="org_task_list_id" value="<?php echo $org_task_list_id; ?>">
					<input type="hidden" class="form-control" id="org_id" name="org_id" value="<?php echo $org_id; ?>">
					<input type="hidden" class="form-control" id="prop_id" name="prop_id" value="<?php echo $prop_id; ?>">
					<input type="hidden" class="form-control" id="superngo_id" name="superngo_id" value="<?php echo $superngo_id;?>">
					<input type="hidden" class="form-control" id="ngo_id" name="ngo_id" value="<?php echo $ngo_id;?>">
					<input type="hidden" class="form-control" id="project_id" name="project_id" value="<?php echo $project_id;?>">
					<div class="row">
						<div class="col-lg-6">
							<?php 
									$sql3="SELECT * FROM `ngo` WHERE `id` =".$ngo_id;
										$result3 = $this->db->query($sql3); 
										if ($result3 && $result3->num_rows() > 0){
											$data['ngo_data'] = $result3->result();
										}else{
											$data['ngo_data'] = '';
										}
									
									$sql4="SELECT * FROM `org_ngo_review_status` WHERE `ngo_id` =".$ngo_id;
										$result4 = $this->db->query($sql4); 
										if ($result4 && $result4->num_rows() > 0){
											$data['org_ngo_review_status'] = $result4->result();
										}else{
											$data['org_ngo_review_status'] = '';
										}
							
							
									$this->load->view('organisation/pages/viw_project_detail_page/view_project_detail');
									
									$this->load->view('organisation/pages/viw_project_detail_page/view_project_donor_detail');
									
									$this->load->view('organisation/pages/viw_project_detail_page/view_project_proposal_detail');
									
									if($result3){
										$this->load->view('organisation/pages/viw_project_detail_page/view_project_ngo_detail',$data);
									}
								
									$this->load->view('organisation/pages/task/ngo_information_collapse'); 
							?>
						</div>
						<div class="col-lg-6">
							<?php $this->load->view('organisation/pages/task/Task_details_collapse'); ?>
							<div class="box box-primary ">
								<div class="box-header with-border " data-widget="collapse">
									<i class="fa btn btn-box-tool fa_plus fa-minus"></i>
									<h3 class="box-title"><?php echo $data_value[0]['org_task_label']; ?></h3>
								</div>
								<div class="box-body" >
									<label>Reporting/Payment Cycles</label>
									<label class="input_description">We have created some for you in advance. You can click on the edit button near them to add additional details required.</label>
									<a href="javascript:void(0);" id="donor_popup" data-toggle="modal" data-target="#Create_cycle_popup"  class="btn btn-success Create_cycle_popup"><i class="fa fa-plus"></i></a><label style="margin-left:5px;">Add another cycle</label><br>
									<!--<button class="btn btn-success  radius50" id="CycleAddParabtn">+ Add another cycle</button>-->
								
									<table id="blog_view_table" class="<?php ?> table table-striped table-bordered table-hover" style="margin-top: 16px;">
										<thead>
											<tr>
												<!--<th class="text-center">S. No.</th>-->
												<th class="text-center">Cycle Name</th>
												<!--<th class="text-center">Cycle status</th>-->
												<th class="text-center">Cycle started date</th>
												<th class="text-center">Cycle end date</th>
												<th class="text-center">Is Payment Done</th>
												<th class="text-center">Cycle Donor Amount</th>
												<th class="text-center">Action</th>
											</tr>
										</thead>
										<tbody class="cycle_table_append">
											<?php if($cycle_list_additional_json){
													$tr_id=0;
													foreach($cycle_list_additional_json as $val){
														$tr_id++;
														//var_dump($val);
														$payment_list='';
														$is_payment=$val->is_payment;
														if($is_payment=='yes'){
															$payment_list=$val->payment_list;
														}
														$cycle_start_date='';
														$cycle_end_date2='';
														if(isset($val->cycle_start_date)){
															$cycle_start_date=$val->cycle_start_date;
														}
														if(isset($val->cycle_end_date2)){
															$cycle_end_date2=$val->cycle_end_date2;
														}
														
											?>
												
											<tr id="tr_id<?php echo $tr_id;?>" class="main_table_tr">
												<td  class="text-center cycle_name "><?php echo $val->cycle_name;?></td>
												<td  class="text-center cycle_start_date1" cycle_start_date_hidden="<?php if($cycle_start_date){ echo $cycle_start_date;}?>" ><?php if($cycle_start_date){ echo date_formats($cycle_start_date);}?></td>
												<td  class="text-center cycle_end_date2" cycle_end_date2_hidden="<?php if($cycle_end_date2){ echo $cycle_end_date2;}?>" ><?php if($cycle_end_date2){ echo date_formats($cycle_end_date2);}?></td>
												<td  class="text-center is_payment"><?php echo $val->is_payment;?></td>
												<td  class="text-center">
												<input type="hidden" class="ngo_doc1" name="ngo_doc1" value="<?php echo $val->ngo_doc;?>">
												<input type="hidden" class="csr_doc1" name="csr_doc1"value="<?php echo $val->csr_doc;?>">
												<?php if($is_payment=='yes'){?>
													
												<input type="hidden" class="ngo_payment1" name="ngo_payment1"value="<?php if($val->ngo_payment){ echo $val->ngo_payment; }?>">
												
													<table id="blog_view_table" class=" table table-striped table-bordered table-hover" >
														<thead>
															<tr>
																<th class="text-center">Donor</th>
																<th class="text-center">Amount</th>
																</tr>
														</thead>
														<tbody class="donor_detail_data_appen">
														<?php if($payment_list){
																foreach($payment_list as $pay){
																	//var_dump($pay);
															?>
															<tr>	
																<td  class="text-center" project_donor_id="'+select_donor+'"><?php echo $pay->donor_dropdown;?></td>
																<td  class="text-center"><?php echo $pay->cycle_donor_amount;?></td>
															</tr>
														<?php }}?>
														</tbody>
													</table>
												<?php }?>
												</td>
											
												<td  class="text-center">
													<a href="javascript:void(0);" data-toggle="modal" data-target="#edit_cycle_popup" class="label label-info edit_cycle_popup ">Edit</a>&nbsp;<a href="javascript:void(0);" class="label label-danger remove_item">Delete</a>
												</td>
											</tr>
											<?php }}?>
										</tbody>
									</table>
									
									<div class="form-group ">
										<div class="row">
											<div>&nbsp;</div>
											<div class="button " style="margin-left: 17px;">
												<button type="button" <?php if($status == 'Completed'){echo 'disabled';}?>  id="save<?php if($status == 'Completed'){echo 'disabled';}?>" class="btn btn-primary">Save</button>
												<button type="submit" <?php if($status == 'Completed'){echo 'disabled';}?>  id="create_cycle<?php if($status == 'Completed'){echo 'disabled';}?>" class="btn btn-success">Submit</button>
												<button type="submit" <?php if($status == 'Completed'){echo 'disabled';}?>  id="submit_cycle_creation<?php if($status == 'Completed'){echo 'disabled';}?>" class="btn btn-success display_none">Submit</button>
												<button type="button" class="btn btn-primary ngo_send_notification" style="float: right;display: none;">Notify</button>
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
</div>

	<div style="display: none;">
    	<div id="Cycle_append_html">
			<div class="panel panel-default cycle_creation_form">
				<div class="panel-body">
						<div class="form-group row">
							<div class="col-lg-12">
								<button type="button" class="btn btn-danger pull-right CycleRemovepara btn-sm " style="margin-top: -10px;"><i class="fa fa-close"></i></button> 
							   <label>Cycle Name<span class="required">*</span> </label>
								<div class="my_internal_error"></div>
								<input type="text" class="form-control plan_Cycle cycle_name"  name="cycle_name" placeholder="Cycle name" value="">
								<div class="cycle_name_error display_none error">Cycle Name must be at least  3 characters longs</div>
								
							</div>
						</div>
						
						<div class="form-group row">
							<label for="startdate" class="col-md-12">Date this cycle ENDS<span class="required">*</span></label>
							<div class="col-md-12"> 
								<input type="text" class="form-control old_date_new readonly_date project_date" name="project_date" placeholder="date" value="" readonly>
								<div class="project_date_between_error display_none"><label class="error">Date this cycle must between Start date and End date.</label></div>
								
							</div>
						</div>
						
						<div class="form-group row ">
							<div class="form-group col-md-12">
								<label>Does this cycle involve a payment?<span class="required">*</span></label>
								<input type="radio"  class="is_payment" name="" value="yes" > Yes
								<input type="radio" class="is_payment"  name="" value="no" > No
								<div class="is_payment_checked_error display_none"><label class="error">Please select any one </label></div>
							</div>
									
						</div>
							<?php 
								$db_result='';
								if($project_id>0){
								$sq4="select *,(select legal_name from donor where donor_id=project_donors.select_donor) as 'donor_legal_name'
										 from project_donors where project_id=$project_id";
								//var_dump($project_id);	 
								$db_result=$this->db->query($sq4)->result_array();
								//var_dump($db_result);	
								}
							?>		
					<div class="is_payment_yes display_none ">
						<div class="form-group row">
							<label for="donor_details" class="col-md-12">Donor<span class="required">*</span> </label>
						</div>
						
						<div class="TextBoxContainer1" >
							<div class="panel panel-default payment_creation_form">
								<div class="panel-body">
									<div class="form-group row">
										<div class="remove-added-para" mytime="" >
											<div class="col-md-12">
												<label>Select Donor<span class="required">*</span> </label>
												<select class="form-control select_donor"  name="select_donor" id="select_donor" >
													<option value="">Select donor</option>
													<?php 
														if($db_result){
															foreach($db_result as $val){ 
															
															 echo '<option class="is_remove"  pre_amount="'.$val['donor_amount'].'"  value="'.$val['select_donor'].'">'.$val['donor_legal_name'].'</option>';
															 
													} }?>
												</select>
												
											</div>
											<div class="col-md-12 ">
												<label>Amount<span class="required">*</span> </label>
												<label class="input_description">Enter the full amount for this donor in INR. Amount must be a whole number. No decimal values (Paise) allowed.</label>
												<input type="number" class="form-control donor_amount"  name="donor_amount" placeholder="Amount" value="">
											</div>
											
										</div>
									</div>
									<div class="form-group row  col-md-12">
										<label>Payment documents required from the NGO<span class="required">*</span></label>
										<input type="text" readonly  class="form-control ngo_payment" name="ngo_payment" placeholder="Ngo payment">
									</div>
								</div>
							</div>
						</div>
						
						<div class="form-group row">
							<div class="col-md-12"> 
								<button type="button"  class="btn btn-success addProSpeci"><i class="fa fa-plus"></i></button><label style="margin-left:5px;">Add another donor</label>
								<!--<input  class="btn btn-success addProSpeci" type="button" value="&#43 Add another donor" />	-->
								<div id="donor_list_error" class="display_none error ">Atleast one required.</div>
								<div id="donor_data_error" class="display_none error">All values are required.</div>
								<div class="error donor_duplicate_error display_none error" >Please select another donor.</div>
							</div>
						</div>
					</div>
					<div class="form-group row  col-md-12">
						<label>Project Assessment Documents required from the NGO for this cycle<span class="required">*</span></label>
						<input type="text" readonly  class="form-control ngo_doc " name="ngo_doc" placeholder="Ngo documents" ngo_type="" >
					</div>
					
					<div class="form-group row  col-md-12">
						<label>Documents to be provided by us<span class="required">*</span></label>
						<input type="text" readonly  class="form-control csr_doc" name="csr_doc" placeholder="Csr documents">
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="row donor_html_div " style="display:none;">
		<div class="remove-added-para" mytime="" >
			<div class="panel panel-default payment_creation_form ">
				<div class="panel-body">
					<div class="form-group row">
						<div class="col-md-12">
							<label>Select Donor<span class="required">*</span> </label>
							<button class="btn btn-warning removepara radius50 pull-right btn-sm" style="margin-top: -12px;" >&times;</button>
							<select class="form-control select_donor"  name="select_donor" id="select_donor" >
								<option value="">Select donor</option>
								<?php 
									if($db_result){
										foreach($db_result as $val){ 
											echo '<option class="is_remove"  pre_amount="'.$val['donor_amount'].'" value="'.$val['select_donor'].'">'.$val['donor_legal_name'].'</option>';
										} 	
									}
								?>
							</select>
						</div>
						<div class="col-md-12">
							<label>Amount</label>
							<label class="input_description">Enter the full amount for this donor in INR. Amount must be a whole number. No decimal values (Paise) allowed.</label>
							<input type="number" class="form-control donor_amount"  name="donor_amount" placeholder="Amount" value="">
						</div>
					</div>
					<div class="form-group row  col-md-12">
						<label>Payment documents required from the NGO<span class="required">*</span></label>
						<input type="text" readonly  class="form-control ngo_payment" name="ngo_payment" placeholder="Ngo payment">
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
	
	<!---------------------------- Modal for Browse Change Status-------------------------->
	<div class="modal fade" id="Create_cycle_popup" tabindex="-1" course_package="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content" >
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h3>Create New Cycle</h3>
				</div> 
				<div class="modal-body ">
					<div id="CycleTextBoxContainer" >
						<div class="panel panel-default cycle_creation_form">
							<div class="panel-body">
								<div class="form-group row">
									<div class="col-lg-12">
									   <label>Cycle Name<span class="required">*</span> </label>
										<div class="my_internal_error"></div>
										<input type="text" class="form-control plan_Cycle cycle_name"  name="cycle_name" placeholder="Cycle name" value="">
										<div class="cycle_name_error display_none error">Cycle Name must be at least 3 characters longs</div>
									</div>
								</div>
								<div class="form-group row">
									<label for="startdate" class="col-md-12">Date this cycle ENDS<span class="required">*</span></label>
									<div class="col-md-12"> 
										<input type="text" class="form-control end_date readonly_date project_date" name="project_date" placeholder="date" value="" readonly>
										<div class="project_date_between_error display_none"><label class="error">Date this cycle must between Start date and End date.</label></div>
									</div>
								</div>
								<div class="form-group row ">
									<div class="form-group col-md-12">
										<label>Does this cycle involve a payment?<span class="required">*</span></label>
										<input type="radio"  class="is_payment" name="is_payment" value="yes" > Yes
										<input type="radio" class="is_payment"  name="is_payment" value="no" > No
										<div class="is_payment_checked_error display_none"><label class="error">Please select any one </label></div>
									</div>
								</div>
								
								<div class="is_payment_yes display_none ">	
									<div class="form-group row ">
										<label for="donor_details" class="col-md-12" >Donor details for this cycle<span class="required">*</span></label>
										<label class="input_description col-md-12">We are only showing donors currently assigned to this project. Alongside each donor you can see how much budget is available for allocating to this cycle.</label>
									</div>
									<div class="table-responsive">
										<table id="blog_view_table" class=" table table-striped table-bordered table-hover" >
											<thead>
												<tr>
													<th class="text-center">Donor</th>
													<th class="text-center">Amount <br><label class="input_description" >Enter the amount in INR Lakhs</label></th>
												</tr>
											</thead>
											<tbody class="donor_detail_data">
												<?php if(!$project_cycle_donor_data){?>
													<tr><td class="text-center" colspan="5" >No data Available</td><tr>
												<?php }
													if($project_cycle_donor_data and $project_cycle_donor_data>0){
														foreach($project_cycle_donor_data as $row){
															//var_dump($row);
												?>
													<tr>
														<td class="text-center" project_donor_id="<?php echo $row['project_donor_id'];?>" main_donor_id="<?php echo $row['select_donor'];?>"><?php echo $row['legal_name'];?></td>
														<td  class="text-center"><input type="number"  min="0" onkeypress="return (event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control donor_amount"  name="donor_amount" placeholder="Amount" value=""></td>
													</tr>	
																									
													<?php } }?>
												
											</tbody>
										</table>
									</div>
									<div class="cycle_payment_donor_error error display_none"><label>All value are required</label></div>
									<div class="form-group row  col-md-12">
										<label>Payment documents required from the NGO<span class="required">*</span></label>
										<input type="text" readonly  class="form-control ngo_payment" name="ngo_payment" placeholder="Ngo payment">
									</div>
								</div>
								
								<div class="form-group row  col-md-12">
									<label>Project Assessment Documents required from the NGO for this cycle<span class="required">*</span></label>
									<input type="text" readonly  class="form-control ngo_doc " name="ngo_doc" placeholder="Ngo documents" ngo_type="" >
								</div>
								<div class="form-group row  col-md-12">
									<label>Documents to be provided by us<span class="required">*</span></label>
									<input type="text" readonly  class="form-control csr_doc" name="csr_doc" placeholder="Csr documents">
								</div>
							</div>
						</div>			
						
					</div>
					
					<div class="reg_detail_err error display_none"><label>Please provide all the Cycle details.</label></div>		
					<div class="greater_error "></div>
					<div class="form-group row col-md-12 display_none">
						<button type="button" id="CycleAddParabtn" class="btn btn-success"><i class="fa fa-plus"></i></button><label style="margin-left:5px;">Add another cycle</label>
						<!--<button class="btn btn-success  radius50" id="CycleAddParabtn">+ Add another cycle</button>-->
					</div>
					<div class="clearfix"></div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-success" id="cycle_submit_by_popup">Submit</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!---------------------------- Edit Modal for Browse Change Status-------------------------->
	<div class="modal fade" id="edit_cycle_popup" tabindex="-1" course_package="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content" >
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h3>Edit Cycle</h3>
				</div> 
				<div class="modal-body ">
					<div id="CycleTextBoxContainer1" >
						<div class="panel panel-default cycle_creation_form">
							<div class="panel-body">
								<div class="form-group row">
									<div class="col-lg-12">
									   <label>Cycle Name<span class="required">*</span> </label>
										<div class="my_internal_error"></div>
										<input type="hidden" class="form-control  tr_id_modal"  name="tr_id_modal"  value="">
										<input type="hidden" class="form-control  cycle_start_date_modal"  name="cycle_start_date_modal"  value="">
										<input type="text" class="form-control plan_Cycle cycle_name"  name="cycle_name" placeholder="Cycle name" value="">
										<div class="cycle_name_error display_none error">Cycle Name must be at least 3 characters longs</div>
									</div>
								</div>
								<div class="form-group row">
									<label for="startdate" class="col-md-12">Date this cycle ENDS<span class="required">*</span></label>
									<div class="col-md-12"> 
										<input type="text" class="form-control end_date readonly_date project_date" name="project_date" placeholder="date" value="" readonly>
										<div class="project_date_between_error display_none"><label class="error">Date this cycle must between Start date and End date.</label></div>
									</div>
								</div>
								<div class="form-group row ">
									<div class="form-group col-md-12">
										<label>Does this cycle involve a payment?<span class="required">*</span></label>
										<input type="radio" id="is_payment_data_yes" class="is_payment" name="is_payment" value="yes" > Yes
										<input type="radio" id="is_payment_data_no" class="is_payment"  name="is_payment" value="no" > No
										<div class="is_payment_checked_error display_none"><label class="error">Please select any one </label></div>
									</div>
								</div>
								
								<div class="is_payment_yes display_none">	
									<div class="form-group row ">
										<label for="donor_details" class="col-md-12" >Donor details for this cycle<span class="required">*</span></label>
										<label class="input_description col-md-12">We are only showing donors currently assigned to this project. Alongside each donor you can see how much budget is available for allocating to this cycle.</label>
									</div>
									<div class="table-responsive">
										<table id="blog_view_table" class=" table table-striped table-bordered table-hover" >
											<thead>
												<tr>
													<th class="text-center">Donor</th>
													<th class="text-center">Amount <br><label class="input_description" >Enter the amount in INR Lakhs</label></th>
												</tr>
											</thead>
											<tbody class="donor_detail_data_appen_edit_table">
												
											</tbody>
										</table>
									</div>
									<div class="cycle_payment_donor_error error display_none"><label>All value are required</label></div>
									<div class="form-group row  col-md-12">
										<label>Payment documents required from the NGO<span class="required">*</span></label>
										<input type="text" readonly  class="form-control ngo_payment" name="ngo_payment" placeholder="Ngo payment">
									</div>
								</div>
								
								<div class="form-group row  col-md-12">
									<label>Project Assessment Documents required from the NGO for this cycle<span class="required">*</span></label>
									<input type="text" readonly  class="form-control ngo_doc " name="ngo_doc" placeholder="Ngo documents" ngo_type="" >
								</div>
								<div class="form-group row  col-md-12">
									<label>Documents to be provided by us<span class="required">*</span></label>
									<input type="text" readonly  class="form-control csr_doc" name="csr_doc" placeholder="Csr documents">
								</div>
							</div>
						</div>			
						
					</div>
					
					<div class="reg_detail_err error display_none"><label>Please provide all the Cycle details.</label></div>		
					<div class="greater_error "></div>
					<div class="form-group row col-md-12 display_none">
						<button type="button" id="CycleAddParabtn" class="btn btn-success"><i class="fa fa-plus"></i></button><label style="margin-left:5px;">Add another cycle</label>
						<!--<button class="btn btn-success  radius50" id="CycleAddParabtn">+ Add another cycle</button>-->
					</div>
					<div class="clearfix"></div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-success" id="cycle_edit_by_popup">Submit</button>
					</div>
				</div>
			</div>
		</div>
	</div>	

<script>
$('document').ready(function(){
	//var geo_instance='';
	var geo_instance ='';
		$(".date").datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: 'yy-mm-dd',
				yearRange : 'c-75:c+75',
		});	
	$(".end_date").datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: 'yy-mm-dd',
			minDate: 'dateToday',
			yearRange : 'c-75:c+75',
	});
	
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
					minDate: 'dateToday',
					yearRange : 'c-75:c+75',
				});
			});
		}, 500);

        $(this).find('.cycle_creation_form .is_payment').attr('name',is_payment_name);
    });

 	$('body').on('click', '.CycleRemovepara', function () {
        $(this).parent().parent().parent().parent().remove();
    }); 

	
	$('body').on('click','.send_notification_by_vendor_code', function (){
		var is_error='no';
		var project_id = $('#project_id').val();
		var org_task_id=$('#org_task_id').val();
		var org_task_list_id=$('#org_task_list_id').val();
		var org_id=$('#org_id').val();
		var prop_id=$('#prop_id').val();
		var superngo_id=$('#superngo_id').val();
		var ngo_id=$('#ngo_id').val();
		var org_staff_id=$('#org_staff_id').val();
		
		var project_donor_id=$(this).val();
			console.log(project_donor_id);
		//var document_type = $('#ngo_document_type').val();
		//var project_cycle_id = $('.project_cycle_id').val();
		//var project_document_id = $('.project_document_id').val();	
			
			
			if(is_error=='no'){	
				$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
				$.post(APP_URL + 'organisation/tasks/send_vandor_code_email', {
					project_id: project_id,
					org_task_id:org_task_id,
					org_task_list_id:org_task_list_id,
					org_id:org_id,
					prop_id:prop_id,
					superngo_id:superngo_id,
					ngo_id:ngo_id,			
					org_staff_id:org_staff_id,			
					project_donor_id:project_donor_id,			
								
							
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
	
	
	
	$("body").on("click",'.addProSpeci', function () {
		
		get_organisation_data2();
		var myctime = $.now();
		$(".donor_html_div").find('.remove-added-para').attr('mytime',myctime);
		var div = $(".donor_html_div").html();
		//console.log(div);
		$(this).parent().parent().parent().find(".TextBoxContainer1").append(div);
		
	});
	
	
	$("body").on("change", ".is_payment", function () {
		var is_payment = $(this).val();
		console.log(is_payment);
		if(is_payment == 'yes'){
			$(this).parent().parent().parent().find('.is_payment_yes').removeClass('display_none');
		}else{
			$(this).parent().parent().parent().find('.is_payment_yes').addClass('display_none');
		}
	});
	
	$('body').on('click','.my_final', function () {
		var radio_value = $('input[name="my_final"]:radio:checked').val();
  
	   console.log(radio_value);
	   if(radio_value == 'my_approve'){
			$('.my_approve_yes').removeClass('display_none')
			$('.my_request_yes').addClass('display_none')
			$('.my_recommend_yes').addClass('display_none')
			$('.my_reject_yes').addClass('display_none')
		}
	    else if (radio_value=='my_request'){
		   	$('.my_request_yes').removeClass('display_none')
			$('.my_approve_yes').addClass('display_none')
			$('.my_recommend_yes').addClass('display_none')
			$('.my_reject_yes').addClass('display_none')
		 
	   }else{
			//$('.my_recommend_yes').removeClass('display_none')
			$('.my_approve_yes').addClass('display_none')
			$('.my_request_yes').addClass('display_none')
			$('.my_reject_yes').removeClass('display_none')
	   }
	});
	

	$("body").on("click", ".removepara", function () {
		$(this).parent().parent().parent().parent().remove();
	});
	
	/** Start  Save Cycle Popup section*/
	$('body').on('click','.Create_cycle_popup', function () {
		$('#CycleTextBoxContainer .cycle_name').val('');
		$('#CycleTextBoxContainer .project_date').val('');
		var is_payment = $('#CycleTextBoxContainer .is_payment:checked').val();
			console.log(is_payment);
		if(is_payment=='yes'){
			$('.donor_detail_data tr').each(function(key,val){
				console.log(val);
				var select_donor_text= $(this).find("td:eq(0)").text();
				var select_donor= $(this).find("td:eq(0)").attr('project_donor_id');
				var donor_amount= $(this).find("td:eq(1) input").val('');
			});
					
		}
		
		
		$('#CycleTextBoxContainer .is_payment_yes').addClass('display_none');
		$('#CycleTextBoxContainer .is_payment').attr('checked', false);
		$('#CycleTextBoxContainer .ngo_doc').val('');
		
		//geo_instance.clearSelection();

		//$("#CycleTextBoxContainer .ngo_doc option:selected").removeAttr("selected");
		$('#CycleTextBoxContainer .csr_doc').val('');
		$('#CycleTextBoxContainer .ngo_payment').val('');
		
	
	});
	
	
	$('body').on('click', '.remove_item', function () {	
		if (!confirm("Do you want to delete")) {
            return false;
        }	
		//$.blockUI();
        var tr_id = $(this).parent().parent().attr('id');
		console.log(tr_id);	
		
		$(".cycle_table_append #"+tr_id).remove();
	});
	
	$('body').on('click','#cycle_submit_by_popup', function () {
		var additional_json = [];		
		var org_task_id=$('#org_task_id').val();
		var org_task_list_id=$('#org_task_list_id').val();
		var org_id=$('#org_id').val();
		var ngo_id=$('#ngo_id').val();
		var prop_id=$('#prop_id').val();
		var superngo_id=$('#superngo_id').val();
		var org_staff_id=$('#org_staff_id').val();
		var project_id = $('#project_id').val();
		console.log(project_id);
		var is_cycle_error = 'no';
		var is_error = 'no';
		var cycle_list = new Array();
		var payment_list = [];
		var is_payment = $('#CycleTextBoxContainer .is_payment:checked').val();
			console.log(is_payment);
		var amount_error = 'no';	
		var ngo_payment = '';	
		var content = '';	
		/**Start Cycle Creater Looping here*/
		//$("#CycleTextBoxContainer .cycle_creation_form").each(function() {
			var cycle_name=$('#CycleTextBoxContainer .cycle_name').val();
			console.log("cycle_name");
			console.log(cycle_name);
			var project_date=$('#CycleTextBoxContainer .project_date').val();
			var ngo_doc=$('#CycleTextBoxContainer .ngo_doc').val();
			var csr_doc=$('#CycleTextBoxContainer .csr_doc').val();
			console.log("project_date");
			console.log(project_date);
				
			if(cycle_name) {} else {
				is_cycle_error = 'yes';
			}
			if(project_date) {} else {
				is_cycle_error = 'yes';
			}
			if(ngo_doc) {}else{
				is_cycle_error = 'yes';
			}
			if(csr_doc){} else {
				is_cycle_error = 'yes';
			}
			
			var donor_list = [];
			var is_donor_error = 'no';
			if (is_payment){
				if(is_payment == 'yes'){
					var ngo_payment=$('#CycleTextBoxContainer .ngo_payment').val();
					console.log("ngo_payment");
					console.log(ngo_payment);
					if(ngo_payment){}else{
						is_donor_error = 'yes';
					}
					
						$('.donor_detail_data tr').each(function(key,val){
							var select_donor_text= $(this).find("td:eq(0)").text();
							var select_donor= $(this).find("td:eq(0)").attr('project_donor_id');
							var donor_amount= $(this).find("td:eq(1) input").val();
							
							if(select_donor){}else{
								is_donor_error = 'yes';
							}
							if(donor_amount){}else{
								is_donor_error = 'yes';
							}
							
							payment_list.push({
								select_donor_text :select_donor_text ,
								select_donor :select_donor ,
								donor_amount : donor_amount,
							});
						});
					
						if(is_donor_error=='yes'){
							is_error = 'yes';
							is_cycle_error = 'yes';
							//$(".cycle_payment_donor_error").removeClass('display_none');	
						}else{
							//$(".cycle_payment_donor_error").addClass('display_none');
						}
						console.log("payment_list");	
						console.log(payment_list);	
					
				}else{}
				
			}else{ 
				is_cycle_error = 'yes';
			}
			 
			
			
			if (is_cycle_error == 'no') {
				$(this).parent().parent().parent().parent().find(".reg_detail_err").addClass('display_none');

			}else{
				 is_error = 'yes';
				$(this).parent().parent().parent().parent().find(".reg_detail_err").removeClass('display_none');
				 
			}
			var cycle_start_date1 = ($.datepicker.formatDate("d M y" , new Date()));
			var cycle_start_date = ($.datepicker.formatDate("yy-mm-dd" , new Date()));
			var project_date1=($.datepicker.formatDate("d M y", new Date(project_date)));
			
			console.log("cycle_start_date1");
			console.log(cycle_start_date1);
			console.log("project_date");
			console.log(project_date);
			console.log(cycle_start_date);
			var tr_id=1;
			$(".cycle_table_append 	.main_table_tr").each(function(key ,value) {
			console.log("keyhhhhhhhhhhhhhhhhhh");
				tr_id++;
				console.log(value);
				
			})
			console.log("tr_id");
			console.log(tr_id);
			
			
			
			content+='<tr id="tr_id'+tr_id+'" class="main_table_tr">';
			content+='<td  class="text-center cycle_name ">'+cycle_name+'</td>';
			
			content+='<td  class="text-center cycle_start_date1" cycle_start_date_hidden="'+cycle_start_date+'">'+cycle_start_date1+'</td>';
			content+='<td  class="text-center cycle_end_date2" cycle_end_date2_hidden="'+project_date+'">'+project_date1+'</td>';
			content+='<td  class="text-center is_payment">'+is_payment+'</td>';
			content+='<td  class="text-center">';
			content+='<input type="hidden" class="ngo_doc1" name="ngo_doc1"value="'+ngo_doc+'">';
			content+='<input type="hidden" class="csr_doc1" name="ngo_doc1"value="'+csr_doc+'">';
			
			if(is_payment=='yes'){
				content+='<input type="hidden" class="ngo_payment1" name="ngo_payment1"value="'+ngo_payment+'">';
				
				content+='<table id="blog_view_table" class=" table table-striped table-bordered table-hover" >';
				content+='<thead>';
				content+='<tr>';
				content+='<th class="text-center">Donor</th>';
				content+='<th class="text-center">Amount</th>';
				content+='</tr>';
				content+='</thead>';
				content+='<tbody class="donor_detail_data_appen">';
					
					$('.donor_detail_data tr').each(function(key,val){
						var select_donor_text= $(this).find("td:eq(0)").text();
						var select_donor= $(this).find("td:eq(0)").attr('project_donor_id');
						var donor_amount= $(this).find("td:eq(1) input").val();
						content+='<tr class="donor_detail_tr">';	
							content+='<td  class="text-center" project_donor_id="'+select_donor+'">'+select_donor_text+'</td>';
							content+='<td  class="text-center">'+donor_amount+'</td>';
						content+='</tr>';
						
					});
				content+='</tbody>';
				content+='</table>';
			}
			content+='</td>';
			
			content+='<td  class="text-center">';
			content+='<a href="javascript:void(0);" data-toggle="modal" data-target="#edit_cycle_popup" class="label label-info edit_cycle_popup ">Edit</a>&nbsp;<a href="javascript:void(0);" class="label label-danger remove_item">Delete</a>';
					
			content+='</td>';
			content+='</tr>';
			
		/**ENDS Cycle Creater Looping here*/
		
		if(is_error == 'no'){
			$(".cycle_table_append").append(content);
			$('#Create_cycle_popup').modal('hide');
		}
	});	
	
	
	
	$('body').on('click','#cycle_edit_by_popup', function () {
		var additional_json = [];		
		var org_task_id=$('#org_task_id').val();
		var org_task_list_id=$('#org_task_list_id').val();
		var org_id=$('#org_id').val();
		var ngo_id=$('#ngo_id').val();
		var prop_id=$('#prop_id').val();
		var superngo_id=$('#superngo_id').val();
		var org_staff_id=$('#org_staff_id').val();
		var project_id = $('#project_id').val();
		console.log(project_id);
		var is_cycle_error = 'no';
		var is_error = 'no';
		var cycle_list = new Array();
		var payment_list = [];
		var is_payment = $('#CycleTextBoxContainer1 .is_payment:checked').val();
			console.log(is_payment);
		var amount_error = 'no';	
		var ngo_payment = '';	
		var content = '';	
		/**Start Cycle Creater Looping here*/
		//$("#CycleTextBoxContainer .cycle_creation_form").each(function() {
			var cycle_name=$('#CycleTextBoxContainer1 .cycle_name').val();
			var tr_id_modal=$('#CycleTextBoxContainer1 .tr_id_modal').val();
			console.log("cycle_name");
			console.log(cycle_name);
			var project_date=$('#CycleTextBoxContainer1 .project_date').val();
			var ngo_doc=$('#CycleTextBoxContainer1 .ngo_doc').val();
			var csr_doc=$('#CycleTextBoxContainer1 .csr_doc').val();
			var cycle_start_date=$('#CycleTextBoxContainer1 .cycle_start_date_modal').val();
			console.log("project_date");
			console.log(project_date);
				
			if(cycle_name) {} else {
				is_cycle_error = 'yes';
			}
			if(project_date) {} else {
				is_cycle_error = 'yes';
			}
			if(ngo_doc) {}else{
				is_cycle_error = 'yes';
			}
			if(csr_doc){} else {
				is_cycle_error = 'yes';
			}
			
			var donor_list = [];
			var is_donor_error = 'no';
			if (is_payment){
				if(is_payment == 'yes'){
					var ngo_payment=$('#CycleTextBoxContainer1 .ngo_payment').val();
					console.log("ngo_payment");
					console.log(ngo_payment);
					if(ngo_payment){}else{
						is_donor_error = 'yes';
					}
					
						$('.donor_detail_data1 tr').each(function(key,val){
							var select_donor_text= $(this).find("td:eq(0)").text();
							var select_donor= $(this).find("td:eq(0)").attr('project_donor_id');
							var donor_amount= $(this).find("td:eq(1) input").val();
							
							if(select_donor){}else{
								is_donor_error = 'yes';
							}
							if(donor_amount){}else{
								is_donor_error = 'yes';
							}
							
							payment_list.push({
								select_donor_text :select_donor_text ,
								select_donor :select_donor ,
								donor_amount : donor_amount,
							});
						});
					
						if(is_donor_error=='yes'){
							is_error = 'yes';
							is_cycle_error = 'yes';
							//$(".cycle_payment_donor_error").removeClass('display_none');	
						}else{
							//$(".cycle_payment_donor_error").addClass('display_none');
						}
						console.log("payment_list");	
						console.log(payment_list);	
					
				}else{}
				
			}else{ 
				is_cycle_error = 'yes';
			}
			
			if (is_cycle_error == 'no') {
				$(this).parent().parent().parent().parent().find(".reg_detail_err").addClass('display_none');

			}else{
				 is_error = 'yes';
				$(this).parent().parent().parent().parent().find(".reg_detail_err").removeClass('display_none');
				 
			}
		
			var cycle_start_date1 = ($.datepicker.formatDate("d M y" , new Date()));
			//var cycle_start_date = ($.datepicker.formatDate("yy-mm-dd" , new Date()));
			var project_date1=($.datepicker.formatDate("d M y", new Date(project_date)));
			
			console.log("cycle_start_date1");
			console.log(cycle_start_date1);
			console.log(cycle_start_date);
			console.log("tr_id_modal");
			console.log(tr_id_modal);
			
			//content+='<tr id="'+tr_id_modal+'" >';
			content+='<td  class="text-center cycle_name ">'+cycle_name+'</td>';
			content+='<td  class="text-center cycle_start_date1" cycle_start_date_hidden="'+cycle_start_date+'">'+cycle_start_date1+'</td>';
			content+='<td  class="text-center cycle_end_date2" cycle_end_date2_hidden="'+project_date+'">'+project_date1+'</td>';
			content+='<td  class="text-center is_payment">'+is_payment+'</td>';
			
			content+='<td  class="text-center">';
			content+='<input type="hidden" class="ngo_doc1" name="ngo_doc1"value="'+ngo_doc+'">';
			content+='<input type="hidden" class="csr_doc1" name="csr_doc1" value="'+csr_doc+'">';
						
			if(is_payment=='yes'){
				content+='<input type="hidden" class="ngo_payment1" name="ngo_payment1"value="'+ngo_payment+'">';
				
				content+='<table id="blog_view_table" class=" table table-striped table-bordered table-hover" >';
				content+='<thead>';
				content+='<tr>';
				content+='<th class="text-center">Donor</th>';
				content+='<th class="text-center">Amount</th>';
				content+='</tr>';
				content+='</thead>';
				content+='<tbody class="donor_detail_data_appen">';
					
					$('.donor_detail_data_appen_edit_table tr').each(function(key,val){
						var select_donor_text= $(this).find("td:eq(0)").text();
						var select_donor= $(this).find("td:eq(0)").attr('project_donor_id');
						var donor_amount= $(this).find("td:eq(1) input").val();
						content+='<tr>';	
							content+='<td  class="text-center" project_donor_id="'+select_donor+'">'+select_donor_text+'</td>';
							content+='<td  class="text-center">'+donor_amount+'</td>';
						content+='</tr>';
						
					});
				content+='</tbody>';
				content+='</table>';
			}
			content+='</td>';
			
			content+='<td  class="text-center">';
			content+='<a href="javascript:void(0);" data-toggle="modal" data-target="#edit_cycle_popup" class="label label-info edit_cycle_popup ">Edit</a>&nbsp;<a href="javascript:void(0);" class="label label-danger remove_item">Delete</a>';
					
			content+='</td>';
			//content+='</tr>';
			
		/**ENDS Cycle Creater Looping here*/
		
		if(is_error == 'no'){
			//console.log((".cycle_table_append #"+tr_id_modal));
			//$(".donor_detail_data_appen").empty();
			$(".cycle_table_append #"+tr_id_modal).empty();
			$(".cycle_table_append #"+tr_id_modal).append(content);
			$('#edit_cycle_popup').modal('hide');
		}
	});	
	
	
	
	
	$('body').on('click','.edit_cycle_popup', function () {
		var is_error='no';
		var cycle_name  = $(this).parent().parent().find('.cycle_name ').text();
		var cycle_start_date = $(this).parent().parent().find('.cycle_start_date1').attr('cycle_start_date_hidden');
		var cycle_end_date2 = $(this).parent().parent().find('.cycle_end_date2').attr('cycle_end_date2_hidden');
		var is_payment = $(this).parent().parent().find('.is_payment').text();
		var cycle_donor_amount = $(this).parent().parent().find('.cycle_donor_amount').text();
		var ngo_doc = $(this).parent().parent().find('.ngo_doc1').val();
		var csr_doc = $(this).parent().parent().find('.csr_doc1').val();
		
		var tr_id = $(this).parent().parent().attr('id');
		console.log(cycle_name);
		console.log(cycle_end_date2);
		console.log(is_payment);
		console.log(ngo_doc);
		console.log(tr_id);
		$('#CycleTextBoxContainer1 .cycle_name').val(cycle_name);
		//$('#CycleTextBoxContainer1 .cycle_start_date1').val(cycle_start_date1);
		$('#CycleTextBoxContainer1 .project_date').val(cycle_end_date2);
		//$('#CycleTextBoxContainer1 .is_payment').val(is_payment);
		var content='';
		if(is_payment=='yes'){
			$('#CycleTextBoxContainer1 #is_payment_data_yes ').prop('checked',true);
			$('#CycleTextBoxContainer1 #is_payment_data_no ').prop('checked',false);
			$('#CycleTextBoxContainer1 .is_payment_yes ').removeClass('display_none');
			var ngo_payment = $(this).parent().parent().find('.ngo_payment1').val();
			$('#CycleTextBoxContainer1 .ngo_payment').val(ngo_payment);
			
			$(this).parent().parent().find('.donor_detail_data_appen tr').each(function(key,val){
				var select_donor_text= $(this).find("td:eq(0)").text();
				var select_donor= $(this).find("td:eq(0)").attr('project_donor_id');
				var donor_amount= $(this).find("td:eq(1)").text();
				console.log("select_donor_text");
				console.log(select_donor_text);
				console.log(donor_amount);
				console.log(select_donor);
				
				content+='<tr>';	
					content+='<td  class="text-center" project_donor_id="'+select_donor+'">'+select_donor_text+'</td>';
					content+='<td  class="text-center"><input type="number"  min="0" onkeypress="return (event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control donor_amount"  name="donor_amount" placeholder="Amount" value="'+donor_amount+'"></td>';
				content+='</tr>';
							
			});
			console.log("content");
			console.log(content);
			$("#CycleTextBoxContainer1 .donor_detail_data_appen_edit_table").empty();
			$("#CycleTextBoxContainer1 .donor_detail_data_appen_edit_table").append(content);
		
		}
		if(is_payment=='no'){
			$('#CycleTextBoxContainer1 #is_payment_data_yes ').prop('checked',false);
			$('#CycleTextBoxContainer1 #is_payment_data_no ').prop('checked',true);
			$('#CycleTextBoxContainer1 .is_payment_yes ').addClass('display_none');
		}
		
		$('#CycleTextBoxContainer1 .ngo_doc').val(ngo_doc);
		$('#CycleTextBoxContainer1 .csr_doc').val(csr_doc);
		$('#CycleTextBoxContainer1 .tr_id_modal').val(tr_id);
		$('#CycleTextBoxContainer1 .cycle_start_date_modal').val(cycle_start_date);
		//$('#CycleTextBoxContainer .').val(ngo_id);
		
		
	});
	
	
	
	/** End  Save Cycle Popup section*/
	
	
	
	
	
	
	
	/** Start Save Cycle Section*/
	$('body').on('click','#save', function () {
		var additional_json = [];		
		var org_task_id=$('#org_task_id').val();
		var org_task_list_id=$('#org_task_list_id').val();
		var org_id=$('#org_id').val();
		var ngo_id=$('#ngo_id').val();
		var prop_id=$('#prop_id').val();
		var superngo_id=$('#superngo_id').val();
		var org_staff_id=$('#org_staff_id').val();
		var project_id = $('#project_id').val();
		console.log(project_id);
		var is_cycle_error = 'no';
		var is_error = 'no';
		var cycle_list = new Array();
		
		
		var amount_error = 'no';	
		/**Start Cycle Creater Looping here*/
		//var cycle_start_date1 = ($.datepicker.formatDate("d M y" , new Date()));
		
		$(".cycle_table_append .main_table_tr").each(function(key ,value) {
			console.log("key");
			console.log(key);
			var payment_list = [];
			var cycle_name= $(this).find("td:eq(0)").text();
			var cycle_start_date=$(this).find("td:eq(1)").attr('cycle_start_date_hidden');
			var cycle_end_date2=$(this).find("td:eq(2)").attr('cycle_end_date2_hidden');
			//var cycle_end_date2=$(this).find("td:eq(2)").text();
			var is_payment = $(this).find("td:eq(3)").text();	
			var ngo_doc=$(this).find("td:eq(4) .ngo_doc1").val(); 
			var csr_doc=$(this).find("td:eq(4) .csr_doc1").val(); 
			console.log("cycle_start_date");
			console.log(cycle_start_date);
			console.log(cycle_end_date2);
			var ngo_payment='';
			if(is_payment){
				if(is_payment == 'yes'){
					ngo_payment=$(this).find("td:eq(4) .ngo_payment1").val(); 
					
					$(this).find(".donor_detail_data_appen tr").each(function(){
						var donor_dropdown= $(this).find("td:eq(0)").text();
						var donor_id= $(this).find("td:eq(0)").attr('project_donor_id');
						var donor_amount= $(this).find("td:eq(1)").text();
						
						payment_list.push({
							is_payment : is_payment,
							donor_dropdown_id : donor_id,
							donor_dropdown :donor_dropdown ,
							cycle_donor_amount : donor_amount,
							ngo_payment :ngo_payment ,
						
						});		
					
					});
						console.log("Asif aa");
						console.log(payment_list);
				}else{}
				
			}else{ 
				is_cycle_error = 'yes';
			}
			
				
			cycle_list.push({
				payment_list:payment_list,
				cycle_name : cycle_name,
				cycle_start_date : cycle_start_date,
				cycle_end_date2 : cycle_end_date2,
				is_payment : is_payment,
				ngo_doc :ngo_doc ,
				csr_doc : csr_doc,
				ngo_payment : ngo_payment,
				
			}); 
		
		});
		
			console.log("cycle_list");
			console.log(cycle_list);
		/**ENDS Cycle Creater Looping here*/
		
		additional_json.push({
			'cycle_list':cycle_list,
			
		});
		
		
		//if(is_error == 'no'){
		console.log(additional_json);
			$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
	
			$.post(APP_URL + 'organisation/tasks/update_onsave_org1', {
					additional_json:additional_json,
					org_task_id:org_task_id, 
					org_task_list_id:org_task_list_id,
					org_id:org_id,
					ngo_id:ngo_id,
					prop_id:prop_id,
					superngo_id:superngo_id,
					org_staff_id:org_staff_id,
					
					
			},
			
			
			function (response) {
				$.unblockUI();
				$('#head_ngo_review').empty();
				if (response.status == 200) {
					var message = response.message; 
					$.toaster({ priority :'success', message :'Saved'});
					//$('#head_ngo_review').html("<div class='alert alert-success fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
					//$('.remove_image[name=' + contact_id + ']').closest("tr").remove();
					//$("#head_ngo_review").fadeTo(2000, 500).slideUp(500, function(){
						//$('#head_ngo_review').empty();
						//window.location.reload();
						//window.location.href=APP_URL+"organisation/tasks/mytasks";
					//});
				} else {
					$('#head_ngo_review').html("<div class='alert alert-danger fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
					$("#head_ngo_review").fadeTo(2000, 500).slideUp(500, function(){
						$('#head_ngo_review').empty();
					});
				}	
			}, 'json');
		//}
	});	
	/** End  Save Cycle Section*/

	/** Start Submit- 1  Cycle Section*/
	$("body").on("click", "#create_cycle", function() {
		console.log("OK");
			//$.blockUI()
		var additional_json = [];	
		var is_error='no';	
		var org_task_id=$('#org_task_id').val();
		var org_task_list_id=$('#org_task_list_id').val();
		var org_id=$('#org_id').val();
		var ngo_id=$('#ngo_id').val();
		var prop_id=$('#prop_id').val();
		var superngo_id=$('#superngo_id').val();
		var org_staff_id=$('#org_staff_id').val();
		
		var project_id = $('#project_id').val();
		console.log(project_id);
		var is_cycle_error = 'no';
		var is_error = 'no';
		var cycle_list = [];
		var payment_list = [];
		var donor_list1 =[];
		var donor_list2 =[];
		  var count = 0;
		var pre_amount = 0;
		var mythis = $(this);
		var amount_error = 'no';	
		/**Start Cycle Creater Looping here*/
		//var cycle_start_date1 = ($.datepicker.formatDate("d M y" , new Date()));
		
		$(".cycle_table_append .main_table_tr").each(function(key ,value) {
			console.log("key");
			console.log(key);
			var payment_list = [];
			var cycle_name= $(this).find("td:eq(0)").text();
			var cycle_start_date=$(this).find("td:eq(1)").attr('cycle_start_date_hidden');
			var cycle_end_date2=$(this).find("td:eq(2)").attr('cycle_end_date2_hidden');
			//var cycle_end_date2=$(this).find("td:eq(2)").text();
			var is_payment = $(this).find("td:eq(3)").text();	
			var ngo_doc=$(this).find("td:eq(4) .ngo_doc1").val(); 
			var csr_doc=$(this).find("td:eq(4) .csr_doc1").val(); 
			console.log("cycle_start_date");
			console.log(cycle_start_date);
			console.log(cycle_end_date2);
			var ngo_payment='';
			if(is_payment){
				if(is_payment == 'yes'){
					ngo_payment=$(this).find("td:eq(4) .ngo_payment1").val(); 
					
					$(this).find(".donor_detail_data_appen tr").each(function(){
						var donor_dropdown= $(this).find("td:eq(0)").text();
						var donor_id= $(this).find("td:eq(0)").attr('project_donor_id');
						var donor_amount= $(this).find("td:eq(1)").text();
						
						payment_list.push({
							is_payment : is_payment,
							donor_dropdown_id : donor_id,
							donor_dropdown :donor_dropdown ,
							cycle_donor_amount : donor_amount,
							ngo_payment :ngo_payment ,
						
						});		
					
					});
						console.log("Asif aa");
						console.log(payment_list);
				}else{}
				
			}else{ 
				is_cycle_error = 'yes';
			}
			
				
			cycle_list.push({
				payment_list:payment_list,
				cycle_name : cycle_name,
				cycle_start_date1 : cycle_start_date,
				cycle_end_date2 : cycle_end_date2,
				is_payment : is_payment,
				ngo_doc :ngo_doc ,
				csr_doc : csr_doc,
				ngo_payment : ngo_payment,
				
			}); 
		
		});
		
			console.log("cycle_list");
			console.log(cycle_list);
		/**ENDS Cycle Creater Looping here*/
		
		additional_json.push({
			'cycle_list':cycle_list,
			
		});
		
			console.log(additional_json);
		if(is_error=='no'){	
			//$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
							
			$.post(APP_URL + 'organisation/tasks/post_cycle_data_by_org1', {
					additional_json:additional_json,
					org_task_id:org_task_id, 
					org_task_list_id:org_task_list_id,
					org_id:org_id,
					ngo_id:ngo_id,
					prop_id:prop_id,
					superngo_id:superngo_id,
					org_staff_id:org_staff_id,
					project_id:project_id,
					cycle_list:cycle_list,
					
					
			},
			function (response) {
				$.unblockUI();
				$("html, body").animate({scrollTop: 0}, "slow");
                $('#head_ngo_review').empty();
				if (response.status == 200) {
					$('#submit_cycle_creation').trigger('click');
				}else {
                    $('#head_ngo_review').html("<div class='alert alert-danger fade show'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
					$("#head_ngo_review").fadeTo(2000, 500).slideUp(500, function(){
						$('#head_ngo_review').empty();
					});
				}					
				
			}, 'json');
		}
			return false;
	
	
	});
	/** End Submit- 1  Cycle Section*/
	
	/** Start Submit- 2  Cycle Section*/
	$("body").on("click", "#submit_cycle_creation", function() {
		console.log("OK");
			//$.blockUI()
		var additional_json = [];	
		var is_error='no';	
		var org_task_id=$('#org_task_id').val();
		var org_task_list_id=$('#org_task_list_id').val();
		var org_id=$('#org_id').val();
		var ngo_id=$('#ngo_id').val();
		var prop_id=$('#prop_id').val();
		var superngo_id=$('#superngo_id').val();
		var org_staff_id=$('#org_staff_id').val();
		
		var project_id = $('#project_id').val();
		console.log(project_id);
		
		var amount_error = 'no';
		var is_cycle_error = 'no';
		var is_error = 'no';
		var cycle_list = new Array();
		var payment_list = [];
		var is_payment = $('.is_payment:checked').val();
			console.log(is_payment);
		var amount_error = 'no';
		
		/**Start Cycle Creater Looping here*/
			$(".cycle_table_append .main_table_tr").each(function(key ,value) {
			console.log("key");
			console.log(key);
			var payment_list = [];
			var cycle_name= $(this).find("td:eq(0)").text();
			var cycle_start_date=$(this).find("td:eq(1)").attr('cycle_start_date_hidden');
			var cycle_end_date2=$(this).find("td:eq(2)").attr('cycle_end_date2_hidden');
			//var cycle_end_date2=$(this).find("td:eq(2)").text();
			var is_payment = $(this).find("td:eq(3)").text();	
			var ngo_doc=$(this).find("td:eq(4) .ngo_doc1").val(); 
			var csr_doc=$(this).find("td:eq(4) .csr_doc1").val(); 
			console.log("cycle_start_date");
			console.log(cycle_start_date);
			console.log(cycle_end_date2);
			var ngo_payment='';
			if(is_payment){
				if(is_payment == 'yes'){
					ngo_payment=$(this).find("td:eq(4) .ngo_payment1").val(); 
					
					$(this).find(".donor_detail_data_appen tr").each(function(){
						var donor_dropdown= $(this).find("td:eq(0)").text();
						var donor_id= $(this).find("td:eq(0)").attr('project_donor_id');
						var donor_amount= $(this).find("td:eq(1)").text();
						
						payment_list.push({
							is_payment : is_payment,
							donor_dropdown_id : donor_id,
							donor_dropdown :donor_dropdown ,
							cycle_donor_amount : donor_amount,
							ngo_payment :ngo_payment ,
						
						});		
					
					});
						console.log("Asif aa");
						console.log(payment_list);
				}else{}
				
			}else{ 
				is_cycle_error = 'yes';
			}
			
				
			cycle_list.push({
				payment_list:payment_list,
				cycle_name : cycle_name,
				cycle_start_date1 : cycle_start_date,
				cycle_end_date2 : cycle_end_date2,
				is_payment : is_payment,
				ngo_doc :ngo_doc ,
				csr_doc : csr_doc,
				ngo_payment : ngo_payment,
				
			}); 
		
		});
		
			console.log("cycle_list");
			console.log(cycle_list);
		/**ENDS Cycle Creater Looping here*/
		
		additional_json.push({
			'cycle_list':cycle_list,
			
		});
		
		console.log(additional_json);
		if(is_error=='no'){	
			$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
							
			$.post(APP_URL + 'organisation/tasks/change_status_onsubmit_by_cycle_creation_og1', {
					additional_json:additional_json,
					org_task_id:org_task_id, 
					org_task_list_id:org_task_list_id,
					org_id:org_id,
					ngo_id:ngo_id,
					prop_id:prop_id,
					superngo_id:superngo_id,
					org_staff_id:org_staff_id,
					project_id:project_id,
					cycle_list:cycle_list,
					
					
			},
			function (response) {
				$.unblockUI();
				$("html, body").animate({scrollTop: 0}, "slow");
                $('#head_ngo_review').empty();
				if (response.status == 200) {
					var message = response.message;
					$("html, body").animate({scrollTop: 0}, "slow");               
					$('#head_ngo_review').html("<div class='alert alert-success fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
					$("#head_ngo_review").fadeTo(2000, 500).slideUp(500, function(){
						$('#head_ngo_review').empty();
						window.location.href=APP_URL+"organisation/tasks/mytasks";
					});
					
					
				}else {
                    $('#head_ngo_review').html("<div class='alert alert-danger fade show'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
					$("#head_ngo_review").fadeTo(2000, 500).slideUp(500, function(){
						$('#head_ngo_review').empty();
					});
				}					
				
			}, 'json');
		}
			return false;
	
	
	});
	/** End Submit- 2  Cycle Section*/
	
	/*multi select*/
	
	var ngo_doc_list = $('.ngo_doc_list').val();
	var orgstaffData = [ ];
	
	var categories_instance ='';
	get_organisation_data();
	var orgjeoData_id=[];
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
			console.log("FD");
			console.log(geoData);
        	if(geoData){
				$.each(geoData, function(index, item) {
					console.log("f");
					var item22=(item.title);
					var item223=(item.id);
					console.log(item)
					if(ngo_doc_list){
						var sub_status_array = ngo_doc_list.split(",");
						console.log(sub_status_array);
						if(sub_status_array.length){
							$.each(sub_status_array, function(index1, item1) {
							var item12=$.trim(item1);
							console.log(item12)
							
							if(item22==item12)	
								orgstaffData.push(item)
							});
						}
					}
					console.log("ss");
					console.log(orgstaffData);
				
				});
			
			
				
				geo_instance = $('.ngo_doc').comboTree({
					source : geoData,
					isMultiple:true,
					cascadeSelect:true,
					selected: orgstaffData
				});
				console.log("geo_instance");
				console.log(geo_instance);
				if(orgstaffData){
					geo_instance.setSelection(orgstaffData);
				}
			}
			
        },'json');
		
	}
	/*multi select*/
	var csr_doc_list = $('.csr_doc_list').val();
	var orgstaffData1 = [ ];
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
			if(geoData){
				$.each(geoData, function(index, item) {
					console.log("fs");
					var item22=(item.title);
					var item223=(item.id);
					console.log(item)
					if(csr_doc_list){
						var sub_status_array = csr_doc_list.split(",");
						console.log(sub_status_array);
						if(sub_status_array.length){
							$.each(sub_status_array, function(index1, item1) {
							var item12=$.trim(item1);
							console.log(item12)
							
							if(item22==item12)	
								orgstaffData1.push(item223)
							});
						}
					}
					console.log("ssp");
					console.log(orgstaffData1);
				
				});
			}
			
        	geo_instance1 = $('.csr_doc').comboTree({
			  	source : geoData,
			  	isMultiple:true,
			  	cascadeSelect:true,
			  	//selected: orgstaffData1
			});
			if(orgstaffData1){
				//geo_instance1.setSelection(orgstaffData1);
			}
			
        },'json');
		
	}
	
	/*multi select*/
	var ngo_payemnt_documents = $('.ngo_payemnt_documents').val();
	var orgstaffData2 = [ ];
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
			
			if(geoData){
				$.each(geoData, function(index, item) {
					console.log("fdss");
					var item22=(item.title);
					var item223=(item.id);
					console.log(item)
					if(ngo_payemnt_documents){
						var sub_status_array = ngo_payemnt_documents.split(",");
						console.log(sub_status_array);
						if(sub_status_array.length){
							$.each(sub_status_array, function(index1, item1) {
							var item12=$.trim(item1);
							console.log(item12)
							
							if(item22==item12)	
								orgstaffData2.push(item223)
							});
						}
					}
					console.log("ssfff");
					console.log(orgstaffData2);
				
				});
			}
        	geo_instance2 = $('.ngo_payment').comboTree({
			  	source : geoData,
			  	isMultiple:true,
			  	cascadeSelect:true,
			  	//selected: orgstaffData2
			});
			if(orgstaffData2){
				geo_instance2.setSelection(orgstaffData2);
			}
			
        },'json');
		
	}
	
	
	
});	

	
	
	</script>

	