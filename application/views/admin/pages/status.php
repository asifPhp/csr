<style>
#headerMsg{	margin:20px 0px;}
.dataTables-example th{	text-align:center;}
.ibox-content{padding: 10px;}
</style>
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
			$content .= '<td class="text-center">' . $value['name']. '</td>';
			$content .= '<td class="text-center">' . $value['colour']. '</td>';
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
											<th class="text-center">Name</th>
											<th class="text-center">Colour</th>
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

});
</script>

