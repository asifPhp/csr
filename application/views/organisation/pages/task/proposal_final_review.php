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
</style>

<?php
    //var_dump($data_value);
	if($data_value){
		$superngo_id = $data_value[0]['superngo_id']; 
		$comments = $data_value[0]['comments'];
		$org_task_id = $data_value[0]['org_task_id']; 
		$ngo_id=$data_value[0]['ngo_id'];
		$prop_id =$data_value[0]['prop_id'];
		$org_task_list_id=$data_value[0]['org_task_list_id'];
		$org_id=$data_value[0]['org_id'];
		$org_staff_id=$data_value[0]['org_staff_id'];
		$status = $data_value[0]['status'];	
		//var_dump($status);
		$additional_json = '';
		$ngo_status ='';
		$rejection_records='';
		$rejection_ngo='';
		$proposal_is_recommended='';
		if($data_value[0]['additional_json']){
			$additional_json = json_decode($data_value[0]['additional_json']);
			$ngo_status = $additional_json[0]->ngo_status;
			$rejection_records = $additional_json[0]->rejection_records;
			$rejection_ngo = $additional_json[0]->rejection_ngo;
			$proposal_is_recommended=$additional_json[0]->proposal_is_recommended;
			//var_dump($proposal_is_recommended);
		}else{
			$ngo_status ='';
			$rejection_records='';
			$rejection_ngo='';
		}
		$superngo_details = $this->db->get_where('superngo',array('id' =>$superngo_id))->result();
		$proposal=$this->db->get_where('proposal')->result();
	
	}else{
		$superngo_id= 0; 
		$comments ='';
		$org_task_id =  0; 
		$ngo_id= 0; 
		$prop_id = 0; 
		$org_task_list_id= 0; 
		$org_id= 0; 
		$org_staff_id= 0; 
		$status = '';	
		$additional_json = '';
		$ngo_status ='';
		$rejection_records='';
		$rejection_ngo='';
		$proposal_is_recommended='';
		$superngo_details = '';
		$proposal='';
		
	}
	
	
	
?>
<div class="animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
						<div class="ibox-content">
						<div id="head_ngo_review"></div>
						<input type="hidden" class="form-control" id="prop_id" name="prop_id" value="<?php echo $prop_id; ?>">	
						<input type="hidden" class="form-control" id="org_task_id" name="org_task_id" value="<?php echo $org_task_id; ?>">
						<input type="hidden" class="form-control" id="org_task_list_id" name="org_task_list_id" value="<?php echo $org_task_list_id; ?>">
						<input type="hidden" class="form-control" id="org_id" name="org_id" value="<?php echo $org_id; ?>">
						<input type="hidden" class="form-control" id="org_staff_id" name="org_staff_id" value="<?php echo $org_staff_id; ?>">
						<input type="hidden" class="form-control" id="superngo_id" name="superngo_id" value="<?php echo $superngo_id; ?>">
						<input type="hidden" class="form-control" id="ngo_id" name="ngo_id" value="<?php echo $ngo_id; ?>">
						<input type="hidden" class="form-control" id="proposal_is_recommended" name="proposal_is_recommended" value="<?php echo $proposal_is_recommended; ?>">
						
							<!--<div class="form-group row">
								<label for="organisation_id" class="col-md-3 text-right">NGO Name </label>
								<div class="col-md-9"> 
									<span class="is_edit_hide"><?php //echo $superngo_details[0]->brand_name; ?></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="organisation_id" class="col-md-3 text-right">Proposal Title </label>
								<div class="col-md-9"> 
									<span class="is_edit_hide"><?php //echo $proposal[0]->title; ?></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="organisation_id" class="col-md-3 text-right">Submitted Date </label>
								<div class="col-md-9"> 
									<span class="is_edit_hide"><?php //echo $proposal[0]->created_time; ?></span>
								</div>
							</div>-->
							
						<div class="row">
						<div class="col-md-6">
							<?php $this->load->view('organisation/pages/task/ngo_information_collapse'); ?>
	                        <?php //$this->load->view('organisation/pages/task/proposal_information_collapse'); ?>
						
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
								<label for="comments" class="col-md-12 ">Approve this proposal and create a project	</label>
									<div class="col-md-12">
										<label style="font-weight: 400;"><input type="radio" name="rejection_name" value="Approved" id="approved_radio" <?php if($ngo_status == 'Approved'){echo 'checked';}?>>&nbsp;
										<span>Yes</span> </label>
										<label style="font-weight: 400;">
											<input type="radio" name="rejection_name" value="Rejected" id="rejection_radio" <?php if($ngo_status == 'Rejected'){echo 'checked';}?>>
										<span>No, reject the proposal</span> </label>&nbsp; 
									</div>
									<div id="rejection_name_error">
										
									</div>
								</div>

								<div class="form-group row rejection <?php if($ngo_status == 'Rejected'){}else{ echo 'display_none'; }?> " >
									<label for="comments" class="col-md-12 ">Enter Details for rejection for internal records<span class="required">*</span></label>
									<div class="col-md-12"> 
										 <textarea class="form-control" id="rejection_records" name="rejection_records" rows="3" ><?php echo $rejection_records; ?></textarea>
									</div>
									<div id="rejection_records_error">
										
									</div>
								</div>
								<div class="form-group row rejection <?php if($ngo_status == 'Rejected'){}else{ echo 'display_none'; }?>">
									<label for="comments" class="col-md-12 ">Enter details to submit to NGO <span class="required">*</span></label>
									<div class="col-md-12"> 
										 <textarea class="form-control" id="rejection_ngo" name="rejection_ngo" rows="3" ><?php echo $rejection_ngo; ?></textarea>
									</div>
									<div id="rejection_ngo_error">
										
									</div>
								</div>
            
								<div class="form-group row display_none">
									<label for="comments" class="col-md-12 ">Review </label>
									<div class="col-md-12"> 
										 <textarea class="form-control" id="comments" name="comments" rows="3" ><?php echo $comments; ?></textarea>
									</div>
								</div>
							<div class="row">
							<div class="col-md-12">
							<div class="button">
							<button type="button" <?php if($status == 'Completed'){echo 'disabled';}?> id="aceepted_button<?php if($status == 'Completed'){echo 'disabled';}?>" class="btn btn-success display_none">Accepted</button>
							<button type="button" <?php if($status == 'Completed'){echo 'disabled';}?> id="rejected_button<?php if($status == 'Completed'){echo 'disabled';}?>" class="btn btn-warning display_none">Rejected</button>

							<button type="button" <?php if($status == 'Completed'){echo 'disabled';}?> id="save_button<?php if($status == 'Completed'){echo 'disabled';}?>" class="btn btn-success">Save</button>
							
							<button type="button" <?php if($status == 'Completed'){echo 'disabled';}?> id="submit_Completedd<?php if($status == 'Completed'){echo 'disabled';}?>" class="btn btn-success">Submit</button>
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
	var project_id = 0;
	/*$('body').on('click','#aceepted_button', function () {
		var comments = $('#comments').val();
		console.log(comments);

		var org_task_id=$('#org_task_id').val();
		//var ngo_id=$('#ngo_id').val();
		var prop_id=$('#prop_id').val();
		var superngo_id=$('#superngo_id').val();
		var ngo_id=$('#ngo_id').val();
		var org_id=$('#org_id').val();
	
		$.post(APP_URL + 'organisation/tasks/update_status_on_proposal', {
			comments: comments,
			org_task_id:org_task_id,
			prop_id:prop_id,
			superngo_id:superngo_id,
			ngo_id:ngo_id,
			org_id:org_id,
		},
		function (response) {
			$('#head_ngo_review').empty();
            if (response.status == 200) {
				$.toaster({ priority :'success', message :'Aceepted'});
				var message = response.message;
				project_id = response.project_id;
                //$("html, body").animate({scrollTop: 0}, "slow");               
                //$('#head_ngo_review').html("<div class='alert alert-success fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
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
		
	});*/
	
	
	/* $('body').on('click','#rejected_button', function () {
		
		var comments = $('#comments').val();
		var org_task_id=$('#org_task_id').val();
	    var prop_id=$('#prop_id').val();
		
		$.post(APP_URL + 'organisation/tasks/reject_status_on_proposal', {
			comments: comments,
			org_task_id:org_task_id, 
			prop_id:prop_id,
		},
		function (response) {
			$('#head_ngo_review').empty();
            if (response.status == 200) {
				var message = response.message;
				$.toaster({ priority :'success', message :'Rejected'});
                //$("html, body").animate({scrollTop: 0}, "slow");               
                $('#head_ngo_review').html("<div class='alert alert-success fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
                //$('.remove_image[name=' + contact_id + ']').closest("tr").remove();
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
		
		
	})
	*/

	 $('body').on('click','#save_button', function () {
		var rejection_name = $('input[name="rejection_name"]:radio:checked').val();
		var rejection_records = $('#rejection_records').val();
		var rejection_ngo = $('#rejection_ngo').val();
		var comments = $('#comments').val();
		var org_task_id=$('#org_task_id').val();
		var org_id=$('#org_id').val();
		var ngo_id=$('#ngo_id').val();
		var prop_id=$('#prop_id').val();
		var proposal_is_recommended=$('#proposal_is_recommended').val();
		console.log(proposal_is_recommended);
		var additional_json = [];
      	var ngo_status= '';
        if(rejection_name == 'Approved' || rejection_name == 'Rejected'){
        	additional_json.push({
				'rejection_records':rejection_records,
				'rejection_ngo':rejection_ngo,
				'ngo_status':rejection_name,
				'proposal_is_recommended':proposal_is_recommended,
			});
			
		}
		console.log(org_task_id);
		$.post(APP_URL + 'organisation/tasks/save_proposal_final_review', {
			additional_json: additional_json,
			org_task_id: org_task_id,
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
		 return false;
		
	});
	 
	
	$('body').on('click','#submit_Completedd', function () {
		
		
		var rejection_records = $('#rejection_records').val();
		var rejection_ngo = $('#rejection_ngo').val();
		
		var error='no';
		var rejection_name = $('input[name="rejection_name"]:radio:checked').val();
			$("#rejection_name_error").empty()
		if(rejection_name == 'Approved' || rejection_name == 'Rejected'){
			$("#rejection_name_error").empty()
		}else{
			$("#rejection_name_error").append("<div class='validation' style='color:red;margin-left:20px;'><label>Status is required</label></div>");
	        error='yes';
			return false;
		}

		var comments = $('#comments').val();
		var org_task_id=$('#org_task_id').val();
		var org_task_list_id=$('#org_task_list_id').val();
		var org_id=$('#org_id').val();
		var prop_id=$('#prop_id').val();
		var superngo_id=$('#superngo_id').val();
		var org_staff_id=$('#org_staff_id').val();
		var ngo_id=$('#ngo_id').val();
		
		var error='no';
		
		$("#rejection_records_error").empty()
		$("#rejection_ngo_error").empty()
		if(rejection_name == 'Rejected'){
			if (rejection_records == '') {
	          	$("#rejection_records_error").append("<div class='validation' style='color:red;margin-left:20px;'><label>Details for rejection to internal records is required</label></div>");
				error='yes';
			}
			if (rejection_ngo == '') {
	          	$("#rejection_ngo_error").append("<div class='validation' style='color:red;margin-left:20px;'><label>Rejection to internal records is required</label></div>");
				error='yes';
			}
		}
		
        var additional_json = [];
       	var ngo_status= '';
       	var proposal_is_recommended=$('#proposal_is_recommended').val();
        if(rejection_name == 'Approved' || rejection_name == 'Rejected'){
        	additional_json.push({
				'rejection_records':rejection_records,
				'rejection_ngo':rejection_ngo,
				'ngo_status':rejection_name,
				'proposal_is_recommended':proposal_is_recommended,
			});
			
		}	
		console.log(additional_json);
		console.log(error);
		if(error=='no'){
			$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
			$.post(APP_URL + 'organisation/tasks/change_status_onsubmit_proposal_final_review', {
			rejection_name: rejection_name,
			additional_json: additional_json,
			comments: comments,
			org_task_id:org_task_id, 
			project_id:project_id, 
			org_task_list_id:org_task_list_id,
			org_id:org_id,
            prop_id:prop_id,
            superngo_id:superngo_id,
            org_staff_id:org_staff_id,			
            ngo_id: ngo_id,		
            
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
		
	})
	 
	 $('body').on('click','#rejection_radio',function(){
		$('.rejection').removeClass('display_none'); 
	}); 
	 
    $('body').on('click','#approved_radio',function(){
		$('.rejection').addClass('display_none'); 

	});
	
});
</script>

