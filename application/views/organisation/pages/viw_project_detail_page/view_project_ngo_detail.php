<?php //var_dump($project_ngo_data);
	//$registration_detail=json_decode($project_ngo_data[0]->registration_detail ,true);
	//var_dump($registration_detail);

?>
	
		<div class="box  box-primary collapsed-box">
			<div class="box-header with-border" data-widget="collapse">
				<i class="fa btn btn-box-tool fa_plus fa-plus"></i>
				<h3 class="box-title">NGO Details</h3>
			</div>
			<div class="box-body">
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right">Name</label>
					<div class="col-md-9"> 
					<a href="<?php echo base_url() ?>organisation/ngo/detail?id=<?php if($project_ngo_data){ echo $project_ngo_data[0]->id;} ?>"><?php if($project_ngo_data){ echo $project_ngo_data[0]->legal_name;} ?></a>
					</div>
				</div>
				
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right">Code</label>
					<div class="col-md-9"> 
						<span class="is_edit_hide"><?php if($project_ngo_data){ echo $project_ngo_data[0]->code;} ?></span>
					</div>
				</div>
				
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right">Status</label>
					<div class="col-md-9">
					<span class="is_edit_hide label " style="background-color: <?php if($org_ngo_review_status){ echo constant('STATUS_'.$org_ngo_review_status[0]->status);}?> !important;"><?php if($org_ngo_review_status){  echo $org_ngo_review_status[0]->status; } ?></span>  
					</div>
				</div>
				
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right">Registered Address</label>
					<div class="col-md-9"> 
						<span class="is_edit_hide">
						<?php 
							$registration_detail='';
							if($project_ngo_data){ 
								if(isset($project_ngo_data[0]->registration_detail)){
									$registration_detail=json_decode($project_ngo_data[0]->registration_detail ,true);
									if($registration_detail){
										$i=0;
										foreach($registration_detail as $reg){
											$i++;
											if($reg['registration_street_address']){
												echo '<pre>'.$i.'<b>) </b>'.$reg['registration_street_address'].'</pre>';
											}
											//var_dump($reg);
										}
									}
								
								}
							} 
							
						?>
						</span>
					</div>
				</div>
			</div>
		</div>
	
	


