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
    
	//var_dump($file_visit_data);
	
	if($file_visit_data){
		$comments_no='';
		$comments_1='';
		$comments_2='';
		$comments_3='';
		$comments_4='';
		$csr_file_value_actual1='';
		$donor_dropdown_text='';
		$visit_date='';
		$duration_visit='';
		$registration_detail='';
		$recommended='';
		$person_list='';
		$location_name_list='';
		$multiple_img_upload2='';
		
		$csr_file_value1='';
		$csr_file_value_actual1='';
		$multi_focal_point='';
		
		if(isset($file_visit_data)){
			$additional_json = json_decode($file_visit_data);
			//var_dump($additional_json);
			if(isset($additional_json[0]->donor_dropdown_text)){
				$donor_dropdown_text = $additional_json[0]->donor_dropdown_text;
			}
			if(isset($additional_json[0]->visit_date)){
				$visit_date = $additional_json[0]->visit_date;
			}
			if(isset($additional_json[0]->duration_visit)){
				$duration_visit = $additional_json[0]->duration_visit;
			}
			if(isset($additional_json[0]->registration_detail)){
				$registration_detail = $additional_json[0]->registration_detail;
			}
			if(isset($additional_json[0]->recommended)){
				$recommended = $additional_json[0]->recommended;
			}
			if(isset($additional_json[0]->csr_file_value_actual1)){
				$csr_file_value_actual1 = $additional_json[0]->csr_file_value_actual1;
			}
			if(isset($additional_json[0]->csr_file_value1)){
				$csr_file_value1 = $additional_json[0]->csr_file_value1;
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
			if(isset($additional_json[0]->person_list)){
				$person_list = $additional_json[0]->person_list;
			}
			if(isset($additional_json[0]->location_name_list)){
				$location_name_list = $additional_json[0]->location_name_list;
				//var_dump($location_name_list);
			}
			if(isset($additional_json[0]->multiple_img_upload2)){
				$multiple_img_upload2 = $additional_json[0]->multiple_img_upload2;
				//var_dump($multiple_img_upload2);
			}
			if(isset($additional_json[0]->multi_focal_point)){
				$multi_focal_point = $additional_json[0]->multi_focal_point;
				//var_dump($multi_focal_point);
			}
			
		
		}else{
			$multi_focal_point='';
			$comments_no='';
			$comments_1='';
			$comments_2='';
			$comments_3='';
			$comments_4='';
			$csr_file_value_actual1='';
			$donor_dropdown_text='';
			$visit_date='';
			$duration_visit='';
			$registration_detail='';
			$recommended='';
			$person_list='';
			$location_name_list='';
			$multiple_img_upload2='';
			$csr_file_value1='';
			$csr_file_value_actual1='';
		
		}
    }else{
		$multi_focal_point='';
		$comments_no='';
		$comments_1='';
		$comments_2='';
		$comments_3='';
		$comments_4='';
		$csr_file_value_actual1='';
		$donor_dropdown_text='';
		$visit_date='';
		$duration_visit='';
		$registration_detail='';
		$recommended='';
		$person_list='';
		$location_name_list='';
		$multiple_img_upload2='';
		$csr_file_value1='';
		$csr_file_value_actual1='';
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
						<h3 class="box-title">Field Visit Report</h3>
					</div>
					
					<div class="box-body">
						<form id="proposal_form4" method="post" role="form">
						
							<div class="form-group row">
								<div  class="col-md-6 text-right">
									<label for="title">Actual field visit was done by</label>
									
								</div>
								<div class="col-md-6"> 
									<?php 
									if($multi_focal_point){
										foreach($multi_focal_point as $mul){
											///var_dump($mul);
											echo '<pre class="is_edit_hide">'.$mul. '</pre>';
										}
									}
											
										
									?>
									
								</div>
							</div>
							
							<div class="form-group row">
								<label for="title" class="col-md-6 text-right">Date of visit</label>
								<div class="col-md-6"> 
									<span class="is_edit_hide"><?php echo date_formats($visit_date);?></span>
								</div>
							</div>
							
							<div class="form-group row">
								<label for="title" class="col-md-6 text-right">Details of persons met</label>
								<div class="col-md-6"> 
									<div class="table-responsive">
										<table id="blog_view_table" class=" table table-striped table-bordered table-hover" >
											<thead>
												<tr>
													<th class="text-center">Name</th>
													<th class="text-center">Designation</th>
												</tr>
											</thead>
											<tbody class="table_value">
												<?php if(!$person_list){?>
													<td class="text-center" colspan="5" >No data Available</td>
												<?php }
													if($person_list and $person_list>0){
														foreach($person_list as $row){
														
													?>
													<tr>
														<td  class="text-center"><?php echo $row->person_name;?></td>
														<td  class="text-center"><?php echo $row->person_dege;?></td>
													</tr>	
																									
													<?php } }?>
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
							
							<div class="form-group row">
								<label for="title" class="col-md-6 text-right">Registration details and certificates verified</label>
								<div class="col-md-6"> 
									<pre class="is_edit_hide"><?php echo $registration_detail;?></pre>
								</div>
							</div>
							
							<div class="form-group row">
								<label for="title" class="col-md-6 text-right">Locations visited</label>
								<div class="col-md-6"> 
									<?php 
										if($location_name_list){
											foreach($location_name_list as $val){
											?>
											 <pre class="is_edit_hide"><?php echo $val->location_name?></pre>
										<?php 
											}
										}
									?>
								</div>
							</div>
												
							<div class="form-group row">
								<div  class="col-md-6 text-right">
									<label for="title">Duration of visit</label>
								</div>
								<div class="col-md-6"> 
									<span class="is_edit_hide"><?php echo  $duration_visit ?></span>
								</div>
							</div>
							
							<div class="form-group row">
								<label for="title" class="col-md-6 text-right">Do you recommend the application</label>
								<div class="col-md-6"> 
									<pre class="is_edit_hide"><?php echo $recommended;?></pre>
								</div>
							</div>
							
						<div class="display_none">
							<div class="form-group row">
								<label for="title" class="col-md-6 text-right">Comments on the organisation</label>
								<div class="col-md-6"> 
									<pre class="is_edit_hide"><?php echo $comments_1;?></pre>
								</div>
							</div>
							
							<div class="form-group row">
								<label for="title" class="col-md-6 text-right">Comments on stakeholders/community/beneficiaries</label>
								<div class="col-md-6"> 
									<pre class="is_edit_hide"><?php echo $comments_2;?></pre>
								</div>
							</div>
							
							<div class="form-group row">
								<label for="title" class="col-md-6 text-right">Comments on the project</label>
								<div class="col-md-6"> 
									<pre class="is_edit_hide"><?php echo $comments_3;?></pre>
								</div>
							</div>
							
							
							<div class="form-group row">
								<label for="title" class="col-md-6 text-right">Overall summary of visit</label>
								<div class="col-md-6"> 
									<pre class="is_edit_hide"><?php echo $comments_4;?></pre>
								</div>
							</div>
						</div>
							
							<div class="form-group row">
								<label for="title" class="col-md-6 text-right">Upload scanned copy of field visit report</label>
								<div class="col-md-6"> 
									<a  href="<?php echo base_url()?>uploads/<?php echo $csr_file_value1;?>"  target="_blank"><?php echo $csr_file_value_actual1;?></a>
								</div>
							</div>
							
							<div class="form-group row">
								<label for="title" class="col-md-6 text-right">Photographs from the visit</label>
								<div class="col-md-6">
								<?php if($multiple_img_upload2){
									$i= 0;
									foreach($multiple_img_upload2 as $details){
									$i++ ;
								?>
								
									<div class="is_edit_hide"><?php echo $i ; ?>)&nbsp;
									<?php echo $details->file_description;?></div>
									<div style="padding-left: 16px;"><a target = '_blank' href="<?php echo base_url();?>uploads/<?php echo $details->file_dives ?>" class="is_edit_hide" ><?php echo $details->file_dives_actual;?></a></div><br>
								
								<?php }}?>
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

 
