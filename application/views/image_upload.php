<link href="<?php echo base_url();?>assets/css/plugins/uploader.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>assets/js/plugins/demo.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/dmuploader.min.js"></script>
<style>
.img_dives{width: 120px; text-align: center; display: inline-block; margin: 10px; border: 1px solid #aaa;}
.file_dives{text-align: center; display: inline-block; margin: 10px; border: 1px solid #aaa;}
.img_dives.active{ border: 2px solid #e93c3c;}
.img_remover{padding: 1px 8px; background-color: red; color: #fff; border-radius: 50%; margin: 4px;}
</style>
  
<div class="modal fade" id="browseImage" tabindex="-1" course_package="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: #f5f5f5;">
            <div class="modal-header">
                <h3>Browse Image</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
			<div class="modal-body">
				<div id="head1_msg"></div>
				<input type="hidden" value="<?php if($image_cat){echo $image_cat;}else{ echo 'menu'; }?>" name="image_cat" class="image_cat">
				<input type="hidden" value="<?php if($sub_folder_name){ echo $sub_folder_name;}?>" name="sub_folder_name" class="sub_folder_name">
                <div class="row demo-columns">
					<div class="col-md-8 offset-md-2">
						<p>Image type should be GIF,JPG,PNG</p>
						<p>Image should be 2 MB or smaller</p>
						<!-- D&D Zone-->
						<div id="drag-and-drop-zone" class="uploader">
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
	var img_counter=0;
	var img_prev_class = '';
	var img_input_id ='';
	var img_count = 'single';
	var img_primary = 'no';
	
	$('body').on('click','.comman_image_upload_class',function(){
		img_prev_class = $(this).attr('img_prev_class');
		img_input_id = $(this).attr('img_input_id');
		img_count = $(this).attr('img_count');
		img_primary = $(this).attr('img_primary');
	});
	/*uploading drag and drop image*/
	$('#drag-and-drop-zone').dmUploader({
        url: APP_URL+'common/upload_image',
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
			if(status == 200){
				console.log(img_prev_class);
				console.log(img_input_id);
				if(img_count == 'single'){
					$('.'+img_prev_class).removeClass('display_none');
					$('.'+img_prev_class).attr('src',APP_URL+'uploads/'+$('.sub_folder_name').val()+'/'+filename_);
					$('.'+img_input_id).val(filename_);
					//$('#'+img_input_id).css("display","none");
				}else{
					img_counter++;
					
					var primary='';
					if(img_counter==1 && img_primary== 'yes'){
						primary='active';
					}
					$('.'+img_prev_class).append('<div class="img_dives '+primary+'" addr="'+filename_+'" ><img  src="'+APP_URL+'uploads/'+filename_+'" style="width:100px;" ><button type="button" class="btn img_remover" >x</button></div>');
					
				}
				$('#browseImage').modal('hide');
			}else{
                $('#browseImage').modal('hide');
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
		if($(this).parent().hasClass('active')){
			console.log('has actvie');
			$(this).parent().remove();
			setTimeout(function() {
				$('.img_dives').first().addClass('active');
			}, 50);
			
		}else{
			console.log('no actvie');
			$(this).parent().remove();
		}
	});
	$('body').on('click','.img_dives img',function(){
		if(img_primary== 'yes'){
			if($(this).parent().hasClass('active')){
				$(this).parent().removeClass('active');
			}else{
				$('.img_dives').removeClass('active');
				$(this).parent().addClass('active');
			}
		}
	});

});
</script>