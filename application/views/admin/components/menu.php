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
        <?php 
        if(($access_data)){
            $content = '';

            $current_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            if($_SERVER['HTTP_HOST'] == 'localhost'){
				$current_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            }elseif($_SERVER['HTTP_HOST'] == 'compass-csr.com'){
				$current_url = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            }else{
              $current_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            }
            $current_path = explode(base_url(),$current_url)[1];

            foreach($access_data as $value){
            	//var_dump($value);
            	 $subcontent = '';
            	 $is_active = '';
            	foreach($value['submodule'] as $row){
            		if($row['is_add']){
            			$active='';
            			if (strpos($current_path,$row['link']) !== false) {
    						$active = 'active';
                            $is_active = 'active';
    					}
            			$subcontent.='<li class="'.$active.'"><a href="'.base_url().''.$row['link'].'"><i class="fa fa-circle-o"></i> Add '.$row['submodule_name'].'</a></li>';
            		}
            		if($row['is_list']){
            			$active='';
            			if (strpos($current_path,$row['list_link']) !== false) {
    						$active = 'active';
                            $is_active = 'active';
    					}
            			$subcontent.='<li class="'.$active.'"><a href="'.base_url().''.$row['list_link'].'"><i class="fa fa-circle-o"></i> '.$row['submodule_name'].' List</a></li>';
            		}
            	}
            	$content .= '<li class="treeview '.$is_active.'">
		          <a href="javascript:void(0);">
		            <i class="fa fa-folder"></i> <span>'.$value['module_name'].' </span>
		            <span class="pull-right-container">
		              <i class="fa fa-angle-left pull-right"></i>
		            </span>
		          </a>
		          <ul class="treeview-menu">
		          '.$subcontent.'
		          </ul>
		        </li>';
            }
            echo $content;
        }
        ?>

        <!--<li class="treeview">
          <a href="javascript:void(0);">
            <i class="fa fa-folder"></i> <span>Staff </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>admin/staff/staff_list"><i class="fa fa-circle-o"></i> Staff List</a></li>
            <li><a href="<?php echo base_url();?>admin/staff"><i class="fa fa-circle-o"></i> Add Staff</a></li>
          </ul>
        </li>---->

        <li><a href="<?php echo base_url();?>admin/access/change_password"><i class="fa fa-circle-o text-red"></i> <span>Change Password</span></a></li>
        <li><a href="javascript:void(0);" class="logout_"><i class="fa fa-circle-o text-red "></i> <span>Sign out</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
</aside>