
 <!-- general form elements -->
	
		<div class="box box-primary collapsed-box">
			<div class="box-header with-border" data-widget="collapse">
				<i class="fa fa-plus btn btn-box-tool fa_plus"></i>
				<h3 class="box-title">Proposal Details</h3>
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
						<label for="title" class="col-md-3 text-right">Organization Background <span class="required is_edit_data display_none">*</span></label>
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
	