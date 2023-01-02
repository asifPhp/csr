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
	padding: 0 !important;
}
	.notification_content{    min-height: 0px;
    padding: 0px;}
	small{
		vertical-align: top;
		margin: 3px 5px;
	}
	.av:last-child{ display:none;}
	.incomplete_status{ height: 21px;
    float: right;
    margin-right: 70px;
    font-size: 13px;}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper proposals">

	
	<?php
	$page_heading = '';
    $heading = '';
    $show_edit = '';
    
	if($is_ngo == 'yes'){
		//if($proposal_data[0]['proposal_status'] == 'Submitted' || $proposal_data[0]['proposal_status'] == 'Approved' || $proposal_data[0]['proposal_status'] == 'Rejected'){
			//$show_edit = 'display_none';
		//}else{
			$show_edit = '';
		//}
	}
	//var_dump($proposal_data);
	if($proposal_data){
        $title =$proposal_data[0]['title'];  
        $page_heading = $title;
        $heading = 'Donor/Donee';
        $prop_id =$proposal_data[0]['prop_id']; 
        $organisation_id =$proposal_data[0]['organisation_id'];  
        $organisation =$proposal_data[0]['organisation'];  
        $ngo_id =$proposal_data[0]['ngo_id'];  
        $ngo =$proposal_data[0]['ngo'];  
        $code =$proposal_data[0]['code']; 
        $gc_requested =$proposal_data[0]['gc_requested']; 
        $gc_responded =$proposal_data[0]['gc_responded']; 
        $gc_granted =$proposal_data[0]['gc_granted']; 
        
        /* start page 3 section */
        if($admin_category_data){
            $focus_category =$admin_category_data[0]['name']; 
        }else{
            $focus_category ='';
		} 
        if($admin_subcategory_data){
            $focus_subcategory =$admin_subcategory_data[0]['name']; 
        }else{
           
           $focus_subcategory ='';
        }
        $category_input =$proposal_data[0]['category_input']; 
        $region =$proposal_data[0]['region']; 
        $benficial_cat =$proposal_data[0]['benficial_cat']; 
        $age_group =$proposal_data[0]['age_group']; 
        $target_group =$proposal_data[0]['target_group']; 
        $slums_villages =$proposal_data[0]['slums_villages']; 
        $women_adult =$proposal_data[0]['women_adult']; 
        $men_adult =$proposal_data[0]['men_adult']; 
        $children =$proposal_data[0]['children'];
        $geo_location_values =$proposal_data[0]['geo_location_values']; 
        $start_date =$proposal_data[0]['start_date']; 
        $end_date =$proposal_data[0]['end_date']; 
        $local_address =$proposal_data[0]['local_address']; 
        $street_address =$proposal_data[0]['street_address']; 
        $state =$proposal_data[0]['state']; 
        $city =$proposal_data[0]['city']; 
        $pincode =$proposal_data[0]['pincode']; 
        $full_name =$proposal_data[0]['full_name']; 
        $designation =$proposal_data[0]['designation']; 
        $email_address =$proposal_data[0]['email_address']; 
        $contact_no =$proposal_data[0]['contact_no']; 
        $gc_id =$proposal_data[0]['gc_id']; 
		//var_dump($gc_id);
        /* end page 3 section */
		/* start page 4 section */
		$organization_background_brief =$proposal_data[0]['organization_background_brief']; 
		$project_summary_proposal =$proposal_data[0]['project_summary_proposal']; 
		$benificiary_profile_brief =$proposal_data[0]['benificiary_profile_brief']; 
		$benificiary_profile_statement =$proposal_data[0]['benificiary_profile_statement']; 
		$benificiary_profile_solution =$proposal_data[0]['benificiary_profile_solution']; 
		$key_activities =$proposal_data[0]['key_activities']; 
		$specific_outcomes =$proposal_data[0]['specific_outcomes']; 
		$project_sustainability =$proposal_data[0]['project_sustainability']; 
		$original_file_path =$proposal_data[0]['original_file_path']; 
		$total_funds =$proposal_data[0]['total_funds']; 
		$total_funds_org =$proposal_data[0]['total_funds_org']; 
		$balance_funds =$proposal_data[0]['balance_funds'];
		$upload_budget_file_template=$proposal_data[0]['upload_budget_file_template'];
        $upload_budget_file_template_actual=$proposal_data[0]['upload_budget_file_template_actual'];
		
		$multiple_img_upload2 = json_decode($proposal_data[0]['multiple_img_upload2'] ,true); 
		
		$generated_file_path =$proposal_data[0]['generated_file_path']; 
		/*  end  start page 4 section */

        $is_submit =$proposal_data[0]['is_submit']; 
        $is_readonly="readOnly" ;
		$status_=$proposal_data[0]['proposal_status_for_ngo'];
		
		$new_prop_id=$proposal_data[0]['new_prop_id'];
		//var_dump($new_prop_id);
		
		//var_dump($status_);
		/*if($proposal_data[0]['gc_requested'] == 'yes'){
			if($proposal_data[0]['gc_granted'] != 'yes' && $proposal_data[0]['gc_granted'] != 'no'){
				$status_='GC: Requested';
			}
		}*/
		/*if($proposal_data[0]['gc_requested'] == 'yes' && $status_ != 'Submitted' && $status_ != 'Rejected' && $status_ != 'Approved'){
			if($proposal_data[0]['gc_granted'] == 'yes' AND $proposal_data[0]['is_submit'] == 0){
				$status_='GC: Approved';
			}
		}*/
		/*if($proposal_data[0]['gc_requested'] == 'yes' && $status_ != 'Submitted' && $status_ != 'Rejected' && $status_ != 'Approved'){
			if($proposal_data[0]['is_submit'] == 1){
				$status_='Revision Requested';
			}
		}
		if($proposal_data[0]['gc_requested'] == 'yes'){
			if($proposal_data[0]['gc_granted'] == 'no'){
				$status_='GC: Rejected';
			}
		}*/
		
		/*if($status_=='Recommended for Rejection' || $status_=='Submitted' || $status_=='NGO Review Pending' || $status_=='NGO Decision Pending' || $status_ =='Proposal Final Review Pending' || $status_=='Proposal Initial Review Pending' || $status_=='NGO Desk Review' ||  $status_=='Desk Review Approval' || $status_=='Proposal Desk Review' || $status_=='NGO Revision' || $status_=='NGO Revised'){
			$status_='Submitted';
		}*/
	
	}else{
        $page_heading = 'Create New Proposal';
        $heading = 'Add New Proposal';
        $prop_id =0;
        $new_prop_id ='';
        $title ='';
        $organisation_id ='';
        $organisation ='';
        $ngo_id ='';
        $ngo ='';
        $code ='';
        $status_ ='';
        $gc_requested ='';
        $gc_responded ='';
        $gc_granted ='';
        $is_submit ='0';
        $is_readonly="";
        $generated_file_path="";
        $upload_budget_file_template='';
        $upload_budget_file_template_actual='';
		
    }
	if($page_heading_disp=='yes'){		
	?>
    <section class="content-header">
        <?php if($is_permitted['is_list']){ ?>
            <a href="<?php echo base_url();?>ngo/proposals/list" class="btn btn-default pull-right">Back to Proposal List</a>
        <?php }?>
        <?php if($is_submit==0){?>
            <button class="btn btn-success pull-right submit_proposal" style="margin-right: 10px;">Submit</button>
        <?php }?>
        <h1>
          <?php echo $new_prop_id.' - '.$page_heading.'<small> <span class="label" style="text-transform: capitalize;background-color: '.constant('STATUS_'.$status_).' !important;">' . $status_. '</span></small>' ; ?>
          
        </h1>
    </section>
	
	
     <?php }?>
    <!-- Main content -->
    <section class="content proposal_content">
	
        <div class="row">
		<?php //var_dump($proposal_data);?>
			<div class="col-md-12">
				<div id="head_ngo_review"></div>
				<?php if($ngo_notification){ 
					$i=0;
					foreach ($ngo_notification as $value) {
				?>
					<input type="hidden" name="notification_id" class="notification_id"  value="<?php echo $value->notification_id;?>">
						<input type="hidden" name="org_id" class="org_id"  value="<?php echo $value->org_id;?>">
						<input type="hidden" name="org_task_id" class="org_task_id"  value="<?php echo $value->org_task_id;?>">
						<input type="hidden" name="ngo_id" class="ngo_id"  value="<?php echo $value->ngo_id;?>">
						<input type="hidden" name="superngo_id" class="superngo_id"  value="<?php echo $value->superngo_id;?>">
						<input type="hidden" name="proposal_id" class="proposal_id"  value="<?php echo $value->proposal_id;?>">
						<input type="hidden" name="document_type" class="document_type"  value="<?php echo $value->document_type;?>">
						<div class="callout callout-info">
							<h4><?php echo $value->title;?></h4>
							<p>Created Date:(<?php echo  date_formats(date('Y-m-d'));?> / <?php 
							$d=$value->created_date.' '.$value->created_time;
							//var_dump($d);
							echo time_elapsed_string($d); ?>) </p><hr>
							<pre class="color_white"><?php echo $value->description;?></pre><hr>
							<button type="button"  class="btn btn-default btn-sm  send_notification_by_ngo_doc_resolved">Mark as Resolved</button>
						</div>
					
					<?php } ?>
				
			<?php } ?>
			</div>
	
		
            <!-- left column -->
            <div class="col-md-12">
			    <input type="hidden" class="form-control" id="prop_id" name="prop_id" value="<?php echo $prop_id;?>"> 
                <input type="hidden" class="form-control" id="organisation_id" name="organisation_id" value="<?php echo $organisation_id;?>"> 
                <input type="hidden" class="form-control" id="ngo_id" name="ngo_id" value="<?php echo $ngo_id;?>"> 
                <div id="err_add_plan"></div>
				<div id="alert_danger_error"></div>
			<?php if($hide_two_row!='yes'){?>
					
				<!-- general form elements -->
                <div class="box box-primary collapsed-box">
                    <div class="box-header with-border " data-widget="collapse">
						<i class="fa btn btn-box-tool fa_plus fa-plus"></i>
                       <h3 class="box-title"><?php echo $heading?> 
                        <?php 
                        if($gc_granted=='yes'){
                            echo '(GC Status : Approved)';
                        }else if($gc_responded=='yes'){
                            echo '(GC Status : Rejected)';
                        }else if($gc_requested=='yes'){
                            echo '(GC Status : Requested)';
                        }else{
                            //nothing to done
                        }
                        ?>
                        </h3>
					</div>
					<?php //if($edit_hide=='no'){?>
					<!---<a class="btn btn-default pull-right edit_bttn <?php echo $show_edit?>" href="<?php echo base_url();?>ngo/proposals/edit_page_1?id=<?php echo $prop_id; ?>">Edit</a>-->
					<?php// }?>
                    <!-- /.box-header -->
            
                    <div class="box-body">
						<form id="proposal_form1" method="post" role="form">
							<div class="form-group row">
								<label for="organisation_id" class="col-md-3 text-right">Organisation <span class="required is_edit_data display_none">*</span></label>
								<div class="col-md-9"> 
									<span class="is_edit_hide" ><?php echo $organisation;?></span>
									
								</div>
							</div>
							<div class="form-group row">
								<label for="ngo_id" class="col-md-3 text-right">NGO <span class="required is_edit_data display_none">*</span></label>
								<div class="col-md-9"> 
									<span class="is_edit_hide" ><?php echo $ngo;?></span>
								 
								</div>
							</div>
						</form>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
				
				
                <!-- general form elements -->
                <div class="box box-primary collapsed-box">
                    <div class="box-header with-border" data-widget="collapse">
                        <i class="fa fa-plus btn btn-box-tool fa_plus"></i>
						<h3 class="box-title">Proposal Submission Advisory for <span><?php echo $organisation;?></span></h3>
                    </div>
                    <?php //if($edit_hide=='no'){?>
						<!--<a class="btn btn-default pull-right edit_bttn <?php echo $show_edit?>" href="<?php echo base_url();?>ngo/proposals/edit_page_2?id=<?php echo $prop_id; ?>">Edit</a>-->
					<?php// }?>
                    <div class="box-body">
						<form id="proposal_form2" method="post" role="form">
							<div class="form-group row" style="display:none;">
								<label for="title" class="col-md-3 text-right">Title <span class="required is_edit_data display_none">*</span></label>
								<div class="col-md-9"> 
									<span class="is_edit_hide" ><?php echo $title;?></span>
								</div>
							</div>
							<div class="form-group row" style="display:none;">
								<label for="code" class="col-md-3 text-right">Code <span class="required is_edit_data display_none">*</span></label>
								<div class="col-md-9"> 
									<span class="is_edit_hide" ><?php echo $code;?></span>
								</div>
							</div>
							<p>Dummy content will come here</p>
						</form>
                    </div>
                </div>
				<?php }?>	
                <!-- general form elements -->
                <div class="box box-primary collapsed-box">
                    <div class="box-header with-border" data-widget="collapse">
                        <i class="fa fa-plus btn btn-box-tool fa_plus"></i>
						<h3 class="box-title">Proposal Overview  &nbsp;</h3><?php if($gc_id>0){ $gc_status='Green Channel'; echo '<span class="label" style="text-transform: capitalize;background-color: '.constant('STATUS_'.$gc_status).' !important;">' . $gc_status. '</span>';}?>
						<span class="page3_complete display_none"><?php if($edit_hide=='no'){  $page3_status='Complete';  echo '<span class="label incomplete_status" style="text-transform: capitalize;background-color: '.constant('STATUS_'.$page3_status).' !important;">' . $page3_status. '</span>';}?></span>
						<span class="page3_incomplete display_none" ><?php if($edit_hide=='no'){  $page3_status='Incomplete';  echo '<span class="label incomplete_status" style="text-transform: capitalize;background-color: '.constant('STATUS_'.$page3_status).' !important;">' . $page3_status. '</span>';}?></span>
					</div>
                    <?php if($edit_hide=='no'){?>
						<a class="btn btn-default pull-right edit_bttn <?php echo $show_edit?>" href="<?php echo base_url();?>ngo/proposals/edit_page_3?id=<?php echo $prop_id; ?>">Edit</a>
					<?php }?>
                    <div class="box-body">
						<form id="proposal_form3" method="post" role="form">
							
							
							<h5 >Focus area of the Project</h5>
							<div class="form-group row">
								<label for="title" class="col-md-3 text-right">Project ID<span class="required is_edit_data display_none">*</span></label>
								<div class="col-md-9"> 
									<span class="is_edit_hide" ><?php echo $new_prop_id;?></span>
								</div>
							</div>
							
							<div class="form-group row">
								<label for="title" class="col-md-3 text-right">Title <span class="required is_edit_data display_none">*</span></label>
								<div class="col-md-9"> 
									<span class="is_edit_hide" ><?php echo $title;?></span>
								</div>
							</div>

							<div class="form-group row">
								<label for="title" class="col-md-3 text-right">Category <span class="required is_edit_data display_none">*</span></label>
								<div class="col-md-9"> 
									<span class="is_edit_hide" ><?php echo $focus_category;?>
									 
								 </span>
								</div>
							</div>


							<div class="form-group row">
								<label for="title" class="col-md-3 text-right">Sub category <span class="required is_edit_data display_none">*</span></label>
								<div class="col-md-9"> 
									<span class="is_edit_hide" ><?php echo $focus_subcategory;?></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="title" class="col-md-3 text-right">Focus area within this category<span class="required is_edit_data display_none">*</span></label>
								<div class="col-md-9"> 
									<span class="is_edit_hide" ><?php echo $category_input;?></span>
								</div>
							</div>

							<h5 >Benificiary Categorisation</h5>
							<div class="form-group row">
								<label for="title" class="col-md-3 text-right">Region <span class="required is_edit_data display_none">*</span></label>
								<div class="col-md-9"> 
									<span class="is_edit_hide" ><?php echo $region;?></span>
								</div>
							</div>

							<div class="form-group row">
								<label for="title" class="col-md-3 text-right">Category <span class="required is_edit_data display_none">*</span></label>
								<div class="col-md-9"> 
									<span class="is_edit_hide" ><?php echo $benficial_cat;?></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="title" class="col-md-3 text-right">Age group <span class="required is_edit_data display_none">*</span></label>
								<div class="col-md-9"> 
									<span class="is_edit_hide" ><?php echo $age_group;?></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="title" class="col-md-3 text-right">Target group <span class="required is_edit_data display_none">*</span></label>
								<div class="col-md-9"> 
									<span class="is_edit_hide" ><?php echo $target_group;?></span>
								</div>
							</div>
							<h5 >Benificiary Numbers</h5>
							<div class="form-group row">
								<label for="title" class="col-md-3 text-right">Slums/Villages  <span class="required is_edit_data display_none">*</span></label>
								<div class="col-md-9"> 
									<span class="is_edit_hide" ><?php echo $slums_villages;?></span>
								</div>
							</div>

							 <div class="form-group row">
								<label for="title" class="col-md-3 text-right">Women(Adult) 
									<span class="required is_edit_data display_none">*</span></label>
								<div class="col-md-9"> 
									<span class="is_edit_hide" ><?php echo $women_adult;?></span>
								</div>
							</div> 
							<div class="form-group row">
								<label for="title" class="col-md-3 text-right">Men(Adult) 
								  <span class="required is_edit_data display_none">*</span></label>
								<div class="col-md-9"> 
									<span class="is_edit_hide" ><?php echo $men_adult;?></span>
								</div>
							</div> 
							<div class="form-group row">
								<label for="title" class="col-md-3 text-right">Children 
								  <span class="required is_edit_data display_none">*</span></label>
								<div class="col-md-9"> 
									<span class="is_edit_hide" ><?php echo $children;?></span>
								</div>
							</div>

							<div class="form-group">
								<h5>Project Details</h5>
							</div>
							<div class="form-group row">
								<label for="title" class="col-md-3 text-right">Target geography(s) of the Project*
								  <span class="required is_edit_data display_none">*</span></label>
								<div class="col-md-9"> 
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
								</div>
							</div> 
							
							
							
							<div class="form-group row">
								<label for="title" class="col-md-3 text-right">Duration of project
								  <span class="required is_edit_data display_none">*</span></label>
								<div class="col-md-9"> 
									<span class="is_edit_hide" >
										<?php 
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
												if($diff_year!=0 and $diff_month!=0){
													//echo $diff_month .' months.';
													echo $diff_year.' yrs  '.$diff_month .' months.';
												}else if($diff_year!=0){
													echo $diff_year .' yrs.';
												}else if($diff_month!=0){
													echo $diff_month .' months.';
												}
											}
										?>
											
									</span>
								</div>
							</div>
							
							<div class="form-group row">
								<label for="title" class="col-md-3 text-right">Start Date 
								  <span class="required is_edit_data display_none">*</span></label>
								<div class="col-md-9"> 
									<span class="is_edit_hide" >
										<?php 
											if($start_date=='0000-00-00'){
												$start_date='';
											}else{
												echo  date_formats($start_date);
											}
										?>
											
									</span>
								</div>
							</div>
							<div class="form-group row">
								<label for="title" class="col-md-3 text-right">End Date 
								  <span class="required is_edit_data display_none">*</span></label>
								<div class="col-md-9"> 
									<span class="is_edit_hide" >
										<?php 
											if($end_date=='0000-00-00'){
												$end_date='';
											}else{
												echo date_formats($end_date);
												
											}
										?>
											
									</span>
								</div>
							</div>
							<div class="form-group row">
								<label for="title" class="col-md-3 text-right">Local Address 
								  <span class="required is_edit_data display_none">*</span></label>
								<div class="col-md-9"> 
									<span class="is_edit_hide" ><?php echo $local_address;?></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="title" class="col-md-3 text-right">Street Address  
								  <span class="required is_edit_data display_none">*</span></label>
								<div class="col-md-9"> 
									<span class="is_edit_hide" ><?php echo $street_address;?></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="title" class="col-md-3 text-right">State 
								  <span class="required is_edit_data display_none">*</span></label>
								<div class="col-md-9"> 
									<span class="is_edit_hide" >
										<?php
										if($state==''){
											$state='';
										}else{
											echo $state;
										}
									 ?>
										 
								</span>
								</div>
							</div>
							<div class="form-group row">
								<label for="title" class="col-md-3 text-right">City 
								  <span class="required is_edit_data display_none">*</span></label>
								<div class="col-md-9"> 
									<span class="is_edit_hide" ><?php echo $city;?></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="title" class="col-md-3 text-right">Pincode 
								  <span class="required is_edit_data display_none">*</span></label>
								<div class="col-md-9"> 
									<span class="is_edit_hide" >
										<?php 
											if($pincode==0){
												$pincode='';
											}else{
											   echo $pincode; 
											}
										?>
											
									</span>
								</div>
							</div>

							<h5>Project Contact Person</h5>

							<div class="form-group row">
								<label for="title" class="col-md-3 text-right">Full Name 
								  <span class="required is_edit_data display_none">*</span></label>
								<div class="col-md-9"> 
									<span class="is_edit_hide" ><?php echo $full_name;?></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="title" class="col-md-3 text-right">Designation 
								  <span class="required is_edit_data display_none">*</span></label>
								<div class="col-md-9"> 
									<span class="is_edit_hide" ><?php echo $designation;?></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="title" class="col-md-3 text-right">Email Address
								  <span class="required is_edit_data display_none">*</span></label>
								<div class="col-md-9"> 
									<span class="is_edit_hide" ><?php echo $email_address;?></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="title" class="col-md-3 text-right">Contact Number 
								  <span class="required is_edit_data display_none">*</span></label>
								<div class="col-md-9"> 
									<span class="is_edit_hide" ><?php echo $contact_no;?></span>
								</div>
							</div>
							
							<div class="form-group row" style="display:none;">
								<label for="code" class="col-md-3 text-right">Code <span class="required is_edit_data display_none">*</span></label>
								<div class="col-md-9"> 
									<span class="is_edit_hide" ><?php echo $code;?></span>
								</div>
							</div>
						</form>
                    </div>
                </div>
				
				
                <!-- general form elements -->
                <div class="box box-primary collapsed-box">
					<div class="box-header with-border" data-widget="collapse">
						<i class="fa fa-plus btn btn-box-tool fa_plus"></i>
						<h3 class="box-title">Proposal Features </h3>
						<span class="page4_complete display_none"><?php if($edit_hide=='no'){  $page4_status='Complete';  echo '<span class="label incomplete_status" style="text-transform: capitalize;background-color: '.constant('STATUS_'.$page4_status).' !important;">' . $page4_status. '</span>';}?></span>
						<span class="page4_incomplete display_none" ><?php if($edit_hide=='no'){  $page4_status='Incomplete';  echo '<span class="label incomplete_status" style="text-transform: capitalize;background-color: '.constant('STATUS_'.$page4_status).' !important;">' . $page4_status. '</span>';}?></span>
					</div>
					<?php if($edit_hide=='no'){?>
						<a class="btn btn-default pull-right edit_bttn <?php echo $show_edit?>" href="<?php echo base_url();?>ngo/proposals/edit_page_4?id=<?php echo $prop_id; ?>">Edit</a>
					<?php }?>
					<div class="box-body">
						<form id="proposal_form4" method="post" role="form">
							<div class="form-group row display_none">
								<label for="title" class="col-md-3 text-right">Title <span class="required is_edit_data display_none">*</span></label>
								<div class="col-md-9"> 
									<span class="is_edit_hide" ><?php echo $title;?></span>
								</div>
							</div>
							<div class="form-group row">
								<label for="title" class="col-md-3 text-right">Organisation Profile<span class="required is_edit_data display_none">*</span></label>
								<div class="col-md-9"> 
									<pre class="is_edit_hide"><?php echo $organization_background_brief;?></pre>
								</div>
							</div>

							<div class="form-group row">
								<label for="title" class="col-md-3 text-right">Project Summary <span class="required is_edit_data display_none">*</span></label>
								<div class="col-md-9"> 
									<pre class="is_edit_hide" ><?php echo $project_summary_proposal;?></pre>
								</div>
							</div>

							<div class="form-group row">
								<label for="title" class="col-md-3 text-right">Benificiary Profile <span class="required is_edit_data display_none">*</span></label>
								<div class="col-md-9"> 
									<pre class="is_edit_hide" ><?php echo $benificiary_profile_brief;?></pre>
								</div>
							</div>

							<div class="form-group row">
								<label for="title" class="col-md-3 text-right">Problem statement <span class="required is_edit_data display_none">*</span></label>
								<div class="col-md-9"> 
									<pre class="is_edit_hide" ><?php echo $benificiary_profile_statement;?></pre>
								</div>
							</div>

							<div class="form-group row">
								<label for="title" class="col-md-3 text-right">Solution <span class="required is_edit_data display_none">*</span></label>
								<div class="col-md-9"> 
									<pre class="is_edit_hide" ><?php echo $benificiary_profile_solution;?></pre>
								</div>
							</div>

							<div class="form-group row">
								<label for="title" class="col-md-3 text-right">Key Activities<span class="required is_edit_data display_none">*</span></label>
								<div class="col-md-9"> 
									<pre class="is_edit_hide" ><?php echo $key_activities;?></pre>
								</div>
							</div>
							
							<div class="form-group row">
								<label for="title" class="col-md-3 text-right">Outcomes of the project <span class="required is_edit_data display_none">*</span></label>
								<div class="col-md-9"> 
									<pre class="is_edit_hide" ><?php echo $specific_outcomes;?></pre>
								</div>
							</div>
							<div class="form-group row">
								<label for="title" class="col-md-3 text-right">Project Sustainability <span class="required is_edit_data display_none">*</span></label>
								<div class="col-md-9"> 
									<pre class="is_edit_hide" ><?php echo $project_sustainability;?></pre>
								</div>
							</div> 
							<div class="form-group row">
								<label for="title" class="col-md-3 text-right">Attach implementation/M&E plan of project activities <span class="required is_edit_data display_none">*</span></label>
								<div class="col-md-9"> 
									<a target = '_blank' href="<?php echo base_url();?>uploads/<?php echo $generated_file_path; ?>" ><?php echo $original_file_path;?></a>
								</div>
							</div>

							<div class="form-group row" style="display:none;">
								<label for="code" class="col-md-3 text-right">Code <span class="required is_edit_data display_none">*</span></label>
								<div class="col-md-9"> 
									<span class="is_edit_hide" ><?php echo $code;?></span>
								</div>
							</div>
						</form>
					</div>
				</div>
				
				
				
                <!-- general form elements -->
                <div class="box box-primary collapsed-box">
					<div class="box-header with-border" data-widget="collapse">
						<i class="fa fa-plus btn btn-box-tool fa_plus"></i>
						<h3 class="box-title">Budgeting Details </h3>
						<span class="page5_complete display_none"><?php if($edit_hide=='no'){  $page5_status='Complete';  echo '<span class="label incomplete_status" style="text-transform: capitalize;background-color: '.constant('STATUS_'.$page5_status).' !important;">' . $page5_status. '</span>';}?></span>
						<span class="page5_incomplete display_none" ><?php if($edit_hide=='no'){  $page5_status='Incomplete';  echo '<span class="label incomplete_status" style="text-transform: capitalize;background-color: '.constant('STATUS_'.$page5_status).' !important;">' . $page5_status. '</span>';}?></span>
					</div>
					<?php if($edit_hide=='no'){?>
						<a class="btn btn-default pull-right edit_bttn <?php echo $show_edit?>" href="<?php echo base_url();?>ngo/proposals/edit_page_5?id=<?php echo $prop_id; ?>">Edit</a>
					<?php }?>
					<div class="box-body">
						<form id="proposal_form5" method="post" role="form">
							<div class="form-group row">
								<label for="title" class="col-md-3 text-right">Total funds required for the project (in INR Lakhs) <span class="required is_edit_data display_none">*</span></label>
								<div class="col-md-9"> 
									<span class="is_edit_hide" ><i class="fa fa-inr" aria-hidden="true"></i><?php echo $total_funds;?></span>
								</div>
							</div>

							<div class="form-group row">
								<label for="title" class="col-md-3 text-right">Total funds requested from <?php echo $organisation; ?>(in INR Lakhs) <span class="required is_edit_data display_none">*</span></label>
								<div class="col-md-9"> 
									<span class="is_edit_hide" ><i class="fa fa-inr" aria-hidden="true"></i><?php echo $total_funds_org;?></span>
								</div>
							</div>
							
							
							<div class="form-group row">
								<label for="title" class="col-md-3 text-right">Source of balance funds <span class="required is_edit_data display_none">*</span></label>
								<div class="col-md-9"> 
									<pre class="is_edit_hide" ><?php echo $balance_funds;?></pre>
								</div>
							</div>
							
							<div class="form-group row">
								<label for="title" class="col-md-3 text-right">Attached budget file template<span class="required is_edit_data display_none">*</span></label>
								<div class="col-md-9"> 
									<a  href="<?php echo base_url()?>uploads/<?php echo $upload_budget_file_template;?>"  target="_blank"><?php echo $upload_budget_file_template_actual;?></a>
								</div>
							</div>
							
							<div class="form-group row">
								
								<?php 	if(!$multiple_img_upload2){ ?>
											<label for="multiple_img_upload2" class="col-md-3 text-right">Attached multiple documents</label>
								<?php  	}	?>
								<?php if($multiple_img_upload2){
											$i= 0;
											$show_remove = '';
											$show_remove_ = '';
											foreach($multiple_img_upload2 as $details){ 
												$i++ ;
												if($i > 1){
													$show_remove = 'display_none';
													$show_remove_ = '';
												}else{ 
													$show_remove = '';
													$show_remove_ = 'display_none';
												}
												?>
												<div class="form-group row">
													<label for="multiple_img_upload2" class="col-md-3 text-right <?php echo $show_remove ?>">Other relevant documents</label>
													<label for="multiple_img_upload2" class="col-md-3 text-right <?php echo $show_remove_ ?>"></label>
													<div class="col-md-9">
														<span class="is_edit_hide" ><?php echo $i ; ?>)&nbsp;</span>
														<span class="is_edit_hide" ><?php echo $details['file_name'];?></span><br>
														<span style="padding-left: 16px;"><a target = '_blank' href="<?php echo base_url();?>uploads/<?php echo $details['file_dives'] ?>" class="is_edit_hide" ><?php echo $details['file_dives_actual'];?></a></span><br>
														
													</div>
												</div>
								<?php 		}
										}	?>
							</div>
							<div class="form-group row" style="display:none;">
								<label for="code" class="col-md-3 text-right">Code <span class="required is_edit_data display_none">*</span></label>
								<div class="col-md-9"> 
									<span class="is_edit_hide" ><?php echo $code;?></span>
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
  </div>
  
  <div class="modal fade" id="submitConformModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
        <h4 class="modal-title" id="myModalLabel">Alert</h4>
      </div>
      <div class="modal-body">
        Are You sure you want to submit?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-success finail_proposal_submit">Submit</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="submitErrorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
        <h4 class="modal-title" id="myModalLabel">Do You Want to Use Your Green Channel Ticket for this Proposal?</h4>
      </div>
      <div class="modal-body">
			You have a Green Channel Ticket available from this Organisation. Do you want to use the ticket for this proposal?
			<input type="hidden" name="gc_id1" id="gc_id1" value="">	
				
		</div>
	  
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary finail_proposal_submit">Use Ticket</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="Noneusedticket" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
        <h4 class="modal-title" id="myModalLabel">Proposal Incomplete</h4>
      </div>
      <div class="modal-body">
			Please fill all required fields in your organisation details and this proposal before submitting
		</div>
	  <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Okay</button>
        <!--<button type="button" class="btn btn-primary green_request_submit">Use Ticket</button>-->
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="submitResolvedModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
        <h4 class="modal-title" id="myModalLabel"> Are you sure you want to mark this notification as resolved?</h4>
      </div>
      <div class="modal-body">
			<span>When you resolve this notification, </span><strong class="org_name" > </strong> 
			<span> will be informed of your updates. To prevent further issues, ONLY resolve this notification once you have completed the updates requested by </span>
			<strong class="org_name" > </strong>
		
      </div>
		<div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<input type="hidden" name"a" id="org_id_set" value="">
				<input type="hidden" name"a" id="notification_id_set" value="">
				<input type="hidden" name"a" id="org_task_id_set" value="">
				<input type="hidden" name"a" id="document_type_set" value="">
				<input type="hidden" name"a" id="ngo_id_set" value="">
				<input type="hidden" name"a" id="superngo_id_set" value="">
				<input type="hidden" name"a" id="proposal_id_set" value="">
				<button type="hidden" class="btn btn-primary resolved_submit">Resolve</button>
			</div>
		</div>
    </div>
  </div>
</div>
<script>
$('document').ready(function(){
    
    $("body").on("click",".edit_click",function(){
        var this_data=$(this);
        this_data.parent().parent().find(".is_edit_hide").addClass("display_none");
        this_data.parent().parent().find(".is_edit_data").removeClass("display_none");
    });
	
	
	$('body').on('click','.send_notification_by_ngo_doc_resolved', function () {
		var is_error='no';
		var notification_id = $(this).parent().parent().find('.notification_id').val();
		var org_task_id = $(this).parent().parent().find('.org_task_id').val();
		var document_type = $(this).parent().parent().find('.document_type').val();
		var org_id = $(this).parent().parent().find('.org_id').val();
		var superngo_id = $(this).parent().parent().find('.superngo_id').val();
		var ngo_id = $(this).parent().parent().find('.ngo_id').val();
		var proposal_id = $(this).parent().parent().find('.proposal_id').val();
		console.log(proposal_id);
		$('#org_id_set').val(org_id);
		$('#notification_id_set').val(notification_id);
		$('#org_task_id_set').val(org_task_id);
		$('#document_type_set').val(document_type);
		$('#ngo_id_set').val(ngo_id);
		$('#superngo_id_set').val(superngo_id);
		$('#proposal_id_set').val(proposal_id);
		console.log(org_task_id);
		console.log(notification_id);
			$.post(APP_URL + 'ngo/project/get_org_name', {
					org_id,
				}, 
				
				function (response) {
					$('.org_name').text(response.org_name);
					
				},'json');
				$('#submitResolvedModal').modal('show');
				
		return false;
		
	});
	
	
	$('body').on('click','.resolved_submit', function () {
		var is_error='no';
		var notification_id_send = $(this).parent().find('#notification_id_set').val();
		var org_task_id_send = $(this).parent().find('#org_task_id_set').val();
		var document_type_send = $(this).parent().find('#document_type_set').val();
		var org_id_send = $(this).parent().find('#org_id_set').val();
		var ngo_id_send = $(this).parent().find('#ngo_id_set').val();
		var superngo_id_send = $(this).parent().find('#superngo_id_set').val();
		var proposal_id_send = $(this).parent().find('#proposal_id_set').val();
			console.log(notification_id_send);
			console.log(org_id_send);
			
			if(is_error=='no'){	
				$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
				$.post(APP_URL + 'ngo/proposals/resolved_submit', {
					notification_id_send: notification_id_send,
					org_task_id_send: org_task_id_send,
					document_type_send: document_type_send,
					org_id_send: org_id_send,
					ngo_id_send: ngo_id_send,
					superngo_id_send: superngo_id_send,
					proposal_id_send: proposal_id_send,
								
				},
				function (response) {
					$.unblockUI();
					$('#head_ngo_review').empty();
					if (response.status == 200) {
						$('#submitResolvedModal').modal('hide');
						$.toaster({ priority :'success', message :'Resolve Notification Successfully'});
						setTimeout(function(){
							window.location.reload();
						},2000);
					} else {
						$('#head_ngo_review').html("<div class='alert alert-danger fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
						$("#head_ngo_review").fadeTo(2000, 500).slideUp(500, function(){
							$('#head_ngo_review').empty();
						});
					}	
					
				}, 'json');
			}
		
		 return false;
		
	});
	
	$('#proposal_step1_form').validate({
        ignore:[],
        rules: {
            organisation_id: {
                required: true,
            },
            ngo_id: {
                required: true,
            },
        },
        messages: {
            organisation_id: {
                required: "Organisation is required.",
            },
            ngo_id: {
                required: "NGO is required.",
            },
        },
        submitHandler: function (form) {
            $.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
            
            $('#page1').removeClass('active');
            $('#page2').addClass('active');
            return false;
        }
    });

    $('#proposal_step2_form').validate({
        ignore:[],
        rules: {
            title: {
                required: true,
            },
           /* code: {
                required: true,
                remote:{
                    url: APP_URL + "ngo/proposals/check_entity_code",
                    type: "post",
                    data: {
                        param: 'Entity',
                    }
                }
            },*/
        },
        messages: {
            title: {
                required: "Title is required",
            },
           /* code: {
                required: "Code is required.",
                remote: "This code is assinged to an proposals.",
            },*/
        },
        submitHandler: function (form) {
            //$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /> Just a moment...</h1>' });
            
            finail_entity_submit();
            return false;
        }
    });

    function finail_entity_submit(){
        var prop_id = $('#prop_id').val();
        var code = $('#code').val();

        var table_field = [];
        table_field={
            title : $('#title').val(),
            organisation_id : $('#organisation_id').val(),
            ngo_id : $('#ngo_id').val(),
        };
       
        $.post(APP_URL + 'ngo/proposals/update_proposals', {
            prop_id: prop_id,
            //code: code,
            table_field: table_field,
        },
        function (response) {
            $.unblockUI();
            $("html, body").animate({scrollTop: 0}, "slow");
            $('#err_add_plan').empty();
            if (response.status == 200) {
                $('#err_add_plan').empty();
                $('#err_add_plan').html("<div class='alert alert-success fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + response.message + "</strong></div>");
                $("#err_add_plan").fadeTo(2000, 500).slideUp(500, function(){
                    $('#err_add_plan').empty();
                    window.location.href = APP_URL+'ngo/proposals/list';
                });
           } else {
                $('#err_add_plan').empty();
                $('#err_add_plan').html("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + response.message + "</strong></div>");
                $("#err_add_plan").fadeTo(2000, 500).slideUp(500, function(){
                    $('#err_add_plan').empty();
                });
            }
        }, 'json');
    }
	var statuss = '';
	var org_name = '';
	var allow_submit = '';
	
	
	
	$("body").on("click",".submit_proposal",function(){
		
		var prop_id = $('#prop_id').val();
		var organisation_id = $('#organisation_id').val();
		var ngo_id = $('#ngo_id').val();
		console.log(organisation_id);	
		console.log(ngo_id);	
		//$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
		$.post(APP_URL + 'ngo/proposals/is_all_form_filled', {
            prop_id: prop_id,
            ngo_id: ngo_id,
            org_id: organisation_id,
        },
        function (response) {
            $.unblockUI();
			console.log(response);
			if (response.status == 200) {
				if(response.check_ngo_review_status.length){
					statuss = response.check_ngo_review_status[0].status;
				}
				allow_submit = response.allow_submit;
				gc_ticket = response.gc_ticket;
				org_name = response.org_name;
				$("html, body").animate({scrollTop: 0}, "slow");
				$('#alert_danger_error').empty();
			
				
				var is_valid=0;
				//var gc_requested=$('.submit_proposal').attr('gc_requested');
				//var gc_granted=$('.submit_proposal').attr('gc_granted');
				
				//if(!gc_granted){
					if(response.is_form1_filled == 'no'){
						$('#alert_danger_error').append("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>Step 1 form is not compeleted</strong></div>");
						is_valid=1;
					}
					if(response.is_form2_filled == 'no'){
						$('#alert_danger_error').append("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>Step 2 form is not compeleted</strong></div>");
						is_valid=1;
					}
					if(response.is_form3_filled == 'no'){
						$('#alert_danger_error').append("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>Proposal Overview is not compeleted</strong></div>");
						is_valid=1;
					}
					if(response.is_form4_filled == 'no'){
						$('#alert_danger_error').append("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>Proposal Features is not compeleted</strong></div>");
						is_valid=1;
					}
					if(response.is_form5_filled == 'no'){
						$('#alert_danger_error').append("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>Budgeting Details is not compeleted</strong></div>");
						is_valid=1;
					}
					/**Start Ngo Section ***/
					if(response.is_form1_filled_by_ngo == 'no'){
						$('#alert_danger_error').append("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>Basic Details of Entity is not compeleted</strong></div>");
						is_valid=1;
					}if(response.is_form2_filled_by_ngo == 'no'){
						$('#alert_danger_error').append("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>Legal Details of Entity is not compeleted</strong></div>");
						is_valid=1;
					}if(response.is_form3_filled_by_ngo == 'no'){
						$('#alert_danger_error').append("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>Other Details of Entity is not compeleted</strong></div>");
						is_valid=1;
					}if(response.is_form4_filled_by_ngo == 'no'){
						$('#alert_danger_error').append("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>Staff & Budget Details of Entity is not compeleted</strong></div>");
						is_valid=1;
					}if(response.is_form5_filled_by_ngo == 'no'){
						$('#alert_danger_error').append("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>Financial Details of Entity is not compeleted</strong></div>");
						is_valid=1;
					}if(response.is_form6_filled_by_ngo == 'no'){
						$('#alert_danger_error').append("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>Organisation Policies & Other Documents of Entity is not compeleted</strong></div>");
						is_valid=1;
					}
					
					/**Start Ngo Section ***/
				//}
				//console.log(gc_granted);
				if(is_valid==0){
					$('#submitConformModal').modal('show');
				}
				if(is_valid==1){
					console.log("TESt");
					console.log("TEstettset");
						console.log(statuss);
					if(gc_ticket!=''){
						gc_id = response.gc_id;
						$('#gc_id1').val(gc_id);						
						$('#submitErrorModal').modal('show');
					}else{
						$('#Noneusedticket').modal('show');
						
					}
				}
			}
		}, 'json');
	}) 


    $("body").on("click",".finail_proposal_submit",function(){
       console.log(allow_submit)
		if(statuss=='Approved' || allow_submit == 'yes'){
		   var prop_id = $('#prop_id').val();
		   var ngo_id = $('#ngo_id').val();
		   var gc_id=0; 
			gc_id= $('#gc_id1').val();
			console.log("dddd");
			console.log(gc_id1);
			
			var table_field = [];
			table_field={
				is_submit : 1,
				proposal_status : 'New',
				proposal_status_for_ngo : 'Submitted',
				gc_id :gc_id,
			};
			var organisation_id = $('#organisation_id').val();
			$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
			$('#submitConformModal').modal('hide');
			$.post(APP_URL + 'ngo/proposals/submit_proposals', {
				prop_id: prop_id,
				organisation_id: organisation_id,
				table_field: table_field,
				ngo_id: ngo_id,
				gc_id: gc_id,
			},
			function (response) {
				$.unblockUI();
				$("html, body").animate({scrollTop: 0}, "slow");
				$('#err_add_plan').empty();
				if (response.status == 200) {
					
					var organisation_id = $('#organisation_id').val();
					var ngo_id = $('#ngo_id').val();
					
					console.log(organisation_id);
					console.log(ngo_id);
					$.post(APP_URL + 'ngo/proposals/change_org_ngo_review_status', {
						ngo_id: ngo_id,
						organisation_id: organisation_id,
					},
					function (response) {
						if (response.status == 200) { 
						   console.log(response);
						} else {
							
						}
					}, 'json');
					
					$('#err_add_plan').empty();
					$('#err_add_plan').html("<div class='alert alert-success fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + response.message + "</strong></div>");
					$("#err_add_plan").fadeTo(2000, 500).slideUp(500, function(){
						$('#err_add_plan').empty();
						window.location.href = APP_URL+'ngo/proposals/edit?id='+prop_id;
					});
			   }else{
					$('#err_add_plan').empty();
					$('#err_add_plan').html("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + response.message + "</strong></div>");
					$("#err_add_plan").fadeTo(2000, 500).slideUp(500, function(){
						$('#err_add_plan').empty();
					});
				}
			}, 'json');
        
		}else{
			console.log("dddddddddddddddddddddddd");
			$('#submitErrorModal').modal('hide');
			$('#submitConformModal').modal('hide');
			$('#alert_danger_error').empty();
			$('#alert_danger_error').append("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>Sorry! - Due diligence for your organisation is still pending. You cannot submit a second proposal to "+org_name+" until this entity has been approved by them.</strong></div>");
		}
    })
    $("body").on("click",".green_request_submit",function(){
		
		//if(statuss == 'Approved' || allow_submit == 'yes'){
			var prop_id = $('#prop_id').val();
			var table_field = [];
			table_field={
				gc_requested : 'yes',
			};
		   $.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
		   $('#submitErrorModal').modal('hide');
			$.post(APP_URL + 'ngo/proposals/submit_proposal_gcrequest', {
				prop_id: prop_id,
				table_field: table_field,
			},
			function (response) {
				$.unblockUI();
				$("html, body").animate({scrollTop: 0}, "slow");
				$('#err_add_plan').empty();
				if (response.status == 200) {
				   
					/*var organisation_id = $('#organisation_id').val();
					var ngo_id = $('#ngo_id').val();
					
					console.log(organisation_id);
					console.log(ngo_id);
					$.post(APP_URL + 'ngo/proposals/change_org_ngo_review_status', {
						ngo_id: ngo_id,
						organisation_id: organisation_id,
					},
					function (response) {
						if (response.status == 200) { 
						   console.log(response);
						} else {
							
						}
					}, 'json');*/
					
					$('#err_add_plan').empty();
					$('#err_add_plan').html("<div class='alert alert-success fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + response.message + "</strong></div>");
					$("#err_add_plan").fadeTo(2000, 500).slideUp(500, function(){
						$('#err_add_plan').empty();
						window.location.href = APP_URL+'ngo/proposals/edit?id='+prop_id;
					});
				} else {
					$('#err_add_plan').empty();
					$('#err_add_plan').html("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + response.message + "</strong></div>");
					$("#err_add_plan").fadeTo(2000, 500).slideUp(500, function(){
						$('#err_add_plan').empty();
					});
				}
			}, 'json');
		
		/*}else{
			$('#submitErrorModal').modal('hide');
			$('#alert_danger_error').empty();
			$('#alert_danger_error').append("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>Sorry! - Due diligence for your organisation is still pending. You cannot submit a second proposal to "+org_name+" until this entity has been approved by them.</strong></div>");
		}*/
    })
	
	
	var prop_id = $('#prop_id').val();
	var organisation_id = $('#organisation_id').val();
	var ngo_id = $('#ngo_id').val();
	$.post(APP_URL + 'ngo/proposals/is_all_form_filled', {
		prop_id:prop_id,
		org_id:organisation_id,
		ngo_id:ngo_id,
	},
	function (response) {
		$('#alert_danger_error').empty();
		if(response.is_form3_filled == 'no'){
			$('.page3_complete').addClass('display_none');
			$('.page3_incomplete').removeClass('display_none');
		}else{ 
			$('.page3_complete').removeClass('display_none');
			$('.page3_incomplete').addClass('display_none');
		}
		if(response.is_form4_filled == 'no'){
			$('.page4_complete').addClass('display_none');
			$('.page4_incomplete').removeClass('display_none');
		}else{
			$('.page4_complete').removeClass('display_none');
			$('.page4_incomplete').addClass('display_none');
		}
		if(response.is_form5_filled == 'no'){
			$('.page5_complete').addClass('display_none');
			$('.page5_incomplete').removeClass('display_none');
		}else{
			$('.page5_complete').removeClass('display_none');
			$('.page5_incomplete').addClass('display_none');
		}
		
	}, 'json');
	
	
	
	
});
</script>