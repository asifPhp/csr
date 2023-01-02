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
<script>
	$(document).ready(function(){
		$('.dataTablesOrder').DataTable( {
			"order": [[ 7, "desc" ]],
			"lengthMenu": [[50, 75, 100, -1], [50, 75, 100, "All"]]
		});
    });
	
	
</script>
<?php




/*replace or add with query*/
$content = '';
//var_dump($ngo_list);	

if($ngo_list){
	$i = 1;
	foreach ($ngo_list as $value) {
		//var_dump($value);
		$focal_point='';
		$ngo_id=$value['ngo_id'];
		$org_id=$value['organisation_id'];
		$sql23 = "SELECT staff_id FROM org_assigner_mgmt WHERE ngo_id=$ngo_id and org_id=$org_id and user_type='normal'" ;
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
		
		
		$content .= '<tr class="darker-on-hover ngo_detail" _id='.$value['id'].'><td class="text-center display_none">' . $i . '</td>';
		
		
		$content .= '<td class="text-center">' . $value['legal_name']. '</td>';
		$content .= '<td class="text-center">' . $value['superngo_name']. '</td>';
		
		if($value['status']){
		$content .= '<td class="text-center">
			<span class="label" style="text-transform: capitalize;background-color: '.constant('STATUS_'.ucfirst($value['status'])).' !important;">'. $value['status'].'</span>
			</td>';	
		}else{
			$content .= '<td class="text-center">' . $value['status']. '</td>';
		}
		$content .= '<td class="text-center">' . $value['status_counter_approved']. '</td>';
		$content .= '<td class="text-center">' . $value['status_counter_unapproved']. '</td>';
		$content .= '<td class="text-center">' . $value['count_live_project']. '</td>';
		$content .= '<td class="text-center">' . date_time_format($value['submission_time']). '</td>';
		$content .= '<td class="text-center">' .$focal_point. '</td>';
		/*
		$content .= '<td class="text-center">';
			if($is_permitted['is_other1']){ 
				$content .= '<a href="'.base_url().'organisation/ngo/detail'.'?id='.$value['id'].'" class="label label-info">Detail</a>';
			}	
		$content .= '</td>';
		*/
		$content .= '</tr>';
		$i++;
	}
	$table_type_ = 'dataTablesOrder';
}else{
	$table_type_ = '';
	$content .= '<tr style="color: red;" class="darker-on-hover"><td class="text-center" colspan="10">No data Available</td>';
}

?>


<div class="content-wrapper animated fadeInRight">
	<section class="content-header">
     	<h1>
        	NGOs
        	<small></small>
      	</h1>
    </section>
	<div class="content">
		<div class="row">
			<div class="col-lg-12">
				<div class="box ">
					<div class="ibox float-e-margins">
						<div class="ibox-content">
							<div class="box-header with-border">
								<h3 class="box-title">
							<?php  if($status == 'Approved'){echo 'Approved';}else if($status=='Rejected'){echo 'Rejected';}else{ echo 'New/In Review';} ?>&nbsp;NGOs
							</h3>
							
							<div class="btn-group" style="margin-top: -4px;">
							  <button type="button" class="btn  <?php if($status == 'New'){ echo 'btn-info';}else{ echo 'btn-default';}?> mark_submited">New/In Review</button>
							<button type="button" class="btn  <?php if($status == 'Approved'){ echo 'btn-info';}else{ echo 'btn-default';}?>  mark_approved">Approved</button>
							<button type="button" class="btn  <?php if($status == 'Rejected'){ echo 'btn-info';}else{ echo 'btn-default';}?>  mark_Rejected">Rejected</button>
							  </div>
								
							</div>
							
							<input type="hidden" class="main_status" value="<?php echo $status ?>">
							<input type="hidden" class="sub_status" value="<?php echo $sstatus ?>">
						<?php if($status=='New'){?>
						<div class="filter_box">
							
							<div style="display: inline-block;" class="select1">
								<label class="filter_label">Filter: </label>
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
						
							<div id="headerMsg"></div>
							<div class="table-responsive">
								<table id="blog_view_table" class="<?php echo $table_type_;?> table table-striped table-bordered table-hover" >
									<thead>
										<tr>
											<th class="text-center display_none">S. No.</th>
											<th class="text-center">NGO Name</th>
											<th class="text-center">Parent Brand</th>
											<th class="text-center">NGO Status</th>
											<th class="text-center">No of Processing Proposals</th>
											<th class="text-center">No of Rejected Proposals</th>
											<th class="text-center">Live Project</th>
											<th class="text-center">Date of First Submission</th>
											<th class="text-center">Focal Point</th>
										<!--	<th class="text-center">Action</th> -->
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

	$('#blog_view_table').on("click", ".ngo_detail", function(){
        var href = $(this).attr("_id");
        if(href) {
			window.location.href=APP_URL+'organisation/ngo/detail?id='+href;
        }
    });
	
	
	
	var myData = [{
		  id: "2",
		  title:'New'
		},  {
		  id: "11",
		  title:'NGO Review Pending'
		}, {
		  id: "12",
		  title:'NGO Decision Pending'
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
		}
	
	//------------------------------------------------------------------------
    /*
     * This script is used to fill modal for edit category
     */
   
});
$('body').on('click', '.clear_filter', function (e) {
		var url = APP_URL+"organisation/ngo/listing";
		console.log(url);
		window.location.href=url;
	});
	
	$('body').on('click', '.mark_submited', function (e) {
		var url = APP_URL+"organisation/ngo/listing";
		console.log(url);
		window.location.href=url;
	});
$('body').on('click', '.mark_approved', function (e) {
		var url = APP_URL+"organisation/ngo/listing";
		url +='?status=Approved';
	   	console.log(url);
		window.location.href=url;
	});
$('body').on('click', '.mark_Rejected', function (e) {	
		var url = APP_URL+"organisation/ngo/listing";
		url +='?status=Rejected';	
	   	console.log(url);
		window.location.href=url;
	});

$('body').on('click', '.apply_filter', function (e) {
		var main_status = $('.main_status').val();
		var all_status_list = $('#all_status_list').val();
		var url = APP_URL+"organisation/ngo/listing";
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
		console.log(url);
		window.location.href=url;
	});


</script>

