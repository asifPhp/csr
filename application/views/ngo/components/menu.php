<header class="main-header">
    <!-- Logo -->
    <a  href="javascript:void(0);" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><?php echo $this->session->userdata('superngo_name');?></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"> <?php echo $this->session->userdata('superngo_name');?></span>
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

      <div  class="navbar-custom-menu">
        <ul  id="firstProfile" class="nav navbar-nav">
          
          <li   class="dropdown user user-menu">
            <a   href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
              <img  src="<?php echo base_url().'uploads/'.$this->session->userdata('staff_profile_image');?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->session->userdata('first_name').' '.$this->session->userdata('last_name');?></span>
            </a>
            <ul  class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url().'uploads/'.$this->session->userdata('staff_profile_image');?>" class="img-circle" alt="User Image">
                <p>
                  <a style="color: #fff;" href="<?php echo base_url();?>ngo/access/profile">
					  <button class="btn btn-default">     <?php echo $this->session->userdata('first_name').' '.$this->session->userdata('last_name');?>
					  </button></a>
                </p>
              </li>
              
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url();?>ngo/access/change_password" class="btn btn-default btn-flat">Change Password</a>
                </div>
                <div class="pull-right">
                  <button class="btn btn-default btn-flat logout">Sign out</button>
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
          <img src="<?php echo base_url().'uploads/'.$this->session->userdata('staff_profile_image');?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('first_name').' '.$this->session->userdata('last_name');?></p>
          <a href="javascript:void(0);"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu side_menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
      
        <li>
          <a style="display:none;" href="<?php echo base_url();?>ngo/configure">
            <i class="fa fa-pie-chart"></i> <span>Dashboard</span>
          </a>
        </li> 
	   <?php 
        if(($access_data)){
            $content = '';
			//var_dump($_SERVER['HTTP_HOST']);
            $current_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            if($_SERVER['HTTP_HOST'] == 'localhost'){
				$current_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            }elseif($_SERVER['HTTP_HOST'] == 'compass-csr.com'){
				$current_url = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            }else{
              $current_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            }
            $current_path = explode(base_url(),$current_url)[1];
			$submodule_array=array();
            foreach($access_data as $value){
               //var_dump($value);
                $subcontent = '';
                $show_direct = '';
                $is_active = '';
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
							$show_direct.='<li id="first'.$row['submodule_id'].'" class="'.$active.' submodule1" name_used="'.$row['submodule_name'].'"><a href="'.base_url().''.$row['link'].'"><i class="fa '.$row['icon_class'].'"></i><span>'.$row['submodule_name'].'</span></a></li>';
							$display_none = 'display_none';
						}else{
							$subcontent.='<ul class="treeview-menu"><li class="'.$active.' submodule"><a href="'.base_url().''.$row['link'].'"><i class="fa '.$row['icon_class'].'"></i><span>'.$row['submodule_name'].'</span></a></li></ul>';
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
							$show_direct.='<li  id="first'.$row['submodule_id'].'"  class="'.$active.' submodule1" name_used="'.$row['submodule_name'].'"><a href="'.base_url().''.$row['list_link'].'"><i class="fa '.$row['icon_class'].'"></i> <span>'.$row['submodule_name'].' </span></a></li>';
							$display_none = 'display_none';
						}else{
							$subcontent.='<	 class="treeview-menu"><li class="'.$active.'"><a href="'.base_url().''.$row['list_link'].'"><i class="fa '.$row['icon_class'].'"></i><span> '.$row['submodule_name'].'</span> </a></li></ul>';
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
       
        <li style="display: none;"><a href="" id="my_element"><i class="fa fa-circle-o text-red"></i> <span>Tour</span></a></li>
        <li style="display: none;" ><a href="" id="my_other_element"><i class="fa fa-circle-o text-red"></i> <span>Tour</span></a></li>
        
		<li style="display: none;"><a href="<?php echo base_url();?>ngo/access/profile"><i class="fa fa-circle-o text-red"></i> <span>User Profile</span></a></li>
        <li style="display: none;"><a href="<?php echo base_url();?>ngo/access/change_password"><i class="fa fa-circle-o text-red"></i> <span>Change Password</span></a></li>
        <li style="display: none;"><a href="javascript:void(0);" hello="<?php echo base_url();?>ngo/access/logout" class="logout"><i class="fa fa-circle-o text-red "></i> <span>Sign out</span></a></li>
      </ul>
	  <?php 
	  //if($ngo_notification){
		 // var_dump($ngo_notification);
	 // }
	  
	  ?>
    </section>
    <!-- /.sidebar -->
  </aside>
<script>
$('document').ready(function(){
	
  //---------------------------------------------------------------------
    /*
     * This script is used for logout user
     */
    $('body').on('click','.sidebar-toggle',function() {
		if($('body').hasClass('sidebar-collapse')){
			$('body').removeClass('sidebar-collapse');
		}else{
			$('body').addClass('sidebar-collapse');
		}
	})
    $('body').on('click','.logout',function() {
        if (!confirm("Do you want to logout")) {
            return false;
        } 
        $.get(APP_URL+'ngo/access/logout',{},function(response) {
            window.location.href = APP_URL+'ngo/login';
        }); 
    });
	
	
	
	
	
	
	
	
	var arr = [];
	var arr1 = [];
	
	
	var profile='yes';
	$(".side_menu .submodule1").each(function(key, value){
		console.log(key);
		console.log(profile);
		var module_name = $(this).attr('name_used');
		if(module_name=='Organisation Profile'){
			arr.push({
				number:1,
				reflex:false,
				element: "#first3",
				title: "Organisation Profile",
				content: "You can edit the details of your organisation here. You can also add multiple legal entities for a single parent brand."
			});
		}else if(module_name=='Create new Proposal'){
			arr.push({
				number:2,
				reflex:false,
				element: "#first7",
				title: "Create new Proposal",
				content: "Here you can create a new proposal to submit to a particular donor organisation. Only do this after you have set up your organisation profile and created at least one legal entity for your organisation"
			});
		}
		else if(module_name=='Proposals'){
			arr.push({
				number:3,
				reflex:false,
				element: "#first4",
				title: "View/Edit/Manage Proposals",
				content: "Use this tab to see a list of all the proposals you have created. You can see their statuses as well as make changes to them whenever required."
			});
		}else if(module_name=='Live Projects'){
			arr.push({
				number:4,
				reflex:false,
				element: "#first5",
				title: "Manage Your Live Projects",
				content: "Here you can view and manage all the live projects (approved proposals) you have running with various donor organisations."
			});
		}
		else if(module_name=='Notifications'){
			arr.push({
				number:5,
				reflex:false,
				element: "#first6",
				title: "Notifications",
				content: "Any notifications about your organisation or proposal/project sent to you by your donor organisations will be shown here"
			});
		}
		else if(module_name=='Manage Users'){
			arr.push({
				number:6,
				
				element: "#first1",
				title: "Add/Manage Users",
				content: "Here you can give other users in your organisation access to this platform. You can also control which users have admin access vs regular access to your data"
			});
		}
		
	});
	
	arr.push({
		number:6,
		element: "#firstProfile",
		title: "View/Edit Your Profile",
		content: "Use this tab to edit your profile details and manage your account.",
		//placement: "right",
		smartPlacement: true,
		
	});
	
	
	arr.sort(function(a, b)
		{
			var a1=a.number;
			var b1=b.number;
			if (a1 == b1) { return 0; }
			if (a1 > b1)
			{
				return 1;
			}
			else
			{
				return -1;
			}
		});
	console.log(arr);
	$.post(APP_URL + 'ngo/staff/get_tour', {
		
	}, 
	function (response) {
				if(response.tourdata_value){
					var tour_data=response.tourdata_value;
					if(tour_data=='yes'){
						var tour = new Tour({
						 placement: "right",
						 smartPlacement: true,
						  backdrop: true,
						debug: true,
						storage: false,
						  steps: 
							$(arr).each(function(key, value){
								console.log(value);
							}),
							
							
							
							 onEnd: function(key, value){
								$.post(APP_URL + 'ngo/staff/end_tour', {
									
								})  
							 },
						});
						tour.init();
						tour.restart();
						
						/*setTimeout(function(){
							$.post(APP_URL + 'ngo/staff/end_tour', {
							
							}, 
							function (response) {
							},'json');	
						// Initialize the tour
						},1000);*/
					}
					
				}
	
	},'json');	
	
	
	

	
	
	
	
	
	
	
	
})
</script>