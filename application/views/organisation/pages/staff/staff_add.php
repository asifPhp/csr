fade<style>
.marBot20{
	margin-bottom:20px;
}
</style>
  
 <?php
	$heading = '';
	$staff_role=$this->session->userdata('staff_role');
	//var_dump($staff_role);
	if($staff_data){
		$page_heading = 'Edit User';
    $heading = 'Edit a user';
		$staff_id =$staff_data['staff_id']; 
		$staff_role_id =$staff_data['staff_role_id']; 
        $donor_id =$staff_data['staff_role_id']; 
        $first_name =$staff_data['first_name']; 
        $last_name =$staff_data['last_name']; 
		$staff_email =$staff_data['staff_email']; 		
		$staff_status =$staff_data['staff_status']; 	
        $is_readonly='readonly';	
        $disp_none_comment='';
        $disp_none_comment1='';
        $disp_none_comment11='<!--';
        $disp_none_comment111='-->';
	}else{
		$page_heading = 'Add a New  User';
        $heading = 'User Details';
		$staff_id =0;
		$staff_role_id ='';
        $donor_id ='';
        $first_name ='';
        $last_name ='';
		$staff_email ='';			
		$staff_status ='';
		$is_readonly='';
    $disp_none_comment='<!--';
    $disp_none_comment1='-->';
    
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
           
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="add_organisation_form" method="post" role="form">
              <div class="box-body">
				<input type="hidden" class="form-control" id="staff_id" name="staff_id" value="<?php echo $staff_id;?>"> 
			  	<div id="errHeadMsg"></div>
                
                <div class="form-group">
                  <label for="first_name">First Name <span class="required">*</span></label>
                  <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Staff Name" value="<?php echo $first_name;?>">
                </div>
                <div class="form-group">
                  <label for="last_name">Last Name <span class="required">*</span></label>
                  <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Staff Name" value="<?php echo $last_name;?>">
                </div>
			          <div class="form-group">
                  <label for="staff_email">Email Address<span class="required">*</span></label>
                  <input type="email" class="form-control" <?php echo $is_readonly;?> id="staff_email" name="staff_email" placeholder=" Staff Email" value="<?php echo $staff_email;?> ">
                </div>             	
			           <div class="form-group">
                  <label for="first_name">User Type & Access <span class="required">*</span></label>
                 <?php //var_dump($role_data);?>
				 <select class="form-control" id="staff_role_id" name="staff_role_id">
                    <option value="">Select</option>
                    <?php 
                    if($role_data){
						
                      
					  foreach ($role_data as $key => $value) {
						  
                        $is_selected='';
                        if($staff_role_id==$value['role_id']){
                          $is_selected='selected';
                        }
						if($staff_role!='Owner' AND $value['role_name']!='Owner'){
							echo '<option '.$is_selected.' name="'.$value['role_id'].'" value="'.$value['role_name'].'">'.$value['role_name'].'</option>';
						}if($staff_role=='Owner'){
							echo '<option '.$is_selected.' name="'.$value['role_id'].'" value="'.$value['role_name'].'">'.$value['role_name'].'</option>';
						}
					  }
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="first_name">Donor</label>
                  <select class="form-control" id="donor_id" name="donor_id">
                    <option value="">select</option>
                    <?php 
                    if($donor_data){
                      foreach ($donor_data as $key => $value) {
                        $is_selected='';
                        if($donor_id==$value['donor_id']){
                          $is_selected='selected';
                        }
                        echo '<option '.$is_selected.' name="'.$value['donor_id'].'" value="'.$value['legal_name'].'">'.$value['legal_name'].'</option>';
                      }
                    }
                    ?>
                  </select>
                </div>
                  <div class="form-group">
                  <label for="staff_status">Status</label>
                  <select class="form-control" id="staff_status" name="staff_status">
                    <option <?php if($staff_status=='Active'){ echo 'selected'; } ?> value="Active">Active</option>
                    <option <?php if($staff_status=='Deactive'){ echo 'selected'; } ?> value="Deactive">Deactive</option>
                  </select>
                </div>
                
				
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <?php if($staff_data){;?>
                <a  href="<?php echo base_url();?>organisation/staff/edit_staff?id=<?php echo $staff_id;?>"><button type="button" class="btn btn-default" id="save_goto_next_step1">Cancel</button></a>
                <button type="submit" class="btn btn-success">Save Changes</button>
                <?php }else{?>
                  <button  type="submit" class="btn btn-success">Create User</button>
                <?php }?>
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
                required: "User Type & Access is required",
            },
            first_name: {
                required: "First Name is required",
            },
            last_name: {
                required: "Last Name is required",
            },
            staff_email: {
                required: "Email is required",
            },			
            staff_status: {
                required: "Status is required",
            },
        },
        submitHandler: function (form) {
			$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
			
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
						 window.location.href = APP_URL+'organisation/staff/edit_staff?id='+response.last_staff_id
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