<?php include_once 'config/init.php'; ?>

<?php 
	
	 

	session_destroy();
	reDirect('index.php','Logged out', 'success');

    

?>