<style>
.marBot20{
	margin-bottom:20px;
}
.checkbox{margin-left: 15px;}

.fa_plus{
	float: right;
	font-size: 12px !important;
}
.edit_bttn{
	margin-top: -40px;
    margin-right: 35px;
    z-index: 999999;
    position: relative;
}
pre{
	border: none;
    background: white;
}
	.notification_content{    min-height: 0px;
    padding: 0px;}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper proposals">

	
	<?php
	
	//var_dump($project_data);
	
	if($project_data){
		$cycle_file_upload=$project_data[0]['cycle_file_upload'];
		$cycle_file_upload_actual=$project_data[0]['cycle_file_upload_actual'];
		$generated_by=$project_data[0]['generated_by'];
		if(isset($staff_name_data)){
			$first_name=$staff_name_data[0]['first_name'];
			$last_name=$staff_name_data[0]['last_name'];
			$full_name=$first_name.' '.$last_name;
			
		}
		
		
    }else{
		$cycle_file_upload='';
		$cycle_file_upload_actual='';
		$generated_by='';
		$full_name='';
		$last_name='';
		$first_name='';
    }
		
	?>

	
    
    <!-- Main content -->
    <section class="content proposal_content">
	
        <div class="row">
		     <!-- left column -->
            <div class="col-md-12">
			   <!-- general form elements -->
                <div class="box box-primary collapsed-box">
					<div class="box-header with-border" data-widget="collapse">
						<i class="fa fa-plus btn btn-box-tool fa_plus"></i>
						<h3 class="box-title">Project Details</h3>
					</div>
					
					<div class="box-body">
						<form id="proposal_form4" method="post" role="form">
						
							<div class="form-group row">
								<div  class="col-md-6 text-right">
									<label for="title">Assign a Focal Point for this Project:</label>
									
								</div>
								<div class="col-md-6"> 
									<span class="is_edit_hide">	<?php echo $full_name; ?></span>
								</div>
							</div>
							
							<div class="form-group row">
								<div  class="col-md-6 text-right">
									<label for="title">Upload final signed approval sheet:</label>
									
								</div>
								<div class="col-md-6"> 
									<a  href="<?php echo base_url()?>uploads/<?php echo $cycle_file_upload;?>"  target="_blank"><?php echo $cycle_file_upload_actual;?></a>
								</div>
							</div>
							
						
						</form>
					</div>
				</div>
				
				
				<div class="box box-primary collapsed-box">
					<div class="box-header with-border" data-widget="collapse">
						<i class="fa fa-plus btn btn-box-tool fa_plus"></i>
						<h3 class="box-title">Project Donors</h3>
					</div>
					
					<div class="box-body">
						<div class="form-group row">
							<label for="title" class="col-md-6 text-right">Details of persons met:</label>
							<div class="col-md-6"> 
								<div class="table-responsive">
									<table id="blog_view_table" class=" table table-striped table-bordered table-hover" >
										<thead>
											<tr>
												<th class="text-center">Donor</th>
												<th class="text-center">Amount</th>
											</tr>
										</thead>
										<tbody class="table_value">
											<?php if(!$donor_data){?>
												<td class="text-center" colspan="5" >No data Available</td>
											<?php }
												if($donor_data and $donor_data>0){
													foreach($donor_data as $row){
														$donor_id=$row['select_donor'];
														$sql6="SELECT legal_name FROM donor WHERE donor_id=$donor_id";
															
														$donor_list = $this->db->query($sql6)->result_array();
														//var_dump($donor_list[0]['legal_name']);
														
													
												?>
												<tr>
													<td  class="text-center"><?php echo $donor_list[0]['legal_name'];?></td>
													<td  class="text-center"><?php echo $row['donor_amount'];?></td>
												</tr>	
																								
												<?php } }?>
											
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				
			</div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
 

