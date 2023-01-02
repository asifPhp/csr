<style>
.marBot20{
	margin-bottom:20px;
}
</style>
  <?php
	$heading = '';
    $page_heading = '';
	
	if($org_data){
        $page_heading = 'View/Edit Organisation';
        $heading = 'view and edit a Organisation';
		$org_id =$org_data[0]['org_id']; 
		$org_name =$org_data[0]['org_name'];  
		$org_status =$org_data[0]['org_status']; 
		$staff_id =$org_data[0]['staff_id']; 
        $first_name =$org_data[0]['first_name']; 
        $last_name =$org_data[0]['last_name']; 
		$staff_email =$org_data[0]['staff_email']; 
		$is_readonly='readOnly';
	}else{
        $page_heading = 'Create Organisation';
        $heading = 'Add a Organisation';
		$org_id =0;
		$org_name ='';
        $org_status ='';
		$staff_id =0;
        $first_name ='';
        $last_name ='';
		$staff_email ='';
		$is_readonly ='';
		
	}	
?>
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper animated fadeInRight">
    <!-- Main content -->
    <section class="content-header">
        <h1>
          <?php echo $page_heading; ?>
          <small></small>
        </h1>
    </section>
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $heading?></h3>
              <?php if($is_permitted['is_list']){  ?>
			     <a href="<?php echo base_url();?>admin/organisation/organisation_list" class="btn btn-default pull-right">List All</a>
              <?php }?>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="add_organisation_form" method="post" role="form">
              <div class="box-body">
				<input type="hidden" class="form-control" id="staff_id" name="staff_id" value="<?php echo $staff_id;?>"> 
        <input type="hidden" class="form-control" id="org_id" name="org_id" value="<?php echo $org_id;?>"> 
			  	<div id="errHeadMsg"></div>
                <div class="form-group">
                  <label for="org_name">Name of Organisation</label>
                  <input type="text" class="form-control" id="org_name" name="org_name" placeholder="Name" value="<?php echo $org_name;?>">
                </div>
                <div class="form-group">
                  <label for="first_name">Owner First Name</label>
                  <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Owner First Name" value="<?php echo $first_name;?>">
                </div>
                <div class="form-group">
                  <label for="last_name">Owner Last Name</label>
                  <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Owner Last Name" value="<?php echo $last_name;?>">
                </div>
				<div class="form-group">
                  <label for="staff_email">Owner Email</label>
                  <input type="email" <?php echo $is_readonly;?> class="form-control" id="staff_email" name="staff_email" placeholder="Owner Email" value="<?php echo $staff_email;?>">
                </div>
                <div class="form-group">
                  <label for="org_status">Organisation Status</label>
                  <select class="form-control" id="org_status" name="org_status">
                    <option <?php if($org_status=='Active'){ echo 'selected'; } ?> value="Active">Active</option>
                    <option <?php if($org_status=='Inactive'){ echo 'selected'; } ?> value="Inactive">Inactive</option>
                  </select>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-success">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

        </div>

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<?php $this->load->view('admin/pages/single_image_upload_croppie');?>
  
<script>
$('document').ready(function(){
    
    $('body').on('change','#state_id',function(){
        var state_id=$(this).val();
        $('#district_id').val('');
        $('#district_id').find('option').addClass("display_none");
        $('#district_id').find('option[value=""]').removeClass("display_none");

        $('#district_id').find('option[state_id="'+state_id+'"]').removeClass("display_none");
    });  

	$('#add_organisation_form').validate({
		ignore:[],
        rules: {
            org_name: {
                required: true,
            },
            org_email: {
                required: true,
            },
			org_phone_no: {
                required: true,
            },
			org_logo: {
                required: true,
            },
            first_name: {
                required: true,
            }, 
            last_name: {
                required: true,
            },
            staff_email: {
                required: true,
            }
        },
        messages: {
            org_name: {
                required: "Name is required",
            },
            org_email: {
                required: "Email is required",
            },
			org_phone_no: {
                required: "Phone no select period",
            },
			org_logo: {
                required: "Image is required",
            },
            first_name: {
                required: "Owner First Name is required",
            },
            last_name: {
                required: "Owner Last Name is required",
            },
            staff_email: {
                required: "Owner Email is required",
            }
        },
        submitHandler: function (form) {
			$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /> Just a moment...</h1>' });
			
            var org_id = $('#org_id').val();
            var staff_id = $('#staff_id').val();

            var table_field = [];
			table_field={
				org_name : $('#org_name').val(),
                org_status : $('#org_status').val(),
			};
			var owner_field = [];
			owner_field={
				first_name : $('#first_name').val(),
                last_name : $('#last_name').val(),
				staff_email : $('#staff_email').val(),
			};
           
            $.post(APP_URL + 'admin/organisation/update_organisation', {
                table_field: table_field,
                owner_field: owner_field,
                org_id: org_id,
                staff_id: staff_id,
            },
            function (response) {
				$.unblockUI();
				$("html, body").animate({scrollTop: 0}, "slow");
                $('#errHeadMsg').empty();
                if (response.status == 200) {
                    $('#errHeadMsg').empty();
                    $('#errHeadMsg').html("<div class='alert alert-success fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + response.message + "</strong></div>");
					$("#errHeadMsg").fadeTo(2000, 500).slideUp(500, function(){
						$('#errHeadMsg').empty();
						window.location.href = APP_URL+'admin/organisation/organisation_list';
					});
			   } else {
                    $('#errHeadMsg').empty();
                    $('#errHeadMsg').html("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + response.message + "</strong></div>");
					$("#errHeadMsg").fadeTo(2000, 500).slideUp(500, function(){
						$('#errHeadMsg').empty();
					});
				}
            }, 'json');
            return false;
        }
    });
});
</script>