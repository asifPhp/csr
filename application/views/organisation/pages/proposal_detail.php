<style>
#headerMsg{	margin:20px 0px;}
.dataTables-example th{	text-align:center;}
.ibox-content{padding: 10px;}
	.content{
	min-height: 0px !important;	
	margin-bottom: -31px;
	}
	
</style>

<?php
if($sql_query){
	$proposal_list = $this->db->query($sql_query)->result_array();
	
	
}
?>

<div class="content-wrapper animated fadeInRight">

	<section class="content-header">
		<a href="<?php echo base_url();?>organisation/proposals/index" class="btn btn-default pull-right">List All</a>
        <h1><?php 
			//var_dump($proposal_list);
		echo $proposal_list[0]['title'] ?></h1>
	</section>
	<div class="content">
		<div class="row">
            <div class="col-md-12">
				<div class="box box-primary collapsed-box">
					<div class="box-header with-border" data-widget="collapse">
						<i class="fa fa-plus btn btn-box-tool fa_plus"></i>
						<h3 class="box-title">Proposal Details</h3>
					</div>	
							
					<div class="box-body" >
							
						<div class="form-group row">
							<label for="organisation_id" class="col-md-3 text-right">Proposal Name </label>
							<div class="col-md-9"> 
								<span class="is_edit_hide"><?php echo $proposal_list[0]['title'] ?></span>
								<!--<span class=""><?php //var_dump($proposal_list[0]); ?></span>-->
							</div>
						</div>
						<div class="form-group row">
							<label for="organisation_id" class="col-md-3 text-right">Proposal status </label>
							<div class="col-md-9"> 
								<span class="is_edit_hide label " style="background-color: <?php echo constant('STATUS_'.$proposal_list[0]['proposal_status']);?> !important;"><?php echo $proposal_list[0]['proposal_status']; ?></span>
							</div>
						</div>
						<div class="form-group row">
							<label for="organisation_id" class="col-md-3 text-right">Proposal created time </label>
							<div class="col-md-9"> 
								<span class="is_edit_hide"><?php echo date_time_format($proposal_list[0]['created_time']); ?></span>
							</div>
						</div>
						<div class="form-group row">
							<label for="organisation_id" class="col-md-3 text-right">Proposal update date & time </label>
							<div class="col-md-9"> 
								<span class="is_edit_hide"><?php echo date_time_format($proposal_list[0]['update_datetime']); ?></span>
							</div>
						</div>
						<div class="form-group row">
							<label for="organisation_id" class="col-md-3 text-right">Submitted By</label>
							<div class="col-md-9"> 
								<a href="<?php echo base_url();?>organisation/ngo/detail?id=<?php echo $proposal_list[0]['ngo_id'];?>"><?php echo $proposal_list[0]['ngo'] ?></a>
							</div>
						</div>
						<div class="form-group row">
							<label for="organisation_id" class="col-md-3 text-right">NGO Parent Brand</label>
							<div class="col-md-9"> 
								<span class="is_edit_hide"><?php echo $proposal_list[0]['brand_name'] ?></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		
	
	<?php $this->load->view('ngo/pages/proposals/edit_proposals');?>
</div>

<script>
$('document').ready(function(){
	$('.entity_content_wrapper').removeClass('content-wrapper');
	$('.entity_content').removeClass('content');
	//$('.proposal_content').removeClass('content');
	$('.proposals').removeClass('content-wrapper');
	//------------------------------------------------------------------------
    /*
     * This script is used to fill modal for edit category
     */
    
});
</script>

