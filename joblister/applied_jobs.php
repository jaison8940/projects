<?php include_once 'config/init.php'; ?>

<?php 
	$job = new Job;
	if($_SESSION['logged_in']){
		$uid = $_SESSION['user_id'];
		$template = new Template('templates/applied-jobs.php');
		$template->applied_jobs = $job->getAllAppliedJobs($uid);
	
		$template->title = 'Applied jobs';
		echo $template;

	}
	else{
		reDirect("index.php","Please signin","error");
	}


	


?>