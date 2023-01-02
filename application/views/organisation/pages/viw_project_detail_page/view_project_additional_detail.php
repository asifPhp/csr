
	<?php if($ngo_document_data!=''){?>
	
		<div class="box  box-primary collapsed-box">
			<div class="box-header with-border" data-widget="collapse">
				<i class="fa btn btn-box-tool fa_plus fa-plus"></i>
				<h3 class="box-title">Documents shared by NGO </h3>
			</div>
			<div class="box-body">
				<?php if($ngo_document_data){ 
					//var_dump($ngo_document_data);
						$j=0;
						foreach($ngo_document_data as $value){
							$j++;
				?>
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right"><?php echo $value->document_name; ?></label>
					<div class="col-md-9"> 
						<!--<span class="is_edit_hide"><?php// echo $value->document_value_actual; ?></span>-->
						<a href="<?php echo base_url();?>uploads/<?php echo $value->document_value; ?>"><?php echo $value->document_value_actual; ?></a>
					</div>
				</div>
				<?php }}
				?>
			</div>
		</div>

	<?php }	if($csr_document_data!=''){	?>
	
	
		<div class="box  box-primary collapsed-box">
			<div class="box-header with-border" data-widget="collapse">
				<i class="fa btn btn-box-tool fa_plus fa-plus"></i>
				<h3 class="box-title">Documents shared by us</h3>
			</div>
			<div class="box-body">
				<?php if($csr_document_data){ 
						$i=0;
						foreach($csr_document_data as $value){
							$i++;
				?>
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right"><?php echo $value->document_name; ?></label>
					<div class="col-md-9"> 
						<a href="<?php echo base_url();?>uploads/<?php echo $value->document_value; ?>"><?php echo $value->document_value_actual; ?></a>
					</div>
				</div>
				<?php }}
					?>
			</div>
		</div>
	
	<?php }?>
