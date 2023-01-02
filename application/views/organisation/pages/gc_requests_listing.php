<style>
#headerMsg{	margin:20px 0px;}
.dataTables-example th{	text-align:center;}
.ibox-content{padding: 10px;}

</style>

<?php


/*replace or add with query*/
$content = '';
  //var_dump($none_granted_ngo_data);
  //var_dump($status);
if($none_granted_ngo_data){
	$table_type_ = 'dataTables';
	$i=1;
	foreach ($none_granted_ngo_data as $value) {
		//var_dump($value);
		$pre_count=$value['pre_count'];	
		$gc_id=$value['gc_id'];	
		//$ngo_id_by_gc=$value['ngo_id_by_gc'];	
		
			$content .= '<td class="text-center display_none">' .$i. '</td>';
			$content .= '<td class="text-center">' . $value['legal_name']. '</td>';
			$content .= '<td class="text-center">' . $value['brand_name']. '</td>';
			$content .= '<td class="text-center">' . $value['first_name'].' '.$value['last_name'].'</td>';
			$content .= '<td class="text-center">' . $value['pre_count'].'</td>';
			if($status=='unused' || $status=='used'){
				$content .= '<td class="text-center">' . date_time_format($value['grant_time']).'</td>';
			}if($status=='used'){
				$content .= '<td class="text-center">' . $value['title'].'</td>';
				$content .= '<td class="text-center">' . date_time_format($value['used_time']).'</td>';
			}else{
				
			}
			$content .= '<td class="text-center">';
				if($is_permitted['is_other1']){ 
					if($status=='none_granted'){
						$content .= '<a href="'.base_url().'organisation/gc_requests/upload_grant_ticket'.'?id='.$value['ngo_id'].'" class="label label-info">Grant Ticket</a>';
					}else if($status=='unused'){
						$content .= '<a href="'.base_url().'uploads/'.$value['upload_grand_ticket_value'].'"class="label label-info" target="_blank">View Grant Doc</a>';
						$content .= '&nbsp;<a href="javascript:void(0);" class="remove_item" gc_id="'.$gc_id.'" ><span class="label label-danger">Revoke</span></a>';
					}else{
						$content .= '<a href="'.base_url().'uploads/'.$value['upload_grand_ticket_value'].'"class="label label-info" target="_blank">View Grant Doc</a>';
					}
				}
			$content .= '</td>';
			$content .= '</tr>';
			$i++;
	}
	
} 

else{
	$content .= '<tr style="color: red;" class="darker-on-hover"><td class="text-center" colspan="8" >No data Available</td>';
	$table_type_ = '';
}
$heading='Green Channel Tickets';
?>


<div class="content-wrapper animated fadeInRight">
	<section class="content-header">
		<h1 class="box-title"><?php echo $heading; ?></h1>
	</section>
	<div class="content">
		<div class="row">
			<div class="col-lg-12">
				
				<div class="box ">
					<div class="ibox float-e-margins">
						<div class="box-header with-border">
							<?php if(isset($add_url)){ ?>
								<a style="float: right;" href="<?php echo $add_url; ?>"  class="btn btn-success pull-right">Add</a>
							<?php }?>
						
							<h3 class="box-title">
								<?php  if($status =='used'){echo 'Used GC Tickets';}else if($status=='unused'){echo 'Unused GC Tickets';}else{ echo 'Eligible NGO List';} ?>
							
							<div class="btn-group" style="margin-top: -4px;">
								<button type="button" class="btn  <?php if($status =='none_granted'){ echo 'btn-info';}else{ echo 'btn-default';}?> mark_submited">Eligible NGO List</button>
								<button type="button" class="btn  <?php if($status == 'unused'){ echo 'btn-info';}else{ echo 'btn-default';}?>  mark_approved">Unused GC Tickets</button>
								<button type="button" class="btn  <?php if($status == 'used'){ echo 'btn-info';}else{ echo 'btn-default';}?>  mark_Rejected">Used GC Tickets</button>
							</div>
						</div>
						<div class="ibox-content">
							<div id="headerMsg"></div>
							<div class="table-responsive">
								<table id="blog_view_table" class="<?php echo $table_type_;?> table table-striped table-bordered table-hover" >
									<thead>
										<tr>
											<th class="text-center display_none">S. No.</th>
											<th class="text-center">NGO Legal Name</th>
											<th class="text-center">Parent Brand</th>
											<th class="text-center">Owner</th>
											<th class="text-center">Previously Granted</th>
											<?php if($status=='unused'||$status=='used'){?>
												<th class="text-center">Granted On</th>
											<?php }if($status=='used'){?>
											<th class="text-center">Proposal</th>
											<th class="text-center">Used On</th>
											<?php }?>
											<th class="text-center">Action</th>
									
										</tr>
									</thead>
									<tbody>
										<?php echo $content; ?>
									</tbody>
								</table>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!---------------------------- Modal for Browse Change Status-------------------------->
<div class="modal fade" id="browseChangeAssignee" tabindex="-1" course_package="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Change Assignee</h3>
            </div> 
            <div class="modal-body row">
				<div class="col-md-12">
					<div id="headerMsg3"></div>
					<form id="category_form3" method="post" enctype="multipart/form-data">
						<input class="form-control" id="org_task_id2" name="org_task_id2" value="" type="hidden">
						<input class="form-control" id="prop_id_set" name="prop_id_set" value="" type="hidden">
						<input class="form-control" id="org_id_set2" name="org_id_set2" value="" type="hidden">
						<div class="form-group col-md-12" style="padding: 15px 0px 15px 0px">
							<label class="control-label col-md-3" for="new_due_date">Select Assignee<span class="required">*</span></label>
							<div class="col-md-9">
								<select class="form-control " id="new_assignee" name="new_assignee">
									<?php 
										$con1 = '';
										foreach($org_users as $user){
											$con1 .= '<option value="'.$user['staff_id'].'">'.$user['first_name'].' '.$user['last_name'].'</option>';
										}
										echo $con1;
									?>
								</select>
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

	//------------------------------------------------------------------------
    /*
     * This script is used to fill modal for edit category
     */
    $('body').on('click', '.change_status', function () {		
        $('#headerMsg').empty();
		$('#category_form2 label.error').empty();
        $('#category_form2 input.error').removeClass('error');
        $('#category_form2 select.error').removeClass('error');
		
        var category_id = $(this).attr('name');
        var category_status = $(this).closest('tr').find('td:eq(4)').attr('name');		
        
		$('#category_id2').val(category_id);
        $('#category_status').val(category_status);
	});
	
	$('body').on('click', '.permission_result', function () {
		var value = $(this).attr('value');
		if(value=='yes'){
			$msg="Do you want to grant request";
		}else{
			$msg="Do you want to reject request";
		}
		if (!confirm($msg)) {
            return false;
        }	
		//$.blockUI();
        var id = $(this).attr('name');
		$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /><h1>' });
		$.post(APP_URL + 'organisation/Gc_requests/update_proposal_gcresponse', {
			id: id,
			value: value,
		},
		function (response) {
			$.unblockUI();
			$("html, body").animate({scrollTop: 0}, "slow");
			$('#headerMsg').empty();
			if (response.status == 200) {	
				$('#headerMsg').html("<div class='alert alert-success fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong>&nbsp;&nbsp;<a onclick='location.reload();' href='javascript:void(0);'></a></div>");
				$("#headerMsg").fadeTo(2000, 500).slideUp(500, function(){
					$('#headerMsg').empty();
					location.reload();
				});
			} else if (response.status == 201) {
				$('#headerMsg').html("<div class='alert alert-danger fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
				$("#headerMsg").fadeTo(2000, 500).slideUp(500, function(){
					$('#headerMsg').empty();
				});
			}
			
			
		}, 'json');
	});
});


$('body').on('click', '.mark_submited', function (e) {
		var url = APP_URL+"organisation/gc_requests/index";
		console.log(url);
		window.location.href=url;
	});
$('body').on('click', '.mark_approved', function (e) {
		var url = APP_URL+"organisation/gc_requests/index";
		url +='?status=unused';
	   	console.log(url);
		window.location.href=url;
	});
$('body').on('click', '.mark_Rejected', function (e) {
		var url = APP_URL+"organisation/gc_requests/index";
		url +='?status=used';	
	   	console.log(url);
		window.location.href=url;
	});
	
	$('body').on('click', '.remove_item', function () {	
		if (!confirm("Do you want to Revoke")) {
            return false;
        }	
		
        var gc_id = $(this).attr('gc_id');
        $.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
		$.post(APP_URL + 'organisation/gc_requests/revoke_gc_ticket', {
			gc_id: gc_id,
			
		},
		function (response) {
			$.unblockUI();
			$("html, body").animate({scrollTop: 0}, "slow");
			$('#headerMsg').empty();
			if (response.status == 200) {	
				$.toaster({ priority :'success', message :'Saved',});
				setTimeout(function(){
					location.reload();
				},2000);
				
				//$('#headerMsg').html("<div class='alert alert-success fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong>&nbsp;&nbsp;<a onclick='location.reload();' href='javascript:void(0);'></a></div>");
				//$("#headerMsg").fadeTo(2000, 500).slideUp(500, function(){
					//$('#headerMsg').empty();
					//location.reload();
				//});
			}else if (response.status == 201) {
				$('#headerMsg').html("<div class='alert alert-danger fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
				$("#headerMsg").fadeTo(2000, 500).slideUp(500, function(){
					$('#headerMsg').empty();
				});
			}
			$.unblockUI();
			
		}, 'json');
	});
	
	
	
</script>

