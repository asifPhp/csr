<style>
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
    margin-left: -32px !important;
    margin-top: 10px !important;
}
img{
  margin-left: 49px;
}

</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content-header">
      <h1>
          My Profile Details/ Edit
          <small></small>
        </h1>
    </section>
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Profile</h3>
              <a href="<?php echo base_url();?>organisation/access/profile_edit"><button type="button" class="btn btn-default pull-right ">Edit</button></a>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="profile_update_form" method="post" role="form">
              <div class="box-body">
			       <div id="err_profile_update_form"></div>
                <div class="form-group">
                  <label for="first_name">First Name</label>
                  <input type="text" class="form-control" id="first_name" name="first_name" value="<?php if($profile_data){ echo $profile_data['first_name']; } ?>">
                </div>
                <div class="form-group">
                  <label for="last_name">Last Name</label>
                  <input type="text" class="form-control" id="last_name" name="last_name"  value="<?php if($profile_data){ echo $profile_data['last_name']; } ?>">
                </div>
                <div class="form-group">
                  <label for="staff_email">Email</label>
                  <input type="email" class="form-control" id="staff_email" name="staff_email" value="<?php if($profile_data){ echo $profile_data['staff_email']; } ?>" />
                </div>
                <div class="form-group">
                  <label for="staff_phone_no">Phone Number</label>
                  <input type="number" class="form-control" id="staff_phone_no" name="staff_phone_no" value="<?php if($profile_data){ echo $profile_data['staff_phone_no']; } ?>" />
                </div>
                <div class="form-group row">
                  <label class="control-label"  for="staff_profile_image">Profile Image</label>
                  <img src="<?php echo base_url();?>uploads/<?php if($profile_data){ echo $profile_data['staff_profile_image']; } ?>" style="width:200px;">
                </div>
              </div>
              <!-- /.box-body -->
            
            </form>
          </div>
          <!-- /.box -->

        </div>
        <div class="col-md-6">
        </div>

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
