<style>
.marBot20{
	margin-bottom:20px;
}
.checkbox{margin-left: 15px;}
.av:last-child{ display:none;}

</style>
<!-- Content Wrapper. Contains page content -->


	
	<?php
	$page_heading = '';
    $heading = '';
	
	if($entity_data ){
		$category_array = json_decode($entity_data['category_array']);
		//var_dump($category_array);
		$page_heading = 'View/Edit Entity';
        $heading = 'Edit Entity';
		$entity_id =$entity_data['id']; 
		$legal_name =$entity_data['legal_name'];  
        $website =$entity_data['website'];  
        $code =$entity_data['code']; 
        $is_readonly="readOnly" ;
		$brand_name=$entity_data['brand_name'];
		$operation_nature=$entity_data['operation_nature'];
		$geo_location=$entity_data['geo_location'];
		//$geo_location_id=$entity_data['geo_location_id'];
		$geo_location_id=json_decode($entity_data['geo_location_id']);
		//var_dump($geo_location_id);
		
		$city=$entity_data['city'];
		$resource_management=$entity_data['resource_managment'];
		$geographical_reach=$entity_data['geographical_reach'];
		$beneficiary_reach=$entity_data['beneficiary_reach'];
		$other_spacify_ddtail=$entity_data['other_spacify_ddtail'];
		;
		$org_district='';
	}else{
		$page_heading = 'Setup/Create Entity';
        $heading = 'Add New Entity';
		$entity_id =0;
		$legal_name ='';
        $website ='';
        $code ='';
        $brand_name='';
        $is_readonly="";
		$operation_nature='';
		$geo_location='';
		$city='';
		$geographical_reach='';
		$beneficiary_reach='';
		$resource_management='';
		$org_district='';
		
	}
	
	?>
                
	<div class="box-body">
		<div class="row">
			<label for="legal_name" class="col-md-3 text-right">Legal Name of Your Organisation</label>
			<div class="col-md-9"> 
				<span class="is_edit_hide" ><?php echo $legal_name;?></span>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-md-3 text-right legal_name_display display_none is_edit_data">
				<label for="legal_name" class="">Exactly as entered in registration documents<span class="required is_edit_data display_none">*</span></label>
			</div>
		</div>
		<div class="row">
			<label for="legal_name" class="col-md-3 text-right">Brand name of Your Organisation</label>
			<div class="col-md-9"> 
				<span class="is_edit_hide" ><?php echo $brand_name;?></span>
			</div>
		</div>
		<div class="form-group row">
			<label for="legal_name" class="col-md-3 text-right is_edit_data display_none">What name you are commonly known as by your funders and beneficiaries<span class="required is_edit_data display_none">*</span></label>
		</div>
		<div class="row display_none">
			<label for="code" class="col-md-3 text-right">Provide a Unique Short Code for This Entity </label>
		</div>
		<div class="row">
			<div class="row">
				<label for="input_description" class="input_description col-md-3 text-right is_edit_data display_none">WARNING:This code cannot be changed in the future.it can be a maximum of 6 characters in length.</label>
			</div>
		</div>
		<div class="form-group row">
			<label for="code" class="col-md-3 text-right">Unique Short Code for This Entity<span class="required is_edit_data display_none">*</span></label>
			<div class="col-md-9"> 
				<span class="is_edit_hide" ><?php echo $code;?></span>
			</div>
		</div>
		<div class="form-group row">
			<label for="website" class="col-md-3 text-right">Link to the Organisation's Website <span class="required is_edit_data display_none">*</span></label>
			<div class="col-md-9"> 
				<span class="is_edit_hide" ><?php echo $website;?></span>
			</div>
		</div>
		<div class="form-group row">
			<label for="operation_nature" class="col-md-3 text-right"> Primary Nature of Operations <span class="required is_edit_data display_none">*</span></label>
			<div class="col-md-9">
				<span class="is_edit_hide" ><?php echo $operation_nature;?></span>
			</div>
		</div>
		<?php if($operation_nature=="Others"){?>
			<div class="form-group row ">
				<label for="operation_nature" class="col-md-3 text-right">Please specify details for the above<span class="required is_edit_data display_none">*</span></label>
				<div class="col-md-9">
					<span class="is_edit_hide" ><?php echo $other_spacify_ddtail;?></span>
				</div>
			</div>
		<?php }?>
		<div class="row">
			<label class="col-md-3 text-right">List The Key Activities Undertaken by The Organisation</label>
		</div>
		<?php
			
		if($category_array){
				$i=0;
				foreach($category_array as $details){
					if(isset($details->category_name) and isset($details->subcategory_name)){
					if($details->category_name and $details->subcategory_name){
					//var_dump($details);
					$i++;
		?>
			<div class="form-group row">
				<label for="category" class="col-md-3 text-right"><?php echo $i; ?> &nbsp; Category<span class="required is_edit_data display_none">*</span></label>
				<div class="col-md-9">
					<strong><?php echo $details->category_name; ?></strong>: <span class="is_edit_hide" ><?php echo $details->subcategory_name; ?></span>
				</div>
			</div>
			<div class="form-group row">
				<label for="code" class="col-md-3 text-right">Details<span class="required is_edit_data display_none">*</span></label>
				<div class="col-md-9"> 
					<span class="is_edit_hide" ><?php echo $details->value; ?></span>
				</div>
			</div>
				<?php 	}}}
			}
			
			//var_dump($geo_location);
			
		?>
		
		
		<div class="form-group row">
			<label for="geo_location" class="col-md-3 text-right">Choose the entity's geographies of operation<span class="required is_edit_data display_none">*</span></label>
			<div class="col-md-9"> 
			<?php 
				if($ngo_geographies_data){
					foreach ($ngo_geographies_data as $key => $value12) {
					echo '<span>
							<strong>'.$value12['state_name'].' : </strong>';
							foreach ($value12['district'] as $val) {
								//var_dump($val);
								echo $val['district_name'].'<span class="av" > ,&nbsp; </span>';
							}
						echo '</span><br>';
					}
				}
			?>
			</div>
		</div>
		<div class="form-group row">
			<label for="city" class="col-md-3 text-right">Mention Cities where the Organisation's Offices are Located<span class="required is_edit_data display_none">*</span></label>
			<div class="col-md-9"> 
				
				<?php  
				$city_data=json_decode($city);
				if($city_data){
					foreach($city_data as $val){
						
						echo '<span>' .$val .'</span> <span class="av" >, &nbsp;</span>';
					}
				}
				
				?></span>
			</div>
		</div>
		<div class="row">
			<h5 class="col-md-3 text-right">Organisation Scale of Work</h5>
			<div class="table-responsive">
				<table id="blog_view_table" class=" table table-striped table-bordered table-hover" >
					<thead>
						<tr>
							<th class="text-center">Management Resources</th>
							<th class="text-center">Geographical Reach</th>
							<th class="text-center">Beneficiary Reach</th>
							
						</tr>
					</thead>
					<tbody class="table_value">
						<tr>
							<td  class="text-center"><?php echo $resource_management;?></td>
							<td  class="text-center"><?php echo $geographical_reach;?></td>
							<td  class="text-center"><?php echo $beneficiary_reach;?></td>
						</tr>	
					</tbody>
				</table>
			</div>
		</div>
	</div>	
			
						
		
<script>
$('document').ready(function(){

	$("body").on("click",".edit_click",function(){
        var this_data=$(this);
        this_data.parent().parent().find(".is_edit_hide").addClass("display_none");
        this_data.parent().parent().find(".is_edit_data").removeClass("display_none");
    });
	$('#entity_step1_form').validate({
		ignore:[],
        rules: {
            website: {
                required: true,
            },
        },
        messages: {
            website: {
                required: "Website is required.",
            },
        },
        submitHandler: function (form) {
			//$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /> Just a moment...</h1>' });
			
            finail_entity_submit();
            return false;
        }
    });

    $('#entity_step2_form').validate({
        ignore:[],
        rules: {
            legal_name: {
                required: true,
            },
        },
        messages: {
            legal_name: {
                required: "Name is required",
            },
        },
        submitHandler: function (form) {
            //$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /> Just a moment...</h1>' });
            
            finail_entity_submit();
            return false;
        }
    });

    function finail_entity_submit(){
        var entity_id = $('#entity_id').val();
        var code = $('#code').val();

        var table_field = [];
        table_field={
            legal_name : $('#legal_name').val(),
            website : $('#website').val(),
        };
       
        $.post(APP_URL + 'ngo/entity/update_entity', {
            entity_id: entity_id,
            code: code,
            table_field: table_field,
        },
        function (response) {
            $.unblockUI();
            $("html, body").animate({scrollTop: 0}, "slow");
            $('#err_add_plan').empty();
            if (response.status == 200) {
                $('#err_add_plan').empty();
                $('#err_add_plan').html("<div class='alert alert-success fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + response.message + "</strong></div>");
                $("#err_add_plan").fadeTo(2000, 500).slideUp(500, function(){
                    $('#err_add_plan').empty();
                    window.location.href = APP_URL+'ngo/entity/list';
                });
           } else {
                $('#err_add_plan').empty();
                $('#err_add_plan').html("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + response.message + "</strong></div>");
                $("#err_add_plan").fadeTo(2000, 500).slideUp(500, function(){
                    $('#err_add_plan').empty();
                });
            }
        }, 'json');
    }

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
                    window.location.reload();
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




<?php 
    $data['sub_folder_name']="";
    $data['image_cat']="entity";
    $this->load->view('file_upload',$data);?>