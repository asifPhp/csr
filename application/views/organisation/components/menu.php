
<header class="main-header">
    <!-- Logo -->
    <a href="javascript:void(0);" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><?php echo $this->session->userdata('org_name');?></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><?php echo $this->session->userdata('org_name');?></span>
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
              <img src="<?php echo base_url().'uploads/'.$this->session->userdata('staff_profile_image');?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->session->userdata('first_name').' '.$this->session->userdata('last_name');?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url().'uploads/'.$this->session->userdata('staff_profile_image');?>" class="img-circle" alt="User Image" style="margin-left: 0px;">
                <p>
                  <a style="color: #fff;" href="<?php echo base_url();?>organisation/access/profile">
					    <button class="btn btn-default">  <?php echo $this->session->userdata('first_name').' '.$this->session->userdata('last_name');?></button>
                  </a>
                </p>
              </li>
              
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url();?>organisation/access/change_password" class="btn btn-default btn-flat">Change Password</a>
                </div>
                <div class="pull-right">
                  <a href="javascript:void(0);" class="btn btn-default btn-flat logout">Sign out</a>
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
          <img src="<?php echo base_url().'uploads/'.$this->session->userdata('staff_profile_image');?>" class="img-circle" alt="User Image" style="margin-left: 0px !important;">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('first_name').' '.$this->session->userdata('last_name');?></p>
          <a href="javascript:void(0);"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
      
        <li>
          <a href="<?php echo base_url();?>organisation/configure">
            <i class="fa fa-pie-chart"></i> <span>Dashboard</span>
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
            }elseif($_SERVER['HTTP_HOST'] == 'org.compass-csr.com'){
				$current_url = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            }else{
              $current_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            }
            $current_path = explode(base_url(),$current_url)[1];

            foreach($access_data as $value){
            	//var_dump($value);
				$subcontent = '';
				$is_active = '';
				$show_direct = '';
				$display_none = '';
				 
            	foreach($value['submodule'] as $row){
					//var_dump($row);
            		if($row['menu_link_show']=='yes'){
            			$active='';
            			if (strpos($current_path,$row['link']) !== false) {
    						$active = 'active';
                            $is_active = 'active';
    					}
						if($value['direct_indirect']== 'direct'){
							$show_direct.='<li class="'.$active.'"><a href="'.base_url().''.$row['link'].'"><i class="fa '.$row['icon_class'].'></i><span> Add '.$row['submodule_name'].'</span></a></li>';
							$display_none = 'display_none';
						}else{
							$subcontent.='<ul class="treeview-menu"><li class="'.$active.'"><a href="'.base_url().''.$row['link'].'"><i class="fa '.$row['icon_class'].'"></i><span> Add '.$row['submodule_name'].'</span></a></li></ul>';
							$display_none = 'display_block';
						}
					}	
            		if($row['menu_list_link_show']=='yes'){
            			$active='';
            			if (strpos($current_path,$row['list_link']) !== false) {
    						$active = 'active';
                            $is_active = 'active';
    					}
						if($value['direct_indirect']== 'direct'){
							$show_direct.='<li class="treeview '.$active.'"><a href="'.base_url().''.$row['list_link'].'"><i class="fa '.$row['icon_class'].'"></i> <span>'.$row['submodule_name'].'</span></a></li>';
							$display_none = 'display_none';
						}else{
							$subcontent.='<ul class="treeview-menu"><li class="'.$active.'"><a href="'.base_url().''.$row['list_link'].'"><i class="fa '.$row['icon_class'].'"></i> <span>'.$row['submodule_name'].' </span></a></li></ul>';
							$display_none = 'display_block';
						}
            		}
            	}
            	$content .= '<li class="treeview '.$is_active.' '.$display_none.'">
		          <a href="javascript:void(0);">
		            <i class="fa fa-folder"></i> <span>'.$value['module_name'].' </span>
		            <span class="pull-right-container">
		              <i class="fa fa-angle-left pull-right"></i>
		            </span>
		          </a>
		          '.$subcontent.'
		        </li>
				'.$show_direct ;
            }
            echo $content;
        }
        ?>
      	<li style="display: none;"><a href="<?php echo base_url();?>organisation/access/org_profile"><i class="fa fa-circle-o text-red"></i> <span>Organisation Profile</span></a></li>
        <li style="display: none;"><a href="<?php echo base_url();?>organisation/access/profile"><i class="fa fa-circle-o text-red"></i> <span>User Profile</span></a></li>
        <li style="display: none;"><a href="<?php echo base_url();?>organisation/access/change_password"><i class="fa fa-circle-o text-red"></i> <span>Change Password</span></a></li>
        <li style="display: none;"><a href="javascript:void(0);" hello="<!-- <?php echo base_url();?>organisation/access/logout -->" class="logout"><i class="fa fa-circle-o text-red "></i> <span>Sign out</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
</aside>
<script>
$('document').ready(function(){
  
    $('body').on('click','.sidebar-toggle',function() {
		if($('body').hasClass('sidebar-collapse')){
			$('body').removeClass('sidebar-collapse');
		}else{
			$('body').addClass('sidebar-collapse');
		}
	})
  //---------------------------------------------------------------------
    /*
     * This script is used for logout user
     */
    $('body').on('click','.logout',function() {
        if (!confirm("Do you want to logout")) {
            return false;
        } 
        $.get(APP_URL+'organisation/access/logout',{},function(response) {
            window.location.href = APP_URL+'organisation/login';
        }); 
    });
})
</script>