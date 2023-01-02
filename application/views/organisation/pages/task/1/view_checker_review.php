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
		
	//var_dump($checker_data);
	if($checker_data){
		$was_internal_radio='';		
		$is_cheker_radion='';		
		$is_cheker_radion_comments_change='';	
		$donor_amount_list='';	
		$comments_is_cheker_radion_no='';	
		
		if(isset($checker_data)){
			$additional_json = json_decode($checker_data);
			//var_dump($additional_json);
			
			if(isset($additional_json[0]->was_internal_radio)){
				$was_internal_radio = $additional_json[0]->was_internal_radio;
			}
			if(isset($additional_json[0]->is_cheker_radion)){
				$is_cheker_radion = $additional_json[0]->is_cheker_radion;
			}
			if(isset($additional_json[0]->is_cheker_radion_comments_change)){
				$is_cheker_radion_comments_change = $additional_json[0]->is_cheker_radion_comments_change;
				//var_dump($is_cheker_radion_comments_change);
			}
			if(isset($additional_json[0]->donor_amount_list)){
				$donor_amount_list = $additional_json[0]->donor_amount_list;
				//var_dump($donor_amount_list);
			}
			if(isset($additional_json[0]->comments_is_cheker_radion_no)){
				$comments_is_cheker_radion_no = $additional_json[0]->comments_is_cheker_radion_no;
				//var_dump($donor_amount_list);
			}
		
		
		}else{
			$was_internal_radio='';		
			$is_cheker_radion='';		
			$is_cheker_radion_comments_change='';	
			$donor_amount_list='';	
			$comments_is_cheker_radion_no='';	
		}
		
		
    }else{
		$was_internal_radio='';		
		$is_cheker_radion='';		
		$is_cheker_radion_comments_change='';		
		$donor_amount_list='';		
		$comments_is_cheker_radion_no='';		
		
		
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
						<h3 class="box-title">Checker Review</h3>
					</div>
					<div class="box-body">
						
						<div class="form-group row">
							<div  class="col-md-6 text-right">
								<label for="title">Was the Internal Verification done satisfactorily?</label>
							</div>
							<div class="col-md-6"> 
								<span><?php if($was_internal_radio){echo $was_internal_radio;}?></span>
							</div>
						</div>
						
						
						<div class="form-group row">
							<div  class="col-md-6 text-right">
								<label for="title">Should the payment be made for this cycle?</label>
							</div>
							<div class="col-md-6"> 
								<span class="is_edit_hide"><?php

								if($is_cheker_radion=='Change'){echo 'Change Amount to be given';}
								else if($is_cheker_radion=='Yes'){echo 'Yes';}else{ echo 'No';} ?></span>
							</div>
						</div>
						<?php 
							if($is_cheker_radion=='Change'){
						
						?>
						<div class="form-group row">
							<label for="title" class="col-md-6 text-right">Enter the new amount for each donor</label>
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
											<?php if(!$donor_amount_list){?>
												<td class="text-center" colspan="5" >No data Available</td>
											<?php }
												$code='';
												if($donor_amount_list and $donor_amount_list>0){
													foreach($donor_amount_list as $row){
													//var_dump($row);
													$project_cycle_donor_id=$row->project_cycle_donor_id;
													$sql_cycle ="SELECT project_cycle_donor_details.id,project_cycle_donor_details.donor_dropdown_id,donor.legal_name,donor.donor_id,donor.code FROM `project_cycle_donor_details` 
													JOIN donor ON project_cycle_donor_details.donor_dropdown_id=donor.donor_id
													WHERE project_cycle_donor_details.id=$project_cycle_donor_id";
													$data_fetch = $this->db->query($sql_cycle)->result_array();
													if($data_fetch){
														$code=$data_fetch[0]['code'];
													}
													
													
													
													$project_cycle_id=$row->project_cycle_id;
												?>
												<tr>
													<td  class="text-center"><?php echo $code;?></td>
													<td  class="text-center"><i class="fa fa-inr" aria-hidden="true"></i><?php echo $row->donor_amount;?></td>
													
												</tr>	
																								
												<?php } }?>
											
										</tbody>
									</table>
								</div>
							</div>
							<div  class="col-md-6 text-right">
								<label for="title">Reasons for amount change</label>
							</div>
							<div class="col-md-6"> 
								<pre class="is_edit_hide"><?php echo $is_cheker_radion_comments_change;?></pre>
							</div>
						</div>
							
						<?php }else if($is_cheker_radion=='No'){?>	
						<div class="form-group row">
							<div  class="col-md-6 text-right">
								<label for="title">Why not?:</label>
							</div>
							<div class="col-md-6"> 
								<pre class="is_edit_hide"><?php echo $comments_is_cheker_radion_no;?>
								 </span>
							</div>
						</div>
							<?php }else{}?>
						
					</div>
				</div>
					
			</div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
 

