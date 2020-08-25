<?php include_once 'config/init.php'; ?>

<?php 
	$job = new Job;
	$job_id = isset($_GET['id']) ? $_GET['id'] : null;
	if($_SESSION['logged_in']){
		if(isset($_POST['submit']))
		{
			$data = array();
			$data['job_title'] = $_POST['job_title'];
			$data['company'] = $_POST['company'];
			$data['category_id'] = $_POST['category'];
			$data['description'] = $_POST['description'];
			$data['location'] = $_POST['location'];
			$data['salary'] = $_POST['salary'];
			$data['contact_user'] = $_POST['contact_user'];
			$data['contact_email'] = $_POST['contact_email'];
	
			if($data['job_title'] == '' || $data['company']=='' ||  $data['category_id']=='' || $data['description']=='' || $data['location']==''  || $data['salary']=='' || $data['contact_user']=='' || $data['contact_email']==''){
				reDirect("create.php","Please file in all fields!","error");
			}
			else{
			if($job->update($job_id, $data)){
				reDirect("index.php","Your job has been updated","success");
			}else{
				reDirect('index.php','Something went wrong','error');
			}
		}
	
		}
		$template = new Template('templates/job-edit.php');
		$template->job = $job->getJob($job_id);
		$template->countries = $job->getCountries();
		$template->categories = $job->getCategories();
		echo $template;
	}
	else{
		reDirect("index.php","Please signin","error");
	}


?>