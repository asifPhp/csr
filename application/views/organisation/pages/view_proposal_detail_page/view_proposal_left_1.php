
	<!-- general form elements -->

	
	    <div class="row">
		     <!-- left column -->
            <div class="col-md-12">

			<div class="box box-primary collapsed-box">
				<div class="box-header with-border" data-widget="collapse">
					<i class="fa fa-plus btn btn-box-tool fa_plus"></i>
					<h3 class="box-title">Proposal Overview</h3>
				</div>
				<?php if($edit_hide=='no'){?>
					<a class="btn btn-default pull-right edit_bttn <?php echo $show_edit?>" href="<?php echo base_url();?>ngo/proposals/edit_page_3?id=<?php echo $prop_id; ?>">Edit</a>
				<?php }?>
				<div class="box-body">
					<form id="proposal_form3" method="post" role="form">
						<h5 >Focus area of the Project</h5>
						<div class="form-group row">
							<label for="title" class="col-md-3 text-right">Title <span class="required is_edit_data display_none">*</span></label>
							<div class="col-md-9"> 
								<span class="is_edit_hide" ><?php echo $title;?></span>
							</div>
						</div>

						<div class="form-group row">
							<label for="title" class="col-md-3 text-right">Category <span class="required is_edit_data display_none">*</span></label>
							<div class="col-md-9"> 
								<span class="is_edit_hide" ><?php echo $focus_category;?>
								 
							 </span>
							</div>
						</div>


						<div class="form-group row">
							<label for="title" class="col-md-3 text-right">Sub category <span class="required is_edit_data display_none">*</span></label>
							<div class="col-md-9"> 
								<span class="is_edit_hide" ><?php echo $focus_subcategory;?></span>
							</div>
						</div>
						<div class="form-group row">
							<label for="title" class="col-md-3 text-right">Category Input <span class="required is_edit_data display_none">*</span></label>
							<div class="col-md-9"> 
								<span class="is_edit_hide" ><?php echo $category_input;?></span>
							</div>
						</div>

						<h5 >Benificiary Categorisation</h5>
						<div class="form-group row">
							<label for="title" class="col-md-3 text-right">Region <span class="required is_edit_data display_none">*</span></label>
							<div class="col-md-9"> 
								<span class="is_edit_hide" ><?php echo $region;?></span>
							</div>
						</div>

						<div class="form-group row">
							<label for="title" class="col-md-3 text-right">Category <span class="required is_edit_data display_none">*</span></label>
							<div class="col-md-9"> 
								<span class="is_edit_hide" ><?php echo $benficial_cat;?></span>
							</div>
						</div>
						<div class="form-group row">
							<label for="title" class="col-md-3 text-right">Age group <span class="required is_edit_data display_none">*</span></label>
							<div class="col-md-9"> 
								<span class="is_edit_hide" ><?php echo $age_group;?></span>
							</div>
						</div>
						<div class="form-group row">
							<label for="title" class="col-md-3 text-right">Target group <span class="required is_edit_data display_none">*</span></label>
							<div class="col-md-9"> 
								<span class="is_edit_hide" ><?php echo $target_group;?></span>
							</div>
						</div>
						<h5 >Benificiary Numbers</h5>
						<div class="form-group row">
							<label for="title" class="col-md-3 text-right">Slums/Villages  <span class="required is_edit_data display_none">*</span></label>
							<div class="col-md-9"> 
								<span class="is_edit_hide" ><?php echo $slums_villages;?></span>
							</div>
						</div>

						 <div class="form-group row">
							<label for="title" class="col-md-3 text-right">Women(Adult) 
								<span class="required is_edit_data display_none">*</span></label>
							<div class="col-md-9"> 
								<span class="is_edit_hide" ><?php echo $women_adult;?></span>
							</div>
						</div> 
						<div class="form-group row">
							<label for="title" class="col-md-3 text-right">Men(Adult) 
							  <span class="required is_edit_data display_none">*</span></label>
							<div class="col-md-9"> 
								<span class="is_edit_hide" ><?php echo $men_adult;?></span>
							</div>
						</div> 
						<div class="form-group row">
							<label for="title" class="col-md-3 text-right">Children 
							  <span class="required is_edit_data display_none">*</span></label>
							<div class="col-md-9"> 
								<span class="is_edit_hide" ><?php echo $children;?></span>
							</div>
						</div>


						 <div class="form-group row">
							<label for="title" class="col-md-3 text-right">Target geography(s) of the Project*
							  <span class="required is_edit_data display_none">*</span></label>
							<div class="col-md-9"> 
								<span class="is_edit_hide" ><?php echo $geo_location_values;?></span>
							</div>
						</div> 



						<div class="form-group row">
							<label for="title" class="col-md-3 text-right">Start Date 
							  <span class="required is_edit_data display_none">*</span></label>
							<div class="col-md-9"> 
								<span class="is_edit_hide" >
									<?php 
										if($start_date==0){
											$start_date='';
										}else{
										  echo  date_formats($start_date);
										   // echo $start_date;
										}
									?>
										
								</span>
							</div>
						</div>
						<div class="form-group row">
							<label for="title" class="col-md-3 text-right">End Date 
							  <span class="required is_edit_data display_none">*</span></label>
							<div class="col-md-9"> 
								<span class="is_edit_hide" >
									<?php 
										if($end_date==0){
											$end_date='';
										}else{
											echo date_formats($end_date);
										}
									?>
										
								</span>
							</div>
						</div>
						<div class="form-group row">
							<label for="title" class="col-md-3 text-right">Local Address 
							  <span class="required is_edit_data display_none">*</span></label>
							<div class="col-md-9"> 
								<span class="is_edit_hide" ><?php echo $local_address;?></span>
							</div>
						</div>
						<div class="form-group row">
							<label for="title" class="col-md-3 text-right">Street Address  
							  <span class="required is_edit_data display_none">*</span></label>
							<div class="col-md-9"> 
								<span class="is_edit_hide" ><?php echo $street_address;?></span>
							</div>
						</div>
						<div class="form-group row">
							<label for="title" class="col-md-3 text-right">State 
							  <span class="required is_edit_data display_none">*</span></label>
							<div class="col-md-9"> 
								<span class="is_edit_hide" >
									<?php
									if($state==''){
										$state='';
									}else{
										echo $state;
									}
								 ?>
									 
							</span>
							</div>
						</div>
						<div class="form-group row">
							<label for="title" class="col-md-3 text-right">City 
							  <span class="required is_edit_data display_none">*</span></label>
							<div class="col-md-9"> 
								<span class="is_edit_hide" ><?php echo $city;?></span>
							</div>
						</div>
						<div class="form-group row">
							<label for="title" class="col-md-3 text-right">Pincode 
							  <span class="required is_edit_data display_none">*</span></label>
							<div class="col-md-9"> 
								<span class="is_edit_hide" >
									<?php 
										if($pincode==0){
											$pincode='';
										}else{
										   echo $pincode; 
										}
									?>
										
								</span>
							</div>
						</div>

						<h5>Project Contact Person</h5>

						<div class="form-group row">
							<label for="title" class="col-md-3 text-right">Full Name 
							  <span class="required is_edit_data display_none">*</span></label>
							<div class="col-md-9"> 
								<span class="is_edit_hide" ><?php echo $full_name;?></span>
							</div>
						</div>
						<div class="form-group row">
							<label for="title" class="col-md-3 text-right">Designation 
							  <span class="required is_edit_data display_none">*</span></label>
							<div class="col-md-9"> 
								<span class="is_edit_hide" ><?php echo $designation;?></span>
							</div>
						</div>
						<div class="form-group row">
							<label for="title" class="col-md-3 text-right">Email Address
							  <span class="required is_edit_data display_none">*</span></label>
							<div class="col-md-9"> 
								<span class="is_edit_hide" ><?php echo $email_address;?></span>
							</div>
						</div>
						<div class="form-group row">
							<label for="title" class="col-md-3 text-right">Contact Number 
							  <span class="required is_edit_data display_none">*</span></label>
							<div class="col-md-9"> 
								<span class="is_edit_hide" ><?php echo $contact_no;?></span>
							</div>
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
		</div>
	

	
	


				