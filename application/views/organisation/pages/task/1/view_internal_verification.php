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
		
	//var_dump($internal_data);
	if($internal_data){
		$was_focalPoint='';
		$is_review_radion='';
		
		$project_id_radio='';
		$project_name_radio='';
		$startend_mou_radio='';
		$payment_period_radio='';
		$amount_show_radio='';
		$payment_request_radio='';
		
		$document_mou_radio='';
		$date_project_mou_radio='';
		$date_payment_mou_radio='';
		$total_expen_radio='';
		
		$bajaj_formate_radio_error='';
		$covor_all_mou_radio='';
		$period_covered_mou_radio='';
		$proper_photos_radio='';
		
		$comments_1='';
		$comments_2='';
		$comments_no='';
		$comments_change='';
		$donor_amount_list='';
		
		$csr_file_value1='';
		$csr_file_value_actual1='';
		
		$csr_list='';
		
		$ngo_doc_hiddien='';
		$ngo_payment_hidden='';
		
		if(isset($internal_data)){
			$additional_json = json_decode($internal_data);
			//var_dump($additional_json);
			if(isset($additional_json[0]->was_focalPoint)){
				$was_focalPoint = $additional_json[0]->was_focalPoint;
			}
			if(isset($additional_json[0]->is_review_radion)){
				$is_review_radion = $additional_json[0]->is_review_radion;
			}
			if(isset($additional_json[0]->comments_no)){
				$comments_no = $additional_json[0]->comments_no;
			}
			if(isset($additional_json[0]->comments_1)){
				$comments_1 = $additional_json[0]->comments_1;
			}
			if(isset($additional_json[0]->comments_2)){
				$comments_2 = $additional_json[0]->comments_2;
			}
			if(isset($additional_json[0]->csr_file_value1)){
				$csr_file_value1 = $additional_json[0]->csr_file_value1;
			}
			if(isset($additional_json[0]->csr_file_value_actual1)){
				$csr_file_value_actual1 = $additional_json[0]->csr_file_value_actual1;
			}
			if(isset($additional_json[0]->donor_amount)){
				$donor_amount = $additional_json[0]->donor_amount;
			}
			if(isset($additional_json[0]->comments_change)){
				$comments_change = $additional_json[0]->comments_change;
			}
			
			
			if(isset($additional_json[0]->project_id_radio)){
				$project_id_radio = $additional_json[0]->project_id_radio;
			}
			if(isset($additional_json[0]->project_name_radio)){
				$project_name_radio = $additional_json[0]->project_name_radio;
			}
			if(isset($additional_json[0]->startend_mou_radio)){
				$startend_mou_radio = $additional_json[0]->startend_mou_radio;
			}
			if(isset($additional_json[0]->payment_period_radio)){
				$payment_period_radio = $additional_json[0]->payment_period_radio;
			}
			if(isset($additional_json[0]->amount_show_radio)){
				$amount_show_radio = $additional_json[0]->amount_show_radio;
			}
			if(isset($additional_json[0]->payment_request_radio)){
				$payment_request_radio = $additional_json[0]->payment_request_radio;
			}
			
			
			if(isset($additional_json[0]->document_mou_radio)){
				$document_mou_radio = $additional_json[0]->document_mou_radio;
			}
			if(isset($additional_json[0]->date_project_mou_radio)){
				$date_project_mou_radio = $additional_json[0]->date_project_mou_radio;
			}
			if(isset($additional_json[0]->date_payment_mou_radio)){
				$date_payment_mou_radio = $additional_json[0]->date_payment_mou_radio;
			}
			if(isset($additional_json[0]->total_expen_radio)){
				$total_expen_radio = $additional_json[0]->total_expen_radio;
			}
			
			
			if(isset($additional_json[0]->bajaj_formate_radio)){
				$bajaj_formate_radio = $additional_json[0]->bajaj_formate_radio;
			}
			if(isset($additional_json[0]->covor_all_mou_radio)){
				$covor_all_mou_radio = $additional_json[0]->covor_all_mou_radio;
			}
			if(isset($additional_json[0]->period_covered_mou_radio)){
				$period_covered_mou_radio = $additional_json[0]->period_covered_mou_radio;
			}
			if(isset($additional_json[0]->proper_photos_radio)){
				$proper_photos_radio = $additional_json[0]->proper_photos_radio;
			}
			
			if(isset($additional_json[0]->donor_amount_list)){
				$donor_amount_list = $additional_json[0]->donor_amount_list;
				//var_dump($donor_amount_list);
			}
			if(isset($additional_json[0]->csr_list)){
				$csr_list = $additional_json[0]->csr_list;
				//var_dump($csr_list);
			}
			if(isset($additional_json[0]->ngo_payment_hidden)){
				$ngo_payment_hidden = $additional_json[0]->ngo_payment_hidden;
				//var_dump($ngo_payment_hidden);
			}
			if(isset($additional_json[0]->ngo_doc_hiddien)){
				$ngo_doc_hiddien = $additional_json[0]->ngo_doc_hiddien;
				//var_dump($ngo_doc_hiddien);
			}
					
			
		
		}else{
			$was_focalPoint='';
			$project_id_radio='';
			$project_name_radio='';
			$startend_mou_radio='';
			$payment_period_radio='';
			$amount_show_radio='';
			$payment_request_radio='';
			
			$document_mou_radio='';
			$date_project_mou_radio='';
			$date_payment_mou_radio='';
			$total_expen_radio='';
			
			$bajaj_formate_radio='';
			$covor_all_mou_radio='';
			$period_covered_mou_radio='';
			$proper_photos_radio='';
			
			$comments_no='';
			$comments_1='';
			$comments_2='';
			$is_review_radion='';
			$csr_file_value1='';
			$csr_file_value_actual1='';
			
			$donor_amount='';
			$comments_change='';
			$cycle_is_payment='';
			
			$donor_amount_list='';
			
			$csr_file_value1='';
			$csr_file_value_actual1='';
			
			$csr_list='';
			
			$ngo_doc_hiddien='';
			$ngo_payment_hidden='';
		}
		
		
    }else{
		$was_focalPoint='';		
		$project_id_radio='';
		$project_name_radio='';
		$startend_mou_radio='';
		$payment_period_radio='';
		$amount_show_radio='';
		$payment_request_radio='';
		
		$document_mou_radio='';
		$date_project_mou_radio='';
		$date_payment_mou_radio='';
		$total_expen_radio='';
		
		$bajaj_formate_radio='';
		$covor_all_mou_radio='';
		$period_covered_mou_radio='';
		$proper_photos_radio='';
		
		$comments_no='';
		$comments_1='';
		$comments_2='';
		$is_review_radion='';
		$csr_file_value1='';
		$csr_file_value_actual1='';
		
		$donor_amount='';
		$comments_change='';
		$cycle_is_payment='';
		
		$donor_amount_list='';
		
		$csr_file_value1='';
		$csr_file_value_actual1='';
		
		$ngo_doc_hiddien='';
		$ngo_payment_hidden='';
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
						<h3 class="box-title">Internal Verification</h3>
					</div>
					<div class="box-body">
						
						<div class="form-group row">
							<div  class="col-md-6 text-right">
								<label for="title">Was the Focal Point Review done satisfactorily?</label>
							</div>
							<div class="col-md-6"> 
								<span><?php if($was_focalPoint){echo $was_focalPoint;}?></span>
							</div>
						</div>
						
						
						<h5>NGO Payment Request Doc Checklist</h5>
						
						<div class="form-group row">
							<div  class="col-md-6 text-right">
								<label for="title">Project ID entered correctly?</label>
							</div>
							<div class="col-md-6"> 
								<pre class="is_edit_hide"><?php echo $project_id_radio;?></pre>
							</div>
						</div>
						
						<div class="form-group row">
							<div  class="col-md-6 text-right">
								<label for="title">Project name entered correctly?</label>
							</div>
							<div class="col-md-6"> 
								<pre class="is_edit_hide"><?php echo $project_name_radio;?></pre>
							</div>
						</div>
						
						<div class="form-group row">
							<div  class="col-md-6 text-right">
								<label for="title">Is Start and End Date as per MoU?</label>
							</div>
							<div class="col-md-6"> 
								<pre class="is_edit_hide"><?php echo $startend_mou_radio;?></pre>
							</div>
						</div>
						
						<div class="form-group row">
							<div  class="col-md-6 text-right">
								<label for="title">Is Payment Period as per MOU?</label>
							</div>
							<div class="col-md-6"> 
								<pre class="is_edit_hide"><?php echo $payment_period_radio;?></pre>
							</div>
						</div>

						<div class="form-group row">
							<div  class="col-md-6 text-right">
								<label for="title">Is the amount shown properly in LAKHS?</label>
							</div>
							<div class="col-md-6"> 
								<pre class="is_edit_hide"><?php echo $amount_show_radio;?></pre>
							</div>
						</div>
						
						<div class="form-group row">
							<div  class="col-md-6 text-right">
								<label for="title">Is the Payment Request on the Organisation's Letter Head?</label>
							</div>
							<div class="col-md-6"> 
								<pre class="is_edit_hide"><?php echo $payment_request_radio;?></pre>
							</div>
						</div>
						
						<h5>Utilization Certificate Doc Checklist</h5>
						<div class="form-group row">
							<div  class="col-md-6 text-right">
								<label for="title">Is the document audited (or not) as per MOU?</label>
							</div>
							<div class="col-md-6"> 
								<pre class="is_edit_hide"><?php echo $document_mou_radio;?></pre>
							</div>
						</div>
						
						<div class="form-group row">
							<div  class="col-md-6 text-right">
								<label for="title">Are dates for Project as per MOU?</label>
							</div>
							<div class="col-md-6"> 
								<pre class="is_edit_hide"><?php echo $date_project_mou_radio;?></pre>
							</div>
						</div>

						<div class="form-group row">
							<div  class="col-md-6 text-right">
								<label for="title">Are dates for Payment Period as per MOU?</label>
							</div>
							<div class="col-md-6"> 
								<pre class="is_edit_hide"><?php echo $date_payment_mou_radio;?></pre>
							</div>
						</div>
						
						<div class="form-group row">
							<div  class="col-md-6 text-right">
								<label for="title">Is total expenditure and totals within each vertical correct?</label>
							</div>
							<div class="col-md-6"> 
								<pre class="is_edit_hide"><?php echo $total_expen_radio;?></pre>
							</div>
						</div>
						
						
						<h5>Activity Report Doc Checklist</h5>
						<div class="form-group row">
							<div  class="col-md-6 text-right">
								<label for="title">Is it as per Bajaj Format?</label>
							</div>
							<div class="col-md-6"> 
								<pre class="is_edit_hide"><?php echo $bajaj_formate_radio;?></pre>
							</div>
						</div>
						
						<div class="form-group row">
							<div  class="col-md-6 text-right">
								<label for="title">Does it cover all the points mentioned in the MOU?</label>
							</div>
							<div class="col-md-6"> 
								<pre class="is_edit_hide"><?php echo $covor_all_mou_radio;?></pre>
							</div>
						</div>

						<div class="form-group row">
							<div  class="col-md-6 text-right">
								<label for="title">Is the period covered as per the MOU?</label>
							</div>
							<div class="col-md-6"> 
								<pre class="is_edit_hide"><?php echo $period_covered_mou_radio;?></pre>
							</div>
						</div>
						
						<div class="form-group row">
							<div  class="col-md-6 text-right">
								<label for="title">Have proper photos been provided?</label>
							</div>
							<div class="col-md-6"> 
								<pre class="is_edit_hide"><?php echo $proper_photos_radio;?></pre>
							</div>
						</div>
						
						
						<h5>Additional Details</h5>
						<div class="form-group row">
							<div  class="col-md-6 text-right">
								<label for="title">Additional details/comments for this cycle</label>
							</div>
							<div class="col-md-6"> 
								<pre class="is_edit_hide"><?php echo $comments_1;?></pre>
							</div>
						</div>
						
						<div class="form-group row">
							<div  class="col-md-6 text-right">
								<label for="title">Additional details/comments for the NEXT cycle (if applicable)</label>
							</div>
							<div class="col-md-6"> 
								<pre class="is_edit_hide"><?php echo $comments_2;?></pre>
							</div>
						</div>
						
						
						
						<div class="form-group row">
							<div  class="col-md-6 text-right">
								<label for="title">Should the payment be made for this cycle?</label>
							</div>
							<div class="col-md-6"> 
								<span class="is_edit_hide"><?php

								if($is_review_radion=='Change'){echo 'Change Amount to be given';}
								else if($is_review_radion=='Yes'){echo 'Yes';}else{ echo 'No';} ?></span>
							</div>
						</div>
						<?php 
							if($is_review_radion=='Change'){
						
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
								<pre class="is_edit_hide"><?php echo $comments_change;?></pre>
							</div>
							
							
							
						</div>
							
						<?php }else if($is_review_radion=='No'){?>	
						<div class="form-group row">
							<div  class="col-md-6 text-right">
								<label for="title">Why not?:</label>
							</div>
							<div class="col-md-6"> 
								<pre class="is_edit_hide"><?php echo $comments_no;?>
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
 

