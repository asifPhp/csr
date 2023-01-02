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
		//var_dump($status);
		//$org_task_label = $data_value[0]['task_label'];
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
	}
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
							<?php $this->load->view('organisation/pages/task/ngo_information_collapse'); ?>
						</div>
						<div class="col-lg-6">
							<div class="form-group row">
								<?php $this->load->view('organisation/pages/task/Task_details_collapse'); ?>
								<div class="box box-primary ">
									<div class="box-header with-border " data-widget="collapse">
										<i class="fa btn btn-box-tool fa_plus fa-minus"></i>
										<h3 class="box-title"><?php echo $data_value[0]['org_task_label']; ?></h3>
									</div>
									<div class="box-body" >
										<label for="comments" class="col-md-12">Enter details of your evaluation of this Donee<span class="required">*</span></label>
										<div class="col-md-12"> 
											<textarea class="form-control" id="comments" name="comments" rows="3" placeholder="Enter details of your evaluation of this Donee"><?php echo $comments; ?></textarea>
										</div>
										<div class="review_error display_none col-md-12" style="color:red;"> 
											<label>Enter details of your evaluation of this Donee.</label>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div>&nbsp;</div>
												<div class="button " style="margin-left: 17px;">
													
													<button type="button" <?php if($status == 'Completed'){echo 'disabled';}?>  id="save<?php if($status == 'Completed'){echo 'disabled';}?>" class="btn btn-success">Save</button>
													<button type="button" <?php if($status == 'Completed'){echo 'disabled';}?>  id="submit<?php if($status == 'Completed'){echo 'disabled';}?>" class="btn btn-success">Submit</button>
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
</div>
<script>
$('document').ready(function(){
	
	$('body').on('click','#save', function () {
		var is_error='no';
		var comments = $('#comments').val();
		var ngo_id = $('#ngo_id').val();
		var org_task_id=$('#org_task_id').val();
		var org_id=$('#org_id').val();
		var prop_id=$('#prop_id').val();
		if(comments){
			$('.review_error').addClass('display_none');
		}else{
			is_error = 'yes';
			$('.review_error').removeClass('display_none');
		}
		console.log(comments);
		if(is_error=='no'){
			$.post(APP_URL + 'organisation/tasks/save_ngo_review_org2', {
				comments: comments,
				org_task_id:org_task_id,
				org_id:org_id,
				prop_id:prop_id,
				ngo_id:ngo_id,
			},
			function (response) {
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
		}
		 return false;
		
	});
	
	$('body').on('click','.ngo_send_notification', function () {
		var superngo_id = $('#superngo_id').val();
		var ngo_id = $('#ngo_id').val();
		var org_id=$('#org_id').val();
		var prop_id=$('#prop_id').val();
		var project_id=$('#project_id').val();
		var url= APP_URL+"ngo/entity/edit?id="+ngo_id ;
		var description= $('#comments').val(); //"dfdfdf","dfdfdf";    *this is temperary need to remove later* 
		
		console.log(description);
		$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
		$.post(APP_URL + 'organisation/notification/ngo_send_notification', {
			org_id:org_id,
			superngo_id:superngo_id,
            prop_id:prop_id,
            ngo_id:ngo_id,
            project_id:project_id,
            cycle_id:0,
            status:'Pending',
            url:url,
            description:description,
		},
		function (response) {
			$.unblockUI();
			$('#head_ngo_review').empty();
            if (response.status == 200) {
				var message = response.message; 
				$.toaster({ priority :'success', message :'Saved'});
                
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
		var error='no';
		console.log(comments);
		if (comments == '') {
          $("#comments").parent().after("<div class='validation' style='color:red;margin-left:20px;'><label>Details of your evaluation of this Donee is required</label></div>");
               error='yes';
        }else{
        	 $(".validation").empty();
           		
        }
		var org_task_id=$('#org_task_id').val();
		var org_task_list_id=$('#org_task_list_id').val();
		var org_id=$('#org_id').val();
		var ngo_id = $('#ngo_id').val();
		var prop_id=$('#prop_id').val();
		var superngo_id=$('#superngo_id').val();
		var org_staff_id=$('#org_staff_id').val();
		if(error=='no'){
			$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
			$.post(APP_URL + 'organisation/tasks/change_status_onsubmit_by_ngo_review', {
			comments: comments,
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
		}
	})	
});
</script>

