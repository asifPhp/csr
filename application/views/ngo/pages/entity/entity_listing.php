<style>
#headerMsg{	margin:20px 0px;}
.dataTables-example th{	text-align:center;}
.ibox-content{padding: 10px;}

</style>


<div class="content-wrapper animated fadeInRight">
	<section class="content-header">
     	<h1>
        	Organisation Profile
        	<small></small>
      	</h1>
     
    </section>
    <!-- Main content -->
    <div class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Organisation Details</h3>
				<a  data-toggle="modal" data-target="#superNGOModal"  class="btn btn-default pull-right">edit</a>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
            	<h2><?php if($profile_data){ echo $profile_data['brand_name']; } ?></h2>
            </div>
            <?php $this->load->view('ngo/pages/ngo_profile');?>
          </div>
    	</div>
      </div>
		<div class="row">
			<div class="col-lg-12">
				<div class="box box-primary">
					<div class="ibox float-e-margins">
						<div class="box-header with-border">
							<h3 class="box-title">Entities</h3>
							<?php if($is_permitted['is_add']){ ?>
								<a style="float: right;" href="<?php echo base_url().'ngo/entity/index'; ?>"  class="btn btn-success pull-right">Create Entity</a>
							<?php }?>
						</div>
						<div class="ibox-content">
							<div id="headerMsg"></div>
							<div class="row">
								<?php $content ='';
								if($listdata){
									$i = 1;
									foreach ($listdata as $key=>$value) {
										$content .= '<div class="col-md-3">
											<div class="panel panel-default">
											  <div class="panel-body text-center">
											    <h4>'.$value['legal_name'].'</h4><br/>';
										if($is_permitted['is_edit']){ 
											$content .= '<div class="col-md-6"><a href="'.base_url().'ngo/entity/edit?id='.$value['id'].'" class="btn btn-success btn-block edit_module"  name="' . $value['id'] . '" value=""> <i class="fa fa-edit"></i> </a></div>';
										}
										if($is_permitted['is_remove']){
											$content .= '<div class="col-md-6"><a href="javascript:void(0);" class="btn btn-danger btn-block remove_item" primary_column_name="id"  table_name="ngo" name="' . $value['id'] . '"  > <i class="fa fa-trash"></i> </a></div>';
										}
										$content .= '</div>
											</div>
										</div>';
										$i++;
									}
									echo $content;
								}
								?>
								
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<script>
$('document').ready(function(){

	$('body').on('click', '.remove_item', function () {	
		if (!confirm("Do you want to delete")) {
            return false;
        }	
		$.blockUI();
        var id = $(this).attr('name');
        var primary_column_name = $(this).attr('primary_column_name');
        var table_name = $(this).attr('table_name');
		$.post(APP_URL + 'ngo/common/remove', {
			id: id,
			table_name: table_name,
			primary_column_name: primary_column_name,
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

