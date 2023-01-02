<style>
.marBot20{
	margin-bottom:20px;
}
.checkbox{margin-left: 15px;}


</style>
<!-- Content Wrapper. Contains page content -->


	
	<?php
	
		$current_year=date('Y');
		$current_date=date('Y-m-d');
		$april_date =$current_year.'-04-01';
		
		if($current_date >$april_date){
			$current_year = $current_year-1;
			$april_date=$current_year.'-04-01';
		}else{
			$current_year = $current_year-2;
			$april_date=$current_year.'-04-01';
		}
		$sql5="SELECT * FROM `financial_years` WHERE start_date <= '$april_date'  ORDER BY financial_id DESC LIMIT 3" ;
		$financial_years = $this->db->query($sql5)->result_array(); 
		$financial_years1=$financial_years[2]['name'];
		$financial_years2=$financial_years[1]['name'];
		$financial_years3=$financial_years[0]['name'];
		
	if($entity_data){
		$budget_details= json_decode($entity_data['budget_details'] ,true);
        $major_donors= json_decode($entity_data['major_donors'] ,true);
        $upload_financial_statement1_actual= $entity_data['upload_financial_statement1_actual'];
        $upload_financial_statement2_actual= $entity_data['upload_financial_statement2_actual'];
        $upload_financial_statement3_actual= $entity_data['upload_financial_statement3_actual'];
        $uplpad_ITR_1_actual= $entity_data['uplpad_ITR_1_actual'];
        $uplpad_ITR_2_actual= $entity_data['uplpad_ITR_2_actual'];
        $uplpad_ITR_3_actual= $entity_data['uplpad_ITR_3_actual'];
        $uplpad_ITR_1= $entity_data['uplpad_ITR_1'];
        $uplpad_ITR_2= $entity_data['uplpad_ITR_2'];
        $uplpad_ITR_3= $entity_data['uplpad_ITR_3'];
        $upload_financial_statement1= $entity_data['upload_financial_statement1'];
        $upload_financial_statement2= $entity_data['upload_financial_statement2'];
        $upload_financial_statement3= $entity_data['upload_financial_statement3'];
        $entity_have_gst_num= $entity_data['entity_have_gst_num'];
        $gst_exemption_letter_actual= $entity_data['gst_exemption_letter_actual'];
        $gst_certificate_actual= $entity_data['gst_certificate_actual'];
        $gst_number= $entity_data['gst_number'];
        $upload_cancelled_cheque_actual= $entity_data['upload_cancelled_cheque_actual'];
        $name_of_organization= $entity_data['name_of_organization'];
        $upload_cancelled_cheque= $entity_data['upload_cancelled_cheque'];
        $gst_exemption_letter= $entity_data['gst_exemption_letter'];
        $gst_certificate= $entity_data['gst_certificate'];
		$page5_financial_years= json_decode($entity_data['page5_financial_years'] ,true);
		$uploaded_xl_file= $entity_data['xl_file'];
		$uploaded_xl_file_actual= $entity_data['xl_file_actual'];
		
		if($page5_financial_years){
				$financial_years1=$page5_financial_years[0]['financial_years1'];
				$financial_years2=$page5_financial_years[0]['financial_years2'];
				$financial_years3=$page5_financial_years[0]['financial_years3'];
			//var_dump($page5_financial_years);
		}
		
		
	}else{ 
		$uploaded_xl_file='';
		$uploaded_xl_file_actual='';
	
		$financial_years1='';
		$financial_years2='';
		$financial_years3='';
			
		$upload_financial_statement1_actual='';
		$upload_financial_statement2_actual='';
		$upload_financial_statement3_actual='';
		$upload_financial_statement1='';
		$upload_financial_statement2='';
		$upload_financial_statement3='';
		$uplpad_ITR_1='';
		$uplpad_ITR_2='';
		$uplpad_ITR_3='';
		$uplpad_ITR_1_actual='';
		$uplpad_ITR_2_actual='';
		$uplpad_ITR_3_actual='';
		$budget_details='';
		$major_donors='';
		$entity_have_gst_num='';
		$gst_exemption_letter_actual='';
		$gst_certificate_actual='';
		$gst_number='';
		$upload_cancelled_cheque_actual='';
		$gst_exemption_letter='';
		$name_of_organization='';
		$upload_cancelled_cheque='';
		$gst_certificate='';
	}
		
	?>
	
	<div class="box-body">
		<?php //var_dump($entity_data) ?>
		<div class="form-group">
			<label for=" ">Please add budget details for the organisation</label>
		</div>
		<div class="form-group">
			<table class="table table-bordered">
				<thead class="thead-light">
					<tr>
						<th scope="col">Date for last 3 years of mandatory</th>
						<th scope="col">Immediately preceding financial year.<br/>provide 
						provisional/unaudited number if last year's number is not finalized yet.(<?php echo $financial_years3;?>)</th>
						<th scope="col">second preceding financial year (<?php echo $financial_years2;?>)</th>
						<th scope="col">Third preceding financial year (<?php echo $financial_years1;?>)</th>
						<th scope="col">Additional Year(s)(Optional)</th>
					</tr>
				</thead>
				<tbody class="budget_details_class">
					<tr>
						<td>Organisational income(in INR lakhs)</td>
						<td><span ><?php if($budget_details[0]['input1']){ echo number_format($budget_details[0]['input1'], 2, ',', ',').',000';}?></span></td>
						<td><span ><?php if($budget_details[0]['input2']){ echo number_format($budget_details[0]['input2'], 2, ',', ',').',000';}?></span></td>
						<td><span ><?php if($budget_details[0]['input3']){ echo number_format($budget_details[0]['input3'], 2, ',', ',').',000';}?></span></td>
						<td><span ><?php echo $budget_details[0]['input4']; ?></span></td>
					</tr>
					<tr>
						<td>Organisational expenditure(in INR lakhs)</td>
						<td><span ><?php if($budget_details[1]['input1']){ echo number_format($budget_details[1]['input1'], 2, ',', ',').',000';}?></span></td>
						<td><span ><?php if($budget_details[1]['input2']){ echo number_format($budget_details[1]['input2'], 2, ',', ',').',000';}?></span></td>
						<td><span ><?php if($budget_details[1]['input3']){ echo number_format($budget_details[1]['input3'], 2, ',', ',').',000';}?></span></td>
						<td><span ><?php echo $budget_details[1]['input4']; ?></span></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="form-group">
			<label for=" ">Please share details for your major donors in the last 3 years</label>
		</div> 
		
		<table class="table table-bordered">
			<thead class="thead-light">
				<tr>
					<th scope="col">Name</th>
					<th scope="col">Project Title</th>
					<th scope="col">Project period from</th>
					<th scope="col">Project period To</th>
					<th scope="col">Amount(in INR lakhs)</th>
				</tr>
			</thead>
			<tbody class="budget_details_class">
				<?php 
					$i=0;
					if($major_donors){
						foreach($major_donors as $details){
							$i++;
				?>
					<tr>
						<td><?php echo $details['name_of_donor']; ?></td>
						<td><?php echo $details['title_of_project']; ?></td>
						<td><?php if($details['project_period_from'] != null){ echo date_formats($details['project_period_from']); }?></td>
						<td><?php if($details['project_period_to'] != null){ echo date_formats($details['project_period_to']); }?></td>
						<td><?php echo $details['project_amount']; ?></td>
					</tr>
				<?php }}?>
			</tbody>
		</table>




		<h5>Financial Statements & Income Tax Returns</h5>
		<table class="table table-bordered">
			<thead class="thead-light">
				<tr>
					<th scope="col"></th>
					<th scope="col"><?php echo $financial_years1; ?></th>
					<th scope="col"><?php echo $financial_years2; ?></th>
					<th scope="col"><?php echo $financial_years3; ?></th>
				</tr>
			</thead>
			<tbody class="budget_details_class">
				<tr>
					<td>Upload audited financial statements</td>
					<td><a target = '_blank' href="<?php echo base_url();?>uploads/<?php echo $upload_financial_statement1 ?>" ><?php echo $upload_financial_statement1_actual; ?></a></td>
					<td><a target = '_blank' href="<?php echo base_url();?>uploads/<?php echo $upload_financial_statement2 ?>" ><?php echo $upload_financial_statement2_actual; ?></a></td>
					<td><a target = '_blank' href="<?php echo base_url();?>uploads/<?php echo $upload_financial_statement3 ?>" ><?php echo $upload_financial_statement3_actual; ?></a></td>
				</tr>
				<tr>
					<td>Upload ITR Documents</td>
					<td><a target = '_blank' href="<?php echo base_url();?>uploads/<?php echo $uplpad_ITR_1 ?>" ><?php echo $uplpad_ITR_1_actual; ?></a></td>
					<td><a target = '_blank' href="<?php echo base_url();?>uploads/<?php echo $uplpad_ITR_2 ?>" ><?php echo $uplpad_ITR_2_actual; ?></a></td>
					<td><a target = '_blank' href="<?php echo base_url();?>uploads/<?php echo $uplpad_ITR_3 ?>" ><?php echo $uplpad_ITR_3_actual; ?></a></td>
				</tr>
			</tbody>
		</table>
		<h5>Bank Details</h5>
		
		<div class="form-group row"> 
			<label for="entity_have_gst_num" class="col-md-3 text-right">Download the provided bank template. Upload once filled.</label>
			<div class="col-md-9">
				<a href="<?php echo base_url();?>uploads/<?php echo $uploaded_xl_file ?>" class="is_edit_hide" ><?php echo $uploaded_xl_file_actual;?></a>
			</div>
		</div>
		
		<div class="form-group row"> 
			<label for="entity_have_gst_num" class="col-md-3 text-right">Does the entity have a GST number?</label>
			<div class="col-md-9">
				<span class="is_edit_hide" ><?php echo $entity_have_gst_num;?></span>
			</div>
		</div>
		<?php if($entity_have_gst_num == 'Yes') { ?>
			<div class="form-group row">
				<label for="gst_number" class="col-md-3 text-right"> GST number</label>
				<div class="col-md-9">
					<span class="is_edit_hide" ><?php echo $gst_number;?></span>
				</div>
			</div>
			<div class="form-group row">
				<label for="gst_certificate_actual" class="col-md-3 text-right"> GST certificate</label>
				<div class="col-md-9">
					<a target = '_blank' href="<?php echo base_url();?>uploads/<?php echo $gst_certificate?>" class="is_edit_hide" ><?php echo $gst_certificate_actual;?></a>
				</div>
			</div>
		<?php }else{ ?>
			<div class="form-group row">
				<label for="gst_exemption_letter_actual" class="col-md-3 text-right">GST exemption letter</label>
				<div class="col-md-9">
					<a target = '_blank' href="<?php echo base_url();?>uploads/<?php echo $gst_exemption_letter ?>" class="is_edit_hide" ><?php echo $gst_exemption_letter_actual;?></a>
				</div>
			</div>
		<?php } ?>
		<div class="form-group row">
			<label for="upload_cancelled_cheque_actual" class="col-md-3 text-right">Attach scan/photo of pre-printed cancelled cheque</label>
			<div class="col-md-9">
				<a target = '_blank' href="<?php echo base_url();?>uploads/<?php echo $upload_cancelled_cheque ?>" class="is_edit_hide" ><?php echo $upload_cancelled_cheque_actual;?></a>
			</div>
		</div>
		<div class="form-group row">
			<label for="name_of_organization" class="col-md-3 text-right">Name of the organization</label>
			<div class="col-md-9">
				<span class="is_edit_hide" ><?php echo $name_of_organization;?></span>
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