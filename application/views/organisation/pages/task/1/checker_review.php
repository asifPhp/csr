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
.is_edit_data{
	background-color: white !important;
    border: none !important;
    color: cornflowerblue !important;
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
		$task_type = $data_value[0]['task_type'];
		$project_cycle_id = $data_value[0]['project_cycle_id'];
		$additional_json = '';
		
		$is_cheker_radion='';
		$is_cheker_radion_comments_change='';
		$target = 'target="_blank"';
		
		$donor_amount_list='';
		$was_internal_radio='';
		$comments_was_focal_no='';
		$comments_is_cheker_radion_no='';
		$comments_was_internal_radio_no='';
			
			
		
		if(isset($data_value[0]['additional_json'])){
			$additional_json = json_decode($data_value[0]['additional_json']);
			//var_dump($additional_json);
			if(isset($additional_json[0]->is_cheker_radion)){
				$is_cheker_radion = $additional_json[0]->is_cheker_radion;
			}
			
			if(isset($additional_json[0]->is_cheker_radion_comments_change)){
				$is_cheker_radion_comments_change = $additional_json[0]->is_cheker_radion_comments_change;
			}
			
			if(isset($additional_json[0]->donor_amount_list)){
				$donor_amount_list = $additional_json[0]->donor_amount_list;
				//var_dump($donor_amount_list);
			}
			if(isset($additional_json[0]->was_internal_radio)){
				$was_internal_radio = $additional_json[0]->was_internal_radio;
				//var_dump($donor_amount_list);
			}
			if(isset($additional_json[0]->comments_was_focal_no)){
				$comments_was_focal_no = $additional_json[0]->comments_was_focal_no;
				//var_dump($donor_amount_list);
			}
			if(isset($additional_json[0]->comments_is_cheker_radion_no)){
				$comments_is_cheker_radion_no = $additional_json[0]->comments_is_cheker_radion_no;
				//var_dump($donor_amount_list);
			}
			
			if(isset($additional_json[0]->comments_was_internal_radio_no)){
				$comments_was_internal_radio_no = $additional_json[0]->comments_was_internal_radio_no;
				//var_dump($donor_amount_list);
			}
					
			
		
		}else{
			
			$is_cheker_radion='';
			$is_cheker_radion_comments_change='';
			$target = 'target="_blank"';
			
			$donor_amount_list='';
			$was_internal_radio='';
			$comments_was_focal_no='';
			$comments_is_cheker_radion_no='';
			$comments_was_internal_radio_no='';
			
			
		}
	}else{
			
		$project_cycle_id='';
		$task_type='';
		$donor_amount_list='';
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
		//$ngo_status='';
		$ngo_status ='';
		$rejection_records='';
		$rejection_ngo='';
			
		$is_cheker_radion='';
		$is_cheker_radion_comments_change='';
		$target = 'target="_blank"';
		
		$donor_amount_list='';
		$was_internal_radio='';
		$comments_was_focal_no='';
		$comments_is_cheker_radion_no='';
		$comments_was_internal_radio_no='';
			
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
					<input type="hidden" class="form-control" id="project_cycle_id_hidden" name="project_cycle_id_hidden" value="<?php echo $project_cycle_id;?>">
					<div class="row">
						<div class="col-lg-6">
							<?php 
								if($task_type=='pmp'){
									$sql_internal="SELECT additional_json,org_task_id FROM `org_tasks` WHERE org_id=$org_id AND prop_id=$prop_id AND org_task_list_id=13";
									$task_data_fetch_insernal = $this->db->query($sql_internal)->result_array();
									if($task_data_fetch_insernal){	
										$data['internal_data']=$task_data_fetch_insernal[0]['additional_json'];
										if($data['internal_data']!=''){
											$this->load->view('organisation/pages/task/1/view_internal_verification',$data);
										}
									}
									
									$sql3="SELECT additional_json FROM `org_tasks` WHERE org_id=$org_id AND prop_id=$prop_id AND org_task_list_id=12";
									$task_data_fetch = $this->db->query($sql3)->result_array();
									if($task_data_fetch){	
										$data['project_cycle_data']=$task_data_fetch[0]['additional_json'];
										if($data['project_cycle_data']!=''){
											$this->load->view('organisation/pages/task/1/view_focal_point',$data);
										}
									}
								}
								
								
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
								
								
								
								$this->load->view('organisation/pages/task/ngo_information_collapse'); ?>
						</div>
						<div class="col-lg-6">
							<?php $this->load->view('organisation/pages/task/Task_cycle_details_review'); ?>
														
							
							<div class="box box-primary ">
								<div class="box-header with-border " data-widget="collapse">
									<i class="fa btn btn-box-tool fa_plus fa-minus"></i>
									<h3 class="box-title"><?php echo $data_value[0]['org_task_label']; ?></h3>
								</div>
								<div class="box-body" >
								
									<div class="form-group row ">
										<div>
											<label for="was_review" class="col-md-12 desk-review" id="was_review">Was the Internal Verification done satisfactorily?<span class="required">*</span>
											</label>
										</div>
									 	<div class="col-md-12">
											<label style="font-weight: 400;">
												<input type="radio" class="was_internal_radio" name="was_internal_radio" value="Yes"  <?php if($was_internal_radio == 'Yes'){echo 'checked';}?>>&nbsp;
												<span>Yes</span> 
											</label>
											<label style="font-weight: 400;">
												<input type="radio"  class="was_internal_radio"  name="was_internal_radio" value="No"  <?php if($was_internal_radio == 'No'){echo 'checked';}?>>
												<span>No</span> 
											</label>
											<div class="was_internal_radio_error display_none "><label class="error"> Please Select any one</label></div>
										</div>
									</div>
									
									<div class="form-group row was_internal_radio_no <?php if($was_internal_radio=='No'){}else{ echo 'display_none';}?> " >
										<div class="col-md-12">
											<label for="comments" >What needs to be changed/improved?</label><br>
											<label class="input_description">This will be shared with the Reviewer to help them make the necessary improvements</label>
										 	<textarea id="comments_was_internal_radio_no" name="comments_was_internal_radio_no"  class="form-control"  rows="3" placeholder="Enter details here"><?php echo $comments_was_internal_radio_no;?></textarea>
										</div>	
									</div>
									
									
									<div class="form-group row  was_internal_radio_yes <?php if($was_internal_radio=='Yes'){}else{ echo 'display_none';}?> ">
										<div >
											<label for="was_review" class="col-md-12 desk-review" id="was_review">Should the payment be made for this cycle?<span class="required">*</span>
											</label>
										</div>
									 	<div class="col-md-12">
											<label style="font-weight: 400;">
												<input type="radio" class="is_cheker_radion" name="is_cheker_radion" value="Yes"  <?php if($is_cheker_radion == 'Yes'){echo 'checked';}?>>&nbsp;
														<span>Yes</span> 
											</label>
											<label style="font-weight: 400;">
												<input type="radio"  class="is_cheker_radion"  name="is_cheker_radion" value="No"  <?php if($is_cheker_radion == 'No'){echo 'checked';}?>>
											                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  			<span>No</span> 
											</label>
											<label style="font-weight: 400;">
												<input type="radio"  class="is_cheker_radion"  name="is_cheker_radion" value="Change" <?php if($is_cheker_radion == 'Change'){echo 'checked';}?>>
													<span>Change Amount to be given</span> 
											</label> 
											<div class="is_cheker_radion_error display_none "><label class="error"> Please Select any one</label></div>
										</div>
												
									</div>
									<?php 
											//var_dump($project_cycle_id);
										if($project_id>0 and $project_cycle_id){
											$sql="SELECT * FROM project_cycle_donor_details WHERE project_id = $project_id AND project_cycle_id=$project_cycle_id ";
											$db_result = $this->db->query($sql)->result_array();
										}
										
									?>
									<div class="was_internal_radio_yes <?php if($was_internal_radio == 'Yes'){}else{ echo 'display_none'; }?>">	
										
										<div class="is_cheker_radion_change <?php if($is_cheker_radion == 'Change'){}else{ echo 'display_none'; }?>">
											<div class="form-group row  " >
												<div class="col-md-12"> 
													<label for="comments" >Enter the new amount for each donor</label>
													<label class="input_description">It must be less than or equal to the amount already allocated for this cycle. It cannot be more.</label>
													<div class="table-responsive">
														<table id="blog_view_table" class=" table table-striped table-bordered table-hover" >
															<thead>
																<tr>
																	<th class="text-center">Donor</th>
																	<th class="text-center">Amount</th>
																</tr>
															</thead>
															<tbody class="donor_amount_table">
																
																<?php if(!$db_result){?>
																	<td class="text-center" colspan="5" >No data Available</td>
																<?php }
																	if($db_result and $db_result>0){
																		//var_dump($db_result);die;
																		$donor_amount='';
																		$code='';
																		foreach($db_result as $row){
																			//var_dump($row);
																			$donor_id=$row['donor_dropdown_id'];
																			$sql6="SELECT code FROM donor WHERE donor_id=$donor_id";
																			$donor_list = $this->db->query($sql6)->result_array();
																			if($donor_list){
																				$code=$donor_list[0]['code'];
																			}
																			$donor_amount=$row['cycle_donor_amount'];
																			
																			if($donor_amount_list){
																				foreach($donor_amount_list as $res){
																					//var_dump($res);
																					//var_dump($row['id']);
																					if($res->project_cycle_donor_id==$row['id']){
																						//var_dump("Matcht yes");
																						$donor_amount=$res->donor_amount;
																					}
																				}
																			}
																			
																		//var_dump($row);
																	?>
																	<tr>
																		<td  class="text-center" project_cycle_donor_id=<?php echo $row['id'];?>  project_id=<?php echo $row['project_id'];?> project_cycle_id=<?php echo $row['project_cycle_id'];?> ><?php echo $code;?></td>
																		<td  class="text-center"><input type="number" class="form-control donor_amount" name="donor_amount" placeholder="Amount" value="<?php echo $donor_amount;?>">
																		<div class="amount_error display_none "><label class="error">Amount is required.</label></div>	
																		</td>
																	</tr>	
																	
																													
																	<?php } }?>
																	
															</tbody>
														</table>
													</div>
													<div class="greater_error "></div>	
													
												</div>
											</div>
											
											<div class="form-group row " >
												<div class="col-md-12">
													<label for="comments">Reasons for amount change</label>
													<textarea id="is_cheker_radion_comments_change" name="is_cheker_radion_comments_change"  class="form-control"  rows="3" placeholder="Enter details here"><?php echo $is_cheker_radion_comments_change;?></textarea>
												</div>	
											</div>
										</div>
																				
										<div class="form-group row is_cheker_radion_no <?php if($is_cheker_radion== 'No'){}else{ echo 'display_none'; }?>" >
											<div class="col-md-12">
												<label for="comments">Why not?</label>
												<textarea id="comments_is_cheker_radion_no" name="comments_is_cheker_radion_no"  class="form-control"  rows="3" placeholder="Enter details here"><?php echo $comments_is_cheker_radion_no;?></textarea>
											</div>	
										</div>
									</div>

									<div class="form-group row ">	 
										<div class="col-md-12">
										<div>&nbsp;</div>
											<div class="button " style="margin-left: 17px;">
												<button type="button" <?php if($status == 'Completed'){echo 'disabled';}?>  id="save<?php if($status == 'Completed'){echo 'disabled';}?>" class="btn btn-primary">Save</button>
												<button type="button" <?php if($status == 'Completed'){echo 'disabled';}?>  id="submit_focal_point<?php if($status == 'Completed'){echo 'disabled';}?>" class="btn btn-success">Submit</button>
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

<script>

$('document').ready(function(){
	/* $('body').on('click','#payment_radio_no',function(){
		$('.is_payment_disp').removeClass('display_none'); 
	}); 
	 
    $('body').on('click','# ',function(){
		$('.is_payment_disp').addClass('display_none'); 

	});
	*/
	
	
	$('body').on('click','.is_cheker_radion', function () {
		var radio_value = $('input[name="is_cheker_radion"]:radio:checked').val();
		
	   console.log(radio_value);
	   if(radio_value == 'Change'){
			
			$('.is_cheker_radion_change').removeClass('display_none')
			$('.is_cheker_radion_no').addClass('display_none')
			
	   }else if(radio_value == 'No'){
			$('.is_cheker_radion_no').removeClass('display_none')
			$('.is_cheker_radion_change').addClass('display_none')
		   
	   }else{
			$('.is_cheker_radion_change').addClass('display_none')
			$('.is_cheker_radion_no').addClass('display_none')
	   }
	});
	
	
	$('body').on('click','.was_internal_radio', function () {
		var radio_value = $('input[name="was_internal_radio"]:radio:checked').val();
		
	   console.log(radio_value);
	   if(radio_value == 'No'){
		   var radio_value = $('input[name="is_cheker_radion"]:radio:checked').val();
		
			console.log(radio_value);
			if(radio_value == 'Change'){
				$('.is_cheker_radion_change').addClass('display_none');
				$('#is_cheker_radion_comments_change').val('');
				
			}if(radio_value == 'No'){
				$('.is_cheker_radion_no').addClass('display_none');
				$('#comments_is_cheker_radion_no').val('');
				
			}
		   
			$('input[name="is_cheker_radion"]:radio:checked').attr('checked', false);
			
			$('.was_internal_radio_no').removeClass('display_none')
			$('.was_internal_radio_yes').addClass('display_none')
		
		}else{
			$('.was_internal_radio_no').addClass('display_none')
			$('.was_internal_radio_yes').removeClass('display_none')
		}
	});
	
	
	
	
	$('body').on('click','#save', function () {
		var is_error = 'no';		
		var org_task_id=$('#org_task_id').val();
		var org_task_list_id=$('#org_task_list_id').val();
		var org_id=$('#org_id').val();
		var ngo_id=$('#ngo_id').val();
		var prop_id=$('#prop_id').val();
		var superngo_id=$('#superngo_id').val();
		var org_staff_id=$('#org_staff_id').val();
		var additional_json = [];	
		var was_internal_radio=$('input[name="was_internal_radio"]:radio:checked').val();
		
		if(was_internal_radio){
			if(was_internal_radio=='Yes'){
				var is_cheker_radion=$('input[name="is_cheker_radion"]:radio:checked').val();
				if(is_cheker_radion){
					if(is_cheker_radion=='Change'){
						var amount_erro = 'no';	
						var donor_amount_list = [];
						var is_cheker_radion_comments_change = $('#is_cheker_radion_comments_change').val();
						
						
							$(".donor_amount_table tr").each(function(){
								var project_cycle_donor_id= $(this).find("td:eq(0)").attr('project_cycle_donor_id');
								var project_cycle_id= $(this).find("td:eq(0)").attr('project_cycle_id');
								var donor_amount= $(this).find("td:eq(1) input").val();
								donor_amount_list.push({
									project_cycle_donor_id : project_cycle_donor_id,
									project_cycle_id : project_cycle_id,
									donor_amount : donor_amount,
								});		
							});
							
							console.log(donor_amount_list);
							additional_json.push({
								donor_amount_list:donor_amount_list,
								was_internal_radio:was_internal_radio,
								is_cheker_radion:is_cheker_radion,
								is_cheker_radion_comments_change:is_cheker_radion_comments_change,
								
							});
					}else if(is_cheker_radion=='No'){
						var comments_is_cheker_radion_no = $('#comments_is_cheker_radion_no').val();
						additional_json.push({
							was_internal_radio:was_internal_radio,
							is_cheker_radion:is_cheker_radion,
							comments_is_cheker_radion_no:comments_is_cheker_radion_no,
						});
					}else{
						additional_json.push({
							was_internal_radio:was_internal_radio,
							is_cheker_radion:is_cheker_radion,
						});
					}  
				}  
			}else{
				var comments_was_internal_radio_no = $('#comments_was_internal_radio_no').val();
				additional_json.push({
					was_internal_radio:was_internal_radio,
					comments_was_internal_radio_no:comments_was_internal_radio_no,
					
				});
			} 
		}  
			
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
		
		
		
	});	
	
	$('body').on('click','#submit_focal_point', function () {
			
			var is_error='no';
			var org_task_id=$('#org_task_id').val();
			var org_task_list_id=$('#org_task_list_id').val();
			var org_id=$('#org_id').val();
			var ngo_id = $('#ngo_id').val();
			var prop_id=$('#prop_id').val();
			var superngo_id=$('#superngo_id').val();
			var org_staff_id=$('#org_staff_id').val();
			var project_id=$('#project_id').val();
			var project_cycle_id_hidden=$('#project_cycle_id_hidden').val();
			var additional_json = [];	
			var was_internal_radio=$('input[name="was_internal_radio"]:radio:checked').val();
			var comments_was_internal_radio_no='';
			if(was_internal_radio){
				$(".was_internal_radio_error").addClass('display_none');
				if(was_internal_radio=='Yes'){
					var is_cheker_radion=$('input[name="is_cheker_radion"]:radio:checked').val();
					if(is_cheker_radion){
						$(".is_cheker_radion_error ").addClass('display_none');
						
						if(is_cheker_radion=='Change'){
							var amount_erro = 'no';	
							var donor_amount_list = [];
							var is_cheker_radion_comments_change = $('#is_cheker_radion_comments_change').val();
							
							
								$(".donor_amount_table tr").each(function(){
									var project_cycle_donor_id= $(this).find("td:eq(0)").attr('project_cycle_donor_id');
									var project_cycle_id= $(this).find("td:eq(0)").attr('project_cycle_id');
									var donor_amount= $(this).find("td:eq(1) input").val();
									donor_amount_list.push({
										project_cycle_donor_id : project_cycle_donor_id,
										project_cycle_id : project_cycle_id,
										donor_amount : donor_amount,
									});		
								});
								
								console.log(donor_amount_list);
								additional_json.push({
									donor_amount_list:donor_amount_list,
									was_internal_radio:was_internal_radio,
									is_cheker_radion:is_cheker_radion,
									is_cheker_radion_comments_change:is_cheker_radion_comments_change,
									
								});
						}else if(is_cheker_radion=='No'){
							var comments_is_cheker_radion_no = $('#comments_is_cheker_radion_no').val();
							additional_json.push({
								was_internal_radio:was_internal_radio,
								is_cheker_radion:is_cheker_radion,
								comments_is_cheker_radion_no:comments_is_cheker_radion_no,
							});
						}else{
							additional_json.push({
								was_internal_radio:was_internal_radio,
								is_cheker_radion:is_cheker_radion,
							});
						}  
					}else{
						is_error='yes';
						$(".is_cheker_radion_error ").removeClass('display_none');
					}  
				}else{
					comments_was_internal_radio_no = $('#comments_was_internal_radio_no').val();
					additional_json.push({
						was_internal_radio:was_internal_radio,
						comments_was_internal_radio_no:comments_was_internal_radio_no,
						
					});
				} 
			}else{
				is_error='yes';
				$(".was_internal_radio_error").removeClass('display_none');
			}
			
			console.log("additional_json");
			console.log(additional_json);
			if(is_error=='no'){
				$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
				
				$.post(APP_URL + 'organisation/tasks/change_status_onsubmit_by_checker_review', {
						additional_json:additional_json,
						org_task_id:org_task_id, 
						org_task_list_id:org_task_list_id,
						org_id:org_id,
						ngo_id:ngo_id,
						prop_id:prop_id,
						superngo_id:superngo_id,
						org_staff_id:org_staff_id,	
						project_id:project_id,	
						was_internal_radio:was_internal_radio,	
						comments_was_internal_radio_no:comments_was_internal_radio_no,	
						project_cycle_id_hidden:project_cycle_id_hidden,	
						//cycle_payment_yes_no:cycle_payment_yes_no,	
					 },
				function (response) {
					$.unblockUI();
					$("html, body").animate({scrollTop: 0}, "slow");
					$('#head_ngo_review').empty();
					if (response.status ==200) {
						var message = response.message;
						
						$('#head_ngo_review').html("<div class='alert alert-success fade show in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + message + "</strong></div>");
						$("#head_ngo_review").fadeTo(2000, 500).slideUp(500, function(){
							$('#head_ngo_review').remove();
							var is_cycle_complete = response.is_cycle_complete;
							var cycle_payment_yes_no = response.cycle_payment_yes_no;
							var org_task_id = response.org_task_id;
							if(cycle_payment_yes_no=='yes' && is_cycle_complete=='no'){
								window.location.href=APP_URL+"organisation/tasks/mytasks";
							}else if(cycle_payment_yes_no=='no' && is_cycle_complete=='no'){
								window.location.href=APP_URL+"organisation/tasks/mytasks";//detail?id="+org_task_id+"&sourse=tasks";
							}else{
								window.location.href=APP_URL+"organisation/tasks/mytasks";
							}
							
							
						})
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
	
});

</script>

