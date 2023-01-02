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
    
	//var_dump($begin_proposal_data);
	
	if($begin_proposal_data){
		$comments_no='';
		$comments_1='';
		
		$was_review_radion='';
		$my_final='';
		
		$donor_dropdown_text1='';
		$donor_dropdown_text2='';
		$donor_dropdown_text3='';
		
		$donor_dropdown_id1='';
		$donor_dropdown_id2='';
		$donor_dropdown_id3='';
		$comments_approve='';
		$comments_request='';
		$comments_recommend_yes='';
		$prop_update='';
		
		
		if(isset($begin_proposal_data)){
			$additional_json = json_decode($begin_proposal_data);
			//var_dump($additional_json);
			if(isset($additional_json[0]->was_review_radion)){
				$was_review_radion = $additional_json[0]->was_review_radion;
			}
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
			if(isset($additional_json[0]->comments_approve)){
				$comments_approve = $additional_json[0]->comments_approve;
			}
			if(isset($additional_json[0]->comments_no)){
				$comments_no = $additional_json[0]->comments_no;
			}
			if(isset($additional_json[0]->comments_request)){
				$comments_request = $additional_json[0]->comments_request;
			}
			if(isset($additional_json[0]->comments_recommend_yes)){
				$comments_recommend_yes = $additional_json[0]->comments_recommend_yes;
			}
			if(isset($additional_json[0]->prop_update)){
				$prop_update = $additional_json[0]->prop_update;
			}
			
			
		
		}else{
			$comments_no='';
			$comments_1='';
			
			$was_review_radion='';
			$my_final='';
			
			$donor_dropdown_text1='';
			$donor_dropdown_text2='';
			$donor_dropdown_text3='';
			
			$donor_dropdown_id1='';
			$donor_dropdown_id2='';
			$donor_dropdown_id3='';
			$comments_approve='';
			$comments_request='';
			$comments_recommend_yes='';
			$prop_update='';
		
		
		}
    }else{
		$comments_no='';
		$comments_1='';
		
		$was_review_radion='';
		$my_final='';
		
		$donor_dropdown_text1='';
		$donor_dropdown_text2='';
		$donor_dropdown_text3='';
		
		$donor_dropdown_id1='';
		$donor_dropdown_id2='';
		$donor_dropdown_id3='';
		$comments_approve='';
		$comments_request='';
		$comments_recommend_yes='';
		$prop_update='';
		
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
						<h3 class="box-title">Begin Proposal Processing</h3>
					</div>
					
					<div class="box-body">
						<form id="proposal_form4" method="post" role="form">
						
							<div class="form-group row">
								<div  class="col-md-6 text-right">
									<label for="title">Was the Proposal Desk Review done satisfactorily?</label>
									
								</div>
								<div class="col-md-6"> 	<?php echo 	ucfirst($was_review_radion);?></div>
							</div>
						<?php if($was_review_radion=='Yes'){?>
							<div class="form-group row">
								<label for="title" class="col-md-6 text-right">Select the next step for processing this proposal</label>
								<div class="col-md-6"> 
									<span class="is_edit_hide">
										<?php
										if($my_final=='my_approve'){
											echo '<b>Approve proposal for further review </b>(and initiate field visit).';
										}if($my_final=='my_request'){
											echo '<b>Request revision of Proposal</b> details from the NGO (NGO will be notified and further review of the proposal will be paused).';
										}if($my_final=='my_recommend'){
											echo '<b>Recommend the Proposal for rejection </b>(further review of the proposal will be skipped and proposal will be directly sent for Board Review).';
										}
											
										?>
									
									</span>
								</div>
							</div>
							<?php if($my_final=='my_approve'){?>
								<div class="form-group row">
									<label for="title" class="col-md-6 text-right">Update proposal title (if needed)</label>
									<div class="col-md-6"> 
										<span class="is_edit_hide"><?php echo $prop_update;?></span>
									</div>
								</div>
								<div class="form-group row">
									<label for="title" class="col-md-6 text-right">Assign a Focal Point for this Proposal</label>
									<div class="col-md-6"> 
										<span class="is_edit_hide"><?php echo $donor_dropdown_text1;?></span>
									</div>
								</div>
								
								<div class="form-group row">
									<label for="title" class="col-md-6 text-right">Assign an Approver for this Proposal</label>
									<div class="col-md-6"> 
										<span class="is_edit_hide"><?php echo $donor_dropdown_text2;?></span>
									</div>
								</div>
								<div class="form-group row">
									<label for="title" class="col-md-6 text-right">Assign a field agent to conduct the field visit for this Proposal</label>
									<div class="col-md-6"> 
										<span class="is_edit_hide"><?php echo $donor_dropdown_text3;?></span>
									</div>
								</div>
								<div class="form-group row">
									<label for="title" class="col-md-6 text-right">Enter any special questions (that are not already present in the field visit form) that you want the field agent to ask during their visit (optional).</label>
									<div class="col-md-6"> 
										<pre class="is_edit_hide"><?php echo $comments_approve;?></pre>
									</div>
								</div>
								
								<?php }if($my_final=='my_request'){?>
									<div class="form-group row">
										<label for="title" class="col-md-6 text-right">Enter details of what the NGO needs to revise in this proposal.</label>
										<div class="col-md-6"> 
											<pre class="is_edit_hide"><?php echo $comments_request;?></pre>
										</div>
									</div>
								
								<?php }if($my_final=='my_recommend'){?>
									<div class="form-group row">
										<label for="title" class="col-md-6 text-right">Enter reasons for this rejection recommendation.</label>
										<div class="col-md-6"> 
											<pre class="is_edit_hide"><?php echo $comments_recommend_yes;?></pre>
										</div>
									</div>
								<?php }?>
							<?php }else{?>
								<div class="form-group row">
									<label for="title" class="col-md-6 text-right">What needs to be changed/improved</label>
									<div class="col-md-6"> 
										<pre class="is_edit_hide"><?php echo $comments_no;?></pre>
									</div>
								</div>
						<?php }?>
						</form>
					</div>
				</div>
				
				
			</div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

 
