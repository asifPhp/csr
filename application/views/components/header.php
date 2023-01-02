<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <title> CSR  </title>
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
	  <script>
	  APP_URL = '<?php echo base_url(); ?>';
	  </script>
   </head>
   <body>