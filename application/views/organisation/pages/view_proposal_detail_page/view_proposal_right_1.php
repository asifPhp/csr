		<?php //var_dump($prop_data);?>


	
	<div class="box box-primary collapsed-box">
		<div class="box-header with-border" data-widget="collapse">
			<i class="fa fa-plus btn btn-box-tool fa_plus"></i>
			<h3 class="box-title">Proposal Details</h3>
		</div>	
		
		<div class="box-body" >
			<div class="form-group row">
				<label for="organisation_id" class="col-md-3 text-right">Project ID</label>
				<div class="col-md-9"> 
					<span class="is_edit_hide"><?php echo $prop_data[0]['new_prop_id']; ?></span>
					<!--<span class=""><?php //var_dump($proposal_list[0]); ?></span>-->
				</div>
			</div>
			
			<div class="form-group row">
				<label for="organisation_id" class="col-md-3 text-right">Proposal Name </label>
				<div class="col-md-9"> 
					<span class="is_edit_hide"><?php echo $prop_data[0]['proposal_title_org'] ?></span>
					<!--<span class=""><?php //var_dump($proposal_list[0]); ?></span>-->
				</div>
			</div>
			<div class="form-group row">
				<label for="organisation_id" class="col-md-3 text-right">Submitted By</label>
				<div class="col-md-9"> 
					<a href="<?php echo base_url();?>organisation/ngo/detail?id=<?php echo $prop_data[0]['ngo_id'];?>"><?php echo $prop_data[0]['ngo'] ?></a>
				</div>
			</div>
			<div class="form-group row">
				<label for="organisation_id" class="col-md-3 text-right">NGO Parent Brand</label>
				<div class="col-md-9"> 
					<span class="is_edit_hide"><?php echo $prop_data[0]['brand_name'] ?></span>
				</div>
			</div>
			<div class="form-group row">
				<label for="organisation_id" class="col-md-3 text-right">Proposal status </label>
				<div class="col-md-9"> 
					<span class="is_edit_hide label " style="background-color: <?php echo constant('STATUS_'.$prop_data[0]['proposal_status']);?> !important;"><?php echo $prop_data[0]['proposal_status']; ?></span>
					<?php 
						//$prop_id = $_GET['id'];
						$project_id = 0;
						$sql = 'SELECT * FROM `project` WHERE `prop_id` = '.$prop_id;
						$project_data = $this->db->query($sql)->result_array();
						
						if($project_data){
							$project_id = $project_data[0]['id'];
							echo '<a href=" '. base_url().'organisation/project/detail?id='.$project_id.'" class="text-right">Go to Project</a>';
				
						}
						
					?>
				</div>
			</div>
			<div class="form-group row">
				<label for="organisation_id" class="col-md-3 text-right">First Submitted On </label>
				<div class="col-md-9"> 
					<span class="is_edit_hide"><?php echo date_time_format($prop_data[0]['submission_time']); ?></span>
				</div>
			</div>
			<div class="form-group row">
				<label for="organisation_id" class="col-md-3 text-right">Last Updated On </label>
				<div class="col-md-9"> 
					<span class="is_edit_hide"><?php if($prop_data[0]['org_last_updated_date']!=''){ echo date_time_format($prop_data[0]['org_last_updated_date']); }?></span>
				</div>
			</div>
			<div class="form-group row">
				<label for="organisation_id" class="col-md-3 text-right">Focal Point </label>
				<div class="col-md-9"> 
					
					<?php 
						$sql = 'SELECT * FROM `org_assigner_mgmt` WHERE `prop_id` = '.$prop_id.' AND user_type = "prposal normal"';
						$org_assigner_mgmt = $this->db->query($sql)->result_array();
						//var_dump($org_assigner_mgmt);
						if($org_assigner_mgmt){
							$staff_id = $org_assigner_mgmt[0]['staff_id'];
							$sql = 'SELECT * FROM `org_staff_account` WHERE `staff_id` = '.$staff_id.'';
							$staff_data = $this->db->query($sql)->result_array();
							if($staff_data){
								$staff_name = $staff_data[0]['first_name']. ' ' .$staff_data[0]['last_name'];
								echo $staff_name;
							}
						
						
						}
					
					?>
				</div>
			</div>
			<?php if($gc_data){ //var_dump($gc_data);?>
			<div class="form-group row">
				<label for="organisation_id" class="col-md-3 text-right">GC Grant Doc</label>
				<div class="col-md-9"> 
					<a  href="<?php echo base_url()?>uploads/<?php echo $gc_data[0]['upload_grand_ticket_value'];?>"  target="_blank"><?php echo $gc_data[0]['upload_grand_ticket_actual'];?></a>
				</div>
			</div>
			<?php }?>
		</div>
	</div>