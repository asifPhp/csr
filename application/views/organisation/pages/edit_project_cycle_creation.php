<link rel="stylesheet" href="<?php echo base_url()?>assets/css/comboTreePlugin.css">
<script src="<?php echo base_url()?>assets/js/comboTreePlugin.js"></script>
<style>
#headerMsg{	margin:20px 0px;}
.dataTables-example th{	text-align:center;}
.ibox-content{padding: 10px;}
[data-toggle="collapse"] .fa:before {  
  content: "\f139";
}

[data-toggle="collapse"].collapsed .fa:before {
  content: "\f13a";
}
.cycle_html_div .marBot20{padding-top: 5px;}
.comboTreeInputBox{background-color: #fff !important;
    opacity: 1;border-radius: 0px !important;}
.modal-backdrop.in{display:none;opacity:0;}
#upload_80G_reg{background-color: #fff;}
.readonly_date{
	background-color: white !important;
}
.is_edit_data{
	border: none;
	background-color: white !important;
    color: blue;
	padding: 0;
}
</style>
<?php
	 if($data_value){
		$superngo_id = $data_value[0]['superngo_id']; 
		$comments = $data_value[0]['comments'];
		$org_task_id = $data_value[0]['org_task_id']; 
		$project_id = $data_value[0]['project_id']; 
		$org_task_list_id=$data_value[0]['org_task_list_id'];
		$org_id=$data_value[0]['org_id'];
		$prop_id=$data_value[0]['prop_id'];
		$org_staff_id=$data_value[0]['org_staff_id'];
		$ngo_id = $data_value[0]['ngo_id'];
		//$donor_list_ = json_decode($data_value[0]['additional_json'])[0]->donor_list;
		$superngo_details = $this->db->get_where('superngo',array('id' =>$superngo_id))->result();
		$donor_list = $this->db->get_where('donor',array('org_id' =>$org_id))->result_array();
	}
?>

<div class="content-wrapper animated fadeInRight">
	<div class="animated fadeInRight">
		<div class="row">
			<div class="col-lg-12">
				<div class="ibox-content">
				<?php //var_dump($project_cycle_details); ?>
				<?php //var_dump($data_value[0]); ?>
				<?php //var_dump(json_decode($data_value[0]['additional_json'])); ?>
				<?php //var_dump($project_data[0]); ?>
					<div id="head_ngo_review"></div>
					<input type="hidden" class="form-control" id="org_staff_id" name="org_staff_id" value="<?php echo $org_staff_id; ?>">		
					<input type="hidden" class="form-control" id="org_task_id" name="org_task_id" value="<?php echo $org_task_id; ?>">
					<input type="hidden" class="form-control" id="org_task_list_id" name="org_task_list_id" value="<?php echo $org_task_list_id; ?>">
					<input type="hidden" class="form-control" id="org_id" name="org_id" value="<?php echo $org_id; ?>">
					<input type="hidden" class="form-control" id="prop_id" name="prop_id" value="<?php echo $prop_id; ?>">
					<input type="hidden" class="form-control" id="superngo_id" name="superngo_id" value="<?php echo $superngo_id; ?>">
					<input type="hidden" class="form-control" id="project_id" name="project_id" value="<?php echo $project_id; ?>">
					<input type="hidden" class="form-control" id="org_task_id" name="org_task_id" value="<?php echo $org_task_id; ?>">
					<input type="hidden" class="form-control" id="ngo_id" name="ngo_id" value="<?php echo $ngo_id; ?>">
					<input type="hidden" class="form-control" id="ngo_doc_hidden" name="ngo_doc_hidden" value="<?php echo $project_cycle_details[0]->ngo_doc ; ?>">
					<input type="hidden" class="form-control" id="csr_doc_hidden" name="csr_doc_hidden" value="<?php echo $project_cycle_details[0]->csr_doc ; ?>">
					<input type="hidden" class="form-control" id="ngo_payment_hidden" name="ngo_payment_hidden" value="<?php echo $project_cycle_details[0]->ngo_payment ; ?>">
					<input type="hidden" class="form-control" id="project_cycle_id" name="project_cycle_id" value="<?php echo $project_cycle_details[0]->project_cycle_id; ?>">
					
					<div class="row">	
						<div class="col-lg-12">
							<div class="box box-primary">
								<div class="box-header with-border">
									<h3 class="box-title"><?php echo $data_value[0]['org_task_label']; ?></h3>
								</div>
								<div class="box-body" >
									<div class="form-group row">
										<label for="cycle_creation" class="col-md-12">Cycle creation </label>
										<div class="col-md-10 append_cycle_data"> 
											
										</div>
									</div> 
									<div class=" cycle_html_div " >
										<div class="remove-added-para row" style="margin-top: 10px;">
											<div class="col-md-4 marBot20">
												<input type="text" class="form-control plan_Cycle" id="cycle_name" name="cycle_name" placeholder="Cycle name" value="<?php echo $project_cycle_details[0]->cycle_name?>">
											</div>
											<div class="col-md-4 marBot20">
												<input type="text" class="form-control date readonly_date" id="project_date" name="project_date" placeholder="date" value="<?php echo $project_cycle_details[0]->cycle_start_date1?>" >
											</div>
											<div class="col-md-4 marBot20">
												<select class="form-control" id="is_payment" name="is_payment" >
													<option value="">Select payment</option>
													<option <?php if($project_cycle_details[0]->is_payment && $project_cycle_details[0]->is_payment == 'yes'){ echo 'selected';}?> value="yes">Yes</option>
													<option <?php if($project_cycle_details[0]->is_payment && $project_cycle_details[0]->is_payment == 'no'){ echo 'selected';}?> value="no">No</option>
												</select>
											</div>
											<div class="col-md-4 marBot20 is_payment_yes <?php if($project_cycle_details[0]->is_payment == 'no'){ echo 'display_none' ;}?>">
												<select class="form-control" id="donor_dropdown" name="donor_dropdown" >
													<option value="">Select donor</option>
													<?php 
													if($donor_list){
														foreach($donor_list as $val){ 
															if($project_cycle_details[0]->donor_dropdown_id == $val['donor_id'] ){ $selected_="selected";}else{$selected_="";}
															$selected="";
														 echo '<option '.$selected.' '.$selected_.' value="'.$val['donor_id'].'">'.$val['legal_name'].'</option>';
														 
														}
													  }?>
												</select>
											</div>
											<div class="col-md-4 marBot20 is_payment_yes <?php if($project_cycle_details[0]->is_payment == 'no'){ echo 'display_none' ;}?>">
												<input type="number" id="cycle_donor_amount" class="form-control cycle_donor_amount" name="cycle_donor_amount" placeholder="amount" value="<?php echo $project_cycle_details[0]->cycle_donor_amount?>">
											</div>
											<div class="col-md-4 marBot20 is_payment_yes <?php if($project_cycle_details[0]->is_payment == 'no'){ echo 'display_none' ;}?>">
												<input type="text" readonly id="ngo_payment" class="form-control" name="ngo_payment" placeholder="Ngo payment">
											</div>
											<div class="col-md-4 marBot20">
												<input type="text" readonly id="ngo_doc" class="form-control" name="ngo_doc" placeholder="Ngo documents" ngo_type="">
											</div>
											
											<div class="col-md-4 marBot20">
												<input type="text" readonly id="csr_doc" class="form-control" name="csr_doc" placeholder="Csr documents">
											</div>
											
										</div>
										<div class="cylce_data_error display_none "><label class="error">Please fill all required inputs.</label></div>
										<div class="cylce_date_error display_none "><label class="error">Cycle enddate is greater than startdate.</label></div>
										<div class="cycle_list_error display_none "><label class="error">Atleast one required.</label></div>
									</div>
									<br>
									<div class="form-group row">
										<div class="col-md-12">
											<div class="button">
											   <button type="button" id="update_cycle" class="btn btn-success">Update</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	
<?php
$data['sub_folder_name']="";
$data['image_cat']="entity";
$this->load->view('file_upload',$data);
?>
<script>
$('document').ready(function(){
	
	$("body").on("click", "#update_cycle", function () {
		
		var project_cycle_id = $('#project_cycle_id').val();		
	    var cycle_name = $('#cycle_name').val();
		var project_date = $('#project_date').val();
		var is_payment = $('#is_payment').val();
		var donor_dropdown = $('#donor_dropdown option:selected').text();
		var donor_dropdown_id = $('#donor_dropdown').val();
		var cycle_donor_amount = $('#cycle_donor_amount').val();
		var ngo_payment = $('#ngo_payment').val();
		var ngo_doc = $('#ngo_doc').val();
		var csr_doc = $('#csr_doc').val();
		
		$.post(APP_URL + 'organisation/project/update_cycle', {
			project_cycle_id:project_cycle_id,
			cycle_name:cycle_name,
			project_date:project_date,
			is_payment:is_payment,
			donor_dropdown:donor_dropdown,
			donor_dropdown_id:donor_dropdown_id,
			cycle_donor_amount:cycle_donor_amount,
			ngo_payment:ngo_payment,
			ngo_doc:ngo_doc,
			csr_doc:csr_doc,
		},
		function (response) {
			$('#head_ngo_review').empty();
            if (response.status == 200) {
				$.toaster({ priority :'success', message :'Saved'});
            
			} else {
                $('#head_ngo_review').html("<div class='alert alert-danger fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
				$("#head_ngo_review").fadeTo(2000, 500).slideUp(500, function(){
					$('#head_ngo_review').empty();
				});
			}
        },'json');		
	});
 
	$("body").on("click", "#create_cycle", function () {
		
		var is_error = 'no';
	    var cycle_file_upload_actual = $('#cycle_file_upload_actual').val();
	    var cycle_file_upload = $('#cycle_file_upload').val();
		var project_start_date = $('#project_start_date').val();
		var project_end_date = $('#project_end_date').val();
		var project_date = $('#project_date').val();
		var comments = $('#comments').val();
		var project_id = $('#project_id').val();
		var org_task_id = $('#org_task_id').val();
		var org_id=$('#org_id').val();
		var superngo_id=$('#superngo_id').val();
		var org_staff_id=$('#org_staff_id').val();
		var ngo_id = $('#ngo_id').val();
		
		if(cycle_file_upload){
			$('.cycle_file_upload_error').addClass('display_none');
		}else{
			is_error = 'yes';
			$('.cycle_file_upload_error').removeClass('display_none');
		}
		if(project_start_date){
			$('.project_start_date_error').addClass('display_none');
		}else{
			is_error = 'yes';
			$('.project_start_date_error').removeClass('display_none');
		}
		if(project_end_date){
			$('.project_end_date_error').addClass('display_none');
		}else{
			is_error = 'yes';
			$('.project_end_date_error').removeClass('display_none');
		}
	    
		
		var is_donor_error = 'no';
		var donor_list = [];
		$('#TextBoxContainer1 .remove-added-para').each(function(key,val){
			if(!$(this).find('.select_donor').val()){
				is_donor_error = 'yes';
			}
			if(!$(this).find('.donor_amount').val()){
				is_donor_error = 'yes';
			}
			donor_list.push({
				select_donor : $(this).find('.select_donor').val(),
				donor_amount : $(this).find('.donor_amount').val(),
			}); 
		});
			  
		//console.log(donor_list);
		
		if(is_donor_error == 'yes'){
			is_error = 'yes';
			$('#donor_data_error').removeClass('display_none');
			$('#donor_list_error').addClass('display_none');
		}else{
			$('#donor_data_error').addClass('display_none');

			
			if(donor_list.length==0){
				is_error = 'yes';
				$('#donor_list_error').removeClass('display_none');
			}else{
				$('#donor_list_error').addClass('display_none');
			}
		}
		
		
		var is_cycle_error = 'no';
		var cycle_list = [];
		$('.append_cycle_data .cycle_data').each(function(key,val){
			var donor_dropdown_id = $(this).find('.donor_dropdown').attr('id');
			console.log(donor_dropdown_id);
			if(donor_dropdown_id){
				donor_dropdown_id =donor_dropdown_id;
			}else{
				donor_dropdown_id =0;
			}
			
			cycle_list.push({
				cycle_name : $(this).find('.cycle_name').text(),
				cycle_start_date1 : $(this).find('.project_date').text(),
				is_payment : $(this).find('.is_payment').text(),
				donor_dropdown_id : donor_dropdown_id,
				donor_dropdown : $(this).find('.donor_dropdown').text(),
				cycle_donor_amount : $(this).find('.cycle_donor_amount').text(),
				ngo_payment : $(this).find('.ngo_payment').text(),
				ngo_doc : $(this).find('.ngo_doc').text(),
				csr_doc : $(this).find('.csr_doc').text(),
			}); 
		});
 
		//console.log(cycle_list);
		
		if(cycle_list.length==0){
			is_error = 'yes';
			$('.cycle_list_error').removeClass('display_none');
		}else{
			$('.cycle_list_error').addClass('display_none');
		}
	    
		if(is_error == 'yes'){
			return false;
		}else{
			
		}
		
		
		
		var additional_json = [];
		additional_json.push({
			'cycle_list':cycle_list,
			'donor_list':donor_list,
			'cycle_file_upload':cycle_file_upload,
			'cycle_file_upload_actual':cycle_file_upload_actual,
			'project_start_date':project_start_date,
			'project_end_date':project_end_date,
			'comments':comments,
			'project_id':project_id,
			'org_id':org_id,
			'superngo_id':superngo_id,
			'org_staff_id':org_staff_id,
			'is_saved_once':'yes',
		});
			
		$.post(APP_URL + 'organisation/tasks/post_cycle_data', {
			additional_json:additional_json,
			cycle_list:cycle_list,
			donor_list:donor_list,
			cycle_file_upload:cycle_file_upload,
			cycle_file_upload_actual:cycle_file_upload_actual,
			project_start_date:project_start_date,
			project_end_date:project_end_date,
			comments:comments,
			project_id:project_id,
			org_id:org_id,
            superngo_id:superngo_id,
            org_staff_id:org_staff_id,
			org_task_id:org_task_id,
			ngo_id:ngo_id,
		
		},
		function (response) {
			$('#head_ngo_review').empty();
            if (response.status == 200) {
				$('#submit_cycle_creation').trigger('click');
            } else {
                $('#head_ngo_review').html("<div class='alert alert-danger fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
				$("#head_ngo_review").fadeTo(2000, 500).slideUp(500, function(){
					$('#head_ngo_review').empty();
				});
			}
        },'json');		
	});
 
	$("body").on("click",'#addProSpeci', function () {
		var myctime = $.now();
		$(".donor_html_div").find('.remove-added-para').attr('mytime',myctime);
		var div = $(".donor_html_div").html();
		$("#TextBoxContainer1").append(div);
		/*
		$('#TextBoxContainer1 .remove-added-para').each(function(){
			var myctime_ = $(this).attr('myctime');
			var myctime_ = $(this).find('.select_donor').attr('myctime');
			if(myctime_ != myctime){
				is_remove
				if($(this).attr('id') != optVal){
					
				}
			}
			var t = $(this).text();
			var v = ($(this).attr('value'));
			var i = ($(this).attr('id'));
			if($(this).attr('id') == optVal){
				optionh += '<option value="'+v+'" id="'+i+'">'+t+'</option>';
			}
		});*/
	});
	
	
	$("body").on("change", "#is_payment", function () {
		var is_payment = $(this).val();
		if(is_payment == 'yes'){
			$('.is_payment_yes').removeClass('display_none');
		}else{
			$('.is_payment_yes').addClass('display_none');
		}
	});
	$("body").on("click", ".addcycle", function () {
		var is_error = 'no';
		var cycle_name = $('#cycle_name').val();
		var project_date = $('#project_date').val();
		
		var ngo_doc = $('#ngo_doc').val();
		var csr_doc = $('#csr_doc').val();
		var is_payment = $('#is_payment').val();
		var donor_dropdown = $("#donor_dropdown option:selected").text();
		var donor_dropdown_id = $('#donor_dropdown').val();
		var cycle_donor_amount = $('#cycle_donor_amount').val();
		var ngo_payment = $('#ngo_payment').val();
		//console.log(donor_dropdown);
		//console.log(donor_dropdown_id);
		if(cycle_name){}else{is_error = 'yes'}
		if(project_date){}else{is_error = 'yes'}
		if(ngo_doc){}else{is_error = 'yes'}
		if(csr_doc){}else{is_error = 'yes'}
		if(is_payment){}else{is_error = 'yes'}
		if(is_payment == 'yes' && !donor_dropdown){is_error = 'yes'}
		if(is_payment == 'yes' && !cycle_donor_amount){is_error = 'yes'}
		if(is_payment == 'yes' && !ngo_payment){is_error = 'yes'}
		
		
			if(is_error == 'yes'){
				$('.cylce_data_error').removeClass('display_none');
			}else{
				$('.cylce_data_error').addClass('display_none');
				
				
				var html = '<div class="cycle_data">\n\
							<div class="row">\n\
								<div class="col-sm-6">\n\
									Cycle Name:\n\
								</div>\n\
								<div class="col-sm-6">\n\
									<span class="cycle_name">'+cycle_name+'</span>\n\
									<span class="pull-right remove_cycle_data">Remove</span>\n\
								</div>\n\
							</div>\n\
							<div class="row"><div class="col-sm-6">Date:</div><div class="col-sm-6 project_date">'+project_date+'</div></div>\n\
							<div class="row"><div class="col-sm-6">Is Payment:</div><div class="col-sm-6 is_payment">'+is_payment+'</div></div>';
						if(is_payment == 'yes'){
							html += '<div class="row"><div class="col-sm-6">Donor name:</div><div class="col-sm-6 donor_dropdown" id="'+donor_dropdown_id+'">'+donor_dropdown+'</div></div>\n\
							<div class="row"><div class="col-sm-6">Donor amount:</div><div class="col-sm-6 cycle_donor_amount">'+cycle_donor_amount+'</div></div>\n\
							<div class="row"><div class="col-sm-6">Donor payment:</div><div class="col-sm-6 ngo_payment">'+ngo_payment+'</div></div>';
						}
							html += '<div class="row"><div class="col-sm-6">NGO document:</div><div class="col-sm-6 ngo_doc">'+ngo_doc+'</div></div>\n\
							<div class="row"><div class="col-sm-6">CSR document:</div><div class="col-sm-6 csr_doc">'+csr_doc+'</div></div>\n\
						</div>';
				$('.append_cycle_data').append(html);
				
				$('#cycle_name').val('')
				$('#project_date').val('');
				$('#ngo_doc').val('');
				$('#csr_doc').val('');
				$('#is_payment').val('');
				$('#donor_dropdown').val('');
				$('#cycle_donor_amount').val('');
				$('#ngo_payment').val('');
				$('#is_payment').trigger('change');
				
			}
			
		
	});
	$("body").on("click", ".removepara", function () {
		$(this).parent().parent().remove();
	});
	
	
	/*multi select*/
	var geo_instance ='';
	var categories_instance ='';
	get_organisation_data();
	function get_organisation_data(){
		//payment_processing_doc , ngo_document_list, csr_document_list
		$.post(APP_URL + 'organisation/tasks/get_cycle_data_of_documents', {
			'doc_type':'ngo_document_list'
        },
        function (response) {
        	var geoData=response.geoData;
        	var orgGeoData=response.orgGeoData;
			var ngo_doc = $('#ngo_doc_hidden').val();
			if(ngo_doc){
				var ngo_doc_array = ngo_doc.split(",");
				
				if(ngo_doc_array.length){
					$.each(ngo_doc_array, function(index, item) {
						$.each(geoData, function(index1, item1) {
							if(($.trim(item)) == item1.title){
								orgGeoData.push(item1.id);
							}
						});
					});
				}
			}
			
			geo_instance = $('#ngo_doc').comboTree({
			  	source : geoData,
			  	isMultiple:true,
			  	cascadeSelect:true,
			  	//selected: orgGeoData
			});
			if(orgGeoData){
				geo_instance.setSelection(orgGeoData);
			}
			var categoryData=response.categoryData;
        	var orgcategoryData=response.orgcategoryData;
			
			categories_instance = $('#').comboTree({
			  	source : categoryData,
			  	isMultiple:true,
			  	cascadeSelect:true,
			  	//selected: orgGeoData
			});
			
			if(orgcategoryData){
				categories_instance.setSelection(orgcategoryData);
			}
        },'json');
	}
	
	/*multi select*/
	var geo_instance1 ='';
	var categories_instance1 ='';
	get_organisation_data1();
	function get_organisation_data1(){
		//payment_processing_doc , ngo_document_list, csr_document_list
		$.post(APP_URL + 'organisation/tasks/get_cycle_data_of_documents', {
			'doc_type':'csr_document_list'
        },
        function (response) {
        	var geoData=response.geoData;
        	var orgGeoData=response.orgGeoData;
			var csr_doc = $('#csr_doc_hidden').val();
			if(csr_doc){
				var csr_doc_array = csr_doc.split(",");
				
				if(csr_doc_array.length){
					$.each(csr_doc_array, function(index, item) {
						$.each(geoData, function(index1, item1) {
							if(($.trim(item)) == item1.title){
								orgGeoData.push(item1.id);
							}
						});
					});
				}
			}
			
        	geo_instance1 = $('#csr_doc').comboTree({
			  	source : geoData,
			  	isMultiple:true,
			  	cascadeSelect:true,
			  	//selected: orgGeoData
			});
			if(orgGeoData){
				geo_instance1.setSelection(orgGeoData);
			}
			var categoryData=response.categoryData;
        	var orgcategoryData=response.orgcategoryData;
			
			categories_instance1 = $('#').comboTree({
			  	source : categoryData,
			  	isMultiple:true,
			  	cascadeSelect:true,
			  	//selected: orgGeoData
			});
			
			if(orgcategoryData){
				categories_instance1.setSelection(orgcategoryData);
			}
        },'json');
		
	}
	
	/*multi select*/
	var geo_instance2 ='';
	var categories_instance2 ='';
	get_organisation_data2();
	function get_organisation_data2(){
		//payment_processing_doc , ngo_document_list, csr_document_list
		$.post(APP_URL + 'organisation/tasks/get_cycle_data_of_documents', {
			'doc_type':'payment_processing_doc'
        },
        function (response) {
        	var geoData=response.geoData;
        	var orgGeoData=response.orgGeoData;
			
			var ngo_payment = $('#ngo_payment_hidden').val();
			if(ngo_payment){
				var ngo_payment_array = ngo_payment.split(",");
				
				if(ngo_payment_array.length){
					$.each(ngo_payment_array, function(index, item) {
						$.each(geoData, function(index1, item1) {
							if(($.trim(item)) == item1.title){
								orgGeoData.push(item1.id);
							}
						});
					});
				}
			}
				
        	geo_instance2 = $('#ngo_payment').comboTree({
			  	source : geoData,
			  	isMultiple:true,
			  	cascadeSelect:true,
			  	//selected: orgGeoData
			});
			if(orgGeoData){
				geo_instance2.setSelection(orgGeoData);
			}
			var categoryData=response.categoryData;
        	var orgcategoryData=response.orgcategoryData;
			
			categories_instance2 = $('#').comboTree({
			  	source : categoryData,
			  	isMultiple:true,
			  	cascadeSelect:true,
			  	//selected: orgGeoData
			});
			
			if(orgcategoryData){
				categories_instance2.setSelection(orgcategoryData);
			}
        },'json');
		
	}
		/*data pickers*/
		$(".start_date").datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: 'yy-mm-dd',
			maxDate: 'dateToday',
			yearRange : 'c-75:c+75',
		});
		$(".end_date").datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: 'yy-mm-dd',
			minDate: 'dateToday',
			yearRange : 'c-75:c+75',
		});	
		$(".date").datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: 'yy-mm-dd',
			minDate: 'dateToday',
			yearRange : 'c-75:c+75',
		});		
			
	$('body').on('click','#submit_cycle_creation', function () {
		var is_error='no';
		var comments = $('#comments').val();
		var org_task_id=$('#org_task_id').val();
		var org_task_list_id=$('#org_task_list_id').val();
		var org_id=$('#org_id').val();
		var prop_id=$('#prop_id').val();
		var superngo_id=$('#superngo_id').val();
		var org_staff_id=$('#org_staff_id').val();
		var cycle_file_upload = $('#cycle_file_upload').val();
		var cycle_file_upload_actual = $('#cycle_file_upload_actual').val();
		var project_start_date = $('#project_start_date').val();
		var project_end_date = $('#project_end_date').val();
		var project_id = $('#project_id').val();
		var ngo_id = $('#ngo_id').val();
		if(cycle_file_upload){
			$('.cycle_file_upload_error').addClass('display_none');
		}else{
			is_error = 'yes';
			$('.cycle_file_upload_error').removeClass('display_none');
		}
		if(project_start_date){
			$('.project_start_date_error').addClass('display_none');
		}else{
			is_error = 'yes';
			$('.project_start_date_error').removeClass('display_none');
		}
		if(project_end_date){
			$('.project_end_date_error').addClass('display_none');
		}else{
			is_error = 'yes';
			$('.project_end_date_error').removeClass('display_none');
		}
		
		var is_donor_error = 'no';
		var donor_list = [];
		$('#TextBoxContainer1 .remove-added-para').each(function(key,val){
			if(!$(this).find('.select_donor').val()){
				is_donor_error = 'yes';
			}
			if(!$(this).find('.donor_amount').val()){
				is_donor_error = 'yes';
			}
			donor_list.push({
				select_donor : $(this).find('.select_donor').val(),
				donor_amount : $(this).find('.donor_amount').val(),
			}); 
		});
			  
		console.log(donor_list);
		
		var is_cycle_error = 'no';
		var cycle_list = [];
		$('.append_cycle_data .cycle_data').each(function(key,val){
			var donor_dropdown_id = $(this).find('.donor_dropdown').attr('id');
			//console.log(donor_dropdown_id);
			if(donor_dropdown_id){
				donor_dropdown_id =donor_dropdown_id;
			}else{
				donor_dropdown_id =0;
			}
			
			cycle_list.push({
				cycle_name : $(this).find('.cycle_name').text(),
				cycle_start_date1 : $(this).find('.project_date').text(),
				is_payment : $(this).find('.is_payment').text(),
				donor_dropdown_id : donor_dropdown_id,
				donor_dropdown : $(this).find('.donor_dropdown').text(),
				cycle_donor_amount : $(this).find('.cycle_donor_amount').text(),
				ngo_payment : $(this).find('.ngo_payment').text(),
				ngo_doc : $(this).find('.ngo_doc').text(),
				csr_doc : $(this).find('.csr_doc').text(),
			}); 
		});
 
		//console.log(cycle_list);
		
		if(cycle_list.length==0){
			is_error = 'yes';
			$('.cycle_list_error').removeClass('display_none');
		}else{
			$('.cycle_list_error').addClass('display_none');
		}
	 	
		var org_id=$('#org_id').val();
		var superngo_id=$('#superngo_id').val();
		var org_staff_id=$('#org_staff_id').val();
		var additional_json = [];
		additional_json.push({
			'cycle_list':cycle_list,
			'donor_list':donor_list,
			'cycle_file_upload':cycle_file_upload,
			'cycle_file_upload_actual':cycle_file_upload_actual,
			'project_start_date':project_start_date,
			'project_end_date':project_end_date,
			'comments':comments,
			'project_id':project_id,
			'org_id':org_id,
			'superngo_id':superngo_id,
			'org_staff_id':org_staff_id,
			'is_saved_once':'yes',
		});	
		//var additional_json = ''
		console.log(additional_json);
		$.post(APP_URL + 'organisation/tasks/change_status_onsubmit_by_cycle_creation', {
			additional_json: additional_json,
			comments: comments,
			org_task_id:org_task_id, 
			org_task_list_id:org_task_list_id,
			org_id:org_id,
            prop_id:prop_id,
            superngo_id:superngo_id,
            org_staff_id:org_staff_id,			
            project_id:project_id,		
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
					window.location.href=APP_URL+"organisation/tasks/mytasks";
				});
            } else {
                $('#head_ngo_review').html("<div class='alert alert-danger fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
				$("#head_ngo_review").fadeTo(2000, 500).slideUp(500, function(){
					$('#head_ngo_review').empty();
				});
			}	
			
		}, 'json');
		 return false;
	})	
});
</script>

