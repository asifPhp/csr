<style>
#headerMsg{	margin:20px 0px;}
.dataTables-example th{	text-align:center;}
.ibox-content{padding: 10px;}
</style>
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
											<th class="text-center">Start Year</th>
											<th class="text-center">Name</th>
											<th class="text-center">End Year</th>
											<th class="text-center">Start Date</th>
											<th class="text-center">End Date</th>
                                            <th class="text-center">Action</th>
 											</tr>
											</thead>
											<?php
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
			$content .= '<td class="text-center">' . $value['start_year']. '</td>';
			$content .= '<td class="text-center">' . $value['name']. '</td>';
			$content .= '<td class="text-center">' . $value['end_year']. '</td>';
			$content .= '<td class="text-center">' . $value['start_date']. '</td>';
			$content .= '<td class="text-center">' . $value['end_date']. '</td>';
			$content .= '<td class="text-center">';
			
			if(isset($edit_url)){ 
				$content .= '<a href="'.$edit_url.'?financial_id='.$value['financial_id'].'" class="edit_item" name="' . $value['financial_id'] . '"><span class="label label-warning">Edit</span></a>';
			}
			if(isset($is_remove)){
				$content .= '&nbsp;<a href="javascript:void(0);" class="remove_item" primary_column_name="financial_id" table_name="financial_years" name="' . $value['financial_id'] . '"><span class="label label-danger">Remove</span></a>';
			}
			$content .= '</td>';
			$i++;
		}
	}else{
		$content .= '<tr style="color: red;" class="darker-on-hover"><td class="text-center" >No data Available</td>';
	}
?>		                                             									
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
	$('body').on('click','.remove_item', function () {
        if (!confirm("Do you want to delete")) {
            return false;
        }
		
        var id = parseInt($(this).attr('name'));
        $.post(APP_URL + 'admin/organisation/financial_remove', {id:id}, function (response) {
            $('#headerMsg').empty();
            if (response.status == 200) {
                $("html, body").animate({scrollTop: 0}, "slow");               
                $('#headerMsg').html("<div class='alert alert-success fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
				$("#headerMsg").fadeTo(2000, 500).slideUp(500, function(){
					$('#headerMsg').empty();
					window.location.reload();
				});
            } else {
                $('#headerMsg').html("<div class='alert alert-danger fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
				$("#headerMsg").fadeTo(2000, 500).slideUp(500, function(){
					$('#headerMsg').empty();
				});
			}
        }, 'json');
        return false;
    });
});
</script>
