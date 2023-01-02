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
	
	if($entity_data){
        $from_date_12a_valid=$entity_data['from_date_12a_valid'];
		$non_financial_partnerships=$entity_data['non_financial_partnerships'];
		$expire_date_12a_valid=$entity_data['expire_date_12a_valid'];
		$tax_exemption_percentage=$entity_data['tax_exemption_percentage'];
		$certificate_date_80G=$entity_data['certificate_date_80G'];
		$upload_80G_reg=$entity_data['upload_80G_reg'];
		$tax_exemption_type=$entity_data['tax_exemption_type'];
		$pan_number=$entity_data['pan_number'];
		$tan_number=$entity_data['tan_number'];
		$epf_number=$entity_data['epf_number'];
		$leadership_network=$entity_data['leadership_network'];
		$other_appropriate_certification_input=$entity_data['other_appropriate_certification_input'];
		$is_12a_certificate=$entity_data['is_12a_certificate'];
		$is_certificate_exist=$entity_data['is_certificate_exist'];
		$appropriate_certification=$entity_data['appropriate_certification'];
		$is_non_financial_partnerships=$entity_data['is_non_financial_partnerships'];
		$is_leadership_network=$entity_data['is_leadership_network'];
		$is_blacklist=$entity_data['is_blacklist'];
		$is_guilty=$entity_data['is_guilty'];
		$guilty=$entity_data['guilty'];
		$blacklist=$entity_data['blacklist'];
		$optradio2=$entity_data['optradio2'];
		$optradio3=$entity_data['optradio3'];
		$optradio4=$entity_data['optradio4'];
		$optradio5=$entity_data['optradio5'];
		$optradio6=$entity_data['optradio6'];
		$optradio7=$entity_data['optradio7'];
		$received_award=$entity_data['received_award'];
		$previously_recieve_funding=$entity_data['previously_recieve_funding'];
		$is_political_affiliation=$entity_data['is_political_affiliation'];
		$bajaj_group_involved=$entity_data['bajaj_group_involved'];
		$senior_member_involved=$entity_data['senior_member_involved'];
		$religious_affiliation_on_radio=$entity_data['religious_affiliation_on_radio'];
		$received_national_award=$entity_data['received_national_award'];
		$upload_annual_report_1=$entity_data['upload_annual_report_1'];
		$upload_annual_report_2=$entity_data['upload_annual_report_2'];
		$upload_annual_report_3=$entity_data['upload_annual_report_3'];
		$upload_annual_report_1_actual=$entity_data['upload_annual_report_1_actual'];
		$upload_annual_report_2_actual=$entity_data['upload_annual_report_2_actual'];
		$upload_annual_report_3_actual=$entity_data['upload_annual_report_3_actual'];
		$governing_council=json_decode($entity_data['governing_council'], true);
		$page3_financial_years=json_decode($entity_data['page3_financial_years'], true);
		if($page3_financial_years){
			$financial_years1=$page3_financial_years[0]['financial_years1'];
			$financial_years2=$page3_financial_years[0]['financial_years2'];
			$financial_years3=$page3_financial_years[0]['financial_years3'];
		}else{
			$financial_years1='';
			$financial_years2='';
			$financial_years3='';
		}
	}else{
		$financial_years1='';
		$financial_years2='';
		$financial_years3='';
		
		$from_date_12a_valid='';
		$expire_date_12a_valid='';
		$non_financial_partnerships='';
		$tax_exemption_percentage='';
		$certificate_date_80G='';
		$upload_80G_reg='';
		$tax_exemption_type='';
		$pan_number='';
		$tan_number='';
		$epf_number='';
		$credibility_alliance_report='';
		$other_appropriate_certification_input='';
		$is_12a_certificate='';
		$is_certificate_exist='';
		$appropriate_certification='';
		$is_non_financial_partnerships='';
		$is_leadership_network='';
		$is_blacklist='';
		$is_guilty='';
		$upload_annual_report_1='';
		$upload_annual_report_2='';
		$upload_annual_report_3='';
		$upload_annual_report_1_actual='';
		$upload_annual_report_2_actual='';
		$upload_annual_report_3_actual='';
	}
		
	?>
	
	<div class="box-body">
		<?php //var_dump($entity_data) ?>
		<h5>Linkages</h5>
		<div class="form-group row">
			<label for="is_non_financial_partnerships" class="col-md-3 text-right"> Does the organisation have any non-financial partnerships (University linkages etc)?</label>
			<div class="col-md-9">
				<span class="is_edit_hide" ><?php echo $is_non_financial_partnerships;?></span>
			</div>
		</div>
		<?php if($is_non_financial_partnerships == 'Yes') { ?>
		<div class="form-group row">
			<label for="non_financial_partnerships" class="col-md-3 text-right">Non-financial partnerships detail</label>
			<div class="col-md-9">
				<pre class="is_edit_hide" ><?php echo $non_financial_partnerships;?></pre>
			</div>
		</div>
		<?php } ?>
		<div class="form-group row">
			<label for="is_leadership_network" class="col-md-3 text-right"> Is the leadership of the organisation part of any networks?</label>
			<div class="col-md-9">
				<span class="is_edit_hide" ><?php echo $is_leadership_network;?></span>
			</div>
		</div>
		<?php if($is_leadership_network == 'Yes') { ?>
			<div class="form-group row">
				<label for="leadership_network" class="col-md-3 text-right">Detailed report</label>
				<div class="col-md-9">
					<pre class="is_edit_hide" ><?php echo $leadership_network;?></pre>
				</div>
			</div>
		<?php } ?>
		<h5>Litigation, Blacklists, and Violations</h5>
		<div class="form-group row">
			<label for="is_blacklist" class="col-md-3 text-right"> Please indicate if the organisation has ever been blacklisted (By any government agencies/departments, donors, lenders, development agencies)</label>
			<div class="col-md-9">
				<span class="is_edit_hide"><?php echo $is_blacklist;?></span>
			</div>
		</div>
		<?php if($is_blacklist == 'Yes') { ?>
			<div class="form-group row">
				<label for="blacklist" class="col-md-3 text-right">Detailed report</label>
				<div class="col-md-9">
					<pre class="is_edit_hide" ><?php echo $blacklist;?></pre>
				</div>
			</div>
		<?php } ?>
		<div class="form-group row">
			<label for="is_guilty" class="col-md-3 text-right"> Please indicate if the organisation has been found guilty or penalised for any policy guideline issued by various government bodies or regulators</label>
			<div class="col-md-9">
				<span class="is_edit_hide"><?php echo $is_guilty;?></span>
			</div>
		</div>
		<?php if($is_guilty == 'Yes') { ?>
			<div class="form-group row">
				<label for="guilty" class="col-md-3 text-right">Detailed report</label>
				<div class="col-md-9">
					<pre class="is_edit_hide" ><?php echo $guilty;?></pre>
				</div>
			</div>
		<?php } ?>
		<div class="form-group row">
			<label for="governing_council" class="col-md-3 text-right">Selected appropriate certification(s)</label>
			<div class="col-md-9">
			<?php  if($governing_council){
				foreach($governing_council as $details){
			?>
				<span class="is_edit_hide" ><?php echo $details;?></span><br>
				<?php }
			}?>	
			</div>
		</div>
		<h5>Affiliations</h5>
		<div class="form-group row">
			<label for="is_political_affiliation" class="col-md-3 text-right">Does the organisation have any political or religious affiliation?</label>
			<div class="col-md-9">
				<span class="is_edit_hide" ><?php echo $is_political_affiliation;?></span>
			</div>
		</div>
		<?php if($is_political_affiliation == 'Yes') { ?>
		<div class="form-group row">
			<label for="religious_affiliation_on_radio" class="col-md-3 text-right">Religious affiliation Detail</label>
			<div class="col-md-9">
				<pre class="is_edit_hide" ><?php echo $religious_affiliation_on_radio;?></pre>
			</div>
		</div>
		<?php }?>	
		<div class="form-group row">
			<label for="optradio2" class="col-md-3 text-right">Are any Board members/senior managers (including relatives) of the Bajaj Group involved with the organisation?</label>
			<div class="col-md-9">
				<span class="is_edit_hide" ><?php echo $optradio2;?></span>
			</div>
		</div>
		<?php if($optradio2 == 'Yes') { ?>
		<div class="form-group row">
			<label for="bajaj_group_involved" class="col-md-3 text-right">Detailed report</label>
			<div class="col-md-9">
				<pre class="is_edit_hide" ><?php echo $bajaj_group_involved;?></pre>
			</div>
		</div>
		<?php }?>
		<div class="form-group row">
			<label for="optradio3" class="col-md-3 text-right">Are any senior members of the organisation involved with the Bajaj Group (including associations such as vendors)?</label>
			<div class="col-md-9">
				<span class="is_edit_hide" ><?php echo $optradio3;?></span>
			</div>
		</div>
		<?php if($optradio3 == 'Yes') { ?>
		<div class="form-group row">
			<label for="senior_member_involved" class="col-md-3 text-right">Detailed report</label>
			<div class="col-md-9">
				<pre class="is_edit_hide" ><?php echo $senior_member_involved;?></pre>
			</div>
		</div>
		<?php }?>	
		<div class="form-group row">
			<label for="optradio4" class="col-md-3 text-right">Has the organisation previously received funding from a Bajaj Company or Trust?</label>
			<div class="col-md-9">
				<span class="is_edit_hide" ><?php echo $optradio4;?></span>
			</div>
		</div>
		<?php if($optradio4 == 'Yes') { ?>
		<div class="form-group row">
			<label for="previously_recieve_funding" class="col-md-3 text-right">Detailed report</label>
			<div class="col-md-9">
				<pre class="is_edit_hide" ><?php echo $previously_recieve_funding;?></pre>
			</div>
		</div>
		<?php }?>	
		<div class="form-group row">
			<label for="optradio5" class="col-md-3 text-right">Has the organisation received any award(s) from a Bajaj Company or Trust?</label>
			<div class="col-md-9">
				<span class="is_edit_hide" ><?php echo $optradio5;?></span>
			</div>
		</div>
		<?php if($optradio5 == 'Yes') { ?>
		<div class="form-group row">
			<label for="received_award" class="col-md-3 text-right">Detailed report</label>
			<div class="col-md-9">
				<pre class="is_edit_hide" ><?php echo $received_award;?></pre>
			</div>
		</div>
		<?php }?>
		<div class="form-group row">
			<label for="optradio6" class="col-md-3 text-right">Has the organisation received any national/international award(s)?</label>
			<div class="col-md-9">
				<span class="is_edit_hide" ><?php echo $optradio6;?></span>
			</div>
		</div>
		<?php if($optradio6 == 'Yes') { ?>
		<div class="form-group row">
			<label for="received_national_award" class="col-md-3 text-right">Detailed report</label>
			<div class="col-md-9">
				<pre class="is_edit_hide" ><?php echo $received_national_award;?></pre>
			</div>
		</div>
		<?php }?>	
		<div class="form-group row">
			<label for="optradio7" class="col-md-3 text-right">Does the organisation publish annual reports every year?</label>
			<div class="col-md-9">
				<span class="is_edit_hide" ><?php echo $optradio7;?></span>
			</div>
		</div>
		<?php if($optradio7 == 'Yes') { ?>
		<div class="form-group row">
			<label for="upload_annual_report_1_actual" class="col-md-3 text-right">Upload annual report for <?php echo $financial_years1; ?></label>
			<div class="col-md-9">
				<a target = '_blank' href="<?php echo base_url();?>uploads/<?php echo $upload_annual_report_1 ?>" class="is_edit_hide" ><?php echo $upload_annual_report_1_actual;?></a>
			</div>
		</div>
		<div class="form-group row">
			<label for="upload_annual_report_2" class="col-md-3 text-right">Upload annual report for <?php echo $financial_years2; ?></label>
			<div class="col-md-9">
				<a target = '_blank' href="<?php echo base_url();?>uploads/<?php echo $upload_annual_report_2 ?>" class="is_edit_hide" ><?php echo $upload_annual_report_2_actual;?></a>
			</div>
		</div>
		<div class="form-group row">
			<label for="upload_annual_report_3" class="col-md-3 text-right">Upload annual report for <?php echo $financial_years3; ?></label>
			<div class="col-md-9">
				<a target = '_blank' href="<?php echo base_url();?>uploads/<?php echo $upload_annual_report_3 ?>" class="is_edit_hide" ><?php echo $upload_annual_report_3_actual;?></a>
			</div>
		</div>
		<?php }?>	
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