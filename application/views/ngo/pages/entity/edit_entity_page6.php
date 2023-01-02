<style>
.marBot20{
	margin-bottom:20px;
}
.checkbox{margin-left: 15px;}


</style>
<!-- Content Wrapper. Contains page content -->


	
	<?php
	
	$financial_years=$this->db->get_where('financial_years')->result();
	
	if($entity_data){
		$optradio_policy= $entity_data['optradio_policy'];
		$optradio_whistleblower_policy= $entity_data['optradio_whistleblower_policy'];
		$optradio_child_protection_policy= $entity_data['optradio_child_protection_policy'];
		$other_policies_name= $entity_data['other_policies_name'];
		$other_policies= json_decode($entity_data['other_policies'] ,true);
		$multiple_img_upload= json_decode($entity_data['multiple_img_upload'] ,true);
		$multiple_img_upload2= json_decode($entity_data['multiple_img_upload2'] ,true);
		
	}else{
		$optradio_policy= '';
		$optradio_whistleblower_policy= '';
		$optradio_child_protection_policy= '';
		$other_policies= '';
		$other_policies_name= '';
		$multiple_img_upload= '';
		$multiple_img_upload2= '';
	}
		
	?>
	
	<div class="box-body">
		<?php //var_dump($entity_data) ?>
		<h5>Key Organisation Policies</h5>
		<div class="form-group row"> 
			<label for="optradio_policy" class="col-md-3 text-right">Do you have policies related to the Prevention of Sexual Harassment at the Workplace?</label>
			<div class="col-md-9">
				<span class="is_edit_hide" ><?php echo $optradio_policy;?></span>
			</div>
		</div>
		<div class="form-group row"> 
			<label for="optradio_whistleblower_policy" class="col-md-3 text-right">Do you have a Whistleblower policy?</label>
			<div class="col-md-9">
				<span class="is_edit_hide" ><?php echo $optradio_whistleblower_policy;?></span>
			</div>
		</div>
		<div class="form-group row"> 
			<label for="optradio_child_protection_policy" class="col-md-3 text-right">Do you have a Child Protection policy in place?</label>
			<div class="col-md-9">
				<span class="is_edit_hide" ><?php echo $optradio_child_protection_policy;?></span>
			</div>
		</div>
		<div class="form-group row"> 
			<label for="other_policies" class="col-md-3 text-right">What other policies do you have?</label>
			<div class="col-md-9">
			<?php if($other_policies){
			foreach($other_policies as $details){ ?>
				<span class="is_edit_hide" ><?php echo $details;?></span><br>
			<?php }
			}	?>
			</div>
		</div>
		<?php if($other_policies){  if(in_array("Other(s)",$other_policies)){ ?>
		<div class="form-group row"> 
			<label for="other_policies_name" class="col-md-3 text-right">Other policies name</label>
			<div class="col-md-9">
				<span class="is_edit_hide" ><?php echo $other_policies_name;?></span>
			</div>
		</div>
		<?php } } ?>
		
		<?php if($multiple_img_upload){
			$i= 0;
			$show_remove = '';
			$show_remove_ = '';
			foreach($multiple_img_upload as $details){
				$i++ ;
				if($i > 1){
					$show_remove = 'display_none';
					$show_remove_ = '';
				}else{ 
					$show_remove = '';
					$show_remove_ = 'display_none';
				}
		?>
			<div class="form-group row"> 
				<label for="multiple_img_upload" class="col-md-3 text-right <?php echo $show_remove ?>">Copies of all the policies you have indicated above</label>
				<label for="multiple_img_upload" class="col-md-3 text-right <?php echo $show_remove_ ?>"></label>
				<div class="col-md-9">
					<span class="is_edit_hide" ><?php echo $i ; ?>)&nbsp;</span>
					<span class="is_edit_hide" ><?php echo $details['file_name'];?></span><br>
					<span style="padding-left: 16px;" ><a target = '_blank' href="<?php echo base_url();?>uploads/<?php echo $details['file_dives']; ?>" class="is_edit_hide" ><?php echo $details['file_dives_actual'];?></a></span>
				</div>
			</div>
		<?php }
			}	?>
			
		<h5>Additional Documents</h5>
		<?php if(!$multiple_img_upload2){ ?>
			<label for="multiple_img_upload2" class="col-md-3 text-right">Other relevant documents</label>
		<?php  }	?>
		<?php if($multiple_img_upload2){
			$i= 0;
			$show_remove = '';
			$show_remove_ = '';
			foreach($multiple_img_upload2 as $details){ 
				$i++ ;
				if($i > 1){
					$show_remove = 'display_none';
					$show_remove_ = '';
				}else{ 
					$show_remove = '';
					$show_remove_ = 'display_none';
				}
			?>
			<div class="form-group row">
				<label for="multiple_img_upload2" class="col-md-3 text-right <?php echo $show_remove ?>">Other relevant documents</label>
				<label for="multiple_img_upload2" class="col-md-3 text-right <?php echo $show_remove_ ?>"></label>
				<div class="col-md-9">
					<span class="is_edit_hide" ><?php echo $i ; ?>)&nbsp;</span>
					<span class="is_edit_hide" ><?php echo $details['file_name'];?></span><br>
					<span style="padding-left: 16px;" ><a target = '_blank' href="<?php echo base_url();?>uploads/<?php echo $details['file_dives'] ?>" class="is_edit_hide" ><?php echo $details['file_dives_actual'];?></a></span><br>
					
				</div>
			</div>
			<?php }
			}	?>
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