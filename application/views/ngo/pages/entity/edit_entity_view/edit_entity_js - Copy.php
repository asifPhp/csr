<script>


$('document').ready(function(){
 	//$('#page1').removeClass('active');
	//$('#page3').addClass('active');
	
	var ngo_id=0;
	

	
	
	/*save and next for page 1*/


	
	/*$('body').on('click','#submit_next_page1', function () {

	  $("#error_field").addClass('display_none');
	  if($("#entity_step1_form").valid())
       {
          console.log("submit the form");
       }
       else 
      {
         $("#error_field").removeClass('display_none');
		 console.log("validation required");
      }
		add_page_one();	
	});*/
	
	
	function add_page_one(){
		console.log('add_page_one')
	    var legal_name = $('#legal_name').val();
		var brand_name=$('#brand_name').val();
		//var entity_id=$('#entity_id').val();
		var code=$('#code').val();
		var website=$('#website').val();
		var category_detail=$('#category_detail').val();
		var geo_location=$('#geo_location').val();
		//console.log(geo_location);
		var city=$('#city').val();
		
		
		var category = $('#category').children("option:selected").val();
		
		var category_array = [];
		$(".append_activities tr").each(function(){
			category_array.push({
				'category_id':$(this).attr('category'),
				'category_name':$(this).find("td:eq(0)").text(),
				'value':$(this).find("td:eq(1)").text()
			});
			
		})
		//console.log(category_array);
		
		var select_category=$(".select_category").text();
		var operation_nature = $('#operation_nature').children("option:selected").val();
		var resource_managment = $('#resource_managment').children("option:selected").val();
		var geographical_reach = $('#geographical_reach').children("option:selected").val();
		var beneficiary_reach = $('#beneficiary_reach').children("option:selected").val();
		 
		$.post(APP_URL + 'ngo/entity/entity_data_page_submit', {
			legal_name: legal_name,
			brand_name:brand_name, 
			//entity_id:entity_id,
			code:code,
            website:website,
           
            geo_location:geo_location,
			city:city,
			
			operation_nature:operation_nature,
			resource_managment:resource_managment,
            geographical_reach:geographical_reach,
			beneficiary_reach:beneficiary_reach,
			ngo_id:ngo_id,
			category_array:category_array,
			
            		
		},
		function (response) {
			$('#head_ngo_review').empty();
            if (response.status == 200) {
				var message = response.message;
				ngo_id=response.ngo_id;
				$.toaster({ priority :'success', message :'Saved'});
                               
                $('#head_ngo_review').html("<div class='alert alert-success fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
				$("#head_ngo_review").fadeTo(2000, 500).slideUp(500, function(){
					$('#head_ngo_review').empty();
					//window.location.href=APP_URL+"organisation/tasks/mytasks";
				});
            } else {
                $('#head_ngo_review').html("<div class='alert alert-danger fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
				$("#head_ngo_review").fadeTo(2000, 500).slideUp(500, function(){
					$('#head_ngo_review').empty();
				});
			}	
			
		}, 'json');
		 return false;	
	}
	
	
	$('#entity_step1_form').validate({
		ignore:[],
				
        rules: {
             legal_name: {
                required: true,
                minlength: 3
            },
            brand_name: {
                required: true,
                minlength: 3
            },
            code: {
                required: true,
				maxlength:6,
                remote:{
                    url: APP_URL + "ngo/entity/check_entity_code",
                    type: "post",
                    data: {
                        param: 'Entity',
                    }
                }
            },
            website: {
                required: true,
                url: true,
            },
			resource_managment:{
				required:true,
			},
			
			geographical_reach:{
				required:true,
			},
			beneficiary_reach:{
				required:true,
			},
			operation_nature:{
				required:true,
			},
			
			
        },
		 
        messages: {
             legal_name: {
                required: "Please enter a valid legal name.",
                minlength: "Legal name must be atleast 3 characters long.",
            },
            brand_name: {
                required: "Brand name must be atleast 3 characters long.",
                minlength: "Brand name must be atleast 3 characters long.",
            },
            code: {
                required: "Code must be less than or equal to 6 characters long.",
                maxlength: "Code must be less than or equal to 6 characters long.",
                remote: "This code has already been taken, please choose something else. ",
            },
            website: {
                required: "Please enter a valid web address.",
                url: "Please enter a valid web address.",
            },
			
			resource_managment:{
				required:"Please choose any one",
			},
			geographical_reach:{
				required:"Please choose one",
			},
			beneficiary_reach:{
				required:"Please choose one",
			},
			operation_nature:{
				required:"Please choose one.",
			}, 
			
        },
	 	    
     
	
        submitHandler: function (form) {
			//$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /> Just a moment...</h1>' });
			
			 $(".error_geo_location").addClass('display_none');
			 
			 
			 
			 var category_array = [];
		   $(".append_activities tr").each(function(){
			category_array.push({
				'category_id':$(this).attr('category'),
				'category_name':$(this).find("td:eq(0)").text(),
				'value':$(this).find("td:eq(1)").text()
			});
			
		})
			 
			 
			 
			 
			var geo_location=$('#geo_location').val();
			
			var city=$('#city').val();
			
			
			if(geo_location == ''){
				console.log("validation required in geo_location");
				$(".error_geo_location").removeClass('display_none');
				return false;
				 
			}else{
				
				
				
			}
			
			
			if(city ==''){
				

				$(".error_city").removeClass('display_none');
				return false;
			}else{
				
				
				$(".error_city").addClass('display_none');
			}
			
			if(category_array.length == 0){
				console.log("validation required in category");
				$(".category_err_2").removeClass('display_none');
				return false;
				
			}else{
				
				console.log("validation not required");
			
			
			
			}
			
			add_page_one();	
			$('#page1').removeClass('active');
			$('#page2').addClass('active');
            return false;
        }
    });
	
	
	$('body').on('change','#category',function(){
		$('#category_detail').removeClass('display_none');
	});
	$('body').on('keypress','#category_detail',function(){
		$('#append_button').removeClass('display_none');
	});
	
	
	/*save for page 1*/
	$('body').on('click','#save_page1', function () {
		
		add_page_one();
		
	});
	/*save and skip page 1*/
	$('body').on('click', '#skip_step_one', function () { 
 
        add_page_one();       	
        $('#page1').removeClass('active');
        $('#page2').addClass('active');
		$("html, body").animate({scrollTop: 0}, "slow");
    });
	
	
	
	
	
	
	
	
	/*save and next for page 2*/
	
	
	/*$('body').on('click','#submit_next_page2', function () {
		       
	  $("#error_field2").addClass('display_none');
	  if($("#entity_step2_form").valid())
       {
          console.log("submit the form");
       }
       else 
      {
         $("#error_field2").removeClass('display_none');
		 console.log("validation required");
      }
		add_page_two();	
	});*/
	
	function add_page_two(){
		
		var Registration_Number=$('#Registration_Number').val();
		var registration_number_12a=$('#registration_number_12a').val();
		var from_date_12a_valid=$('#from_date_12a_valid').val();
		var expire_date_12a_valid=$('#expire_date_12a_valid').val();
		var tax_exemption_percentage=$('#tax_exemption_percentage').val();
		var registration_number_80g=$('#registration_number_80g').val();
		var certificate_date_80G=$('#certificate_date_80G').val();
		var registration_80g_valid=$('#registration_80g_valid').val();
		var tax_exemption_type=$('#tax_exemption_type').val();
		var pan_number=$('#pan_number').val();
		var epf_number=$('#epf_number').val();
		var professional_tax_number=$('#professional_tax_number').val();
		var tan_number=$('#tan_number').val();
		var other_appropriate_certification_input=$('#other_appropriate_certification_input').val();
		var is_12a_certificate=$('input:radio[name="is_12a_certificate"]:checked').val();
		//console.log(is_12a_certificate);
		var is_12a_certificate_cancle=$('input:radio[name="is_12a_certificate_cancle"]:checked').val();
		console.log(is_12a_certificate_cancle);
		var is_tax_exemption_80g=$('input:radio[name="is_tax_exemption_80g"]:checked').val();
		var is_perpetuity_valid=$('input:radio[name="is_perpetuity_valid"]:checked').val();
		var is_valid_tax_exemption=$('input:radio[name="is_valid_tax_exemption"]:checked').val();
		console.log(is_valid_tax_exemption);
		var is_certificate_exist=$('input:radio[name="is_certificate_exist"]:checked').val();
		//var upload_registration_certificate=$('#upload_registration_certificate').val();
		var proof_12a_registration=$('#proof_12a_registration').val();
		var registration_80g_certificate=$('#registration_80g_certificate').val();
		var income_tax_80g_proof=$('#income_tax_80g_proof').val();
		var valid_tax_exemption_proof=$('#valid_tax_exemption_proof').val();
		var pan_soft_copy=$('#pan_soft_copy').val();
		var tan_proof=$('#tan_proof').val();
		var last_year_epf_proof=$('#last_year_epf_proof').val();
		var professional_tax_filling_proof=$('#professional_tax_filling_proof').val();
		var credibility_report=$('#credibility_report').val();
		
	
		var registration_details=new Array();
		$(".registration_details_form").each(function(){
			
			registration_details.push({
				registration_type:$(this).find('.select_button').val(),
				registration_date:$(this).find('.date_of_reg').val(),
				registration_street_address:$(this).find('.reg_street_add').val(),
				registration_state:$(this).find('.state_select').val(),
				registration_city:$(this).find('.city_select').val(),
				registration_pin_code:$(this).find('.pin_code').val(),
				Registration_Number:$(this).find('.reg_num').val(),
				registration_certificate:$(this).find('.reg_certificate').val(),
				
			});
			
		})
		
		
		
		
		
		
		
		var appropriate_certification=new Array();
		$("input[value='Give_india']:checked").each(function(){
			appropriate_certification.push($(this).val());
			
		})
		$("input[value='Credibility_Alliance']:checked").each(function(){
			appropriate_certification.push($(this).val());
			
		})
		$("input[value='BSE_Samman']:checked").each(function(){
			appropriate_certification.push($(this).val());
			
		})
		$("input[value='IICA']:checked").each(function(){
			appropriate_certification.push($(this).val());
			
		})
		$("input[value='Goodera']:checked").each(function(){
			appropriate_certification.push($(this).val());
			
		})
		$("input[value='TISS']:checked").each(function(){
			appropriate_certification.push($(this).val());
			
		})
		$("input[value='Other']:checked").each(function(){
			appropriate_certification.push($(this).val());
			
		})
		//console.log(appropriate_certification);
		 
		$.post(APP_URL + 'ngo/entity/entity_data_page2_submit', {
			registration_details:registration_details,
			registration_number_12a:registration_number_12a,
			from_date_12a_valid:from_date_12a_valid,
			expire_date_12a_valid:expire_date_12a_valid,
			tax_exemption_percentage:tax_exemption_percentage,
			registration_number_80g:registration_number_80g,
			certificate_date_80G:certificate_date_80G,
			registration_80g_valid:registration_80g_valid,
			tax_exemption_type:tax_exemption_type,
			pan_number:pan_number,
			epf_number:epf_number,
			professional_tax_number:professional_tax_number,
			tan_number:tan_number,
			other_appropriate_certification_input:other_appropriate_certification_input,
			is_12a_certificate:is_12a_certificate,
			is_12a_certificate_cancle:is_12a_certificate_cancle,
			is_tax_exemption_80g:is_tax_exemption_80g,
			is_perpetuity_valid:is_perpetuity_valid,
			is_valid_tax_exemption:is_valid_tax_exemption,
			is_certificate_exist:is_certificate_exist,
			appropriate_certification:appropriate_certification,
			//upload_registration_certificate:upload_registration_certificate,
			upload_proof_12A_reg:proof_12a_registration,//
			upload_80G_reg:registration_80g_certificate,
			upload_proof_80G_incometax:income_tax_80g_proof,
			upload_proof_tax_exemption:valid_tax_exemption_proof,//
			soft_copy_pancard:pan_soft_copy,
			proof_of_TAN:tan_proof,
			epf_for_last_year:last_year_epf_proof,
			tax_for_last_year:professional_tax_filling_proof,
			credibility_alliance_report:credibility_report,
			ngo_id:ngo_id,

		},
		function (response) {
			$('#head_ngo_review').empty();
            if (response.status == 200) {
				var message = response.message;
                $("html, body").animate({scrollTop: 0}, "slow");               
                $('#head_ngo_review').html("<div class='alert alert-success fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
                $("#head_ngo_review").fadeTo(2000, 500).slideUp(500, function(){
					$('#head_ngo_review').empty();
					//window.location.href=APP_URL+"organisation/tasks/mytasks";
				});
            } else {
                $('#head_ngo_review').html("<div class='alert alert-danger fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
				$("#head_ngo_review").fadeTo(2000, 500).slideUp(500, function(){
					$('#head_ngo_review').empty();
				});
			}	
			
		}, 'json');
		 return false;	
		
	}
	
	$('#entity_step2_form').validate({
		ignore:[],
        rules: {
			is_12a_certificate:{
				required:true,
			},
			tax_exemption_percentage:{
				required:true,
				range:[0,100],
			},
			is_tax_exemption_80g:{
				required:true,
			},
			is_valid_tax_exemption:{
				required:true,
			},
			pan_number:{
				required:true,
			},
			tan_number:{
				required:true,
			},
			epf_number:{
				required:true,
			},
			professional_tax_number:{
				required:true,
			},
			pan_soft_copy:{
				required:true,
			},
			tan_proof:{
				required:true,
			},
			last_year_epf_proof:{
				required:true,
			},
			professional_tax_filling_proof:{
				required:true,
			},
			is_certificate_exist:{
				required:true,
			},
        },
        messages: {
			is_12a_certificate:{
				required:"Please choose one",
			},
			tax_exemption_percentage:{
				required:"Please enter a number between 0 to 100",
			},
			is_tax_exemption_80g:{
				required:"Please choose one.",
			},
			is_valid_tax_exemption:{
				required:"Please choose one.",
			},
			pan_number:{
				required:"Please enter a valid pan number."
			},
			tan_number:{
				required:"Please enter a valid tan number.",
			},
			epf_number:{
				required:"Please enter a valid epf number",
			},
			professional_tax_number:{
				required:"Please enter a valid tax number.",
			},
			pan_soft_copy:{
				required:"Please select atleast one",
			},
			tan_proof:{
				required:"Please upload one file.",
			},
			last_year_epf_proof:{
				required:"Please select one",
			},
			professional_tax_filling_proof:{
				required:"Please select one.",
			},
			is_certificate_exist:{
				required:"Please choose one.",
			}, 
        },
		errorPlacement: function(error, element) {
            if (element.hasClass('is_12a_certificate')) {
				error.insertAfter(element.closest('div.form-group').find('.12a_certificate'));
            }else if (element.hasClass('is_valid_tax_exemption')) {
				error.insertAfter(element.closest('div.form-group').find('.valid_tax_exemption'));
            }else if (element.hasClass('entity_have_80g')) {
				error.insertAfter(element.closest('div.form-group').find('.entity_80g_tax'));
            }else if (element.hasClass('appropriate_certification')) {
				error.insertAfter(element.closest('div.form-group').find('.appropriate_certification_err'));
            }else if (element.hasClass('appropriate_certification_select')) {
				error.insertAfter(element.closest('div.form-group').find('.appropriate_certificate_error'));
            }else{	
				error.insertAfter(element);
			}
        },
        submitHandler: function (form) {
			console.log('submit handler');
            var registration_detail='yes';
            var is_error='no';
			var registration_details=new Array();
			$(".registration_details_form").each(function() {
					
				if($(this).find('.select_button').val()){					
				}else{
					registration_detail='no';				
				}
				if($(this).find('.date_of_reg').val()){					
				}else{
					registration_detail='no';
				}
				if($(this).find('.reg_street_add').val()){
					
				}else{
					registration_detail='no';
				}
				if($(this).find('.state_select').val()){
					
				}else{
					registration_detail='no';
				}
				if($(this).find('.city_select').val()){
					
				}else{
					registration_detail='no';
				}
				if($(this).find('.pin_code').val()){
					
				}else{
					registration_detail='no';
				}
				if($(this).find('.reg_num').val()){
					
				}else{
					registration_detail='no';
				}
				if($(this).find('.reg_certificate').val()){
					
				}else{
					registration_detail='no';
				}
			})
			if(registration_detail=='no'){
				is_error = 'yes';
				$(".reg_detail_err").removeClass('display_none');
				
			}else{
				$(".reg_detail_err").addClass('display_none');
			}
			
			var is_12a_certificate=$('input:radio[name="is_12a_certificate"]:checked').val();
			if(is_12a_certificate == 'Yes'){
				$("#date_err").addClass('display_none');   
				var from_date_12a_valid=$('#from_date_12a_valid').val();
				
				var expire_date_12a_valid=$('#expire_date_12a_valid').val();
				
				if(!from_date_12a_valid){
					$("#date_err").removeClass('display_none');is_error = 'yes';
				}
				
				if(!expire_date_12a_valid){
					$("#date_err").removeClass('display_none');is_error = 'yes';
				}
				if(is_error == 'no'){
					if(Date.parse(from_date_12a_valid)>Date.parse(expire_date_12a_valid)){ 
						$("#date_err").removeClass('display_none');
						is_error = 'yes';
					}else{
					   $('#date_err').addClass('display_none');  
					}
				}
				
				var registration_number_12a= $('#registration_number_12a').val();
				if(registration_number_12a){
					$('.12A_reg_num_err').addClass('display_none');
				}else{
					is_error = 'yes';
					$('.12A_reg_num_err').removeClass('display_none');
				}
				var proof_12a_registration= $('#proof_12a_registration').val();
				if(proof_12a_registration){
					$('.proof_12a_registration_err').addClass('display_none');
				}else{
					is_error = 'yes';
					$('.proof_12a_registration_err').removeClass('display_none');
				}
				
				var is_12a_certificate_cancle=$('input:radio[name="is_12a_certificate_cancle"]:checked').val();
				if(is_12a_certificate_cancle){
					$('.is_12a_certificate_cancle_err').addClass('display_none');
				}else{
					is_error = 'yes';
					$('.is_12a_certificate_cancle_err').removeClass('display_none');
				}
			}else{
				$('#date_err').addClass('display_none');
				$('.12A_reg_num_err').addClass('display_none');
				$('.proof_12a_registration_err').addClass('display_none');
				$('.is_12a_certificate_cancle_err').addClass('display_none');
			}
		   
			var is_tax_exemption_80g=$('input:radio[name="is_tax_exemption_80g"]:checked').val();
			console.log(is_tax_exemption_80g);
			
			if(is_tax_exemption_80g =='Yes'){
			  
				var registration_number_80g= $('#registration_number_80g').val();
				console.log(registration_number_80g);
				console.log('registration_number_80g');
				if(registration_number_80g){
					$('.registration_number_80g_err').addClass('display_none');
				}else{
					console.log('add')
					$('.registration_number_80g_err').removeClass('display_none');
				}
			}else{
				console.log('evrything ok');
				$('.registration_number_80g_err').addClass('display_none');
			}
		   
		   
			var is_tax_exemption_80g=$('input:radio[name="is_tax_exemption_80g"]:checked').val();
			console.log(is_tax_exemption_80g);
		 
			if(is_tax_exemption_80g =='Yes'){
			  
				var registration_80g_certificate= $('#registration_80g_certificate').val();
				console.log(registration_80g_certificate);
				console.log(registration_80g_certificate);
				if(registration_80g_certificate){
					//hide error
					$('.registration_80g_certificate_err').addClass('display_none');
				}else{
					is_error = 'yes';
					$('.registration_80g_certificate_err').removeClass('display_none');
				}
			
		   }else{
				console.log('evrything ok');
				$('.registration_80g_certificate_err').addClass('display_none');
			   
		   }
		   
		   
		   
		   
		   var is_tax_exemption_80g=$('input:radio[name="is_tax_exemption_80g"]:checked').val();
		   console.log(is_tax_exemption_80g);
		 
		   if(is_tax_exemption_80g =='Yes')
		   {
			  
			  var income_tax_80g_proof= $('#income_tax_80g_proof').val();
			  console.log(income_tax_80g_proof);
			  console.log(income_tax_80g_proof);
			  if(income_tax_80g_proof){
				  //hide error
				  
				  $('.income_tax_80g_proof_err').addClass('display_none');
			  }else{
				   is_error = 'yes';
				  $('.income_tax_80g_proof_err').removeClass('display_none');
				  
				  
			  }
			
		   }else{
			   console.log('evrything ok');
				  $('.income_tax_80g_proof_err').addClass('display_none');
			   
		   }
		   
		   
		   
		   
		   
		   var is_tax_exemption_80g=$('input:radio[name="is_tax_exemption_80g"]:checked').val();
		   console.log(is_tax_exemption_80g);
		 
		   if(is_tax_exemption_80g =='Yes')
		   {
			  
			  var certificate_date_80G= $('#certificate_date_80G').val();
			  console.log(certificate_date_80G);
			  console.log(certificate_date_80G);
			  if(certificate_date_80G){
				  //hide error
				  
				  $('.certificate_date_80g_error').addClass('display_none');
			  }else{
				  is_error = 'yes';
				  $('.certificate_date_80g_error').removeClass('display_none');
				  
				  
			  }
			
		   }else{
			   console.log('evrything ok');
				  $('.certificate_date_80g_error').addClass('display_none');
			   
		   }
		   

			var is_tax_exemption_80g=$('input:radio[name="is_tax_exemption_80g"]:checked').val();
			console.log('is_tax_exemption_80g : '+is_tax_exemption_80g);
		 
			if(is_tax_exemption_80g =='Yes'){
			  
				var is_perpetuity_valid=$('input:radio[name="is_perpetuity_valid"]:checked').val();
				
				console.log('is_perpetuity_valid : '+is_perpetuity_valid);
				if(is_perpetuity_valid =='No'){
			  
					var registration_80g_valid= $('#registration_80g_valid').val();
					console.log('registration_80g_valid : '+registration_80g_valid);
					if(registration_80g_valid){console.log('if : ');
						$('.date_upto_reg_valid_error').addClass('display_none');
					}else{console.log('else : ');
						is_error = 'yes';
						$('.date_upto_reg_valid_error').removeClass('display_none');
					}
				}else if(is_perpetuity_valid =='Yes'){
					console.log('evrything ok');
					$('.date_upto_reg_valid_error').addClass('display_none');
				}else{
						is_error = 'yes';
						$('.date_upto_reg_valid_error').removeClass('display_none');
				}
			}else{
				$('.date_upto_reg_valid_error').addClass('display_none');
			}
			   
			
			  
			   
			var is_valid_tax_exemption=$('input:radio[name="is_valid_tax_exemption"]:checked').val();
			console.log(is_valid_tax_exemption);
			if(is_valid_tax_exemption =='Yes') {
			  
				var tax_exemption_type= $('#tax_exemption_type').val();
				console.log(tax_exemption_type);
				console.log('tax_exemption_type');
			  
				if(tax_exemption_type){
					$('.80G_error').addClass('display_none');
				}else{
					is_error = 'yes';
					$('.80G_error').removeClass('display_none');
				}
			  
				var valid_tax_exemption_proof= $('#valid_tax_exemption_proof').val();
				console.log(valid_tax_exemption_proof);
				if(valid_tax_exemption_proof){				  
					$('.proof_tax_exemption_error').addClass('display_none');
				}else{
					is_error = 'yes';
					$('.proof_tax_exemption_error').removeClass('display_none');
				}
			}else{
				console.log('evrything ok');
				$('.80G_error').addClass('display_none');
				$('.proof_tax_exemption_error').addClass('display_none');
			}
		   
			console.log($("input[name='Give_india']:checked").val());
			var appropriate_certification=new Array();
			$("input[name='Give_india']:checked").each(function(){
				appropriate_certification.push($(this).val());
			})
			$("input[name='Credibility_Alliance']:checked").each(function(){
				appropriate_certification.push($(this).val());
			})
			$("input[name='BSE_Samman']:checked").each(function(){
				appropriate_certification.push($(this).val());
			})
			$("input[name='IICA']:checked").each(function(){
				appropriate_certification.push($(this).val());
			})
			$("input[name='Goodera']:checked").each(function(){
				appropriate_certification.push($(this).val());
			})
			$("input[name='TISS']:checked").each(function(){
				appropriate_certification.push($(this).val());
			})
			$("input[name='Other']:checked").each(function(){
				appropriate_certification.push($(this).val());
			})
			
			
		    var is_certificate_exist=$('input:radio[name="is_certificate_exist"]:checked').val();
			console.log(is_certificate_exist);
		 
			if(is_certificate_exist=='Yes'){
				console.log(appropriate_certification);
				console.log('appropriate_certification.length : '+appropriate_certification.length);
				if(appropriate_certification.length == 0){is_error = 'yes';
					$('.appropriate_certification_err_chkbox').removeClass('display_none');
				}else{
					console.log('add')
					$('.appropriate_certification_err_chkbox').addClass('display_none');
				}
			}else{
				console.log('evrything ok');
				$('.appropriate_certification_err_chkbox').addClass('display_none');
			}
		   
		   
			var is_certificate_exist=$('input:radio[name="is_certificate_exist"]:checked').val();
			console.log(is_certificate_exist);
		 
			if(is_certificate_exist=='Yes') {
			  
				var other_chk = $("input[name='Other']:checked").val();
				console.log(other_chk);
				
				if(other_chk){
					var other_appropriate_certification_input=$('#other_appropriate_certification_input').val();
					console.log(other_appropriate_certification_input);
					if(other_appropriate_certification_input) {
						$('.other_appropriate_certification_input_err').addClass('display_none');
					}else{
						console.log('add')
						$('.other_appropriate_certification_input_err').removeClass('display_none');
					}
				}else{
					
					 $('.other_appropriate_certification_input_err').addClass('display_none');
				}
			}else{
				console.log('evrything ok');
				$('.other_appropriate_certification_input_err').addClass('display_none');
			}
			
		   
		   
   
			console.log('is_error : '+is_error);
			if(is_error == 'yes'){
				console.log('some where error');
				return false;
			}else{
				add_page_two();	
				$('#page2').removeClass('active');
                $('#page3').addClass('active');
				console.log('Everything ok');
			}
        }
    });



	/*save for page 2*/
	$('body').on('click','.save_page2', function () {
		
		add_page_two();
		
	});
	
	/* save and skip for page 2*/
	$('body').on('click', '.skip_step_two', function () {  
        add_page_two();
        $('#page2').removeClass('active');
        $('#page3').addClass('active');
		$("html, body").animate({scrollTop: 0}, "slow");
    });
	

	
	
	
/* Save and next for page3*/	
	/*$('body').on('click','#submit_next_page3', function () {
		
		
		$("#error_field").addClass('display_none');
	  if($("#entity_step3_form").valid())
       {
          console.log("submit the form");
       }
       else 
      {
         $("#error_field").removeClass('display_none');
		 console.log("validation required");
      }
		
		
		
		add_page_three();	
	});*/
	
	function add_page_three(){
		
		var is_non_financial_partnerships=$('input:radio[name="is_non_financial_partnerships"]:checked').val();
	    var non_financial_partnerships = $('#non_financial_partnerships').val();
		var is_leadership_network=$('input:radio[name="is_leadership_network"]:checked').val();
		var leadership_network=$('#leadership_network').val();
		var is_blacklist=$('input:radio[name="is_blacklist"]:checked').val();
		var blacklist=$('#blacklist').val();
		var is_guilty=$('input:radio[name="is_guilty"]:checked').val();
		var guilty=$('#guilty').val();
		var governing_council=new Array();
		$("input[value='been_convicted_by_any_court_of_law']:checked").each(function(){
			governing_council.push($(this).val());	
		})
		$("input[value='been_found_guilty_of_diversion_or_misutilisation_of_funds']:checked").each(function(){
			governing_council.push($(this).val());	
		})
		$("input[value='defaulted_to_any_financial_institution_bank']:checked").each(function(){
			governing_council.push($(this).val());	
		})
		$("input[value='pending_criminal_cases_against_him_her']:checked").each(function(){
			governing_council.push($(this).val());	
		})
		$("input[value='none_of_the_above']:checked").each(function(){
			governing_council.push($(this).val());	
		})
		console.log(governing_council);
		var is_political_affiliation=$('input:radio[name="is_political_affiliation"]:checked').val();
		console.log(is_political_affiliation);
		var religious_affiliation_on_radio=$('#religious_affiliation_on_radio').val();
		console.log(religious_affiliation_on_radio);
		var optradio2=$('input:radio[name="optradio2"]:checked').val();
		var bajaj_group_involved=$('#bajaj_group_involved').val();
		var optradio3=$('input:radio[name="optradio3"]:checked').val();
		var senior_member_involved=$('#senior_member_involved').val();
		var optradio4=$('input:radio[name="optradio4"]:checked').val();
		var previously_recieve_funding=$('#previously_recieve_funding').val();
		var optradio5=$('input:radio[name="optradio5"]:checked').val();
		var received_award=$('#received_award').val();
		var optradio6=$('input:radio[name="optradio6"]:checked').val();
		var received_national_award=$('#received_national_award').val();
		var optradio7=$('input:radio[name="optradio7"]:checked').val();
		var upload_annual_report_1=$('#fy_last_year').val();
		var upload_annual_report_2=$('#fy_2last_year').val();
		var upload_annual_report_3=$('#fy_3last_year').val();
		
		 
		$.post(APP_URL + 'ngo/entity/entity_data_page3_submit', {
			is_non_financial_partnerships: is_non_financial_partnerships,
			non_financial_partnerships:non_financial_partnerships, 
			is_leadership_network:is_leadership_network,
            leadership_network:leadership_network,
            is_blacklist:is_blacklist,
            is_guilty:is_guilty,
			blacklist:blacklist,
			guilty:guilty,
			is_political_affiliation:is_political_affiliation,
			religious_affiliation_on_radio:religious_affiliation_on_radio,
			optradio2:optradio2,
			bajaj_group_involved:bajaj_group_involved,
			optradio3:optradio3,
			senior_member_involved:senior_member_involved,
			optradio4:optradio4,
			previously_recieve_funding:previously_recieve_funding,
			optradio5:optradio5,
			received_award:received_award,
			optradio6:optradio6,
			received_national_award:received_national_award,
			optradio7:optradio7,
			upload_annual_report_1:upload_annual_report_1,
			upload_annual_report_2:upload_annual_report_2,
			upload_annual_report_3:upload_annual_report_3,
			governing_council:governing_council,
			ngo_id:ngo_id,
		},
		function (response) {
			$('#head_ngo_review').empty();
            if (response.status == 200) {
				var message = response.message;
                $("html, body").animate({scrollTop: 0}, "slow");               
                $('#head_ngo_review').html("<div class='alert alert-success fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
                $("#head_ngo_review").fadeTo(2000, 500).slideUp(500, function(){
					$('#head_ngo_review').empty();
					//window.location.href=APP_URL+"organisation/tasks/mytasks";
				});
            } else {
                $('#head_ngo_review').html("<div class='alert alert-danger fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
				$("#head_ngo_review").fadeTo(2000, 500).slideUp(500, function(){
					$('#head_ngo_review').empty();
				});
			}	
			
		}, 'json');
		 return false;	
		
	}
	
	$('#entity_step3_form').validate({
        ignore:[],
        
		rules: {
           
			is_non_financial_partnerships:{
				required:true,
			},
			is_leadership_network:{
				required:true,
			},
			is_blacklist:{
				required:true,
			},
			is_guilty:{
				required:true,
			},
			organisation_chief_functionary:{
				required:true,
			},

			is_political_affiliation:{
				required:true,
			},
			optradio2:{
				required:true,
			},
			optradio3:{
				required:true,
			},
			optradio4:{
				required:true,
			},
			
			optradio5:{
				required:true,
			},
			optradio6:{
				required:true,
			},
			optradio7:{
				required:true,
			},
		},
        messages: {
            
			is_non_financial_partnerships:{
				required:"please choose one",
			},
			is_leadership_network:{
				required:"Please choose one.",
			},
			
			is_blacklist:{
				required:"Please choose one."
			},
			is_guilty:{
				required:"please choose one.",
			},
			organisation_chief_functionary:{
				required:"please select atleast one.",
			},
			
			is_political_affiliation:{
				required:"please select atleast one.",
			}, 
			optradio2:{
				required:"Please select atleast one.",
			},
			optradio3:{
				required:"Please select atleast one.",
			},
			optradio4:{
				required:"Please select atleast one.",
			},
			optradio5:{
				required:"Please select atleast one.",
			},
			optradio6:{
				required:"Please select atleast one.",
			},
			optradio7:{
				required:"Please select atleast one",
			},
			
        },
		 
		
		
		errorPlacement: function(error, element) {
               if (element.hasClass('is_non_financial')) {
              error.insertAfter(element.closest('div.form-group').find('.org_nonfinancial'));
              }
			  else if (element.hasClass('leadership_of_org')) {
              error.insertAfter(element.closest('div.form-group').find('.org_leadership'));
              }
			  else if (element.hasClass('org_has_ever_blacklisted')) {
              error.insertAfter(element.closest('div.form-group').find('.org_has_ever_blacklisted_err'));
              }
			  else if (element.hasClass('org_found_guilty')) {
              error.insertAfter(element.closest('div.form-group').find('.org_found_guilty_radio'));
              }
			  else if (element.hasClass('governing_council')) {
              error.insertAfter(element.closest('div.form-group').find('.organisation_chief_functionary_err'));
              }
			  
			  else if (element.hasClass('org_have_religious_affi')) {
              error.insertAfter(element.closest('div.form-group').find('.organisation_political_err'));
              }
			  else if (element.hasClass('senior_member_involved_bajaj')) {
              error.insertAfter(element.closest('div.form-group').find('.senior_member_involved_bajaj_err'));
              }
			  else if (element.hasClass('received_funding_from_bajaj')) {
              error.insertAfter(element.closest('div.form-group').find('.received_funding_from_bajaj_err'));
              }
			  
			  
			  
			  
			  else if (element.hasClass('award_from_bajaj')) {
              error.insertAfter(element.closest('div.form-group').find('.award_from_bajaj_err'));
              }
			  
			  else if (element.hasClass('received_national_award')) {
              error.insertAfter(element.closest('div.form-group').find('.received_national_award_err'));
              }
			  
			  else if (element.hasClass('org_publish_annual_report')) {
              error.insertAfter(element.closest('div.form-group').find('.org_publish_annual_report_err'));
              }
			 

			  
			  else if (element.hasClass('board_members_senior_managers')) {
              error.insertAfter(element.closest('div.form-group').find('.board_member_err'));
              }else{
			  
			  error.insertAfter(element);
			  
                    }
               },
        
		
		
		
		
		
		
		
		
		
		
		
		
		
		submitHandler: function (form) {
            //$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /> Just a moment...</h1>' });
            
			
			
			
			
				 var is_non_financial_partnerships=$('input:radio[name="is_non_financial_partnerships"]:checked').val();
				   console.log(is_non_financial_partnerships);
				 
				   if(is_non_financial_partnerships =='Yes')
					   
				   {
					  
					  var non_financial_partnerships= $('#non_financial_partnerships').val();
					  console.log(non_financial_partnerships);
					  console.log('non_financial_partnerships');
					  if(non_financial_partnerships){
						  //hide error
						  console.log("validation required in radio");
						  $('.nonfinancial_err').addClass('display_none');
					  }else{
						   console.log('add')
						  $('.nonfinancial_err').removeClass('display_none');
						  
						  
					  }
					
				   }else{
					   console.log('evrything ok');
						  $('.nonfinancial_err').addClass('display_none');
					   
				   }
		   
		   
		   
		   
		   
				   var is_leadership_network=$('input:radio[name="is_leadership_network"]:checked').val();
				   console.log(is_leadership_network);
				 
				   if(is_leadership_network =='Yes')
				   {
					  
					  var leadership_network= $('#leadership_network').val();
					  console.log(leadership_network);
					  console.log('leadership_network');
					  if(leadership_network){
						  //hide error
						  console.log("validation required in radio");
						  $('.leadership_err').addClass('display_none');
					  }else{
						   console.log('add')
						  $('.leadership_err').removeClass('display_none');
						  
						  
					  }
					
				   }else{
					   console.log('evrything ok');
						  $('.leadership_err').addClass('display_none');
					   
				   }
		   
		   
		   
		   
		   
		   
					var is_blacklist=$('input:radio[name="is_blacklist"]:checked').val();
				   console.log(is_blacklist);
				 
				   if(is_blacklist =='Yes')
				   {
					  
					  var blacklist= $('#blacklist').val();
					  console.log(blacklist);
					  console.log('blacklist');
					  if(blacklist){
						  //hide error
						  console.log("validation required in radio");
						  $('.org_has_ever_blacklisted_err_textarea').addClass('display_none');
					  }else{
						   console.log('add')
						  $('.org_has_ever_blacklisted_err_textarea').removeClass('display_none');
						  
						  
					  }
					
				   }else{
					   console.log('evrything ok');
					   $('.org_has_ever_blacklisted_err_textarea').addClass('display_none');
				   }
		   
		   
		   
		   
		   
		   
		   
					var is_guilty=$('input:radio[name="is_guilty"]:checked').val();
					
				   console.log(is_guilty);
				
				   if(is_guilty =='Yes')
				   {
					  
					  var guilty= $('#guilty').val();
					  console.log(guilty);
					  console.log('guilty');
					  if(guilty){
						  //hide error
						  console.log("validation required in radio");
						  $('.org_found_guilty_err').addClass('display_none');
					  }else{
						   console.log('add')
						  $('.org_found_guilty_err').removeClass('display_none');
						  
						  
					  }
					
				   }else{
					   console.log('evrything ok');
					   $('.org_found_guilty_err').addClass('display_none');
				   }
				   
				   
		   
		   
		   
		   
				   var is_political_affiliation=$('input:radio[name="is_political_affiliation"]:checked').val();
					
				   console.log(is_political_affiliation);
				
				   if(is_political_affiliation =='Yes')
				   {
					  
					  var religious_affiliation_on_radio= $('#religious_affiliation_on_radio').val();
					  console.log(religious_affiliation_on_radio);
					  console.log('religious_affiliation_on_radio');
					  if(religious_affiliation_on_radio){
						  //hide error
						  console.log("validation required in radio");
						  $('.organisation_political_err_textarea').addClass('display_none');
					  }else{
						   console.log('add')
						  $('.organisation_political_err_textarea').removeClass('display_none');
						  
						  
					  }
					
				   }else{
					   console.log('evrything ok');
					   $('.organisation_political_err_textarea').addClass('display_none');
				   }
		   
		    
		  

				  var optradio2=$('input:radio[name="optradio2"]:checked').val();
					
				   console.log(optradio2);
				
				   if(optradio2 =='Yes')
				   {
					  
					  var bajaj_group_involved= $('#bajaj_group_involved').val();
					  console.log(bajaj_group_involved);
					  console.log('bajaj_group_involved');
					  if(bajaj_group_involved){
						  //hide error
						  console.log("validation required in radio");
						  $('.board_member_err_textarea').addClass('display_none');
					  }else{
						   console.log('add')
						  $('.board_member_err_textarea').removeClass('display_none');
						  
						  
					  }
					
				   }else{
					   console.log('evrything ok');
					   $('.board_member_err_textarea').addClass('display_none');
				   }
		   
		   
		   
					   
					   var optradio3=$('input:radio[name="optradio3"]:checked').val();
						
					   console.log(optradio3);
					
					   if(optradio3 =='Yes')
					   {
			  
					  var senior_member_involved= $('#senior_member_involved').val();
					  console.log(senior_member_involved);
					  console.log('senior_member_involved');
					  if(senior_member_involved){
						  //hide error
						  console.log("validation required in radio");
						  $('.senior_member_involved_bajaj_err_textarea').addClass('display_none');
					  }else{
						   console.log('add')
						  $('.senior_member_involved_bajaj_err_textarea').removeClass('display_none');
						  
						  
					  }
					
				   }else{
					   console.log('evrything ok');
					   $('.senior_member_involved_bajaj_err_textarea').addClass('display_none');
				   }
		   
		   
		   
		   
		   
		   
					var optradio4=$('input:radio[name="optradio4"]:checked').val();
					
				   console.log(optradio4);
				
				   if(optradio4 =='Yes')
				   {
					  
					  var previously_recieve_funding= $('#previously_recieve_funding').val();
					  console.log(previously_recieve_funding);
					  console.log('previously_recieve_funding');
					  if(previously_recieve_funding){
						  //hide error
						  console.log("validation required in radio");
						  $('.received_funding_from_bajaj_err_textarea').addClass('display_none');
					  }else{
						   console.log('add')
						  $('.received_funding_from_bajaj_err_textarea').removeClass('display_none');
						  
						  
					  }
					
				   }else{
					   console.log('evrything ok');
					   $('.received_funding_from_bajaj_err_textarea').addClass('display_none');
				   }
		   
		   
					var optradio5=$('input:radio[name="optradio5"]:checked').val();
					
				   console.log(optradio5);
				
				   if(optradio5 =='Yes')
				   {
					  
					  var received_award= $('#received_award').val();
					  console.log(received_award);
					  console.log('received_award');
					  if(received_award){
						  //hide error
						  console.log("validation required in radio");
						  $('.award_from_bajaj_err_textarea').addClass('display_none');
					  }else{
						   console.log('add')
						  $('.award_from_bajaj_err_textarea').removeClass('display_none');
						  
						  
					  }
					
				   }else{
					   console.log('evrything ok');
					   $('.award_from_bajaj_err_textarea').addClass('display_none');
				   }
				   
				   
				   
				   
				   
				    var optradio7=$('input:radio[name="optradio7"]:checked').val();
		   console.log(optradio7);
		 
		   if(optradio7=='Yes')
		   {
			  
			   var fy_last_year= $('#fy_last_year').val();
			    var fy_2last_year= $('#fy_2last_year').val();
				 var fy_3last_year= $('#fy_3last_year').val();
					  
					  if(fy_last_year){
						  //hide error
						  //console.log("validation required in radio");
						  $('.fy_last_year_err').addClass('display_none');
					  }else{
						   console.log('add')
						  $('.fy_last_year_err').removeClass('display_none');
						  
						  
					  }
					  
					  
					  if(fy_2last_year){
						  //hide error
						  //console.log("validation required in radio");
						  $('.fy_2last_year_err').addClass('display_none');
					  }else{
						   console.log('add')
						  $('.fy_2last_year_err').removeClass('display_none');
						  
						  
					  }
					  
					  
					  if(fy_3last_year){
						  //hide error
						  //console.log("validation required in radio");
						  $('.fy_3last_year_err').addClass('display_none');
					  }else{
						   console.log('add')
						  $('.fy_3last_year_err').removeClass('display_none');
						  
						  
					  }
					
				   }else{
					   console.log('evrything ok');
					   $('.fy_last_year_err').addClass('display_none');
					   $('.fy_2last_year_err').addClass('display_none');
					   $('.fy_3last_year_err').addClass('display_none');
				   }
				   
				   
				   
				   
				   
				   
				   
				   
				   
				   
					var optradio6=$('input:radio[name="optradio6"]:checked').val();
					
				   //console.log(optradio6);
				
				   if(optradio6 =='Yes')
				   {
					  
					  var received_national_award= $('#received_national_award').val();
					  
					  console.log(received_national_award);
					  console.log('received_national_award');
					  if(received_national_award){
						  //hide error
						  console.log("validation required in radio");
						  $('.received_national_award_textfield__err').addClass('display_none');
					  }else{
						   console.log('add')
						  $('.received_national_award_textfield__err').removeClass('display_none');
						  
						  return false;
					  }
					
				   }else{
					   console.log('evrything ok');
					   $('.received_national_award_textfield__err').addClass('display_none');
					   
                       $('#page3').removeClass('active');
                       $('#page4').addClass('active');
                        
				   }
						
						$('#page3').removeClass('active');
						$('#page4').addClass('active');
		   
			
        }
		
		
		
		
    });
	
	
    /*save for page 3*/
	$('body').on('click','.save_page3', function () {
		
		add_page_three();
		
	});
	
	/*save and skip page 3*/
	$('body').on('click', '.skip_step_three', function () {   
	    add_page_three();

        $('#page3').removeClass('active');
        $('#page4').addClass('active');
		$("html, body").animate({scrollTop: 0}, "slow");
    });
	
	
	
	
	
	/* Save and next for page4*/	
	$('body').on('click','#submit_next_page4', function () {
		$("#error_field").addClass('display_none');
	  if($("#entity_step4_form").valid())
       {
          console.log("submit the form");
       }
       else 
      {
         $("#error_field").removeClass('display_none');
		 console.log("validation required");
      }
		add_page_four();	
	});
	
	function add_page_four(){
		var defined_structure_decission_making=$('input:radio[name="optradio9"]:checked').val();   
        console.log(defined_structure_decission_making);		
		var entity_have_governing_board=$('input:radio[name="optradio10"]:checked').val();
		//console.log(entity_have_governing_board);
		var upload_organogram=$('#organogram_organisation').val();
		//console.log(upload_organogram);
		var detail_body_member=$('#detail_body_member').val();
		var number_of_employee=$('#number_of_employee').val();
		
		var number_of_employee_through_contractor=$('#number_of_employee_through_contractor').val();
		var number_parttime_employees=$('#number_parttime_employees').val();
		var img_file=$('#org_logo_view').find('img').attr('src');
		//console.log(img_file);
		
		var governing_body_member_det = [];
			$('#GoverningMemberTextBoxContainer .panel').each(function(key,val){
				governing_body_member_det.push({
					name_of_member : $(this).find('.name_of_member').val(),
					member_age     : $(this).find('.member_age').val(),
					member_gender : $(this).find('.member_gender').children("option:selected").val(),
					member_designation : $(this).find('.member_designation').val(),
					member_join_at : $(this).find('.member_join_at').val(),
					member_related_to_other : $(this).find('.member_related_to_other').val(),
					member_occupation : $(this).find('.member_occupation').val(),
					
				}); 
			});
			
			
			
			
			
			var vehicles_details = [];
			$('#detail_of_vehicles_and_other_assets .panel').each(function(key,val){
				vehicles_details.push({
					name_of_member : $(this).find('.name_of_asset').val(),
					member_age     : $(this).find('.location').val(),
					
					member_designation : $(this).find('.value').val(),
					
					
				}); 
			});
			
			var foreign_travel_taken_by_staff = [];
			$('#detail_of_foreign_travel .panel').each(function(key,val){
				foreign_travel_taken_by_staff.push({
					title_of_traveller : $(this).find('.title_of_traveller').val(),
					location_and_purpose     : $(this).find('.location_purpose').val(),
					
					cost_incurred : $(this).find('.cost_incurred').val(),
					
					
				}); 
			});
			
			
			
			
			var full_time_staff_numbers = [];
			$('.full_time_staff tr').each(function(key,val){
				full_time_staff_numbers.push({
					label1:$(this).find("td:eq(0)").text(),
					input1 : $(this).find("td:eq(1) input").val(),
					input2 : $(this).find("td:eq(2) input").val(),
				})
			}); 
			
			//console.log(full_time_staff_numbers);
			
			
			
			
			var renumeration_of_senior_leadership = [];
			$('.renumaration_of_senior_leadership tr').each(function(key,val){
				renumeration_of_senior_leadership.push({
					label1:$(this).find("td:eq(0)").text(),
					input1 : $(this).find("td:eq(1) input").val(),
					input2 : $(this).find("td:eq(2) input").val(),
					input3 : $(this).find("td:eq(3) input").val(),
					input4 : $(this).find("td:eq(4) input").val(),
					input5 : $(this).find("td:eq(5) input").val(),
					input6 : $(this).find("td:eq(6) input").val(),
					input7 : $(this).find("td:eq(7) input").val(),
					input8 : $(this).find("td:eq(8) input").val(),
					input9 : $(this).find("td:eq(9) input").val(),
				})
			}); 
			
			//console.log(renumeration_of_senior_leadership);
			
			
			
			
			
			
			var part_time_staff_numbers = [];
			$('.part_time_staff tr').each(function(key,val){
				part_time_staff_numbers.push({
					label1:$(this).find("td:eq(0)").text(),
					input1 : $(this).find("td:eq(1) input").val(),
					input2 : $(this).find("td:eq(2) input").val(),
					
				})
			}); 
			
			console.log(part_time_staff_numbers);
			
			
			
		//console.log();
		
		$.post(APP_URL + 'ngo/entity/entity_data_page4_submit', {
			defined_structure_decission_making: defined_structure_decission_making,
			entity_have_governing_board:entity_have_governing_board, 
			upload_organogram:upload_organogram,
            detail_body_member:detail_body_member,
			number_of_employee:number_of_employee,
			number_of_employee_through_contractor:number_of_employee_through_contractor,
			number_parttime_employees:number_parttime_employees,
			governing_body_member_det:governing_body_member_det,
			ngo_id:ngo_id,
			img_file:img_file,
			vehicles_details:vehicles_details,
			part_time_staff_numbers:part_time_staff_numbers,
			renumeration_of_senior_leadership:renumeration_of_senior_leadership,
			full_time_staff_numbers:full_time_staff_numbers,
			foreign_travel_taken_by_staff:foreign_travel_taken_by_staff,
		},
		function (response) {
			$('#head_ngo_review').empty();
            if (response.status == 200) {
				var message = response.message;
                $("html, body").animate({scrollTop: 0}, "slow");               
                $('#head_ngo_review').html("<div class='alert alert-success fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
                $("#head_ngo_review").fadeTo(2000, 500).slideUp(500, function(){
					$('#head_ngo_review').empty();
					//window.location.href=APP_URL+"organisation/tasks/mytasks";
				});
            } else {
                $('#head_ngo_review').html("<div class='alert alert-danger fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
				$("#head_ngo_review").fadeTo(2000, 500).slideUp(500, function(){
					$('#head_ngo_review').empty();
				});
			}	
			
		}, 'json');
		 return false;	
		
	}
	
	

	$('#entity_step4_form').validate({
		
        ignore:[],
        rules: {
			
			optradio9:{
				required:true,
			},
			optradio10:{
				required:true,
			},
			number_direct_employee:{
				required:true,
			},
			number_of_employee_through_contractor:{
				required:true,
			},
			number_parttime_employees:{
				required:true,
			},
			
			
        },
        messages: {
            
			optradio9:{
				required:"Please choose one.",
			},
			optradio10:{
				required:"Please choose one.",
			},
			number_direct_employee:{
				required:"Please enter only numerical digits",
			},
			number_of_employee_through_contractor:{
				required:"Please enter only numerical digits.",
			},
			number_parttime_employees:{
				required:"Please enter only numerical digits.",
			},
			
			
        },
			
		errorPlacement: function(error, element) {
               if (element.hasClass('defined_structure_with_reporting')) {
              error.insertAfter(element.closest('div.form-group').find('.defined_structure_with_reporting_err'));
              }
			  
			  else if (element.hasClass('entity_have_governing_body')) {
              error.insertAfter(element.closest('div.form-group').find('.entity_have_governing_body_err'));
              }else{
			  
			  error.insertAfter(element);
			  
                    }
        },
        
        submitHandler: function (form) {
            //$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /> Just a moment...</h1>' });
            
			var is_error = 'no';
			var optradio9=$('input:radio[name="optradio9"]:checked').val();
					
			   //console.log(optradio9);
			if(optradio9 =='Yes'){
				  
				var organogram_organisation= $('#organogram_organisation').val();
				  
				console.log(organogram_organisation);
				console.log('organogram_organisation');
				if(organogram_organisation){
					  //hide error
					console.log("validation required in radio");
					$('.organogram_of_organisation_err').addClass('display_none');
				}else{
					is_error = 'yes';
					$('.organogram_of_organisation_err').removeClass('display_none');
				}
			}else{
				console.log('evrything ok');
				$('.organogram_of_organisation_err').addClass('display_none');
			}
		
			var foreign_travel1 = 'yes';
			$('#detail_of_foreign_travel .panel').each(function(key,val){
				if($(this).find('.title_of_traveller').val()){
				}else{
					foreign_travel1 = 'no';
				}
				if($(this).find('.location_purpose').val()){
				}else{
					foreign_travel1 = 'no';
				}
				if($(this).find('.cost_incurred').val()){
				}else{
					foreign_travel1 = 'no';
				}
			});
			
			var foreign_travel2 = 'yes'
			$('#detail_of_vehicles_and_other_assets .panel').each(function(key,val){
				if($(this).find('.name_of_asset').val()){
				
				}else{
					foreign_travel2='no';
				}
				if($(this).find('.location').val()){
					
				}else{
					foreign_travel2='no';
				}
				
				if($(this).find('.value').val()){
					
				}else{
					foreign_travel2='no';
				}
			});
			
			var foreign_travel3 = 'yes';
			$('#GoverningMemberTextBoxContainer .panel').each(function(key,val){
				if($(this).find('.name_of_member').val()){
					
				}else{
					foreign_travel3='no';
				}
				if($(this).find('.member_age').val()){
					
				}else{
					foreign_travel3='no';
				
				}
				if($(this).find('.member_gender').children("option:selected").val()){
					
				}else{
					foreign_travel3='no';
				
				}
				if($(this).find('.member_designation').val()){
					
				}else{
					foreign_travel3='no';
				
				}
				if($(this).find('.member_join_at').val()){
					
				}else{
					foreign_travel3='no';
				
				}
				if($(this).find('.member_related_to_other').val()){
					
				}else{
					foreign_travel3='no';
				
				}
				if($(this).find('.member_occupation').val()){
					
				}else{
					foreign_travel3='no';
				
				}

			});
			
			var foreign_travel = 'yes';
			$('.renumaration_of_senior_leadership tr').each(function(key,val){
				if($(this).find("td:eq(1) input").val()){
					
				}else{
					foreign_travel='no';
				
				}
				if($(this).find("td:eq(2) input").val()){
					
				}else{
					foreign_travel='no';
				
				}
				
				if($(this).find("td:eq(3) input").val()){
					
				}else{
					foreign_travel='no';
				
				}
				
				if($(this).find("td:eq(4) input").val()){
					
				}else{
					foreign_travel='no';
				
				}
				
				if($(this).find("td:eq(5) input").val()){
					
				}else{
					foreign_travel='no';
				
				}
				
				if($(this).find("td:eq(6) input").val()){
				}
				else{
					foreign_travel='no';
				
				}
				if($(this).find("td:eq(7) input").val()){
				}
				else{
					foreign_travel='no';
				
				}
				if($(this).find("td:eq(8) input").val()){
				
				}else{
					foreign_travel='no';
				
				}
				if($(this).find("td:eq(9) input").val()){
				
				}else{
					foreign_travel='no';
				
				}
			
			});
			
			var foreign_travel5 = 'yes';
			$('.part_time_staff tr').each(function(key,val){
				if($(this).find("td:eq(1) input").val()){
					
				}else{
					foreign_travel5='no';
				
				}
				if($(this).find("td:eq(2) input").val()){
					
				}else{
					foreign_travel5='no';
				
				}
				
			});
			var foreign_travel6 = 'yes';
			$('.full_time_staff tr').each(function(key,val){
				if($(this).find("td:eq(1) input").val()){
					
				}else{
					foreign_travel6='no';
				
				}
				if($(this).find("td:eq(2) input").val()){
					
				}else{
					foreign_travel6='no';
				
				}
				
			});
			
			
			if(foreign_travel5=='no'){
				$(".part_time_staff_err").removeClass('display_none');is_error = 'yes';
			} else{
				
			}
			if(foreign_travel=='no'){
				$(".renumeration_err").removeClass('display_none');is_error = 'yes';
			} else{
				
			}
			if(foreign_travel6=='no'){
				$(".full_time_staff_err").removeClass('display_none');is_error = 'yes';
			} else{
				
			}
			
			if(foreign_travel3=='no'){
				$(".governing_body_member_err").removeClass('display_none');is_error = 'yes';
			} else{
				
			}
			if(foreign_travel2=='no'){
				$(".detail_vehicle_error").removeClass('display_none');is_error = 'yes';
			} else{
				
			}
			if(foreign_travel1=='no'){
				$(".detail_foreign_travel_error").removeClass('display_none');is_error = 'yes';
			} else{
				
			}
			
			if(is_error == 'yes'){
				return false;
			}else{
				
				$(".detail_foreign_travel_error").addClass('display_none');
				$(".detail_vehicle_error").addClass('display_none');
				$(".governing_body_member_err").addClass('display_none');
				$(".renumeration_err").addClass('display_none');
				$(".part_time_staff_err").addClass('display_none');
				$(".full_time_staff_err").addClass('display_none');
				
				$('#page4').removeClass('active');
				$('#page5').addClass('active');
			}
			
			
        }
    });



    $('body').on('click','.show_append',function(){
		$('#GoverningMemberAddParabtn').removeClass('display_none');
	});



	
/*save for page 4*/
	$('body').on('click','.save_page4', function () {
		
		add_page_four();
		
	});


/*save and skip page 4*/
$('body').on('click', '.skip_step_four', function () {  

        add_page_four(); 
        $('#page4').removeClass('active');
        $('#page5').addClass('active');
		$("html, body").animate({scrollTop: 0}, "slow");
    });










/* Save and next for page5*/	
	$('body').on('click','#submit_next_page5', function () {
		$("#error_field").addClass('display_none');
	  if($("#entity_step5_form").valid())
       {
          console.log("submit the form");
       }
       else 
      {
         $("#error_field").removeClass('display_none');
		 console.log("validation required");
      }
		add_page_five();	
	});
	
	function add_page_five(){
		var entity_have_gst_num=$('input:radio[name="optradio_entity"]:checked').val();
		var upload_financial_statement1=$('#image_id1').val();
		console.log(upload_financial_statement1);
		var upload_financial_statement2=$('#image_id2').val();
		console.log(upload_financial_statement2);
		var upload_financial_statement3=$('#image_id3').val();
		var uplpad_ITR_1=$('#image_id4').val();
		var uplpad_ITR_2=$('#image_id5').val();
		var uplpad_ITR_3=$('#image_id6').val();
		var gst_number=$('#gst_number').val();
		var gst_certificate=$('#gst_certificate').val();
		var upload_cancelled_cheque=$('#cancelled_cheque').val();
		var name_of_organization=$('#name_of_organization').val();
		var gst_exemption_letter=$('#gst_exemption_letter').val();
		
		
		
		
		var major_donors = [];
			$('#detail_of_donor_page .panel').each(function(key,val){
				major_donors.push({
					name_of_donor : $(this).find('.name_of_donor').val(),
					title_of_project : $(this).find('.title_of_project').val(),
					
					project_period_from : $(this).find('.project_period_from').val(),
					project_period_to : $(this).find('.project_period_to').val(),
					
					
				}); 
			});
			console.log(major_donors);
			
			
			
			
			
			
			var budget_details = [];
			$('.budget_details_class tr').each(function(key,val){
				budget_details.push({
					label1:$(this).find("td:eq(0)").text(),
					input1 : $(this).find("td:eq(1) input").val(),
					input2 : $(this).find("td:eq(2) input").val(),
					input3 : $(this).find("td:eq(3) input").val(),
					input4 : $(this).find("td:eq(4) input").val(),
					
				})
			}); 
		
			//console.log(budget_details);
		
		 
		$.post(APP_URL + 'ngo/entity/entity_data_page5_submit', {
			entity_have_gst_num: entity_have_gst_num,
			upload_financial_statement1:upload_financial_statement1, 
			upload_financial_statement2:upload_financial_statement2,
            upload_financial_statement3:upload_financial_statement3,
            uplpad_ITR_1:uplpad_ITR_1,
            uplpad_ITR_2:uplpad_ITR_2,
			uplpad_ITR_3:uplpad_ITR_3,
			gst_number:gst_number,
			gst_certificate:gst_certificate,
			upload_cancelled_cheque:upload_cancelled_cheque,
			name_of_organization:name_of_organization,
			ngo_id:ngo_id,
			major_donors:major_donors,
			budget_details:budget_details,
			gst_exemption_letter:gst_exemption_letter,
			
		},
		function (response) {
			$('#head_ngo_review').empty();
            if (response.status == 200) {
				var message = response.message;
                $("html, body").animate({scrollTop: 0}, "slow");               
                $('#head_ngo_review').html("<div class='alert alert-success fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
                $("#head_ngo_review").fadeTo(2000, 500).slideUp(500, function(){
					$('#head_ngo_review').empty();
					//window.location.href=APP_URL+"organisation/tasks/mytasks";
				});
            } else {
                $('#head_ngo_review').html("<div class='alert alert-danger fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
				$("#head_ngo_review").fadeTo(2000, 500).slideUp(500, function(){
					$('#head_ngo_review').empty();
				});
			}	
			
		}, 'json');
		 return false;	
	}

  $('#entity_step5_form').validate({
        ignore:[],
		rules: {
			
           
			image_id1:{
				required:true,
			},
			image_id2:{
				required:true,
			},
			image_id3:{
				required:true,
			},
			image_id4:{
				required:true,
			},
			image_id5:{
				required:true,
			},
			image_id6:{
				required:true,
			},
			optradio_entity:{
				required:true,
			},
			cancelled_cheque:{
				required:true,
			},
			name_of_organization:{
				required:true,
			},
			
        },
        messages: {
            
			image_id1:{
				required:"Please Upload file.",
			},
			image_id2:{
				required:"Please upload file.",
			},
			image_id3:{
				required:"Please upload file.",
			},
			image_id4:{
				required:"Please upload file.",
            },

            image_id5:{
				required:"Please upload file.",
			},
			image_id6:{
				required:"Please upload file.",
			},
			optradio_entity:{
				required:"Please choose one.",
			},
            cancelled_cheque:{
				required:"Please upload file.",
			},
			name_of_organization:{
				required:"Please provide the name.",
			},
			
		
		},
		
		
		
		errorPlacement: function(error, element) {
             if (element.hasClass('entity_have_gst_number')) {
              error.insertAfter(element.closest('div.form-group').find('.gst_number_error'));
              }
			  
			 else{
			  
			  error.insertAfter(element);
			  
                    }
               },
        
		
        
        submitHandler: function (form) {
            //$.blockUI({ message: '<h1><img src="'+APP_URL + 'assets/img/loading.gif" /> Just a moment...</h1>' });
             $("#gsterror").addClass('display_none');
				
						
						 
						var optradio_entity=$('input:radio[name="optradio_entity"]:checked').val();
							
						   //console.log(optradio_entity);
						
						   if(optradio_entity =='Yes')
						   {
							  
							  var gst_number= $('#gst_number').val();
							  var gst_certificate=$('#gst_certificate').val();
							  
							  
							  if(gst_number){
								  //hide error
								  console.log("validation required in radio");
								  $('.gst_number_err').addClass('display_none');
							  }else{
								   console.log('add')
								  $('.gst_number_err').removeClass('display_none');
								  
								 
							  }
							  
							  
							  
							  
							  if(gst_certificate){
								  //hide error
								  console.log("validation required in radio");
								  $('.gst_certificate_err').addClass('display_none');
							  }else{
								   console.log('add')
								  $('.gst_certificate_err').removeClass('display_none');
								   
								  
							  }
							  
							  
							
						   }else{
							   console.log('evrything ok');
							   $('.gst_certificate_err').addClass('display_none');
							   $('.gst_number_err').addClass('display_none');
							   
							   
						   }
						   
						   
						   
						    if(optradio_entity =='No')
						   {
							  
							  
							  var gst_exemption_letter=$('#gst_exemption_letter').val();
							  
							  if(gst_exemption_letter){
								  //hide error
								  console.log("validation required in radio");
								  $('.gst_exemption_letter_err').addClass('display_none');
							  }else{
								   console.log('add')
								  $('.gst_exemption_letter_err').removeClass('display_none');
								   
								  
							  }
							  
							  
							
						   }else{
							   console.log('evrything ok');
							   $('.gst_exemption_letter_err').addClass('display_none');
							   
							   
							   
						   }
						 
						   
						   
						   
						   
						   
						   
						
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						   
						var budget_details='yes';
						$('.budget_details_class tr').each(function(key,val){
						
							if($(this).find("td:eq(1) input").val()){
							
						}else{
							budget_details='no';
						
						}
						if($(this).find("td:eq(2) input").val()){
							
						}else{
							budget_details='no';
						
						}
						
						if($(this).find("td:eq(3) input").val()){
							
						}else{
							budget_details='no';
						
						}
						if($(this).find("td:eq(4) input").val()){
							
						}else{
							budget_details='no';
						
						}
						
						});
						
						$('#detail_of_donor_page .panel').each(function(key,val){
							if($(this).find('.name_of_donor').val()){
							
						}else{
							budget_details='no';
						
						}
						if($(this).find('.title_of_project').val()){
							
						}else{
							budget_details='no';
						
						}
						
						if($(this).find('.project_period_from').val()){
							
						}else{
							budget_details='no';
						
						}
						if($(this).find('.project_period_to').val()){
							
						}else{
							budget_details='no';
						
						}
						
						var project_period_from=$(this).find('.project_period_from').val();
						var project_period_to=$(this).find('.project_period_to').val();
						 if(Date.parse(project_period_from)>Date.parse(project_period_to)){ 
						      $('.project_period_date_err').removeClass('display_none');
						 }else{
							 
							  $('.project_period_date_err').addClass('display_none');  
						 }
						
						});
						
						
					$(".budget_detail_err").addClass('display_none');
					if(budget_details=='no')
					{
						$(".budget_detail_err").removeClass('display_none');
						$(".major_details_err").removeClass('display_none');
						
						console.log('validation required in both details');
						
					}
					
					else{
						
					
					   $('#page5').removeClass('active');
					   $('#page6').addClass('active');	
						
						
					}
					
					}
    });

	
	
	
	
	
	
/*save for page 5*/
	$('body').on('click','.save_page5', function () {
		
		add_page_five();
		
	});

/*save and skip page 5*/
    $('body').on('click', '.skip_step_five', function () { 
        
		add_page_five();	
        $('#page5').removeClass('active');
        $('#page6').addClass('active');
		$("html, body").animate({scrollTop: 0}, "slow");
    });
	



/* Save and next for page6*/	
	$('body').on('click','#submit_page6', function () {
		
		add_page_six();	
	});
	
	function add_page_six(){
		var optradio_policy=$('input:radio[name="optradio_policy"]:checked').val();
		var optradio_whistleblower_policy=$('input:radio[name="optradio_whistleblower_policy"]:checked').val();
		var optradio_child_protection_policy=$('input:radio[name="optradio_child_protection_policy"]:checked').val();
		var other_policies_name=$('#other_policies_name').val();
	    var other_policies=new Array();
		$("input[value='Travel_Policy(including_details_of_incidentals)']:checked").each(function(){
			other_policies.push($(this).val());
			
		})
		$("input[value='Salary_and_Perks/Benefits_Policy']:checked").each(function(){
			other_policies.push($(this).val());
			
		})
		$("input[value='Recruitment_Policy']:checked").each(function(){
			other_policies.push($(this).val());
			
		})
		$("input[value='Accounting_and_Audit_Policy']:checked").each(function(){
			other_policies.push($(this).val());
			
		})
		
        $("input[value='Other(s)']:checked").each(function(){
			other_policies.push($(this).val());
			
		})
		
		    var multiple_img_upload = [];
			$('.copies_all_policies .file_dives').each(function(key,val){
				multiple_img_upload.push({
					file_dives  : $(this).attr("addr"),
					
					
				}); 
			});
			console.log(multiple_img_upload);
			var multiple_img_upload2 = [];
			$('.other_relevant_doc .file_dives').each(function(key,val){
				multiple_img_upload2.push({
					file_dives  : $(this).attr("addr"),	
				}); 
			});
			console.log(multiple_img_upload2);		
		$.post(APP_URL + 'ngo/entity/entity_data_page6_submit', {
			optradio_policy: optradio_policy,
			optradio_whistleblower_policy: optradio_whistleblower_policy,
			optradio_child_protection_policy: optradio_child_protection_policy,
			other_policies:other_policies,
			multiple_img_upload:multiple_img_upload,
			multiple_img_upload2:multiple_img_upload2,
			ngo_id:ngo_id,
			other_policies_name:other_policies_name,
		},
		function (response) {
			$('#head_ngo_review').empty();
            if (response.status == 200) {
				var message = response.message;
                $("html, body").animate({scrollTop: 0}, "slow");               
                $('#head_ngo_review').html("<div class='alert alert-success fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
                $("#head_ngo_review").fadeTo(2000, 500).slideUp(500, function(){
					$('#head_ngo_review').empty();
					//window.location.href=APP_URL+"organisation/tasks/mytasks";
				});
            } else {
                $('#head_ngo_review').html("<div class='alert alert-danger fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
				$("#head_ngo_review").fadeTo(2000, 500).slideUp(500, function(){
					$('#head_ngo_review').empty();
				});
			}	
			
		}, 'json');
		 return false;	
		
	}

 
$('#entity_step6_form').validate({
        ignore:[],
		
		
		
		 rules: {
			
          
			optradio_policy:{
				required:true,
			},
			optradio_whistleblower_policy:{
				required:true,
			},
			optradio_child_protection_policy:{
				required:true,
			},
			optradio:{
				required:true,
			},
			

        },
        messages: {
            
			optradio_policy:{
				required:"Please choose one.",
			},
			optradio_whistleblower_policy:{
				required:"Please choose one.",
			},
			optradio_child_protection_policy:{
				required:"Please choose one.",
			},
			optradio:{
				required:"Please choose one.",
			},
			
            
		},
		 
		
		     errorPlacement: function(error, element) {
             if (element.hasClass('policy_related_prevention')) {
              error.insertAfter(element.closest('div.form-group').find('.policies1_error'));
              }else if (element.hasClass('whistleblower_policy')) {
              error.insertAfter(element.closest('div.form-group').find('.whistleblower_policy_error'));
              }else if (element.hasClass('child_protection_policy')) {
              error.insertAfter(element.closest('div.form-group').find('.child_protection_policy_error'));
              }else if (element.hasClass('other_policies')) {
              error.insertAfter(element.closest('div.form-group').find('.other_policies_error'));
              }
			  
			 else{
			  
			  error.insertAfter(element);
			  
                    }
               },
		
		
		
		
        
        submitHandler: function (form) {
            
	    var other_policies=new Array();
		$("input[value='Travel_Policy(including_details_of_incidentals)']:checked").each(function(){
			other_policies.push($(this).val());
			
		})
		$("input[value='Salary_and_Perks/Benefits_Policy']:checked").each(function(){
			other_policies.push($(this).val());
			
		})
		$("input[value='Recruitment_Policy']:checked").each(function(){
			other_policies.push($(this).val());
			
		})
		$("input[value='Accounting_and_Audit_Policy']:checked").each(function(){
			other_policies.push($(this).val());
			
		})
		
        $("input[value='Other(s)']:checked").each(function(){
			other_policies.push($(this).val());
			
		})
			
			var others_chk = $("input[value='Other(s)']:checked");
			if(others_chk){
				var other_policies_name=$('#other_policies_name').val();
				  if(other_policies_name){
					  $('.other_policies_error_txt').addClass('display_none');
				  }
				   else{
						  
						  $('.other_policies_error_txt').removeClass('display_none');
						  
					  }
			}else{
				
				$('.other_policies_error_txt').addClass('display_none');
				
				
			}
			
			
             
			  
			  
			  
			  
			  var multiple_img_upload = [];
			$('.copies_all_policies .file_dives').each(function(key,val){
				multiple_img_upload.push({
					file_dives  : $(this).attr("addr"),
					
					
				}); 
			});
			console.log(multiple_img_upload);
			
			if(multiple_img_upload.length == 0){
				
				$(".copies_policies_err").removeClass('display_none');
				console.log("validation required in policies copies");
				
			}else{
				
				console.log("validation not required in policies copies");
			$(".copies_policies_err").addClass('display_none');
			
			
			}
		
			
			
			
			//console.log(multiple_img_upload);
			var multiple_img_upload2 = [];
			$('.other_relevant_doc .file_dives').each(function(key,val){
				multiple_img_upload2.push({
					file_dives  : $(this).attr("addr"),
				}); 
			});
			  
			  
			  if(multiple_img_upload2.length == 0){
				//console.log("validation required in category");
				$(".other_relevanterr").removeClass('display_none');
				return false;
				
			}else{
				
				console.log("validation not required");
			$(".other_relevanterr").addClass('display_none');
			
			
			}
			  
			  
			  
			  
			  
			  
			  

        }
    });




	
	
    var city_instance ='';
    var geo_instance ='';
    get_ngo_location_data();
    function get_ngo_location_data(){
        $.post(APP_URL + 'ngo/entity/get_ngo_location_data', {
        },
        function (response) {
            var geoData=response.geoData;

            geo_instance = $('#geo_location').comboTree({
                source : geoData,
                isMultiple:true,
                cascadeSelect:true,
                //selected: orgGeoData
            });
            var city_data=response.city_data;

            city_instance = $('#city').comboTree({
                source : city_data,
                isMultiple:true,
                cascadeSelect:true,
                //selected: orgGeoData
            });
        },'json');
    }
    
    $('body').on('click', '.remove_category_data', function () { 
        var category=$(this).parent().parent().attr('category');
        console.log(category)
        $('#category option[value="'+category+'"]').removeClass('display_none');
        $(this).parent().parent().remove();
    });
    $('body').on('click', '.submit_category_data', function () { 
        var category_detail=$('#category_detail').val();
        var category_name=$('#category option:selected').text();
        var category_id=$('#category').val();
        console.log(category_detail);
        console.log(category_name);
        console.log(category_id);
        if(category_id && category_detail){
            content='';
            content+='<tr category="'+category_id+'">';
                content+='<td>';
                    content+=category_name;
                content+='</td>';
                content+='<td>';
                    content+=category_detail;
                content+='</td>';
                content+='<td>';
                    content+='<button type="button" class="btn btn-danger remove_category_data"><i class="fa fa-close"></button>'
                content+='</td>';
            content+='</tr>';
            console.log(content);
            $('.append_activities').append(content);
            $('#category_detail').val('');
            $('#category option:selected').addClass('display_none');
            $('#category').val('');
        }
		
		else{
			
			$('.category_err_2').removeClass('display_none');
			
		}
		
		
		
    });
    $('body').on('click', '#RegistrationAddParabtn', function () {
        var content = $('#registration_append_html').html();
        console.log(content);
        $("#RegistrationTextBoxContainer").append(content); 
    });
    
    $('body').on('click', '.RegistrationRemovepara', function () {
        $(this).parent().parent().parent().remove();
    }); 

    $('body').on('click', '#GoverningMemberAddParabtn', function () {
        var content = $('#governing_member_append_html').html();
        console.log(content);
        $("#GoverningMemberTextBoxContainer").append(content); 
    });
	
	
	$('body').on('click', '#detail_of_vehicle', function () {
        var content = $('#details_of_vehicles_html').html();
        console.log(content);
        $("#detail_of_vehicles_and_other_assets").append(content); 
    });
	$('body').on('click', '.RegistrationRemovepara', function () {
        $(this).parent().parent().parent().remove();
    }); 
	
	
	$('body').on('click', '#detail_of_foreign_travel_append', function () {
        var content = $('#detail_of_foreign_travel_html').html();
        console.log(content);
        $("#detail_of_foreign_travel").append(content); 
    });
	$('body').on('click', '.foreign_travel_remove', function () {
        $(this).parent().parent().parent().remove();
    }); 
	
	
	$('body').on('click', '#detail_of_donor', function () {
        var content = $('#detail_of_donor_html').html();
        console.log(content);
        $("#detail_of_donor_page").append(content); 
    });
	$('body').on('click', '.donor_remove', function () {
        $(this).parent().parent().parent().remove();
    }); 
	
	
	
	
    $('body').on('click', '.GoverningMemberRemovepara', function () {
        $(this).parent().parent().parent().remove();
    });

    $('body').on('click', '.other_appropriate_certification', function () {
        if($(this).is(":checked")){
            $('.othercertification_input').removeClass('display_none');
        }else{
            $('.othercertification_input').addClass('display_none');
        }
    });
    $('body').on('click', '.credibility_appropriate_certification', function () {
        if($(this).is(":checked")){
            $('.credibility_certification_input').removeClass('display_none');
        }else{
            $('.credibility_certification_input').addClass('display_none');
        }
    });
    $('body').on('click', '.save_step', function () { 
        $(this).parent().find('.skipstepone').removeClass('display_none');
    });  
    $('body').on('click', '.show_on_radio_click', function () {   
        if($(this).val()=='Yes'){
            $(this).parent().parent().find('.show_on_radio_data').removeClass('display_none');
            $(this).parent().parent().find('.show_on_radio_data_no').addClass('display_none');
			
        }else{
            $(this).parent().parent().find('.show_on_radio_data').addClass('display_none');
            $(this).parent().parent().find('.show_on_radio_data_no').removeClass('display_none');
        }
	});
	
	
	
	 
	
	$('body').on('click', '.other_policies_name', function () {
        if($(this).is(":checked")){
            $('.otherpolicies').removeClass('display_none');
        }else{
            $('.otherpolicies').addClass('display_none');
        }
    });
	

    
	
	

	/*
    $.validator.addMethod("expire_date_12a_valid", function(value, element) {
		var from_date_12a_valid = $('.from_date_12a_valid').val();
		return Date.parse(from_date_12a_valid) <= Date.parse(value) || value == "";
	}, "* End date must be after start date"); */
	//$('#entity_step2_form').validate();
    //});
	/* jQuery.validator.addMethod("greaterThan", 
	function(value, element, params) {

		if (!/Invalid|NaN/.test(new Date(value))) {
			return new Date(value) > new Date($(params).val());
		}

		return isNaN(value) && isNaN($(params).val()) 
			|| (Number(value) > Number($(params).val())); 
	},'Expiry date must be later than start of 12A Certification.');
	 */ 
   
   
   
    function finail_entity_submit(){
        var entity_id = $('#entity_id').val();
        var code = $('#code').val();

        var table_field = [];
        table_field={
            legal_name : $('#legal_name').val(),
            website : $('#website').val(),
        };
       
        $.post(APP_URL + 'ngo/entity/update_entity', {
            entity_id: entity_id,
            code: code,
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
                    window.location.href = APP_URL+'ngo/entity/list';
                });
           } else {
                $('#err_add_plan').empty();
                $('#err_add_plan').html("<div class='alert alert-danger fade in'>\n\<button class='close' type='button' data-dismiss='alert'>x</button>\n\<strong>" + response.message + "</strong></div>");
                $("#err_add_plan").fadeTo(2000, 500).slideUp(500, function(){
                    $('#err_add_plan').empty();
                });
            }
        }, 'json');
    }
	 /* $('#member_age').keypress(function(e){
		  $("#age_err").addClass('display_none');
		 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) 
   {
        //display error message
        //$("#errmsg").html("Digits Only").show();

             $("#age_err").removeClass('display_none');
				return false;
               //return false;
    }
	}); */ 
	
});


</script>