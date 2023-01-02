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
<div class="content-wrapper proposals">

	
	<?php
		
	//var_dump($final_approval_data);
	if($final_approval_data){
		$csr_file_value='';		
		$csr_file_value_actual='';		
			
		
		if(isset($final_approval_data)){
			$additional_json = json_decode($final_approval_data);
			//var_dump($additional_json);
			
			if(isset($additional_json[0]->csr_file_value)){
				$csr_file_value = $additional_json[0]->csr_file_value;
			}
			if(isset($additional_json[0]->csr_file_value_actual)){
				$csr_file_value_actual = $additional_json[0]->csr_file_value_actual;
			}
		}else{
			$csr_file_value='';		
			$csr_file_value_actual='';		
		}
	}else{
		$csr_file_value='';		
		$csr_file_value_actual='';		
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
						<h3 class="box-title">Final Payment Approval</h3>
					</div>
					<div class="box-body">
						
						<div class="form-group row">
							<div  class="col-md-6 text-right">
								<label for="title">Upload copy of CFO approval mail</label>
							</div>
							<div class="col-md-6"> 
								<a  href="<?php echo base_url()?>uploads/<?php echo $csr_file_value;?>"  target="_blank"><?php echo $csr_file_value_actual;?></a>
							</div>
						</div>
					
					</div>
				</div>
					
			</div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
 

