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
		$additional_json = $data_value[0]['additional_json'];
		$org_task_id = $data_value[0]['org_task_id']; 
		$superngo_details = $this->db->get_where('superngo',array('id' =>$superngo_id))->result();
		$org_task_list_id=$data_value[0]['org_task_list_id'];
		$org_id=$data_value[0]['org_id'];
		$prop_id=$data_value[0]['prop_id'];
		$org_staff_id=$data_value[0]['org_staff_id'];
		$status = $data_value[0]['status'];
		$ngo_id = $data_value[0]['ngo_id'];
		$additional_json = '';
		$proposal_is_recommended ='';
		if($data_value[0]['additional_json']){
			$additional_json = json_decode($data_value[0]['additional_json']);
			if($additional_json[0]->proposal_is_recommended){
				$proposal_is_recommended = $additional_json[0]->proposal_is_recommended;
			}else{
				$proposal_is_recommended ='';
			}
		}
		$superngo_details = $this->db->get_where('superngo',array('id' =>$superngo_id))->result();
		$proposal=$this->db->get_where('proposal')->result();
	
	}else{
		$superngo_id = 0; 
		$comments ='';
		$org_task_id = 0; 
		$superngo_details = '';
		$org_task_list_id=0;
		$org_id=0;
		$prop_id=0;
		$org_staff_id=0;
		$status = '';
		$ngo_id =0;
		$additional_json = '';
		$proposal_is_recommended ='';
		$superngo_details = '';
		$proposal='';
		
	}
	
	
	
?>
<div class="animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-content">
					<div id="head_ngo_review"></div>
					<input type="hidden" class="form-control" id="org_task_id" name="org_task_id" value="<?php echo $org_task_id; ?>">
					<input type="hidden" class="form-control" id="org_task_list_id" name="org_task_list_id" value="<?php echo $org_task_list_id; ?>">
					<input type="hidden" class="form-control" id="org_id" name="org_id" value="<?php echo $org_id; ?>">
					<input type="hidden" class="form-control" id="superngo_id" name="superngo_id" value="<?php echo $superngo_id; ?>">
					<input type="hidden" class="form-control" id="prop_id" name="prop_id" value="<?php echo $prop_id; ?>">
					<input type="hidden" class="form-control" id="org_staff_id" name="org_staff_id" value="<?php echo $org_staff_id; ?>">
					<input type="hidden" class="form-control" id="ngo_id" name="ngo_id" value="<?php echo $ngo_id; ?>">
							
							
					<div class="row ">
						<div class="col-lg-6">
							<?php $this->load->view('organisation/pages/task/ngo_information_collapse'); ?>
							<?php //$this->load->view('organisation/pages/task/proposal_information_collapse'); ?>
						</div>
						<div class="col-lg-6">
								<?php $this->load->view('organisation/pages/task/Task_details_collapse'); ?>
							<div class="box box-primary">
								<div class="box-header with-border" data-widget="collapse">
										<i class="fa btn btn-box-tool fa_plus fa-minus"></i>
										<h3 class="box-title"><?php echo $data_value[0]['org_task_label']; ?></h3>
								</div>
								<div class="box-body" >
									<div class="form-group row ">
										<label for="comments" class="col-md-12 ">Review Details<span class="required">*</span></label>
										<div class="col-md-12"> 
											 <textarea class="form-control" id="comments" name="comments" rows="3" placeholder="Enter Review Details"><?php echo $comments; ?></textarea>
										</div>
									</div>
									<div class="form-group ">
										<label class="form-check-label" for="radio_button">I recommend that this proposal be approved.</label>
										<label><input type="radio" name="proposal_is_recommended"  value="Yes" <?php if($proposal_is_recommended == 'Yes'){echo 'checked';}?> > Yes</label>
										<label><input type="radio" name="proposal_is_recommended" value="No" <?php if($proposal_is_recommended == 'No'){echo 'checked';}?>> No</label>
										<label class="select_error error  display_none">Please select any one </label>
									</div>
									<div class="row"> 
										<div class="col-md-12"> 
											<button type="button" <?php if($status == 'Completed'){echo 'disabled';}?> id="save<?php if($status == 'Completed'){echo 'disabled';}?>" class="btn btn-success">Save</button>
											<button type="button" <?php if($status == 'Completed'){echo 'disabled';}?> id="submit<?php if($status == 'Completed'){echo 'disabled';}?>" class="btn btn-success">Submit</button>
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
	


	$('body').on('click','#save', function () {
		var comments = $('#comments').val();
		var org_task_id=$('#org_task_id').val();
		var proposal_is_recommended = $('input[name="proposal_is_recommended"]:checked').val();
		var error='no';
		console.log(comments);
		if (comments == '') {
			$(".validation").empty();
          $("#comments").parent().after("<div class='validation' style='color:red;margin-left:20px;'><label>Review is required</label></div>");
               error='yes';
        }else{
        	 $(".validation").empty();
           		
        }
		
		var additional_json = [];
		if(proposal_is_recommended == 'Yes' || proposal_is_recommended == 'No'){
			additional_json.push({
				'proposal_is_recommended':proposal_is_recommended
			});
		}
		if(error=='no'){
			$.post(APP_URL + 'organisation/tasks/update_comment_ontask', {
				comments: comments,
				org_task_id:org_task_id, 
				additional_json:additional_json, 
				
			},
			function (response) {
				$('#head_ngo_review').empty();
				if (response.status == 200) {
					var message = response.message;
					$.toaster({ priority :'success', message :'Saved'});
					// $("html, body").animate({scrollTop: 0}, "slow");               
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
		}
		 return false;
		
	});
	
	
	 $('body').on('click','#submit', function () {
		var comments = $('#comments').val();
		var error='no';
		console.log(comments);
		if (comments == '') {
			$(".validation").empty();
          $("#comments").parent().after("<div class='validation' style='color:red;margin-left:20px;'><label>Review is required</label></div>");
               error='yes';
        }else{
        	 $(".validation").empty();
           		
        }
		var org_task_id=$('#org_task_id').val();
		var ngo_id=$('#ngo_id').val();
		var org_task_list_id=$('#org_task_list_id').val();
		var org_id=$('#org_id').val();
		var prop_id=$('#prop_id').val();
		var superngo_id=$('#superngo_id').val();
		var org_staff_id=$('#org_staff_id').val();
		var proposal_is_recommended = $('input[name="proposal_is_recommended"]:checked').val();
			if(proposal_is_recommended){
			$(".select_error").addClass('display_none');
			}else{
				error='yes';
				$(".select_error").removeClass('display_none');
			}
        var ngo_status= '';
        var rejection_records= '';
        var rejection_ngo= '';
		var additional_json = [];
		if(proposal_is_recommended == 'Yes' || proposal_is_recommended == 'NO'){
			additional_json.push({
				'rejection_records': '',
				'rejection_ngo': '',
				'ngo_status': '',
				'proposal_is_recommended': proposal_is_recommended
			});
		}
		if(error=='no'){
			$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
			$.post(APP_URL + 'organisation/tasks/change_status_onsubmit_by_proposal_review', {
			ngo_id: ngo_id,
			comments: comments,
			org_task_id:org_task_id,
			org_task_list_id:org_task_list_id,
			org_id:org_id,
			prop_id:prop_id,
			superngo_id:superngo_id,
			org_staff_id:org_staff_id,
			additional_json:additional_json,
			
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
	 
	
});
</script>

