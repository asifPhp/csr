<style>
.marBot20{
	margin-bottom:20px;
}
select{
  width: 70% !important;
    float: right !important;
     border: none !important;
    background: white !important;
    -webkit-appearance: none !important;
    pointer-events: none !important;
}
input{
  width: 70% !important;
    float: right !important;
    border: none !important;
    pointer-events: none !important;
}
label{
    width: 30% !important;
    float: inherit !important;
   text-align: right !important;
    margin-left: -9px !important;
    margin-top: 10px !important;
}

</style>
  
 <?php
	$heading = '';
	
	if($staff_data){
		$page_heading = 'View User';
		$heading = 'User Details';
		$staff_id =$staff_data['staff_id']; 
		$staff_role_id =$staff_data['staff_role_id']; 
        $donor_id =$staff_data['staff_role_id']; 
        $first_name =$staff_data['first_name']; 
        $last_name =$staff_data['last_name']; 
		$staff_email =$staff_data['staff_email']; 		
		$staff_status =$staff_data['staff_status']; 	
        $is_readonly='readonly';
		$disp_cmt_op='';
		$disp_cmt_cl='';
	}else{
		$page_heading = 'View User';
        $heading = 'User Details';
		$staff_id =0;
		$staff_role_id ='';
        $donor_id ='';
        $first_name ='';
        $last_name ='';
		$staff_email ='';			
		$staff_status ='';
		$is_readonly='';
		$disp_cmt_op='<!--';
		$disp_cmt_cl='-->';
		
	}	
?> 
  
  
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper animated fadeInRight">
    <!-- Main content -->
    <section class="content-header content_h_m_b">
      <h1>
          <?php echo $page_heading; ?>
          <small></small>
        </h1>
		
		 <?php if($is_permitted['is_list']){  ?>
			<ol class="breadcrumb" style="padding-top: 0px;">
				<li><a href="<?php echo base_url();?>organisation/staff/staff_list" class="btn btn-default pull-right">Back to User List</a></li>
			</ol>
			<?php }?>
		  
    </section>
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box">
            <div class="box-header with-border">
            <h3 class="box-title"><?php echo $heading?></h3> 
           
			<?php echo $disp_cmt_op;?>
			       <a href="<?php echo base_url();?>organisation/staff/index?id=<?php echo $staff_id;?>" class="btn btn-default pull-right">Edit</a>
             <?php echo $disp_cmt_cl;?>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="add_organisation_form" method="post" role="form">
              <div class="box-body">
				<input type="hidden" class="form-control" id="staff_id" name="staff_id" value="<?php echo $staff_id;?>"> 
			  	<div id="errHeadMsg"></div>
                
                <div class="form-group">
                  <label for="first_name">First Name</label>
                  <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="<?php echo $first_name;?>">
                </div>
                <div class="form-group">
                  <label for="last_name">Last Name</label>
                  <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="<?php echo $last_name;?>">
                </div>
				        <div class="form-group">
                  <label for="staff_email">Email Address</label>
                  <input type="email" class="form-control"  id="staff_email" name="staff_email" placeholder="Email Address" value="<?php echo $staff_email;?> ">
                </div>
                <div class="form-group">
                  <label for="first_name">User Type & Access</label>
				    
                
                 
                    <?php 
                    if($role_data){
						foreach ($role_data as $key => $value) {
							$is_selected='';
							if($staff_role_id==$value['role_id']){
								$is_selected='selected';
								echo '<input type="text" class="form-control"  id="staff_email" name="staff_email" placeholder="Email Address" value="'.$value['role_name'].' ">';
							}
						}
                    }
                    ?>
                </div>
                <div class="form-group">
                  <label for="first_name"> Donor</label>
                    <?php 
                    if($donor_data){
                      foreach ($donor_data as $key => $value) {
                        $is_selected='';
                        if($donor_id==$value['donor_id']){
                          $is_selected='selected';
                        	echo '<input type="text" class="form-control"  id="staff_email" name="staff_email" placeholder="Email Address" value="'.$value['legal_name'].' ">';
						}
                       }
                    }
                    ?>
                </div>             	
				      <div class="form-group">
                  <label for="staff_status">Status</label>
                    <input type="text" class="form-control"  id="staff_email" name="staff_email" placeholder="Email Address" value="<?php echo $staff_status;?> ">
                
                </div>
                
                
				
              </div>
              <!-- /.box-body -->
             
            </form>
          </div>
          <!-- /.box -->

        </div>

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<?php $this->load->view('organisation/pages/single_image_upload_croppie');?>
  
<script>
$('document').ready(function(){
	$('#add_organisation_form').validate({
		ignore:[],
        rules: {
            first_name: {
                required: true,
            },
            staff_role_id: {
                required: true,
            },
            last_name: {
                required: true,
            },
            staff_email: {
                required: true,
            },
			staff_status: {
                required: true,
            },
        },
        messages: {
            staff_role_id: {
                required: "Staff Role is required",
            },
            first_name: {
                required: "Staff First Name is required",
            },
            last_name: {
                required: "Staff Last Name is required",
            },
            staff_email: {
                required: "Staff Email is required",
            },			
            staff_status: {
                required: "Staff Status is required",
            },
        },
        submitHandler: function (form) {
			$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /> Just a moment...</h1>' });
			
            var staff_id  = $('#staff_id').val();

            var table_field = [];
			table_field={
				first_name : $('#first_name').val(),
                last_name : $('#last_name').val(),
				staff_email : $('#staff_email').val(),			
				staff_status : $('#staff_status').val(),
                donor_id : $('#donor_id option:selected').attr('name'),
                staff_role_id : $('#staff_role_id option:selected').attr('name'),
                staff_role : $('#staff_role_id option:selected').attr('value'),
			};
           
            $.post(APP_URL + 'organisation/staff/update_staff', {       
                table_field: table_field,
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
						 window.location.href = APP_URL+'organisation/staff/staff_list';
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