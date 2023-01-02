<style>
.marBot20{
	margin-bottom:20px;
}
.checkbox{margin-left: 15px;}
.text_center{
	text-align: center;
}

</style>
<!-- Content Wrapper. Contains page content -->


	
	<?php
	$page_heading = '';
    $heading = '';
	
	if($entity_data){
        $defined_structure_decission_making=$entity_data['defined_structure_decission_making'];
        $upload_organogram_actual=$entity_data['upload_organogram_actual'];
        $upload_organogram=$entity_data['upload_organogram'];
        $entity_have_governing_board=$entity_data['entity_have_governing_board'];
        $detail_body_member=$entity_data['detail_body_member'];
        $number_of_employee=$entity_data['number_of_employee'];
        $number_of_employee_through_contractor=$entity_data['number_of_employee_through_contractor'];
        $number_parttime_employees=$entity_data['number_parttime_employees'];
        $governing_body_member_det= json_decode($entity_data['governing_body_member_det'] ,true);
        $renumeration_of_senior_leadership= json_decode($entity_data['renumeration_of_senior_leadership'] ,true);
        $full_time_staff_numbers= json_decode($entity_data['full_time_staff_numbers'] ,true);
        $part_time_staff_numbers= json_decode($entity_data['part_time_staff_numbers'] ,true);
        $vehicles_details= json_decode($entity_data['vehicles_details'] ,true);
        $foreign_travel_taken_by_staff= json_decode($entity_data['foreign_travel_taken_by_staff'] ,true);
		
	}else{
		$defined_structure_decission_making='';
		$upload_organogram_actual='';
		$upload_organogram='';
		$entity_have_governing_board='';
		$detail_body_member='';
		$number_of_employee='';
		$number_of_employee_through_contractor='';
		$number_parttime_employees='';
		$governing_body_member_det='';
		$renumeration_of_senior_leadership='';
		$full_time_staff_numbers='';
		$part_time_staff_numbers='';
		$vehicles_details='';
		$foreign_travel_taken_by_staff='';
	}
		
	?>
	
	<div class="box-body">
		<?php //var_dump($entity_data) ?>
		<?php //var_dump($foreign_travel_taken_by_staff) ?>
		<div class="form-group row"> 
			<label for="defined_structure_decission_making" class="col-md-3 text-right"> Does the organisation have a clearly defined structure with reporting/decision making flow?</label>
			<div class="col-md-9">
				<span class="is_edit_hide" ><?php echo $defined_structure_decission_making;?></span>
			</div>
		</div>
		<?php if($defined_structure_decission_making == 'Yes') { ?>
			<div class="form-group row">
				<label for="upload_organogram_actual" class="col-md-3 text-right">Uploaded organogram of the organisation</label>
				<div class="col-md-9">
					<a target = '_blank' href="<?php echo base_url();?>uploads/<?php echo $upload_organogram ?>" class="is_edit_hide" ><?php echo $upload_organogram_actual;?></a>
				</div>
			</div>
		<?php } ?>
		<h5>Details of Governing Body</h5>
		<div class="form-group row"> 
			<label for="entity_have_governing_board" class="col-md-3 text-right">Does the entity have a governing board?</label>
			<div class="col-md-9">
				<span class="is_edit_hide" ><?php echo $entity_have_governing_board;?></span>
			</div>
		</div>
		<?php if($entity_have_governing_board == 'Yes') { ?>
		<div class="form-group row"> 
			<label for="detail_body_member" class="col-md-3 text-right">Number of governing body member(s)</label>
			<div class="col-md-9">
				<span class="is_edit_hide" ><?php 
										
						$i=0;
						if($governing_body_member_det){
							foreach($governing_body_member_det as $details){
								$i++;
								
							}
						}
						echo $i;
					?>
				</span>
			</div>
		</div>
		
		<div class="form-group">
			<label >Governing body member details</label>
		</div>
		<div class="form-group">
			<?php 
			$i=0;
			if($governing_body_member_det){
				foreach($governing_body_member_det as $details){
					$i++;
			?>		
			<div class="panel panel-default">
				<div class="row panel-body">
					<div class="row">
						<div class="col-md-12">
							<div class="col-md-12"><?php echo $i ?>) </div>
							<div class="form-group col-md-4">
								<label for="name_of_member">Name of member</label><br>
								<span class="is_edit_hide" ><?php echo $details['name_of_member'] ?></span>
							</div> 
							<div class="form-group col-md-2">
								<label for="member_age">Age</label><br>
								<span class="is_edit_hide" ><?php echo $details['member_age'] ?></span>
							</div> 
							
							<div class="form-group col-md-2">
								<label for="member_gender">Gender</label><br>
								<span class="is_edit_hide" ><?php echo $details['member_gender'] ?></span>
							</div>
							<div class="form-group col-md-4">
								<label for="member_designation">Designation within the governing body</label><br>
								<span class="is_edit_hide" ><?php echo $details['member_designation'] ?></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group col-md-4">
								<label for="member_join_at">Since when is this person part of the governing body</label><br>
								<span class="is_edit_hide" ><?php if($details['member_join_at'] != null){ echo date_formats($details['member_join_at']);} ?></span>
							</div>
							<div class="form-group col-md-4">
								<label for="member_related_to_other">Is the member related to any other governing body member by blood</label><br>
								<span class="is_edit_hide" ><?php echo $details['member_related_to_other'] ?></span>
							</div>
							<div class="form-group col-md-4">
								<label for="member_occupation">Profession / Occupation of the member</label><br>
								<span class="is_edit_hide" ><?php echo $details['member_occupation'] ?></span>
							</div>
						</div>
					</div>
				</div>
			</div>
				<?php
			}
		}
		?>				
		</div>
		<?php } ?>
		<h5>Staff Details</h5>
		<div class="form-group row"> 
			<label for="number_of_employee" class="col-md-3 text-right">Number of direct employees</label>
			<div class="col-md-9">
				<span class="is_edit_hide" ><?php echo $number_of_employee;?></span>
			</div>
		</div>
		<div class="form-group row"> 
			<label for="number_of_employee_through_contractor" class="col-md-3 text-right">Number of employees through contractor / manpower service provider </label>
			<div class="col-md-9">
				<span class="is_edit_hide" ><?php echo $number_of_employee_through_contractor;?></span>
			</div>
		</div>
		<div class="form-group row"> 
			<label for="number_parttime_employees" class="col-md-3 text-right">Number of part-time employees</label>
			<div class="col-md-9">
				<span class="is_edit_hide" ><?php echo $number_parttime_employees;?></span>
			</div>
		</div>
		<h5>Institutional Costs Details</h5>
		<div class="form-group">
			<label for=" ">Renumeration of Senior Leadership</label>
		</div>
		<div class="form-group">
		<div style="overflow-x:auto;">
			<table class="table table-bordered">
				<thead>
					<tr>
					  <th scope="col" class="text-center">Title</th>
					  <th scope="col" class="text-center" style="width:15%;">Name</th>
					  <th scope="col" class="text-center" style="width:10%;">Annual CTC<br/>(in INR lakhs)</th>
					  <th scope="col" class="text-center">Degree(s)/<br/>Qualification(s)</th>
					  <th scope="col" class="text-center">Gender M/F</th>
					  <th scope="col" class="text-center" style="width:10%;">Age</th>
					  <th scope="col" class="text-center">Total experience<br/>(years)</th>
					  <th scope="col" class="text-center">Work experience <br/>within the <br/>organisation(years)</th>
					  <th scope="col" class="text-center">Work experience in<br/> social/development <br/>sector(years)</th>
					  <th scope="col" class="text-center">Signing authority(yes/No)</th>
					</tr>
				</thead>
				<tbody class="renumaration_of_senior_leadership">
					<tr>
					  <td>Head of Organisation</td>
					  <td><span ><?php echo $renumeration_of_senior_leadership[0]['input1']; ?></span></td>
					  <td><span ><?php echo $renumeration_of_senior_leadership[0]['input2']; ?></span></td>
					  <td><span ><?php echo $renumeration_of_senior_leadership[0]['input3']; ?></span></td>
					  <td><span ><?php echo $renumeration_of_senior_leadership[0]['input4']; ?></span></td>
					  <td><span ><?php echo $renumeration_of_senior_leadership[0]['input5']; ?></span></td>
					  <td><span ><?php echo $renumeration_of_senior_leadership[0]['input6']; ?></span></td>
					  <td><span ><?php echo $renumeration_of_senior_leadership[0]['input7']; ?></span></td>
					  <td><span ><?php echo $renumeration_of_senior_leadership[0]['input8']; ?></span></td>
					  <td><span ><?php echo $renumeration_of_senior_leadership[0]['input9']; ?></span></td>
					</tr>
					<tr>
					  <td>Chief of Operations</td>
					  <td><span ><?php echo $renumeration_of_senior_leadership[1]['input1']; ?></span></td>
					  <td><span ><?php echo $renumeration_of_senior_leadership[1]['input2']; ?></span></td>
					  <td><span ><?php echo $renumeration_of_senior_leadership[1]['input3']; ?></span></td>
					  <td><span ><?php echo $renumeration_of_senior_leadership[1]['input4']; ?></span></td>
					  <td><span ><?php echo $renumeration_of_senior_leadership[1]['input5']; ?></span></td>
					  <td><span ><?php echo $renumeration_of_senior_leadership[1]['input6']; ?></span></td>
					  <td><span ><?php echo $renumeration_of_senior_leadership[1]['input7']; ?></span></td>
					  <td><span ><?php echo $renumeration_of_senior_leadership[1]['input8']; ?></span></td>
					  <td><span ><?php echo $renumeration_of_senior_leadership[1]['input9']; ?></span></td>
					</tr>
					<tr>
					  <td>Chief of Finance/<br/>Accounts</td>
					  <td><span ><?php echo $renumeration_of_senior_leadership[2]['input1']; ?></span></td>
					  <td><span ><?php echo $renumeration_of_senior_leadership[2]['input2']; ?></span></td>
					  <td><span ><?php echo $renumeration_of_senior_leadership[2]['input3']; ?></span></td>
					  <td><span ><?php echo $renumeration_of_senior_leadership[2]['input4']; ?></span></td>
					  <td><span ><?php echo $renumeration_of_senior_leadership[2]['input5']; ?></span></td>
					  <td><span ><?php echo $renumeration_of_senior_leadership[2]['input6']; ?></span></td>
					  <td><span ><?php echo $renumeration_of_senior_leadership[2]['input7']; ?></span></td>
					  <td><span ><?php echo $renumeration_of_senior_leadership[2]['input8']; ?></span></td>
					  <td><span ><?php echo $renumeration_of_senior_leadership[2]['input9']; ?></span></td>
					</tr>
				</tbody>
			</table>
			</div>
		</div>
		<div class="form-group">
			<label for=" ">Full-time staff: numbers and breakup</label>
		</div>
		<div class="form-group">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th scope="row" class="text-center" style="text-align: left;">Annual CTC</th>
						<th scope="row" class="text-center">Male</th>
						<th scope="row" class="text-center">Female</th>
					</tr>
				</thead>
				<tbody class="full_time_staff">
					<tr>
					  <td>Upto INR 2 Lakhs</td>
					  <td class="text_center" ><span ><?php echo $full_time_staff_numbers[0]['input1']; ?></span></td>
					  <td class="text_center" ><span ><?php echo $full_time_staff_numbers[0]['input2']; ?></span></td>
					</tr>
					<tr>
					  <td>INR 2.01-4 Lakhs</td>
					  <td class="text_center" ><span ><?php echo $full_time_staff_numbers[1]['input1']; ?></span></td>
					  <td class="text_center" ><span ><?php echo $full_time_staff_numbers[1]['input2']; ?></span></td>
					</tr>
					<tr>
					  <td>INR 4.01-8 Lakhs</td>
					  <td class="text_center" ><span ><?php echo $full_time_staff_numbers[2]['input1']; ?></span></td>
					  <td class="text_center" ><span ><?php echo $full_time_staff_numbers[2]['input2']; ?></span></td>
					</tr>
					<tr>
					  <td>INR 8.01-13 Lakhs</td>
					  <td class="text_center" ><span ><?php echo $full_time_staff_numbers[3]['input1']; ?></span></td>
					  <td class="text_center" ><span ><?php echo $full_time_staff_numbers[3]['input2']; ?></span></td>
					</tr>
					<tr>
					  <td>INR 13.01-18 Lakhs</td>
					  <td class="text_center" ><span ><?php echo $full_time_staff_numbers[4]['input1']; ?></span></td>
					  <td class="text_center" ><span ><?php echo $full_time_staff_numbers[4]['input2']; ?></span></td>
					</tr>
					<tr>
					  <td>INR 18.01-30 Lakhs</td>
					  <td class="text_center" ><span ><?php echo $full_time_staff_numbers[5]['input1']; ?></span></td>
					  <td class="text_center" ><span ><?php echo $full_time_staff_numbers[5]['input2']; ?></span></td>
					</tr>
					<tr>
					  <td>INR 30.01-60 Lakhs</td>
					  <td class="text_center" ><span ><?php echo $full_time_staff_numbers[6]['input1']; ?></span></td>
					  <td class="text_center" ><span ><?php echo $full_time_staff_numbers[6]['input2']; ?></span></td>
					</tr>
					<tr>
					  <td>Greater than INR 60Lakhs</td>
					  <td class="text_center" ><span ><?php echo $full_time_staff_numbers[7]['input1']; ?></span></td>
					  <td class="text_center" ><span ><?php echo $full_time_staff_numbers[7]['input2']; ?></span></td>
					</tr>
					<!--<tr>
					  <td>INR 13.01-18 Lakhs</td>
					  <td class="text_center" ><span ><?php echo $full_time_staff_numbers[8]['input1']; ?></span></td>
					  <td class="text_center" ><span ><?php echo $full_time_staff_numbers[8]['input2']; ?></span></td>
					</tr>-->
				
				</tbody>
			</table>
		</div>
		<div class="form-group">
			<label for=" ">Part-time staff: numbers and breakup</label>
		</div> 
		<div class="form-group">
			<table class="table table-bordered ">
				<thead class="thead-light">
					<tr>
					  <th scope="row" class="text-center" style="text-align: left;">Monthly salary</th>
					  <th scope="row" class="text-center">Male</th>
					  <th scope="row" class="text-center">Female</th>
					</tr>
				</thead>
				<tbody class="part_time_staff">
					<tr>
					  <td>Upto INR 2,500</td>
					  <td class="text_center"><span ><?php echo $part_time_staff_numbers[0]['input1']; ?></span></td>
					  <td class="text_center"><span ><?php echo $part_time_staff_numbers[0]['input2']; ?></span></td>
					</tr>
					<tr>
					  <td>INR 2,501-5000</td>
					  <td class="text_center"><span ><?php echo $part_time_staff_numbers[1]['input1']; ?></span></td>
					  <td class="text_center"><span ><?php echo $part_time_staff_numbers[1]['input2']; ?></span></td>
					</tr>
					<tr>
					  <td>Greater than INR 5,001</td>
					  <td class="text_center"><span ><?php echo $part_time_staff_numbers[2]['input1']; ?></span></td>
					  <td class="text_center"><span ><?php echo $part_time_staff_numbers[2]['input2']; ?></span></td>
					</tr>
				</tbody>
			</table>
		</div> 
		<div class="form-group">
			<label for=" ">Details of vehicles and other assets owned by the entity</label>
		</div>

		<div class="form-group">
			<table class="table table-bordered ">
				<thead class="thead-light">
					<tr>
					  <th scope="row" class="text-center">Name of Asset</th>
					  <th scope="row" class="text-center">Location</th>
					  <th scope="row" class="text-center">Value</th>
					</tr>
				</thead>
				<tbody class="part_time_staff">
					 <?php 
					$i=0;
					if($vehicles_details){
						foreach($vehicles_details as $details){
							$i++;
					?>	
					<tr>
					  <td class="text_center"><span ><?php echo $details['name_of_asset']; ?></span></td>
					  <td class="text_center"><span ><?php echo $details['location']; ?></span></td>
					  <td class="text_center"><span ><?php echo $details['value']; ?></span></td>
					</tr>
					<?php }}?>
				</tbody>
			</table>
		</div> 

		<div class="form-group">
			<label >Details of any foreign travel taken by staff at institutional expense</label>
		</div> 
		<div class="form-group">
			<table class="table table-bordered ">
				<thead class="thead-light">
					<tr>
					  <th scope="row" class="text-center">Title of Traveler</th>
					  <th scope="row" class="text-center">Location and purpose</th>
					  <th scope="row" class="text-center">Cost Incurred</th>
					</tr>
				</thead>
				<tbody class="part_time_staff">
					<?php 
					$i=0;
					if($foreign_travel_taken_by_staff){
						foreach($foreign_travel_taken_by_staff as $details){
							$i++;
					?>
					<tr>
					  <td class="text_center"><span ><?php echo $details['title_of_traveller']; ?></span></td>
					  <td class="text_center"><span ><?php echo $details['location_and_purpose']; ?></span></td>
					  <td class="text_center"><span ><?php echo $details['cost_incurred']; ?></span></td>
					</tr>
					<?php }}?>
				</tbody>
			</table>
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