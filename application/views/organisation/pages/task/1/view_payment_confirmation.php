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
		
	//var_dump($payment_confirmation_data);
	if($payment_confirmation_data){
		$donor_amount_list='';	
		
		
		if(isset($payment_confirmation_data)){
			$additional_json = json_decode($payment_confirmation_data);
			//var_dump($additional_json);
			
			if(isset($additional_json[0]->donor_amount_list)){
				$donor_amount_list = $additional_json[0]->donor_amount_list;
				//var_dump($donor_amount_list);
			}
			
		
		
		}else{
			$donor_amount_list='';		
				
		}
		
		
    }else{
		$donor_amount_list='';		
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
						<h3 class="box-title">Payment Confirmation</h3>
					</div>
					<div class="box-body">
						
						<div class="form-group row">
							<label for="title" class="col-md-6 text-right">Actual Amount Disbursed</label>
							<div class="col-md-6"> 
								<div class="table-responsive">
									<table id="blog_view_table" class=" table table-striped table-bordered table-hover" >
										<thead>
											<tr>
												<th class="text-center">Donor</th>
												<th class="text-center">Amount</th>
												<th class="text-center">UTR Number</th>
												
											</tr>
										</thead>
										<tbody class="table_value">
											<?php if(!$donor_amount_list){?>
												<td class="text-center" colspan="5" >No data Available</td>
											<?php }
												if($donor_amount_list and $donor_amount_list>0){
													foreach($donor_amount_list as $row){
													//var_dump($row);
													$project_cycle_donor_id=$row->project_cycle_donor_id;
													$sql_cycle ="SELECT project_cycle_donor_details.id,project_cycle_donor_details.donor_dropdown_id,donor.legal_name,donor.donor_id FROM `project_cycle_donor_details` 
													JOIN donor ON project_cycle_donor_details.donor_dropdown_id=donor.donor_id
													WHERE project_cycle_donor_details.id=$project_cycle_donor_id";
													$data_fetch = $this->db->query($sql_cycle)->result_array();
													if($data_fetch){
														$legal_name=$data_fetch[0]['legal_name'];
													}
													
													
													
													$project_cycle_id=$row->project_cycle_id;
												?>
												<tr>
													<td  class="text-center"><?php echo $legal_name;?></td>
													<td  class="text-center"><i class="fa fa-inr" aria-hidden="true"></i><?php echo $row->donor_amount;?></td>
													<td  class="text-center"><?php echo $row->utr_number;?></td>
													
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
 

