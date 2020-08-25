<?php include_once 'config/init.php'; ?>

<?php 
	$job = new Job;
	if($_SESSION['logged_in']){
		$uid = $_SESSION['user_id'];
		if(isset($_GET['job_id']) && !isset($_GET['user_id']))
		{
			$job_id = $_GET['job_id'];
			$template = new Template('templates/view-applications.php');
			$template->my_applications = $job->getAppsDetails($job_id);
			$template->title = 'Applications';
			$template->go_back="mylistings.php";
			echo $template;
		}
		else if(isset($_GET['user_id']))
		{
			$template = new Template('templates/view-details-applicants.php');
			$user_id =$_GET['user_id'];
			$job_id = $_GET['job_id'];
			$template->applicant_details = $job->getAppsDetailsSpecific($job_id, $user_id);
			if($template->applicant_details->contact_no == 0){
						$template->applicant_details->contact_no='None';

			}
			$template->title = 'Details Of Applicant';
			$template->go_back="viewapplications.php?job_id=$job_id;";
			echo $template;


		}

	}
	else{
		reDirect("index.php","Please signin","error");
	}


	


?>