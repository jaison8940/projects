<?php include_once 'config/init.php'; ?>

<?php 
	$job = new Job;
	if($_SESSION['logged_in']){
		if(isset($_POST['del_id'])){
			$del_id = $_POST['del_id'];
			if($job->delete($del_id)){
				reDirect("index.php","Job Deleted!","success");
			}else{
				reDirect('index.php','Job Not Deleted','error');
			}
		}
		if(isset($_GET['myjob']))
		{
			$template = new Template('templates/job-single.php');
			$template->go_back="mylistings.php";

		}
		else if(isset($_GET['appliedjob'])){
			$template = new Template('templates/job-single-general.php');
			$template->go_back="applied_jobs.php";
		}
		else{
			$template = new Template('templates/job-single-general.php');
			$template->go_back="index.php";
		}


		$job_id = isset($_GET['id']) ? $_GET['id'] : null;

		

		
		$template->job = $job->getJob($job_id);
		$template->applied_or_not = $job->checkIfApplied($job_id, $_SESSION['user_id']);
		echo $template;
	}
	else{
		reDirect("index.php","Please signin","error");
	}

?>