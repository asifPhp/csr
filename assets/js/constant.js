$('document').ready(function(){
	
	APP_URL = 'http://localhost/csr/';
	
	
	
	//---------------------------------------------------------------------
    /*
     * This script is used for logout user
     */
	$('body').on('click','.logout_',function() {
		if (!confirm("Do you want to logout")) {
            return false;
        }	
		$.get(APP_URL+'admin/admin/logout',{},function(response) {
			window.location.href = APP_URL+'admin/admin';
		});	
	});
})

