<style>
#headerMsg{	margin:20px 0px;}
.dataTables-example th{	text-align:center;}
.ibox-content{padding: 10px;}
</style>

<?php
if($sql_query){
	$listdata = $this->db->query($sql_query)->result_array();
}else{
	$listdata = $this->db->get($table_name)->result_array();
}


/*replace or add with query*/
$content = '';

if($listdata){
	$i = 1;
	foreach ($listdata as $key=>$value) {
		$jj = 0;
		$content .= '<tr class="darker-on-hover"><td class="text-center">' . $i . '</td>';
		for ($jj = 0; $jj < $table_body_column_count; $jj++) {
			$content .= '<td class="text-center">' . $value[$table_body_column[$jj]]. '</td>';
		}
		if($is_permitted['is_other1']){
			$content .= '<td class="text-center">';
				if($value['ngo_status']=='Active'){
					$content .= '&nbsp;<a href="javascript:void(0);" class="change_item_status" primary_column_name="'.$primary_column_name.'"  table_name="'.$table_name.'" name="' . $value[$primary_column_name] . '" staff_id="' . $value['ngo_staff_id'] . '" value="Inactive"><span class="label label-success">'.$value['ngo_status'].'</span></a>';
				}else{
					$content .= '&nbsp;<a href="javascript:void(0);" class="change_item_status" primary_column_name="'.$primary_column_name.'"  table_name="'.$table_name.'" name="' . $value[$primary_column_name] . '" staff_id="' . $value['ngo_staff_id'] . '" value="Active"><span class="label label-danger">'.$value['ngo_status'].'</span></a>';
				}
			$content .= '</td>';
		}
		$content .= '<td class="text-center">';
			if(isset($edit_url)){ 
				$content .= '<a href="'.$edit_url.'?id='.$value[$primary_column_name].'" class="edit_module"  name="' . $value[$primary_column_name] . '" value=""><span class="label label-success">Edit</span></a>&nbsp;';
			}
			if(isset($is_remove)){
				$content .= '&nbsp;<a href="javascript:void(0);" class="remove_item" primary_column_name="'.$primary_column_name.'"  table_name="'.$table_name.'" name="' . $value[$primary_column_name] . '" staff_id="' . $value['ngo_staff_id'] . '"  ><span class="label label-danger">Remove</span></a>';
			}
		$content .= '</td>';
		$content .= '</tr>';
		$i++;
	}
}else{
	$content .= '<tr style="color: red;" class="darker-on-hover"><td class="text-center" colspan="'.($table_body_column_count+3).'">No data Available</td>';
}

?>


<div class="content-wrapper animated fadeInRight">
	<div class="content">
		<div class="row">
			<div class="col-lg-12">
				<div class="box ">
					<div class="ibox float-e-margins">
						<div class="box-header with-border">
							<h3 class="box-title"><?php echo $heading; ?></h3>
							<?php if(isset($add_url)){ ?>
								<a style="float: right;" href="<?php echo $add_url; ?>"  class="btn btn-success pull-right">Add</a>
							<?php }?>
						</div>
						<div class="ibox-content">
							<div id="headerMsg"></div>
							<div class="table-responsive">
								<table id="blog_view_table" class="<?php echo $table_type;?> table table-striped table-bordered table-hover" >
									<thead>
										<tr>
											<th class="text-center">S. No.</th>
											<?php
											if($table_header_column){
												foreach($table_header_column as $val){  
													echo '<th class="text-center">'.$val.'</th>';
												}
											}
											?>
											<?php if($is_permitted['is_other1']){ ?>
											<th class="text-center">Status</th>
											<?php } ?>
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
	
	$('body').on('click', '.change_item_status', function () {	
		if (!confirm("Are you sure ? ")) {
            return false;
        }	
		$.blockUI();
        var id = $(this).attr('name');
        var value = $(this).attr('value');
        var staff_id = $(this).attr('staff_id');
        var primary_column_name = $(this).attr('primary_column_name');
        var table_name = $(this).attr('table_name');
		$.post(APP_URL + 'admin/ngo/update_status', {
			id: id,
			table_name: table_name,
			primary_column_name: primary_column_name,
			staff_id: staff_id,
			value: value,
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

	$('body').on('click', '.remove_item', function () {	
		if (!confirm("Do you want to delete")) {
            return false;
        }	
		$.blockUI();
        var id = $(this).attr('name');
        var staff_id = $(this).attr('staff_id');
        var primary_column_name = $(this).attr('primary_column_name');
        var table_name = $(this).attr('table_name');
		$.post(APP_URL + 'admin/ngo/remove', {
			id: id,
			table_name: table_name,
			primary_column_name: primary_column_name,
			staff_id: staff_id,
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
});
</script>

