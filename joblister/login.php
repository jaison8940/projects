<?php include_once 'config/init.php'; ?>

<?php 
	$job = new Job;

	if(isset($_POST['submit']))
	{
		$data = array();
		$data['email'] = $_POST['email'];
		$data['password'] = md5($_POST['password']);
		

 		if($job->auth($data)){
 			reDirect('index.php','Email or password is incorrect', 'error');		
 			
 			
	    }
	    else{
	    	$_SESSION['logged_in'] = true;
 			$id = $job->getUserID($data)->id;
 			$_SESSION['user_id'] = $id;
 			reDirect('index.php','', '');
	    	
	    }


	}


?>