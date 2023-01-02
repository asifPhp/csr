<style>
#headerMsg{	margin:20px 0px;}
.dataTables-example th{	text-align:center;}
.ibox-content{padding: 10px;}
[data-toggle="collapse"] .fa:before {  
  content: "\f139";
}ev

[data-toggle="collapse"].collapsed .fa:before {
  content: "\f13a";
}
.input_description{font-weight: 400;}
.actual_disp{
 background-color: white;
    opacity: 1;
    margin-top: 10px;
    border: none;
    color: blue;
}

.modal-backdrop.in {
    filter: alpha(opacity=50);
    opacity: -0.5;
    display: none;
}
.readonly_date{
	background-color: white !important;
}
.error{
	font-weight: 900;
}
.actual_disp{
	background-color: white !important;
    opacity: 1 !important;
    margin-top: 10px !important;
    border: none !important;
    color: #3c8dbc !important;
}
.av:last-child{ display:none;}

</style>

<?php
	//var_dump($prop_data);
	$content2='';
	if($prop_data){
		$category_array_data = json_decode($prop_data[0]['category_array']);
			//var_dump($category_array_data);
		if($category_array_data){
			$i = 1;
			foreach ($category_array_data as $value2) {
				//var_dump($value2);
				//$category_name=$value2->category_name;
				$content2 .= '<tr class="darker-on-hover">';
				if(isset($value2->subcategory_name)){
					$content2 .= '<td class="text-center">' . $value2->subcategory_name. '</td>';
				}
				$content2 .= '<td class="text-center">' . $value2->value. '</td>';
				
				$content2 .= '</tr>';
				$i++;
			}
			$table_type = 'dataTables';
		}
		else{
		$content2 .= '<tr style="color: red;" class="darker-on-hover " >
		<td class="text-center" colspan="6">No data Available</td></tr>';
		$table_type = '';
		}
	}


?>

		<div class="box  box-primary collapsed-box">
			<div class="box-header with-border" data-widget="collapse">
				<i class="fa btn btn-box-tool fa_plus fa-plus"></i>
				<h3 class="box-title">Proposal Details</h3>
			</div>
			<div class="box-body">	
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right">Title</label>
					<div class="col-md-9"> 
					<?php //var_dump($prop_data); ?>
						<a href="<?php echo base_url();?>organisation/proposals/detail?id=<?php if($prop_data){ echo $prop_data[0]['prop_id']; }?>"> <?php if($prop_data){ echo $prop_data[0]['title'];} ?></a>
						<!--<span class=""><?php //var_dump($project_list[0]); ?></span>-->
					</div>
				</div>
				<h5>Focus Area</h5>
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right">Category</label>
					<div class="col-md-9"> 
						<span class="is_edit_hide"><?php if($prop_data){ echo $prop_data[0]['admin_category'] ;}?></span>
					</div>
				</div>
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right">Sub category</label>
					<div class="col-md-9"> 
						<span class="is_edit_hide"><?php if($prop_data){ echo $prop_data[0]['admin_subcategory'];} ?></span>
					</div>
				</div>
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right">Focus Category</label>
					<div class="col-md-9"> 
						<span class="is_edit_hide"><?php if($prop_data){ echo $prop_data[0]['category_input'];} ?></span>
					</div>
				</div>
				
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right">Geographies</label>
					<div class="col-md-9"> 
						<span class="is_edit_hide">
							<?php 
								if($org_geo_location_data){
									foreach ($org_geo_location_data as $key => $value12) {
									echo '<span>
											<strong>'.$value12['state_name'].' : </strong>';
											foreach ($value12['district'] as $val) {
												//var_dump($val);
												echo $val['district_name'].'<span class="av" > ,&nbsp; </span>';
											}
										echo '</span><br>';
									}
								}
							?>
						</span>
					</div>
				</div>
				
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right">Project Duration</label>
					<div class="col-md-9"> 
						<span class="is_edit_hide">
						<?php 
							if($prop_data){ 
								if($prop_data[0]['start_date'] && $prop_data[0]['start_date'] !='0000-00-00' and $prop_data[0]['end_date'] && $prop_data[0]['end_date'] !='0000-00-00'){
									$start_date= $prop_data[0]['start_date'];
									$end_date= $prop_data[0]['end_date'];
													
									if($start_date and $end_date){
										$start_date1=strtotime($start_date);
										$end_date1=strtotime($end_date);
										
										$year1 = date('Y', $start_date1);
										$year2 = date('Y', $end_date1);

										$month1 = date('m', $start_date1);
										$month2 = date('m', $end_date1);
										
										$diff = (($year2 - $year1) * 12) + ($month2 - $month1);
										$diff_year = ($year2 - $year1); 
										$diff_month= ($month2 - $month1);
										//var_dump($diff_year);
										//var_dump($diff_month);
										echo $diff_month .' months '.$diff_year.' yrs';
										/*if($diff_year!=0 and $diff_month!=0){
											//echo $diff_month .' months.';
											echo $diff_year.' yrs  '.$diff_month .' months.';
										}else if($diff_year!=0){
											echo $diff_year .' yrs.';
										}else if($diff_month!=0){
											echo $diff_month .' months.';
										}*/
										
									}
								}
							 } 
						?>
						</span>
					</div>
				</div>
				
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right">Start Date</label>
					<div class="col-md-9"> 
						<span class="is_edit_hide"><?php if($prop_data){ if($prop_data[0]['start_date'] && $prop_data[0]['start_date'] !='0000-00-00'){ echo date_formats($prop_data[0]['start_date']);} }?></span>
					</div>
				</div>
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right">End Date</label>
					<div class="col-md-9"> 
						<span class="is_edit_hide"><?php if($prop_data){ if($prop_data[0]['end_date'] && $prop_data[0]['end_date'] !='0000-00-00'){ echo date_formats($prop_data[0]['end_date']); }}?></span>
					</div>
				</div>
				
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right">Project Summary</label>
					<div class="col-md-9"> 
						<pre class="is_edit_hide"><?php if($prop_data){ echo $prop_data[0]['project_summary_proposal']; }?></pre>
					</div>
				</div>
				
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right">Objectives</label>
					<div class="col-md-9"> 
						<pre class="is_edit_hide"><?php if($prop_data){ echo $prop_data[0]['benificiary_profile_solution']; }?></pre>
					</div>
				</div>
				
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right">Key Activities</label>
					<div class="col-md-9"> 
						<pre class="is_edit_hide"><?php if($prop_data){ echo $prop_data[0]['key_activities']; }?></pre>
					</div>
				</div>
				
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right">Outcomes</label>
					<div class="col-md-9"> 
						<pre class="is_edit_hide"><?php if($prop_data){ echo $prop_data[0]['specific_outcomes']; }?></pre>
					</div>
				</div>
				
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right">Budget File</label>
					<div class="col-md-9"> 
						<a  href="<?php echo base_url()?>uploads/<?php if($prop_data){ if($prop_data[0]['upload_budget_file_template']){echo  $prop_data[0]['upload_budget_file_template'];} }?>"  target="_blank"><?php if($prop_data){ if($prop_data[0]['upload_budget_file_template_actual']){echo  $prop_data[0]['upload_budget_file_template_actual'];} }?></a>
					</div>
				</div>
				
			<div class="display_none">	
				<h5>Benificiary Categorisation</h5>
				<div class="form-group">
					<table class="table table-bordered">
						<thead class="thead-light">
							<tr>
								<th scope="col">Region</th>
								<th scope="col">Category</th>
								<th scope="col">Age group</th>
								<th scope="col">Target group</th>
							</tr>
						</thead>
						<tbody class="budget_details_class">
							<tr>
								<td><span ><?php if($prop_data){ echo $prop_data[0]['region']; }?></span></td>
								<td><span ><?php if($prop_data){ echo $prop_data[0]['benficial_cat'];} ?></span></td>
								<td><span ><?php if($prop_data){ echo $prop_data[0]['age_group'];} ?></span></td>
								<td><span ><?php if($prop_data){ echo $prop_data[0]['target_group'];} ?></span></td>
							</tr>
						</tbody>
					</table>
				</div>
				
				
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right">Local Address</label>
					<div class="col-md-9"> 
						<?php
						if($prop_data[0]['registration_detail']){
						$registration_city='';
						$registration_pin_code='';
						$registration_state='';
						$registration_detail = json_decode($prop_data[0]['registration_detail']);
							//var_dump($registration_detail);
							$registration_city = $registration_detail[0]->registration_city;
							$registration_pin_code = $registration_detail[0]->registration_pin_code;
							$registration_state = $registration_detail[0]->registration_state;
						}else{
							$registration_city='';
							$registration_pin_code='';
							$registration_state='';
						}
						?>				
						
						<span class="is_edit_hide"><?php echo $registration_city.','.$registration_pin_code.','.$registration_state; ?></span>
					</div>
				</div>
				<h5>Contact Person Details</h5>
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right">Full Name</label>
					<div class="col-md-9"> 
						<span class="is_edit_hide"><?php if($prop_data){ echo $prop_data[0]['full_name'];} ?></span>
					</div>
				</div>
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right">Designation</label>
					<div class="col-md-9"> 
						<span class="is_edit_hide"><?php if($prop_data){ echo $prop_data[0]['designation'];} ?></span>
					</div>
				</div>
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right">Email Address</label>
					<div class="col-md-9"> 
						<span class="is_edit_hide"><?php if($prop_data){ echo $prop_data[0]['email_address'];} ?></span>
					</div>
				</div>
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right">Contact Number</label>
					<div class="col-md-9"> 
						<span class="is_edit_hide"><?php if($prop_data){ echo $prop_data[0]['contact_no'];} ?></span>
					</div>
				</div>
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right">Executive Summary</label>
					<div class="col-md-9"> 
						<span class="is_edit_hide"><?php if($prop_data){ echo $prop_data[0]['project_summary_proposal'];} ?></span>
					</div>
				</div>
				
				<div class="form-group row">
					<label for="organisation_id" class="col-md-3 text-right">Key activities</label>
					<div class="col-md-9">
						<div class="table-responsive">
							<table id="blog_view_table" class=" table table-striped table-bordered table-hover" >
								<thead>
									<tr>
										<th class="text-center">Category Name</th>
										<th class="text-center">Key activities</th>
									</tr>
								</thead>
								<tbody>
									<?php echo $content2; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	


