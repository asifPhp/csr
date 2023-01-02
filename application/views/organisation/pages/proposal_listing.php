<link rel="stylesheet" href="<?php echo base_url()?>assets/css/comboTreePlugin.css">
<script src="<?php echo base_url()?>assets/js/comboTreePlugin.js"></script>
<style>
#headerMsg{	margin:20px 0px;}
.dataTables-example th{	text-align:center;}
.ibox-content{padding: 10px;}
#blog_view_table td:hover {
    cursor: pointer;
}
</style>

<?php
if($sql_query){
	$listdata = $this->db->query($sql_query)->result_array();
}else{
	$listdata = $this->db->get($table_name)->result_array();
}	
/*replace or add with query*/

if($listdata==0){
	$content .= '<tr style="color: red !inportant;" class="darker-on-hover">
				<td class="text-center" colspan="5" >No data Available</td>
				</tr>';
	$table_type_ = '';	
//var_dump("ddsdff");	
}else{
	$table_type_ = 'dataTables';
	$content = '';
	$i = 1;
	$fname='';
	$lname='';
	$focal_point_name='';
	foreach ($listdata as $key=>$value) {
			//var_dump($value);
			$focal_point='';
			$ngo_id=$value['ngo_id'];
			$org_id=$value['organisation_id'];
			$sql23 = "SELECT staff_id FROM org_assigner_mgmt WHERE ngo_id=$ngo_id and org_id=$org_id and user_type='prposal normal'" ;
			$result23 = $this->db->query($sql23)->result_array();
			if($result23){
				$staff_id_data=$result23[0]['staff_id'];
				$sql23 = "SELECT first_name,last_name FROM org_staff_account WHERE `staff_id`=$staff_id_data " ;
					$result23 = $this->db->query($sql23)->result_array();
					if($result23){
						$first_name = $result23[0]['first_name'];
						$last_name = $result23[0]['last_name'];
						$focal_point=$first_name .' '.$last_name;
						//var_dump($focal_point);
					}
			}
		//$focal_point="fdf";
		$jj = 0;
		
		$content .= '<tr class="darker-on-hover proposal_detail" _id='.$value[$primary_column_name].'><td class="text-center display_none">' . $i . '</td>';
		for ($jj = 0; $jj < $table_body_column_count; $jj++) {
			
			if($table_body_column[$jj] == 'proposal_status'){

				//var_dump($value[$table_body_column[$jj]]);
				//if($value[$table_body_column[$jj]]=='Submitted'){
					//$value[$table_body_column[$jj]]='New';
				//}
				$content .= '<td class="text-center"><span class="label" style="text-transform: capitalize;background-color: '.constant('STATUS_'.ucfirst($value[$table_body_column[$jj]])).' !important;">' . $value[$table_body_column[$jj]]. '</span></td>';
			}else if($table_body_column[$jj] == 'submission_time'){
				$content .= '<td class="text-center">'.date_time_format($value[$table_body_column[$jj]]).'</td>';
			}else if($table_body_column[$jj] == 'gc_responded_by'){
						
				$content .= '<td class="text-center">' .$focal_point. '</td>';
			}
			else{
				$content .= '<td class="text-center">' . $value[$table_body_column[$jj]]. '</td>';
			}
		}
		$content .= '</tr>';
		$i++;
	}
}

?>


<div class="content-wrapper animated fadeInRight">
	<section class="content-header">
	<h1>Proposals</h1>
	</section>
	<div class="content">
		<div class="row">
			<div class="col-lg-12">
				<div class="box ">
					<div class="ibox float-e-margins">
						<div class="box-header with-border">
							<h3 class="box-title">
							<?php if($status == 'Recommended'){echo 'Rec for Rejection';}else if($status == 'Approved'){echo 'Approved';}else if($status=='Rejected'){echo 'Rejected';}else{ echo 'New/ In Review';} ?>&nbsp;Proposals
							</h3>
							
							<div class="btn-group" style="margin-top: -4px;">
								<button type="button" class="btn  <?php if($status == 'New'){ echo 'btn-info';}else{ echo 'btn-default';}?> mark_submited">New/ In Review</button>
								<button type="button" class="btn  <?php if($status == 'Recommended'){ echo 'btn-info';}else{ echo 'btn-default';}?> mark_recommned">Rec for Rejection</button>
								<button type="button" class="btn  <?php if($status == 'Approved'){ echo 'btn-info';}else{ echo 'btn-default';}?>  mark_approved">Approved</button>
								<button type="button" class="btn  <?php if($status == 'Rejected'){ echo 'btn-info';}else{ echo 'btn-default';}?>  mark_Rejected">Rejected</button>
							</div>
				
							<?php if(isset($add_url)){ ?>
								<a style="float: right;" href="<?php echo $add_url; ?>"  class="btn btn-success pull-right">Add</a>
							<?php }?>
						</div>
						
							<input type="hidden" class="main_status" value="<?php echo $status ?>">
							<input type="hidden" class="sub_status" value="<?php  echo $sstatus ?>">
							<input type="hidden" class="focal_point_status" value="<?php echo $focal_point_status ?>">
							
						
						<div class="filter_box">
						
							<div style="display: inline-block;" class="select1">
								<label class="filter_label">Filter: </label>
							</div>
							
							<div style="display: inline-block;" class="comboTreeInputBoxOuterDiv">
								<input style="" type="text" placeholder="Focal Point" class="comboTreeInputBoxInput form-control" id="focal_point_list"  >
							</div>
							<?php if($status=='New'){?>
							<div style="display: inline-block;" class="comboTreeInputBoxOuterDiv">
								<input style="" type="text" placeholder="Status" class="comboTreeInputBoxInput form-control" id="all_status_list"  >
							</div>
							<?php }?>
							<div class="" style="display: inline-block; margin-top: -4px;">
								<button type="button" class="apply_filter btn btn-default filter_btn">Filter</button>
								<button type="button" class="clear_filter btn btn-default filter_btn">Clear Filter(s)</button>
							</div>
						</div>
						
						<div class="ibox-content">
							<div id="headerMsg"></div>
							<div class="table-responsive">

								<table id="blog_view_table" class="<?php echo $table_type_;?> table table-striped table-bordered table-hover" >
									<thead>
										<tr>
											<th class="text-center display_none">prop_id</th>
											<?php
											if($table_header_column){
												foreach($table_header_column as $val){ 
														
													echo '<th class="text-center">'.$val.'</th>';
												}
											}
											?>
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
<div class="modal fade" id="browseChangeStatus" tabindex="-1" course_package="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #f5f5f5;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Change  Status</h3>
            </div> 
            <div class="modal-body row">
				<div class="col-md-12">
					<form class="well" id="category_form2" method="post" enctype="multipart/form-data">
						<input class="form-control" id="category_id2" name="category_id2" value=0 type="hidden">
						<div class="form-group col-md-12" style="padding: 15px 0px 15px 0px">
							<label class="control-label col-md-3" for="category_status">Blog Status<span class="required">*</span></label>
							<div class="col-md-9">
								<select class="form-control" id="category_status" name="category_status">
									<option value="">Select Status</option>
									<option value="active">Active</option>
									<option value="inactive">Inactive</option>
									<option value="remove">Remove</option>
								</select>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-success">Save</button>
						</div>
					</form>
				</div>
			</div>
        </div>
    </div>
</div>
<script>
$('document').ready(function(){
	
	/*var myData = [{
		  id: "2",
		  title:'New'
		},
		{
		  id: "11",
		  title:'NGO Review Pending'
		}, {
		  id: "12",
		  title:'NGO Decision Pending'
		}, {
		  id: "13",
		  title:'Proposal Initial Review Pending'
		}, {
		  id: "14",
		  title:'Proposal Final Review Pending'
		}
	];
	var orgGeoData = [ ];
	var main_status = $('.main_status').val();
	var sub_status = $('.sub_status').val();
	if(sub_status){
		var sub_status_array = sub_status.split(",");
		console.log(sub_status_array);
		if(sub_status_array.length){
			$.each(sub_status_array, function(index, item) {
				if(($.trim(item)) == 'New'){orgGeoData.push("2");}
				//if(($.trim(item)) == 'New'){orgGeoData.push("3");}
				//if(($.trim(item)) == 'Recommended for Rejection'){orgGeoData.push("4");}
				if(($.trim(item)) == 'Rejected'){orgGeoData.push("5");}
				//if(($.trim(item)) == 'Revision Request'){orgGeoData.push("6");}
				//if(($.trim(item)) == 'Processing'){orgGeoData.push("7");}
				//if(($.trim(item)) == 'Pending Revision by NGO'){orgGeoData.push("8");}
				if(($.trim(item)) == 'Approved'){orgGeoData.push("9");}
				if(($.trim(item)) == 'In progress'){orgGeoData.push("10");}
				if(($.trim(item)) == 'NGO Review Pending'){orgGeoData.push("11");}
				if(($.trim(item)) == 'NGO Decision Pending'){orgGeoData.push("12");}
				if(($.trim(item)) == 'Proposal Initial Review Pending'){orgGeoData.push("13");}
				if(($.trim(item)) == 'Proposal Final Review Pending'){orgGeoData.push("14");}
			});


			//$.trim(str)
		}
	}
	
	console.log(orgGeoData);
	console.log(myData);
	console.log(main_status);
	var geo_instance ='';
	geo_instance = $('#all_status_list').comboTree({
			source : myData,
			isMultiple:true,
			cascadeSelect:true,
			//selected: orgGeoData
		});
		if(orgGeoData){
			geo_instance.setSelection(orgGeoData);
		}*/
		
	/** Start Status Section*/
	var listdata = [ ];
	var orgstatus_list = [ ];
	var sub_status = $('.sub_status').val();
	var geo_instance ='';
	var page_name='proposal'
	$.post(APP_URL + 'organisation/tasks/get_org_status_list', {
		page_name:page_name,
	},
	function (response) {
		console.log(response.listdata);
		var listdata=response.listdata;
		if(listdata){
			$.each(listdata, function(index, item) {
				console.log("fdss");
				var item22=(item.title);
				var item223=(item.id);
					console.log(item)
				if(sub_status){
					var sub_status_array = sub_status.split(",");
					console.log(sub_status_array);
					if(sub_status_array.length){
						$.each(sub_status_array, function(index1, item1) {
						var item12=$.trim(item1);
							console.log(item12)
							if(item22==item12){	
								orgstatus_list.push(item223)
							}
						});
					}
				}
					console.log("ssfff");
					console.log(orgstatus_list);
			});
		}
		geo_instance = $('#all_status_list').comboTree({
			source : response.listdata,
			isMultiple:true,
			cascadeSelect:true,
			selected: orgstatus_list
		});
		if(orgstatus_list){
			geo_instance.setSelection(orgstatus_list);
		}
	}, 'json');

	/** End Status Section*/
	
	/** Start Focal Point Section*/
	
	var orgGeoData = [ ];
	var listdata = [ ];
	var focal_point_list_data = [ ];
	var focal_point_status = $('.focal_point_status').val();
	var geo_instance1 ='';
	var page_name='project'
	$.post(APP_URL + 'organisation/tasks/get_focal_point_list', {
		page_name:page_name,
	},
	function (response) {
		console.log(response.focal_point_array);
		var focal_point_array=response.focal_point_array;
		if(focal_point_array){
			$.each(focal_point_array, function(index, item) {
				console.log("fdss");
				var item22=(item.title);
				var item223=(item.id);
					console.log(item)
				if(focal_point_status){
					var sub_status_array = focal_point_status.split(",");
					console.log("DDD");
					console.log(sub_status_array);
					if(sub_status_array.length){
						$.each(sub_status_array, function(index1, item1) {
						var item12=$.trim(item1);
							console.log("dfdfdf")
							console.log(item1)
							if(item223==item1){	
								focal_point_list_data.push(item223)
							}
						});
					}
				}
					console.log("ssfff");
					console.log(focal_point_list_data);
			});
		}
		geo_instance1 = $('#focal_point_list').comboTree({
			source : response.focal_point_array,
			isMultiple:true,
			cascadeSelect:true,
			selected: focal_point_list_data
		});
		console.log("geo_instance1");
		console.log(geo_instance1);
		if(focal_point_list_data){
			geo_instance1.setSelection(focal_point_list_data);
		}
	}, 'json');

	/** End Focal Point Section*/
	
	
	
	
	
	
	
	
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
	
	$('body').on('click', '.remove_item', function () {	
		if (!confirm("Do you want to delete")) {
            return false;
        }	
		$.blockUI();
        var id = $(this).attr('name');
        var primary_column_name = $(this).attr('primary_column_name');
        var table_name = $(this).attr('table_name');
		$.post(APP_URL + 'organisation/common/remove', {
			id: id,
			table_name: table_name,
			primary_column_name: primary_column_name,
		},
		function (response) {
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
			$.unblockUI();
			
		}, 'json');
	});

	$('body').on('click', '.clear_filter', function (e) {
		var url = APP_URL+"organisation/proposals/index";
		console.log(url);
		window.location.href=url;
	});


	$('body').on('click', '.mark_submited', function (e) {
		var url = APP_URL+"organisation/proposals/index";
		console.log(url);
		window.location.href=url;
	});
	
	$('body').on('click', '.mark_recommned', function (e) {
		var url = APP_URL+"organisation/proposals/index";
		url +='?status=Recommended';
		window.location.href=url;
	});
	
	$('body').on('click', '.mark_approved', function (e) {
		var url = APP_URL+"organisation/proposals/index";
		url +='?status=Approved';
	   	console.log(url);
		window.location.href=url;
	});
	$('body').on('click', '.mark_Rejected', function (e) {
		var url = APP_URL+"organisation/proposals/index";
		url +='?status=Rejected';	
	   	console.log(url);
		window.location.href=url;
	});

	$('body').on('click', '.apply_filter', function (e) {
		var main_status = $('.main_status').val();
		var all_status_list = $('#all_status_list').val();
		var focal_point_list_id=geo_instance1.getSelectedIds();
		console.log("Ad");
		console.log(focal_point_list_id);
		var url = APP_URL+"organisation/proposals/index";
		var is_status = 'no';
		
		if(main_status){
			if(is_status == 'no'){
				url += '?';
			}
			url +='status='+main_status +'&'
		} 
		if(all_status_list){
			url +='sstatus='+all_status_list +'&'
		} 
		if(focal_point_list_id){
			url +='focal_point_status='+focal_point_list_id +'&'
		} 
		console.log(url);
		window.location.href=url;
	});
	
	$('#blog_view_table').on("click", ".proposal_detail", function(){
        var href = $(this).attr("_id");
        if(href) {
			window.location.href=APP_URL+'organisation/proposals/detail?id='+href;
        }
    });
	
	
});

</script>

