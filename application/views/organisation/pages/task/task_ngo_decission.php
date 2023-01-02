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

</style>

<?php
    //var_dump($data_value);
	if($data_value){
		$superngo_id = $data_value[0]['superngo_id']; 
		$comments = $data_value[0]['comments'];
		$org_task_id = $data_value[0]['org_task_id'];
		$org_id=$data_value[0]['org_id'];
		$org_task_list_id=$data_value[0]['org_task_list_id'];
		$prop_id=$data_value[0]['prop_id'];
		$org_staff_id=$data_value[0]['org_staff_id'];
		$status = $data_value[0]['status'];
		$ngo_id = $data_value[0]['ngo_id'];
		$additional_json = '';
		$ngo_status ='';
		$rejection_records='';
		$rejection_ngo='';
		if($data_value[0]['additional_json']){
			$additional_json = json_decode($data_value[0]['additional_json']);
			$ngo_status = $additional_json[0]->ngo_status;
			$rejection_records = $additional_json[0]->rejection_records;
			$rejection_ngo = $additional_json[0]->rejection_ngo;
		}else{
			$ngo_status ='';
			$rejection_records='';
			$rejection_ngo='';
		}
		
		$superngo_details = $this->db->get_where('superngo',array('id' =>$superngo_id))->result();
		$org_ngo_review_status = $this->db->get_where('org_ngo_review_status',array('org_id' => $org_id,'ngo_id' => $ngo_id))->result_array();
		$ngo_review_status = '';
		if($org_ngo_review_status){
			$ngo_review_status = $org_ngo_review_status[0]['status'];
		}
	}else{
		$superngo_id =0;
		$comments = $data_value[0]['comments'];
		$org_task_id = 0;
		$org_id=0;
		$org_task_list_id=0;
		$prop_id=0;
		$org_staff_id=0;
		$status = '';
		$ngo_id = 0;
		$additional_json = '';
		$ngo_status ='';
		$rejection_records='';
		$rejection_ngo='';
		$superngo_details='';
		$org_ngo_review_status ='';
		$ngo_review_status = '';
		
	}

?>
<div class="animated fadeInRight">
	
		<div class="row">
			<div class="col-lg-12">
				
					<div class="ibox float-e-margins">
						<div class="ibox-content">
						<div id="head_ngo_review"></div>
						<input type="hidden" class="form-control" id="prop_id" name="prop_id" value="<?php echo $prop_id; ?>">		
						<input type="hidden" class="form-control" id="org_task_id" name="org_task_id" value="<?php echo $org_task_id; ?>">
						<input type="hidden" class="form-control" id="org_id" name="org_id" value="<?php echo $org_id; ?>">
						<input type="hidden" class="form-control" id="superngo_id" name="superngo_id" value="<?php echo $superngo_id; ?>">
						<input type="hidden" class="form-control" id="org_task_list_id" name="org_task_list_id" value="<?php echo $org_task_list_id; ?>">
						<input type="hidden" class="form-control" id="org_staff_id" name="org_staff_id" value="<?php echo $org_staff_id; ?>">
						<input type="hidden" class="form-control" id="ngo_review_status" name="ngo_review_status" value="<?php echo $ngo_review_status; ?>">
						<input type="hidden" class="form-control" id="ngo_id" name="ngo_id" value="<?php echo $ngo_id; ?>">
						
                        <div class="row">
							<div class="col-md-6">
							<?php $this->load->view('organisation/pages/task/ngo_information_collapse'); ?>
							</div>
						    <div class="col-md-6">
							<?php $this->load->view('organisation/pages/task/Task_details_collapse'); ?>



							<div class="box box-primary">
								<div class="box-header with-border" data-widget="collapse">
									<i class="fa btn btn-box-tool fa_plus fa-minus"></i>
									<h3 class="box-title"><?php echo $data_value[0]['org_task_label']; ?></h3>
							</div>
							<div class="box-body" >
            				<div class="form-group row ">
								<label for="comments" class="col-md-12 ">NGO Decision
								</label>
								<div class="col-md-12">
									<label style="font-weight: 400;">
										<input type="radio" name="rejection_name" value="Approved" id="approved_radio" <?php if($ngo_status == 'Approved'){echo 'checked';}?>>&nbsp;
											<span>Approve NGO</span> 
									</label>
									<label style="font-weight: 400;">
										<input type="radio" name="rejection_name" value="Rejected" id="rejection_radio" <?php if($ngo_status == 'Rejected'){echo 'checked';}?>>
											<span>Reject NGO</span> 
									</label>&nbsp; 
								</div>
								<div class="rejection_select_error error col-lg-12 display_none">
									<label>Please select any one </label>
								</div>
							</div>
							

							<div class="form-group row rejection <?php if($ngo_status == 'Rejected'){}else{ echo 'display_none'; }?>" >
								<label for="comments" class="col-md-12 ">Enter Details for rejection for internal records <span class="required">*</span></label>
								<div class="col-md-12"> 
									<textarea class="form-control" id="rejection_records" name="rejection_records" rows="3" ><?php echo $rejection_records; ?></textarea>
								</div>
								<div id="records_error" class="error col-lg-12  display_none">
									<label>Details for rejection for internal records is required</label>
								</div>
							</div>
							<div class="form-group row rejection <?php if($ngo_status == 'Rejected'){}else{ echo 'display_none'; }?> ">
								<label for="comments" class="col-md-12 ">Enter details to submit to NGO  <span class="required">*</span></label>
								<div class="col-md-12"> 
									
									 <textarea class="form-control" id="rejection_ngo" name="rejection_ngo" rows="3" ><?php echo $rejection_ngo; ?></textarea>
								</div>
								<div id="rejection_no_error" class="rejection_no_error error col-lg-12 display_none">
									<label>details to submit to NGO is required</label>
								</div>
							</div>

							<div class="form-group row display_none ">
								<label for="comments" class="col-md-12 dis ">Review</label>
								<div class="col-md-12"> 
									 <textarea class="form-control review " id="comments" name="comments" rows="3" ><?php echo $comments; ?></textarea>
								</div>
							</div>
					
							<div class="row">
							<div class="col-md-12">
							
							<button type="button" <?php if($status == 'Completed'){echo 'disabled';}?> id="approve_button<?php if($status == 'Completed'){echo 'disabled';}?>" class="btn btn-success display_none">Approve</button>
							<button type="button" <?php if($status == 'Completed'){echo 'disabled';}?> id="reject_button<?php if($status == 'Completed'){echo 'disabled';}?>" class="btn btn-warning display_none">Reject</button>
		
							<button type="button" <?php if($status == 'Completed'){echo 'disabled';}?> id="save_button<?php if($status == 'Completed'){echo 'disabled';}?>" class="btn btn-success">Save</button>

							<button type="button" <?php if($status == 'Completed'){echo 'disabled';}?> id="submit_button<?php if($status == 'Completed'){echo 'disabled';}?>" class="btn btn-success">Submit</button>
							
							</div>
							<div>&nbsp;</div>
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
	
	$('body').on('click','#save_button', function () {
		var rejection_name = $('input[name="rejection_name"]:radio:checked').val();
		var rejection_records = $('#rejection_records').val();
		var rejection_ngo = $('#rejection_ngo').val();
		var comments = $('#comments').val();
		var org_task_id=$('#org_task_id').val();
		var org_id=$('#org_id').val();
		var ngo_id=$('#ngo_id').val();
		var prop_id=$('#prop_id').val();
		console.log(comments);
		var additional_json = [];
        var proposal_is_recommended= '';
        var ngo_status= '';
		var error='no';
		if(rejection_name){
			$(".rejection_select_error").addClass('display_none');
		}else{
			error='yes';
			$(".rejection_select_error").removeClass('display_none');
		}
		
        if(error=='no'){
			additional_json.push({
				'rejection_records':rejection_records,
				'rejection_ngo':rejection_ngo,
				'ngo_status':rejection_name,
				'proposal_is_recommended':'',
			});	
		}
		console.log(additional_json);
		if(error=='no'){
			$.post(APP_URL + 'organisation/tasks/save_ngo_decission_data', {
				additional_json: additional_json,
				comments: comments,
				org_task_id:org_task_id,
				org_id:org_id,
				ngo_id:ngo_id,
				prop_id:prop_id,
			},
			function (response) {
				$('#head_ngo_review').empty();
				if (response.status == 200) {
					var message = response.message;
					$.toaster({ priority :'success', message :'Saved'});
					//$("html, body").animate({scrollTop: 0}, "slow"); 
					/*              
					$('#head_ngo_review').html("<div class='alert alert-success fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
					$("#head_ngo_review").fadeTo(2000, 500).slideUp(500, function(){
						$('#head_ngo_review').empty();
						//window.location.reload();
					});*/
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
	$('body').on('click','#submit_button', function () {
		
		var rejection_records = $('#rejection_records').val();
		var rejection_ngo = $('#rejection_ngo').val();
		var error='no';
		var rejection_name = $('input[name="rejection_name"]:radio:checked').val();
		if(rejection_name){
			$(".rejection_select_error").addClass('display_none');
		}else{
			error='yes';
			$(".rejection_select_error").removeClass('display_none');
		}
		var comments = $('#comments').val();
		var org_task_id=$('#org_task_id').val();
		var org_id=$('#org_id').val();
		var ngo_id=$('#ngo_id').val();
		var prop_id=$('#prop_id').val();
		var org_task_list_id = $('#org_task_list_id').val();
		var superngo_id = $('#superngo_id').val();
		var org_staff_id= $('#org_staff_id').val();
		console.log(rejection_name);
		console.log(rejection_records);
		console.log(rejection_ngo);
		
		if(rejection_name == 'Rejected'){
			if(rejection_records == ''){
					error='yes';
				$("#records_error").removeClass('display_none');
			}else{
				$("#records_error").addClass('display_none');
			}
			if(rejection_ngo ==''){
				error='yes';
	           	$("#rejection_no_error").removeClass('display_none');
			}else{
				$("#rejection_no_error").addClass('display_none');
			}
		}
		
        var additional_json = [];
        var proposal_is_recommended= '';
        var ngo_status= '';
        if(error=='no'){
			additional_json.push({
				'rejection_records':rejection_records,
				'rejection_ngo':rejection_ngo,
				'ngo_status':rejection_name,
				'proposal_is_recommended':'',
			});	
		}
		console.log(additional_json);
		console.log(error);
        if(error=='no'){
			$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
			$.post(APP_URL + 'organisation/tasks/change_status_onsubmit_by_ngo_decission', {
				additional_json: additional_json,
				comments: comments,
				org_task_id:org_task_id,
				org_id:org_id,
				ngo_id:ngo_id,
				prop_id:prop_id,
				org_task_list_id:org_task_list_id,
				superngo_id:superngo_id,
				org_staff_id:org_staff_id,
				rejection_name:rejection_name,
				
			},
			function (response) {
				$.unblockUI();
				$('#head_ngo_review').empty();
				if (response.status == 200) {
					var message = response.message;
					$("html, body").animate({scrollTop: 0}, "slow");               
					$('#head_ngo_review').html("<div class='alert alert-success fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
					//$('.remove_image[name=' + contact_id + ']').closest("tr").remove();
					$("#head_ngo_review").fadeTo(2000, 500).slideUp(500, function(){
						$('#head_ngo_review').empty();
						//window.location.reload();
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
		}
	
	
	});
	
	
	
	
	
	
	
	

	$('body').on('click','#approve_button', function () {
		var comments = $('#comments').val();
		var org_task_id=$('#org_task_id').val();
		var org_id=$('#org_id').val();
		var ngo_id=$('#ngo_id').val();
		var prop_id=$('#prop_id').val();
		console.log(comments);
		$.post(APP_URL + 'organisation/tasks/approve_task', {
			comments: comments,
			org_task_id:org_task_id,
			org_id:org_id,
			ngo_id:ngo_id,
			prop_id:prop_id,
		},
		function (response) {
			$('#head_ngo_review').empty();
            if (response.status == 200) {
				var message = response.message;
				$.toaster({ priority :'success', message :'Approved'});
                //$("html, body").animate({scrollTop: 0}, "slow"); 
				/*              
                $('#head_ngo_review').html("<div class='alert alert-success fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
				$("#head_ngo_review").fadeTo(2000, 500).slideUp(500, function(){
					$('#head_ngo_review').empty();
					//window.location.reload();
				});*/
            } else {
                $('#head_ngo_review').html("<div class='alert alert-danger fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
				$("#head_ngo_review").fadeTo(2000, 500).slideUp(500, function(){
					$('#head_ngo_review').empty();
				});
			}	
		}, 'json');
		 return false;
		
	});
	
	$('body').on('click','#reject_button', function () {
		var comments = $('#comments').val();
		var org_task_id=$('#org_task_id').val();
		var org_id=$('#org_id').val();
		var ngo_id=$('#superngo_id').val();
		var prop_id=$('#prop_id').val();
		console.log(comments);
		$.post(APP_URL + 'organisation/tasks/reject_task', {
			comments: comments,
			org_task_id:org_task_id,
			org_id:org_id,
			ngo_id:ngo_id,
			prop_id:prop_id,
		},
		function (response) {
			$('#head_ngo_review').empty();
            if (response.status == 200) {
				var message = response.message;
				$.toaster({ priority :'success', message :'Rejected'});/*
                $("html, body").animate({scrollTop: 0}, "slow");               
                $('#head_ngo_review').html("<div class='alert alert-success fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
				$("#head_ngo_review").fadeTo(2000, 500).slideUp(500, function(){
					$('#head_ngo_review').empty();
					//window.location.reload();
				});*/
            } else {
                $('#head_ngo_review').html("<div class='alert alert-danger fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
				$("#head_ngo_review").fadeTo(2000, 500).slideUp(500, function(){
					$('#head_ngo_review').empty();
				});
			}	
		}, 'json');
		 return false;
		
	});
	
	
	 

    $('body').on('click','#rejection_radio',function(){
		$('.rejection').removeClass('display_none'); 
	}); 
	 
    $('body').on('click','#approved_radio',function(){
		$('.rejection').addClass('display_none'); 

	});

	
});



</script>

