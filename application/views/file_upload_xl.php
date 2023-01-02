<link href="<?php echo base_url();?>assets/css/plugins/uploader.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>assets/js/plugins/demo.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/dmuploader.min.js"></script>
<style>

.file_dives{text-align: center; display: inline-block; margin: 10px; border: 1px solid #aaa;}
.img_remover{padding: 1px 8px; background-color: red; color: #fff; border-radius: 50%; margin: 4px;}
.content_modal{
	margin-left:22%;
}
..modal-backdrop.in{opacity: -3.5;
    display: none;}
</style>
  



	<div class="modal fade" id="browseFile2" tabindex="-1" course_package="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content" style="background-color: #f5f5f5;">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h3>Browse File</h3>
				</div>
				<div class="modal-body">
					<div id="head1_msg"></div>
					<input type="hidden" value="<?php if($image_cat){echo $image_cat;}else{ echo 'menu'; }?>" name="image_cat" class="image_cat">
					<input type="hidden" value="<?php if($sub_folder_name){ echo $sub_folder_name;}?>" name="sub_folder_name" class="sub_folder_name">
					<div class="row demo-columns">
					<div class="content_modal">
						<div class="col-md-8 offset-md-2">
							<p></p>
							
							<div class="image_upload_desc_show"></div>
							
							<!-- D&D Zone-->
							<div id="drag-and-drop-zone_xl" class="uploader">
								<div>Drag &amp; Drop Images Here</div>
								<div class="or">-or-</div>
								<div class="browser">
									<label>
										<span>Click to open the file Browser</span>
										<input type="file" name="files[]" multiple="multiple" class="image_upload_imaput" title='Click to add Files'>
									</label>
								</div>
								</div>
							
							<!-- /D&D Zone -->
							
						</div>
						<div class="clearfix"></div>
						<!-- / Left column -->
						<div class="col-md-8 offset-md-2">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">Uploads</h3>
								</div>
								<div class="panel-body demo-panel-files minHeight" id='demo-files'>
									<span class="demo-note">No Files have been selected/droped yet...</span>
								</div>
							</div>
						</div>
						</div>
						<!-- / Right column -->
					</div>
				</div><!-- / modal-body -->
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	
	<div class="modal fade" id="browseFilePage4" tabindex="-1" course_package="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content" style="background-color: #f5f5f5;">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h3>Browse File</h3>
				</div>
				<div class="modal-body">
					<div id="head1_msg"></div>
					<input type="hidden" value="<?php if($image_cat){echo $image_cat;}else{ echo 'menu'; }?>" name="image_cat" class="image_cat">
					<input type="hidden" value="<?php if($sub_folder_name){ echo $sub_folder_name;}?>" name="sub_folder_name" class="sub_folder_name">
					<div class="row demo-columns">
					<div class="content_modal">
						<div class="col-md-8 offset-md-2">
							<p></p>
							
							<div class="image_upload_desc_show"></div>
							
							<!-- D&D Zone-->
							<div id="drag-and-drop-zone_xl1" class="uploader">
								<div>Drag &amp; Drop Images Here</div>
								<div class="or">-or-</div>
								<div class="browser">
									<label>
										<span>Click to open the file Browser</span>
										<input type="file" name="files[]" multiple="multiple" class="image_upload_imaput" title='Click to add Files' accept=".xlsx,.xls">
									</label>
								</div>
								</div>
							
							<!-- /D&D Zone -->
							
						</div>
						<div class="clearfix"></div>
						<!-- / Left column -->
						<div class="col-md-8 offset-md-2">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">Uploads</h3>
								</div>
								<div class="panel-body demo-panel-files minHeight" id='demo-files'>
									<span class="demo-note">No Files have been selected/droped yet...</span>
								</div>
							</div>
						</div>
						</div>
						<!-- / Right column -->
					</div>
				</div><!-- / modal-body -->
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	
	<div class="modal fade" id="browseFilePage4_2" tabindex="-1" course_package="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content" style="background-color: #f5f5f5;">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h3>Browse File</h3>
				</div>
				<div class="modal-body">
					<div id="head1_msg"></div>
					<input type="hidden" value="<?php if($image_cat){echo $image_cat;}else{ echo 'menu'; }?>" name="image_cat" class="image_cat">
					<input type="hidden" value="<?php if($sub_folder_name){ echo $sub_folder_name;}?>" name="sub_folder_name" class="sub_folder_name">
					<div class="row demo-columns">
					<div class="content_modal">
						<div class="col-md-8 offset-md-2">
							<p></p>
							
							<div class="image_upload_desc_show"></div>
							
							<!-- D&D Zone-->
							<div id="drag-and-drop-zone_xl2" class="uploader">
								<div>Drag &amp; Drop Images Here</div>
								<div class="or">-or-</div>
								<div class="browser">
									<label>
										<span>Click to open the file Browser</span>
										<input type="file" name="files[]" multiple="multiple" class="image_upload_imaput" title='Click to add Files' accept=".xlsx,.xls">
									</label>
								</div>
								</div>
							
							<!-- /D&D Zone -->
							
						</div>
						<div class="clearfix"></div>
						<!-- / Left column -->
						<div class="col-md-8 offset-md-2">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">Uploads</h3>
								</div>
								<div class="panel-body demo-panel-files minHeight" id='demo-files'>
									<span class="demo-note">No Files have been selected/droped yet...</span>
								</div>
							</div>
						</div>
						</div>
						<!-- / Right column -->
					</div>
				</div><!-- / modal-body -->
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	
	<div class="modal fade" id="browseFilePage4_3" tabindex="-1" course_package="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content" style="background-color: #f5f5f5;">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h3>Browse File</h3>
				</div>
				<div class="modal-body">
					<div id="head1_msg"></div>
					<input type="hidden" value="<?php if($image_cat){echo $image_cat;}else{ echo 'menu'; }?>" name="image_cat" class="image_cat">
					<input type="hidden" value="<?php if($sub_folder_name){ echo $sub_folder_name;}?>" name="sub_folder_name" class="sub_folder_name">
					<div class="row demo-columns">
					<div class="content_modal">
						<div class="col-md-8 offset-md-2">
							<p></p>
							
							<div class="image_upload_desc_show"></div>
							
							<!-- D&D Zone-->
							<div id="drag-and-drop-zone_xl3" class="uploader">
								<div>Drag &amp; Drop Images Here</div>
								<div class="or">-or-</div>
								<div class="browser">
									<label>
										<span>Click to open the file Browser</span>
										<input type="file" name="files[]" multiple="multiple" class="image_upload_imaput" title='Click to add Files' accept=".xlsx,.xls">
									</label>
								</div>
								</div>
							
							<!-- /D&D Zone -->
							
						</div>
						<div class="clearfix"></div>
						<!-- / Left column -->
						<div class="col-md-8 offset-md-2">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">Uploads</h3>
								</div>
								<div class="panel-body demo-panel-files minHeight" id='demo-files'>
									<span class="demo-note">No Files have been selected/droped yet...</span>
								</div>
							</div>
						</div>
						</div>
						<!-- / Right column -->
					</div>
				</div><!-- / modal-body -->
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	
	<div class="modal fade" id="browseFilePage4_4" tabindex="-1" course_package="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content" style="background-color: #f5f5f5;">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h3>Browse File</h3>
				</div>
				<div class="modal-body">
					<div id="head1_msg"></div>
					<input type="hidden" value="<?php if($image_cat){echo $image_cat;}else{ echo 'menu'; }?>" name="image_cat" class="image_cat">
					<input type="hidden" value="<?php if($sub_folder_name){ echo $sub_folder_name;}?>" name="sub_folder_name" class="sub_folder_name">
					<div class="row demo-columns">
					<div class="content_modal">
						<div class="col-md-8 offset-md-2">
							<p></p>
							
							<div class="image_upload_desc_show"></div>
							
							<!-- D&D Zone-->
							<div id="drag-and-drop-zone_xl4" class="uploader">
								<div>Drag &amp; Drop Images Here</div>
								<div class="or">-or-</div>
								<div class="browser">
									<label>
										<span>Click to open the file Browser</span>
										<input type="file" name="files[]" multiple="multiple" class="image_upload_imaput" title='Click to add Files' accept=".xlsx,.xls">
									</label>
								</div>
								</div>
							
							<!-- /D&D Zone -->
							
						</div>
						<div class="clearfix"></div>
						<!-- / Left column -->
						<div class="col-md-8 offset-md-2">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">Uploads</h3>
								</div>
								<div class="panel-body demo-panel-files minHeight" id='demo-files'>
									<span class="demo-note">No Files have been selected/droped yet...</span>
								</div>
							</div>
						</div>
						</div>
						<!-- / Right column -->
					</div>
				</div><!-- / modal-body -->
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	
	<div class="modal fade" id="browseFilePage5_1" tabindex="-1" course_package="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content" style="background-color: #f5f5f5;">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h3>Browse File</h3>
				</div>
				<div class="modal-body">
					<div id="head1_msg"></div>
					<input type="hidden" value="<?php if($image_cat){echo $image_cat;}else{ echo 'menu'; }?>" name="image_cat" class="image_cat">
					<input type="hidden" value="<?php if($sub_folder_name){ echo $sub_folder_name;}?>" name="sub_folder_name" class="sub_folder_name">
					<div class="row demo-columns">
					<div class="content_modal">
						<div class="col-md-8 offset-md-2">
							<p></p>
							
							<div class="image_upload_desc_show"></div>
							
							<!-- D&D Zone-->
							<div id="drag-and-drop-zone_xl_page_5_1" class="uploader">
								<div>Drag &amp; Drop Images Here</div>
								<div class="or">-or-</div>
								<div class="browser">
									<label>
										<span>Click to open the file Browser</span>
										<input type="file" name="files[]" multiple="multiple" class="image_upload_imaput" title='Click to add Files' accept=".xlsx,.xls">
									</label>
								</div>
								</div>
							
							<!-- /D&D Zone -->
							
						</div>
						<div class="clearfix"></div>
						<!-- / Left column -->
						<div class="col-md-8 offset-md-2">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">Uploads</h3>
								</div>
								<div class="panel-body demo-panel-files minHeight" id='demo-files'>
									<span class="demo-note">No Files have been selected/droped yet...</span>
								</div>
							</div>
						</div>
						</div>
						<!-- / Right column -->
					</div>
				</div><!-- / modal-body -->
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	
	<div class="modal fade" id="browseFilePage5_2" tabindex="-1" course_package="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content" style="background-color: #f5f5f5;">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h3>Browse File</h3>
				</div>
				<div class="modal-body">
					<div id="head1_msg"></div>
					<input type="hidden" value="<?php if($image_cat){echo $image_cat;}else{ echo 'menu'; }?>" name="image_cat" class="image_cat">
					<input type="hidden" value="<?php if($sub_folder_name){ echo $sub_folder_name;}?>" name="sub_folder_name" class="sub_folder_name">
					<div class="row demo-columns">
					<div class="content_modal">
						<div class="col-md-8 offset-md-2">
							<p></p>
							
							<div class="image_upload_desc_show"></div>
							
							<!-- D&D Zone-->
							<div id="drag-and-drop-zone_xl_page_5_2" class="uploader">
								<div>Drag &amp; Drop Images Here</div>
								<div class="or">-or-</div>
								<div class="browser">
									<label>
										<span>Click to open the file Browser</span>
										<input type="file" name="files[]" multiple="multiple" class="image_upload_imaput" title='Click to add Files' accept=".xlsx,.xls">
									</label>
								</div>
								</div>
							
							<!-- /D&D Zone -->
							
						</div>
						<div class="clearfix"></div>
						<!-- / Left column -->
						<div class="col-md-8 offset-md-2">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">Uploads</h3>
								</div>
								<div class="panel-body demo-panel-files minHeight" id='demo-files'>
									<span class="demo-note">No Files have been selected/droped yet...</span>
								</div>
							</div>
						</div>
						</div>
						<!-- / Right column -->
					</div>
				</div><!-- / modal-body -->
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	
	
	<div class="modal fade" id="browseFilePage4_5" tabindex="-1" course_package="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content" style="background-color: #f5f5f5;">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h3>Browse File</h3>
				</div>
				<div class="modal-body">
					<div id="head1_msg"></div>
					<input type="hidden" value="<?php if($image_cat){echo $image_cat;}else{ echo 'menu'; }?>" name="image_cat" class="image_cat">
					<input type="hidden" value="<?php if($sub_folder_name){ echo $sub_folder_name;}?>" name="sub_folder_name" class="sub_folder_name">
					<div class="row demo-columns">
					<div class="content_modal">
						<div class="col-md-8 offset-md-2">
							<p></p>
							
							<div class="image_upload_desc_show"></div>
							
							<!-- D&D Zone-->
							<div id="drag-and-drop-zone_xl5" class="uploader">
								<div>Drag &amp; Drop Images Here</div>
								<div class="or">-or-</div>
								<div class="browser">
									<label>
										<span>Click to open the file Browser</span>
										<input type="file" name="files[]" multiple="multiple" class="image_upload_imaput" title='Click to add Files' accept=".xlsx,.xls">
									</label>
								</div>
							</div>
							
							<!-- /D&D Zone -->
							
						</div>
						<div class="clearfix"></div>
						<!-- / Left column -->
						<div class="col-md-8 offset-md-2">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">Uploads</h3>
								</div>
								<div class="panel-body demo-panel-files minHeight" id='demo-files'>
									<span class="demo-note">No Files have been selected/droped yet...</span>
								</div>
							</div>
						</div>
						</div>
						<!-- / Right column -->
					</div>
				</div><!-- / modal-body -->
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	
	<div class="modal fade" id="browseFilePage4_6" tabindex="-1" course_package="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content" style="background-color: #f5f5f5;">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h3>Browse File</h3>
				</div>
				<div class="modal-body">
					<div id="head1_msg"></div>
					<input type="hidden" value="<?php if($image_cat){echo $image_cat;}else{ echo 'menu'; }?>" name="image_cat" class="image_cat">
					<input type="hidden" value="<?php if($sub_folder_name){ echo $sub_folder_name;}?>" name="sub_folder_name" class="sub_folder_name">
					<div class="row demo-columns">
					<div class="content_modal">
						<div class="col-md-8 offset-md-2">
							<p></p>
							
							<div class="image_upload_desc_show"></div>
							
							<!-- D&D Zone-->
							<div id="drag-and-drop-zone_xl6" class="uploader">
								<div>Drag &amp; Drop Images Here</div>
								<div class="or">-or-</div>
								<div class="browser">
									<label>
										<span>Click to open the file Browser</span>
										<input type="file" name="files[]" multiple="multiple" class="image_upload_imaput" title='Click to add Files' accept=".xlsx,.xls">
									</label>
								</div>
							</div>
							
							<!-- /D&D Zone -->
							
						</div>
						<div class="clearfix"></div>
						<!-- / Left column -->
						<div class="col-md-8 offset-md-2">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">Uploads</h3>
								</div>
								<div class="panel-body demo-panel-files minHeight" id='demo-files'>
									<span class="demo-note">No Files have been selected/droped yet...</span>
								</div>
							</div>
						</div>
						</div>
						<!-- / Right column -->
					</div>
				</div><!-- / modal-body -->
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>


<script>
$('document').ready(function(){
	var file_counter=0;
	var click_this = '';
	var file_prev_class = '';
	var image_upload_desc = '';
	var file_input_id ='';
	var file_count = 'single';
	
	$('body').on('click','.comman_file_upload_class',function(){
		click_this = $(this);
		file_prev_class = $(this).attr('file_prev_class');
		image_upload_desc = $(this).attr('image_upload_desc');
		$('.image_upload_desc_show').text(image_upload_desc);
		console.log(image_upload_desc);
		file_input_id = $(this).attr('file_input_id');
		$('.image_upload_imaput').val('');
		$('#demo-files').empty().append('<span class="demo-note">No Files have been selected/droped yet...</span>');;
		file_count = $(this).attr('file_count');
	});
	
	/*uploading drag and drop image*/
	
	 
	
	
	
	$('#drag-and-drop-zone_xl1').dmUploader({
        url: APP_URL+'common/upload_file_xl_page4',
        dataType: 'json',
		extraData: {
			image_cat:$('.image_cat').val(),
			sub_folder_name:$('.sub_folder_name').val(),
		},
		maxFiles :'1',
		fileName : 'uploadFile',
		//maxFileSize :'1',
        //allowedTypes: 'xlsx',
        //extFilter: 'xlsx;',
        onInit: function(){
			$.danidemo.addLog('#demo-debug', 'default', 'Plugin initialized correctly');
        },
        onBeforeUpload: function(id){
          
		  $.danidemo.addLog('#demo-debug', 'default', 'Starting the upload of #' + id);

          $.danidemo.updateFileStatus(id, 'default', 'Uploading...');
        },
        onNewFile: function(id, file){
			$('.demo-panel-files').empty();
			$.danidemo.addFile('#demo-files', id, file);
        },
        onComplete: function(){
			$.danidemo.addLog('#demo-debug', 'default', 'All pending tranfers completed');
        },
        onUploadProgress: function(id, percent){
			var percentStr = percent + '%';

			$.danidemo.updateFileProgress(id, percentStr);
        },
        onUploadSuccess: function(id, data){
			var status= data.status;
			var excel_array = data.excel_array;
			//var upload_file = data.upload_file;
			//var file_size = data.file_size;
			console.log(excel_array);
			if(status == 200){
				if(excel_array){
					var content='';
					var i=0;
					$(excel_array).each (function(key,val){
						console.log("val");
						console.log(val);
						i++;
						var selected='';
						var selected1='';
						var name_of_member=val.name_of_member;
						if(name_of_member==null){
							name_of_member='';
						}
						var member_age=val.member_age;
						if(member_age==null){
							member_age='';
						}
						var member_gender=val.member_gender;
						if(member_gender==null){
							member_gender='';
						}
						if(member_gender=='Male' || member_gender=='male'){
							selected='selected';
						}else if(member_gender=='Female' || member_gender=='female'){
							selected1='selected';
						}
						var member_designation=val.member_designation;
						if(member_designation==null){
							member_designation='';
						}
						var member_join_at=val.member_join_at;
						console.log("member_join_at");
						console.log(member_join_at);
						if(member_join_at==null){
							member_join_at='';
							
						}else if(member_join_at!=null){
							
							var  isValidDate = Date.parse(member_join_at);
							if (isNaN(isValidDate)) {
								member_join_at='';
							}else{
								var member_join_at = $.datepicker.formatDate('yy-mm-dd', new Date(member_join_at));
							}
						}else{
							member_join_at='';
						}
						var member_related_to_other=val.member_related_to_other;
						if(member_related_to_other==null){
							member_related_to_other='';
						}
						var member_occupation=val.member_occupation;
						if(member_occupation==null){
							member_occupation='';
						}
						
						content+='<div class="panel panel-default ">';
						content+='<div class="row panel-body ">';
						
						content+='<div class="form-group col-md-12">';
						content+='<button type="button" class="btn btn-danger pull-right GoverningMemberRemovepara"><i class="fa fa-close"></i></button> ';                    
						content+='</div>';
						
						content+='<div class="row">';
						content+='<div class="col-md-12">';
						content+='<div class="form-group col-md-4">';
						content+='<label for="name_of_member">Name of member <span class="required">*</span></label>';
						content+='<input type="text" class="form-control name_of_member" name="name_of_member" placeholder="Enter name of member" value="'+name_of_member+'">';
						content+='</div>';
						content+='<div class="form-group col-md-2">';
						content+='<label for="member_age">Age <span class="required">*</span><span id="errmsg"></span></label>';
						content+='<input type="number" class="form-control member_age" name="member_age" placeholder="Age" value="'+member_age+'">';
						content+='</div> ';
						content+='<div class="form-group col-md-2">';
						content+='<label for="member_gender">Gender <span class="required">*</span></label>';
						content+='<select name="member_gender" class="form-control select_button member_gender">';       
						content+='<option value="">Select gender </option>';
						content+='<option value="Male" '+selected+'> Male </option>';
						content+='<option value="Female" '+selected1+'> Female </option>';
						content+='</select>';
						content+='</div>';
						content+='<div class="form-group col-md-4">';
						content+='<label for="member_designation">Designation within the governing body <span class="required">*</span></label>';
						content+='<input type="text" class="form-control member_designation" name="member_designation" placeholder="Enter details here" value="'+member_designation+'">';
						content+='</div>';
						content+='</div>';
						content+='</div>';
						content+='<div class="row">';
						content+='<div class="col-md-12">';
						content+='<div class="form-group col-md-4">';
						content+='<label for="member_join_at">Since when is this person part of the governing body<span class="required">*</span></label>';
						content+='<input type="text" readonly class="form-control old_date member_join_at" name="member_join_at" placeholder="Enter details here" value="'+member_join_at+'">';
						content+='</div>';
						content+='<div class="form-group col-md-4">';
						content+='<label for="member_related_to_other">Is the member related to any other governing body member by blood <span class="required">*</span></label>';
						content+='<input type="text" class="form-control member_related_to_other" name="member_related_to_other" placeholder="Enter details here" value="'+member_related_to_other+'">';
						content+='</div>';
						content+='<div class="form-group col-md-4">';
						content+='<label for="member_occupation">Profession / Occupation of the member <span class="required">*</span><br/>&nbsp;</label>';
						content+='<input type="text" class="form-control member_occupation" name="member_occupation" placeholder="Enter details here" value="'+member_occupation+'">';
						content+='</div>';
						content+='</div>';
						content+='</div>';
						content+='</div>';
						content+='</div>';
						
						//console.log(content);
						//$(".new_member_array").empty(); 
					
						
					});
					
					$('#GoverningMemberTextBoxContainer .panel').each(function(key, val) {
						var fill_value='no';
						var name_of_member= $(this).find('.name_of_member').val();
						var member_age= $(this).find('.member_age').val();
						var member_gender= $(this).find('.member_gender').children("option:selected").val();
						var member_designation= $(this).find('.member_designation').val();
						var member_join_at= $(this).find('.member_join_at').val();
						var member_related_to_other= $(this).find('.member_related_to_other').val();
						var member_occupation= $(this).find('.member_occupation').val();
						
						if(name_of_member){	fill_value='yes';
						}else if(member_age){fill_value='yes';
						}else if(member_gender){fill_value='yes';
						}else if(member_designation){fill_value='yes';
						}else if(member_join_at){fill_value='yes';
						}else if(member_related_to_other){fill_value='yes';
						}else if(member_occupation){fill_value='yes';
						}else{fill_value='no';}
						
						console.log("fill_value");
						console.log(fill_value);
						if(fill_value=='no'){
							$(this).remove();
						}
					
					});
					
					
					
					$(".new_member_array").append(content);
					
					var time = 'old_date_1_'+$. now();
					$('#GoverningMemberTextBoxContainer .old_date').addClass(time);
						
						setTimeout(function() {
							$(function () {
								$('.'+time).datepicker({
									changeMonth: true,
									changeYear: true,
									dateFormat: 'yy-mm-dd',
									maxDate: 'dateToday',
									yearRange : 'c-75:c+75',
								});
							});
						}, 500);
					
					$('#GoverningMemberTextBoxContainer .panel').each(function(key, val) {
						if(key==0){
							$(this).find('.GoverningMemberRemovepara').remove();
						}
					
					});
				
				}
				
				$('#browseFilePage4').modal('hide');
			}else{
                $('#browseFilePage4').modal('hide');
                alert(data.message);
			}
			$.danidemo.addLog('#demo-debug', 'success', 'Upload of file #' + id + ' completed');

			$.danidemo.addLog('#demo-debug', 'info', 'Server Response for file #' + id + ': ' + JSON.stringify(data));

			$.danidemo.updateFileStatus(id, 'success', 'Upload Complete');

			$.danidemo.updateFileProgress(id, '100%');
        },
        onUploadError: function(id, message){
			alert(message);
			$.danidemo.updateFileStatus(id, 'error', message);

			$.danidemo.addLog('#demo-debug', 'error', 'Failed to Upload file #' + id + ': ' + message);
        },
        onFileTypeError: function(file){
			alert('File \'' + file.name + '\' cannot be added: must be an image');
			$.danidemo.addLog('#demo-debug', 'error', 'File \'' + file.name + '\' cannot be added: must be an image');
        },
        onFileSizeError: function(file){
			alert('File \'' + file.name + '\' cannot be added: size excess limit');
			$.danidemo.addLog('#demo-debug', 'error', 'File \'' + file.name + '\' cannot be added: size excess limit');
        },
        /*onFileExtError: function(file){
          $.danidemo.addLog('#demo-debug', 'error', 'File \'' + file.name + '\' has a Not Allowed Extension');
        },*/
        onFallbackMode: function(message){
			alert('info', 'Browser not supported(do something else here!): ' + message);
			$.danidemo.addLog('#demo-debug', 'info', 'Browser not supported(do something else here!): ' + message);
        },
		onFilesMaxError: function(file){
			alert(' cannot be added to queue due to upload limits.');
		  $.danidemo.addLog(file.name + ' cannot be added to queue due to upload limits.');
		}
    });
	
	
	$('#drag-and-drop-zone_xl5').dmUploader({
        url: APP_URL+'common/upload_file_xl_page4_5',
        dataType: 'json',
		extraData: {
			image_cat:$('.image_cat').val(),
			sub_folder_name:$('.sub_folder_name').val(),
		},
		maxFiles :'1',
		fileName : 'uploadFile',
		//maxFileSize :'1',
        //allowedTypes: 'xlsx',
        //extFilter: 'xlsx;',
        onInit: function(){
			$.danidemo.addLog('#demo-debug', 'default', 'Plugin initialized correctly');
        },
        onBeforeUpload: function(id){
          
		  $.danidemo.addLog('#demo-debug', 'default', 'Starting the upload of #' + id);

          $.danidemo.updateFileStatus(id, 'default', 'Uploading...');
        },
        onNewFile: function(id, file){
			$('.demo-panel-files').empty();
			$.danidemo.addFile('#demo-files', id, file);
        },
        onComplete: function(){
			$.danidemo.addLog('#demo-debug', 'default', 'All pending tranfers completed');
        },
        onUploadProgress: function(id, percent){
			var percentStr = percent + '%';

			$.danidemo.updateFileProgress(id, percentStr);
        },
        onUploadSuccess: function(id, data){
			var status= data.status;
			var excel_array = data.excel_array;
			//var upload_file = data.upload_file;
			//var file_size = data.file_size;
			console.log(excel_array);
			if(status == 200){
				if(excel_array){
					var content='';
					var i=0;
					$(excel_array).each (function(key,val){
						console.log("val");
						console.log(val);
						i++;
												
						var name_of_asset=val.name_of_asset;
						var location=val.location;
						var value=val.value;
						if(name_of_asset==null)	{
							name_of_asset='';
						}
						if(location==null)	{
							location='';
						}
						if(value==null)	{
							value='';
						}					
						content+='<div class="panel panel-default">';
						content+='<div class=" panel-body">';
						
						content+='<div class="form-group col-md-12" style="margin-bottom: -16px; margin-left: 13px;margin-top: -8px;">';
						content+='<button type="button" class="btn btn-danger pull-right RegistrationRemovepara1"><i class="fa fa-close"></i></button> ';                    
						content+='</div>';
						
						content+='<div class="row">';
						content+='<div class="form-group col-md-4">';
						content+='<label for="name_of_asset">Name of Asset <span class="required">*</span></label>';
						content+='<input type="text" class="form-control name_of_asset" id="name_of_asset" name="name_of_asset" placeholder="Enter name of Asset" value="'+name_of_asset+'">';
						content+='</div>'; 
						content+='<div class="form-group col-md-4">';
						content+='<label for="location">Location<span class="required">*</span><span id="errmsg"></span></label>';
						content+='<input type="text" class="form-control location" id="location" name="location" placeholder="location" value="'+location+'">';
						content+='</div>';
						content+='<div class="form-group col-md-4">';
						content+='<label for="value">Value<span class="required">*</span><span id="errmsg"></span></label>';
						content+='<input type="text" class="form-control value" id="value" name="value" placeholder="value" value="'+value+'">';
						content+='</div>';
						/*content+='<div class="form-group col-md-1">';
					    content+='<label for="value">&nbsp;</label><br/>';
						content+='<button type="button" class="btn btn-danger pull-right RegistrationRemovepara1"><i class="fa fa-close"></i></button>';                     
						content+='</div>';*/
						content+='</div>';
						content+='</div>';
						content+='</div>';
						
						//console.log(content);
						//$(".new_member_array").empty(); 
					
						
					});
					
					$('#detail_of_vehicles_and_other_assets .panel').each(function(key, val) {
						var fill_value='no';
						var name_of_asset= $(this).find('.name_of_asset').val();
						var location1= $(this).find('.location').val();
						var value= $(this).find('.value').val();
						
						
						if(name_of_asset){	fill_value='yes';
						}else if(location1){fill_value='yes';
						}else if(value){fill_value='yes';
						}else{fill_value='no';}
						
						console.log("fill_value");
						console.log(fill_value);
						if(fill_value=='no'){
							$(this).remove();
						}
					
					});
					
					$(".cladd_detail_of_vehicles_and_other_assets").append(content); 
						
					$('#detail_of_vehicles_and_other_assets .panel').each(function(key, val) {
						if(key==0){
							$(this).find('.RegistrationRemovepara1').remove();
						}
					
					});
						
				}
				
				$('#browseFilePage4_5').modal('hide');
			}else{
                $('#browseFilePage4_5').modal('hide');
                alert(data.message);
			}
			$.danidemo.addLog('#demo-debug', 'success', 'Upload of file #' + id + ' completed');

			$.danidemo.addLog('#demo-debug', 'info', 'Server Response for file #' + id + ': ' + JSON.stringify(data));

			$.danidemo.updateFileStatus(id, 'success', 'Upload Complete');

			$.danidemo.updateFileProgress(id, '100%');
        },
        onUploadError: function(id, message){
			alert(message);
			$.danidemo.updateFileStatus(id, 'error', message);

			$.danidemo.addLog('#demo-debug', 'error', 'Failed to Upload file #' + id + ': ' + message);
        },
        onFileTypeError: function(file){
			alert('File \'' + file.name + '\' cannot be added: must be an image');
			$.danidemo.addLog('#demo-debug', 'error', 'File \'' + file.name + '\' cannot be added: must be an image');
        },
        onFileSizeError: function(file){
			alert('File \'' + file.name + '\' cannot be added: size excess limit');
			$.danidemo.addLog('#demo-debug', 'error', 'File \'' + file.name + '\' cannot be added: size excess limit');
        },
        /*onFileExtError: function(file){
          $.danidemo.addLog('#demo-debug', 'error', 'File \'' + file.name + '\' has a Not Allowed Extension');
        },*/
        onFallbackMode: function(message){
			alert('info', 'Browser not supported(do something else here!): ' + message);
			$.danidemo.addLog('#demo-debug', 'info', 'Browser not supported(do something else here!): ' + message);
        },
		onFilesMaxError: function(file){
			alert(' cannot be added to queue due to upload limits.');
		  $.danidemo.addLog(file.name + ' cannot be added to queue due to upload limits.');
		}
    });
	
	$('#drag-and-drop-zone_xl6').dmUploader({
        url: APP_URL+'common/upload_file_xl_page4_5',
        dataType: 'json',
		extraData: {
			image_cat:$('.image_cat').val(),
			sub_folder_name:$('.sub_folder_name').val(),
		},
		maxFiles :'1',
		fileName : 'uploadFile',
		//maxFileSize :'1',
        //allowedTypes: 'xlsx',
        //extFilter: 'xlsx;',
        onInit: function(){
			$.danidemo.addLog('#demo-debug', 'default', 'Plugin initialized correctly');
        },
        onBeforeUpload: function(id){
          
		  $.danidemo.addLog('#demo-debug', 'default', 'Starting the upload of #' + id);

          $.danidemo.updateFileStatus(id, 'default', 'Uploading...');
        },
        onNewFile: function(id, file){
			$('.demo-panel-files').empty();
			$.danidemo.addFile('#demo-files', id, file);
        },
        onComplete: function(){
			$.danidemo.addLog('#demo-debug', 'default', 'All pending tranfers completed');
        },
        onUploadProgress: function(id, percent){
			var percentStr = percent + '%';

			$.danidemo.updateFileProgress(id, percentStr);
        },
        onUploadSuccess: function(id, data){
			var status= data.status;
			var excel_array = data.excel_array;
			//var upload_file = data.upload_file;
			//var file_size = data.file_size;
			console.log(excel_array);
			if(status == 200){
				if(excel_array){
					var content='';
					var i=0;
					$(excel_array).each (function(key,val){
						console.log("val");
						console.log(val);
						i++;
												
						var name_of_asset=val.name_of_asset;
						var location=val.location;
						var value=val.value;
						if(name_of_asset==null)	{
							name_of_asset='';
						}
						if(location==null)	{
							location='';
						}
						if(value==null)	{
							value='';
						}else{
							console.log("value fdsfsafsfsdfsdf");
							console.log(value);
							value=(parseInt(value.replace(/,/g,''), 10));
							
						}					
						content+='<div class="panel panel-default">';
						content+='<div class=" panel-body">';
						
						content+='<div class="form-group col-md-12" style="margin-bottom: -16px; margin-left: 13px;margin-top: -8px;">';
						content+='<button type="button" class="btn btn-danger pull-right RegistrationRemovepara1"><i class="fa fa-close"></i></button> ';                    
						content+='</div>';
						
						content+='<div class="row">';
						content+='<div class="form-group col-md-4">';
						content+='<label for="title_of_traveller">Title of Traveler<span class="required">*</span></label>';
						content+='<input type="text" class="form-control title_of_traveller" id="title_of_traveller" name="title_of_traveller" placeholder="Enter Title of Traveler" value="'+name_of_asset+'">';
						content+='</div>'; 
						content+='<div class="form-group col-md-4">';
						content+='<label for="location_purpose">Location and purpose<span class="required">*</span><span id="errmsg"></span></label>';
						content+='<input type="text" class="form-control location_purpose" id="location_purpose" name="location_purpose" placeholder="Enter Location and Purpose" value="'+location+'">';
						content+='</div>';
						content+='<div class="form-group col-md-4">';
						content+='<label for="cost_incurred">Cost Incurred<span class="required">*</span><span id="errmsg"></span></label>';
						content+='<input type="number"  class="form-control cost_incurred" id="cost_incurred" name="cost_incurred" placeholder="Enter cost incurred" value="'+value+'">';
						content+='</div>';
						/*content+='<div class="form-group col-md-1">';
					    content+='<label for="value">&nbsp;</label><br/>';
						content+='<button type="button" class="btn btn-danger pull-right RegistrationRemovepara1"><i class="fa fa-close"></i></button>';                     
						content+='</div>';*/
						content+='</div>';
						content+='</div>';
						content+='</div>';
						
						//console.log(content);
						//$(".new_member_array").empty(); 
					
						
					});
					
					$('#detail_of_foreign_travel .panel').each(function(key, val) {
						var fill_value='no';
						var title_of_traveller= $(this).find('.title_of_traveller').val();
						var location_purpose= $(this).find('.location_purpose').val();
						var cost_incurred= $(this).find('.cost_incurred').val();
						
						
						if(title_of_traveller){	fill_value='yes';
						}else if(location_purpose){fill_value='yes';
						}else if(cost_incurred){fill_value='yes';
						}else{fill_value='no';}
						
						console.log("fill_value");
						console.log(fill_value);
						if(fill_value=='no'){
							$(this).remove();
						}
					
					});
					
					$("#detail_of_foreign_travel").append(content); 
						
					$('#detail_of_foreign_travel .panel').each(function(key, val) {
						if(key==0){
							$(this).find('.RegistrationRemovepara1').remove();
						}
					
					});
						
				}
				
				$('#browseFilePage4_6').modal('hide');
			}else{
                $('#browseFilePage4_6').modal('hide');
                alert(data.message);
			}
			$.danidemo.addLog('#demo-debug', 'success', 'Upload of file #' + id + ' completed');

			$.danidemo.addLog('#demo-debug', 'info', 'Server Response for file #' + id + ': ' + JSON.stringify(data));

			$.danidemo.updateFileStatus(id, 'success', 'Upload Complete');

			$.danidemo.updateFileProgress(id, '100%');
        },
        onUploadError: function(id, message){
			alert(message);
			$.danidemo.updateFileStatus(id, 'error', message);

			$.danidemo.addLog('#demo-debug', 'error', 'Failed to Upload file #' + id + ': ' + message);
        },
        onFileTypeError: function(file){
			alert('File \'' + file.name + '\' cannot be added: must be an image');
			$.danidemo.addLog('#demo-debug', 'error', 'File \'' + file.name + '\' cannot be added: must be an image');
        },
        onFileSizeError: function(file){
			alert('File \'' + file.name + '\' cannot be added: size excess limit');
			$.danidemo.addLog('#demo-debug', 'error', 'File \'' + file.name + '\' cannot be added: size excess limit');
        },
        /*onFileExtError: function(file){
          $.danidemo.addLog('#demo-debug', 'error', 'File \'' + file.name + '\' has a Not Allowed Extension');
        },*/
        onFallbackMode: function(message){
			alert('info', 'Browser not supported(do something else here!): ' + message);
			$.danidemo.addLog('#demo-debug', 'info', 'Browser not supported(do something else here!): ' + message);
        },
		onFilesMaxError: function(file){
			alert(' cannot be added to queue due to upload limits.');
		  $.danidemo.addLog(file.name + ' cannot be added to queue due to upload limits.');
		}
    });
	
	
	$('#drag-and-drop-zone_xl_page_5_2').dmUploader({
        url: APP_URL+'common/upload_file_xl_page5_2',
        dataType: 'json',
		extraData: {
			image_cat:$('.image_cat').val(),
			sub_folder_name:$('.sub_folder_name').val(),
		},
		maxFiles :'1',
		fileName : 'uploadFile',
		//maxFileSize :'1',
        //allowedTypes: 'xlsx',
        //extFilter: 'xlsx;',
        onInit: function(){
			$.danidemo.addLog('#demo-debug', 'default', 'Plugin initialized correctly');
        },
        onBeforeUpload: function(id){
          
		  $.danidemo.addLog('#demo-debug', 'default', 'Starting the upload of #' + id);

          $.danidemo.updateFileStatus(id, 'default', 'Uploading...');
        },
        onNewFile: function(id, file){
			$('.demo-panel-files').empty();
			$.danidemo.addFile('#demo-files', id, file);
        },
        onComplete: function(){
			$.danidemo.addLog('#demo-debug', 'default', 'All pending tranfers completed');
        },
        onUploadProgress: function(id, percent){
			var percentStr = percent + '%';

			$.danidemo.updateFileProgress(id, percentStr);
        },
        onUploadSuccess: function(id, data){
			var status= data.status;
			var excel_array = data.excel_array;
			//var upload_file = data.upload_file;
			//var file_size = data.file_size;
			console.log(excel_array);
			if(status == 200){
				if(excel_array){
					var content='';
					var i=0;
					var close_button='';
					var close_button_with_empty='no';
					$('#detail_of_donor_page .panel').each(function(key, val) {
						var fill_value='no';
						var name_of_donor= $(this).find('.name_of_donor').val();
						var title_of_project= $(this).find('.title_of_project').val();
						var project_period_from= $(this).find('.project_period_from').val();
						var project_period_to= $(this).find('.project_period_to').val();
						var project_amount= $(this).find('.amount').val();
						if(name_of_donor){
							fill_value='yes';
						}else if(title_of_project){
							fill_value='yes';
						}else if(project_period_from){
							fill_value='yes';
						}else if(project_period_to){
							fill_value='yes';
						}else if(project_amount){
							fill_value='yes';
						}else{
							fill_value='no';
						}
						
						console.log("fill_value");
						console.log(fill_value);
						if(fill_value=='no'){
							$(this).remove();
							close_button='no';
							close_button_with_empty='yes';
						}else{
							close_button='yes';
						}
						console.log("close_button1");
						console.log(close_button);
					});
					
					console.log("close_button2");
					console.log(close_button);
					
					
					
					
					
					$(excel_array).each (function(key,val){
						console.log("val");
						console.log(val);
						i++;
												
						var input1=val.input1;
						var input2=val.input2;
						var input3=val.input3;
						var input4=val.input4;
						var input5=val.input5;
						if(input1==null){
							input1='';
						}
						if(input2==null){
							input2='';
						}
						if(input3==null){
							input3='';
						}else if(input3!=null){
							
							var  isValidDate = Date.parse(input3);
							if (isNaN(isValidDate)) {
								input3='';
							}else{
								var input3 = $.datepicker.formatDate('yy-mm-dd', new Date(input3));
							}
						}else{
							input3='';
						}
						if(input4==null){
							input4='';
						}else if(input4!=null){
							
							var  isValidDate = Date.parse(input4);
							if (isNaN(isValidDate)) {
								input4='';
							}else{
								var input4 = $.datepicker.formatDate('yy-mm-dd', new Date(input4));
							}
						}else{
							input4='';
						}
						if(input5==null){
							input5=0;
						}
						
						var time = 'old_date_1_'+$. now();
						$('#detail_of_donor_page .date_1').addClass(time);
						
						var timee = 'old_date_2_'+$. now();
						$('#detail_of_donor_page .date_2').addClass(timee);
						setTimeout(function() {
							$(function () {
								$('.'+time).datepicker({
									changeMonth: true,
									changeYear: true,
									dateFormat: 'yy-mm-dd',
									maxDate: 'dateToday',
									yearRange : 'c-75:c+75',
								});
							});
						}, 500);
						
						setTimeout(function() {
							$(function () {
								$('.'+timee).datepicker({
									changeMonth: true,
									changeYear: true,
									dateFormat: 'yy-mm-dd',
									maxDate: 'dateToday',
									yearRange : 'c-75:c+75',
								});
							});
						}, 500);
					   console.log("close_button");
					   console.log(close_button);
						content+='<div class="panel panel-default">';
						content+='<div class=" panel-body">';
											
						content+='<div class="form-group col-md-12">';
						content+='<button type="button" class="btn btn-danger pull-right donor_remove"><i class="fa fa-close"></i></button>';                    
						content+='</div>';
						
						content+='<div class="row">';
						content+='<div class="form-group col-md-4">';
						content+='<label for="name_of_donor">Name<span class="required">*</span></label>';
						content+='<input type="text" class="form-control name_of_donor" name="name_of_donor" placeholder="Enter name of Donor" value="'+input1+'">';
						content+='</div> ';
						content+='<div class="form-group col-md-4">';
						content+='<label for="title_of_project">Project Title<span class="required">*</span><span id="errmsg"></span></label>';
						content+='<input type="text" class="form-control title_of_project" name="title_of_project" placeholder="Title of the project" value="'+input2+'">';
						content+='</div> ';
						content+='<div class="form-group col-md-4">';
						content+='<label for="project_period_from">Project period from<span class="required">*</span><span id="errmsg"></span></label>';
						content+='<input type="text" readonly class="form-control date_1 project_period_from" name="project_period_from" placeholder="Project period from" value="'+input3+'">';
						content+='</div> ';
						content+='<div class="form-group col-md-4">';
						content+='<label for="project_period_to">Project period To<span class="required">*</span><span id="errmsg"></span></label>';
						content+='<input type="text" readonly class="form-control date_2 project_period_to" name="project_period_to" placeholder="Project period to" value="'+input4+'">';
						content+='</div>';
						content+='<div class="form-group col-md-4">';
						content+='<label for="amount">Amount(in INR lakhs)<span class="required">*</span><span id="errmsg"></span></label>';
						content+='<input type="number" class="form-control amount" name="amount" placeholder="amount(in INR lakhs)" value="'+input5+'">';
						content+='</div>'; 	
						content+='</div>';
						content+='</div>';
						content+='</div>';
						
						//console.log(content);
						//$(".new_member_array").empty(); 
						
						
					});
					
					$("#detail_of_donor_page").append(content);	
					
					var time = 'old_date_1_'+$. now();
					$('#detail_of_donor_page .date_1').addClass(time);
					
					var timee = 'old_date_2_'+$. now();
					$('#detail_of_donor_page .date_2').addClass(timee);
				   
					setTimeout(function() {
						$(function () {
							$('.'+time).datepicker({
								changeMonth: true,
								changeYear: true,
								dateFormat: 'yy-mm-dd',
								maxDate: 'dateToday',
								yearRange : 'c-75:c+75',
							});
						});
					}, 500);
					
					setTimeout(function() {
						$(function () {
							$('.'+timee).datepicker({
								changeMonth: true,
								changeYear: true,
								dateFormat: 'yy-mm-dd',
								maxDate: 'dateToday',
								yearRange : 'c-75:c+75',
							});
						});
					}, 500);
					
					$('#detail_of_donor_page .panel').each(function(key, val) {
						if(key==0){
							$(this).find('.donor_remove').remove();
						}
					});
				
				}
				
				$('#browseFilePage5_2').modal('hide');
			}else{
                $('#browseFilePage5_2').modal('hide');
                alert(data.message);
			}
			$.danidemo.addLog('#demo-debug', 'success', 'Upload of file #' + id + ' completed');

			$.danidemo.addLog('#demo-debug', 'info', 'Server Response for file #' + id + ': ' + JSON.stringify(data));

			$.danidemo.updateFileStatus(id, 'success', 'Upload Complete');

			$.danidemo.updateFileProgress(id, '100%');
        },
        onUploadError: function(id, message){
			alert(message);
			$.danidemo.updateFileStatus(id, 'error', message);

			$.danidemo.addLog('#demo-debug', 'error', 'Failed to Upload file #' + id + ': ' + message);
        },
        onFileTypeError: function(file){
			alert('File \'' + file.name + '\' cannot be added: must be an image');
			$.danidemo.addLog('#demo-debug', 'error', 'File \'' + file.name + '\' cannot be added: must be an image');
        },
        onFileSizeError: function(file){
			alert('File \'' + file.name + '\' cannot be added: size excess limit');
			$.danidemo.addLog('#demo-debug', 'error', 'File \'' + file.name + '\' cannot be added: size excess limit');
        },
        /*onFileExtError: function(file){
          $.danidemo.addLog('#demo-debug', 'error', 'File \'' + file.name + '\' has a Not Allowed Extension');
        },*/
        onFallbackMode: function(message){
			alert('info', 'Browser not supported(do something else here!): ' + message);
			$.danidemo.addLog('#demo-debug', 'info', 'Browser not supported(do something else here!): ' + message);
        },
		onFilesMaxError: function(file){
			alert(' cannot be added to queue due to upload limits.');
		  $.danidemo.addLog(file.name + ' cannot be added to queue due to upload limits.');
		}
    });
	
	$('#drag-and-drop-zone_xl2').dmUploader({
        url: APP_URL+'common/upload_file_xl_page4_2',
        dataType: 'json',
		extraData: {
			image_cat:$('.image_cat').val(),
			sub_folder_name:$('.sub_folder_name').val(),
		},
		maxFiles :'1',
		fileName : 'uploadFile',
		//maxFileSize :'1',
        //allowedTypes: 'xlsx',
        //extFilter: 'xlsx;',
        onInit: function(){
			$.danidemo.addLog('#demo-debug', 'default', 'Plugin initialized correctly');
        },
        onBeforeUpload: function(id){
          
		  $.danidemo.addLog('#demo-debug', 'default', 'Starting the upload of #' + id);

          $.danidemo.updateFileStatus(id, 'default', 'Uploading...');
        },
        onNewFile: function(id, file){
			$('.demo-panel-files').empty();
			$.danidemo.addFile('#demo-files', id, file);
        },
        onComplete: function(){
			$.danidemo.addLog('#demo-debug', 'default', 'All pending tranfers completed');
        },
        onUploadProgress: function(id, percent){
			var percentStr = percent + '%';

			$.danidemo.updateFileProgress(id, percentStr);
        },
        onUploadSuccess: function(id, data){
			var status= data.status;
			var excel_array = data.excel_array;
			//var upload_file = data.upload_file;
			//var file_size = data.file_size;
			console.log(excel_array);
			if(status == 200){
				if(excel_array){
					var content='';
					var i=0;
					$(excel_array).each (function(key,val){
						console.log("val");
						console.log(val);
						i++;
						
						var title=val.title;
						var input1=val.input1;
						if(input1==null){
							input1='';
						}
						var input2=val.input2;
						if(input2==null){
							input2=0;
						}
						var input3=val.input3;
						if(input3==null){
							input3='';
						}
						var input4=val.input4;
						if(input4==null){
							input4='';
						}
						var input5=val.input5;
						var input6=val.input6;
						var input7=val.input7;
						var input8=val.input8;
						var input9=val.input9;
						if(input9==null){
							input9='';
						}
						content+='<tr>';
						content+='<td>'+title+'</td>';
						content+='<td><input type="text" class="form-control" value="'+input1+'"></td>';
						content+='<td><input type="number" class="form-control" value="'+input2+'"></td>';
						content+='<td><input type="text" class="form-control" value="'+input3+'"></td>';
						content+='<td><input type="text" class="form-control" value="'+input4+'"></td>';
						content+='<td><input type="number" class="form-control" value="'+input5+'"></td>';
						content+='<td><input type="number" class="form-control" value="'+input6+'"></td>';
						content+='<td><input type="number" class="form-control" value="'+input7+'"></td>';
						content+='<td><input type="number" class="form-control" value="'+input8+'"></td>';
						content+='<td><input type="text" class="form-control" value="'+input9+'"></td>';
						content+='</tr>';
						//console.log(content);
						$(".renumaration_of_senior_leadership").empty(); 
					
						
					});
					
					$(".renumaration_of_senior_leadership").append(content); 
				}
				//console.log(file_prev_class);
				//console.log(file_input_id);
				/*if(file_count == 'single'){
					if(file_size>10485760){
						click_this.parent().find('.cycle_file_upload_error1').removeClass('display_none');
						click_this.parent().find('.file_size').val(file_size);
						click_this.parent().find('.'+file_prev_class).find('input').addClass('display_none');
						
					}else{
						click_this.parent().find('.cycle_file_upload_error').addClass('display_none');
						click_this.parent().find('.'+file_prev_class).find('input').removeClass('display_none');
						click_this.parent().find('.'+file_prev_class).find('input').val(upload_file);
						click_this.parent().find('.'+file_input_id).val(filename_);
						click_this.parent().find('.document_value_').removeClass('display_none');
					}
					//$('#'+file_input_id).css("display","none");
				}else{
					file_counter++;
					click_this.parent().find('.'+file_prev_class).append('<div class="file_dives col-sm-3" addr="'+filename_+'" ><div class="input" style="padding:4%;"><input readonly type="text" class="form-control multii_1" value="'+upload_file+'"><button type="button" class="btn img_remover" >x</button></div></div>');

					
				}*/
				$('#browseFilePage4_2').modal('hide');
			}else{
                $('#browseFilePage4_2').modal('hide');
                alert(data.message);
			}
			$.danidemo.addLog('#demo-debug', 'success', 'Upload of file #' + id + ' completed');

			$.danidemo.addLog('#demo-debug', 'info', 'Server Response for file #' + id + ': ' + JSON.stringify(data));

			$.danidemo.updateFileStatus(id, 'success', 'Upload Complete');

			$.danidemo.updateFileProgress(id, '100%');
        },
        onUploadError: function(id, message){
			alert(message);
			$.danidemo.updateFileStatus(id, 'error', message);

			$.danidemo.addLog('#demo-debug', 'error', 'Failed to Upload file #' + id + ': ' + message);
        },
        onFileTypeError: function(file){
			alert('File \'' + file.name + '\' cannot be added: must be an image');
			$.danidemo.addLog('#demo-debug', 'error', 'File \'' + file.name + '\' cannot be added: must be an image');
        },
        onFileSizeError: function(file){
			alert('File \'' + file.name + '\' cannot be added: size excess limit');
			$.danidemo.addLog('#demo-debug', 'error', 'File \'' + file.name + '\' cannot be added: size excess limit');
        },
        /*onFileExtError: function(file){
          $.danidemo.addLog('#demo-debug', 'error', 'File \'' + file.name + '\' has a Not Allowed Extension');
        },*/
        onFallbackMode: function(message){
			alert('info', 'Browser not supported(do something else here!): ' + message);
			$.danidemo.addLog('#demo-debug', 'info', 'Browser not supported(do something else here!): ' + message);
        },
		onFilesMaxError: function(file){
			alert(' cannot be added to queue due to upload limits.');
		  $.danidemo.addLog(file.name + ' cannot be added to queue due to upload limits.');
		}
    });
	
	$('#drag-and-drop-zone_xl_page_5_1').dmUploader({
        url: APP_URL+'common/upload_file_xl_page5_1',
        dataType: 'json',
		extraData: {
			image_cat:$('.image_cat').val(),
			sub_folder_name:$('.sub_folder_name').val(),
		},
		maxFiles :'1',
		fileName : 'uploadFile',
		//maxFileSize :'1',
        //allowedTypes: 'xlsx',
        //extFilter: 'xlsx;',
        onInit: function(){
			$.danidemo.addLog('#demo-debug', 'default', 'Plugin initialized correctly');
        },
        onBeforeUpload: function(id){
          
		  $.danidemo.addLog('#demo-debug', 'default', 'Starting the upload of #' + id);

          $.danidemo.updateFileStatus(id, 'default', 'Uploading...');
        },
        onNewFile: function(id, file){
			$('.demo-panel-files').empty();
			$.danidemo.addFile('#demo-files', id, file);
        },
        onComplete: function(){
			$.danidemo.addLog('#demo-debug', 'default', 'All pending tranfers completed');
        },
        onUploadProgress: function(id, percent){
			var percentStr = percent + '%';

			$.danidemo.updateFileProgress(id, percentStr);
        },
        onUploadSuccess: function(id, data){
			var status= data.status;
			var excel_array = data.excel_array;
			//var upload_file = data.upload_file;
			//var file_size = data.file_size;
			console.log(excel_array);
			if(status == 200){
				if(excel_array){
					var content='';
					var i=0;
					$(excel_array).each (function(key,val){
						console.log("val");
						console.log(val);
						i++;
						span_data_input1='';
						span_data_input2='';
						span_data_input3='';
						
						var title=val.title;
						var input1=val.input1;
						if(input1==null){
							input1=0;
						}else{
							if(input1>0){
								var float_value= parseFloat(input1);
								var CommaFormatted12= commaSeparateNumber1(float_value);
								var span_data_input1=('('+CommaFormatted12+')');
							}else{
								span_data_input1='';
							}
						
						}
						var input2=val.input2;
						if(input2==null){
							input2=0;
						}else{
							if(input2>0){
								var float_value2= parseFloat(input2);
								var CommaFormatted12= commaSeparateNumber1(float_value2);
								var span_data_input2=('('+CommaFormatted12+')');
							}else{
								span_data_input2='';
							}
						}
						var input3=val.input3;
						if(input3==null){
							input3=0;
						}else{
							if(input3>0){
								var float_value3= parseFloat(input3);
								var CommaFormatted12= commaSeparateNumber1(float_value3);
								var span_data_input3=('('+CommaFormatted12+')');
							}else{
								span_data_input3='';
							}
						}
						var input4=val.input4;
						if(input4==null){
							input4=0;
						}else{
							console.log("input4ddddddddddddddddddddddddddddddddd");
							console.log(input4);
						}
						
						content+='<tr>';
						content+='<td>'+title+'</td>';
						content+='<td>';
						content+='<div class="input-group">';
						content+='<input  aria-label="Amount" onkeypress="return (event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57))" type="text" class="form-control text1 finalized text-right" value="'+input1+'">';
						content+='<span class="input-group-addon append_span append_span_finalized">'+span_data_input1+'</span>';
						content+='</div>';
						content+='</td>';
						content+='<td>';
						content+='<div class="input-group">';
						content+='<input aria-label="Amount" onkeypress="return (event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57))" type="text" class="form-control text1 preceding_financial1  text-right" value="'+input2+'">';
						content+='<span class="input-group-addon append_span">'+span_data_input2+'</span>';
						content+='</div>';
						content+='</td>';
						content+='<td>';
						content+='<div class="input-group">';
						content+='<input aria-label="Amount" onkeypress="return (event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57))" type="text" class="form-control  preceding_financial2 text1 text-right" value="'+input3+'">';
						content+='<span class="input-group-addon append_span">'+span_data_input3+'</span>';
						content+='</div>';
						content+='</td>';
						content+='<td><input type="text" onkeypress="return (event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57))"  class="form-control text1" value="'+input4+'"></td>';
						content+='</tr>';
						//console.log(content);
						$(".budget_details_class").empty(); 
					
						
					});
					
					$(".budget_details_class").append(content); 
				}
				
				$('#browseFilePage5_1').modal('hide');
			}else{
                $('#browseFilePage5_1').modal('hide');
                alert(data.message);
			}
			$.danidemo.addLog('#demo-debug', 'success', 'Upload of file #' + id + ' completed');

			$.danidemo.addLog('#demo-debug', 'info', 'Server Response for file #' + id + ': ' + JSON.stringify(data));

			$.danidemo.updateFileStatus(id, 'success', 'Upload Complete');

			$.danidemo.updateFileProgress(id, '100%');
        },
        onUploadError: function(id, message){
			alert(message);
			$.danidemo.updateFileStatus(id, 'error', message);

			$.danidemo.addLog('#demo-debug', 'error', 'Failed to Upload file #' + id + ': ' + message);
        },
        onFileTypeError: function(file){
			alert('File \'' + file.name + '\' cannot be added: must be an image');
			$.danidemo.addLog('#demo-debug', 'error', 'File \'' + file.name + '\' cannot be added: must be an image');
        },
        onFileSizeError: function(file){
			alert('File \'' + file.name + '\' cannot be added: size excess limit');
			$.danidemo.addLog('#demo-debug', 'error', 'File \'' + file.name + '\' cannot be added: size excess limit');
        },
        /*onFileExtError: function(file){
          $.danidemo.addLog('#demo-debug', 'error', 'File \'' + file.name + '\' has a Not Allowed Extension');
        },*/
        onFallbackMode: function(message){
			alert('info', 'Browser not supported(do something else here!): ' + message);
			$.danidemo.addLog('#demo-debug', 'info', 'Browser not supported(do something else here!): ' + message);
        },
		onFilesMaxError: function(file){
			alert(' cannot be added to queue due to upload limits.');
		  $.danidemo.addLog(file.name + ' cannot be added to queue due to upload limits.');
		}
    });
	
	function commaSeparateNumber1(Num){
		/*Num += '';
		
		console.log("Last Three ");
		console.log(Num.slice(Num.length - 3));
		var last_three=(Num.slice(Num.length - 3));
		var str=Num;
		str = str.slice(0, -3); 
		console.log("str");
		console.log(str);
		Num=str;
		
       // Num = Num.replace(',', ','); Num = Num.replace(',', ','); Num = Num.replace(',', '');
        Num = Num.replace(',', ','); Num = Num.replace(',', ','); Num = Num.replace('.', ',');
		x = Num.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{2})/;
        while (rgx.test(x1))
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
        return x1 + x2 + ',' +last_three;
		/*var parts = Num.toString().split(".");
		parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		//console.log(parts);
		return parts.join(".");*/
		
		console.log(Num);
		var Num = Num * 100000;
		console.log(Num);
		Num = ''+Num;

		//var num_with_dot = '00';
		/*if(Num.includes('.')){
		num_with_dot = Num.split(".")[1];
		Num = Num.split(".")[0];
		}else{
		//num_with_dot = '00';
		}*/
		var last_three=(Num.slice(Num.length - 3));
		var str=Num;
		str = str.slice(0, -3);
		Num=str;

		  // Num = Num.replace(',', ','); Num = Num.replace(',', ','); Num = Num.replace(',', '');
		Num = Num.replace(',', ','); Num = Num.replace(',', ','); Num = Num.replace('.', ',');
		x = Num.split('.');
		x1 = x[0];
		x2 = x.length > 1 ? '.' + x[1] : '';
		var rgx = /(\d+)(\d{2})/;
		while (rgx.test(x1))
		x1 = x1.replace(rgx, '$1' + ',' + '$2');
		var final_value = x1 + x2 + ',' +last_three
		return final_value;
				
		
		
	}
	
	
	
	
	
	$('#drag-and-drop-zone_xl').dmUploader({
        url: APP_URL+'common/upload_file_xl',
        dataType: 'json',
		extraData: {
			image_cat:$('.image_cat').val(),
			sub_folder_name:$('.sub_folder_name').val(),
		},
		maxFiles :'1',
		fileName : 'myFile',
		//maxFileSize :'1',
        //allowedTypes: 'image/*',
        /*extFilter: 'jpg;png;gif',*/
        onInit: function(){
			$.danidemo.addLog('#demo-debug', 'default', 'Plugin initialized correctly');
        },
        onBeforeUpload: function(id){
          
		  $.danidemo.addLog('#demo-debug', 'default', 'Starting the upload of #' + id);

          $.danidemo.updateFileStatus(id, 'default', 'Uploading...');
        },
        onNewFile: function(id, file){
			$('.demo-panel-files').empty();
			$.danidemo.addFile('#demo-files', id, file);
        },
        onComplete: function(){
			$.danidemo.addLog('#demo-debug', 'default', 'All pending tranfers completed');
        },
        onUploadProgress: function(id, percent){
			var percentStr = percent + '%';

			$.danidemo.updateFileProgress(id, percentStr);
        },
        onUploadSuccess: function(id, data){
			var status= data.status;
			var filename_ = data.filename;
			var upload_file = data.upload_file;
			var file_size = data.file_size;

			if(status == 200){
				console.log(file_prev_class);
				console.log(file_input_id);
				if(file_count == 'single'){
					if(file_size>10485760){
						click_this.parent().find('.cycle_file_upload_error1').removeClass('display_none');
						click_this.parent().find('.file_size').val(file_size);
						click_this.parent().find('.'+file_prev_class).find('input').addClass('display_none');
						
					}else{
						click_this.parent().find('.cycle_file_upload_error').addClass('display_none');
						click_this.parent().find('.'+file_prev_class).find('input').removeClass('display_none');
						click_this.parent().find('.'+file_prev_class).find('input').val(upload_file);
						click_this.parent().find('.'+file_input_id).val(filename_);
						click_this.parent().find('.document_value_').removeClass('display_none');
					}
					//$('#'+file_input_id).css("display","none");
				}else{
					file_counter++;
					click_this.parent().find('.'+file_prev_class).append('<div class="file_dives col-sm-3" addr="'+filename_+'" ><div class="input" style="padding:4%;"><input readonly type="text" class="form-control multii_1" value="'+upload_file+'"><button type="button" class="btn img_remover" >x</button></div></div>');

					
				}
				$('#browseFile2').modal('hide');
			}else{
                $('#browseFile2').modal('hide');
                alert(data.message);
			}
			$.danidemo.addLog('#demo-debug', 'success', 'Upload of file #' + id + ' completed');

			$.danidemo.addLog('#demo-debug', 'info', 'Server Response for file #' + id + ': ' + JSON.stringify(data));

			$.danidemo.updateFileStatus(id, 'success', 'Upload Complete');

			$.danidemo.updateFileProgress(id, '100%');
        },
        onUploadError: function(id, message){
			alert(message);
			$.danidemo.updateFileStatus(id, 'error', message);

			$.danidemo.addLog('#demo-debug', 'error', 'Failed to Upload file #' + id + ': ' + message);
        },
        onFileTypeError: function(file){
			alert('File \'' + file.name + '\' cannot be added: must be an image');
			$.danidemo.addLog('#demo-debug', 'error', 'File \'' + file.name + '\' cannot be added: must be an image');
        },
        onFileSizeError: function(file){
			alert('File \'' + file.name + '\' cannot be added: size excess limit');
			$.danidemo.addLog('#demo-debug', 'error', 'File \'' + file.name + '\' cannot be added: size excess limit');
        },
        /*onFileExtError: function(file){
          $.danidemo.addLog('#demo-debug', 'error', 'File \'' + file.name + '\' has a Not Allowed Extension');
        },*/
        onFallbackMode: function(message){
			alert('info', 'Browser not supported(do something else here!): ' + message);
			$.danidemo.addLog('#demo-debug', 'info', 'Browser not supported(do something else here!): ' + message);
        },
		onFilesMaxError: function(file){
			alert(' cannot be added to queue due to upload limits.');
		  $.danidemo.addLog(file.name + ' cannot be added to queue due to upload limits.');
		}
    });
	
	
	$('#drag-and-drop-zone_xl3').dmUploader({
        url: APP_URL+'common/upload_file_xl_page4_3',
        dataType: 'json',
		extraData: {
			image_cat:$('.image_cat').val(),
			sub_folder_name:$('.sub_folder_name').val(),
		},
		maxFiles :'1',
		fileName : 'uploadFile',
		//maxFileSize :'1',
        //allowedTypes: 'xlsx',
        //extFilter: 'xlsx;',
        onInit: function(){
			$.danidemo.addLog('#demo-debug', 'default', 'Plugin initialized correctly');
        },
        onBeforeUpload: function(id){
          
		  $.danidemo.addLog('#demo-debug', 'default', 'Starting the upload of #' + id);

          $.danidemo.updateFileStatus(id, 'default', 'Uploading...');
        },
        onNewFile: function(id, file){
			$('.demo-panel-files').empty();
			$.danidemo.addFile('#demo-files', id, file);
        },
        onComplete: function(){
			$.danidemo.addLog('#demo-debug', 'default', 'All pending tranfers completed');
        },
        onUploadProgress: function(id, percent){
			var percentStr = percent + '%';

			$.danidemo.updateFileProgress(id, percentStr);
        },
        onUploadSuccess: function(id, data){
			var status= data.status;
			var excel_array = data.excel_array;
			//var upload_file = data.upload_file;
			//var file_size = data.file_size;
			console.log(excel_array);
			if(status == 200){
				if(excel_array){
					var content='';
					var i=0;
					$(excel_array).each (function(key,val){
						console.log("val");
						console.log(val);
						i++;
						
						var title=val.title;
						var input1=val.input1;
						if(input1==null){
							input1=0;
						}
						var input2=val.input2;
						if(input2==null){
							input2=0;
						}
						content+='<tr>';
						content+='<td>'+title+'</td>';
						content+='<td><input type="number" class="form-control" value="'+input1+'"></td>';
						content+='<td><input type="number" class="form-control" value="'+input2+'"></td>';
						content+='</tr>';
						//console.log(content);
						$(".full_time_staff").empty(); 
					
						
					});
					
					$(".full_time_staff").append(content); 
				}
				
				$('#browseFilePage4_3').modal('hide');
			}else{
                $('#browseFilePage4_3').modal('hide');
                alert(data.message);
			}
			$.danidemo.addLog('#demo-debug', 'success', 'Upload of file #' + id + ' completed');

			$.danidemo.addLog('#demo-debug', 'info', 'Server Response for file #' + id + ': ' + JSON.stringify(data));

			$.danidemo.updateFileStatus(id, 'success', 'Upload Complete');

			$.danidemo.updateFileProgress(id, '100%');
        },
        onUploadError: function(id, message){
			alert(message);
			$.danidemo.updateFileStatus(id, 'error', message);

			$.danidemo.addLog('#demo-debug', 'error', 'Failed to Upload file #' + id + ': ' + message);
        },
        onFileTypeError: function(file){
			alert('File \'' + file.name + '\' cannot be added: must be an image');
			$.danidemo.addLog('#demo-debug', 'error', 'File \'' + file.name + '\' cannot be added: must be an image');
        },
        onFileSizeError: function(file){
			alert('File \'' + file.name + '\' cannot be added: size excess limit');
			$.danidemo.addLog('#demo-debug', 'error', 'File \'' + file.name + '\' cannot be added: size excess limit');
        },
        /*onFileExtError: function(file){
          $.danidemo.addLog('#demo-debug', 'error', 'File \'' + file.name + '\' has a Not Allowed Extension');
        },*/
        onFallbackMode: function(message){
			alert('info', 'Browser not supported(do something else here!): ' + message);
			$.danidemo.addLog('#demo-debug', 'info', 'Browser not supported(do something else here!): ' + message);
        },
		onFilesMaxError: function(file){
			alert(' cannot be added to queue due to upload limits.');
		  $.danidemo.addLog(file.name + ' cannot be added to queue due to upload limits.');
		}
    });
	
	$('#drag-and-drop-zone_xl4').dmUploader({
        url: APP_URL+'common/upload_file_xl_page4_4',
        dataType: 'json',
		extraData: {
			image_cat:$('.image_cat').val(),
			sub_folder_name:$('.sub_folder_name').val(),
		},
		maxFiles :'1',
		fileName : 'uploadFile',
		//maxFileSize :'1',
        //allowedTypes: 'xlsx',
        //extFilter: 'xlsx;',
        onInit: function(){
			$.danidemo.addLog('#demo-debug', 'default', 'Plugin initialized correctly');
        },
        onBeforeUpload: function(id){
          
		  $.danidemo.addLog('#demo-debug', 'default', 'Starting the upload of #' + id);

          $.danidemo.updateFileStatus(id, 'default', 'Uploading...');
        },
        onNewFile: function(id, file){
			$('.demo-panel-files').empty();
			$.danidemo.addFile('#demo-files', id, file);
        },
        onComplete: function(){
			$.danidemo.addLog('#demo-debug', 'default', 'All pending tranfers completed');
        },
        onUploadProgress: function(id, percent){
			var percentStr = percent + '%';

			$.danidemo.updateFileProgress(id, percentStr);
        },
        onUploadSuccess: function(id, data){
			var status= data.status;
			var excel_array = data.excel_array;
			//var upload_file = data.upload_file;
			//var file_size = data.file_size;
			console.log(excel_array);
			if(status == 200){
				if(excel_array){
					var content='';
					var i=0;
					$(excel_array).each (function(key,val){
						console.log("val");
						console.log(val);
						i++;
						
						var title=val.title;
						var input1=val.input1;
						var input2=val.input2;
						if(input1==null){
							input1=0;
						}
						if(input2==null){
							input2=0;
						}
						content+='<tr>';
						content+='<td>'+title+'</td>';
						content+='<td><input type="number" class="form-control" value="'+input1+'"></td>';
						content+='<td><input type="number" class="form-control" value="'+input2+'"></td>';
						content+='</tr>';
						//console.log(content);
						$(".part_time_staff").empty(); 
					
						
					});
					
					$(".part_time_staff").append(content); 
				}
				
				$('#browseFilePage4_4').modal('hide');
			}else{
                $('#browseFilePage4_4').modal('hide');
                alert(data.message);
			}
			$.danidemo.addLog('#demo-debug', 'success', 'Upload of file #' + id + ' completed');

			$.danidemo.addLog('#demo-debug', 'info', 'Server Response for file #' + id + ': ' + JSON.stringify(data));

			$.danidemo.updateFileStatus(id, 'success', 'Upload Complete');

			$.danidemo.updateFileProgress(id, '100%');
        },
        onUploadError: function(id, message){
			alert(message);
			$.danidemo.updateFileStatus(id, 'error', message);

			$.danidemo.addLog('#demo-debug', 'error', 'Failed to Upload file #' + id + ': ' + message);
        },
        onFileTypeError: function(file){
			alert('File \'' + file.name + '\' cannot be added: must be an image');
			$.danidemo.addLog('#demo-debug', 'error', 'File \'' + file.name + '\' cannot be added: must be an image');
        },
        onFileSizeError: function(file){
			alert('File \'' + file.name + '\' cannot be added: size excess limit');
			$.danidemo.addLog('#demo-debug', 'error', 'File \'' + file.name + '\' cannot be added: size excess limit');
        },
        /*onFileExtError: function(file){
          $.danidemo.addLog('#demo-debug', 'error', 'File \'' + file.name + '\' has a Not Allowed Extension');
        },*/
        onFallbackMode: function(message){
			alert('info', 'Browser not supported(do something else here!): ' + message);
			$.danidemo.addLog('#demo-debug', 'info', 'Browser not supported(do something else here!): ' + message);
        },
		onFilesMaxError: function(file){
			alert(' cannot be added to queue due to upload limits.');
		  $.danidemo.addLog(file.name + ' cannot be added to queue due to upload limits.');
		}
    });
	
	
	
	
	
	$('#drag-and-drop-zone_xl').dmUploader({
        url: APP_URL+'common/upload_file_xl',
        dataType: 'json',
		extraData: {
			image_cat:$('.image_cat').val(),
			sub_folder_name:$('.sub_folder_name').val(),
		},
		maxFiles :'1',
		fileName : 'myFile',
		//maxFileSize :'1',
        //allowedTypes: 'image/*',
        /*extFilter: 'jpg;png;gif',*/
        onInit: function(){
			$.danidemo.addLog('#demo-debug', 'default', 'Plugin initialized correctly');
        },
        onBeforeUpload: function(id){
          
		  $.danidemo.addLog('#demo-debug', 'default', 'Starting the upload of #' + id);

          $.danidemo.updateFileStatus(id, 'default', 'Uploading...');
        },
        onNewFile: function(id, file){
			$('.demo-panel-files').empty();
			$.danidemo.addFile('#demo-files', id, file);
        },
        onComplete: function(){
			$.danidemo.addLog('#demo-debug', 'default', 'All pending tranfers completed');
        },
        onUploadProgress: function(id, percent){
			var percentStr = percent + '%';

			$.danidemo.updateFileProgress(id, percentStr);
        },
        onUploadSuccess: function(id, data){
			var status= data.status;
			var filename_ = data.filename;
			var upload_file = data.upload_file;
			var file_size = data.file_size;

			if(status == 200){
				console.log(file_prev_class);
				console.log(file_input_id);
				if(file_count == 'single'){
					if(file_size>10485760){
						click_this.parent().find('.cycle_file_upload_error1').removeClass('display_none');
						click_this.parent().find('.file_size').val(file_size);
						click_this.parent().find('.'+file_prev_class).find('input').addClass('display_none');
						
					}else{
						click_this.parent().find('.cycle_file_upload_error').addClass('display_none');
						click_this.parent().find('.'+file_prev_class).find('input').removeClass('display_none');
						click_this.parent().find('.'+file_prev_class).find('input').val(upload_file);
						click_this.parent().find('.'+file_input_id).val(filename_);
						click_this.parent().find('.document_value_').removeClass('display_none');
					}
					//$('#'+file_input_id).css("display","none");
				}else{
					file_counter++;
					click_this.parent().find('.'+file_prev_class).append('<div class="file_dives col-sm-3" addr="'+filename_+'" ><div class="input" style="padding:4%;"><input readonly type="text" class="form-control multii_1" value="'+upload_file+'"><button type="button" class="btn img_remover" >x</button></div></div>');

					
				}
				$('#browseFile2').modal('hide');
			}else{
                $('#browseFile2').modal('hide');
                alert(data.message);
			}
			$.danidemo.addLog('#demo-debug', 'success', 'Upload of file #' + id + ' completed');

			$.danidemo.addLog('#demo-debug', 'info', 'Server Response for file #' + id + ': ' + JSON.stringify(data));

			$.danidemo.updateFileStatus(id, 'success', 'Upload Complete');

			$.danidemo.updateFileProgress(id, '100%');
        },
        onUploadError: function(id, message){
			alert(message);
			$.danidemo.updateFileStatus(id, 'error', message);

			$.danidemo.addLog('#demo-debug', 'error', 'Failed to Upload file #' + id + ': ' + message);
        },
        onFileTypeError: function(file){
			alert('File \'' + file.name + '\' cannot be added: must be an image');
			$.danidemo.addLog('#demo-debug', 'error', 'File \'' + file.name + '\' cannot be added: must be an image');
        },
        onFileSizeError: function(file){
			alert('File \'' + file.name + '\' cannot be added: size excess limit');
			$.danidemo.addLog('#demo-debug', 'error', 'File \'' + file.name + '\' cannot be added: size excess limit');
        },
        /*onFileExtError: function(file){
          $.danidemo.addLog('#demo-debug', 'error', 'File \'' + file.name + '\' has a Not Allowed Extension');
        },*/
        onFallbackMode: function(message){
			alert('info', 'Browser not supported(do something else here!): ' + message);
			$.danidemo.addLog('#demo-debug', 'info', 'Browser not supported(do something else here!): ' + message);
        },
		onFilesMaxError: function(file){
			alert(' cannot be added to queue due to upload limits.');
		  $.danidemo.addLog(file.name + ' cannot be added to queue due to upload limits.');
		}
    });
	
	
	$('body').on('click','.img_remover',function(){
		
		$(this).parent().parent().remove();
		
	});
});
</script>