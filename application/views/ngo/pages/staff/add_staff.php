<style>
.marBot20{
	margin-bottom:20px;
}
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   

	
	<?php
	$heading = '';
	$staff_role=$this->session->userdata('staff_role');
	//var_dump($staff_role);
	if($staff_data){
		$page_heading = 'Edit User';
    $heading = 'User Details';
		$ngo_staff_id  =$staff_data['ngo_staff_id']; 
        $ngo_id  =$staff_data['ngo_id']; 
		$staff_role_id =$staff_data['staff_role_id']; 
        $first_name =$staff_data['first_name']; 
        $last_name =$staff_data['last_name']; 
		$staff_email =$staff_data['staff_email'];  
		$staff_status =$staff_data['staff_status'];  
		$is_readonly='readonly';
	}else{
		$page_heading = 'Create User';
    $heading = 'User Details';
		$ngo_staff_id  =0;
		$staff_role_id ='';
        $first_name ='';
        $last_name ='';
		$staff_email ='';
		$staff_status ='';
		$is_readonly='';
	}	
	?>
   <section class="content-header content_h_m_b">

      
      <h1>
          <?php echo $page_heading; ?>
          <small></small>
        </h1>
     
		<?php if($is_permitted['is_list']){  ?>
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url();?>ngo/staff/staff_list" class="btn btn-default pull-right">Back to User List</a></li>
			</ol>
		  <?php }?>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $heading?></h3>

            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="staff_form" method="post" role="form">
              <div class="box-body">
				<input type="hidden" class="form-control" id="ngo_staff_id" name="ngo_staff_id" value="<?php echo $ngo_staff_id;?>"> 
			  <div id="err_add_plan"></div>
                <div class="form-group">
                  <label for="first_name"> Entity</label>
                  <select class="form-control" id="ngo_id" name="ngo_id">
                    <option value="">select</option>
                    <?php 
                    if($ngo_data){
                      foreach ($ngo_data as $key => $value) {
                        $is_selected='';
                        if($ngo_id==$value['id']){
                          $is_selected='selected';
                        }
                        echo '<option '.$is_selected.' name="'.$value['id'].'" value="'.$value['legal_name'].'">'.$value['legal_name'].'</option>';
                      }
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="first_name"> User Type <span class="required">*</span></label>
                  <select class="form-control" id="staff_role_id" name="staff_role_id">
                    <option value="">select</option>
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
                  <label for="first_name"> First Name <span class="required">*</span></label>
                  <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="<?php echo $first_name;?>">
                </div>
                <div class="form-group">
                  <label for="last_name"> Last Name <span class="required">*</span></label>
                  <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="<?php echo $last_name;?>">
                </div>
				<div class="form-group">
                  <label for="user_email">Email <span class="required">*</span></label>
                  <input type="email" class="form-control" <?php echo $is_readonly;?> id="staff_email" name="staff_email" placeholder="Email" value="<?php echo $staff_email;?>">
                </div>
				<div class="form-group">
                  <label for="staff_status">User Status <span class="required">*</span></label>
                  <select class="form-control" id="staff_status" name="staff_status">
                  	<option <?php if($staff_status=='Active'){ echo 'selected'; } ?> value="Active">Active</option>
                  	<option <?php if($staff_status=='Deactive'){ echo 'selected'; } ?> value="Deactive">Deactive</option>
                  </select>
                </div>
				
              </div>
              <!-- /.box-body -->
				
              <div class="box-footer">

                <?php if($staff_data){;?>
                <a  href="<?php echo base_url();?>ngo/staff/staff_edit?id=<?php echo $ngo_staff_id;?>"><button type="button" class="btn btn-default" id="save_goto_next_step1">Cancel</button></a>
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

<script>
$('document').ready(function(){

	$('#staff_form').validate({
		ignore:[],
        rules: {
            ngo_id: {
                required: true,
             },
			first_name: {
                required: true,
                minlength: 3
            },
            staff_role_id: {
                required: true,
            },
            last_name: {
                required: true,
                minlength: 3
            },
            staff_email: {
                required: true,
            },
			staff_status: {
                required: true,
            },
        },
        messages: {
            ngo_id: {
                required: "NGO is required",
            },
			staff_role_id: {
                required: "User Type is required",
            },
            first_name: {
                required: "First Name is required",
                minlength: "your name must be at least 3 characters long.",
            },
            last_name: {
                required: "Last Name is required",
                minlength: "your name must be at least 3 characters long.",
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
			
            var ngo_staff_id  = $('#ngo_staff_id ').val();

            var table_field = [];
            table_field={
				ngo_id : $('#ngo_id option:selected').attr('name'),
                first_name : $('#first_name').val(),
                last_name : $('#last_name').val(),
                staff_email : $('#staff_email').val(),      
                staff_status : $('#staff_status').val(),
                staff_role_id : $('#staff_role_id option:selected').attr('name'),
                staff_role : $('#staff_role_id option:selected').attr('value'),
			};
           
            $.post(APP_URL + 'ngo/staff/update_staff', {
                table_field: table_field,
                ngo_staff_id : ngo_staff_id ,
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
						window.location.href = APP_URL+'ngo/staff/staff_edit?id='+response.ngo_staff_id;  
					});
			   } else {
                    $('#err_add_plan').empty();
                    $('#err_add_plan').html("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + response.message + "</strong></div>");
					$("#err_add_plan").fadeTo(2000, 500).slideUp(500, function(){
						$('#err_add_plan').empty();
					});
				}
				
            }, 'json');
            return false;
        }
    });
});
</script>