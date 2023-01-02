<style>
#headerMsg{	margin:20px 0px;}
.dataTables-example th{	text-align:center;}
.ibox-content{padding: 10px;}
</style>

<?php

if($sql_query){
	$ngo_data = $this->db->query($sql_query)->result_array();
	
}
?>


<div class="content-wrapper animated fadeInRight">
	<section class="content-header">
        <h1>
			Ngo
			<small></small>
        </h1>
    </section>
	<div class="content">
		<div class="row">
			<div class="col-lg-12">
				<div class="box ">
					<div class="ibox float-e-margins">
						<div class="ibox-content">
							
							<div class="box-header with-border">
								<h3 class="box-title">Ngo Detail</h3>
							</div>
							<div id="headerMsg"></div>
							<div class="form-group row">
								<label for="organisation_id" class="col-md-3 text-right">Ngo Name </label>
								<div class="col-md-9"> 
									<span class="is_edit_hide"><?php echo $ngo_data[0]['legal_name'] ?></span>
									<!--<span class=""></span>-->
								</div>
							</div>
							<div class="form-group row">
								<label for="organisation_id" class="col-md-3 text-right">Website</label>
								<div class="col-md-9"> 
									<span class="is_edit_hide"><?php echo $ngo_data[0]['website'] ?></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="organisation_id" class="col-md-3 text-right">Ngo created time </label>
								<div class="col-md-9"> 
									<span class="is_edit_hide"><?php echo date_time_format($ngo_data[0]['created_time']) ?></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="organisation_id" class="col-md-3 text-right">Brand Name</label>
								<div class="col-md-9"> 
									<span class="is_edit_hide"><?php echo $ngo_data[0]['brand_name'] ?></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="organisation_id" class="col-md-3 text-right">Category Detail</label>
								<div class="col-md-9"> 
									<span class="is_edit_hide"><?php echo $ngo_data[0]['category_detail'] ?></span>
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

