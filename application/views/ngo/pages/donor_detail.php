<style>
#headerMsg{	margin:20px 0px;}
.dataTables-example th{	text-align:center;}
.ibox-content{padding: 10px;}
</style>

<?php

?>


<div class="content-wrapper animated fadeInRight">
	<section class="content-header">
        <h1>
			Detail of Donor
			<small></small>
        </h1>
    </section>
	<div class="content">
		<div class="row">
			<div class="col-lg-12">
			<?php //var_dump($donors_data); ?>
				<div class="box  box-primary">
					<div class="ibox float-e-margins">
						<div class="ibox-content">
							<div class="box-header with-border">
								<h3 class="box-title">Donor Details</h3>
							</div>
							<div id="headerMsg"></div>
							<div class="form-group row">
								<label for="donors_data" class="col-md-3 text-right">Donor Name</label>
								<div class="col-md-9"> 
									<span class="is_edit_hide"><?php echo $donors_data[0]['legal_name'] ?></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="donors_data" class="col-md-3 text-right">Brand Name</label>
								<div class="col-md-9"> 
									<span class="is_edit_hide"><?php echo $donors_data[0]['brand_name'] ?></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="donors_data" class="col-md-3 text-right">Code</label>
								<div class="col-md-9"> 
									<span class="is_edit_hide"><?php echo $donors_data[0]['code'] ?></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="donors_data" class="col-md-3 text-right">Pan Number</label>
								<div class="col-md-9"> 
									<span class="is_edit_hide"><?php echo $donors_data[0]['pan_number'] ?></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="donors_data" class="col-md-3 text-right">Redistered Address</label>
								<div class="col-md-9"> 
									<span class="is_edit_hide"><?php echo $donors_data[0]['redistered_address'] ?></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="donors_data" class="col-md-3 text-right">City</label>
								<div class="col-md-9"> 
									<span class="is_edit_hide"><?php echo $donors_data[0]['city'] ?></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="donors_data" class="col-md-3 text-right">State</label>
								<div class="col-md-9"> 
									<span class="is_edit_hide"><?php echo $donors_data[0]['state'] ?></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="donors_data" class="col-md-3 text-right">Pincode</label>
								<div class="col-md-9"> 
									<span class="is_edit_hide"><?php echo $donors_data[0]['pincode'] ?></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="donors_data" class="col-md-3 text-right">Pan Image</label>
								<div class="col-md-9"> 
									<span class="is_edit_hide"><?php echo $donors_data[0]['pan_image'] ?></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="donors_data" class="col-md-3 text-right">Auth Sign</label>
								<div class="col-md-9"> 
									<span class="is_edit_hide"><?php echo $donors_data[0]['auth_sign'] ?></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="donors_data" class="col-md-3 text-right">Logo Image</label>
								<div class="col-md-9"> 
									<span class="is_edit_hide"><?php echo $donors_data[0]['logo_image'] ?></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="donors_data" class="col-md-3 text-right">Donor Image</label>
								<div class="col-md-9"> 
									<span class="is_edit_hide"><?php echo $donors_data[0]['donor_image'] ?></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="donors_data" class="col-md-3 text-right">Art Image</label>
								<div class="col-md-9"> 
									<span class="is_edit_hide"><?php echo $donors_data[0]['art_image'] ?></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="donors_data" class="col-md-3 text-right">Facebook</label>
								<div class="col-md-9"> 
									<span class="is_edit_hide"><?php echo $donors_data[0]['facebook'] ?></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="donors_data" class="col-md-3 text-right">Instagram</label>
								<div class="col-md-9"> 
									<span class="is_edit_hide"><?php echo $donors_data[0]['instagram'] ?></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="donors_data" class="col-md-3 text-right">Twitter</label>
								<div class="col-md-9"> 
									<span class="is_edit_hide"><?php echo $donors_data[0]['twitter'] ?></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="donors_data" class="col-md-3 text-right">Linkedin</label>
								<div class="col-md-9"> 
									<span class="is_edit_hide"><?php echo $donors_data[0]['linkedin'] ?></span>
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

	//------------------------------------------------------------------------
    /*
     * This script is used to fill modal for edit category
     */
    
});
</script>

