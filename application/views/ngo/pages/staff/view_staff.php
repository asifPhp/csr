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
    width: 30%;
    float: inherit;
   text-align: right;
    margin-left: -32px;
    margin-top: 10px;
}
.required{display:none;}
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   

	
	<?php
	$heading = '';
	
	if($staff_data){
		$page_heading = 'View User';
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
    $heading = 'Add a user';
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
			         			 
			  <a href="<?php echo base_url();?>ngo/staff/index?id=<?php echo $ngo_staff_id;?>" class="btn btn-default pull-right" style="margin-right: 16px;" >Edit</a>

            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="staff_form" method="post" role="form">
              <div class="box-body">
				<input type="hidden" class="form-control" id="ngo_staff_id" name="ngo_staff_id" value="<?php echo $ngo_staff_id;?>"> 
			  <div id="err_add_plan"></div>
                <div class="form-group">
                  <label for="first_name"> Entity</label>
                    <?php 
                    if($ngo_data){
                      foreach ($ngo_data as $key => $value) {
                        $is_selected='';
                        if($ngo_id==$value['id']){
                          $is_selected='selected';
                        
                        echo '<input type="text" class="form-control" id="first_name" name="first_name"  value="'.$value['legal_name'].'">';
                      }
                      }
                    }
                    ?>
                </div>
                <div class="form-group">
                  <label for="first_name"> User Type <span class="required">*</span></label>
                  
                    <?php 
                    if($role_data){
                      foreach ($role_data as $key => $value) {
                        $is_selected='';
                        if($staff_role_id==$value['role_id']){
                          $is_selected='selected';
                         echo '<input type="text" class="form-control" id="first_name" name="first_name"  value="'.$value['role_name'].'">';
                      }
                      }
                    }
                    ?>
                </div>
                <div class="form-group">
                  <label for="first_name"> First Name <span class="required">*</span></label>
                  <input type="text" class="form-control" id="first_name" name="first_name"  value="<?php echo $first_name;?>">
                </div>
                <div class="form-group">
                  <label for="last_name" > Last Name <span class="required">*</span></label>
                  <input type="text" class="form-control" id="last_name" name="last_name"  value="<?php echo $last_name;?>">
                </div>
				        <div class="form-group">
                  <label for="user_email">Email <span class="required">*</span></label>
                  <input type="email" class="form-control" id="staff_email" name="staff_email"  value="<?php echo $staff_email;?>">
                </div>
				        <div class="form-group">
                  <label for="staff_status" >User Status <span class="required">*</span></label>
				  <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="<?php echo $staff_status;?>">
                  
                </div>
				
              </div>
              <!-- /.box-body -->

              
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

