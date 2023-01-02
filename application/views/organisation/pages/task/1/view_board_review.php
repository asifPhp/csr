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
	<?php
	$page_heading = '';
    $heading = '';
    $show_edit = '';
    
	//var_dump($board_review_data);
	
	
	
	if($board_review_data){
		
		$my_final='';
		$donor_dropdown_text1='';
		$donor_dropdown_text2='';
		$donor_dropdown_text3='';
		$donor_dropdown_id1='';
		$donor_dropdown_id2='';
		$donor_dropdown_id3='';
		$comments_first='';
		$visit_date='';
		$donor_list='';
		
		$csr_file_value1='';
		$csr_file_value_actual1='';
		
		$comments_request='';
		$comments_reject_yes1='';
		$comments_reject_yes2='';
		
		//comments_request
		//var_dump($board_review_data);
		if(isset($board_review_data)){
			$additional_json = json_decode($board_review_data);
			///var_dump($additional_json);
			if(isset($additional_json[0]->my_final)){
				$my_final = $additional_json[0]->my_final;
			}
			if(isset($additional_json[0]->donor_dropdown_text1)){
				$donor_dropdown_text1 = $additional_json[0]->donor_dropdown_text1;
			}
			if(isset($additional_json[0]->donor_dropdown_text2)){
				$donor_dropdown_text2 = $additional_json[0]->donor_dropdown_text2;
			}
			if(isset($additional_json[0]->donor_dropdown_text3)){
				$donor_dropdown_text3 = $additional_json[0]->donor_dropdown_text3;
			}
			if(isset($additional_json[0]->donor_dropdown_id1)){
				$donor_dropdown_id1 = $additional_json[0]->donor_dropdown_id1;
			}
			if(isset($additional_json[0]->donor_dropdown_id2)){
				$donor_dropdown_id2 = $additional_json[0]->donor_dropdown_id2;
			}
			if(isset($additional_json[0]->donor_dropdown_id3)){
				$donor_dropdown_id3 = $additional_json[0]->donor_dropdown_id3;
			}
			//var_dump($additional_json[0]->comments_first);
			if(isset($additional_json[0]->comments_first)){
				$comments_first = $additional_json[0]->comments_first;
			}
			if(isset($additional_json[0]->visit_date)){
				$visit_date = $additional_json[0]->visit_date;
			}
			if(isset($additional_json[0]->csr_file_value_actual1)){
				$csr_file_value_actual1 = $additional_json[0]->csr_file_value_actual1;
			}
			if(isset($additional_json[0]->csr_file_value1)){
				$csr_file_value1 = $additional_json[0]->csr_file_value1;
			}
			if(isset($additional_json[0]->donor_list)){
				$donor_list = $additional_json[0]->donor_list;
				//var_dump($donor_list);
			}
			if(isset($additional_json[0]->comments_request)){
				$comments_request = $additional_json[0]->comments_request;
				//var_dump($donor_list);
			}
			if(isset($additional_json[0]->comments_reject_yes1)){
				$comments_reject_yes1 = $additional_json[0]->comments_reject_yes1;
				//var_dump($donor_list);
			}if(isset($additional_json[0]->comments_reject_yes2)){
				$comments_reject_yes2 = $additional_json[0]->comments_reject_yes2;
				//var_dump($donor_list);
			}
			
		}else{
			$my_final='';
			$donor_dropdown_text1='';
			$donor_dropdown_text2='';
			$donor_dropdown_text3='';
			$donor_dropdown_id1='';
			$donor_dropdown_id2='';
			$donor_dropdown_id3='';
			$comments_first='';
			$visit_date='';
			$donor_list='';
			$csr_file_value1='';
			$csr_file_value_actual1='';
			$donor_list='';
			$comments_request='';
			$comments_reject_yes1='';
			$comments_reject_yes2='';
		
		}
    }else{
		
		$my_final='';
		$donor_dropdown_text1='';
		$donor_dropdown_text2='';
		$donor_dropdown_text3='';
		$donor_dropdown_id1='';
		$donor_dropdown_id2='';
		$donor_dropdown_id3='';
		$comments_first='';
		$visit_date='';
		$donor_list='';
		$comments_request='';
		
		$csr_file_value1='';
		$csr_file_value_actual1='';
		$comments_reject_yes1='';
		$comments_reject_yes2='';
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
						<h3 class="box-title">Board Review & Final Approval</h3>
					</div>
					
					<div class="box-body">
						<div class="form-group row">
							<label for="title" class="col-md-6 text-right">Date of visit</label>
							<div class="col-md-6"> 
								<span class="is_edit_hide"><?php echo date_formats($visit_date);?></span>
							</div>
						</div>
						<div class="form-group row">
							<label for="title" class="col-md-6 text-right">Summary of relevant comments by Advisory Board</label>
							<div class="col-md-6"> 
								<pre class="is_edit_hide"><?php echo $comments_first;?></pre>
							</div>
						</div>
						
						<div class="form-group row">
							<label for="title" class="col-md-6 text-right">Select the final decision for this proposal</label>
							<div class="col-md-6"> 
								<?php 
								
								if($my_final=='my_approve'){echo "<b>Approve proposal and create project </b>"; 
								}else if($my_final=='my_request'){echo " <b>Request revision of Proposal</b> details from the NGO (NGO will be notified and further review of the proposal will be paused).";
								}else echo "<b>Reject the Proposal </b>(NGO will be notified of the same as per the details below).";
								
								?>
								
							</div>
						</div>
						<?php if($my_final=='my_approve'){
							
						?>
						<h5>Project Details</h5>
						<div class="form-group row">
							<label for="title" class="col-md-6 text-right">Donor details</label>
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
											<?php if(!$donor_list){?>
												<td class="text-center" colspan="5" >No data Available</td>
											<?php }
												if($donor_list and $donor_list>0){
													foreach($donor_list as $row){
														
														$donor_id=$row->select_donor;
														$sql6="SELECT code FROM donor WHERE donor_id=$donor_id";
														
													$donor_list = $this->db->query($sql6)->result_array();
													//var_dump($donor_list[0]['legal_name']);
														
														//var_dump($row);
													
												?>
												<tr>
													<td  class="text-center"><?php echo $donor_list[0]['code'];?></td>
													<td  class="text-center"><?php echo $row->donor_amount;?></td>
												</tr>	
																								
												<?php } }?>
											
										</tbody>
									</table>
								</div>
							</div>
						</div>
						
						<div class="form-group row">
							<label for="title" class="col-md-6 text-right">Assign a Focal Point for this Project</label>
							<div class="col-md-6"> 
								<span class="is_edit_hide"><?php echo $donor_dropdown_text1;?></span>
							</div>
						</div>
						<div class="form-group row">
							<label for="title" class="col-md-6 text-right">Assign an Approver for this Project.</label>
							<div class="col-md-6"> 
								<span class="is_edit_hide"><?php echo $donor_dropdown_text2;?></span>
							</div>
						</div>
						<div class="form-group row">
							<label for="title" class="col-md-6 text-right">Assign a Checker for this Project</label>
							<div class="col-md-6"> 
								<span class="is_edit_hide"><?php echo $donor_dropdown_text3;?></span>
							</div>
						</div>
						
						<div class="form-group row">
							<label for="title" class="col-md-6 text-right">Upload final signed approval sheet</label>
							<div class="col-md-6"> 
								<a  href="<?php echo base_url()?>uploads/<?php echo $csr_file_value1;?>"  target="_blank"><?php echo $csr_file_value_actual1;?></a>
							</div>
						</div>
						<?php }else if($my_final=='my_request'){;?>
						
						<div class="form-group row">
							<label for="title" class="col-md-6 text-right">Enter details of what the NGO needs to revise in this proposal.</label>
							<div class="col-md-6"> 
								<pre class="is_edit_hide"><?php echo $comments_request;?></pre>
							</div>
						</div>
						<?php }else{?>
						
						<div class="form-group row">
							<label for="title" class="col-md-6 text-right">Enter reasons for rejection (internal)</label>
							<div class="col-md-6"> 
								<pre class="is_edit_hide"><?php echo $comments_reject_yes1;?></pre>
							</div>
						</div>
						<div class="form-group row">
							<label for="title" class="col-md-6 text-right">Enter reasons for rejection (for submission to NGO)</label>
							<div class="col-md-6"> 
								<pre class="is_edit_hide"><?php echo $comments_reject_yes2;?></pre>
							</div>
						</div>
						<?php }?>
					</div>
				</div>
				
				
			</div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

 
