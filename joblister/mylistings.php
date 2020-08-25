<?php include_once 'config/init.php'; ?>

<?php 
	$job = new Job;
	if($_SESSION['logged_in']){
		$uid = $_SESSION['user_id'];
		$template = new Template('templates/my-listings.php');
		$template->my_jobs = $job->getMyJobs($uid);
		$template->title = 'My Job Listings';
		echo $template;

	}
	else{
		reDirect("index.php","Please signin","error");
	}


	


?>