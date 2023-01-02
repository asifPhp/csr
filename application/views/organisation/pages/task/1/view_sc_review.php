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
	.proposals{
		min-height: 0px;
	}
</style>
<!-- Content Wrapper. Contains page content -->


	
	<?php
	
	//var_dump($sc_review);
	
	if($sc_review){
		$my_final='';
		$comments_first='';
		$visit_date='';
		$comments_request='';
		$comments_recommend_yes='';
		
		if(isset($sc_review)){
			$additional_json = json_decode($sc_review);
			///var_dump($additional_json);
			if(isset($additional_json[0]->my_final)){
				$my_final = $additional_json[0]->my_final;
			}
			if(isset($additional_json[0]->comments_first)){
				$comments_first = $additional_json[0]->comments_first;
			}
			if(isset($additional_json[0]->visit_date)){
				$visit_date = $additional_json[0]->visit_date;
			}
			if(isset($additional_json[0]->comments_request)){
				$comments_request = $additional_json[0]->comments_request;
			}
			if(isset($additional_json[0]->comments_recommend_yes)){
				$comments_recommend_yes = $additional_json[0]->comments_recommend_yes;
			}
			
		}else{
			$my_final='';
			$comments_first='';
			$visit_date='';
			$comments_request='';
		
		}
    }else{
			$my_final='';
			$comments_first='';
			$visit_date='';
			$comments_request='';
			$comments_recommend_yes='';
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
						<h3 class="box-title">SC Review</h3>
					</div>
					
					<div class="box-body">
						<div class="form-group row">
							<div  class="col-md-6 text-right">
								<label for="title">Date of Steering Committee Meeting:</label>
								
							</div>
							<div class="col-md-6"> 
								<span class="is_edit_hide">	<?php echo date_formats($visit_date); ?></span>
							</div>
						</div>
							
						<div class="form-group row">
							<div  class="col-md-6 text-right">
								<label for="title">Summary of relevant comments by SC:</label>
								
							</div>
							<div class="col-md-6"> 
								<per class="is_edit_hide">	<?php echo $comments_first; ?></per>
							</div>
						</div>
							
						<div class="form-group row">
							<div  class="col-md-6 text-right">
								<label for="title">Select the next step for processing this proposal</label>
								
							</div>
							<div class="col-md-6"> 
								<span class="is_edit_hide">	<?php
									if($my_final=='my_approve'){
										echo "Approve proposal for further review (and initiate Advisory Board Review).";
									}else if($my_final=='my_request'){
										echo "Request revision of Proposal details from the NGO (NGO will be notified and further review of the proposal will be paused).";
									}else{echo "Recommend the Proposal for rejection (further review of the proposal will be skipped and proposal will be directly sent for Board Review).";}
									?>
								 </span>
							</div>
						</div>
						<?php if($my_final=='my_approve'){?>
					<!--<div class="form-group row">
							<div  class="col-md-6 text-right">
								<label for="title">Select the next step for processing this proposal:</label>
								
							</div>
							<div class="col-md-6"> 
								<span class="is_edit_hide">	<?php
									if($my_final=='my_approve'){
										echo 'Approve proposal for further review (and initiate Steering Committee (SC) Review)';
									}
									?>
								 </span>
							</div>
						</div>-->
						<?php }else if($my_final=='my_request'){?>
						<div class="form-group row">
							<div  class="col-md-6 text-right">
								<label for="title">Enter details of what the NGO needs to revise in this proposal.</label>
							</div>
							<div class="col-md-6"> 
								<pre><?php echo $comments_request;?></pre>
							</div>
						</div>
						<?php }else{?>
						<div class="form-group row">
							<div  class="col-md-6 text-right">
								<label for="title">Enter reasons for this rejection recommendation.</label>
								
							</div>
							<div class="col-md-6"> 
								<pre><?php echo $comments_recommend_yes;?></pre>
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
 
 

