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
    
	//var_dump($proposal_desk_review_data);
	
	
	
	if($proposal_desk_review_data){
		$comments_no='';
		$comments_1='';
		$comments_2='';
		$comments_3='';
		$comments_4='';
		$comments_5='';
		$comments_6='';
		$comments_7='';
		$comments_8='';
		$comments_9='';
		$comments_10='';
		$comments_11='';
		$comments_12='';
		
		$is_review_radion='';
		
		$is_prior='';	
		$is_reference='';
		$is_leadership='';
		$is_recognition='';
		$is_linkage='';
		$is_management='';
		$is_geographical='';
		$is_benificiary='';
		$is_past='';
		$is_existing='';
		
		$is_rec='';
		
		$csr_file_value1='';
		$csr_file_value2='';
		$csr_file_value3='';
		
		$csr_file_value_actual1='';
		$csr_file_value_actual2='';
		$csr_file_value_actual3='';
		
		if(isset($proposal_desk_review_data)){
			$additional_json = json_decode($proposal_desk_review_data);
			//var_dump($additional_json);
			if(isset($additional_json[0]->comments_no)){
				$comments_no = $additional_json[0]->comments_no;
			}
			if(isset($additional_json[0]->comments_1)){
				$comments_1 = $additional_json[0]->comments_1;
			}
			if(isset($additional_json[0]->comments_2)){
				$comments_2 = $additional_json[0]->comments_2;
			}
			if(isset($additional_json[0]->comments_3)){
				$comments_3 = $additional_json[0]->comments_3;
			}
			if(isset($additional_json[0]->comments_4)){
				$comments_4 = $additional_json[0]->comments_4;
			}
			if(isset($additional_json[0]->comments_5)){
				$comments_5 = $additional_json[0]->comments_5;
			}
			if(isset($additional_json[0]->comments_6)){
				$comments_6 = $additional_json[0]->comments_6;
			}
			if(isset($additional_json[0]->comments_7)){
				$comments_7 = $additional_json[0]->comments_7;
			}
			if(isset($additional_json[0]->comments_8)){
				$comments_8 = $additional_json[0]->comments_8;
			}
			if(isset($additional_json[0]->comments_9)){
				$comments_9 = $additional_json[0]->comments_9;
			}
			if(isset($additional_json[0]->comments_10)){
				$comments_10 = $additional_json[0]->comments_10;
			}
			if(isset($additional_json[0]->comments_11)){
				$comments_11 = $additional_json[0]->comments_11;
			}
			if(isset($additional_json[0]->comments_12)){
				$comments_12 = $additional_json[0]->comments_12;
			}
			
			
			if(isset($additional_json[0]->is_review_radion)){
				$is_review_radion = $additional_json[0]->is_review_radion;
			}
			
			if(isset($additional_json[0]->is_prior)){
				$is_prior = $additional_json[0]->is_prior;
			}
			if(isset($additional_json[0]->is_reference)){
				$is_reference = $additional_json[0]->is_reference;
			}
			if(isset($additional_json[0]->is_leadership)){
				$is_leadership = $additional_json[0]->is_leadership;
			}
			if(isset($additional_json[0]->is_recognition)){
				$is_recognition = $additional_json[0]->is_recognition;
			}
			if(isset($additional_json[0]->is_linkage)){
				$is_linkage = $additional_json[0]->is_linkage;
			}
			if(isset($additional_json[0]->is_management)){
				$is_management = $additional_json[0]->is_management;
			}
			if(isset($additional_json[0]->is_geographical)){
				$is_geographical = $additional_json[0]->is_geographical;
			}
			if(isset($additional_json[0]->is_benificiary)){
				$is_benificiary = $additional_json[0]->is_benificiary;
			}
			if(isset($additional_json[0]->is_past)){
				$is_past = $additional_json[0]->is_past;
			}
			if(isset($additional_json[0]->is_existing)){
				$is_existing = $additional_json[0]->is_existing;
			}
					
			if(isset($additional_json[0]->is_rec)){
				$is_rec = $additional_json[0]->is_rec;
			}
			
			if(isset($additional_json[0]->csr_file_value1)){
				$csr_file_value1 = $additional_json[0]->csr_file_value1;
			}
			if(isset($additional_json[0]->csr_file_value2)){
				$csr_file_value2 = $additional_json[0]->csr_file_value2;
			}
			if(isset($additional_json[0]->csr_file_value3)){
				$csr_file_value3 = $additional_json[0]->csr_file_value3;
			}
			
			if(isset($additional_json[0]->csr_file_value_actual1)){
				$csr_file_value_actual1 = $additional_json[0]->csr_file_value_actual1;
			}
			if(isset($additional_json[0]->csr_file_value_actual2)){
				$csr_file_value_actual2 = $additional_json[0]->csr_file_value_actual2;
			}
			if(isset($additional_json[0]->csr_file_value_actual3)){
				$csr_file_value_actual3 = $additional_json[0]->csr_file_value_actual3;
			}
		
		}else{
			$comments_no='';
			$comments_1='';
			$comments_2='';
			$comments_3='';
			$comments_4='';
			$comments_5='';
			$comments_6='';
			$comments_7='';
			$comments_8='';
			$comments_9='';
			$comments_10='';
			$comments_11='';
			$comments_12='';
			
			$is_review_radion='';
			
			$is_prior='';	
			$is_reference='';
			$is_leadership='';
			$is_recognition='';
			$is_linkage='';
			$is_management='';
			$is_geographical='';
			$is_benificiary='';
			$is_past='';
			$is_existing='';
			
			$is_rec='';
			
			$csr_file_value1='';
			$csr_file_value2='';
			$csr_file_value3='';
			
			$csr_file_value_actual1='';
			$csr_file_value_actual2='';
			$csr_file_value_actual3='';
			
		}
    }else{
        $comments_no='';
		$comments_1='';
		$comments_2='';
		$comments_3='';
		$comments_4='';
		$comments_5='';
		$comments_6='';
		$comments_7='';
		$comments_8='';
		$comments_9='';
		$comments_10='';
		$comments_11='';
		$comments_12='';
		
		$is_review_radion='';
		
		$is_prior='';	
		$is_reference='';
		$is_leadership='';
		$is_recognition='';
		$is_linkage='';
		$is_management='';
		$is_geographical='';
		$is_benificiary='';
		$is_past='';
		$is_existing='';
		
		$is_rec='';
		
		$csr_file_value1='';
		$csr_file_value2='';
		$csr_file_value3='';
		
		$csr_file_value_actual1='';
		$csr_file_value_actual2='';
		$csr_file_value_actual3='';
		
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
						<h3 class="box-title">Proposal Desk Review</h3>
					</div>
					
					<div class="box-body">
						<form id="proposal_form4" method="post" role="form">
						
							<div class="form-group row">
								<h5 for="title" class="col-md-6 text-right">Proposal Summary</h5>
							</div>
				<div class="display_none">			
							<div class="form-group row">
								<div  class="col-md-6 text-right">
									<label for="title">Target Geography: Does it overlap with our core geographies</label>
								</div>
								<div class="col-md-6"> 
									<span class="is_edit_hide">
									<?php 
									//var_dump($is_prior);
										if($is_prior == 'is_prior_one'){echo "Core 5 geographies (Pune / Aurangabad / Wardha / Pantnagar / Sikar)."; }
										else if($is_prior == 'is_prior_two'){echo "Larger core states (Maharashtra/Rajasthan/Uttarakhand). " ;} 
										else{echo "Rest of India.";}
									?>
									
									</span>
								</div>
							</div>
							
							<div class="form-group row">
								<label for="title" class="col-md-6 text-right">Details/Comments on above</label>
								<div class="col-md-6"> 
									<pre class="is_edit_hide"><?php echo $comments_1;?></pre>
								</div>
							</div>
							
							<div class="form-group row">
								<label for="title" class="col-md-6 text-right">Are the sub-sectors of interest to Bajaj companies</label>
								<div class="col-md-6"> 
									<span class="is_edit_hide">
									<?php 
										if($is_reference == 'is_reference_one'){echo "Water Conservation / Health+Children / Primary Education / Potable Water / Healthcare-Capex."; }
										else if($is_reference == 'is_reference_two'){echo "Other projects in NRM / Education / Health." ;} 
										else{echo 'Outside the preferred sub-sectors.';}
									?>
									
									</span>
								</div>
							</div>
							
							<div class="form-group row">
								<label for="title" class="col-md-6 text-right">Details/Comments on above</label>
								<div class="col-md-6"> 
									<pre class="is_edit_hide"><?php echo $comments_2;?></pre>
								</div>
							</div>
							
							<div class="form-group row">
								<label for="title" class="col-md-6 text-right">Problem definition</label>
								<div class="col-md-6"> 
									<span class="is_edit_hide">
									<?php 
										if($is_leadership == 'is_leadership_one'){echo "Clerly defined with location specific data"; }
										else if($is_leadership == 'is_leadership_two'){echo "Problem is identified - no specific data" ;} 
										else{echo 'Generic statement without data';}
									?>
									
									</span>
								</div>
							</div>
							
							<div class="form-group row">
								<label for="title" class="col-md-6 text-right">Details/Comments on above</label>
								<div class="col-md-6"> 
									<pre class="is_edit_hide"><?php echo $comments_3;?></pre>
								</div>
							</div>
							
							<div class="form-group row">
								<label for="title" class="col-md-6 text-right">Robustness of proposed solution</label>
								<div class="col-md-6"> 
									<span class="is_edit_hide">
									<?php 
										if($is_recognition == 'is_recognition_one'){echo "The solution is robust and tested / Past experience has delivered material benefits."; }
										else if($is_recognition == 'is_recognition_two'){echo "Solution proposed has given positive results. Issues with context / scale / others." ;} 
										else{echo "Others";}
									?>
									
									</span>
								</div>
							</div>
							
							<div class="form-group row">
								<label for="title" class="col-md-6 text-right">Details/Comments on above</label>
								<div class="col-md-6"> 
									<pre class="is_edit_hide"><?php echo $comments_4;?></pre>
								</div>
							</div>
							
							<div class="form-group row">
								<label for="title" class="col-md-6 text-right">Outcome anticipated</label>
								<div class="col-md-6"> 
									<span class="is_edit_hide">
									<?php 
										if($is_linkage == 'is_linkage_one'){echo "Clear outcomes identified. Appear feasible. SMART goals"; }
										else if($is_linkage == 'is_linkage_two'){echo "Generic outcome statements. Not SMART" ;} 
										else{echo "No outcomes specified / unrealisted outcomes";}
									?>
									
									</span>
								</div>
							</div>
							
							<div class="form-group row">
								<label for="title" class="col-md-6 text-right">Details/Comments on above</label>
								<div class="col-md-6"> 
									<pre class="is_edit_hide"><?php echo $comments_5;?></pre>
								</div>
							</div>
							
							<div class="form-group row">
								<label for="title" class="col-md-6 text-right">M & E Plan</label>
								<div class="col-md-6"> 
									<span class="is_edit_hide">
									<?php 
										if($is_management == 'is_management_one'){echo "Clear M&E plan with external assessment (for 1 Cr+ projects)"; }
										else if($is_management == 'is_management_two'){echo "Internal assessment only. Largely focused on activity, not outcome" ;} 
										else{echo "No assessment possible. Vague indicators";}
									?>
									
									</span>
								</div>
							</div>
							
							<div class="form-group row">
								<label for="title" class="col-md-6 text-right">Details/Comments on above</label>
								<div class="col-md-6"> 
									<pre class="is_edit_hide"><?php echo $comments_6;?></pre>
								</div>
							</div>
							
							<div class="form-group row">
								<label for="title" class="col-md-6 text-right">Budget scale: Project budget as a percentage of total budget of NGO</label>
								<div class="col-md-6"> 
									<span class="is_edit_hide">
									<?php 
										if($is_geographical == 'is_geographical_one'){echo "Less than 25% of annual budget"; }
										else if($is_geographical == 'is_geographical_two'){echo "Between 25-50% of annual budget" ;} 
										else{echo "More than 50% of annual budget";}
									?>
									
									</span>
								</div>
							</div>
							
							<div class="form-group row">
								<label for="title" class="col-md-6 text-right">Details/Comments on above</label>
								<div class="col-md-6"> 
									<pre class="is_edit_hide"><?php echo $comments_7;?></pre>
								</div>
							</div>
							
							<div class="form-group row">
								<label for="title" class="col-md-6 text-right">Beneficiary contribution plan (including kind)</label>
								<div class="col-md-6"> 
									<span class="is_edit_hide">
									<?php 
										if($is_benificiary == 'is_benificiary_one'){echo "There is a clear contribution with equity (i.e. the poor have the option of contributing in kind)"; }
										else if($is_benificiary == 'is_benificiary_two'){echo "Cash based contribution only" ;} 
										else{echo "Beneficiaries do not contribute";}
									?>
									
									</span>
								</div>
							</div>
							
							<div class="form-group row">
								<label for="title" class="col-md-6 text-right">Details/Comments on above</label>
								<div class="col-md-6"> 
									<pre class="is_edit_hide"><?php echo $comments_8;?></pre>
								</div>
							</div>
							
							<div class="form-group row">
								<label for="title" class="col-md-6 text-right">Sustainability of the project</label>
								<div class="col-md-6"> 
									<span class="is_edit_hide">
									<?php 
										if($is_past == 'is_past_one'){echo "Project sustainability plan and exit strategy exists"; }
										else if($is_past == 'is_past_two'){echo "Other donor(s) required for ongoing expenses" ;} 
										else{echo "No exit plan";}
									?>
									
									</span>
								</div>
							</div>
							
							<div class="form-group row">
								<label for="title" class="col-md-6 text-right">Details/Comments on above</label>
								<div class="col-md-6"> 
									<pre class="is_edit_hide"><?php echo $comments_9;?></pre>
								</div>
							</div>
							
							<div class="form-group row">
								<label for="title" class="col-md-6 text-right">Existing Presence in Project Area</label>
								<div class="col-md-6"> 
									<span class="is_edit_hide">
									<?php 
										if($is_existing == 'is_existing_one'){echo " More than 2 years with dedicated office and staff"; }
										else if($is_existing == 'is_existing_two'){echo "0.5 to 2 years. May or may not have dedicated staff in the area " ;} 
										else{echo "Less than 0.5 years";}
									?>
									
									</span>
								</div>
							</div>
				</div>
							
							<div class="form-group row">
								<label for="title" class="col-md-6 text-right">Edit the Problem Statement entered by NGO to make it suitable for the Approval Sheet</label>
								<div class="col-md-6"> 
									<pre class="is_edit_hide"><?php echo $comments_6;?></pre>
								</div>
							</div>
							
							<div class="form-group row">
								<label for="title" class="col-md-6 text-right">Edit Project Objective entered by NGO to make it suitable for the Approval Sheet</label>
								<div class="col-md-6"> 
									<pre class="is_edit_hide"><?php echo $comments_7;?></pre>
								</div>
							</div>
							
							<div class="form-group row">
								<label for="title" class="col-md-6 text-right">Edit Project Methodology entered by NGO to make it suitable for the Approval Sheet</label>
								<div class="col-md-6"> 
									<pre class="is_edit_hide"><?php echo $comments_8;?></pre>
								</div>
							</div>	
							
							<div class="form-group row">
								<label for="title" class="col-md-6 text-right">Edit Project Outcomes entered by NGO to make it suitable for the Approval Sheet</label>
								<div class="col-md-6"> 
									<pre class="is_edit_hide"><?php echo $comments_9;?></pre>
								</div>
							</div>	
							
							
							<div class="form-group row">
								<h5 for="title" class="col-md-6 text-right">Review Summary</h5>
							</div>
							
							<div class="form-group row display_none">
								<label for="title" class="col-md-6 text-right">Static text</label>
								<div  class="col-md-6">
								   <small>TBD</small>
								</div>
							</div>
							
							<div class="form-group row">
								<label for="title" class="col-md-6 text-right">Overall summary of proposal desk review</label>
								<div class="col-md-6"> 
									<span class="is_edit_hide"><?php echo $comments_10;?></span>
									<pre class="is_edit_hide"><?php echo $comments_10;?></pre>
								</div>
							</div>

							<div class="form-group row">
								<label for="title" class="col-md-6 text-right">Key questions to be asked during field visit</label>
								<div class="col-md-6"> 
									<pre class="is_edit_hide"><?php echo $comments_11;?></pre>
								</div>
							</div>
							
							<div class="form-group row">
								<label for="title" class="col-md-6 text-right">Upload Proposal Desk Review document</label>
								<div class="col-md-6"> 
									<a  href="<?php echo base_url()?>uploads/<?php echo $csr_file_value2;?>"  target="_blank"><?php echo $csr_file_value_actual2;?></a>
								</div>
							</div>
							
							<div class="form-group row">
								<label for="title" class="col-md-6 text-right">Upload Financial Review document</label>
								<div class="col-md-6"> 
									<a  href="<?php echo base_url()?>uploads/<?php echo $csr_file_value3;?>"  target="_blank"><?php echo $csr_file_value_actual3;?></a>
								</div>
							</div>
							
							<div class="form-group row">
								<h5 for="title" class="col-md-6 text-right">Recommendation</h5>
							</div>
							
							<div class="form-group row">
								<label for="title" class="col-md-6 text-right">Do you recommend this application</label>
								<div class="col-md-6"> 
									<span class="is_edit_hide">
									<?php 
										if($is_rec == 'Yes, recommended'){echo "Yes, recommended"; }
										else{echo "No, not recommended";}
									?>
									
									</span>
								</div>
							</div>
							
							<div class="form-group row">
								<label for="title" class="col-md-6 text-right">Details/Comments on the above</label>
								<div class="col-md-6"> 
									<pre class="is_edit_hide"><?php echo $comments_12;?></pre>
								</div>
							</div>	
						</form>
					</div>
				</div>
				
				
			</div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

 
