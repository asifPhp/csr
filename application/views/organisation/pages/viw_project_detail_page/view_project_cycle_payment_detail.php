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

.edit_click {
    margin-top: -40px;
    margin-right: 35px;
    z-index: 999999;
    position: relative;
}

.comboTreeInputBox{background-color: #fff !important;
    opacity: 1;border-radius: 0px !important;
	   
	}
</style>

<?php
$content = '';
$num_of_row='';

if($sql_query1){
	$cycle_list = $this->db->query($sql_query1)->result_array();
	$cycle_ = $this->db->query($sql_query1);
	 $num_of_row=$cycle_->num_rows();
	
	$content1 = '';
	$content2 = '';
	$is_payment='';
	$cycle_status='';
	//var_dump($cycle_list);
	if($cycle_list){
		$i = 1;
		foreach ($cycle_list as $value) {
			$is_payment=$value['is_payment'];
			$is_completed=$value['is_completed'];
			$cycle_status=$value['cycle_status'];
			$status_is_payment='';
			//var_dump($value);
			$project_id=$value['project_id'];
			$project_cycle_id=$value['project_cycle_id'];
			$data_cycle_donor='';
			$total_cycle_allocate=0;
			$total_cycle_dis=0;
			$total_cycle_pending=0;
			$project_cycle_donor_id_hidden=0;
			//if($is_payment=='yes'){
				$sql1="SELECT * FROM `project_cycle_donor_details` WHERE `project_cycle_id` =$project_cycle_id AND project_id =$project_id AND is_deleted=0";
				$data_cycle_donor = $this->db->query($sql1)->result_array();
				
				
				//var_dump($data_cycle_donor);
			//}
			
			
			if($is_payment=='no'){
				$status_is_payment="N/A";
			}
			$content .= '<tr id="tr_id'.$value['no_of_cycle'].'" class="darker-on-hover main_table_tr"><td class="text-center no_of_cycle" no_of_cycle="'.$value['no_of_cycle'].'">' . $value['no_of_cycle'] . '</td>';
			
			$content .= '<td class="text-center cycle_name">' . $value['cycle_name']. '</td>';
			
			//$content .= '<td class="text-center display_none">' . date_formats($value['cycle_start_date1']). '</td>';
			$content .= '<td class="text-center cycle_end_date2 " cycle_end_date2_hidden="'.$value['cycle_end_date2'].'">' . date_formats($value['cycle_end_date2']). '</td>';
			$content .= '<td class="text-center display_none is_payment">' . $is_payment.'</td>';
			
			$content .= '<td class="text-center donor_detail_data_appen">';
			$content .= '<input type="hidden" class="ngo_doc1" name="ngo_doc1" value="'.$value['ngo_doc'].'">';
			$content .= '<input type="hidden" class="csr_doc1" name="csr_doc1"value="'.$value['csr_doc'].'">';
			$content .= '<input type="hidden" class="is_payment_hidden" name="is_payment_hidden" value="'.$is_payment.'">';
			$content .= '<input type="hidden" class="project_id" name="project_id"value="'.$value['project_id'].'">';
			$content .= '<input type="hidden" class="project_cycle_id" name="project_cycle_id"value="'.$value['project_cycle_id'].'">';
						$is_payment;
						if($is_payment=='yes'){
						$content .= '<input type="hidden" class="ngo_payment1" name="ngo_payment1"value="'.$value['ngo_payment'].'">';
							if($data_cycle_donor){
								foreach($data_cycle_donor as $res){
									$project_cycle_donor_id_hidden=$res['id'];
									$content .= '<input type="hidden" class="project_cycle_donor_id_hidden" name="project_cycle_donor_id_hidden" value="'.$project_cycle_donor_id_hidden.'">';
									$content .= '<span class="donor_detail_data_span" donor_code1="'.$res['donor_dropdown'].'" cycle_donor_amount1="'.$res['cycle_donor_amount'].'" project_donor_id="'.$res['project_donor_id'].'" donor_dropdown_id="'.$res['donor_dropdown_id'].'" project_cycle_donor_id="'.$res['id'].'" >'.$res['donor_dropdown'].'(<i style="display: contents;" class="fa fa-inr" aria-hidden="true"></i>'.$res['cycle_donor_amount'].'),</span> ';
									$total_cycle_allocate=((int)$total_cycle_allocate + (int)$res['cycle_donor_amount']);
									if($is_completed=='yes'){
										$total_cycle_dis=((int)$total_cycle_dis + (int)$res['cycle_donor_amount']);
									}
								}
							}
						}else{
							$content .=$status_is_payment;
							
							if($data_cycle_donor){
								foreach($data_cycle_donor as $res){
									$project_cycle_donor_id_hidden=$res['id'];
									$content .= '<input type="hidden" class="project_cycle_donor_id_hidden" name="project_cycle_donor_id_hidden" value="'.$project_cycle_donor_id_hidden.'">';
									$content .= '<span class="donor_detail_data_span display_none" donor_code1="'.$res['donor_dropdown'].'" cycle_donor_amount1="'.$res['cycle_donor_amount'].'" project_donor_id="'.$res['project_donor_id'].'" donor_dropdown_id="'.$res['donor_dropdown_id'].'" project_cycle_donor_id="'.$res['id'].'" >'.$res['donor_dropdown'].'(<i style="display: contents;" class="fa fa-inr" aria-hidden="true"></i>'.$res['cycle_donor_amount'].'),</span> ';
									//$total_cycle_allocate=((int)$total_cycle_allocate + (int)$res['cycle_donor_amount']);
									//if($is_completed=='yes'){
										//$total_cycle_dis=((int)$total_cycle_dis + (int)$res['cycle_donor_amount']);
									//}
								}
							}
							
						}
			
			$content.='</td>';
			
			$content .= '<td class="text-center">';
					if($total_cycle_allocate){
						$content .= '<i class="fa fa-inr" aria-hidden="true"></i> '. $total_cycle_allocate ;
					}else{
						$content .= 'N/A';
					}
			$content .='</td>';
			$content .= '<td class="text-center">' ;
						if($is_payment=='yes'){
							if($total_cycle_dis){
								$content .= '<i class="fa fa-inr" aria-hidden="true"></i> ' .$total_cycle_dis ;
							}else{
								$content .= '<i class="fa fa-inr" aria-hidden="true"></i> 0' ;
							}
						}else{
							$content .= 'N/A';
						}
				
			
			$content .= '</td>';
			
			$content .= '<td class="text-center"><span class="label" style="text-transform: capitalize;background-color: '.constant('STATUS_'.$value['cycle_status']).' !important;">' . $value['cycle_status']. '</span></td>';
			$content .= '<td class="text-center">';
						if($value['cycle_status']=='New'){
						$content.='<a href="javascript:void(0);" data-toggle="modal" data-target="#edit_cycle_popup" class="label label-info edit_cycle_popup ">Edit</a>&nbsp';
						$content.='<a href="javascript:void(0);" class="label label-danger remove_item" project_cycle_id="'.$value['project_cycle_id'].'" project_id="'.$value['project_id'].'" is_cycle_payment="'.$is_payment.'" project_cycle_donor_id_hidden="'.$project_cycle_donor_id_hidden.'">Delete</a>&nbsp;';
						}
				$content.='<a href="'.base_url().'organisation/project/project_cycle_detail?id='.$value['project_cycle_id'].'" class="label label-info">View Cycle</a>';
			
			$content .= '</td>';
			$content .= '</tr>';
			$i++;
		}
		$table_type1 = 'dataTables';
	}else{
		$table_type1 = '';
		//$content .= '<tr style="color: red;" class="darker-on-hover " >
		//<td class="text-center" colspan="10">No data Available</td></tr>';
		
	}
}
$table_type1 = '';
if($sql_query){
	$project_list = $this->db->query($sql_query)->result_array();
	//var_dump($project_list);
	//var_dump($focal_point);
}
?>
	
	
		<div class="box  box-primary collapsed-box">
			<div class="box-header with-border" data-widget="collapse">
				<i class="fa btn btn-box-tool fa_plus fa-plus"></i>
				<h3 class="box-title">Reporting/Payment Cycles</h3>
			</div>
			<div class="box-body">
				<input type="hidden" name="main_project_id" id="main_project_id" value="<?php if($project_list){echo $project_list[0]['id'];}  ?>"> 
				<input type="hidden" name="ngo_id" id="ngo_id" value="<?php if($project_list){echo $project_list[0]['ngo_id'];}  ?>"> 
				<input type="hidden" name="organisation_id" id="organisation_id" value="<?php if($project_list){echo $project_list[0]['organisation_id'];}  ?>"> 
				<input type="hidden" name="superngo_id" id="superngo_id" value="<?php if($project_list){echo $project_list[0]['superngo_id'];}  ?>"> 
				<input type="hidden" name="prop_id" id="prop_id" value="<?php if($project_list){echo $project_list[0]['prop_id'];}  ?>"> 
				<div class="form-group row">
					<label for="registration_date" class="col-md-3 text-right">Total Number of Cycles</label>
					<div class="col-md-9"> 
						<span class="registration_street_address" ><?php echo $num_of_row; ?></span>
					</div>
				</div>
				
				<div class="form-group row">
					<label for="registration_date" class="col-md-3 text-right">Current Cycle</label>
					<div class="col-md-9"> 
						<span class="registration_street_address" >
						<?php 
						$is_com='no';
						$count=0;
						$is_array=[];
							if($cycle_list){
								foreach($cycle_list as $com){
									$is_completed=$com['is_completed'];
									$cycle_name=$com['cycle_name'];
									if($is_completed=='no'){
										array_push($is_array,$cycle_name);
									}
									
								}
								if($is_array){
									echo $is_array[0];
								}
								
								//var_dump($is_array);
							}
						?>
						
						</span>
					</div>
				</div>
			
			
				<div class="table-responsive">
					<table id="blog_view_table" class="<?php echo $table_type1;?> table table-striped table-bordered table-hover" >
						<thead>
							<tr>
								<th class="text-center">Seq</th>
								<th class="text-center">Cycle Name</th>
								<!--<th class="text-center display_none">Cycle started date</th>-->
								<th class="text-center">Cycle end date</th>
								<th class="text-center">Donor(s)</th>
								<th class="text-center">Total Allocated</th>
								<th class="text-center">Disbursed</th>
								<th class="text-center">Cycle status</th>
								<!--<th class="text-center display_none">Is Payment Done</th>-->
								<!--<th class="text-center display_none">Cycle Donor Amount</th>-->
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody class="cycle_table_append">
							<?php echo $content; ?>
						</tbody>
					</table>
				</div><br>
				<?php if($cycle_status=='New'){?>
				<div class="form-group row col-md-12 ">
					<a href="javascript:void(0);" id="donor_popup" data-toggle="modal" data-target="#Create_cycle_popup"  class="btn btn-success Create_cycle_popup"><i class="fa fa-plus"></i></a><label style="margin-left:5px;">Add Cycle to Project</label><br>
				</div>
				<?php }?>
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
										<input type="text" class="form-control date readonly_date project_date" name="project_date" placeholder="date" value="" readonly>
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
														<td class="text-center" main_donor_amount="<?php echo $row['donor_amount'];?>" project_donor_id="<?php echo $row['project_donor_id'];?>" main_donor_id="<?php echo $row['select_donor'];?>"><?php echo $row['code'];?></td>
														<td  class="text-center"><input type="number"  min="0" onkeypress="return (event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control donor_amount"  name="donor_amount" placeholder="Amount" value=""></td>
													</tr>	
																									
													<?php } }?>
												
											</tbody>
										</table>
									</div>
									<div class="donor_amount_greater_error "></div>
									<div class="cycle_payment_donor_error error display_none"><label>All value are required</label></div>
									<div class="form-group row  col-md-12">
										<label>Payment documents required from the NGO<span class="required">*</span></label>
										<input type="text" readonly  class="form-control ngo_payment" name="ngo_payment" placeholder="Ngo payment">
									</div>
								</div>
								
								<div class="form-group row  col-md-12">
									<label>Project Assessment Documents required from the NGO for this cycle<span class="required">*</span></label>
									<input type="text" readonly  class="form-control ngo_doc" name="ngo_doc" placeholder="Ngo documents" ngo_type="" >
								</div>
								<div class="form-group row  col-md-12">
									<label>Documents to be provided by us<span class="required">*</span></label>
									<input type="text" readonly  class="form-control csr_doc" name="csr_doc" placeholder="Csr documents">
								</div>
							</div>
						</div>			
						
					</div>
					
					<div class="reg_detail_err error display_none"><label>Please provide all the Cycle details.</label></div>		
					
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
										<input type="hidden" class="form-control  no_of_cycle"  name="no_of_cycle"  value="">
										<input type="hidden" class="form-control  project_id1"  name="project_id1"  value="">
										<input type="hidden" class="form-control  project_cycle_id1"  name="project_cycle_id1"  value="">
										<input type="hidden" class="form-control  tr_id_modal"  name="tr_id_modal"  value="">
										<input type="hidden" class="form-control  cycle_start_date_modal"  name="cycle_start_date_modal"  value="">
										<input type="text" class="form-control plan_Cycle cycle_name"  name="cycle_name" placeholder="Cycle name" value="">
										<div class="cycle_name_error display_none error">Cycle Name must be at least 3 characters longs</div>
									</div>
								</div>
								<div class="form-group row">
									<label for="startdate" class="col-md-12">Date this cycle ENDS<span class="required">*</span></label>
									<div class="col-md-12"> 
										<input type="text" class="form-control date readonly_date project_date" name="project_date" placeholder="date" value="" readonly>
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
									<div class="donor_amount_greater_error "></div>
									<div class="cycle_payment_donor_error error display_none"><label>All value are required</label></div>
									<div class="form-group row  col-md-12">
										<label>Payment documents required from the NGO<span class="required">*</span></label>
										<input type="text" readonly  class="form-control ngo_payment_edit" name="ngo_payment_edit" placeholder="Ngo payment">
									</div>
								</div>
								
								<div class="form-group row  col-md-12">
									<label>Project Assessment Documents required from the NGO for this cycle<span class="required">*</span></label>
									<input type="text" readonly  class="form-control ngo_doc_edit " name="ngo_doc_edit" placeholder="Ngo documents" ngo_type="" >
								</div>
								<div class="form-group row  col-md-12">
									<label>Documents to be provided by us<span class="required">*</span></label>
									<input type="text" readonly  class="form-control csr_doc_edit" name="csr_doc_edit" placeholder="Csr documents">
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
	$(".date").datepicker({
		changeMonth: true,
		changeYear: true,
		dateFormat: 'yy-mm-dd',
		yearRange : 'c-75:c+75',
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
	
	
	

	$("body").on("click", ".removepara", function () {
		$(this).parent().parent().parent().parent().remove();
	});
	
	/** Start  Save Cycle Popup section*/
	$('body').on('click','.Create_cycle_popup', function () {
		$('#CycleTextBoxContainer .cycle_name').val('');
		$('#CycleTextBoxContainer .project_date').val('');
		var is_payment = $('#CycleTextBoxContainer .is_payment:checked').val();
			console.log(is_payment);
		//if(is_payment=='yes'){
			$('.donor_detail_data tr').each(function(key,val){
				console.log(val);
				var select_donor_text= $(this).find("td:eq(0)").text();
				var select_donor= $(this).find("td:eq(0)").attr('project_donor_id');
				var donor_amount= $(this).find("td:eq(1) input").val('');
			});
					
		//}
		
		
		$('#CycleTextBoxContainer .is_payment_yes').addClass('display_none');
		$('#CycleTextBoxContainer .is_payment').attr('checked', false);
		$('#CycleTextBoxContainer .ngo_doc').val('');
		
		geo_instance.clearSelection();
		geo_instance1.clearSelection();
		geo_instance2.clearSelection();

		//$("#CycleTextBoxContainer .ngo_doc option:selected").removeAttr("selected");
		$('#CycleTextBoxContainer .csr_doc').val('');
		$('#CycleTextBoxContainer .ngo_payment').val('');
		
	
	});
	
	
	$('body').on('click', '.remove_item', function () {	
		if (!confirm("Do you want to delete")) {
            return false;
        }	
		//$.blockUI();
		var project_cycle_donor_id_hidden=0;
        var tr_id = $(this).parent().parent().attr('id');
        var project_id = $(this).attr('project_id');
        var project_cycle_id = $(this).attr('project_cycle_id');
        var is_cycle_payment = $(this).attr('is_cycle_payment');
        project_cycle_donor_id_hidden = $(this).attr('project_cycle_donor_id_hidden');
		console.log(is_cycle_payment);	
		console.log(project_cycle_id);	
		console.log(project_id);	
		var is_error='no';
		console.log("project_cycle_donor_id_hidden");	
		console.log(project_cycle_donor_id_hidden);	
		$(".cycle_table_append #"+tr_id).remove();
		var remove_cycle_donor=[];
		if(project_cycle_donor_id_hidden){
			$(this).parent().parent().find('.donor_detail_data_appen .donor_detail_data_span').each(function(key,value){
					var project_cycle_donor_id= $(this).attr('project_cycle_donor_id');
					console.log("cycle_donor_amount1");
					console.log(project_cycle_donor_id);
					remove_cycle_donor.push({
						project_cycle_donor_id:project_cycle_donor_id
					});
					
			});
		}
		
		if(is_error=='no'){	
			//$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
			$.post(APP_URL + 'organisation/project/remove_project_cycle', {
				remove_cycle_donor:remove_cycle_donor,
				project_id : project_id,
				project_cycle_id : project_cycle_id,
				
				
			},
			function (response) {
				$.unblockUI();
				$('#head_ngo_review').empty();
				if (response.status == 200) {
					var message = response.message;
					$.toaster({ priority :'success', message :'Cycle Deleted Successfully'});
				} else {
					$('#head_ngo_review').html("<div class='alert alert-danger fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
					$("#head_ngo_review").fadeTo(2000, 500).slideUp(500, function(){
						$('#head_ngo_review').empty();
					});
				}	
				
			}, 'json');
		}
		
		
		
		
		
		
		
	});
	
	$('body').on('click','#cycle_submit_by_popup', function () {
		var additional_json = [];		
		var project_id = $('#main_project_id').val();
		var superngo_id = $('#superngo_id').val();
		var organisation_id = $('#organisation_id').val();
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
		var content1 = '';
		var project_cycle_id=0;	
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
						var greater_error='no';
						var amount_error='no';
						var i=0;
						$('.donor_detail_data tr').each(function(key,val){
							var donor_code1= $(this).find("td:eq(0)").text();
							var project_donor_id= $(this).find("td:eq(0)").attr('project_donor_id');
							var main_donor_id= $(this).find("td:eq(0)").attr('main_donor_id');
							var donor_amount= $(this).find("td:eq(1) input").val();
							if(donor_amount){}else{
								is_donor_error='yes';
							}			
							console.log(donor_amount);
								/*if(donor_amount){
									if(parseInt(main_donor_amount)>=parseInt(donor_amount)){
													
									}else{
										is_error='yes';
										greater_error='yes';
										
									}
									if(greater_error=='yes'){
										i++;
										console.log(i)
										if(i==1){
											$(".donor_amount_greater_error").append('<label class="error">It must be less than or equal to the <b>'+main_donor_amount+'</b> allocated for this cycle. It cannot be more.</label>');
										}
									}else{
										$(".donor_amount_greater_error").empty();
									}	
										
								}else{
									is_error='yes';
									is_donor_error='yes';
								}*/
							payment_list.push({
								project_id : project_id,
								//project_cycle_id : project_cycle_id,
								is_payment : is_payment,
								donor_dropdown_id : main_donor_id,
								project_donor_id : project_donor_id,
								donor_code1 :donor_code1 ,
								donor_amount : donor_amount,
								ngo_payment :ngo_payment ,
								//project_cycle_donor_id :project_cycle_donor_id ,
							
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
			var total_cycle_allocate=0;	
			var total_cycle_dis=0;	
			
				/*$('.donor_detail_data tr').each(function(key,val){
					var donor_code1= $(this).find("td:eq(0)").text();
					var project_donor_id= $(this).find("td:eq(0)").attr('project_donor_id');
					var main_donor_id= $(this).find("td:eq(0)").attr('main_donor_id');
					var donor_amount= $(this).find("td:eq(1) input").val();
					
					
					//content+= '<span class="donor_detail_data_span" donor_code1="'+donor_code1+'" cycle_donor_amount1="'+donor_amount+'" project_donor_id="'+project_donor_id+'" donor_dropdown_id="'+main_donor_id+'"  >'+donor_code1+'(<i style="display: contents;" class="fa fa-inr" aria-hidden="true"></i>'+donor_amount+'),</span> ';
					//total_cycle_allocate+= parseInt(donor_amount);
					payment_list.push({
						project_id : project_id,
						//project_cycle_id : project_cycle_id,
						is_payment : is_payment,
						donor_dropdown_id : main_donor_id,
						project_donor_id : project_donor_id,
						donor_code1 :donor_code1 ,
						donor_amount : donor_amount,
						ngo_payment :ngo_payment ,
						//project_cycle_donor_id :project_cycle_donor_id ,
					
					});
				});*/
			
			if(is_error=='no'){	
				//$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
				$.post(APP_URL + 'organisation/project/add_cycle', {
					payment_list:payment_list,
					project_id : project_id,
					//project_cycle_id : project_cycle_id,
					cycle_name : cycle_name,
					cycle_end_date2 : project_date,
					is_payment : is_payment,
					ngo_doc :ngo_doc ,
					csr_doc : csr_doc,
					ngo_payment :ngo_payment ,
					superngo_id :superngo_id ,
					
				},
				function (response) {
					$.unblockUI();
					$('#head_ngo_review').empty();
					if (response.status == 200) {
						var message = response.message;
						project_cycle_id = response.project_cycle_id;
						//$.toaster({ priority :'success', message :'Cycle Updated Successfully'});
					} else {
						$('#head_ngo_review').html("<div class='alert alert-danger fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
						$("#head_ngo_review").fadeTo(2000, 500).slideUp(500, function(){
							$('#head_ngo_review').empty();
						});
					}	
					
				}, 'json');
			}
			
			$(".cycle_table_append 	.main_table_tr").each(function(key ,value) {
			console.log("keyhhhhhhhhhhhhhhhhhh");
				tr_id++;
				console.log(value);
				
			})
			console.log("tr_id");
			console.log(tr_id);
			
			content+='<tr id="tr_id'+tr_id+'" class="main_table_tr">';
			content+='<td  class="text-center no_of_cycle ">'+tr_id+'</td>';
			content+='<td  class="text-center cycle_name ">'+cycle_name+'</td>';
			//content+='<td  class="text-center status "><span class="label" style="text-transform: capitalize;background-color: #1abb9c !important;">New</span></td>';
			
			//content+='<td  class="text-center cycle_start_date1" cycle_start_date_hidden="'+cycle_start_date+'">'+cycle_start_date1+'</td>';
			content+='<td  class="text-center cycle_end_date2" cycle_end_date2_hidden="'+project_date+'">'+project_date1+'</td>';
			//content+='<td  class="text-center is_payment">'+is_payment+'</td>';
			
			
			
			content+='<td  class="text-center">';
			content+='<input type="hidden" class="ngo_doc1" name="ngo_doc1"value="'+ngo_doc+'">';
			content+='<input type="hidden" class="csr_doc1" name="csr_doc1"value="'+csr_doc+'">';
			content+='<input type="hidden" class="is_payment_hidden" name="is_payment_hidden" value="'+is_payment+'">';
			
			if(is_payment=='yes'){
				content+='<input type="hidden" class="ngo_payment1" name="ngo_payment1"value="'+ngo_payment+'">';
					
					$('.donor_detail_data tr').each(function(key,val){
						var donor_code1= $(this).find("td:eq(0)").text();
						var project_donor_id= $(this).find("td:eq(0)").attr('project_donor_id');
						var main_donor_id= $(this).find("td:eq(0)").attr('main_donor_id');
						var donor_amount= $(this).find("td:eq(1) input").val();
						
						
						content+= '<span class="donor_detail_data_span" donor_code1="'+donor_code1+'" cycle_donor_amount1="'+donor_amount+'" project_donor_id="'+project_donor_id+'" donor_dropdown_id="'+main_donor_id+'"  >'+donor_code1+'(<i style="display: contents;" class="fa fa-inr" aria-hidden="true"></i>'+donor_amount+'),</span> ';
						total_cycle_allocate+= parseInt(donor_amount);
						payment_list.push({
							//project_id : project_id,
							//project_cycle_id : project_cycle_id,
							is_payment : is_payment,
							//donor_dropdown_id : main_donor_id,
							project_donor_id : project_donor_id,
							donor_code1 :donor_code1 ,
							donor_amount : donor_amount,
							ngo_payment :ngo_payment ,
							//project_cycle_donor_id :project_cycle_donor_id ,
						
						});
					});
				}else{
				content+='N/A';
				$('.donor_detail_data tr').each(function(key,val){
					var select_donor_text= $(this).find("td:eq(0)").text();
					var select_donor= $(this).find("td:eq(0)").attr('project_donor_id');
					var main_donor_id= $(this).find("td:eq(0)").attr('main_donor_id');
					var donor_amount= $(this).find("td:eq(1)input").val('');
					console.log("select_donor_text");
					console.log(select_donor_text);
					console.log(donor_amount);
					console.log(select_donor);
					
					content1+='<tr>';	
						content1+='<td  class="text-center" project_donor_id="'+select_donor+'" main_donor_id="'+main_donor_id+'">'+select_donor_text+'</td>';
						content1+='<td  class="text-center"><input type="number"  min="0" onkeypress="return (event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control donor_amount"  name="donor_amount" placeholder="Amount" value="'+donor_amount+'"></td>';
					content1+='</tr>';
							
				});
				console.log("content");
				//console.log(content);
				$("#CycleTextBoxContainer1 .donor_detail_data_appen_edit_table").empty();
				$("#CycleTextBoxContainer1 .donor_detail_data_appen_edit_table").append(content1);
					
			}
			content+='</td>';
			
			content += '<td class="text-center">';
					if(total_cycle_allocate){
						content += '<i class="fa fa-inr" aria-hidden="true"></i> '+total_cycle_allocate ;
					}else{
						content += 'N/A';
					}
			content +='</td>';
			content += '<td class="text-center">' ;
						if(is_payment=='yes'){
							if(total_cycle_dis){
								content += '<i class="fa fa-inr" aria-hidden="true"></i> '+total_cycle_dis ;
							}else{
								content += '<i class="fa fa-inr" aria-hidden="true"></i> 0' ;
							}
						}else{
							content += 'N/A';
						}
				
			
			content += '</td>';
			
			
			//var project_cycle_id=0;
			
			content+='<td  class="text-center status "><span class="label" style="text-transform: capitalize;background-color: #1abb9c !important;">New</span></td>';
			content+='<td  class="text-center">';
			content+='<a href="javascript:void(0);" data-toggle="modal" data-target="#edit_cycle_popup" class="label label-info edit_cycle_popup ">Edit</a>&nbsp;<a href="javascript:void(0);" class="label label-danger remove_item">Delete</a>';
			content+='&nbsp;<a href="'+APP_URL+'organisation/project/project_cycle_detail?id='+project_cycle_id+'" class="label label-info">View Cycle</a>';		
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
		var project_id = $('.project_id1').val();
		var project_cycle_id = $('.project_cycle_id1').val();
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
			var no_of_cycle=$('#CycleTextBoxContainer1 .no_of_cycle').val();
			console.log("cycle_name");
			console.log(cycle_name);
			var project_date=$('#CycleTextBoxContainer1 .project_date').val();
			var ngo_doc=$('#CycleTextBoxContainer1 .ngo_doc_edit').val();
			var csr_doc=$('#CycleTextBoxContainer1 .csr_doc_edit').val();
			var cycle_start_date=$('#CycleTextBoxContainer1 .cycle_start_date_modal').val();
			console.log("project_date");
			console.log(project_date);
			var total_cycle_allocate=0;	
			var total_cycle_dis=0;	
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
					var ngo_payment=$('#CycleTextBoxContainer1 .ngo_payment_edit').val();
					if(ngo_payment){}else{
						is_cycle_error = 'yes';
					}
					
					
					$('.donor_detail_data_appen_edit_table tr').each(function(key,val){
						console.log("keylllllllllllllllllllllll");
						console.log(key);
						var select_donor_text= $(this).find("td:eq(0)").text();
						var select_donor= $(this).find("td:eq(0)").attr('project_donor_id');
						var donor_amount= $(this).find("td:eq(1) input").val();
						if(donor_amount){}else{
							is_cycle_error = 'yes';
						}
					
					});
				}
				
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
			content+='<td  class="text-center no_of_cycle">'+no_of_cycle+'</td>';
			content+='<td  class="text-center cycle_name ">'+cycle_name+'</td>';
			
			//content+='<td  class="text-center cycle_start_date1" cycle_start_date_hidden="'+cycle_start_date+'">'+cycle_start_date1+'</td>';
			content+='<td  class="text-center cycle_end_date2" cycle_end_date2_hidden="'+project_date+'">'+project_date1+'</td>';
			//content+='<td  class="text-center is_payment">'+is_payment+'</td>';
			
			content+='<td  class="text-center">';
			content+='<input type="hidden" class="ngo_doc1" name="ngo_doc1"value="'+ngo_doc+'">';
			content+='<input type="hidden" class="csr_doc1" name="csr_doc1" value="'+csr_doc+'">';
			content+='<input type="hidden" class="project_id" name="project_id" value="'+project_id+'">';
			content+='<input type="hidden" class="project_cycle_id" name="project_cycle_id" value="'+project_cycle_id+'">';
			content+='<input type="hidden" class="is_payment_hidden" name="is_payment_hidden" value="'+is_payment+'">';
			/*			
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
						var main_donor_id= $(this).find("td:eq(0)").attr('main_donor_id');
						var donor_amount= $(this).find("td:eq(1) input").val();
						
						content+='<tr>';	
							content+='<td  class="text-center" project_donor_id="'+select_donor+'" main_donor_id="'+main_donor_id+'">'+select_donor_text+'</td>';
							content+='<td  class="text-center"><i class="fa fa-inr" aria-hidden="true"></i>'+donor_amount+'</td>';
						content+='</tr>';
						
					});
				content+='</tbody>';
				content+='</table>';
			}else{
				
				content+='N/A';
				$('.donor_detail_data_appen_edit_table tr').each(function(key,val){
					var select_donor_text= $(this).find("td:eq(0)").text();
					var select_donor= $(this).find("td:eq(0)").attr('project_donor_id');
					var donor_amount= $(this).find("td:eq(1) input").val('');
					
				});
			}
			*/
			if(is_payment=='yes'){
				content += '<input type="hidden" class="ngo_payment1" name="ngo_payment1"value="'+ngo_payment+'">';
				
				$('.donor_detail_data_appen_edit_table tr').each(function(key,val){
						var donor_code1= $(this).find("td:eq(0)").text();
						var project_donor_id= $(this).find("td:eq(0)").attr('project_donor_id');
						var main_donor_id= $(this).find("td:eq(0)").attr('main_donor_id');
						var project_cycle_donor_id= $(this).find("td:eq(0)").attr('project_cycle_donor_id');
						var donor_amount= $(this).find("td:eq(1) input").val();
						
					
						content+= '<span class="donor_detail_data_span" donor_code1="'+donor_code1+'" cycle_donor_amount1="'+donor_amount+'" project_donor_id="'+project_donor_id+'" donor_dropdown_id="'+main_donor_id+'" project_cycle_donor_id="'+project_cycle_donor_id+'" >'+donor_code1+'(<i style="display: contents;" class="fa fa-inr" aria-hidden="true"></i>'+donor_amount+'),</span> ';
						total_cycle_allocate+= parseInt(donor_amount);
						payment_list.push({
							project_id : project_id,
							project_cycle_id : project_cycle_id,
							is_payment : is_payment,
							donor_dropdown_id : main_donor_id,
							project_donor_id : project_donor_id,
							donor_code1 :donor_code1 ,
							donor_amount : donor_amount,
							ngo_payment :ngo_payment ,
							project_cycle_donor_id :project_cycle_donor_id ,
						
						});
				});
			
					console.log("payment_list");
					console.log(payment_list);
			
			}else{
				content +='N/A';
				
				$('.donor_detail_data_appen_edit_table tr').each(function(key,val){
						var donor_code1= $(this).find("td:eq(0)").text();
						var project_donor_id= $(this).find("td:eq(0)").attr('project_donor_id');
						var main_donor_id= $(this).find("td:eq(0)").attr('main_donor_id');
						var project_cycle_donor_id= $(this).find("td:eq(0)").attr('project_cycle_donor_id');
						var donor_amount= $(this).find("td:eq(1) input").val();
						
					
						//content+= '<span class="donor_detail_data_span" donor_code1="'+donor_code1+'" cycle_donor_amount1="'+donor_amount+'" project_donor_id="'+project_donor_id+'" donor_dropdown_id="'+main_donor_id+'" project_cycle_donor_id="'+project_cycle_donor_id+'" >'+donor_code1+'(<i style="display: contents;" class="fa fa-inr" aria-hidden="true"></i>'+donor_amount+'),</span> ';
						//total_cycle_allocate+= parseInt(donor_amount);
						payment_list.push({
							project_id : project_id,
							project_cycle_id : project_cycle_id,
							is_payment : is_payment,
							donor_dropdown_id : main_donor_id,
							project_donor_id : project_donor_id,
							donor_code1 :donor_code1 ,
							donor_amount : donor_amount,
							ngo_payment :ngo_payment ,
							project_cycle_donor_id :project_cycle_donor_id ,
						
						});
				});
			}
			console.log("total_cycle_allocate");
			console.log(total_cycle_allocate);
			content+='</td>';
			
			content += '<td class="text-center">';
					if(total_cycle_allocate){
						content += '<i class="fa fa-inr" aria-hidden="true"></i> '+total_cycle_allocate ;
					}else{
						content += 'N/A';
					}
			content +='</td>';
			content += '<td class="text-center">' ;
						if(is_payment=='yes'){
							if(total_cycle_dis){
								content += '<i class="fa fa-inr" aria-hidden="true"></i> '+total_cycle_dis ;
							}else{
								content += '<i class="fa fa-inr" aria-hidden="true"></i> 0' ;
							}
						}else{
							content += 'N/A';
						}
				
			
			content += '</td>';
			
			
			content+='<td  class="text-center  "><span class="label" style="text-transform: capitalize;background-color: #1abb9c !important;">New</span></td>';
			content+='<td  class="text-center">';
			content+='<a href="javascript:void(0);" data-toggle="modal" data-target="#edit_cycle_popup" class="label label-info edit_cycle_popup ">Edit</a>&nbsp;<a href="javascript:void(0);" class="label label-danger remove_item">Delete</a>';
			content+='&nbsp;<a href="'+APP_URL+'organisation/project/project_cycle_detail?id='+project_cycle_id+'" class="label label-info">View Cycle</a>';		
			content+='</td>';
			//content+='</tr>';
			
		/**ENDS Cycle Creater Looping here*/
		if(is_error=='no'){	
			//$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
			$.post(APP_URL + 'organisation/project/update_cycle_by_project_detail_report_cycle_table', {
				payment_list:payment_list,
				project_id : project_id,
				project_cycle_id : project_cycle_id,
				cycle_name : cycle_name,
				cycle_end_date2 : project_date,
				is_payment : is_payment,
				ngo_doc :ngo_doc ,
				csr_doc : csr_doc,
				ngo_payment :ngo_payment ,
				
			},
			function (response) {
				$.unblockUI();
				$('#head_ngo_review').empty();
				if (response.status == 200) {
					var message = response.message;
					$.toaster({ priority :'success', message :'Cycle Updated Successfully'});
				} else {
					$('#head_ngo_review').html("<div class='alert alert-danger fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
					$("#head_ngo_review").fadeTo(2000, 500).slideUp(500, function(){
						$('#head_ngo_review').empty();
					});
				}	
				
			}, 'json');
		}
		
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
		var no_of_cycle  = $(this).parent().parent().find('.no_of_cycle').text();
		var cycle_name  = $(this).parent().parent().find('.cycle_name ').text();
		//var cycle_start_date = $(this).parent().parent().find('.cycle_start_date1').attr('cycle_start_date_hidden');
		var cycle_end_date2 = $(this).parent().parent().find('.cycle_end_date2').attr('cycle_end_date2_hidden');
		var is_payment = $(this).parent().parent().find('.is_payment_hidden').val();
		var cycle_donor_amount = $(this).parent().parent().find('.cycle_donor_amount').text();
		var ngo_doc = $(this).parent().parent().find('.ngo_doc1').val();
		var csr_doc = $(this).parent().parent().find('.csr_doc1').val();
		var project_id = $(this).parent().parent().find('.project_id').val();
		var project_cycle_id = $(this).parent().parent().find('.project_cycle_id').val();
		get_ngo_doc_data_by_edit(ngo_doc);
		get_csr_doc_edit_data(csr_doc);
		console.log(project_cycle_id)
		console.log(no_of_cycle)
		
		var tr_id = $(this).parent().parent().attr('id');
		console.log(cycle_name);
		console.log(cycle_end_date2);
		console.log(is_payment);
		console.log("ngo_doc");
		console.log(ngo_doc);
		console.log(tr_id);
		$('#CycleTextBoxContainer1 .cycle_name').val(cycle_name);
		//$('#CycleTextBoxContainer1 .cycle_start_date1').val(cycle_start_date1);
		$('#CycleTextBoxContainer1 .project_date').val(cycle_end_date2);
		//$('#CycleTextBoxContainer1 .is_payment').val(is_payment);
		var content='';
		var content1='';
		var ngo_payment='';
		var ngo_payment = $(this).parent().parent().find('.ngo_payment1').val();
			console.log("ngo_paymentggggggggggggggggg");
			console.log(ngo_payment);
			//if(is_payment=='no'){
				//ngo_payment_instance.clearSelection();
			
			//}
			get_ngo_payment_edit_data(ngo_payment);
		
		
		
		if(is_payment=='yes'){
			$('#CycleTextBoxContainer1 #is_payment_data_yes ').prop('checked',true);
			$('#CycleTextBoxContainer1 #is_payment_data_no ').prop('checked',false);
			$('#CycleTextBoxContainer1 .is_payment_yes ').removeClass('display_none');
			
			$('#CycleTextBoxContainer1 .ngo_payment_edit').val(ngo_payment);
			
			$(this).parent().parent().find('.donor_detail_data_appen .donor_detail_data_span').each(function(key,value){
					console.log(value);
				var select_donor_text='';
				var donor_code1= $(this).attr('donor_code1');
				var cycle_donor_amount1= $(this).attr('cycle_donor_amount1');
				var project_donor_id= $(this).attr('project_donor_id');
				var main_donor_id= $(this).attr('donor_dropdown_id');
				var project_cycle_donor_id= $(this).attr('project_cycle_donor_id');
				console.log("cycle_donor_amount1");
				console.log(donor_code1);
				
				
				//var select_donor= $(this).find("td:eq(3)").attr('project_donor_id');
				//var main_donor_id= $(this).find("td:eq(3)").attr('main_donor_id');
				//var donor_amount= $(this).find("td:eq(1)").text();
				//console.log("select_donor_text");
				//console.log(select_donor_text);
				//console.log(donor_amount);
				//console.log(select_donor);
				
				content+='<tr>';	
					content+='<td  class="text-center" project_donor_id="'+project_donor_id+'" main_donor_id="'+main_donor_id+'"  project_cycle_donor_id="'+project_cycle_donor_id+'">'+donor_code1+'</td>';
					content+='<td  class="text-center"><input type="number"  min="0" onkeypress="return (event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control donor_amount"  name="donor_amount" placeholder="Amount" value="'+cycle_donor_amount1+'"></td>';
				content+='</tr>';
							
			});
			console.log("content");
			//console.log(content);
			$("#CycleTextBoxContainer1 .donor_detail_data_appen_edit_table").empty();
			$("#CycleTextBoxContainer1 .donor_detail_data_appen_edit_table").append(content);
		
		}
		if(is_payment=='no'){
			
			$(this).parent().parent().find('.donor_detail_data_appen .donor_detail_data_span').each(function(key,value){
					console.log(value);
				var select_donor_text='';
				var donor_code1= $(this).attr('donor_code1');
				var cycle_donor_amount1= $(this).attr('cycle_donor_amount1');
				var project_donor_id= $(this).attr('project_donor_id');
				var main_donor_id= $(this).attr('donor_dropdown_id');
				var project_cycle_donor_id= $(this).attr('project_cycle_donor_id');
				console.log("cycle_donor_amount1");
				console.log(donor_code1);
				
				content1+='<tr>';	
					content1+='<td  class="text-center" project_donor_id="'+project_donor_id+'" main_donor_id="'+main_donor_id+'"  project_cycle_donor_id="'+project_cycle_donor_id+'">'+donor_code1+'</td>';
					content1+='<td  class="text-center"><input type="number"  min="0" onkeypress="return (event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control donor_amount"  name="donor_amount" placeholder="Amount" value=""></td>';
				content1+='</tr>';
							
			});
			
			var loop_length= $(this).parent().parent().find('.donor_detail_data_appen .donor_detail_data_span').length;
			if(loop_length==0){
				
				$('.donor_detail_data tr').each(function(key,val){
					var select_donor_text= $(this).find("td:eq(0)").text();
					var select_donor= $(this).find("td:eq(0)").attr('project_donor_id');
					var main_donor_id= $(this).find("td:eq(0)").attr('main_donor_id');
					var donor_amount= $(this).find("td:eq(1)input").val('');
					console.log("select_donor_text");
					console.log(select_donor_text);
					console.log(donor_amount);
					console.log(select_donor);
					
					content1+='<tr>';	
						content1+='<td  class="text-center" project_donor_id="'+select_donor+'" main_donor_id="'+main_donor_id+'">'+select_donor_text+'</td>';
						content1+='<td  class="text-center"><input type="number"  min="0" onkeypress="return (event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control donor_amount"  name="donor_amount" placeholder="Amount" value="'+donor_amount+'"></td>';
					content1+='</tr>';
							
				});
			
			}
			
			
			console.log("content");
			//console.log(content);
			$("#CycleTextBoxContainer1 .donor_detail_data_appen_edit_table").empty();
			$("#CycleTextBoxContainer1 .donor_detail_data_appen_edit_table").append(content1);
			
			$('#CycleTextBoxContainer1 #is_payment_data_yes ').prop('checked',false);
			$('#CycleTextBoxContainer1 #is_payment_data_no ').prop('checked',true);
			$('#CycleTextBoxContainer1 .is_payment_yes ').addClass('display_none');
		}
		
		$('#CycleTextBoxContainer1 .ngo_doc_edit').val(ngo_doc);
		$('#CycleTextBoxContainer1 .csr_doc_edit').val(csr_doc);
		$('#CycleTextBoxContainer1 .tr_id_modal').val(tr_id);
		$('#CycleTextBoxContainer1 .no_of_cycle').val(no_of_cycle);
		//$('#CycleTextBoxContainer1 .cycle_start_date_modal').val(project_cycle_id);
		$('#CycleTextBoxContainer1 .project_id1').val(project_id);
		$('#CycleTextBoxContainer1 .project_cycle_id1').val(project_cycle_id);
		//$('#CycleTextBoxContainer .').val(ngo_id);
		
		
	});
	
	
	/* Start multi select Page Add Popup By NGO Doc ------*/
	var geo_instance='';
	get_organisation_data_page_load();
	function get_organisation_data_page_load(){
		$.post(APP_URL + 'organisation/tasks/get_cycle_data_of_documents', {
			'doc_type':'ngo_document_list'
        },
        function (response) {
        	var geoData=response.geoData;
        	var orgGeoData=response.orgGeoData;
        	if(geoData){
				geo_instance = $('.ngo_doc').comboTree({
					source : geoData,
					isMultiple:true,
					cascadeSelect:true,
				});
				//console.log("geo_instance");
				//console.log(geo_instance);
			}
		},'json');
		
	}
	/* End multi select Page Add Popup By NGO Doc ------*/
	
	/* Start multi select Page Edit Popup By NGO Doc ------*/
	
	var ngo_doc_edit_instance='';
	var ngo_doc_edit='';
	var ngo_doc_data_edit=[];
	
	function get_ngo_doc_data_by_edit(ngo_doc_edit){
		
		console.log("ngo_dochhhhhhhhh");
		console.log(ngo_doc_edit);
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
					
					var item22=(item.title);
					var item223=(item.id);
					console.log("item")
					console.log(item22)
					console.log(item)
					if(ngo_doc_edit){
						var sub_status_array = ngo_doc_edit.split(",");
						console.log(sub_status_array);
						if(sub_status_array.length){
							$.each(sub_status_array, function(index1, item1) {
								var item12=$.trim(item1);
								console.log("item12")
								console.log(item12)
							
								if(item22==item12){
									console.log("Match data");
									ngo_doc_data_edit.push(item223)
								}
							});
						}
					}
					
				
				});
				console.log("ss");
				console.log(ngo_doc_data_edit);
			}
				/*ngo_doc_edit_instance = $('.ngo_doc_edit').comboTree({
					source : geoData,
					isMultiple: true,
					cascadeSelect: false,
					selected: ngo_doc_data_edit
				});
			
				ngo_doc_edit_instance.destroy();*/
				
				ngo_doc_edit_instance = $('.ngo_doc_edit').comboTree({
					source : geoData,
					isMultiple: true,
					cascadeSelect: false,
					selected: ngo_doc_data_edit
				});
		
			console.log("ngo_doc_edit_instance")
			console.log(ngo_doc_edit_instance)
			
			if(ngo_doc_data_edit){
				ngo_doc_edit_instance.setSelection(ngo_doc_data_edit);
			}
			
			
        },'json');
		
	}
	/*End multi select Page Edit Popup By NGO Doc ------*/



	/*multi select*/
	
	
	
	var geo_instance1 ='';
	get_csr_doc_data1();
	function get_csr_doc_data1(){
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
			  	//selected: orgstaffData1
			});
			
		},'json');
		
	}
	
	/**Start Edit CSR Doc  Edit**/
	var csr_doc_instance='';
	var csr_doc_data_edit=[];
	function get_csr_doc_edit_data(csr_doc){
		//payment_processing_doc , ngo_document_list, csr_document_list
		$.post(APP_URL + 'organisation/tasks/get_cycle_data_of_documents', {
			'doc_type':'csr_document_list'
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
					if(csr_doc){
						var sub_status_array = csr_doc.split(",");
						console.log(sub_status_array);
						if(sub_status_array.length){
							$.each(sub_status_array, function(index1, item1) {
							var item12=$.trim(item1);
								if(item22==item12){	
									csr_doc_data_edit.push(item223)
								}
							});
						}
					}
							
				});
			}
        	csr_doc_instance = $('.csr_doc_edit').comboTree({
			  	source : geoData,
			  	isMultiple:true,
			  	cascadeSelect:true,
			  	//selected: csr_doc_data_edit
			});
			if(csr_doc_data_edit){
				csr_doc_instance.setSelection(csr_doc_data_edit);
			}
			
		},'json');
		
	}
	
	/*multi select*/
	
	var geo_instance2 ='';
	get_ngo_payment_data2();
	function get_ngo_payment_data2(){
		//payment_processing_doc , ngo_document_list, csr_document_list
		$.post(APP_URL + 'organisation/tasks/get_cycle_data_of_documents', {
			'doc_type':'payment_processing_doc'
        },
        function (response) {
        	var geoData=response.geoData;
        	var orgGeoData=response.orgGeoData;
			if(geoData){
				geo_instance2 = $('.ngo_payment').comboTree({
					source : geoData,
					isMultiple:true,
					cascadeSelect:true,
					//selected: orgstaffData2
				});
			}
			
        },'json');
		
	}
	/**Edit Payment doc */
	var orgstaffData2=[];
	var ngo_payment_instance='';
	function get_ngo_payment_edit_data(ngo_payment){
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
					if(ngo_payment){
						var sub_status_array = ngo_payment.split(",");
						console.log(sub_status_array);
						if(sub_status_array.length){
							$.each(sub_status_array, function(index1, item1) {
							var item12=$.trim(item1);
							console.log(item12)
								if(item22==item12){	
									orgstaffData2.push(item223)
								}
							});
						}
					}
				});
			}
        	ngo_payment_instance = $('.ngo_payment_edit').comboTree({
			  	source : geoData,
			  	isMultiple:true,
			  	cascadeSelect:true,
			  	selected: orgstaffData2
			});
			if(orgstaffData2){
				ngo_payment_instance.setSelection(orgstaffData2);
			}
			
        },'json');
		
	}
	
	
	
	
});
</script>	
	
