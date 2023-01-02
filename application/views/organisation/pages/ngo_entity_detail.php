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