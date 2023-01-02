<style>
#headerMsg{	margin:20px 0px;}
.dataTables-example th{	text-align:center;}
.ibox-content{padding: 10px;}
[data-toggle="collapse"] .fas:before {  
  content: "\f055";
}

[aria-expanded="true"] .fas:before {  
  content: "\f056";
}

[data-toggle="collapse"].collapsed .fas:before {
  content: "\f055";
}
.fa_plus{float: right;
	font-size: 12px !important;}

</style>

 <?php
	if($data_value){
		//var_dump($data_value);
		$superngo_id = $data_value[0]['superngo_id']; 
		$comments = $data_value[0]['comments'];
		$org_task_id = $data_value[0]['org_task_id']; 
		$project_id=$data_value[0]['project_id'];
		$org_staff_id=$data_value[0]['org_staff_id'];
		$prop_id=$data_value[0]['prop_id'];
		$org_id=$data_value[0]['org_id'];
		$requested_by=$data_value[0]['requested_by'];
		$requested_on=$data_value[0]['requested_on'];
		$requested_details=$data_value[0]['requested_details'];
		$additional_json = '';
		$proposal_is_recommended = '';
		if($data_value[0]['additional_json']){
			$additional_json = json_decode($data_value[0]['additional_json']);
			if(isset($additional_json[0]->proposal_is_recommended)){
				$proposal_is_recommended = $additional_json[0]->proposal_is_recommended;
			}
		}
		$testing = '';
		if($data_value[0]['additional_json']){
			$additional_json = json_decode($data_value[0]['additional_json']);
			if(isset($additional_json[0]->testing)){
				$testing = $additional_json[0]->testing;
			}
		}
	}else{
		$superngo_id='';
		$comments='';
		$org_task_id='';
		$project_id='';
		$superngo_id='';
		
		$requested_by='';
		$requested_on='';
		$requested_details='';
		
	}
	//var_dump($testing);
	//var_dump($proposal_is_recommended);
    //$title=$data_value[0]['title'];
	
	//var_dump($superngo_id);
	$superngo_details = $this->db->get_where('superngo',array('id' =>$superngo_id))->result();
	$proposal=$this->db->get_where('proposal')->result();
	
?>
 <?php
$status1='Complete';
$status='STATUS_'.$status1;
?>
         
				<div class="box box-primary">
					<div class="box-header with-border" data-widget="collapse">
						<i class="fa btn btn-box-tool fa_plus fa-minus"></i>
						<h3 class="box-title">Task details</h3>
					</div>
					<div class="box-body" >
						<div class="form-group row">
							<label for="organisation_id" class="col-md-3 text-right">Task</label>
								<div class="col-md-9"> 
									<span class="is_edit_hide"><?php echo $data_value[0]['org_task_label']; ?></span>
								</div>
						</div>
						<div class="form-group row">
							<label for="organisation_id" class="col-md-3 text-right">Proposal Name</label>
								<div class="col-md-9"> 
									<span class="is_edit_hide"><?php echo $data_value[0]['prop_name']; ?></span>
								</div>
						</div>
						<div class="form-group row">
								<label for="organisation_id" class="col-md-3 text-right">NGO Name</label>
							<div class="col-md-9"> 
									<span class="is_edit_hide"><?php echo $data_value[0]['ngo_name']; ?></span>
							</div>
						</div>
						<div class="form-group row">
								<label for="organisation_id" class="col-md-3 text-right">Assigned To</label>
							<div class="col-md-9"> 
								<span class="is_edit_hide"><?php if($assigned_to){ echo $assigned_to;} ?></span>&nbsp;
								<a href="javascript:void(0);" class="change_assignee_task_detail2" data-toggle="modal" data-target="#browseChangeAssignee2" name="<?php echo $org_task_id;?>"  org_staff_id="<?php echo $org_staff_id;?>" value="" prop_id="<?php echo $prop_id;?>" org_id="<?php echo $org_id;?>" ><span class="label label-orange">Change Assignee</span></a>
							</div>
						</div>
						
						<div class="form-group row">
								<label for="organisation_id" class="col-md-3 text-right">Assigned on</label>
							<div class="col-md-9"> 
									<span class="is_edit_hide"><?php
										$a_date=$data_value[0]['created_date'];
									 if($a_date!=''){ echo date_formats($a_date); }?></span> 
							</div>
						</div>
						<div class="form-group row">
								<label for="organisation_id" class="col-md-3 text-right">Last Updated On</label>
							<div class="col-md-9"> 
									<span class="is_edit_hide"><?php if($data_value[0]['last_updated_date']!=''){ echo date_time_format($data_value[0]['last_updated_date']);} ?></span> 
							</div>
						</div>
							<div class="form-group row">
								<label for="organisation_id" class="col-md-3 text-right">Due Date</label>
							<div class="col-md-9"> 
									<span class="is_edit_hide"><?php 
									if($data_value[0]['due_date']){ echo date_formats($data_value[0]['due_date']);} ?></span>
							</div>
							</div>
						<div class="form-group row">
								<label for="organisation_id" class="col-md-3 text-right">Status</label>
							<div class="col-md-9"> 
									<span class="is_edit_hide label " style="background-color: <?php echo constant('STATUS_'.$data_value[0]['status']);?> !important;"><?php echo $data_value[0]['status']; ?></span>  
							</div>
						</div>
						<?php if($proposal_is_recommended && $data_value[0]['org_task_label'] != 'Proposal Initial Review'){?>
						<div class="form-group row">
								<label for="organisation_id" class="col-md-12"><span>Is proposal recommended for approval: <?php echo $proposal_is_recommended; ?></span>  </label>
							
						</div>
						<?php } ?>
							
<?php 
	//$this->db->limit(1);
	
	//$db_result = $this->db->get_where('project_cycle_details',array('project_id' => $project_id,'is_completed'=>'no'));
	//$result=$db_result->result_array();
	
	$sql5="SELECT * FROM project_cycle_details WHERE project_id=$project_id AND is_completed='no' ORDER BY project_cycle_id ASC LIMIT 1";
	$result = $this->db->query($sql5)->result_array();
	
	//var_dump($result);
?>
				<?php if($result && $result> 0) {?>
						<div class="box-header ">
							<h3 class="box-title">Cycle Details</h3>
						</div>
						 <input type="hidden" name="project_cycle_id" id="project_cycle_id" value="<?php echo $result[0]['project_cycle_id'];?>">
						 <input type="hidden" name="cycle_payment_yes_no" id="cycle_payment_yes_no" value="<?php echo $result[0]['is_payment'];?>">
           					 <div class="form-group row">
								<label for="organisation_id" class="col-md-3 text-right">Cycle Name</label>
							<div class="col-md-9"> 
								<span class="is_edit_hide"><?php echo $result[0]['cycle_name']; ?></span>
							</div>
							</div>
							 <div class="form-group row">
								<label for="organisation_id" class="col-md-3 text-right">Cycle Completion Date</label><br>
								<div class="col-md-9"> 
									<span class="is_edit_hide"><?php echo date_formats($result[0]['cycle_end_date2']); ?></span>
								</div>
							</div> 
							
							<?php if($result[0]['is_payment']=='yes'){
									$is_payment=$result[0]['is_payment'];
									$project_cycle_id=$result[0]['project_cycle_id'];
									$project_id=$result[0]['project_id'];
									$sql="SELECT * FROM project_donors WHERE project_id = $project_id ";
									$donor_data = $this->db->query($sql)->result_array();
									//var_dump($donor_data);
								if($donor_data){
							?>
							<div class="form-group row">
								<label for="title" class="col-md-3 text-right">Donor</label>
								<div class="col-md-9"> 
									<div class="table-responsive">
										<table id="blog_view_table" class=" table table-striped table-bordered table-hover" >
											<thead>
												<tr>
													<th class="text-center">Donor</th>
													<th class="text-center">Amount</th>
													<th class="text-center">Vendor Code</th>
													
												</tr>
											</thead>
											<tbody class="table_value">
												<?php if(!$donor_data){?>
													<td class="text-center" colspan="5" >No data Available</td>
												<?php }
													if($donor_data and $donor_data>0){
														foreach($donor_data as $row){
															//var_dump($row);
															$donor_id=$row['select_donor'];
															$sql6="SELECT donor_id,code FROM donor WHERE donor_id=$donor_id";
															$donor_list = $this->db->query($sql6)->result_array();
														//var_dump($donor_list);
													?>
													<tr>
														<td  class="text-center"><?php echo $donor_list[0]['code'];?></td>
														<td  class="text-center"><i class="fa fa-inr" aria-hidden="true"></i><?php echo $row['donor_amount'];?></td>
														<td  class="text-center"><?php if($row['vendor_code']!=''){ echo $row['vendor_code']; }else{?>
															<label style="cursor: pointer;" value="<?php echo $row['project_donor_id']?>" main_donor_id="<?php echo $donor_list[0]['donor_id'];?>"  class="label label-primary  send_notification_by_vendor_code">Request Vendor Code</button>
															<?php }?>
														</td>
													</tr>	
																									
													<?php } }?>
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
								
							<?php }else{?>
							<div class="table-responsive">
								<table id="blog_view_table" class=" table table-striped table-bordered table-hover" >
									<thead>
										<tr>
											<th class="text-center">Donor</th>
											<th class="text-center">Amount</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td  class="text-center"><?php echo $result[0]['donor_dropdown']; ?></td>
											<td  class="text-center"><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $result[0]['cycle_donor_amount']; ?></td>
										</tr>
									</tbody>
								</table>
							</div>
							
					<?php } } }?>
					
           			<?php if($requested_by and $requested_on and  $requested_by!=''){
							$sql_staff="SELECT first_name,last_name FROM org_staff_account WHERE staff_id=$requested_by";
							$staff_result=$this->db->query($sql_staff)->result_array();
							//var_dump($staff_result);
							if($staff_result){
								$fname=$staff_result[0]['first_name'];
								$lname=$staff_result[0]['last_name'];
								$sum_name=$fname.' '.$lname;
						?>
							
						<div class="form-group row">
								<label for="organisation_id" class="col-md-3 text-right">Requested by</label>
								<span class="col-md-9"><?php echo $sum_name; ?></span> 
							
						</div>
						<div class="form-group row">
								<label for="organisation_id" class="col-md-3 text-right">Requested On</label>
								<span class="col-md-9"> <?php echo date_time_format($requested_on); ?></span>
							
						</div>
						<div class="form-group row">
							<label for="organisation_id" class="col-md-3 text-right">Request Details</label>
							<div class="col-md-9">
								<pre ><?php echo $requested_details ; ?></pre>
							</div>
						</div>
						<?php } }?>	
						
						
				</div>
		</div> 

<!---------------------------- Modal for Browse Change Status-------------------------->
<div class="modal fade" id="browseChangeAssignee2" tabindex="-1" course_package="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Change Assignee</h3>
            </div> 
            <div class="modal-body row">
				<div class="col-md-12">
					<div id="headerMsg3"></div>
					<form id="category_form4" method="post" enctype="multipart/form-data">
						<input class="form-control" id="org_task_id2" name="org_task_id2" value="" type="hidden">
						<input class="form-control" id="prop_id_set" name="prop_id_set" value="" type="hidden">
						<input class="form-control" id="org_id_set2" name="org_id_set2" value="" type="hidden">
						<div class="form-group col-md-12" style="padding: 15px 0px 15px 0px">
							<label class="control-label col-md-3" for="new_due_date">Select Assignee<span class="required">*</span></label>
							<div class="col-md-9">
								<select class="form-control " id="new_assignee" name="new_assignee">
									<?php 
										$con1 = '';
										foreach($org_users as $user){
											$con1 .= '<option value="'.$user['staff_id'].'">'.$user['first_name'].' '.$user['last_name'].'</option>';
										}
										echo $con1;
									?>
								</select>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-success">Update</button>
						</div>
					</form>
				</div>
			</div>
        </div>
    </div>
</div>	     




<script>
 $('document').ready(function(){
	 
	$('body').on('click', '.change_assignee_task_detail2', function () {		
        $('#headerMsg3').empty();
		$('#category_form3 label.error').empty();
        $('#category_form3 input.error').removeClass('error');
        $('#category_form3 select.error').removeClass('error');
		
        var org_task_id = $(this).attr('name');
        var new_assignee = $(this).attr('org_staff_id');
        var prop_id = $(this).attr('prop_id');
        var org_id = $(this).attr('org_id');
			
        console.log("dfdf");
        console.log(org_id);
		$('#org_task_id2').val(org_task_id);
        $('#new_assignee').val(new_assignee);
        $('#prop_id_set').val(prop_id);
        $('#org_id_set2').val(org_id);
	});
	
	$('#category_form4').validate({
		ignore: [],
        rules: {
            new_assignee: {
                required: true,	
            },
		},
		 messages: {
			new_assignee: {
                required: "Please select staff.",
            },
		},
		submitHandler: function (form) {
			var org_task_id = $('#org_task_id2').val();
            var new_assignee = $('#new_assignee').val();
            var prop_id = $('#prop_id_set').val();
            var org_id = $('#org_id_set2').val();
			$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
            $.post(APP_URL + 'organisation/tasks/update_assignee', {
                org_task_id: org_task_id,
                new_assignee: new_assignee,
                prop_id: prop_id,
                org_id: org_id,
            },
			function (response) {
				$.unblockUI();
				$("html, body").animate({scrollTop: 0}, "slow");
                $('#headerMsg1').empty();
                $('#headerMsg').empty();
				if (response.status ==200) {
                    var message = response.message;
					$('#browseChangeAssignee').modal('hide');
					
					//$('#headerMsg').html("<div class='alert alert-success fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + message + "</strong>&nbsp;&nbsp;<a href='"+APP_URL+"page/blog_view'></a></div>");
					//$("#headerMsg").fadeTo(2000, 500).slideUp(500, function(){
						//$('#headerMsg').empty();
						$.toaster({ priority :'success', message :'Assignee updated successfully'});
						setTimeout(function(){
							window.location.href=APP_URL+"organisation/tasks/mytasks";
						},3000);
					//});
                }else if (response.status == 201) {
                    $('#headerMsg1').html("<div class='alert alert-danger fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
					$("#headerMsg1").fadeTo(2000, 500).slideUp(500, function(){
						$('#headerMsg1').empty();
						
					});
                }				
			}, 'json');
		return false;
		},
	});
	 
	 $('body').on('click','.send_notification_by_vendor_code', function () {
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
			var main_donor_id=$(this).attr('main_donor_id');
				console.log("fdf");
				console.log(main_donor_id);
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
						main_donor_id:main_donor_id,			
									
								
					},
					function (response) {
						$.unblockUI();
						$('#head_ngo_review').empty();
						if (response.status == 200) {
							var message = response.message;
							$.toaster({ priority :'success', message :'Vendor Code Send Successfully'});
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
	
	/*$('body').on('click','#save', function () {
		var comments = $('#comments').val();
		var org_task_id=$('#org_task_id').val();
		console.log(comments);
		$.post(APP_URL + 'organisation/tasks/update_comment_ontask', {
			comments: comments,
			org_task_id:org_task_id, 
		},
		function (response) {
			$('#head_ngo_review').empty();
            if (response.status == 200) {
				var message = response.message;
                //$("html, body").animate({scrollTop: 0}, "slow");               
               // $('#head_ngo_review').html("<div class='alert alert-success fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
                //$('.remove_image[name=' + contact_id + ']').closest("tr").remove();
				//$("#head_ngo_review").fadeTo(2000, 500).slideUp(500, function(){
					//$('#head_ngo_review').empty();
					//window.location.reload();
					
				//});
            } else {
                $('#head_ngo_review').html("<div class='alert alert-danger fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
				$("#head_ngo_review").fadeTo(2000, 500).slideUp(500, function(){
					$('#head_ngo_review').empty();
				});
			}	
		}, 'json');
		 return false;
		
	});
	$('body').on('click','#submit', function () {
		
		var comments = $('#comments').val();
		var org_task_id=$('#org_task_id').val();
		
		$.post(APP_URL + 'organisation/tasks/change_status_onsubmit', {
			comments: comments,
			org_task_id:org_task_id, 
		},
		function (response) {
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
		 return false;
	})	*/
	
	$('body').on('click','.send_notification_by_vendor_code_ffffffffffffffffffff', function () {
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
})
</script>
 
