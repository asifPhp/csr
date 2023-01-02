
<form>
<div>				   
	<label for="comments12" class="col-md-12 " >Do you recommend this application?</label>
	  <div class="col-md-12">
		 <label style="font-weight: 400;">
			<input type="radio"  name="rec_name" value="Approved"  <?php if($ngo_status == 'Approved'){echo 'checked';}?>>&nbsp;
			   <span>Yes, recommended</span> 
		 </label>
			<label style="font-weight: 400;">
			   <input type="radio"  name="rec_name" value="Rejected"  <?php if($ngo_status == 'Rejected'){echo 'checked';}?>>
				  <span>No, not recommended</span> 
			</label>&nbsp; 
	  </div>
 </div>
</form>
<script>
$('document').ready(function(){
	$('#product').validate({
      
	ignore: [],
        rules: {
			'rec_name[]': {
                required: true,
            },	
		},	
		messages: {
				rec_name: {
					required: "required.",
				},		
		},
		
		
		
});

});

</script>
