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
  
<div class="modal fade" id="browseFile" tabindex="-1" course_package="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
						<div id="drag-and-drop-zone" class="uploader">
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
	$('#drag-and-drop-zone').dmUploader({
        url: APP_URL+'common/upload_file',
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
				$('#browseFile').modal('hide');
			}else{
                $('#browseFile').modal('hide');
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