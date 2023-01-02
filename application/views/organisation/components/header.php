<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CSR</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admintheme/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admintheme/dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admintheme/dist/css/skins/_all-skins.css">
<link href="<?php echo base_url();?>assets/admintheme/css/animate.css" rel="stylesheet">

<?php
		if(base_url() == 'http://dev.compass-csr.com/'){
			echo '<link rel="shortcut icon" href="'.base_url().'assets/img/compass-favicon-blue.png">';
		}
		if(base_url() == 'https://compass-csr.com/'){
			echo '<link rel="shortcut icon" href="'.base_url().'assets/img/compass-favicon-blue.png">';
		}
		if(base_url() == 'http://devorg.compass-csr.com/'){
			echo '<link rel="shortcut icon" href="'.base_url().'assets/img/compass-favicon-green.png">';
		}	
		if(base_url() == 'https://org.compass-csr.com/'){
			echo '<link rel="shortcut icon" href="'.base_url().'assets/img/compass-favicon-green.png">';
		}
	?>
  
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  
  
<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url();?>assets/admintheme/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery-ui -->
<script src="<?php echo base_url();?>assets/admintheme/plugins/jQueryUI/jquery-ui.js"></script>
<script src="<?php echo base_url();?>assets/admintheme/plugins/jQueryUI/jquery-ui.min.js"></script>
<link href="<?php echo base_url();?>assets/admintheme/css/jquery-ui.min.css" rel="stylesheet">
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url();?>assets/admintheme/bootstrap/js/bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url();?>assets/admintheme/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/admintheme/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/admintheme/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/admintheme/dist/js/demo.js"></script>


<script src="<?php echo base_url();?>assets/js/constant.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/plugins/jquery.validate.min.js"></script>
<script src="<?php echo base_url();?>assets/js/plugins/jquery.form.min.js"></script> 
<script src="<?php echo base_url();?>assets/admintheme/plugins/jquery.blockUI.min.js"></script> 


<link href="<?php echo base_url();?>assets/css/plugins/uploader.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/plugins/demo.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>assets/js/plugins/demo.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/dmuploader.min.js"></script>
<!-- Custom and plugin javascript -->

<script src="<?php echo base_url();?>assets/js/plugins/datatables.min.js"></script>
<link href="<?php echo base_url();?>assets/css/plugins/datatables.min.css" rel="stylesheet">
<script src="<?php echo base_url();?>assets/js/jquery.toaster.js"></script>
<script>
	$(document).ready(function(){
		$('.dataTables-example').DataTable({
			
			dom: '<"html5buttons"B>lTfgitp',
			
			buttons: [
				{ extend: 'copy'},
				{extend: 'csv'},
				{extend: 'excel'},
				{extend: 'pdf',
					customize: function (doc) {
						doc.content[1].table.widths = 
							Array(doc.content[1].table.body[0].length + 1).join('*').split('');
							
							doc.defaultStyle.alignment = 'center';
							doc.styles.tableHeader.alignment = 'center';
					  },
				},
				{extend: 'print',
					customize: function (win){
						$(win.document.body).addClass('white-bg');
						$(win.document.body).css('font-size', '10px');

						$(win.document.body).find('table')
								.addClass('compact')
								.css('font-size', 'inherit');
					}
				},
			//"lengthMenu": [[50, 75, 100, -1], [50, 75, 100, "All"]]
			]
			
		});
		$('.dataTables').DataTable({
			//"order": [[ 5, "desc" ]],
			"lengthMenu": [[50, 75, 100, -1], [50, 75, 100, "All"]]
		});
			
			
	});
</script>
<style>
.skin-blue .main-header .navbar {
    background-color: #1abb9c !important;
}
.skin-blue .main-header li.user-header {
    background-color: #1abb9c !important;
}
.display_none{display:none;}
.error,.required{color:red;}

</style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">