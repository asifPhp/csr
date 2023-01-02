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
$content = '';
$i = 1;
if ($listdata == 0) {
	$content .= '<tr style="color: red;" class="darker-on-hover"><td class="text-center" colspan="5">No data Available</td>';
} else {
	
	
	//var_dump($listdata);
	$content = '';
	foreach ($listdata as $value) {
		$is_show = 'no';
		
		$status_=$value['proposal_status_for_ngo'];
		//var_dump($status_);
		if($status == 'Review'){
			if($is_created == 'yes'){
				if(($status_ == 'Created' || $status_ == 'Revision Requested') && !$value['gc_requested']){
				//	var_dump($status_);
					$is_show = 'yes';
				}
			}
			if($GC_Requested == 'yes' && $value['gc_requested'] == 'yes'){
				if($value['gc_granted'] != 'yes' && $value['gc_granted'] != 'no'){
					$is_show = 'yes';$status_='GC: Requested';
				}
			}
			if($GC_Approved == 'yes' && $value['gc_requested'] == 'yes' && $value['proposal_status_for_ngo']!= 'Submitted'){
				if($value['gc_granted'] == 'yes'){
					$is_show = 'yes';$status_='GC: Approved';
				}
			}
			
			if($GC_Rejected == 'yes' && $value['gc_requested'] == 'yes'){
				if($value['gc_granted'] == 'no'){
					$is_show = 'yes';$status_='GC: Rejected';
				}
			}
			if($GC_Approved == 'yes' && $value['gc_requested'] == 'yes' && $value['proposal_status_for_ngo']== 'Revision Requested'){
				
				if($value['gc_granted'] == 'yes'){
					$is_show = 'yes';$status_='Revision Requested';
				}
			}
			/*if($value['proposal_status']=='Recommended for Rejection'){
				$status_='Rejected';
			}*/
			//var_dump($is_submitted);
			//var_dump($status);
			if($is_submitted == 'yes'){
				if($status_ == 'Submitted'){
					$is_show = 'yes';
				}
			}
			
		}else{
			$is_show = 'yes';
		}
		
		//var_dump($value['prop_id'] .' - '.$value['gc_granted'] .' - '.$value['gc_requested'] .' - '.$is_created .' - '.$is_submitted .' - '.$GC_Requested .' - '.$GC_Approved .' - '.$GC_Rejected);
	
		
		if($is_show == 'yes'){$i++;
			$content .= '<tr class="darker-on-hover edit_proposal"   _id="' . $value['prop_id'] . '">';
			$content .= '<td class="text-center display_none">' . $i . '</td>';
			$content .= '<td class="text-center">' . $value['new_prop_id'] . ' </td>';
			$content .= '<td class="text-center">' . $value['title'] . ' </td>';
			$assigned_to='';
			if($value['organisation_id']){
				$organisation_id=$value['organisation_id'];
				$sql1="SELECT org_name FROM `organisation` WHERE `org_id`=$organisation_id";
					$db_result1 = $this->db->query($sql1)->result_array();
					if($db_result1){
						$assigned_to = $db_result1[0]['org_name'];
					}
			}
			$content .= '<td class="text-center">' . $assigned_to. '</td>';
			$content .= '<td class="text-center "><span class="label" style="text-transform: capitalize;background-color: '.constant('STATUS_'.$status_).' !important;">' . $status_. '</span>
			</td>';
			if($value['created_time']){
				$content .= '<td class="text-center">' . date_time_format($value['created_time']) . '</td>';
			}else{
				$content .= '<td class="text-center"></td>';
			}
			if($value['submission_time']){
				$content .= '<td class="text-center">' . date_time_format($value['submission_time']) . '</td>';
			}else{
				$content .= '<td class="text-center"></td>';
			}
				
				/*
				if(isset($is_remove)){
					$content .= '&nbsp;<a href="javascript:void(0);" class="remove_item" primary_column_name="prop_id"  table_name="proposal" name="' . $value['prop_id'] . '"  ><span class="label label-info">Create Proposal</span></a>';
				}*/
			$content .= '</td>';
			$content .= '</tr>';
		}
		
	}
	if($i == 1){
		$content .= '<tr style="color: red;" class="darker-on-hover"><td class="text-center" colspan="7">No data Available</td>';
	}
	
	
}
	$staff_id = $this->session->userdata('ngo_staff_id');
	$add_permit='';
	$sql5="SELECT add_access  FROM `ngo_staff_access` WHERE module_id=4 and submodule_id=7 and staff_id=$staff_id" ;
	$add_permit = $this->db->query($sql5)->result_array();
	//var_dump($add_permit);

//var_dump($array_length);
?>


<div class="content-wrapper animated fadeInRight">
	 <section class="content-header">
        <h1>
          Proposals
          <small></small>
        </h1>
    </section>
	<div class="content">
		<div class="row">
			<div class="col-lg-12">
				<div class="box box-primary">
					<div class="ibox float-e-margins">
						<div class="box-header with-border">
						    <?php 
							   // var_dump($listdata);
							?>
							<h3 class="box-title"><?php echo $heading; ?></h3>
							<?php if($add_permit){
									if($add_permit[0]['add_access']){
								?>
								<a style="float: right;" href="<?php echo base_url();?>ngo/proposals/index" class="btn btn-success pull-right">Create Proposal</a>
							<?php }}?>
							<input type="hidden" class="form-control main_status" id="main_status" value="<?php echo $status; ?>">					
							<input type="hidden" class="form-control sub_status" id="sub_status" value="<?php echo $sstatus; ?>">					
							<input type="hidden" class="form-control" id="ngo_list" value="<?php echo $ngo_list; ?>">					
							<input type="hidden" class="form-control" id="organisation_list" value="<?php echo $organisation_list; ?>">	
							<?php //var_dump($status);?>
							<?php //var_dump($listdata);?>
							<div class="btn-group" style="margin-top: -4px;">
							
								<button type="button" class="btn  <?php if($status == 'Review'){ echo 'btn-info';}else{ echo 'btn-default';}?> mark_inprogesss">In Progress</button>
								<button type="button" class="btn  <?php if($status == 'Submitted'){ echo 'btn-info';}else{ echo 'btn-default';}?>  mark_submitted">Submitted</button>
								<button type="button" class="btn  <?php if($status == 'Approved'){ echo 'btn-info';}else{ echo 'btn-default';}?>  mark_approved">Approved</button>
								<button type="button" class="btn  <?php if($status == 'Rejected'){ echo 'btn-info';}else{ echo 'btn-default';}?>  mark_rejected">Rejected</button>
							</div>
						</div>
				
						<div class="filter_box">
							<div style="display: inline-block;" class="select1">
								<label class="filter_label">Filter: </label>
							</div>
					
							<?php if($status=='Review'){?>
							<div style="display: inline-block;" class="comboTreeInputBoxOuterDiv">
								<input style="" type="text" placeholder="Status" class="comboTreeInputBoxInput form-control" id="all_status_list"  >
							</div>
							
							<?php }?>
							<div style="display: inline-block;" class="comboTreeInputBoxOuterDiv">
								<input style="" type="text" placeholder="Entity" class="comboTreeInputBoxInput form-control" id="all_ngo_list"  >
							</div>
							<div style="display: inline-block;" class="comboTreeInputBoxOuterDiv">
								<input style="" type="text" placeholder="Organisation" class="comboTreeInputBoxInput form-control" id="all_organisation_list"  >
							</div>
							<div class="" style="display: inline-block; margin-top: -4px;">
								<button type="button" class="apply_filter btn btn-default filter_btn">Filter</button>
								<button type="button" class="clear_filter btn btn-default filter_btn">Clear Filter(s)</button>
							</div>
                            
						</div>
						<div class="ibox-content">
							<div id="headerMsg"></div>
							<div class="table-responsive">
								<table id="blog_view_table" class="<?php if($i != 1){ echo $table_type; }?> table table-striped table-bordered table-hover" >
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
										
										<?php
											echo $content;
										?>
										
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


<script>
$('document').ready(function(){
	
	$('body').on('click', '.remove_item', function () {	
		if (!confirm("Do you want to delete")) {
            return false;
        }	
		$.blockUI();
        var id = $(this).attr('name');
        var primary_column_name = $(this).attr('primary_column_name');
        var table_name = $(this).attr('table_name');
		$.post(APP_URL + 'ngo/common/remove', {
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
	
	var ngo_list = $('#ngo_list').val();
	var orgstaffData2 = [ ];
	if(ngo_list){
		var sub_status_array = ngo_list.split(",");
		console.log(sub_status_array);
		if(sub_status_array.length){
			$.each(sub_status_array, function(index, item) {
				orgstaffData2.push(item)
			});
		}
	}
	
	
	var myData = [
		{
		  id: "1",
		  title:'Created'
		}
		/*,{
		  id: "2",
		  title:'Submitted'
		},{
		  id: "15",
		  title:'GC: Requested'
		},{
		  id: "16",
		  title:'GC: Approved'
		},{
		  id: "17",
		  title:'GC: Rejected'
		}*/
		
	];
	var orgGeoData = [ ];
	var main_status = $('.main_status').val();
	var sub_status = $('.sub_status').val();
	if(sub_status){
		var sub_status_array = sub_status.split(",");
		console.log("df");
		console.log(sub_status_array);
		if(sub_status_array.length){
			$.each(sub_status_array, function(index, item) {
				if(($.trim(item)) == 'Created'){orgGeoData.push("1");}
				//if(($.trim(item)) == 'Submitted'){orgGeoData.push("2");}
				//if(($.trim(item)) == 'New'){orgGeoData.push("3");}
				//if(($.trim(item)) == 'Recommended for Rejection'){orgGeoData.push("4");}
				//if(($.trim(item)) == 'Rejected'){orgGeoData.push("5");}
				//if(($.trim(item)) == 'Revision Request'){orgGeoData.push("6");}
				//if(($.trim(item)) == 'Processing'){orgGeoData.push("7");}
				//if(($.trim(item)) == 'Pending Revision by NGO'){orgGeoData.push("8");}
				//if(($.trim(item)) == 'Approved'){orgGeoData.push("9");}
				//if(($.trim(item)) == 'In progress'){orgGeoData.push("10");}
				//if(($.trim(item)) == 'NGO Review Pending'){orgGeoData.push("11");}
				//if(($.trim(item)) == 'NGO Decision Pending'){orgGeoData.push("12");}
				//if(($.trim(item)) == 'Proposal Initial Review Pending'){orgGeoData.push("13");}
				//if(($.trim(item)) == 'Proposal Final Review Pending'){orgGeoData.push("14");}
				//if(($.trim(item)) == 'GC: Requested'){orgGeoData.push("15");}
				//if(($.trim(item)) == 'GC: Approved'){orgGeoData.push("16");}
				//if(($.trim(item)) == 'GC: Rejected'){orgGeoData.push("17");}
			});


			//$.trim(str)
		}
	}
	
	
	console.log("DDD");
	console.log(orgGeoData);
	console.log(myData);
	console.log(main_status);
	var geo_instance ='';
	if(main_status == 'Review'){
		geo_instance = $('#all_status_list').comboTree({
			source : myData,
			isMultiple:true,
			cascadeSelect:true,
			selected: orgGeoData
		});
	
		if(orgGeoData){
			geo_instance.setSelection(orgGeoData);
		}
	}
	
	console.log(orgstaffData2);
	var geo_instance2 ='';
	$.post(APP_URL + 'ngo/staff/get_ngo_list', {
		
	}, 
	function (response) {

			geo_instance2 = $('#all_ngo_list').comboTree({
				source : response.listdata,
				isMultiple:true,
				cascadeSelect:true,
				selected: orgstaffData2
			});

		if(orgstaffData2){
			geo_instance2.setSelection(orgstaffData2);
		}
		
	},'json');
	console.log(geo_instance2);
	var organisation_list = $('#organisation_list').val();
	var orgstaffData = [ ];
	if(organisation_list){
		var sub_status_array = organisation_list.split(",");
		console.log(sub_status_array);
		if(sub_status_array.length){
			$.each(sub_status_array, function(index, item) {
				orgstaffData.push(item)
			});
		}
	}
	console.log(orgstaffData);
	var geo_instance22 ='';
	$.post(APP_URL + 'ngo/staff/get_organisation_list', {
	},
	function (response) {
		geo_instance22 = $('#all_organisation_list').comboTree({
			source : response.listdata,
			isMultiple:true,
			cascadeSelect:true,
			selected: orgstaffData
		});
		if(orgstaffData){
			geo_instance22.setSelection(orgstaffData);
		}
		
	}, 'json');
	
$('body').on('click', '.clear_filter', function (e) {
		var url = APP_URL+"ngo/proposals/list";
		console.log(url);
		window.location.href=url;
	});
	
	$('body').on('click', '.apply_filter', function (e) {
		var main_status = $('#main_status').val();
		var all_status_list = $('#all_status_list').val();
		var organisation_list = geo_instance22.getSelectedIds();
		var ngo_list = geo_instance2.getSelectedIds();
		var status_list = '';
		if(main_status == 'Review'){
			status_list = geo_instance.getSelectedIds();
		}
		var url = APP_URL+"ngo/proposals/list";
		var is_status = 'no';
		if(main_status){
			if(is_status == 'no'){
				url += '?';
			}
			url +='status='+main_status +'&'
		} 
		if(organisation_list){
			url +='?organisation_list='+organisation_list +'&'
		} 
		if(ngo_list){
			url +='ngo_list='+ngo_list +'&'
		}
		if(all_status_list){
			url +='sstatus='+all_status_list +'&'
		} 
		
		console.log(url);
		window.location.href=url;
	});
		

	$('body').on('click', '.mark_inprogesss', function (e) {
		var organisation_list = geo_instance22.getSelectedIds();
		var ngo_list = geo_instance2.getSelectedIds();
		var url = APP_URL+"ngo/proposals/list";
		if(organisation_list){
			url +='?organisation_list='+organisation_list +'&';
		} 
		if(ngo_list){
			url +='?ngo_list='+ngo_list +'&';
		}
		window.location.href=url;
	});

	$('body').on('click', '.mark_approved', function (e) {
		var organisation_list = geo_instance22.getSelectedIds();
		var ngo_list = geo_instance2.getSelectedIds();
		var url = APP_URL+"ngo/proposals/list";
		url +='?status=Approved'+'&';
		if(organisation_list){
			url +='organisation_list='+organisation_list +'&';
		} 
		if(ngo_list){
			url +='ngo_list='+ngo_list +'&'
		}
		window.location.href=url;
	});
	
	$('body').on('click', '.mark_submitted', function (e) {
		var organisation_list = geo_instance22.getSelectedIds();
		var ngo_list = geo_instance2.getSelectedIds();
		var url = APP_URL+"ngo/proposals/list";
		url +='?status=Submitted'+'&';
		if(organisation_list){
			url +='organisation_list='+organisation_list +'&';
		} 
		if(ngo_list){
			url +='ngo_list='+ngo_list +'&'
		}
		window.location.href=url;
	});
	
	$('body').on('click', '.mark_rejected', function (e) {
		var organisation_list = geo_instance22.getSelectedIds();
		var ngo_list = geo_instance2.getSelectedIds();
		var url = APP_URL+"ngo/proposals/list";
		url +='?status=Rejected'+'&';
		if(organisation_list){
			url +='organisation_list='+organisation_list +'&';
		} 
		if(ngo_list){
			url +='ngo_list='+ngo_list +'&'
		}
		window.location.href=url;
	});
	
	
	$('#blog_view_table').on("click", ".edit_proposal", function(){
        var href = $(this).attr("_id");
        if(href) {
			window.location.href=APP_URL+'ngo/proposals/edit?id='+href;
        }
    });
	
	
});

</script>

