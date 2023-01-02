<!-- general form elements -->
	<div class="box box-primary collapsed-box">
		<div class="box-header with-border" data-widget="collapse">
			<i class="fa fa-plus btn btn-box-tool fa_plus"></i>
			<h3 class="box-title">Budgeting Details</h3>
		</div>
		<?php if($edit_hide=='no'){?>
			<a class="btn btn-default pull-right edit_bttn <?php echo $show_edit?>" href="<?php echo base_url();?>ngo/proposals/edit_page_5?id=<?php echo $prop_id; ?>">Edit</a>
		<?php }?>
		<div class="box-body">
			<form id="proposal_form5" method="post" role="form">
				<div class="form-group row">
					<label for="title" class="col-md-3 text-right">Total funds required for the project (in INR Lakhs) <span class="required is_edit_data display_none">*</span></label>
					<div class="col-md-9"> 
						<span class="is_edit_hide" ><i class="fa fa-inr" aria-hidden="true"></i><?php echo $total_funds;?></span>
					</div>
				</div>

				<div class="form-group row">
					<label for="title" class="col-md-3 text-right">Total funds requested from<?php echo $organisation; ?>(in INR Lakhs) <span class="required is_edit_data display_none">*</span></label>
					<div class="col-md-9"> 
						<span class="is_edit_hide" ><i class="fa fa-inr" aria-hidden="true"></i><?php echo $total_funds_org;?></span>
					</div>
				</div>

				<div class="form-group row">
					<label for="title" class="col-md-3 text-right">Source of balance funds <span class="required is_edit_data display_none">*</span></label>
					<div class="col-md-9"> 
						<pre class="is_edit_hide" ><?php echo $balance_funds;?></pre>
					</div>
				</div>
				<div class="form-group row">
					
					<?php 	if(!$multiple_img_upload2){ ?>
								<label for="multiple_img_upload2" class="col-md-3 text-right">Attached multiple documents</label>
					<?php  	}	?>
					<?php if($multiple_img_upload2){
								$i= 0;
								$show_remove = '';
								$show_remove_ = '';
								foreach($multiple_img_upload2 as $details){ 
									$i++ ;
									if($i > 1){
										$show_remove = 'display_none';
										$show_remove_ = '';
									}else{ 
										$show_remove = '';
										$show_remove_ = 'display_none';
									}
									?>
									<div class="form-group row">
										<label for="multiple_img_upload2" class="col-md-3 text-right <?php echo $show_remove ?>">Other relevant documents</label>
										<label for="multiple_img_upload2" class="col-md-3 text-right <?php echo $show_remove_ ?>"></label>
										<div class="col-md-9">
											<span class="is_edit_hide" ><?php echo $i ; ?>)&nbsp;</span>
											<span class="is_edit_hide" ><?php echo $details['file_name'];?></span><br>
											<span style="padding-left: 16px;"><a target = '_blank' href="<?php echo base_url();?>uploads/<?php echo $details['file_dives'] ?>" class="is_edit_hide" ><?php echo $details['file_dives_actual'];?></a></span><br>
											
										</div>
									</div>
					<?php 		}
							}	?>
				</div>
				<div class="form-group row" style="display:none;">
					<label for="code" class="col-md-3 text-right">Code <span class="required is_edit_data display_none">*</span></label>
					<div class="col-md-9"> 
						<span class="is_edit_hide" ><?php echo $code;?></span>
					</div>
				</div>
			</form>
		</div>
	</div>