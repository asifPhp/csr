<style>
#headerMsg{	margin:20px 0px;}
.dataTables-example th{	text-align:center;}
.ibox-content{padding: 10px;}
</style>

<?php

if($sql_query){
	$notification_data = $this->db->query($sql_query)->result_array();
	
}
?>


<div class="content-wrapper animated fadeInRight">
	<section class="content-header">
        <h1>Notification Detail </h1>
    </section>
	<div class="content">
		<div class="row">
			<div class="col-lg-12">
				<div class="box ">
				<?php //var_dump($notification_data); ?>
					<div class="ibox float-e-margins">
						<div class="ibox-content">
							<div class="box-header with-border">
								<h3 class="box-title">Notification Detail</h3>
							</div>
							<div id="headerMsg"></div>
							<div class="form-group row">
								<label for="organisation_id" class="col-md-3 text-right">Superngo Id</label>
								<div class="col-md-9"> 
									<span class="is_edit_hide"><?php echo $notification_data[0]['superngo_id'] ?></span>
									<!--<span class=""><?php //var_dump($notification_data[0]); ?></span>-->
								</div>
							</div>
							<div class="form-group row">
								<label for="organisation_id" class="col-md-3 text-right">Ngo Id</label>
								<div class="col-md-9"> 
									<span class="is_edit_hide"><?php echo $notification_data[0]['ngo_id'] ?></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="organisation_id" class="col-md-3 text-right">Org Id</label>
								<div class="col-md-9"> 
									<span class="is_edit_hide"><?php echo $notification_data[0]['org_id'] ?></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="organisation_id" class="col-md-3 text-right">Proposal Id</label>
								<div class="col-md-9"> 
									<span class="is_edit_hide"><?php echo $notification_data[0]['proposal_id'] ?></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="organisation_id" class="col-md-3 text-right">Project Id</label>
								<div class="col-md-9"> 
									<span class="is_edit_hide"><?php echo $notification_data[0]['project_id'] ?></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="organisation_id" class="col-md-3 text-right">Cycle Id</label>
								<div class="col-md-9"> 
									<span class="is_edit_hide"><?php echo $notification_data[0]['cycle_id'] ?></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="organisation_id" class="col-md-3 text-right">Status</label>
								<div class="col-md-9"> 
									<span class="is_edit_hide label " style="background-color: <?php echo constant('STATUS_'.$notification_data[0]['status']);?> !important;"><?php echo $notification_data[0]['status']; ?></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="organisation_id" class="col-md-3 text-right">Description</label>
								<div class="col-md-9"> 
									<span class="is_edit_hide"><?php echo $notification_data[0]['description'] ?></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="organisation_id" class="col-md-3 text-right">Url</label>
								<div class="col-md-9"> 
									<span class="is_edit_hide"><?php echo $notification_data[0]['url'] ?></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="organisation_id" class="col-md-3 text-right">Status</label>
								<div class="col-md-9"> 
									<span class="is_edit_hide label " style="background-color: <?php echo constant('STATUS_'.$notification_data[0]['status']);?> !important;"><?php echo $notification_data[0]['status']; ?></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="organisation_id" class="col-md-3 text-right">Status</label>
								<div class="col-md-9"> 
									<span class="is_edit_hide label " style="background-color: <?php echo constant('STATUS_'.$notification_data[0]['status']);?> !important;"><?php echo $notification_data[0]['status']; ?></span>
														
								</div>
							</div>
							<div class="form-group row">
								<label for="organisation_id" class="col-md-3 text-right">Created Date</label>
								<div class="col-md-9"> 
									<span class="is_edit_hide"><?php echo date_formats($notification_data[0]['created_date']); ?></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="organisation_id" class="col-md-3 text-right">Created Time</label>
								<div class="col-md-9"> 
									<span class="is_edit_hide"><?php echo time_format($notification_data[0]['created_time']); ?></span>
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

