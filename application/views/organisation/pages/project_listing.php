<link rel="stylesheet" href="<?php echo base_url()?>assets/css/comboTreePlugin.css">
<script src="<?php echo base_url()?>assets/js/comboTreePlugin.js"></script>
<style>
#headerMsg{	margin:20px 0px;}
.dataTables-example th{	text-align:center;}
.ibox-content{padding: 10px;}
</style>

<?php
if($project_list){
	$table_type_ = 'dataTables';
}else{
	$table_type_='';
}
/*replace or add with query*/
$content = '';
//var_dump($project_list);
if($project_list){
	$i = 1;
	foreach ($project_list as $value) {
		//var_dump($value);
		$focal_point='';
			$ngo_id=$value['ngo_id'];
			$org_id=$value['organisation_id'];
			$prop_id=$value['prop_id'];
			//var_dump($prop_id);
			$sql23 = "SELECT staff_id FROM org_assigner_mgmt WHERE ngo_id=$ngo_id and org_id=$org_id and prop_id=$prop_id and user_type='project normal'" ;
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
		$project_start_date=$value['project_start_date'];
		$project_end_date=$value['project_end_date'];
		
		
		$content .= '<tr class="darker-on-hover"><td class="text-center">' . $i . '</td>';
		
		$content .= '<td class="text-center">' . $value['title']. '</td>';
		$content .= '<td class="text-center">' . $value['legal_name']. '</td>';
		$content .= '<td class="text-center"><span class="label" style="text-transform: capitalize;background-color: '.constant('STATUS_'.$value['project_status']).' !important;">' . $value['project_status']. '</span></td>';
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
		$content .= '<td class="text-center">' .$focal_point. '</td>'; // ngo id is teporarly used
	
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
	$table_type_ = '';
}
?>
<div class="content-wrapper animated fadeInRight">
	<section class="content-header">
        <h1>
          Project
          <small></small>
        </h1>
    </section>
	<div class="content">
		<div class="row">
			<div class="col-lg-12">
				<div class="box box-primary">
					<div class="box-header with-border">
						
						<h3 class="box-title">
							<?php 
								//var_dump($status);
							if($status=='Completed'){echo 'Completed';}else{ echo 'Live';} ?>&nbsp;Projects
						</h3>
							
						<div class="btn-group" style="margin-top: -4px;">
						  <button type="button" class="btn  <?php if($status == 'New'){ echo 'btn-info';}else{ echo 'btn-default';}?> mark_submited">Live</button>
							<button type="button" class="btn  <?php if($status == 'Completed'){ echo 'btn-info';}else{ echo 'btn-default';}?>  mark_completed">Completed</button>
						</div>
						<!--<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						</div>-->
					</div>
						<input type="hidden" class="main_status" value="<?php echo $status ?>">
						<input type="hidden" class="sub_status" value="<?php echo $sstatus ?>">
						<input type="hidden" class="focal_point_status" value="<?php echo $focal_point_status ?>">
							
							<?php if($status=='New'){?>
						<div class="filter_box">
						
							<div style="display: inline-block;" class="select1">
								<label class="filter_label">Filter: </label>
							</div>
							<div style="display: inline-block;" class="comboTreeInputBoxOuterDiv">
								<input style="" type="text" placeholder="Focal Point" class="comboTreeInputBoxInput form-control" id="focal_point_list"  >
							</div>
							
							<div style="display: inline-block;" class="comboTreeInputBoxOuterDiv">
								<input style="" type="text" placeholder="Status" class="comboTreeInputBoxInput form-control" id="all_status_list"  >
							</div>
							<div class="" style="display: inline-block; margin-top: -4px;">
								<button type="button" class="apply_filter btn btn-default filter_btn">Filter</button>
								<button type="button" class="clear_filter btn btn-default filter_btn">Clear Filter(s)</button>
							</div>
						</div>
					<?php }?>
					<div class="box-body" style="">
						<div id="headerMsg"></div>
						<div class="table-responsive box-body">
							<table id="blog_view_table" class="<?php echo $table_type_;?> table table-striped table-bordered table-hover" >
								<thead>
									<tr>
										<th class="text-center">S. No.</th>
										<th class="text-center">Project Name</th>
										<th class="text-center">NGO Name</th>
										<th class="text-center">Project Status</th>
										<th class="text-center">Start Date</th>
										<th class="text-center">End Date</th>
										<th class="text-center">Focal Point</th>
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
	/** Start Status Section*/
	var listdata = [ ];
	var orgstatus_list = [ ];
	var sub_status = $('.sub_status').val();
	var geo_instance ='';
	var page_name='project'
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
		if(focal_point_list_data){
			geo_instance1.setSelection(focal_point_list_data);
		}
	}, 'json');

	/** End Focal Point Section*/




	//------------------------------------------------------------------------
    /*
     * This script is used to fill modal for edit category
     */
   

	$('body').on('click', '.clear_filter', function (e) {
		var url = APP_URL+"organisation/project/listing";
		console.log(url);
		window.location.href=url;
	});
		
	$('body').on('click', '.apply_filter', function (e) {
		var main_status = $('.main_status').val();
		var all_status_list = $('#all_status_list').val();
		//var focal_point_list = $('#focal_point_list').val();
		var focal_point_list_id=geo_instance1.getSelectedIds();
		console.log("FF");
		//console.log(data);
		var url = APP_URL+"organisation/project/listing";
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

	$('body').on('click', '.mark_submited', function (e) {
		var url = APP_URL+"organisation/project/listing";
		console.log(url);
		window.location.href=url;
	});
	$('body').on('click', '.mark_completed', function (e) {
		var url = APP_URL+"organisation/project/listing";
		url +='?status=Completed';
	   	console.log(url);
		window.location.href=url;
	});
	$('body').on('click', '.mark_Rejected', function (e) {
		var url = APP_URL+"organisation/project/listing";
		url +='?status=Rejected';	
	   	console.log(url);
		window.location.href=url;
	});
});
</script>

