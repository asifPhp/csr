<style>
.marBot20{
	margin-bottom:20px;
}
</style>
  
 <?php
	$page_heading = '';
	$heading = '';
	//var_dump($donor_id);
	if($financial_budget_data){
		//var_dump($financial_budget_data);
		$page_heading = 'Edit Budget';
		$heading = 'Budget Details';
		$amount =$financial_budget_data[0]['amount']; 
		$financial_id= $financial_budget_data[0]['financial_id']; 
		$donor_id= $financial_budget_data[0]['donor_id']; 
		$budget_id= $financial_budget_data[0]['id']; 
	}else{
		
		$amount =''; 
		$financial_id=0; 
		$budget_id=0; 
		$page_heading = 'Add a New Budget';
		$heading = 'Budget Details';
	}
		
	
?> 
  
  
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper animated fadeInRight">
    <!-- Main content -->
    <section class="content-header content_h_m_b">
      <h1>
          <?php echo $page_heading; ?>
          <small></small>
        </h1>
		
		<?php if($is_permitted['is_list']){  ?>
			<ol class="breadcrumb" style="padding-top:0px;">
				<li><a href="<?php echo base_url();?>organisation/donor/index?id=<?php if($donor_id){echo $donor_id;}?>" class="btn btn-default pull-right">Back to Donor View</a></li>
			</ol>
		  <?php }?>
    </section>
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box">
            <div class="box-header with-border">
            <h3 class="box-title"><?php echo $heading?></h3> 
           
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="add_budget_form" method="post" role="form">
				<input type="hidden" class="form-control" id="budget_id" name="budget_id" value="<?php if($budget_id){echo $budget_id;}?>">
				<input type="hidden" class="form-control" id="donor_id" name="donor_id" value="<?php echo $donor_id;?>"> 
              <div class="box-body">
				<div id="errHeadMsg"></div>
				<?php //var_dump($donor_data); ?>
				<div class="form-group">
					<label for="first_name">Financial Year</label>
					<select class="form-control" id="financial_id" name="financial_id">
					
						<?php 
						if($financial_data){
							foreach($financial_data as $value) {
								if($donor_data){
									$disabled = '';
									foreach($donor_data as $values) {
										if($value['financial_id'] == $values->financial_id){
											$disabled = 'disabled';
										}
									}
								}
								$selected='';
								if($financial_id==$value['financial_id']){ $selected= 'selected'; }
								echo '<option '.$selected.' '.$disabled.' name="'.$value['financial_id'].'" value="'.$value['financial_id'].'">'.$value['name'].'</option>';
							}
						}
						?>
					</select>
				</div>
                 <div class="form-group">
                  <label for="last_name">Amount<span class="required">*</span></label>
                  <input type="number" class="form-control" id="amount" name="amount" placeholder="Amount" value="<?php echo $amount;?>" >
                </div>
                
				
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                        
                  <button  type="submit" class="btn btn-success">Submit</button>
                
              </div>
            </form>
          </div>
          <!-- /.box -->

        </div>

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<?php $this->load->view('organisation/pages/single_image_upload_croppie');?>
  
<script>
$('document').ready(function(){
	$('#add_budget_form').validate({
		ignore:[],
        rules: {
            financial_id: {
                required: true,
            },
            amount: {
                required: true,
            },
        },
        messages: {
            financial_id: {
                required: "Financial Year is required",
            },
            amount: {
                required: "Amount is  required",
            },
           
        },
        submitHandler: function (form) {
			$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
		     var donor_id=$('#donor_id').val(); 
		     var budget_id=$('#budget_id').val(); 
		     var financial_id = $('#financial_id').val();
			 var amount = $('#amount').val();	
            $.post(APP_URL + 'organisation/donor/insert_onsubmit_budget', {       
				budget_id: budget_id,
				donor_id: donor_id,
				financial_id: financial_id,		
                amount: amount,           
            },
            function (response) {
				$.unblockUI();
				$("html, body").animate({scrollTop: 0}, "slow");
                $('#errHeadMsg').empty();
                if (response.status == 200) {
                    $('#errHeadMsg').empty();
                    $('#errHeadMsg').html("<div class='alert alert-success fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + response.message + "</strong></div>");
					$("#errHeadMsg").fadeTo(2000, 500).slideUp(500, function(){
						$('#errHeadMsg').empty();
						 window.location.href = APP_URL+'organisation/donor/index?id='+response.donor_id;
					});
			   } else {
                    $('#errHeadMsg').empty();
                    $('#errHeadMsg').html("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + response.message + "</strong></div>");
					$("#errHeadMsg").fadeTo(2000, 500).slideUp(500, function(){
						$('#errHeadMsg').empty();
					});
				}
            }, 'json');
            return false;
        }
    });
});
</script>