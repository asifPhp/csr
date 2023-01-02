<link href="<?php echo base_url(); ?>assets/css/croppie.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>assets/js/croppie.js"></script>
<style>
.croppie-image-upload img{width: 180px; height: 180px; box-shadow: 0 0 5px rgba(0,0,0,.15);}

.image-upload > input{display: none;}
.image-upload img{cursor: pointer;}
.cr-slider-wrap{display: none;}
</style>
<!---This code is plased at to uplad a image --->
<!---<div class="croppie-image-upload croppie_upload_image_click" id="croppie_upload_image_click" >
	<input class="form-control _image" id="product_default_image" name="product_default_image" type="hidden" value="<?php echo $product_default_image; ?>">
	<div class="image-upload" id="uploaded_image">
	    <?php if($product_default_image){ ?>
		   <img src="<?php echo base_url().'uploads/'.$product_default_image;?>" class="img-preview">
	    <?php }else{ ?>
	        <img src="<?php echo base_url();?>uploads/default.png" class="img-preview">
	    <?php } ?>
	</div>
</div>
<input type="file" name="croppie_upload_image" id="croppie_upload_image" class="croppie_upload_image" image_input="product_default_image" image_preview_div="uploaded_image" accept="image/*" style="display: none;" />-->

<div id="uploadimageModal" class="modal" role="dialog">
 	<div class="modal-dialog">
  		<div class="modal-content">
        	<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
          		<h4 class="modal-title">Upload & Crop Image</h4>
				<div>Note: you can resize based on requirement to adjust width and height</div>
        	</div>
       		<div class="modal-body">
          		<div class="row">
       				<div class="col-md-12 text-center">
        				<div id="image_demo" ></div>
       				</div>
    			</div>
        	</div>
	        <div class="modal-footer">
			<button class="btn btn-success crop_image">Crop & Upload Image</button>
	          	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        </div>
     	</div>
    </div>
</div>

<script>  
$(document).ready(function(){
	var image_input_id='';
	var image_preview_div_id='';
	
	$image_crop = $('#image_demo').croppie({
	    enableExif: true,
	    viewport: {
	      width:600,
	      height:600
	    },
	    boundary:{
	      width:600,
	      height:600
	    },
		showZoomer: true,
		enableResize: true,
		enableOrientation: true,
		mouseWheelZoom: 'ctrl'
	});
	
 	$('body').on('click', '.croppie_upload_image_click', function () {	
 		console.log('hello');
 		$(this).parent().find('.croppie_upload_image').trigger('click');
 	});
 		
 	$('body').on('change', '.croppie_upload_image', function () {	
  		image_input_id=$(this).attr('image_input_id');
		image_preview_div_id=$(this).attr('image_preview_div_id');
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

	$('body').on('click', '.crop_image', function () {
	    $image_crop.croppie('result', {
	      type: 'canvas',
	      size: 'viewport'
	    }).then(function(response){
	    	$.post(APP_URL + 'admin/common/croppie_image_upload', {
	            image: response,
	     	},function (data) {	
	        	if(data.status==200){
	        		console.log(APP_URL+'uploads/'+data.imageName);
	        		console.log(image_input_id);
			        $('#uploadimageModal').modal('hide');
			        $('#'+image_preview_div_id).find('img').attr('src',APP_URL+'uploads/'+data.imageName);
			        $('#'+image_input_id).val(data.imageName);
			    }
	      	},'json');
    	})
  	});

});  
</script>