$('document').ready(function(){
	
	//------------------------------------------------------------------------//
    /**
     * This part of script is used to upload image for add section.
     */
        var bar = $('.bar');
		var percent = $('.percent');
		var status = $('#status');
		$('#upload_image').ajaxForm({
			dataType: 'JSON',
			beforeSend: function() {
				$('#status').empty();
				var percentVal = '0%';
				bar.width(percentVal);
				percent.html(percentVal);
			},
			uploadProgress: function(event, position, total, percentComplete) {
				var percentVal = percentComplete + '%';
				bar.width(percentVal);
				percent.html(percentVal);
			},
			complete: function(response) {
					$('#browseImage').modal('hide');
				var status= (response.responseText).split('status":')[1].split(',"')[0];
				if(status == '200'){
					var filename_ = (response.responseText).split('filename":"')[1].split('"}')[0];				
					$(".img-preview").removeClass('display_none').addClass('display_inline');
					$(".img-preview").attr('src',APP_URL+'uploads/' + filename_);
					$('#gallery_img').val(filename_);
					$('#gallery_img-error').css({"display": "none"});
					$("#myFile").val('');
					setTimeout(  function()   {
						$('body').addClass('modal-open');
					 }, 1000);
				}else{
					alert('Invalid file');
				}
				
				$('.percent').html('0%');
				$.unblockUI();
				return false;
			}
		});
	
	
	//------------------------------------------------------------------------
    /*
     * This script is used to fill modal for edit testimonials
     */
    $('body').on('click', '.edit_testimonials', function () {		
        $('#err_testimonials_form').empty();

        var gallery_id = $(this).attr('name');
        var gallery_des = $(this).closest('tr').find('td:eq(1)').text();
		var gallery_img = $(this).closest('tr').find('td:eq(2)').find('img').attr('src');
		
        $('#gallery_id').val(gallery_id);
		$(".img-preview").removeClass('display_none').addClass('display_inline');
		$(".img-preview").attr('src',gallery_img);
		$('#gallery_img').val(gallery_img.split(APP_URL+'uploads/')[1]);
		
    });
	
	//------------------------------------------------------------------------
    /*
     * This script is used to empty the model  when click on add new Slider
     */
    $('body').on('click', '.addNewTestimonials', function () {
		$("#gallery_id").val(0);
		$("#gallery_des").val('');
		$("#gallery_img").val('');
		$(".img-preview").removeClass('display_inline').addClass('display_none');
		$(".img-preview").attr('src','');
		
	});
	
	//-----------------------------------------------------------------------
    /* 
     * validation of add city
     */
	$('#gallery_form').validate({
		ignore: [],
        rules: {
			gallery_img: {
                required: true,
            },
         },
		 messages: {
			gallery_img: {
                required: "Image is required.",
            },
		},
		submitHandler: function (form) {
			var gallery_id = $('#gallery_id').val();
            var gallery_des = $('#gallery_des').val();
			var gallery_img = $('#gallery_img').val();
			$.post(APP_URL + 'admin/configure_access/update_gallery', {
                gallery_id: gallery_id,
                gallery_des: gallery_des,
				gallery_img: gallery_img,
			},
			function (response) {
				$("html, body").animate({scrollTop: 0}, "slow");
                $('#err_testimonials_form').empty();
				if (response.status == 200) {
                    var message = response.message;
					if(gallery_id!=0){
						message = "Press Gallery has been updated successfully!";
						$('.edit_testimonials[name=' + gallery_id + ']').closest("tr").find("td:eq(1)").text(gallery_des);
						$('.edit_testimonials[name=' + gallery_id + ']').closest("tr").find("td:eq(2)").find('img').attr('src',APP_URL+'uploads/' + gallery_img);
						
						$("#err_testimonials_form").fadeTo(2000, 500).slideUp(500, function(){
						$('#err_testimonials_form').remove();
						window.location.href = APP_URL+'admin/configure_access/add_gallery';
					});
						
					}else{
						$('#err_testimonials_form').html("<div class='alert alert-success fade in'>\n\
                        <button class='close' type='button' data-dismiss='alert'>x</button>\n\
                        <strong>" + message + "</strong></div>");
						window.setTimeout(function(){location.reload()},3000);
						
						$("#err_testimonials_form").fadeTo(2000, 500).slideUp(500, function(){
						$('#err_testimonials_form').remove();
						window.location.href = APP_URL+'admin/configure_access/add_gallery';
					});
					}
					$('#err_testimonials_form').html("<div class='alert alert-success fade in'>\n\
                        <button class='close' type='button' data-dismiss='alert'>x</button>\n\
                        <strong>" + message + "</strong></div>");
					
                }
                else if (response.status == 201) {
                    $('#err_testimonials_form').html("<div class='alert alert-danger fade in'>\n\
                        <button class='close' type='button' data-dismiss='alert'>x</button>\n\
                        <strong>" + response.message + "</strong></div>");
						$("#err_testimonials_form").fadeTo(2000, 500).slideUp(500, function(){
						$('#err_testimonials_form').remove();
						window.location.href = APP_URL+'admin/configure_access/add_gallery';
					});
                }
				$("#gallery_id").val(0);
				$("#gallery_des").val('');
				$("#gallery_img").val('');
				$(".img-preview").removeClass('display_inline').addClass('display_none');
				$(".img-preview").attr('src','');
				$('#browseNewTestimonials').modal('hide');
				
			}, 'json');
		return false;
		},
	});
	
	//---------------------------------------------------------------------
    /**
     * This script is used to remove add_gallery from the list
     */
	$('body').on('click', '.remove_gallery', function () {
        if (!confirm("Do you want to delete")) {
            return false;
        }
        var gallery_id = parseInt($(this).attr('name'));
        $.post(APP_URL + 'admin/configure_access/remove_gallery', {gallery_id: gallery_id}, function (response) {
            $('#err_testimonials_form').empty();
            if (response.status == 200) {
                $("html, body").animate({scrollTop: 0}, "slow");               
                $('#err_testimonials_form').html("<div class='alert alert-success fade in'>\n\
                        <button class='close' type='button' data-dismiss='alert'>x</button>\n\
                        <strong>" + response.message + "</strong></div>");

                $('.remove_gallery[name=' + gallery_id + ']').closest("tr").remove();
				
				$("#err_testimonials_form").fadeTo(2000, 500).slideUp(500, function(){
						$('#err_testimonials_form').remove();
						window.location.href = APP_URL+'admin/configure_access/add_gallery';
					});
            }
            else {
                $('#err_testimonials_form').html("<div class='alert alert-danger fade in'>\n\
                        <button class='close' type='button' data-dismiss='alert'>x</button>\n\
                        <strong>" + response.message + "</strong></div>");
						$("#err_testimonials_form").fadeTo(2000, 500).slideUp(500, function(){
						$('#err_testimonials_form').remove();
						window.location.href = APP_URL+'admin/configure_access/add_gallery';
					});
            }
        }, 'json');
        return false;
    });
});