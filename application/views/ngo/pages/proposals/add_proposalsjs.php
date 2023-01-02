
<script>
$('document').ready(function(){
	//$('#page1').removeClass('active');
	//$('#page5').addClass('active');
	   // finail_entity_submit();   
		



	var page_counter = $('.page_counter').val();
    var page_3_is_any_error = 'no';
	   console.log("page_counter");
	   console.log(page_counter);
	if(page_counter == 3){
		$('.js-example-basic-single').select2();
		var geo_instance ='';
		var categories_instance ='';
		get_organisation_data();

        var assignee = $('#geo_location_alue').val();
         var orgGeoData = [ ];
                if(assignee){
                var sub_status_array = assignee.split(",");
                console.log(sub_status_array);
                if(sub_status_array.length){
                $.each(sub_status_array, function(index, item) {
                    orgGeoData.push(item)
                });
            }
        }
        console.log(orgGeoData);
		function get_organisation_data(){
			$.post(APP_URL + 'ngo/proposals/get_geoData', {
			},
			function (response) {
				var geoData=response.geoData;
				//var orgGeoData=response.orgGeoData;
             
				geo_instance = $('#geo_location').comboTree({
					source : geoData,
					isMultiple:true,
					cascadeSelect:true,
					//selected: orgGeoData
				});
                console.log(orgGeoData);
				if(orgGeoData){
					geo_instance.setSelection(orgGeoData);
				}

			},'json');
			
		}
	
		var is_add_edit3 = $('#is_add_edit3').val();
		console.log(is_add_edit3);
		if(is_add_edit3 == 'add'){
			$("#city option").each(function(key,val) {
				//console.log(val.value);
				if(val.value){
					$(this).remove();
				}
			});
		}else{
			var state_id = $('#state option:selected').attr('id');
			console.log(state_id);
			$("#city option").each(function(key,val) {
				var state_id_ = $(this).attr('state_id');
				//console.log(state_id_);
				if(state_id_ != undefined){
					if(state_id_ != state_id){
						$(this).remove();
					}
				}
			});
		}
	}
	
	$('body').on('change', ".state", function(e) {

		var options = $('#city_temp > option ').clone();
		//console.log(options);
		$('#city').append(options);
		
		var state_id = $('#state option:selected').attr('id');
		console.log(state_id);
		$("#city option").each(function(key,val) {
			var state_id_ = $(this).attr('state_id');
			console.log(state_id_);
			if(state_id_ != undefined){
				if(state_id_ != state_id){
					$(this).remove();
				}
			}
		});
	});
	
	$('body').on('change','#proposal_dropdown',function(){
		var prop_id = $('#proposal_dropdown option:selected').attr('prop_id');
		var org_id = $('#organisation_id option:selected').val();
		var ngo_id = $('#ngo_id option:selected').val();
		if(prop_id){
		window.location.href=APP_URL+"ngo/proposals/index?prop_id="+prop_id+'&autofill=true&org_id='+org_id+'&ngo_id='+ngo_id;
		//window.location.reload();
		/*setTimeout(function(){
			
		}, 2000);*/
		
		}else{
			window.location.href=APP_URL+"ngo/proposals/index";
			
		}
		
	});
	
	$('body').on('change','#local_address',function(){
		
		//var options = $('#temp_state > option ').clone();
		//console.log("options");
		//console.log(options);
		//$('#state').append(options);
		
		var registration_state = $('#local_address option:selected').attr('id');
		console.log("registration_state");
		console.log(registration_state);
		var registration_city = $('#local_address option:selected').attr('registration_city');
		var registration_street_address = $('#local_address option:selected').attr('registration_street_address');
		var registration_pin_code = $('#local_address option:selected').attr('registration_pin_code');
		console.log(registration_city +','+ registration_state+' , '+registration_street_address+' , '+registration_pin_code) ;
		$('#street_address').val(registration_street_address);
		//$('#state').val(registration_state);
		$('#city').val(registration_city);
		$('#pincode').val(registration_pin_code);
		
		//var state_id = $('#state option:selected').val();
			//console.log("state_id");
			//console.log(state_id);
		//var state_id = $('#state option:selected').attr('id');
		$("#state option").each(function(key,val) {
			console.log("val");
			console.log(val);
			var state_valu = $(this).val();
			
			console.log("state_valu");
			console.log(state_valu);
			//console.log(state_id);
			if(state_valu != undefined){
				if(state_valu === registration_state){
					console.log("match yes");
					//alert("match yes");
					var $newOption = $("<option selected='selected'></option>").val(state_valu).text(state_valu)
 					$("#state").append($newOption).trigger('change');
					 // $('#state option:first').attr('selected', 'selected');
					
				}
			}
		});
	});
	
	$('body').on('change','#focus_category',function(){
		
		$('#focus_subcategory').empty();
		var product_sub_category_id_hidden_009 = $('.product_sub_category_id_hidden_009').val();
		
		var optVal = $("#focus_category option:selected").val();
		console.log('category ' + optVal);

		var options = $("#sub_category_temp > option").clone();

		$('#focus_subcategory').append(options);

		$('#focus_subcategory option').each(function(){
			if ($(this).attr('id') != optVal) {
				if ($(this).attr('value') != "") {
					$(this).remove();
				}
			}
		});
	});

	$(".old_date").datepicker({
		changeMonth: true,
		changeYear: true,
		dateFormat: 'yy-mm-dd',
		minDate: 'dateToday',
		yearRange : 'c-75:c+75',
	});
    $(".new_date").datepicker({
		changeMonth: true,
		changeYear: true,
		dateFormat: 'yy-mm-dd',
		minDate: 'dateToday',
		yearRange : 'c-75:c+75',
	});
		
	$("body").on("click",".save_step1",function(){
		finail_entity_submit();
		$('#alert_danger_error').empty();
	});
	$("body").on("click",".step1_next",function(){
		$('#page1').removeClass('active');
		$('#page2').addClass('active');
		var organisation_i = $("#organisation_id option:selected").text();
		if(organisation_i != 'Select'){
			$('.title_org_name').text(organisation_i);
		}
		finail_entity_submit();
		$('#alert_danger_error').empty();
    });
	
	
	$("body").on("click",".step1_save_and_next",function(){
		var organisation_id = $('#organisation_id').val();
		var ngo_id = $('#ngo_id').val();
		var is_error1 = 'no';
		console.log("organisation_id");
		console.log(organisation_id);
		console.log(ngo_id);
		if(ngo_id){
			$('#ngo_required_error').addClass('display_none');
		}else{
			is_error1 = 'yes';
			$('#ngo_required_error').removeClass('display_none');
		}
		
		if(organisation_id){
			$('#organisation_required_error').addClass('display_none');
		}else{
			is_error1 = 'yes';
			$('#organisation_required_error').removeClass('display_none');
		}
		console.log(is_error1);
		if(is_error1 == 'yes'){
			$("html, body").animate({
				scrollTop: 0
			}, "slow");
			$('#alert_danger_error').html("<div class='alert alert-danger fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>Please fill in all required fields or click on the Finish Later button below</strong></div>");
			return false;
		}else{
			console.log("gdfg");
			$('#alert_danger_error').empty();
			//finail_entity_submit();
			$('#page1').removeClass('active');
			$('#page2').addClass('active');
			
			var organisation_i = $("#organisation_id option:selected").text();
			if(organisation_i != 'Select'){
				$('.title_org_name').text(organisation_i);
			}
			$("html, body").animate({
				scrollTop: 0
			}, "slow");
		}
		
    });
	

    function finail_entity_submit(){
        var prop_id = $('#prop_id').val();
        var code = $('#code').val();

        var table_field = [];
        table_field={
            //title : $('#title').val(),
            //code : $('#code').val(),
            organisation_id : $('#organisation_id').val(),
            ngo_id : $('#ngo_id').val(),
        };
       $.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
        $.post(APP_URL + 'ngo/proposals/update_proposals', {
            prop_id: prop_id,
            //code: code,
            table_field: table_field,
        },
        function (response) {
            $.unblockUI();
            //$("html, body").animate({scrollTop: 0}, "slow");
            $('#err_add_plan').empty();
            if (response.status == 200) {
				$("html, body").animate({scrollTop: 0}, "slow");
				$.toaster({
					priority:'success',
					message: 'Saved Successfully '
				});
				
                $('#prop_id').val(response.prop_id);
				
				prop_id = $('#prop_id').val();
				var is_add_edit = $('#is_add_edit').val();
				console.log(is_add_edit);
				console.log(prop_id);
				if(is_add_edit == 'edit'){
					setTimeout(function(){
						window.location.href=APP_URL+"ngo/proposals/edit?id="+prop_id ;	
					}, 2000);
				}
				/*$('#err_add_plan').empty();
                $('#err_add_plan').html("<div class='alert alert-success fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + response.message + "</strong></div>");
                $("#err_add_plan").fadeTo(2000, 500).slideUp(500, function(){
                    $('#err_add_plan').empty();
                    window.location.href = APP_URL+'ngo/proposals/list';
                });*/
           } else {
                $('#err_add_plan').empty();
                $('#err_add_plan').html("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + response.message + "</strong></div>");
                $("#err_add_plan").fadeTo(2000, 500).slideUp(500, function(){
                    $('#err_add_plan').empty();
                });
            }
        }, 'json');
    }

    $("body").on("click",".step2_next1",function(){
		console.log('click');
		prop_id = $('#prop_id').val();
		var is_add_edit = $('#is_add_edit2').val();
		console.log(is_add_edit);
		console.log(prop_id);
		if(is_add_edit == 'edit'){
			setTimeout(function(){
				window.location.href=APP_URL+"ngo/proposals/edit?id="+prop_id ;	
			}, 500);
		}
	});
    $("body").on("click",".step2_next",function(){
        /*if(!$('#title').val()){
            message="title is required";
            $('#err_add_plan').empty();
            $('#err_add_plan').html("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + message + "</strong></div>");
            $("#err_add_plan").fadeTo(2000, 500).slideUp(500, function(){
                $('#err_add_plan').empty();
            });
        }else if(!$('#code').val()){
            message="code is required";
            $('#err_add_plan').empty();
            $('#err_add_plan').html("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + message + "</strong></div>");
            $("#err_add_plan").fadeTo(2000, 500).slideUp(500, function(){
                $('#err_add_plan').empty();
            });
        }else{*/
            $('#page2').removeClass('active');
            $('#page3').addClass('active');
            //finail_submit();
       // }
    });
	$("body").on("click",".step3_next",function(){
        /*if(!$('#title').val()){
            message="title is required";
            $('#err_add_plan').empty();
            $('#err_add_plan').html("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + message + "</strong></div>");
            $("#err_add_plan").fadeTo(2000, 500).slideUp(500, function(){
                $('#err_add_plan').empty();
            });
        }else if(!$('#code').val()){
            message="code is required";
            $('#err_add_plan').empty();
            $('#err_add_plan').html("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + message + "</strong></div>");
            $("#err_add_plan").fadeTo(2000, 500).slideUp(500, function(){
                $('#err_add_plan').empty();
            });
        }else{*/
            $('#page3').removeClass('active');
            $('#page4').addClass('active');
            finail_submit();
       // }
    });
	$("body").on("click",".skip_step_four",function(){
        /*if(!$('#title').val()){
            message="title is required";
            $('#err_add_plan').empty();
            $('#err_add_plan').html("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + message + "</strong></div>");
            $("#err_add_plan").fadeTo(2000, 500).slideUp(500, function(){
                $('#err_add_plan').empty();
            });
        }else if(!$('#code').val()){
            message="code is required";
            $('#err_add_plan').empty();
            $('#err_add_plan').html("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + message + "</strong></div>");
            $("#err_add_plan").fadeTo(2000, 500).slideUp(500, function(){
                $('#err_add_plan').empty();
            });
        }else{*/
			$('#alert_danger_error').empty();
			add_page_four();
            $('#page4').removeClass('active');
            $('#page5').addClass('active');
			$("html, body").animate({scrollTop: 0}, "slow");
			var organisation_i = $("#organisation_id option:selected").text();
			if(organisation_i != 'Select'){
				$('.selected_csr_organisation').text(organisation_i);
			}
            
       // }
    });
	var is_finish_later = 'no';
	$("body").on("click",".skip_step_five",function(){
		$('#alert_danger_error').empty();
		is_finish_later = 'yes';
		add_page_five();
	});
    function finail_submit(){
        var prop_id = $('#prop_id').val();
        var code = $('#code').val();
	
        var table_field = [];
        table_field={
            title : $('#title').val(),
            //code : $('#code').val(),
        };
       $.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
        $.post(APP_URL + 'ngo/proposals/update_proposals', {
            prop_id: prop_id,
            //code: code,
            table_field: table_field,
        },
        function (response) {
            $.unblockUI();
            $("html, body").animate({scrollTop: 0}, "slow");
            $('#err_add_plan').empty();
            if (response.status == 200) {
                $.toaster({
					priority:'success',
					message: 'Saved Successfully '
				});
               /* $('#err_add_plan').empty();
                $('#err_add_plan').html("<div class='alert alert-success fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + response.message + "</strong></div>");
                $("#err_add_plan").fadeTo(2000, 500).slideUp(500, function(){
                    $('#err_add_plan').empty();
                    //window.location.href = APP_URL+'ngo/proposals/edit?id='+prop_id;
                });*/
           } else {
                $('#err_add_plan').empty();
                $('#err_add_plan').html("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + response.message + "</strong></div>");
                $("#err_add_plan").fadeTo(2000, 500).slideUp(500, function(){
                    $('#err_add_plan').empty();
                });
            }
        }, 'json');
    }
    $("body").on("click",".step2_submit",function(){
        var prop_id = $('#prop_id').val();
        var code = $('#code').val();

        var table_field = [];
        table_field={
            title : $('#title').val(),
            //code : $('#code').val(),
        };
       $.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
        $.post(APP_URL + 'ngo/proposals/update_proposals', {
            prop_id: prop_id,
            //code: code,
            table_field: table_field,
        },
        function (response) {
            $.unblockUI();
            $("html, body").animate({scrollTop: 0}, "slow");
            $('#err_add_plan').empty();
            if (response.status == 200) {
               
                $('#err_add_plan').empty();
                $('#err_add_plan').html("<div class='alert alert-success fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + response.message + "</strong></div>");
                $("#err_add_plan").fadeTo(2000, 500).slideUp(500, function(){
                    $('#err_add_plan').empty();
                    window.location.href = APP_URL+'ngo/proposals/edit?id='+prop_id;
                });
           } else {
                $('#err_add_plan').empty();
                $('#err_add_plan').html("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + response.message + "</strong></div>");
                $("#err_add_plan").fadeTo(2000, 500).slideUp(500, function(){
                    $('#err_add_plan').empty();
                });
            }
        }, 'json');
    }); 
    $("body").on("click",".save",function(){
        //finail_submit();
		var prop_id = $('#prop_id').val();
        window.location.href = APP_URL+'ngo/proposals/edit?id='+prop_id;
    });
    
	var statuss = '';
	var org_name = '';
	var allow_submit = '';
	var gc_granted = '';
	var gc_requested = '';
	function submit_proposal(){
		
		var prop_id = $('#prop_id').val();
		var organisation_id = $('#organisation_id').val();
		var ngo_id = $('#ngo_id').val();
		console.log(organisation_id);	
		console.log(ngo_id);	
		$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
		$.post(APP_URL + 'ngo/proposals/is_all_form_filled', {
            prop_id: prop_id,
			ngo_id: ngo_id,
            org_id: organisation_id,
        },
        function (response) {
            $.unblockUI();
			console.log(response);
			if (response.status == 200) {
				if(response.check_ngo_review_status.length){
					statuss = response.check_ngo_review_status[0].status;
				}
				allow_submit = response.allow_submit;
				gc_granted = response.proposal_data[0].gc_granted;
				gc_requested = response.proposal_data[0].gc_requested;
				org_name = response.org_name;
				$('#alert_danger_error').empty();
				$("html, body").animate({scrollTop: 0}, "slow");
				
				var is_valid = 0;
				if(response.is_form1_filled == 'no'){
					$('#alert_danger_error').append("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>Budgeting Details 1 form is not compeleted</strong></div>");
					is_valid = 1;
				}
				if(response.is_form2_filled == 'no'){
					$('#alert_danger_error').append("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>Budgeting Details 2 form is not compeleted</strong></div>");
					is_valid = 1;
				}
				if(response.is_form3_filled == 'no'){
					$('#alert_danger_error').append("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>Proposal Overview is not compeleted</strong></div>");
					is_valid = 1;
				}
				if(response.is_form4_filled == 'no'){
					$('#alert_danger_error').append("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>Proposal Details is not compeleted</strong></div>");
					is_valid = 1;
				}
				if(response.is_form5_filled == 'no'){
					$('#alert_danger_error').append("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>Budgeting Details is not compeleted</strong></div>");
					is_valid = 1;
				}
				
				if(is_valid==0){
					$('#submitConformModal').modal('show');
				}else{
					//console.log('gc_granted_no');
					//if(!gc_requested){
						//console.log('gc_requested_no');
						$('#submitErrorModal').modal('show');
					//}
				}
				
			}
		}, 'json');
	} 

    $("body").on("click",".finail_proposal_submit",function(){
		
		if(statuss == 'Approved' || allow_submit == 'yes'){
			$('#submitConformModal').modal('hide');
			var prop_id = $('#prop_id').val();
			var organisation_id = $('#organisation_id').val();

			var ngo_id = $('#ngo_id').val();
			
			var table_field = [];
			table_field={
				is_submit : 1,
				proposal_status : 'Submitted',
				proposal_status_for_ngo : 'Submitted',
			};
			console.log(ngo_id);
			$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
			$('#submitErrorModal').modal('hide');
			$.post(APP_URL + 'ngo/proposals/submit_proposals', {
				prop_id: prop_id,
				ngo_id: ngo_id,
				organisation_id: organisation_id,
				table_field: table_field,
			},
			function (response) {
				$.unblockUI();
				$("html, body").animate({scrollTop: 0}, "slow");
				$('#err_add_plan').empty();
				if (response.status == 200) {
				  
					var organisation_id = $('#organisation_id').val();
					var ngo_id = $('#ngo_id').val();
					
					console.log(organisation_id);
					console.log(ngo_id);
					$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
					$.post(APP_URL + 'ngo/proposals/change_org_ngo_review_status', {
						ngo_id: ngo_id,
						organisation_id: organisation_id,
					},
					function (response) {
						$.unblockUI();
						$('#err_add_plan').empty();
						$('#err_add_plan').html("<div class='alert alert-success fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + response.message + "</strong></div>");
						$("#err_add_plan").fadeTo(2000, 500).slideUp(500, function(){
							$('#err_add_plan').empty();
							window.location.href = APP_URL+'ngo/proposals/edit?id='+prop_id;
						});
						
						if (response.status == 200) { 
						   console.log(response);
						} else {
							
						}
					}, 'json');
				   
				} else {
					$('#err_add_plan').empty();
					$('#err_add_plan').html("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + response.message + "</strong></div>");
					$("#err_add_plan").fadeTo(2000, 500).slideUp(500, function(){
						$('#err_add_plan').empty();
					});
				}
			}, 'json');
		}else{
			$('#submitConformModal').modal('hide');
			$('#alert_danger_error').empty();
			$('#alert_danger_error').append("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>Sorry! - Due diligence for your organisation is still pending. You cannot submit a second proposal to "+org_name+" until this entity has been approved by them.</strong></div>");
		}
    })

    $("body").on("click",".green_request_submit",function(){
		
		//if(statuss == 'Approved' || allow_submit == 'yes'){
		
			$('#submitErrorModal').modal('hide');
			var prop_id = $('#prop_id').val();

			var table_field = [];
			table_field={
				gc_requested : 'yes',
			};
		   $.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
			$.post(APP_URL + 'ngo/proposals/submit_proposal_gcrequest', {
				prop_id: prop_id,
				table_field: table_field,
			},
			function (response) {
				$.unblockUI();
				$("html, body").animate({scrollTop: 0}, "slow");
				$('#err_add_plan').empty();
				if (response.status == 200) { 
					
					/*var organisation_id = $('#organisation_id').val();
					var ngo_id = $('#ngo_id').val();
					
					console.log(organisation_id);
					console.log(ngo_id);
					$.post(APP_URL + 'ngo/proposals/change_org_ngo_review_status', {
						ngo_id: ngo_id,
						organisation_id: organisation_id,
					},
					function (response) {
						if (response.status == 200) { 
						   console.log(response);
						} else {
							
						}
					}, 'json');*/
					
					$('#err_add_plan').empty();
					$('#err_add_plan').html("<div class='alert alert-success fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + response.message + "</strong></div>");
					$("#err_add_plan").fadeTo(2000, 500).slideUp(500, function(){
						$('#err_add_plan').empty();
						//window.location.href = APP_URL+'ngo/proposals/edit?id='+prop_id;
					});
				} else {
					$('#err_add_plan').empty();
					$('#err_add_plan').html("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + response.message + "</strong></div>");
					$("#err_add_plan").fadeTo(2000, 500).slideUp(500, function(){
						$('#err_add_plan').empty();
					});
				}
			}, 'json');
		/*}else{
			$('#submitErrorModal').modal('hide');
			$('#alert_danger_error').empty();
			$('#alert_danger_error').append("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>Sorry! - Due diligence for your organisation is still pending. You cannot submit a second proposal to "+org_name+" until this entity has been approved by them.</strong></div>");
		}*/
    })
	
	$('body').on('click', '#save_goto_next_step2', function() {
       if ($("#add_proposal3").valid()) {
			$('#alert_danger_error').empty();
			$("html, body").animate({
			scrollTop: 0
			}, "slow");
        } else {
			$('.skip_step_three').removeClass('display_none');
			$("html, body").animate({
				scrollTop: 0
			}, "slow");
			$('#alert_danger_error').html("<div class='alert alert-danger fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>Please fill in all required fields or click on the Finish Later button below</strong></div>");
			return false;
        }
    });
	
	$('body').on('click', '#save_and_next_page4', function() {
		if ($("#add_proposal4").valid()) {
			$('#alert_danger_error').empty();
		} else {
			$('.skip_step_four').removeClass('display_none');
			$("html, body").animate({
				scrollTop: 0
			}, "slow");
			$('#alert_danger_error').html("<div class='alert alert-danger fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>Please fill in all required fields or click on the Finish Later button below</strong></div>");
			return false;
        }
    });
	
	$('body').on('click', '#save_step5', function() {
		if ($("#add_proposal5").valid()) {
			$('#alert_danger_error').empty();
        }else {
			$('.skip_step_five').removeClass('display_none');
			$("html, body").animate({
				scrollTop: 0
			}, "slow");
			$('#alert_danger_error').html("<div class='alert alert-danger fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>Please fill in all required fields or click on the Finish Later button below</strong></div>");
			return false;
        }
    });
	
	$('body').on('click', '.skip_step_three', function() {
		$('#alert_danger_error').empty();
		add_page_three();
		$('#page3').removeClass('active');
		$('#page4').addClass('active');
       $("html, body").animate({
			scrollTop: 0
		}, "slow");
    });
	/*page 3*/
	
	$('#add_proposal3').validate({
		ignore: [],
        rules: {
			project_title: {
                required: true,
            },
			focus_category: {
                required: true,
            },
			focus_subcategory: {
                required: true,
            },
			category_input: {
                required: true,
            },
			region: {
                required: true,
            },
			benficial_cat: {
                required: true,
            },
			age_group: {
                required: true,
            },
			target_group: {
                required: true,
            },
			slums_villages: {
                required: true,
            },
			women_adult: {
                required: true,
            },
			men_adult: {
                required: true,
            },
			children: {
                required: true,
            },
			geo_location: {
				required: true,
            },
			start_date: {
				required: true,
            },
			end_date: {
				required: true,
            },
			street_address: {
				required: true,
            },
			city: {
			    required: true,
            },
			/*state: {
			    required: true,
            }, */
			pincode: {
			    required: true,
            },
			full_name: {
			    required: true,
            },
			designation: {
			    required: true,
            },
			email_address: {
			    required: true,
            },
			contact_no: {
			    required: true,
            },
		},
		messages: {
			
			project_title: {
                required: "Poject title is required.",
            },
			focus_category: {
                required: "Category is required.",
            },
			focus_subcategory: {
                required: " Sub category is required.",
            },
			category_input: {
                required: " Category input is required.",
            },
			region: {
                required: " Region is required.",
            },
			benficial_cat: {
                required: " Benificiary category is required.",
            },
			age_group: {
                required: " Age group is required.",
            },
			target_group: {
                required: " Target group is required.",
            },
			slums_villages: {
                required: " Slum or villages count is required.",
            },
			women_adult: {
                required: "Women(adult) count is required.",
            },
			men_adult: {
                required: "Men(adult) count is required.",
            },
			children: {
                required: "Children count is required.",
            },
			geo_location: {
                required: "Target grography is required.",
            },
			start_date: {
                required: "Start date is required.",
            },
			end_date: {
                required: "End date is required.",
            },
			street_address: {
                required: "Street address is required.",
            },
			city: {
                required: "City is required.",
            },
			/*state: {
                required: "State is required.",
            },*/
			pincode: {
                required: "Pincode is required.",
            },
			full_name: {
                required: "Full name is required.",
            },
			designation: {
                required: "Designation is required.",
            },
			email_address: {
                required: "Email address is required.",
            },
			contact_no: {
				required: "Contact number is required.",
            },
		},
		errorPlacement: function(error, element) {
            if (element.hasClass('content')) {
					error.insertAfter(element.closest('div.form-group').find('.content-error'));
			}else  {
                error.insertAfter(element);
            }
		},
		submitHandler: function (form) {
			var iserrors = 'no';
			var data=geo_instance.getSelectedIds();
			console.log(data);
			if(data != null){
				$('#geography_error').addClass('display_none');
			} else{
				$('#geography_error').removeClass('display_none');
				iserrors = 'yes';
			}
			var start_date = $('#start_date').val();
			var end_date = $('#end_date').val();
			var state = $('#state').val();
			
			if(state){
				$('#state_error').addClass('display_none');
			}else{
				$('#state_error').removeClass('display_none');
				iserrors = 'yes';
			}
			if(start_date){
				$('#start_date_error').addClass('display_none');
			}else{
				$('#start_date_error').removeClass('display_none');
				iserrors = 'yes';
			}
			
			if(end_date){
				$('#end_date_error').addClass('display_none');
				if(end_date > start_date){
					$('#end_date_error1').addClass('display_none');
				}else{
					$('#end_date_error1').removeClass('display_none');
					iserrors = 'yes';
				}
			}else{
				$('#end_date_error').removeClass('display_none');
				iserrors = 'yes';
				//return false;
			}
			
			console.log(iserrors);
			if(iserrors == 'yes'){
				$("html, body").animate({
					scrollTop: 0
				}, "slow");
				$('#alert_danger_error').html("<div class='alert alert-danger fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>Please Fill All The Information</strong></div>");
			
				$('.skip_step_three').removeClass('display_none');
				return false;
			}else{
				add_page_three();
				$('#alert_danger_error').empty();
				$('#page3').removeClass('active');
				$('#page4').addClass('active');
			}
			return false;
		},
	});
	
    $('body').on('click', '#save_step4', function() {
		$('#alert_danger_error').empty();
        add_page_four();
	});
	
	$('body').on('click', '#save_goto_next_step1', function() {
		$('#alert_danger_error').empty();
        add_page_three();
	});
	
	
	function add_page_three(){
			         
			console.log('submit');
            var project_title = $('#project_title').val();
            var focus_category = $('#focus_category').val();
            var focus_subcategory = $('#focus_subcategory').val();
            var category_input = $('#category_input').val();
            var region = $('#region').val();
            var benficial_cat = $('#benficial_cat').val();
            var age_group = $('#age_group').val();
            var target_group = $('#target_group').val();
            var slums_villages = $('#slums_villages').val();
            var women_adult = $('#women_adult').val();
            var men_adult = $('#men_adult').val();
            var children = $('#children').val();
            var geo_location_ = geo_instance.getSelectedIds();
            var geo_location_id_array = geo_instance.getSelectedIds();

                var geo_location = '';
                if(geo_location_){
                geo_location = geo_location_.toString();
                }
            var geo_location_values = $('#geo_location').val();
            var start_date = $('#start_date').val();
            var end_date = $('#end_date').val();
            var local_address = $('#local_address').val();
            var street_address = $('#street_address').val();
            var state = $('#state').val();
            var city = $('#city').val();
            var pincode = $('#pincode').val();
            var full_name = $('#full_name').val();
            var designation = $('#designation').val();
            var email_address = $('#email_address').val();
            var contact_no = $('#contact_no').val();
            var prop_id = $('#prop_id').val();
			var organisation_id = $('#organisation_id').val();
			var ngo_id = $('#ngo_id').val();
			
					
				
		   
		   
           $.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
            $.post(APP_URL + 'ngo/proposals/proposals_submit_page3', { 
						project_title: project_title,
						focus_category: focus_category,
						focus_subcategory: focus_subcategory,
						category_input: category_input,
						region: region,
						benficial_cat: benficial_cat,
						age_group: age_group,
						target_group: target_group,
						slums_villages: slums_villages,
						women_adult: women_adult,
						men_adult: men_adult,
						children: children,
						geo_location: geo_location,
						geo_location_values: geo_location_values,
						start_date: start_date,
						end_date: end_date,
						local_address: local_address,
						street_address: street_address,
						state: state,
						city: city,
						pincode: pincode,
						full_name: full_name,
						designation: designation,
						email_address: email_address,
						contact_no: contact_no,
						prop_id: prop_id,
						organisation_id: organisation_id,
						ngo_id: ngo_id,
						geo_location_id_array: geo_location_id_array,
						
                
            },
			function (response) {
				$.unblockUI();
				$("html, body").animate({scrollTop: 0}, "slow");
                $('#headerMsg').empty();
				if (response.status ==200) {
                    var message = response.message;
					
					 $.toaster({
                        priority:'success',
                        message: ' Proposal data has been updated successfully '
                    });
                    $('#prop_id').val(response.prop_id);
					
					prop_id = $('#prop_id').val();
					var is_add_edit = $('#is_add_edit3').val();
					console.log(is_add_edit);
					console.log(prop_id);
					if(is_add_edit == 'edit'){
						setTimeout(function(){
							window.location.href=APP_URL+"ngo/proposals/edit?id="+prop_id ;	
						}, 2000);
					}
                }
                else if (response.status == 201) {
                    $('#headerMsg').html("<div class='alert alert-danger fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
					$("#headerMsg").fadeTo(2000, 500).slideUp(500, function(){
						$('#headerMsg').empty();
					});
                }
				
			}, 'json');
	}

	
	/*page 4*/
	$('#add_proposal4').validate({
		
            rules: {
				organization_background_brief: {
					required: true,
				},
				project_summary_proposal: {
					required: true,
				},
				benificiary_profile_brief: {
					required: true,
				},
				benificiary_profile_statement: {
					required: true,
				},
				benificiary_profile_solution: {
					required: true,
				},
				key_activities: {
					required: true,
				},
				specific_outcomes: {
					required: true,
				},
				project_sustainability: {
					required: true,
				},
                comman_file_upload_class: {
                    required: true,
                },
				activitie_project: {
                    required: true,
                },	
			},
			messages: {
				organization_background_brief: {
					required: "Organisation background brief history is required.",
				},
				project_summary_proposal: {
					required: "Executive summary of project is required.",
				},
				benificiary_profile_brief: {
					required: "Benificiaries role in project execution is required.",
				},
				benificiary_profile_statement: {
					required: "Problem satement is required",
				},
				benificiary_profile_solution: {
					required: "Solution about the problem is required",
				},
				key_activities: {
					required: "Key Activities  is required",
				},
				specific_outcomes: {
					required: "Specific oucomes and mesures is required",
				},
				project_sustainability: {
					required: "Project sustainability is required",
				},
                comman_file_upload_class: {
                    required: "Attachment is required.",
                },
				activitie_project: {
                    required: "Attachment is required.",
                },
			},
		errorPlacement: function(error, element) {
            if (element.hasClass('content')) {
					error.insertAfter(element.closest('div.form-group').find('.content-error'));
			}else  {
                error.insertAfter(element);
            }
		},
		submitHandler: function (form) {
			var iserror = 'no';
			var sinle_image_upload = $('#activitie_project').val();
			console.log(sinle_image_upload);
			if(sinle_image_upload){
				$('#project_activities_error').addClass('display_none');
			} else{
				$('#project_activities_error').removeClass('display_none');
				iserror = 'yes';
			}
			console.log(iserror);
			if(iserror == 'yes'){
				$('.skip_step_four').removeClass('display_none');
				$("html, body").animate({
					scrollTop: 0
				}, "slow");
				$('#alert_danger_error').html("<div class='alert alert-danger fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>Please fill in all required fields or click on the Finish Later button below</strong></div>");
				return false;
			}else{
				$('#alert_danger_error').empty();
				add_page_four();
				$('#page4').removeClass('active');
				$('#page5').addClass('active');
				var organisation_i = $("#organisation_id option:selected").text();
				if(organisation_i != 'Select'){
					$('.selected_csr_organisation').text(organisation_i);
				}
			}
			
		return false;
		},
	
    });
	$('body').on('click', '.save_padsffdsge2', function() {
		add_page_four();
	}); 
     

    function add_page_four(){
        console.log('submit');
            var organization_background_brief = $('#organization_background_brief').val();
            var project_summary_proposal = $('#project_summary_proposal').val();
            var  benificiary_profile_brief= $('#benificiary_profile_brief').val();
            var  benificiary_profile_statement= $('#benificiary_profile_statement').val();
            var  benificiary_profile_solution= $('#benificiary_profile_solution').val();
            var  key_activities= $('#key_activities').val();
            var  specific_outcomes= $('#specific_outcomes').val();
            var  project_sustainability= $('#project_sustainability').val();
            var  activitie_project= $('#activitie_project').val();
            var  upload_80G_reg= $('#upload_80G_reg').val();
              var prop_id = $('#prop_id').val();   
            $.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
            $.post(APP_URL + 'ngo/proposals/proposals_submit_page4', { organization_background_brief: organization_background_brief,project_summary_proposal: project_summary_proposal,benificiary_profile_brief:benificiary_profile_brief,benificiary_profile_statement:  benificiary_profile_statement,benificiary_profile_solution:  benificiary_profile_solution,key_activities:key_activities,specific_outcomes:specific_outcomes,project_sustainability:project_sustainability,activitie_project: activitie_project,upload_80G_reg: upload_80G_reg,prop_id: prop_id,

                
            },
            function (response) {
				$.unblockUI();
                $("html, body").animate({scrollTop: 0}, "slow");
                $('#headerMsg').empty();
                if (response.status ==200) {
                    var message = response.message;
                    
                    $.toaster({
                        priority:'success',
                        message: 'Saved Successfully'
                    });
                    
					prop_id = $('#prop_id').val();
					var is_add_edit = $('#is_add_edit4').val();
					console.log(is_add_edit);
					console.log(prop_id);
					if(is_add_edit == 'edit'){
						setTimeout(function(){
							window.location.href=APP_URL+"ngo/proposals/edit?id="+prop_id ;	
						}, 2000);
					}
                }
                else if (response.status == 201) {
                    $('#headerMsg').html("<div class='alert alert-danger fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
                    $("#headerMsg").fadeTo(2000, 500).slideUp(500, function(){
                        $('#headerMsg').empty();
                    });
                }
                
            }, 'json');
    }

	/*page 4*/
	$('#add_proposal5').validate({
		ignore: [],
		rules: {
			total_funds: {
				required: true,
			},
			total_funds_org: {
				required: true,
			},
			balance_funds: {
				required: true,
			},
		},
		messages: {
			total_funds: {
				required: "Total funds for project is required.",
			},
			total_funds_org: {
				required: "Please Enter only number digits.",
			},
			balance_funds: {
				required: "Source of balance funds is required.",
			},
		},
		errorPlacement: function(error, element) {
			if (element.hasClass('content')) {
					error.insertAfter(element.closest('div.form-group').find('.content-error'));
			}else  {
				error.insertAfter(element);
			}
		},
		submitHandler: function (form) {
			
			var is_error = 'no';
			var iserror = 'no';
			var multiple_image_upload = [];
			$('.other_proposal_related_documents .file_dives').each(function(key,val){
				multiple_image_upload.push({
					file_dives  : $(this).attr("addr"),
				}); 
			});
			/*if(multiple_image_upload.length == 0 ){
				$('#other_proposal_related_documents_error').removeClass('display_none');
				iserror = 'yes';
			} else{
				$('#other_proposal_related_documents_error').addClass('display_none');
			}*/
			var upload_budget_file_template = $('#upload_budget_file_template').val(); 
			console.log("upload_budget_file_template");
			var upload_budget_file_template_actual = $('#upload_budget_file_template_actual').val(); 
			if(upload_budget_file_template){
				$('.project_activities_error').addClass('display_none');
			}else{
				is_error='yes';
				$('.project_activities_error').removeClass('display_none');
			}
			
			
			if(iserror == 'yes'){
				$('.skip_step_five').removeClass('display_none');
				$("html, body").animate({
					scrollTop: 0
				}, "slow");
				$('#alert_danger_error').html("<div class='alert alert-danger fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>Please fill in all required fields or click on the Finish Later button below</strong></div>");
				return false;
			}else{
				$('#alert_danger_error').empty();
				
				var total_funds = $('#total_funds').val();
				var total_funds_org = $('#total_funds_org').val();
				var  balance_funds= $('#balance_funds').val();
				var prop_id = $('#prop_id').val(); 

				  
				var multiple_img_upload2 = [];

				$('.other_proposal_related_documents .file_dives').each(function(key, val) {
					multiple_img_upload2.push({
						file_dives_actual: $(this).find('.multii_2').val(),
						file_dives: $(this).attr('addr'),
						file_name: $(this).find('.file_description').val(),
					});
				});
				console.log(multiple_img_upload2);
				var prop_id = $('#prop_id').val(); 
				console.log("is_error");
				console.log(is_error);
				if(is_error=='no'){
					$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
					$.post(APP_URL + 'ngo/proposals/proposals_submit_page5', {
						total_funds: total_funds,
						total_funds_org:total_funds_org,
						balance_funds:balance_funds,
						multiple_img_upload2: multiple_img_upload2,
						prop_id: prop_id,
						upload_budget_file_template:upload_budget_file_template,
						upload_budget_file_template_actual:upload_budget_file_template_actual

					},
					function (response) {
						$.unblockUI();
						$("html, body").animate({scrollTop: 0}, "slow");
						$('#headerMsg').empty();
						if (response.status ==200) {
							var message = response.message;
							
							$.toaster({
								priority:'success',
								message: 'Saved Successfully '
							});
							//submit_proposal();
							//setTimeout(function(){
								window.location.href=APP_URL+"ngo/proposals/edit?id="+prop_id ;
							//}, 2000);
						}
						else if (response.status == 201) {
							$('#headerMsg').html("<div class='alert alert-danger fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
							$("#headerMsg").fadeTo(2000, 500).slideUp(500, function(){
								$('#headerMsg').empty();
							});
						}
						
					}, 'json');
				}else{
					
					$('.skip_step_five').removeClass('display_none');
					$("html, body").animate({
						scrollTop: 0
					}, "slow");
					$('#alert_danger_error').html("<div class='alert alert-danger fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>Please fill in all required fields or click on the Finish Later button below</strong></div>");
					
				}
			}
		},
    });
	
	$('body').on('click', '#save_page5', function() {
		$('#alert_danger_error').empty();
		add_page_five();
	}); 
     

	function add_page_five(){
		console.log('submit');
		var total_funds = $('#total_funds').val();
		var total_funds_org = $('#total_funds_org').val();
		var  balance_funds= $('#balance_funds').val();
		var prop_id = $('#prop_id').val(); 
		var upload_budget_file_template = $('#upload_budget_file_template').val(); 
			console.log("upload_budget_file_template");
			console.log(upload_budget_file_template);
		var upload_budget_file_template_actual = $('#upload_budget_file_template_actual').val(); 
			console.log("upload_budget_file_template");
			console.log(upload_budget_file_template_actual);
		  
		var multiple_img_upload2 = [];

		$('.other_proposal_related_documents .file_dives').each(function(key, val) {
			multiple_img_upload2.push({
				file_dives_actual: $(this).find('.multii_2').val(),
				file_dives: $(this).attr('addr'),
				file_name: $(this).find('.file_description').val(),
			});
		});
		//console.log(multiple_img_upload2);
		var prop_id = $('#prop_id').val(); 
		$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /></h1>' });
		$.post(APP_URL + 'ngo/proposals/proposals_submit_page5', {
			total_funds: total_funds,
			total_funds_org:total_funds_org,
			balance_funds:balance_funds,
			multiple_img_upload2: multiple_img_upload2,
			prop_id: prop_id,
			upload_budget_file_template:upload_budget_file_template,
			upload_budget_file_template_actual:upload_budget_file_template_actual

		},
		function (response) {
			$.unblockUI();
			$("html, body").animate({scrollTop: 0}, "slow");
			$('#headerMsg').empty();
			if (response.status ==200) {
				var message = response.message;
				
				$.toaster({
					priority:'success',
					message: 'Saved Successfully '
				});
				
				prop_id = $('#prop_id').val();
				var is_add_edit = $('#is_add_edit5').val();
				console.log(is_add_edit);
				console.log(prop_id);
				if(is_add_edit == 'edit' || is_finish_later == 'yes'){
					setTimeout(function(){
						is_finish_later = 'no'
						window.location.href=APP_URL+"ngo/proposals/edit?id="+prop_id ;	
					}, 2000);
				}
				//setTimeout(function(){
					//window.location.href=APP_URL+"ngo/proposals/edit?id="+prop_id ;
				//}, 2000);
			}
			else if (response.status == 201) {
				$('#headerMsg').html("<div class='alert alert-danger fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
				$("#headerMsg").fadeTo(2000, 500).slideUp(500, function(){
					$('#headerMsg').empty();
				});
			}
			
		}, 'json');
	}

	$('body').on('click', '.cancel_page', function() {
        var prop_id = $(this).attr('align');
        console.log(prop_id);
        window.location.href=APP_URL+"ngo/proposals/edit?id="+prop_id ;
    });
	$('body').on('click', '#back_page', function() {
        var prop_id = $(this).attr('align');
        console.log(prop_id);
        window.location.href=APP_URL+"ngo/proposals/edit?id="+prop_id ;
    });


	$('body').on('click','#submit_next_page1', function () {

		if($("#add_proposal1").valid()) {
			$('#alert_danger_error').empty();
		}else{
			$("html, body").animate({
				scrollTop: 0
			}, "slow");
			$('#alert_danger_error').html("<div class='alert alert-danger fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>Please fill in all required fields or click on the Finish Later button below</strong></div>");
			return false;
			console.log("validation required");
		}
	});
	
	
	var prop_id = $('#prop_id').val();
	var organisation_id = $('#organisation_id').val();
	var ngo_id = $('#ngo_id').val();
	$.post(APP_URL + 'ngo/proposals/get_pre_proposal_data', {
		prop_id:prop_id,
		org_id:organisation_id,
		ngo_id:ngo_id,
	},
	function (response) {
		$('#alert_danger_error').empty();
		if(response.is_form3_filled == 'no'){
			$('.page3_complete').addClass('display_none');
			$('.page3_incomplete').removeClass('display_none');
		}else{ 
			$('.page3_complete').removeClass('display_none');
			$('.page3_incomplete').addClass('display_none');
		}
		if(response.is_form4_filled == 'no'){
			$('.page4_complete').addClass('display_none');
			$('.page4_incomplete').removeClass('display_none');
		}else{
			$('.page4_complete').removeClass('display_none');
			$('.page4_incomplete').addClass('display_none');
		}
		if(response.is_form5_filled == 'no'){
			$('.page5_complete').addClass('display_none');
			$('.page5_incomplete').removeClass('display_none');
		}else{
			$('.page5_complete').removeClass('display_none');
			$('.page5_incomplete').addClass('display_none');
		}
		
	}, 'json');
	
	
	
	
 });
</script>