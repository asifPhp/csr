<link href="<?php echo base_url(); ?>assets/css/croppie.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>assets/js/croppie.js"></script>
<style>

.image-upload {
	display: block;
    border: 3px solid #fff;
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(0,0,0,.15);
    cursor: pointer;
    overflow: hidden;
}
.image-upload > input
{
    display: none;
}
.image-upload img
{
    cursor: pointer;
}
.cr-slider-wrap{
	display: none;
}
</style>
<input type="hidden" id="staff_id" value="<?php echo $staff_id ?>">
<div id="uploadimageModal" class="modal" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
        <div class="modal-header">
          <?php //var_dump($staff_id);?>
          <h4 class="modal-title">Upload & Crop Image</h4>
		  <span>Scroll up/down to zoom the image in and out</span>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="row">
       <div class="col-md-8 text-center">
        <div id="image_demo" style="width:350px; margin-top:30px"></div>
       </div>
       <div class="col-md-4" style="padding-top:30px;">
        <br />
        <br />
        <br/>
        <button class="btn btn-success crop_image">Crop & Upload Image</button>
     </div>
    </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
     </div>
    </div>
</div>

<script>  
$(document).ready(function(){

	$image_crop = $('#image_demo').croppie({
		enableExif: true,
		viewport: {
		  width:250,
		  height:250,
		  type:'square' //circle
		},
		boundary:{
		  width:300,
		  height:300
		}
	});
 	$('body').on('click', '#upload_image_click', function () {	
 		console.log('hello');
 		$('#upload_image').trigger('click');
 	});
 		

	$('#upload_image').on('change', function(){
		var reader = new FileReader();
		reader.onload = function (event) {
			$image_crop.croppie('bind', {
				url: event.target.result
			}).then(function(){
				console.log('jQuery bind complete');
			});
		}
		reader.readAsDataURL(this.files[0]);
		$('#uploadimageModal').modal('show');
	});

	$('.crop_image').click(function(event){
		var staff_id = $('#staff_id').val();
		console.log(staff_id);
		$image_crop.croppie('result', {
		  type: 'canvas',
		  size: 'viewport'
		}).then(function(response){
			$.post(APP_URL + 'common/croppie_image_upload_org', {
				image: response,
				staff_id: staff_id,
			},
			function (data) {	
				if(data.status==200){
					console.log(APP_URL+'uploads/'+data.imageName);
					$('#uploadimageModal').modal('hide');
					//window.location.reload();
				}
			},'json');
		})
	});

});  
</script>