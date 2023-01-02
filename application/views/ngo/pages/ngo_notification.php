<link rel="stylesheet" href="<?php echo base_url()?>assets/css/comboTreePlugin.css">
<script src="<?php echo base_url()?>assets/js/comboTreePlugin.js"></script>
<style>
#headerMsg{	margin:20px 0px;}
.dataTables-example th{	text-align:center;}
.ibox-content{padding: 10px;}
</style>

<?php

/*replace or add with query*/
$content = '';
//var_dump($ngo_notification);
//var_dump(base_url);
$base=base_url(); 
//var_dump($base);
$table_type='dataTables';
$i = 1;
if($ngo_notification){
	
	
	foreach ($ngo_notification as $value) {
			//var_dump($value);
			$date_time=$value['created_date'].' '.$value['created_time'];
		$content .= '<tr class="darker-on-hover"><td class="text-center">' . $i . '</td>';
		
		$content .= '<td class="text-center">' . $value['title']. '</td>';
		$content .= '<td class="text-center">' . $value['org_name']. '</td>';
		$content .= '<td class="text-center">' . $value['ngo_name']. '</td>';
		$content .= '<td class="text-center">' . $value['prop_name']. '/'.$value['project_name'].'</td>';
		
		$content .= '<td class="text-center">'. date_time_format($date_time). '</td>';
		$content .= '<td class="text-center"><span class="label" style="text-transform: capitalize;background-color: '.constant('STATUS_'.$value['status']).' !important;">' . $value['status'] . '</span></td>';
		
		$content .= '<td class="text-center">';
		
		
			$content .= '<a href="'.$base.''.$value['url'].'" class="label label-info ">View Notification</a>';
		
			
	
		$content .= '</td>';
		$content .= '</tr>';
		$i++;
	}
}else{
	if($i==1){
		$content .= '<tr style="color: red;" class="darker-on-hover"> <td class="text-center" colspan="10">No data Available</td>
				</tr>
				';
	}
}
?>
<div class="content-wrapper animated fadeInRight">
	<section class="content-header">
        <h1>
          Ngo Notifications 
          
        </h1>
    </section>
	<div class="content">
	<?php //var_dump($ngo_notification);?>
		<div class="row">
			<div class="col-lg-12">
			
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title"></h3>
							<?php  if($status == 'Resolved'){echo 'Resolved';}else{ echo 'Pending';} ?>&nbsp;&nbsp;Notifications
							<div class="btn-group" style="margin-top: -4px;">
								<button type="button" class="btn  <?php if($status == 'Pending'){ echo 'btn-info';}else{ echo 'btn-default';}?>  mark_approved">Pending</button>
								<button type="button" class="btn  <?php if($status == 'Resolved'){ echo 'btn-info';}else{ echo 'btn-default';}?>  mark_Rejected">Resolved</button>
							</div>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						</div>

					</div>
						
						<div class="filter_box">
							<div style="display: inline-block;" class="select1">
								<label class="filter_label">Filter: </label>
							</div>
					
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
					<div class="box-body" style="">
					
						<div id="headerMsg"></div>
						<div class="table-responsive box-body">
							<table id="blog_view_table" class="<?php if($i != 1){ echo $table_type; }?> table table-striped table-bordered table-hover" >
								<thead>
									<tr>
										<th class="text-center">S. No.</th>
										<th class="text-center">Name</th>
										<th class="text-center">CSR Org</th>
										<th class="text-center">Entity</th>
										<th class="text-center">Proposal/Project</th>
										<th class="text-center">Time</th>
										<th class="text-center">Status</th>
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

<script>
$('document').ready(function(){
	var ngo_list = $('#ngo_list').val();
	var orgstaffData2 = [ ];
	
	
	
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
		var url = APP_URL+"ngo/notification/index";
		console.log(url);
		window.location.href=url;
	});
	
	
	$('body').on('click', '.mark_Rejected', function (e) {
		var url = APP_URL+"ngo/notification/index";
		url +='?status=Resolved';
	   	console.log(url);
		window.location.href=url;
	});
	$('body').on('click', '.mark_approved', function (e) {
		var url = APP_URL+"ngo/notification/index";
		url +='?status=Pending';
	   	console.log(url);
		window.location.href=url;
	});
	
	$('body').on('click', '.apply_filter', function (e) {
		var main_status = $('#main_status').val();
		var all_status_list = $('#all_status_list').val();
		var organisation_list = geo_instance22.getSelectedIds();
		var ngo_list = geo_instance2.getSelectedIds();
		var status_list = '';
		
		var url = APP_URL+"ngo/notification/index";
			
		if(ngo_list){
			url +='?ngo_list='+ngo_list +'&'
		}
		if(all_status_list){
			url +='sstatus='+all_status_list +'&'
		} 
		
		console.log(url);
		window.location.href=url;
	});
		

	

	
	
});

</script>

