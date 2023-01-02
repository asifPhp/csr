<link href="<?php echo base_url();?>assets/css/plugins/uploader.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>assets/js/plugins/demo.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/dmuploader.min.js"></script>
<style>

.file_dives{text-align: center; display: inline-block; margin: 10px; border: 1px solid #aaa;}
.img_remover1{padding: 1px 8px; background-color: red; color: #fff; border-radius: 50%; margin: 4px;}
.content_modal{
	margin-left:22%;
}
</style>
  
<div class="modal fade" id="browseFile1" tabindex="-1" course_package="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #f5f5f5;">
            <div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Browse File</h3>
            </div>
			<div class="modal-body">
				<div id="head1_msg"></div>
				<input type="hidden" value="<?php if($image_cat){echo $image_cat;}else{ echo 'menu'; }?>" name="image_cat1" class="image_cat1">
				<input type="hidden" value="<?php if($sub_folder_name){ echo $sub_folder_name;}?>" name="sub_folder_name1" class="sub_folder_name1">
                <div class="row demo-columns">
				<div class="content_modal">
					<div class="col-md-8 offset-md-2">
						<p></p>
						<div class="image_upload_desc_show"></div>
						
						<!-- D&D Zone-->
						<div id="drag-and-drop-zone1" class="uploader">
							<div>Drag &amp; Drop Images Here</div>
							<div class="or">-or-</div>
							<div class="browser">
								<label>
									<span>Click to open the file Browser</span>
									<input type="file" name="files[]" multiple="multiple" title='Click to add Files'>
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
	var file_input_id ='';
	var image_upload_desc = '';
	var file_count = 'single';
	
	$('body').on('click','.comman_file_upload_class1',function(){
		console.log('click');
		click_this = $(this);
		file_prev_class = $(this).attr('file_prev_class');
		file_input_id = $(this).attr('file_input_id');
		image_upload_desc = $(this).attr('image_upload_desc');
		$('.image_upload_desc_show').text(image_upload_desc);
		file_count = $(this).attr('file_count');
	});
	/*uploading drag and drop image*/
	$('#drag-and-drop-zone1').dmUploader({
        url: APP_URL+'common/upload_file',
        dataType: 'json',
		extraData: {
			image_cat:$('.image_cat1').val(),
			sub_folder_name:$('.sub_folder_name1').val(),
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
			if(status == 200){
				console.log(file_prev_class);
				console.log(file_input_id);
				if(file_count == 'single'){
					
					click_this.parent().find('.'+file_prev_class).find('input').removeClass('display_none');
					click_this.parent().find('.'+file_prev_class).find('input').val(upload_file);
					click_this.parent().find('.'+file_input_id).val(filename_);
					//$('#'+file_input_id).css("display","none");
				}else{
					file_counter++;
					click_this.parent().find('.'+file_prev_class).append('<div class="file_dives col-sm-3" addr="'+filename_+'" ><div class="input" style="padding:4%;"><input readonly type="text" class="form-control multii_2" value="'+upload_file+'"><input type="text" style="margin-top:3%;" class="form-control file_description" value="'+upload_file+'" placeholder="File name/Description"><button type="button" class="btn btn-danger img_remover1" style="margin-top:2%;color:white;border-radius:50%;" >x</button></div></div>');
					//click_this.parent().find('.'+file_prev_class).append('<div class="file_dives col-sm-3" addr="'+filename_+'" ><div class="input" style="padding:4%;"><input readonly type="text" class="form-control multii_2" value="'+upload_file+'"><input type="text" style="margin-top:3%;" class="form-control file_description" value="" placeholder="File name/Description"><button type="button" class="btn btn-danger img_remover1" style="margin-top:2%;color:white;border-radius:50%;" >x</button></div></div>');

					
				}
				$('#browseFile1').modal('hide');
			}else{
                $('#browseFile1').modal('hide');
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
	$('body').on('click','.img_remover1',function(){
		
		$(this).parent().parent().remove();
		
	});
});
</script>