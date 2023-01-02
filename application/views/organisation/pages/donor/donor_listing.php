
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/comboTreePlugin.css">
<script src="<?php echo base_url()?>assets/js/comboTreePlugin.js"></script>


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
//var_dump($listdata);
if($listdata){
	$i = 1;
	foreach ($listdata as $key=>$value) {
		$jj = 0;
		$content .= '<tr class="darker-on-hover"><td class="text-center">' . $i . '</td>';
		for ($jj = 0; $jj < $table_body_column_count; $jj++) {
			$content .= '<td class="text-center">' . $value[$table_body_column[$jj]]. '</td>';
		}
		$content .= '<td class="text-center">';
			if(isset($edit_url)){ 
				$content .= '<a href="'.$edit_url.'?id='.$value[$primary_column_name].'" class="edit_module"  name="' . $value[$primary_column_name] . '" value=""><span class="label label-success">View</span></a>&nbsp;';
			}
			if(isset($is_remove)){
				$content .= '&nbsp;<a href="javascript:void(0);" class="remove_item" primary_column_name="'.$primary_column_name.'"  table_name="'.$table_name.'" name="' . $value[$primary_column_name] . '"  ><span class="label label-danger">Remove</span></a>';
			}
		$content .= '</td>';
		$content .= '</tr>';
		$i++;
	}
}else{
	$content .= '<tr style="color: red;" class="darker-on-hover"><td class="text-center" colspan="'.($table_body_column_count+2).'">No data Available</td>';
}

?>


<div class="content-wrapper animated fadeInRight">
	<section class="content-header">
     	<h1>
        	Manage Organisation
        	<small></small>
      	</h1>
     
    </section>
	<div class="content">
		<div class="row">
			<div class="col-lg-12">
				<div class="box ">
					<div class="ibox float-e-margins">
						<div class="box-header with-border">
							<h3 class="box-title">Organisation Details</h3>
							
							<a href="<?php echo base_url(); ?>organisation/access/org_profile"  class="btn btn-default pull-right">Edit</a>
							
						</div>
						<div class="ibox-content">
							<?php if($profile_data){

								?>
							<div class="row">
								<div class="col-md-3">
									<h3 class="profile-username text-center">Logo</h3>
									<img class="profile-user-img img-responsive" src="<?php echo base_url().'uploads/'.$profile_data['org_logo'];?>">
								</div>
								<div class="col-md-9">
									<dl class="dl-horizontal">
						                <dt>Name</dt>
						                <dd><?php echo $profile_data['org_name']; ?></dd>
						                <dt>Code</dt>
						                <dd></dd>
						            </dl>
								</div>
							</div>
						<?php }?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="box ">
					<div class="ibox float-e-margins">
						<div class="box-header with-border">
							<h3 class="box-title"><?php echo $heading; ?></h3>
							<?php if(isset($add_url)){ ?>
								<a style="float: right;" href="<?php echo $add_url; ?>"  class="btn btn-success pull-right">Create Donor</a>
							<?php }?>
						</div>
						<div class="ibox-content">
							<div id="headerMsg"></div>
							<div class="table-responsive">
								<table id="blog_view_table" class="<?php if($listdata){ echo $table_type; } ?> table table-striped table-bordered table-hover" >
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
		<div class="row">
			<div class="col-lg-12">
				<div class="box ">
					<div class="ibox float-e-margins">
						<div class="box-header with-border">
							<h3 class="box-title">Categories</h3>
						</div>
						<div class="ibox-content">
							<?php 
							//var_dump($org_category_data);
							foreach ($org_category_data as $key => $value) {
								echo '<h4>
									<strong>'.$value['category_name'].' : </strong>';
									foreach ($value['subcategory'] as $val) {
										echo $val['subcategory_name'].', ';
									}
								echo '</h4>';
							}
							?>
						</div>
						<div class="box-footer">
							<button type="button" class="btn btn-primary " data-toggle="modal" data-target="#browseCategories">Edit</button>

						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="box ">
					<div class="ibox float-e-margins">
						<div class="box-header with-border">
							<h3 class="box-title">Geographies</h3>
						</div>
						<div class="ibox-content">
							<?php 
							foreach ($org_geo_location_data as $key => $value) {
								echo '<h4>
									<strong>'.$value['state_name'].' : </strong>';
									foreach ($value['district'] as $val) {
										echo $val['district_name'].', ';
									}
								echo '</h4>';
							}
							?>
							
							
						</div>
						<div class="box-footer">
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#browseGeoLocation">Edit</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!--------------------------- Modal for Browse Change Status-------------------------->
<div class="modal fade" id="browseCategories" tabindex="-1" course_package="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Categories </h3>
            </div> 
            <form id="category_form2" method="post" enctype="multipart/form-data">
            	<div class="modal-body">
            		<div id="categoriesHeaderMsg"></div>
					<div class="row">
						<label class="control-label col-md-3" for="categories">Category<span class="required">*</span></label>
						<div class="col-md-9">
							<input type="text" readonly id="categories" name="categories" placeholder="Select">
						</div>
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
<!--------------------------- Modal for Browse Geographies-------------------------->
<div class="modal fade" id="browseGeoLocation" tabindex="-1" course_package="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Geographies </h3>
            </div> 
            <form id="geo_location_form2" method="post" enctype="multipart/form-data">
            	<div class="modal-body">
            		<div id="geoLocationHeaderMsg"></div>
					<div class="row">
						<label class="control-label col-md-3" for="geo_location">District<span class="required">*</span></label>
						<div class="col-md-9">
							<input type="text" readonly id="geo_location" name="geo_location" placeholder="Select">
							
						</div>
					</div>
				</div>
				<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-success">Save</button>
				</div>
			</form>
        </div>
    </div>
</div>
<script>
$('document').ready(function(){
	var geo_instance ='';
	var categories_instance ='';
	get_organisation_data();
	function get_organisation_data(){
		$.post(APP_URL + 'organisation/donor/get_organisation_data', {
        },
        function (response) {
        	var geoData=response.geoData;
        	var orgGeoData=response.orgGeoData;

        	
        	geo_instance = $('#geo_location').comboTree({
			  	source : geoData,
			  	isMultiple:true,
			  	cascadeSelect:true,
			  	//selected: orgGeoData
			});
			if(orgGeoData){
				geo_instance.setSelection(orgGeoData);
			}
			var categoryData=response.categoryData;
        	var orgcategoryData=response.orgcategoryData;
			categories_instance = $('#categories').comboTree({
			  	source : categoryData,
			  	isMultiple:true,
			  	cascadeSelect:true,
			  	//selected: orgGeoData
			});
			if(orgcategoryData){
				categories_instance.setSelection(orgcategoryData);
			}
        },'json');
	}
	
	$('#category_form2').validate({
		ignore:[],
        rules: {
            categories: {
                required: true,
            },
        },
        messages: {
            categories: {
                required: "categories is required",
            },
        },
        submitHandler: function (form) {
        	console.log($('#categories').val());
        	var data=categories_instance.getSelectedIds();
        	$.post(APP_URL + 'organisation/donor/update_categries', {
                categories: data,
            },
            function (response) {
				$.unblockUI();
				$("html, body").animate({scrollTop: 0}, "slow");
                $('#categoriesHeaderMsg').empty();
                if (response.status == 200) {
                    $('#categoriesHeaderMsg').empty();
                    $('#categoriesHeaderMsg').html("<div class='alert alert-success fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + response.message + "</strong></div>");
					$("#categoriesHeaderMsg").fadeTo(2000, 500).slideUp(500, function(){
						$('#categoriesHeaderMsg').empty();
						//window.location.href = APP_URL+'organisation/donor/list';
						window.location.reload();
					});
			   	} else {
                    $('#categoriesHeaderMsg').empty();
                    $('#categoriesHeaderMsg').html("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + response.message + "</strong></div>");
					$("#categoriesHeaderMsg").fadeTo(2000, 500).slideUp(500, function(){
						$('#categoriesHeaderMsg').empty();
					});
				}
            }, 'json');
        }
    });

    $('#geo_location_form2').validate({
		ignore:[],
        rules: {
            geo_location: {
                required: true,
            },
        },
        messages: {
            geo_location: {
                required: "categories is required",
            },
        },
        submitHandler: function (form) {
        	console.log($('#geo_location').val());
			var data=geo_instance.getSelectedIds();

        	$.post(APP_URL + 'organisation/donor/update_geo_location', {
                geo_location: data,
            },
            function (response) {
				$.unblockUI();
				$("html, body").animate({scrollTop: 0}, "slow");
                $('#geoLocationHeaderMsg').empty();
                if (response.status == 200) {
                    $('#geoLocationHeaderMsg').empty();
                    $('#geoLocationHeaderMsg').html("<div class='alert alert-success fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + response.message + "</strong></div>");
					$("#geoLocationHeaderMsg").fadeTo(2000, 500).slideUp(500, function(){
						$('#geoLocationHeaderMsg').empty();
						//window.location.href = APP_URL+'organisation/donor/list';
						window.location.reload();
					});
			   } else {
                    $('#geoLocationHeaderMsg').empty();
                    $('#geoLocationHeaderMsg').html("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + response.message + "</strong></div>");
					$("#geoLocationHeaderMsg").fadeTo(2000, 500).slideUp(500, function(){
						$('#geoLocationHeaderMsg').empty();
					});
				}
            }, 'json');
        }
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
});
</script>

