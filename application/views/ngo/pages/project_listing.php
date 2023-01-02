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

if($project_list){
	$i = 1;
	foreach ($project_list as $value) {
		//var_dump($value);
		$project_start_date=$value['project_start_date'];
		$project_end_date=$value['project_end_date'];
		
		$content .= '<tr class="darker-on-hover"><td class="text-center">' . $i . '</td>';
		
		$content .= '<td class="text-center">' . $value['title']. '</td>';
		$content .= '<td class="text-center">' . $value['org_name']. '</td>';
		$content .= '<td class="text-center">' . $value['legal_name']. '</td>';
		$content .= '<td class="text-center"><span class="label" style="text-transform: capitalize;background-color: '.constant('STATUS_'.$value['project_status_for_ngo']).' !important;">' . $value['project_status_for_ngo']. '</span></td>';
		
		if($project_start_date!=''){
			$content .= '<td class="text-center">' .date_formats($project_start_date).'</td>';
		}else{
			$project_start_date='';
			$content .= '<td class="text-center">' .$project_start_date.'</td>';
		}
		
		if($project_end_date!=''){
			$content .= '<td class="text-center">' . date_formats($project_end_date). '</td>';
		}else{
			$project_end_date='';
			$content .= '<td class="text-center">' .$project_end_date. '</td>';
		}
		$content .= '<td class="text-center">';
		
		if($ngo_or_organisation == 'organisation'){
			$content .= '<a href="'.base_url().'organisation/project/detail'.'?id='.$value['id'].'" class="label label-info">View Project</a>';
		}else{
			if($is_permitted['is_other1']){ 
				$content .= '<a href="'.base_url().'ngo/project/detail'.'?id='.$value['id'].'" class="label label-info">View Project</a>';
			}
		}
		$content .= '</td>';
		$content .= '</tr>';
		$i++;
	}
}else{
	$content .= '<tr style="color: red;" class="darker-on-hover"><td class="text-center" colspan="10">No data Available</td>';
}
?>
<div class="content-wrapper animated fadeInRight">
	<section class="content-header">
        <h1>
          Projects
          <small></small>
        </h1>
    </section>
	<div class="content">
		<div class="row">
		<?php //var_dump($status);?>
			<div class="col-lg-12">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">
							<?php if($status == 'Completed'){echo 'Completed';}else{ echo 'Live';} ?>&nbsp;Projects
						</h3>	
							<div class="btn-group" style="margin-top: -4px;">
								<button type="button" class="btn  <?php if($status == 'New'){ echo 'btn-info';}else{ echo 'btn-default';}?> mark_submited">Live</button>
								<button type="button" class="btn  <?php if($status == 'Completed'){ echo 'btn-info';}else{ echo 'btn-default';}?>  mark_approved">Completed</button>
								<!--<button type="button" class="btn  <?php //if($status == 'Rejected'){ echo 'btn-info';}else{ echo 'btn-default';}?>  mark_Rejected">Rejected</button>-->
							</div>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						</div>

					</div>

						<input type="hidden" class="main_status" value="<?php echo $status ?>">
						<input type="hidden" class="sub_status" value="<?php echo $sstatus ?>">
						<input type="hidden" class="form-control" id="ngo_list" value="<?php echo $ngo_list; ?>">					
						<input type="hidden" class="form-control" id="organisation_list" value="<?php echo $organisation_list; ?>">		
						
						<div class="filter_box">
						
							<div style="display: inline-block;" class="select1">
								<label class="filter_label">Filter: </label>
							</div>
							<?php if($status=='New'){?>
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
					
					<div class="box-body" style="">
						<div id="headerMsg"></div>
						<div class="table-responsive box-body">
							<table id="blog_view_table" class="<?php if($project_list){ echo $table_type; }?> table table-striped table-bordered table-hover" >
								<thead>
									<tr>
										<th class="text-center">S. No.</th>
										<th class="text-center">Project Name</th>
										<th class="text-center">Org Name</th>
										<th class="text-center">Entity Name</th>
										<th class="text-center">Project Status</th>
										<th class="text-center">Start Date</th>
										<th class="text-center">End Date</th>
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

<script>
$('document').ready(function(){
	var myData = [{
		  id: "1",
		  title:'New'
		},
		{
		  id: "2",
		  title:'Document Requested'
		},
		{
		  id: "3",
		  title:'Setup In Progress'
		},
	];
	var orgGeoData = [ ];
	var main_status = $('.main_status').val();
	var sub_status = $('.sub_status').val();
	if(sub_status){
		var sub_status_array = sub_status.split(",");
		console.log(sub_status_array);
		if(sub_status_array.length){
			$.each(sub_status_array, function(index, item) {
				//if(($.trim(item)) == 'Submitted'){orgGeoData.push("2");}
				if(($.trim(item)) == 'New'){orgGeoData.push("1");}
				if(($.trim(item)) == 'Document Requested'){orgGeoData.push("2");}
				if(($.trim(item)) == 'Setup In Progress'){orgGeoData.push("3");}
				//if(($.trim(item)) == 'Revision Request'){orgGeoData.push("6");}
				//if(($.trim(item)) == 'Processing'){orgGeoData.push("7");}
				//if(($.trim(item)) == 'Pending Revision by NGO'){orgGeoData.push("8");}
				//if(($.trim(item)) == 'Approved'){orgGeoData.push("9");}
				//if(($.trim(item)) == 'In progress'){orgGeoData.push("10");}
				//if(($.trim(item)) == 'NGO Review Pending'){orgGeoData.push("11");}
				//if(($.trim(item)) == 'NGO Decision Pending'){orgGeoData.push("12");}
				//if(($.trim(item)) == 'Proposal Initial Review Pending'){orgGeoData.push("13");}
				//if(($.trim(item)) == 'Proposal Final Review Pending'){orgGeoData.push("14");}
			});


			//$.trim(str)
		}
	}
	
	console.log(orgGeoData);
	console.log(myData);
	console.log(main_status);
	
	var geo_instance ='';
	if(main_status == 'New'){
		geo_instance = $('#all_status_list').comboTree({
			source : myData,
			isMultiple:true,
			cascadeSelect:true,
			//selected: orgGeoData
		});
		if(orgGeoData){
			geo_instance.setSelection(orgGeoData);
		}
	}
	
	//------------------------------------------------------------------------
    /*
     * This script is used to fill modal for edit category
     */
   

	$('body').on('click', '.mark_submited', function (e) {
		var url = APP_URL+"ngo/project/listing";
		console.log(url);
		window.location.href=url;
	});
	$('body').on('click', '.mark_approved', function (e) {
		var url = APP_URL+"ngo/project/listing";
		url +='?status=Completed';
	   	console.log(url);
		window.location.href=url;
	});
	/*$('body').on('click', '.mark_Rejected', function (e) {
		var url = APP_URL+"ngo/project/listing";
		url +='?status=Rejected';	
	   	console.log(url);
		window.location.href=url;
	});*/
	$('body').on('click', '.clear_filter', function (e) {
		var url = APP_URL+"ngo/project/listing";
		console.log(url);
		window.location.href=url;
	});
	
	$('body').on('click', '.apply_filter', function (e) {
		var main_status = $('.main_status').val();
		var all_status_list = $('#all_status_list').val();
		var organisation_list = geo_instance22.getSelectedIds();
		var ngo_list = geo_instance2.getSelectedIds();
		var url = APP_URL+"ngo/project/listing";
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
		
		if(organisation_list){
			url +='organisation_list='+organisation_list +'&'
		} 
		if(ngo_list){
			url +='ngo_list='+ngo_list +'&'
		}
		
		console.log(url);
		window.location.href=url;
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
	
});
</script>

