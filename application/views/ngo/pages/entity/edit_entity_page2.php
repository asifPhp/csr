<style>
.marBot20{
	margin-bottom:20px;
}
.checkbox{margin-left: 15px;}


</style>
<!-- Content Wrapper. Contains page content -->


	
	<?php
	$page_heading = '';
    $heading = '';
	//var_dump($entity_data);
	if($entity_data ){
        $registration_number_12a=$entity_data['registration_number_12a'];
		$from_date_12a_valid=$entity_data['from_date_12a_valid'];
		$expire_date_12a_valid=$entity_data['expire_date_12a_valid'];
		$tax_exemption_percentage=$entity_data['tax_exemption_percentage'];
		$registration_number_80g=$entity_data['registration_number_80g'];
		$certificate_date_80G=$entity_data['certificate_date_80G'];
		$registration_80g_valid=$entity_data['registration_80g_valid'];
		$upload_80G_reg=$entity_data['upload_80G_reg'];
		$upload_proof_80G_incometax=$entity_data['upload_proof_80G_incometax'];
		$tax_exemption_type=$entity_data['tax_exemption_type'];
		$pan_number=$entity_data['pan_number'];
		$tan_number=$entity_data['tan_number'];
		$epf_number=$entity_data['epf_number'];
		$registration_detail=json_decode($entity_data['registration_detail'] ,true);
		$other_appropriate_certification_input=$entity_data['other_appropriate_certification_input'];
		$is_12a_certificate=$entity_data['is_12a_certificate'];
		$is_certificate_exist=$entity_data['is_certificate_exist'];
		$appropriate_certification= json_decode($entity_data['appropriate_certification'], true);
		$is_12a_certificate_cancle=$entity_data['is_12a_certificate_cancle'];
		$upload_proof_12A_reg=$entity_data['upload_proof_12A_reg'];
		$is_tax_exemption_80g=$entity_data['is_tax_exemption_80g'];
		$is_perpetuity_valid=$entity_data['is_perpetuity_valid'];
		$is_valid_tax_exemption=$entity_data['is_valid_tax_exemption'];
		$upload_proof_tax_exemption=$entity_data['upload_proof_tax_exemption'];
		$soft_copy_pancard=$entity_data['soft_copy_pancard'];
		$proof_of_TAN=$entity_data['proof_of_TAN'];
		$epf_for_last_year=$entity_data['epf_for_last_year'];
		$credibility_alliance_report_actual=$entity_data['credibility_alliance_report_actual'];
		$credibility_alliance_report=$entity_data['credibility_alliance_report'];
		$soft_copy_pancard_actual=$entity_data['soft_copy_pancard_actual'];
		$epf_for_last_year_actual=$entity_data['epf_for_last_year_actual'];
		$proof_of_TAN_actual=$entity_data['proof_of_TAN_actual'];
		$tax_for_last_year_actual=$entity_data['tax_for_last_year_actual'];
		$upload_proof_12A_reg_actual=$entity_data['upload_proof_12A_reg_actual'];
		$upload_proof_80G_incometax_actual=$entity_data['upload_proof_80G_incometax_actual'];
		$upload_80G_reg_actual=$entity_data['upload_80G_reg_actual'];
		$upload_proof_tax_exemption_actual=$entity_data['upload_proof_tax_exemption_actual'];
		
		$csr1_registration_number_radio=$entity_data['csr1_registration_number_radio'];
		$csr1_registration_number=$entity_data['csr1_registration_number'];
		$upload_proof_csr1_actual=$entity_data['upload_proof_csr1_actual'];
		$upload_proof_csr1_value=$entity_data['upload_proof_csr1_value'];
	}else{
		$csr1_registration_number_radio='';
		$csr1_registration_number='';
		$upload_proof_csr1_actual='';
		$upload_proof_csr1_value='';
	
		$registration_number_12a='';
		$from_date_12a_valid='';
		$expire_date_12a_valid='';
		$tax_exemption_percentage='';
		$registration_number_80g='';
		$certificate_date_80G='';
		$registration_80g_valid='';
		$upload_80G_reg='';
		$registration_detail='';
		$upload_proof_80G_incometax='';
		$tax_exemption_type='';
		$pan_number='';
		$tan_number='';
		$epf_number='';
		$other_appropriate_certification_input='';
		$is_12a_certificate='';
		$is_certificate_exist='';
		$appropriate_certification='';
		$is_12a_certificate_cancle='';
		$upload_proof_12A_reg='';
		$is_tax_exemption_80g='';
		$is_perpetuity_valid='';
		$is_valid_tax_exemption='';
		$upload_proof_tax_exemption='';
		$soft_copy_pancard='';
		$proof_of_TAN='';
		$epf_for_last_year='';
		$credibility_alliance_report_actual='';
		$soft_copy_pancard_actual='';
		$epf_for_last_year_actual='';
		$proof_of_TAN_actual='';
		$tax_for_last_year_actual='';
		$upload_proof_12A_reg_actual='';
		$upload_proof_80G_incometax_actual='';
		$upload_80G_reg_actual='';
		$upload_proof_tax_exemption_actual='';
		
	}
		
	?>
	<div class="box-body">
		<h5>Registration Details &nbsp;</h5>
		<?php 
		//var_dump($registration_detail);
			$i=0;
			$expary_year='';
			$all_date=array();
			$expary_size='';
		if($registration_detail){
			
				foreach($registration_detail as $details){
					$i++;
					//var_dump($details);
		?>
				<div class="form-group row">
					<label for="registration_type" class="col-md-3 text-right"><span style="float: left;"><?php echo $i ?>)</span>Registration Type</label>
					<div class="col-md-9">
						<span class="is_edit_hide" ><?php echo $details['registration_type'] ?></span>
					</div>
				</div>
				<div class="form-group row">
					<label for="registration_date" class="col-md-3 text-right">Date of Registration</label>
					<div class="col-md-9"> 
						<span class="registration_date" ><?php  if($details['registration_date'] != null){ echo date_formats($details['registration_date']); }?></span>
					</div>
				</div>
				<div class="form-group row">
					<label for="registration_date" class="col-md-3 text-right">Street address</label>
					<div class="col-md-9"> 
						<span class="registration_street_address" ><?php echo $details['registration_street_address'] ?></span>
					</div>
				</div>
				<div class="form-group row">
					<label for="registration_state" class="col-md-3 text-right">State</label>
					<div class="col-md-9">
						<span class="is_edit_hide" ><?php echo $details['registration_state'] ?></span>
					</div>
				</div>
				<div class="form-group row">
					<label for="registration_city" class="col-md-3 text-right">City</label>
					<div class="col-md-9"> 
						<span class="registration_city" ><?php echo $details['registration_city'] ?></span>
					</div>
				</div>
				<div class="form-group row">
					<label for="registration_pin_code" class="col-md-3 text-right">Pin code</label>
					<div class="col-md-9"> 
						<span class="registration_pin_code" ><?php echo $details['registration_pin_code'] ?></span>
					</div>
				</div>
				<div class="form-group row">
					<label for="Registration_Number" class="col-md-3 text-right">Registration Number</label>
					<div class="col-md-9"> 
						<span class="Registration_Number" ><?php echo $details['Registration_Number'] ?></span>
					</div>
				</div>
				<div class="form-group row">
					<label for="registration_certificate" class="col-md-3 text-right">Registration Certificate</label>
					<div class="col-md-9">
						<a target = '_blank' href="<?php echo base_url();?>uploads/<?php echo $details['registration_certificate'] ?>" class="upload_registration_certificate" ><?php echo $details['registration_certificate_actual'] ?></a>
					</div>
				</div>
	<?php	
		//var_dump($details['registration_date']);
		 $smallest = strtotime($details['registration_date']);
		// var_dump($smallest);
		if($smallest!=''){
			array_push($all_date,$smallest);
		}
		
	}
	
	
			
	
		//var_dump($all_date);
		//
		
		//var_dump($all_date);
		if($all_date){
			$all_date=min($all_date);
			//var_dump($all_date);
			//$all_date_length=sizeof($all_date);
			//if($all_date_length>0){
				//$data_test=$all_date[0];
			//}
			//var_dump($data_test);
			$today=date('Y-m-d');
			$today_date=strtotime($today);
			$seconds_diff = $today_date - $all_date;
		    
			//var_dump($today);
			
			$current_year=($seconds_diff/31536000);
			//var_dump($current_year);
			
			$expary_year=(Int)$current_year;
			$expary_size =strlen($expary_year);
			//var_dump($expary_year);
		}
	}
		
		?>	
		
		<div class="form-group row">
			<label for="is_12a_certificate" class="col-md-3 text-right">Organisation years of experience</label>
			<div class="col-md-9">
				<span class="is_edit_hide" ><?php if($expary_size!=0){echo $expary_year.' yrs.' ;} ?> </span>
			</div>
		</div>
		
		<h5>CSR-1 Registration</h5>				
		<div class="form-group row">
			<label for="is_12a_certificate" class="col-md-3 text-right">Does the entity have a CSR-1 Registration Number?</label>
			<div class="col-md-9">
				<span class="is_edit_hide" ><?php echo $csr1_registration_number_radio;?></span>
			</div>
		</div>
		<?php if($csr1_registration_number_radio == 'Yes') { ?>
		<div class="form-group row">
			<label for="csr1_registration_number" class="col-md-3 text-right">CSR-1 registration number</label>
			<div class="col-md-9"> 
				<span class="csr1_registration_number" ><?php echo $csr1_registration_number;?></span>
			</div>
		</div>
		
		<div class="form-group row">
			<label for="upload_proof_12A_reg" class="col-md-3 text-right">Proof of CSR-1 registration</label>
			<div class="col-md-9"> 
				<a target = '_blank' href="<?php echo base_url();?>uploads/<?php echo $upload_proof_csr1_value ?>" class="upload_proof_12A_reg" ><?php echo $upload_proof_csr1_actual;?></a>
			</div>
		</div>
		<?php } ?>
		
		
		<h5>12A Certification</h5>				
		<div class="form-group row">
			<label for="is_12a_certificate" class="col-md-3 text-right">Does the entity have a 12A certificate?</label>
			<div class="col-md-9">
				<span class="is_edit_hide" ><?php echo $is_12a_certificate;?></span>
			</div>
		</div>
		<?php if($is_12a_certificate == 'Yes') { ?>
		<div class="form-group row">
			<label for="registration_number_12a" class="col-md-3 text-right">Registration number 12A</label>
			<div class="col-md-9"> 
				<span class="registration_number_12a" ><?php echo $registration_number_12a;?></span>
			</div>
		</div>
		<div class="form-group row">
			<label for="from_date_12a_valid" class="col-md-3 text-right">From which 12A Certificate is valid</label>
			<div class="col-md-9"> 
				<span class="from_date_12a_valid" ><?php if($from_date_12a_valid != null){echo date_formats($from_date_12a_valid);}?></span>
			</div>
		</div>
		<div class="form-group row">
			<label for="expire_date_12a_valid" class="col-md-3 text-right">Date up to which 12A certificate is valid</label>
			<div class="col-md-9"> 
				<span class="expire_date_12a_valid" ><?php if($expire_date_12a_valid != null){echo date_formats($expire_date_12a_valid);} ?></span>
			</div>
		</div>
		<div class="form-group row">
			<label for="is_12a_certificate_cancle" class="col-md-3 text-right">Has the organisation faced cancellation of 12A certification in the past?</label>
			<div class="col-md-9"> 
				<span class="is_12a_certificate_cancle" ><?php echo $is_12a_certificate_cancle;?></span>
			</div>
		</div>
		<div class="form-group row">
			<label for="upload_proof_12A_reg" class="col-md-3 text-right">Proof of 12A Registration</label>
			<div class="col-md-9"> 
				<a target = '_blank' href="<?php echo base_url();?>uploads/<?php echo $upload_proof_12A_reg ?>" class="upload_proof_12A_reg" ><?php echo $upload_proof_12A_reg_actual;?></a>
			</div>
		</div>
		<?php } ?>
		
		<h5>Tax Exemptions</h5>
		<div class="form-group row">
			<label for="tax_exemption_percentage" class="col-md-3 text-right">Percentage of tax exemption</label>
			<div class="col-md-9"> 
				<span class="tax_exemption_percentage" ><?php if($is_tax_exemption_80g=='Yes'){ echo '50%';}else{ echo 0; }?></span>
			</div>
		</div>
		<div class="form-group row">
			<label for="is_tax_exemption_80g" class="col-md-3 text-right">Does the entity have 80G tax exemption?</label>
			<div class="col-md-9"> 
				<span class="is_tax_exemption_80g" ><?php echo $is_tax_exemption_80g;?></span>
			</div>
		</div>
		<?php if($is_tax_exemption_80g == 'Yes') { ?>
		<div class="form-group row">
			<label for="registration_number_80g" class="col-md-3 text-right">Enter the 80G registration number</label>
			<div class="col-md-9"> 
				<span class="registration_number_80g" ><?php echo $registration_number_80g;?></span>
			</div>
		</div>
		<div class="form-group row">
			<label for="certificate_date_80G" class="col-md-3 text-right">Date from which the 80G certification is valid</label>
			<div class="col-md-9"> 
				<span class="certificate_date_80G" ><?php if($certificate_date_80G != null){echo date_formats($certificate_date_80G);}?></span>
			</div>
		</div>
		<div class="form-group row">
			<label for="is_perpetuity_valid" class="col-md-3 text-right">Is the current 80G certification valid in perpetuity</label>
			<div class="col-md-9"> 
				<span class="is_perpetuity_valid" ><?php echo $is_perpetuity_valid;?></span>
			</div>
		</div>
		<?php if($is_perpetuity_valid == 'No') { ?>
		<div class="form-group row">
			<label for="registration_80g_valid" class="col-md-3 text-right">Date up to which registration is valid</label>
			<div class="col-md-9"> 
				<span class="registration_80g_valid" ><?php echo $registration_80g_valid;?></span>
			</div>
		</div>
		<?php } ?>
		<div class="form-group row">
			<label for="upload_80G_reg" class="col-md-3 text-right">80G registration certificate</label>
			<div class="col-md-9">
				<a target = '_blank' href="<?php echo base_url();?>uploads/<?php echo $upload_80G_reg ?>" class="upload_80G_reg" ><?php echo $upload_80G_reg_actual;?></a>
			</div>
		</div>
		<div class="form-group row">
			<label for="upload_proof_80G_incometax" class="col-md-3 text-right">80G income tax certificate</label>
			<div class="col-md-9">
				<a target = '_blank' href="<?php echo base_url();?>uploads/<?php echo $upload_proof_80G_incometax ?>" class="upload_proof_80G_incometax" ><?php echo $upload_proof_80G_incometax_actual;?></a>
			</div>
		</div>
		<?php } ?>
		<div class="form-group row">
			<label for="is_valid_tax_exemption" class="col-md-3 text-right">Do you have any other valid tax exemption</label>
			<div class="col-md-9"> 
				<span class="is_valid_tax_exemption" ><?php echo $is_valid_tax_exemption;?></span>
			</div>
		</div>			
		<?php if($is_valid_tax_exemption == 'Yes') { ?>				
			<div class="form-group row">
				<label for="tax_exemption_type" class="col-md-3 text-right">Type of tax exemptions</label>
				<div class="col-md-9"> 
					<span class="tax_exemption_type" ><?php echo $tax_exemption_type;?></span>
				</div>
			</div>								
			<div class="form-group row">
				<label for="upload_proof_tax_exemption" class="col-md-3 text-right">Proof of other tax exemptions</label>
				<div class="col-md-9"> 
					<a target = '_blank' href="<?php echo base_url();?>uploads/<?php echo $upload_proof_tax_exemption ?>" class="upload_proof_tax_exemption" ><?php echo $upload_proof_tax_exemption_actual;?></a>
				</div>
			</div>								
		<?php } ?>					
		<h5>Other Details</h5>				
		<div class="form-group row">
			<label for="pan_number" class="col-md-3 text-right">PAN number of the entity</label>
			<div class="col-md-9"> 
				<span class="pan_number" ><?php echo $pan_number;?></span>
			</div>
		</div>
		<div class="form-group row">
			<label for="soft_copy_pancard" class="col-md-3 text-right">Photo/soft copy of PAN card</label>
			<div class="col-md-9"> 
				<a target = '_blank' href="<?php echo base_url();?>uploads/<?php echo $soft_copy_pancard ?>" class="soft_copy_pancard" ><?php echo $soft_copy_pancard_actual;?></a>
			</div>
		</div>
		<div class="form-group row">
			<label for="tan_number" class="col-md-3 text-right">TAN number of the entity</label>
			<div class="col-md-9"> 
				<span class="tan_number" ><?php echo $tan_number;?></span>
			</div>
		</div>
		<div class="form-group row">
			<label for="proof_of_TAN" class="col-md-3 text-right">Proof of TAN</label>
			<div class="col-md-9"> 
				<a target = '_blank' href="<?php echo base_url();?>uploads/<?php echo $proof_of_TAN ?>" class="proof_of_TAN" ><?php echo $proof_of_TAN_actual;?></a>
			</div>
		</div>
		<div class="form-group row">
			<label for="epf_number" class="col-md-3 text-right">EPF number</label>
			<div class="col-md-9"> 
				<span class="epf_number" ><?php echo $epf_number;?></span>
			</div>
		</div>
		<div class="form-group row">
			<label for="epf_for_last_year" class="col-md-3 text-right">Professional Tax filing for the last financial year</label>
			<div class="col-md-9"> 
				<a target = '_blank' href="<?php echo base_url();?>uploads/<?php echo $epf_for_last_year ?>" class="epf_for_last_year" ><?php echo $epf_for_last_year_actual;?></a>
			</div>
		</div>
		<h5>Certifications</h5>
		<div class="form-group row">
			<label for="is_certificate_exist" class="col-md-3 text-right">Any existing empanellment certifications/ratings received?</label>
			<div class="col-md-9"> 
				<span class="is_certificate_exist" ><?php echo $is_certificate_exist;?></span>
			</div>
		</div>
		<?php if($is_certificate_exist == 'Yes') { ?>						
			<div class="form-group row">
				<label for="appropriate_certification" class="col-md-3 text-right"> Appropriate certification(s)</label>
				<div class="col-md-9"> 
				<?php if($appropriate_certification){
				foreach($appropriate_certification as $details){ ?>
					<span class="appropriate_certification" ><?php echo $details;?></span><br>
				<?php }
				} ?>
				</div>
			</div>
			<?php if ($appropriate_certification ){ if(in_array("Credibility Alliance", $appropriate_certification) == true) { ?>
			<div class="form-group row">
				<label for="credibility_alliance_report" class="col-md-3 text-right">If you are empanelled with Credibility Alliance, please attach the detailed report</label>
				<div class="col-md-9"> 
					<a target = '_blank' href="<?php echo base_url();?>uploads/<?php echo $credibility_alliance_report ?>" class="credibility_alliance_report" ><?php echo $credibility_alliance_report_actual;?></a>
				</div>
			</div>
			<?php }} ?>		
			<?php if ($appropriate_certification ){ if(in_array("Other", $appropriate_certification) == true) { ?>
			<div class="form-group row">
				<label for="other_appropriate_certification_input" class="col-md-3 text-right">Other certification names</label>
				<div class="col-md-9"> 
					<span class="other_appropriate_certification_input" ><?php echo $other_appropriate_certification_input;?></span>
				</div>
			</div>
			<?php }} ?>				
		<?php } ?>						
					
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