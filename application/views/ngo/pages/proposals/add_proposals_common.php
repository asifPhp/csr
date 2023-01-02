<link rel="stylesheet" href="<?php echo base_url()?>assets/css/comboTreePlugin.css">
<script src="<?php echo base_url()?>assets/js/comboTreePlugin.js"></script>
<style>
.marBot20{
  margin-bottom:20px;
}
.checkbox{margin-left: 15px;}
.form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control{background-color: #fff;}
</style>
<?php $this->load->view('ngo/pages/proposals/add_proposalsjs'); ?>
<?php

   $page_heading = '';
    $heading = '';
  //var_dump($proposal_data);
  if($proposal_data){
    $page_heading = 'Edit Proposal';
        $heading = 'Edit Proposal';
		$prop_id =$proposal_data['prop_id']; 
		$title =$proposal_data['title'];  
        $organisation_id =$proposal_data['organisation_id'];  
        $ngo_id =$proposal_data['ngo_id'];  
        $code =$proposal_data['code']; 
        $is_readonly="readOnly" ;
        $disp_none='';
        $disp_1='';
        $disp_none_step='display_none';
  }else{
    $page_heading = 'Create New Proposal';
        $heading = 'Add New Proposal';
		$prop_id =0;
		$title ='';
        $organisation_id ='';
        $ngo_id ='';
        $code ='';

        $is_readonly="";
        $disp_none='<!--';
        $disp_1='-->';
        $disp_none_step='';
  }
    
  ?>

<?php echo $disp_none;?>  
<input type="hidden" class="page_counter" value="<?php echo $page_counter;?>">
<div class="content-wrapper">
    <section class="content-header">
        <?php if($is_permitted['is_list']){ ?>
            <a href="<?php echo base_url();?>ngo/proposals/edit?id=<?php echo $prop_id;?>" class="btn btn-default pull-right">Back</a>
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
            
           <!--  <div id="err_add_plan"></div> -->
            <div class="tab-content">


                
        <?php $this->load->view('ngo/pages/proposals/'.$loadviewfile.''); ?>



                  </div>
                </div>
            </div>
            <!-- /.box -->

        </div>

      <!-- /.row -->
    </section>
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
        <button type="button" class="btn btn-primary finail_proposal_submit">Submit</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="submitErrorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
        <h4 class="modal-title" id="myModalLabel">Alert</h4>
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
</div>

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