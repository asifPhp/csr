<link rel="stylesheet" href="<?php echo base_url()?>assets/css/comboTreePlugin.css">
<script src="<?php echo base_url()?>assets/js/comboTreePlugin.js"></script>
<style>
.marBot20{
	margin-bottom:20px;
}
.checkbox{margin-left: 15px;}
.bs-wizard {margin-top: 10px;}
/*Form Wizard*/
.bs-wizard {border-bottom: solid 1px #e0e0e0; padding: 0 0 10px 0;}
.bs-wizard > .bs-wizard-step {padding: 0; position: relative;}
.bs-wizard > .bs-wizard-step + .bs-wizard-step {}
.bs-wizard > .bs-wizard-step .bs-wizard-stepnum {color: #595959; font-size: 16px; margin-bottom: 5px;}
.bs-wizard > .bs-wizard-step .bs-wizard-info {color: #999; font-size: 14px;}
.bs-wizard > .bs-wizard-step > .bs-wizard-dot {position: absolute; width: 30px; height: 30px; display: block; background: #fbe8aa; top: 45px; left: 50%; margin-top: -15px; margin-left: -15px; border-radius: 50%;} 
.bs-wizard > .bs-wizard-step > .bs-wizard-dot:after {content: ' '; width: 14px; height: 14px; background: #fbbd19; border-radius: 50px; position: absolute; top: 8px; left: 8px; } 
.bs-wizard > .bs-wizard-step > .progress {position: relative; border-radius: 0px; height: 8px; box-shadow: none; margin: 20px 0;}
.bs-wizard > .bs-wizard-step > .progress > .progress-bar {width:0px; box-shadow: none; background: #fbe8aa;}
.bs-wizard > .bs-wizard-step.complete > .progress > .progress-bar {width:100%;}
.bs-wizard > .bs-wizard-step.active > .progress > .progress-bar {width:50%;}
.bs-wizard > .bs-wizard-step:first-child.active > .progress > .progress-bar {width:0%;}
.bs-wizard > .bs-wizard-step:last-child.active > .progress > .progress-bar {width: 100%;}
.bs-wizard > .bs-wizard-step.disabled > .bs-wizard-dot {background-color: #f5f5f5;}
.bs-wizard > .bs-wizard-step.disabled > .bs-wizard-dot:after {opacity: 0;}
.bs-wizard > .bs-wizard-step:first-child  > .progress {left: 50%; width: 50%;}
.bs-wizard > .bs-wizard-step:last-child  > .progress {width: 50%;}
.bs-wizard > .bs-wizard-step.disabled a.bs-wizard-dot{ pointer-events: none; }
.other_proposal_related_documents .file_dives{width: 23%;}
/*END Form Wizard*/
.form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control{background-color: #fff;}

</style>
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	
	<?php

	$page_heading = '';
    $heading = '';
	
	if($proposal_data ){
		$page_heading = 'View/Edit Proposal';
        $heading = 'Edit Proposal';
		$prop_id =$proposal_data['prop_id']; 
		$title =$proposal_data['title'];  
        $organisation_id =$proposal_data['organisation_id'];  
        $ngo_id =$proposal_data['ngo_id'];  
        $code =$proposal_data['code']; 
        $is_readonly="readOnly" ;
		if($edit_with_add=='yes'){
			$page_heading = 'Create New Proposal';
			$heading = 'Add New Proposal';
			$prop_id =0;
		}
	}else{
		$page_heading = 'Create New Proposal';
        $heading = 'Add New Proposal';
		$prop_id =0;
		$title ='';
        $organisation_id ='';
        $ngo_id ='';
        $code ='';

        $is_readonly="";
	}
		
	?>

    <section class="content-header">
        <?php if($is_permitted['is_list']){ ?>
            <a href="<?php echo base_url();?>ngo/proposals/list" class="btn btn-default pull-right">Back to Proposal List</a>
        <?php }?>
        <h1>
          <?php echo $page_heading; ?>
          <small></small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
		<div class="row">
			<!-- left column -->
			<div class="col-md-12">
				<input type="hidden" class="current_page" value="<?php echo $current_page; ?>" >   
				<input type="hidden" class="form-control" id="prop_id" name="prop_id" value="<?php echo $prop_id;?>">
		  
				<div id="err_add_plan"></div>
				<!-- <div id="alert_danger_error"></div>-->
				<!--  <div id="err_add_plan"></div> -->
				<div class="tab-content">
					<?php 
						$this->load->view('ngo/pages/proposals/add_proposals_page_1'); 
						$this->load->view('ngo/pages/proposals/add_proposals_page_2'); 
						$this->load->view('ngo/pages/proposals/add_proposals_page_3'); 
						$this->load->view('ngo/pages/proposals/add_proposals_page_4'); 
						$this->load->view('ngo/pages/proposals/add_proposals_page_5'); 
						$this->load->view('ngo/pages/proposals/add_proposalsjs'); 
					?>
				</div>
			</div>
			<!-- /.box -->
		</div>
		<!-- /.row -->
    </section>
</div>
    <!-- /.content -->

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
<!--
<div class="modal fade" id="submitErrorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
       <!-- <h4 class="modal-title" id="myModalLabel">Alert</h4>
      </div>
      <div class="modal-body">
        you have not filling all required information?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Continue</button>
        <button type="button" class="btn btn-primary green_request_submit">Request green chanal</button>
      </div>
    </div>
  </div>
</div>-->

<?php 
    $data['sub_folder_name']="";
    $data['image_cat']="entity";
    $this->load->view('file_with_input_upload',$data); 
?>
<?php 
    $data['sub_folder_name']="";
    $data['image_cat']="entity";
    $this->load->view('file_upload',$data); 
?>