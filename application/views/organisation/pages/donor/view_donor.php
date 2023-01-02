<style>
.marBot20{
	margin-bottom:20px;
}
.checkbox{margin-left: 15px;}
.donor_form_class select{
	width: 70% !important;
    float: right !important;
     border: none !important;
    background: white !important;
    -webkit-appearance: none !important;
    pointer-events: none !important;
}
.donor_form_class input{
  width: 70% !important;
    float: right !important;
    border: none !important;
    pointer-events: none !important;
}
.donor_form_class label{
    width: 27% !important;
    float: inherit !important;
   text-align: right !important;
    margin-left: 10px !important;
    margin-top: 10px !important;
}
.donor_form_class img{
  margin-left: 33px;
}
#headerMsg{	margin:20px 0px;}
.dataTables-example th{	text-align:center;}
.ibox-content{padding: 10px;}
.dataTable_input{
	
}
</style>
<script>
	$(document).ready(function(){
		$('.dataTablesOrderB').DataTable( {
			"order": [[ 0, "desc" ]]
		});
    });
</script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
	
	<?php
	$heading = '';
  $page_heading = '';
	//var_dump($donor_data);
	if($donor_data ){
		$page_heading = 'View Donor Entity';
        $heading = 'Donor Details';
        $is_page_edit="";
		    $donor_id =$donor_data['donor_id']; 
		    $org_id =$donor_data['org_id']; 
		    $legal_name =$donor_data['legal_name'];  
        $brand_name =$donor_data['brand_name'];  
		    $code =$donor_data['code'];  
        $pan_number =$donor_data['pan_number'];  
        $redistered_address =$donor_data['redistered_address'];  
        $city =$donor_data['city'];  
        $state =$donor_data['state'];  
        $pincode =$donor_data['pincode'];  
        $pan_image =$donor_data['pan_image'];  
        $auth_sign =$donor_data['auth_sign'];  
        $logo_image =$donor_data['logo_image'];  
        $donor_image =$donor_data['donor_image'];  
        $art_image =$donor_data['art_image'];  
        $facebook =$donor_data['facebook'];  
        $instagram =$donor_data['instagram'];  
        $twitter =$donor_data['twitter'];  
        $linkedin =$donor_data['linkedin'];  

        $is_editable='readOnly';
	}else{
		
		$page_heading = 'Add New Donor Entity';
        $heading = 'Donor Details';
        $is_page_edit="";
		   $donor_id =0; 
		    $legal_name ='';  
        $brand_name ='';  
		    $code ='';
        $pan_number ='';
        $redistered_address ='';  
        $city ='';
        $state ='';
        $pincode ='';
        $pan_image ='';
        $auth_sign ='';
        $logo_image ='';
        $donor_image =''; 
        $art_image ='';
        $facebook ='';
        $instagram ='';
        $twitter ='';
        $linkedin ='';
        $is_editable='';  
	}
		
	?>

	<section class="content-header">
		<h1>
			<?php echo $page_heading; ?>
			<small></small>
			<a href="<?php echo base_url();?>organisation/donor/list" class="btn btn-default pull-right">Back</a>
		</h1>
	</section>
    <!-- Main content -->
	<div id="headerMsg"></div>
    
		<div class="content" style="margin-top: -20px; margin-bottom: -30px;">
			<!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $heading?></h3>
              <?php if($is_permitted['is_list']){ ?>
			  	<a href="<?php echo base_url();?>organisation/donor/edit_donor?id=<?php echo $donor_id; ?>" class="btn btn-default pull-right">Edit</a>
			  <?php }?>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="donor_form" method="post" role="form" class="donor_form_class">
              <div class="box-body">
				        <input type="hidden" class="form-control" id="donor_id" name="donor_id" value="<?php echo $donor_id;?>"> 
			           <div id="err_add_plan"></div>
                <div class="form-group">
                  <label for="legal_name">Legal name of donor</label>
                  
                  <input type="text" class="form-control" id="legal_name" name="legal_name" placeholder="Enter name here" value="<?php echo $legal_name;?>">
                  <input type="hidden"  id="is_page_edit" name="is_page_edit" value="<?php echo $is_page_edit;?>">
                </div>
                <div class="form-group">
                  <label for="code">Donor Acronym (code)</label>
                  <input type="text"  class="form-control" id="code" name="code" placeholder="Enter code here" value="<?php echo $code;?>">
                </div>
                <div class="form-group <?php echo $is_page_edit; ?>">
                  <label for="brand_name">Brand Name</label>
                  <input type="text" class="form-control" id="brand_name" name="brand_name"  value="<?php echo $brand_name;?>">
                </div>
                <div class="form-group <?php echo $is_page_edit; ?>">
                  <label for="pan_number">PAN Number</label>
                  <input type="text" class="form-control" id="pan_number" name="pan_number"  value="<?php echo $pan_number;?>">
                </div> 
                <div class="form-group <?php echo $is_page_edit; ?>">
                  <label for="pan_number">PAN Card Photo/Scan</label>
                                   

                    
                        <?php if($pan_image ){ 
                        ?>
                        <img src="<?php echo base_url();?>uploads/<?php echo $pan_image ?>" style="width:200px;">
                        <?php }else{
                        ?>
                        <img src="" style="width:200px;">
                        <?php }
                        ?>
                   
                  
                </div>  
                <div class="form-group <?php echo $is_page_edit; ?>">
                  <label for="redistered_address">Street Address</label>
                  <input type="text" class="form-control" id="redistered_address" name="redistered_address"  value="<?php echo $redistered_address;?>">
                </div>
                <div class="form-group <?php echo $is_page_edit; ?>">
                  <label for="city">City</label>
                  <input type="text" class="form-control" id="city" name="city" value="<?php echo $city;?>">
                </div>
                <div class="form-group <?php echo $is_page_edit; ?>">
                  <label for="state">State</label>
				<?php if($state!=''){?>
                  
                    <?php 
                    if($state_data){
                      foreach ($state_data as $key => $value) {
                        $selected='';
                        if($state==$value['name']){ 
                        echo '<input type="text" class="form-control" id="city" name="city" value="'.$value['name'].'">';
                      }
                      }
                    }
                      ?>
				<?php }?>
                </div>
                <div class="form-group <?php echo $is_page_edit; ?>">
                  <label for="pincode">Pin Code</label>
                  <input type="number" class="form-control" id="pincode" name="pincode" value="<?php if($pincode!=0){echo $pincode;}?>">
                </div>
                <div class="form-group <?php echo $is_page_edit; ?>">
                  <label for="auth_sign">Full Name of Authorised Signatory</label>
                  <input type="text" class="form-control" id="auth_sign" name="auth_sign"value="<?php echo $auth_sign;?>">
                </div>
                <div class="form-group <?php echo $is_page_edit; ?>">
                  <label for="pan_number">Primary Logo</label>
                     <?php if($logo_image ){ 
                        ?>
                        <img src="<?php echo base_url();?>uploads/<?php echo $logo_image ?>" style="width:200px;">
                        <?php }else{
                        ?>
                        <img src="" style="width:200px;">
                        <?php }
                        ?>
                      
                </div>
                <div class="form-group <?php echo $is_page_edit; ?>">
                  <label for="pan_number">All Donor Artwork</label>
                    <?php if($donor_image ){ 
                        ?>
                        <img src="<?php echo base_url();?>uploads/<?php echo $donor_image ?>" style="width:200px;">
                        <?php }else{
                        ?>
                        <img src="" style="width:200px;">
                        <?php }
                        ?>
                  </div>
                <div class="form-group <?php echo $is_page_edit; ?>">
                  <label for="pan_number">Instructions on how Doners are 
                    permitted to use the artwork</label>
                                
                        <?php if($art_image ){ 
                        ?>
                        <img src="<?php echo base_url();?>uploads/<?php echo $art_image ?>" style="width:200px;">
                        <?php }else{
                        ?>
                        <img src="" style="width:200px;">
                        <?php }
                        ?>
                    
                </div>
                <div class="form-group <?php echo $is_page_edit; ?>">
                  <label for="facebook">Facebook</label>
                  <input type="url" class="form-control" id="facebook" name="facebook"  value="<?php echo $facebook;?>">
                </div>
                <div class="form-group <?php echo $is_page_edit; ?>">
                  <label for="instagram">Instagram</label>
                  <input type="url" class="form-control" id="instagram" name="instagram"  value="<?php echo $instagram;?>">
                </div>
                <div class="form-group <?php echo $is_page_edit; ?>">
                  <label for="twitter">Twitter</label>
                  <input type="url" class="form-control" id="twitter" name="twitter"  value="<?php echo $twitter;?>">
                </div>
                <div class="form-group <?php echo $is_page_edit; ?>">
                  <label for="linkedin">LinkedIn</label>
                  <input type="url" class="form-control" id="linkedin" name="linkedin"  value="<?php echo $linkedin;?>">
                </div>
				
              </div>
              <!-- /.box-body -->

            </form>
        </div>
       </div>
          <!-- /.box -->

 <?php

/*replace or add with query*/
$content = '';
//var_dump($project_list);
if($project_list){
	$i = 1;
	foreach ($project_list as $value) {
		$content .= '<tr class="darker-on-hover">';
		
		$content .= '<td class="text-center">' . $value['year']. '</td>';
		$content .= '<td class="text-center"><i class="fa fa-inr" aria-hidden="true"></i> ' . $value['budget']. '</td>';
		$content .= '<td class="text-center"><i class="fa fa-inr" aria-hidden="true"></i> ' . $value['allocated']. '</td>';
		$content .= '<td class="text-center"><i class="fa fa-inr" aria-hidden="true"></i> ' . $value['disbursed']. '</td>'; // ngo id is teporarly used
		$content .= '<td class="text-center"><i class="fa fa-inr" aria-hidden="true"></i> ' . $value['pending']. '</td>'; // ngo id is teporarly used
	
		$content .= '<td class="text-center">';
		
		
		$content .= '<a href="'.base_url().'organisation/donor/add_budget'.'?budget_id='.$value['budget_id'].'" class="label label-info">Edit</a>';
	
		$content .= '&nbsp;<a href="javascript:void(0);"  class="remove_item label label-danger" name='.$value['budget_id'].' >Remove</a>';
			
		
		$content .= '</td>';
		$content .= '</tr>';
		$i++;
	}
}else{
	$content .= '<tr style="color: red;" class="darker-on-hover"><td</td><td</td><td</td><td</td><td</td><td</td><td class="text-center" colspan="10">No data Available</td>';
}
?>

	<div class="content">
		<div class="box box-primary">
			<div class="box-header with-border">
			  <h3 class="box-title">Donor Budget</h3>
			  <a href="<?php echo base_url();?>organisation/donor/add_budget?id=<?php echo $donor_id;?>" class="btn btn-success pull-right">Add Budget</a>
			</div>
					<!-- /.box-header -->
			<div class="box-body" >
				<div class="table-responsive">
					<table id="blog_view_table" class="dataTablesOrderB table table-striped table-bordered table-hover" >
						<thead>
							<tr>
								<th class="text-center">Year</th>
								<th class="text-center">Budget</th>
								<th class="text-center">Amt Allocated</th>
								<th class="text-center">Amt Disbursed</th>
								<th class="text-center">Amt Pending</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
								<?php echo $content; ?>
						</tbody>
						
					</table>
				</div>
			</div>
			<!-- /.box-body -->
		</div>
	</div>
		
      <!-- /.row -->
   
    <!-- /.content -->

<script>
$('document').ready(function(){
	$('body').on('click', '.remove_item', function () {	
		if (!confirm("Do you want to delete")) {
            return false;
        }	
		$.blockUI();
        var id = $(this).attr('name');
		console.log(id);
       	$.post(APP_URL + 'organisation/donor/remove_budget', {
			id: id,
		},
		function (response) {
			$("html, body").animate({scrollTop: 0}, "slow");
			$('#headerMsg').empty();
			if (response.status == 200) {	
				$('#headerMsg').html("<div class='alert alert-success fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong>&nbsp;&nbsp;<a onclick='location.reload();' href='javascript:void(0);'></a></div>");
				$("#headerMsg").fadeTo(2000, 500).slideUp(500, function(){
					$('#headerMsg').empty();
					location.reload();
				});
			} else if (response.status == 201) {
				$('#headerMsg').html("<div class='alert alert-danger fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
				$("#headerMsg").fadeTo(2000, 500).slideUp(500, function(){
					$('#headerMsg').empty();
				});
			}
			$.unblockUI();
			
		}, 'json');
	});
	
});
</script>