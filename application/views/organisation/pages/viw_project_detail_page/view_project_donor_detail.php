<style>
#headerMsg{	margin:20px 0px;}
.dataTables-example th{	text-align:center;}
.ibox-content{padding: 10px;}
[data-toggle="collapse"] .fa:before {  
  content: "\f139";
}

[data-toggle="collapse"].collapsed .fa:before {
  content: "\f13a";
}

.edit_click {
    margin-top: -40px;
    margin-right: 35px;
    z-index: 999999;
    position: relative;
}
</style>

<?php
$content1 = '';
	if($donor_data){
		$i=0;
		//var_dump($donor_data);
		$total_budget_amount=0;
		$total_allocate_amount=0;
		$total_dis_amount=0;
		$total_pending_amount=0;
		foreach ($donor_data as $value1) {
			$total_budget_amount=((int)$total_budget_amount + (int)$value1['donor_amount']);
			$total_allocate_amount=((int)$total_allocate_amount + (int)$value1['cycle_donor_amount']);
			$total_dis_amount=((int)$total_dis_amount + (int)$value1['cycle_donor_amount_dis']);
			$total_pending_amount=((int)$total_pending_amount + (int)$value1['pending']);
			//var_dump($total_allocate_amount);
			$i++;
			$content1 .= '<td class="text-center display_none ">' . $i. '</td>';
			$content1 .= '<td class="text-center">' . $value1['main_donor_code']. '</td>';
			$content1 .= '<td class="text-center">' . '<i class="fa fa-inr" aria-hidden="true"></i>'.' '. $value1['donor_amount']. '</td>';
			$content1 .= '<td class="text-center">' . '<i class="fa fa-inr" aria-hidden="true"></i>'.' '.$value1['cycle_donor_amount']. '</td>';
			$content1 .= '<td class="text-center">' . '<i class="fa fa-inr" aria-hidden="true"></i>'.' '.$value1['cycle_donor_amount_dis']. '</td>';
			$content1 .= '<td class="text-center">' . '<i class="fa fa-inr" aria-hidden="true"></i>'.' '.$value1['pending']. '</td>';
			$content1 .= '<td class="text-center">
							<a href="javascript:void(0);" id="donor_popup" data-toggle="modal" data-target="#browseChangeAssignee" donor_amount="'.$value1['donor_amount'].'"  vendor_code="'.$value1['vendor_code'].'"  project_donor_id="'.$value1['project_donor_id'].'" project_id="'.$value1['project_id'].'" ><span class="label label-info">Edit</span></a>';
							//<a href="'.base_url().'organisation/donor/edit_donor?id='.$value1['donor_id'].'" class="label label-info">Edit</a>';
						if(!$value1['vendor_code']){	
			$content1 .= '&nbsp;<a donor_id="'.$value1['donor_id'].'" ngo_id="'.$value1['ngo_id'].'" project_id="'.$value1['project_id'].'" class="label label-success send_notification_by_vendor_code">Request Vendor Code</a>';
						}
			$content1 .= '</td>';
				//'<td class="text-center"> </td>';
			$content1 .= '</tr>';
			
		}
		
		//var_dump($total_allocate_amount);
		$table_type = 'dataTables';
	}else{
		$content1 .= '<tr style="color: red;" class="darker-on-hover " >
		<td class="text-center" colspan="6">No data Available</td></tr>';
		$table_type = '';
	}

?>
	
	<?php
		//var_dump($total_budget_amount);
	
	?>
	
	
	
	
	
	
		<div class="box  box-primary collapsed-box">
			<div class="box-header with-border" data-widget="collapse">
				<i class="fa btn btn-box-tool fa_plus fa-plus"></i>
				<h3 class="box-title">Donor(s)</h3>
			</div>
			<div class="box-body">
			
				<div class="form-group row">
					<label for="registration_date" class="col-md-3 text-right">Total Budget</label>
					<div class="col-md-9"> 
						<span class="registration_street_address" ><?php if($total_budget_amount){}else{ $total_budget_amount=0;} echo '<i class="fa fa-inr" aria-hidden="true"></i> '.$total_budget_amount;?></span>
					</div>
				</div>
			
				<div class="form-group row">
					<label for="registration_date" class="col-md-3 text-right">Total Amount Allocated</label>
					<div class="col-md-9"> 
						<span class="registration_street_address" ><?php if($total_allocate_amount){ }else{$total_allocate_amount=0;} echo '<i class="fa fa-inr" aria-hidden="true"></i> '.$total_allocate_amount;?></span>
					</div>
				</div>
				
				<div class="form-group row">
					<label for="registration_date" class="col-md-3 text-right">Total Disbursed</label>
					<div class="col-md-9"> 
						<span class="registration_street_address" ><?php if($total_dis_amount){}else{$total_dis_amount=0;} echo '<i class="fa fa-inr" aria-hidden="true"></i> '.$total_dis_amount;?></span>
					</div>
				</div>
			
				<div class="form-group row">
					<label for="registration_date" class="col-md-3 text-right">Total Pending</label>
					<div class="col-md-9"> 
						<span class="registration_street_address" ><?php if($total_pending_amount){}else {$total_pending_amount=0;} echo '<i class="fa fa-inr" aria-hidden="true"></i> '.$total_pending_amount;?></span>
					</div>
				</div>
			
			
			
				<div class="table-responsive">
					<table id="blog_view_table" class="<?php echo $table_type;?> table table-striped table-bordered table-hover" >
						<thead>
							<tr>
								<th class="text-center display_none">S No</th>
								<th class="text-center">Donor</th>
								<th class="text-center">Budget</th>
								<th class="text-center">Allocated Amount</th>
								<th class="text-center">Amount disbursed</th>
								<th class="text-center">Pending</th>						
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php echo $content1; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	


<!---------------------------- Modal for Browse Change Status-------------------------->
<div class="modal fade" id="browseChangeAssignee" tabindex="-1" course_package="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Update Donor</h3>
            </div> 
            <div class="modal-body row">
				<div class="col-md-12">
					<div id="headerMsg3"></div>
					<form id="category_form3" method="post" enctype="multipart/form-data">
						<input class="form-control" id="project_donor_id" name="project_donor_id" value="" type="hidden">
						<input class="form-control" id="project_id_set" name="project_id_set" value="" type="hidden">
						<div class="form-group row">
							<label class="control-label col-md-12" for="new_due_date">Budget Amount<span class="required">*</span></label>
							<div class="col-md-12">
								<input class="form-control" id="donor_amount" name="donor_amount" value="" type="number">
							</div>
						</div>
						
						<div class="form-group row" >
							<label class="control-label col-md-12" for="new_due_date">Vendor Code<span class="required">*</span></label>
							<div class="col-md-12">
								<input class="form-control" id="vendor_code" name="vendor_code" value="" type="text">
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-success">Update</button>
						</div>
					</form>
				</div>
			</div>
        </div>
    </div>
</div>	

<script>
$('document').ready(function(){
	
	
	
	$('body').on('click', '#donor_popup', function () {		
       // $('#headerMsg3').empty();
		//$('#category_form3 label.error').empty();
        //$('#category_form3 input.error').removeClass('error');
       // $('#category_form3 select.error').removeClass('error');
		
        var donor_amount = $(this).attr('donor_amount');
        var vendor_code = $(this).attr('vendor_code');
        var project_donor_id = $(this).attr('project_donor_id');
        var project_id = $(this).attr('project_id');
        	
        console.log("fdf");
        console.log(project_id);
        console.log(donor_amount);
		
		$('#project_donor_id').val(project_donor_id);
        $('#donor_amount').val(donor_amount);
        $('#vendor_code').val(vendor_code);
        $('#project_id_set').val(project_id);
    });
	
	
	$('#category_form3').validate({
		ignore: [],
        rules: {
            donor_amount: {
                required: true,	
            },
			vendor_code: {
                required: true,	
            },
		},
		 messages: {
			donor_amount: {
                required: "Budget Amount is required",
            },
			vendor_code: {
                required: "Vendor code is required",
            },
		},
		submitHandler: function (form) {
			
			var donor_amount = $('#donor_amount').val();
            var vendor_code = $('#vendor_code').val();
            var project_donor_id = $('#project_donor_id').val();
            var project_id_set = $('#project_id_set').val();
           //	$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
            
			$.post(APP_URL + 'organisation/project/update_donor_amount', {
                donor_amount: donor_amount,
                vendor_code: vendor_code,
                project_donor_id: project_donor_id,
                project_id_set: project_id_set,
               
            },
			function (response) {
				$.unblockUI();
				$("html, body").animate({scrollTop: 0}, "slow");
                $('#headerMsg1').empty();
                $('#headerMsg').empty();
				if (response.status ==200) {
                    var message = response.message;
					$('#browseChangeAssignee').modal('hide');
					
					$('#headerMsg').html("<div class='alert alert-success fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + message + "</strong>&nbsp;&nbsp;<a href='"+APP_URL+"page/blog_view'></a></div>");
					$("#headerMsg").fadeTo(2000, 500).slideUp(500, function(){
						$('#headerMsg').empty();
						window.location.href = APP_URL+'organisation/project/detail?id='+response.project_id;
					});
                }else if (response.status == 201) {
                    $('#headerMsg1').html("<div class='alert alert-danger fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
					$("#headerMsg1").fadeTo(2000, 500).slideUp(500, function(){
						$('#headerMsg1').empty();
					});
                }				
			}, 'json');
		return false;
		},
	});
	
	
	
	$('body').on('click','.send_notification_by_vendor_code', function (){
			var is_error='no';
			var ngo_id = $(this).attr('ngo_id');
			var donor_id = $(this).attr('donor_id');
			var project_id = $(this).attr('project_id');
			
				if(is_error=='no'){	
					//$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
					$.post(APP_URL + 'organisation/project/send_vandor_code_email_by_project_detail', {
						ngo_id: ngo_id,
						donor_id: donor_id,
						project_id: project_id,
						
					},
					function (response) {
						$.unblockUI();
						$('#head_ngo_review').empty();
						if (response.status == 200) {
							var message = response.message;
							$.toaster({ priority :'success', message :'Vendor Code Send Successfully'});
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
	
	
	
	
	
	
});
</script>
