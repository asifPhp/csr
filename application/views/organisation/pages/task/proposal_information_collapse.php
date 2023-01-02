<style>
#headerMsg{	margin:20px 0px;}
.dataTables-example th{	text-align:center;}
.ibox-content{padding: 10px;}
[data-toggle="collapse"] .fas:before {  
  content: "\f055";
}

[aria-expanded="true"] .fas:before {  
  content: "\f056";
}

[data-toggle="collapse"].collapsed .fas:before {
  content: "\f055";
}

</style>
						
 <?php
    
	$superngo_id = $data_value[0]['superngo_id']; 
	$comments = $data_value[0]['comments'];
	$org_task_id = $data_value[0]['org_task_id']; 
	
    //$title=$data_value[0]['title'];
	
	//var_dump($superngo_id);
	$superngo_details = $this->db->get_where('superngo',array('id' =>$superngo_id))->result();
	$proposal=$this->db->get_where('proposal')->result();
	
?>
 						
         				<div class="box box-primary">
							<div class="box-header with-border">
								<h3 class="box-title">Proposal Information</h3>
							</div>
							<div class="box-body">
								<div class="form-group row">
									<label for="organisation_id" class="col-md-3 text-right">Proposal Title </label>
									<div class="col-md-9"> 
										<span class="is_edit_hide"><?php echo $proposal[0]->title; ?></span>
									</div>
								</div>
								<div class="form-group row">
									<label for="organisation_id" class="col-md-3 text-right">Submitted Date </label>
									<div class="col-md-9"> 
										<span class="is_edit_hide"><?php
										$date_=$proposal[0]->created_time;
										if($date_ !=''){
										 echo date_formats($date_);
										 }?></span>
										
									</div>
								</div>
						    </div>
						</div>
	    
	
	                   
	
	



<script>
/* $('document').ready(function(){
	
	$('body').on('click','#save', function () {
		var comments = $('#comments').val();
		var org_task_id=$('#org_task_id').val();
		console.log(comments);
		$.post(APP_URL + 'organisation/tasks/update_comment_ontask', {
			comments: comments,
			org_task_id:org_task_id, 
		},
		function (response) {
			$('#head_ngo_review').empty();
            if (response.status == 200) {
				var message = response.message;
                //$("html, body").animate({scrollTop: 0}, "slow");               
               // $('#head_ngo_review').html("<div class='alert alert-success fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
                //$('.remove_image[name=' + contact_id + ']').closest("tr").remove();
				//$("#head_ngo_review").fadeTo(2000, 500).slideUp(500, function(){
					//$('#head_ngo_review').empty();
					//window.location.reload();
					
				//});
            } else {
                $('#head_ngo_review').html("<div class='alert alert-danger fade in'><button class='close' type='button' data-dismiss='alert'>x</button><strong>" + response.message + "</strong></div>");
				$("#head_ngo_review").fadeTo(2000, 500).slideUp(500, function(){
					$('#head_ngo_review').empty();
				});
			}	
		}, 'json');
		 return false;
		
	});
	$('body').on('click','#submit', function () {
		
		var comments = $('#comments').val();
		var org_task_id=$('#org_task_id').val();
		
		$.post(APP_URL + 'organisation/tasks/change_status_onsubmit', {
			comments: comments,
			org_task_id:org_task_id, 
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
});*/
</script>
 
