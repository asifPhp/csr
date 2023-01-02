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
.entity_content{
	margin-top: -20px;
}
</style>

 <?php
    
	//var_dump($entity_data);
	$superngo_id = $data_value[0]['superngo_id']; 
	$comments = $data_value[0]['comments'];
	$org_task_id = $data_value[0]['org_task_id']; 
	$ngo_id = $data_value[0]['ngo_id']; 
	$task_type = $data_value[0]['task_type']; 
	$org_task_list_id = $data_value[0]['org_task_list_id']; 
	$org_task_label = $data_value[0]['org_task_label']; 
	//var_dump($data_value);
	$superngo_details = $this->db->get_where('superngo',array('id' =>$superngo_id))->result();
	if($superngo_data){
		//var_dump($superngo_data);
		$brand_name=$superngo_data['brand_name'];
	}else{
		$brand_name='';
	}
	if($entity_data){
		$created_time=$entity_data['created_time'];
		$update_datetime=$entity_data['update_datetime'];
		$entity_id=$entity_data['id'];
	}else{
		$created_time='';
		$update_datetime='';
		$entity_id='';
	}
	//var_dump($entity_data);
	
	
	
	/*if($task_type=='nrp' and  $org_task_list_id==2 and $org_task_label=='NGO Desk Review Approval'){
			$this->load->view('organisation/pages/task/1/view_desk_review');
	}*/
	if($org_task_list_id==1  Or $org_task_list_id==2 ){
		
	
?>
		<!--
		<div class="box box-primary collapsed-box">
			 <div class="box-header with-border" data-widget="collapse">
				<i class="fa fa-plus btn btn-box-tool fa_plus"></i>
				<h3 class="box-title">NGO Information</h3>
			</div>	
			
			<div class="box-body" >
				<div class="form-group row" id="ngo_name">
					<label for="organisation_id" class="col-md-3 text-right">NGO Name </label>
					<div class="col-md-9"> 
						
						<span class="is_edit_hide"><?php echo $superngo_details[0]->brand_name; ?></span>
					</div>
				</div>
			</div>
		
		</div>
		-->	
		
	<?php }
	
		if($task_type=='nrp'){
			$this->load->view('ngo/pages/entity/edit_entity');
			$this->load->view('ngo/pages/proposals/edit_proposals');
		}else{
			if($task_type!='pmp'){
				$this->load->view('ngo/pages/proposals/edit_proposals');
			}
			if(($org_task_list_id==1 and $org_task_label=='NGO Desk Review') OR ($org_task_list_id==2 and $org_task_label=='NGO Desk Review Approval') OR ($org_task_list_id==5 and $org_task_label=='Field Visit Report' ) OR ($org_task_list_id==3 and $org_task_label=='Proposal Desk Review')){
				if($org_task_list_id==3 and $org_task_label=='Proposal Desk Review'){
		?>
				<div class="box box-primary collapsed-box">
                    <div class="box-header with-border" data-widget="collapse">
						<i class="fa fa-plus btn btn-box-tool fa_plus"></i>
						<h3 class="box-title">NGO Entity Details</h3>
					</div>
					<?php if($edit_hide=='no'){?>
					<a type="button" class="btn btn-default pull-right edit_click" href="<?php echo base_url() ?>ngo/entity/edit_page1?id=<?php echo $entity_id?>">	Edit</a>
					<?php }?>
				
					<!-- /.box-header -->
					<div class="box-body">
						<div class="form-group row">
						  	<label for="brand_name" class="col-md-4 text-right">Parent Brand</label>
							<div class="col-md-8"> 
								<span class="is_edit_hide" ><?php echo $brand_name?></span>
							</div>
						</div>
						<div class="form-group row">
							<label for="brand_name" class="col-md-4 text-right">Status</label>
							<div class="col-md-8"> 
								<?php 
								if(isset($org_ngo_review_status_data)){	
									if($org_ngo_review_status_data){
									//var_dump($org_ngo_review_status_data);
								?>
								<span class="is_edit_hide label " style="background-color: <?php echo constant('STATUS_'.$org_ngo_review_status_data[0]['status']);?> !important;"><?php echo $org_ngo_review_status_data[0]['status']; ?></span>
								<?php }}?>
							</div>
						</div>
						<div class="form-group row">
							<label for="brand_name" class="col-md-4 text-right">First Submitted On</label>
							<div class="col-md-8"> 
								<span class="is_edit_hide" ><?php echo date_formats($created_time);?></span>
							</div>
						</div>
						<div class="form-group row">
							<label for="brand_name" class="col-md-4 text-right">Last Updated On</label>
							<div class="col-md-8"> 
								<span class="is_edit_hide" ><?php echo date_formats($update_datetime);?></span>
							</div>
						</div>
						
						<div class="form-group row">
							<label for="brand_name" class="col-md-4 text-right">Focal Point</label>
							<div class="col-md-8"> 
								<span class="is_edit_hide" >
								<?php 
								$org_id = $this->session->userdata('org_id');
								if($org_id and $entity_id){
									//var_dump($entity_id);//$ngo_id=$value['ngo_id'];
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
								}
								?></span>
							</div>
						</div>
					</div>
                    <!-- /.box-body -->
                </div>
			<?php 		
				}
				$this->load->view('ngo/pages/entity/edit_entity');
			}
		}
			
	
	?>

	

<script>
	$('.entity_content_wrapper').removeClass('content-wrapper');
	$('.entity_content').removeClass('content');
	$('.proposal_content').removeClass('content');
	$('.proposals').removeClass('content-wrapper');

/* $('document').ready(function(){
	
	$('body').on('click','#save', function () {
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
	})	
});*/
</script>