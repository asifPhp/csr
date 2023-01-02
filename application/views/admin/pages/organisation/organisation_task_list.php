<style>
#headerMsg{	margin:20px 0px;}
.dataTables-example th{	text-align:center;}
.ibox-content{padding: 10px;}
</style>

<?php
//var_dump($sql_query);
if($sql_query){
	$listdata = $this->db->query($sql_query)->result_array();
}


/*replace or add with query*/
$content = '';

if($listdata){
	$i = 1;
	foreach ($listdata as $value) {
		//var_dump($value);
		$jj = 0;
		$content .= '<tr class="darker-on-hover"><td class="text-center">' . $i . '</td>';
		$content .= '<td class="text-center">' . $value['task_type']. '</td>';
		$content .= '<td class="text-center">' . $value['task_position']. '</td>';
		$content .= '<td class="text-center">' . $value['task_label']. '</td>';
		$content .= '<td class="text-center">' . $value['view_file_name']. '</td>';
		
		
		$content .= '<td class="text-center">';
			if(isset($edit_url)){ 
				$content .= '<a href="'.$edit_url.'&task_id='.$value['task_id'].'" class="edit_module"   value=""><span class="label label-success">Edit</span></a>&nbsp;';
			}
			//if(isset($is_remove)){
				$content .= '&nbsp;<a href="javascript:void(0);" class="remove_item" id="'.$value['task_id'].'"  ><span class="label label-danger">Remove</span></a>';
			//}
		$content .= '</td>';
		$content .= '</tr>';
		$i++;
	}
}else{
	$content .= '<tr style="color: red;" class="darker-on-hover"><td class="text-center" >No data Available</td>';
}

?>


<div class="content-wrapper animated fadeInRight">
	<section class="content-header">
     	<h1>
        	<?php echo $page_heading; ?>
        	<small></small>
      	</h1>
     
    </section>
	<div class="content">
		<div class="row">
			<div class="col-lg-12">
				<div class="box ">
					<div class="ibox float-e-margins">
						<div class="box-header with-border">
							<h3 class="box-title">Organisation Task List</h3>
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
											<th class="text-center">Task</th>
											<th class="text-center">Task Position</th>
											<th class="text-center">Task Lable</th>
											<th class="text-center">File</th>
											
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

	
	//------------------------------------------------------------------------
    /*
     * This script is used to fill modal for edit category
     */
 
	
	$('body').on('click', '.remove_item', function () {	
		console.log('remove_item');
	});
		if (!confirm("Do you want to delete")) {
            return false;
        }	
		$.blockUI();
        var id = $(this).attr('name');
        var staff_id = $(this).attr('staff_id');
        var primary_column_name = $(this).attr('primary_column_name');
        var table_name = $(this).attr('table_name');
		$.post(APP_URL + 'admin/organisation/remove', {
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

