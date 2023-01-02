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
    //var_dump($ngo_desk_review_data);
	if($ngo_desk_review_data){
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
		
		$organisation_three='';
		$organisation_eighty='';
		$organisation_csr1='';
		
		if(isset($ngo_desk_review_data)){
			$additional_json = json_decode($ngo_desk_review_data);
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
			if(isset($additional_json[0]->organisation_three)){
				$organisation_three = $additional_json[0]->organisation_three;
			}
			if(isset($additional_json[0]->organisation_eighty)){
				$organisation_eighty = $additional_json[0]->organisation_eighty;
			}
			if(isset($additional_json[0]->organisation_csr1)){
				$organisation_csr1 = $additional_json[0]->organisation_csr1;
			}
		
		}else{
			$organisation_three='';
			$organisation_eighty='';
			$organisation_csr1='';
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
			
			$organisation_three='';
			$organisation_eighty='';
			$organisation_csr1='';
			
		}
    }else{
        $page_heading = 'Create New Proposal';
        $heading = 'Add New Proposal';
        $prop_id =0;
        $title ='';
        $organisation_id ='';
        $organisation ='';
        $ngo_id ='';
        $ngo ='';
        $code ='';
        $gc_requested ='';
        $gc_responded ='';
        $gc_granted ='';
        $is_submit ='0';
        $is_readonly="";
        $generated_file_path="";
		
		$organisation_three='';
		$organisation_eighty='';
		$organisation_csr1='';
    }
		
	?>

   
	<div class="box box-primary collapsed-box">
		<div class="box-header with-border" data-widget="collapse">
			<i class="fa fa-plus btn btn-box-tool fa_plus"></i>
			<h3 class="box-title">NGO Desk Review</h3>
		</div>
		
		<div class="box-body">
			<?php if($is_review_radion=='Yes'){?>
			
				<div class="form-group row">
					<label for="title" class="col-md-6 text-right">Is a desk review required to be done</label>
					<div class="col-md-6"> 
						<span class="is_edit_hide" ><?php echo $is_review_radion;?></span>
					</div>
				</div>
				<div class="form-group row">
					<label for="title" class="col-md-6 text-right">Overall organisation profile summary for approval sheet</label>
					<div class="col-md-6"> 
						<pre class="is_edit_hide"><?php echo $comments_10;?></pre>
					</div>
				</div>
		<div class="display_none">	
				<div class="form-group row">
					<h5 for="title" class="col-md-6 text-right">Creditability</5>
				</div>
				
				<div class="form-group row">
					<label for="title" class="col-md-6 text-right">Prior Assessments: Part of rating organisations such as Goodera / BSE Samman / Credibility Alliance / TISS CISR empanelment / others</label>
					<div class="col-md-6"> 
						<span class="is_edit_hide">
						<?php 
							if($is_prior == 'is_prior_one'){echo "Listed on 3 more panels"; }
							else if($is_prior == 'is_prior_two'){echo "Listed on atleast 1 panel" ;} 
							else{echo 'Not on any portal';}
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
					<label for="title" class="col-md-6 text-right">References</label>
					<div class="col-md-6"> 
						<span class="is_edit_hide">
						<?php 
							if($is_reference == 'is_reference_one'){echo " Refferred by Chairman's Office/Other Directors/President of the Company.Past partner with positive work report"; }
							else if($is_reference == 'is_reference_two'){echo "Other references(including from existing partners and other business leads)" ;} 
							else{echo 'No references';}
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
					<label for="title" class="col-md-6 text-right">Leadership </label>
					<div class="col-md-6"> 	
						<span class="is_edit_hide">
						<?php 
							if($is_leadership == 'is_leadership_one'){echo "High Reputation.Positive Comments"; }
							else if($is_leadership == 'is_leadership_two'){echo "No Adverse Comments/Stories" ;} 
							else{echo 'Significant number of Adverse Stories';}
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
					<label for="title" class="col-md-6 text-right">Recognition and Awards</label>
					<div class="col-md-6"> 
						<span class="is_edit_hide">
						<?php 
							if($is_recognition == 'is_recognition_one'){echo "Jamnalal Bajaj Awardee/International/Significant national Awards(Institution or leadership) "; }
							else if($is_recognition == 'is_recognition_two'){echo "Other National level Awards " ;} 
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
					<label for="title" class="col-md-6 text-right">linkages</label>
					<div class="col-md-6"> 
						<span class="is_edit_hide">
						<?php 
							if($is_linkage == 'is_linkage_one'){echo "Leadership of national networks, member of global networks; good donor portfolio (e.g. Tata Trusts, global funders); international university linkage."; }
							else if($is_linkage == 'is_linkage_two'){echo "Membership of national or leadership of local networks; local university linkages; local corporate CSR." ;} 
							else{echo "No significant linkages";}
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
					<h5 for="title" class="col-md-6 text-right">Capability</h5>
				</div>
				
				<div class="form-group row">
					<label for="title" class="col-md-6 text-right">Management Capability</label>
					<div class="col-md-6"> 
						<span class="is_edit_hide">
						<?php 
							if($is_management == 'is_management_one'){echo "At least 25% of the organisation has professional qualification AND work experience greater than 10 years."; }
							else if($is_management == 'is_management_two'){echo "At least 25% of the organisation has professional qualification OR work experience greater than 10 years." ;} 
							else{echo "Others.";}
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
					<label for="title" class="col-md-6 text-right">Geographical Reach</label>
					<div class="col-md-6"> 
						<span class="is_edit_hide">
						<?php 
							if($is_geographical == 'is_geographical_one'){echo "Reaches more than 500 villages"; }
							else if($is_geographical == 'is_geographical_two'){echo "Reaches more than 100 villages" ;} 
							else{echo "Reaches less than 100 years";}
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
					<label for="title" class="col-md-6 text-right">Beneficiary reach</label>
					<div class="col-md-6"> 
						<span class="is_edit_hide">
						<?php 
							if($is_benificiary == 'is_benificiary_one'){echo "Reaches more than 1 lakh beneficiaries"; }
							else if($is_benificiary == 'is_benificiary_two'){echo " Reaches more than 100 villages  " ;} 
							else{echo "Reaches less than 100 villages ";}
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
					<label for="title" class="col-md-6 text-right">Past Experience</label>
					<div class="col-md-6"> 
						<span class="is_edit_hide">
						<?php 
							if($is_past == 'is_past_one'){echo "Yes,at same scale or greater.Has impacted policy and practice"; }
							else if($is_past == 'is_past_two'){echo "Yes,but 50-100% of proposed scale" ;} 
							else{echo "No,or lower";}
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
				
				<div class="form-group row">
					<label for="title" class="col-md-6 text-right">Details/Comments on above</label>
					<div class="col-md-6"> 
						<pre class="is_edit_hide"><?php echo $comments_10;?></pre>
					</div>
				</div>
				
				<div class="form-group row">
					<h5 for="title" class="col-md-6 text-right">Summary</h5>
				</div>
				
				<div class="form-group row">
					<label for="title" class="col-md-6 text-right">Static text</label>
					<div  class="col-md-6">
					   <small>TBD</small>
					</div>
				</div>
	</div>
			
				<div class="form-group row">
					<label for="title" class="col-md-6 text-right">Does the organisation have a 3 year track record?</label>
					<div class="col-md-6"> 
						<span class="is_edit_hide">
						<?php 
							if($organisation_three == 'Yes'){echo " Yes"; }
							else{echo "No";}
						?>
						
						</span>
					</div>
				</div>
				<div class="form-group row">
					<label for="title" class="col-md-6 text-right">Does the organisation have a valid 80G Certificate?</label>
					<div class="col-md-6"> 
						<span class="is_edit_hide">
						<?php 
							if($organisation_eighty == 'Yes'){echo " Yes"; }
							else{echo "No";}
						?>
						
						</span>
					</div>
				</div>
				
				<div class="form-group row">
					<label for="title" class="col-md-6 text-right">Does the organisation have a valid CSR-1 Registration?</label>
					<div class="col-md-6"> 
						<span class="is_edit_hide">
						<?php 
							if($organisation_csr1 == 'Yes'){echo " Yes"; }
							else{echo "No";}
						?>
						
						</span>
					</div>
				</div>
				
				<div class="form-group row">
					<label for="title" class="col-md-6 text-right">Key additional questions to be asked during field visit</label>
					<div class="col-md-6"> 
						<pre class="is_edit_hide"><?php echo $comments_11;?></pre>
					</div>
				</div>
			
				
				
				<div class="form-group row">
					<h5 for="title" class="col-md-6 text-right">Documents</h5>
				</div>
				
				<div class="form-group row">
					<label for="title" class="col-md-6 text-right">Provide proof of 80G from the Income Tax Department Website (TBD)</label>
					
					<div class="col-md-6"> 
						<a  href="<?php echo base_url()?>uploads/<?php echo $csr_file_value1;?>"  target="_blank"><?php echo $csr_file_value_actual1;?></a>
					</div>
				</div>
				<div class="form-group row">
					<label for="title" class="col-md-6 text-right">Upload NGO Desk Review document</label>
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
					<label for="title" class="col-md-6 text-right">Existing Presence in Project Area</label>
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
			<?php }else{?>
										
				<div class="row">
					<label for="title" class="col-md-6 text-right">Is a desk review required to be done</label>
					<div class="col-md-6"> 
						<pre class="is_edit_hide" ><?php echo $is_review_radion;?></pre>
					</div>
				</div>
				
				<div class="row">
					<label for="title" class="col-md-6 text-right">Briefly state why not</label>
					<div class="col-md-6"> 
						<span class="is_edit_hide"><?php echo $comments_no;?></span>
					</div>
				</div>
				
			<?php }?>
			
		</div>
	</div>
			
 
