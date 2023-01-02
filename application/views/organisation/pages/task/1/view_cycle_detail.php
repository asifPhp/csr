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
	
	//var_dump($project_cycle_data);
	
	if($project_cycle_data){
			
		$project_cycle_id=$project_cycle_data[0]['project_cycle_id'];
		$no_of_cycle=$project_cycle_data[0]['no_of_cycle'];
		$cycle_name=$project_cycle_data[0]['cycle_name'];
		$cycle_start_date1=$project_cycle_data[0]['cycle_start_date1'];
		$cycle_end_date2=$project_cycle_data[0]['cycle_end_date2'];
		$cycle_name=$project_cycle_data[0]['cycle_name'];
		
		
    }else{
		$project_cycle_id='';
		$no_of_cycle='';
		$cycle_name='';
		$cycle_start_date1='';
		$cycle_end_date2='';
		$cycle_name='';
    }
		
	?>

	
    
    <!-- Main content -->
    <section class="content proposal_content">
	
        <div class="row">
		     <!-- left column -->
            <div class="col-md-12">
			   <!-- general form elements -->
			   <?php 
			   $i=0;
				if($project_cycle_data){
					foreach($project_cycle_data as $val){
						//var_dump($val);
						$i++;
						$no_of_cycle=$val['no_of_cycle'];
						$project_cycle_id=$val['project_cycle_id'];
						$project_id=$val['project_id'];
						//var_dump($val);
					
			   ?>
                <div class="box box-primary collapsed-box">
					<div class="box-header with-border" data-widget="collapse">
						<i class="fa fa-plus btn btn-box-tool fa_plus"></i>
						<h3 class="box-title">Focal Point Review from Cycle  <?php echo $no_of_cycle;?></h3>
					</div>
					
					<div class="box-body">
						<form id="proposal_form4" method="post" role="form">
						
							<div class="form-group row">
								<div  class="col-md-6 text-right">
									<label for="title">Cycle Name</label>
									
								</div>
								<div class="col-md-6"> 
									<span class="is_edit_hide"><?php echo $val['cycle_name']; ?></span>
								</div>
							</div>
							
							<div class="form-group row">
								<div  class="col-md-6 text-right">
									<label for="title">Date this cycle ENDS</label>
									
								</div>
								<div class="col-md-6"> 
									<span class="is_edit_hide"><?php echo date_formats($val['cycle_end_date2']); ?></span>
								</div>
							</div>
							
							<?php 
								$is_payment=$val['is_payment'];
								if($is_payment=='yes'){
									
								$sql4="SELECT * FROM `project_cycle_donor_details` WHERE project_id=$project_id AND project_cycle_id=$project_cycle_id";
								$donor_cycle_data = $this->db->query($sql4)->result_array();
								//var_dump($dono_cycle_data);
							
							?>
							
								<div class="form-group row">
									<div  class="col-md-6 text-right">
										<label for="title">Does this cycle involve a payment?</label>
									</div>
									<div class="col-md-6"> 
										<span class="is_edit_hide"><?php echo ucfirst($is_payment);?>
										 </span>
									</div>
								</div>
							
							<div class="form-group row">
								<label for="title" class="col-md-6 text-right">Donor details for this cycle</label>
								<div class="col-md-6"> 
									<div class="table-responsive">
										<table id="blog_view_table" class=" table table-striped table-bordered table-hover" >
											<thead>
												<tr>
													<th class="text-center">Donor</th>
													<th class="text-center">Amount</th>
													<!--<th class="text-center">Documents</th>-->
													
												</tr>
											</thead>
											<tbody class="table_value">
												<?php if(!$donor_cycle_data){?>
													<td class="text-center" colspan="5" >No data Available</td>
												<?php }
													if($donor_cycle_data and $donor_cycle_data>0){
														foreach($donor_cycle_data as $row){
														//var_dump($row);
													?>
													<tr>
														<td  class="text-center"><?php echo $row['donor_dropdown'];?></td>
														<td  class="text-center"><i class="fa fa-inr" aria-hidden="true"></i><?php echo $row['cycle_donor_amount'];?></td>
														<!--<td  class="text-center"><?php //echo $row['ngo_payment'];?></td>-->
													</tr>	
																									
													<?php } }?>
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
							
							
							<div class="form-group row">
								<div  class="col-md-6 text-right">
									<label for="title">Payment documents required from the NGO</label>
								</div>
								<div class="col-md-6"> 
									<span class="is_edit_hide"><?php echo $val['ngo_payment']; ?>
									 </span>
								</div>
							</div>
						<?php }?>
							
							
							
							<div class="form-group row">
								<div  class="col-md-6 text-right">
									<label for="title">Project Assessment Documents required from the NGO for this cycle</label>
								</div>
								<div class="col-md-6"> 
									<span class="is_edit_hide"><?php echo $val['ngo_doc']; ?>
									 </span>
								</div>
							</div>
							
							<div class="form-group row">
								<div  class="col-md-6 text-right">
									<label for="title">Documents to be provided by us</label>
								</div>
								<div class="col-md-6"> 
									<span class="is_edit_hide"><?php echo $val['csr_doc']; ?>	
									 </span>
								</div>
							</div>
							
						
						</form>
					</div>
				</div>
					<?php  }}?>
				
			</div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
 

