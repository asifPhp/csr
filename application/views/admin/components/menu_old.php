
<style>
.skin-blue .treeview-menu>li.active>a, .skin-blue .treeview-menu>li>a:hover {
    background: #f7f7f7;
}
</style>

  <header class="main-header">
    <!-- Logo -->
    <a href="javascript:void(0);" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><?php echo PROJECT_NAME_MINI;?></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><?php echo PROJECT_NAME;?></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <li class="dropdown user user-menu">
            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url().'uploads/'.$this->session->userdata('profile_picture');?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->session->userdata('user_name');?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url().'uploads/'.$this->session->userdata('profile_picture');?>" class="img-circle" alt="User Image">
                <p>
					<?php echo $this->session->userdata('user_name');?>
                </p>
              </li>
              
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url();?>admin/access/change_password" class="btn btn-default btn-flat">Change Password</a>
                </div>
                <div class="pull-right">
                  <a href="javascript:void(0);" class="btn btn-default btn-flat logout_">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url().'uploads/'.$this->session->userdata('profile_picture');?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('user_name');?></p>
          <a href="javascript:void(0);"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
      
        <li>
          <a href="<?php echo base_url();?>admin/configure">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url();?>admin/organisation/organisation_list">
            <i class="fa fa-user"></i> <span>Organisation</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url();?>admin/staff/staff_list">
            <i class="fa fa-user"></i> <span>Staff</span>
          </a>
        </li>
	   <?php 
					$i = 2;
					if(($access_module)){
						$content = '';
						$current_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
						if($_SERVER['HTTP_HOST'] == 'localhost'){
							$current_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
						}else{
							$current_url = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
						}
						$current_path = explode(base_url(),$current_url)[1];
            var_dump($access_module_data);
            foreach($access_module_data as $value){
              $content .= '<li class="parent_li '.$is_active.'">
                    <a href="javascript:void(0);"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">'.$module_name.'</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse treeview-menu">';
            });
          }
					if(($access_module)){
            $content = '';

            $current_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            if($_SERVER['HTTP_HOST'] == 'localhost'){
              $current_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            }else{
              $current_url = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            }
            $current_path = explode(base_url(),$current_url)[1];

						foreach($access_module as $value){
						
							$module_name = $value['module_name'];
							$sub_content = '';
              $is_active = '';
										//var_dump($access_detail);
										foreach($access_detail as $value2){
											if($value2['module_id']==$value['module_id']){
												$active = '';
												if($value2['status']=='active'){
                          if($value2['add_access']=='yes'){
                            if($value2['show_link']=='yes'){
                              $active = '';
    													if (strpos($current_path,$value2['link']) !== false) {
    														$active = 'active';
                                $is_active = 'active';
    													}
    													
    													$sub_content .= '<li class="child_li '.$active.'" name="'.$active.'"><a href="'.base_url().''.$value2['link'].'"> Add '.$value2['submodule_name'].'</a></li>';
                            }
                          }
                          if($value2['list_access']=='yes'){
                            if($value2['show_list']=='yes'){
                              $active = '';
                              if (strpos($current_path,$value2['list_link']) !== false) {
                                $active = 'active';
                                $is_active = 'active';
                              }
                              
                              $sub_content .= '<li class="child_li '.$active.'" name="'.$active.'"><a href="'.base_url().''.$value2['list_link'].'">'.$value2['submodule_name'].' List</a></li>';
                            }
                          }
												}
											}
										}
            $content .= '<li class="parent_li '.$is_active.'">
                    <a href="javascript:void(0);"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">'.$module_name.'</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse treeview-menu">';
                    $content .= $sub_content;
						$content .= '</ul>
									</li>
									';
						}
						echo $content;
					}
				?>
<!--		
        <li class="treeview">
          <a href="javascript:void(0);">
            <i class="fa fa-folder"></i> <span>Account</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>admin/account/module"><i class="fa fa-circle-o"></i> Module</a></li>
            <li><a href="<?php echo base_url();?>admin/account/submodule"><i class="fa fa-circle-o"></i> Submodule</a></li>
     
          
          </ul>
        </li>
        
       
        <li class="treeview">
          <a href="javascript:void(0);">
            <i class="fa fa-folder"></i> <span>Plans</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>admin/plan/plan_list"><i class="fa fa-circle-o"></i> Plan List</a></li>
            <li><a href="<?php echo base_url();?>admin/plan"><i class="fa fa-circle-o"></i> Add Plans</a></li>
          </ul>
        </li>
        
        <li class="treeview">
          <a href="javascript:void(0);">
            <i class="fa fa-folder"></i> <span>User Profile </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>admin/profile/user_profile_list"><i class="fa fa-circle-o"></i> User Profile List</a></li>
            <li><a href="<?php echo base_url();?>admin/profile"><i class="fa fa-circle-o"></i> Add User Profile</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="javascript:void(0);">
            <i class="fa fa-folder"></i> <span>Blog </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>admin/blog/category"><i class="fa fa-circle-o"></i> Blog Category</a></li>
          </ul>
        </li>-->
        
       
        <li><a href="<?php echo base_url();?>admin/access/change_password"><i class="fa fa-circle-o text-red"></i> <span>Change Password</span></a></li>
        <li><a href="javascript:void(0);" class="logout_"><i class="fa fa-circle-o text-red "></i> <span>Sign out</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
