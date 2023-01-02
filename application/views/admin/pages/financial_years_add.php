<style>
.marBot20{
	margin-bottom:20px;
}
form .form-section {
    color: #343A40;
    line-height: 3rem;
    font-size: 22px;
    letter-spacing: 0.5px;
    font-weight: 400;
    margin-bottom: 20px;
    border-bottom: 1px solid #343A40;
}
</style>

<script>
	$(document).ready(function(){
		$(function () {
			$(".date").datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: 'yy-mm-dd',
				yearRange : 'c-75:c+75',
			});
		});
	});
</script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $page_heading; ?>
      </h1>

    </section>

	
	<?php
	$heading = '';
	//$records = '';
	//var_dump($records);
	if($records){
		$heading = 'Edit financial year';
        $financial_id=$records[0]->financial_id;
		$start_year=$records[0]->start_year;
		$name=$records[0]->name;
		$end_year=$records[0]->end_year;
		$start_date=$records[0]->start_date;
		$end_date=$records[0]->end_date;
		$is_add_edit='edit';
	}
	else{
		$heading = 'Add financial year';
		$financial_id='0';
		$start_year='';
		$name='';
		$end_year='';
		$start_date='';
		$end_date='';
		$is_add_edit='add';
	}
?>
<!-- Main content -->
    <section class="content">
      <div class="row"> 
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $heading?></h3>
			  
		 <a href="financial_years" class="btn btn-default pull-right">All Financial Data</a>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<div class="box-body">
				<form id="product" method="post" role="form">
				<input type="hidden" class="form-control" id="is_add_edit" name="is_add_edit" value="<?php echo $is_add_edit;?>"> 
					<input type="hidden" class="form-control" id="financial_id" name="financial_id" value="<?php echo $financial_id;?>"> 
					<div id="err_add_plan"></div>
					<div class="form-body">
					<!--	<h4 class="form-section"><i class="fa fa-bullhorn" aria-hidden="true"></i> Fill All Detail</h4>-->
						<div class="form-group">
							<label class="control-label"  for="start_year">Start year <span class="required">*</span></label>
							<div class="">
								<input type="number"  id="start_year" name="start_year" placeholder="Enter start year" class="form-control" value="<?php echo $start_year;?>"> 
							</div>
						</div>
						<div class="form-group">
							<label class="control-label"  for="name">Name <span class="required">*</span></label>
							<div class="">
								<input type="text"  id="name" name="name" placeholder="Enter Name" class="form-control" value="<?php echo $name;?>"> 
							</div>
						</div>
						<div class="form-group">
						<label class="control-label"  for="end_year">End Year <span class="required">*</span></label>
							<div class="">
								<input type="number"  id="end_year" name="end_year" placeholder="Enter End year" class="form-control" value="<?php echo $end_year;?>"> 
							</div>
						</div>
						<div class="form-group">
							<label class="control-label"  for="start_date">Start Date<span class="required">*</span></label>
							<div class="">
								<input type="text" readonly id="start_date" name="start_date" placeholder="Enter Start Date" class="form-control date" value="<?php echo $start_date;?>"> 
							</div>
						</div>							
						<div class="form-group">
							<label class="control-label"  for="end_date">End Date<span class="required">*</span></label>
							<div class="">
								<input type="text" readonly id="end_date" name="end_date" placeholder="Enter End Date" class="form-control date" value="<?php echo $end_date;?>"> 
							</div>
						</div>	
					<div class="form-actions center">
						<button type="submit" name="submit" value="save" align="center" class="btn btn-raised btn-success">Submit</button>
					</div>
				
				</form>
            </div>
              <!-- /.box-body -->
           
          </div>
          <!-- /.box -->

        </div>

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
 <script>
$('document').ready(function(){
	$('#product').validate({
		
		ignore: [],
        rules: {
			start_year: {
                required: true,
            },	
			name: {
                required: true,
            },
			end_year: {
                required: true,
            },
			start_date: {
                required: true,
            },
			end_date: {
                required: true,
            },
		},
		messages: {
			start_year: {
                required: "start_year is required.",
            },
			name: {
                required: "name is required.",
            },
			start_date: {
                required: "start_date is required.",
            },
			end_date: {
                required: "end_date is required.",
            },	
		},
		submitHandler: function (form) {
			//$.blockUI()
			
			console.log('submit');
			var financial_id = $('#financial_id').val();
            var start_year = $('#start_year').val();
			var name = $('#name').val();
			var start_date = $('#start_date').val();
			var end_date = $('#end_date').val();
		    var is_add_edit = $('#is_add_edit').val();
		
            $.post(APP_URL + 'admin/organisation/update_financialyears', {
                financial_id:financial_id,
                start_year :start_year, 
				name:name,
				start_date:start_date,
				end_date:end_date,
				is_add_edit:is_add_edit,
				 },
			function (response) {
				$.unblockUI();
				$("html, body").animate({scrollTop: 0}, "slow");
                $('#err_add_plan').empty();
				if (response.status ==200) {
                    var message = response.message;
					
					$('#err_add_plan').html("<div class='alert alert-success fade show in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + message + "</strong></div>");
					$("#err_add_plan").fadeTo(2000, 500).slideUp(500, function(){
						$('#err_add_plan').remove();
						window.location.href = APP_URL+'admin/organisation/financial_years';
					})
                }else {
                    $('#err_add_plan').html("<div class='alert alert-danger fade show'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
					$("#err_add_plan").fadeTo(2000, 500).slideUp(500, function(){
						$('#err_add_plan').empty();
					});
				}					
				
			}, 'json');
			return false;
		},
	});
});
 </script>
 