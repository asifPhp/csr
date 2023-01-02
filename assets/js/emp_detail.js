$('document').ready(function(){
	
	//------------------------------------------------------------------------
    /*
     * This script is used to fill modal for edit emp
     */

    $('body').on('click', '.edit_emp', function () {
        $('#headerMsg').empty();
        $('#add_emp_form label.error').empty();
        $('#add_emp_form input.error').removeClass('error');
        $('#add_emp_form select.error').removeClass('error');

        var user_id = $(this).attr('name');
        var user_name = $(this).closest('tr').find('td:eq(1)').text();
        var user_email = $(this).closest('tr').find('td:eq(2)').text();
        var phone_no = $(this).closest('tr').find('td:eq(3)').text();
        
        $('#emp_id').val(user_id);
        $('#emp_name').val(user_name);
        $('#emp_email').val(user_email);
		$('#emp_email').prop('disabled',true);
        $('#phone_no').val(phone_no);
		$('#passwd').parent().parent().addClass('display_none');
		$('#conf_passwd').parent().parent().addClass('display_none');
        
    });
	
	
	//------------------------------------------------------------------------
    /*
     * This script is used to empty the model  when click on add new emp
     */
    $('body').on('click', '.addNewEmp', function () {
		
		$('#emp_id').val(0);
        $('#emp_name').val('');
        $('#emp_email').val('');
		$('#emp_email').prop('disabled',false);
        $('#phone_no').val('');
		$('#passwd').parent().parent().removeClass('display_none');
		$('#conf_passwd').parent().parent().removeClass('display_none');
		
	});

	
	//-----------------------------------------------------------------------
    /* 
     * validation of add_emp_form
     */
	$('#add_emp_form').validate({
		rules: {
            emp_name: {
                required: true,
            },
			emp_email: {
                required: true,
				remote:{
					url: APP_URL + "admin/account/check_availability",
					type: "post",
					data: {
						param: 'registration'
					}
				}
            },
			passwd: {
                required: true,
            },
			conf_passwd: {
                required: true,
				equalTo: '#passwd',
            },
			phone_no: {
                required: true,
            },
			
        },
		 messages: {
			emp_name: {
                required: "Name is required.",
            },
			emp_email: {
                required: "Email ID is required.",
				remote: "Email already exists"
            },
			passwd: {
                required: "Password is required.",
            },
			conf_passwd: {
                required: "Confirm Password is required.",
                equalTo: "Confirm Password does not match to Password.",
            },
			phone_no: {
                required: "Phone No. is required.",
            },
			
		},
		errorPlacement: function(error, element) {
            if (element.hasClass('submenu')) {
					error.insertAfter(element.closest('div.form-group').find('.submenu-error'));
			}else  {
                error.insertAfter(element);
            }
		},
		submitHandler: function (form) {
			$.blockUI();
			$('#add_emp_form').find('button[type="submit"]').prop('disabled',true);
			var emp_id = $('#emp_id').val();
			var emp_name = $('#emp_name').val();
			var emp_email = $('#emp_email').val();
			var passwd = $('#passwd').val();
			var phone_no = $('#phone_no').val();
			
			
            $.post(APP_URL + 'admin/account/update_emp', {
                emp_id: emp_id,
                emp_name: emp_name,
                emp_email: emp_email,
                passwd: passwd,
                phone_no: phone_no,
            },
			function (response) {
				$("html, body").animate({scrollTop: 0}, "slow");
                $('#headerMsg').empty();
				if (response.status == 200) {
                    var message = response.message;
					if(emp_id!=0){
						message = "Emp info has been updated successfully!";
						$('.edit_emp[name=' + emp_id + ']').closest("tr").find("td:eq(1)").text(emp_name);
						$('.edit_emp[name=' + emp_id + ']').closest("tr").find("td:eq(2)").text(emp_email);
						$('.edit_emp[name=' + emp_id + ']').closest("tr").find("td:eq(3)").text(phone_no);
						
					}
					$('#headerMsg').html("<div class='alert alert-success fade in'>\n\
                        <button class='close' type='button' data-dismiss='alert'>x</button>\n\
                        <strong>" + message + "</strong>&nbsp;&nbsp;<a onclick='location.reload();' href='javascript:void(0);'>Refresh!</a></div>");
					
                }
                else if (response.status == 201) {
                    $('#headerMsg').html("<div class='alert alert-danger fade in'>\n\
                        <button class='close' type='button' data-dismiss='alert'>x</button>\n\
                        <strong>" + response.message + "</strong>&nbsp;&nbsp;<a onclick='location.reload();' href='javascript:void(0);'>Refresh!</a></div>");
                }
				
				//$('#add_emp_form').find('button[type="reset"]').trigger('click');
				
				$.unblockUI();
				$('#add_emp_form').find('button[type="submit"]').prop('disabled',false);
				$('#browseEmployee').modal('hide');
				$('#emp_id').val(0);
				$('#emp_name').val('');
				$('#emp_email').val('');
				$('#phone_no').val('');
				$('#passwd').val('');
				$('#conf_passwd').val('');
			}, 'json');
		return false;
		},
	});
	
	
	//------------------------------------------------------------------------
    /*
     * This script is used to fill modal for edit emp
     */

    $('body').on('click', '.define_access', function () {
        $.blockUI();
		$('#headerMsg').empty();
        $('#add_emp_form label.error').empty();
        $('#add_emp_form input.error').removeClass('error');
        $('#add_emp_form select.error').removeClass('error');
		$('#emp_id2').val(0);
        $('#emp_name2').text('');
		$('input[type="checkbox"].submenu').prop('checked',false);
        var emp_id = $(this).attr('name');
        var emp_name = $(this).closest('tr').find('td:eq(1)').text();
		
        $('#emp_id2').val(emp_id);
        $('#emp_name2').text(emp_name);
		
		/*Now Fetching emp access detail*/
	   $.post(APP_URL+'admin/account/get_emp_accessibility_detail',{
			emp_id : emp_id,
		},function(response){
			$.unblockUI();
			if(response.status==200){
				$(response.data).each(function(key,val){
					var module_id = val['module_id'];
					var submodule_id = val['submodule_id'];
					$('input[type="checkbox"][manu="'+module_id+'"][value="'+submodule_id+'"]').prop('checked',true);
				});
			}else{
				
				return false;
			}
		},'json');
		/*now opening the modal*/
		$('#browseAccessModal').modal('show');
    });
	
	
	//-----------------------------------------------------------------------
    /* 
     * validation of access_define
     */
	$('#access_define_form').validate({
		ignore: [],
        rules: {
            submenu: {
                required: true,
            },
        },
		 messages: {
			submenu: {
                required: "At least one Sub Menu is required.",
            },
		},
		errorPlacement: function(error, element) {
            if (element.hasClass('submenu')) {
					error.insertAfter(element.closest('div.form-group').find('.submenu-error'));
			}else  {
                error.insertAfter(element);
            }
		},
		submitHandler: function (form) {
			$.blockUI();
			$('#access_define_form').find('button[type="submit"]').prop('disabled',true);
			var emp_id = $('#emp_id2').val();
			var access_define = [];
			$('.access_define_row').find('input[type="checkbox"].submenu:checked').each(function(){
				access_define.push({
					module_id : $(this).closest('div.access_define_row').find('.menu').attr('name'),
					submodule_id : $(this).val(),
				});
			});
			
			
			var subject_list = [];
			$('.checked_category:checked').each(function(key,value){
				var subject_id = $(this).attr('category_id');
				subject_list[key] = subject_id;
			});
			console.log(subject_list);
			
            $.post(APP_URL + 'admin/account/update_accessibility', {
                emp_id: emp_id,
                access_define: access_define,
                subject_list: subject_list,
				
            },
			function (response) {
				$("html, body").animate({scrollTop: 0}, "slow");
                $('#headerMsg').empty();
				if (response.status == 200) {
                    var message = response.message;
					
					$('#headerMsg').html("<div class='alert alert-success fade in'>\n\
                        <button class='close' type='button' data-dismiss='alert'>x</button>\n\
                        <strong>" + message + "</strong></div>");
				}
                else if (response.status == 201) {
                    $('#headerMsg').html("<div class='alert alert-danger fade in'>\n\
                        <button class='close' type='button' data-dismiss='alert'>x</button>\n\
                        <strong>" + response.message + "</strong></div>");
                }
				
				//$('#access_define_form').find('button[type="reset"]').trigger('click');
				
				$.unblockUI();
				$('#access_define_form').find('button[type="submit"]').prop('disabled',false);
				$('#browseAccessModal').modal('hide');
			}, 'json');
		return false;
		},
	});
	
	
	//---------------------------------------------------------------------
    /**
     * This script is used to remove ads from the list
     */
	
});